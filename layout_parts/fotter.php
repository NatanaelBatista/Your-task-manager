<script	src="js/jquery-ui.min.js"></script>
<script	src="js/hideMsg.js"></script>
<script	src="js/deletarTarefas.js"></script>
<script>
    $(document).ready(function() {

		$(".show_menu_usuarios_cadastrados").click(function() {
			$("#container_lista_usuarios").toggle('fast');
			return false;
	    });
        
        // Busca ajax
       var dadosPesquisa = [];
        $.post("tarefa_controller.php", 
        {
           buscaAutoComplete:""
        }, function(data) {
           var res = data.split("/");
           for (var cont = 0; cont < res.length; cont++)
           {
           	 dadosPesquisa[cont] = res[cont];
           }
        });
        
        // Auto complete
		$(function() {
			$("#input_pesquisa").autocomplete({
				source: dadosPesquisa
			});
		})

	});
	
	hideMsg();
	deletarTarefas();
</script>