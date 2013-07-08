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
What need to be done to allow web application to access the file system with full rights (example: upload files)
========================================================================================================================
Because the web application uses the www-data user we need to allow access to the files/folders for www-data.
One way of doing that is make it the owner of the files/folders:

    Example:

        $ sudo chown www-data:www-data -R /opt/ui/irina/licenta/html/uploads
            where: -R option stands for recursively apply

        With this command the web application can access (with full rights) the folders,
        subfolders and contained files:
        Rights: read, write, execute

        If do not want to change the owner of the files/folders, then provide rwx rights to other:
        In order to see the information about a file/folder use stat command:

        $ sudo stat /opt/ui/irina/licenta/html/uploads

========================================================================================================================
Hints:
========================================================================================================================
I usually push in run configuration in github, so whoever have this IDE can run these from the combo in IDE toolbar
(upper side of the IDE)

/opt/ui/irina/licenta/html/uploads






