<?php  
	
	require'config.php';

	class empresa extends conexao {

		public function create($value){

		}

		public function reader($value){

			try {
				
				$codigo = $value;

				$sql = $this->pdo->prepare("SELECT * FROM empresa WHERE Codigo = $codigo");
				$sql ->execute();

				return $sql->rowCount() ? $sql->fetchAll(\PDO::FETCH_ASSOC)[0] : [];


			} catch (PDOException $e) {
				
				echo $e->getMessage();

			}

		}

		public function update($value){

		}

		public function delete($value){

		}

	}
	
	$emp = new empresa;

	if(isset($_GET['emp']) && is_numeric($_GET['emp'])){

		print_r(json_encode($emp->reader($_GET['emp'])));

	}

?>