<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once('../config/config.php');

function autenticar($username, $password) {
    $conn = dbConnect(); 

    // Consulta para buscar o usuário
    $stmt = $conn->prepare("SELECT * FROM usuarios_admin WHERE login = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica o usuário e a senha
    if ($user && password_verify($password, $user['senha_hash'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: ../dashboard.php'); // Redireciona para o dashboard
        exit;
    }

    // Retorna mensagem de erro caso falhe
    return "Usuário ou senha inválidos.";
}
?>
