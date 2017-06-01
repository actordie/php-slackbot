<?php
require_once('vendor/autoload.php');

//grab mySQL statement
$config = readConfig("/etc/apache2/capstone-mysql/piomirrors.ini");

//variable that will house the API key for the Slack API
$slack = $config["slack"];

//connects to Slack API
$loop = ReactEventLoopFactory::create();

$client = new SlackRealTimeClient($loop);
$client->setToken($slack);
$client->connect();

$loop->run();
