<?php 
/**
* Class responsável por manter a persistência dos arquivos na Tabela Arquivos.
* @var private - $db - Recebe um método da class do tipo conexao.
* @author Valdiney França
*/
class ArquivoModel 
{
	private $nome;
	private $caminhoArquivo;
	private $dataPostagem;
	private $idUsuario;
	private $tableName = "arquivos";
	private $db;

	public function __construct(PDO $conexao)
	{
		$this->db = $conexao;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function setCaminhoArquivo($caminhoArquivo)
	{
		$this->caminhoArquivo = $caminhoArquivo;
	}

	public function setDataPostagem($dataPostagem)
	{
		$this->dataPostagem = $dataPostagem;
	}

	public function setIdUsuario($idUsuario)
	{
		$this->idUsuario = $idUsuario;
	}

	public function insert()
	{
		$cadastrar = $this->db->prepare("insert into {$this->tableName} (nome, caminhoArquivo, dataPostagem, idUsuario) values(?,?,?,?)");
		$cadastrar->execute(array($this->nome, $this->caminhoArquivo, $this->dataPostagem, $this->idUsuario));
		return $cadastrar;
	}

	public function listarWhere($campo, $value)
	{
		if ($campo == "id")
		{
			$value = (int) $value;
		}

		$query = $this->db->prepare("select * from {$this->tableName} where {$campo} = ?");
		$query->execute(array($value));
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	public function select()
	{
		$query = $this->db->prepare("select * from {$this->tableName}");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	public function verificaNomeDeArquivo($campo, $value)
	{
		$query = $this->db->prepare("select * from {$this->tableName} where {$campo} = ?");
		$query->execute(array($value));

		if ($query->rowCount())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function deletar($id)
	{
		$id = (int) $id;
		$deletar = $this->db->prepare("delete from {$this->tableName} where id = ?");
		$deletar->execute(array($id));
		return $deletar;
	}
}