<script src="js/jquery-1.11.0.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.fs.selecter.min.js"></script>
<script src="js/hideMsg.js"></script>
<script src="editor/ckeditor.js"></script>
<script src="js/deletar.js"></script>
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
    
    
    $("select").selecter();
    
	}); // end jquery
	
	hideMsg();
  
	var buttonDeletarTarefas = document.querySelectorAll(".deletar");
      for (var cont = 0, max = buttonDeletarTarefas.length; cont < max; cont += 1)
      {
        var mensagem = "Deseja realmente deletar essa Tarefa?";
            deletar(buttonDeletarTarefas[cont], mensagem);
      }
</script>