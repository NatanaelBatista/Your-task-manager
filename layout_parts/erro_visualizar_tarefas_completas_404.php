<?php 
/**
* Página 404 para a página que apresenta todas as tarefas cadastradas por cada usuario
*/
if (count($usuario->colecaoUsuarioTarefasWhere("tarefas.id",$id)) < 1):?>
<section class="areas apresenta-tarefas">
	<div class="info-areas">
		<img class="img_pesquisa_nao_encontrada" src="html_img/detetivi_pesquisa.jpg" alt="">
	  <h2>Desculpe-nos, mas foi reportado um erro 404, ou seja, página não encontrada. Creio que essa tarefa não está cadastrada no sistema.</h2>
      <p><a href="dashboard.php?pagina=0">Visualizar tarefas existentes</a></p>
    <div class="hide"></div>
    </div>
</section>
<?php 
endif;?>