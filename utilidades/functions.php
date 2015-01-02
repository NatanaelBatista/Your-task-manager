<?php 
/**
* Delimita uma String de acordo com valores passados via argumentos
*/
function DelimitarPorTamnho($entrada,$tamanho,$acabamento) 
{
	$saida = str_split($entrada,$tamanho);
    return $saida[0].$acabamento;
}

/**
* Delimita por caracteres
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