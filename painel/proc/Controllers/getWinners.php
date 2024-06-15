<?php

  require './suporte.php';
  require '../../cors.php';

  $exec = new Processo();
  $winners = $exec->getWinners();

  // Set the content-type header to application/json
  header('Content-Type: application/json');

  // Echo the winners as a JSON-encoded string
  echo json_encode($winners);

?>
