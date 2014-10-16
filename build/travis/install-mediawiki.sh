#!/bin/bash
set -ex

cd ..

wget https://github.com/wikimedia/mediawiki-core/archive/$MW.tar.gz
tar -zxf $MW.tar.gz
mv mediawiki-$MW mw

cd mw

if [ "$DB" == "postgres" ]
then
  # See #458
  sudo /etc/init.d/postgresql stop
  sudo /etc/init.d/postgresql start

  psql -c 'create database its_a_mw;' -U postgres
  php maintenance/install.php --dbtype $DB --dbuser postgres --dbname its_a_mw --pass nyan TravisWiki admin --scriptpath /TravisWiki
else
  mysql -e 'create database its_a_mw;'
  php maintenance/install.php --dbtype $DB --dbuser root --dbname its_a_mw --dbpath $(pwd) --pass nyan TravisWiki admin --scriptpath /TravisWiki
fi
