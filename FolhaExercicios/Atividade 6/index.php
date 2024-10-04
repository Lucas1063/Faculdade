<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras de Joãozinho</title>
    <style>
        .red {
            color: red;
        }
        .blue {
            color: blue;
        }
        .green {
            color: green;
        }
    </style>
</head>
<body>

<h1>Calculadora de Compras de Joãozinho</h1>

<form method="POST" action="">
    <label for="preco_maca">Preço da maçã (por kg):</label>
    <input type="number" id="preco_maca" name="preco_maca" step="0.01" required><br><br>

    <label for="kg_maca">Quantidade de maçã (kg):</label>
    <input type="number" id="kg_maca" name="kg_maca" step="0.01" required><br><br>

    <label for="preco_melancia">Preço da melancia (por kg):</label>
    <input type="number" id="preco_melancia" name="preco_melancia" step="0.01" required><br><br>

    <label for="kg_melancia">Quantidade de melancia (kg):</label>
    <input type="number" id="kg_melancia" name="kg_melancia" step="0.01" required><br><br>

    <label for="preco_laranja">Preço da laranja (por kg):</label>
    <input type="number" id="preco_laranja" name="preco_laranja" step="0.01" required><br><br>

    <label for="kg_laranja">Quantidade de laranja (kg):</label>
    <input type="number" id="kg_laranja" name="kg_laranja" step="0.01" required><br><br>

    <label for="preco_repolho">Preço do repolho (por kg):</label>
    <input type="number" id="preco_repolho" name="preco_repolho" step="0.01" required><br><br>

    <label for="kg_repolho">Quantidade de repolho (kg):</label>
    <input type="number" id="kg_repolho" name="kg_repolho" step="0.01" required><br><br>

    <label for="preco_cenoura">Preço da cenoura (por kg):</label>
    <input type="number" id="preco_cenoura" name="preco_cenoura" step="0.01" required><br><br>

    <label for="kg_cenoura">Quantidade de cenoura (kg):</label>
    <input type="number" id="kg_cenoura" name="kg_cenoura" step="0.01" required><br><br>

    <label for="preco_batatinha">Preço da batatinha (por kg):</label>
    <input type="number" id="preco_batatinha" name="preco_batatinha" step="0.01" required><br><br>

    <label for="kg_batatinha">Quantidade de batatinha (kg):</label>
    <input type="number" id="kg_batatinha" name="kg_batatinha" step="0.01" required><br><br>

    <input type="submit" value="Calcular Total">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $preco_maca = $_POST["preco_maca"];
    $kg_maca = $_POST["kg_maca"];
    $preco_melancia = $_POST["preco_melancia"];
    $kg_melancia = $_POST["kg_melancia"];
    $preco_laranja = $_POST["preco_laranja"];
    $kg_laranja = $_POST["kg_laranja"];
    $preco_repolho = $_POST["preco_repolho"];
    $kg_repolho = $_POST["kg_repolho"];
    $preco_cenoura = $_POST["preco_cenoura"];
    $kg_cenoura = $_POST["kg_cenoura"];
    $preco_batatinha = $_POST["preco_batatinha"];
    $kg_batatinha = $_POST["kg_batatinha"];

    // Cálculo do valor total gasto
    $total = ($preco_maca * $kg_maca) + 
             ($preco_melancia * $kg_melancia) + 
             ($preco_laranja * $kg_laranja) + 
             ($preco_repolho * $kg_repolho) + 
             ($preco_cenoura * $kg_cenoura) + 
             ($preco_batatinha * $kg_batatinha);

    $dinheiro_disponivel = 50.00;

    // Mensagem sobre a compra
    echo "<p>O valor total da compra foi R$ " . number_format($total, 2, ',', '.') . ".</p>";

    if ($total > $dinheiro_disponivel) {
        $falta = $total - $dinheiro_disponivel;
        echo "<p class='red'>Falta R$ " . number_format($falta, 2, ',', '.') . " para completar a compra.</p>";
    } elseif ($total < $dinheiro_disponivel) {
        $sobrando = $dinheiro_disponivel - $total;
        echo "<p class='blue'>Joãozinho ainda pode gastar R$ " . number_format($sobrando, 2, ',', '.') . ".</p>";
    } else {
        echo "<p class='green'>O saldo para compras foi esgotado.</p>";
    }
}
?>

</body>
</html>
