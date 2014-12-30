<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$idUsuariosOnline = Container::getIdUsuariosOnline();

foreach($usuario->colecaoUsuarioTarefas() as $listar)
{
    foreach($idUsuariosOnline->selectIdUsuariosOnline() as $list)
    {

    	if ($listar->idUsuario == $list->idUsuarioOnline)
    	{
    		echo "sdsd";
    	}
    }
}


