<?php 
/**
* Delimita uma String de acordo com valores passados via argumentos
*/
function DelimitarPorTamnho($entrada,$tamanho,$acabamento) 
{
	$saida = str_split($entrada,$tamanho);
    return $saida[0].$acabamento;
}