<?php 
/**
* Não permite que usuários não logados acessem o sistema.
*/
require_once("models/UsuarioModel.class.php");
$loginModel = Container::getLoginModel();
$loginModel->protegeSession($_SESSION["login"],"index.php");