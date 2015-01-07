<?php 
foreach($usuario->pesquisarColecaoUsuarioTarefas("titulo", $valorPesquisa) as $listar):
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

<b>Tarefa atribuída ao usuário:</b> <?php echo $_nomeDoUsuarioTarefaAtibuida; ?></small> ( por ) <small><?php echo $listar->nome; ?><br>
<b>Cadastrada em:</b> <small><?php echo $listar->tarefasDataDoCadastro; ?></small> |
<b>Situação:</b> <small><?php echo situacaoTarefa($listar->situacao); ?></small> <br>
<hr>

<?php 
if (strlen($listar->texto) > 200)
{
?>
<p><?php echo nl2br(DelimitarPorTamnho($listar->texto, 200, " [...]")); ?></p>
<a href="visualizar_tarefa_completa.php?textoCompleto&id=<?php echo $listar->idTarefas; ?>" title="Ler a tarefa completa">Continuar lendo...</a>
<?php 
} 
else 
{?>
<p><?php echo nl2br(DelimitarPorTamnho($listar->texto, 200, "")); ?></p>
<?php } ?>
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

<?php endforeach; 
if (count($usuario->pesquisarColecaoUsuarioTarefas("titulo", $valorPesquisa)) < 1):?>
<section class="areas apresenta-tarefas">
	<div class="info-areas">
		<img class="img_pesquisa_nao_encontrada" src="html_img/detetivi_pesquisa.jpg" alt="">
	  <h2>Desculpe, mas a sua pesquisa não retornou nenhum valor, ou seja, conteúdo não encontrado..</h2>
      <p>Verifique se digitou a palavra corretamente...</p>
    <div class="hide"></div>
    </div>
</section>
<?php endif; ?>