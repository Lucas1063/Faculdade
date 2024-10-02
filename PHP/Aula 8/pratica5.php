<?php
// Declaração do ARRAY com os nomes das disciplinas
$disciplinas = [
    "Banco de Dados",
    "Estrutura de Dados",
    "Administração de Sistemas de Informação",
    "Engenharia de Software",
    "Programação Web"
];

// Declaração do ARRAY com os nomes dos professores
$professores = [
    "Marco",
    "Bastos",
    "Sandro",
    "Julian",
    "Cleber"
];

// Loop para exibir a disciplina e o professor
for ($i = 0; $i < 5; $i++) {
    echo "Disciplina: " . $disciplinas[$i] . ", Professor: " . $professores[$i] . "<br>";
}
?>
