<?php
class AdminView extends AdminAbstractView {

	public function index() { 

		require_once __VIEW__.'admin/index.php'; 

	}

	public function about() {

		$sf = SobreFactory::get();
        $args = $sf->lista()[0]->getDescricao();

        require_once __VIEW__.'admin/about.php';
       

	}

	public function updateAbout() {

		SobreController::update();

	}

	
}
?>