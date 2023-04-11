<?php

//define the long url to shorten
$long_url = 'https://www.youtube.com/watch?v=a63cmANk86E';

//create and array with the request body
$request_body = array(
'url' => $long_url,
);


//encode the request body as JSON
$json = json_encode($request_body);

//setup headers.
$request_headers = array (
 'content-type: application/json',
 'content-length' .strlen($json),
);

//setup cUrl to make the api request
$ch = curl_init('https://tinyurl.com/api-create.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER,$request_headers);

//execute the api request
$response = curl_exec($ch);
curl_close($ch);

//output the short url 
if ($response) {
	echo 'long link: '.$long_url;
	echo  '<br>short link' .$response;
} else
{
	echo 'error creating short link';
}