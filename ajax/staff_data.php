<?php
include('../db/connection.php');

if(isset($_REQUEST['dept'])&& isset($_REQUEST['empname'])&& isset($_REQUEST['empsurname']) && isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['mobile']) && isset($_REQUEST['status']) && isset($_REQUEST['empdt']) && isset($_REQUEST['terdt'])&& isset($_REQUEST['note']) )
{
	//echo "data";
	$dept=$_REQUEST['dept'];
	$empname=$_REQUEST['empname'];
	$empsurname=$_REQUEST['empsurname'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$mobile=$_REQUEST['mobile'];
	$status=$_REQUEST['status'];
	
	$empdt=date("Y-m-d", strtotime($_REQUEST['empdt']));
	$terdt=date("Y-m-d", strtotime($_REQUEST['terdt']));
	$note=$_REQUEST['note'];

	$ins="INSERT INTO `staff_master`(`department_id`, `name`, `surname`, `email`, `password`, `mobile`, `status`, `employment_date`, `termination_date`, `note`) VALUES ('$dept','$empname','$empsurname','$email','$password','$mobile','$status','$empdt','$terdt','$note')";	
	if($dbh->query($ins))
	{
		echo "Data Inserted Successfully";
	}
	
}
//update
else if(isset($_REQUEST['update_id1']) && isset($_REQUEST['dept1'])&& isset($_REQUEST['empname1'])&& isset($_REQUEST['empsurname1']) && isset($_REQUEST['email1']) && isset($_REQUEST['password1']) && isset($_REQUEST['mobile1']) && isset($_REQUEST['status1']) && isset($_REQUEST['empdt1']) && isset($_REQUEST['terdt1'])&& isset($_REQUEST['note1']) )
{
	//echo "data";
	$update_id=$_REQUEST['update_id1'];
	$dept=$_REQUEST['dept1'];
	$empname=$_REQUEST['empname1'];
	$empsurname=$_REQUEST['empsurname1'];
	$email=$_REQUEST['email1'];
	$password=$_REQUEST['password1'];
	$mobile=$_REQUEST['mobile1'];
	$status=$_REQUEST['status1'];
	
	$empdt=date("Y-m-d", strtotime($_REQUEST['empdt1']));
	$terdt=date("Y-m-d", strtotime($_REQUEST['terdt1']));
	$note=$_REQUEST['note1'];

	$upd="UPDATE `staff_master` SET `department_id`='$dept',`name`='$empname',`surname`='$empsurname',`email`='$email',`password`='$password',`mobile`='$mobile',`status`='$status',`employment_date`='$empdt',`termination_date`='$terdt',`note`='$note' WHERE `id`='$update_id'";
	
	if($dbh->query($upd))
	{
		echo "Data updated Successfully";
	}
	
}
//view staff details
else if(isset($_REQUEST['edit_id']))
{
	
	$edit_id=$_REQUEST['edit_id'];
	$result=array();
	$sql="SELECT * FROM `staff_master` where `id`='$edit_id' ";
	foreach ($dbh->query($sql) as $row)
	{
		$id=$row['id'];
		$dept=$row['department_id'];
		
		$empname=$row['name'];
		$empsurname=$row['surname'];
		$email=$row['email'];
		$password=$row['password'];
		$mobile=$row['mobile'];
		$status=$row['status'];
		$empdt=date("d-m-Y", strtotime($row['employment_date']));
	    $terdt=date("d-m-Y", strtotime($row['termination_date']));
		//$empdt=$row['employment_date'];
		//$terdt=$row['termination_date'];
		$note=$row['note'];
	}
	array_push($result,$dept,$empname,$empsurname,$email,$password,$mobile,$status,$empdt,$terdt,$note,$id);
	echo json_encode($result);
}
//delete staff member
else if(isset($_REQUEST['del_id']))
{
	$del_id=$_REQUEST['del_id'];
	$delete="DELETE FROM `staff_master` WHERE id='$del_id'";
	if($dbh->query($delete))
	{
		echo "data deleted successfully";
	}
}
//load table data
else if(isset($_REQUEST['dl']))
{
	$sel="select * from `staff_master` order by `id`";
	foreach($dbh->query($sel) as $row)
	{
		?>
			<tr>
				<?php
				$sel2='select department_name from department_master where id="'.$row['department_id'].'"';
				foreach($dbh->query($sel2) as $row2)
				{
					?>
					<td><?php echo $row2['department_name']; ?></td>
			
				<?php		
				}
				?>
				
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['surname']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['password']; ?></td>
				<td><?php echo $row['mobile']; ?></td>
				<td><?php echo $row['status']; ?></td>
				<td><?php echo date("F d,Y", strtotime($row['employment_date'])); ?></td>
				<td><?php echo date("F d,Y", strtotime($row['termination_date'])); ?></td>
				<td><?php echo $row['note']; ?></td>
				<td>
				<button  class="btn_up btn btn-xs btn-warning" id="btn_view" value="<?php echo $row['id']; ?>" ><i class="glyphicon glyphicon-edit"></i></button>
				<button  class="btn_up btn btn-xs btn-danger" id="btn_delete" value="<?php echo $row['id']; ?>" ><i class="glyphicon glyphicon-trash"></i></button>
				</td>
			</tr>
		<?php	
	}
	
}
?>