<?php   
    /**************************
    *   Edison G G Borghezan
    ***************************/
    //include 'AbstractFactory.php';
    class EditalFactory extends AbstractFactory{
        protected $table = "edital";
        static $instance;


        private function __construct(){

        }  

        public function inserir($edital){
            try{
                if(!$edital || !$edital->getTitulo() || !$edital->getArquivo() || !$edital->getDescricao() ){
                    return 'Usuário imagem e descrição são obrigatórios!!';
                }
                $sql = "INSERT INTO ".$this->table." (titulo, arquivo, descricao) "." VALUES(:titulo, :arquivo, :descricao);";


                //echo "SQL : ". $sql ."\n\n";
                

                /*
                $pdf=base64_encode($edital->getArquivo());
                echo "<embed src = \" data:application/pdf;charset=utf8;base64,  ";
                echo  $pdf;
                echo  " \" width=\"760\" height=\"500\" >";
                */

                $t = DB::prepare($sql);
                $t->execute(array(
                    ':titulo'      => $edital->getTitulo(),
                    ':arquivo'    => $edital->getArquivo(),
                    ':descricao' => $edital->getDescricao()
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
                self::$instance = new EditalFactory();
            }
            return self::$instance;
        }
    }
?>
