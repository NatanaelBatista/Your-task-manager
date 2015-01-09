<?php 
$bannerIndexPage = 'id="pagina_index"';
require_once("layout_parts/header.php");
require_once("layout_parts/banner.php");

?>

	<article class="main">
	<section class="areas login">
		
	<div id="area-fazer-login">
		<h3>Fazer login:</h3>
		<form method="post" action="login_controller.php?login" class="form-login">
			<label for="login">Login:</label> <br>
			<input type="text" name="login" id="login" placeholder="Digite o seu Email..."> <br>
			
			<label for="senha">Senha:</label> <br>
			<input type="password" name="senha" id="senha" placeholder="Digite a sua Senha."> <br>

			<button type="submit" class="button-postar" id="entrar">Entrar</button> 
			<a href="#" id="link-recuperar-senha">Esqueci a minha Senha</a>
		</form>
    </div><!-- end fazer login -->

    <div id="area-recuperar-senha">
    	<h3>Recuperar Senha:</h3>
		<form method="post" action="login_controller.php?login" class="form-login">
			<label for="login-email">Login:</label> <br>
			<input type="text" name="login_email" id="login-email" placeholder="Digite o seu Email..."> <br>

			<button type="button" class="button-postar" id="button-verifica-email">Verificar</button> 
			<a href="#" id="link-fazer-login">Fazer Login</a>
		</form>
		<b id="resposta-ajax-email"></b>
	</div><!-- end recuperar senha -->

	<?php if (isset($_COOKIE["msgErro"])): ?>
		<section class="fotter-index msgErro">
			<?php echo $_COOKIE["msgErro"]; ?>
        </section>
    <?php endif; ?>

    </section>
    <section class="fotter-index">
        ULA-GROUP (Grupo de estudos em Informática)
    </section>

    <div class="hide"></div>
    
	</article><!--end main-->
    <script src="js/jquery-1.11.0.js"></script>
	<script>
	$(document).ready(function() {
		/**
		* Apresenta e oculta as áreas de login e recuperar senha
		*/
		var areaFazerLogin = $("#area-fazer-login"),
		    areaRecuperarSenha = $("#area-recuperar-senha"),
		    linkRecuperarSenha = $("#link-recuperar-senha"),
		    linkFazerLogin = $("#link-fazer-login");

		    areaRecuperarSenha.hide();
		    linkRecuperarSenha.on('click',function() {
		    	areaFazerLogin.slideUp('slow');
		    	areaRecuperarSenha.slideDown('slow');
		    });

		    linkFazerLogin.on('click',function() {
		    	areaFazerLogin.slideDown('slow');
		    	areaRecuperarSenha.slideUp('slow');
		    });

            /**
            * Requisição ajax para verificar se existe um email cadastrado
            */
		    $("#button-verifica-email").on('click', function() {
		    	var loginEmail = $("#login-email"),
		    	    respostaAjaxEmail = $("#resposta-ajax-email");
		    	    respostaAjaxEmail.text("Verificando...");

             	$.post("usuario_controller.php",
                  {
                     recuperarSenha: loginEmail.val()
                  }, function(data) {
                    respostaAjaxEmail.text("");
                    var explode = data.split("<br />",data);
                    /**
                    * Infelizmente uma gambiarra para não retornar validação incoerente 
                    * quando o sistema estiver rodando localmente sem a função “mail” 
                    * configurada no php.ini 
                    */
                  	if (data[0] == "<") {
                  		respostaAjaxEmail.attr('class', 'verde');
                  		respostaAjaxEmail.text("Verifique o seu Email para recuperar sua Senha.");
                  	} 
                  	else {
                  		respostaAjaxEmail.attr('class', 'vermelho');
                  		respostaAjaxEmail.text("Esse Email não está cadastrado no Sistema.");
                  	}

                  });
             });
	});
	</script>
</body>
</html>
