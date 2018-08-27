<?php   

    //include 'AbstractFactory.php';
    class PostFactory extends AbstractFactory{
        protected $table = "post";
        static $instance;
        
        private __construct(){

        }        

        public function inserir($post){
            try{
                
                if(!$post || !$post->getConteudo()){
                    return 'Post vazio!!';
                }
                $sql = "INSERT INTO ".$this->table." VALUES(:conteudo);";
                $t = DB::prepare($sql);
                $t->execute(array(
                    ':conteudo' => $post->getConteudo()
                ));
                return null;
            }
            catch(\Exceptio $e){
                return $e->getMessage();
            }
            
        }
        static public function get(){
            if(!isset(self::$instance)){
                self::$instance = new PostFactory();
            }
            return self::$instance;
        }
    }
?>
