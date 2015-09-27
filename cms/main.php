<?PHP
	session_start();
	include("authen_admin.php");
	include("../inc/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">

</head>

<body>

<?php include("inc/header.php");?>

	<section id="cart_items">
		<div class="container">
            <div class="shopper-info">
                <div class="contact-form">
                    <h2 class="title text-center">Admin</h2>

                </div>
           	</div>
		</div>
	</section> <!--/#cart_items-->

    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>