<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
   include("../inc/connect.php");
   $user  = $_POST['user'];
   $pass  = md5($_POST['pass']);
   
   $sql   = "select * from admin
             where a_user='$user' and a_pass='$pass'";
   $query = mysqli_query($conn,$sql)or die(mysqli_error($conn));
   $num   = mysqli_num_rows($query);
   if($num==0)
   {
	   exit("<script>alert('LOGIN FAIL');history.back();</script>");
   }else
   {
	   $_SESSION['a_user']=$user;
	   exit("<script>alert('Welcome');window.location='main.php';</script>");
   }
 ?>
</body>
</html>