<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "root";
    $db_name = "nut";
    $conn = @mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die ("Can't Connect to DB");    // connect to database
    mysqli_query($conn,"set names utf8");   // run command
?>
