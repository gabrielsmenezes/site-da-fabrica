<?php
class EdictView extends AdminAbstractView {

	public function index( $args ) { 

		require_once __VIEW__.'edict/index.php'; 

	}

	public function view() {

		$ef = EditalFactory::get();

        $editais = $ef->listaOrdId();
       
		require_once __VIEW__.'edict/view.php';
		require_once __STATIC__.'footer.php';

	}

	public function insert() { 

		EditaisController::inserirEdital();

	}

	public function update() { 

		EditaisController::updateEdital();

	}

	public function delete() { 

		EditaisController::removerEdital();

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