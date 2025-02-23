<?php
require_once 'calculadora.php'; // Ajuste o caminho do arquivo conforme necessário

$calculadora = new Calculadora();
$calculadora->setOperador1(10);
$calculadora->setOperador2(10);
$resultado = $calculadora->somar();

echo "O resultado da soma é: " . $resultado;
?>
