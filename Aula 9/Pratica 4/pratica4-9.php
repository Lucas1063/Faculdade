<?php
// Função para calcular o valor final
function calcularValorFinal($valor, $desconto) {
    // Verifica se os valores são numéricos
    if (!is_numeric($valor) || !is_numeric($desconto)) {
        throw new Exception("Valor e desconto devem ser numéricos.");
    }
    
    // Calcula o valor final
    if ($desconto < 0 || $desconto > 100) {
        throw new Exception("Desconto deve estar entre 0 e 100.");
    }
    
    $valorFinal = $valor - ($valor * ($desconto / 100));
    return $valorFinal;
}

// Captura os dados da Query String usando $_REQUEST
$valor = isset($_REQUEST['valor']) ? $_REQUEST['valor'] : null;
$desconto = isset($_REQUEST['desconto']) ? $_REQUEST['desconto'] : null;

try {
    // Chama a função para calcular o valor final
    if ($valor !== null && $desconto !== null) {
        $valorFinal = calcularValorFinal($valor, $desconto);
        echo "O valor final é: R$ " . number_format($valorFinal, 2, ',', '.');
    } else {
        throw new Exception("Por favor, forneça os parâmetros 'valor' e 'desconto' na URL.");
    }
} catch (Exception $e) {
    // Retorna a mensagem de erro
    echo "Erro: " . $e->getMessage();
}
?>
