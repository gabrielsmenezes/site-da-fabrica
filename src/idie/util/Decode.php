<?php


class Decode {

    private static $data;

	private function instance() {

        if ( empty(self::$data) ) {
            self::$data = self::findData();
        }

    }

    private function findData() {

        $file = file_get_contents('config/project.json');
        return json_decode($file); 
        
    }

    public function getJson() {

        self::instance();
        return self::$data;

    }

}

?>