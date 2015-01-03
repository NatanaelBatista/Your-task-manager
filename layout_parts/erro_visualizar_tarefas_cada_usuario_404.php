<?php 
/**
* Página 404 para a página que mostar a tarefa completa
*/
if (count($usuario->colecaoUsuarioTarefasWhere("criadorDaTarefa",$id)) < 1):?>
<section class="areas apresenta-tarefas">
	<div class="info-areas">
		<img class="img_pesquisa_nao_encontrada" src="html_img/detetivi_pesquisa.jpg" alt="">
	  <h2>Desculpe-nos, mas foi reportado um erro 404, ou seja, página não encontrada. Creio que o suposto usuário ainda não tenha nenhuma tarefa cadastrada no sistema.</h2>
      <p><a href="dashboard.php">Visualizar tarefas existentes</a></p>
    <div class="hide"></div>
    </div>
</section>
<?php 
endif;?>