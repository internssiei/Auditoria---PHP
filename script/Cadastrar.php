<?php
//require __DIR__.'\vendor\autoload.php';
use \App\Entity\Projeto;

//Validando post
 if(isset($_POST['ProjetoId'], $_POST['AreaId'], $_POST['OperacaoSelect'], $_POST['TituloProjeto'], $_POST['PlataformaSelect'], 
 $_POST['ClienteSelect'], $_POST['LocalSelect'], $_POST['StatusSelect'] )){

   $obProj = new Projeto;
   $obProj->projeto = $_POST['ProjetoId'];
   $obProj->area = $_POST['AreaId'];
   $obProj->operacao = $_POST['OperacaoSelect'];
   $obProj->titulo = $_POST['TituloProjeto'];
   $obProj->plataforma = $_POST['PlataformaSelect'];
   $obProj->clienteUn = $_POST['ClienteSelect'];
   $obProj->local = $_POST['LocalSelect'];
   $obProj->situacao = $_POST['StatusSelect'];
   $obProj->cadastrar();
   header('location: index.php?Status=Sucess');
   exit;
}