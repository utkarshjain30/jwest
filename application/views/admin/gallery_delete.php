<?php
    $fileid = $_GET['fileid'];exit;
    
    $update	=	$this->lib->del('products_gallery_images','id',$fileid);

    //HERE IS THE LOGIC TO FIND THE PATH OF YOUR FILE
    unlink($file); //You can add more validations or full paths
?