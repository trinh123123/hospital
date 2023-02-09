<?php
  session_start();
if(!isset($_SESSION['matkhau'])){
// echo header("refresh:0;url='index.php'");
echo "<script type='text/javascript'>  window.location='index.php'; </script>";
}else{
  if($_SESSION['quyen'] == 0){
      echo "<script type='text/javascript'>  window.location='index.php'; </script>";
   }
   elseif($_SESSION['quyen'] == 1){
      echo "<script type='text/javascript'>  window.location='index.php'; </script>";
   }else{
   }
       
 }
?>
<?php
	//include_once('../Controller/cTaikhoan.php');
	// Start Session
    //session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="/images/logo.png">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>

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
  <link rel="shortcut icon" type="image/x-icon" href="/images/logo.png" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style1.css">
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
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./font/fontawesome-free-5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./css/form.css">
</head>

<style>
  *{
    box-sizing: border-box;
  }
  main#view-panel{
    margin-left: 50px;
    width: 90%;

  }
  .card{
    width: 95%;
  }
  body {
    background: #80808045;
  }

  .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }

  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }
</style>

<body>
  <div class="hero_area">

<header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="giaodienadmin.php?page=home">
            <img src="images/logo.png" alt="">
            <span>
              PHÒNG KHÁM GIA ĐÌNH
            </span>
          </a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
          </div>
            <div class="quote_btn-container  d-flex justify-content-center">
            <a href="logout.php" ><i class="fa fa-power-off"></i> Đăng Xuất</a>
            </div>
          </div>
        </nav>
      </div>
    </header>
  
<?php
    // if (isset($_GET['page'])) {
    //   switch ($_GET['page']) {
    //     case 'home':
    //       include 'home.php';
    //       break;
    //     case 'lichhen':
    //       include 'View/lichkham.php';
    //       break;
    //     case 'doctors':
    //           if(isset($_GET['idsua'])){
    //             if(isset($_POST['Cancel'])){
    //               include 'View/bacsi.php';
    //             }
    //             else{
    //               include 'Controller/suabacsi.php';
    //             }
    //           }
    //           else {
    //             include 'View/bacsi.php';
    //           }
    //         break;
    //     case 'appointments':
    //       if(isset($_GET['idsua'])){
    //         if(isset($_POST['thoat'])){
    //           include 'View/lich.php';
            
    //         }
    //         else{
    //           include 'Controller/sualich.php';
    //         }
    //       }
    //       else {
    //         include 'View/lich.php';
    //       }
    //       break;
    //     case 'categories':
    //       if(isset($_GET['idsua'])){
    //         if(isset($_POST['Cancel3'])){
    //           include 'View/khoa.php';
    //         }
    //         else{
    //           include 'Controller/suakhoa.php';
    //         }
    //       }
    //       else {
    //         include 'View/khoa.php';
    //       }
    //       break;
    //       case 'users':
    //         if(isset($_GET['idsua'])){
    //           if(isset($_POST['Cancel4'])){
    //             include 'View/nguoidung.php';
    //           }
    //           else{
    //             include 'Controller/suataikhoan.php';
    //           }
    //         }
    //         else {
    //           include 'View/nguoidung.php';
    //         }
    //         break;
    //           case 'thuoc':
    //             if(isset($_GET['idsua'])){
    //               if(isset($_POST['Cancel5'])){
    //                 include 'View/thuoc.php';
    //               }
    //               else{
    //                 include 'Controller/suathuoc.php';
    //               }
    //             }
    //             else {
    //               include 'View/thuoc.php';
    //             }
    //             break;

    //           case 'phongkham':
    //             if(isset($_GET['idsua'])){
    //               if(isset($_POST['Cancel7'])){
    //                 include 'View/phongkham.php';
    //               }
    //               else{
    //                 include 'Controller/suaphongkham.php';
    //               }
    //             }
    //             else {
    //               include 'View/phongkham.php';
    //             }
    //             break;
              
    //   }
    // } else {
    //   echo 'lỗi';
    // };
    ?>

<style>
    .section{
      padding:0px;
	  padding-top:50px;
    width: 100%;
    }
    #wrapper #sidebar-wrapper h5{
      padding-top:10px;
      margin-top:10px;
      margin-left:10px;
      width: 200px;


      
      
    }
    .footer{
      margin-top:0px; 
      
    }
    .container-fluid{
      padding-right:0px;
      padding-left:0px;
      
    }
</style>
<section class="section service-2">
	<div class="container-fluid">
    <div class="d-flex" id="wrapper">
      
      <div  class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush ml-3">
          <style type="text/css">
              #wrapper #sidebar-wrapper h5{
                  border-bottom: solid 1px #e5e5e5;
                  line-height:30px;  
              }
          </style>
          <h5 class="font-weight-bolder" style="padding-top:15px;"><a href="giaodienadmin.php?page=home" class="nav-item nav-home">
			<span class='icon-field'><i class="fa fa-home"></i></span> Trang chủ</a></h5>
          <h5 class="font-weight-bolder" style="padding-top:15px;"><a href="giaodienadmin.php?page=appointments" class="nav-item nav-appointments">
			<span class='icon-field'><i class="fa fa-calendar"></i></span> Lịch làm việc</a></h5>
          <h5 class="font-weight-bolder" style="padding-top:15px;"><a href="giaodienadmin.php?page=lichhen" class="nav-item nav-appointments">
			<span class='icon-field'><i class="fa fa-calendar"></i></span> Lịch hẹn</a></h5>
          <h5 class="font-weight-bolder" style="padding-top:15px;"><a href="giaodienadmin.php?page=doctors" class="nav-item nav-doctors">
			<span class='icon-field'><i class="fa fa-user-md"></i></span> Bác sĩ</a></h5>
      <h5 class="font-weight-bolder" style="padding-top:15px;"><a href="giaodienadmin.php?page=hskb" class="nav-item nav-doctors">
			<span class='icon-field'><i class='fas fa-file-alt'></i></span> Hồ sơ khám bệnh</a></h5>
			<h5 class="font-weight-bolder" style="padding-top:15px;"><a href="giaodienadmin.php?page=users" class="nav-item nav-users">
				<span class='icon-field'><i class="fa fa-users"></i></span> Người dùng</a></h5>
			<h5 class="font-weight-bolder" style="padding-top:15px;"><a href="giaodienadmin.php?page=thuoc" class="nav-item nav-users">
				<span class='icon-field'><i class="fa fa-book-medical"></i></span> Thuốc</a></h5>
        </div>
      </div>
      <main id="view-panel">
    <?php
    if (isset($_GET['page'])) {
      switch ($_GET['page']) {
        case 'home':
        ?><div class="containe-fluid">


        <div class="row mt-3 ml-3 mr-3">
                <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <?php echo "Xin chào Admin !"  ?>
                        
                    </div>
                </div>
    
        </div>
    
    </div><?php
          //include 'home.php';
          break;
        case 'lichhen':
          include 'View/lichkham.php';
          break;
          case 'doctors':
            if(isset($_GET['editbacsi'])){
              // if(isset($_POST['Cancel'])){
              //   include 'View/bacsi.php';
              // }
              // else if($_REQUEST["editbacsi"]==1 && ($_GET['page']=='doctors')){
              //   echo $_REQUEST["editbacsi"];
                include("View/vEditBacSi.php");
              // }
              // else{
              //   include 'Controller/admin/suabacsi.php';
              // }
            } else if (isset($_GET['deletebacsi'])){
              include("View/vDeleteBacSi.php");
            }
            else{
              include 'View/bacsi.php';
            }
          break;

          case 'hskb':
            if(isset($_GET['editbacsi'])){
              // if(isset($_POST['Cancel'])){
              //   include 'View/bacsi.php';
              // }
              // else if($_REQUEST["editbacsi"]==1 && ($_GET['page']=='doctors')){
              //   echo $_REQUEST["editbacsi"];
                include("View/vEditBacSi.php");
              // }
              // else{
              //   include 'Controller/admin/suabacsi.php';
              // }
            } else if (isset($_GET['deletebacsi'])){
              include("View/vDeleteBacSi.php");
            }
            else{
              include 'View/hosokhambenh.php';
            }
          break;

        case 'appointments':
          if(isset($_GET['editlichkham'])){
            include("View/Editlich.php");
          }
          elseif(isset($_GET['deletelichkham'])){
            include("View/Deletelich.php");

          }                   
          else {
            include 'View/lich.php';
          }
          break;
        case 'categories':
          if(isset($_GET['idsua'])){
            if(isset($_POST['Cancel3'])){
              include 'View/khoa.php';
            }
            else{
              include 'Controller/admin/suakhoa.php';
            }
          }
          else {
            include 'View/khoa.php';
          }
          break;
          case 'users':
            if(isset($_GET['suatk'])){
              if(isset($_POST['Cancel4'])){
                include 'View/nguoidung.php';
              }
              else{
                include 'View/Editnguoidung.php';
              }
            }
            else {
              include 'View/nguoidung.php';
            }
            break;
              case 'thuoc':
                if(isset($_GET['editthuoc'])){
                  
                    include 'View/Editthuoc.php';
                  }
                else if (isset($_GET['deletethuoc'])){
                  include "View/DeleteThuoc.php";
                }
                else {
                  include 'View/thuoc.php';
                }
                break;

              case 'phongkham':
                if(isset($_GET['idsua'])){
                  if(isset($_POST['Cancel7'])){
                    include 'View/phongkham.php';
                  }
                  else{
                    include 'Controller/admin/suaphongkham.php';
                  }
                }
                else {
                  include 'View/phongkham.php';
                }
                break;
              
      }
    } else {
      echo 'lỗi';
    };
    ?>

  </main>
      <!-- <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        </nav>
        
       
      <div> -->
      <div>
              <?php
                // if (isset($_GET['pagetrang'])) {
                //   switch ($_GET['pagetrang']) {
                //     case 'thongtin':
                //         include './info.php';
                        
                //       break;
                //     case 'xemlich':
                //       include ('./benhnhan/xemlich.php');
                //       break;
                //     case 'lichsu':
                //         include ('./benhnhan/lichsu.php');
                //         break;
                //     case 'capnhattk':
                //       include ('./benhnhan/doimk.php');
                //       break;
                //   }
                // }elseif(isset($_GET['page2'])||isset($_GET['timkiembn'])){
                //   include ('benhnhan/lichsu.php');}
                // elseif(isset($_GET['xemthuoc'])){
                //     include ('./benhnhan/xuatthuoc.php');
                // }
                // else{
                //   include './benhnhan/info_patient.php';  
                // }
              ?>
      </div>
	</div>
</section>
  <!-- <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
  

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
          <div id="delete_content"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div> -->
</body>
<script>
  // window.start_load = function() {
  //   $('body').prepend('<di id="preloader2"></di>')
  // }
  // window.end_load = function() {
  //   $('#preloader2').fadeOut('fast', function() {
  //     $(this).remove();
  //   })
  // }

  // window.uni_modal = function($title = '', $url = '', $size = "") {
  //   start_load()
  //   $.ajax({
  //     url: $url,
  //     error: err => {
  //       console.log()
  //       alert("An error occured")
  //     },
  //     success: function(resp) {
  //       if (resp) {
  //         $('#uni_modal .modal-title').html($title)
  //         $('#uni_modal .modal-body').html(resp)
  //         if ($size != '') {
  //           $('#uni_modal .modal-dialog').addClass($size)
  //         } else {
  //           $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
  //         }
  //         $('#uni_modal').modal('show')
  //         end_load()
  //       }
  //     }
  //   })
  // }


  // window._conf = function($msg = '', $func = '', $params = []) {
  //   $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
  //   $('#confirm_modal .modal-body').html($msg)
  //   $('#confirm_modal').modal('show')
  // }
  // window.alert_toast = function($msg = 'TEST', $bg = 'success') {
  //   $('#alert_toast').removeClass('bg-success')
  //   $('#alert_toast').removeClass('bg-danger')
  //   $('#alert_toast').removeClass('bg-info')
  //   $('#alert_toast').removeClass('bg-warning')
  //   if ($bg == 'success')
  //     $('#alert_toast').addClass('bg-success')
  //   if ($bg == 'danger')
  //     $('#alert_toast').addClass('bg-danger')
  //   if ($bg == 'info')
  //     $('#alert_toast').addClass('bg-info')
  //   if ($bg == 'warning')
  //     $('#alert_toast').addClass('bg-warning')
  //   $('#alert_toast .toast-body').html($msg)
  //   $('#alert_toast').toast({
  //     delay: 3000
  //   }).toast('show');
  // }
  // $(document).ready(function() {
  //   $('#preloader').fadeOut('fast', function() {
  //     $(this).remove();
  //   })
  // })
</script>

</html>