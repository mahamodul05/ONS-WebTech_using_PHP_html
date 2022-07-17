<?php 
	include('authentication.php');
?>

<?php include('./header.php'); ?>

<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Profile</title>
</head>
<body>

	<h3 align="right"> <?php echo $_SESSION['lastname'];?>, Welcome</h3>

	<br>
	<h3><a href="admindashboard.php">Homepage</a></h3>


	<h3><a href="adminlogout.php">Logout</a></h3>

	<br>

	<h4>First name : <?php echo $_SESSION['firstname'];?> </h4>
	<h4>Last name : <?php echo $_SESSION['lastname'];?> </h4>
	<h4>Gender : <?php echo $_SESSION['gender'];?> </h4>
	<h4>Date of Birth : <?php echo $_SESSION['dob'];?> </h4>
	<h4>Blood Group : <?php echo $_SESSION['bg'];?> </h4>
	<h4>Address : <?php echo $_SESSION['address'];?> </h4>
	<h4>Email : <?php echo $_SESSION['email'];?> </h4>
	<h4>Phone No : <?php echo $_SESSION['phone'];?> </h4>
	<h4>Qualification : <?php echo $_SESSION['qua'];?> </h4>
	<h4>Work Experience : <?php echo $_SESSION['work'];?> </h4>
	<h4>User is : <?php echo $_SESSION['role'];?> </h4>

	<br>

	<a href="admineditprofile.php">Click here to update profile.</a>







</body>
</html>

<?php include('./footer.php'); ?>