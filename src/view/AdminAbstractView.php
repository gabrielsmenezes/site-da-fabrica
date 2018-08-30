<?php
abstract class AdminAbstractView {

	function __construct($page) {
		
	    if( $page === 'view' ) {

	    	$this->view();

	    } else if( isset($_SESSION['user']) ) {

	    	$this->$page();
	    
	    } else {
			
			$this->login();
		
		}
	}

	public function login() { 

		new LoginView('index');

	}

	public function view() { }

	public function index() { }

	public function edit() { }

	public function delete() { }

	public function element() {

		$this->view();

	}

	public function router() {

		$router = $_SERVER['REQUEST_URI'];

		if ( is_numeric( substr($router, -1) ) ) {

			return true;

		}

		return false;

	}


	public function test() {
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

        return array($content, $listProjetos, $listAlunos, $listNovidades, $listEditais);
	}
}
?>