<?php
require_once 'computador.php';

$meuComputador = new Computador();
$meuComputador->ligar();
echo $meuComputador->getstatus() . "\n"; 

$meuComputador->desligar();
echo $meuComputador->getstatus() . "\n"; 
?>
