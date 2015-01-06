<?php 
/**
* Funções usadas em varias partes do sistema
* @author Valdiney França
*/

/**
* Delimita uma String de acordo com valores passados via argumentos.
* @return Array
*/
function DelimitarPorTamnho($entrada,$tamanho,$acabamento) 
{
	$saida = str_split($entrada,$tamanho);
    return $saida[0].$acabamento;
}

/**
* Delimita por caracteres.
* @return Array
*/
function Delimitar($d,$entrada,$p) 
{
	$saida = explode($d,$entrada);
	return $saida[$p];
}

/**
* Função recebe um inteiro e retorna uma legenda 
* para cada valor entrado e devidamente verificado
* @param Int - $situacao
* @return String
*/
function situacaoTarefa($situacao)
{
	if ($situacao == "1")
	{
		return "Pendente";
	}
	elseif ($situacao == "2")
	{
		return "Sendo Feita";
	}
	elseif ($situacao == "3")
	{
		return "Feita";
	}
}

/**
* Deleta Cookies depois da atualização da página
*/
function deletaCookie()
{
  /**
  * Destroi o Cookie de "mensagens de erro e de sucesso" depois que a página é atualizada
  */
    setcookie("msgErro", "", time()-3600);
    setcookie("msgSucesso", "", time()-3600);
  
  /**
  * Destroi os cookie´s que são criado no momento de tentar cadastrar um usuario ou tarefas,
  * mas é barrado pela validação.
  */

    /* Cookies da página cadastrar_usuarios.php */
    setcookie("retornaNome", "", time()-3600);
    setcookie("retornoLogin", "", time()-3600);
    
    /* Cookies da página area_textarea_postagem.php */
    setcookie("retornaTitulo", "", time()-3600);
    setcookie("retornoTexto", "", time()-3600);
}
/* End of file functions.php */
/* Location: utilidades */