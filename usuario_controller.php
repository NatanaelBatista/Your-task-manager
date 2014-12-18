<?php 
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$sendEmail = Container::getSendMail();

/**
* Cadastrar um Usuario...
*/
if (isset($_GET["cadastrar"]))
{
	$nome   = strip_tags(trim($_POST["nome"]));
	$login  = strip_tags(trim($_POST["login"]));
	$senha  = strip_tags(trim($_POST["senha"]));
    $repitaSenha = strip_tags(trim($_POST["repitaSenha"]));
	$perfil = strip_tags(trim($_POST["perfil"]));
    
    if (empty($nome) or empty($login) or empty($senha))
    {
    	setcookie("msgErro","Todos os dados são obrigatórios.");
		header("Location:cadastrar_usuarios.php");
    }
    elseif (!filter_var($login, FILTER_VALIDATE_EMAIL))
    {
    	setcookie("msgErro","Digite um Email valido.");
		header("Location:cadastrar_usuarios.php");
    }
    elseif($usuario->verificaEmail($login) == true)
    {
        setcookie("msgErro","Já existe um usuario com este Email.");
        header("Location:cadastrar_usuarios.php");
    }
    elseif ($repitaSenha != $senha)
    {
        setcookie("msgErro","Você tentou alterar sua Senha, mas elas não coincidem. Verifique os campos “senha e repita sua senha”.");
        header("Location:cadastrar_usuarios.php");
    }
    else 
    {
    	$usuario->setNome($nome);
    	$usuario->setLogin($login);
    	$usuario->setSenha($senha);
        $usuario->setDataCadastro(Date("d/m/Y"));
    	$usuario->setPerfil($perfil);
    	if ($usuario->cadastrarUsuario())
    	{
            setcookie("msgSucesso","Usuario Cadastrado com Sucesso.");
    		header("Location:cadastrar_usuarios.php");
    	}
    }
	
}

/**
* Deletar um Usuario...
*/
if (isset($_GET["deletar"]))
{
    $id = (int) $_GET["id"];
    /**
    * Verifica se está tentando Deletar um Usuario com o perfil Super Master
    */
    foreach($usuario->listarWhere("id", $id) as $listar)
    {
        $retonaPerfilMasterMaster = $listar->perfil_master_master;
    }

    if ($retonaPerfilMasterMaster == "1" and $_SESSION["perfil_master_master"] != "1")
    {
        setcookie("msgErro","Você não pode Deletar um usuario com perfil ( Super Master ).");
        header("Location:cadastrar_usuarios.php");
    }
    else 
    {
        if ($usuario->deletar($id))
        {
            setcookie("msgSucesso","Usuario deletado com Sucesso.");
            header("Location:cadastrar_usuarios.php");
        }
    }
}

/**
* Editar Usuario
*/
if (isset($_GET["editar"]))
{
    /**
    * Função verifica determinada variável vinda via "get" da página de "alterer meus dados"
    * Se encontrar retorna para essa mesma página, se não, retorna para a página "cadastrar usuario"
    */
    function verificaPaginaAcao($variavelPage)
    {
        if (isset($variavelPage))
        {
            header("Location:alterar_meus_dados.php?alterarMeusDados");
        }
        else
        {
            header("Location:cadastrar_usuarios.php?editar&id={$_GET["id"]}");
        }
    }

    $id = (int) $_GET["id"];
    $nome   = strip_tags(trim($_POST["nome"]));
    $login  = strip_tags(trim($_POST["login"]));
    $senha  = strip_tags(trim($_POST["senha"]));
    $repitaSenha = strip_tags(trim($_POST["repitaSenha"]));
    $perfil = strip_tags(trim($_POST["perfil"]));
    
    if (empty($nome) or empty($login) or empty($senha))
    {
        setcookie("msgErro","Todos os dados são obrigatórios.");
        header("Location:editar_usuarios.php");
    }
    elseif (!filter_var($login, FILTER_VALIDATE_EMAIL))
    {
        setcookie("msgErro","Digite um Email valido.");
        header("Location:cadastrar_usuarios.php");
    }
    elseif ($repitaSenha != $senha)
    {
        setcookie("msgErro","Você tentou alterar sua Senha, mas elas não coincidem. Verifique os campos “senha e repita sua senha”.");
        verificaPaginaAcao($_GET["alterarUsuarioCorrente"]);
    }
    else 
    {
        /**
        * Verifica se está tentando Editar um Usuario com o perfil Super Master
        */
        foreach($usuario->listarWhere("id", $id) as $listar)
        {
            $retonaPerfilMasterMaster->$listar->perfil_master_master;
        }

        if ($retonaPerfilMasterMaster == "1" and $_SESSION["perfil_master_master"] != "1")
        {
            setcookie("msgErro","Você não pode Editar um usuario com perfil ( Super Master ).");
            header("Location:cadastrar_usuarios.php");
        }
        else 
        {

        /**
        * Se o email editado retornar "false" no momento da verificação, então o usuário está tentando edita-lo.
        * Sendo assim edito logo o email para depois recupera-lo e prosseguir com o fluxo.
        */
        if ($usuario->verificaEmail($login) != true)
        {
            $usuario->setLogin($login);
            $usuario->editar($id);
        }

        if ($usuario->verificaEmail($login) == true)
        {
            foreach($usuario->listarWhere("login", $login) as $listar)
            {
                $_id = $listar->id;
            }

            if ($id != $_id)
            {
                setcookie("msgErro","Já existe um outro Usuario com este Email.");
                verificaPaginaAcao($_GET["alterarUsuarioCorrente"]);
            }
            else
            {
                $usuario->setNome($nome);
                $usuario->setLogin($login);
                $usuario->setSenha($senha);
                $usuario->setPerfil($perfil);

                if ($usuario->editar($id))
                {
                    foreach($usuario->listarWhere("login", $login) as $listar)
                    {
                        $_id = $listar->id;
                    }
                    
                    session_start();
                    if ($_SESSION["idUsuario"] == $_id)
                    {
                       /**
                       * Seta os novos valores para a Session
                       */
                        $_SESSION["nome"] = $nome;
                        $_SESSION["perfil"] = $perfil;
                        $_SESSION["login"] = $login;
                    }
                    
                    setcookie("msgSucesso","Dados Editados com Sucesso.");
                    verificaPaginaAcao($_GET["alterarUsuarioCorrente"]);
                }
            }
        }
    }
  }
}

/**
* Recebe um email via "ajax" e verifica se o mesmo está cadastrado no sistema
*/
if (isset($_POST["recuperarSenha"]))
{
    $email = $_POST["recuperarSenha"];
    if ($usuario->verificaEmail($email) == true)
    {
        foreach($usuario->listarWhere("login", $email) as $listar)
        {
            $_senha = $listar->senha;
        }
        
        $sendEmail->setRemetente($email);
        $sendEmail->setDestino($email);
        $sendEmail->setAssunto("Recuperação das suas credenciais de acesso do gerenciador de tarefas");
        $sendEmail->setMensagem("Sua senha de acesso é: {$_senha}");
        $sendEmail->sendThisEmail();
        echo "true";
    }
    else
    {
        echo "false";
    }
}