<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Delete</title>
</head>
<body>
	<?php
					$ID = $_GET['DEL'];
					require_once('connect.php');
					$sql_del="DELETE from reg where ID = $ID";
					$query_del=mysqli_query($conn,$sql_del);
					header('location: show.php');
	?>
</body>
</html>