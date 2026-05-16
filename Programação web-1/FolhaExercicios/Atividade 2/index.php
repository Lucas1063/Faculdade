<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Divisibilidade por 2</title>
</head>
<body>

<h1>Teste se o número é divisível por 2</h1>

<form method="POST" action="">
    <label for="numero">Digite um número:</label>
    <input type="number" id="numero" name="numero" required><br><br>

    <input type="submit" value="Verificar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    
    if ($numero % 2 == 0) {
        echo "<p>Valor divisível por 2</p>";
    } else {
        echo "<p>O valor não é divisível por 2</p>";
    }
}
?>

</body>
</html>
