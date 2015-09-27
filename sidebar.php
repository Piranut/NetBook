<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-products-->
            <div class="panel panel-default">
                <div class="panel-heading">
                <h4 class="panel-title"><a href="product.php">ALL PRODUCT</a></h4></div>
			<?PHP
            $sqlc   = "select * from category order by c_id asc";
            $queryc = mysqli_query($conn,$sqlc)or die ("error=$sqlc");
            $numc   = mysqli_num_rows($queryc);
            for($i=1;$i<=$numc;$i++)
            {
				$rowc = mysqli_fetch_array($queryc);
            ?>
                <div class="panel-heading"><h4 class="panel-title"><a href="product.php?c_id=<?PHP echo $rowc['c_id']?>"><?PHP echo $rowc['c_name']?></a></h4></div>
			<?PHP
            }
            ?>
        	</div>
        </div><!--/category-products-->

        <div class="price-range"><!--price-range-->
       <?php if(!isset($_SESSION['m_user'])){?>                     <!-- check if there is a variable $_SESSION-->
            <h2>Login</h2>
            <div  class="login-form">
                <form name="frmLogin" id="frmLogin" method="post" action="check.php">
                    <input type="text" placeholder="Name" name="user" />
                    <input type="password" placeholder="Password" name="pass" />
                    <h5 align="center"><a href="regisform.php">Register</a></h5>
                     <input type="submit" class="btn btn-default" value="LOGIN">
                </form>
            </div>
        <?php }else{?>
            <h2>Member</h2>
            <h4 align="center"><i class="fa fa-user"></i>&nbsp;<?php echo $_SESSION['m_user'] ?></h4><br />
            <div  class="login-form">
              <ul>
                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li><br />
                <li><a href="logout.php"><i class="fa fa-star"></i> Logout</a></li><br />
              </ul>
            </div>
         <?php } ?>
        </div><!--/price-range-->

        <div class="shipping text-center"><!--shipping-->
            <img src="images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->

    </div>
</div>