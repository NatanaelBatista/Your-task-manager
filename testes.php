<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$loginModel = Container::getLoginModel();

echo $loginModel->retornaDadosLogin("admin@admin.com","admin")[0];
