<?PHP
	session_start();
	include("authen_admin.php");
	include("../inc/connect.php");
	if(empty($_GET['o_id']))
	{ exit("<script>window.location='order.php';</script>"); }

    $o_id = $_GET['o_id'];
    $sql = "select * from orders NATURAL join member where o_id = $o_id";
    $query  = mysqli_query($conn,$sql) or die (mysqli_error($conn).":$sql");
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Order Detail | Admin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
</head>

<body>

<?php include("inc/header.php"); ?>

<section id="cart_items">
  <div class="container">
    <h2 class="title text-center">Order detail</h2>
    <div class="table-responsive cart_info">
        <h4 align="center">Order ID : 1</h4>
        <table class="table table-condensed">
            <tbody>
                <tr>
                    <td align="right"><strong>วันที่สั่งซื้อ :</strong></td>
                    <td><?php echo $row['o_date'] ?></td>
                </tr>
                <tr>
                    <td align="right"><strong>ชื่อผู้สั่ง :</strong></td>
                    <td><?php echo $row['o_name']; ?></td>
                </tr>
                <tr>
                    <td align="right"><strong>อีเมล์ :</strong></td>
                    <td><?php echo $row['m_email'];?></td>
                </tr>
                <tr>
                    <td width="19%" align="right"><strong>เบอร์ติดต่อ :</strong></td>
                    <td width="81%"><?php echo $row['m_phone'];?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><strong>ข้อมูลการจัดส่ง</strong></td>
                </tr>
                <tr>
                    <td align="right"><strong>ชื่อผู้รับ :</strong></td>
                    <td>Thisan&nbsp;</td>
                </tr>
                <tr>
                    <td align="right"><strong>ที่อยู่ :</strong></td>
                    <td><?php echo $row['o_address']; ?></td>
                </tr>
                <tr>
                    <td align="right"><strong>เบอร์ติดต่อ :</strong></td>
                    <td><?php echo $row['m_phone'] ;?></td>
                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>


                    </tbody>
                </table>
                <br>
                <br>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td width="47%"></td>
                            <td width="8%" align="right">Price</td>
                            <td width="21%" align="right">Quantity</td>
                            <td width="24%" align="right">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sqld = "select *, (price*qty) AS sum from order_detail AS o INNER JOIN product AS p ON o.p_id = p.p_id where o_id = $o_id";    //
                            $queryd = mysqli_query($conn, $sqld)or die (mysqli_error($conn));
                            $numd = mysqli_num_rows($queryd);

                            for ($i=1; $i < $numd; $i++) {
                                $rowd = mysqli_fetch_array($queryd);
                                @$total += $rowd['sum'];
                         ?>
						<tr>
						    <td><?php echo $rowd['p_name'] ?></td>
						    <td align="right"><?php echo $rowd['price'] ?></td>
						    <td align="right"><?php echo $rowd['qty'] ?></td>
						    <td align="right"><?php echo $rowd['sum'] ?></td>
					    </tr>
                        <?php
                            }
                         ?>
						<tr>
                            <td colspan="3"><strong>TOTAL</strong></td>
                            <td align="right">1700</td>
                        </tr>
                    </tbody>
                </table>
            </div>
		</div>
	</section> <!--/#cart_items-->

    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>