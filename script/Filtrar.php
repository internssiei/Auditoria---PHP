<?php
use App\Entity\Projeto;

$buscar = filter_input(INPUT_GET, 'buscar', FILTER_UNSAFE_RAW);

//condições para busca dos projetos
$condicoes=[
   strlen($buscar) ? 'projeto LIKE "%'.str_replace(' ','%',$buscar).'%"':null
];
// WHERE
$where =implode(' AND ', $condicoes);
$projetos = Projeto::getProjetos($where);