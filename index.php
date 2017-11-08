<?php

    require __DIR__ . '/vendor/autoload.php';
    use Phroute\Phroute\RouteCollector;
    use Phroute\Phroute\Dispatcher;

    include 'entity/Usuario.php';
    include 'entity/Post.php';
    include 'factory/AbstractFactory.php';
    include 'factory/UsuarioFactory.php';
    include 'factory/PostFactory.php';
    include 'controller/Controllers.php';
    session_start();
    $path = session_save_path() . '/sess_' . session_id();
    chmod($path, 0640);
    

    if( isset($_GET['pagina']) ){
        $pagina = $_GET['pagina'];
    }
    else{
       $pagina =  'index';
    }



    $admin = false;
    
    if(isset($_SESSION['user'])){
        $admin = true;
    }
    
    if(($pagina == 'index' || !$pagina)){
        IndexController::get();
    }
    else if($pagina == 'usuario'){
        UsuarioController::get();
    }
    else if($pagina == 'usuario-novo' && $admin){
        UsuarioController::novo();
    }
    else if($pagina == 'usuario-remove' && $admin){
        UsuarioController::remove();
    }
    else if($pagina == 'post'){
        PostController::get();
    }
    else if($pagina == 'post-novo' && $admin){
        PostController::novo();
    }
    else if($pagina == 'usuario-remove' && $admin){
        PostController::remove();
    }
    else if($pagina == 'sair'){
        LoginController::sair();
    }
    else{
        if($pagina != 'login'){
            $_SESSION['erroLogin'] = "Não autorizado, logue";
            $_SESSION['pagina'] = $pagina;
        }
        if(isset($_SESSION['user'])){
            $newURL = '/?pagina=index';
            header('Location: '.$newURL);
        }
        else
            LoginController::login();
    }

?>
