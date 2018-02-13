<?php
//---------------------------mysql db connection ------------//
//include('db/connection.php');
$hostname='us-cdbr-iron-east-05.cleardb.net';
$username='b9f4b048546dd8';
$password='4aa15ad9';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=heroku_e347d42b789f20a",$username,$password);
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