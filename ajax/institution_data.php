<?php
include('../db/connection.php');

if(isset($_REQUEST['name'])&& isset($_REQUEST['number'])&& isset($_REQUEST['note']) )
{
	//echo "data";
	$name=$_REQUEST['name'];
	$number=$_REQUEST['number'];
	
	$note=$_REQUEST['note'];

	$ins="INSERT INTO `institution_master`(`institution_name`, `institution_number`, `note`) VALUES ('$name','$number','$note')";	
	if($dbh->query($ins))
	{
		echo "Data Inserted Successfully";
	}
	
}
//update
else if(isset($_REQUEST['update_id1']) && isset($_REQUEST['name1'])&& isset($_REQUEST['number1'])&& isset($_REQUEST['note1']) )
{
	//echo "data";
	$update_id=$_REQUEST['update_id1'];
	$name=$_REQUEST['name1'];
	$number=$_REQUEST['number1'];
	
	$note=$_REQUEST['note1'];

	$upd="UPDATE `institution_master` SET `institution_name`='$name',`institution_number`='$number',`note`='$note'WHERE `id`='$update_id'";
	
	if($dbh->query($upd))
	{
		echo "Data updated Successfully";
	}
	
}
//delete staff member
else if(isset($_REQUEST['del_id']))
{
	$del_id=$_REQUEST['del_id'];
	$delete="DELETE FROM `institution_master` WHERE id='$del_id'";
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
	$sql="SELECT * FROM `institution_master` where `id`='$edit_id' ";
	foreach ($dbh->query($sql) as $row)
	{
		$id=$row['id'];
		$name=$row['institution_name'];
		$number=$row['institution_number'];
		$note=$row['note'];
	}
	array_push($result,$name,$number,$note,$id);
	echo json_encode($result);
}
else if(isset($_REQUEST['dl']))
{
	$sel="select * from `institution_master` order by `id`";
	foreach($dbh->query($sel) as $row)
	{
		?>
			<tr>
				
				
				<td><?php echo $row['institution_name']; ?></td>
				<td><?php echo $row['institution_number']; ?></td>
				
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