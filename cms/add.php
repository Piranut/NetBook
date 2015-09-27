<?PHP
	session_start();
	include("authen_admin.php");
	include("../inc/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Product | Admin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">

</head>

<body>

<?php include("inc/header.php")?>	
    
	<section id="cart_items">
		<div class="container">
            <div class="shopper-info">
                <h2 class="title text-center">Product&nbsp;&nbsp; [Add] </h2>
<form action="addsave.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table width="60%" align="center" cellspacing="5" class="login-form">
        <tbody>
            <tr>
                <td width="74" align="right" valign="middle" scope="row"><strong>name :</strong></td>
                <td width="75%"><input name="name" type="text" class="form-control" id="name" style="width:97%" required ></td>
            </tr>
            <tr>
                <td align="right" scope="row"><strong>detail :</strong></td>
                <td><textarea name="detail" rows="5" id="detail" style="width:97%" required  class="form-control"></textarea></td>
            </tr>
            <tr>
                <td align="right" scope="row"><strong>price :</strong></td>
                <td><input name="price" type="text" id="price" style="width:97%" required  class="form-control" ></td>
            </tr>
            <tr>
                <td align="right" scope="row"><strong>category :</strong></td>
                <td>
                <select name="c_id" required="required" style="width:97%"  class="form-control" >
                    <option value="">Please select</option>
                    <?php
						$sqlc 	= "select * from category order by c_id asc";
						$queryc = mysqli_query($conn,$sqlc)or die(mysqli_error($conn));
						$numc	= mysqli_num_rows($queryc);
						for($i=1;$i<=$numc;$i++)
						{
							$rowc = mysqli_fetch_array($queryc);
                    ?>
                    <option value="<?php echo $rowc['c_id']?>"><?php echo $rowc['c_name']?></option>
                    <?php
                        }
                    ?> 
                </select>
                </td>
            </tr>
            <tr>
                <td align="right" scope="row"><strong>image :</strong></td>
                <td><input type="file" name="attach" ></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit"></td>
            </tr>
    </table>
</form><!--/login form-->
            </div>
		</div>
	</section> <!--/#cart_items-->

    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>