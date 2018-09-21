<?php
$response = array(
    'status' => 200,
    'messages' => 'ok',
);

header('Content-Type:application/json; charset=utf-8');
echo json_encode($response);
?>
