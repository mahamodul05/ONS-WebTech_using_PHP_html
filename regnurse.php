<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nurse Registration</title>
</head>
<body>


<?php include('./header.php'); ?>






<?php

	$f = fopen("nursedata.json", 'r');

	$s = fread($f, filesize("nursedata.json"));

	$data = json_decode($s);

	$firstname = $lastname = $gender = $dob = $bg = $address = $email = $phone = $qua = $work = $uname = $pass = $role = "";

		if ($_SERVER['REQUEST_METHOD'] === "POST"){

			function test_input($data){
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$firstname = test_input($_POST['fname']);
			$lastname = test_input($_POST['lname']);
			$gender = isset($_POST['gender']) ? test_input($_POST['gender']) : NULL;
			$dob = test_input($_POST['dob']);
			$bg = isset($_POST['bg']) ? test_input($_POST['bg']) : NULL;
			$address = test_input($_POST['address']);
			$email = test_input($_POST['email']);
			$phone = test_input($_POST['phone']);			
			$qua = test_input($_POST['qua']);
			$work = test_input($_POST['work']);
			$uname = test_input($_POST['uname']);
			$pass = test_input($_POST['pass']);
			$role = test_input($_POST['role']);


			$store = array(
					'firstname' => $firstname, 
					'lastname' => $lastname, 
					'gender' => $gender, 
					'dob' => $dob, 
					'bg' => $bg, 
					'address' => $address, 
					'email' => $email, 
					'phone' => $phone, 
					'qua' => $qua, 
					'work' => $work, 
					'username' => $uname, 
					'password' => $pass,
					'role' => $role
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
			if (empty($gender)) {
				$message .= "Gender not Selected";
				$message .= "<br>";
			}
			if (empty($dob)) {
				$message .= "Date of birth empty";
				$message .= "<br>";
			}
			if (empty($bg)) {
				$message .= "Blood Group not Selected";
				$message .= "<br>";
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

			if(empty($uname)){
				$message .= "Username can't be Empty";
				$message .= "<br>";
			}

			if(empty($pass)){
				$message .= "Password can't be Empty";
				$message .= "<br>";
			}

			if(empty($role)){
				$message .= "Your role can't be Empty";
				$message .= "<br>";
			}
			
			$unot = "false";
			$uex = "false";
			if ($message === ""){

				for($i=0; $i<sizeof($data); $i++)
				{
					if($data[$i]->username === $uname){
						$uex = "true";
						$message .= "Username already exist.";
						$message .= "<br>";
						break; 
					}
				}
			}
			



			if ($message === "" && $uex === "false"){

				if(filesize("nursedata.json") == 0){
					$file = $store;

					echo "Registration Successful";

				}

				else{
					$oldfile = json_decode(file_get_contents("nursedata.json"));

					array_push($oldfile, $store);

					$file = $oldfile;

					echo "Registration Successful";
				}

				if(!file_put_contents("nursedata.json", json_encode($file,JSON_PRETTY_PRINT),LOCK_EX)){
					$error = "Error storing, please try again.";
				}
				else{
					$success = "Message store successfully.";
				}

			}


			
			else {
				
				echo $message;
				echo "<br>";
			}
		}
?>






	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>

		<fieldset>
			<legend>Registration Form</legend>

			<label>Frist Name:</label>
			<input type="text" name="fname" required value = "<?php echo $firstname; ?>">

			<br><br>

			<label>Last Name:</label>
			<input type="text" name="lname" required value = "<?php echo $lastname; ?>">

			<br><br>

			<label>Gender:</label>
			<input type="radio" name="gender">
			<label>Female</label>
			<input type="radio" name="gender">
			<label>Male</label>

			<br><br>

			<label>Date of Birth:</label>
			<input type="Date" name="dob" required value = "<?php echo $dob; ?>">

			<br><br>

			<label>Blood Group:</label>
			<select name="bg" required value = "<?php echo $bg; ?>">
				<option>A ve(+)</option>
				<option>A ve(-)</option>
				<option>B ve(+)</option>
				<option>B ve(-)</option>
				<option>O ve(+)</option>
				<option>O ve(-)</option>
				<option>AB ve(+)</option>
				<option>AB ve(-)</option>
			</select>
		
			<br><br>

			<label>Address:</label>
			<input type="text" name="address" required value = "<?php echo $address; ?>">
			
			<br><br>

			<label>Email:</label>
			<input type="text" name="email" required value = "<?php echo $email; ?>">

			<br><br>

			<label>Phone Number</label>
			<input type="Number" name="phone" required value = "<?php echo $phone; ?>">

			<br><br>

			<label>Qualification:</label>
			<input type="text" name="qua" required value = "<?php echo $qua; ?>">

			<br><br>

			<label>Work Experience</label>
			<input type="text" name="work" required value = "<?php echo $work; ?>">

			<br><br>

			<label>Username</label>
			<input type="text" name="uname" required value = "<?php echo $uname; ?>">
			<br><br>

			<label>Password</label>
			<input type="text" name="pass" required value = "<?php echo $pass; ?>">
			<br><br>

			<label>Role</label>
			<select name="role" required value = "<?php echo $role; ?>">
				<option>Admin</option>
				<option>Nurse</option>
				<option>Patient</option>
			</select>
			<br><br>

			<input type="submit" name="submit" value="Registration">


			<br><br>
			<br><br>

			<p>Already have an account?</p>
			<a href="loginnurse.php">Click here for Log in!</a>

		</fieldset>

	</form>


</body>
</html>

<?php include('./footer.php'); ?>