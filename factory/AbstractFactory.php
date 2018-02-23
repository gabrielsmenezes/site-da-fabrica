<?php 
    include "DB.php";
    
    abstract class AbstractFactory {
        protected $table;
        
        abstract public function inserir($usuario);
        
        public function lista(){
            $sql = "SELECT * FROM ".$this->table.";";
            $t = DB::prepare($sql);
            $t->execute();
            return $t->fetchAll(PDO::FETCH_CLASS, ucfirst($this->table));
        }
        
        public function deleteById($id){
            $sql = "DELETE FROM ".$this->table." WHERE id = '".$id."';";
            $t = DB::prepare($sql);
            $t->execute();
        }
    }
?>
