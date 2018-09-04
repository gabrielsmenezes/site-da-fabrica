<?php
class LoginView {
	function __construct($page) {

		$this->$page();

	}

	/**
     * Método responsável pela tela default de login
     * @param message uma String com uma mesagem de erro 
     */
	public function index( $message = null ) { 

		require_once __VIEW__.'login/index.php'; 

	}

	/**
     * Método responsável pela validação de usuário 
     */
	public function credential() {

		// realiza a validação do login e senha
		if( LoginPresenter::login() ) {
			// página inicial do admin
			new AdminView('index');
		
		} else {

			// página de login
			$this->index( 'Usuário ou senha incorretos' );

		}
		

	}

	/**
     * Método responsável pelo logout do usuário 
     */
	public function logout() {

		LoginPresenter::sair();

		$this->index();
		
	}
	
}
?>