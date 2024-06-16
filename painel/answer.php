<?php

  require './proc/Controllers/vendor/autoload.php';
  
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();

  $pusher = new Pusher\Pusher($_ENV['REACT_APP_PUSHER_KEY'],$_ENV['REACT_APP_PUSHER_SECRET'],$_ENV['REACT_APP_PUSHER_APP_ID'],array('cluster'=>$_ENV['REACT_APP_PUSHER_CLUSTER'],'useTLS'=> true));

  

?>