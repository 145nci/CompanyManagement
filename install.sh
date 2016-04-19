#!/bin/bash

echo "Installing..."

sudo apt-get install apache2

sudo apt-get install mysql-server libapache2-mod-auth-mysql php5-mysql

sudo apt-get install php5 php5-cgi php5-cli php5-curl php5-dbg php5-dev php5-gd php5-intl php5-json php5-mysql php5-mcrypt php5-xdebug libapache2-mod-php5

sudo mysql_install_db
sudo /usr/bin/mysql_secure_installation

sudo printf '<IfModule mod_dir.c>\n          DirectoryIndex index.php index.html index.cgi index.pl index.php index.xhtml index.htm\n</IfModule>' > /etc/apache2/mods-enabled/dir.conf

sudo service apache2 restart

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

cd $DIR

sudo chmod -R 777 $DIR

php -r "readfile('https://getcomposer.org/installer');" > composer-setup.php
php -r "if (hash('SHA384', file_get_contents('composer-setup.php')) === '41e71d86b40f28e771d4bb662b997f79625196afcca95a5abf44391188c695c6c1456e16154c75a211d238cc3bc5cb47') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); }"
php composer-setup.php
php -r "unlink('composer-setup.php');"

php composer.phar update

sudo chmod -R 777 $DIR

a2enmod rewrite
sudo cp $DIR/.company-management.com.conf_dev /etc/apache2/sites-available/company-management.com.conf
sudo cp $DIR/.hosts_dev /etc/hosts
a2ensite company-management.com.conf

sudo service apache2 restart

echo "Done, if the script did everything correctly, you should see project start page at company-management.com"
