<?php
abstract class AdminAbstractView {

	function __construct($page) {
		
	    if( $page === 'view' ) {

	    	$this->view();

	    } else if( isset($_SESSION['user']) ) {

	    	$this->$page();
	    
	    } else {
			
			$this->login();
		
		}
	}

	public function login() { 

		new LoginView('index');

	}

	public function view() { }

	public function index() { }

	public function edit() { }

	public function delete() { }

	public function element() {

		$this->view();

	}

	public function router() {

		$router = $_SERVER['REQUEST_URI'];

		if ( is_numeric( substr($router, -1) ) ) {

			return true;

		}

		return false;

	}

}