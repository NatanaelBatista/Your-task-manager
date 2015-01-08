<?php 
session_start();
require_once("loaderClasses.php");
$usuario = Container::getUsuario();
$tarefas = Container::getTarefas();
$loginModel = Container::getLoginModel();


$email = "flowck96@hotmail.com";
$default = "layout_parts/me.jpg";
$size = 40;


$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

?>

<img src="<?php echo $grav_url; ?>" alt="" al="yes"/>