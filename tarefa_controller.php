<?php 
session_start();
/**
* Controller do Model-TarefasModel
* @author Valdiney França
*/
require_once("loaderClasses.php");
$tarefas = Container::getTarefas();

/**
* Cadastrar uma tarefa
*/
if (isset($_GET["cadastrar"]))
{
	$titulo = strip_tags(trim(ucwords($_POST["titulo"])));
	$texto = strip_tags(trim($_POST["texto"]));
	$tarefaPara = strip_tags(trim($_POST["tarefa_para_usuario"]));
	$fazer = "1";
	$criadorDaTarefa = $_SESSION["idUsuario"];
    
    /**
    * Grava no Cookie alguns dados digitados no formulário
    * Essa função é chamada quando a validação de entrada encontra alguns erros
    * Tecnica efetuada para que o usuario não perca tudo o que digitou no formulário.
    */
	function seErroValidacao($titulo,$texto,$tarefaPara)
    {
        setcookie("retornaTitulo",$titulo);
        setcookie("retornoTexto",$texto);
    }
    
	if (empty($titulo) or empty($texto) or empty($tarefaPara))
	{
		seErroValidacao($titulo,$texto,$tarefaPara);
		setcookie("msgErro","Todos os campos são obrigatórios.");
		header("Location:dashboard.php?pagina=0");
	}
	else
	{
		$tarefas->setTitulo($titulo);
		$tarefas->setTexto($texto);
		$tarefas->setVinculoUsuario($tarefaPara);
		$tarefas->setDataCadastro(Date("d/m/Y"));
		$tarefas->setSituacao($fazer);
		$tarefas->setCriadorDaTarefa($criadorDaTarefa);
		if ($tarefas->cadastrarTarefa())
		{
			setcookie("msgSucesso","Tarefa Cadastrada com Sucesso.");
    		header("Location:dashboard.php?pagina=0");
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
    	header("Location:dashboard.php?pagina=0");
	}
}

/**
* Deletar Multiplas Tarefas
*/
if (isset($_GET["deletarMultiploTarefas"]))
{
	$campo = $_POST["check_tarefas"];
	$quantidade = count($_POST["check_tarefas"]);

	if ($quantidade < 1)
	{
		setcookie("msgErro","Selecione alguma Tarefa antes de tentar Deletar.");
        header("Location:configuracao_geral.php");
	}

	for ($cont = 0; $cont < $quantidade; $cont++)
	{
		if ($tarefas->deletar($campo[$cont]))
		{
			setcookie("msgSucesso","Tarefas Deletadas com Sucesso.");
            header("Location:configuracao_geral.php");
		}
	}
}


/**
* Editar tarefas
*/
if (isset($_GET["editar"]))
{
	$id = (int) $_GET["id"];
	$titulo = strip_tags(trim($_POST["titulo"]));
	$texto = strip_tags(trim($_POST["texto"]));
	$tarefaPara = strip_tags(trim($_POST["tarefa_para_usuario"]));
    $situacao = strip_tags(trim($_POST["situacao"]));
    
    if (empty($titulo) or empty($texto) or empty($tarefaPara))
	{
		setcookie("msgErro","Todos os campos são obrigatórios.");
		header("Location:editar_tarefas.php?editar&id={$id}");
	}
	else
	{
		$tarefas->setTitulo($titulo);
		$tarefas->setTexto($texto);
		$tarefas->setVinculoUsuario($tarefaPara);
		$tarefas->setDataAcao(Date("d/m/Y"));
		$tarefas->setSituacao($situacao);
		if ($tarefas->editar($id))
		{
			setcookie("msgSucesso","Tarefa Editada com Sucesso.");
    		header("Location:editar_tarefas.php?editar&id={$id}");
		}
	}
}

/**
* Recupera uma variável do tipo "post" via "ajax" e retorna uma String separada por "/".
*/
if (isset($_POST["buscaAutoComplete"]))
{
    foreach($tarefas->listar() as $listar)
    {
 	    echo $listar->titulo."/";
    }
}
/* End of file tarefas_controller.php */
/* Location: raiz */