<div class="titulo">Escrever Arquivo</div>

<?php

$arquivo = fopen('teste.txt', 'w');
fwrite($arquivo, "Valor inicia\n");
fclose($arquivo);