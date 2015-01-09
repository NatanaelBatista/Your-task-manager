<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$loginModel = Container::getLoginModel();



    $email = "admin@admin.com";
    if ($usuario->verificaEmail($email) == true)
    {
        foreach($usuario->listarWhere("login", $email) as $listar)
        {
            $_senha = $listar->senha;
        }
        
        echo "true";
        echo $_senha;
    }
    else
    {
        echo "false";
    }