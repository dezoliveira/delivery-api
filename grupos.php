<?php  
	
	require'config.php';

	class grupos extends conexao {

		public function create($value){

		}

		public function reader($value){

			try {

				$codigo = $value;

				$sql = $this->pdo->prepare("
					SELECT * FROM grupo WHERE CodEmpresa = $codigo
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
	
	$grupos = new grupos;

	if(isset($_GET['emp']) && is_numeric($_GET['emp'])){

		print_r(json_encode($grupos->reader($_GET['emp'])));

	}

?>