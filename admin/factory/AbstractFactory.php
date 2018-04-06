<?php 
    include "DB.php";
    
    abstract class AbstractFactory {
        protected $table;
        
        abstract public function inserir($usuario);

        public function updateArray($arrColuna, $arrValue, $id){

            $sql =  "UPDATE ".$this->table." SET ";
            $colunaStr = "";
            foreach ($arrColuna as $coluna ) {
                $colunaStr = $colunaStr . $coluna . "=?,";
            }
            $colunaStr = substr($colunaStr, 0, strlen($colunaStr)-1);
            $condicao = " WHERE id = ? ;";
            $sql = $sql.$colunaStr.$condicao;
            //echo $sql;                        
            $t = DB::prepare($sql);
            for ($i=1; $i < count($arrValue)+1 ; $i++) { 
                $t->bindParam($i, $arrValue[$i-1]);
            }
            $t->bindParam($i, $id);
            $result = $t->execute();
            /*
            foreach ($t->errorinfo() as $value ) {             
                    echo "T :" . $value ."<br>";
            }
            print_r ($result);
            */
        }

        public function update($coluna, $value, $id){
            $sql =  "UPDATE ".$this->table." SET ". $coluna ."=:value WHERE id=:id";
            echo $sql;            
            
            $t = DB::prepare($sql);
            //$t->bindParam(1, $coluna, PDO::PARAM_STR);
            //$t->bindParam(2, $value, PDO::PARAM_STR);
            //$t->bindParam(3, $id);
            $result = $t->execute(array(
                    ':value'     => $value,
                    ':id'        => $id
            ));
            //echo "ueerrr";
            foreach ($t->errorinfo() as $value ) {             
                    echo "T :" . $value ."<br>";
            }
            //print_r ($result);


        }

        public function lista($limit=null){
            if( $limit != null ){
                //echo "limit:".$limit.":";
                $sql = "SELECT * FROM ".$this->table." ORDER BY rand() LIMIT ".$limit.";";
                //echo $sql;
            }
            else{
                $sql = "SELECT * FROM ".$this->table.";"; 
            }
            $t = DB::prepare($sql);
            $t->execute();
            return $t->fetchAll(PDO::FETCH_CLASS, ucfirst($this->table));
        }

        public function getById($id){
            $sql = "SELECT * FROM ".$this->table." WHERE id = ".$id.";";

            //echo $sql;

            $t = DB::prepare($sql);
            $t->execute();            
            return $t->fetchAll(PDO::FETCH_CLASS, ucfirst($this->table));
        }
        
        public function deleteById($id){
            $sql = "DELETE FROM ".$this->table." WHERE id = ".$id.";";
            $t = DB::prepare($sql);
            $t->execute();
        }
    }
?>
