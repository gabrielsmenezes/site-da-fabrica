<?php   
    /**************************
    *   Edison G G Borghezan
    ***************************/
    //include 'AbstractFactory.php';
    class SobreFactory extends AbstractFactory{
        protected $table = "sobre";
        static $instance;


        private function __construct(){

        }  

        public function inserir($sobreObj){
            ///////////////////////////////////////////////////////////////////////////////////
            //Funcao inserir nao deve ser utilizada mas caso alguem utilize vai cair no update
            self.update($sobreObj);
        }
        public function update($sobreObj){
            echo "<br>inicio update<br>";
            try{
                if(!$sobreObj || !$sobreObj->getDescricao() ){
                        echo "<br>erro if<br>";
                    return 'Descrição é obrigatóra!!';
                }
                //////////////////////////////////////////////////////////////////////////
                //
                // Alterar
                //
                //$sql = "INSERT INTO ".$this->table." (descricao) "." VALUES(:descricao);";
                // o texto de sobre deve ser único

                //echo "<br>antes sql<br>";
                //$sql = "UPDATE " . $this->table . " SET 'descricao'=" . $sobreObj->getDescricao() ."   WHERE 'sobre'.'id' = 1";
                $sql = "UPDATE ". $this->table ." SET descricao = '". $sobreObj->getDescricao()  . "' WHERE sobre.id = 1 ;";
                //echo "<br>string sql<br>";
                //echo "<br>Sql:" . $sql .":<br>";
                $t = DB::prepare($sql);
                /*$t->execute(array(
                    ':descricao' => $sobreObj->getDescricao()
                ));*/
                $t->execute();
                //echo "<br>execucao sql<br>";
                return null;
                
            }
            catch(\Exceptio $e){
                echo $e->getMessage();
            }
            
        }
        static public function get(){
            if(!isset(self::$instance)){
                self::$instance = new SobreFactory();
            }
            return self::$instance;
        }
    }
?>
