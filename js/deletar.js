/**
* Função verifica se o Usuário atual realmente deseja deletar dados da aplicação...
*/
function deletar(disparador, mensagem)
{
	disparador.onclick = function()
	{
		var confirmar = confirm(mensagem);
		if (confirmar)
		{
			return true;
		}

		return false;
	}
}