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
						<h4><b>Report Entry</b></h4>
					</div>
					
					</div>
					</div>  
			<div style="padding-top:30px" class="panel-body" >
			
			<div class="box-body" id="dl_details">
			<form id="rep_form" action="search.php" method="post">
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
				<form id="report_form" method="post">
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
			
		  <div id="dl_data">
			<center><h3><strong style="color:red;">TODAY</strong> REPORTS OF MINE</h3></center>
			<table id="" class="table table-striped table-bordered table-hover display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Today Report</th> 
						<th>Description</th> 
						<th>Date</th>  			
						
					</tr>
				</thead>
			   <tbody id="t_body">
					
			   </tbody>
			</table>
		  </div>
		  <div id="dl_data1">
			<center><h3><strong style="color:red;">TODAY</strong> ALL STAFF REPORTS</h3></center>
			<h4>SECRETEERIAT DEPARTMENT</h4>
			<table id="" class="table table-striped table-bordered table-hover display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th> 
						<th>Description</th> 
						<th>Date</th>  			
						
					</tr>
				</thead>
			   <tbody id="t_body1">
					
			   </tbody>
			</table>
		  </div>
		  <div id="dl_data1">
			
			<h4>LEVY DEPARTMENT</h4>
			<table id="" class="table table-striped table-bordered table-hover display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th> 
						<th>Description</th> 
						<th>Date</th>  			
						
					</tr>
				</thead>
			   <tbody id="t_body2">
					
			   </tbody>
			</table>
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
<script src="js/report.js"></script>
   
	
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
