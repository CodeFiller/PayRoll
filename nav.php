<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <tittle></title>
<link rel="stylesheet" href="function.css">
<link rel="stylesheet" type="text/css" href="index.css">
<style>
.button {
  background-color: #4CAF50;
  border-radius: 12px;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
table {
border-collapse: collapse;
width: 100%;
color: #4CAF50;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #4CAF50;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<section class="nav-items" id="nav">
    <h1>WELCOME ADMIN</h1>
    <h3>Salary Management System</h3>
    <div class="items-container">
      <a class="navs" href="#sec-dept">Department List</a>
      <a class="navs" href="#sec-emp">Employee List</a>
      <a class="navs" href="#sec-grade">Grade List</a>
      <a class="navs" href="#sec-salary"> Salary  Details</a>
      <a class="navs" href="#sec-reciept">Report</a>
      <span class="bottom-slider"></span>
    </div>
  </section>
  <main class="content">
    <section class="bottom-slide" id="sec-dept">
      <span style="color: #4CAF50;font-size:35px;letter-spacing:2px;font-style:italic;font-weight:bold;margin-bottom:40px; ">Department List</span>
      <table>
    <tr>
    <th>Department Number</th>
    <th>Department Name</th>
    <th>Action</th>
    </tr>
      <?php
 $conn = mysqli_connect('127.0.0.1:3308', 'root', '', 'pay');
 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }
 $sql = "SELECT dno,dname FROM dept_details";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
 echo "<tr><td>" . $row["dno"]. "</td><td>" . $row["dname"] . "</td><td><a href=\"del_dept.php?dno=$row[dno]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> </td></tr>";
 }
 echo "</table>";
} else { ?>
   <span style="color:tomato;font-size:20px;font-weight: bold;" ><?php echo "0 results";  ?></span>
 <?php }
 $conn->close();
 ?>
 </table>
 <ul style="list-style-type:none;"  >
   <li>
   <a href="#nav"><button class="button" href="nav">TOP</button></a>
   <a href="department.php"><button class="button">add Department</button></a>
  </li>
 </ul>
    </section>
        <section class="bottom-slide" id="sec-emp">
          <span style="color: #4CAF50;font-size:35px;letter-spacing:2px;font-style:italic;font-weight:bold;margin-bottom:40px; ">Employee List</span>

    <?php
include('conctn.php');
$sql = "SELECT eid, fname,dno,doj,phno,email FROM emp_details";
$result = mysqli_query($conn, $sql);
$addc = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<table >
     <thead>
       <tr>
         <th>Name</th>
         <th>Department No</th>
         <th>Date of Joining</th>
         <th>Phone</th>
         <th>Email</th>
         <th>Action</th>
       </tr>
     </thead>
     <?php foreach($addc as $ind){ ?>
     <tbody>
       <tr>
         <td><?php echo htmlspecialchars($ind['fname']); ?></td>
         <td><?php echo htmlspecialchars($ind['dno']); ?></td>
         <td><?php echo htmlspecialchars($ind['doj']); ?></td>
         <td><?php echo htmlspecialchars($ind['phno']); ?></td>
         <td><?php echo htmlspecialchars($ind['email']); ?></td>
         <td> <a href="del_emp.php?eid=<?php echo $ind['eid']; ?>" style="text-decoration:none;color:tomato;">DELETE</a> </td>

        <!-- <td>  <form action="" method="POST">
           <input type="hidden" name="id_to_delete" value="<?php //echo $ind['eid']; ?>" id="hid">
           <input type="submit" name="delete" value="Delete" class="btn red z-depth-0">
         </form></td>
       </tr>-->

     </tbody>
       <?php } ?>
   </table>


  <ul style="list-style-type:none";>
    <li>
    <a href="#nav"><button class="button" href="nav">TOP</button></a>
    <a href="employee.php"><button class="button">add Employee</button></a>
   </li>
  </ul>
  <?php
include('conctn.php');
$quee = "CALL delemp()";
$ret = mysqli_query($conn, $quee);
$add = mysqli_fetch_all($ret, MYSQLI_ASSOC);
//int_r($add);
?>
<table >
  <h3 style="color:red;">Removed employees</h3>
   <thead>
     <tr>
       <th>Name</th>
       <th>Department No</th>
       <th>Date of Joining</th>
       <th>Phone</th>
       <th>Email</th>
       </tr>
   </thead>
   <?php foreach($add as $in){ ?>
   <tbody>
     <tr>
       <td><?php echo $in['fname']; ?></td>
       <td><?php echo $in['dno']; ?></td>
       <td><?php echo $in['doj']; ?></td>
       <td><?php echo $in['phno']; ?></td>
       <td><?php echo $in['email']; ?></td>


   </tbody>
     <?php } ?>
 </table>

    </section>
    <section class="bottom-slide" id="sec-grade">
      <span style="color: #4CAF50;font-size:35px;letter-spacing:2px;font-style:italic;font-weight:bold;margin-bottom:40px; ">Grade List</span>
      <table>
    <tr>
    <th>Grade Name</th>
    <th>Department Name</th>
    <th>Basic</th>
    <th>Provident Fund</th>
    <th>Provissional Tax</th>
    <th>Action</th>
    </tr>
      <?php
  $conn = mysqli_connect('127.0.0.1:3308', 'root', '', 'pay');
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT gid,gname,dno,basic,pf,ptax FROM grade_details";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row["gname"]. "</td><td>" . $row["dno"] . "</td><td>" . $row["basic"]. "</td><td>" . $row["pf"] . "</td><td>" . $row["ptax"] . "</td><td><a href=\"del_grade.php?gid=$row[gid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> </td></tr>";
  }
  echo "</table>";
  } else { echo "0 results"; }
  $conn->close();
  ?>
  </table>
  <ul style="list-style-type:none";>
    <li>
    <a href="#nav"><button class="button" href="nav">TOP</button></a>
    <a href="grade.php"><button class="button">add grade</button></a>
   </li>
  </ul>
    </section>
    <section class="bottom-slide" id="sec-salary">
      <span style="color: #4CAF50;font-size:35px;letter-spacing:2px;font-style:italic;font-weight:bold;margin-bottom:40px; ">Payroll</span>
      <table>
    <tr>
    <th>Transaction ID</th>
    <th>Employee ID</th>
    <th>Grade ID</th>
    <th>Action</th>
    </tr>
      <?php
 $conn = mysqli_connect('127.0.0.1:3308', 'root', '', 'pay');
 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }
 $sql = "SELECT tid,eid,gid FROM salary_details";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
 echo "<tr><td>" . $row["tid"]. "</td><td>" . $row["eid"] . "</td><td>" . $row["gid"] . "</td><td><a href=\"del_salary.php?tid=$row[tid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> </td></tr>";
 }
 echo "</table>";
} else { ?>
   <span style="color:tomato;font-size:20px;font-weight: bold;" ><?php echo "0 results";  ?></span>
 <?php }
 $conn->close();
 ?>
 </table>
 <ul style="list-style-type:none";>
   <li>
   <a href="#nav"><button class="button" href="nav">TOP</button></a>
   <a href="salary.php"><button class="button">add Payroll</button></a>
  </li>
 </ul>
    </section>
    <section class="bottom-slide" id="sec-reciept">
      <span style="color: #4CAF50;font-size:35px;letter-spacing:2px;font-style:italic;font-weight:bold;margin-bottom:40px; ">Reciept</span>
      <table>
    <tr>
      <th>Transaction ID</th>
    <th>Employee Name</th>
    <th>Department Name</th>
    <th>Grade ID</th>
    <th>salary/month</th>
    </tr>
      <?php
  $conn = mysqli_connect('127.0.0.1:3308', 'root', '', 'pay');
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
$sql ="SELECT  tid,fname,dname,d.gid,((basic+dear+travel+hra+medical+bonus)-(pf+ptax)) as gross FROM emp_details e,dept_details d,grade_details g ,salary_details s where e.dno=d.dno and d.gid=g.gid and e.eid=s.eid";

  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row["tid"]. "</td><td>" . $row["fname"]. "</td><td>" . $row["dname"] . "</td><td>" . $row["gid"]. "</td><td>" . $row["gross"] . "</td></tr>";
  }
  echo "</table>";
} else { ?>
   <span style="color:tomato;font-size:20px;font-weight: bold;" ><?php echo "0 results";  ?></span>
 <?php }
 $conn->close();
 ?>
  </table>
  <ul style="list-style-type:none";>
    <li>
    <a href="#nav"><button class="button" href="nav">Go Back</button></a>
   </li>
  </ul>
    </section>

  </main>
  <script src="js/.js"></script>
<script  src="function.js"></script>

</body>
</html>
