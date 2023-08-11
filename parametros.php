<?php  
	
	require'config.php';

	class parametros extends conexao {

		public function create($value){

		}

		public function reader($value){

			try {
				
				$codigo = $value;

				$sql = $this->pdo->prepare("
					SELECT * FROM parametros 
					INNER JOIN horarios ON (horarios.idparam = parametros.id)
					WHERE parametros.CodEmpresa = $codigo"
				);
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
	
	$param = new parametros;

	if(isset($_GET['emp']) && is_numeric($_GET['emp'])){

		print_r(json_encode($param->reader($_GET['emp'])));

	}

?>