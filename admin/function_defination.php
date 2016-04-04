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
        if ($admin_info) {
            session_start();
            $_SESSION['admin_id'] = $admin_info['admin_id'];
            $_SESSION['admin_name'] = $admin_info['admin_name'];
            header('Location:adminMaster.php');
        } else {
            $message = "Please Input Valid Information";
            return $message;
        }
    } else {
        die('Query Problem' . mysql_error());
    }
}

function admin_logout() {
    session_destroy();
    header('Location:index.php');
}

function add_category_product($data) {
    require '../db_connect.php';

    $sql = "INSERT INTO category (category_name, category_desc, publicationStatus)
            VALUES ('$data[category_name]', '$data[category_desc]', '$data[publicationStatus]')";

    if (mysqli_query($conn, $sql)) {
        $message = 'Insert Succesfully Done';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

function show_category(){
    require '../db_connect.php';
    
    $sql    = "SELECT * FROM category WHERE deletionStatus = 1";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function delete_category($category_id){
    require '../db_connect.php';
    // sql to delete a record
    //$sql    = "DELETE FROM category WHERE category_id=$category_id";
    $sql    =   "UPDATE category SET deletionStatus=0 WHERE category_id=$category_id";   

    if (mysqli_query($conn, $sql)) {
        //echo "Record deleted successfully";
        header('Location:display_category.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

function published_a_category($category_id){
    require '../db_connect.php';
    $sql    =   "UPDATE category SET publicationStatus=0 WHERE category_id=$category_id";   

    if (mysqli_query($conn, $sql)) {
        $message    =   "Operation Successfully Occurd";
        return $message;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
function unpublished_a_category($category_id){
    require '../db_connect.php';
    $sql    =   "UPDATE category SET publicationStatus=1 WHERE category_id=$category_id";   

    if (mysqli_query($conn, $sql)) {
        $message    =   "Operation Successfully Occurd";
        return $message;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
