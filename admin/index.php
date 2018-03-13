<?php
    
    /*
    require __DIR__ . '/vendor/autoload.php';
    use Phroute\Phroute\RouteCollector;
    use Phroute\Phroute\Dispatcher;

    
    include 'entity/Post.php';
    include 'factory/AbstractFactory.php';
    
    include 'factory/PostFactory.php';
    */
    
    //include 'render.php';
    
    include 'controller/IndexController.php';
    include 'controller/MenuController.php';    
    include 'controller/LoginController.php';     
    include 'controller/SobreController.php';    
    include 'controller/EquipeController.php';
    include 'controller/ProjetosController.php';


    include 'entity/Aluno.php';
    include 'entity/Usuario.php';
    include 'entity/Sobre.php';
    include 'entity/Projeto.php';

    include 'factory/AlunoFactory.php';
    include 'factory/UsuarioFactory.php';
    include 'factory/SobreFactory.php';
    include 'factory/ProjetoFactory.php';

    session_start();
    $path = session_save_path() . '/sess_' . session_id();
    chmod($path, 0640);

    //$_SESSION['pasta'] = "/admin";

    //echo $_SERVER['PHP_SELF'];
    

    if( !isset($_GET['pagina']) ){
        $pagina = 'index';
    }
    else{
        $pagina = $_GET['pagina'];
    }
    $admin = false;
    
    if(isset($_SESSION['user'])){
        $admin = true;
    }

    //echo $pagina;

    //echo "aaaaaaaaaaaaaaa";



    if(($pagina == 'index' || !$pagina)){
        //echo "chamando index";
        IndexController::get();
    }
    else if( $pagina == 'login' ){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $newURL = '/admin/?pagina=index';
            header('Location: '.$newURL);
        }
        else{
            LoginController::login();
        }
    }
    else if( $pagina == 'menu' ){
        if( $admin ){
            MenuController::get();
        }
        else{
            $_SESSION['erroLogin'] = "Não autorizado, logue";
            IndexController::get();
        }
    }
    else if( $pagina == 'sobre'){
        if( $admin ){
            SobreController::get();
        }
        else{
            $_SESSION['erroLogin'] = "Não autorizado, logue";
            IndexController::get();
        }
    }
    else if( $pagina == 'equipe'){
        if( $admin ){
            EquipeController::get();
        }
        else{
            $_SESSION['erroLogin'] = "Não autorizado, logue";
            IndexController::get();
        }
    }

    else if( $pagina == 'projetos'){
        if( $admin ){
            ProjetosController::get();
        }
        else{
            $_SESSION['erroLogin'] = "Não autorizado, logue";
            IndexController::get();
        }
    }
    else if( $pagina == 'sair' ){
        LoginController::sair();
    }
    /*
    *
    * Detalhando o que tem em /?pagina=equipe
    *
    */
    else if( $pagina == 'inserirAluno'){
        if( $admin ){
            EquipeController::inserirAluno();
        }
        else{
            $_SESSION['erroLogin'] = "Não autorizado, logue";
            IndexController::get();
        }  
    }
    /*
    *
    *  Detalhando o que tem em /?pagina=sobre
    *
    */
    else if( $pagina == 'updateSobre' ){
        //echo "aqui";
        if( $admin ){
            SobreController::update();
        }
        else{
            $_SESSION['erroLogin'] = "Não autorizado, logue";
            IndexController::get();
        }
    }
    /*
    *
    * Detalhando o que tem em /?pagina=projetos
    *
    */
    else if( $pagina == 'inserirProjeto' ){
        if( $admin ){
            ProjetosController::inserirProjeto();
        }
        else{
            $_SESSION['erroLogin'] = "Não autorizado, logue";
            IndexController::get();
        }    
    }
    else if( $pagina == 'projetoRemove'){ 
        if( $admin ){
            //echo $_POST['removeId'];
            ProjetosController::removerProjeto();
        }
        else{
            $_SESSION['erroLogin'] = "Não autorizado, logue";
            IndexController::get();
        }   
    }
    else if( $pagina == 'alunoRemove'){ 
        if( $admin ){
            //echo $_POST['removeId'];
            EquipeController::removerAluno();
        }
        else{
            $_SESSION['erroLogin'] = "Não autorizado, logue";
            IndexController::get();
        }   
    }
    else{
        $_SESSION['erroLogin'] = "Pagina não existe";
        IndexController::get();
    }
?>
