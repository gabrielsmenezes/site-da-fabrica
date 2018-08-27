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
                            //$dirView = 'views/' . 'menu.php';
                            //$content = "";
                            //$content = "<br><br>Logado com sucesso <br><br>";
                            //Render::render_php( $dirView , $content);
                            //$newURL = '/?pagina='.$p;
                            //unset($_SESSION['pagina']);
                            //header('Location: '.$newURL);
                        }
                    }   
                }

                if( !isset($_SESSION['user'] ) ){
                    $_SESSION['erroLogin'] = 'Usuário ou senha incorretos';
                    $newURL = '/admin/?pagina=index';
                    header('Location: '.$newURL);
                    //echo "credenciais invalidas";
                }
                else{
                    //echo "Login funfou";
                    $_SESSION['erroLogin'] = '';
                    $newURL = '/admin/?pagina=menu';
                    header('Location: '.$newURL);
                }
            }
            
        }
        
        static public function sair(){
            unset($_SESSION['user']);
            $newURL = '/admin/?pagina=index';
            header('Location: '.$newURL);            
        }
    }



?>