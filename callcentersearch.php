<?php
include('header.php');
include('db/connection.php');

?>

<style>
<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="css/buttons.bootstrap.min.css" rel="stylesheet">
</style>
<!-- Date picker -->
  <link rel="stylesheet" href="css/jquery-ui.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
 <style>
 .dt{
 display:block;
 position:relative;
 z-index:1;
 }
 
 </style>
 
  <!-- Date picker -->	
 <div class="container-fluid">    
 <div id="tpa_send" style="margin-top:0px;" class="mainbox col-md-12">                    
     <div class="panel panel-primary" >
       <div class="panel-heading" style="height:60px;">
               <div class="col-md-12">						
					<div  class="col-md-6">	
						<h4><b>Report Details</b></h4>
					</div>
					
					</div>
					</div>  
			<div style="padding-top:30px" class="panel-body" >
			
			<div class="box-body" id="dl_details">
			<form id="rep_form" action="callcentersearch.php" method="post">
			<div class="col-md-12">
					<div class="col-md-3">
						<label for="staff">Select Staff:</label>
						<div class="form-group">
							<select class="form-control input-sm" id="staff" name="staff">
											<option value="0" selected disabled>---Select Staff---</option>
							<?php		
								$sel="select name,id from staff_master";
								foreach($dbh->query($sel) as $name)	
								{
									echo "<option value=".$name['id'].">".$name['name']."</option>";
						
								}
							?>	
											
							</select>
						</div>
					</div>
					<div class="col-md-3">
							<label for="frmdt">From Date:</label>
							<div class="form-group">
								<input  class="form-control input-sm dt" id="frmdt" name="frmdt" placeholder="Select From Date">
							</div>
					</div>
					<div class="col-md-3">
							<label for="todt">To Date:</label>
							<div class="form-group">
								<input  class="form-control input-sm dt" id="todt" name="todt" placeholder="Select To Date">
							</div>
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-primary btn-md" id="btn_search" style="margin-top:20px;"><b class="class1">Search</b></button>
						
					</div>
							
				</div>
				</form>
				<div id="dl_data">
				<?php
				if(isset($_POST['staff']) && isset($_POST['frmdt']) && isset($_POST['todt'])){
				date_default_timezone_set('Asia/Kolkata');
					
					$s_id=$_POST['staff'];
					$fdt=date('Y-m-d',strtotime($_POST['frmdt']));
					$tdt=date('Y-m-d',strtotime($_POST['todt']));
				?>
			<center><h3><span style="color:red;">DATE RANGE </span>  <?php echo date('F d,Y',strtotime($_POST['frmdt']));?> <span style="color:red;"> - </span><?php echo date('F d,Y',strtotime($_POST['todt'])); ?></h3></center>
			<div id="dl_data" class="col-md-8">
				<h2>Report Of Mine </h3>
				<?php 
					$s_id3=$_POST['staff'];
					$sel2="select name from staff_master where id='$s_id3'";
					foreach($dbh->query($sel2) as $name_S)
					{
						echo "<label >Staff Name : <span style='color:red;'>".$name_S['name']."</spann></label>";	
					}
				?>
				
						<table id="" class="table table-striped table-bordered table-hover display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Staff Name</th> 
									 <th>Note</th>
								</tr>
							</thead>
						   <tbody id="t_body">
							<?php
							$date=date("Y-m-d");
								$sel="select report_master.*,staff_master.name from report_master inner join staff_master on staff_master.id=report_master.staff_id where report_master.staff_id='$s_id' and DATE(report_master.date) between '$fdt' and '$tdt'";
								foreach($dbh->query($sel) as $row)
								{
									echo "<tr>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['note']."</td>";
									echo "</tr>";
								}
							?>
						   </tbody>
						</table><br/>
				</div>
				
				<div id="dl_data" class="col-md-8">
					<h2>How Many Customer Called</h3>
						<table id="" class="table table-striped table-bordered table-hover display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Staff Name</th> 
									 <th>Cust_Called_No</th>
									 <th>Note</th>
									
								</tr>
							</thead>
						   <tbody id="t_body">
							<?php
							$date=date("Y-m-d");
								$sel="select how_many_customers_were_called.*,staff_master.name from how_many_customers_were_called inner join staff_master on staff_master.id=how_many_customers_were_called.staff_id where how_many_customers_were_called.staff_id='$s_id' and DATE(how_many_customers_were_called.date) between '$fdt' and '$tdt'";
								foreach($dbh->query($sel) as $row)
								{
									echo "<tr>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['cust_called_no']."</td>";
									echo "<td>".$row['note']."</td>";
									echo "</tr>";
								}
							?>
						   </tbody>
						</table><br/>
				</div>
				
				<div id="dl_data" class="col-md-8">
					<h2>Payment History</h3>
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
									 
									
								</tr>
							</thead>
						   <tbody id="t_body">
							<?php
							$date=date("Y-m-d");
								$sel="select payment_master.*,staff_master.name,institution_master.institution_name from `payment_master` inner join staff_master on staff_master.id=payment_master.user_id inner join institution_master on payment_master.institution_id=institution_master.institution_number where payment_master.user_id='$s_id' and DATE(payment_master.date) between '$fdt' and '$tdt'";
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
									<td><?php echo $row['payment_deadline']; ?></td>
									<td><?php echo $sts; ?></td>
									<td><?php echo $row['note']; ?></td>
									</tr><?php
							}
							?>
						   </tbody>
						</table><br/>
					</div>
				<?php 
				}
				?>

		  </div>
      </div>                     
     </div>  
        </div>
      
    </div>

<!-- jQuery -->
 <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
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
   
	
	<script>
$(document).ready(function() {
    $("#frmdt").datepicker();
    $("#todt").datepicker();
	$('table.display').DataTable();  

  });
</script> 

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
