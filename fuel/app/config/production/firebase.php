<?php 
return array
(
	'server_key' => 'AIzaSyCXkebrOdLMWB2tCi1IA9QCxgPJroOCqcc',
);
?>


curl --header "Authorization: key=AIzaSyCXkebrOdLMWB2tCi1IA9QCxgPJroOCqcc"      --header Content-Type:"application/json"      https://fcm.googleapis.com/fcm/send      -d "{\"to\": \"/topics/all\",\"priority\":\"high\",\"content_available\":true,\"notification\": {\"body\": \"お知ら せ\",\"badge\": \"1\"}}"