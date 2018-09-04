<?php

class ExPresenter {
	function __construct($method) {
		$this->$method();
	}

	function one() {
		PostTable::add(
			new PostEntity(
				$_POST['name'], 'test', 'livre', $_POST['description']
			)
		);
	}


}