<?php
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$idUsuariosOnline = Container::getIdUsuariosOnline();

if (isset($_GET["login"]))
{
	$login = trim($_POST["login"]);
	$senha = trim($_POST["senha"]);

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
	elseif ($usuario->verificaLogin($login,$senha) == true)
	{
		foreach($usuario->retornaDadosLogin($login,$senha) as $listar)
		{
			$idUsuario     = $listar->id;
			$retornoNome   = $listar->nome;
			$retornoPerfil = $listar->perfil;
			$retoroPerfilMasterMaster = $listar->perfil_master_master;
		}
       
        /**
        * Cadastra o id dos usuários logados no sistema
        */
		$idUsuariosOnline->setIdUsuarioOnline($idUsuario);
		$idUsuariosOnline->cadastrarIdUsuariosOnline();

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