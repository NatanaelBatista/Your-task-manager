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

 if (isset($_POST))
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
        * Também verifica se está tentando editar um usuário com perfil Super Master
        */
        if (isset($_GET["editar"]))
        {
            $id = (int) $_GET["id"];
            foreach($usuario->listarWhere("id", $id) as $listar)
            {
                $retornaPerfilMasterMaster = $listar->perfil_master_master;
                $retornaPerfilMaster = $listar->perfil;
                $retornaIdUsuario = $listar->id;
            }
            
            if ($retornaPerfilMasterMaster == "1" and $_SESSION["perfil_master_master"] != "1")
            {
                setcookie("msgErro","Você não tem permissão para Editar um Usuario com Perfil ( Super Master )");
                header("Location:cadastrar_usuarios.php");
            }
            elseif ($retornaPerfilMaster == "1" and $_SESSION["perfil"] == "1" and $_SESSION["idUsuario"] != $retornaIdUsuario and $_SESSION["perfil_master_master"] != "1") {
                setcookie("msgErro","Um Usuário portador do perfil Master não pode editar um outro usuário com o mesmo perfil.");
                header("Location:cadastrar_usuarios.php");
            }
            else
            {
                require_once("editar_usuarios.php");
            }
        }
        else
        {  /**
            * Verifica se esse kookie existe
            */
           if (isset($_COOKIE["retornoPerfil"]))
           {
               $master = "unchecked";
               $funcionario = "unchecked";
               /**
               * Verifica o tipo do perfil e destaca o radio button
               */
               if ($_COOKIE["retornoPerfil"] == "1")
               {
                    $master = "checked";
               }
               elseif ($_COOKIE["retornoPerfil"] == "2")
               {
                    $funcionario = "checked";
               }
           }
        ?>
	     <h3>Cadastrar Usuario</h3>

	     <form method="post" action="usuario_controller.php?cadastrar" class="form-login form-normal">
			<label for="nome">Nome:</label> <br>
			<input type="text" name="nome" id="nome" placeholder="Digite o nome..." value="<?php echo isset($_COOKIE["retornaNome"]) ? $_COOKIE["retornaNome"]:""; ?>"> <br>
			
			<label for="email">Email <small>( Será usado como login )</small>:</label> <br>
			<input type="text" name="login" id="email" placeholder="Digite o email do Usuario." value="<?php echo isset($_COOKIE["retornoLogin"]) ? $_COOKIE["retornoLogin"]:""; ?>"> <br>

			<label for="senha">Senha <small>( Escolha uma senha temporária )</small>:</label> <br>
			<input type="password" name="senha" id="senha" placeholder="Escolha uma senha"> <br>
            
            <label for="repita_senha">Repita sua Senha:</label> <br>
            <input type="password" name="repitaSenha" id="repita_senha" placeholder="Repita a senha"> <br>

            <label for="perfil">Perfil do Usuario:</label> <br>
            <input type="radio" name="perfil" value="1" id="master" <?php echo isset($master) ? $master:""; ?>> <label for="master">Master</label> <br>
            <input type="radio" name="perfil" value="2" id="funcionario" <?php echo isset($funcionario) ? $funcionario:"checked"; ?>> <label for="funcionario">Funcionario</label> <br>

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
             if ($listar->perfil == "1" and $listar->perfil_master_master != "1")
             {
                $classPerfil = "master";
             	$tipoPerfil = "Master";
             }
             elseif ($listar->perfil == "1" and $listar->perfil_master_master == "1")
             {
                $classPerfil = "master";
                $tipoPerfil = "Super Master";
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
                    <td><a href="usuario_controller.php?deletar&id=<?php echo $listar->id;?>" class="deletar" title="Deletar o Usuario <?php echo $listar->nome; ?>">Deletar</a></td>                </tr>

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
</body>
</html>
