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
  'appId'  => 'APP ID',
  'secret' => 'SECRET TOKEN (pegar no developers.facebook)',
  'cookie' => true,
));


$attachment =  array(
        'access_token' => $_REQUEST['at'],
        'message' => "teste de integração rfid+php+graph api",
        'name' => "Nome que irá aparecer",
        'link' => "https://www.youtube.com/watch?v=6fnD3DPlibQ",
        'description' => "Teste de postagem com cartões RFID + PHP + Facebook Graph API",
        'picture'=> "https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-ash2/t1.0-9/1381856_540353166032869_1248947864_n.jpg"
        );

    //print_r($attachment);
$result = $facebook->api('/me/feed', 'POST', $attachment);

var_dump($result);
