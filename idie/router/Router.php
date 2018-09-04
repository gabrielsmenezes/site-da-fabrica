<?php
/**
 * @author Gian Fonseca
 */

class Router {

	/*
		Configuração de rotas.
	*/
	private static $routes;
	

    /**
     * @return String
     */
    public function on() {
		
		self::$routes = Decode::getJson()->routes;

		$router = substr($_SERVER['REQUEST_URI'], strlen(__APP_ROOT__));

		$context = $this->subRouter( $router );

		foreach (self::$routes as $key => $value) {
			if ($value->name == $context) {
				return $value;
			}
		}

		return self::$routes[0];
    }


    public function subRouter( $router ) {

    	if ( is_numeric( substr($router, -1) ) ) {

    		return ereg_replace("[^a-z]+$", "", $router) . '/element';

    	}

    	return $router;

    }
}

?>