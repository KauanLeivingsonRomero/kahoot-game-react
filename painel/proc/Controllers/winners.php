<?php

require "suporte.php";
$exec   = new Processo();

$winners = $exec->getWinners();

$winner1 = $winners[0]['name'];
$winner2 = $winners[1]['name'];
$winner3 = $winners[2]['name'];

echo $winner1;
echo " ";
echo $winner2;
echo " ";
echo $winner3;

?>