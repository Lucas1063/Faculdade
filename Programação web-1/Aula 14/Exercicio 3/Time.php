<?php
class Time {
    private $nome;
    private $anofundacao;
    private $jogadores;

    public function __construct() {
        $this->jogadores = array();
    }

    public function setnome($nome) {
        $this->nome = $nome;
    }

    public function setanofundacao($ano) {
        $this->anofundacao = $ano;
    }

    public function addjogador($jogador) {
        array_push($this->jogadores, $jogador);
    }

    public function getjogadores() {
        return $this->jogadores;
    }
}
?>
