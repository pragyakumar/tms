<?php
session_start();
include('include/config.php');
if (isset($_POST["show"]))
	{
		$name=$_SESSION['alogin'];
		$query=mysqli_query($con,"select address from leads WHERE name='$name'");
		?>


<iframe width="100%" height="800" src="https://maps.google.com/maps?q=<?php echo '$address'; ?>&output=embed"></iframe>

		<?php
	}
?>

<form method="POST">
		<h3><a href="open_leads.php">Back to Portal</a></h3>
	    <input type="submit" name="show">
</form>
</html>
