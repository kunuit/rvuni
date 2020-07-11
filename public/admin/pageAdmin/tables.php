<?php

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $connect = mysqli_connect('localhost', 'root', '');

    if(!$connect){
        die('không thể kết nối: '. mysqli_connect_error($connect));
        exit();
    }

    mysqli_select_db($connect, 'reviewuni');

    $IDUni = '';
    $name = '';
    $address = '';

    $sql = "INSERT INTO truong(MaTr, TenTr, DiaChi) VALUES ('".$_POST['IDUni']."', '".$_POST['name']."', '".$_POST['address']."' )";

    $resutl = mysqli_query($connect, $sql);
