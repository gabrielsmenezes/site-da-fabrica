<?php
class AdminView extends AdminAbstractView {

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

	
}
?>