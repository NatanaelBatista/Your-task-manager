<?php 
  require_once("loaderClasses.php");
  require_once("utilidades/functions.php");

  /**
  * Este metodo cadastra o primeiro usuario do sistema
  */
  $usuario->cadastraOprimeiroUsuario();
  deletaCookie();

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
  * Saindo do sistema e destruindo a sessão.
  */
  if (isset($_GET["sair"]))
  {
	   $loginModel->logOut("index.php");
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
		<?php echo "<b>Perfil</b>: "  . $tipoPerfil; ?> | <a id="logOut" href="?sair" title="Sair do Sistema">Sair</a>
	</section>
<?php endif; ?>
<div class="hide"></div>
</header>