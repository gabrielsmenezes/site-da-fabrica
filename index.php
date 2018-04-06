<?php
    
    /*
    require __DIR__ . '/vendor/autoload.php';
    use Phroute\Phroute\RouteCollector;
    use Phroute\Phroute\Dispatcher;

    
    include 'entity/Post.php';
    include 'factory/AbstractFactory.php';
    
    include 'factory/PostFactory.php';
    */
    //include 'controller/IndexController.php';
    //include 'controller/MenuController.php';    
    //include 'controller/LoginController.php';     
    //include 'controller/SobreController.php';    
    //include 'controller/EquipeController.php';
    //include 'controller/ProjetosController.php';


    include 'admin/entity/Aluno.php';
    include 'admin/entity/Usuario.php';
    include 'admin/entity/Sobre.php';
    include 'admin/entity/Projeto.php';

    include 'admin/factory/AlunoFactory.php';
    include 'admin/factory/UsuarioFactory.php';
    include 'admin/factory/SobreFactory.php';
    include 'admin/factory/ProjetoFactory.php';

    include 'render_user.php';

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


    //echo $pagina;

    //echo "aaaaaaaaaaaaaaa";



    if(($pagina == 'index' || !$pagina)){
        $pf = ProjetoFactory::get();
        $listProjetos = null;
        $listProjetos = $pf->lista("3");

        //echo count($listProjetos);
        //echo "<br><br><br><br><br><br><br><br>";

        $sf = SobreFactory::get();
        $content = $sf->lista()[0]->getDescricao();

        $af = AlunoFactory::get();
        $listAlunos = null;
        $listAlunos = $af->lista("3");


        //echo count($listAlunos);
        //echo "<br><br><br><br><br><br><br><br>";

        $arr = array($content, $listProjetos, $listAlunos);

        RenderUser::render_php("/views/index.php", $arr);
    }
    else if( $pagina == 'equipe' ){
        $af = AlunoFactory::get();
        $listAlunos = null;
        $listAlunos = $af->listaOrd();
        

        $arr = $listAlunos;
        RenderUser::render_php("/views/equipe.php", $arr);
    }
    else if( $pagina == 'projetos' ){
        $pf = ProjetoFactory::get();
        $listProjetos = null;
        $listProjetos = $pf->listaOrd();
       

        $arr = $listProjetos;
        RenderUser::render_php("/views/projetos.php", $arr); 
    }
    else if( $pagina == "projetoIndividual" ){
        $id = $_GET['number'];


        if( is_numeric($id) ){
            $pf   = ProjetoFactory::get();
            $proj = $pf->getById( $id );
            if( count($proj) != 1 ){
                $newURL = '?pagina=index';
                header('Location: ' . $newURL);
            }
            else{
                RenderUser::render_php("/views/projeto.php", $proj[0]);
            }
        }
        else{
            $newURL = '?pagina=index';
            header('Location: ' . $newURL);
        }

    }
    else if( $pagina == "editais" ){
        echo "pagina em criacao";
    }
    else if( $pagina == "novidades" ){
        echo "pagina em criacao";
    }
    else{
        echo "erro 404";
    }

?>
