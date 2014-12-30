<?php 
session_start();
/**
* Essa página altera os dados do Usuario Corrente
*/
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();

require_once("layout_parts/header.php");
require_once("layout_parts/banner.php");
require_once("utilidades/functions.php");
require_once("validaSession.php");

if (isset($_GET["alterarMeusDados"]))
{
    $id = (int) $_SESSION["idUsuario"];
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
        
<h3>Editar Usuario: <small class="small_aux"><?php echo $_nome; ?></small> | Cadastrado desde: <small class="small_aux"><?php echo $_dataCadastro; ?></small></h3>
<form class="form" method="post" action="usuario_controller.php?editar&id=<?php echo $_id;?>&alterarUsuarioCorrente" class="form-login form-normal">
    <label for="nome">Nome:</label> <br>
    <input type="text" name="nome" id="nome" placeholder="Digite o nome..." value="<?php echo $_nome; ?>"> <br>
            
    <label for="email">Email <small>( Será usado como login )</small>:</label> <br>
    <input type="text" name="login" id="email" placeholder="Digite o email do Usuario." value="<?php echo $_login; ?>"> <br>

    <label for="senha">Senha:</label> <br>
    <input type="password" name="senha" id="senha" placeholder="Escolha uma senha" value="<?php echo $_senha; ?>"> <br>

    <label for="repita_senha">Repita sua Senha:</label> <br>
    <input type="password" name="repitaSenha" id="repita_senha" placeholder="Escolha uma senha" value="<?php echo $_senha; ?>"> <br>
            
    <label for="perfil">Perfil do Usuario:</label> <br>
    <?php 
    /**
    * Apresenta apenas o perfil de cada funcionario, sendo que ele não pode mudar o proprio perfil
    */
    if ($_SESSION["perfil"] == "1") 
    {
    ?>
    <input type="radio" name="perfil" value="1" id="perfil" class="perfil" <?php echo isset($master) ? $master:""; ?>> <label for="master">Master</label> <br>
    <?php 
    }
    else
    {
    ?>
    <input type="radio" name="perfil" value="2" id="perfil" class="perfil" <?php echo isset($funcionario) ? $funcionario:""; ?>> <label for="funcionario">Funcionario</label> <br>
    <?php
    } /*End else*/
    ?>
    <button type="submit" class="button-postar" id="entrar">Cadastrar Mudanças</button> 
</form>

    <?php if (isset($_COOKIE["msgErro"])): ?>
        <section class="fotter-index msgErro">
            <?php echo $_COOKIE["msgErro"]; ?>
        </section>
    <?php endif; ?>

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
