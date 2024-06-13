<?php

    require './vendor/autoload.php';

    $options = array(
    'cluster' => 'sa1',
    'useTLS' => true
    );

    $pusher = new Pusher\Pusher(
    'd3e1dcb15e931f6aff36',
    '578f1ff312c9b5d787b1',
    '1805846',
    $options
    );

    $data['message'] = 'Quiz iniciado';
    $pusher->trigger('my-channel', 'my-event', $data);

    header("Location: ../../subs.php");

?>