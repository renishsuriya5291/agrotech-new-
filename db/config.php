<?php

require_once 'vendor/autoload.php';
session_start();

// init configuration
$clientID = '837007103942-1m0uhlp66bgcd5k22jff1pa0cftbc94d.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://aggrotech.herokuapp.com/index.php';
// $redirectUri = 'http://localhost/agrotech-new-/index.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
?>