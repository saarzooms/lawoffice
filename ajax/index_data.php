<?php
include('../db/connection.php');

if(isset($_REQUEST['id']))
{
	$date=date('Y-m-d');
	
	$sel="SELECT name FROM staff_master WHERE id NOT IN(SELECT staff_id FROM report_master where DATE(report_master.date)='$date' )";
	
	foreach($dbh->query($sel) as $row)
	{
		?>
		<tr>
		<td><?php echo $row['name'];?></td>
		</tr>
		<?php
	}
	//echo $sel;
}
?>