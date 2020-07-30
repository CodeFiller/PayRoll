<?php
include('conctn.php');
$fname =  $uname = $email = $password='';//var
$errors = array('fname' => '','uname' => '', 'email' => '','password' => '');
if(isset($_POST['submit']))
{

	if(empty($_POST['fname'])){
		$errors['fname'] = '  Full Name is required <br />';
	} else{
		$fname = $_POST['fname'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $fname)){
			$errors['fname'] =  'name must be letters and spaces only<br/>';
		}
	}
	if(empty($_POST['uname'])){
		$errors['uname'] = '  Full Name is required <br />';
	} else{
		$uname = $_POST['uname'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $uname)){
			$errors['uname'] =  'name must be letters and spaces only<br/>';
		}
	}
	if(empty($_POST['email'])){
    $errors['email'] = 'E-mail id is required <br />';
  }
	else{
		$email =($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error['email']	= "invalid email format";
		}
	}
	if(empty($_POST['password'])){
    $errors['password'] = 'A password is required <br />';
  }
	if(array_filter($errors))
  {
			echo "terminted";
		}
		else{

			$fname =  	mysqli_real_escape_string($conn,$_POST["fname"]);
			$uname =  	mysqli_real_escape_string($conn,$_POST['uname']);
			$email =  	mysqli_real_escape_string($conn,$_POST['email']);
			$password = 	mysqli_real_escape_string($conn,$_POST['password']);

			$sql = "INSERT INTO admin_details(fname,uname,email,password) VALUES('$fname','$uname','$email','$password')";
			if(mysqli_query($conn, $sql)){
			header('Location:login.php');
			echo "done";
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
		}
}
	?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
	body {
		background-position: center;
		 background-repeat: no-repeat;
		 background-size: cover;
			}
	form input[type="submit"]
	{
		background:#4CAF50;
		color: white;
	}
	</style>
	</head>
	<body>
		<div class="login-page">
	  <div class="form">
	    <form class="login-form" method="POST">
	      <input type="text" name="fname" placeholder="Full Name"/>
				<div class="red-text"><?php echo $errors['fname']; ?></div>

				 <input type="text" name="uname" placeholder="Username"/>
				 <div class="red-text"><?php echo $errors['uname']; ?></div>

				  <input type="email" name="email" placeholder="E-mail"/>
					<div class="red-text"><?php echo $errors['email']; ?></div>

	      <input type="password" name="password" placeholder="password"/>
				<div class="red-text"><?php echo $errors['password']; ?></div>
  	<input type="submit" name="submit" value="SUBMIT" style="">
		 <p class="message"><a href="login.php">Login</a><p>
	    </form>
	  </div>
	</div>
	<script src="style.js"></script>
	</body>
</html>
