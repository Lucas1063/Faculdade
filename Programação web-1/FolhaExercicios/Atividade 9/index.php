<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo das Parcelas da Moto com Juros Compostos</title>
</head>
<body>

<h1>Cálculo do Financiamento da Moto (Juros Compostos)</h1>

<?php

$valor_a_vista = 8654.00;
$parcelas = [24, 36, 48, 60];
$taxa_juros_inicial = 2.0; 
$juros_por_nivel = 0.3; 

echo "<table border='1'>
        <tr>
            <th>Número de Parcelas</th>
            <th>Taxa de Juros (%)</th>
            <th>Valor da Parcela (R$)</th>
        </tr>";


foreach ($parcelas as $n_parcelas) {

    $taxa_juros = $taxa_juros_inicial + (($n_parcelas - 24) / 12) * $juros_por_nivel;


    $taxa_juros_mensal = $taxa_juros / 100;

    $montante = $valor_a_vista * pow(1 + $taxa_juros_mensal, $n_parcelas);

    $valor_parcela = $montante / $n_parcelas;

    echo "<tr>
            <td>$n_parcelas</td>
            <td>" . number_format($taxa_juros, 2, ',', '.') . "</td>
            <td>" . number_format($valor_parcela, 2, ',', '.') . "</td>
          </tr>";
}

echo "</table>";
?>
</body>
</html>
