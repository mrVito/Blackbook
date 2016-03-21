#! /usr/bin/env bash

# Variables
HOST=$1
DOC_ROOT=$2

echo -e "\n> Setting up $HOST...\n"
rm /etc/apache2/sites-enabled/000-default.conf > /dev/null 2>&1
touch /etc/apache2/sites-available/$HOST.conf > /dev/null 2>&1
cat > /etc/apache2/sites-available/$HOST.conf <<EOF
<VirtualHost *:80>
    ServerName $HOST
    DocumentRoot $DOC_ROOT
    ErrorLog \${APACHE_LOG_DIR}/error.log
    CustomLog \${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF
ln -fs /etc/apache2/sites-available/$HOST.conf /etc/apache2/sites-enabled/$HOST.conf > /dev/null 2>&1