<?php



require "vendor/autoload.php";

$access_token = 'L7kLmbLtQ8tNg8+Z/+DTa1XptJUt9H6sqE6ILisu+HftoEoL+LQhdR6rIpLppGgy+8s+0TrCkV+tsmkViIZeSVEMewE8GYR0x9QohtDnSaMFhHeknWc31yGtBIy4HoKbZrxg0XP0/dteZmwc1ACfagdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'af5b959f84ea8dc4e6fe4905f044ab24';
// ID ที่ต้องการส่งไปหา
$pushID = 'U1391117f7ce7c60d5a9de976d0a5614e';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('มาลองตอบอะไรก็ได้กัน');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
echo "OK2";







