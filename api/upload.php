<div class="title">Upload</div>

<?php
print_r($_FILES);

session_start();

$arquivos = $_SESSION['arquivos'] ?? [];

if($_FILES && $_FILES['arquivo']){
    $pastaUpload = __DIR__ . '/arquivos/';
    $nomeArquivo = $_FILES['arquivo'] ['name'];
    $arquivo = $pastaUpload . $nomeArquivo;
    $tmp = $_FILES['arquivo'] ['tmp_name'];
    $fileType = mime_content_type($tmp);
    
    if(move_uploaded_file($tmp, $arquivo) && $fileType == 'image/png'){
        echo "Enviado com sucesso";
        $arquivos[] = $nomeArquivo;
        $_SESSION['arquivos'] =  $arquivos;
    } else{
        echo "Algo deu errado";
    }
};

?>

<form action="#" method="post" enctype="multipart/form-data">
    <input name="arquivo" type="file">
    <button>Enviar</button>
</form>

<ul>
    <?php foreach($arquivos as $arquivo): ?>
        <li>
            <img src="api/arquivos/<?= $arquivo?>" alt="">
        </li>
    <?php endforeach ?>
</ul>

<style>
    input,button{
        font-size: 1.2rem;
    }
</style>
