<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$loginModel = Container::getLoginModel();
require_once("layout_parts/header.php");
require_once("layout_parts/banner.php");
require_once("validaSession.php");

function quantidadeDeTarefas($tarefas)
{
	return count($tarefas->listar());
}

function tarefasPendentes($tarefas)
{
	return count($tarefas->listarTarefasWhere("situacao",1));
}

function tarefasSendoFeitas($tarefas)
{
	return count($tarefas->listarTarefasWhere("situacao",2));
}

function tarefasFinalizadas($tarefas)
{
	return count($tarefas->listarTarefasWhere("situacao",3));
}

$quantidade = quantidadeDeTarefas($tarefas);
$finalizadas = tarefasFinalizadas($tarefas);

function previsaoDeConclusao($quantidade,$finalizadas)
{
	$razao = $finalizadas / $quantidade;
	$razaoCentesimal = ceil($razao * 100);
	return $razaoCentesimal;
}
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
                	<td><?php echo quantidadeDeTarefas($tarefas); ?></td>
                    <td><?php echo tarefasPendentes($tarefas); ?></td>
                    <td><?php echo tarefasSendoFeitas($tarefas); ?></td>   
                    <td><?php echo tarefasFinalizadas($tarefas); ?></td>   
                    <td><?php echo previsaoDeConclusao(quantidadeDeTarefas($tarefas), tarefasFinalizadas($tarefas)) . "%"; ?></td>          
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