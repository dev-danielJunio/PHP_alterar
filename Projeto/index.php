<?php
session_start();

if($_COOKIE['usuario']){
    $_SESSION['usuario'] = $_COOKIE['usuario'];
}

if(!$_SESSION['usuario']){
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #333;
            margin: 0 auto 20px;
            overflow: hidden;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            text-align: center;
        }

        .user-info h2 {
            margin: 0;
        }

        .user-info p {
            margin: 10px 0;
        }

        .user-info a {
            text-decoration: none;
            color: #007bff;
        }

        .user-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Perfil do Usuário</h1>
    </header>

    <div class="container">
        <div class="profile-picture">
            <img src="<?php echo $_SESSION['img']?>" alt="Foto de perfil">
        </div>
        <div class="user-info">
            <h2><?php echo $_SESSION['nome']. ' ' .$_SESSION['sobrenome']?></h2>
            <p>E-mail: <a href="mailto:usuario@example.com"><?php echo $_SESSION['email']?></a></p>
            <p>Telefone: <?php echo $_SESSION['telefone']?></p>
            <p>Localização: <?php echo $_SESSION['pais']. ', ' .$_SESSION['cidade']?></p>
        </div>
        <p><a href="/Projeto/remove.php/">Remove</a></p>
    </div>
</body>
</html>
