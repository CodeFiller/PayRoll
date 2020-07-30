<?php
$user= 'root';
$pass= '';
$db= 'payroll';
$a='localhost';
	$db=new mysqli($a, $user, $pass,$db) or die("unable to connect");

	if (!$db)
	{
		die("Database Connection Failed" . mysql_error());
	}

  if(isset($_POST['submit'])!="")
  {
    $lname      = $_POST['lname'];
    $fname      = $_POST['fname'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];

    $sql = mysqli_query($db,"INSERT into employee(lname, fname, gender, emp_type, division)VALUES('$lname','$fname','$gender', '$type', '$division')");

    if($sql)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='index.php';
        </script>
      <?php 
    }
  }
?>