<?php
      include("../inc/connect.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
    <?php
            $attach = $_FILES['attach'];   // attached file

            if ($attach['error']==0) {              // if there is no error
                $fileinfo = pathinfo($attach['name']);
                $filetype = strtolower($fileinfo['extension']);
                $arr = array('gif','jpg', 'png');

                if (in_array($filetype,$arr)) {
                    $newname  = time().".$filetype";
                    move_uploaded_file($attach['tmp_name'],"../upload/$newname");
                } else {
                        exit("<script>alert('Please check file');history.back();</script>");
                    }
                }

            $name = $_POST['name'];
            $detail = $_POST['detail'];
            $price = $_POST ['price'];
            $c_id =  $_POST['c_id'];
            // echo "$name<br>$detail<br>$price<br>$c_id<br>";

            if (empty($name) || empty($detail) || empty($price)) {
                exit("<script>alert('Please check data'); history.back();</script>");
            }
            if (!is_numeric($price)) {
                exit("<script>alert('Price is number only'); history.back();</script>");
            }
            $sql = "insert into product values(null, '$name', '$detail', '$price','$newname', '$c_id')";
            mysqli_query($conn,$sql) or die(mysqli_error($conn));
            echo "<script>window.location='index.php';</script>";
     ?>
</body>
</html>