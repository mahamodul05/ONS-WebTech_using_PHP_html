<?php 

session_start();

$_SESSION['status'] = "";


if(!isset($_SESSION['auth'])){
	$_SESSION['status'] = "Access Denied. Login to view this page.";
	header("Location: adminlogin.php");
	exit(0);
}

else
{
	if($_SESSION['auth'] == "Admin"){

	}
	else{
		$_SESSION['status'] = "You are not Admin.";
		header("Location: adminlogin.php");
		exit(0);
	}
}
?>
