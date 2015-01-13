<?php 
class TarefasRelatorios
{
	private $tarefas;
	private $quantidade;
	private $finalizadas;

	public function __construct($tarefas)
	{
		$this->tarefas = $tarefas;
		$this->quantidade = $this->quantidadeDeTarefas();
		$this->finalizadas = $this->tarefasFinalizadas();
	}

	public function quantidadeDeTarefas()
	{
		return count($this->tarefas->listar());
	}

	public function tarefasPendentes()
	{
		return count($this->tarefas->listarTarefasWhere("situacao",1));
	}

	public function tarefasSendoFeitas()
	{
		return count($this->tarefas->listarTarefasWhere("situacao",2));
	}

	public function tarefasFinalizadas()
	{
		return count($this->tarefas->listarTarefasWhere("situacao",3));
	}

	public function previsaoDeConclusao()
	{
		$razao = $this->finalizadas / $this->quantidade;
	    $razaoCentesimal = ceil($razao * 100);
	    return $razaoCentesimal;
	}
}