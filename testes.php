<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$loginModel = Container::getLoginModel();
require_once("utilidades/TarefasRelatorios.class.php");
$TarefasRelatorios = Container::getTarefasRelatorios();
$arquivos = Container::getArquivos();

// Retirando mascaras de campos
/*
$input = str_replace(".", "", $_POST["input"]);
$input = str_replace("-","",$input);
echo $input;
*/

class soma
{
	public static function emprestimo($valor,$meses)
	{
		$parcelas = $valor / $meses;
		return number_format($parcelas, 2, ',', '.');
	}
}

//echo $soma = "R$: " . soma::emprestimo(2000,12);


$a =  number_format($produto = 1024 * 1024 * 4, 2, '.','.');
$a = explode(".", $a);
echo $a[0];


?>

<form method="post" action="testes.php">
<input type="text" name="input" value="052.115.185-28">
<br>
<button type="submit">Mandar</button>
</form>

    