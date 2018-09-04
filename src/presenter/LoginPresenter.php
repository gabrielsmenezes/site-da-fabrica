 <?php 


    class LoginPresenter {
    
        static public function login() {

            if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

                $nome = $_POST['login'];
                $senha = $_POST['senha'];

                $users = UsuarioFactory::get()->lista();

                foreach ($users as $user) {

                    if( $user->getNome() == $nome ) {

                        if( $user->getSenha() == $senha ) {

                            $_SESSION['user'] = true;
                            
                            return true;

                        }

                    }   

                }

                return false;
               
            }
            
        }
        
        static public function sair() {
            
            unset($_SESSION['user']);
            
        }
    }