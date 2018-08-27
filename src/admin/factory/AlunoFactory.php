<?php   
    /**************************
    *   Edison G G Borghezan
    ***************************/
    class AlunoFactory extends AbstractFactory{
        protected $table = "aluno";
        static $instance;


        private function __construct(){

        }
        
        public function listaOrd(){
            $sql = "SELECT * FROM ".$this->table." ORDER BY nome;"; 
            $t = DB::prepare($sql);
            $t->execute();
            return $t->fetchAll(PDO::FETCH_CLASS, ucfirst($this->table));
        }  

        public function inserir($aluno){
            try{
                if(!$aluno || !$aluno->getNome() || !$aluno->getImagem() || !$aluno->getDescricao() ){
                    return 'Usuário imagem e descrição são obrigatórios!!';
                }
                $sql = "INSERT INTO ".$this->table." (nome, imagem, descricao) "." VALUES(:nome, :imagem, :descricao);";


                echo "SQL : ". $sql ."\n\n";
                //echo "imagem: \n\n" .$aluno->getImagem();
                
                /*
                $img=base64_encode($aluno->getImagem());

                
                echo "<img src = \" data:image/JPG;charset=utf8;base64,";
                echo $img;
                echo "\" />";
                */

                $t = DB::prepare($sql);
                $t->execute(array(
                    ':nome'      => $aluno->getNome(),
                    ':imagem'    => $aluno->getImagem(),
                    ':descricao' => $aluno->getDescricao()
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
                self::$instance = new AlunoFactory();
            }
            return self::$instance;
        }
    }
?>
