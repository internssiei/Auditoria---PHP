<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'auditoria');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
$con = new \PDO("mysql:host=".HOST.";dbname=".DB."",USUARIO,SENHA);
?>