<?php 
/**
* Página carrega as Classes usadas pelo Sistema.
*/
require_once("config/translation_en.php");
require_once("db/Conexao.class.php");
require_once("config/Container.class.php");

/*Classes contidas na pasta Models*/
require_once("models/UsuarioModel.class.php");
require_once("models/TarefasModel.class.php");
require_once("models/UsuariosOnlineModel.class.php");
require_once("models/LoginModel.class.php");
require_once("models/RecadosModel.class.php");
require_once("models/ArquivoModel.class.php");

/*Classes contidas na pasta Utilidades*/
require_once("utilidades/SendMail.class.php");
require_once("utilidades/TarefasRelatorios.class.php");
require_once("utilidades/UsuariosRelatorios.class.php");
require_once("utilidades/TheUploadFiles.class.php");

/*Chamando as Instancias dos objetos*/
$usuario    = Container::getUsuario();
$tarefas    = Container::getTarefas();
$loginModel = Container::getLoginModel();
$arquivos   = Container::getArquivos();
$recados = Container::getRecados();
$usuariosRelatorios = Container::getUsuariosRelatorios();
$TarefasRelatorios = Container::getTarefasRelatorios();
/*End*/