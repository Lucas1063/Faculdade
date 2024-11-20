<?php
$pastas = array(
    "bsn" => array(
        "3a Fase" => array(
            "desenvWeb",
            "bancoDados 1",
            "engSoft 1"
        ),
        "4a Fase" => array(
            "Intro Web",
            "bancoDados 2",
            "engSoft 2"
        )
    )
);

// Função recursiva para imprimir a árvore
function imprimirArvore($pastas, $nivel = 0) {
    foreach ($pastas as $key => $value) {
        // Imprimir a pasta ou subpasta
        echo str_repeat("&nbsp;&nbsp;", $nivel) . "- " . $key . "<br>";
        
        // Se o valor for um array, chamar a função recursivamente
        if (is_array($value)) {
            imprimirArvore($value, $nivel + 1);
        }
    }
}

// Chamada da função para imprimir a árvore
imprimirArvore($pastas);
?>
