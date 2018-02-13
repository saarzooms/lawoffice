<?php
include('../db/connection.php');

if(isset($_REQUEST['name']) )
{
	//echo "data";
	$name=$_REQUEST['name'];


	$ins="INSERT INTO `department_master`(`department_name`) VALUES ('$name')";	
	if($dbh->query($ins))
	{
		echo "Data Inserted Successfully";
	}
	
}
//update
else if(isset($_REQUEST['update_id1']) && isset($_REQUEST['name1']) )
{
	//echo "data";
	$update_id=$_REQUEST['update_id1'];
	$name=$_REQUEST['name1'];
	

	$upd="UPDATE `department_master` SET `department_name`='$name' WHERE id='$update_id'";
	
	if($dbh->query($upd))
	{
		echo "Data updated Successfully";
	}
	
}
//delete staff member
else if(isset($_REQUEST['del_id']))
{
	$del_id=$_REQUEST['del_id'];
	$delete="DELETE FROM `department_master` WHERE id='$del_id'";
	if($dbh->query($delete))
	{
		echo "data deleted successfully";
	}
}
//view staff details
else if(isset($_REQUEST['edit_id']))
{
	
	$edit_id=$_REQUEST['edit_id'];
	$result=array();
	$sql="SELECT * FROM `department_master` where `id`='$edit_id' ";
	foreach ($dbh->query($sql) as $row)
	{
		$id=$row['id'];
		$name=$row['department_name'];
	}
	array_push($result,$name,$id);
	echo json_encode($result);
}
else if(isset($_REQUEST['dl']))
{
	$sel="select * from `department_master` order by `id`";
	foreach($dbh->query($sel) as $row)
	{
		?>
			<tr>
				
				
				<td><?php echo $row['department_name']; ?></td>
				
				<td>
				<button  class="btn_up btn btn-xs btn-warning" id="btn_view" value="<?php echo $row['id']; ?>" ><i class="glyphicon glyphicon-edit"></i></button>
				<button  class="btn_up btn btn-xs btn-danger" id="btn_delete" value="<?php echo $row['id']; ?>" ><i class="glyphicon glyphicon-trash"></i></button>
				</td>
			</tr>
		<?php	
	}
	
}

?>