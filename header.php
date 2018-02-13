<?php
session_start();
include('db/connection.php');

	$name='';
	if(isset($_SESSION['id']))
	{
		$sql="select name from staff_master where id='".$_SESSION['id']."'";
		foreach ($dbh->query($sql) as $row)
		{
			$name=$row['name'];
			
			
		}
	}
	else
	{
		header("Location:login.php");
	}


$roll="";
// if(isset($_SESSION['user'])=="")
// {
	// header("Location:login.php");
// }
// else{
	// $roll1=$_SESSION['user'];
	// $sql = "SELECT emp_name,roll FROM registration WHERE emp_no='$roll1' ";
	// foreach ($dbh->query($sql) as $row)
	// {		
		// $roll=$row['roll'];
		// $name=$row['emp_name'];
	// }
	
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
	<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> -->
			<style>
			.class1
			{
				color:white;
				}
			</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
-->
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=""><b style="color:blue;">LAW OFFICE<h5 style="color:blue;"><?php echo $name.' '.date('d-m-Y H:m:i');?></h5></b></a><br/>
	 
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
		<ul class="nav navbar-nav navbar-left">
		
			<li><a id="index" href="index.php">Dashboard</a></li>
		<?php
			if($_SESSION['status']=="admin")
			{	
		?>
			<li><a id="staff" href="staff.php">Staff Master</a></li>
			<li><a id="institution" href="institution.php">Institution Master</a></li>
			<li><a id="department" href="department.php">Department Master</a></li>
		<?php
			}
		?>
			
		<?php
			if($_SESSION['type']!="call-center" or $_SESSION['status']=='admin')
			{	
		?>
			<li><a id="report" href="report.php">Report</a></li>
		<?php
			}
		?>
			
		<?php
			if($_SESSION['type']=="call-center" or $_SESSION['status']=='admin')
			{	
		?>
			<li><a id="call_report" href="callcenterreport.php">Call Center Report</a></li>
		<?php
			}
		?>
		</ul>			
		<ul class="nav navbar-nav navbar-right">
			<li><a href="changepassword.php">Change Password</a></li>
			<li><a href="logout.php?logout" >Logout</a></li>
			
		</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</body>
</html>