<?php
include('pessoa.php');
class Usuario extends Pessoa {
    public $login;

    function __construct($nome, $idade, $login){
        parent::__construct($nome, $idade);
            $this->login = $login;
            echo "usuario $this->nome de $this->idade, foi criado com sucesso!<br>";
    }

    public function apresentar() {
        echo "@{$this->login}: ". parent::apresentar();
    }
}