<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Info</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<h1 align="center"> UPDATE </h1>
		<?php
			include('connect.php');
			$ID = $_GET['UPD'];
			$query="select * from reg where ID = '$ID'";
			$exc = mysqli_query($conn,$query);
			$num=mysqli_fetch_array($exc); 
			if($ID == null) header("location:login.php");
			?>
		<table border="0" width="600" style="margin: auto">
			<tr>
				<td colspan="2" style="background-color: pink">Thong tin dang nhap</td>
			</tr>
			<tr>
				<td><label>Ho ten: </label></td>
				<td><input type="text" name="txthoten" value="<?php echo $num['name']; ?>"></td>
			</tr>
			<tr>
				<td><label>Mat khau: </label></td>
				<td><input type="text" name="txtpassword" value="<?php echo $num['password']; ?>"></td>
			</tr>
			<tr>
				<td><label>Nhap lai mat khau: </label></td>
				<td><input type="text" name="txtpassword2" value="<?php echo $num['password']; ?>"></td>
			</tr>
			<tr>
				<td><label>Anh avatar: </label></td>
				<td><img width="200px" height="200px" src="img/<?php echo $num['avatar']; ?>"><br> 
				<input type="file" name="ava">
				</td>
			</tr>
			<tr>
				<td colspan="2" style="background-color: pink">Thong tin ca nhan</td>
			</tr>
			<tr>
				<td><label>Dia chi email: </label></td>
				<td><input type="text" name="txtemail" value="<?php echo $num['email']; ?>"></td>
			</tr>
			<tr>
				<td><label>Gioi tinh: </label></td>
				<td><input type="radio" name="gioitinh" value="Nam"
					<?php if ($num['gender']=='Nam') echo "checked"; ?>
					>Nam
					<input type="radio" name="gioitinh" value="Nu"
					<?php if ($num['gender']=='Nu') echo "checked"; ?>
					>Nu</td>
			</tr>
			<tr>
				<td><label>Ngay sinh: </label></td>
				<td><input type="date" name="ngaysinh" value="<?php echo $num['date']; ?>"></td>
			</tr>
			<tr>
				<td><label>Noi o: </label></td>
				<td><SELECT name="addr">
					<option value="Ha Noi" <?php if ($num['address']=='Ha Noi') echo "selected"; ?>>Ha Noi</option>
					<option value="HCM" <?php if ($num['address']=='HCM') echo "selected"; ?>>HCM</option>
					<option value="Da Nang" <?php if ($num['address']=='Da Nang') echo "selected"; ?>>Da Nang</option>
				</SELECT></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="ok" value="Update"></td>
			</tr>
		</table>
		<?php 
			if (isset($_POST['ok'])) {
			include('connect.php');
			//$name=$_POST['txtusername'];
			$pasword=$_POST['txtpassword'];
			$pasword2=$_POST['txtpassword2'];
			//$avatar=$_FILES['inpavatar'];
			$name=$_POST['txthoten'];
			$email=$_POST['txtemail'];
			$gender=$_POST['gioitinh'];
			$dob=$_POST['ngaysinh'];
			$address=$_POST['addr'];
			//$checkid="select * from reg where ID='$user'";
			//$query_checkid=mysqli_query($conn,$checkid);

			if($gender=="Nam"){
				$gender="Nam";
			}else{
				$gender="Nu";
			}

			if ($pasword==null) {
				echo "<script> alert('Chưa nhập Password kìaaaa')</script>";
			}elseif ($pasword!=$pasword2) {
				echo "<script> alert('Mật khẩu không giống nhau kìaaaa')</script>";
			// }elseif (mysqli_num_rows($query_checkid)>0) {
			// 	echo "<script> alert('Trùng ID rồi bro!!')</script>";
			}
			elseif ($_FILES['ava']['type']==null) {
				echo "<script> alert('Không đúng định dạng')</script>";
			}else{
				$a=$_FILES['ava']['tmp_name'];
				$b=$_FILES['ava']['name'];
				//$q=mysqli_query("insert into Reg(avatar) values('$b')");			
				//$sql= "Insert into reg(ID, password, avatar, name, email, gender, date, address) values('$user','$pasword','$b','$name','$email','$gender','$dob','$address')";
				$sql= "UPDATE reg SET password = '$pasword', avatar = '$b', name = '$name', email = '$email', gender = '$gender', date = '$dob', address = '$address' WHERE ID = '$ID'";
				$query = mysqli_query($conn,$sql);
				$c=move_uploaded_file($a, 'img/'.$b);
				if ($query) {
					echo "<script> alert('Update thành côngggg')</script>";
					}
				}
			}

		 ?>
	</form>
</body>
</html>