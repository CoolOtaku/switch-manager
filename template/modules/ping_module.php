<?php
  $ip = $_POST['ip'];
  $port = 80; 
  $waitTimeoutInSeconds = 1; 
  $fp = fsockopen($ip,$port,$errCode,$errStr,$waitTimeoutInSeconds);
  if($fp){
    exit("online");
  } else {
    exit("offline");
  } 
?>