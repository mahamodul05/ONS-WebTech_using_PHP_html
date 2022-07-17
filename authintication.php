<?php 

session_start();

$_SESSION['status'] = "";

if(!isset($_SESSION['auth'])){
	$_SESSION['status'] = "Access Denied. Login to view this page.";
	header("Location: loginnurse.php");
	exit(0);
}

else
{
	if($_SESSION['auth'] == "Nurse"){

	}
	else{
		$_SESSION['status'] = "You are not Nurse.";
		header("Location: loginnurse.php");
		exit(0);
	}
}
?>
