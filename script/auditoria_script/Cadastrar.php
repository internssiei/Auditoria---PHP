<?php
use \App\Entity\Auditoria;

function get_post_action($name)
{
    $params = func_get_args();

    foreach ($params as $name) {
        if (isset($_POST[$name])) {
            return $name;
        }
    }
}

switch (get_post_action('SalvarAudit')) {
    case 'SalvarAudit':
        
        
      if(isset($_POST['SalvarAudit'])){
            //CONSULTA AUDITORIA
                    //Validando post
                    
if(isset($_POST['EvidênciaId'], $_POST['LocalizacaoId'], $_POST['Descricao'], $_POST['DisciplinaSelect'],$_POST['SituacaoSelect'],
$_POST['Resposta'])){

$obAud = new Auditoria;
$obAud->evidencia = $_POST['EvidênciaId'];
$obAud->localizacao = $_POST['LocalizacaoId'];
$obAud->descricao = $_POST['Descricao'];
$obAud->disciplina = $_POST['DisciplinaSelect'];
$obAud->situacao = $_POST['SituacaoSelect'];
$obAud->resposta = $_POST['Resposta'];
$obAud->Projeto_Id = $_GET['projeto_id'];
$obAud->cadastrar();


unset($_POST['EvidênciaId']);
unset($_POST['LocalizacaoId']);
unset($_POST['Descricao']);
unset($_POST['DisciplinaSelect']);
unset($_POST['SituacaoSelect']);
unset($_POST['Resposta']);

header('location: RelatorioAuditoria.php?projeto_id='.$_GET['projeto_id']);

                    }

        
             }
        break;
  
   
      //  
  
 
}























