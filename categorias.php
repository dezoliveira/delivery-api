<?php  
	
	require'config.php';

	class categorias extends conexao {

		public function create($value){

		}

		public function reader($value){

			try {
				
				$codigo = $value;

				$sql = $this->pdo->prepare("
					SELECT * FROM categorias 
					WHERE CodEmpresa = $codigo AND ativo = 'S'
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
	
	$categorias = new categorias;

	if(isset($_GET['emp']) && is_numeric($_GET['emp'])){

		print_r(json_encode($categorias->reader($_GET['emp'])));

	}

?>