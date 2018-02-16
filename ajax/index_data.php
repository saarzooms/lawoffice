<?php
include('../db/connection.php');

if(isset($_REQUEST['id']))
{
	$date=date('Y-m-d');
	
	$sel="select report_master.*,staff_master.name from report_master inner join staff_master on staff_master.id=report_master.staff_id where DATE(report_master.date)='$date' and TIME(report_master.date)>'05:59:59'";
	
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