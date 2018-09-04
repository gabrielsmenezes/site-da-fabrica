<?php 
    
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
            //echo $sql;            
            
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

        public function listaOrdId( $limit = null, $attributes = null ) {

            if( $limit != null ) {

                $sql = "SELECT * FROM ".$this->table." ORDER BY id desc LIMIT ".$limit.";";

            } else {

                $sql = "SELECT * FROM ".$this->table." ORDER BY id desc;"; 

            }

            return $this->run( $sql, $attributes );

        }

        public function lista( $limit = null, $attributes = null ) {

            if( $limit != null ) {

                $sql = "SELECT * FROM ".$this->table." ORDER BY rand() LIMIT ".$limit.";";

            } else {

                $sql = "SELECT * FROM ".$this->table.";"; 

            }

            return $this->run( $sql, $attributes );

        }

        public function getById( $id, $attributes = null) {

            $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $id . ";";

            return $this->run( $sql, $attributes );

        }
        
        public function deleteById($id){
            $sql = "DELETE FROM ".$this->table." WHERE id = ".$id.";";
            $t = DB::prepare($sql);
            $t->execute();
        }

        private function run( $sql, $attributes ) {

            $data = DB::prepare($sql);
            $data->execute();            

            return $data->fetchAll( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, ucfirst($this->table), $attributes );

        }


    }
?>
