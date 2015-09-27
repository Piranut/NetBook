<?php
    session_start();                                        // every page that has session_start() will be able to use variable _SESSION['name']
    $_SESSION['name'] = 'PIRANUT';
    echo $_SESSION['name'];
 ?><br>
 <a href="session2.php">Link</a>