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


<form action="deletestudent.php" method="post">
	<table border="1" align="center">
		<tr>
			<td>Enter Student Standard</td>
			<td><input type="number" name="standard" placeholder="Enter Standard" required></td>
		</tr>
		<tr>
			<td>Enter Student Name</td>
			<td><input type="text" name="stuname" placeholder="Enter Name" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Search"></td>
		</tr>
	</table>	
</form>


<table align="center" width="80%" border="1" style="margin-top: 20px;">
	<tr>
		<th>No</th>
		<th>Image</th>
		<th>Name</th>
		<th>Rollno</th>
		<th>Edit</th>
	</tr>


<?php
	include '../dbcon.php';
	if(isset($_POST['submit']))
	{
		$standard = $_POST['standard'];
		$name = $_POST['stuname'];
		$qry = "SELECT * FROM student WHERE standard='$standard' AND name LIKE '%$name%' ";
		$run = mysqli_query($con, $qry);
		if(mysqli_num_rows($run)<1)
		{
			echo "<tr><td colspan='5'>No Record Found</td></tr>";
		}
		else
		{
			$count = 0;
			while($data = mysqli_fetch_assoc($run))
			{
				$count++;
				?>
					<tr>
						<td><?php echo $count; ?></td>
						<td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width: 100px"></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['rollno']; ?></td>
						<td><a href="deleteform.php?sid=<?php echo $data['id']; ?>">Delete</a></td>
					</tr>

				<?php
			}
		}
	}


?>



</table>

