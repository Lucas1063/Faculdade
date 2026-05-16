<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Árvore de Pastas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h1>Árvore de Pastas</h1>

<?php

// Definição do array
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


function imprimeArvore($pastas, $nivel = 0) {
    foreach ($pastas as $pasta => $subpastas) {
    
        if (is_numeric($pasta)) {

            echo str_repeat('-', $nivel * 2) . " $subpastas" . "<br>";
        } else {

            echo str_repeat('-', $nivel * 2) . " $pasta" . "<br>";

            if (is_array($subpastas)) {
                imprimeArvore($subpastas, $nivel + 1);
            }
        }
    }
}


imprimeArvore($pastas);

?>


</body>
</html>
