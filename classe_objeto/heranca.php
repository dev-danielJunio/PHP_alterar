<div class="title">Herança</div>

<?php
class Pessoa{

    public $nome;
    public $idade;

     function __construct($nome, $idade)
     {
        $this->nome = $nome;
        $this->idade = $idade;
     }

     function __destruct()
     {
        echo 'Excluido';
     }

     public function apresentar(){
        return "{$this->nome}, {$this->idade} anos";
     }

}

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

$usuario = new Usuario('Daniel Junio', 20, 'dani_dev');
$usuario->apresentar();