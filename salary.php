<?php
include('conctn.php');
$tid = $eid =  $gid='';//var
$errors = array('tid' => '','eid' => '','gid' => '');//errorvar
if(isset($_POST['submit']))
{
	if(empty($_POST['tid'])){
    $errors['tid'] = 'Department Number is required <br />';
  }

	if(empty($_POST['eid'])){
		$errors['eid'] = 'Department Number is required <br />';
	}


	if(empty($_POST['gid'])){
		$errors['gid'] = 'Department Name is required <br />';
	}
	if(array_filter($errors))
  {
			echo "terminted";
		}
		else{
			//echo "enter into database";

			$tid = mysqli_real_escape_string($conn, $_POST['tid']);
			$eid = mysqli_real_escape_string($conn, $_POST['eid']);
			$gid = mysqli_real_escape_string($conn, $_POST['gid']);
			$sql = "INSERT INTO salary_details(tid,eid,gid) VALUES('$tid','$eid','$gid')";
			if(mysqli_query($conn, $sql)){
			header('Location:nav.php#sec-salary');
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
		table {
			margin-right: 100px;
		border-collapse: collapse;
		width: 100%;
		color: #216288;
		font-family: monospace;
		font-size: 25px;
		text-align: left;
		}
		th {
		background-color: #216288;
		color: white;
		}
		tr:nth-child(even) {background-color: #f2f2f2}

    h2{
  text-align:center;
}
    </style>
</head>
<body>
	<div>
  <form class="form" method="POST">
  <ul>
    <h2 text-align:center;>Payroll Details</h2>
  <li>
      <input type="text" name="tid" class="field-style field-split align-left" placeholder="Transaction ID" />
			<input type="text" name="eid" class="field-style field-split align-left" placeholder="Employee ID" />
  </li>
	<li>
	    <input type="text" name="gid" class="field-style field-split align-left" placeholder="Grade ID" />
  </li>
	<li class="inline">
  <input type="submit" value="Submit" name="submit" />
  <input type="reset" value="Reset" />
	<a href="nav.php#sec-salary"><input type="button" value="Go Back" name="Go Back" />
  </li>
  </ul>
  </form>
</div>
	<span style="font-decoration:none;color: #216288;font-size:35px;letter-spacing:2px;font-style:italic;font-weight:bold;margin-bottom:40px; ">Department List</span>
	<table>
<tr>
<th>Employee ID</th>
<th>Employee Name</th>
<th>Grade ID</th>
</tr>
	<?php
$conn = mysqli_connect('127.0.0.1:3308', 'root', '', 'pay');
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT eid,fname,gid FROM  emp_details e,grade_details g where e.dno=g.dno";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["eid"]. "</td><td>" . $row["fname"] . "</td><td>" . $row["gid"] . "</td></tr>";
}
echo "</table>";
} else { ?>
<span style="color:tomato;font-size:20px;font-weight: bold;" ><?php echo "0 results";  ?></span>
<?php }
$conn->close();
?>
</table>

</body>
</html>
