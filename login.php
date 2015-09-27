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
        <form id = 'form1' name ='form1' method = 'post' action = 'check.php'>     <!-- send information via POST to check.php -->
        <table width = '200' border='0' align = 'center' cellspacing= '2' >
            <tr bgcolor="#C8F8FD">
                <th colspan="2" scope = 'row' >LOGIN</th>
            </tr>
            <tr>
                <th scope = 'row'>Username:</th>
                <td><input type = 'text' name ='user' id='user'></td>
            </tr>
            <tr>
                <th scope = 'row'>Password:</th>
                <td><input type = 'password' name ='pass' id='pass'></td>
            </tr>
            <tr bgcolor = "#C8F8FD">
                <th colspan = "2" bgcolor = '#E2FBFE' scope= 'row'>
                    <a href = 'regisform.php'>Register</a>
                </th>
            </tr>
            <tr bgcolor = "#C8F8FD">
                <th colspan = "2" scope= 'row'>
                <input type ="submit" name ="button" id="button" value = "submit">
                </th>
            </tr>
        </table>
        </form>
</body>
</html>