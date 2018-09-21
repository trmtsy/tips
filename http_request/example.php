<?php
require_once('./http_request.php');

$httpRequest = new HttpRequest();
$httpRequest->setUrl('https://www.example.com/api.php');

$params = array(
    'parameter' => '0123',
);

$httpRequest->setParams($params);
$httpRequest->execute();
$response = $httpRequest->getJsonDecode();

var_dump($response);
?>
