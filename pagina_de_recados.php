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
    <!-- erro and sucesso -->
    <?php if (isset($_COOKIE["msgErro"])): ?>
        <section class="fotter-index msgErro">
            <?php echo $_COOKIE["msgErro"]; ?>
        </section>
    <?php endif; ?>
      
      <section class="areas area-text-post section-textarea-recados">
        <?php if (isset($_GET["prepara_para_editar"])) 
        {
          $id = (int) $_GET["id"];
          if (count($recados->listarWhere("id",$id)) < 1)
          {
            require_once("layout_parts/erro_preparar_editar_recados_404.php");
          }
          else
          {
            require_once("layout_parts/textarea_editar_recados.php");
          }
        }
        else
        {
        ?>
        <form method="post" action="recados_controller.php?cadastrarRecados">
            <textarea id="recado" name="recado" class="textarea-post" cols="2" rows="10" placeholder="Deixe um recado para o grupo..."></textarea>
            <button type="submit" class="button-postar">Publicar Recado</button>
            <p>
              ( <span class="time-line-nome"> Recados cadastrados<b><?php echo count($recados->listar());?></b></span> )
             Os seus recados serão mostradas para todos os usuários do sistema.
            </p>
        </form>
        <?php }; ?>
      </section>  

    <section class="areas apresenta-tarefas areas_recados">
       <h1 class="h1-title-tarefas">Mural de Recados</h1>
       <div class="info-areas recados">
         <?php 
         foreach($recados->listar() as $listar): 
            foreach($usuario->listarWhere("id",$listar->idUsuarioMandouRecado) as $list)
            {
                $nomeDoUsuario = $list->nome;
                $email = $list->login;
            }
         ?>
        <div class="corpo-recado">
            <img class="img-perfil-recados" src="<?php echo requisicaoGravatarAPI($email,40); ?>" alt="" />
            <b>Recado de: </b><span class="time-line-nome"><?php echo $nomeDoUsuario; ?></span> <br> <b>Enviado em: </b><span class="time-line-data"><?php echo $listar->dataRecado; ?></span><br> 
            <p><?php echo $listar->recado; ?></p>
        </div><!-- end corpo-recado -->
        <div class="footer-areas">
        <?php 
            if ($listar->idUsuarioMandouRecado == $_SESSION["idUsuario"] and $_SESSION["perfil_master_master"] != 1):
        ?>
          <a href="pagina_de_recados.php?prepara_para_editar&id=<?php echo $listar->id; ?>" class="editar" title="Editar essa tarefa">Editar</a>

         <?php
         endif; 
         if ($_SESSION["perfil_master_master"] == 1):
         ?>
           <a href="pagina_de_recados.php?prepara_para_editar&id=<?php echo $listar->id; ?>" class="editar" title="Editar essa tarefa">Editar</a> |
           <a href="recados_controller.php?deletar&id=<?php echo $listar->id; ?>" class="deletar" title="Deletar essa tarefa">Deletar</a>
         
         <?php endif;?>
         </div>
         <?php endforeach; ?>
        
       </div><!-- end info areas -->
    </section><!-- end areas -->

    </section>
	</section><!--end right-->

	<?php require_once("layout_parts/area_left.php");?>
    
    <div class="hide"></div>

	</article><!--end main-->
    <?php require_once("layout_parts/fotter.php"); ?>

    <script>
    $(function() {
     CKEDITOR.replace( 'recado', {
        uiColor: '#f6f7f8',
        toolbar: [
          [ 'Link', 'Unlink' ],
          [ 'FontSize', 'TextColor', 'BGColor','Undo', 'Redo','JustifyLeft'],
          [{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },]
        ]
      });
});
    </script>
</body>
</html>