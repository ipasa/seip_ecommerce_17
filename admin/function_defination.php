<?php

function admin_login_check_info($data) {
    require '../db_connect.php';

    $email = $data['email'];
    $password = md5($data['password']);

    $sql = "SELECT * FROM tbl_admin WHERE email_address='$email' AND password='$password'";
    if (mysqli_query($conn, $sql)) {
        $query_result = mysqli_query($conn, $sql);
        $admin_info = mysqli_fetch_assoc($query_result);
//        echo '<pre>';
//        print_r($admin_info);
        if ($admin_info){   
            session_start();
            $_SESSION['admin_id']   =   $admin_info['admin_id'];
            $_SESSION['admin_name'] =   $admin_info['admin_name'];
            header('Location:adminMaster.php');
        }  else {
            $message    =   "Please Input Valid Information";
            return $message;
        }
    } else {
        die('Query Problem' . mysql_error());
    }
}

function admin_logout(){
    session_destroy();
    header('Location:index.php');
}

function add_category_product($data){
    require '../db_connect.php';
    
    $sql = "INSERT INTO category (category_name, category_desc, publicationStatus)
            VALUES ('$data[category_name]', '$data[category_desc]', '$data[publicationStatus]')";

if (mysqli_query($conn, $sql)) {
    $message    =   'Insert Succesfully Done';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
