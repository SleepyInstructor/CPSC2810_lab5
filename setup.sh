apt update
apt install mysql-server -y
apt install phpmyadmin php-mysql -y
a2enconf phpmyadmin
systemctl restart apache2
