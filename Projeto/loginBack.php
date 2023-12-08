<?php
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if($_POST['email']) {
    $usuarios = [
        [
            "usuario" => "3429",
            "nome" => "Daniel",
            "sobrenome" => "Junio",
            "email" => "daniel@gmail.com",
            "senha" => "1010",
            "telefone" => "(62) 98161-2304",
            "pais" => "Canadá",
            "cidade" => "Toronto",
            "img" => "img/tanjiro.jpg"
        ],
        [
            "usuario" => "3541",
            "nome" => "Kizawa",
            "sobrenome" => "Yamoto",
            "email" => "kizaa@gmail.com",
            "senha" => "100",
            "telefone" => "(72) 98901-2789",
            "pais" => "Japão",
            "cidade" => "Tokyo",
            "img" => "img/Kanaoo.webp"
        ]
    ];

        
    foreach($usuarios as $usuario){
        if($email === $usuario['email'] && $senha === $usuario['senha'] && $nome === $usuario['nome']){

            $_SESSION['error'] = null;
            $_SESSION['usuario'] = $usuario['usuario'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['sobrenome'] = $usuario['sobrenome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['telefone'] = $usuario['telefone'];
            $_SESSION['pais'] = $usuario['pais'];
            $_SESSION['cidade'] = $usuario['cidade'];
            $_SESSION['img'] = $usuario['img'];

            $exp = time() + 60;
            setcookie('usuario', $usuario['nome'], $exp);
            header('Location: index.php');

        };
    };

    if(!$_SESSION['usuario']){
        header('Location: login.php');
        $_SESSION['error'] = ['Usuario/Senha invalido!'];
    };

}

?>