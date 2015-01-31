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

<?php if (count($arquivos->select()) != 0):?>
<section class="areas apresenta-tarefas">

<h1 class="h1-title-tarefas">Arquivos Cadastrados</h1>
<div class="info-areas">

<?php foreach($arquivos->select() as $listar):
        $extencao = explode(".", $listar->caminhoArquivo);
        $id = $listar->id;
        foreach($usuario->listarWhere("id", $listar->idUsuario) as $list)
        {
          $_retornoNomeUsuario = $list->nome;
        }
        
        $showDivArquivoNaoEncontrado = null;
        if (!file_exists($listar->caminhoArquivo))
        {
           $showDivArquivoNaoEncontrado = "classCssNaoEccontrado";
        }
?>
  <div class="show_arquivos <?php echo $showDivArquivoNaoEncontrado;?>">
    <span class="icone_arquivos_files">

      <?php 
      /*Verifica se o Arquivo existe na pasta do Servidor e define os Icones*/
      if (!file_exists($listar->caminhoArquivo))
      {
        echo '<img src="html_img/icone_arquivos_file_erro.png" alt="">';
      }
      elseif ($extencao[1] != "zip" and $extencao[1] != "html" and $extencao[1] != "css" and $extencao[1] != "js" and $extencao[1] != "php" and $extencao[1] != "sql")
      {
        echo '<img src="html_img/icone_arquivos_file.png" alt="">';
      }
      elseif ($extencao[1] == "zip")
      {
        echo '<img src="html_img/icone_arquivos_file_zip.png" alt="">';
      }
      else
      {
        echo '<img src="html_img/icone_arquivos_file_codigo.png" alt="">';
      }
      ?>
    </span>	

    <?php echo $listar->nome . "." . $extencao[1]; ?>
  	<br> 
    <span class="data_postagem_files">
       Cadastrado em:  <span class="time-line-nome"> <?php echo $listar->dataPostagem; ?></span> |
       ( Cadastrado por: <span class="time-line-nome"> <?php echo DelimitarPorTamnho($_retornoNomeUsuario, 20, "..."); ?></span> )
    </span>
  	<?php
      require("layout_parts/controle_arquivos_file.php");
    ?>
  </div>
<?php endforeach; ?>
</div><!-- end info areas -->

<?php endif; ?>
</section><!--end-->

    
	</section><!--end right-->

	    <?php 
	      require_once("layout_parts/area_left.php");
	    ?>
    <div class="hide"></div>

	</article><!--end main-->
	<?php require_once("layout_parts/footer.php"); ?>

<?php if (!isset($_GET["editar"])): ?>

	<script>
  $(document).ready(function() {
	   /*Mostra o botão de submit se o campo file contiver um arquivo setado*/
	    var postarFile = $(".postar-file").hide();
       var campoFile = $(".campo_file").on("change",function() {
          postarFile.show("fast");
       });
  });
  </script>

<?php endif; ?>

  <script>
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

	</script>
</body>
</html>