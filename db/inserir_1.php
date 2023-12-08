<div class="titulo">Inserir registro #01</div>

<?php

require_once "conexao.php";

$sql = "INSERT INTO cadastro
(nome, nascimento, email, site, senha)
VALUES (
    'Dani',
    '2010-08-22',
    'danin@gmail.com',
    'danish.com',
    '11');";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado) {
    echo "Success"; 
}