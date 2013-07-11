<?php
require_once "lib/Mail-1.2.0/Mail.php";

/**
 * @param $username
 * @param $password
 * @param $from
 * @param $to
 * @param $subject
 * @param $body
 * @return bool
 */
function trimite_email($username, $password, $from, $to, $subject, $body)
{

    $host = "ssl://smtp.gmail.com";
    $port = "465";
    $headers = array(
        'From' => $from,
        'To' => $to,
        'Subject' => $subject
    );
    $smtp = Mail::factory('smtp', array(
        'host' => $host,
        'port' => $port,
        'auth' => true,
        'username' => $username,
        'password' => $password
    ));
    $mail = $smtp->send($to, $headers, $body);
    return is_bool($mail) === true && $mail == true;
}