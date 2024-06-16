<?php
require './proc/Controllers/vendor/autoload.php';
require './cors.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$pusher = new Pusher\Pusher($_ENV['PUSHER_KEY'],$_ENV['PUSHER_SECRET'],$_ENV['PUSHER_APP_ID'],array('cluster'=>$_ENV['PUSHER_CLUSTER'],'useTLS'=> true));


// Check if decoding was successful
if ($_POST !== null && $_POST['name'] !== null || '' && $_POST['email'] !== null || '') {
    $socket_id = $_POST['socket_id'];
    $user_id = $_POST['name'];
    $user_info = [
        "name" => $_POST['name'],
        "email" => $_POST['email']
    ];

    // Authorize the presence channel and echo the result
    echo $pusher->authorizePresenceChannel("presence-client-channel", $socket_id, $user_id, $user_info);
} else {
    // Handle JSON decode error
    http_response_code(400);
    echo "Invalid JSON payload\n";
}
?>
