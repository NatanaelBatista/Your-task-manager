<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$loginModel = Container::getLoginModel();
$arquivos = Container::getArquivos();
require_once("layout_parts/header.php");
require_once("layout_parts/banner.php");
require_once("validaSession.php");
?>
	<article class="main">
	<section class="right">

	<?php if (isset($_COOKIE["msgSucesso"])): ?>
        <section class="fotter-index msgErro msgSucesso">
            <?php echo $_COOKIE["msgSucesso"]; ?>
        </section>
    <?php endif; ?>
    <!-- erro and sucesso -->
    <?php if (isset($_COOKIE["msgErro"])): ?>
        <section class="fotter-index msgErro">
            <?php echo $_COOKIE["msgErro"]; ?>
        </section>
    <?php endif; ?>

<?php if (isset($_GET["editar"]))
{
?>

<?php 
 require_once("layout_parts/editar_files.php");
}
else
{
?>

<section class="areas apresenta-tarefas">

<h1 class="h1-title-tarefas">Adicionar Arquivos</h1>
<div class="info-areas">

<form method="post" action="arquivos_controller.php?cadastrar" enctype="multipart/form-data">
	<label for="file">Você pode carregar arquivos como PDF, Html, Css, Javascript, Php, Sql</label> <br>
	<input type="text" name="nome_para_o_arquivo" placeholder="Digite um nome para o Arquivo
	"> <br>
	<input type="file" name="nome_do_arquivo" class="campo_file"> <br>
	<button type="submit" class="button-postar postar-file">Enviar Para o Servidor</button>
</form>
</div><!-- end info areas -->

</section><!--end-->
<?php 
} 
?>
<br>

<section class="areas apresenta-tarefas">

<h1 class="h1-title-tarefas">Arquivos Cadastrados</h1>
<div class="info-areas">

<?php foreach($arquivos->select() as $listar):
        $extencao = explode(".", $listar->caminhoArquivo);
        $id = $listar->id;
?>
  <div class="show_arquivos">
    <span class="icone_arquivos_files">
       <img src="html_img/icone_arquivos_file.png" alt=""> 
    </span>	

    <?php echo $listar->nome . "." . $extencao[1]; ?>
  	<br> 
    <span class="data_postagem_files">
       Cadastrado em: <?php echo $listar->dataPostagem; ?>
    </span>
  	<?php 
      /*Determina qual usuário pode deletar os arquivos*/
      if ($_SESSION["perfil_master_master"] == 1)
      {
        require("layout_parts/controle_arquivos_file.php");
      }
      elseif ($_SESSION["perfil"] == 1 and $listar->idUsuario == $_SESSION["idUsuario"])
      {
        require("layout_parts/controle_arquivos_file.php");
      }
    ?>
  </div>
<?php endforeach; ?>
</div><!-- end info areas -->

</section><!--end-->

    
	</section><!--end right-->

	    <?php 
	      require_once("layout_parts/area_left.php");
	    ?>
    <div class="hide"></div>

	</article><!--end main-->
	<?php require_once("layout_parts/footer.php"); ?>

	<script>
  $(document).ready(function() {
	   /*Mostra o botão de submit se o campo file contiver um arquivo setado*/
	   var postarFile = $(".postar-file").hide();
       var campoFile = $(".campo_file").on("change",function() {
          postarFile.show("fast");
       });

    /*Controle de deleção dos Arquivos*/
    function deletarArquivos() {
        var deletar = $(".deletar-arquivo-file");
        deletar.click( function() {
        var confirmar = confirm("Deseja realmente deletar esse Arquivo?");
        if (confirmar) {
          return true;
        } else {
          return false;
        }
      })
    }

  deletarArquivos();

});
	</script>
</body>
</html>