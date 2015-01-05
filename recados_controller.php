<?php 
session_start();
/**
* Controller do Model-RecadosModel
* @author Valdiney França
*/
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$recados = Container::getRecados();

if (isset($_GET["cadastrarRecados"]))
{
	$recado = strip_tags(trim($_POST["recado"]));
	$dataRecado = Date("d/m/Y");

	if (empty($recado))
	{
		setcookie("msgErro","Escreva um Recado antes de tentar enviar.");
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