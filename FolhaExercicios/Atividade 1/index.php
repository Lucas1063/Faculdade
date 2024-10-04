<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma de Três Valores</title>
    <style>
        .blue {
            color: blue;
        }
        .green {
            color: green;
        }
        .red {
            color: red;
        }
    </style>
</head>
<body>

<h1>Insira três valores</h1>

<form method="POST" action="">
    <label for="valor1">Valor 1:</label>
    <input type="number" id="valor1" name="valor1" required><br><br>

    <label for="valor2">Valor 2:</label>
    <input type="number" id="valor2" name="valor2" required><br><br>

    <label for="valor3">Valor 3:</label>
    <input type="number" id="valor3" name="valor3" required><br><br>

    <input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor1 = $_POST["valor1"];
    $valor2 = $_POST["valor2"];
    $valor3 = $_POST["valor3"];
    
    $soma = $valor1 + $valor2 + $valor3;

    if ($valor1 > 10) {
        echo "<p class='blue'>Resultado: $soma</p>";
    } elseif ($valor2 < $valor3) {
        echo "<p class='green'>Resultado: $soma</p>";
    } elseif ($valor3 < $valor1 && $valor2) {
        echo "<p class='red'>Resultado: $soma</p>";
    } else {
        echo "<p>Resultado: $soma</p>";
    }
}
?>

</body>
</html>
