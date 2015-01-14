<script src="js/jquery-1.11.0.js"></script>
<script	src="js/jquery-ui.min.js"></script>
<script	src="js/hideMsg.js"></script>
<script	src="js/deletarTarefas.js"></script>
<script src="editor/ckeditor.js"></script>
<script>
    $(document).ready(function() {
    
    /*Apresenta e oculta o menu de Usuários cadastrados*/
		$(".show_menu_usuarios_cadastrados").click(function() {
			$("#container_lista_usuarios").toggle('fast');
			return false;
	    });
        
        /*Busca ajax*/
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
        
        /*Auto complete*/
		$(function() {
			$("#input_pesquisa").autocomplete({
				source: dadosPesquisa
			});
		})
	}); // end jquery
	
	hideMsg();
	deletarTarefas();
</script>