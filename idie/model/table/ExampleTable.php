<?php

class ExampleTable extends Database {

	private static $nameTable = 'example'; 
	private static $nameClass = 'ExampleClass';

    public function __construct(){}
        
    private function __clone(){}
    
    public function __destruct() {
        foreach ($this as $key => $value) {
            unset($this->$key); 
        }
        foreach(array_keys(get_defined_vars()) as $var) {
            unset(${"$var"});
        }
        unset($var);
    }

    public function load($fields="*", $add="") {

		if (strlen($add) > 0) {
            $add = " " . $add;
        }

        $sql = "SELECT $fields FROM example $add";    
        return $this->selectDB($sql, null, 'ExampleClass');
        
	}
	
	public function insert($fields, $params=null) {

		$numparams="";
		for($i=0; $i < count($params); $i++) {
			$numparams.= ",?";
		} 
		
		$numparams = substr($numparams, 1);
		$sql = "INSERT INTO example ($fields) VALUES ($numparams)";
		$result = $this->insertDB($sql, $params);
		return $result;

    }
	
	public function update($fields, $params=null, $where=null) {

		$fields_T="";
		for($i=0; $i < count($fields); $i++) {
			$fields_T.= ", $fields[$i] = ?";
		}
		
		$fields_T = substr($fields_T, 2);
		$sql = "UPDATE example SET $fields_T";
		
		if (isset($where)) {
			$sql.= " WHERE $where";
		}
		
		$result = $this->updateDB($sql, $params);
		return $result;

    }
	
	public function delete($where=null, $params=null) {

		$sql = "DELETE FROM example";
		if (isset($where)) {
			$sql .= " WHERE $where";
		}

		$result = $this->deleteDB($sql, $params);
		return $result;

    }

}

