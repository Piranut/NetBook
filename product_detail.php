<?php
	session_start();
	include("inc/connect.php");

      $p_id  = $_GET['p_id'];
      $sql = "select * from product natural join category where p_id = $p_id";
      $query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
      $row = mysqli_fetch_array($query);
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
<?php include("header.php");?>

<section>
  <div class="container">
    <div class="row">

	  <?php include("sidebar.php");?>

    <div class="col-sm-9 padding-right">
      <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Product Detail</h2>
        <!--Content here-->
        <table width='100%' border = '0' cellspacing ='2'>
          <tr>
            <td width ='15%'> <strong>Product Name:</strong></td>
            <td width='55%'><?php echo $row['p_name'] ?></td>
            <td width='30%' rowspan='5'>
              <?php
              $filepath = "upload/".$row['p_img'];
                            if (is_file($filepath)) {                                           // if file is in file path
                             ?>
                             <img src = "<?php echo $filepath?>" width='80%' >               <!-- output image 80% of 30% of table width-->
                             <?php
                           }
                           ?>
                         </td>
                       </tr>
            <tr>
                <td><strong>Product Detail:</strong></td>
                <td><?php echo nl2br($row['p_detail']); ?></td>           <!-- output detail   function nl2br (nl => <br>) will show <br> in front end when made in backend-->
            </tr>
            <tr>
                <td><strong>Price:</strong></td>
                <td><?php echo $row['p_price'] ?></td>        <!-- output price -->
             </tr>
            <tr>
                <td><strong>Product Category:</strong></td>
                <td><?php echo $row['c_name'] ?></td>       <!-- output category -->
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
                <td><a href="javascript:history.back();">Back</a></td>        <!-- back to previous page -->
                <td>&nbsp;</td>
                <td align ='right'><a href="cart.php?p_id=<?php echo $p_id ?>&act=add">Add to cart</a></td>            <!-- link to and send p_id to cart.php -->
            </tr>
          </table>
        </div><!--features_items-->
      </div>
    </div>
  </div>
</section>
<?php include("footer.php");?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>