<?php
//CLASSE PARA FINALIZAR SESSÃO DO USUÁRIO
session_start();
session_destroy();

header('location: signin.php');














