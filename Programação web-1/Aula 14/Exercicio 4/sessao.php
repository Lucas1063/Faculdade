<?php
require_once 'Usuario.php'; // Inclui o arquivo da classe Usuario

// Classe Sessao
class Sessao {
    private $sessionId;
    private $status;
    private $usuario; // Instância da classe Usuario
    private $dataHoraInicio;
    private $dataHoraUltimoAcesso;

    // Construtor
    public function __construct($sessionId, Usuario $usuario) {
        $this->sessionId = $sessionId;
        $this->status = 0; // Iniciando como inativa
        $this->usuario = $usuario;
        $this->dataHoraInicio = null;
        $this->dataHoraUltimoAcesso = null;
    }

    // Métodos para iniciar a sessão
    public function iniciaSessao() {
        $this->status = 1; // Ativa a sessão
        $this->dataHoraInicio = new DateTime();
        $this->dataHoraUltimoAcesso = $this->dataHoraInicio;
        return true;
    }

    // Métodos para finalizar a sessão
    public function finalizaSessao() {
        if ($this->status == 1) {
            $this->status = 0; // Finaliza a sessão
            return true;
        }
        return false; // A sessão já estava inativa
    }

    // Método para obter o usuário da sessão
    public function getUsuarioSessao() {
        return $this->usuario;
    }

    // Getters
    public function getSessionId() {
        return $this->sessionId;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDataHoraInicio() {
        return $this->dataHoraInicio;
    }

    public function getDataHoraUltimoAcesso() {
        return $this->dataHoraUltimoAcesso;
    }

    // Atualiza o último acesso
    public function atualizaUltimoAcesso() {
        if ($this->status == 1) {
            $this->dataHoraUltimoAcesso = new DateTime();
        }
    }
}
?>
