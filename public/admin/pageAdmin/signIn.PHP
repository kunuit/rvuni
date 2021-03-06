<?php

    $connect = mysqli_connect('localhost', 'root', '');
    
    if(!$connect){
        die('Lỗi kết nối: '.mysqli_connect_error($connect));
        exit();
    }

    mysqli_select_db($connect, 'manage_user');
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    $username = $_POST['intoInfo'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin a WHERE a.username='$username' AND a.password='$password';";
    // echo $sql;
    $result = mysqli_query($connect,$sql);
    // $row = mysqli_fetch_assoc($result);
    // echo '<pre>';
    // print_r($row);  
    // echo '</pre>';
    if($result->num_rows > 0){
        echo '<script> alert("đăng nhập thành công");</script>';
        header ( "location: dashboard.html");
    }else{
        echo '<script> alert("sai ten dang nhap hoac mat khau");</script>';
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/styles/images/tempsnip.png">
  <link rel="icon" type="image/png" href="../assets/styles/images/tempsnip.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sign In
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/4f433ce5a6.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <!-- my css -->
  <link rel="stylesheet" href="../assets/styles/signIn.css">
</head>

<body>
  <!-- fb login -->
  <!-- <script>
    window.fbAsyncInit = function () {
      FB.init({
        appId: '215734066241739',
        cookie: true,
        xfbml: true,
        version: 'v6.0'
      });

      FB.AppEvents.logPageView();

    };

    (function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) { return; }
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script> -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=215734066241739&autoLogAppEvents=1"></script>

  <div class="container">
    <div class="row">
      <div class="lds-ellipsis loading">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
      <form action="http://localhost/rv/public/admin/pageAdmin/signIn.PHP" method="POST" style="margin: auto;
        width: 70%;" class="loginForm">
        <div class="header-form text-center">
          <div class="logo">
            <a href="#" class="simple-text logo-normal">
              <img src="../assets/styles/images/tempsnip.png" width="40" height="40" class="d-inline-block align-top"
                alt="reviewUOFIT">
            </a>
          </div>
          <div class="title-form">
            <h2>Sign in</h2>
            <p>Use your Admin Account</p>
          </div>
        </div>
        <div class="form-group">
          <label for="intoInfo">Username or Email</label>
          <input type="text" class="form-control" id="intoInfo" aria-describedby="emailHelp" name="intoInfo">
          <div class="error errInfo mt-3 mb-3"></div>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password">
          <div class="error errPassword mt-3 mb-3"></div>
        </div>
        <div class="form-group">
          <a href="./recovery.html">Forgot password ?</a>
        </div>
        <div class="form-group">
          <div class="fb-login-button" data-width="" onlogin="checkLoginState();" data-size="large"
            data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="false"></div>
        </div>
        <button type="submit" class="btn btn-success float-right" id="loginButton">Sign In</button>
        <div class="createA">
          <a href="./signUp.html">Create Account</a>
        </div>
      </form>
    </div>
  </div>

  <!-- script styles -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="../assets/scripts/signIn.js"></script>
</body>

</html>