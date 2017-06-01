<?php
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
require_once('vendor/autoload.php');

// use Edu\Cnm\PhpSlackBot\Bots;

/**
 * Sample Slackbot
 **/

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

// add a callback that lets the bot read any incoming messages into a slack channel
$client->connect();

$client->on('message', function($data) use ($client) {
	echo "Incoming message: ".$data['text']."\n";
});

$loop->run();


