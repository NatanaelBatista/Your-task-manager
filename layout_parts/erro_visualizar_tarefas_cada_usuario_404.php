<?php 
/**
* Página 404 para a página que mostar a tarefa completa
*/
if (count($usuario->colecaoUsuarioTarefasWhere("criadorDaTarefa",$id)) < 1):
	foreach($usuario->listarWhere("id",$id) as $listar)
	{
		$login = $listar->login;
	}

?>
<section class="areas apresenta-tarefas">
	<div class="info-areas">
		<?php 
		if (isset($_GET["id"]) != "") 
		{
        ?>
		<img style="float:left; margin-right:10px;" class="" src="<?php echo requisicaoGravatarAPI($listar->login,112); ?>" alt="">
	    <?php } ?>
	  <h2>Esse usuário ainda não cadastrou nenhuma tarefa no sistema.</h2>
      <p><a href="dashboard.php?pagina=0">Visualizar tarefas existentes</a></p>
    <div class="hide"></div>
    </div>
</section>
<?php 
endif;?>