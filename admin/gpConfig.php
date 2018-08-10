<?php


//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '348072541716-1mi8aiqceail52h5c2qs06f2kn0vcesg.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'wubz0Sdch6eHqY9L-g9zKjW-'; //Google client secret
$redirectURL = 'http://localhost/phpblog/admin/index.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>