#! /usr/bin/env bash

# Variables
HOST=$1
MYSQLHOST=$2
MYSQLUSER=$3
MYSQLPASSWORD=$4

echo -e "\n> Checking status...\n"

if [ -f /home/vagrant/provisioned ]
  then
    echo -e "\n> Already installed. Updating...\n"
    apt-get -qq update
    apt-get -qq -y upgrade
    exit 0
fi

echo -e "\n> Starting installation...\n"

echo -e "\n> Updating packages list...\n"
apt-get -qq update

echo -e "\n> Install base packages...\n"
apt-get -y install vim curl build-essential python-software-properties git > /dev/null 2>&1

echo -e "\n> Add some repos to update our distro...\n"
add-apt-repository ppa:ondrej/php5-5.6 > /dev/null 2>&1

echo -e "\n> Updating packages list...\n"
apt-get -qq update

echo -e "\n> Install MySQL specific packages and settings...\n"
echo "mysql-server mysql-server/root_password password $MYSQLPASSWORD" | debconf-set-selections
echo "mysql-server mysql-server/root_password_again password $MYSQLPASSWORD" | debconf-set-selections
apt-get -y install mysql-server > /dev/null 2>&1

echo -e "\n> Setting up our MySQL user...\n"
mysql -uroot -p$MYSQLPASSWORD -e "CREATE USER '$MYSQLUSER'@'localhost' IDENTIFIED BY '$MYSQLPASSWORD'"

echo -e "\n> Installing apache and php...\n"
apt-get -y install apache2 php5 php5-mysql php5-mcrypt > /dev/null 2>&1

echo -e "\n> Enabling mod-rewrite...\n"
a2enmod rewrite > /dev/null 2>&1

echo -e "\n> Allowing Apache override to all...\n"
sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf

echo -e "\n> Disabling apache file indexes...\n"
sed -i "s/Options Indexes/Options/g" /etc/apache2/apache2.conf

echo -e "\n> Turning on php error reporting...\n"
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini
sed -i "s/short_open_tag = .*/short_open_tag = On/" /etc/php5/apache2/php.ini
sed -i "s/short_open_tag = .*/short_open_tag = On/" /etc/php5/cli/php.ini

echo -e "\n> Removing default html folder from web root...\n"
rm -rf /var/www/html > /dev/null 2>&1

echo -e "\n> Installing Composer...\n"
curl --silent https://getcomposer.org/installer | php > /dev/null 2>&1
mv composer.phar /usr/local/bin/composer

echo -e "\n> Installing NodeJS and NPM...\n"
curl -sL https://deb.nodesource.com/setup_5.x | sudo -E bash - > /dev/null 2>&1
apt-get -y install nodejs > /dev/null 2>&1

echo -e "\n> Installing gulp...\n"
npm install -g gulp > /dev/null 2>&1

echo -e "\n> Installing xdebug...\n"
apt-get -y install php5-xdebug > /dev/null 2>&1
cat > /etc/php5/apache2/conf.d/20-xdebug.ini <<EOL
[xdebug]
zend_extension=xdebug.so

xdebug.remote_enable = 1
xdebug.remote_connect_back = 1
xdebug.remote_port = 9000
xdebug.scream = 0 
xdebug.cli_color = 1
xdebug.show_local_vars = 1
EOL

echo -e "\n> Restarting Apache...\n"
service apache2 restart > /dev/null 2>&1

echo -e "\n> Setting hostname...\n"
hostname $HOST > /dev/null 2>&1
cat > /etc/hostname <<EOL
$HOST
EOL
/etc/init.d/hostname.sh start > /dev/null 2>&1

echo -e "\n> Finalizing...\n"
cd /home/vagrant
touch provisioned
cat > provisioned <<EOL
provisioned
EOL