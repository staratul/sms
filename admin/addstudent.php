<?php

session_start();

if(isset($_SESSION['uid']))
{
	//echo $_SESSION['uid'];
}
else
{
	header('location:../login.php');
}

?>


<?php

include 'header.php';
include 'titlehead.php';

?>



<form action="addstudent.php" method="post" enctype="multipart/form-data">
	<table border="1" align="center">
		<tr>
			<td>Roll No</td>
			<td><input type="text" name="rollno" placeholder="Enter Rollno" required></td>
		</tr>
		<tr>
			<td>Full Name</td>
			<td><input type="text" name="name" placeholder="Enter Name" required></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city" placeholder="Enter City" required></td>
		</tr>
		<tr>
			<td>Parents Contact No</td>
			<td><input type="text" name="pcon" placeholder="Enter Parents Contact" required></td>
		</tr>
		<tr>
			<td>Standard</td>
			<td><input type="number" name="std" placeholder="Enter Standard" required></td>
		</tr>
		<tr>
			<td>Upload Image</td>
			<td><input type="file" name="simg" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>
</body>
</html>

<?php



if(isset($_POST['submit']))
{
	include('../dbcon.php');
	$rollno = $_POST['rollno'];
	$name = $_POST['name'];
	$city = $_POST['city'];
	$pcon = $_POST['pcon'];
	$std = $_POST['std'];
	$imagename = $_FILES['simg']['name'];
	$tempname = $_FILES['simg']['tmp_name'];

	move_uploaded_file($tempname,"../dataimg/$imagename");

	$qry = "INSERT INTO STUDENT (rollno, name, city, pcont, standard, image) VALUES 
			('$rollno', '$name', '$city', '$pcon', '$std', '$imagename') ";

	$run = mysqli_query($con, $qry);
	if($run == true)
	{
		?>
			<script type="text/javascript">
				alert('Data Inserted Successfully.')
			</script>
		<?php
	}
	else
	{
		?>
			<script type="text/javascript">
				alert('Data Not Inserted.')
			</script>
		<?php	
	}
}
?>

