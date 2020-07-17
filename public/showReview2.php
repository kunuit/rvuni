
<!doctype html>
<html lang="en">

<head>
  <title>ShowReview</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/showReview.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/4f433ce5a6.js" crossorigin="anonymous"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>

  <!-- Start header -->
 <header class="top-header">
	<nav class="navbar header-nav navbar-expand-lg">
	  <div class="container-fluid">
		<a class="navbar-brand" href="index.html">REVIEW<span>-</span>UNI</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
		  <span></span>
		  <span></span>
		  <span></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
		  <ul class="navbar-nav">
			<li><a class="nav-link" href="index.php">Trang chủ</a></li>
			<li><a class="nav-link" href="all-uni.php">Trường học</a></li>
			<li><a class="nav-link" href="contact.php">Liên hệ</a></li>
		  </ul>
		</div>
		<div class="search-box">
		  <input type="text" class="search-txt" placeholder="Tìm kiếm">
		  <a class="search-btn">
			<img src="images/search_icon.png" alt="#" />
		  </a>
		</div>
	  </div>
	</nav>
  </header>
<!-- End header -->
  <div class="duoitieude">
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
  </div>
  <!--het duoi tieu de-->

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
          <div class="col-sm-2">
            <img class="logoifo" src="images/img7.png" alt="">
          </div>
          <div class="col-sm-6">
            <h3> UNIVERSITY OF TECHNOLOGY  </span></h3>
            <h4>
              <span class="fa fa-building"></span>
              <span class="diachi">268 Lý Thường Kiệt, Phường 14, Quận 10, Hồ Chí Minh</span>
              <p><span class="rate-new ratetong"> <span class="tongvote">(<?php echo rand(50,200)?>)</span> </p>
            </h4>
          </div>
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
      $query = "SELECT * FROM ctblt ct, nguoibl bl
                                  WHERE bl.MaNBL = ct.MaNBL AND ct.MaTr = '$MaTr' ";

      $result = mysqli_query($connect, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        $name1 = substr($row['TenNBL'], 0, 1);
        echo '<div class="maincontent">
                                        <div class="left">
                                            <div class="warpleft">
                                                <div class="pr5"> ' . $name1 . ' </div>
                                                <div class="name">  ' . $row['TenNBL'] . '  </div>
                                                <div class="date"> 23 May 20 </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="wrapright">
                                                <!-- <h3> Information Technology University</h3>
                                                <h4> TMĐT 2018 </h4> -->
                                                <div class="rating">
                                                    <span>đánh giá</span>
                                                    <span class="rate-new"> </span>
                                                    <p class="textrv"> ' . $row['NdBL'] . '</p>
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
        // echo '<pre>';
        // print_r($row);
        // echo '</pre>';
      }
      ?>



    </div> <!-- het dong goi-->


    <!-- modal review -->
    <!-- Modal -->
    <form action="submitReview.php" method="post">
      <div class="modal fade" id="actReview" tabindex="-1" role="dialog" aria-labelledby="actReviewTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" style="max-width: 800px!important;" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="actReviewTitle">Viết Review trường đại học <input class='tentruong' type="text" name="MaTr" value="<?php echo $_GET['MaTr']?>" > <?php echo $truong =  $_GET['MaTr'] == 'QSB' ? 'BK' : '' ;?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Tên bạn</label>
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
  <!-- Footer -->
  <footer class="page-footer font-small unique-color-dark">

    <div style="background-color: #002147;">
      <div class="container">

        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <!-- <img src="./stylecss/tempsnip.png" width="30" height="30" class="d-inline-block align-top" alt="reviewUOFIT"> -->
            <a href="#">REVIEW-UNI</a>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">

            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fab fa-facebook-f white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fab fa-twitter white-text mr-4"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g white-text mr-4"> </i>
            </a>
            <!--Linkedin -->
            <a class="li-ic">
              <i class="fab fa-linkedin-in white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fab fa-instagram white-text"> </i>
            </a>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row-->

      </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

      <!-- Grid row -->
      <div class="row mt-3">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">Tên Công Ty</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Ở đây bạn có thể sử dụng các hàng và cột để sắp xếp nội dung chân trang của bạn. Lorem ipsum dolor sit
            Amet, consectetur adipiscing elit.</p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Nhà tài trợ</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="#!">An Anh Hoàng Gia</a>
          </p>
          <p>
            <a href="#!">Tú Tài Khổng Tử</a>
          </p>
          <p>
            <a href="#!">Dũng Mãnh Sư</a>
          </p>
          <p>
            <a href="#!">Cường Dev-Quèn</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">link hữu ích</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a href="../feedback/feedback.html">Đóng góp ý kiến</a>
          </p>
          <p>
            <a href="../contracts/contract.html">Liên hệ</a>
          </p>
          <p>
            <a href="../jobs/jobs.html">Cơ hội nghề nghiệp</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Liên Lạc</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fas fa-home mr-3"></i>Ở Nhà</p>
          <p>
            <i class="fas fa-envelope mr-3"></i>185*****@gm.uit.edu.vn</p>
          <p>
            <i class="fas fa-phone mr-3"></i>096******15</p>
          <p>
            <i class="fas fa-print mr-3"></i>123456</p>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">©
      <script>
        document.write(new Date().getFullYear())
      </script>
      , made with
      <i class="fas fa-brain"></i>
      and
      <i class="fas fa-heart"></i>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

  <!-- Optional JavaScript -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
