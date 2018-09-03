<?php
class NoticeView extends AdminAbstractView {

	public function index( $args ) { 

		require_once __VIEW__.'notice/index.php'; 

	}

	public function view() { 

		$novidades = NoticePresenter::listAll();

        require_once __VIEW__.'notice/view.php';
        require_once __STATIC__.'footer.php';

	}

	public function insert() { 

		NoticePresenter::insert();

	}

	public function update() { 

		NoticePresenter::update();

	}

	public function delete() { 

		NoticePresenter::delete();

	}

	public function edit() { 

    	$novidade = NoticePresenter::edit();
    	require_once __VIEW__.'notice/edit.php'; 

	}

	public function notice() {

        $this->index( $listNovidades = NoticePresenter::lista( 2 ) );

	}
	

}
?>