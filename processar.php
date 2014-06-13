<?php
session_start();

$last_rfid = $_SESSION['last_token_rfid'];

$access_token = $_REQUEST['at'];
$secret = $_REQUEST['secret'];
$session_key = $_REQUEST['session_key'];
$sig = $_REQUEST['sig'];
$uid = $_REQUEST['uid'];
$expires = $_REQUEST['expires'];


if(trim($last_rfid)=="" || trim($access_token)=="")die("1");

include_once("db.php");
//Aqui salvo o cartão na base de dados e chamo outro arquivo.. O que posta no wall
if(mysql_query("INSERT INTO card(`id`,`rfid`) VALUES(0,'".$last_rfid."') ")){
	
	$last_mysql_id = mysql_insert_id();
	if(mysql_query("INSERT INTO ids(`id`,`id_card`,`access_token`) VALUES(0,".$last_mysql_id.",'".$access_token."');")){

		if(mysql_query("INSERT INTO dados(`access_token`,`secret`,`session_key`,`sig`,`uid`,`expires`) 
						VALUES('".$access_token."','".$secret."','".$session_key."','".$sig."','".$uid."','".$expires."');")){
			echo $access_token;
		}else{
			mysql_query("DELETE * FROM card WHERE id=".$last_mysql_id." LIMIT 1");
			mysql_query("DELETE * FROM ids WHERE access_token=".$access_token." LIMIT 1");
		}
		
	}else{
		mysql_query("DELETE * FROM card WHERE id=".$last_mysql_id." LIMIT 1");
		echo "3";
	}

}else{
	echo "3";
}

mysql_close();
?>