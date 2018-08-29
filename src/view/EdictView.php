<?php
class EdictView extends AdminAbstractView {

	public function index( $args ) { 

		require_once __VIEW__.'edict/index.php'; 

	}

	public function edit() { 

    	$ef = EditalFactory::get();

	    $edital = $ef->getById($_POST['editalId'])[0];   

    	require_once __VIEW__.'edict/edit.php'; 

	}

	public function edict() {

		EditaisController::get();

		$af = EditalFactory::get();

        $this->index( $af->lista("3") );

	}

	

}
?>