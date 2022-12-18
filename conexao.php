<?php
/**
 * 
 * CLASSE PARA INSTANCIAR CONEXÃO COM O BANCO
 * Utilizando do composer para carregar os arquivos e dependências 
 * Setando uma variável para sinalizar o diretório que será repassado na app.php
 * 
 */
require __DIR__.'\vendor\autoload.php';

CONST DIRETORIO = __DIR__;

include __DIR__.'\app\app.php';


$conexao = mysqli_connect(getenv('HOST'), getenv('USUARIO'), getenv('SENHA'), getenv('DB')) or die ('Não foi possível conectar');
//$con = new \PDO("mysql:host=".getenv('HOST').";dbname=".getenv('DB')."",getenv('USUARIO'),getenv('SENHA'));
?>

