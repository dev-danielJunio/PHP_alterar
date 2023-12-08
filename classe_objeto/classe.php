<div class="title">Classe PHP</div>

<?php

class Cliente {
    
    // atributo

    public $nome;
    public $idade;
    public $trabalho = "pedreiro";


    public function __construct($nome, $idade = 'indefinida') {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function apresentar() {
        echo "Olá, meu nome é " . $this->nome . " e eu tenho " . $this->idade . " anos.";

        $this->trabalho();
    }

    public function trabalho(){
        
        if($this->trabalho == 'pedreiro'){
            echo "sou pedreiro";
        }
    }

};

$cliente1 = new Cliente("Jose", 20);
$cliente1->apresentar();
