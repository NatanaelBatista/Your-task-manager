<?php 
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$sendEmail = Container::getSendMail();
$email = "gilmario@gmail.com";

foreach($usuario->listarWhere("login", $email) as $listar)
{
    $_senha = $listar->senha;
}

        $sendEmail->setRemetente($email);
        $sendEmail->setDestino($email);
        $sendEmail->setAssunto("Recuperação das suas credenciais de acesso do gerenciador de tarefas");
        $sendEmail->setMensagem("Sua senha de acesso é: {$_senha}");
        $sendEmail->sendThisEmail();