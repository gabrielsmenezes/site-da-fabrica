<?php
class ProjectView extends AdminAbstractView {

	public function index( $args ) { 

		require_once __VIEW__.'project/index.php'; 

	}

	public function insert() { 

		ProjetosController::inserirProjeto();

	}

	public function update() { 

		ProjetosController::updateProjeto();

	}

	public function delete() { 

		ProjetosController::removerProjeto();

	}

	public function edit() { 

		$pf = ProjetoFactory::get();

    	$projeto = $pf->getById($_POST['projectId'])[0];
	
    	require_once __VIEW__.'project/edit.php'; 

	}


	public function project() {

		ProjetosController::get();

		$af = ProjetoFactory::get();

        $this->index( $af->lista("3") );

	}

	

}
?>