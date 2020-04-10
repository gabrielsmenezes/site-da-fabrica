-Baixar o projeto
git clone https://github.com/gabrielsmenezes/site-da-fabrica.git

- Baixar dependencias
apt-get update
apt-get install php7.2
apt-get install software-properties-common
apt-get install php7.2-zip
apt-get install php7.2-mbstring
apt-get install php7.2-xml
apt-get install php7.2-mysql
apt-get install php7.2-mbstring
apt-get install -y php7.2 php7.2-fpm php-mysql php7.2-mysql php-mbstring php-gettext libapache2-mod-php7.2 php-doctrine-dbal php7.2-pgsql php-xml
- entrar na pasta do projeto baixado
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
-Baixar dependencias do projeto
php composer-setup.php
php -r "unlink('composer-setup.php');"
php composer.phar global require laravel/installer
apt-get install -y mysql-server
php artisan migrate
php artisan serve
