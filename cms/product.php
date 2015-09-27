<?php
	session_start();
	include("authen_admin.php");
	include("../inc/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Product | Admin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
</head>

<body>

<?php include("inc/header.php"); ?>

	<section id="cart_items">
		<div class="container">
            <div class="shopper-info">
                <h2 class="title text-center">Product  </h2>
<table class="table table-condensed">
    <thead>
        <tr class="cart_menu">
            <td colspan="5"></td>
            <td align="center"><a href="add.php"><img src="images/add.png"></a></td>
        </tr>
        <tr class="cart_menu">
            <td width="21%"></td>
            <td width="21%"><strong>Name</strong></td>
            <td width="18%"><strong>Price</strong></td>
            <td width="22%"><strong>Category</strong></td>
            <td width="9%" align="center"><strong>Edit</strong></td>
            <td width="9%" align="center"><strong>Delete</strong></td>
        </tr>
    </thead>
    <tbody>
	<?php
        $sql    = "select * from product natural join category order by p_id desc";
        $query  = mysqli_query($conn,$sql)or die(mysqli_error($conn));
        $num    = mysqli_num_rows($query);

        // $var = condition ? T : F;
        $page = !empty($_GET['page'])?$_GET['page']:1;    // if page is sent, open the selected page, if not, open the first page
        $perpage = 3;                                     //  3 products per page
        $totalpage = ceil($num/$perpage);                 // ceil: round number up to whole number
        $startpoint = ($page-1)*$perpage;

        $sql    .= " limit $startpoint,$perpage";               // .= add this line to the previous $sql
        $query  = mysqli_query($conn,$sql)or die(mysqli_error($conn));
        $num    = mysqli_num_rows($query);

        for($i=1;$i<=$num;$i++)
        {
            $row	= mysqli_fetch_array($query);
    ?>
        <tr>
            <td><?php
            $filepath = "../upload/".$row['p_img'];
            if(is_file($filepath))
            {
            ?>
            <img src="<?php echo $filepath?>" width="80" />
            <?php
            }
            ?></td>
            <td><?php echo $row['p_name']?></td>
            <td><?php echo $row['p_price']?></td>
            <td><?php echo $row['c_name']?></td>
            <td align="center"><a href="edit.php?p_id=<?php echo $row['p_id']?>"><img src="images/edit.png"></a></td>
            <td align="center"><a href="delete.php?p_id=<?php echo $row['p_id']?>" onClick="return confirm('Are you sure?');"><img src="images/delete.png"></a></td>
        </tr>
	<?php
        }
    ?>
         <tr>
            <td colspan="6" align="center">
                <?php
                    if ($totalpage > 1) {
                 ?>
                <div class="pagination-area">
                    <ul class="pagination">
                        <?php
                            if($page > 1){                  // if current page is more than one
                         ?>
                        <li><a href="?page=<?php echo $page-1?>"> << </a></li>
                        <?php
                            }
                         ?>
                        <?php
                            for ($i=1; $i <= $totalpage; $i++) {
                         ?>
                        <li><a href="?page=<?php echo $i ?>"
                            <?php if($i == $page) {echo "class = 'active'";}?>><?php echo $i ?></a></li>    <!-- click the link and send the page number -->
                        <?php
                            }
                         ?>
                         <?php
                                if($page < $totalpage){
                          ?>
                        <li><a href="?page=<?php echo $page+1?>"> >> </a></li>
                        <?php
                            }
                         ?>
                    </ul>
                </div>
                <?php
                    }
                 ?>
            </td>
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