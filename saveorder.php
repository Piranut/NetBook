<?php
	session_start();
	include("inc/connect.php");
  include("auth_member.php");

  $m_user = $_SESSION['m_user'];
  $name =$_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  // save to orders
  $sql = "insert into orders values(null,'$m_user',now(),'$name', '$address','$phone')";        // null: no value    now(): current date and time
  mysqli_query($conn,$sql) or die (mysqli_error($conn));

  // Get last ID
  $o_id = mysqli_insert_id($conn);     // get the last id from the auto increment field

  // save to order_detail
  foreach ($_SESSION['cart'] as $p_id => $qty) {
    $sql = "select * from product where p_id = $p_id";
    $query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
    $row = mysqli_fetch_array($query);
    $price = $row['p_price'];

    $sqld = "insert into order_detail values(null, '$p_id', '$price','$qty', '$o_id')";
    mysqli_query($conn,$sqld) or die (mysqli_error($conn));
  }
  unset($_SESSION['cart']);
  echo "<script>window.location='thanks.php';</script>";
?>