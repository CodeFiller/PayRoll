<?php
include("conctn.php");
$eid = $_GET['eid'];
echo $eid;
$sql= "DELETE FROM emp_details WHERE eid=$eid";

if(mysqli_query($conn, $sql)){
  echo "done";
  header("Location:nav.php#sec-emp");
} else {
  echo 'query error: '. mysqli_error($conn);
}
?>
