
<?php
session_start();
include('include/config.php');
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$time=$_POST['time'];
	$task=$_POST['task'];
	$status=$_POST['status'];
$sql=mysqli_query($con,"insert into todays_task(username, time, task, status) values('$username','$time','$task','$status')");
header("location:mainpage.php");

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
							
								<h3><a href="mainpage.php" ><i class="icon-chevron-left"></i></a>Add Task</h3>
							
							<div class="module-body">

			<form class="form-horizontal row-fluid" name="add_todays_task" method="post" >

<div class="control-group">
<label class="control-label" for="basicinput">Username</label>
<div class="controls">
<?php
$name=$_SESSION['alogin'];
$query=mysqli_query($con,"select username from employee WHERE username='$name'");
while($row=mysqli_fetch_array($query))
{
?>
 <input type="text" placeholder="Enter your Name" name="username" value="<?php echo  htmlentities($row['username']);?>" class="span8 tip" required>
<?php }?>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Task Time</label>
<div class="controls">
 <input type="time" placeholder="Enter time of task "  name="time" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Task</label>
<div class="controls">
 <input type="text" placeholder="Enter the Task "  name="task" class="span8 tip" required>
</div>
</div>
									
<div class="control-group">
 <label class="control-label" for="status">Status</label>
 <div class="controls">
  <select name="status" id="status">
  <option style="color:green" value="Done"><p style="color:green">Done</option></p>
 <option style="color:red" value="Cancelled"><p style="color:red">Cancelled</option></p>
  <option style="color:blue" value="Pending"><p style="color:blue">Pending</option></p>
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