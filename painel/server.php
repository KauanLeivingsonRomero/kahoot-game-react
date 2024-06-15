<?php
require './proc/Controllers/vendor/autoload.php';
require './cors.php';
$pusher = new Pusher\Pusher('d3e1dcb15e931f6aff36','578f1ff312c9b5d787b1','1805846',array('cluster' => 'sa1','useTLS'=> true));

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
