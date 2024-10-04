<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo das Parcelas da Moto</title>
</head>
<body>

<h1>Cálculo do Financiamento da Moto</h1>

<?php

$valor_a_vista = 8654.00;
$parcelas = [24, 36, 48, 60];
$taxa_juros_inicial = 1.5; 
$juros_por_nivel = 0.5; 

echo "<table border='1'>
        <tr>
            <th>Número de Parcelas</th>
            <th>Taxa de Juros (%)</th>
            <th>Valor da Parcela (R$)</th>
        </tr>";


foreach ($parcelas as $n_parcelas) {

    $taxa_juros = $taxa_juros_inicial + (($n_parcelas - 24) / 12) * $juros_por_nivel;


    $valor_total = $valor_a_vista + ($valor_a_vista * ($taxa_juros / 100) * ($n_parcelas / 12));
    

    $valor_parcela = $valor_total / $n_parcelas;


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
