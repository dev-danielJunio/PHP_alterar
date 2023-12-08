<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <section>
            <img src="img/Insider_Logotipo_160x_cf06bfd0-46a9-479d-8df7-684a2c52090f.webp" alt="">
        </section>
        <section>
            <div class="inf">
                <h3>Entrar no Insaider</h3>
                    <h3>
                        <?php if($_SESSION['error']): ?>
                            <?php foreach ($_SESSION['error'] as $erro): ?>
                                <p><?= $erro ?></p>
                            <?php endforeach ?>
                        <?php endif ?>
                    </h3>
                <form action="loginBack.php" method="post">
                    <input class="input" type="name" placeholder="nome" name="nome">
                    <input class="input" type="email" placeholder="email" name="email">
                    <input class="input" type="password" placeholder="senha" name="senha">
                    <input class="btn" type="submit" name="entrar">
                    <input class="btn criar-conta" type="submit" value="Criar nova conta">
                </form>
            </div>
        </section>
    </div>

</body>
</html>