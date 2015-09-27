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
    <form id="form1" name ="form1" method="post" enctype="multipart/form-data" action = "addsave.php">      <!-- using the 'post' method with enctype -->
        <table width="300" border = "0" align ="center" cellspacing ="2">
            <tr bgcolor="#FEF0DB">
            <th colspan="2"scope="row">Add Product:</th>
            </tr>
            <tr>
                <th width="79"scope="row">Name:</th>
                <td width ="211"><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <th scope ="row">Detail:</th>
                <td><textarea name="detail" id="detail" cols="30" rows= "5" ></textarea></td>
            </tr>
            <tr>
                <th scope ="row">Price:</th>
                <td><input type="text" name="price" id="price"></td>
            </tr>
            <tr>
                <th scope ="row">Category:</th>
                <td>
                    <select name="c_id" id="c_id">
                        <?php
                                $sqlc= "select * from category order by c_id asc";
                                $queryc = mysqli_query($conn,$sqlc) or die (mysqli_error($conn));
                                $numc = mysqli_num_rows($queryc);
                                for ($i=1; $i <= $numc; $i++) {
                                    $rowc = mysqli_fetch_array($queryc);
                         ?>
                        <option value="<?php echo $rowc['c_id'] ?>"><?php echo $rowc['c_name'] ?></option>
                        <?php
                        }
                         ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope ="row">Image:</th>
                <td><label for="attach"></label>
                    <input type ='file' name = 'attach' id='attach'></td>       <!-- choose file input type -->
            </tr>
             <tr bgcolor="#FEF0DB">
            <th colspan="2"scope="row"><input type="submit" name="button" id = "button" value = "save" /></th>
            </tr>
        </table>
    </form>
</body>
</html>

