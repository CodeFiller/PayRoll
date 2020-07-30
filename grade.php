<?php
include('conctn.php');
//include('connection.php');
$gname = $sname =  $basic = $dear = $travel =  $hra = $medical = $bonus = $pf = $ptax='';//var
$errors = array('gname' => '','sname' => '','basic' => '','dear' => '','travel' => '','hra' => '','medical' => '','bonus' => '','pf' => '','ptax' => '');//errorvar
if(isset($_POST['submit']))
{
	if(empty($_POST['gname'])){
    $errors['gname'] = '  Full Name is required <br />';
  }

	if(empty($_POST['dno'])){
		$errors['dno'] = 'Department Number is required <br />';
	}

	if(empty($_POST['basic'])){
    $errors['basic'] = 'Basic is required <br />';
  }

	if(empty($_POST['dear'])){
    $errors['dear'] = 'Dearness Allowance is required <br />';
  }

	if(empty($_POST['travel'])){
    $errors['travel'] = 'Travel Allowance is required <br />';
  }

	if(empty($_POST['hra'])){
    $errors['hra'] = 'House Rent Allowance is required <br />';
  }

	if(empty($_POST['medical'])){
    $errors['medical'] = 'Medical Allowance is required <br />';
  }

	if(empty($_POST['bonus'])){
    $errors['bonus'] = 'Bonus is required <br />';
  }

	if(empty($_POST['pf'])){
    $errors['pf'] = 'Provident Fund is required <br />';
  }

	if(empty($_POST['ptax'])){
    $errors['ptax'] = 'Provissional Tax is required <br />';
  }
	if(array_filter($errors))
  {
			echo "terminted";
		}
		else{
			//echo "enter into database";

			$gname = mysqli_real_escape_string($conn, $_POST['gname']);
			$dno = mysqli_real_escape_string($conn, $_POST['dno']);
			$basic = mysqli_real_escape_string($conn, $_POST['basic']);
			$dear = mysqli_real_escape_string($conn, $_POST['dear']);
			$travel = mysqli_real_escape_string($conn, $_POST['travel']);
			$hra = mysqli_real_escape_string($conn, $_POST['hra']);
			$medical = mysqli_real_escape_string($conn, $_POST['medical']);
			$bonus = mysqli_real_escape_string($conn, $_POST['bonus']);
			$pf = mysqli_real_escape_string($conn, $_POST['pf']);
			$ptax = mysqli_real_escape_string($conn, $_POST['ptax']);
			$sql = "INSERT INTO grade_details(gname,dno,basic,dear,travel,hra,medical,bonus,pf,ptax) VALUES('$gname','$dno','$basic','$dear','$travel','$hra','$medical','$bonus','$pf','$ptax')";
			if(mysqli_query($conn, $sql)){
		//	header('Location:grade.php');
		//auto update for the gid in dept table
		$query="SELECT gid,dno from grade_details where dno=$dno";
	 $res=mysqli_query($conn,$query);
	 $asso=mysqli_fetch_assoc($res);
	 $gradeid=$asso['gid'];
  $deptno=$asso['dno'];
	 $que="UPDATE dept_details set gid=$gradeid where dno=$deptno";
	 if(mysqli_query($conn, $que))
		header('Location:nav.php#sec-grade');
			echo "done";
			} else {
		//		echo 'query error: '. mysqli_error($conn);
		?>
<script type="text/javascript">
alert('no department exists!');
</script>
		<?php
			}
		}

}


	?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Grade Detail</title>
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
    <h2 text-align:center;>Grade Details</h2>
  <li>
      <input type="text" name="gname" class="field-style field-split align-left" placeholder="Grade Name" />
      <input type="text" name="dno" class="field-style field-split align-right" placeholder="Department Number" />
  </li>
  <li>
      <input type="text" name="basic" class="field-style field-split align-left" placeholder="Basic" />
      <input type="text" name="dear" class="field-style field-split align-right" placeholder="Dearness Allowance" />
  </li>
  <li>
      <input type="text" name="travel" class="field-style field-split align-left" placeholder="Travel Allowance" />
      <input type="text" name="hra" class="field-style field-split align-right" placeholder="House Rent Allowance" />
  </li>
  <li>
      <input type="text" name="medical" class="field-style field-split align-left" placeholder="Medical Allowance" />
      <input type="text" name="bonus" class="field-style field-split align-right" placeholder="Bonus" />
  </li>
  <li>
      <input type="text" name="pf" class="field-style field-split align-left" placeholder="Provident Fund" />
      <input type="text" name="ptax" class="field-style field-split align-right" placeholder="Provisssional Tax" />
  </li>
  <li class="inline">
  <input type="submit" value="Submit" name="submit" />
  <input type="reset" value="Reset" />
	<a href="nav.php#sec-grade"><input type="button" value="Go Back" name="Go Back" />
  </li>
  </ul>
  </form>
</div>

</body>

</html>
