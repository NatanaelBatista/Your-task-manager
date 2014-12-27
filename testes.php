<?php 
session_start();
require_once("loaderClasses.php");
require_once("utilidades/pagination.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();

$result = "";
$vetor = array();

foreach($tarefas->listar() as $listar)
{
	$result = $listar->titulo;
	$result .= $listar->vinculoUsuario;
	$vetor[] = $result;
}

paginacao($vetor,1);