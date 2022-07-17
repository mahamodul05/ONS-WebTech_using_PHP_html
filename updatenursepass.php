<?php 
	include('authintication.php');
?>

<?php include('./header.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reset Password</title>
</head>



<?php

	if($_SERVER['REQUEST_METHOD'] === "POST"){


		$f = fopen("nursedata.json", 'r+');
		$s = fread($f, filesize("nursedata.json"));
		$data = json_decode($s);
		

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$username = test_input($_POST['username']);
		$password = test_input($_POST['oldpass']);
		$newpass = test_input($_POST['newpass']);
		$store ="";
		$olddata = "";

		$flag = false;


		$message = "";
		if(empty($username)){
				$message .= "Fillup username";
				$message .= "<br>";
			}

			if(empty($password)){
				$message .= "Fillup old password";
				$message .= "<br>";
			}

			if(empty($newpass)){
				$message .= "Fillup new password";
				$message .= "<br>";
			}

			if($message === "")
			{

			$olddata = json_decode(file_get_contents("nursedata.json"));
		for($i = 0; $i<sizeof($data); $i++)
		{

			if($data[$i]->username === $_SESSION['username'] and $data[$i]->password === $_SESSION['password']){



				$store = array(
					'firstname' => $data[$i]->firstname, 
					'lastname' => $data[$i]->lastname,
					'gender' => $data[$i]->gender,
					'dob' => $data[$i]->dob,
					'bg' => $data[$i]->bg,
					'address' => $data[$i]->address,
					'email' => $data[$i]->email,
					'phone' => $data[$i]->phone,
					'qua' => $data[$i]->qua,
					'work' => $data[$i]->work,
					'username' => $data[$i]->username, 
					'password' => $newpass,
					'role' => $data[$i]->role
				);

				
				array_push($olddata, $store);
				$file = json_decode(file_get_contents("nursedata.json"));

				$flag = true;
				if(!file_put_contents("nursedata.json", json_encode($file, JSON_PRETTY_PRINT),LOCK_EX))
				{
					$error = "Error storing message, please try again.";
				}
				else
				{
					$success = "Message store successfully.";
				}
				
			}	
			else{
				$store = array(
					'firstname' => $data[$i]->firstname, 
					'lastname' => $data[$i]->lastname,
					'gender' => $data[$i]->gender,
					'dob' => $data[$i]->dob,
					'bg' => $data[$i]->bg,
					'address' => $data[$i]->address,
					'email' => $data[$i]->email,
					'phone' => $data[$i]->phone,
					'qua' => $data[$i]->qua,
					'work' => $data[$i]->work,
					'username' => $data[$i]->username, 
					'password' => $newpass,
					'role' => $data[$i]->role
				);

				array_push($olddata, $store);
				$file = json_decode(file_get_contents("nursedata.json"));

				$flag = true;
				if(!file_put_contents("nursedata.json", json_encode($file, JSON_PRETTY_PRINT),LOCK_EX))
				{
					$error = "Error storing message, please try again.";
				}
				else
				{
					$success = "Message store successfully.";
				}


			}

			

		}

	}
	else
	{
		echo $message;
				echo "<br>";
	}

		
		if($flag){
			echo "Password change successfully.";
		}
		else{
			echo "Content not found";
		}



	}

?>






<body>


	<h3> <?php echo $_SESSION['lastname'];?>, Welcome</h3>

	<br>

	

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>
		<fieldset>
			<legend>Change Password</legend>
			<label>Username</label>
			<input type="text" name="username" required value="<?php echo $_SESSION['username'];?>">
			<label>Old Password</label>
			<input type="text" name="oldpass">
			<br><br>
			<label>New Password</label>
			<input type="text" name="newpass">
			<br><br>
			<input type="submit" name="submit" value="Change Password">
		</fieldset>
	</form>

	<a href="dashnurse.php">Go to dashboard</a>

</body>
</html>

<?php include('./footer.php'); ?>
