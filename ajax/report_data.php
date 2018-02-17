<?php
SESSION_START();
$user_id=$_SESSION['id'];
include('../db/connection.php');
//date_default_timezone_set('Europe/Istanbul');
date_default_timezone_set('Asia/Kolkata');
if(isset($_REQUEST['note']) )
{
	//echo "data";
	$note=$_REQUEST['note'];
	
	$date=date("Y-m-d H:i:s a");

	$ins="INSERT INTO `report_master`(`staff_id`, `note`, `date`) 
	VALUES ('".$_SESSION['id']."','$note','$date')";	
	if($dbh->query($ins))
	{
		echo "Data Inserted Successfully";
	}
	
}else if(isset($_REQUEST['custno']) && isset($_REQUEST['note1']) )
{
	//echo "data";
	$custno=$_REQUEST['custno'];
	$note=$_REQUEST['note1'];
	//date_default_timezone_set('Asia/Kolkata');
	$date=date("Y-m-d H:i:s a");

	$ins="INSERT INTO `how_many_customers_were_called`(`staff_id`, `cust_called_no`, `note`, `date`) 
	VALUES ('".$_SESSION['id']."','$custno','$note','$date')";	
	if($dbh->query($ins))
	{
		echo "Data Inserted Successfully";
	}
	
}
//add payment form data
else if(isset($_REQUEST['ins_no']) && isset($_REQUEST['t_payment']) && isset($_REQUEST['money_rec']) && isset($_REQUEST['deadline']) && isset($_REQUEST['status']) && isset($_REQUEST['note_pay']) )
{
	
	$ins_no=$_REQUEST['ins_no'];
	$t_payment=$_REQUEST['t_payment'];
	$money_rec=$_REQUEST['money_rec'];
	$deadline=$_REQUEST['deadline'];
	$status=$_REQUEST['status'];
	
	$date3=date('Y-m-d H:i:s a');
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
	$sel="select * from `report_master` where DATE(date) ='$date' and staff_id='".$_SESSION['id']."' order by `id`";
	foreach($dbh->query($sel) as $row)
	{
		?>
			<tr>
				
				
				<td><?php echo 'Today Report'.$i; ?></td>
				<td><?php echo $row['note']; ?></td>
				
				<td><?php echo date_format(date_create($row['date']),"F d,Y  h:i:s a l");?></td>
				
				
			</tr>
		<?php
$i++;
	}		
}
//
else if(isset($_REQUEST['ins_no1']))
{
	$ins_no1=$_REQUEST['ins_no1'];
	$ver_ins="select count(institution_number) from institution_master where institution_number='$ins_no1'";
	if($dbh->query($ver_ins)==true)
	{
		
	
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
					<td><?php echo date('d-m-Y',strtotime($row['payment_deadline'])); ?></td>
					<td><?php echo $row['note']; ?></td>
					<td><?php echo date('F d, Y h:i:s a l',strtotime($row['date'])); ?></td>
					
				</tr>
			<?php	
		}
	}
	else
	{
		echo 0;
	}
}	
else if(isset($_REQUEST['sec']))
{	
	$date=date("Y-m-d");
	$sel="select report_master.*,staff_master.name from `report_master` inner join staff_master on staff_master.id=report_master.staff_id inner join department_master on staff_master.department_id=department_master.id where DATE(report_master.date)='$date' and department_master.department_name='secreteriat'";
	foreach($dbh->query($sel) as $row)
	{
		?>
			<tr>
				
				
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['note']; ?></td>
				<td><?php echo date("F d, Y h:i:s a l",strtotime($row['date'])); ?></td>
				
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
				<td><?php echo date("F d, Y h:i:s a l",strtotime($row['date'])); ?></td>
				
			</tr>
		<?php
		
	}
	
}
else if(isset($_REQUEST['rep0']))
{
	$s_id=$_SESSION['id'];
	$fdt=date("Y-m-d");
								$sel="select report_master.*,staff_master.name from report_master inner join staff_master on staff_master.id=report_master.staff_id where report_master.staff_id='$s_id' and DATE(report_master.date)='$fdt' ";
								foreach($dbh->query($sel) as $row)
								{
									echo "<tr>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['note']."</td>";
									echo "<td>".date('F d, Y h:i:s a l',strtotime($row['date']))."</td>";
									echo "</tr>";
								}
						
}
else if(isset($_REQUEST['rep1']))
{
	$s_id=$_SESSION['id'];
	$fdt=date("Y-m-d");
								$sel="select report_master.*,staff_master.name from report_master inner join staff_master on staff_master.id=report_master.staff_id where DATE(report_master.date)='$fdt' ";
								foreach($dbh->query($sel) as $row)
								{
									echo "<tr>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['note']."</td>";
									echo "<td>".date('F d, Y h:i:s a l',strtotime($row['date']))."</td>";
									echo "</tr>";
								}
						
}
else if(isset($_REQUEST['rep2']))
{
	$s_id=$_SESSION['id'];
	$fdt=date("Y-m-d");
								$sel="select how_many_customers_were_called.*,staff_master.name from how_many_customers_were_called inner join staff_master on staff_master.id=how_many_customers_were_called.staff_id where how_many_customers_were_called.staff_id='$s_id' and DATE(how_many_customers_were_called.date)='$fdt'";
								foreach($dbh->query($sel) as $row)
								{
									echo "<tr>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['cust_called_no']."</td>";
									echo "<td>".$row['note']."</td>";
									echo "<td>".date('F d, Y h:i:s a l',strtotime($row['date']))."</td>";
									echo "</tr>";
								}

}
else if(isset($_REQUEST['rep3']))
{
	$s_id=$_SESSION['id'];
	$fdt=date("Y-m-d");

								$sel="select payment_master.*,staff_master.name,institution_master.institution_name from `payment_master` inner join staff_master on staff_master.id=payment_master.user_id inner join institution_master on payment_master.institution_id=institution_master.institution_number where payment_master.user_id='$s_id' and DATE(payment_master.date)='$fdt'";
								foreach($dbh->query($sel) as $row)
								{
									$sts='';
									if($row['institution_doc_status']=='1')
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
									<td><?php echo date('d-m-Y',strtotime($row['payment_deadline'])); ?></td>
									<td><?php echo $sts; ?></td>
									<td><?php echo $row['note']; ?></td>
									<td><?php echo date('F d, Y h:i:s a l',strtotime($row['date'])); ?></td>
									</tr><?php
							}
						
}
?>