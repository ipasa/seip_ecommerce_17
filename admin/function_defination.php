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
function add_manufacturer($data){
    require '../db_connect.php';

    $sql = "INSERT INTO tbl_manufacturer (manufacturer_name, manufacturer_description, publication_status)
            VALUES ('$data[manufacturer_name]', '$data[manufacturer_desc]', '$data[publicationStatus]')";

    if (mysqli_query($conn, $sql)) {
        $message = 'Insert Succesfully Done';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
function show_manufacturer(){
    require '../db_connect.php';
    
    $sql    = "SELECT * FROM tbl_manufacturer WHERE deletion_status = 1";
    $result = mysqli_query($conn, $sql);
    return $result;    
}
function  add_product($data){
    require '../db_connect.php';
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = "INSERT INTO tbl_product (product_name, category_id, manufacturer_id, product_price, product_quantity, product_short_description, product_long_description,	product_image, publication_status)
            VALUES ('$data[product_name]', '$data[category_name]', '$data[manufacturer_name]', '$data[product_price]', '$data[product_quantity]', '$data[product_short_desc]', '$data[product_long_desc]','$target_file', '$data[publicationStatus]')";

    if (mysqli_query($conn, $sql)) {
        $message = 'Insert Succesfully Done';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
}
function published_a_manufactuter($manufacturer_id){
    require '../db_connect.php';
    $sql    =   "UPDATE tbl_manufacturer SET publication_status=0 WHERE manufacturer_id=$manufacturer_id";   

    if (mysqli_query($conn, $sql)) {
        $message    =   "Operation Successfully Occurd";
        return $message;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
function unpublished_a_manufactuter($manufacturer_id){
    require '../db_connect.php';
    $sql    =   "UPDATE tbl_manufacturer SET publication_status=1 WHERE manufacturer_id=$manufacturer_id";   

    if (mysqli_query($conn, $sql)) {
        $message    =   "Operation Successfully Occurd";
        return $message;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
function show_product() {
    require '../db_connect.php';
    
    $sql    = "SELECT p.*, c.category_name, m.manufacturer_name FROM tbl_product as p, category as c, tbl_manufacturer as m WHERE p.deletion_status = 1 AND p.category_id = c.category_id AND p.manufacturer_id = m.manufacturer_id";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function show_view_details($product_data){
    require '../db_connect.php';
    $sql    = "SELECT p.*, c.category_name, m.manufacturer_name FROM tbl_product as p, category as c, tbl_manufacturer as m WHERE p.deletion_status = 1 AND p.category_id = c.category_id AND p.manufacturer_id = m.manufacturer_id AND p.product_id = $product_data";
    $result = mysqli_query($conn, $sql);
    return $result;
}