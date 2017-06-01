<?php
require_once('vendor/autoload.php');

$loop = ReactEventLoopFactory::create();

$client = new SlackRealTimeClient($loop);
$client->setToken('slack api token');
$client->connect();

$loop->run();
