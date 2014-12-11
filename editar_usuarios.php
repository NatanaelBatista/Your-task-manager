<h3>Editar Usuario: <small class="small_aux"><?php echo $_nome; ?></small> | Cadastrado desde: <small class="small_aux"><?php echo $_dataCadastro; ?></small></h3>
<form method="post" action="usuario_controller.php?editar&id=<?php echo $_id;?>" class="form-login form-normal">
	<label for="nome">Nome:</label> <br>
	<input type="text" name="nome" id="nome" placeholder="Digite o nome..." value="<?php echo $_nome; ?>"> <br>
			
	<label for="email">Email <small>( Será usado como login )</small>:</label> <br>
	<input type="text" name="login" id="email" placeholder="Digite o email do Usuario." value="<?php echo $_login; ?>"> <br>

	<label for="senha">Senha <small>( Escolha uma senha temporária )</small>:</label> <br>
	<input type="password" name="senha" id="senha" placeholder="Escolha uma senha" value="<?php echo $_senha; ?>"> <br>
    
    <label for="repita_senha">Repita sua Senha:</label> <br>
    <input type="password" name="repitaSenha" id="repita_senha" placeholder="Escolha uma senha" value="<?php echo $_senha; ?>"> <br>
    
    <label for="perfil">Perfil do Usuario:</label> <br>
    <input type="radio" name="perfil" value="1" id="perfil" class="perfil" <?php echo isset($master) ? $master:""; ?>> <label for="master">Master</label> <br>
    <?php if ($_SESSION["idUsuario"] != $_GET["id"]): /*O usuario Master não pode trocar o próprio perfil*/  ?>
    <input type="radio" name="perfil" value="2" id="perfil" class="perfil" <?php echo isset($funcionario) ? $funcionario:""; ?>> <label for="funcionario">Funcionario</label> <br>
    <?php endif; ?>
    <button type="submit" class="button-postar" id="entrar">Cadastrar Mudanças</button> 
</form>