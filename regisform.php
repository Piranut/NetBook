<?php
      include("inc/connect.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
              <form id="form1" name = "form1" method ="post" action ="regissave.php" ><!--onsubmit="MM_validationForm('user','','R','pass','','R','confirm','','R','email','','NisEmail');return document.MM_returnValue">-->
                <table width ="400" border="0" align = "center" cellspacing = '2'>
                <tr bgcolor="#E6E6E6">
                  <th colspan = '2' scope = 'row' bgcolor= '#E8E8E8'>REGISTER</th>
                </tr>
                <tr>
                          <th scope = 'row'>Username:</th>
                          <td><input type = 'text' name ='user' id='user'></td>
                </tr>
                <tr>
                          <th scope = 'row'>Password:</th>
                          <td><input type = 'password' name ='pass' id='pass'></td>
                </tr>
                <tr>
                          <th scope = 'row'>Confirm password:</th>
                          <td><input type = 'password' name ='confirm' id='confirm'></td>
                </tr>

                  <tr>
                      <th colspan = '2' scope = 'row' bgcolor='#E8E8E8'>PROFILE</th>
                  </tr>
                <tr>
                          <th scope = 'row'>Name:</th>
                          <td><input type = 'text' name ='name' id='name'></td>
                </tr>
                <tr>
                          <th scope = 'row'>Address:</th>
                          <td><textarea  name ='address' id='address'></textarea></td>
                </tr>
                <tr>
                          <th scope = 'row'>Email:</th>
                          <td><input type = 'text' name ='email' id='email'></td>
                </tr>
                <tr>
                          <th scope = 'row'>Phone:</th>
                          <td><input type = 'text' name ='phone' id='phone'></td>
                </tr>
                <tr bgcolor = "#E8E8E8">
                      <th colspan = "2" bgcolor = '#D8D8D8' scope= 'row'>
                          <input type ="submit" name ="button" id="button" value = "submit">
                      </th>
               </tr>
          </table>
</form>
</body>
</html>