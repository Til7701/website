<?php

$ipAddress = $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];

header("Content-Type: application/json");
header("Warning: 299 - Deprecated for Removal: Use /api/v1/self-info instead");

echo "{\"address\": \"$ipAddress\", \"port\": \"$port\"}";
