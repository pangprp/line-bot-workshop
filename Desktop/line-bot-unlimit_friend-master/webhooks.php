<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'L7kLmbLtQ8tNg8+Z/+DTa1XptJUt9H6sqE6ILisu+HftoEoL+LQhdR6rIpLppGgy+8s+0TrCkV+tsmkViIZeSVEMewE8GYR0x9QohtDnSaMFhHeknWc31yGtBIy4HoKbZrxg0XP0/dteZmwc1ACfagdB04t89/1O/w1cDnyilFU=
';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
$text2 = '';
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text']."\n".$event['source']['userId']."\n";
			// Get replyToken
			$text2 = $text;
			$replyToken = $event['replyToken'];
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
require "vendor/autoload.php";
$channelSecret = '9879f9a58cd69539e9e420b06271f4bd';
$pushID = 'U44da24b9d129b2609995d06648c59514';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text2);
$response = $bot->pushMessage($pushID, $textMessageBuilder);
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
echo "ok";
echo "OK2";
