<?php   
    /**************************
    *   Edison G G Borghezan
    ***************************/
    class AlunoFactory extends AbstractFactory {
        protected $table = "aluno";
        static $instance;


        private function __construct(){

        }
        
        public function listaOrd(){

            $sql = "SELECT * FROM ".$this->table." ORDER BY nome;"; 
            $t = DB::prepare($sql);
            $t->execute();

            return $t->fetchAll( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, ucfirst($this->table), array('nome', "imagem", "descricao") );


        }  

        public function lista( $limit = null ) {

            if( $limit != null ) {
                
                $sql = "SELECT * FROM " . $this->table . " ORDER BY rand() LIMIT " . $limit . ";";
                
            } else {

                $sql = "SELECT * FROM ".$this->table.";"; 

            }

            $t = DB::prepare($sql);
            $t->execute();

            return $t->fetchAll( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, ucfirst($this->table), array('nome', "imagem", "descricao") );

        }

        public function getById( $id ) {

            $sql = "SELECT * FROM ".$this->table." WHERE id = ".$id.";";
        
            $t = DB::prepare($sql);
            $t->execute();        

            return $t->fetchAll( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, ucfirst($this->table), array('nome', "imagem", "descricao") );

        }

        public function inserir($aluno){
            try {
                
                if(!$aluno || !$aluno->getNome() || !$aluno->getImagem() || !$aluno->getDescricao() ) {
                    return 'Usuário imagem e descrição são obrigatórios!!';
                }

                $sql = "INSERT INTO " . $this->table . " (nome, imagem, descricao) "." VALUES(:nome, :imagem, :descricao);";

                DB::prepare($sql)->execute(array(

                    ':nome'      => $aluno->getNome(),
                    ':imagem'    => $aluno->getImagem(),
                    ':descricao' => $aluno->getDescricao()

                ));

                return true;

            } catch(\Exceptio $e) {

                return false;

            }
            
        }
        static public function get(){
            if(!isset(self::$instance)){
                self::$instance = new AlunoFactory();
            }
            return self::$instance;
        }
    }
?>
