<?php
include_once("ketnoi.php");
class modelBacSi
{
    // function SelectAllBacSi(){
    //     $p = new clsketnoi();
    //     if($p->ketnoiDB($conn)){
    //         $string = "SELECT * FROM bacsi";
    //         $table = mysqli_query($conn, $string);
    //         $p->dongketnoi($conn);
    //         return $table;
    //     }else{
    //         return false; 
    //     }
    // }
    function SelectAllBacSi()
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = " SELECT tk.tendangnhap,tk.email, b.mabacsi, tenbacsi,
                hinhanh, chuyenmon from taikhoan tk join bacsi b on tk.mataikhoan=b.mataikhoan;";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }
    function SelectBacSi($comp)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string =
                "SELECT * FROM bacsi WHERE mabacsi = '$comp'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }
    function SelectTaikhoan($comp)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string =
                "SELECT * FROM taikhoan WHERE mataikhoan = '$comp'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }
    function InsertBacSi($tendangnhapnd, $matkhaund, $tenbacsind, $chuyenmonnd, $quyennd)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string1 = "INSERT INTO taikhoan (mataikhoan, tendangnhap, matkhau, quyen) VALUES 
         ('', '$tendangnhapnd', '$matkhaund','$quyennd'";
            $kq1 = mysqli_query($conn, $string1);
            return $kq1;
            //theem nguoi dung
            //if(
            //$string = "INSERT INTO bacsi(mabacsi, tenbacsi, chuyenmon,mataikhoan) VALUES
            // ('','$tenbacsi','$chuyenmon')";
            //$kq = mysqli_query($conn, $string);
            //$p->dongketnoi($conn);
            //return $kq;
        } else {
            return false;
        }
    }

    //function InsertTaikhoan($tendangnhap,$matkhau,$quyen){
    //  $conn;
    //  $p=new clsketnoi();
    // $p->ketnoiDB($conn);
    // $string="insert into taikhoan (tendangnhap, matkhau, quyen)
    // Values ('$tendangnhap','$matkhau','$quyen')";
    //  $kq=mysqli_query($conn,$string);
    //  $p->dongketnoi($conn);
    // return $kq;

    // function UpdateBacSi($maBacSi, $tenBacSi, $chuyenmon , $comp){
    //     $p = new clsketnoi();
    //     if($p->ketnoiDB($conn)){
    //         $string = "UPDATE bacsi SET maBacSi='$maBacSi', tenBacSi = '$tenBacSi', chuyenmon = '$chuyenmon' WHERE maBacSi = '$comp'";
    //         $kq = mysqli_query($conn, $string);
    //         $p->dongketnoi($conn);
    //         return $kq;
    //     }else{
    //         return false; 
    //     }
    // }
    function getTaikhoanbyTenDangNhap($tendangnhap)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "SELECT * FROM `taikhoan` WHERE tendangnhap='$tendangnhap'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }
    function UpdateBacSi($tenbacsi, $hinh, $chuyenmon, $ID)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            if ($hinh != '') {
                $string = "UPDATE bacsi SET  tenbacsi = '$tenbacsi',
                    hinhanh = '$hinh', chuyenmon = '$chuyenmon' WHERE mabacsi = '$ID'";
                $kq = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $kq;
            } else {
                $string = "UPDATE bacsi SET  tenbacsi = '$tenbacsi',
                     chuyenmon = '$chuyenmon' WHERE mabacsi = '$ID'";
                $kq = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $kq;
            }
        } else {
            return false;
        }
    }
    function DeleteBacSi($comp)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string1  = "UPDATE hogiadinh SET mabacsi = NULL  WHERE mabacsi = '$comp'";
            $kq1 = mysqli_query($conn, $string1);

            $string2  = "UPDATE donthuoc SET mabacsi = NULL  WHERE mabacsi = '$comp'";
            $kq2 = mysqli_query($conn, $string2);

            $string3  = "UPDATE hosokhambenh SET mabacsi = NULL  WHERE mabacsi = '$comp'";
            $kq3 = mysqli_query($conn, $string3);

            $string6  = "UPDATE yeucautuvan SET mabacsi = NULL  WHERE mabacsi = '$comp'";
            $kq6 = mysqli_query($conn, $string6);

            $string5 = "DELETE FROM lichkham WHERE mabacsi = '$comp'";
            $kq5 = mysqli_query($conn, $string5);

            $string = "DELETE FROM bacsi WHERE mabacsi = '$comp'";
            $kq = mysqli_query($conn, $string);






            //$string7 = "DELETE FROM taikhoan WHERE mataikhoan = '$mataikhoan'";
            //$kq7 = mysqli_query($conn, $string7); này lấy tài khoản bên vdelete chứ  lười quá :>

            // $string = "DELETE FROM bacsi WHERE mabacsi = '$comp'";
            // $kq = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $kq;
        } else {
            return false;
        }
    }
    function DeleteTaikhoan($mataikhoan)
    {
        $p = new clsketnoi();
        $p->ketnoiDB($conn);
        $string = "DELETE FROM taikhoan WHERE mataikhoan = '$mataikhoan'";
        $kq = mysqli_query($conn, $string);
        $p->dongketnoi($conn);
        return $kq;
    }
    function TimkiemBacSi($ten)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($con)) {
            $string = "SELECT tk.tendangnhap, b.mabacsi, tenbacsi,
                hinhanh, chuyenmon, email from taikhoan tk join bacsi b on tk.mataikhoan=b.mataikhoan WHERE tenbacsi LIKE '%$ten%' OR mabacsi LIKE '%$ten%' OR chuyenmon LIKE '%$ten%' OR email LIKE '%$ten%'";
            $table = mysqli_query($con, $string);
            $p->dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }
    function UpdateAnhBacsi($name, $mabacsi)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "UPDATE bacsi SET hinhanh ='$name' WHERE mabacsi='$mabacsi'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }
    function UpdateThongtinbacsi($mabacsi, $tenbacsi, $chuyenmon)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "UPDATE bacsi SET tenbacsi = '$tenbacsi', chuyenmon = '$chuyenmon' WHERE mabacsi='$mabacsi'";
            // $sql = 'update taikhoan t join benhnhan b on t.id=b.id SET 
            // Hotenbn="'.$fullname.'",Ngaysinh= "'.$age.'",Gioitinh= "'.$gioitinh.'"
            // WHERE Tendangnhap="'.$_SESSION['username'].'"';
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }
    function getAllTaikhoanbyEmail($email)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "SELECT * FROM taikhoan WHERE email ='$email' ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }
    function UpdateEmail($email, $mataikhoan)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "UPDATE taikhoan SET email ='$email' WHERE mataikhoan='$mataikhoan'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }


    function updateqrcodebs($mataikhoan, $qr_images)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "UPDATE bacsi SET qrcode = '$qr_images' WHERE mataikhoan ='$mataikhoan'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }
}
?>