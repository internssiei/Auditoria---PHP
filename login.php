<?php
session_start();

include('conexao.php');

$email = mysqli_real_escape_string($conexao, $_POST['username']);
$senha = mysqli_real_escape_string($conexao, $_POST['password']);


$query = "SELECT * FROM login_PortalKempetro where email = '{$email}' and password = '{$senha}'";
//$query = "select * from NOVOSITE where usuario = 'dtime' and senha = md5('internssiei')";
$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
// print_r($row);
// exit;
if($userdata = mysqli_fetch_array($result)) {
    $_SESSION['user'] = $userdata;
    header("location: index.php"); 	 
   exit();
} else {
   $_SESSION['user'] = null;
   $_SESSION['mensagem'] = true;
   header('Location: signin.php');
   exit();
}
 header('Location: index.php');

?>
