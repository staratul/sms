<!DOCTYPE html>
<html>
<head>
	<title>Student Management system</title>
	<style type="text/css">
	td{
		padding: 15px;
	}
	input[type=submit]{
		width: 150px;
		height: 35px;
	}
</style>
</head>
<body>
<h3 align="right" style="margin-right: 30px"><a href="login.php">Admin Login</a></h3>
<h1 align="center">Welcome to student management system</h1>

<form action="index.php" method="post">
<table style="width: 40%;" align="center" border="1">
	<tr>
		<td colspan="2" align="center"><h2>Student Information</h2></td>
	</tr>
	<tr>
		<td align="left">Choose Standard</td>
		<td>
			<select name="std" required>
				<option value="1">1st</option>
				<option value="2">2nd</option>
				<option value="3">3rd</option>
				<option value="4">4th</option>
				<option value="5">5th</option>
				<option value="6">6th</option>
				<option value="7">7th</option>
				<option value="8">8th</option>
			</select>
		</td>
	</tr>
	<tr>
		<td align="left">Enter Roll No</td>
		<td><input type="text" name="rollno" required></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input type="submit" name="submit" value="Show Info">
		</td>
	</tr>
</table>
</form>
</body>
</html>


<?php

if (isset($_POST['submit']))
{
	$rollno = $_POST['rollno'];
	$standard = $_POST['std'];
	include 'dbcon.php';
	include 'showdetails.php';
	showDetails($rollno, $standard);
}

?>
