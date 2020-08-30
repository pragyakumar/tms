
<?php
session_start();
include('include/config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LMS | Update Task</title>
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

	<br> </br>
	<div class="wrapper">
		<div class="container">
			<div class="row">
			
			<div class="span12">
					<div class="content">

	<div class="module">
							
							
							

									<h3><a href="mainpage.php" ><i class="icon-chevron-left"></i></a>Leads</h3>
							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>Name</th>
											<th>Last Status</th>
											<th>Current Status</th>
											<th>Action</th>
										
										</tr>
									</thead>
									<tbody>

<?php 

$query=mysqli_query($con,"select id, name, updation_date, remark, status_lead from leads  ");
while($r=mysqli_fetch_array($query))
{
?>	
										<tr>
											
											<td><?php echo htmlentities($r['name']);?></td>
											<td><?php echo htmlentities($r['updation_date']);?> /<?php echo htmlentities($r['remark']);?></td>
											<td><?php echo htmlentities($r['status_lead']);?></td>
											<td>
											<a href="edit_leads.php?id=<?php echo $r['id']?>" ><i class="icon-edit"></i></a></td>
											
											
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