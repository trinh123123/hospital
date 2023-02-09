<?php 
session_start();
include './Controller/cTaikhoan.php';
    $p=new controlTaikhoan();
// if(isset($_REQUEST["khoiphuc"])){
//     $p->Khoiphuc($item['mataikhoan']);
//     if($kq == 1){
//         echo '<script>
//             alert("Khôi phục mật khẩu thành công");
//             window.location.href="giaodienadmin.php?page=users";
//             </script>';
//     }elseif($kq == 0){
//         echo '<script>
//             alert("Khôi phục mật khẩu thất bại");
//             window.location.href="giaodienadmin.php?page=users";
//             </script>';
//     }
// }

?>
<?php
    include_once("./Controller/clichkham.php");
    $l=new controllichkham();

    //Thêm lịch khám bên admin
    if(isset($_POST['tenbacsi'])){
        $mabacsi=$_POST['tenbacsi'];
        $ngaykham=$_POST['ngaykham'];
        $cakham=$l->getlichkhambymabacsingaykham($mabacsi,$ngaykham);
        $output="";
        $output="<option value=''>-----Chọn ca khám------</option>";
        //echo $row_cakham['macakham'];
        while($row_cakham=mysqli_fetch_array($cakham)){
            $output.="<option value=".$row_cakham['macakham'].">".$row_cakham['thoigianbatdau']." - ".$row_cakham['thoigiankethuc']."</option>";
        }
        echo $output;
    }
   //Thêm lịch khám bên bác sĩ
    if(isset($_POST['ngaykham2'])){
        $tblmabacsi = $l->getmabacsi($_SESSION['mataikhoan']);
        $mabacsi1 = mysqli_fetch_assoc($tblmabacsi);
        $mabacsi=$mabacsi1['mabacsi'];
        $ngaykham=$_POST['ngaykham2'];
        $cakham=$l->getlichkhambymabacsingaykham($mabacsi,$ngaykham);
        $output="";
        $output="<option value=''>-----Chọn ca khám------</option>";
        //echo $row_cakham['macakham'];
        while($row_cakham=mysqli_fetch_array($cakham)){
            $output.="<option value=".$row_cakham['macakham'].">".$row_cakham['thoigianbatdau']." - ".$row_cakham['thoigiankethuc']."</option>";
        }
        echo $output;
    }
    /// Update lịch khám bên admin
    if(isset($_POST['etenbacsi'])){
        $mabacsi=$_POST['etenbacsi'];
        $ngaykham=$_POST['engaykham'];
        $cakham=$l->getlichkhambymabacsingaykham($mabacsi,$ngaykham);
        $output="";
        $output="<option value=''>-----Chọn ca khám------</option>";
        //echo $row_cakham['macakham'];
        while($row_cakham=mysqli_fetch_array($cakham)){
            $output.="<option value=".$row_cakham['macakham'].">".$row_cakham['thoigianbatdau']." - ".$row_cakham['thoigiankethuc']."</option>";
        }
        echo $output;
    }
///Delete lịch khám bên admin
    if(isset($_POST['id'])){
        $malichkham=$_POST['id'];
        $del = $l->Deletelichkham($malichkham);
    }
///Delete lịch trống bên admin
if(isset($_POST['id_xoalichtrong'])){
    $malichkham=$_POST['id_xoalichtrong'];
    $del = $l->Deletelichtrong($malichkham);
}
 ///Delete bác sĩ bên admin   
    if(isset($_POST['id_bs'])){
        include_once ("Controller/cBacSi.php");
        $maBacSi = $_POST['id_bs'];
    
        $bs = new controlBacSi(); 
        $tblmataikhoan = $bs->getBacSi($maBacSi);
        $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);
        $del = $bs->DeleteBacSi($maBacSi);
        $deltk=$bs->DeleteTaikhoan($mataikhoan['mataikhoan']);
    }
//khôi phục mật khẩu
    if(isset($_POST['id_mk'])){
        include_once('Controller/cTaikhoan.php');
        $p=new controlTaikhoan();
        $tblmatkhau=$p->ThongTinBenhnhan($_SESSION['tendangnhap']);
        $matkhau=mysqli_fetch_assoc($tblmatkhau);
        if(isset($matkhau['matkhau'])){
            $kq = $p->Khoiphuc($_POST['id_mk']);
        }else{
            echo '<script>alert("Đăng nhập bằng google không thể khôi phục mật khẩu");window.history.back();</script>';
        }
        
    }
// Xóa thuốc
    if(isset($_POST['id_thuoc'])){
        include("./Controller/cThuoc.php");
        $t=new controlThuoc();
        $mathuoc = $_POST['id_thuoc'];

        // $tblmathuoc = $p->getThuoc($mathuoc);
        // $mathuoc=mysqli_fetch_assoc($tblmathuoc);
        //$d = new controlTaikhoan();
        $del = $t->DeleteThuoc($mathuoc);
    }
//Hủy lịch bên bệnh nhân
    if(isset($_POST['id_huylich'])){
        $malichkham = $_POST['id_huylich'];
        $del = $l->huylich($malichkham);
    }

    //Kiểm tra tên đăng nhập (DK Tài khoản)
    if (isset($_POST["dktendangnhap"])) {
        $p = new controlTaiKhoan();
        $kq = $p->getTaikhoanbyTenDangNhap($_POST["dktendangnhap"]);
    
        if (mysqli_num_rows($kq) > 0) {
            echo '<script>$("#erttendangnhap").html("Tên đăng nhập đã tồn tại");</script>' ;
        }
    }

    // Kiểm tra email (DK Tài Khoản)
    if (isset($_POST["dkemail"])) {
        $p = new controlTaiKhoan();
        $kq = $p->getTaikhoanbyEmail($_POST["dkemail"]);
    
        if (mysqli_num_rows($kq) > 0) {
            echo '<script>$("#ertemail").html("Email đã tồn tại");</script>' ;
        }
    }

    // Insert Tài khoản
    if (isset($_POST["hoten"])) {
        $hoten = $_POST['hoten'];
        $diachi = $_POST['diachi'];
        $sodienthoai = $_POST['sdt'];
        $email = $_POST['email'];
        $tendangnhap = $_POST["tendangnhap"];
        $matkhau = $_POST["matkhau"];
        $quyen = 0;
        $kq = $p->getTaikhoanbyTenDangNhap($tendangnhap);
        $pass = md5($matkhau);
        $kq = $p->InsertTaikhoan($tendangnhap, $pass, $email, $quyen);
        if ($kq == 1) {


            $tblmataikhoan = $p->getmaTaikhoan($tendangnhap);
            $mataikhoan = mysqli_fetch_assoc($tblmataikhoan);
            $bn = $p->InsertBenhnhan($hoten, $diachi, $sodienthoai, $mataikhoan['mataikhoan']);
            echo '<script>
                        alert("Đăng ký thành công");
                        window.location.href="login.php";
                        </script>';

        } else
            echo '<script>
                    alert("Đăng ký thất bại");
                    window.location.href="register.php";
                    </script>';
        }
        
?>