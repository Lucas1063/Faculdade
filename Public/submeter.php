<?php
include_once 'config/config.php';
$db = dbConnect();

// Recebe as respostas e armazena
$respostas = $_POST['resposta'];
$feedback = $_POST['feedback'] ?? '';

foreach ($respostas as $id_pergunta => $resposta) {
    $stmt = $db->prepare("INSERT INTO avaliacoes (id_pergunta, resposta, feedback_texto) VALUES (:id_pergunta, :resposta, :feedback)");
    $stmt->bindParam(':id_pergunta', $id_pergunta);
    $stmt->bindParam(':resposta', $resposta);
    $stmt->bindParam(':feedback', $feedback);
    $stmt->execute();
}

// Redireciona para a página de agradecimento
header("Location: obrigado.php");
exit;
