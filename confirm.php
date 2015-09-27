<?php
	session_start();
	include("inc/connect.php");
  include("auth_member.php");
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
          <script type="text/javascript">                 // check if everything has been input
              function chk() {
               if (document.frm.name.value=='') {         // frm = name of form
                alert('Please input name');
                document.frm.name.focus();                // move cursor to name
                return false;
              }
               if (document.frm.address.value=='') {
                alert('Please input address');
                document.frm.address.focus();
                return false;
              }
               if (document.frm.phone.value=='') {
                alert('Please input phone');
                document.frm.phone.focus();
                return false;
              }
            }
          </script>
</head>

<body>

<?php include("header.php");?>

<section>
  <div class="container">
    <div class="row">

	  <?php include("sidebar.php");?>

      <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
          <h2 class="title text-center">CONFIRM ORDER</h2>
            <!--Content here-->
            <table width= '100%' border='0' cellspacing = '2'>
                         <tr bgcolor= '#F0F0F0'>
                          <td>Product</td>
                          <td align ="right">Price</td>
                          <td align ="right">Quantity</td>
                          <td align ="right">Total</td>
                        </tr>
                        <?php
                        foreach ($_SESSION['cart'] as $p_id => $qty) {              // loop the products in the cart  as key of array corresponds to value of key

                          $sql = "select * from product where p_id = $p_id";
                          $query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                          $row = mysqli_fetch_array($query);
                          $sum = ($row['p_price'] * $qty);
                          $total += $sum;
                        ?>
                         <tr>
                              <td><?php echo $row['p_name']?></td>
                              <td align ="right"><?php echo $row['p_price'] ?></td>
                              <td align ="right"><?php echo $qty ?></td>
                              <td align ="right"><?php echo $sum ?></td>
                        </tr>
                        <?php
                      }
                         ?>
                         <tr>
                              <td colspan ='3'>TOTAL</td>
                              <td align ="right"><?php echo $total ?></td>
                              <td></td>
                        </tr>

                       </table>
                       <br>
                       <br>
                       <form name ="frm" method ="post" action ="saveorder.php" onSubmit="return chk();">      <!-- send input via POST to saveorder.php -->
                         <table width="100%" border ="0" cellspacing="2">
                           <tr bgcolor="#F0F0F0">
                              <th colspan ="2" scope="row"> Order Detail</th>
                           </tr>
                           <tr>
                              <th scope="row">Name:</th>
                              <td width="77%"><input type="text" name ="name" id="name" style="width:80%"></td>
                           </tr>
                           <tr>
                              <th scope="row">Address:</th>
                              <td><textarea name="address" id ="address"></textarea></td>
                           </tr>
                           <tr>
                              <th scope="row">Phone Number:</th>
                              <td><input type ="text" name ="phone" id ="phone" style ="width:80%"></td>
                           </tr>
                           <tr>
                              <td><input type="submit" name="button" id="button" value="submit"></td>
                           </tr>

                         </table>
                       </form>
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