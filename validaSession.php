<?php 
/**
* Não permite que usuários não logados acessem o sistema
*/
@session_start();
if (!isset($_SESSION["login"]))
{
	header("Location:index.php");
}