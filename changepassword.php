<?php
include('header.php');
include('db/connection.php');

// if(isset($_SESSION['user'])=="")
// {
	// header("Location:login.php");
// }
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
						<h4><b>Change Password</b></h4>
					</div>
					
					</div>
					</div>  
			<div style="padding-top:30px" class="panel-body" >
			
			<div class="box-body" id="dl_details">
			
           					<div class="col-md-12">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<label for="rg_no">Old Password:</label>
								<div class="form-group">
												
												<input type="password" class="form-control input-sm" id="old" name="old" onchange="checkoldpass();" placeholder="Enter old password">
												<label id="o" style="color:blue;"></label>
				
										</div>
							</div>
							<div class="col-md-4"></div>
							</div>
							<div class="col-md-12">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<label for="rg_no">New Password:</label>
								<div class="form-group">
												
												<input type="password" class="form-control input-sm" id="new" name="new" placeholder="Enter new password">
												<label for="vendor" id="n" style="color:blue;"></label>
				
										</div>
							</div>
							<div class="col-md-4"></div>
							</div>
										<div class="col-md-12">
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<label for="rg_no">Confirm Password:</label>
								<div class="form-group">
												
												<input type="password" class="form-control input-sm" id="con" name="con" onchange="checkpass();" placeholder="Enter confirm password">
												<label for="vendor" id="co" style="color:blue;"></label>
				
										</div>	
										</div>
										<div class="col-md-4"></div>
										</div>
										
										</div>
										
			   <div class="col-md-12">
			<center>
				<button type="button" class="btn btn-primary btn-md" id="btn_sub"><b class="class1">Submit</b></button>
				</br>
				<label id="msg" style="color:blue;"></label>	
			</center>    
		  </div>
		  <div id="dl_data"></div>
			 

      </div>                     
     </div>  
        </div>
      
    </div>

<!-- jQuery -->
 <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
   <script src="js/vendor_data.js"></script>
   <script src="js/pass.js"></script>
	
	<script>
$(document).ready(function() {
    $("#bill_dt").datepicker();
	  //  $("#datepicker4").datepicker();

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
</body>

</html>
