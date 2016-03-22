#!/bin/bash

mysql -u blackbook -pblackbook blackbook < install.sql
mysql -u blackbook -pblackbook blackbook < seed.sql