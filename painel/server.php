<?php
  require './proc/Controllers/vendor/autoload.php';

  $pusher = new Pusher\Pusher('d3e1dcb15e931f6aff36','578f1ff312c9b5d787b1','1805846',array('cluster'=>'sa1','useTLS'=> true));

  // $pusher
  $socket_id =  $_COOKIE['socket_id'];
  $user_id = $_COOKIE['user_id'];
  $user_info = [
    "name" => $_COOKIE['name'],
    "email" => $_COOKIE["email"]
  ];

  echo $pusher->authorizePresenceChannel("presence-client-channel", $socket_id, $user_id, $user_info);
?>
