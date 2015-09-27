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
	$sql = "select * from product NATURAL join category order by p_id desc";
	$query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	$num = mysqli_num_rows($query);    // number of rows in the table
?>
<table width="600" border="1" cellspacing="1" align = 'center'>
  <tr>
    <td colspan="7" align="center" bgcolor="#DDFFFF"><a href="add.php">Addproduct</a></td>
  </tr>
  <tr bgcolor="#D5FFDF">
    <td align="center">id</td>
    <td align="center">image</td>
    <td align="center">name</td>
    <td align="center">price</td>
    <td align="center">category</td>
    <td align="center">edit</td>
    <td align="center">delete</td>
  </tr>
  <?php
  	for($i=1;$i<=$num;$i++){
		$row = mysqli_fetch_array($query);      // fetch the fields from the table
  ?>
  <tr>
    <td><?php echo $row['p_id']; ?></td>
    <td>
      <?php
          $filepath = "../upload/".$row['p_img'];
            if (is_file($filepath)) {                                  // if file is in file path
       ?>
      <img src = "<?php echo $filepath ?>" width ="80" >               <!-- output image -->
      <?php
          }
       ?>
    </td>
    <td><?php echo $row['p_name'] ?></td>
    <td><?php echo $row['p_price'] ?></td>
    <td><?php echo $row['c_name'] ?></td>
    <td><a href="edit.php?p_id=<?php echo $row['p_id'] ?>">edit</a></td>             <!-- send id to edit.php via GET -->
    <td><a href="delete.php?p_id=<?php echo $row['p_id']?>" onclick = "return confirm('Are you sure?');">delete</a></td>      <!-- send id to delete.php via GET  and ask if you're sure you wanna delete-->
  </tr>
  <?php
	}
  ?>
</table>
</body>
</html>
