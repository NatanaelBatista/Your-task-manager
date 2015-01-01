<div id="main-area-left">

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
<b>Navegação</b>
<ul id="menu-left" class="cadastrar-usuario">
	<li><a href="dashboard.php">Visualizar / Cadastrar Tarefas</a></li>
	<li><a href="alterar_meus_dados.php?alterarMeusDados">Alterar meus dados</a></li>

	<?php if ($_SESSION["perfil"] == "1"): ?>
	<li><a href="cadastrar_usuarios.php">Cadastrar / Editar Usuarios</a></li>
	<?php endif; ?>
</ul>
</section><!--end left-->

<ul id="menu-left" class="cadastrar-usuario">
<li><a href="#" class="show_menu_usuarios_cadastrados">Lista de Usuários Cadastrados</a></li>
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
     $quantidadeDeTarefas = count($usuario->colecaoUsuarioTarefasWhere("criadorDaTarefa",$listar->id));
	?>
	   <li><a href="?tarefasCadaUsuario&id=<?php echo $listar->id; ?>"><?php echo $listar->nome . " <span class='trc'>QTC ( <span class='numero_trc'>" . $quantidadeDeTarefas . "</span> )</span>"; ?></a></li>
	<?php endforeach; ?>
</ul>
</section><!--end left-->
</div>



<section class="left">
<br>
<b>Tarefas cadastradas</b>
<ul id="menu-left" class="cadastrar-usuario">
	<?php foreach($usuario->colecaoUsuarioTarefas() as $listar):?>
	  <li><a class="link-arquivos" href="visualizar_tarefa_completa.php?textoCompleto&id=<?php echo $listar->idTarefas; ?>" title="<?php echo $listar->titulo . ": (" . $listar->tarefasDataDoCadastro ." )"; ?>"><?php echo DelimitarPorTamnho($listar->titulo, 20, "..."); ?></a></li>
    <?php endforeach; ?>
</ul>
</section><!--end left-->
</div>