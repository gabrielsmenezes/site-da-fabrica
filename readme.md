Instalação
  - Baixar o projeto:
    - git clone https://github.com/gabrielsmenezes/site-da-fabrica.git
    - acesse a pasta do projeto para os proximos passos
  
  Instalar o PHP <= 7.1.3
    apt-get install php7.1
  
  Instalar o Composer:
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
  
  Instalar o laravel
    apt-get install software-properties-common
    apt-get install php7.2-zip
    php composer.phar global require laravel/installer
    apt-get install php7.2-mbstring
    apt-get install php7.2-xml
    
 Baixando as dependencias
    comentar o arquivo config/database.php o codigo <code>options' => array_filter([
             PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
        ]),</code>
    php composer.phar install
    
 Banco de dados
    as infos do banco ficam no .env, voce devera criar um banco com as mesmas credenciais ou muda-las nesse arquivo, lembrando que esses dados sao os dados do banco de produção

  Rodando o servidor
    php artisan serve
