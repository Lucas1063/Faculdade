<?php
// index.php

// Requerer o arquivo auxiliar com as funções
require_once("funcoes.php");

// Declarar array com notas
$notas = [8, 7.5, 9, 6.5, 10];

// Declarar array com faltas (cada posição representa um dia)
$faltas = [1, 0, 0, 1, 0, 1, 0, 0]; // 8 dias de aula

// Chamada das funções
$media = calcularMedia($notas);
$statusNota = verificarAprovacaoNota($media);
$frequencia = calcularFrequencia($faltas);
$statusFrequencia = verificarAprovacaoFrequencia($frequencia);

// Exibir resultados
echo "Média das notas: " . number_format($media, 2) . "<br>";
echo "Status de Aprovação por Nota: " . $statusNota . "<br>";
echo "Frequência: " . number_format($frequencia, 2) . "%<br>";
echo "Status de Aprovação por Frequência: " . $statusFrequencia . "<br>";
?>
