<?php
//require __DIR__.'\vendor\autoload.php';
use \App\Entity\Projeto;

function get_post_action($name)
{
    $params = func_get_args();

    foreach ($params as $name) {
        if (isset($_POST[$name])) {
            return $name;
        }
    }
}


switch (get_post_action('Atualizar')) {
  case 'Atualizar':
    if(isset($_POST['Atualizar'])){
          //CONSULTA PROJETO

            $obProjeto = Projeto::getProjeto($_POST['UpIDId']);
            if(!$obProjeto instanceof Projeto){
              
          
              header('location: index.php?status=error');
              exit;
            }
          
          //Validando POST
          if(isset($_POST['UpProjetoId'], $_POST['UpAreaId'], $_POST['UpOperacaoSelect'], $_POST['UpTituloProjeto'], $_POST['UpPlataformaSelect'], 
          $_POST['UpClienteSelect'], $_POST['UpLocalSelect'], $_POST['UpStatusSelect'] )){
          
            $obProj = new Projeto;
            $obProj->id = $_POST['UpIDId'];
            $obProj->projeto = $_POST['UpProjetoId'];
            $obProj->area = $_POST['UpAreaId'];
            $obProj->operacao = $_POST['UpOperacaoSelect'];
            $obProj->titulo = $_POST['UpTituloProjeto'];
            $obProj->plataforma = $_POST['UpPlataformaSelect'];
            $obProj->clienteUn = $_POST['UpClienteSelect'];
            $obProj->local = $_POST['UpLocalSelect'];
            $obProj->situacao = $_POST['UpStatusSelect'];
            $obProj->atualizar();
          
            unset($_POST['UpIDId']);
            unset($_POST['UpProjetoId']);
            unset($_POST['UpAreaId']);
            unset($_POST['UpOperacaoSelect']);
            unset($_POST['imgUpTituloProjetoLink']);
            unset($_POST['UpPlataformaSelect']);
            unset($_POST['UpClienteSelect']);
            unset($_POST['UpLocalSelect']);
            unset($_POST['UpStatusSelect']);

            header('location: index.php?Status=Sucess');
          }
  
        }
  
      break;

  default:
    //  

}


