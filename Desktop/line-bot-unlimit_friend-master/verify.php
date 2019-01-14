<?php
$access_token = 'L7kLmbLtQ8tNg8+Z/+DTa1XptJUt9H6sqE6ILisu+HftoEoL+LQhdR6rIpLppGgy+8s+0TrCkV+tsmkViIZeSVEMewE8GYR0x9QohtDnSaMFhHeknWc31yGtBIy4HoKbZrxg0XP0/dteZmwc1ACfagdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
