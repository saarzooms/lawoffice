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
				?>
			<center><h3><span style="color:red;">DATE RANGE </span>  <?php echo date('F d,Y',strtotime($_POST['frmdt']));?> <span style="color:red;"> - </span><?php echo date('F d,Y',strtotime($_POST['todt'])); ?></h3></center>
			<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>  		
						<th>Date</th>  		
						 
						<th>Description</th> 
							
						
					</tr>
				</thead>
			   <tbody>
			   <?php
					
					$name=$_POST['staff'];
					date_default_timezone_set('Asia/Kolkata');
	
					$fdt=date('Y-m-d',strtotime($_POST['frmdt']));
					$tdt=date('Y-m-d',strtotime($_POST['todt']));
					
					// $que="1";
					// if($name!='0')
					// {
						// $que=$que." and staff_id=$name";
					// }
					// if($fdt!='')
					// {
						// $que=$que." and date between $name";
					// }
					// if($name!='0')
					// {
						// $que=$que." and staff_id=$name";
					// }
					
					$sel="select report_master.*,staff_master.name from report_master inner join staff_master on staff_master.id=report_master.staff_id where staff_id='$name' and DATE(date) between '$fdt' and '$tdt'";
					foreach($dbh->query($sel) as $row)
					{
						echo "<tr>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".date('F d, Y h:i:s A l',strtotime($row['date']))."</td>";
						
						echo "<td>".$row['note']."</td>";
						
						echo "</tr>";
					}
					}
			   ?>
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
   
	
	<script>
$(document).ready(function() {
    $("#frmdt").datepicker();
    $("#todt").datepicker();
	  

  });
 
var table = $('#example').DataTable( {
	scrollX: true,
	pageLength: 10,
	 fixedHeader: true,
        lengthChange: false,
		order: [[ 0, "desc" ]],
        //buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
	
 /*  $('#example thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<label>'+title+'</label><br><input type="text" placeholder="Search '+title+'" />' );
    } );  */
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
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
