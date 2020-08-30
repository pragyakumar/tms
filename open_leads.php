
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
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from leads WHERE id='$id'");
while($r=mysqli_fetch_array($query))
{
?>									
										
											<h1 style="color:blue"><?php echo  htmlentities($r['name']);?><a href="open_edit_leads.php?id=<?php echo $r['id']?>" ><i class="icon-edit"></i></a></h1>
											<h4>Status : <em><u><?php echo  htmlentities($r['status_lead']);?></u></em></h4>
											<h4>Address : <?php echo  htmlentities($r['address']);?></h4>
											<h4>Primary email : <?php echo  htmlentities($r['primary_mail']);?></h4>
											<h4>Secondary email : <?php echo  htmlentities($r['secondary_mail']);?></h4>
											<h4>Office Telephone : <?php echo  htmlentities($r['office_number']);?></h4>
											<h4>Mobile Number 1 : <?php echo  htmlentities($r['mobile_number1']);?></h4>
											<h4>Mobile Number 2 : <?php echo  htmlentities($r['mobile_number2']);?></h4>
											<h4>Mobile Number 3 :<?php echo  htmlentities($r['mobile_number3']);?></h4>
											<h4>Remark : <?php echo  htmlentities($r['remark']);?></h4>											
											<br></br>

											
											
									
<?php }?>	
									</tbody>	
								</table>
							
						</div>						

						
						
					



	<div class="module">
							<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display responsive" width="100%">
									
									<tbody>	
									<thead>
										<tr>
											<th>Date/Time</th>
											<th>Title</th>
											<th>Remark</th>
											
											<th>Action</th>
										</tr>
									</thead>
<?php
$llname=$_SESSION['lname'];
$query=mysqli_query($con,"select * from leadin ");
while($r=mysqli_fetch_array($query))
{
?>									
										<tr>
											
											<td><?php echo  htmlentities($r['date']);?></td>
											<td><?php echo  htmlentities($r['title']);?></td>
											<td><?php echo  htmlentities($r['remark']);?></td>
											<td>
											<a href="location.php" >Location</a></td>
											
											
											</tr>
										
											

											
											
									
<?php }?>	
									</tbody>	
								</table>
							
						</div>						

						
						
					
	
	<div class="module">
							<div class="module-head">
							<h3><a href="mainpage.php" ><i class="icon-chevron-left"></i></a>Leads</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="subcategory" method="post" >
<?php
if(isset($_POST['submit']))
{
	$lead_name=$_POST['lead_name'];
	$title=$_POST['title'];
	$remark=$_POST['remark'];
	$status_leadin=$_POST['status_leadin'];
$sql=mysqli_query($con,"insert into leadin( title, remark, status_leadin) values('$title','$remark','$status_leadin')");
$_SESSION['msg']="Task Added !!";

}
?>

<div class="control-group">
<label class="control-label" for="basicinput">Title</label>
<div class="controls">
 <input type="text" placeholder="Enter Title"  name="title" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Remark</label>
<div class="controls">
 <input type="long-text" placeholder="Enter Remark"  name="remark"  class="span8 tip" required>
</div>
</div>									
<div class="control-group">
 <label class="control-label" for="status_leadin">Status</label>
 <div class="controls">
  <select name="status_leadin" id="status_leadin">
  <option style="color:green" value="Active">Active</option>
 <option style="color:red" value="Cancelled">Cancelled</option>
  <option style="color:blue" value="Converted">Converted</option>
  <option style="color:yellow" value="Dormant">Dormant</option>
  </select>
</div>
</div>


	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Submit</button>
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
</body>
