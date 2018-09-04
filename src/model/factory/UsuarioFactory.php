<?php   

    //include 'AbstractFactory.php';
    class UsuarioFactory extends AbstractFactory{
        protected $table = "usuario";
        static $instance;
        
        private function __contructor(){
            
        }

        public function inserir($usuario){
            try{
                /////////////////////
                // SQL injection
                // nice
                $sql = "SELECT * FROM ".$this->table." WHERE nome like '".$usuario->getNome()."';";
                $t = DB::prepare($sql);
                $t->execute();
                
                if(count($t->fetchAll()) > 0){
                    return 'Erro: Usuário já existe';
                }
                if(!$usuario || !$usuario->getNome() || !$usuario->getSenha()){
                    return 'Usuário e senha são obrigatórios!!';
                }
                $sql = "INSERT INTO ".$this->table."(nome, senha) "."VALUES(:nome, :senha);";
                $t = DB::prepare($sql);
                $t->execute(array(
                    ':nome' => $usuario->getNome(),
                    ':senha' => $usuario->getSenha()
                ));
                return null;
            }
            catch(\Exceptio $e){
                echo $e->getMessage();
            }
            
        }
        static public function get(){
            if(!isset(self::$instance)){
                self::$instance = new UsuarioFactory();
            }
            return self::$instance;
        }
    }
?>
