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

    <title>Register</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.js"></script>
</head>
<style>
    #ert,
    #ertdiachi,
    #ertsdt,
    #ertemail,
    #erttendangnhap,
    #ertmatkhau,
    #ertnlmatkhau {
        color: red;
        font-style: italic;
    }
</style>
<?php
include("QRCode/php_qr_code/qrlib.php");
include_once("Controller/cTaikhoan.php");
$p = new controlTaiKhoan();
?>
<script>
    $(document).ready(function() {
        // Check tên
        function hoten() {
            var reghoten = /^([A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+)((\s{1}[A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+){1,})$/;
            var hoten = $("#hoten").val()
            if (hoten.trim()) {
                if (reghoten.test(hoten)) {
                    $("#ert").html("")
                    return true;
                } else {
                    $("#ert").html("Họ tên ít nhất 2 từ, ký tự đầu (viết hoa) và cuối phải là chữ cái, giữa các từ chỉ có 1 dấu cách ")
                    return false;
                }
            }
            $("#ert").html("Vui lòng nhập họ tên")
            return false

        }

        $('#hoten').blur(hoten);
        $('#hoten').change(hoten)

        function diachi() {
            var regdiachi = /^([A-Za-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ0-9,.]+)((\s{1}[A-Za-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ0-9,.]+){1,})$/;
            var diachi = $("#diachi").val()
            if (diachi.trim()) {
                if (regdiachi.test(diachi)) {
                    $("#ertdiachi").html("")
                    return true;
                } else {
                    $("#ertdiachi").html("Địa chỉ ít nhất 2 từ")
                    return false;
                }
            }
            $("#ertdiachi").html("Vui lòng nhập địa chỉ")
            return false

        }

        $('#diachi').blur(diachi);
        $('#diachi').change(diachi)


        function sdt() {
            var regsdt = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
            var sdt = $("#sdt").val();
            if (sdt.trim()) {
                if (regsdt.test(sdt)) {
                    $("#ertsdt").html("");
                    return true;
                } else {
                    $("#ertsdt").html("Số điện thoại gồm 10 số nếu có nhập số 0 ở đầu tiên. Nếu không nhập 0 thì còn 9 số.");
                    return false;
                }
            }
            $("#ertsdt").html("Vui lòng nhập số điện thoại")
            return false;

        }
        $("#sdt").blur(sdt);
        $('#sdt').change(sdt)

        function email() {
            var regemail = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;
            var email = $("#email").val()
            if (email.trim()) {
                if (regemail.test(email)) {
                    $.ajax({
                        url: "ajax.php",
                        method: "POST",
                        data: {
                            dkemail: email
                        },
                        success: function(data) {
                            $('#ertemail').html(data);
                        }
                    });
                    return true;
                    // $("#erttendangnhap").html("")
                } else {
                    $("#ertemail").html("Địa chỉ không hợp lệ")
                    return false;
                }
            }
            $("#ertemail").html("Vui lòng nhập email")
            return false

        }

        $('#email').blur(email);
        $('#email').change(email)

        function tendangnhap() {
            var regtendangnhap = /^[A-Za-z0-9_\.]{6,32}$/;
            var tendangnhap = $("#tendangnhap").val();
            if (tendangnhap.trim()) {
                if (regtendangnhap.test(tendangnhap)) {
                    $.ajax({
                        url: "ajax.php",
                        method: "POST",
                        data: {
                            dktendangnhap: tendangnhap
                        },
                        success: function(data) {
                            $('#erttendangnhap').html(data);
                        }
                    });
                    // $("#erttendangnhap").html("")
                    return true;
                } else {
                    $("#erttendangnhap").html("Tên đăng nhập phải từ 6 chữ số và không quá 32 chữ số")
                    return false;
                }
            }
            $("#erttendangnhap").html("Vui lòng nhập tên đăng nhập")
            return false

        }

        $('#tendangnhap').blur(tendangnhap);
        $('#tendangnhap').change(tendangnhap)

        function matkhau() {
            var regmatkhau = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
            var matkhau = $("#matkhau").val()
            if (matkhau.trim()) {
                if (regmatkhau.test(matkhau)) {
                    $("#ertmatkhau").html("")
                    return true;
                } else {
                    $("#ertmatkhau").html("Tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt")
                    return false;
                }
            }
            $("#ertmatkhau").html("Vui lòng nhập mật khẩu")
            return false

        }

        $('#matkhau').blur(matkhau);
        $('#matkhau').change(matkhau)

        function nlmatkhau() {
            var matkhau = $("#matkhau").val()
            var nlmatkhau = $("#nlmatkhau").val()
            if (nlmatkhau.trim()) {
                if (matkhau == nlmatkhau) {
                    $("#ertnlmatkhau").html("")
                    return true;
                } else {
                    $("#ertnlmatkhau").html("Xác nhận mật khẩu không đúng")
                    return false;
                }
            }
            $("#ertnlmatkhau").html("Vui lòng nhập xác nhận mật khẩu")
            return false

        }

        $('#nlmatkhau').blur(nlmatkhau);
        $('#nlmatkhau').change(nlmatkhau);


        //  var count = 1;
        $("#btndk").click(function() {
            hoten() //  if(confirm("Bạn có chắc là muốn xóa thuốc này ko?"))
            diachi()
            sdt()
            email()
            tendangnhap()
            matkhau()
            nlmatkhau()
            if (!hoten() || !diachi() || !sdt() || !email() || !tendangnhap() || !matkhau() || !nlmatkhau()) {
                return false;
            }
            var hoten = $("#hoten").val()
            var diachi = $("#diachi").val()
            var sdt = $("#sdt").val()
            var email = $("#email").val()
            var tendangnhap = $("#tendangnhap").val()
            var matkhau = $("#matkhau").val()
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    hoten: hoten,
                    diachi: diachi,
                    sdt: sdt,
                    email: email,
                    tendangnhap: tendangnhap,
                    matkhau: matkhau
                },
                success: function(data) {
                    if (data == 0) {
                        alert("Đăng ký thành công")
                        window.location.reload()
                    } else {
                        alert("Đăng ký thất bại")
                    }

                }
            });
            //     var trnew = `<tr>
            //                     <td>${count}</td>
            //                     <td>${ten}</td>
            //                     <td>${ao}</td>
            //                     <td>${diachi}</td>
            //                     <td>${ngay}</td>
            //                     <td>${sdt}</td>
            //                     <td>${anh}</td>
            //                 </tr>`
            //     $("#lstds").append(trnew)
            //     count++

            //     document.getElementById('form').reset()

        });
    });
</script>
<?php
include_once("Controller/cTaikhoan.php");
$err = [];
function is_hoten($hoten)
{
    $parttern = "/^([A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+)((\s{1}[A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+){1,})$/";
    if (preg_match($parttern, $hoten))
        return true;
}
function is_diachi($diachi)
{
    $parttern = "/^([A-Za-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ0-9,.]+)((\s{1}[A-Za-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ0-9,.]+){1,})$/";
    if (preg_match($parttern, $diachi))
        return true;
}
function is_sodienthoai($sodienthoai)
{
    $parttern = "/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/";
    if (preg_match($parttern, $sodienthoai))
        return true;
}
function is_username($tendangnhap)
{
    $parttern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (preg_match($parttern, $tendangnhap))
        return true;
}

function is_password($matkhau)
{
    $parttern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
    if (preg_match($parttern, $matkhau))
        return true;
}

function is_email($email)
{
    $parttern = "/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/";
    if (preg_match($parttern, $email))
        return true;
}

//   function is_doctor($hoten1)//Địa chỉ
//   {
//       $parttern = "/^[^$&+,:;=?@#|'<>.^*()%!]{1,1000}$/";
//       if(Preg_match($parttern, $hoten1))
//           return true;
//    }
//    function is_ghichu($hoten1)//Địa chỉ
//   {
//       $parttern = "/^[^$&+:;=?@#|'<>^*()%!]{1,1000}$/";
//       if(Preg_match($parttern, $hoten1))
//           return true;
//    }
if (isset($_REQUEST["submit"])) {
    $hoten = $_REQUEST['hoten'];
    $diachi = $_REQUEST['diachi'];
    $sodienthoai = $_REQUEST['sdt'];
    $email = $_REQUEST['email'];
    $tendangnhap = $_REQUEST["tendangnhap"];
    $matkhau = $_REQUEST["matkhau"];
    //$matkhau=md5($pass);
    $nlmatkhau = $_REQUEST["nlmatkhau"];
    $quyen = 0;
    $p = new controlTaiKhoan();
    $kq = $p->getTaikhoanbyTenDangNhap($tendangnhap);
    $ktemail = $p->getTaikhoanbyEmail($email);
    //     if(isset($tendangnhap)){
    // //   $sql_check = "SELECT * FROM taikhoan where tendangnhap = '$tendangnhap'";
    //   $result_check = $p->TenTaikhoan($tendangnhap);
    //   if(mysqli_num_rows($result_check) > 0)
    //   {
    //     $err['err_check'] = "*Tên đăng nhập đã được sử dụng";
    //   }
    // }else{
    //if(empty($tendangnhap) || empty($matkhau)){
    if (empty($hoten)) {
        $err['hoten'] = 'Bạn chưa nhập họ tên';
    } else if (!is_hoten($hoten)) {
        $err['hoten'] = "Họ tên ít nhất 2 từ, ký tự đầu (viết hoa) và cuối phải là chữ cái, giữa các từ chỉ có 1 dấu cách ";
    } elseif (empty($diachi)) {
        $err['diachi'] = 'Bạn chưa nhập địa chỉ';
    } else if (!is_diachi($diachi)) {
        $err['diachi'] = "Địa chỉ ít nhất 2 từ";
    } elseif (empty($sodienthoai)) {
        $err['sdt'] = 'Bạn chưa nhập số điện thoại';
    } else if (!is_sodienthoai($sodienthoai)) {
        $err['sdt'] = "Số điện thoại gồm 10 số nếu có nhập số 0 ở đầu tiên. Nếu không nhập 0 thì còn 9 số.";
    } elseif (empty($email)) {
        $err['email'] = 'Bạn chưa nhập email';
    } else if (!is_email($email)) {
        $err['email'] = "Email không đúng";
    }else if (mysqli_num_rows($ktemail) > 0) {
        $err['email'] = "Email đã tồn tại!";
    } elseif (empty($tendangnhap)) {
        $err['tendangnhap'] = 'Bạn chưa nhập tên đăng nhập';
    } else if (!is_username($tendangnhap)) {
        $err['tendangnhap'] = "Tên đăng nhập phải từ 6 chữ số và không quá 32 chữ số";
    } else if (mysqli_num_rows($kq) > 0) {
        $err['tendangnhap'] = "Tên đăng nhập đã tồn tại!";
    } elseif (empty($matkhau)) {
        $err['matkhau'] = 'Bạn chưa nhập mật khẩu';
    } else if (!is_password($matkhau)) {
        $err['matkhau'] = "Tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt";
    } else if ($matkhau != $nlmatkhau) {
        $err['nlmatkhau'] = 'Mật khẩu nhập lại không đúng';
    }
    //}
    else {
        // $_SESSION['tendangnhap']= $tendangnhap;
        //$_SESSION['quyen'] = $row['quyen'];


        $pass = md5($matkhau);
        $kq = $p->InsertTaikhoan($tendangnhap, $pass, $email, $quyen);
        if ($kq = 1) {


            $tblmataikhoan = $p->getmaTaikhoan($tendangnhap);
            $mataikhoan = mysqli_fetch_assoc($tblmataikhoan);
            echo '<script>
                        alert("Đăng ký thành công");
                        window.location.href="login.php";
                        </script>';
            //echo $mataikhoan['mataikhoan'];
            // echo '<script>alert("Đăng ký thành công")</script>';
            // echo header("refresh: 0; url='login.php'");
            //$mataikhoan=$_SESSION['mataikhoan'];
            //$kq = $p->InsertHogiadinh();
            //$mahogiadinh=$_SESSION['mahogiadinh'];
            //echo $hoten,$diachi,$sodienthoai,$mataikhoan['mataikhoan'];
            $bn = $p->InsertBenhnhan($hoten, $diachi, $sodienthoai, $mataikhoan['mataikhoan']);
            if($bn == 1){
                $qr_code_file_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'images/qr_images'.DIRECTORY_SEPARATOR;
                //echo $qr_code_file_path;
                $set_qr_code_path = 'images/qr_images/';
                
                //Set a file name of each generated QR code
                $filename = $qr_code_file_path.time().'.png';
                //$file = 
                /* All the user generated data must be sanitize before the processing */
                $errorCorrectionLevel = "Q";
                //$codeContents = rand(1000000, 9999999);
                $matrixPointSize = "4";
                //NỘI DUNG
                $frm_link = $hoten." / ".$diachi." / ".$sodienthoai." / ".$email;
                // After getting all the data, now pass all the value to generate QR code.
                //QRcode::png($frm_link, $pngAbsoluteFilePath); 
                QRcode::png($frm_link, $filename, $errorCorrectionLevel, $matrixPointSize, 3);
                // 
                //INSERT BẢNG QRCODE LƯU THÔNG TIN KIỂM ĐỊNH
                $insert_qr = $p -> updateqrcode($mataikhoan['mataikhoan'],basename($filename));
                if($insert_qr == 1){
                    echo "<script>alert('OK')</script>";
                }
            }else{
                echo "thất bại";
            }
        } else
            echo '<script>
                    alert("Đăng ký thất bại");
                    window.location.href="register.php";
                    </script>';
    }
    //}
    // }else{
    //     echo '<script>
    //       alert("Vui lòng nhập đầy đủ thông tin");
    //       window.location.href="register.php";
    //     </script>';
    // }
    // if(empty($tendangnhap))
    // {
    //   $err['tendangnhap'] = '*Bạn chưa nhập tên đăng nhập';
    // }
    // else if(!is_username($tendangnhap)) {
    //     $err['tendangnhap'] = "*Tên đăng nhập phải từ 6 chữ số và không quá 32 chữ số";
    // }else if($repass == $matKhau){
    //     $kq = $p->InsertTaikhoan($tenDangNhap,$matKhau,$quyen);
    //     echo '<script>alert("Đăng ký thành công")</script>';
    //     echo header("refresh: 0; url='login.php'");
    // }else{
    //     echo '<script>alert("Nhập lại mật khẩu không trùng khớp!")</script>';
    //     echo header("refresh: 0; url='logout.php'");
    // } 
}
?>

<div class="hero_area">
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
    <form action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h1 class="section-title position-relative text-center">Đăng ký</h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="contact-form bg-light rounded p-5">
                            <div id="success"></div>
                            <form action="" method="GET" id="form">
                                <div class="control-group">
                                    <label for="pwd">Họ Tên:</label>
                                    <input type="text" onblur="hoten()" class="form-control" name="hoten" id="hoten" placeholder="Họ tên ít nhất 2 từ (a-z), ký tự đầu và cuối phải là chữ cái, giữa các từ chỉ có 1 dấu cách">
                                    <div id="ert"><?php echo (isset($err['hoten'])) ? $err['hoten'] : '' ?></div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <label for="pwd">Địa chỉ:</label>
                                    <input type="text" class="form-control" onblur="diachi()" name="diachi" id="diachi" placeholder="Địa chỉ ít nhất 2 từ">
                                    <div id="ertdiachi"><?php echo (isset($err['diachi'])) ? $err['diachi'] : '' ?> </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <label for="pwd">Số điện thoại:</label>
                                    <input type="text" class="form-control" onblur="sdt()" name="sdt" id="sdt" placeholder="Số điện thoại gồm 10 số nếu có nhập số 0 ở đầu tiên. Nếu không nhập 0 thì còn 9 số.">
                                    <div id="ertsdt"> <?php echo (isset($err['sdt'])) ? $err['sdt'] : '' ?> </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <label for="pwd">Email:</label>
                                    <input type="text" class="form-control" onblur="email()" name="email" id="email" placeholder="******@gmail.com">
                                    <div id="ertemail"> <?php echo (isset($err['email'])) ? $err['email'] : '' ?> </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <label for="uname">Tên Đăng Nhập:</label>
                                    <input type="text" class="form-control" onblur="tendangnhap()" name="tendangnhap" id="tendangnhap" placeholder="Nhập tên đăng nhập từ 6 chữ số">
                                    <div id="erttendangnhap"> <?php echo (isset($err['tendangnhap'])) ? $err['tendangnhap'] : '' ?> </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <label for="pwd">Mật Khẩu:</label>
                                    <input type="password" class="form-control" onblur="matkhau()" name="matkhau" id="matkhau" placeholder="Tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt">
                                    <div id="ertmatkhau"> <?php echo (isset($err['matkhau'])) ? $err['matkhau'] : '' ?> </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <label for="pwd">Xác nhận mật khẩu:</label>
                                    <input type="password" class="form-control" onblur="nlmatkhau()" name="nlmatkhau" id="nlmatkhau" placeholder="Nhập lại mật khẩu">
                                    <div id="ertnlmatkhau"> <?php echo (isset($err['nlmatkhau'])) ? $err['nlmatkhau'] : '' ?> </div>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <input class="btn btn-primary btn-block" type="submit" id="btndk" name="submit" value="Đăng Ký">
                                    <!-- <input style="width: 100%;" type="button" class="btn btn-success" data-dismiss="modal" id="btndk" value="Lưu"> -->
                                </div>
                                <div class="btn btn-block py-3 px-5">
                                    <span>Bạn đã có tài khoản! <a href="./login.php">Đăng Nhập</a></span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <!-- Contact End -->
    <?php include 'pages/footer.php'; ?>