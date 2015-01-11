<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$loginModel = Container::getLoginModel();

$cores = array(
    array("cor" => "verde"),
    array("cor" => "vermelho"),
    array("cor" => "amarelo")
    );

   usort($cores, function($a, $b)
   {
    return strcmp($a["cor"], $b["cor"]);
   });


    