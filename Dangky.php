<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Regester</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<h1 align="center"> Đăng ký </h1>
		<table border="0" width="600" style="margin: auto">
			<tr>
				<td colspan="2" style="background-color: pink">Thong tin dang nhap</td>
			</tr>
			<tr>
				<td><label>Chon ten dang nhap: </label></td>
				<td><input type="text" name="txtusername"></td>
			</tr>
			<tr>
				<td><label>Mat khau: </label></td>
				<td><input type="password" name="txtpassword"></td>
			</tr>
			<tr>
				<td><label>Nhap lai mat khau: </label></td>
				<td><input type="password" name="txtpassword2"></td>
			</tr>
			<tr>
				<td><label>Anh avatar neu co: </label></td>
				<td><input type="file" name="inpavatar"></td>
			</tr>
			<tr>
				<td colspan="2" style="background-color: pink">Thong tin ca nhan</td>
			</tr>
			<tr>
				<td><label>Ho va ten: </label></td>
				<td><input type="text" name="txthoten"></td>
			</tr>
			<tr>
				<td><label>Dia chi email: </label></td>
				<td><input type="text" name="txtemail"></td>
			</tr>
			<tr>
				<td><label>Gioi tinh: </label></td>
				<td><input type="radio" name="gioitinh" value="Nam" checked="checked">Nam
					<input type="radio" name="gioitinh" value="Nu">Nu</td>
			</tr>
			<tr>
				<td><label>Ngay sinh: </label></td>
				<td><input type="date" name="ngaysinh"></td>
			</tr>
			<tr>
				<td><label>Noi o: </label></td>
				<td><SELECT name="addr">
					<option value="Ha Noi">Ha Noi</option>
					<option value="HCM">HCM</option>
					<option value="Da Nang">Da Nang</option>
				</SELECT></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="ok" value="Đăng ký tham gia"></td>
			</tr>
		</table>
	</form>
	<?php
		if (isset($_POST['ok'])) {
			include('connect.php');
			$user=$_POST['txtusername'];
			$pasword=$_POST['txtpassword'];
			$pasword2=$_POST['txtpassword2'];
			//$avatar=$_FILES['inpavatar'];
			$name=$_POST['txthoten'];
			$email=$_POST['txtemail'];
			$gender=$_POST['gioitinh'];
			$dob=$_POST['ngaysinh'];
			$address=$_POST['addr'];
			$checkid="select * from reg where ID='$user'";
			$query_checkid=mysqli_query($conn,$checkid);

			if($gender=="Nam"){
				$gender="Nam";
			}else{
				$gender="Nu";
			}

			if($gender=="Nam"){
				$gender="Nam";
			}else{
				$gender="Nu";
			}

			if ($user==null || $pasword==null) {
				echo "<script> alert('Chưa nhập ID hoặc Password kìaaaa')</script>";
			}elseif ($pasword!=$pasword2) {
				echo "<script> alert('Mật khẩu không giống nhau kìaaaa')</script>";
			}elseif (mysqli_num_rows($query_checkid)>0) {
				echo "<script> alert('Trùng ID rồi bro!!')</script>";
			}
			elseif ($_FILES['inpavatar']['type']!='image/jpeg') {
				echo "<script> alert('Không đúng định dạng')</script>";
			}else{
				$a=$_FILES['inpavatar']['tmp_name'];
				$b=$_FILES['inpavatar']['name'];
				//$q=mysqli_query("insert into Reg(avatar) values('$b')");			
				$sql= "Insert into reg(ID, password, avatar, name, email, gender, date, address) values('$user','$pasword','$b','$name','$email','$gender','$dob','$address')";
				$query = mysqli_query($conn,$sql);
				$c=move_uploaded_file($a, 'img/'.$b);
				if ($query) {
					echo "<script> alert('Đăng ký thành côngggg')</script>";
					
				}header("location: login.php");
				}
			}
	?>
</body>
</html>
