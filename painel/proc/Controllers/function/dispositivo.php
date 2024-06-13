<?php
//verifica o tipo dispositivo que esta acessandoee
function getDispositivo()
{
  
  $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
  $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
  $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
  $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
  $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
  $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
  $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
  
  if ($iphone == true) {
    $dispositivo = "Dispositivo movel Iphone";
  }elseif ($ipad == true) {
    $dispositivo = "Dispositivo movel Ipad";
  }elseif ($android == true)  {
    $dispositivo = "Dispositivo movel Android";
  }elseif ($palmpre || $ipod || $berry || $symbian == true) { 
    $dispositivo = "Dispositivo movel";
  } else {
    $dispositivo = "Computador ou Notebook";
  }
  return $dispositivo;
}

//verifica o ip
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

?>