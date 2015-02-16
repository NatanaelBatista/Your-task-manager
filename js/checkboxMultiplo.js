/**
* Função Seleciona todos os Checkbox via o CheckBox Master...
*/

function selecionarTodos(todosCheckBox, selecionarCheckbox)
{
	selecionarCheckbox.onclick = function()
	{
		for (var cont = 0; cont < todosCheckBox.length; cont++)
		{
			if (selecionarCheckbox.checked == false)
			{
				todosCheckBox[cont].checked = false;
			}

			if (selecionarCheckbox.checked == true)
			{
				todosCheckBox[cont].checked = true;
			}
		}
	}
}