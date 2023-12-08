<div class="titulo">Polimorfismo</div>

<?php

abstract class Comida{
    public $peso;
}

class Arroz extends Comida{


}

class Sorvete extends Comida{

}

class Pessoa {
    public $peso;

    function __construct($peso){
        $this->peso = $peso;
    }

    public function comer(Comida $comida){
        $this->peso += $comida->peso;
    }
}

$comida1 = new Arroz();
$comida1->peso = 0.50;

$comida2 = new Sorvete();
$comida2->peso = 0.20;

$pessoa = new Pessoa(60);
$pessoa->comer($comida1);
$pessoa->comer($comida2);

echo $pessoa->peso;