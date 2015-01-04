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
/* End of file functions.php */
/* Location: utilidades */