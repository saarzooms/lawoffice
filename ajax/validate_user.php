<?php
	include('../db/connection.php');
	session_start();
	
	if(isset($_REQUEST['email']) && isset($_REQUEST['psw']))
	{
		$email = $_REQUEST['email'];
		$pwd = $_REQUEST['psw'];
		
		$sql = "SELECT `staff_master`.*,department_master.department_name  FROM `staff_master` inner join department_master on department_master.id=staff_master.department_id where `email`='$email' and `password`='$pwd' ";
		
		$email_id='';
		$psw='';
		$user_id='';
		$user_type='';
		//$dept_id='';
		$status='';
		foreach ($dbh->query($sql) as $result)
		{
			//$dept_id=$result['department_id'];
			//$sel="SELECT `department_name` FROM `department_master` WHERE `id`='$dept_id'";
			
			//foreach($dbh->query($sel) as $dept)
			//{
				$user_type=$result['department_name'];
			//}
			$email_id=$result['email'];
			$psw=$result['password'];
			$user_id=$result['id'];
			$status=$result['status'];
			
		}
		
		$result=array();
			if($email=$email_id && $pwd=$psw)
			{
			    if($status=='active' or $status=='admin')
				{
				
				 $_SESSION['id']=$user_id;
				 $_SESSION['type']=$user_type;
				 $_SESSION['status']=$status;
				 array_push($result,$status,$user_type);
				 echo json_encode($result);
				 
				}
				else
				{
					array_push($result,2);
				 echo json_encode($result);
				}
			}else
			{
				array_push($result,0);
				 echo json_encode($result);	
			
			}
		
		
				
		
	}
	
	
?>