<?php
    $attach = $_FILES['attach'];                                                     // accept file with $_FILES     'attach' is the name/id of the input from form.php

    if ($attach['error']==0) {                                                       // if there is no error in the file
        $fileinfo = pathinfo($attach['name']);                                       // select file name
        $filetype = strtolower($fileinfo['extension']);                              // select file extension    (strtolower change to lowercase letters)
        $arr = array('gif','jpg', 'png');                                            // set array to have gif, png and jpg

        if (in_array($filetype,$arr)) {                                              // if jpg,png,gif is in the file extension
            $newname  = time().".$filetype";                                         //  add time to file type (time keeps moving so this avoids same name)
            move_uploaded_file($attach['tmp_name'],"../upload/$newname");            // move uploaded file into upload folder with $newname as its name
        } else {
                exit("<script>alert('Please check file');history.back();</script>"); //if file extension is not jpg, png, gif then alert
        }
}
 ?>


