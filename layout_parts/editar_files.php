<?php
 $id = (int) $_GET["id"];
 foreach($arquivos->listarWhere("id", $id) as $listar)
 {
 	$retornoNome = $listar->nome;
 	$retornoCaminhoArquivo = $listar->caminhoArquivo;
 	$retornoDataPostagem = $listar->dataPostagem;
 	$retornoIdUsuario = $listar->idUsuario;
 }
?>
<section class="areas apresenta-tarefas">

<h1 class="h1-title-tarefas">Editar Arquivo</h1>
<div class="info-areas">
<p>
	O que você deseja editar? O nome do arquivo ou o próprio arquivo?
	Caso você não queira editar o arquivo, basta deixar o campo do arquivo em branco e o sistema entenderá que você não deseja editá-lo.  
    <br> <a href="adicionar_arquivos.php" title="Voltar para página de Cadastrar Arquivos"><< Cadastrar Arquivos</a>
</p>
<form method="post" action="arquivos_controller.php?editar&id=<?php echo $id; ?>" enctype="multipart/form-data">
	<label for="file">Você pode carregar arquivos como PDF, Html, Css, Javascript, Php, Sql</label> <br>
	<input type="text" name="nome_para_o_arquivo" value="<?php echo isset($retornoNome) ? $retornoNome : "";?>" placeholder="Digite um nome para o Arquivo
	"> <br>
     
	<input type="file" name="nome_do_arquivo" class="campo_file"> <br>
	<button type="submit" class="button-postar postar-file">Cadastrar Mudanças</button>
</form>
</div><!-- end info areas -->

</section><!--end-->