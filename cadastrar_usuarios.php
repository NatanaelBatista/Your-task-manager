<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();

require_once("layout_parts/header.php");
require_once("layout_parts/banner.php");
require_once("utilidades/functions.php");
require_once("validaSession.php");

if (isset($_GET["editar"]))
{
    $id = (int) $_GET["id"];
    foreach($usuario->listarWhere("id",$id) as $listar)
    {
        $_id = $listar->id;
        $_nome = $listar->nome;
        $_login = $listar->login;
        $_senha = $listar->senha;
        $_dataCadastro = $listar->dataCadastro;
        $_perfil = $listar->perfil;
    }

    $master = "unchecked";
    $funcionario = "unchecked";
    /**
    * Verifica o tipo do perfil e destaca o radio button
    */
    if ($_perfil == "1")
    {
        $master = "checked";
    }
    elseif ($_perfil == "2")
    {
        $funcionario = "checked";
    }
}
?>

	<article class="main">
	<section class="right">

    <?php if (isset($_COOKIE["msgSucesso"])): ?>
        <section class="fotter-index msgErro msgSucesso">
            <?php echo $_COOKIE["msgSucesso"]; ?>
        </section>
    <?php endif; ?>

		<section class="areas">
        <?php 
        /**
        * Se existir a variável "editar" inclui o form de editar
        */
        if (isset($_GET["editar"]))
        {
            require_once("editar_usuarios.php");
        }
        else
        {
        ?>
	     <h3>Cadastrar Usuario</h3>

	     <form method="post" action="usuario_controller.php?cadastrar" class="form-login form-normal">
			<label for="nome">Nome:</label> <br>
			<input type="text" name="nome" id="nome" placeholder="Digite o nome..."> <br>
			
			<label for="email">Email <small>( Será usado como login )</small>:</label> <br>
			<input type="text" name="login" id="email" placeholder="Digite o email do Usuario."> <br>

			<label for="senha">Senha <small>( Escolha uma senha temporária )</small>:</label> <br>
			<input type="password" name="senha" id="senha" placeholder="Escolha uma senha"> <br>
            
            <label for="repita_senha">Repita sua Senha:</label> <br>
            <input type="password" name="repitaSenha" id="repita_senha" placeholder="Repita a senha"> <br>

            <label for="perfil">Perfil do Usuario:</label> <br>
            <input type="radio" name="perfil" value="1" id="master"> <label for="master">Master</label> <br>
            <input type="radio" name="perfil" value="2" id="funcionario" checked> <label for="funcionario">Funcionario</label> <br>

			<button type="submit" class="button-postar" id="entrar">Cadastrar</button> 
		</form>
        <?php } /*End else*/ ?>
	    
    <?php if (isset($_COOKIE["msgErro"])): ?>
        <section class="fotter-index msgErro">
            <?php echo $_COOKIE["msgErro"]; ?>
        </section>
    <?php endif; ?>

        </section>
        <p><!--Para ceparar os containers--></p>
        <section class="areas">
        	<h3>Usuarios Cadastrados</h3>

        	<table>
            <thead>
        		<tr class="tr-top">
        			<td>Id</td>
        			<td>Nome</td>
        			<td>Login</td>
        			<td>Perfil</td>
        			<td>Editar</td>
        			<td>Deletar</td>
        		</tr>
            </thead>

            <?php foreach($usuario->listar() as $listar):
            /**
            * Aplica uma legenda para os tipos de perfis
            */
             $tipoPerfil = "";
             if ($listar->perfil == "1")
             {
                $classPerfil = "master";
             	$tipoPerfil = "Master";
             }
             else
             {
                $classPerfil = "funcionario";
             	$tipoPerfil = "Funcionario";
             }
            ?>
                <tr>
                	<td><?php echo $listar->id; ?></td>
                	<td><?php echo $listar->nome; ?></td>
                	<td><?php echo $listar->login; ?></td>
                	<td class="<?php echo $classPerfil ?>"><?php echo $tipoPerfil; ?></td>
                	<td><a href="?editar&id=<?php echo $listar->id;?>" class="editar" title="Editar o Usuario <?php echo $listar->nome; ?>">Editar</a></td>
                	<td><a href="usuario_controller.php?deletar&id=<?php echo $listar->id;?>" class="deletar" title="Deletar o Usuario <?php echo $listar->nome; ?>">Deletar</a></td>
                </tr>

        	<?php endforeach; ?>
        		
        	</table>
        </section>
	</section><!--end right-->

	    <?php 
	      require_once("layout_parts/area_left.php");
	    ?>
    

    <div class="hide"></div>

	</article><!--end main-->
    <?php require_once("layout_parts/fotter.php") ?>

<script>
    var deletar = $(".deletar");
    deletar.click( function() {
        var confirmar = confirm("Deseja realmente deletar esse Usuario?");
        if (confirmar) {
            return true;
        } else {
            return false;
        }
    })
</script>
</body>
</html>
