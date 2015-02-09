<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
/*
$tarefas = Container::getTarefas();
$loginModel = Container::getLoginModel();
require_once("utilidades/TarefasRelatorios.class.php");
$TarefasRelatorios = Container::getTarefasRelatorios();
$arquivos = Container::getArquivos();
$usuariosRelatorios = Container::getUsuariosRelatorios();
*/
// Retirando mascaras de campos
/*
$input = str_replace(".", "", $_POST["input"]);
$input = str_replace("-","",$input);
echo $input;
*/
/*
$parametro = 45;
function checar($chave = 0)
{
	if ($chave > 0)
	{
		return "Yes";
	}
	else
	{
		return "Howww";
	}
}
*/
$usuarios = array();
foreach($usuario->listar() as $listar)
{
	$nome = $listar->nome;
	$login = $listar->login;
	$senha = $listar->senha;
	$usuarios[] = $listar;
}

echo $json = json_encode($usuarios);
?>