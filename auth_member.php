<?php
    if (!isset($_SESSION['m_user'])) {                   // if the user is not logged in
    exit("<script>alert('Please login');window.location='index.php';<script>");
  }
?>