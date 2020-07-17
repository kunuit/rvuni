<?php
  include "../hvsf/header.php";
?>
<section class="cta-section py-5">
        <div class="container text-center">
            <h2>Chia sẻ những review chân thật nhất</h2>
        </div>
</section>
<div class="main-wrapper silver_bg">
    <section class=" px-3 py-5 p-md-5">
        <div class="container">
            <?php
               $connect = mysqli_connect('localhost', 'root', '');       
               //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
               if (!$connect) {
                   die("Không kết nối :" . mysqli_connect_error());
                   exit();
               }
               mysqli_select_db($connect, 'reviewuni');

               if (isset($_POST['submit-search'])) {
                   $search = mysqli_real_escape_string($connect,$_POST['search'] );
                   if (empty($search)) {
                       echo "Bạn chưa nhập từ khóa tìm kiếm";
                   } 
                   else
                   {
                       $query = "SELECT * FROM truong tr 
                                                       WHERE tr.TenTr LIKE '%$search%' ";

                       $result = mysqli_query($connect, $query);

                       $queryResult = mysqli_num_rows($result);


                       $query_rv = "SELECT * FROM ctblt ct INNER JOIN truong tr ON tr.MaTr = ct.MaTr
                                   WHERE ct.NdBL LIKE '%$search%' ";

                       $result_rv = mysqli_query($connect, $query_rv);

                       $queryResult_rv = mysqli_num_rows($result_rv);
                       $result_num = $queryResult + $queryResult_rv;

                       echo'Có '.$result_num.' kết quả phù hợp với từ khóa <strong>'.$search.'</strong><br><br>';
                       if ($queryResult > 0) {
                           echo'<strong>TRƯỜNG ĐẠI HỌC:</strong><br><br>';
                           while ($row = mysqli_fetch_assoc($result)) {
                               $MaTr = $row['MaTr'];
                               $count_result=mysqli_query($connect, "SELECT * from  ctblt ct WHERE '$MaTr'= ct.MaTr");
                               $count_rv = mysqli_num_rows($count_result); 
                               $rv_result=mysqli_query($connect, "SELECT * from  ctblt ct WHERE '$MaTr'= ct.MaTr ORDER BY MaBLT DESC LIMIT 1");
                               $rv_row = mysqli_fetch_assoc($rv_result); 
                               $sum_result = mysqli_query($connect,"SELECT SUM(Sao) AS value_sum FROM ctblt ct WHERE '$MaTr'= ct.MaTr"); 
                               $sum_row = mysqli_fetch_assoc($sum_result); 
                               $sum = $sum_row['value_sum'];
                               $avg = (float)round($sum/$count_rv, 1);
                               $trim_rv = mb_strimwidth($rv_row['NdBL'], 0, 250, '...');
                               echo '<div class="mb-5">
                                       <div class="row">
                                           <div class="col-lg-2 col-md-3">
                                               <a href="showReview.php?MaTr='.$row['MaTr'].'"><img class="mr-3 img-fluid post-thumb d-md-flex" src="'.$row['Logo'].'" alt="image"></a>
                                               <div class="review_star">
                                               <strong style="font-size: 120%;">'.$avg.'</strong>
                                               <a class="yellow_star"><i class="fas fa-star"></i></a>
                                               <a class="yellow_star"><i class="fas fa-star"></i></a>
                                               <a class="yellow_star"><i class="fas fa-star"></i></a>
                                               <a class="yellow_star"><i class="fas fa-star"></i></a>
                                               <a class="yellow_star"><i class="fas fa-star"></i></a> 
                                             </div> 
                                           </div> 
                                           <div class="col-lg-10 col-md-9 col-sm-12">
                                               <h3 class="title"><a href="showReview.php?MaTr='.$row['MaTr'].'">'.$row['TenTr'].'</a></h3>
                                               <div class="meta mb-1"><span class="comment"><a href="#"><strong> '.$count_rv.' Đánh giá </strong></a></span><span class="date">Mới nhất 1 tiếng trước</span></div>
                                               <div class="intro">'.$trim_rv.'</div>
                                               <a class="view-review" href="showReview.php?MaTr='.$row['MaTr'].'">Xem review &rarr;</a>
                                               <hr>
                                           </div>
                                       </div>
                                   </div>';
                           } 
                       }

                       if ($queryResult_rv > 0) {
                           echo'<strong>REVIEW:</strong><br><br>';
                       while ($row = mysqli_fetch_assoc($result_rv)) {
                           $MaTr = $row['MaTr'];
                           $count_result=mysqli_query($connect, "SELECT * from  ctblt ct WHERE '$MaTr'= ct.MaTr");
                           $count_rv = mysqli_num_rows($count_result); 
                           $sum_result = mysqli_query($connect,"SELECT SUM(Sao) AS value_sum FROM ctblt ct WHERE '$MaTr'= ct.MaTr"); 
                           $sum_row = mysqli_fetch_assoc($sum_result); 
                           $sum = $sum_row['value_sum'];
                           $avg = (float)round($sum/$count_rv, 1);
                           $trim_rv = mb_strimwidth($row['NdBL'], 0, 250, '...');
                           echo '<div class="mb-5">
                                   <div class="row">
                                       <div class="col-lg-2 col-md-3">
                                           <a href="showReview.php?MaTr='.$row['MaTr'].'"><img class="mr-3 img-fluid post-thumb d-md-flex" src="'.$row['Logo'].'" alt="image"></a>
                                           <div class="review_star">
                                           <strong style="font-size: 120%;">'.$avg.'</strong>
                                           <a class="yellow_star"><i class="fas fa-star"></i></a>
                                           <a class="yellow_star"><i class="fas fa-star"></i></a>
                                           <a class="yellow_star"><i class="fas fa-star"></i></a>
                                           <a class="yellow_star"><i class="fas fa-star"></i></a>
                                           <a class="yellow_star"><i class="fas fa-star"></i></a> 
                                       </div> 
                                       </div> 
                                       <div class="col-lg-10 col-md-9 col-sm-12">
                                           <h3 class="title"><a href="showReview.php?MaTr='.$row['MaTr'].'">'.$row['TenTr'].'</a></h3>
                                           <div class="meta mb-1"><span class="comment"><a href="#"><strong> '.$count_rv.' Đánh giá </strong></a></span><span class="date">Mới nhất 1 tiếng trước</span></div>
                                           <div class="intro">'.$trim_rv.'</div>
                                           <a class="view-review" href="showReview.php?MaTr='.$row['MaTr'].'">Xem review &rarr;</a>
                                           <hr>
                                       </div>
                                   </div>
                               </div>';
                       } 
                       }
                   }
               }
               mysqli_close($connect); 
           ?>     
        </div>
    </section>
</div>


<?php
  include "../hvsf/footer.php";
?>