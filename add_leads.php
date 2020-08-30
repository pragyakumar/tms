
<?php
session_start();
include('include/config.php');
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$address=$_POST['address'];
	$primary_mail=$_POST['primary_mail'];
	$secondary_mail=$_POST['secondary_mail'];
	$office_number=$_POST['office_number'];
	$mobile_number1=$_POST['mobile_number1'];
	$mobile_number2=$_POST['mobile_number2'];
	$mobile_number3=$_POST['mobile_number3'];
	$remark=$_POST['remark'];
	$status_lead=$_POST['status_lead'];
$sql=mysqli_query($con,"insert into leads(name, address, primary_mail, secondary_mail, office_number, mobile_number1, mobile_number2, mobile_number3, remark, status_lead) values('$name','$address','$primary_mail','$secondary_mail', '$office_number', '$mobile_number1', '$mobile_number2', '$mobile_number3', '$remark', '$status_lead')");
$_SESSION['msg']="Lead added !!";
$_SESSION['lname']=$_POST['name'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LMS | Add Task</title>
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
<br></br>
	<div class="wrapper">
		<div class="container">
			<div class="row">
			
			<div class="span12">
					<div class="content">

						<div class="module">
							
								<h3><a href="mainpage.php" ><i class="icon-chevron-left"></i></a>Add lead</h3>
							
							<div class="module-body">

			<form class="form-horizontal row-fluid" name="add_leads" method="post" >

<div class="control-group">
<label class="control-label" for="basicinput"> Lead Name</label>
<div class="controls">
 <input type="text" placeholder="Enter Lead Name"  name="name" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Address</label>
<div class="controls">
 <input type="text" placeholder="Enter your address "  name="address" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Primary Email</label>
<div class="controls">
 <input type="text" placeholder="Enter Primary Email"  name="primary_mail" class="span8 tip" >
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Secondary Email</label>
<div class="controls">
 <input type="text" placeholder="Enter Secondary Email"  name="secondary_mail" class="span8 tip" >
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Office Telephone</label>
<div class="controls">
 <input type="text" placeholder="Enter your Office Telephone"  name="office_number" class="span8 tip" >
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Mobile Number 1</label>
<div class="controls">
 <input type="text" placeholder="Enter Mobile Number 1"  name="mobile_number1" class="span8 tip">
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Mobile Number 2</label>
<div class="controls">
 <input type="text" placeholder="Enter Mobile Number 2"  name="mobile_number2" class="span8 tip">
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Mobile Number 3</label>
<div class="controls">
 <input type="text" placeholder="Enter Mobile Number 3"  name="mobile_number3" class="span8 tip" >
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Remark</label>
<div class="controls">
 <input type="long-text" placeholder="Enter Remark"  name="remark" class="span8 tip" required>
</div>
</div>
									
<div class="control-group">
 <label class="control-label" for="status_lead">Status</label>
 <div class="controls">
  <select name="status_lead" id="status_lead">
  <option style="color:green" value="Active">Active</option>
 <option style="color:red" value="Cancelled">Cancelled</option>
  <option style="color:blue" value="Converted">Converted</option>
  <option style="color:yellow" value="Dormant">Dormant</option>
  </select>
</div>
</div>



	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Add</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	                    					

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->



	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
</html>