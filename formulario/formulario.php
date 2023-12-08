<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="titulo">Formulario</div>

<h2>Cadastro</h2>

<?php
error_reporting(E_ERROR | E_PARSE);

if(count($_POST) > 0){

    $erros = [];

    if(!filter_input(INPUT_POST, 'nome')){
        $erros['nome'] =  "O nome é obrigatorio <br>";
    };

    if(filter_input(INPUT_POST, 'nascimento')){
        $data = DateTime::createFromFormat('d/m/Y', $_POST['nascimento']);

        if(!$data){
            $erros['data'] = 'Data deve estar no formato correto!';
        };
    };

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $erros['email'] = "Email inválido <br>";
    };

    $senhaConfig = [
        "options" => ['min_range' => 5, "max_range" => 10]
    ];

    if(!filter_var($_POST['senha'], FILTER_VALIDATE_INT, $senhaConfig)){
        $erros['senha'] = 'A senha deve ter de 5 a 10 caracteres';
    };

};

?>

<?php foreach($erros as $erro): ?>
    <div class="alert alert-danger">
        <?= $erro ?>
    </div>

<?php endforeach ?>


<form action="#" method="post">
    <div class="form-row">
        <div class="form-group col-md-9">
            <label for="nome">Nome</label>
            <input type="text" class="form-control  <?= $erros['nome'] ? 'is-invalid' : '' ?>" id="nome" name="nome" placeholder="Nome" value="<?= $_POST['nome'] ?>">
            <div class="invalid-feedback">
                <?= $erros['nome'] ?>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="nascimento">Nascimento</label>
            <input type="text" class="form-control" id="nascimento" name="nascimento" placeholder="Nascimento" value="<?= $_POST['nascimento'] ?>">
        </div>
        <div class="form-group col-md-7">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $_POST['email'] ?>">
        </div>
        <div class="form-group col-md-5">
            <label for="senha">Senha</label>
            <input type="number" class="form-control" id="senha" name="senha" placeholder="Senha" value="<?= $_POST['senha'] ?>">
        </div>
    </div>
    <button class="btn btn-primary btn-lg">Enviar</button>
    <button type="button" onclick="limpaCampo()" class="btn btn-danger btn-lg">Limpar caixa</button>
</form>

<script>

    function limpaCampo(){
        var inputs = document.getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = '';
        }
    }
</script>