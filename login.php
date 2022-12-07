<?php

session_start();
include('conexao.php');
phpinfo();
$email = mysqli_real_escape_string($conexao, $_POST['username']);
$senha = mysqli_real_escape_string($conexao, $_POST['password']);


//
$query = "SELECT * FROM `usuarios` where email = '{$email}' and password = '{$senha}'";
$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

//   if($row == 1) {
//       $_SESSION['user'] = $userdata = mysqli_fetch_array($result);
//        header("location: Login"); 		     
//       exit();
//   } else {
//       $_SESSION['user'] = null;
//       $_SESSION['nao_autenticado'] = true;
//       header('Location: signin.php');
//       exit();
//   }


  if($userdata = mysqli_fetch_array($result)) {
    $_SESSION['user'] = $userdata = mysqli_fetch_array($result);
    header("location: index.php"); 		     
   exit();
} else {
   $_SESSION['user'] = null;
   $_SESSION['mensagem'] = "Usuário ou senha incorretos";
   header('Location: signin.php');
   exit();
}
 header('Location: index.php');

?>
