<?php 
session_start();
require_once("loaderClasses.php");
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



<section class="areas apresenta-tarefas">

<h1 class="h1-title-tarefas">Configuração Geral de Arquivos</h1>
<div class="info-areas">

<div id="tabs">

  <ul>
    <li><a href="#tabs-1">Lista de Tarefas</a></li>
    <li><a href="#tabs-2">Lista de Recados</a></li>
  </ul>

  <div id="tabs-1" class="primeiro">
    <form method="post" action="tarefa_controller.php?deletarMultiploTarefas">
    
      <div class="div_segura_button">
        <p class="cepara-button-deletar">
            <!--botão submit para deletar todos os arquivos selecionados via checkboxs-->
            <button type="submit" class="deletar_todos_arquivos_selecionados deletar_todas_tarefas">Deletar selecionados</button>

            <!--checkbox para selecionar todos os checkboxs-->
            <label for="checkAll">Selecionar Todos</label>
            <input id="checkAll" class="checkAll ck_select_all_tarefas" type="checkbox" name="checkAll">  
        </p>

      </div> <!--end-->
      <div class="hide"></div>
    
    <?php foreach($usuario->colecaoUsuarioTarefas() as $listar):
    /*Busca o login do Usuário a quem a tarefa foi atribuida*/ 
    foreach($usuario->listarWhere("id", $listar->vinculoUsuario) as $list)
    {
      $loginUsuarioAtribuido = $list->login;
    }
    ?>
    
     <div class="show_pagina_geral_titulo">

      <p class="p_div_left">
        <img src="<?php echo requisicaoGravatarAPI($listar->login,40) ?>" alt="">
        <img src="<?php echo requisicaoGravatarAPI($loginUsuarioAtribuido,40) ?>" alt="">
        <b>Titulo:</b> <?php echo $listar->titulo; ?> <br>
        <b>Cadastrada em:</b><small><?php echo $listar->tarefasDataDoCadastro; ?></small> |
        <b>Situação:</b> <small><?php echo situacaoTarefa($listar->situacao); ?></small>
      </p>
      
      <div class="div_check">
          <p>
            <input id="check" class="checkbox ck_tarefas" type="checkbox" name="check_tarefas[]" value="<?php echo $listar->idTarefas; ?>">
          </p>
      </div>
      <div class="hide"></div>
     </div>

    <?php endforeach; ?>

   </form>
  </div><!--end tab1-->
  
 

  <div id="tabs-2">
    <form method="post" action="recados_controller.php?deletarMultiploRecados">
    
      <div class="div_segura_button">
        <p class="cepara-button-deletar">
            <!--botão submit para deletar todos os arquivos selecionados via checkboxs-->
            <button type="submit" class="deletar_todos_arquivos_selecionados deletar_todas_recados">Deletar selecionados</button>

            <!--checkbox para selecionar todos os checkboxs-->
            <label for="checkAllRecados">Selecionar Todos</label>
            <input id="checkAllRecados" class="checkAll ck_select_all_recados" type="checkbox" name="checkAllRecados">  
        </p>

      </div> <!--end-->
      <div class="hide"></div>
    
    <?php 
     $nomeUsuarioAtribuido = "";
    foreach($recados->listar() as $listar):
    /*Busca o login do Usuário a quem a tarefa foi atribuida*/ 
    foreach($usuario->listarWhere("id", $listar->idUsuarioMandouRecado) as $list)
    {
      $loginUsuarioAtribuido = $list->login;
      $nomeUsuarioAtribuido = $list->nome;
    }
    ?>
    
     <div class="show_pagina_geral_titulo">

      <p class="p_div_left">
        <img src="<?php echo requisicaoGravatarAPI($loginUsuarioAtribuido,40) ?>" alt="">
        <b>Usuário:</b> <?php echo $nomeUsuarioAtribuido; ?> <br>
        <b>Cadastrada em:</b><small><?php echo $listar->dataRecado; ?></small>
      </p>
      
      <div class="div_check">
          <p>
            <input id="check" class="checkbox ck_recados" type="checkbox" name="check_recados[]" value="<?php echo $listar->id; ?>">
          </p>
      </div>
      <div class="hide"></div>
     </div>

    <?php endforeach; ?>

   </form>
  </div><!--end tab2-->


</div><!--end tabs-->

<div class="hide"></div>
    

</div><!-- end info areas -->

</div>


</section><!--end-->

    
	</section><!--end right-->

<?php 
	require_once("layout_parts/area_left.php");
?>
    <div class="hide"></div>

	</article><!--end main-->
	<?php require_once("layout_parts/footer.php"); ?>
  <script src="js/checkboxMultiplo.js"></script>
  <script src="js/deletar.js"></script>

  <script>
  $(function() {
    $( "#tabs" ).tabs();

    $( "#id-1" ).tabs({
      active: 1
    });
  });

  window.onload = function() 
  {
    /*Seleciona todos os checkbox da aba Tarefas*/
    var allTarefas = document.querySelectorAll(".ck_tarefas"),
        checkAllTarefas = document.querySelector(".ck_select_all_tarefas");
        selecionarTodos(allTarefas, checkAllTarefas);
    
    /*Confirma deletar todas as Tarefas da aba Tarefas*/
    var buttonDeletarTarefas = document.querySelector(".deletar_todas_tarefas"),
        mensagemTarefas = "Deseja Deletar essa Trefa?";
        deletar(buttonDeletarTarefas, mensagemTarefas);


    /*Seleciona todos os checkbox da aba Recados*/
    var allRecados = document.querySelectorAll(".ck_recados"),
        checkAllRecados = document.querySelector(".ck_select_all_recados");
        selecionarTodos(allRecados, checkAllRecados);

    /*Confirma deletar todos os Recados da aba Recados*/
    var buttonDeletarRecados = document.querySelector(".deletar_todas_recados"),
        mensagemRecados = "Deseja Deletar esses Recados?";
        deletar(buttonDeletarRecados, mensagemRecados);
  }
  </script>
</body>
</html>