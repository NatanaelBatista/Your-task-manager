<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();

require_once("layout_parts/header.php");
require_once("layout_parts/banner.php");
require_once("utilidades/functions.php");
require_once("validaSession.php");

?>

	<article class="main">
	<section class="right">

	<?php if (isset($_COOKIE["msgSucesso"])): ?>
        <section class="fotter-index msgErro msgSucesso">
            <?php echo $_COOKIE["msgSucesso"]; ?>
        </section>
    <?php endif; ?>

	<?php require_once("layout_parts/area_textarea_postagem.php");?>
    
    
	<?php if (isset($_COOKIE["msgErro"])): ?>
        <section class="fotter-index msgErro">
            <?php echo $_COOKIE["msgErro"]; ?>
        </section>
    <?php endif; ?>

	<?php require_once("layout_parts/areas_result_post.php"); ?>
		
	</section><!--end right-->

	    <?php 
	      require_once("layout_parts/area_left.php");
	    ?>

    <div class="hide"></div>

	</article><!--end main-->
	<?php require_once("layout_parts/fotter.php") ?>
</body>
</html>