<?php
 
    $connect = mysqli_connect('localhost', 'root', '');

    //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if (!$connect) {
        die("Không kết nối :" . mysqli_connect_error());
        exit();
    }

    mysqli_select_db($connect,'reviewuni');
    // echo "Khi kết nối thành công sẽ tiếp tục dòng code bên dưới đây.". '<br/>';
   
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    
    $name = $_POST['name'];
    $pos = $_POST['position'];
    $mainReview = $_POST['mainReview'];
    $giveStar = $_POST['giveStar'];
    $sql = "INSERT INTO nguoibl(TenNBL, ChucVu) VALUES ('$name', '$pos') ";
    mysqli_query($connect,$sql);
    // kết thúc add dữ liệu
  
    // echo $sql;  

    $query = "SELECT * FROM `nguoibl` ORDER BY `MaNBL` DESC LIMIT 1";
    
    // $result2 = mysqli_query($connect, $sql2);
    // while($row = mysqli_fetch_assoc($result2)){
    //     echo '<pre>';
    //     print_r($row);
    //     echo '</pre>';

    //     $sql3 = "INSERT INTO ctblt(MaTr, MaNGBL, NdBL, Sao) VALUES (1, '".$row['MaNBL']."',  '".$_POST['mainReview']."',  '".$_POST['giveStar']."' )";
    //     echo $sql3;

    //     $result = mysqli_query($connect,$sql3);
    //     if($result){
    //             $total = mysqli_affected_rows($connect);
    //             echo $total;
    //     }

    // }
    $result = mysqli_query($connect,$query);

    $row = mysqli_fetch_assoc($result);

    echo $MaNGBL = $row['MaNBL'];
    
    $sql2 = "INSERT INTO ctblt( MaTr, MaNBL, NdBL, Sao ) VALUES ( 'QSC' , $MaNGBL, '$mainReview', $giveStar) ";
    echo '<br/>'.$sql2;
    mysqli_query($connect,$sql2);
    

    header ( "location: http://localhost/rv/public/showReview/showReview.php");

    //Đóng database
    $connect->close();
?>

