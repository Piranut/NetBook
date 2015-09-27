<?PHP
	session_start();
	include("authen_admin.php");
	include("../inc/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Orders | Admin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
</head>

<body>

<?php include("inc/header.php"); ?>

	<section id="cart_items">
		<div class="container">
            <div class="shopper-info">
                <h2 class="title text-center">Order</h2>
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td width="21%"><strong>Date</strong></td>
                                <td width="18%"><strong>Member</strong></td>
                                <td width="22%"><strong>Delivery</strong></td>
                                <td width="9%" align="center"><strong>View detail</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                		<?php
                            $sql = "select * from orders order by o_id desc";
                            $query  = mysqli_query($conn,$sql) or die (mysqli_error($conn).":$sql");    //  .":$sql"  output error and then $sql
                            $num    = mysqli_num_rows($query);

                            for($i=1;$i<=$num;$i++)
                            {
                                $row = mysqli_fetch_array($query);
                        ?>
                            <tr>
                                <td><?php echo date("j F Y H:i:s", strtotime($row['o_date']))?></td>      <!-- output date and change string 'o_date' to time -->
                                <td><?php echo $row['m_user']?></td>
                                <td><?php echo $row['o_name']?></td>
                                <td align="center"><a href="order_detail.php?o_id=<?php echo $row['o_id']?>" target="_blank"><img src="images/view.png"></a></td>
                            </tr>
                		<?php
                            }
                        ?>
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