<?php
session_start();

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
