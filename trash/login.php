<?php

session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
	
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from NOVOSITE where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {

	while($percorrer = mysqli_fetch_array($result)){
		$grupo = $percorrer['grupo'];
		$user = $percorrer['usuario'];
		$cargo = $percorrer['cargo'];

			if ($grupo == 'KPE71G001'){	
				$_SESSION['usuario'] = $usuario;
				header('Location: KPE71G001');
						$sql_2 = "UPDATE NOVOSITE
							SET pview = pview + 1 where usuario = '{$usuario}'";
							
						mysqli_query($conexao, $sql_2);
				exit();
			}

			if ($grupo == 'KPE71G002'){	
				$_SESSION['usuario'] = $usuario;
				header('Location: KPE71G002');
						$sql_2 = "UPDATE NOVOSITE
							SET pview = pview + 1 where usuario = '{$usuario}'";
							
						mysqli_query($conexao, $sql_2);
				exit();
			}	
			if ($grupo == 'KPE71G003'){	
				$_SESSION['usuario'] = $usuario;
				header('Location: KPE71G003');
						$sql_2 = "UPDATE NOVOSITE
							SET pview = pview + 1 where usuario = '{$usuario}'";
							
						mysqli_query($conexao, $sql_2);
				exit();
			}
			if ($grupo == 'KPE71G004'){	
				$_SESSION['usuario'] = $usuario;
				header('Location:\KPE\KPE71G001\kpe\capitalhumano');
						$sql_2 = "UPDATE NOVOSITE
							SET pview = pview + 1 where usuario = '{$usuario}'";
							
						mysqli_query($conexao, $sql_2);
				exit();
			}
			if ($grupo == 'KPE71G005'){	
				$_SESSION['usuario'] = $usuario;
				header('Location: KPE71G005');
						$sql_2 = "UPDATE NOVOSITE
							SET pview = pview + 1 where usuario = '{$usuario}'";
							
						mysqli_query($conexao, $sql_2);
				exit();
			}

			if ($grupo == 'BRK11G001' && $cargo=='GERENCIAL'){	
				$_SESSION['usuario'] = $usuario;
				header('Location: BRK11G001');
						$sql_2 = "UPDATE NOVOSITE
							SET pview = pview + 1 where usuario = '{$usuario}'";
							
						mysqli_query($conexao, $sql_2);
				
			}

			if ($grupo == 'BRK51G001' && $cargo=='GERENCIAL'){	
				$_SESSION['usuario'] = $usuario;
				header('Location: BRK51G001');
						$sql_2 = "UPDATE NOVOSITE
							SET pview = pview + 1 where usuario = '{$usuario}'";
							
						mysqli_query($conexao, $sql_2);
				
			}
			

			if ($grupo == 'BRK82G001' && $cargo=='GERENCIAL'){	
				$_SESSION['usuario'] = $usuario;
				header('Location: BRK82G001');
						$sql_2 = "UPDATE NOVOSITE
							SET pview = pview + 1 where usuario = '{$usuario}'";
							
						mysqli_query($conexao, $sql_2);
			}
			

			if ($grupo == 'DOW71G001'){	
				$_SESSION['usuario'] = $usuario;
				header('Location: DOW71G001');
						$sql_2 = "UPDATE NOVOSITE
							SET pview = pview + 1 where usuario = '{$usuario}'";
							
						mysqli_query($conexao, $sql_2);
				exit();
			}

			if ($grupo == 'BAS71G001'){	
				$_SESSION['usuario'] = $usuario;
				header('Location: BAS71G001');
						$sql_2 = "UPDATE NOVOSITE
							SET pview = pview + 1 where usuario = '{$usuario}'";
							
						mysqli_query($conexao, $sql_2);
				exit();
			}

			if ($grupo == 'BRK82G003'){	
				$_SESSION['usuario'] = $usuario;
				header('Location: BRK82G003');
						$sql_2 = "UPDATE NOVOSITE
							SET pview = pview + 1 where usuario = '{$usuario}'";
							
						mysqli_query($conexao, $sql_2);
				exit();
			}

			
	}
}else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
?>