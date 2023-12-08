<div class="title">Membros estaticos</div>

<?php
class Calculadora{
    public static $n1 = 5;
    public static $n2 = 2;

    public static function mostrarExemplo() {
        $SOMA = self::$n1 + self::$n2;
        $SUBTRACAO = self::$n1 - self::$n2;
        $DIVISAO = self::$n1 / self::$n2;
        $MULTIPLICAXAO = self::$n1 * self::$n2;

        echo "Soma: ". self::$n1 . " + " . self::$n2 ." = ". $SOMA;
    }
}

class MostrarUser extends Calculadora{

    public function mostrarResultado(){
        echo "O resultado foi: <br>";
        Calculadora::mostrarExemplo();

    }

}

$user = new MostrarUser();

$user->mostrarResultado();