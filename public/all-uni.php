<?php
  include "../hvsf/header.php";
?>
 <section class="cta-section py-5">
        <div class="container text-center">
            <h2>Chia sẻ những review chân thật nhất</h2>
        </div><!--//container-->
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

          $sql = "SELECT MaTr FROM truong";
          $result_sql= mysqli_query($connect, $sql);

          $page = 1; //khởi tạo trang ban đầu
          $limit = 10; //số bản ghi trên 1 trang (2 bản ghi trên 1 trang)
          $total_record = mysqli_num_rows($result_sql); //tính tổng số bản ghi có trong bảng khoahoc

          $total_page = ceil($total_record / $limit); //tính tổng số trang sẽ chia
          
          //xem trang có vượt giới hạn không:
          if (isset($_GET["page"]))
            $page = $_GET["page"]; //nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
          if ($page < 1) $page = 1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
          if ($page > $total_page) $page = $total_page; //nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng
      
          //tính start (vị trí bản ghi sẽ bắt đầu lấy):
          $start = ($page - 1) * $limit;

          $query = "SELECT * FROM truong tr limit $start, $limit";
          $result = mysqli_query($connect, $query);

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
                              <strong style="font-size: 120%;">'.$avg.'</strong>';
                              for($i = 1; $i <= 5; $i++) {
                                $ratingClass = "none_star";
                                if($i <= round($avg)) {
                                  $ratingClass = "yellow_star";
                                }
                                echo '<a class="'.$ratingClass.'"><i class="fas fa-star"></i></a>';					
                               } 
               echo' </div> 
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
         
          mysqli_close($connect); 
        ?>
          <!-- xử lý pagination -->
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php
            // nếu page > 1 và total_page > 1 mới hiển thị nút prev
            if ($page > 1 && $total_page > 1) {
              echo '<li class="page-item"><a class="page-link" href="all-uni.php?page=' . ($page - 1) . '">Prev</a></li>';
            }

            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++) {
              // Nếu là trang hiện tại thì hiển thị thẻ span
              // ngược lại hiển thị thẻ a
              if ($i == $page) {
                echo '<li class="page-item"><a class="page-link">' . $i . '</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="all-uni.php?page=' . $i . '">' . $i . '</a></li>';
              }
            }

            // nếu page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($page < $total_page && $total_page > 1) {
              echo '<li class="page-item"><a class="page-link" href="all-uni.php?page=' . ($page + 1) . '">Next</a><li>';
            }         
                    
            ?>
                   
        </ul>                       
        </nav>
        </div>
    </section>
</div>
	
<?php
  include "../hvsf/footer.php"
?>
