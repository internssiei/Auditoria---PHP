<?php
require __DIR__.'\vendor\autoload.php';

use \App\Common\Enviroment;

Enviroment::load(__DIR__);
   //print_r($env);
define('HOST', getenv('HOST'));
define('USUARIO', getenv('USUARIO'));
define('SENHA', getenv('SENHA'));
define('DB', getenv('DB'));


$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
$con = new \PDO("mysql:host=".HOST.";dbname=".DB."",USUARIO,SENHA);
?>

