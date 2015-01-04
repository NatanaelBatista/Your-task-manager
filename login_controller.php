<?php
/**
* Controller que valida à entrada do usuário no sistema
*/
require_once("loaderClasses.php");
$loginModel = Container::getLoginModel();

if (isset($_GET["login"]))
{
	$login = strip_tags(trim($_POST["login"]));
	$senha = strip_tags(trim($_POST["senha"]));

	if (empty($login) or empty($senha))
	{
		setcookie("msgErro","Login e Senha são obrigatórios.");
		header("Location:index.php");
	}
	elseif (!filter_var($login, FILTER_VALIDATE_EMAIL))
	{
		setcookie("msgErro","Este Email não é valido");
		header("Location:index.php");
	}
	/**
	* Se returnar true o usuário tem um cadastro valido no sistema.
	*/
	elseif ($loginModel->verificaLogin($login,$senha) == true)
	{
		foreach($loginModel->retornaDadosLogin($login,$senha) as $listar)
		{
			$idUsuario     = $listar->id;
			$retornoNome   = $listar->nome;
			$retornoPerfil = $listar->perfil;
			$retoroPerfilMasterMaster = $listar->perfil_master_master;
		}
        
        /**
        * Carrega na Session os dados do Usuário que acabou de logar-se no sistema.
        */
        session_start();
        $_SESSION["nome"] = $retornoNome;
		$_SESSION["login"] = $login;
		$_SESSION["senha"] = $sennha;
		$_SESSION["idUsuario"] = $idUsuario;
		$_SESSION["perfil"] = $retornoPerfil;
		$_SESSION["perfil_master_master"] = $retoroPerfilMasterMaster;
		$_SESSION["logado"] = true;
		header("Location:dashboard.php");
	}
	else
	{
		setcookie("msgErro","Usuario não encontrado. Verifique login e senha");
		header("Location:index.php");
	}
}