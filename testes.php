<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();

$pagina = 0;
if (isset($_GET["controlePageProximo"]))
{
	$pagina = $pagina + 1;
}

if (isset($_GET["controlePageAnterior"]))
{
	$pagina - 1;
}

$quantidade = count($usuario->colecaoUsuarioTarefas());
echo $quantidade;


?>

<a href="?controlePageAnterior">Anterior</a>
<a href="?controlePageProximo">Promixo</a>

