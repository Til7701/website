<?php

$ipAddress = $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];

header("Content-Type: application/json");

echo "{\"address\": \"$ipAddress\", \"port\": \"$port\"}";
