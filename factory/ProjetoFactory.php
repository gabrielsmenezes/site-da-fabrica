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

        public function inserir($projeto){
            try{
                if(!$projeto || !$projeto->getNome() || !$projeto->getImagem() || !$projeto->getDescricao() ){
                    return 'Usuário imagem e descrição são obrigatórios!!';
                }
                $sql = "INSERT INTO ".$this->table." (nome, imagem, descricao) "." VALUES(:nome, :imagem, :descricao);";


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
                    ':nome'      => $projeto->getNome(),
                    ':imagem'    => $projeto->getImagem(),
                    ':descricao' => $projeto->getDescricao()
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
