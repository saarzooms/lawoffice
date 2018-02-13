<?php
SESSION_START();
$user_id=$_SESSION['id'];
include('../db/connection.php');

if(isset($_REQUEST['note']) )
{
	//echo "data";
	$note=$_REQUEST['note'];
	date_default_timezone_set('Asia/Kolkata');
	$date=date("Y-m-d h:i:s A");

	$ins="INSERT INTO `report_master`(`staff_id`, `note`, `date`) 
	VALUES ('5','$note','$date')";	
	if($dbh->query($ins))
	{
		echo "Data Inserted Successfully";
	}
	
}else if(isset($_REQUEST['custno']) && isset($_REQUEST['note1']) )
{
	//echo "data";
	$custno=$_REQUEST['custno'];
	$note=$_REQUEST['note1'];
	date_default_timezone_set('Asia/Kolkata');
	$date=date("Y-m-d h:i:s A");

	$ins="INSERT INTO `how_many_customers_were_called`(`staff_id`, `cust_called_no`, `note`, `date`) 
	VALUES ('5','$custno','$note','$date')";	
	if($dbh->query($ins))
	{
		echo "Data Inserted Successfully";
	}
	
}
//add payment form data
else if(isset($_REQUEST['ins_no']) && isset($_REQUEST['t_payment']) && isset($_REQUEST['money_rec']) && isset($_REQUEST['deadline']) && isset($_REQUEST['status']) && isset($_REQUEST['date3'])&& isset($_REQUEST['note_pay']) )
{
	
	$ins_no=$_REQUEST['ins_no'];
	$t_payment=$_REQUEST['t_payment'];
	$money_rec=$_REQUEST['money_rec'];
	$deadline=$_REQUEST['deadline'];
	$status=$_REQUEST['status'];
	
	$date3=$_REQUEST['date3'];
	//$date3=date("Y-m-d", strtotime($_REQUEST['date3']))+date("h:i:s A");
	$note_pay=$_REQUEST['note_pay'];
	
	$ins="INSERT INTO `payment_master`(`user_id`, `institution_id`, `total_payment`, `money_received`, `payment_deadline`, `institution_doc_status`, `date`, `note`) VALUES ('$user_id','$ins_no','$t_payment','$money_rec','$deadline','$status','$date3','$note_pay')";
	if($dbh->query($ins))
	{
		echo "Data Inserted Successfully";
	}
}

else if(isset($_REQUEST['dl']))
{	$i=1;
	$date=date("Y-m-d");
	$sel="select * from `report_master` where DATE(date)='$date' order by `id`";
	foreach($dbh->query($sel) as $row)
	{
		?>
			<tr>
				
				
				<td><?php echo 'Today Report'.$i; ?></td>
				<td><?php echo $row['note']; ?></td>
				<td><?php echo date("F d, Y h:i:s A l",strtotime($row['date'])); ?></td>
				
			</tr>
		<?php
$i++;
	}		
}
//
else if(isset($_REQUEST['ins_no1']))
{
	$ins_no1=$_REQUEST['ins_no1'];
	$sel1="select payment_master.*,staff_master.name,institution_master.institution_name from `payment_master` inner join staff_master on staff_master.id=payment_master.user_id inner join institution_master on payment_master.institution_id=institution_master.institution_number where payment_master.institution_id='$ins_no1'";
	foreach($dbh->query($sel1) as $row)
	{
		$sts=$row['institution_doc_status'];
		if($sts=='1')
		{
			$sts="open";
		}
		else
		{
			$sts="close";
		}
		?>
			<tr>
								
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['institution_id']; ?></td>
				<td><?php echo $row['institution_name']; ?></td>
				<td><?php echo $row['total_payment']; ?></td>
				<td><?php echo $row['money_received']; ?></td>
				<td><?php echo $sts; ?></td>
				<td><?php echo date('d-m-Y',strtotime($row['date'])); ?></td>
				<td><?php echo $row['note']; ?></td>
				
			</tr>
		<?php	
	}
	
}	
else if(isset($_REQUEST['sec']))
{	
	$date=date("Y-m-d");
	$sel="select report_master.*,staff_master.name from `report_master` inner join staff_master on staff_master.id=report_master.staff_id inner join department_master on staff_master.department_id=department_master.id where DATE(report_master.date)='$date' and department_master.department_name='secreteriatcan'";
	foreach($dbh->query($sel) as $row)
	{
		?>
			<tr>
				
				
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['note']; ?></td>
				<td><?php echo date("F d, Y h:i:s A l",strtotime($row['date'])); ?></td>
				
			</tr>
		<?php
		
	}
	
}else if(isset($_REQUEST['levy']))
{	
	$date=date("Y-m-d");
	$sel="select report_master.*,staff_master.name from `report_master` inner join staff_master on staff_master.id=report_master.staff_id inner join department_master on staff_master.department_id=department_master.id where DATE(report_master.date)='$date' and department_master.department_name='levy'";
	foreach($dbh->query($sel) as $row)
	{
		?>
			<tr>
				
				
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['note']; ?></td>
				<td><?php echo date("F d, Y h:i:s A l",strtotime($row['date'])); ?></td>
				
			</tr>
		<?php
		
	}
	
}

?>