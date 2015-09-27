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
            $p_id = $_POST['p_id'];
            $name = $_POST['name'];
            $detail = $_POST['detail'];
            $price = $_POST ['price'];
            $c_id =  $_POST['c_id'];
            // echo "$name<br>$detail<br>$price<br>$c_id<br>";

            if (empty($name) || empty($detail) || empty($price)) {         // if fields name, detail and price are empty
                exit("<script>alert('Please check data'); history.back();</script>");
            }
            if (!is_numeric($price)) {          // if price is not a number
                exit("<script>alert('Price is number only'); history.back();</script>");
            }

                $attach = $_FILES['attach'];
            if ($attach['error']==0) {          // if there is no error in the attached file
                $fileinfo = pathinfo($attach['name']);      // file name
                $filetype = strtolower($fileinfo['extension']);     // file extension
                $arr = array('gif','jpg', 'png');

                if (in_array($filetype,$arr)) {             // if file type is in array
                        // 1. delete old image
                            $sql = "select * from product where p_id = $p_id ";
                            $query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                            $row = mysqli_fetch_array($query);
                            @unlink("../upload/".$row['p_img']);                        // delete image     @ - do not show error
                        // 2. move new image
                            $newname  = time().".$filetype";
                            move_uploaded_file($attach['tmp_name'],"../upload/$newname");          // move new file into the upload folder
                        // 3. update field p_img
                            $sqlu = "update product set p_img = '$newname' where p_id = $p_id " ;    // sql command to update the new image to the table
                            mysqli_query($conn, $sqlu) or die (mysql_error($conn));                 // run command
                } else {
                        exit("<script>alert('Please check file');history.back();</script>");
                    }
                }
            $sql = "update product set
                        p_name  = '$name',
                        p_detail = '$detail',
                        p_price = '$price',
                        c_id = '$c_id'
                        where   p_id  = '$p_id'  ";
            mysqli_query($conn,$sql) or die(mysqli_error($conn));
            echo "<script>window.location='index.php';</script>";   // go back to index.php page
     ?>
</body>
</html>
