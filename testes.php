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
 
 
 if (isset($_GET["mandar"]))
 {
 	$campo = $_POST["check"];
 	$quantidade = count($_POST["check"]);
 	for ($cont = 0; $cont < $quantidade; $cont++)
 	{
 		echo var_dump($campo[$cont]);
 	}
 }

 

?>

<form method="post" action="testes.php?mandar">
<!--<input type="text" name="input" value="052.115.185-28">-->
<br>

<?php 
  foreach($arquivos->select() as $listar):
  	echo $listar->id;
?>

<input type="checkbox" name="check[]" value="<?php echo $listar->id; ?>">

<?php endforeach; ?>
<button type="submit">Mandar</button>
</form>

    