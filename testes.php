<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();

$id = "17";
$idTarefa = "14";

if (count($usuario->colecaoUsuarioTarefasWhere("vinculoUsuario",$id)) >= 1)
{
	
	$tarefas->setVinculoUsuario("26");
	if ($tarefas->editarApenasVinculoUsuario($idTarefa))
	{
		echo "Cadastrado";
	}
	else
	{
		echo "Erro ao cadastrar";
	}
}
else
{
	echo "no";
}