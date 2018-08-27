<?php
/**
 * @author Gian Fonseca
 */
abstract class Database {
	public $conn;

	/*Método construtor do banco de dados*/
	private function __construct(){}
	
	/*Evita que a classe seja clonada*/
	private function __clone(){}
	
	/*Método que destroi a conexão com banco de dados e remove da memória todas as variáveis setadas*/
	public function __destruct() {
		$this->disconnect();

		foreach ($this as $key => $value) {
			unset($this->$key);
        }
	}
	
	function connect() {
	
		$database = Decode::getJson()->database;

		try {
		    $this->conn = new PDO("mysql:host=" . $database->server . ";dbname=" . $database->name, $database->user, $database->password);
		    // set the PDO error mode to exception
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}	

		return $this->conn;
	}

	private function disconnect() {
		$this->conn = null;
	}

	/*Método select que retorna um VO ou um array de objetos*/
	public function selectDB($sql, $params=null, $class=null) {
		
		$query = $this->connect()->prepare($sql);
		$query->execute($params);
		
		if (isset($class)) {
			$rs = $query->fetchAll(PDO::FETCH_CLASS, $class) or die(print_r($query->errorInfo(), true));
		}else{
			$rs = $query->fetchAll(PDO::FETCH_OBJ) or die(print_r($query->errorInfo(), true));
		}
		self::__destruct();
		return $rs;

    }
	
	/*Método insert que insere valores no banco de dados e retorna o último id inserido*/
	public function insertDB($sql, $params=null) {
		
		$query = $this->connect()->prepare($sql);
		$query->execute($params);
		$rs = $this->conn->lastInsertId() or die(print_r($query->errorInfo(), true));
		self::__destruct();
		return $rs;

    }
	
	/*Método update que altera valores do banco de dados e retorna o número de linhas afetadas*/
	public function updateDB($sql, $params=null) {
		
		$query = $this->connect()->prepare($sql);
		$query->execute($params);
		$rs = $query->rowCount() or die(print_r($query->errorInfo(), true));
		self::__destruct();
		return $rs;

    }
	
	/*Método delete que excluí valores do banco de dados retorna o número de linhas afetadas*/
	public function deleteDB($sql, $params=null) {

		$query = $this->connect()->prepare($sql);
		$query->execute($params);
		$rs = $query->rowCount() or die(print_r($query->errorInfo(), true));
		self::__destruct();
		return $rs;

    }
}