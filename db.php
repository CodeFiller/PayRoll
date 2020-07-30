<?php
	
$user= 'root';
$pass= '';
$db= 'payroll';
	$db=new mysqli('localhost', $user, $pass, $db) or die("unable to connect");

	if (!$db)
	{
		die("Database Connection Failed" . mysql_error());
	}

?>	