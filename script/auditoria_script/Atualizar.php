<?php
//require __DIR__.'\vendor\autoload.php';
use \App\Entity\Auditoria;

switch (get_post_action('Atualizar')) {
  case 'Atualizar':
    if(isset($_POST['Atualizar'])){
          //CONSULTA PROJETO
          
            $obAuditoria = Auditoria::getAuditoria($_POST['UpAuditId']);

            if(!$obAuditoria instanceof Auditoria){
              header('location: RelatorioAuditoria.php?projeto_id='.$_GET['projeto_id']);
              exit;
            }
          //print_r($obAuditoria);
          //Validando POST
 
            $obAuditoria->evidencia = $_POST['UpEvidenciaId'];
            $obAuditoria->localizacao = $_POST['UpLocalizacaoId'];
            $obAuditoria->descricao = $_POST['UpDescricao'];
            $obAuditoria->disciplina = $_POST['UpDisciplinaSelect'];
            $obAuditoria->situacao = $_POST['UpSituacaoSelect'];
            $obAuditoria->resposta = $_POST['UpResposta'];
            $obAuditoria->Projeto_Id = $_GET['projeto_id'];
            $obAuditoria->atualizar();
          
            unset($_POST['EvidênciaId']);
            unset($_POST['LocalizacaoId']);
            unset($_POST['Descricao']);
            unset($_POST['DisciplinaSelect']);
            unset($_POST['SituacaoSelect']);
            unset($_POST['Resposta']);

            header('location: RelatorioAuditoria.php?projeto_id='.$_GET['projeto_id']);
            exit;
          
  
        }
  
      break;

  default:
    //  

}


