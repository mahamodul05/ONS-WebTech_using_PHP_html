<?php 
	include('authintication.php');
?>

<?php include('./header.php'); ?>

<?php  

	$username = "";
	
	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		function test_input($data){
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$username = test_input($_POST['username']);

			$message = "";
			if(empty($username)){
				$message .= "Insert username to search";
				$message .= "<br>";
			}

			if($message === "")
			{
				$f = fopen("nursedata.json", 'r');

				$s = fread($f, filesize("nursedata.json"));

				$data = json_decode($s);
				

				

				echo "<table border=1>";
				echo "<tr>";
				echo "<th>Firstname</th>";
				echo "<th>LastName</th>";
				echo "<th>Gender</th>";
				echo "<th>Date of Birth</th>";
				echo "<th>Blood Group</th>";
				echo "<th>Address</th>";
				echo "<th>Email</th>";
				echo "<th>Phone No</th>";
				
				echo "</tr>";
				




				for($i=0; $i<sizeof($data); $i++)
				{
					$check = $data[$i]->username;
					$che = $data[$i]->role;
					


					if($check === $username and $che === "Patient"){

						

						echo "<tr>";
						echo "<td>" . $data[$i]->firstname . "</td>";
						echo "<td>" . $data[$i]->lastname . "</td>";
						echo "<td>" . $data[$i]->gender . "</td>";
						echo "<td>" . $data[$i]->dob . "</td>";
						echo "<td>" . $data[$i]->bg . "</td>";
						echo "<td>" . $data[$i]->address . "</td>";
						echo "<td>" . $data[$i]->email . "</td>";
						echo "<td>" . $data[$i]->phone . "</td>";
						
						echo "</tr>";

						break;
					}
				}

				echo "</table>";
				

				fclose($f);



			}
			else
			{
				echo $message;
			}

	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search Patient</title>
</head>
<body>
	<h3> <?php echo $_SESSION['lastname'];?>, Welcome</h3>

	<br>
	

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
		<fieldset>
			<legend>Search Patient by Username</legend>

			<label>Enter Username to search.</label>	
			<input type="text" name="username" required value=" <?php echo "$username"; ?>" >
			<input type="submit" name="submit" value="Search">


		</fieldset>
	</form>

	<br>

			<a href="dashnurse.php">Go to dashboard </a>

	<br>

			<a href="viewpatient.php">Go to view Patient </a>

</body>
</html>




<?php include('./footer.php'); ?>

