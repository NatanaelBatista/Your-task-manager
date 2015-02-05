<?php
/**
* Class que gera o resultado do relatório de Usuarios
* @var $usuarios - Recebe uma instancia do objeto que representa a class UsuariosModel
* @author Valiney França
*/ 
class UsuariosRelatorios
{
	private $usuarios;
	private $quantidadeGeral;
	private $quantidadeMaster;
	private $quantidadeFuncionarios;

	public function __construct($usuarios)
	{
		$this->usuarios = $usuarios;
		$this->quantidadeMaster = $this->quantidadeDeUsuariosMaster();
		$this->quantidadeFuncionarios = $this->quantidadeDeUsuariosFuncionario();
	}

	public function usuariosCadastrados()
	{
		return count($this->usuarios->listar());
	}

	public function quantidadeDeUsuariosMaster()
	{
		return count($this->usuarios->listarWhere("perfil", 1));
	}

	public function quantidadeDeUsuariosFuncionario()
	{
		return count($this->usuarios->listarWhere("perfil", 2));
	}
}
/* End of file UsuariosRelatorios.class.php */
/* Location: utilidades */