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
include '../dbcon.php';

$sid = $_GET['sid'];

$sql = "SELECT * FROM student WHERE id='$sid'";
$run = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($run);
?>




<form action="updatedata.php" method="post" enctype="multipart/form-data">
	<table border="1" align="center">
		<tr>
			<td>Roll No</td>
			<td><input type="text" name="rollno" value="<?php echo $data['rollno']; ?>" required></td>
		</tr>
		<tr>
			<td>Full Name</td>
			<td><input type="text" name="name" value="<?php echo $data['name']; ?>" required></td>
		</tr>
		<tr>
			<td>City</td>
			<td><input type="text" name="city" value="<?php echo $data['city']; ?>" required></td>
		</tr>
		<tr>
			<td>Parents Contact No</td>
			<td><input type="text" name="pcon" value="<?php echo $data['pcont']; ?>" required></td>
		</tr>
		<tr>
			<td>Standard</td>
			<td><input type="number" name="std" value="<?php echo $data['standard']; ?>" required></td>
		</tr>
		<tr>
			<td>Upload Image</td>
			<td><input type="file" name="simg" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
				<input type="submit" name="submit" value="Submit">
			</td>
		</tr>
	</table>
</form>
</body>
</html>