function deletarTarefas() {
var deletar = $(".deletar");
	deletar.click( function() {
		var confirmar = confirm("Deseja realmente deletar essa Tarefa?");
		if (confirmar) {
			return true;
		} else {
			return false;
		}
   })
}