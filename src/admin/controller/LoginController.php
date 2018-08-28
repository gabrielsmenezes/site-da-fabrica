 <?php 


    class LoginController{
    
        static public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                //IndexController::get();
            }
            else{
                $nome = $_POST['login'];
                $senha = $_POST['senha'];
                //$_SESSION['user'] = false;
                //echo "nome:" . $nome . "<br>senha:" . $senha . "<br>"; 

                $uf = UsuarioFactory::get();

                $users = $uf->lista();
                //echo "<br><br>";
                //print_r($users);
                //echo "<br><br>";


                foreach ($users as $user) {
                    if( $user->getNome() == $nome ){
                        if( $user->getSenha() == $senha ){
                            $_SESSION['user'] = true;
                            
                            return true;
                        }
                    }   
                }

                return false;
               
            }
            
        }
        
        static public function sair(){
            
            unset($_SESSION['user']);
            
        }
    }



?>