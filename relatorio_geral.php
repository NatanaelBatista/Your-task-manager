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
    
<section class="areas apresenta-tarefas">

<h1 class="h1-title-tarefas">Relatório Geral de atividades</h1>

<div class="info-areas">
Relatório das Terefas
        	<table>
            <thead>
        		<tr class="tr-top">
        			<td>Tarefas</td>
        			<td>Pendentes</td>
        			<td>Em Andamento</td>
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

<!------------------------------------------------------------------------------------------------>
<br>
Relatório dos Usuários
            <table>
            <thead>
                <tr class="tr-top">
                    <td>Usuarios</td>
                    <td>Usuarios Master</td>
                    <td>Usuarios Funcionarios</td>
                </tr>
            </thead>

                <tr>
                    <td><?php echo $usuariosRelatorios->usuariosCadastrados();              ?></td>
                    <td><?php echo $usuariosRelatorios->quantidadeDeUsuariosMaster();       ?></td>
                    <td><?php echo $usuariosRelatorios->quantidadeDeUsuariosFuncionario();  ?></td>           
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
	<?php require_once("layout_parts/footer.php"); ?>
</body>
</html>