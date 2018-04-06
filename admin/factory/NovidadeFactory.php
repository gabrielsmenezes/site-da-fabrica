<?php   
    /**************************
    *   Edison G G Borghezan
    ***************************/
    //include 'AbstractFactory.php';
    class NovidadeFactory extends AbstractFactory{
        protected $table = "novidade";
        static $instance;


        private function __construct(){

        }  

        public function inserir($novidade){
            try{
                if(!$novidade || !$novidade->getTitulo() || !$novidade->getImagem() || !$novidade->getDescricao() ){
                    return 'Usuário imagem e descrição são obrigatórios!!';
                }
                $sql = "INSERT INTO ".$this->table." (titulo, imagem, descricao) "." VALUES(:titulo, :imagem, :descricao);";

                $t = DB::prepare($sql);
                $t->execute(array(
                    ':titulo'      => $novidade->getTitulo(),
                    ':imagem'    => $novidade->getImagem(),
                    ':descricao' => $novidade->getDescricao()
                ));

                
                /*
                foreach ($t->errorinfo() as $value ) {             
                    echo "T :" . $value ."<br>";
                }
                */
                
                return null;
            }
            catch(\Exceptio $e){
                echo $e->getMessage();
            }
            
        }
        static public function get(){
            if(!isset(self::$instance)){
                self::$instance = new NovidadeFactory();
            }
            return self::$instance;
        }
    }
?>
