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
<?php include("header.php");?>
<section>
  <div class="container">
    <div class="row">

	    <?php include("sidebar.php"); ?>

      <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
          <h2 class="title text-center">Featured Items</h2>
            <!--Content here-->
            &nbsp;
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