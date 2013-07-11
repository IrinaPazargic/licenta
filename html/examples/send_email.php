<?php
require_once "../lib/Mail-1.2.0/Mail.php";

/**
 * @param $from
 * @param $to
 * @param $subject
 * @param $body
 */
function sentEmail($username, $password, $from, $to, $subject, $body)
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

$username = "irina.pazargic@gmail.com";
$password = "gigel123";
$from = "irina.pazargic@gmail.com";
$to = "pazargic_irina@yahoo.com, antonel.pazargic@gmail.com";
$subject = "Hi! This is spam.";
$body = "Hi,\n\nHow are you? Sent through Mail.php";

$result = sentEmail($username, $password, $from, $to, $subject, $body);

if ($result) {
    echo "<p>Message successfully sent!</p>";
} else {
    echo "<p>Cannot sent message. An error has occurred.</p>";
}
