<?php
session_start();
/**
* Controller do Model-ArquivoModel 
* @author Valdiney França
*/
require_once("loaderClasses.php");
$arquivos = Container::getArquivos();
$upload = Container::getTheUploadFiles();

/*Cadastrar Aquivos*/
if (isset($_GET["cadastrar"]))
{
	$nomeParaOArquivo = strip_tags(trim(ucwords($_POST["nome_para_o_arquivo"])));
	$nomeDoArquivo = $_FILES["nome_do_arquivo"];
	$dataCadastro = Date("d/m/Y");
	$idUsuario = $_SESSION["idUsuario"];

	if (empty($nomeParaOArquivo) or empty($nomeDoArquivo))
	{
		setcookie("msgErro","Todos os campos são Obrigatórios.");
		header("Location:adicionar_arquivos.php");
	}
	else
	{
        $upload->setInputFile($nomeDoArquivo);
        $upload->sendTo("arquivos/");
        $upload->SetMaxFileSize(1);
        $extensoes = array("pdf", "doc", "docx", "html", "css", "php", "js", "sql", "txt");
        $upload->setExtensions($extensoes);
        
        if ($arquivos->verificaNomeDeArquivo("nome", $nomeParaOArquivo))
		{
		    setcookie("msgErro","Já existe um Arquivo com este Nome.");
		    header("Location:adicionar_arquivos.php");
		}
		elseif ($upload->getErros() == 1)
		{
			setcookie("msgErro","Erro ( Critico ) referente ao tamanho máximo configurado no php.ini, por favor, entre em contato com os administradores do sistema");
		    header("Location:adicionar_arquivos.php");
		}
		elseif ($upload->getErros() == 2)
		{
			setcookie("msgErro","Erro ( Critico ) os argumentos passados nos métodos (setExtensions e sendTo) precisam ser do tipo Array. Entre em contato com os administradores do sistema");
		    header("Location:adicionar_arquivos.php");
		}
		elseif ($upload->getErros() == 3)
		{
			setcookie("msgErro","Ultrapaçou o tamanho limite para Upload definido pelo sistema");
		    header("Location:adicionar_arquivos.php");
		}
		elseif ($upload->getErros() == 4)
		{
			setcookie("msgErro","Esse formato de arquivo não é permitido pelo sistema");
		    header("Location:adicionar_arquivos.php");
		}
        elseif ($upload->move())
        {
        	$arquivos->setNome($nomeParaOArquivo);
		    $arquivos->setCaminhoArquivo($upload->getPath());
		    $arquivos->setDataPostagem($dataCadastro);
		    $arquivos->setIdUsuario($idUsuario);
		    
		    if ($arquivos->insert())
		    {
		    	setcookie("msgSucesso","Arquivo Cadastrado com Sucesso.");
    		    header("Location:adicionar_arquivos.php");
		    }
		    else
		    {
		    	echo "Error";
		    }
        }
	}
}

/*Deletar Arquivos*/
if (isset($_GET["deletar"]))
{
	$id = (int) $_GET["id"];
	foreach($arquivos->listarWhere("id", $id) as $listar)
	{
		$retornoCaminhoDoArquivo = $listar->caminhoArquivo;
	}

	if (!unlink($retornoCaminhoDoArquivo))
	{
		setcookie("msgErro","O arquivo não pode ser Deletado.");
		header("Location:adicionar_arquivos.php");
	}
	else
	{
		if ($arquivos->deletar($id))
		{
			setcookie("msgSucesso","Arquivo Deletado com Sucesso.");
    		header("Location:adicionar_arquivos.php");
		}
	}
}



/* End of file arquivos_controller.php */
/* Location: raiz */