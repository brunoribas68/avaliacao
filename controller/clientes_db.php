<?php
	if($_POST){
		$conexao = new Conexao();	

		$result = $conexao->selectClientes($_POST['nome']);

		echo $result;
	}
	
	Class Conexao
	{
		private $pdo;
		private $servidor;
		private $senha;
		private $banco;
		private $usuario;

		function __construct()
		{
			$this->servidor = "localhost";
			$this->banco = "avaliacao";
			$this->usuario="root";
			$this->senha="";
			try{
				if(is_null($this->pdo)){
					$this->pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco,$this->usuario,$this->senha,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
					$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
				} 
				
			}
			catch(PDOException $e)
			{
				echo 'ERROR: ' . $e->getMessage();
			}
		}

		public function selectClientes($dados){
			$result = array();
			try
			{
				$mostra = $this->pdo->prepare("SELECT tbl_clientes.id_cliente,tbl_clientes.nome,tbl_clientes.idade,tbl_clientes.telefone,tbl_clientes.endereco,tbl_clientes.id_categoria,tbl_categorias.nome as cat_nome FROM tbl_clientes LEFT JOIN tbl_categorias ON tbl_clientes.id_categoria = tbl_categorias.id_categoria WHERE tbl_clientes.nome like '%{$dados}%' AND tbl_categorias.status = 1");

				$mostra->execute();

				
				foreach ($mostra as $consulta) 
				{
					array_push($result, $consulta);

				}
				

			}		
			catch(PDOException $e)
			{
				die($e->getMessage());
			}
			$json = json_encode($result);
			return $json;		
		}

		
	}
?>