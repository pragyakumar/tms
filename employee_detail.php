
<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LMS</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

h1 {text-align: center;}
h2 {text-align: center;}
h4 {text-align: center;}

a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color:#f1f1f1;
  color: black;
}

.round {
  border-radius: 50%;
}
</style>
</head>
<body>

          

<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
               <img src="images/logo1.png" alt="logo" width="400" height="10" class="center">
			  	
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->

		<div class="wrapper">
		<div class="container">
			<div class="row">
			
			<div class="span12">
					<div class="content">

	<div class="module">
							<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display responsive" width="100%">
									
									<tbody>	
<?php
$employeeid=intval($_GET['employeeid']);
$query=mysqli_query($con,"select * from employee where employeeid='$employeeid' ");
while($row=mysqli_fetch_array($query))
{
?>									
										<h3><a  href="http://localhost/LMS/manager/employee_list.php" ><i class="icon-chevron-left"></i></a> Employee Details</h3>
											<h4>Name: <?php echo  htmlentities($row['username']);?></h4>
											<h4>Employee ID: <?php echo  htmlentities($row['employeeid']);?></h4>
											<h4>Company Mail : <?php echo  htmlentities($row['email']);?></h4>
											<h4>Personal Mail : <?php echo  htmlentities($row['personalmail']);?></h4>
											<h4>Phone Number : <?php echo  htmlentities($row['phonenumber']);?></h4>
											<h4>Alternate Phone Number : <?php echo  htmlentities($row['alphonenumber']);?></h4>
											<h4>Present Address : <?php echo  htmlentities($row['presentadd']);?></h4>
											<h4>Permanent Address : <?php echo  htmlentities($row['permanentadd']);?></h4>
											
																					
											<br></br>

											
											
									
<?php }?>	
									</tbody>	
								</table>
							
						</div>						
	</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
