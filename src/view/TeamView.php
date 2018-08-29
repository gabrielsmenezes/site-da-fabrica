<?php
class TeamView extends AdminAbstractView {

	public function index( $args ) { 

		require_once __VIEW__.'team/index.php'; 

	}

	public function insert() { 

		EquipeController::inserirAluno();

	}


	public function update() { 

		EquipeController::updateAluno();

	}

	public function delete() { 

		EquipeController::removerAluno();

	}

	public function edit() { 

		$af = AlunoFactory::get();
    	$aluno = null;

    	$aluno = $af->getById($_POST['alunoId'])[0]; 

    	require_once __VIEW__.'team/edit.php'; 

	}

	public function team() {

		EquipeController::get();

		$af = AlunoFactory::get();
        
        $this->index( $af->lista("3") );

	}

	

}
?>