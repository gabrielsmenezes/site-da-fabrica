<?php
class AdminView extends AdminAbstractView {

	public function index() { 

		require_once __VIEW__.'admin/index.php'; 

	}

	public function about() {

        $args = AboutPresenter::lista();
        require_once __VIEW__.'admin/about.php';
       

	}

	public function updateAbout() {

		AboutPresenter::update();

	}

	
}