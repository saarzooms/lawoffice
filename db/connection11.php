<?php
//---------------------------mysql db connection ------------//
//include('db/connection.php');
$hostname='localhost';
$username='anandjin_vishal';
$password='@v$123456';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=anandjin_mis",$username,$password);
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