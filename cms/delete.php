<?PHP
	session_start();
	include("authen_admin.php");
	include("../inc/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$p_id	= $_GET['p_id'];

	$sql 	= "select * from product where p_id=$p_id";
	$query	= mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$row	= mysqli_fetch_array($query);
	// delete old image
	@unlink("../upload/{$row['p_img']}");

	$sql	= "delete from product where p_id=$p_id";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	exit("<script>window.location='product.php';</script>");
?>
</body>
</html>
