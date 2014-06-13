<?php
session_start();
if(isset($_SESSION['funcao']) && $_SESSION['funcao']!=""){
	echo $_SESSION['funcao'];
	$_SESSION['funcao'] = "";
}else{
	echo "0";
}
?>