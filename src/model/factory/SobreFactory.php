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

        public function update($sobreObj) {

            try{

                if(!$sobreObj || !$sobreObj->getDescricao() ) {

                    return 'Descrição é obrigatóra!!';

                }

                $sql = "UPDATE ". $this->table ." SET descricao = '". $sobreObj->getDescricao()  . "' WHERE sobre.id = 1 ;";
             
                $t = DB::prepare($sql);
                $t->execute();
                return true;
                
            } catch(\Exceptio $e) {

                return false;

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
