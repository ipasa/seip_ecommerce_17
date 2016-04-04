<?php

function select_all_published_category(){
    require 'db_connect.php';
    
    $sql    = "SELECT * FROM category WHERE publicationStatus = 1 AND deletionStatus=1";
    $result = mysqli_query($conn, $sql);
    return $result;   
}

