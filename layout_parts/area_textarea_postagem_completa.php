<?php
require_once("layout_parts/erro_visualizar_tarefas_completas_404.php");
foreach($usuario->colecaoUsuarioTarefasWhere("tarefas.id",$id) as $listar):
	$emailCriadorTarefa = $listar->login;
/**
* Busca o nome do usuario a quem a tarefa foi atribuida
*/
foreach($usuario->listarWhere("id",$listar->vinculoUsuario) as $list)
{
	$_nomeDoUsuarioTarefaAtibuida = $list->nome;
	$emailVinculoUsuario = $list->login;
}
?>
<section class="areas apresenta-tarefas">

<h1 class="h1-title-tarefas"><?php echo $listar->titulo; ?></h1>
<div class="info-areas">
<img class="img-perfil-recados criador" src="<?php echo requisicaoGravatarAPI($emailCriadorTarefa,40); ?>" alt="" />
<img class="img-perfil-recados recebeu" src="<?php echo requisicaoGravatarAPI($emailVinculoUsuario,40); ?>" alt="" />

<b>Tarefa atribuída ao usuário:</b> <span class="time-line-nome"><?php echo $_nomeDoUsuarioTarefaAtibuida; ?></span></small> ( por ) <small><span class="time-line-data"><?php echo $listar->nome; ?></span><br>
<b>Cadastrada em:</b> <small><?php echo $listar->tarefasDataDoCadastro; ?></small> | 
<b>Situação:</b> <small><?php echo situacaoTarefa($listar->situacao); ?></small> <br>
<hr>
<p><?php echo nl2br($listar->texto); ?></p>
</div><!-- end info areas -->

</section>
<div class="footer-areas">
<?php 
/**
* Para o usuario nivel "1" mostra o "editar e deletar" de todas as tarefas cadastradas
*/
if ($_SESSION["perfil"] == "1"):
?>
 
 <a href="editar_tarefas.php?editar&id=<?php echo $listar->idTarefas;?>" class="editar" title="Editar essa Tarefa">Editar</a> |
 <a href="tarefa_controller.php?deletar&id=<?php echo $listar->idTarefas;?>" class="deletar" title="Deletar essa Tarefa">Deletar</a> |
 <small>Tarefa criada por: <?php echo $listar->nome; ?></small>

<?php endif; ?>

<?php 
/**
* Para o usuario com perfil nivel "2" mostra apenas o "editar e deletar" das tarefas cadastradas por ele
*/
if ($listar->criadorDaTarefa == $_SESSION["idUsuario"])
{
	if ($_SESSION["perfil"] != "1")
	{
?>

<a href="editar_tarefas.php?editar&id=<?php echo $listar->idTarefas;?>" class="editar" title="Editar essa Tarefa">Editar</a> |
<a href="tarefa_controller.php?deletar&id=<?php echo $listar->idTarefas;?>" class="deletar" title="Deletar essa Tarefa">Deletar</a> |
<small>Tarefa criada por: <?php echo $listar->nome; ?></small>

<?php 
 } /*End primeiro if*/
} /*End segundo if*/
?>
</div><!-- end footer areas -->

<?php endforeach; ?>