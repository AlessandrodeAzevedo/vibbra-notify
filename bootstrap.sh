sudo apt update  -y
sudo apt install nginx -y
sudo apt install php-fpm  -y
sudo rm /etc/nginx/sites-enabled/default
sudo cp /var/www/vibbra/vibbra.conf /etc/nginx/sites-enabled/
sudo apt install php-intl -y
sudo apt install php-mbstring -y
sudo apt install php-mysql -y
sudo apt install php-sqlite3 -y
sudo apt install php-zip -y
sudo apt install unzip -y
sudo apt -y install mariadb-server mariadb-client
sudo mysqladmin -u root password root
sudo service php7.4-fpm restart
sudo service mysql restart
sudo service nginx restart
echo "CREATE DATABASE vibbra" | mysql -uroot -proot
wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.focal_amd64.deb
sudo dpkg -i wkhtmltox_0.12.6-1.focal_amd64.deb 
sudo apt --fix-broken install -y
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
sudo su vagrant
#/vagrant/composer install --ignore-platform-reqs
#/var/www/vibbra/bin/cake migrations migrate