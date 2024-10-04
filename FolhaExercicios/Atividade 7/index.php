<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financiamento de Carro</title>
</head>
<body>

<h1>Cálculo dos Juros do Financiamento</h1>

<form method="POST" action="">
    <label for="preco_avista">Preço do carro à vista:</label>
    <input type="number" id="preco_avista" name="preco_avista" value="22500" readonly><br><br>

    <label for="parcelas">Número de parcelas:</label>
    <input type="number" id="parcelas" name="parcelas" value="60" readonly><br><br>

    <label for="valor_parcela">Valor de cada parcela:</label>
    <input type="number" id="valor_parcela" name="valor_parcela" value="489.65" readonly><br><br>

    <input type="submit" value="Calcular Juros">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $preco_avista = $_POST["preco_avista"];
    $parcelas = $_POST["parcelas"];
    $valor_parcela = $_POST["valor_parcela"];

  
    $valor_total_financiado = $parcelas * $valor_parcela;


    $juros_pagos = $valor_total_financiado - $preco_avista;

    echo "<p>O valor total pago no financiamento é R$ " . number_format($valor_total_financiado, 2, ',', '.') . ".</p>";
    echo "<p>Os juros pagos por Mariazinha serão R$ " . number_format($juros_pagos, 2, ',', '.') . ".</p>";
}
?>

</body>
</html>
