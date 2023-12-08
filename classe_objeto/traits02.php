<div class="titulo">Traits #02</div>

<?php

trait validacao {
    public function validarString($str){
        return isset($str) && $str != '';
    }
}

trait validacaoMelhor {
    public function validarString($str){
        return isset($str) && trim($str);
    }
}

class Usuarioo {
    use validacao, validacaoMelhor{
        validacaoMelhor::validarString insteadOf validacao;
    }
}

$usuario = new Usuarioo();
var_dump($usuario->validarString(' '));