<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'lib/class.websocket_client.php';

$client = new WebsocketClient;
//$client->connect('127.0.0.1', 8000, '/demo');
$client->connect('127.0.0.1', 8000, '/demo', 'licenta.irina.ro');

usleep(5000);

$payload = json_encode(array(
	'action' => 'echo',
	'data' => 'dos'
));

$client->sendData($payload);
usleep(10000);
