<?php
    session_start();
    include("inc/connect.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
            <table width ="200" border ="0" cellspacing ="2" align = 'center'>
            <tr>
                <td align ='center' bgcolor='#E0FEE4' >Welcome  [<?php echo $_SESSION['m_user'] ?>]</td>
            </tr>
            <tr>
                <td align ='center' bgcolor='#E0FEE4' >Viewcart</td>
            </tr>
            <tr>
                <td align ='center' bgcolor= '#E0FEE4'><a href="logout.php">Logout</a></td>
            </tr>
        </table>
</body>
</html>