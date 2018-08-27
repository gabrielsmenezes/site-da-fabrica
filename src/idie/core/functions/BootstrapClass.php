<?php

class BootstrapClass {

    private $link;

    public function getAllStyle() {

        if ( empty($this->link) ) {
        
            $this->link = '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">';
            echo $this->link;
        
        }

    }

    public function getCadText($body) {

        self::getAllStyle();

        echo "
            <br>
            <div class='container'>
            
                <div class='card' style='width: 18rem;'>
                    <div class='card-header'>
                        " . $body . "
                    </div>
                </div>
            </div>
        ";
    }
    
}