<?php
define('HOST', 'localhost');
define('USUARIO', 'kempe714_tecno');
define('SENHA', '1rdU%LQyG{Xs');
define('DB', 'kempe714_tecnologia');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
