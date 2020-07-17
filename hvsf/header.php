<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REVIEW-UNI</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/4f433ce5a6.js" crossorigin="anonymous"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="css/showReview.css">
  <link rel="stylesheet" href="css/style.css" />
 

</head>
<body id="home" data-spy="scroll">
 <!-- Start header -->
 <header class="top-header">
  <nav class="navbar header-nav navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">REVIEW<span>-</span>UNI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
        <ul class="navbar-nav">
          <li><a class="nav-link active" href="index.php">Trang chủ</a></li>
          <li><a class="nav-link" href="all-uni.php">Trường học</a></li>
          <li><a class="nav-link" href="contact.php">Liên hệ</a></li>
        </ul>
      </div>
      <div class="search-box">
        <form method="POST" action="search.php">
        <input type="text" name="search" class="search-txt" placeholder="Tìm kiếm">
        <button type="submit" name="submit-search" class="search-btn"> <img src="images/search_icon.png" alt="#"> </button>
      </form>
      </div>
    </div>
  </nav>
</header>
<!-- End header -->
