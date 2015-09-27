<?php
      include("../inc/connect.php");
      $p_id  = $_GET['p_id'];

      $sql = "select * from product where p_id = $p_id ";
      $query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
      $row = mysqli_fetch_array($query);
      @unlink("../upload/".$row['p_img']);

      $sql = "delete from product where p_id = $p_id";              // delete from the product table
      mysqli_query($conn, $sql) or die (mysqli__error($conn));       // run sql command
      echo "<script>window.location='index.php';</script>";
 ?>