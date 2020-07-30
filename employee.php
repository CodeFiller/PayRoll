<?php
include('conctn.php');
//include('connection.php');
$fname = $gender =  $dob = $doj = $address =  $city = $state = $pincode = $number = $email='';//var
$errors = array('fname' => '','gender' => '','dob' => '','doj' => '','address' => '','city' => '','state' => '','pincode' => '','number' => '','email' => '');//errorvar
if(isset($_POST['submit']))
{
	if(empty($_POST['email'])){
    $errors['email'] = 'E-mail id is required <br />';
  }
	else{
		$email =($_POST['email']);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error['email']	= "invalid email format";
		}
	}

			//echo "enter into database";

			$fname =  $_POST['fname'];
			$gender =  $_POST['gender'];
			$dob =  $_POST['dob'];
			$doj =  $_POST['doj'];
			$dno =  $_POST['dno'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state =  $_POST['state'];
			$number = $_POST['number'];
			$email = $_POST['email'];
			$sql = "INSERT INTO emp_details(fname	,gender	,dob	,doj,	dno,	address,	city,state,	phno,	email) VALUES('$fname','$gender','$dob','$doj','$dno','$address','$city','$state','$number','$email')";
			if(mysqli_query($conn, $sql)){
				echo "done";
							header('Location:nav.php#sec-emp');
			echo "done";
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
		}

	?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Employee Detail</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <style>
    h2{
  text-align:center;
}
    </style>
</head>

<body>
  <form class="form" method="POST">
  <ul>
    <h2 text-align:center;>Employee Details</h2>
  <li>
      <input type="text" name="fname" class="field-style field-split align-left" placeholder="Full Name" />
      <input type="text" name="gender" class="field-style field-split align-right" placeholder="Gender" />
  </li>
  <li>
      <input type="date" name="dob" class="field-style field-split align-left" placeholder="Date of Birth" />
      <input type="date" name="doj" class="field-style field-split align-right" placeholder="Date of Joining" />
  </li>
  <li>
      <input type="text" name="dno" class="field-style field-split align-left" placeholder="Department Number" />
      <input type="text" name="address" class="field-style field-split align-right" placeholder="Address" />
  </li>
  <li>
      <input type="text" name="city" class="field-style field-split align-left" placeholder="City" />
      <input type="text" name="state" class="field-style field-split align-right" placeholder="State" />
  </li>
  <li>
      <input type="text" name="number" class="field-style field-split align-left" placeholder="Phone Number" pattern="[789][0-9]{9}"/>
      <input type="text" name="email" class="field-style field-split align-right" placeholder="E-mail ID" />
  </li>
  <li class="inline">
  <input type="submit" value="Submit" name="submit" />
  <input type="reset" value="Reset" />
	<a href="nav.php#sec-emp"><input type="button" value="Go Back" name="Go Back" />

  </li>
  </ul>
  </form>
</div>

</body>

</html>
