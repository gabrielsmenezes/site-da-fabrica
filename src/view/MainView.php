<?php

class MainView {
	function __construct($page) {

		$this->$page();
                
	}

	public function index() { 
                	   
                $path = session_save_path() . '/sess_' . session_id();
                chmod($path, 0640);    


                $listProjetos = ProjectPresenter::listRandom( 3 );

                $sf = SobreFactory::get();
                $content = $sf->lista()[0]->getDescricao();


                $listAlunos = TeamPresenter::listRandom( 3 );


                $listNovidades = NoticePresenter::lista( 2 );

                
                $listEditais = EdictPresenter::lista( 2 );


                $args = array($content, $listProjetos, $listAlunos, $listNovidades, $listEditais);

                ob_start();

                require_once __STATIC__.'home.php'; 
                require_once __STATIC__.'footer.php';

                $var = ob_get_contents();
                ob_end_clean();
                echo $var;
                //RenderUser::render_php( __STATIC__ . "index.php", $arr);
	}

}
