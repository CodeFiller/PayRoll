<?php
include('conctn.php');
$dno = $dname='';//var
$errors = array('dno' => '','dname' => '');//errorvar
if(isset($_POST['submit']))
{
	if(empty($_POST['dno'])){
    $errors['dno'] = 'Department Number is required <br />';
  }

	if(empty($_POST['dname'])){
		$errors['dname'] = 'Department Name is required <br />';
	}
	if(array_filter($errors))
  {
			echo "terminted";
		}
		else{
			//echo "enter into database";

			$dno = mysqli_real_escape_string($conn, $_POST['dno']);
			$dname = mysqli_real_escape_string($conn, $_POST['dname']);
			$sql = "INSERT INTO dept_details(gid,dno,dname) VALUES(NULL,'$dno','$dname')";
			if(mysqli_query($conn, $sql)){
			header('Location:nav.php#sec-dept');
			echo "done";
			} else {
			echo 'query error: '. mysqli_error($conn);

			}
		}
}
	?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Department Detail</title>
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
    <h2 text-align:center;>Department Details</h2>
  <li>
      <input type="text" name="dno" class="field-style field-split align-left" placeholder="Department Number" />
      <input type="text" name="dname" class="field-style field-split align-right" placeholder="Department Name" />
  </li>
  <li class="inline">
  <input type="submit" value="Submit" name="submit" />
  <input type="reset" value="Reset" />
	<a href="nav.php#sec-dept"><input type="button" value="Go Back" name="Go Back" />
  </li>
  </ul>
  </form>
</div>
</body>
</html>
