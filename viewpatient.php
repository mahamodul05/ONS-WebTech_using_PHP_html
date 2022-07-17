<?php 
	include('authintication.php');
?>

<?php include('./header.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Patient</title>
</head>
<body>


<?php  
	
	
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
					$che = $data[$i]->role;
					


					if($che === "Patient"){

						

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

					
					}
				}

				echo "</table>";
				

				fclose($f);
				



			
	

?>













	<h3> <?php echo $_SESSION['lastname'];?>, Welcome</h3>

	<br>
	<br>

			<a href="dashnurse.php">Go to dashboard </a>

</body>
</html>



<?php include('./footer.php'); ?>