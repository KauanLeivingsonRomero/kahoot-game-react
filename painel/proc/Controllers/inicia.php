<?php
    
    ini_set("display_errors", 1);
    
    require './vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $options = array(
    'cluster' => $_ENV['PUSHER_CLUSTER'],
    'useTLS' => true
    );

    $pusher = new Pusher\Pusher(
        $_ENV['PUSHER_KEY'],
        $_ENV['PUSHER_SECRET'],
        $_ENV['PUSHER_APP_ID'],
        $options
    );  

    $data['message'] = 'Quiz iniciado';
    $pusher->trigger('presence-client-channel', 'my-event', $data);

    header("Location: ../../subs.php");

?>