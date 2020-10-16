<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<form method="POST">
		<div class="box" style="width: 50%; margin: auto;">
		<table border="0" style="width: 50%; margin: 25%; border-color: blue;">
			<tr>
				<td>Account:</td>
				<td><input type="text" name="txtuser" placeholder="id.."></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="txtpsd" placeholder="password.."></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="ok" value="Login">
												<input type="reset" name="reset" value="Reset">
												<input type="submit" name="dangky" value="Signup">
				</td>
			</tr>
		</table>
		</div>
		<?php
			if (isset($_POST['dangky'])) {
				header("location: Dangky.php");
			}
			if (isset($_POST['ok'])) {
				include('connect.php');
				$user=$_POST['txtuser'];
				$pw=$_POST['txtpsd'];

				if ($user==null || $pw==null) {
					echo "<script> alert('Nhập cho đúng vào!!!')</script>";
				}
				else{
					$sql = "select ID, password from reg where ID='$user' and password='$pw'";
					$query = mysqli_query($conn,$sql);
					$rows = mysqli_num_rows($query);
					if ($rows==1) {
						$_SESSION['user']=$user;
						$_SESSION['password']=$pw;
						echo "<script> alert('Access Granted!')</script>";
						header("location: show.php");
					}
					else{
						echo "<script> alert('Access Denied!')</script>";
					}
				}
			}
			if (isset($_POST['ok'])) {
				$user=$_POST['txtuser'];
				$pw=$_POST['txtpsd'];
				$user=null;
				$pw=null;
			}
		?>
	</form>
</body>
</html>