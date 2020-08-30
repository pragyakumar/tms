
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


if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$employeeid=$_POST['employeeid'];
	$email=$_POST['email'];
	$personalmail=$_POST['personalmail'];
	$phonenumber=$_POST['phonenumber'];
	$alphonenumber=$_POST['alphonenumber'];
	$presentadd=$_POST['presentadd'];
	$permanentadd=$_POST['permanentadd'];
	
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update employee set username='$username', employeeid='$employeeid' ,email='$email',personalmail='$personalmail',phonenumber='$phonenumber',alphonenumber='$alphonenumber',presentadd='$presentadd', permanentadd='permanentadd' where id='$id'");
$_SESSION['msg']="Profile Updated !!";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LMS | Edit Lead</title>
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
	<div class="wrapper">
		<div class="container">
			<div class="row">
				
			<div class="span12">
					<div class="content">

						<div class="module">
							
								<h3><a href="update_leads.php" ><i class="icon-chevron-left"></i></a>Edit Profile details</h3>
							
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<br />

			<form class="form-horizontal row-fluid" name="Category" method="post" >
		<?php
$name=$_SESSION['alogin'];
$query=mysqli_query($con,"select username,employeeid,email,personalmail,phonenumber, alphonenumber, presentadd , permanentadd from employee WHERE username='$name'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="control-group">
<label class="control-label" for="basicinput">Name</label>
<div class="controls">
 <input type="text" placeholder="Enter your Name"  name="username" value="<?php echo  htmlentities($row['username']);?>" class="span8 tip">
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Employee ID</label>
<div class="controls">
 <input type="text" placeholder="Enter your employee ID "  name="employeeid"  value="<?php echo  htmlentities($row['employeeid']);?>" class="span8 tip">
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Company Email</label>
<div class="controls">
 <input type="text" placeholder="Enter Company Email"  name="email" value="<?php echo  htmlentities($row['email']);?>"class="span8 tip">
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Personal Email</label>
<div class="controls">
 <input type="text" placeholder="Enter Personal Email"  name="personalmail" value="<?php echo  htmlentities($row['personalmail']);?>" class="span8 tip">
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Phone Number</label>
<div class="controls">
 <input type="text" placeholder="Enter your Phone Number"  name="phonenumber" value="<?php echo  htmlentities($row['phonenumber']);?>" class="span8 tip">
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Alternate Number </label>
<div class="controls">
 <input type="text" placeholder="Enter your Alternate number"  name="alphonenumber" value="<?php echo  htmlentities($row['alphonenumber']);?>" class="span8 tip">
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Present Address</label>
<div class="controls">
 <input type="text" placeholder="Enter your Present Address"  name="presentadd" value="<?php echo  htmlentities($row['presentadd']);?>" class="span8 tip">
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Permanent Address</label>
<div class="controls">
 <input type="text" placeholder="Enter your Permanent Address"  name="permanentadd" value="<?php echo  htmlentities($row['permanentadd']);?>" class="span8 tip">
</div>
</div>
<?php
   if(isset($_FILES['document'])){
      $errors= array();
      $file_name = $_FILES['document']['name'];
      $file_size =$_FILES['document']['size'];
      $file_tmp =$_FILES['document']['tmp_name'];
      $file_type=$_FILES['document']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['document']['name'])));
      
      $extensions= array("pdf","txt","xlsx","xls","docx","jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, document file only";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"document/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<div class="control-group">
<label class="control-label">Profile Image</label>
<div class="controls">
<input type="file" name="document" />
</div>
</div>

	<?php } ?>

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
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

	<script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

<div class="wrapper">
		<div class="container">
			<div class="row">
				
			<div class="span12">
					<div class="content">

						<div class="module">
							
								<h3><a href="update_leads.php" ><i class="icon-chevron-left"></i></a>Change Password</h3>
							
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<br />

			<form class="form-horizontal row-fluid" name="Category" method="post" >
<?php
if(isset($_POST['change']))
{
$sql=mysqli_query($con,"SELECT password FROM employee where password='".md5($_POST['password'])."' && username='".$_SESSION['alogin']."'");
$num=mysqli_fetch_array($sql); 
if($num>0)
{
 $con=mysqli_query($con,"update admin set password='".md5($_POST['newpassword'])."', updationDate='$currentTime' where username='".$_SESSION['alogin']."'");
$_SESSION['msg']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg']="Old Password not match !!";
}
}?>
<div class="control-group">
<label class="control-label" for="basicinput">Old Password</label>
<div class="controls">
 <input type="password" placeholder="Enter your Old Password"  name="password"  class="span8 tip" >
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">New Password</label>
<div class="controls">
 <input type="password" placeholder="Enter your New Password "  name="newpassword"  class="span8 tip" >
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Confirm Password</label>
<div class="controls">
 <input type="password" placeholder="Enter your Confirm Password"  name="confirmpassword" class="span8 tip">
</div>
</div>





	<div class="control-group">
											<div class="controls">
												<button type="submit" name="change" class="btn">Update</button>
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
<?php } ?>