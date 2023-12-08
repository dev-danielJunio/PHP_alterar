<div class="titulo">Modificadores</div>

<?php
class Whatsapp {
    public $biografia = "biografia";
    protected $photo = "imagem";
    private $status = "status";

    public function verUser(){
        echo "Consigo ver: <br>";
        echo "{$this->biografia}<br>";
        echo "{$this->photo}<br>";
        echo "{$this->status}<br>";

        $this->status();
    }

    protected function status(){
        echo "Você pode ver meus status<br>";
    }
}

class Amigo extends Whatsapp{
    public function verAmigo(){
        echo "Consigo ver: <br>";
        echo "{$this->biografia}<br>";
        echo "{$this->photo}<br>";

        $this->status();
    }
}

$whatsapp = new Whatsapp();
$whatsapp -> verUser();
$amigo = new Amigo();

$amigo -> verAmigo();