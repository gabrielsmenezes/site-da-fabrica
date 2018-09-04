<?php


class WriteOfFile {

    private static $fileOpen;

	private function open($fileName) {
       
        self::$fileOpen = fopen($fileName, "w");
        
    }

    public function setJson($fileName, $dataJson) {

        $json = json_encode($dataJson);
        self::open($fileName);
        fwrite(self::$fileOpen, $json);
        fclose(self::$fileOpen);
        
    }

}

