<?php
include("conctn.php");
$dno = $_GET['dno'];
$result = mysqli_query($conn, "DELETE FROM dept_details WHERE dno=$dno");
header("Location:nav.php#sec-dept");
?>
