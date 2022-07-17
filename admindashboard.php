<?php 
	include('authentication.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin DashBoard</title>


</head>
<body>

	<?php include('./header.php'); ?>
	



	
	
	<h3 align="right"> <?php echo $_SESSION['lastname'];?>, Welcome</h3>

	<br>

	<h3><a href="admindashboard.php">Homepage</a></h3>


	<h3><a href="adminlogout.php">Logout</a></h3>

	<br>

	<h3><a href="adminchangepassword.php">Change Password</a></h3>

	<br>

	<h3><a href="admineditprofile.php">Update  Profile</a></h3>

	<br>

	<h3><a href="adminviewprofile.php">View  Profile</a></h3>

	<br>

	<h3><a href="nurseoperation.php">Manage Nurse</a></h3>

	<br>

	<h3><a href="patientoperation.php">Manage Patient</a></h3>

	<br>

	<h3><a href="search.php">Search</a></h3>

	

	<?php include('./footer.php'); ?>



</body>
</html>