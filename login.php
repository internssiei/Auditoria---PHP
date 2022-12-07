<?php
session_start();
include('conexao.php');

$email = mysqli_real_escape_string($conexao, $_POST['username']);
$senha = mysqli_real_escape_string($conexao, $_POST['password']);
echo $email;

//
$query = "SELECT * FROM `usuarios` where email = '{$email}' and password = '{$senha}'";
$result = mysqli_query($conexao, $query);
  foreach($result as $row) {
     print_r(" -----------  ".$row['rge']." ");
      // do something with each row
  }



//  if($userdata = mysqli_fetch_array($result)) {
//      $_SESSION['user'] = $userdata;    
//  }else{
//     	$_SESSION['user'] = null;
//     $_SESSION['mensagem'] = "Usuário ou senha incorretos";
// }
// header('Location: local.php');

?>
