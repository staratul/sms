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

?>


<div class="admintitle" align="center" style="background: brown;height: 150px;line-height: 150px;color: white">
	<p style="float: right; margin-right: 50px;font-size: 30px;"><a href="logout.php" style="color: white;">Logout</a></p>
	<h1>Welcome to Aadmin Dashboard</h1>
	
</div>

<div class="dashboard">
	<table border="1" width="40%" align="center">
		<tr>
			<td>1.</td>
			<td><a href="addstudent.php">Insert Student Details</a></td>
		</tr>
		<tr>
			<td>2.</td>
			<td><a href="updatestudent.php">Update Student Details</a></td>
		</tr>
		<tr>
			<td>3.</td>
			<td><a href="deletestudent.php">Delete Student Details</a></td>
		</tr>
	</table>
</div>



</body>
</html>


