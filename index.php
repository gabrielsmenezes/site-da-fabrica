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
    include 'admin/entity/Novidade.php';
    include 'admin/entity/Edital.php';

    include 'admin/factory/AlunoFactory.php';
    include 'admin/factory/UsuarioFactory.php';
    include 'admin/factory/SobreFactory.php';
    include 'admin/factory/ProjetoFactory.php';
    include 'admin/factory/NovidadeFactory.php';    
    include 'admin/factory/EditalFactory.php';

    include 'render_user.php';

    session_start();
    $path = session_save_path() . '/sess_' . session_id();
    chmod($path, 0640);    

    if( !isset($_GET['pagina']) ){
        $pagina = 'index';
    }
    else{
        $pagina = $_GET['pagina'];
    }




    if(($pagina == 'index' || !$pagina)){
        $pf = ProjetoFactory::get();
        $listProjetos = null;
        $listProjetos = $pf->lista("3");

        $sf = SobreFactory::get();
        $content = $sf->lista()[0]->getDescricao();

        $af = AlunoFactory::get();
        $listAlunos = null;
        $listAlunos = $af->lista("3");


        $nf = NovidadeFactory::get();
        $listNovidades = null;
        $listNovidades = $nf->listaOrdId("3");

        $ef = EditalFactory::get();
        $listEditais = null;
        $listEditais = $ef->listaOrdId("3");

        $arr = array($content, $listProjetos, $listAlunos, $listNovidades, $listEditais);

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
        // colocar editais para aparecer o conteudo apenas quando clicar
        $ef = EditalFactory::get();
        $listEditais = null;
        $listEditais = $ef->listaOrdId();
       

        $arr = $listEditais;
        RenderUser::render_php("/views/editais.php", $arr); 
    }
    else if( $pagina == "novidades" ){
        $nf = NovidadeFactory::get();
        $listNovidades = null;
        $listNovidades = $nf->listaOrdId();
       

        $arr = $listNovidades;
        RenderUser::render_php("/views/novidades.php", $arr); 
    }
    /*else if( $pagina == "noticiaIndividual" ){
        $id = $_GET['number'];


        if( is_numeric($id) ){
            $nf   = NovidadeFactory::get();
            $noticia = $nf->getById( $id );
            if( count($noticia) != 1 ){
                $newURL = '?pagina=index';
                header('Location: ' . $newURL);
            }
            else{
                RenderUser::render_php("/views/noticia.php", $noticia[0]);
            }
        }
        else{
            $newURL = '?pagina=index';
            header('Location: ' . $newURL);
        }

    }*/
    else{
        echo "erro 404";
    }

?>
