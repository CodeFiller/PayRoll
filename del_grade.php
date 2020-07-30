<?php
include("conctn.php");
$gid = $_GET['gid'];
$result = mysqli_query($conn, "DELETE FROM grade_details WHERE gid=$gid");
header("Location:nav.#sec-grade.php");
?>
