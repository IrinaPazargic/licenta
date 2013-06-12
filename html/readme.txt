========================================================================================================================
How to dump db schema?
========================================================================================================================
$ mysqldump -u root -proot cinemadb --no-data > /opt/ui/irina/licenta/html/cinemadb.sql

How to dump db schema and data?
$ mysqldump -u root -proot cinemadb > /opt/ui/irina/licenta/html/cinemadb_full.sql

========================================================================================================================
How to see if smth goes wrong in php.
========================================================================================================================
$ cd /var/log/apache2
$ tail -f *.log

========================================================================================================================
How to test php websocket.
========================================================================================================================
There are 2 files to run in this particular order:
1. php $path_to/licenta/html/websocket/server/server.php
2. php $path_to/licenta/html/websocket/client/simple_test_server.php

And then check the output in server.php process.
It should look like

2013-06-11 23:07:29 [info] Server created
2013-06-11 23:08:21 [info] [client 127.0.0.1:50724] Connected
2013-06-11 23:08:21 [info] [client 127.0.0.1:50724] Performing handshake
2013-06-11 23:08:21 [info] [client 127.0.0.1:50724] Handshake sent
onConnect
onTextData
string(30) "{"action":"echo","data":"dos"}"
2013-06-11 23:08:21 [info] [client 127.0.0.1:50724] Disconnected
onDisconnect

...if not something bad happen

========================================================================================================================
PhpStorm useful shortcuts:
========================================================================================================================
Ctrl+Shift+C to copy the path of the selected file in project tool window (left side of the IDE)

========================================================================================================================
Hints:
========================================================================================================================
I usually push in run configuration in github, so whoever have this IDE can run these from the combo in IDE toolbar
(upper side of the IDE)








