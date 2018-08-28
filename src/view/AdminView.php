<?php
class AdminView {
	function __construct($page) {
		
	    $path = session_save_path() . '/sess_' . session_id();
	    chmod($path, 0640);

	    if( isset($_SESSION['user']) ) {

	    	$this->$page();
	    
	    } else {
			
			$this->login();
		
		}
	}
	public function index() { 

		require_once __VIEW__.'admin/index.php'; 

	}

	public function about() {

		SobreController::get();

		ob_start();
        require_once __VIEW__.'admin/about.php';
        $var = ob_get_contents();
        ob_end_clean();
        echo $var;

	}

	public function team() {

		EquipeController::get();

		$af = AlunoFactory::get();
        $args = $af->lista("3");

        require_once __VIEW__.'admin/team.php';

	}

	public function project() {

		ProjetosController::get();

		$af = ProjetoFactory::get();
        $args = $af->lista("3");

        require_once __VIEW__.'admin/project.php';

	}

	public function edict() {

		EditaisController::get();

		$af = EditalFactory::get();
        $args = $af->lista("3");

        require_once __VIEW__.'admin/edict.php';

	}

	public function notice() {

		NovidadesController::get();

		$af = NovidadeFactory::get();
        $args = $af->lista("3");

        require_once __VIEW__.'admin/notice.php';

	}

	public function login() { 

		new LoginView('index');

	}
	
	

	public function view() {}


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