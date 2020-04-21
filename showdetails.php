<?php
	
	function showDetails($rollno, $standard)
	{
		include 'dbcon.php';

		$sql = "SELECT * FROM `student` WHERE `rollno`='$rollno' AND `standard`='$standard'";
		$run = mysqli_query($con, $sql);
		if(mysqli_num_rows($run)>0)
		{
			$data = mysqli_fetch_assoc($run);
			?>
				<table border="1" align="center" width="50%" style="margin-top: 50px;">
					<tr>
						<th colspan="3" style="font-size: 30px">Student Details</th>
					</tr>
					<tr>
						<td colspan="5" align="center"><img src="dataimg/<?php echo $data['image']; ?>" 
							style="max-height: 150px;max-width: 120px;"></td>
					</tr>
					<tr>
						<th>Roll No</th>
						<td><?php echo $data['rollno']; ?></td>
					</tr>
					<tr>
						<th>Name</th>
						<td><?php echo $data['name']; ?></td>
					</tr>
					<tr>
						<th>Standard</th>
						<td><?php echo $data['standard']; ?></td>
					</tr>
					<tr>
						<th>Parents Contact No</th>
						<td><?php echo $data['pcont']; ?></td>
					</tr>
					<tr>
						<th>City</th>
						<td><?php echo $data['city']; ?></td>
					</tr>
				</table>
			<?php
		}
		else
		{
			echo "<script>alert('Record Not Found.');</script>";
		}
	}
?>