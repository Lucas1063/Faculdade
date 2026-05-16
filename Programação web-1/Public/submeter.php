<?php
include_once 'config/config.php';
$db = dbConnect();

// Recebe as respostas e os feedbacks
$respostas = $_POST['resposta'];
$feedbacks = $_POST['feedback'] ?? [];

foreach ($respostas as $id_pergunta => $resposta) {
    // Verifica se há feedback correspondente para a pergunta
    $feedback = $feedbacks[$id_pergunta] ?? null;

    // Consulta para obter o id_setor da pergunta
    $querySetor = "SELECT id_setor FROM perguntas WHERE id_pergunta = :id_pergunta";
    $stmtSetor = $db->prepare($querySetor);
    $stmtSetor->bindParam(':id_pergunta', $id_pergunta);
    $stmtSetor->execute();
    $id_setor = $stmtSetor->fetchColumn(); // Recupera o id_setor da pergunta

    if ($id_setor !== false) { // Certifica que o setor foi encontrado
        // Insere a avaliação no banco com o setor vinculado
        $stmt = $db->prepare("
            INSERT INTO avaliacoes (id_pergunta, id_setor, resposta, feedback_texto) 
            VALUES (:id_pergunta, :id_setor, :resposta, :feedback)
        ");
        $stmt->bindParam(':id_pergunta', $id_pergunta);
        $stmt->bindParam(':id_setor', $id_setor);
        $stmt->bindParam(':resposta', $resposta);
        $stmt->bindParam(':feedback', $feedback);
        $stmt->execute();
    } else {
        // Opcional: Log ou tratamento de erro caso o setor não seja encontrado
        error_log("Setor não encontrado para a pergunta ID: $id_pergunta");
    }
}

// Redireciona para a página de agradecimento
header("Location: obrigado.php");
exit;
?>
