#! /usr/bin/env bash

#variables
DBNAME=$1
MYSQLUSER=$2
MYSQLPASSWORD=$3

echo -e "\n> Setting up $DBNAME db...\n"
mysql -uroot -p$MYSQLPASSWORD -e "CREATE DATABASE $DBNAME"
mysql -uroot -p$MYSQLPASSWORD -e "GRANT ALL ON $DBNAME.* TO '$MYSQLUSER'@'localhost'"