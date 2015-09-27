<?php
      session_start();
      include("inc/connect.php");

      $user = $_POST['user'];
      $pass = base64_encode($_POST['pass']);

      $sql = "select * from member where m_user = '$user' and m_pass = '$pass' ";
      $query = mysqli_query($conn,$sql) or die (mysqli_error($conn));
      $num = mysqli_num_rows($query);
      if ($num==0) {                      // if username and password are not in the member table
          exit ("<script>alert('Login fail');history.back();</script>");      // login fail
      } else {
            $_SESSION['m_user'] = $user;                          // create session for the signed in user
            exit("<script> alert('Welcome');window.location='index.php';</script>");            // alert welcome and go to index.php(main page)
      }

 ?>