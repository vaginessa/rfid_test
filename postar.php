<?php
ini_set("display_errors","On");
error_reporting(E_ALL);

if(file_exists('src/facebook.php'))
	require('src/facebook.php');
elseif(file_exists('./src/facebook.php'))
	require('./src/facebook.php');
elseif(file_exists('../src/facebook.php'))
	require('../src/facebook.php');
else
	require('./../src/facebook.php');

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '111176918968243',
  'secret' => 'cd2dac462960cb0e8f4f31497e909bc4',
  'cookie' => true,
));


$attachment =  array(
        'access_token' => $_REQUEST['at'],
        'message' => "teste de integração rfid+php+graph api",
        'name' => "Royal Pixel",
        'link' => "http://www.royalpixel.tv",
        'description' => "Teste de postagem com cartões RFID + PHP + Facebook Graph API",
        'picture'=> "http://www.royalpixel.tv/wordpress/wp-content/themes/royalpixel2011/images/head_character.png"
        );

    //print_r($attachment);
$result = $facebook->api('/me/feed', 'POST', $attachment);

var_dump($result);