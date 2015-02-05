<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$loginModel = Container::getLoginModel();
require_once("utilidades/TarefasRelatorios.class.php");
$TarefasRelatorios = Container::getTarefasRelatorios();
$arquivos = Container::getArquivos();
$usuariosRelatorios = Container::getUsuariosRelatorios();

// Retirando mascaras de campos
/*
$input = str_replace(".", "", $_POST["input"]);
$input = str_replace("-","",$input);
echo $input;
*/

echo $usuariosRelatorios->usuariosCadastrados();

?>