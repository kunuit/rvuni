<?php
 
    $connect = mysqli_connect('localhost', 'root', '');

    //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if (!$connect) {
        die("Không kết nối :" . mysqli_connect_error());
        exit();
    }

    mysqli_select_db($connect,'reviewuni');
    echo "Khi kết nối thành công sẽ tiếp tục dòng code bên dưới đây.". '<br/>';

    $name = $_POST['name'];
    $mainReply = $_POST['mainReply'];
    $react = $_POST['react'];
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $sql = "INSERT INTO nguoibl(TenNBL, ChucVu) VALUES ('$name', 'nguoibl') ";
    mysqli_query($connect,$sql);
    // select ra id mới vừa add
    $query = "SELECT * FROM `nguoibl` ORDER BY `MaNBL` DESC LIMIT 1";
   
    $result = mysqli_query($connect,$query);

    $row = mysqli_fetch_assoc($result);
    $MaNGBL = $row['MaNBL'];
    // select ra mã bình luận trường 
    $query2 = "SELECT MaBLT, MaTr FROM `ctblt` ORDER BY `MaBLT` DESC LIMIT 1";
    $result2 = mysqli_query($connect,$query2);

    $row2 = mysqli_fetch_assoc($result2);
    $MaBLT = $row2['MaBLT'];
    $MaTr = $row2['MaTr'];
    $sql2 = "INSERT INTO ctblbl( MaBLT, MaNBL, NdBL, MaBC ) VALUES ( $MaBLT , $MaNGBL, '$mainReply', $react) ";
    mysqli_query($connect,$sql2);
    echo $sql2;

    // echo mysqli_affected_rows($connect);
    
    header ( "location: showReview.php?MaTr=$MaTr");
   
    //Đóng database
    $connect->close();
?>
