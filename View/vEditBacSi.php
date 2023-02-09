<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
    $err = [];
    function is_hoten($tenBacSi) {
        $parttern = "/^([A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+)((\s{1}[A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+){1,})$/";
        if (preg_match($parttern, $tenBacSi))
            return true;
    }
    function is_email($email){
        $parttern = "/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/";
        if (preg_match($parttern, $email))
            return true;
    }
    include_once("./QRCode/php_qr_code/qrlib.php");
    include_once ("./Controller/cBacSi.php");
    $p = new controlBacSi();

    $maBacSi = $_REQUEST["maBacSi"];
    $tblbacsi = $p->getBacSi($maBacSi);
    // $tblmataikhoan=mysqli_fetch_assoc($tblbacsi);
    
    if($tblbacsi){
        if(mysqli_num_rows($tblbacsi) > 0){
            while($row = mysqli_fetch_assoc($tblbacsi)){
                $maBacSi = $row["mabacsi"];
                $tenBacSi = $row["tenbacsi"];
                $hinhanh = $row["hinhanh"];
                $chuyenmon = $row["chuyenmon"];
                // $email = $row["email"];
                $mataikhoan=$row['mataikhoan'];
            }
        }
    }

    $tblmatkhau=$p->getTaiKhoan($mataikhoan);
        $matkhau=mysqli_fetch_assoc($tblmatkhau);
    if(isset($_REQUEST["submit"])){
        $tenBacSi = trim($_REQUEST["txttenBacSi"]);
        $ID= $_REQUEST["maBacSi"];
        // $mataikhoan= $_REQUEST["mataikhoan"];
        $email=$_REQUEST['txtemail'];
        $chuyenmon = $_REQUEST["txtchuyenmon"];
        $file = $_FILES["txthinh"]["tmp_name"];
        $type = $_FILES["txthinh"]["type"];
        $name = $_FILES["txthinh"]["name"];
        $size = $_FILES["txthinh"]["size"];
        // include_once ("Controller/cTaikhoan.php");
        // $tk=new controlTaikhoan();
        $ktemail = $p->getAllTaikhoanbyEmail($email);
        // echo $file ."<br>";     
        
        // echo $tenBacSi ."<br>";
        // echo $file ."<br>";
        // echo $type ."<br>";
        // echo $name ."<br>";
        // echo $size."<br>";
        // echo $chuyenmon ."<br>";
        // echo $ID ."<br>";
        
        if(empty($tenBacSi)){
            echo '<script>alert("Bạn chưa nhập họ tên");window.location.href="giaodienadmin.php?page=doctors";</script>';
        }else if(!is_hoten($tenBacSi)) {
            echo '<script>alert("Họ tên ít nhất 2 từ, ký tự đầu (viết hoa) và cuối phải là chữ cái, giữa các từ chỉ có 1 dấu cách")</script>';
        }else if (!is_email($email)) {
            // echo '<script>
            //     alert("*Email không đúng");
            //     window.location.href="giaodienadmin.php?page=doctors";
            //   </script>';
        }else if ((mysqli_num_rows($ktemail) > 0) && ($matkhau['email']!=$email)) {
            echo '<script>
                alert("*Email đã tồn tại!");
                window.location.href="giaodienadmin.php?page=doctors";
              </script>';
        }else{
            // include './Controller/cTaikhoan.php';
            // $tk=new controlTaikhoan();
            // $tblmataikhoan=$tk->ThongTinBacsi($tendangnhap);//executeSingLesult($sql)
            // $dsbacsi=mysqli_fetch_assoc($ID);
            // $anh=$dsbacsi['hinhanh'];
            // include './Controller/cTaikhoan.php';
            // $tk=new controlTaikhoan();
            
            if(!empty($_FILES["txthinh"]["name"])){
                $anh=$hinhanh;
                
                $anh=$p->UpdateAnhBacsi($ID,$name,$type,$file,$size);
                if($anh == 1){
                    if (file_exists('./images/bacsi/'.$anh)) {
                        unlink('./images/bacsi/'.$anh);
                    }
                    $kq = $p->UpdateThongtinbacsi($ID,$tenBacSi,$chuyenmon);
                    $kq2=$p->UpdateEmail($email,$mataikhoan);
            
                    if($kq == 1 && $kq2 == 1){
                        echo '<script>alert("Sửa thông tin bác sĩ thành công"); window.location.href="giaodienadmin.php?page=doctors"</script>';
                     
                    $qr_code_file_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'../images/qr_images'.DIRECTORY_SEPARATOR;
                        //echo $qr_code_file_path;
                        $set_qr_code_path = '../images/qr_images/';
                        
                        //Set a file name of each generated QR code
                        $filename = $qr_code_file_path.time().'.png';
                        //$file = 
                        /* All the user generated data must be sanitize before the processing */
                        $errorCorrectionLevel = "Q";
                        //$codeContents = rand(1000000, 9999999);
                        $matrixPointSize = "4";
                        //NỘI DUNG
                        $frm_link = $tenBacSi." / ".$chuyenmon." / ".$email;
                        // After getting all the data, now pass all the value to generate QR code.
                        //QRcode::png($frm_link, $pngAbsoluteFilePath); 
                        QRcode::png($frm_link, $filename, $errorCorrectionLevel, $matrixPointSize, 3);
                        // 
                        //INSERT BẢNG QRCODE LƯU THÔNG TIN KIỂM ĐỊNH
                        unlink('../images/qr_images/'.$matkhau['qrcode']);
                        $insert_qr = $p -> updateqrcodebs($mataikhoan,basename($filename));
                        if($insert_qr == 1){
                            echo "<script>alert('OK')</script>";
                        }
                    }elseif($kq == 0 && $kq2 == 0){
                        echo '<script>
                            alert("Cập nhật thông tin thất bại");
                            window.location.href="giaodienadmin.php?page=doctors";
                        </script>';
                    }else{
                        echo "Lỗi";
                    }
                }elseif($anh == 0){
                        $err['txthinh'] = "*Cập nhật ảnh thất bại";
                }elseif($anh == -1){
                        $err['txthinh'] = "*Không thể upload";
                }elseif($anh == -2){
                        $err['txthinh'] = "*Sai kích thước";
                }elseif($anh == -3){
                        $err['txthinh'] = "*Không đúng loại file";
                }else{
                    $err['txthinh'] = "*Lỗi";
                }
                
            }else{
                 $kq = $p->UpdateThongtinbacsi($ID,$tenBacSi,$chuyenmon);
                 $kq2=$p->UpdateEmail($email,$mataikhoan);
                // $hoten = $tenBacSi;
                 if($kq == 1 && $kq2 == 1){
                    echo '<script>alert("Sửa thông tin bác sĩ thành công"); window.location.href="giaodienadmin.php?page=doctors"</script>';
                     
                    $qr_code_file_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'../images/qr_images'.DIRECTORY_SEPARATOR;
                        //echo $qr_code_file_path;
                        $set_qr_code_path = '../images/qr_images/';
                        
                        //Set a file name of each generated QR code
                        $filename = $qr_code_file_path.time().'.png';
                        //$file = 
                        /* All the user generated data must be sanitize before the processing */
                        $errorCorrectionLevel = "Q";
                        //$codeContents = rand(1000000, 9999999);
                        $matrixPointSize = "4";
                        //NỘI DUNG
                        $frm_link = $tenBacSi." / ".$chuyenmon." / ".$email;
                        // After getting all the data, now pass all the value to generate QR code.
                        //QRcode::png($frm_link, $pngAbsoluteFilePath); 
                        QRcode::png($frm_link, $filename, $errorCorrectionLevel, $matrixPointSize, 3);
                        // 
                        //INSERT BẢNG QRCODE LƯU THÔNG TIN KIỂM ĐỊNH
                        unlink('../images/qr_images/'.$matkhau['qrcode']);
                        $insert_qr = $p -> updateqrcodebs($mataikhoan,basename($filename));
                        if($insert_qr == 1){
                            echo "<script>alert('OK')</script>";
                        }
                }elseif($kq == 0 && $kq2 == 0){
                    echo '<script>
                        alert("Cập nhật thông tin thất bại");
                        window.location.href="giaodienadmin.php?page=doctors";
                    </script>';
                }else{
                    echo "Lỗi";
                }
            }
            
            
           

        }
    }
?>
<?php
        
    ?>

<!-- <body> 
    <form style="display: inline-block;" action="#" method="post" enctype="multipart/form-data">
        <h2>Sửa Thông Tin Bác Sĩ</h2>
        <table style="width: 400px;">
            <tr>
                <td style="width: 100px; text-align: right; border: none;"><span>Tên bác sĩ:</span></td>
                <td style="border: none;">
                    <input style="width: 97%; height: 20px;" type="text" name="txttenBacSi" value="<?php echo $tenBacSi?>">
                </td>
            </tr>
            <tr>
                <td style="width: 100px; text-align: right; border: none;"><span>Hình ảnh:</span></td>                                  
                <td style="border: none;">
                <?php
                    // if(substr($hinhanh,0,9)=='NULL.jpg'){
                    // echo '<img src="./images/anh1.jpg" style="clip-path: circle(50%);" width="150px" height="150px">';
                    // }else{
                    // echo '<img src="./images/bacsi/'.$hinhanh.'" style="clip-path: circle(50%);" width="150px" height="150px">';
                    // }
                    //echo $dsbacsi;
                ?><br>
                    <input style="width: 97%; height: 50px;" type="file" name="txthinh">
                </td>
            </tr>
            <tr>
                <td style="width: 100px; text-align: right; border: none;"><span>Chuyên môn:</span></td>
                <td style="border: none;">
                    <select style="width: 97%; height: 100%;" class="form-control" name="txtChuyenMon" value="<?php //echo $chuyenmon?>">
                        <option value="Tim Mạch">Tim Mạch</option>        
                        <option value="Thần Kinh">Thần Kinh</option>
                        <option value="Xương khớp">Xương khớp</option>           
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right; border: none;">
                    <input type="submit" name="submit">
                    <input type="reset">
                </td>
            </tr>
        </table>
    </form>
    
</body> -->
<body> 
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <center><h4 class="modal-title">Sửa Thông Tin Bác Sĩ</h4></center>
            <script>
                function quay_lai_trang_truoc(){
                    history.back();
                }
            </script>        
             <button type="button" onclick="quay_lai_trang_truoc()" class="close" data-dismiss="modal">&times;</button>
            <!-- <h5 style="color:green"><?php //echo $mess ?></h5> -->
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label>Tên bác sĩ:</label>
                        <input class="form-control" type="text" name="txttenBacSi" value="<?php echo $tenBacSi?>">
                        <!-- <input type="text" class="form-control" value="<?php //echo $tenBacSi ?>" name="txttenBacSi" required> -->
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh:</label>
                        <?php
                            if(substr($hinhanh,0,9)=='NULL.jpg'){
                            echo '<img src="./images/anh1.jpg" style="clip-path: circle(50%);" width="150px" height="150px">';
                            }else{
                            echo '<img src="./images/bacsi/'.$hinhanh.'" style="clip-path: circle(50%);" width="150px" height="150px">';
                            }
                            //echo $dsbacsi;
                        ?><br>
                        <input style="width: 97%; height: 50px;" type="file" name="txthinh" accept=".jpeg,.jpg,.png">
                        <div class="has-error">
                                  <span style="color: red;"> <?php echo (isset($err['txthinh'])) ? $err['txthinh']:'' ?> </span>
                                </div>
                        </div>
                        <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control" type="text" name="txtemail" value="<?php echo $matkhau['email']?>">
                        <!-- <input type="text" class="form-control" value="<?php //echo $tenBacSi ?>" name="txttenBacSi" required> -->
                    </div>
                    <div class="form-group">
                        <label>Chuyên môn:</label>
                        <select style="width: 97%; height: 100%;" class="form-control" name="txtchuyenmon" value="<?php //echo $chuyenmon?>">
                            <option value="Tim Mạch">Tim Mạch</option>        
                            <option value="Thần Kinh">Thần Kinh</option>
                            <option value="Xương khớp">Xương khớp</option>           
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary">
                        <!-- <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button> -->
                        <!-- <input type="reset" class="btn btn-warning float-right"> -->
                        <input type="reset" class="btn btn-warning float-right">
                    </div>
                </form>
        </div>
        <!-- Modal footer -->
    </div>
</div>
    
</body>
</html>