<div class="titulo">Interface</div>

<?php
interface Carro{
    function correr();
}

interface Cor{
    function cor();
}

interface Marca{
    function marca();
}

interface TipoCarro extends Carro, Cor, Marca{
    function caracteristicas(): string;
}

class MeuCarro implements TipoCarro{
    function caracteristicas(): string{
        return "Irei dizer as caracteristicas do seu carro! <br>";
    }

    function correr(){
        return "Corro por 200km/h <br>";
    }

    function cor(){
        return "Sou vermelho <br>";
    }

    function marca(){
        return "Porche <br>";
    }
}

$carro = new MeuCarro;
echo $carro->caracteristicas();
echo $carro->correr();
echo $carro->cor();
echo $carro->marca();

var_dump($carro instanceof Marca);
