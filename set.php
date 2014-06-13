<?php
session_start();
$_SESSION['funcao'] = $_POST['fun'];
echo $_POST['fun'];
?>