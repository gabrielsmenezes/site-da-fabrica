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
     * @return string
     */
    public function on() {
		
		self::$routes = Decode::getJson()->routes;

		$context = substr($_SERVER['REQUEST_URI'], strlen(__APP_ROOT__));

		foreach (self::$routes as $key => $value) {
			if ($value->name == $context) {
				return $value;
			}
		}

		return self::$routes[0];
    }
}

?>