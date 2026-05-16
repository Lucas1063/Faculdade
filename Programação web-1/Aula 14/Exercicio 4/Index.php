<?php
require_once 'Usuario.php';
require_once 'Sessao.php';

$usuario = new Usuario("João Silva", "joaosilva", "senha123");
echo "Nome: " . $usuario->getUserName();

$sessao = new Sessao("sessao_001", $usuario);
$sessao->iniciaSessao();
echo "Sessão iniciada para: " . $sessao->getUsuarioSessao()->getUserName();
?>

