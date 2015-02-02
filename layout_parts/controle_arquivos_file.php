<?php 
/**
* Página apresenta os controles de Deletar, Atualizar e Visualizar os Arquivos.
*/
?>
<div class="mostra_baixar">

	<?php if (file_exists($listar->caminhoArquivo)):?>
	   <a class="link_visualizar" href="<?php echo $listar->caminhoArquivo;?>" target="_blank">Visualizar</a> | 
	<?php endif; ?>

	<?php if ($_SESSION["perfil"] != 2 and $_SESSION["perfil"] != 1):?>

      <a href="?editar&id=<?php echo $listar->id;?>">Editar</a> |
	    <a class="deletar-arquivo-file" href="arquivos_controller.php?deletar&id=<?php echo $id; ?>">Deletar</a>
  	
  <?php endif; ?>

  <?php if ($_SESSION["idUsuario"] == $listar->idUsuario or $_SESSION["perfil_master_master"] = 1):?>
         
      <a href="?editar&id=<?php echo $listar->id;?>">Editar</a> |
	    <a class="deletar-arquivo-file" href="arquivos_controller.php?deletar&id=<?php echo $id; ?>">Deletar</a>
  	
  <?php endif; ?>

</div>