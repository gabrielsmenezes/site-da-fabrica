<?php 

    include 'render.php';
    
    class UsuarioController{
    
        static public function get(){
            $uf = UsuarioFactory::get();
            $usuarios = $uf->lista();
            
            Render::render_php('views/listaUsuarios.php', $usuarios);
        }
        
        static public function novo(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                Render::render_php('views/novoUsuario.php', null);
            }
            else if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nome = $_POST['nome'];
                $senha = $_POST['senha'];
                
                $u = new Usuario();
                $uf = UsuarioFactory::get();
                $u->setNome($nome);
                $u->setSenha($senha);
                
                $erro = $uf->inserir($u);
                $usuarios = $uf->lista();
                if($erro){
                    $_SESSION['erroNovoUsuario'] = $erro;
                    $newURL = '/?pagina=usuario-novo';
                    header('Location: '.$newURL);
                }
                else{
                    $newURL = '/?pagina=usuario';
                    header('Location: '.$newURL);
                }
            }
        }
        static public function remove(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $uf = UsuarioFactory::get();
                $id = $_POST['id'];


                $_SESSION['id'] = $id;

                
                //$uf->deleteByName(urldecode($param));
                $uf->deleteById( $id );
                
                $newURL = '/?pagina=usuario';
                header('Location: '.$newURL);
            }
            else{
                $newURL = '/?pagina=index';
                header('Location: '.$newURL);
            }
        }
    }
    
    
    class LoginController{
    
        static public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                Render::render_php('views/login.php', null);
            }
            else{
                $nome = $_POST['nome'];
                $senha = $_POST['senha'];


                $uf = UsuarioFactory::get();

                $users = $uf->lista();

                foreach ($users as $user) {
                    if( $user->getNome() == $nome ){
                        if( $user->getSenha() == $senha ){
                            $_SESSION['user'] = true;
                            $p = $_SESSION['pagina'];
                            $newURL = '/?pagina='.$p;
                            unset($_SESSION['pagina']);
                            header('Location: '.$newURL);
                        }
                    }   
                }


                /*
                if($nome = 'admin' && $senha == 'admin'){
                    $_SESSION['user'] = true;
                    $p = $_SESSION['pagina'];
                    $newURL = '/?pagina='.$p;
                    unset($_SESSION['pagina']);
                    header('Location: '.$newURL);
                }*/
                if($_SESSION['user'] != true){
                    $_SESSION['erroLogin'] = 'Usuário ou senha incorretos';
                    $newURL = '/?pagina=login';
                    header('Location: '.$newURL);
                }
            }
            
        }
        
        static public function sair(){
            unset($_SESSION['user']);
            $newURL = '/?pagina=login';
            header('Location: '.$newURL);
            
        }
    }
    
    class IndexController{
        static public function get(){
        
            Render::render_php('views/index.php', null);
        }
    }
    
    class PostController {
        static public function get(){
            $pf = PostFactory::get();
            $posts = $pf->lista();
            
            Render::render_php('views/listaPosts.php', $posts);
        }
        static public function novo(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                Render::render_php('views/novoPost.php', null);
            }
            else{
                $pf = PostFactory::get();
                $conteudo = $_POST['postC'];
                
                $p = new Post();
                $p->setConteudo($conteudo);
                
                $erro = $pf->inserir($p);
                if($erro){
                    echo $erro;
                }
                else{
                    $newURL = '/?pagina=post';
                    header('Location: '.$newURL);
                }
                
            }
        }
        static public function remove(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $pf = PostFactory::get();
                $id = $_GET['id'];

                //$pf->deleteByName(urldecode($param));
                $pf->deleteById( $id );
                

                $newURL = '/?pagina=post';
                header('Location: '.$newURL);
            }
            else{
                $newURL = '/?pagina=post';
                header('Location: '.$newURL);
            }
        }
        /*
        static public function remove(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $uf = PostFactory::get();
                $param = $_GET['param'];
                
                $uf->deleteByName(urldecode($param));
                
                $newURL = '/?pagina=post';
                header('Location: '.$newURL);
            }
            else{
                $newURL = '/?pagina=index';
                header('Location: '.$newURL);
            }
        }
        */
    }
?>
