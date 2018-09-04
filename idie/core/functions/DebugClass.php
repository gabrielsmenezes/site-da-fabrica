<?php

class DebugClass {

    public function dump_var($array) {

        BootstrapClass::getCadText( self::deepSearch($array) );

    }

    private function deepSearch( $array, $tab="" ) {
        $presenter = "";
        
        if( is_object( $array ) ) {
            $array = (array) $array;
        }

        if ( null == current( $array ) ) {
            return;
        }

        foreach($array as $key => $value) {
            
            $key = $tab . $key;
            if ( is_array( $value ) || is_object( $value ) ) {
                
                $presenter = $presenter .  $key . "[<br>" . self::deepSearch($value, $tab . "&nbsp;&nbsp;&nbsp;&nbsp;") .$tab . "]<br><br>";
            
            }

            else {
                
                $presenter =  $presenter . $key . " => " . $value . "<br>"; 

            }

        }

        return $presenter;

    }
    
}