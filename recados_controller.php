<?php 
session_start();
/**
* Controller do Model-RecadosModel
* @author Valdiney França
*/
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$recados = Container::getRecados();

/**
* Cadastra um Recado.
*/
if (isset($_GET["cadastrarRecados"]))
{
	$recado = trim($_POST["recado"]);
	$dataRecado = Date("d/m/Y");

	if (empty($recado))
	{
		setcookie("msgErro","Você não pode publicar sem escrever um recado antes.");
        header("Location:pagina_de_recados.php");
	}
	else
	{
		$recados->setIdUsuarioMandouRecado($_SESSION["idUsuario"]);
		$recados->setDataRecado($dataRecado);
		$recados->setRecado($recado);
		if ($recados->cadastrarRecados())
		{
			setcookie("msgSucesso","Recado enviado com Sucesso.");
    		header("Location:pagina_de_recados.php");
		}
	}
}

/**
* Deleta um Recado.
*/
if (isset($_GET["deletar"]))
{
	$id = (int) $_GET["id"];
	if ($recados->deletar($id))
	{
		setcookie("msgSucesso","Recado Deletado com Sucesso.");
    	header("Location:pagina_de_recados.php");
	}
}

/**
* Deletar Multiplos Recados
*/
if (isset($_GET["deletarMultiploRecados"]))
{
	$campo = $_POST["check_recados"];
	$quantidade = count($_POST["check_recados"]);

	if ($quantidade < 1)
	{
		setcookie("msgErro","Selecione algum Recado antes de tentar Deletar.");
        header("Location:configuracao_geral.php");
	}

	for ($cont = 0; $cont < $quantidade; $cont++)
	{
		if ($recados->deletar($campo[$cont]))
		{
			setcookie("msgSucesso","Recados Deletados com Sucesso.");
            header("Location:configuracao_geral.php");
		}
	}
}

/**
* Edita um Recado.
*/
if (isset($_GET["editarRecados"]))
{
	$id = (int) $_GET["id"];
	$recado = trim($_POST["recado"]);
	$recados->setRecado($recado);
	if ($recados->editar($id))
	{
		setcookie("msgSucesso","Recado Editado com Sucesso.");
    	header("Location:pagina_de_recados.php?prepara_para_editar&id={$id}");
	}
}
/* End of file recados_controller.php */
/* Location: raiz */