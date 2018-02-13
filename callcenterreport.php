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
						<h4><b>Call Center Report Entry</b></h4>
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
						<label id="s_nm" style="color:red;"></label>
					</div>
					<div class="col-md-3">
							<label for="frmdt">From Date:</label>
							<div class="form-group">
								<input  class="form-control input-sm dt" id="frmdt" name="frmdt" placeholder="Select From Date">
							</div>
							<label id="f_d" style="color:red;"></label>
					</div>
					<div class="col-md-3">
							<label for="todt">To Date:</label>
							<div class="form-group">
								<input  class="form-control input-sm dt" id="todt" name="todt" placeholder="Select To Date">
							</div>
							<label id="t_d" style="color:red;"></label>
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-primary btn-md" id="btn_search" onclick="return validate()" style="margin-top:20px;"><b class="class1">Search</b></button>
						
					</div>
							
				</div>
			</form>
				<div class="col-md-12">
					<div class="col-md-4">
					</div>
					<div class="col-md-4">
						<label for="opt">SELECT FROM DROPDOWN COMBOBOX:</label>
						<div class="form-group">
							<select class="form-control input-sm" id="opt" name="opt">
											<option value="0" selected disabled>---Select Option---</option>
											<option value="1">how-many-customers-were-called</option>
											<option value="2">write daily report </option>
											<option value="3">add payment</option>
							</select>
						</div>
						<label id="msg" style="color:blue;"></label>
					</div>
					<div class="col-md-4">
					</div>
				</div>
				<form id="customer_called_form" method="post" style="display:none;">
				<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group">
								<label for="custno">how many customers were called:</label>
								<input type="text" class="form-control input-sm" id="custno" name="custno" required>
								</div>
						</div>	
						<div class="col-md-4">
							<div class="form-group">
								<label for="note1">Note:</label>
								<textarea class="form-control" id="note1" name="note1" rows="3" required></textarea>
								</div>
						</div>	
				</div>
				<div class="col-md-12">
					<div class="col-md-8" align="right">
						<button type="submit" class="btn btn-primary btn-md" id="btn_send"><b class="class1">Send</b></button>
						
					</div>
					
				</div>
				</form>
				
				<form id="report_form" method="post" style="display:none;">
				<div class="col-md-12">
						<div class="col-md-8">
							<div class="form-group">
								<label for="note">Note:</label>
								<textarea class="form-control" id="note" name="note" rows="3" required></textarea>
								</div>
						</div>		
				</div>
				<div class="col-md-12">
					<div class="col-md-8" align="right">
						<button type="submit" class="btn btn-primary btn-md" id="btn_send"><b class="class1">Send</b></button>
						
					</div>
					
				</div>
				</form>
				
				<!--add payment fprm-->
				<form id="payment_form" method="post" style="display:none;">
				<div class="col-md-12">
						<div class="col-md-3">
							<div class="form-group">
								<label for="note">Institution Number:</label>
								<input type="text" class="form-control" id="ins_no" name="ins_no" required>
								</div>
						</div>		
						
						<div class="col-md-3">
							<div class="form-group">
								<label for="note">Total Payment:</label>
								<input type="text" class="form-control" id="t_payment" name="t_payment" required>
								</div>
						</div>		
						
						<div class="col-md-3">
							<div class="form-group">
								<label for="note">Money Received:</label>
								<input type="text" class="form-control" id="money_rec" name="money_rec" required>
								</div>
						</div>	
							
						<div class="col-md-3">
							<div class="form-group">
								<label for="note">Payment Deadline:</label>
								<textarea class="form-control" id="deadline" name="deadline" rows="2" required></textarea>
								</div>
						</div>			
				</div>
				
				<div class="col-md-12">
						<div class="col-md-3">
							<div class="form-group">
								<label for="note">Institution Doc.Status :</label>
								<select class="form-control" id="status" name="status">
									<option value="0" selected>-- select Status ---</option>
									<option value="1">Open</option>
									<option value="2">Close</option>
									
								</select>
								</div>
						</div>
							
						<div class="col-md-3">
							<div class="form-group">
								<label for="note">Date:</label>
								<input type="date" class="form-control" id="date3" name="date3">
								</div>
						</div>	
							
						<div class="col-md-3">
							<div class="form-group">
								<label for="note">Note :</label>
								<textarea class="form-control" id="note_pay" name="note_pay" rows="2" required></textarea>
							</div>
						</div>		
							
							
				</div>
				<div class="col-md-12" align="center">
					
							<button type="submit" class="btn btn-primary btn-md" id="submit"><b class="class1">Submit</b></button>
						
				</div>
				
				</form>
      </div>           
			
			<div class="col-md-11" id="payment_table" style="display:none;margin-top:10px;">
					<label style="color:blue">Search For Number :</label>&nbsp;<label style="color:red" id="search_no"> </label>
					
					<table id="example" class="table table-bordered table-stripped">
						<thead>
							<tr>
								<th>Staff Name</th>
								<th>Inst No.</th>
								<th>Inst Name</th>
								<th>Total Payment</th>
								<th>Money Rec</th>
								<th>Doc Status</th>
								<th>Date</th>
								<th>Note</th>
							</tr>
						</thead>
						<tbody id="t_body">
						</tbody>
					</table>
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
<script src="js/callcenter.js"></script>
 <script>
$(document).ready(function() {
    $("#frmdt").datepicker();
    $("#todt").datepicker();
	$('#example').DataTable();
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
