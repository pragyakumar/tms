
<?php
session_start();
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
h4 {text-align: center;}
h3 {text-align: center;}
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
	            <h1><a href="edit_profile.php">Hi! <?php echo $_SESSION['alogin'];?></a></h1>
				<h4><a href="logout.php" class="center">Logout</a></h4>
			  	
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->

		<div class="wrapper">
		<div class="container">
			<div class="row">
			
			<div class="span12">
					<div class="content">

	<div class="module">
							
							
							

									
							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									
									<tbody>								
										<tr>
									

											<td>Total No. of Active Leads</td>
											<td></td>

										</tr>
										<tr>
											<td>Total No. of Sales Generated</td>
											<td>#</td>
										</tr>
										<tr>
											<td>Current Month Sales Vol</td>
											<td>#</td>
										</tr>
										<tr>
											<td>Previous Month Sales Vol</td>
											<td>#</td>
										</tr>
										<tr>
											<td>Total Sales Amount</td>
											<td>#</td>
		                                </tr>									
											
									</tbody>	
								</table>
							
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
	<br> </br>
	<div class="wrapper">
		<div class="container">
			<div class="row">
			
			<div class="span12">
					<div class="content">

	<div class="module">
							
							
							

									<h4><u>Today's Task</u>  <a href="add_todays_task.php" ><i class="icon-plus"></i></a> <a href="update_todays_task.php" ><i class="icon-edit"></i></a></h4>
									<?php $td=date("d/m/Y");
									?>
							         <h4><a class="previous">&#8249;</a> <?php echo $td;?> <a  class="next">&#8250;</a></h4>
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive" width="100%">
									<thead>
										<tr>
											<th>Time</th>
											<th> Task</th>
											<th>Status</th>
										
										</tr>
									</thead>
									<tbody>

<?php 
$name=$_SESSION['alogin'];
	$query=mysqli_query($con,"select id, time, task, status from todays_task  where username='$name'"); 

 while($r=mysqli_fetch_array($query))
{
?>	
										<tr>
											
											<td><?php echo htmlentities($r['time']);?></td>
											<td><a href="edit_todays_task.php?id=<?php echo $r['id']?>"><?php echo htmlentities($r['task']);?></a></td>
											<td><?php echo htmlentities($r['status']);?></td>	
										<?php  } ?>
										
								</table>
							
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
	
	<br> </br>
	<div class="wrapper">
		<div class="container">
			<div class="row">
			
			<div class="span12">
					<div class="content">

	<div class="module">
							
							
							

									<h4><u>Active leads</u>  <a href="add_leads.php" ><i class="icon-plus"></i></a> <a href="update_leads.php" ><i class="icon-edit"></i></a></h4>
							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>Lead Name</th>
											<th>Updated Date</th>
											<th>Last Status</th>
											
										
										</tr>
									</thead>
									<tbody>

<?php 
$status_leads='Active';
$query=mysqli_query($con,"select id, name, updation_date, remark, status_lead from leads WHERE status_lead='$status_leads' ");
while($r=mysqli_fetch_array($query))
{
?>	
										<tr>
											
											<td><a href="open_leads.php?id=<?php echo $r['id']?>"><?php echo htmlentities($r['name']);?></a></td>
											<td><?php echo htmlentities($r['updation_date']);?></td>
											<td><?php echo htmlentities($r['remark']);?></td>
											
											
											
										<?php  } ?>
										
								</table>
							
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
	
	<div class="wrapper">
		<div class="container">
			<div class="row">
			
			<div class="span12">
					<div class="content">

	<div class="module">
							
							
							

									<h4><u>Converted leads</u>  <a href="update_leads.php" >Edit</a></h4>
							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>Lead Name</th>
											<th>Updated Date</th>
											<th>Last Status</th>
										
										</tr>
									</thead>
									<tbody>

<?php 
$status_leads='Converted';
$query=mysqli_query($con,"select id, name, updation_date, remark, status_lead from leads WHERE status_lead='$status_leads' ");
while($r=mysqli_fetch_array($query))
{
?>	
										<tr>
											
											<td><a href="open_leads.php?id=<?php echo $r['id']?>"><?php echo htmlentities($r['name']);?></a></td>
											<td><?php echo htmlentities($r['updation_date']);?></td>
											<td><?php echo htmlentities($r['remark']);?></td>
											
											
											
										<?php  } ?>
										
								</table>
							
						</div>						

	<div class="wrapper">
		<div class="container">
			<div class="row">
			
			<div class="span12">
					<div class="content">

	<div class="module">
							
							
							

									<h4><u>Dormant leads</u>  <a href="update_leads.php" >Edit</a></h4>
							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>Lead Name</th>
											<th>Updated Date</th>
											<th>Last Status</th>
										
										</tr>
									</thead>
									<tbody>

<?php 
$status_leads='Dormant';
$query=mysqli_query($con,"select id, name, updation_date, remark, status_lead from leads WHERE status_lead='$status_leads' ");
while($r=mysqli_fetch_array($query))
{
?>	
										<tr>
											
											<td><a href="open_leads.php?id=<?php echo $r['id']?>"><?php echo htmlentities($r['name']);?></a></td>
											<td><?php echo htmlentities($r['updation_date']);?></td>
											<td><?php echo htmlentities($r['remark']);?></td>
											
											
											
										<?php  } ?>
										
								</table>
							
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
	
	<div class="wrapper">
		<div class="container">
			<div class="row">
			
			<div class="span12">
					<div class="content">

	<div class="module">
							
							
							

									<h4><u>Cancelled leads</u>  <a href="update_leads.php" >Edit</a></h4>
							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>Lead Name</th>
											<th>Updated Date</th>
											<th>Last Status</th>
										
										</tr>
									</thead>
									<tbody>

<?php 
$status_leads='Cancelled';
$query=mysqli_query($con,"select id, name, updation_date, remark, status_lead from leads WHERE status_lead='$status_leads' ");
while($r=mysqli_fetch_array($query))
{
?>	
										<tr>
											
											<td><a href="open_leads.php?id=<?php echo $r['id']?>"><?php echo htmlentities($r['name']);?></a></td>
											<td><?php echo htmlentities($r['updation_date']);?></td>
											<td><?php echo htmlentities($r['remark']);?></td>
											
											
											
										<?php  } ?>
										
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
