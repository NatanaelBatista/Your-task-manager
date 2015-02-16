<?php 
session_start();
require_once("loaderClasses.php");
require_once("layout_parts/header.php");
require_once("layout_parts/banner.php");
require_once("validaSession.php");
?>
	<article class="main">
	<section class="right">

	<?php if (isset($_COOKIE["msgSucesso"])): ?>
        <section class="fotter-index msgErro msgSucesso">
            <?php echo $_COOKIE["msgSucesso"]; ?>
        </section>
    <?php endif; ?>
    <!-- erro and sucesso -->
    <?php if (isset($_COOKIE["msgErro"])): ?>
        <section class="fotter-index msgErro">
            <?php echo $_COOKIE["msgErro"]; ?>
        </section>
    <?php endif; ?>

	<?php 
	if (!isset($_GET["textoCompleto"]) and !isset($_GET["tarefasCadaUsuario"]) and !isset($_GET["input_pesquisa"]))
	{
		require_once("layout_parts/area_textarea_postagem.php");
	}
	
	if (isset($_GET["textoCompleto"]))
	{
		$id = (int) $_GET["id"];
		require_once("layout_parts/area_textarea_postagem_completa.php"); 
	}
	elseif (isset($_GET["tarefasCadaUsuario"]))
	{
		$id = (int) $_GET["id"];
		require_once("layout_parts/area_result_post_cada_usuario.php"); 
	}
	elseif (isset($_GET["input_pesquisa"]))
	{
		$valorPesquisa = $_GET["input_pesquisa"];
		require_once("layout_parts/area_result_pesquisa.php"); 
	}
	else
	{
		require_once("layout_parts/areas_result_post.php");
	}
	?>
		
	</section><!--end right-->

	<?php 
	    require_once("layout_parts/area_left.php");
	?>
    <div class="hide"></div>

	</article><!--end main-->
	<?php require_once("layout_parts/footer.php"); ?>
</body>
</html>