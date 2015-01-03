<section class="areas area-text-post">
	    <form method="post" action="tarefa_controller.php?cadastrar">
	        <input type="text" name="titulo" id="titulo" placeholder="Titulo da terefa." value="<?php echo isset($_COOKIE["retornaTitulo"]) ? $_COOKIE["retornaTitulo"]:""; ?>">

			<textarea name="texto" class="textarea-post" cols="2" rows="10" placeholder="Escreva uma terefa..."><?php echo isset($_COOKIE["retornoTexto"]) ? $_COOKIE["retornoTexto"]:""; ?></textarea>
			
			<select name="tarefa_para_usuario" id="tarefa_para_usuario">
				<option value="">Escolha a quem atribuir esta Tarefa...</option>
				<?php 
				foreach($usuario->listar() as $listar):?>
                   <option value="<?php echo $listar->id;?>"><?php echo $listar->nome; ?></option>
				<?php endforeach;?>
			</select> <br>
			<button type="submit" class="button-postar">Publicar</button>
		</form>
</section>		