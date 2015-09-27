<?php
	session_start();
	include("inc/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
</head>
<body>
<?php include("header.php"); ?>

<section>
  <div class="container">
    <div class="row">

	  <?php include("sidebar.php"); ?>

      <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
          <h2 class="title text-center">Featured Items</h2>
            <!--Content here-->
                          <?php
                              $str = "where 1=1 ";                            //    to link the criteria together using and ...
                              $str .= !empty($_GET['c_id'])?" and c_id={$_GET['c_id']}":"";         //   .= connects " and c_id={$_GET['c_id']}" to $str and save it to $str
                              $str .= !empty($_GET['k'])?" and p_name like '%{$_GET['k']}%'":"";

                              $sql = "select * from product NATURAL join category $str order by p_id desc";
                              $query = mysqli_query($conn,$sql) or die ("error=$sql");
                              $num = mysqli_num_rows($query);
                          ?>
                          <table width="600" border="0" cellspacing="1" align='center'>
                            <tr bgcolor="#E8E8E8">
                              <td align="center">Image</td>
                              <td align="center">Name</td>
                              <td align="center">Price</td>
                              <td align="center">Category</td>
                              <td align="center">Detail</td>
                            </tr>
                            <?php
                            for($i=1;$i<=$num;$i++){
                              $row = mysqli_fetch_array($query);
                              ?>
                              <tr>
                                      <td>
                                        <?php
                                        $filepath = "upload/".$row['p_img'];
                                            if (is_file($filepath)) {             // if file is in file path
                                             ?>
                                             <img src = "<?php echo $filepath ?>" width ="80" >      <!-- output image -->
                                         <?php
                                         }
                                         ?>
                                     </td>
                                     <td align="center"><?php echo $row['p_name'] ?>&nbsp;</td>
                                     <td align="center"><?php echo $row['p_price'] ?>&nbsp;</td>
                                     <td align="center"><?php echo $row['c_name'] ?>&nbsp;</td>
                                     <td align ='center'><a href="product_detail.php?p_id=<?php echo $row['p_id'] ?>">view</a></td>  <!-- send id to edit.php via GET -->
                               </tr>
                                   <?php
                                 }
                                 ?>
                           </table>
        </div><!--features_items-->
      </div>
    </div>
  </div>
</section>
<?php include("footer.php"); ?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>