<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="titulo">Alterar</div>

<h2>Cadastro</h2>

<?php

require_once "conexao.php";
$conexao = novaConexao();

if($_GET['codigo']){
    $sql = "SELECT * FROM cadastro WHERE id= ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $_GET['codigo']);

    if($stmt->execute()){
        $resultado = $stmt->get_result();
        if($resultado->num_rows > 0) {
            $dados = $resultado->fetch_assoc();
            if($dados['nascimento']){
                $td = new DateTime(($dados['nascimento']));
                $dados['nascimento'] = $td->format('d/m/Y');
            }
        }
    }
}


if(count($_POST) > 0){
    $dados = $_POST;
    $erros = [];

//    if(!filter_input(INPUT_POST, 'nome')){
    if(empty($dados['nome'])){
        $erros['nome'] =  "O nome é obrigatorio <br>";
    };

    if(isset($dados['nascimento'])){
        $data = DateTime::createFromFormat('d/m/Y', $dados['nascimento']);

        if(!$data){
            $erros['data'] = 'Data deve estar no formato correto!';
        };
    };

    if(!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)){
        $erros['email'] = "Email inválido <br>";
    };

    $filhosConfig = [
        "options" => ['min_range' => 5]
    ];

    if(!filter_var($dados['filhos'], FILTER_VALIDATE_INT, $filhosConfig)){
        $erros['filhos'] = 'Você deve ter pelo menos 5 filhos';
    };

    if(!count($erros)) {

          $sql = "UPDATE cadastro
          SET nome = ?, nascimento = ?, email = ?, site = ?, filhos = ?
          WHERE id = ?";

          $stmt = $conexao->prepare($sql);

          $params = [
            $dados['nome'],
            $data ? $data->format('Y-m-d') : null,
            $dados['email'],
            $dados['site'],
            $dados['filhos'],
            $dados['id'],
          ];

          $stmt->bind_param("ssssii", ...$params);

          if($stmt->execute()){
            $dados = [
                'nome' => '',
                'nascimento' => '',
                'email' => '',
                'site' => '',
                'filhos' => '',
                'id' => ''
            ];
          }

    };

};

?>

<form action="/exercicio.php" method="get">
    <input type="hidden" name="dir" value="db">
    <input type="hidden" name="file" value="alterar">
    <div class="col-sm-10">
        <input type="text" name="codigo" class="form-control" placeholder="Informe o codigo para consulta">
    </div>
    <div class="col-sm-2">
         <button class="btn btn-success mb-4">Consultar</button>
    </div>
</form>

<form action="#" method="post">
    <input type="hidden" name="id" value="<?= $dados['id'] ?>">
    <div class="form-row">

        <div class="form-group col-md-9">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= $dados['nome'] ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="nascimento">Nascimento</label>
            <input type="text" class="form-control" id="nascimento" name="nascimento" placeholder="Nascimento" value="<?= $dados['nascimento'] ?>">
        </div>

        <div class="form-group col-md-7">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $dados['email'] ?>">
        </div>

        <div class="form-group col-md-7">
            <label for="site">Site</label>
            <input type="text" class="form-control" id="site" name="site" placeholder="Site" value="<?= $dados['site'] ?>">
        </div>

        <div class="form-group col-md-5">
            <label for="filhos">Filhos</label>
            <input type="number" class="form-control" id="filhos" name="filhos" placeholder="Filhos" value="<?= $dados['filhos'] ?>">
        </div>

    </div>
    <button class="btn btn-primary btn-lg">Enviar</button>
    <button type="button" onclick="limpaCampo()" class="btn btn-danger btn-lg">Limpar caixa</button>
</form>

<script>
    function limpaCampo() {
    var inputs = document.getElementsByTagName('input');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
    }
}
</script>