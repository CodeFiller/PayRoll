<?php
include("conctn.php");
$tid = $_GET['tid'];
$result = mysqli_query($conn, "DELETE FROM salary_details WHERE tid=$tid");
header("Location:nav.php");
?>
