<?php namespace App; ?>

<div class="titulo">namespace</div>

<?php
echo __NAMESPACE__. '<br>';
const constante = 123 .'<br>';

namespace App\Principal; 
echo __NAMESPACE__. '<br>';
const constante = 321 .'<br>';

namespace App\Principal\Painel; 
echo __NAMESPACE__. '<br>';
const constante = 333 .'<br>';

echo constante;
echo \App\constante;
echo \App\Principal\constante;