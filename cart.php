<?php
	session_start();
	include("inc/connect.php");
        $act = @$_GET['act'];
        if ($act == 'add') {
                  if (isset($_SESSION['cart'][$_GET['p_id']])) {        // if there is p_id in the cart
                    $_SESSION['cart'][$_GET['p_id']]++;                 //  add 1 more to the cart
                  } else {
                  $_SESSION['cart'][$_GET['p_id']] = 1;                 // ($_SESSION is created) to add product into cart
                  }
        }
        if ($act == 'remove') {
          unset($_SESSION['cart'][$_GET['p_id']]);            // unset --> clear session,   remove from cart
        }
        if ($act == 'update') {
          foreach ($_POST['qty'] as $p=>$q) {                 // foreach loops through the array $p as key and $q as value
            $_SESSION['cart'][$p] = $q;
          }
        }
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
                    <h2 class="title text-center">CART</h2>
                      <!--Content here-->
                      <?php
                      /*
                      print_r($_POST['qty']);
                      print_r($_SESSION['cart']);
                      */

                        if (isset($_SESSION['cart']) && sizeof($_SESSION['cart']) > 0 ){            // isset checks if there is a variable p_id in the cart and number of variables is > 0
                                       ?>
                                       <form name ='form1' method ='post' action='?act=update'>      <!-- action update will go into $act == update -->
                                       <table width= '100%' border='0' cellspacing = '2'>
                                         <tr bgcolor= '#F0F0F0'>
                                          <td>Product</td>
                                          <td>Price</td>
                                          <td>Quantity</td>
                                          <td>Total</td>
                                          <td>Remove</td>
                                        </tr>
                                        <?php
                                        foreach ($_SESSION['cart'] as $p_id => $qty) {              // loop through the products in the cart  as key of array corresponds to value of key

                                          $sql = "select * from product where p_id = $p_id";
                                          $query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                                          $row = mysqli_fetch_array($query);
                                          $sum = ($row['p_price'] * $qty);
                                          $total += $sum;
                                        ?>
                                         <tr>
                                              <td><?php echo $row['p_name']?></td>
                                              <td><?php echo $row['p_price'] ?></td>
                                              <td>
                                                <input type= "number" name="qty[<?php echo $p_id ?>]" value = "<?php echo $qty ?>" style ="width:60px">
                                              </td>
                                              <td><?php echo $sum ?></td>
                                              <td><a href="?act=remove&p_id=<?php echo $p_id ?>">remove</a></td>
                                        </tr>
                                        <?php
                                      }
                                         ?>
                                         <tr>
                                              <td colspan ='3'>TOTAL</td>
                                              <td><?php echo $total ?></td>
                                              <td></td>
                                        </tr>
                                         <tr>
                                          <td colspan ='5' align = "center">
                                            <input type ='submit' name='button' id='button' value ='update'>
                                            <?php
                                            if (isset($_SESSION['m_user'])) {         // if the user is logged in
                                              ?>
                                              <input type ='button' name='button2' id='button2' value='confirm' onclick='window.location="confirm.php";'>    <!-- go to confirm.php when clicked -->
                                              <?php
                                            }
                                            ?>
                                          </td>
                                        </tr>
                                       </table>
                                     </form>
                                     <?php
                                }
                              else
                            {
                              echo "<div class='text-danger' align ='center'> CART IS EMPTY </div>";
                            }
                      ?>
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