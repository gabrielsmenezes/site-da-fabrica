<?php 
    
    class AboutPresenter {
        
        private static $attributes = array("descricao");

        /**
         * Buscas, devolve o Sobre
         * @return Sobre, somente a descrição do sobre é retornada
         */
        static public function lista() {

            return SobreFactory::get()->lista( null, self::$attributes )[0]->getDescricao();
            
        }

        static public function update() {

            $sobreObj = new Sobre( $_POST['sobre'] );
            SobreFactory::get()->update($sobreObj);
            self::redirect("");

        }

    


        /**
         * Redireciona para a página de equipes com uma messagem de sucesso ou erro.
         * @param messaga String, uma mesagem de sucesso ou erro.
         * @param sucess boolean, o status de sucesso (true) ou erro (false).
         */
        private function redirect( $message, $success = true, $route = "../sobre" ) {

            if( $success ) {

                $_SESSION['msgEquipe'] = $message;
                header('Location: '. $route);

            } else {

                $_SESSION['msgEquipe'] = $message;
                header('Location: ' . $route);

            }
            

        }

    }