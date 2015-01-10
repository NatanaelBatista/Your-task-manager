<?php 
foreach($recados->listarWhere("id",$id) as $listar)
{
	$retornoRecado = $listar->recado;
}
?>
<form method="post" action="recados_controller.php?cadastrarRecados">
    <textarea id="recado" name="recado" class="textarea-post" cols="2" rows="10" placeholder="Deixe um recado para o grupo..."><?php echo $retornoRecado; ?></textarea>
    <button type="submit" class="button-postar">Editar Recado</button>
    <p>As suas mensagens serão mostradas para todos os usuários do sistema.</p>
</form>