<?php 
	include('authintication.php');
?>

<?php include('./header.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Profile</title>
</head>




<?php  
	if ($_SERVER['REQUEST_METHOD'] === "POST"){

			function test_input($data){
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$firstname = test_input($_POST['fname']);
			$lastname = test_input($_POST['lname']);
			$address = test_input($_POST['address']);
			$email = test_input($_POST['email']);
			$phone = test_input($_POST['phone']);			
			$qua = test_input($_POST['qua']);
			$work = test_input($_POST['work']);
			


			$store = array(
					'firstname' => $firstname, 
					'lastname' => $lastname, 
					'gender' => $_SESSION['gender'], 
					'dob' => $_SESSION['dob'],  
					'bg' => $_SESSION['bg'], 
					'address' => $address, 
					'email' => $email, 
					'phone' => $phone, 
					'qua' => $qua, 
					'work' => $work, 
					'username' => $_SESSION['username'],  
					'password' => $_SESSION['password'], 
					'role' => $_SESSION['role']
				);





			$message = "";
			if(empty($firstname)) {

				$message .= "First Name is Empty";
				$message .= "<br>";
			}
			else{
				if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
					$message .= " Frist name Only letters and spaces";
					$message .= "<br>";
				}
			}
			if (empty($lastname)) {
				$message .= "Last Name is Empty";
				$message .= "<br>";
			}
			else{
				if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
					$message .= "Last name Only letters and spaces";
					$message .= "<br>";
				}
			}
			
			if (empty($address)) {
				$message .= "Street/House/Road is Empty";
				$message .= "<br>";
			}
			if (empty($email)) {
				$message .= "Email is Empty";
				$message .= "<br>";
			}
			else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$message .= "Please correct your email";
					$message .= "<br>";
				}
			}
			if (empty($phone)) {
				$message .= "Mobileno is Empty";
				$message .= "<br>";
			}
			if (empty($qua)) {
				$message .= "Qualification is Empty";
				$message .= "<br>";
			}
			if (empty($work)) {
				$message .= "Work Experience is Empty";
				$message .= "<br>";
			}

			
		
			if ($message === ""){

					$oldfile = json_decode(file_get_contents("nursedata.json"));

					array_push($oldfile, $store);

					$file = $oldfile;
					if(!file_put_contents("nursedata.json", json_encode($file,JSON_PRETTY_PRINT),LOCK_EX)){
						$error = "Error storing, please try again.";
					}
					else{
						$success = "Message store successfully.";
					}

					echo "Data Updated";
			}
			else {
				
				echo $message;
				echo "<br>";
			}
				
		}


			
			
		

?>








<body>

	<h3> <?php echo $_SESSION['lastname'];?>, Welcome</h3>

	

	<br>



	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>

		<fieldset>
			<legend>Edit Profile Form</legend>

			<label>Frist Name:</label>
			<input type="text" name="fname" required value = "<?php echo $_SESSION['firstname']; ?>">

			<br><br>

			<label>Last Name:</label>
			<input type="text" name="lname" required value = "<?php echo $_SESSION['lastname']; ?>">

			<br><br>

			<label>Address:</label>
			<input type="text" name="address" required value = "<?php echo $_SESSION['address']; ?>">
			
			<br><br>

			<label>Email:</label>
			<input type="text" name="email" required value = "<?php echo $_SESSION['email']; ?>">

			<br><br>

			<label>Phone Number</label>
			<input type="Number" name="phone" required value = "<?php echo $_SESSION['phone']; ?>">

			<br><br>

			<label>Qualification:</label>
			<input type="text" name="qua" required value = "<?php echo $_SESSION['qua']; ?>">

			<br><br>

			<label>Work Experience</label>
			<input type="text" name="work" required value = "<?php echo $_SESSION['work']; ?>">

			<br><br>		

			<input type="submit" name="submit" value="Update">

			<br><br>

			<a href="dashnurse.php">Go to dashboard </a>

			

		</fieldset>

	</form>


</body>
</html>

<?php include('./footer.php'); ?>