<?php

require_once __DIR__ . '/vendor/autoload.php';

use Exception;
use MongoDB\Client;
use MongoDB\Driver\ServerApi;
// Replace the placeholder with your Atlas connection string
$uri = 'mongodb://localhost:27017/';
// Create a new client and connect to the server
$client = new MongoDB\Client($uri);

$collection = $client->forumdb->users;
$filter = ['username' => $_GET["name"]];
$result = $collection->findOne($filter);
if ($result) {
    echo json_encode($result, JSON_PRETTY_PRINT);
} else {
    echo 'Document not found';
}