<div class="titulo">abstract</div>

<?php
abstract class TreatError{
    protected $err;
    protected $msg;

    public function __construct($err, $msg)
    {
        $this->err = $err;
        $this->msg = $msg;
    }

    abstract public function traet();
}

class CallErr extends TreatError{
    
    public function traet()
    {
        echo "Erro: {$this->err}, Mensagem: {$this->msg}";
    }

}

$err = new CallErr("708", "Arquivo não foi encontrato!");
$err->traet();