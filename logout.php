<?php
        session_start();
        session_destroy();                  // clear session
        echo "<script>alert('Bye Bye');window.location='index.php';</script>";              // alert 'Bye Bye' then go back to login page
 ?>
