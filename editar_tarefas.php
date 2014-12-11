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

	<section class="areas area-text-post">
		<h3>Editar Tarefa</h3>
	    <form method="post" action="tarefa_controller.php?cadastrar">
	        <input type="text" name="titulo" id="titulo" placeholder="Titulo da terefa.">

			<textarea name="texto" class="textarea-post" cols="2" rows="10" placeholder="Escreva uma terefa..."></textarea>
			
			<select name="tarefa_para_usuario" id="tarefa_para_usuario">
				<option value="">Escolha a quem atribuir esta Tarefa...</option>
				<?php 
				foreach($usuario->listar() as $listar):?>
                   <option value="<?php echo $listar->id;?>"><?php echo $listar->nome; ?></option>
				<?php endforeach;?>
			</select> <br>
			<button type="submit" class="button-postar">Publicar</button>
		</form>
</section>
    
    
	<?php if (isset($_COOKIE["msgErro"])): ?>
        <section class="fotter-index msgErro">
            <?php echo $_COOKIE["msgErro"]; ?>
        </section>
    <?php endif; ?>

	</section><!--end right-->

	    <?php 
	      require_once("layout_parts/area_left.php");
	    ?>

    <div class="hide"></div>

	</article><!--end main-->
	<?php require_once("layout_parts/fotter.php") ?>
</body>
</html>