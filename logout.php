<?php
session_start();
include("include/config.php");
$_SESSION['alogin']=$_POST['username'];
$_SESSION['alogin']=="";
date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE employeelog  SET logout = '$ldate' WHERE username = '".$_SESSION['alogin']."' ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="index.php";
</script>