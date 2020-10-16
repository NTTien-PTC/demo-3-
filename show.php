
<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show</title>
</head>
<body>
	<?php include('connect.php') ?>
	<div>
		<form method="POST" enctype="multipart/form-data">
			<table cellpadding="5" class="table">
				<?php 
				
					 if($_SESSION['user'] == Null){
					  header("location: login.php");
					} else{
						$user = $_SESSION['user'];
						$sq = "select * from reg where ID = '$user'";	
						$thucthi_img = mysqli_query($conn,$sq);
						$num_img = mysqli_fetch_array($thucthi_img);
					 ?>
					 
					 <tr><td colspan="8" style="text-align: center;"><img class="" style="width: 100px; height: 100px; border-radius: 50%" src="img/<?php echo $num_img['avatar']; ?>"></td></tr>
					 <tr>
					 	<td colspan="8" style="text-align: center; color: red;"><?php  echo "Hello ".($_SESSION['user']); ?></td>
					 	</tr>			
					 	<tr><td colspan="8" style="text-align: center;"><a href="logout.php" onclick="if(confirm('Are u sure???')) return true; else return false;"> Logout</a></td></tr>	 
		
				<tr>
					<th>Họ Tên</h>
					<th>Giới tính</th>
					<th>Ngày sinh</th>
					<th>Email</th>
					<th>Nơi ở</th>
					<th >Avatar</th>
				</tr>
				<?php  $sql ="select * from reg";
					$thucthi = mysqli_query($conn,$sql);
					while ($num = mysqli_fetch_array($thucthi)){
				?>
				<tr>

					<td style="text-align: center;"><?php echo $num['name']; ?></td>
					<td style="text-align: center;"><?php echo $num['gender']; ?></td>	
					<td style="text-align: center;"><?php echo $num['date']; ?></td>
					<td style="text-align: center;"><?php echo $num['email']; ?></td>
					<td style="text-align: center;"><?php echo $num['address']; ?></td>
					<td style="text-align: center;"><img class="" style="width: 100px; height: 100px; border-radius: 50%" src="img/<?php echo $num['avatar']; ?>"></td>
					
					<td><a href='delete.php?DEL="<?php echo $num['ID']; ?>"' onclick="if(confirm('Are u sure???')) return true; else return false;"> Delete</a></td>
					
					<td><a href='edit.php?UPD=<?php echo $num['ID']; ?>'> Update </a></td>
				</tr>
				<?php
				
				 }}?>
			</table>

		</form>
	</div>
	<style>
		table{
			width: 60%;
			margin: 5% auto;
			border: solid 1px #009EFFFF;
		}
	</style>
</body>
</html>