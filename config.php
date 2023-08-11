<?php  

	class conexao {

		public function __construct(){

			header("Access-Control-Allow-Origin: *");
			header('Content-Type: application/json');

			try {
				
				$this->pdo = new PDO("mysql:host=127.0.0.1;dbname=delivery;charset=utf8","root","");

			} catch (PDOException $e) {
				
				echo $e->getMessage();

			}	

		}

	}

?>