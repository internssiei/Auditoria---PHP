<?php
session_start();
include('conexao.php');

if(empty($_POST['username']) || empty($_POST['password'])) {
    $_SESSION['mensagem'] = "Usuário não identificado";
	header('Location: index.php');
	exit();
	
}

$usuario = mysqli_real_escape_string($conexao, $_POST['username']);
$senha = mysqli_real_escape_string($conexao, $_POST['password']);

$query = "select nome, username, id from PTK_USUARIOS where username = '{$usuario}' and password = md5('{$senha}') ";
$result = mysqli_query($conexao, $query);




if($userdata = mysqli_fetch_array($result)) {
    $_SESSION['user'] = $userdata;    
}else{
   	$_SESSION['user'] = null;
    $_SESSION['mensagem'] = "Usuário ou senha incorretos";
}
header('Location: local.php');

?>
