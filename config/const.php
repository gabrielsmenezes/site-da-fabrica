<?php
/**
 * Gera variaveis globais
 * @author Gian Fonseca <github.com/lucasgian>
 * @version 2.0.0
 */

require_once "idie/util/Decode.php";

// start da session
session_start();

$json = Decode::getJson();

foreach ($json->source as $key => $value) {

    define( '__' . strtoupper( $key ) .'__', $value );

}

define( '__APP_ROOT__', $json->app );

?>