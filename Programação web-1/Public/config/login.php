<?php
include_once('config.php');

$conn = dbConnect();

// Dados do administrador
$login = 'admin'; 
$senha = password_hash('admin', PASSWORD_BCRYPT); 

try {
    // Insere o administrador no banco
    $stmt = $conn->prepare("
        INSERT INTO usuarios_admin (login, senha_hash) 
        VALUES (:login, :senha_hash)
    ");
    $stmt->execute([
        ':login' => $login,
        ':senha_hash' => $senha
    ]);

    echo "Administrador inserido com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao inserir administrador: " . $e->getMessage();
}
?>
