<?php   
    /**************************
    *   Edison G G Borghezan
    ***************************/
    //include 'AbstractFactory.php';
    class EditalFactory extends AbstractFactory {

        protected $table = "edital";
        static $instance;


        private function __construct(){

        }  

        public function inserir($edital) {

            try {

                if(!$edital || !$edital->getTitulo() || !$edital->getArquivo() || !$edital->getDescricao() ) {

                    return 'Usuário imagem e descrição são obrigatórios!!';

                }

                $sql = "INSERT INTO ".$this->table." (titulo, arquivo, descricao) "." VALUES(:titulo, :arquivo, :descricao);";

                $t = DB::prepare($sql);
                $t->execute(array(
                    ':titulo'      => $edital->getTitulo(),
                    ':arquivo'    => $edital->getArquivo(),
                    ':descricao' => $edital->getDescricao()
                ));

                return true;

            } catch(\Exceptio $e) {

                return false;

            }
            
        }

        static public function get(){
            if(!isset(self::$instance)){
                self::$instance = new EditalFactory();
            }
            return self::$instance;
        }

    }
