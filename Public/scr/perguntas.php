<?php
include_once('../config/config.php'); // Inclui o arquivo de configuração

header('Content-Type: application/json');

try {
    $conn = dbConnect(); // Conexão com o banco de dados

    // Verifica o método da requisição
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Adicionar nova pergunta
        if (isset($_POST['textoPergunta'], $_POST['setorPergunta']) && !isset($_POST['idPergunta'])) {
            $textoPergunta = trim($_POST['textoPergunta']);
            $idSetor = intval($_POST['setorPergunta']);

            // Verifica se a pergunta já existe no mesmo setor
            $stmt = $conn->prepare("
                SELECT COUNT(*) 
                FROM perguntas 
                WHERE texto_pergunta = :textoPergunta AND id_setor = :idSetor
            ");
            $stmt->execute([
                ':textoPergunta' => $textoPergunta,
                ':idSetor' => $idSetor
            ]);
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                echo json_encode(['success' => false, 'message' => 'Pergunta já existe para este setor.']);
                exit;
            }

            // Insere a nova pergunta
            $stmt = $conn->prepare("
                INSERT INTO perguntas (texto_pergunta, id_setor) 
                VALUES (:textoPergunta, :idSetor)
            ");
            $stmt->execute([
                ':textoPergunta' => $textoPergunta,
                ':idSetor' => $idSetor
            ]);
            echo json_encode(['success' => true, 'message' => 'Pergunta adicionada com sucesso!']);
        } 
        // Excluir pergunta
        elseif (isset($_POST['idPergunta'])) {
            $idPergunta = intval($_POST['idPergunta']);

            // Remove a pergunta do banco de dados
            $stmt = $conn->prepare("
                DELETE FROM perguntas 
                WHERE id_pergunta = :idPergunta
            ");
            $stmt->execute([':idPergunta' => $idPergunta]);
            echo json_encode(['success' => true, 'message' => 'Pergunta excluída com sucesso!']);
        } else {
            // Parâmetros insuficientes para a operação POST
            echo json_encode(['success' => false, 'message' => 'Parâmetros inválidos para a requisição POST.']);
        }
    } 
    // Obter perguntas e setores (GET)
    elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Obter perguntas e seus respectivos setores
        $stmt = $conn->prepare("
            SELECT 
                p.id_pergunta, 
                p.texto_pergunta, 
                COALESCE(s.nome_setor, 'Sem setor') AS nome_setor 
            FROM perguntas p
            LEFT JOIN setores s ON p.id_setor = s.id_setor
        ");
        $stmt->execute();
        $perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Obter lista de setores
        $stmtSetores = $conn->prepare("
            SELECT id_setor, nome_setor 
            FROM setores
        ");
        $stmtSetores->execute();
        $setores = $stmtSetores->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(['perguntas' => $perguntas, 'setores' => $setores]);
    } 
    // Método HTTP não suportado
    else {
        http_response_code(405);
        echo json_encode(['success' => false, 'message' => 'Método HTTP não permitido.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no servidor: ' . $e->getMessage()]);
    exit;
}
