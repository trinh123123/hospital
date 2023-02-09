
<?php
    include('Model/ketnoi.php');
     class modelTaikhoan{
        function getAllTaikhoan(){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "SELECT * FROM `taikhoan` ";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function XuatTaikhoan($tendangnhap,$matkhau){
            $conn;
            $p=new clsketnoi();
            $p->ketnoiDB($conn);
            $string="Select * from taikhoan where tendangnhap = '$tendangnhap' and matkhau = '$matkhau'";
            $returns=mysqli_query($conn,$string);
            // $returns=mysqli_fetch_array($kq,1);
            $p->dongketnoi($conn);
            return $returns;
        }
        function InsertTaikhoan($tendangnhap,$matkhau,$email,$quyen){
            $conn;
            $p=new clsketnoi();
            $p->ketnoiDB($conn);
            $string="insert into taikhoan (tendangnhap, matkhau, email, quyen)
            Values ('$tendangnhap','$matkhau','$email','$quyen')";
            $kq=mysqli_query($conn,$string);
            $p->dongketnoi($conn);
            return $kq;
        }   
        function getTaikhoanbyTenDangNhap($tendangnhap){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "SELECT * FROM `taikhoan` WHERE tendangnhap='$tendangnhap'";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function getTaikhoanbyEmail($email){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "SELECT * FROM `taikhoan` WHERE email='$email'";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function ThongTinBenhnhan($tendangnhap){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                // $string= "SELECT * FROM `benhnhan` WHERE mataikhoan='$mataikhoan'";
                $string = "SELECT * FROM benhnhan t JOIN taikhoan d ON t.mataikhoan=d.mataikhoan where tendangnhap='$tendangnhap'";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function ThongTinBacsi($tendangnhap){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "SELECT * FROM bacsi t JOIN taikhoan d ON t.mataikhoan=d.mataikhoan where tendangnhap='$tendangnhap'";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function XuatBacsi(){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "SELECT * FROM bacsi t JOIN taikhoan d ON t.mataikhoan=d.mataikhoan";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function InsertHogiadinh(){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "INSERT INTO `hogiadinh` (`diachi`) 
                                VALUES ('Địa  chỉ');";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function getmaTaikhoan($tendangnhap){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "SELECT mataikhoan FROM `taikhoan` WHERE tendangnhap='$tendangnhap' ";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }function UpdateTaikhoan($matkhau,$tendangnhap){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "UPDATE taikhoan SET matkhau ='$matkhau' WHERE tendangnhap='$tendangnhap'";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function UpdateTendangnhap($tendangnhap,$mataikhoan){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "UPDATE taikhoan SET tendangnhap ='$tendangnhap' WHERE mataikhoan='$mataikhoan'";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }function UpdateEmail($email,$mataikhoan){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "UPDATE taikhoan SET email ='$email' WHERE mataikhoan='$mataikhoan'";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function InsertBenhnhan($tenbenhnhan,$diachi,$sodienthoai,$mataikhoan){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "INSERT INTO `benhnhan` (`tenbenhnhan`, `diachi`, `sodienthoai`, `hinhanh`, `mataikhoan`) 
                                VALUES ('$tenbenhnhan', '$diachi', $sodienthoai, 'NULL.jpg',  $mataikhoan)";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function UpdateAnh($name,$mataikhoan){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "UPDATE benhnhan SET hinhanh ='$name' WHERE mataikhoan='$mataikhoan'";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function XoaAnh($mataikhoan){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "UPDATE benhnhan SET hinhanh = 'NULL.jpg' WHERE mataikhoan='$mataikhoan'";
                $table = mysqli_query($conn, $string);
                $string1 = "UPDATE bacsi SET hinhanh = 'NULL.jpg' WHERE mataikhoan='$mataikhoan'";
                $table2 = mysqli_query($conn, $string1);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function UpdateAnhBacsi($name,$mataikhoan){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "UPDATE bacsi SET hinhanh ='$name' WHERE mataikhoan='$mataikhoan'";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function UpdateThongtincanhan($mataikhoan,$tenbenhnhan,$diachi, $sodienthoai){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "UPDATE benhnhan SET tenbenhnhan = '$tenbenhnhan', diachi = '$diachi', sodienthoai = '$sodienthoai' WHERE mataikhoan='$mataikhoan'";
                // $sql = 'update taikhoan t join benhnhan b on t.id=b.id SET 
                // Hotenbn="'.$fullname.'",Ngaysinh= "'.$age.'",Gioitinh= "'.$gioitinh.'"
                // WHERE Tendangnhap="'.$_SESSION['username'].'"';
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function UpdateThongtinbacsi($mataikhoan,$tenbacsi,$chuyenmon){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "UPDATE bacsi SET tenbacsi = '$tenbacsi', chuyenmon = '$chuyenmon' WHERE mataikhoan='$mataikhoan'";
                // $sql = 'update taikhoan t join benhnhan b on t.id=b.id SET 
                // Hotenbn="'.$fullname.'",Ngaysinh= "'.$age.'",Gioitinh= "'.$gioitinh.'"
                // WHERE Tendangnhap="'.$_SESSION['username'].'"';
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function  Insertbacsi($mataikhoan,$hoten,$chuyenmon){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "INSERT INTO `bacsi` (`hinhanh`, `mabacsi`, `tenbacsi`, `chuyenmon`, `mataikhoan`) 
                VALUES ('NULL.jpg', NULL, '$hoten', '$chuyenmon', '$mataikhoan');";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function Khoiphuc($mataikhoan){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "UPDATE taikhoan SET matkhau='827ccb0eea8a706c4c34a16891f84e7b' WHERE mataikhoan =$mataikhoan";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function Timkiemnguoidung($ten){
            $p = new clsketnoi();
            if($p->ketnoiDB($con)){
                $string = "SELECT * from taikhoan WHERE tendangnhap LIKE '%$ten%' ";
                $table = mysqli_query($con, $string);
                $p->dongketnoi($con);
                return $table;
            }else{
                return false; 
            }
        }
        function SelectAllnguoidung(){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = " SELECT tendangnhap from taikhoan ";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false; 
            }
        }
        function updatenguoidung($mataikhoan,$tendangnhap){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "UPDATE taikhoan SET tendangnhap='$tendangnhap' WHERE mataikhoan =$mataikhoan";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        //Google Login
        function InsertTaikhoanGG($name,$email,$quyen){
            $conn;
            $p=new clsketnoi();
            $p->ketnoiDB($conn);
            $string="insert into taikhoan (tendangnhap, email, quyen)
            Values ('$name','$email','$quyen')";
            $kq=mysqli_query($conn,$string);
            $p->dongketnoi($conn);
            return $kq;
        }   
        function getAllTaikhoanbyEmail($email){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "SELECT * FROM taikhoan WHERE email ='$email' ";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function InsertBenhnhanGG($tenbenhnhan,$hinh,$mataikhoan){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "INSERT INTO `benhnhan` (`tenbenhnhan`, `hinhanh`, `mataikhoan`) 
                                VALUES ('$tenbenhnhan', '$hinh',  $mataikhoan)";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        //Login FB
        function InsertTaikhoanFB($name,$id_fb,$quyen){
            $conn;
            $p=new clsketnoi();
            $p->ketnoiDB($conn);
            $string="insert into taikhoan (tendangnhap, id_fb, quyen)
            Values ('$name','$id_fb','$quyen')";
            $kq=mysqli_query($conn,$string);
            $p->dongketnoi($conn);
            return $kq;
        }   
        function getAllTaikhoanbyid_fb($id_fb){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "SELECT * FROM taikhoan WHERE id_fb ='$id_fb' ";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        // tạo hàm lấy mã bệnh nhân//
    //     function select_max_mabn(){
    //        $p = new clsketnoi();
    //        if($p->ketnoiDB($conn)){
    //            $string = "SELECT mabenhnhan FROM benhnhan ORDER BY mabenhnhan DESC LIMIT 1";
    //            //$string .= " WHERE mabenhnhan =".$mabenhnhan;
    //            $table = mysqli_query($conn, $string);
    //            $p->dongketnoi($conn);
    //            return $table;
    //        }else{
    //        return false;}
    //    }
       
       function updateqrcode($mataikhoan,$qr_images){
           $p = new clsketnoi();
           if($p->ketnoiDB($conn)){
               $string = "UPDATE benhnhan SET qrcode = '$qr_images' WHERE mataikhoan ='$mataikhoan'";
               $table = mysqli_query($conn, $string);
               $p->dongketnoi($conn);
               return $table;
           }else{
           return false;}
       }
       function updateqrcodebs($mataikhoan,$qr_images){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "UPDATE bacsi SET qrcode = '$qr_images' WHERE mataikhoan ='$mataikhoan'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
        return false;}
    }
    
     }


    
?>