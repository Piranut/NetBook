<?php
        if (empty($_GET['p_id'])) {
            exit("<script>window.location='index.php';</script>");
        }

      include("../inc/connect.php");

      $p_id  = $_GET['p_id'];         // get p_id variable from index.php
      $sql = "select * from product where p_id = $p_id";
      $query = mysqli_query($conn, $sql) or die (mysqli_error($conn));
      $row = mysqli_fetch_array($query);
      //print_r($row);
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
    <form id="form1" name ="form1" method="post" enctype="multipart/form-data"  action = "editsave.php">
        <table width="300" border = "0" align ="center" cellspacing ="2">
            <tr bgcolor="#FEF0DB">
            <th colspan="2"scope="row">Edit Product</th>
            </tr>
            <tr>
                <th width="79"scope="row">Name:</th>
                <td width ="211"><input type="text" name="name" id="name" value="<?php echo $row['p_name'] ?>" /></td>
            </tr>
            <tr>
                <th scope ="row">Detail:</th>
                <td><textarea name="detail" id="detail" cols="30" rows= "5" ><?php echo $row['p_detail'] ?></textarea></td>
            </tr>
            <tr>
                <th scope ="row">Price:</th>
                <td><input type="text" name="price" id="price" value= "<?php echo $row['p_price'] ?>"></td>
            </tr>
            <tr>
                <th scope ="row">Category:</th>
                <td>
                    <select name="c_id" id="c_id">
                        <?php
                                $sqlc= "select * from category order by c_id asc";                    // fetch data from category table
                                $queryc = mysqli_query($conn,$sqlc) or die (mysqli_error($conn));     // run sqlc command
                                $numc = mysqli_num_rows($queryc);                                     // number of rows in the category table
                                for ($i=1; $i <= $numc; $i++) {
                                    $rowc = mysqli_fetch_array($queryc);                    //fetch array
                         ?>
                        <option value="<?php echo $rowc['c_id'] ?>"<?php if ($row['c_id'] == $rowc['c_id']) {                  // if c_id from product equals c_id from category.
                            echo 'selected';} ?>
                            >                                                         <!-- output selected after edit is clicked. -->
                            <?php echo $rowc['c_name'] ?></option>      <!-- output name of product -->
                        <?php
                        }
                         ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope ="row">Image:</th>
                <td>
                      <?php
                          $filepath = "../upload/".$row['p_img'];
                            if (is_file($filepath)) {                                           // if file is in file path
                       ?>
                      <img src = "<?php echo $filepath ?>" width ="80" >               <!-- output image -->
                      <?php
                          }
                       ?>
                    <label for = 'attach'></label>
                <input type = "file" name = "attach" id = "attach">       <!-- choose file -->
            </td>
            </tr>
             <tr bgcolor="#FEF0DB">
            <th colspan="2"scope="row">
                <input type = "hidden" name ="p_id" id="p_id" value="<?php echo $p_id ?>">             <!-- output p_id from product  (no text shown) -->
                <input type="submit" name="button" id = "button" value = "submit" ></th>                <!-- submit button -->
            </tr>
        </table>
    </form>
</body>
</html>

