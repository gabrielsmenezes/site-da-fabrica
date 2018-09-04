<?php
class ProjectView extends AdminAbstractView {

	public function index( $args ) { 

		require_once __VIEW__.'project/index.php'; 

	}

	public function view() {

        $projetos = ProjectPresenter::listAll();
        
		if( $this->router() ) {

			$this->element( ereg_replace("[^0-9]", " ", $_SERVER['REQUEST_URI']) );

		} else {

			require_once __VIEW__.'project/view.php';
			require_once __STATIC__.'footer.php';

		}

	}

	public function element( $id ) {


       	$projeto = ProjectPresenter::element( $id );

       	require_once __VIEW__.'project/element.php';
       	require_once __STATIC__.'footer.php';

	}

	public function insert() { 

		ProjectPresenter::insert();

	}

	public function update() { 

		ProjectPresenter::update();

	}

	public function delete() { 

		ProjectPresenter::delete();

	}

	public function edit() { 

    	$projeto = ProjectPresenter::edit();
    	require_once __VIEW__.'project/edit.php'; 

	}


	public function project() {

        $this->index( ProjectPresenter::listRandom( 3 ) );

	}

	

}
?>