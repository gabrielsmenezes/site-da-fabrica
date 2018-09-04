<?php

class MainView {
        
	function __construct($page) {

		$this->$page();
                
	}

	public function index() { 
                
                $args = array(

                        AboutPresenter::lista(),
                        ProjectPresenter::listRandom( 3 ),
                        TeamPresenter::listRandom( 3 ),
                        NoticePresenter::lista( 2 ),
                        EdictPresenter::lista( 2 )

                );

                require_once __STATIC__.'home.php'; 
                require_once __STATIC__.'footer.php';

	}

}
