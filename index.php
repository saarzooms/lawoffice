<?php
include('header.php');

$user_id=$_SESSION['id'];
$user_status=$_SESSION['status'];
include('db/connection.php');

//include('db/connection.php');

// if(isset($_SESSION['user'])=="")
// {
	// header("Location:login.php");
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Law Office</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/newcssbook.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    <link href="css/animations.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>
		
<body>

<?php
if($user_status=='admin')
{
?>
   <div id="dl_data" class="col-md-8">
   <div id="rep_not_sub" style="display:none;">
   <h2 style="color:red;">WHO DID NOT WRITE REPORT</h2>
   <table id="" class="table table-striped table-bordered table-hover" cellspacing="0" width="30%">
				<thead>
					<tr>
						<th>Staff Name</th> 
						 
					</tr>
				</thead>
			   <tbody id="not_sub_rep">
			   </tbody>
	</table>
	</div>	
   <h2>Today All Staff Reports </h3>
			<table id="" class="table table-striped table-bordered table-hover display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Staff Name</th> 
						 <th>Note</th>
						 <th>Date</th>
					</tr>
				</thead>
			   <tbody id="t_body">
				<?php
				$date=date("Y-m-d");
					$sel="select report_master.*,staff_master.name from report_master inner join staff_master on staff_master.id=report_master.staff_id where DATE(report_master.date)='$date'";
					foreach($dbh->query($sel) as $row)
					{
						echo "<tr>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['note']."</td>";
						echo "<td>".date('F d, Y h:i:s A l',strtotime($row['date']))."</td>";
						echo "</tr>";
					}
				?>
			   </tbody>
			</table><br/>
    </div>
	
	<div id="dl_data" class="col-md-8">
   <h2>Today How Many Customer Called</h3>
			<table id="" class="table table-striped table-bordered table-hover display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Staff Name</th> 
						 <th>Cust_Called_No</th>
						 <th>Note</th>
						 <th>Date</th>
						
					</tr>
				</thead>
			   <tbody id="t_body">
				<?php
				$date=date("Y-m-d");
					$sel="select how_many_customers_were_called.*,staff_master.name from how_many_customers_were_called inner join staff_master on staff_master.id=how_many_customers_were_called.staff_id where DATE(how_many_customers_were_called.date)='$date'";
					foreach($dbh->query($sel) as $row)
					{
						echo "<tr>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['cust_called_no']."</td>";
						echo "<td>".$row['note']."</td>";
						echo "<td>".date('F d, Y h:i:s A l',strtotime($row['date']))."</td>";
						echo "</tr>";
					}
				?>
			   </tbody>
			</table><br/>
    </div>
	
	<div id="dl_data" class="col-md-8">
   <h2>Today Payment History</h3>
			<table id="" class="table table-striped table-bordered table-hover display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Staff Name</th> 
						 <th>Inst Number</th>
						 <th>Inst Name</th>
						 <th>Total Payment</th>
						 <th>Money Received</th>
						 <th>Payment Deadline</th>
						 <th>Doc Status</th>
						 <th>Note</th>
						 <th>Date</th>
						 
						
					</tr>
				</thead>
			   <tbody id="t_body">
				<?php
				$date=date("Y-m-d");
					$sel="select payment_master.*,staff_master.name,institution_master.institution_name from `payment_master` inner join staff_master on staff_master.id=payment_master.user_id inner join institution_master on payment_master.institution_id=institution_master.institution_number where DATE(payment_master.date)='$date'";
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
						<td><?php echo date("Y-m-d",strtotime($row['payment_deadline'])); ?></td>
						<td><?php echo $sts; ?></td>
						<td><?php echo $row['note']; ?></td>
						<td><?php echo date('F d, Y h:i:s A l',strtotime($row['date']))?></td>
						</tr><?php
				}
				?>
			   </tbody>
			</table><br/>
    </div>
	
	<?php
}
	?>
	
	

<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/css3-animate-it.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/dataTables.buttons.min.js"></script>
<script src="js/buttons.bootstrap.min.js"></script>
<script src="js/jszip.min.js"></script>
<script src="js/pdfmake.min.js"></script>
<script src="js/vfs_fonts.js"></script>
<script src="js/buttons.html5.min.js"></script>
<script src="js/buttons.print.min.js"></script>
<script src="js/buttons.colVis.min.js"></script>
<script src="js/index.js"></script>
	
	<script>
	$(document).ready(function() {
    $('table.display').DataTable({pageLength: 100});
  });
	</script>
    <!-- Custom Theme JavaScript -->
    <script>
	
	
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
