<?php
require_once 'Time.php'; 
require_once 'Jogador.php'; 

// Instanciar um time
$time = new Time();
// Definir os dados desse time
$time->setnome("unidavi FC");
$time->setanofundacao(2000);

// Instanciar um jogador
$jogador = new Jogador();
$jogador->setNome("Pelé");
$jogador->setPosicao("M");
$jogador->setDataNascimento(new DateTime("2000-01-01"));

// Adicionar jogador
$time->addjogador($jogador);
var_dump($time->getjogadores());
?>
