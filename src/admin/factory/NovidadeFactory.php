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

                
                return true;

            } catch(\Exceptio $e) {

                return false;

            }
            
        }

        public function listaOrdId( $limit = null ) {

            if( $limit != null ) {

                $sql = "SELECT * FROM ".$this->table." ORDER BY id desc LIMIT ".$limit.";";

            } else {

                $sql = "SELECT * FROM ".$this->table." ORDER BY id desc;"; 

            }

            $t = DB::prepare($sql);
            $t->execute();
            
            return $t->fetchAll( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, ucfirst($this->table), array('titulo', "imagem", "descricao") );

        }

        public function getById( $id ) {

            $sql = "SELECT * FROM ".$this->table." WHERE id = ".$id.";";
        
            $t = DB::prepare($sql);
            $t->execute();        

            return $t->fetchAll( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, ucfirst($this->table), array('titulo', "imagem", "descricao") );

        }

        static public function get(){
            if(!isset(self::$instance)){
                self::$instance = new NovidadeFactory();
            }
            return self::$instance;
        }
    }
?>
