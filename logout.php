<?php
session_start();

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['id']);
	unset($_SESSION['type']);
	unset($_SESSION['status']);
	header("Location: login.php");
}
?>