<?php
//require __DIR__.'\vendor\autoload.php';
use \App\Entity\Auditoria;

switch (get_post_action('Excluir')) {
  case 'Excluir':
          if(isset($_POST['Excluir'])){
            //CONSULTA PROJETO
             
            $obAuditoria = Auditoria::getAuditoria($_POST['ConfirmIDId']);
            $obAuditoria->excluir();
           
              if(!$obDeleteProjeto instanceof Auditoria){
            
                header('location: RelatorioAuditoria.php?projeto_id='.$_GET['projeto_id']);
                exit;
              }
              
              header('location: RelatorioAuditoria.php?projeto_id='.$_GET['projeto_id']);
              }
          
      break;
  default:
      //no action sent
}



