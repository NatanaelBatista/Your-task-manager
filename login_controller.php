<?php
/**
* Controller do Model-LoginModel
* @author Valdiney França
*/
require_once("loaderClasses.php");

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
	elseif ($loginModel->verificaLogin($login,$senha))
	{
		foreach($loginModel->retornaDadosLogin($login,$senha) as $listar)
		{
			$idUsuario     = $listar->id;
			$retornoNome   = $listar->nome;
			$retornoPerfil = $listar->perfil;
			$retornoPerfilMasterMaster = $listar->perfil_master_master;
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
		$_SESSION["perfil_master_master"] = $retornoPerfilMasterMaster;
		$_SESSION["logado"] = true;
		header("Location:dashboard.php?pagina=0");
	}
	else
	{
		setcookie("msgErro","Usuario não encontrado. Verifique login e senha");
		header("Location:index.php");
	}
}
/* End of file login_controller.php */
/* Location: raiz */