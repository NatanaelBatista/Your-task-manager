<div id="main-area-left">

<section class="left">

<img class="img-perfil-recados-banner" src="<?php echo requisicaoGravatarAPI($_SESSION["login"],40); ?>" alt="" />
<div class="inperfil">
    <b><?php echo Delimitar(" ",$_SESSION["nome"],0) . " " . Delimitar(" ",$_SESSION["nome"],1); ?></b> <br>
    <a href="alterar_meus_dados.php?alterarMeusDados">Editar meus dados</a>
</div>

</section><!--end left-->




<section class="left">
<div class="div_oculta_left">
<form method="get" action="dashboard.php">
	<input type="search" name="input_pesquisa" id="input_pesquisa" placeholder="Pesquisar Tarefas...">
	<button type="submit" class="button-postar">Buscar</button>
</form>
</div>
</section><!--end left-->

<section class="left">
<br>
<b><?php echo $captions_menu_left["caption_menu_left"]; ?></b>
<ul id="menu-left" class="cadastrar-usuario">
	<li><a href="dashboard.php"><?php echo $captions_menu_left["01"]; ?></a></li>

	<?php if ($_SESSION["perfil"] == "1"): ?>
	<li><a href="cadastrar_usuarios.php"><?php echo $captions_menu_left["02"]; ?></a></li>
	<?php endif; ?>

	<li><a href="pagina_de_recados.php"><?php echo $captions_menu_left["03"]; ?></a></li>
	<li><a href="relatorio_geral.php"><?php echo $captions_menu_left["04"]; ?></a></li>
</ul>
</section><!--end left-->

<ul id="menu-left" class="cadastrar-usuario">
<li><a href="#" class="show_menu_usuarios_cadastrados"><?php echo $captions_menu_left["05"]; ?></a></li>
</ul>

<div id="container_lista_usuarios">
<section class="left">
<br>
<p>
	Clicando nos usuários você lista todas as tarefas cadastradas por eles.
</p>
<b>Usuarios</b>
<ul id="menu-left" class="menu-usuarios">
	<?php foreach($usuario->listar() as $listar):
	$emailCriadorTarefa = $listar->login;
	?>
	<img class="img-perfil-recados" src="<?php echo requisicaoGravatarAPI($emailCriadorTarefa,30); ?>" alt="" />
	
	<?php
     $quantidadeDeTarefas = count($usuario->colecaoUsuarioTarefasWhere("criadorDaTarefa",$listar->id));
	?>
	   <li><a href="dashboard.php?tarefasCadaUsuario&id=<?php echo $listar->id; ?>"><?php echo Delimitar(" ",$listar->nome,0) . " " . Delimitar(" ",$listar->nome,1) . " <span class='trc'>QTC ( <span class='numero_trc'>" . $quantidadeDeTarefas . "</span> )</span>"; ?></a></li>
	<?php endforeach; ?>
</ul>
</section><!--end left-->
</div>



<section class="left">
<br>
<b>Tarefas cadastradas</b>
<ul id="menu-left" class="cadastrar-usuario">
	<?php 
	$destacaSituacao = "";
	foreach($usuario->colecaoUsuarioTarefas() as $listar):
	if ($listar->situacao == "1")
	{
        $destacaSituacao = "pendente";
	}
	elseif ($listar->situacao == "2")
	{
		$destacaSituacao = "sendoFeita";
	}
	elseif ($listar->situacao == "3")
	{
		$destacaSituacao = "feita";
	}
	?>
	  <li><a class="link-arquivos <?php echo $destacaSituacao; ?>" href="visualizar_tarefa_completa.php?textoCompleto&id=<?php echo $listar->idTarefas; ?>" title="<?php echo $listar->titulo . ": (" . $listar->tarefasDataDoCadastro ." )"; ?>"><?php echo DelimitarPorTamnho($listar->titulo, 20, "..."); ?></a></li>
    <?php endforeach; ?>
</ul>
</section><!--end left-->
</div>