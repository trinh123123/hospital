<?php 
include('./google-source.php');

    session_start();
    if(isset($_SESSION['tendangnhap'])){
        // echo header("refresh:0;url='index.php'");
        echo '<script>
        window.location.href="index.php";
      </script>';
    }else{"";}
    if(isset($_SESSION['matkhau'])){
        // echo header("refresh:0;url='logout.php'");
        echo '<script>
        window.location.href="logout.php";
      </script>';
    }else{"";}
    include_once('Controller/cTaikhoan.php');
    $p=new controlTaikhoan();

    if(isset($_POST['submit'])){
        $tendangnhap=$_POST['tendangnhap'];
        $matkhau=$_POST['matkhau'];
        $matkhau=md5($matkhau);
        $tblrow=$p->XuatTaikhoan($tendangnhap,$matkhau);
        $row=mysqli_fetch_assoc($tblrow);
        if (!$tendangnhap || !$matkhau) {
            echo '<script>
              alert("Sai tài khoản - mật khẩu");
              window.location.href="./login.php";
            </script>';

        }
        elseif(mysqli_num_rows($tblrow)<1)
        {
            // echo "<script> alert('Sai tài khoản - mật khẩu')</script>";

            // echo header("refresh:0;url='./login.php'");
            echo '<script>
              alert("Sai tài khoản - mật khẩu");
              window.location.href="./login.php";
            </script>'; 
        }else{
            
             $_SESSION['matkhau']= $matkhau;
             $_SESSION['tendangnhap']= $tendangnhap;
             $tblmataikhoan = $p->getmaTaikhoan($tendangnhap);
            $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);
             $_SESSION['mataikhoan']= $mataikhoan['mataikhoan'];
             if($row['quyen'] == 0){
              echo '<script>
              alert("Đăng Nhập Thành Công");
              window.location.href="index.php";
            </script>'; 
            // echo $mataikhoan['mataikhoan'];
            
                $_SESSION['quyen']=0;
             }
             elseif($row['quyen'] == 1){
              echo '<script>
              alert("Đăng Nhập Thành Công với tài khoản Bác Sĩ");
              window.location.href="index.php";
            </script>';
                $_SESSION['quyen']=1;
             }
             elseif($row['quyen'] == 2){
              echo '<script>
              alert("Đăng nhập trang Admin");
              window.location.href="giaodienadmin.php?page=home";
            </script>';
                $_SESSION['quyen']=2;
             }
         }
    }

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Login</title>

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
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./font/fontawesome-free-5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./css/form.css">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />

  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />


    <style>
      .btn-google{
        color:white;
      }
      .btn-google:hover {
        color:white;
        text-decoration:none;
      }
    </style>
</head>
<div class="hero_area">
<?php
	//include 'pages/header.php';
?>
<header class="header_section">
<div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="">
            <span>
              PHÒNG KHÁM GIA ĐÌNH
            </span>
          </a>
        </nav>
</div>
</header>
    <!-- Contact Start -->
    <form  action="" method="post" enctype="multipart/form-data"   novalidate="novalidate">
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5">Đăng nhập</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="contact-form bg-light rounded p-5">
                        <div id="success"></div>
                        <form  >

                            <div class="control-group">
                                <input type="text" class="form-control "  name="tendangnhap" id="tendangnhap" placeholder="Tên đăng nhập" required="required" data-validation-required-message="Không được để trống" >
                                
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="password" class="form-control " name="matkhau" id="matkhau" placeholder="Mật khẩu" required="required" data-validation-required-message="Không được để trống" >
                                <p class="help-block text-danger"></p>
                            </div>
                            <div >
                                <input class="btn btn-primary btn-block" type="submit" name="submit" value="Đăng Nhập" >
                                <!-- <span style="text-align: center;">Hoặc</span> -->
                                <center>Hoặc</center>
                                
                                <button type="submit" class="btn btn-danger btn-sign btn-regis"><i class="icon-gg fab fa-google-plus-g" style='font-size:25px'>&nbsp;&nbsp;</i>
                                  <?php if(isset($authUrl)){ ?>
                                      <a href="<?php echo $authUrl ?>" class='btn-google'> Đăng Nhập bằng Google</a>
                                  <?php } ?>
                                </button>
                            </div>
                            <div class="btn btn-block py-3 px-5">
                              <span>Bạn chưa có tài khoản! <a href="./register.php">Đăng Ký</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </form>
    <!-- Contact End -->
</div>   
    <?php include 'pages/footer.php'; ?>