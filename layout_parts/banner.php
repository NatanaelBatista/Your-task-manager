<?php 
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
/**
* Este metodo cadastra o primeiro usuario do sistema
*/
$usuario->cadastraOprimeiroUsuario();

  /**
  * Destroi o Cookie de "mensagens de erro e de sucesso" depois que a página é atualizada
  */
    setcookie("msgErro", "", time()-3600);
    setcookie("msgSucesso", "", time()-3600);
  
  /**
  * Destroi os kookies que são criado no momento de tentar cadastrar um usuario,
  * mas é barrado pela validação.
  */
    setcookie("retornaNome", "", time()-3600);
    setcookie("retornoLogin", "", time()-3600);
    setcookie("retornoPerfil", "", time()-3600);

   /**
   * Aplica uma class css no banner se a página corrente for a "index.php".
   */
    if (isset($bannerIndexPage))
    {
	    $idPaginaIndex = $bannerIndexPage;
    }
    else
    {
	    $idPaginaIndex = "";
    }

  /**
  * Saindo do sistema e destruindo a sessão juntamente com algumas variáveis de Cookie.
  */
    if (isset($_GET["sair"]))
    {
       session_destroy();
       header("Location:index.php");
    }
?>
<header class="banner" <?php echo $idPaginaIndex; ?>>
	<img src="html_img/logo.png" id="logo">

<?php if (isset($_SESSION["login"])): 
/**
* Verifica e apresenta o tipo do perfil do Usuario logado.
*/
  $tipoPerfil = "";
  if ($_SESSION["perfil"] == "1" and $_SESSION["perfil_master_master"] != "1")
  {
    $tipoPerfil = "Master";
  }
  elseif ($_SESSION["perfil"] == "1" and $_SESSION["perfil_master_master"] == "1")
  {
    $classPerfil = "master";
    $tipoPerfil = "Super Master";
  }
  else 
  {
    $tipoPerfil = "Funcionario";
  }
?>
	<section id="sobre-usuario">
		<?php echo "<b>Usuario</b>: " . $_SESSION["nome"]; ?> |
		<?php echo "<b>Perfil</b>: "  . $tipoPerfil; ?> | <a href="?sair" title="Sair do Sistema">Sair</a>
	</section>
<?php endif; ?>
<div class="hide"></div>
</header>