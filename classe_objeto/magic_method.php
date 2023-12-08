<div class="titulo">Metodos Mágicos</div>

<?php
class Pessoa{
    public $nome;
    public $sobrenome;

    function __construct($nome, $sobrenome)
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
    }

    public function __toString()
    {
        return "Olá! {$this->nome}{$this->sobrenome}";
    }

    public function apresentar() {
        echo $this;
    }

    public function __get($atr)
    {
        echo "Erro de sintaxe o {$atr} ainda não foi declarado";
    }

        public function __set($atr, $valor)
    {
        echo "O atributo {$atr} foi alterado para {$valor}";
    }

    public function __call($name, $arguments)
    {
        echo "Tentando executar método {$name} com: ";
        print_r($arguments);
    }

}

$pessoa = new Pessoa("João", "Silva");
$pessoa->apresentar = "np";
$pessoa->exec('oi', [1, 2, 3], 'nome');