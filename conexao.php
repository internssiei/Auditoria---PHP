<?php
/**
 * 
 * CLASSE PARA INSTANCIAR CONEXÃO COM O BANCO
 * Utilizando do composer para carregar os arquivos e dependências 
 * Setando uma variável para sinalizar o diretório que será repassado na app.php
 * BELEZA BELEZA
 */
require __DIR__.'/vendor/autoload.php';

CONST DIRETORIO = __DIR__;

include __DIR__.'/app/app.php';

$host = getenv('HOST');
$usuario = getenv('USUARIO');
$senha= (getenv('SENHA'));
$db = getenv('DB');


$conexao = mysqli_connect($host, $usuario, $senha, $db) or die ('Não foi possível conectar: '. mysqli_connect_error());



