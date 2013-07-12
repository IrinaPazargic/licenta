<?php
require 'class.PHPWebSocket.php';
set_time_limit(0);

function wsOnMessage($id_client, $data, $messageLength, $binary)
{
    global $Server;

    if ($messageLength == 0) {
        $Server->wsClose($id_client);
        foreach ($Server->wsClients as $id => $client) {
            if ($id != $id_client) {
                $Server->wsSend($id, json_encode(array('licitatia' => 1, 'user' => $data->username, 'msg' => 'S-a deconectat un fraier.')));
            }
        }
        return;
    }
    $data = json_decode($data);
    session_id($data->session_id);
    session_start();

    if (count($Server->wsClients) == 1) {
        $Server->wsSend($id_client, json_encode(array('user' => 'SISTEM', 'msg' => 'Esti singur.')));
    } else {
        foreach ($Server->wsClients as $id => $client) {
//            if ($id != $id_client && /*$licitatie['anulat'] == false*/
//                true && (int)$data->msg > 0 && /*(int)$data->msg>$suma_min*/
//                true
//            ) {
                $Server->wsSend($id, json_encode(array('licitatia' => 1, 'user' => $data->username, 'msg' => $data->msg)));
//            }
        }
    }
    session_destroy();
}

$Server = new PHPWebSocket();
$Server->bind('message', 'wsOnMessage');
echo "Staring server...";
$Server->wsStartServer('127.0.0.1', 8080);