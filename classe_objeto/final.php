<div class="titulo">final</div>

<?php
abstract class  Abstrata {
    abstract public function metodo1();

    public final function metodo2(){
        return 200;
    }
}

class User extends Abstrata{
    public function metodo1(){
        echo parent::metodo2();
    }
}

$user = new User();
$user->metodo1();