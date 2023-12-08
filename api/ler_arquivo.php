<div class="titulo">Ler Arquivo</div>

<?php 
$arquivo = fopen('teste.txt', 'r');
echo fread($arquivo, filesize('teste.txt'));
fclose($arquivo);

echo '<br>';

$arquivoCSV = fopen('planilha.csv', 'w');
fwrite($arquivoCSV, 'alexandre, 234, fernanda, 8894, edinaldo, 5789');
fclose($arquivoCSV);

$arquivoCSV = fopen('planilha.csv', 'r');
while(!feof($arquivoCSV)){
    echo fgetc($arquivoCSV), '<br>';
}