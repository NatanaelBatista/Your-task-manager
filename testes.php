<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$loginModel = Container::getLoginModel();
require_once("utilidades/TarefasRelatorios.class.php");
$TarefasRelatorios = Container::getTarefasRelatorios();

// Retirando mascaras de campos
$input = str_replace(".", "", $_POST["input"]);
$input = str_replace("-","",$input);
echo $input;



?>

<form method="post" action="testes.php">
<input type="text" name="input" value="052.115.185-28">
<br>
<button type="submit">Mandar</button>
</form>

    