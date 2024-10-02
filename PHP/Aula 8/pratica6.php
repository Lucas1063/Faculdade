<?php
// Declaração da MATRIZ MULTIDIMENSIONAL
$dados = [
    ["Disciplina" => "Matemática", "Faltas" => 5, "Média" => 8.5],
    ["Disciplina" => "Português", "Faltas" => 2, "Média" => 9],
    ["Disciplina" => "Geografia", "Faltas" => 10, "Média" => 6],
    ["Disciplina" => "Educação Física", "Faltas" => 2, "Média" => 8]
];

// Início da tabela HTML
echo "<table border='1'>
        <tr>
            <th>Disciplina</th>
            <th>Faltas</th>
            <th>Média</th>
        </tr>";

// Percorrer todos os elementos da matriz
foreach ($dados as $linha) {
    echo "<tr>
            <td>{$linha['Disciplina']}</td>
            <td>{$linha['Faltas']}</td>
            <td>{$linha['Média']}</td>
          </tr>";
}

// Fim da tabela HTML
echo "</table>";
?>
