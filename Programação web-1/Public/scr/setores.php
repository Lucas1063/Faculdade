<?php
header("Content-Type: application/json");

require_once ('../config/config.php'); 
try {
    $pdo = dbConnect();

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'GET') {
        // Listar setores
        $stmt = $pdo->query("SELECT id_setor AS id, nome_setor AS nome FROM setores ORDER BY id_setor ASC");
        $setores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(['setores' => $setores]);
    } elseif ($method === 'POST') {
        // Cadastrar setor
        $input = json_decode(file_get_contents('php://input'), true);
        $nomeSetor = $input['nomeSetor'] ?? '';

        if ($nomeSetor) {
            $stmt = $pdo->prepare("INSERT INTO setores (nome_setor) VALUES (:nome)");
            $stmt->execute(['nome' => $nomeSetor]);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Nome do setor é obrigatório.']);
        }
    } elseif ($method === 'DELETE') {
        // Excluir setor
        $id = $_GET['id'] ?? '';
        if ($id) {
            $stmt = $pdo->prepare("DELETE FROM setores WHERE id_setor = :id");
            $stmt->execute(['id' => $id]);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'ID do setor é obrigatório.']);
        }
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
