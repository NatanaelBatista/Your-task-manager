<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$idUsuariosOnline = Container::getIdUsuariosOnline();

/*
$valorPesquisa = 1;
foreach($usuario->pesquisarColecaoUsuarioTarefas("titulo", $valorPesquisa) as $listar):
/**
* Apresenta determinadas legendas de acordo com a situação da tarefa
*/
/*
$iconiSituacaoTarefa = "";
if ($listar->situacao == "1")
{
	$iconiSituacaoTarefa = "Pendente.";
}
elseif ($listar->situacao == "2")
{
	$iconiSituacaoTarefa = "Sendo Feita";
}
elseif ($listar->situacao == "3")
{
	$iconiSituacaoTarefa = "Feita";
}

echo $iconiSituacaoTarefa;

endforeach;
*/