<?php
  include "../hvsf/header.php";
?>
  <!-- <div class="duoitieude">
    <div class="container">
      <div class="solieu">
        <div class="noidung">
          <div class="motkhoinho">
            <span> <i class="fa fa-home"></i> Review </span>
          </div>
          <h3>158,975 University Review</h3>
        </div>
      </div>
    </div>
  </div> -->
  <section class="cta-section py-5">
        <div class="container text-center">
            <h2>Chia sẻ những review chân thật nhất</h2>
        </div>
    </section>
 

  <div class="container">
    <div class="sapxep">
      <div class="khungnho">
        <span class="lable1"> Sort: </span>
        <span>Latest reviews</span>
        <span> <i class="fa fa-caret-down"></i></span>
      </div>
    </div>
    <div class="donggoi">
      <div class="intro">
        <div class="row">

      <?php
      $connect = mysqli_connect('localhost', 'root', '');

      //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
      if (!$connect) {
        die("Không kết nối :" . mysqli_connect_error());
        exit();
      }
      $MaTr = $_GET['MaTr'];
      mysqli_select_db($connect, 'reviewuni');
      $query = "SELECT * FROM truong
                                  WHERE  truong.MaTr = '$MaTr' ";
      $result = mysqli_query($connect, $query);
      $row = mysqli_fetch_assoc($result);

      $count_result=mysqli_query($connect, "SELECT * from ctblt WHERE  ctblt.MaTr = '$MaTr' ");
      $count_rv = mysqli_num_rows($count_result);
      $sum_result = mysqli_query($connect,"SELECT SUM(Sao) AS value_sum FROM ctblt ct WHERE '$MaTr'= ct.MaTr"); 
      $sum_row = mysqli_fetch_assoc($sum_result); 
      $sum = $sum_row['value_sum'];
      $avg = (float)round($sum/$count_rv, 1);         
      echo '<div class="col-sm-2">
              <img class="logoifo" src="' . $row['Logo'] . '" alt="">
            </div>
            <div class="col-sm-6">
              <h3 class="uni_title"><span> ' . $row['TenTr'] . '  </span></h3>
              <h4>
                <span class="fa fa-building"></span>
                <span class="diachi">' . $row['DiaChi'] . '</span>      
              </h4>
              <div class="review_star" style="text-align: left">
                              <strong style="font-size: 150%;">'.$avg.'</strong>';
                              for($i = 1; $i <= 5; $i++) {
                                $ratingClass = "none_star";
                                if($i <= round($avg)) {
                                  $ratingClass = "yellow_star";
                                }
                                echo '<a class="'.$ratingClass.'"><i class="fas fa-star"></i></a>';					
                               } 
              echo' <span class="tongvote">(' . $count_rv . ' )</span>
              </div>
              </div>';
            mysqli_close($connect); 
  ?>
          
          <div class="col-sm-4">
            <div class="nutdanhgia">
              <button type="button" class="btn btn-success btn-lg act-review" style="border-radius: 30px !important" data-toggle="modal" data-target="#actReview">
                <i class="fas fa-pencil-alt"></i>
                <span class="vietreview">
                  viết review
                </span>
              </button>
            </div>
          </div>  
        </div>

      </div> <!-- het introduce-->

      <!-- đoạn code php -->
      <?php
       $connect = mysqli_connect('localhost', 'root', '');

       //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
       if (!$connect) {
         die("Không kết nối :" . mysqli_connect_error());
         exit();
       }
      $MaTr = $_GET['MaTr'];
    
      mysqli_select_db($connect, 'reviewuni');

      $sql = "SELECT MaBLT FROM ctblt ct
                            WHERE '$MaTr' = ct.MaTr";
      $result_sql = mysqli_query($connect, $sql);

      $page = 1; //khởi tạo trang ban đầu
      $limit = 15; //số bản ghi trên 1 trang (2 bản ghi trên 1 trang)
      $total_record = mysqli_num_rows($result_sql); //tính tổng số bản ghi có trong bảng khoahoc

      $total_page = ceil($total_record / $limit); //tính tổng số trang sẽ chia
      
      //xem trang có vượt giới hạn không:
      if (isset($_GET["page"]))
        $page = $_GET["page"]; //nếu biến $_GET["page"] tồn tại thì trang hiện tại là trang $_GET["page"]
      if ($page < 1) $page = 1; //nếu trang hiện tại nhỏ hơn 1 thì gán bằng 1
      if ($page > $total_page) $page = $total_page; //nếu trang hiện tại vượt quá số trang được chia thì sẽ bằng trang cuối cùng
  
      //tính start (vị trí bản ghi sẽ bắt đầu lấy):
      $start = ($page - 1) * $limit;   

      $query = "SELECT * FROM ctblt ct, nguoibl bl
                                  WHERE bl.MaNBL = ct.MaNBL AND ct.MaTr = '$MaTr' ORDER BY ct.MaBLT DESC limit $start, $limit ";

      $result = mysqli_query($connect, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        $name1 = substr($row['TenNBL'], 0, 1);
        echo '<div class="maincontent">
                                        <div class="left">
                                            <div class="warpleft">
                                                <div class="pr5"> ' . $name1 . ' </div>
                                                <div class="name">  ' . $row['TenNBL'] . '  </div>
                                                <div class="date">' . $row['ThoiGian'] . '</div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="wrapright">
                                                <!-- <h3> Information Technology University</h3>
                                                <h4> TMĐT 2018 </h4> -->
                                                <div class="rating">
                                                    <span>đánh giá &nbsp</span>';
                                                    for($i = 1; $i <= 5; $i++) {
                                                      $ratingClass = "none_star";
                                                      if($i <= $row['Sao']) {
                                                        $ratingClass = "yellow_star";
                                                      }
                                                      echo '<a class="'.$ratingClass.'"><i class="fas fa-star"></i></a>';					
                                                     }
                                            echo' <p class="textrv"> ' . $row['NdBL'] . '</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="under">
                                            <a  data-toggle="modal" data-target="#actReplyReview" ><i  class="fa fa-thumbs-up icon"></i></a> 
                                            <span> '.rand(1,50).' </span>
                                            <a  data-toggle="modal" data-target="#actReplyReview" ><i  class="fa fa-thumbs-down icon"></i></a>
                                            <span> '.rand(1,50).' </span>
                                            <a  data-toggle="modal" data-target="#actReplyReview" ><i  class="fa fa-comment icon"></i></a>
                                            <span> '.rand(1,50).' </span>
                                        </div>
                                    </div> <!-- het mainconten-->';
                                  
      }
      
      mysqli_close($connect); 
      ?>
      
      <!-- xử lý pagination -->
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php
          
            // nếu page > 1 và total_page > 1 mới hiển thị nút prev
            if ($page > 1 && $total_page > 1) {
              
              echo '<li class="page-item"><a class="page-link" href="showReview.php?MaTr='.$MaTr.'&page=' . ($page - 1) . '">Prev</a></li>';
            }

            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++) {

              // Nếu là trang hiện tại thì hiển thị thẻ span
              // ngược lại hiển thị thẻ a
              if ($i == $page) {
                echo '<li class="page-item"><a class="page-link">' . $i . '</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="showReview.php?MaTr='.$MaTr.'&page=' . $i . '">' . $i . '</a></li>';
              }
            }

            // nếu page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($page < $total_page && $total_page > 1) {
              echo '<li class="page-item"><a class="page-link" href="showReview.php?MaTr='.$MaTr.'&page=' . ($page + 1) . '">Next</a><li>';
            }         
                    
            ?>
                   
        </ul>                       
        </nav>
            
<br>
    </div> <!-- het dong goi-->


    <!-- modal review -->
    <!-- Modal -->
    <form action="submitReview.php" method="post">
      <div class="modal fade" id="actReview" tabindex="-1" role="dialog" aria-labelledby="actReviewTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" style="max-width: 800px!important;" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="actReviewTitle">Viết Review trường đại học <input class='tentruong' type="text" name="MaTr" value="<?php echo $_GET['MaTr']?>" > <?php echo $truong =  $_GET['MaTr'] == 'QSC' ? 'CNTT' : '' ;?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Tên bạn </label>
                <input type="text" class="form-control" name="name" aria-describedby="helpId" placeholder=" Muốn xưng tên thật thì xưng hong thì thui">
              </div>
              <div class="form-group">
                <label for="">Chức vụ </label>
                <input type="text" class="form-control" name="position" aria-describedby="helpId" placeholder=" Tân sinh viên / cựu sinh viên hay a/c rớt môn hằng năm">
              </div>
              <div class="form-group">
                <label for="">Review trường <span style="color: #ff4a6f;">(Bắt buộc)</span></label>
                <textarea value="" class="form-control" name="mainReview" rows="4" placeholder="Cái gì hay thì chia sẻ cho mọi người mở mang, góp ý. Còn bức xúc hay gì nữa thì viết dài dài vô (Tối thiểu 20 ký tự). Chia sẻ nhìu nhìu vô nha !!!" required></textarea>
              </div>
              <div class="form-group">
                <label for="">Gửi sao cho trường</label>
                <select class="custom-select form-control" name="giveStar">
                  <option value="1">1 sao - Trường cùi bắp, né né không lại hối hận</option>
                  <option value="2">2 sao - Haizz, ra trường sớm thôi</option>
                  <option value="3" selected>3 sao - Tạm, option không tệ</option>
                  <option value="4">4 sao - Ngon, vừa sức để theo đuổi</option>
                  <option value="5">5 sao - Perfect, đáng học tập và phát triển bản thân</option>
                </select>
              </div>
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6Lfwp-sUAAAAAEK-vGB1KD4__Xsk5dJjYJ40ekCJ"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-lg">Submit</button>
              <button type="button" class="btn btn-light btn-lg" data-dismiss="modal">Hủy bỏ</button>
            </div>
          </div>
        </div>
      </div>
    </form>

     <!-- modal - reply -->
  <form action="submitReply.php" method="post">
    <div class="modal fade" id="actReplyReview" tabindex="-1" role="dialog" aria-labelledby="actReplyReviewTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" style="max-width: 800px!important;" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Tên bạn</label>
              <input type="text"
                class="form-control" name="name" aria-describedby="helpId" placeholder=" Muốn xưng tên thật thì xưng hong thì thui">
            </div>
            <div class="form-group">
              <label for="">Comment <span style="color: #ff4a6f;">(Bắt buộc)</span></label>
              <textarea class="form-control" name="mainReply" rows="4" placeholder="Hãy Comment theo cách của bạn" required></textarea>
            </div>
            <div class="form-group">
              <label for="">Bày tỏ thái độ</label>
              <select class="custom-select form-control" name="react">
                <option value="0" selected>👍 Like</option>  
                <option value="1">👎 Dislike</option>  
                <option value="2">❌ Xóa giúp</option>  
              </select>
            </div>
            <div class="form-group">
              <div
                class="g-recaptcha"
                data-sitekey="6Lfwp-sUAAAAAEK-vGB1KD4__Xsk5dJjYJ40ekCJ"
              ></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-lg">Đăng Comment</button>
            <button type="button" class="btn btn-light btn-lg" data-dismiss="modal">Hủy bỏ</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  </div> <!-- het container   -->
  <?php include"../hvsf/footer.php"?>