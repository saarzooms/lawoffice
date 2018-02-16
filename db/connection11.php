<?php
//---------------------------mysql db connection ------------//
//include('db/connection.php');
$hostname='localhost';
$username='vbkavsev_report';
$password='Avsever12*';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=vbkavsev_report",$username,$password);
//    echo 'Connected to Database<br/>';
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
//---------------------------mysql db connection ------------//
/*
if($dbh){
	echo "connection successfully";
}
else{
	echo "connection faile";
}
*/
?>