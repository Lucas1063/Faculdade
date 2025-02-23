<?php
// Inclui o arquivo de configuração para conectar ao banco
include('../config/config.php');

// Conecta ao banco de dados
try {
    $conn = dbConnect();

    // Consulta para buscar as médias das respostas
    $queryMedias = "
        SELECT 
            p.texto_pergunta AS pergunta,
            AVG(a.resposta) AS media -- Calcula a média das respostas
        FROM 
            avaliacoes a
        JOIN 
            perguntas p ON p.id_pergunta = a.id_pergunta
        GROUP BY 
            p.texto_pergunta
        ORDER BY 
            media DESC
    ";
    $stmtMedias = $conn->prepare($queryMedias);
    $stmtMedias->execute();
    $medias = $stmtMedias->fetchAll(PDO::FETCH_ASSOC);

 // Consulta para buscar os feedbacks com a nota
 $queryFeedbacks = "
 SELECT 
     p.texto_pergunta AS pergunta,
     a.feedback_texto AS feedback,
     a.resposta AS nota, -- Inclui a nota da resposta
     a.data_hora AS data_hora,
     s.nome_setor AS setor -- Inclui o setor
 FROM 
     avaliacoes a
 JOIN 
     perguntas p ON p.id_pergunta = a.id_pergunta
 JOIN 
     setores s ON s.id_setor = a.id_setor -- Faz o join com a tabela setores
 WHERE 
     a.feedback_texto IS NOT NULL AND a.feedback_texto <> ''
 ORDER BY 
     a.data_hora DESC
 ";
 

    $stmtFeedbacks = $conn->prepare($queryFeedbacks);
    $stmtFeedbacks->execute();
    $feedbacks = $stmtFeedbacks->fetchAll(PDO::FETCH_ASSOC);

    // Retorna os dados como JSON
    echo json_encode(['medias' => $medias, 'feedbacks' => $feedbacks]);

} catch (PDOException $e) {
    // Em caso de erro, retorna a mensagem
    echo json_encode(['error' => $e->getMessage()]);
}
?>
