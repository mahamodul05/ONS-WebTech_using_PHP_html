<?php 
	include('authintication.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dash Board</title>


</head>
<body>

	<?php include('./header.php'); ?>
	<a href="logout.php">Logout</a>

	<h3> <?php echo $_SESSION['lastname'];?>, Welcome</h3>

	

	<br>

	<p>Welcome Nurse</p>

	<a href="updatenursepass.php">Change Password</a>
	<br>
	<a href="shownurse.php">View Profile</a>
	<br>

	<a href="updatenurse.php">Update Profile</a>
	<br>
	<a href="viewpatient.php">View Patient</a>
	<br>

	<a href="searchpatient.php">Search Patient</a>

	<br>
	

	<?php include('./footer.php'); ?>



</body>
</html>