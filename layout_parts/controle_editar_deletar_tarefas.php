<?php 
/**
* Arquivo chamado nas páginas que apresentam as tarefas, trata-se das opções de deletar e editar as tarefas.
*/
?>
<a href="editar_tarefas.php?editar&id=<?php echo $listar->idTarefas;?>" class="editar" title="Editar essa Tarefa">Editar</a> |
<a href="tarefa_controller.php?deletar&id=<?php echo $listar->idTarefas;?>" class="deletar" title="Deletar essa Tarefa">Deletar</a> |
<small>Tarefa criada por: <?php echo $listar->nome; ?></small>