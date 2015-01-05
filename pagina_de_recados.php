<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$recados = Container::getRecados();

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
      
      <section class="areas area-text-post section-textarea-recados">
        <form method="post" action="recados_controller.php?cadastrarRecados">
            <textarea name="recado" class="textarea-post" cols="2" rows="10" placeholder="Deixe um recado para o grupo..."></textarea>
            <button type="submit" class="button-postar">Publicar Recado</button>
            <p>As suas mensagens serão mostradas para todos os usuários do sistema.</p>
        </form>
      </section>  
    
    <?php if (isset($_COOKIE["msgErro"])): ?>
        <section class="fotter-index msgErro">
            <?php echo $_COOKIE["msgErro"]; ?>
        </section>
    <?php endif; ?>

    <section class="areas apresenta-tarefas">
       <h1 class="h1-title-tarefas">Mural de Recados</h1>
       <div class="info-areas recados">
         <?php 
         foreach($recados->listar() as $listar): 
            foreach($usuario->listarWhere("id",$listar->idUsuarioMandouRecado) as $list)
            {
                $nomeDoUsuario = $list->nome;
            }
         ?>
        <div class="corpo-recado">
            <b>Recado de: </b><?php echo $nomeDoUsuario; ?> | <b>Enviado em: </b><?php echo $listar->dataRecado; ?><br> 
            <p><?php echo nl2br($listar->recado); ?></p>
        </div><!-- end corpo-recado -->
         <?php endforeach; ?>
        
       </div><!-- end info areas -->
    </section><!-- end areas -->

    </section>
	</section><!--end right-->

	<?php require_once("layout_parts/area_left.php");?>
    
    <div class="hide"></div>

	</article><!--end main-->
    <?php require_once("layout_parts/fotter.php"); ?>
</body>
</html>
