<?php

session_start();
if(isset($_SESSION['uid']))
{
	header('location:admin/admindash.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
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
<h1 align="center">Admin login</h1>
<form action="login.php" method="post">
<table border="1" align="center">
	<tr>
		<td align="center">User Name</td>
		<td><input type="text" name="uname" required></td>
	</tr>
	<tr>
		<td align="center">Password</td>
		<td><input type="password" name="pass" required></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" name="login" value="Login" required></td>
	</tr>
</table>
</form>
</body>
</html>

<?php

include 'dbcon.php';
if (isset($_POST['login']))
{
	$username = $_POST['uname'];
	$password = $_POST['pass'];

	$qry = "select * from admin where username='$username' and password='$password'";
	$result = mysqli_query($con, $qry); 
	$row = mysqli_num_rows($result);
	if($row < 1)
	{
		?>
		<script type="text/javascript">
			alert('Invalid username or password');
			window.open('login.php','_self');
		</script>
		<?php
	}
	else
	{
		$data = mysqli_fetch_assoc($result);
		$id = $data['id'];
		echo "id = ".$id;

		//session_start();
		$_SESSION['uid'] = $id;
		header('location:admin/admindash.php');
	}
}

?>











