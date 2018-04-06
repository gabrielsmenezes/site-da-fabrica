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
        public function listaOrd(){
            $sql = "SELECT * FROM ".$this->table." ORDER BY nome;"; 
            $t = DB::prepare($sql);
            $t->execute();
            return $t->fetchAll(PDO::FETCH_CLASS, ucfirst($this->table));
        }

        public function inserir($projeto){
            try{
                if(!$projeto || !$projeto->getNome() || !$projeto->getImagem() || !$projeto->getDescricao() || !$projeto->getDescricaoCurta() ){
                    return 'Usuário imagem e descrição são obrigatórios!!';
                }
                $sql = "INSERT INTO ".$this->table." (nome, imagem, descricao, descricaoCurta) "." VALUES(:nome, :imagem, :descricao, :descricaoCurta);";


                echo "SQL : ". $sql ."\n\n";
                //echo "imagem: \n\n" .$projeto->getImagem();
                
                /*
                $img=base64_encode($projeto->getImagem());

                
                echo "<img src = \" data:image/JPG;charset=utf8;base64,";
                echo $img;
                echo "\" />";
                */

                $t = DB::prepare($sql);
                $t->execute(array(
                    ':nome'           => $projeto->getNome(),
                    ':imagem'         => $projeto->getImagem(),
                    ':descricao'      => $projeto->getDescricao(),
                    ':descricaoCurta' => $projeto->getDescricaoCurta()
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
                self::$instance = new ProjetoFactory();
            }
            return self::$instance;
        }
    }
?>
