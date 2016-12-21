#!/usr/bin/env bash

timedatectl set-timezone America/Santiago
apt-get update

# MySQL
DBNAME="projectdb"
ROOTDBPASS="cntxmysql"

debconf-set-selections <<< "mysql-server mysql-server/root_password password $ROOTDBPASS"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $ROOTDBPASS"
apt-get install -y mysql-server

mysql -uroot -p$ROOTDBPASS -e "CREATE DATABASE $DBNAME"
mysql -uroot -p$ROOTDBPASS -e "GRANT ALL PRIVILEGES ON $DBNAME.* TO 'vagrant'@'localhost' IDENTIFIED BY ''"

# PHP + mcrypt
apt-get install -y php5 php5-mysql php5-mcrypt

# Composer
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Apache + modPHP
apt-get install -y apache2 libapache2-mod-php5
if ! [ -L /var/www ]; then
  rm -rf /var/www
  ln -fs /vagrant /var/www
fi
cp /vagrant/vagrant/php.ini /etc/php5/apache2/php.ini
cp /vagrant/vagrant/apache.conf /etc/apache2/sites-available/000-default.conf
a2enmod rewrite
systemctl restart apache2

# Si .env no existe, copia .env.example en .env
if [ -f /vagrant/.env.example ]; then cp /vagrant/.env.example /vagrant/.env; fi

# Cambia el directorio a la carpeta del proyecto en cada login
printf "\ncd /vagrant" >> /home/vagrant/.profile
