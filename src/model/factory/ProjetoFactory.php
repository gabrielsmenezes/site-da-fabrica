<?php   
    /**************************
    *   Edison G G Borghezan
    ***************************/
    //include 'AbstractFactory.php';
    class ProjetoFactory extends AbstractFactory{
        protected $table = "projeto";
        static $instance;


        private function __construct(){

        }  

        public function listaOrd() {

            $sql = "SELECT * FROM ".$this->table." ORDER BY nome;"; 

            $t = DB::prepare($sql);
            $t->execute();
            return $t->fetchAll( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, ucfirst($this->table), array('nome', "imagem", "descricao", "descricaoCurta") );

        }

        public function getById($id) {

            $sql = "SELECT * FROM ".$this->table." WHERE id = ".$id.";";
            
            $t = DB::prepare($sql);
            $t->execute();            
            return $t->fetchAll( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, ucfirst($this->table), array('nome', "imagem", "descricao", "descricaoCurta") );
            
        }

        public function lista( $limit = null ) {

            if( $limit != null ) {
                
                $sql = "SELECT * FROM " . $this->table . " ORDER BY rand() LIMIT " . $limit . ";";
                
            } else {

                $sql = "SELECT * FROM ".$this->table.";"; 

            }

            $t = DB::prepare($sql);
            $t->execute();

            return $t->fetchAll( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, ucfirst($this->table), array('nome', "imagem", "descricao", "descricaoCurta") );

        }

        public function inserir($projeto){
            try {

                if(!$projeto || !$projeto->getNome() || !$projeto->getImagem() || !$projeto->getDescricao() || !$projeto->getDescricaoCurta() ) {

                    return 'Usuário imagem e descrição são obrigatórios!!';

                }

                $sql = "INSERT INTO ".$this->table." (nome, imagem, descricao, descricaoCurta) "." VALUES(:nome, :imagem, :descricao, :descricaoCurta);";


                echo "SQL : ". $sql ."\n\n";

                $t = DB::prepare($sql);
                $t->execute(array(
                    ':nome'           => $projeto->getNome(),
                    ':imagem'         => $projeto->getImagem(),
                    ':descricao'      => $projeto->getDescricao(),
                    ':descricaoCurta' => $projeto->getDescricaoCurta()
                ));

                return true;

            } catch(\Exceptio $e) {

                return false;
            
            }
            
        }
        static public function get(){
            if(!isset(self::$instance)){
                self::$instance = new ProjetoFactory();
            }
            return self::$instance;
        }
    }
?>
