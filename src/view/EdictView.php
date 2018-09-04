<?php
class EdictView extends AdminAbstractView {

	public function index( $args ) { 

		require_once __VIEW__.'edict/index.php'; 

	}

	public function view() {

        $editais = EdictPresenter::listAll();

		require_once __VIEW__.'edict/view.php';
		require_once __STATIC__.'footer.php';

	}

	public function insert() { 

		EdictPresenter::insert();

	}

	public function update() { 

		EdictPresenter::update();

	}

	public function delete() { 

		EdictPresenter::delete();

	}

	public function edit() { 

	    $edital = EdictPresenter::element( $_POST['editalId'] );   

    	require_once __VIEW__.'edict/edit.php'; 

	}

	public function edict() {

        $this->index( EdictPresenter::lista( 3 ) );

	}


	

}
?>