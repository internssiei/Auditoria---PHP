<?php
use App\Entity\Auditoria;

$queryDisc = "select DISTINCT(disciplina) FROM itensauditoria WHERE disciplina != ''    ORDER BY disciplina ASC;";
$queryStat = "select DISTINCT(situacao) FROM itensauditoria WHERE situacao != '' AND situacao != 'TESTE' ORDER BY situacao ASC;";


$querydisciplina = mysqli_query($conexao, $queryDisc);
$queryStatus = mysqli_query($conexao, $queryStat);

$FiltroId = filter_input(INPUT_GET, 'projeto_id', FILTER_SANITIZE_STRING);
$DiscId = filter_input(INPUT_GET, 'disciplina', FILTER_SANITIZE_STRING);
$StatusId = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);

      //60000000
      //condições para busca dos projetos
      $condicoes=[
         strlen($FiltroId) ? 'projeto_id = '.$FiltroId : null,
         strlen($DiscId) ? 'disciplina LIKE "'.$DiscId.'"' : null,
         strlen($StatusId) ? 'situacao LIKE "'.$StatusId.'"' : null
      ];
      $condicoes = array_filter($condicoes);

      // WHERE
      $where =implode(' AND ', $condicoes);

      $auditorias = Auditoria::getAuditorias($where);

if(!isset($FiltroId)){

   header('Location: index.php');

}
