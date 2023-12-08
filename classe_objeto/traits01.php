<div class="titulo">Traits 01</div>

<?php

trait validacao {
    public function validarString($str){
        return isset($str) && $str !== '';
    }
}

trait validacaoAtualizada {
    public function validarSTringAtualizada($str){
        return isset($str) && trim($str); 
    }
}

class User {
    use validacao, validacaoAtualizada;
}

$usuario = new User();
var_dump($usuario->validarString(' '));
var_dump($usuario->validarSTringAtualizada('Oi'));