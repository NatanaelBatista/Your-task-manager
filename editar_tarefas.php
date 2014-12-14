<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();

require_once("layout_parts/header.php");
require_once("layout_parts/banner.php");
require_once("utilidades/functions.php");
require_once("validaSession.php");

if (isset($_GET["editar"]))
{
	$id = (int) $_GET["id"];
	foreach($usuario->colecaoUsuarioTarefasWhere("tarefas.id", $id) as $listar)
	{
		$_id = $listar->idUsuario;
		$_titulo = $listar->titulo;
		$_texto = $listar->texto;
		$_nome = $listar->nome;
		$_idUsuario = $listar->idUsuario;
		$_situacao = $listar->situacao;
		$_vinculoUsuario = $listar->vinculoUsuario;
	}
    
    /**
    * Consulta e lista o nome do Usuario viculado a tarefa
    */
	foreach($usuario->listarWhere("id", $_vinculoUsuario) as $list)
	{
		$_nomeResponsavelPelaTarefa = $list->nome;
	}

	$checkedFazer = "unchecked";
    $checkedSendoFeita = "unchecked";
    $checkedFeita = "unchecked";
    /**
    * Verifica em qual situação a terefa se encontra
    */
    if ($_situacao == "1")
    {
        $checkedFazer = "checked";
    }
    elseif ($_situacao == "2")
    {
        $checkedSendoFeita = "checked";
    }
    elseif ($_situacao == "3")
    {
    	$checkedFeita = "checked";
    }
}
?>

<?php 
if (strlen($_texto) > 200):?>
<style>
	.textarea-post {
		height:300px;
	}
</style>
<?php endif; ?>

	<article class="main">
	<section class="right">

	<?php if (isset($_COOKIE["msgSucesso"])): ?>
        <section class="fotter-index msgErro msgSucesso">
            <?php echo $_COOKIE["msgSucesso"]; ?>
        </section>
    <?php endif; ?>

	<section class="areas area-text-post">
		<h3>Editar Tarefa</h3>
	    <form method="post" action="tarefa_controller.php?editar&id=<?php echo $id; ?>">
	        <input type="text" name="titulo" id="titulo" placeholder="Titulo da terefa." value="<?php echo $_titulo; ?>">

			<textarea name="texto" class="textarea-post" cols="2" rows="50" placeholder="Escreva uma terefa..."><?php echo $_texto; ?> </textarea>
			<br><br>
			<label for="perfil">Usuário responsável pela tarefa: </label> <br>
			<select name="tarefa_para_usuario" id="tarefa_para_usuario">
				<option value="<?php echo $_vinculoUsuario;?>"><?php echo $_nomeResponsavelPelaTarefa; ?></option>
				<?php foreach($usuario->listar() as $listar):?>
                   <option value="<?php echo $listar->id;?>"><?php echo $listar->nome; ?></option>
				<?php endforeach;?>
			</select> <br>

            <label for="situacao">Situação atual da Tarefa:</label> <br>
            <input type="radio" name="situacao" value="1" id="fazer" <?php echo isset($checkedFazer) ? $checkedFazer:""; ?>> <label for="master">Pendente</label> 
            <input type="radio" name="situacao" value="2" id="sendoFeita" <?php echo isset($checkedSendoFeita) ? $checkedSendoFeita:""; ?>> <label for="funcionario">Fazendo</label> 
            <input type="radio" name="situacao" value="3" id="feita" <?php echo isset($checkedFeita) ? $checkedFeita:""; ?>> <label for="funcionario">Feita</label> <br>
			
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