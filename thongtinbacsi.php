<!DOCTYPE html>
<html>
<head>
	<title>Phòng Khám Bác Sĩ Gia Đình.</title>
	<meta charset="utf-8">
	<!-- Basic -->
	<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico?v2" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style1.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="image/png" href="image/logo.png"/>

  <!-- --------------- -->
  <!-- Basic -->

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico?v2" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style1.css">

  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
</head>
<body id="top">
<div class="hero_area">
<?php
	include ('./pages/header.php');
  if(!isset($_SESSION['tendangnhap']))
	{
		echo '<script>
            alert("Bạn phải đăng nhập");
            window.location.href="login.php";
            </script>';
	}
?>
<style>
    .section{
      padding:0px;
    }
    #wrapper #page-content-wrapper{
      width: 1200px;
    }
    #wrapper #sidebar-wrapper h5{
      padding-top:10px;
      margin-top:10px;
      margin-right:10px;
      width: 200px;
    }
    .footer{
      margin-top:0px; 
    }
    .container-fluid{
      padding-right:0px;
    }
</style>
<body id="top">

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize mb-5 text-lg">THÔNG TIN CHUNG</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our services</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>
<style>
    .section{
      padding:0px;
    }
    #wrapper{
      width: 900px;
    }
    #wrapper #sidebar-wrapper h5{
      padding-top:10px;
      margin-top:10px;
    }
    .footer{
      margin-top:0px; 
    }
    .container-fluid{
      padding-right:0px;
    }
</style>
<section class="section service-2">
	<div class="container-fluid">
    <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush ml-3">
          <style type="text/css">
              #wrapper #sidebar-wrapper h5{
                  border-bottom: solid 1px #e5e5e5;
                  line-height:30px;  
              }
          </style>
          <h5 class="font-weight-bolder" style="padding-top:15px;"><a href="./thongtinbacsi.php?pagetrang=thongtin"
          >THÔNG TIN CÁ NHÂN</a></h5>
          <h5 class="font-weight-bolder" style="padding-top:15px;"><a href="./thongtinbacsi.php?pagetrang=xemlich"
          >LỊCH KHÁM</a></h5>
          <h5 class="font-weight-bolder" style="padding-top:15px;"><a href="thongtinbacsi.php?pagetrang=lichtrong"
          >ĐĂNG KÝ LỊCH KHÁM</a></h5>
          <h5 class="font-weight-bolder" style="padding-top:15px;"><a href="thongtinbacsi.php?pagetrang=hosokhambenh"
          >HỒ SƠ KHÁM BỆNH</a></h5>
          <h5 class="font-weight-bolder" style="padding-top:15px;"><a href="./thongtinbacsi.php?pagetrang=capnhattk"
          >ĐỐI MẬT KHẨU</a></h5>
          <!-- <a href="#" class="list-group-item list-group-item-action " data-toggle="list">Events</a>
          <a href="#" class="list-group-item list-group-item-action " data-toggle="list">Profile</a>
          <a href="#" class="list-group-item list-group-item-action " data-toggle="list">Status</a> -->
        </div>
      </div>
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        </nav>
        <!-- /#wrapper -->
        <!-- Menu Toggle Script -->
      <div>
      <div style="width: 1200px;">
              <?php
                if (isset($_GET['pagetrang'])) {
                  switch ($_GET['pagetrang']) {
                    case 'thongtin':
                        include 'info_bacsi.php';
                      break;
                    case 'xemlich':
                      include ('View/doctor/xemlich.php');
                      break;
                    case 'lichtrong':
                      if(isset($_GET['deletelichkham'])){
                        include ('View/doctor/Vdeletelichtrong.php');
                      }
                      else {
                        include ('View/doctor/lichtrong.php');                        
                      }
                      break;
                    case 'capnhattk':
                      include ('doimk.php');
                      break;
                      case 'hosokhambenh':
                        include ('dshosokhambenh.php');
                        break;
                  }
                 } elseif(isset($_GET['page'])||isset($_GET['timkethuoc'])){
                   if(isset($_POST['idlich1']))
                     $_SESSION['idlich']=$_POST['idlich1'];
                   include ('View/doctor/Kethuoc.php');
                 }elseif(isset($_GET['page1'])||isset($_GET['timlichsu'])){
                  include ('View/doctor/lichsu.php');}
                else{
                  include 'info_bacsi.php';  
                }
              ?>
      </div>
	</div>
</section>
<?php
	include 'pages/footer.php';
?>

  </body>
  </html>