<?php session_start() ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>

<?php 
	if(isset($_SESSION['status']))
	{
		echo $_SESSION['status'];
	}
?>


<?php include('./header.php'); ?>

<?php 

	$username = "";
	$password = "";
	$role = "";

	if($_SERVER['REQUEST_METHOD'] === "POST"){

		$f = fopen("data.json", 'r');

		$s = fread($f, filesize("data.json"));

		$data = json_decode($s);

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$username = test_input($_POST['username']);
		$password = test_input($_POST['password']);

		$message = "";
		if(empty($username)){
				$message .= "Username can't be Empty";
				$message .= "<br>";
			}

		if(empty($password)){
				$message .= "Password can't be Empty";
				$message .= "<br>";
		}

		$a = true;
		
		$flag = false;
		if ($message === ""){

			for($i=0; $i<sizeof($data); $i++)
			{
				if($data[$i]->username === $username and $data[$i]->password === $password){
					$flag = true;
					$role = $data[$i]->role;

					$_SESSION['firstname'] = $data[$i]->firstname;
					$_SESSION['lastname'] = $data[$i]->lastname;
					$_SESSION['gender'] = $data[$i]->gender;
					$_SESSION['dob'] = $data[$i]->dob;
					$_SESSION['bg'] = $data[$i]->bg;
					$_SESSION['address'] = $data[$i]->address;
					$_SESSION['email'] = $data[$i]->email;
					$_SESSION['phone'] = $data[$i]->phone;
					$_SESSION['qua'] = $data[$i]->qua;
					$_SESSION['work'] = $data[$i]->work;
					$_SESSION['username'] = $data[$i]->username;
					$_SESSION['password'] = $data[$i]->password;
					$_SESSION['role'] = $data[$i]->role;













					break; 
				}
			}
		}
		else{
			echo "$message";
			echo "<br>";
			echo "<br>";

			$a = false;
			
		}

		
		
		

		if(!$flag){

			if($a){

				echo "Username / Password incorrect. Try again...";

				echo "<br>";
				echo "<br>";

			}

			
		}

		
		else
		{
			echo "<br>";
			echo "<br>";
			$_SESSION['auth'] = $role;
			
			header("Location: admindashboard.php");
			
		}
	}




?>









<body>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
		<fieldset>
			<legend>Login page</legend>

			<label>Username :</label>
			<input type="text" name="username" required value = "<?php echo $username; ?>">
			<br><br>
			<label>Password:</label>
			<input type="text" name="password" required value = "<?php echo $password; ?>">
			<br><br>

			<input type="submit" name="submit" value="Login">
			<br><br>
			<br><br>
			<p>Don't have an account?</p>
			<a href="adminregistration.php">Click here for Sign up!</a>


		</fieldset>


	</form>


<?php include('./footer.php'); ?>
</body>
</html>


