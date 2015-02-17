<?php 
/**
* Funções usadas em varias partes do sistema
* @author Valdiney França
*/

/**
* Delimita uma String de acordo com valores passados via argumentos.
* @return Array
*/
function DelimitarPorTamnho($entrada, $tamanho, $acabamento) 
{
	$saida = str_split($entrada, $tamanho);
  return $saida[0].$acabamento;
}

/**
* Delimita por caracteres.
* @return Array
*/
function Delimitar($d, $entrada, $p) 
{
	$saida = explode($d, $entrada);
  if (empty($saida[$p]))
  {
    return " ";
  }

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
		return "Em andamento";
	}
	elseif ($situacao == "3")
	{
		return "Feita";
	}
}

function situacaoPerfil($perfil)
{
  //Escrever aqui seu code...
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

/**
* Função usa o email do Usuário para acessar a API do Gravar e retornar 
* uma imagem para perfil.
* @param String - $email
* @param Int - $size
* @return String - $email - hash
*/
function requisicaoGravatarAPI($email,$size)
{
   return $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;
}
/* End of file functions.php */
/* Location: utilidades */