<?php
SESSION_START();
$no=$_SESSION['id'];
include('../db/connection.php');
if(isset($_REQUEST['old']))
{	
	$old= $_REQUEST['old'];
	//$okay = preg_match('/^[a-z0-9_\.-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $em);
	if (isset($old))
	{
		$sql1="SELECT password FROM staff_master WHERE password='$old' and id='$no'" ;
		$del = $dbh->prepare($sql1);
		$del->execute();
		$count = $del->rowCount();
	
		if($count==0)
		{
			echo "<script>$('#o').html('old password do not match please enter again !!!');</script>";
			
		}
		else{
					echo "<script>$('#o').html('');</script>";
				echo "<script>$('#old').html('".$old."');</script>";
				
		}

	} 
	else
	{
		
	}
}
else if(isset($_REQUEST['old_pass']) && isset($_REQUEST['new_pass']))
{
	$old=$_REQUEST['old_pass'];
	$new=$_REQUEST['new_pass'];
	
	$sql="UPDATE `staff_master` SET `password`='$new' WHERE id='$no'";
	if($dbh->query($sql))
	{
		echo "<script>$('#msg').html('password change Successfully');</script>";
	}
}
?>