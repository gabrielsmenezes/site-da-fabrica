<?php
class TeamView extends AdminAbstractView {

	public function index( $args ) { 

		require_once __VIEW__.'team/index.php'; 

	}

	public function view() { 
 		
        $alunos = TeamPresenter::listAll();

        require_once __VIEW__.'team/view.php';
        require_once __STATIC__.'footer.php';

	}

	public function insert() { 

		TeamPresenter::insert();

	}


	public function update() { 

		TeamPresenter::update();

	}

	public function delete() { 

		TeamPresenter::delete();

	}

	public function edit() { 

		
		$aluno = TeamPresenter::edit();

    	require_once __VIEW__.'team/edit.php'; 

	}

	public function team() {
        
        $this->index( TeamPresenter::listRandom( 3 ) );

	}

	

}
?>