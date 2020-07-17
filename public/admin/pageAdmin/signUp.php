<?php

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    $connect = mysqli_connect('localhost', 'root', '');

    if(!$connect){
        die('khong the ket noi:'.mysqli_connect_error($connect));
    }
    $username = '';
    $password = '';
    $email    = '';
    mysqli_select_db($connect, 'manage_user');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO admin(username, password, email, isAdmin) VALUES ('$username', '$password', '$email', 1 )";
    // echo $sql;
    $result = mysqli_query($connect, $sql);


    if($result > 0){
        echo '<script> alert("đăng ký thành công");</script>';
        header ( "location: http://localhost/rv/public/showReview/showReview.php");
    }
?>
