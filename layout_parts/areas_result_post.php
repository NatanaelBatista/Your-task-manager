<?php 
/**
* Monta a páginação
*/
$numeroPorPagina = 4;
$totalDePaginas = ceil(count($usuario->colecaoUsuarioTarefas()) / $numeroPorPagina);
$totalDeArquivos = count($usuario->colecaoUsuarioTarefas());
$pagina = $_GET["pagina"];

if ($pagina == "")
{
	$pagina = 0;
}
/**
* Faz o select com páginação
*/
foreach($usuario->colecaoUsuarioTarefasPagination($pagina,$numeroPorPagina) as $listar):
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
if ($_SESSION["perfil"] == "1")
{
	include("controle_editar_deletar_tarefas.php");
}
/**
* Para o usuario com perfil nivel "2" mostra apenas o "editar e deletar" das tarefas cadastradas por ele
*/
if ($listar->criadorDaTarefa == $_SESSION["idUsuario"])
{
	if ($_SESSION["perfil"] != "1")
	{
		include("controle_editar_deletar_tarefas.php");
	}
} 
?>
</div><!-- end footer areas -->

<?php endforeach; ?>

<?php 
/**
* Controla quando os butões da páginação vão aparecer.
*/
if (count($usuario->colecaoUsuarioTarefas()) > $numeroPorPagina)
{
	$paginaAtual = $_GET["pagina"];
    if ($_GET["pagina"] == 0)
    {
    	$paginaAtual = 1;
    }

    require_once("layout_parts/controles_paginacao.php");
}
?>  