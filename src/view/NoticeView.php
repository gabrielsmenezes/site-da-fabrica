<?php
class NoticeView extends AdminAbstractView {

	public function index( $args ) { 

		require_once __VIEW__.'notice/index.php'; 

	}

	public function edit() { 

		$nf = NovidadeFactory::get();
		
    	$novidade = $nf->getById($_POST['novidadeId'])[0];

    	require_once __VIEW__.'notice/edit.php'; 

	}

	public function notice() {

		NovidadesController::get();

		$af = NovidadeFactory::get();
        
        $this->index( $af->lista("3") );

	}
	

}
?>