
<?php
session_start();
if(!isset($_SESSION['tendangnhap']))
{
    echo '<script>
        alert("Bạn phải đăng nhập");
        window.location.href="./login.php";
        </script>';
}
?>
<?php


include("QRCode/php_qr_code/qrlib.php");
include './Controller/cTaikhoan.php';
    $err = [];
        function is_hoten($hoten) {
            $parttern = "/^([A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+)((\s{1}[A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+){1,})$/";
            if (preg_match($parttern, $hoten))
                return true;
        }
        function is_diachi($diachi) {
            $parttern = "/^([A-Za-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ0-9,.]+)((\s{1}[A-Za-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ0-9,.]+){1,})$/";
            if (preg_match($parttern, $diachi))
                return true;
        }
        function is_sodienthoai($sodienthoai) {
            $parttern = "/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/";
            if (preg_match($parttern, $sodienthoai))
                return true;
        }
        function is_email($email){
            $parttern = "/^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/";
            if (preg_match($parttern, $email))
                return true;
        }
    $p=new controlTaikhoan();
            
            if(isset($_POST['updatebenhnhan'])){
            $tblmatkhau=$p->ThongTinBenhnhan($_SESSION['tendangnhap']);
            $matkhau=mysqli_fetch_assoc($tblmatkhau);
            $tendangnhap = $_SESSION['tendangnhap'];
            $tblmataikhoan = $p->getmaTaikhoan($tendangnhap);
            $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);
            $hoten = $_REQUEST['fullname'];
            $diachi = $_REQUEST['diachi'];
            $sodienthoai = $_REQUEST['sodienthoai'];
            $email = $_REQUEST['email'];
            $ktemail = $p->getTaikhoanbyEmail($email);
            if(!is_hoten($hoten)) {
                echo '<script>
                    alert("*Họ tên ít nhất 2 từ, ký tự đầu (viết hoa) và cuối phải là chữ cái, giữa các từ chỉ có 1 dấu cách ");
                    window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                  </script>';
                // $err['hoten'] = "*Họ tên ít nhất 2 từ, ký tự đầu (viết hoa) và cuối phải là chữ cái, giữa các từ chỉ có 1 dấu cách ";
            }else if(!is_diachi($diachi)) {
                echo '<script>
                    alert("*Địa chỉ ít nhất 2 từ");
                    window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                  </script>';
                // $err['diachi'] = "*Địa chỉ ít nhất 2 từ";
            }else if(!is_sodienthoai($sodienthoai)) {
                echo '<script>
                    alert("*Số điện thoại gồm 10 số nếu có nhập số 0 ở đầu tiên. Nếu không nhập 0 thì còn 9 số.");
                    window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                  </script>';
                // $err['sdt'] = "*Số điện thoại gồm 10 số nếu có nhập số 0 ở đầu tiên. Nếu không nhập 0 thì còn 9 số.";
            }else if (!is_email($email)) {
                echo '<script>
                    alert("*Email không đúng");
                    window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                  </script>';
            }else if ((mysqli_num_rows($ktemail) > 0) && ($matkhau['email']!=$email)) {
                echo '<script>
                    alert("*Email đã tồn tại!");
                    window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                  </script>';
            }else{
                $kq=$p->UpdateThongtincanhan($mataikhoan['mataikhoan'],$hoten, $diachi, $sodienthoai);
                $kq2=$p->UpdateEmail($email,$mataikhoan['mataikhoan']);
                if($kq == 1 && $kq2 == 1){

                    echo '<script>alert("Cập thông tin thành công");window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";</script>';
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
                    $frm_link = "Họ Tên: ".$hoten." Địa chỉ: ".$diachi." Số điện thoại:  ".$sodienthoai." Email:  ".$email;
                    // After getting all the data, now pass all the value to generate QR code.
                    //QRcode::png($frm_link, $pngAbsoluteFilePath); 
                    QRcode::png($frm_link, $filename, $errorCorrectionLevel, $matrixPointSize, 3);
                    // 
                    //INSERT BẢNG QRCODE LƯU THÔNG TIN KIỂM ĐỊNH
                    unlink('./images/qr_images/'.$matkhau['qrcode'].'');
                    $insert_qr = $p -> updateqrcode($mataikhoan['mataikhoan'],basename($filename));
                    if($insert_qr == 1){
                        echo "<script>alert('OK')</script>";
                    }
                }elseif($kq == 0 && $kq2 == 0){
                    echo '<script>
                        alert("Cập nhật thông tin thất bại");
                        window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                    </script>';
                }else{
                    echo "Lỗi";
                }
                // echo '<script>alert("Cập nhật thông tin thành công")</script>';
                // header('location:thongtinbenhnhan.php?pagetrang=thongtin');
            }
        }
           
            if(isset($_POST['updatebacsi'])){
                //     if (isset($_POST['fullname'])) {
                //         $fullname = $_POST['fullname'];
                //         $fullname = str_replace('"', '\\"', $fullname);
                //     }
                //     if (isset($_POST['diachi'])) {
                //         $diachi = $_POST['diachi'];
                //         $diachi = str_replace('"', '\\"', $diachi);
                // }
                // if (isset($_POST['sodienthoai'])) {
                //         $sodienthoai = $_POST['diachisodienthoai'];
                //         $sodienthoai = str_replace('"', '\\"', $sodienthoai);
                
                // }
                $tendangnhap = $_SESSION['tendangnhap'];
                $tblmatkhau=$p->ThongTinBacsi($_SESSION['tendangnhap']);
            $matkhau=mysqli_fetch_assoc($tblmatkhau);
                $tblmataikhoan = $p->getmaTaikhoan($tendangnhap);
                $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);
                $hoten = $_REQUEST['fullname'];
                $chuyenmonbs = $_REQUEST['chuyenmonbs'];
                $email = $_REQUEST['email'];
            $ktemail = $p->getTaikhoanbyEmail($email);
                //$sodienthoai = $_REQUEST['sodienthoai'];
                //echo $mataikhoan['mataikhoan'];
                    // if (isset($_POST['sdt'])) {
               
                    //     $email = $_POST['sdt'];
                    //     $email = str_replace('"', '\\"', $email);
                
               // }
               if(!is_hoten($hoten)) {
                    echo '<script>
                        alert("*Họ tên ít nhất 2 từ, ký tự đầu (viết hoa) và cuối phải là chữ cái, giữa các từ chỉ có 1 dấu cách ");
                        window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                    </script>';
                    // $err['hoten'] = "*Họ tên ít nhất 2 từ, ký tự đầu (viết hoa) và cuối phải là chữ cái, giữa các từ chỉ có 1 dấu cách ";
                // }else if(!is_diachi($diachi)) {
                //     echo '<script>
                //         alert("*Địa chỉ ít nhất 2 từ");
                //         window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                //     </script>';
                //     // $err['diachi'] = "*Địa chỉ ít nhất 2 từ";
                // }else if(!is_sodienthoai($sodienthoai)) {
                //     echo '<script>
                //         alert("*Số điện thoại gồm 10 số nếu có nhập số 0 ở đầu tiên. Nếu không nhập 0 thì còn 9 số.");
                //         window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                //     </script>';
                    // $err['sdt'] = "*Số điện thoại gồm 10 số nếu có nhập số 0 ở đầu tiên. Nếu không nhập 0 thì còn 9 số.";
                }else if (!is_email($email)) {
                    echo '<script>
                        alert("*Email không đúng");
                        window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                      </script>';
                }else if ((mysqli_num_rows($ktemail) > 0) && ($matkhau['email']!=$email)) {
                    echo '<script>
                        alert("*Email đã tồn tại!");
                        window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                      </script>';
                }
                else{
               $kq=$p->UpdateThongtinbacsi($mataikhoan['mataikhoan'],$hoten,$chuyenmonbs);
               $kq2=$p->UpdateEmail($email,$mataikhoan['mataikhoan']);
               if($kq == 1 && $kq2 == 1){

                   echo '<script>alert("Cập thông tin thành công");window.location.href="thongtinbacsi.php?pagetrang=thongtin";</script>';
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
                   $frm_link = $hoten." / ".$chuyenmon." / ".$email;
                   // After getting all the data, now pass all the value to generate QR code.
                   //QRcode::png($frm_link, $pngAbsoluteFilePath); 
                   QRcode::png($frm_link, $filename, $errorCorrectionLevel, $matrixPointSize, 3);
                   // 
                   //INSERT BẢNG QRCODE LƯU THÔNG TIN KIỂM ĐỊNH
                   unlink('./images/qr_images/'.$matkhau['qrcode'].'');
                   $insert_qr = $p -> updateqrcodebs($mataikhoan['mataikhoan'],basename($filename));
                   if($insert_qr == 1){
                       echo "<script>alert('OK')</script>";
                   }
               }elseif($kq == 0 && $kq2 == 0){
                   echo '<script>
                       alert("Cập nhật thông tin thất bại");
                       window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                   </script>';
               }else{
                   echo "Lỗi";
               }

                }
            }
?>