<header id="header"><!--header-->
  <div class="header-middle"><!--header-middle-->
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="logo pull-left">
           <a href="product.php"><img src="images/home/logo.png" alt="" /></a>
          </div>
        </div>
        <div class="col-sm-8">
        <div class="shop-menu pull-right">
            <ul class="nav navbar-nav">
                <?php if(isset($_SESSION['m_user'])){?>
                <li><a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['m_user'] ?></a></li>
                <li><a href="logout.php"><i class="fa fa-crosshairs"></i> Logout</a></li>
                <?php }else{?>
                <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                <?php } ?>
                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
            </ul>
        </div>
       </div>
      </div>
     </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
     <div class="container">
      <div class="row">
        <div class="col-sm-9">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="search_box pull-right">         <!-- search box -->
        <form name="frmSearch" method="get" action="product.php">     <!-- send input via GET to product.php -->
            <input type="text" name="k" placeholder="Search" value="<?php echo @$_GET['k']?>">
        </form>
        </div>
       </div>
      </div>
     </div>
    </div><!--/header-bottom-->
</header><!--/header-->