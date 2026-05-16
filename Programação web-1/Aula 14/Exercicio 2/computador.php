<?php
class Computador {
    private $estado;
    public function ligar (){
        $this -> estado = "ligado";
        $this -> escreverestado();
    }
    public function desligar (){
        $this -> estado = "desligado";
        $this -> escreverestado();
    }
    public function getstatus(){
        return $this ->estado;
    }
    private function escreverestado(){
        echo $this ->getstatus();
    }
}
?>