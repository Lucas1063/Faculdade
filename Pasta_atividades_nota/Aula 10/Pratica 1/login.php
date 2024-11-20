<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura o login e senha enviados
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Salva as informações na sessão
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['inicio_sessao'] = date("Y-m-d H:i:s");
    $_SESSION['ultima_requisicao'] = date("Y-m-d H:i:s");

    // Redireciona para o dashboard
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>
        <br><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
