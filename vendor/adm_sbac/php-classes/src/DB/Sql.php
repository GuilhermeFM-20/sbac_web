<?php 

namespace SBAC\DB;

class Sql {

	const HOSTNAME = "127.0.0.1";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "sbac_web";

	private $conn;

	public function __construct(){

		$this->conn = new \PDO(
			"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
			Sql::USERNAME,
			Sql::PASSWORD
		);

	}

	private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);
			

		}

	}

	private function bindParam($statement, $key, $value){

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array(),$analyQuery=0){

		if($analyQuery == 0){

			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt, $params);

			$stmt->execute();
		
		}else{

			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt, $params);

			$stmt->debugDumpParams();

		}

	}

	public function debugSql($rawQuery, $params = array()){

			if (!empty($params)) {
				$indexed = $params == array_values($params);
				foreach($params as $k=>$v) {
					if(is_object($v)){
						if($v instanceof \DateTime){ 
							$v = $v->format('Y-m-d');
						}else{ 
							continue;
						}
					}elseif(is_string($v)){
					 	$v = "'$v'";
					}elseif($v === null){ 
					 	$v = 'NULL';
					}elseif(is_array($v)){ 
					 	$v = implode(',', $v);
					}
		
					if($indexed){
						$rawQuery = preg_replace('/\?/', $v, $rawQuery, 1);
					}else{
						if ($k[0] != ':') $k = ':'.$k; //add leading colon if it was left out
						$rawQuery = str_replace($k,$v,$rawQuery);
					}
				}
			}
			echo $rawQuery;
		
	}



	public function select($rawQuery, $params = array()):array{

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

	public function numRow($rawQuery,$params = array()){

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->rowCount();

	}

}

 ?>