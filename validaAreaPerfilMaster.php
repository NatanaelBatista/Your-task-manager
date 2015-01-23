<?php 
/**
* Não permite que usuários com perfil "usuario" acessem as áreas registradas para perfil "Master".
*/
require_once("models/UsuarioModel.class.php");
$loginModel = Container::getLoginModel();
$loginModel->protegeAreaAdminPerfilMaster($_SESSION["perfil_master_master"],"dashboard.php?pagina=0");