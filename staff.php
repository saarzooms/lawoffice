<?php
include('header.php');
include('db/connection.php');

?>

<style>
<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="css/buttons.bootstrap.min.css" rel="stylesheet">
<!-- =============== Toast Message ===============-->
   <link rel="stylesheet" href="toastmessage/css/jquery.toastmessage.css" id="maincss">
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
						<h4><b>Create Staff</b></h4>
					</div>
					
					</div>
					</div>  
			<div style="padding-top:30px" class="panel-body" >
			
			<div class="box-body" id="dl_details">
			<form id="staff_form" method="post">
           					<div class="col-md-12">
							<div class="col-md-3">
								<label for="dept">Select Department:</label>
								<div class="form-group">
												
										<select class="form-control input-sm" id="dept" name="dept">
											<option value="0" selected disabled>---Select Department---</option>
							<?php		
								$sel="select department_name,id from department_master";
								foreach($dbh->query($sel) as $name)	
								{
									echo "<option value=".$name['id'].">".$name['department_name']."</option>";
						
								}
							?>	
											
							</select>
								</div>
							</div>
							<div class="col-md-3">
								<label for="empname">Employee Name:</label>
								<div class="form-group">
												
										<input type="text" class="form-control input-sm" id="empname" name="empname" placeholder="Enter Employee Name">
								</div>
							</div>
							<div class="col-md-3">
								<label for="empsurname">Employee Surname:</label>
								<div class="form-group">
												
										<input type="text" class="form-control input-sm" id="empsurname" name="empsurname" placeholder="Enter Employee Surname">
								</div>
							</div>
							<div class="col-md-3">
								<label for="email">Email:</label>
								<div class="form-group">
												
									<input type="email" class="form-control input-sm" id="email" name="email" placeholder="Enter Employee Email">
								</div>	
							</div>
										
					</div>
					<div class="col-md-12">
							         
						<div class="col-md-3">
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="text" class="form-control input-sm" id="password" name="password" placeholder="Enter Password">
							</div>
						</div>
           				<div class="col-md-3">
							<div class="form-group">
								<label for="mobile">Mobile No.:</label>
								<input type="text" class="form-control input-sm" id="mobile" name="mobile" placeholder="Enter Mobile Number">
								</div>
						</div>
						<div class="col-md-3">
							<label for="status">Status:</label>
								<div class="form-group">
									<select class="form-control input-sm" id="status" name="status">
											<option value="0" selected disabled>---Select Status---</option>
											<option value="active">active</option>
											<option value="deactive">deactive</option>
											<option value="admin">admin</option>
									</select>
								</div>	
						</div>
						<div class="col-md-3">
							<label for="empdt">Emplyoment Date:</label>
							<div class="form-group">
								<input  class="form-control input-sm dt" id="empdt" name="empdt" placeholder="Select Emplyoment Date">
							</div>
						</div>
				</div>
				<div class="col-md-12">
						<div class="col-md-3">
							<label for="terdt">Termination Date:</label>
							<div class="form-group">
								<input  class="form-control input-sm dt" id="terdt" name="terdt" placeholder="Select Termination Date">
							</div>
						</div>
           				<div class="col-md-4">
							<div class="form-group">
								<label for="note">Note:</label>
								<textarea class="form-control" id="note" name="note" rows="3"></textarea>
								</div>
						</div>
						
				</div>
			   <div class="col-md-12">
			<center>
				<button type="submit" class="btn btn-primary btn-md" id="btn_insert"><b class="class1">Save</b></button>
				<button type="button" class="btn btn-primary btn-md" id="btn_update" value="0" disabled><b class="class1">Update</b></button>
				</br>
				<label id="msg" style="color:blue;"></label>	
				<input type="hidden" class="form-control input-sm" id="wrid" name="wr_id" />
			</center>    
		  </div>
	</form>
		  <div id="dl_data">
			<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Department</th> 
						<th>Employee Name</th> 
						<th>Employee Surname</th>  			
						<th>Email</th>  
						<th>Password</th>  
						<th>Mobile No</th>
						<th>Status</th>
						<th>Emplyoment Date</th>
						<th>Termination Date</th>
						<th>Note</th>
						<th>Action</th>
					</tr>
				</thead>
			   <tbody id="t_body">
			   </tbody>
			</table>
		  </div>
			 

      </div>                     
     </div>  
        </div>
      
    </div>

<!-- jQuery -->
<script src="js/staff.js"></script>
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
 <!-- =============== Toast Message ===============-->
 <script type="text/javascript" src="toastmessage/javascript/jquery.toastmessage.js"></script>  
	
	<script>
$(document).ready(function() {
    $("#empdt").datepicker();
    $("#terdt").datepicker();
	  

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
