<?php 
	include('authentication.php');
?>

<?php include('./header.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nurse Operation</title>
</head>
<body>

	<h3 align="right"> <?php echo $_SESSION['lastname'];?>, Welcome</h3>

	<br>
	<h3><a href="admindashboard.php">Homepage</a></h3>


	<h3><a href="adminlogout.php">Logout</a></h3>

	<br>

	<a href="removenurse">Remove Nurse</a>
	<br>
	<a href="addnurse">Add Nurse</a>
</body>
</html>

<?php include('./footer.php'); ?>