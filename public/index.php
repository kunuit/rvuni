<?php
  include "../hvsf/header.php";
?>

<!-- Start Banner -->
  <div class="container-fluid">
    <div class="row">
      <div class="pogoSlider" id="js-main-slider">
        <div class="pogoSlider-slide" style="background-image:url(images/banner_img.png);">
          <div class="container">
            <div class="row">
              <div class="col-md-12 slide-container">
                <div class="slide_text text-center">
                  <h3 >Chia sẻ những Review</h3>
                  <h4>chân thật nhất</h4>
                  <div class="full center">
                    <a class="contact_bt" href="#">Viết Review</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- End Banner -->

<!-- Start Menu -->
<div class="section tabbar_menu">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
      <div class="tab_menu">
          <ul>
            <li><a href="all-uni.php"><span class="icon"><img src="images/i1.png" alt="#" /></span><span>Trường đại học</span></a></li>
            <li><a href="#"><span class="icon"><img src="images/i4.png" alt="#" /></span><span>Review</span></a></li>
            <li><a href="#"><span class="icon"><img src="images/i2.png" alt="#" /></span><span>Cơ hội việc làm</span></a></li>
            <li><a href="#"><span class="icon"><img src="images/i5.png" alt="#" /></span><span>Vị trí</span></a></li>
            <li><a href="#"><span class="icon"><img src="images/i6.png" alt="#" /></span><span>Email</span></a></li>
            <li><a href="#"><span class="icon"><img src="images/i7.png" alt="#" /></span><span>Điện thoại</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Menu -->

<!-- Start Recent Review-->
<div class="section layout_padding padding_bottom-0 silver_bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="heading_main text_align_center">
            <h2><span>Review Mới Nhất</span></h2>
          </div>
        </div>
      </div>
    </div>
   <div class="row">
    <div class="col-lg-12">
      <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <!-- đoạn code php -->
              <?php
                $connect = mysqli_connect('localhost', 'root', '');

                //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
                if (!$connect) {
                  die("Không kết nối :" . mysqli_connect_error());
                  exit();
                }
                mysqli_select_db($connect, 'reviewuni');
                $query = "SELECT * FROM ctblt ct, truong tr, nguoibl ng
                                            WHERE ng.MaNBL = ct.MaNBL AND ct.MaTr = tr.MaTr 
                                            ORDER BY MaBLT DESC limit 4 ";

                $result = mysqli_query($connect, $query);
               
							
								
                while ($row = mysqli_fetch_assoc($result)) {
                  $trim_rv = mb_strimwidth($row['NdBL'], 0, 120, '...');
                  echo ' <div class="col-lg-3 col-md-6 col-sm-6 recent_review">
                            <div class="full blog_img_popular">
                              <a href="showReview.php?MaTr='.$row['MaTr'].'"><img class="img-responsive" src="'.$row['Logo'].'" alt="#" /></a>
                              <div class="review">
                                <h6> '.$row['TenNBL'].' </h6>
                                <div>';
                                for($i = 1; $i <= 5; $i++) {
                                  $ratingClass = "none_star";
                                  if($i <= $row['Sao']) {
                                    $ratingClass = "yellow_star";
                                  }
                                  echo '<a class="'.$ratingClass.'"><i class="fas fa-star"></i></a>';					
                                 }
                                   
                  echo ' </div> 
                            </div>
                              <a href="showReview.php?MaTr='.$row['MaTr'].'"><p>'.$trim_rv.'</p></a>
                            </div>
                          </div>';
                }
              ?>
            </div>
          </div>
          <div class="carousel-item">
              <div class="row">
                <?php
                  $query2 = "SELECT * FROM ctblt ct, truong tr, nguoibl ng
                  WHERE ng.MaNBL = ct.MaNBL AND ct.MaTr = tr.MaTr
                  ORDER BY MaBLT DESC LIMIT 4 OFFSET 4";

                  $result2 = mysqli_query($connect, $query2);
                  while ($row = mysqli_fetch_assoc($result2)) {
                    $trim_rv = mb_strimwidth($row['NdBL'], 0, 120, '...');
                    echo ' <div class="col-lg-3 col-md-6 col-sm-6 recent_review">
                              <div class="full blog_img_popular">
                                <a href="showReview.php?MaTr='.$row['MaTr'].'"><img class="img-responsive" src="'.$row['Logo'].'" alt="#" /></a>
                                <div class="review">
                                  <h6> '.$row['TenNBL'].' </h6>
                                  <div>';
                                  for($i = 1; $i <= 5; $i++) {
                                    $ratingClass = "none_star";
                                    if($i <= $row['Sao']) {
                                      $ratingClass = "yellow_star";
                                    }
                                    echo '<a class="'.$ratingClass.'"><i class="fas fa-star"></i></a>';					
                                   }
                                     
                    echo ' </div> 
                              </div>
                                <a href="showReview.php?MaTr='.$row['MaTr'].'"><p>'.$trim_rv.'</p></a>
                              </div>
                            </div>';
                  }
                ?>
              </div>
          </div>
      </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>

      </div>
    </div>

  </div>        
</div>
</div>
<!-- End Recent Review -->

<!-- Start Top Uni -->
<div class="section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="heading_main text_align_center">
           <a href="all-uni.php"><h2><span>Top Trường</span> Được Review Nhiều Nhất</h2></a>
         </div>
       </div>
     </div>

     <?php
              $query = "SELECT * FROM ctblt ct, truong tr 
                                      WHERE ct.MaTr = tr.MaTr
                                      GROUP by tr.MaTr ";
              $result = mysqli_query($connect, $query);
              while ($row = mysqli_fetch_assoc($result)) {
                $MaTr = $row['MaTr'];
                $count_result=mysqli_query($connect, "SELECT * from  ctblt ct WHERE '$MaTr'= ct.MaTr");
                $count_rv = mysqli_num_rows($count_result); 
                $sum_result = mysqli_query($connect,"SELECT SUM(Sao) AS value_sum FROM ctblt ct WHERE '$MaTr'= ct.MaTr"); 
                $sum_row = mysqli_fetch_assoc($sum_result); 
                $sum = $sum_row['value_sum'];
                $avg = (float)round($sum/$count_rv, 1);
                echo ' <div class="col-lg-3 col-md-6 col-sm-12 top_uni">
                          <div class="full blog_img_popular">
                            <a href="showReview.php?MaTr='.$row['MaTr'].'"><img class="img-responsive" src="'.$row['Logo'].'" alt="#" /></a>
                            <h4> <a href="showReview.php?MaTr='.$row['MaTr'].'">'.$row['TenTr'].'</a></h4>
                            <div class="review_star">
                              <strong>'.$avg.'</strong>';
                              for($i = 1; $i <= 5; $i++) {
                                $ratingClass = "none_star";
                                if($i <= round($avg)) {
                                  $ratingClass = "yellow_star";
                                }
                                echo '<a class="'.$ratingClass.'"><i class="fas fa-star"></i></a>';					
                               }
                echo '<span> ('.$count_rv.')</span>
                            </div> 
                          </div>
                      </div>';
              }
              mysqli_close($connect); 
          ?>    
    </div>
  </div>
</div>
<!-- End Top Uni -->

<!-- Start WElcome -->
<div class="section margin-top_50 silver_bg">
  <div class="container">
    <div class="row">
      <div class="col-md-6 layout_padding_2">
        <div class="full">
          <div class="heading_main text_align_left">
           <h2><span>Chào mừng đến với</span> <a href="index.html">REVIEW-UNI</a> </h2>
         </div>
         <div class="full">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
        </div>
        <!-- <div class="full">
         <a class="hvr-radial-out button-theme" href="#">Tìm hiểu thêm</a>
       </div> -->
     </div>
   </div>
   <div class="col-md-6 center">
   <video width="320" height="320"  controls autoplay  loop>
        <source src="images/movie.mp4" type="video/mp4">
  </video>
    <!-- <div class="full">
      <img src="images/img2.png" alt="#" />
    </div> -->
  </div>
</div>
</div>
</div>
<!-- End Welcome -->

<!-- Start Contact -->
<div class="section layout_padding padding_bottom-0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="heading_main text_align_center">
            <h2><span> <a href="contact.html">Liên hệ</a> </span></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="section contact_section" style="background:#12385b;">
  <div class="container">
   <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="full float-right_img">
        <img src="images/img10.png" alt="#">
      </div>
    </div>
    <div class="layout_padding col-lg-6 col-md-6 col-sm-12">
      <div class="contact_form">
       <form action="contact.html">
         <fieldset>
           <div class="full field">
             <input type="text" placeholder="Họ và tên" name="your name" />
           </div>
           <div class="full field">
             <input type="email" placeholder="Email" name="Email" />
           </div>
           <div class="full field">
             <input type="phn" placeholder="Số điện thoại" name="Phone number" />
           </div>
           <div class="full field">
             <textarea placeholder="Nội dung"></textarea>
           </div>
           <div class="full field">
             <div class="center"><button>Gửi</button></div>
           </div>
         </fieldset>
       </form>
     </div>
   </div>
 </div>        
</div>
</div>
<!-- End Contact -->

<?php include"../hvsf/footer.php"?>