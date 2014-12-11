<?php 
session_start();
require_once("loaderClasses.php");
$tarefas = Container::getTarefas();

/**
* Cadastrar uma tarefa
*/
if (isset($_GET["cadastrar"]))
{
	$titulo = strip_tags(trim($_POST["titulo"]));
	$texto = strip_tags(trim($_POST["texto"]));
	$tarefaPara = strip_tags(trim($_POST["tarefa_para_usuario"]));
	$fazer = "1";
	$criadorDaTarefa = $_SESSION["idUsuario"];
    
	if (empty($titulo) or empty($texto) or empty($tarefaPara))
	{
		setcookie("msgErro","Todos os campos são obrigatórios.");
		header("Location:dashboard.php");
	}
	else
	{
		$tarefas->setTitulo($titulo);
		$tarefas->setTexto($texto);
		$tarefas->setVinculoUsuario($tarefaPara);
		$tarefas->setDataCadastro(Date("d/m/Y"));
		$tarefas->setFazer($fazer);
		$tarefas->setCriadorDaTarefa($criadorDaTarefa);
		if ($tarefas->cadastrarTarefa())
		{
			setcookie("msgSucesso","Tarefa Cadastrada com Sucesso.");
    		header("Location:dashboard.php");
		}
	}
}

/**
* Deletar uma Tarefa
*/
if (isset($_GET["deletar"]))
{
	$id = (int) $_GET["id"];
	if ($tarefas->deletar($id))
	{
		setcookie("msgSucesso","Tarefa Deletada com Sucesso.");
    	header("Location:dashboard.php");
	}
}