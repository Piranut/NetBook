<?php
   session_start();
   session_destroy();
   echo"<script>alert('Bye Bye');window.location='index.php';</script>";
?>