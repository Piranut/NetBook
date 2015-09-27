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
                    <?php
                            $user = $_POST['user'];
                            $pass = $_POST['pass'];
                            $confirm = $_POST['confirm'];
                            $name = $_POST['name'];
                            $address = $_POST['address'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];

                            if ($pass<>$confirm) {            // <> (is not equal to)  (same as !=)
                                exit("<script>alert('Password not match');history.back();</script>");
                            }

                            $sqlc = "select * from member where m_user = '$user'";           // select from member table where username submitted is equal to username in table
                            $queryc = mysqli_query($conn,$sqlc) or die ("error = $sqlc<hr>".mysqli_error($conn));
                            $numc = mysqli_num_rows($queryc);
                            if ($numc == 0) {                           // if this username is not in the table
                                $pass = base64_encode($pass);
                                $sql = "insert into member set
                                            m_user  = '$user',
                                            m_pass = '$pass',
                                            m_name = '$name',
                                            m_address = '$m_address',
                                            m_email = '$email',
                                            m_phone = '$phone' ";
                                    mysqli_query($conn, $sql) or die ("error=$sql<hr>".mysqli_error($conn));
                                    exit("<script>alert('Complete');window.location='login.php';</script>");
                                }
                                else {
                                    exit("<script>alert('Please change USER');history.back();</script>");
                                }
                     ?>
</body>
</html>
