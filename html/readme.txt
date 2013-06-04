How to dump db schema?
$ mysqldump -u root -proot cinemadb --no-data > /opt/ui/irina/licenta/html/cinemadb.sql

How to dump db schema and data?
$ mysqldump -u root -proot cinemadb > /opt/ui/irina/licenta/html/cinemadb_full.sql

How to see if smth goes wrong in php.
$ cd /var/log/apache2
$ tail -f *.log
