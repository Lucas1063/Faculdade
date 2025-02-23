<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo da Área de um Triângulo Retângulo</title>
</head>
<body>

<h1>Calcule a área de um triângulo retângulo</h1>

<form method="POST" action="">
    <label for="base">Digite o valor da base (em metros):</label>
    <input type="number" id="base" name="base" step="0.01" required><br><br>

    <label for="altura">Digite o valor da altura (em metros):</label>
    <input type="number" id="altura" name="altura" step="0.01" required><br><br>

    <input type="submit" value="Calcular Área">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = $_POST["base"];
    $altura = $_POST["altura"];
    

    $area = ($base * $altura) / 2;

    echo "<p>A área do triângulo retângulo com base de $base metros e altura de $altura metros é $area metros quadrados.</p>";
}
?>

</body>
</html>
