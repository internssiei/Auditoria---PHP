<?php
//require __DIR__.'\vendor\autoload.php';
use \App\Entity\Projeto;

switch (get_post_action('Excluir')) {
  case 'Excluir':
          if(isset($_POST['Excluir'])){
            //CONSULTA PROJETO
             
              $obDeleteProjeto = Projeto::getProjeto($_POST['ConfirmIDId']);
              
              $obDeleteProjeto->excluir();
           
              if(!$obDeleteProjeto instanceof Projeto){
            
                header('location: index.php?status=error');
                exit;
              }
              
              header('location: index.php?status=success');
              }
          
      break;
  default:
      //no action sent
}





