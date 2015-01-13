<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$loginModel = Container::getLoginModel();
$TarefasRelatorios = Container::getTarefasRelatorios();
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
    
<section class="areas apresenta-tarefas">

<h1 class="h1-title-tarefas">Relatório Geral de atividades</h1>
<div class="info-areas">

        	<table>
            <thead>
        		<tr class="tr-top">
        			<td>Tarefas</td>
        			<td>Pendentes</td>
        			<td>Sendo Feita</td>
        			<td>Finalizadas</td>
        			<td>Previsão de conclusão</td>
        		</tr>
            </thead>

                <tr>
                	<td><?php echo $TarefasRelatorios->quantidadeDeTarefas(); ?></td>
                    <td><?php echo $TarefasRelatorios->tarefasPendentes();    ?></td>
                    <td><?php echo $TarefasRelatorios->tarefasSendoFeitas();  ?></td>   
                    <td><?php echo $TarefasRelatorios->tarefasFinalizadas();  ?></td>   
                    <td><?php echo $TarefasRelatorios->previsaoDeConclusao() . "%"; ?></td>          
                </tr>

        	</table>

</div><!-- end info areas -->
</section>
    
	<?php if (isset($_COOKIE["msgErro"])): ?>
        <section class="fotter-index msgErro">
            <?php echo $_COOKIE["msgErro"]; ?>
        </section>
    <?php endif; ?>

	
		
	</section><!--end right-->

	    <?php 
	      require_once("layout_parts/area_left.php");
	    ?>
    <div class="hide"></div>

	</article><!--end main-->
	<?php require_once("layout_parts/fotter.php") ?>
</body>
</html>