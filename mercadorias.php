<?php  
	
	require'config.php';

	class mercadorias extends conexao {

		public function create($value){

		}

		public function reader($value){

			try {
				
				$codigo = $value;

				$sql = $this->pdo->prepare("
					SELECT * FROM mercadorias WHERE CodEmpresa = $codigo AND Ativo = 'S'
				");
				$sql ->execute();

				return $sql->rowCount() ? $sql->fetchAll(\PDO::FETCH_ASSOC) : [];

			} catch (PDOException $e) {
				
				echo $e->getMessage();

			}

		}

		public function update($value){

		}

		public function delete($value){

		}

	}
	
	$mercadorias = new mercadorias;

	if(isset($_GET['emp']) && is_numeric($_GET['emp'])){

		print_r(json_encode($mercadorias->reader($_GET['emp'])));

	}

?>