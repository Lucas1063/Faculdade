<?php
// Declarar array com notas
$notas = [8, 7.5, 9, 6.5, 10];

// Declarar array com faltas (cada posição representa um dia)
$faltas = [1, 0, 0, 1, 0, 1, 0, 0]; // 8 dias de aula

// Função para calcular e retornar a média das notas
function calcularMedia($notas) {
    $soma = array_sum($notas);
    $media = $soma / count($notas);
    return $media;
}

// Função para verificar e retornar o status de aprovação por nota
function verificarAprovacaoNota($media) {
    return $media >= 7 ? "Aprovado" : "Reprovado";
}

// Função para calcular e retornar a frequência do aluno
function calcularFrequencia($faltas) {
    $totalAulas = count($faltas);
    $totalFaltas = array_sum($faltas);
    $frequencia = (($totalAulas - $totalFaltas) / $totalAulas) * 100;
    return $frequencia;
}

// Função para verificar e retornar o status de aprovação por frequência
function verificarAprovacaoFrequencia($frequencia) {
    return $frequencia > 70 ? "Aprovado" : "Reprovado";
}

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
