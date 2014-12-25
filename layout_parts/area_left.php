<div id="main-area-left">
<section class="left">
<br>
<b>Navegação</b>
<ul id="menu-left" class="cadastrar-usuario">
	<li><a href="dashboard.php">Cadastrar Tarefas</a></li>
	<li><a href="alterar_meus_dados.php?alterarMeusDados">Alterar meus dados</a></li>

	<?php if ($_SESSION["perfil"] == "1"): ?>
	<li><a href="cadastrar_usuarios.php">Cadastrar / Editar Usuarios</a></li>
	<?php endif; ?>
</ul>
</section><!--end left-->

<section class="left">
<br>
<b>Usuarios</b>
<ul id="menu-left" class="menu-usuarios">
	<?php foreach($usuario->listar() as $listar): ?>
	   <li><a href=""><?php echo $listar->nome; ?></a></li>
	<?php endforeach; ?>
</ul>
</section><!--end left-->
    	
<section class="left">
<br>
<b>Tarefas cadastradas</b>
<ul id="menu-left" class="cadastrar-usuario">
	<?php foreach($usuario->colecaoUsuarioTarefas() as $listar): ?>
	  <li><a class="link-arquivos" href="visualizar_tarefa_completa.php?textoCompleto&id=<?php echo $listar->idTarefas; ?>" title="<?php echo $listar->titulo . ": (" . $listar->tarefasDataDoCadastro ." )"; ?>"><?php echo DelimitarPorTamnho($listar->titulo, 20, "..."); ?></a></li>
    <?php endforeach; ?>
</ul>
	
</section><!--end left-->
</div>