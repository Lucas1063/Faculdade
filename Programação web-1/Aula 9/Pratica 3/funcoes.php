<?php
// funcoes.php

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
?>
