<?php


use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

//Configure Dropbox Application
$app = new DropboxApp("client_id", "client_secret");

//Configure Dropbox service
$dropbox = new Dropbox($app);

//DropboxAuthHelper
$authHelper = $dropbox->getAuthHelper();

//Callback URL
$callbackUrl = "https://{my-website}/login-callback.php";

//Fetch the Authorization/Login URL
$authUrl = $authHelper->getAuthUrl($callbackUrl);