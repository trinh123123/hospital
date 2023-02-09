<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<?php
    include("./Controller/cThuoc.php");
    $p=new controlThuoc();
    //echo  $_REQUEST["mathuoc"];
    // $mathuoc1 = $_REQUEST["mathuoc"];
    // $tblmataikhoan = $p->getmaTaikhoan($tendangnhap);
    //$mathuoc=mysqli_fetch_assoc($_REQUEST["mathuoc"]);
    // $tendangnhap = $p->getAllTaikhoan($mataikhoan);
    //$mataikhoan=mysqli_fetch_assoc($tendangnhap);
    // $row = mysqli_fetch_assoc($tendangnhap);
    //  $tendangnhap1 = $tendangnhap["tendangnhap"];
    $tblThuoc = $p->getThuoc($_REQUEST["mathuoc"]);
    if($tblThuoc){
        if(mysqli_num_rows($tblThuoc) > 0){
            while($row = mysqli_fetch_assoc($tblThuoc)){
                //$tendangnhap1 = $row["tendangnhap"];
                $tenthuoc = $row["tenthuoc"];
                $thongtinthuoc = $row['thongtinthuoc'];
                // $tenBacSi = $row["tenbacsi"];
                // $hinhanh = $row["hinhanh"];
                // $chuyenmon = $row["chuyenmon"];
            }
        }
    }
    // $kq1 = $p->getThuoc($mathuoc);
    
    if(isset($_REQUEST["submit"])){
        $tenthuoc = $_REQUEST["txttenthuoc"];
        $thongtinthuoc = trim($_REQUEST["txtthongtinthuoc"]);
        // $thongtinthuoc = strlen($thongtin);
        // $kq1 = $p->getThuocbyTenThuoc($_REQUEST['txttenthuoc']);
        if($thongtinthuoc==''){
            // $err['tendangnhap'] = "*Tên đăng nhập đã tồn tại!";
            echo "<script> alert('*Vui lòng nhập thông tin thuốc!')</script>";
        }
        else{
            $kq = $p->updatethuoc($thongtinthuoc,$_REQUEST["mathuoc"]);
            if($kq == 1){
                echo '<script>alert("Sửa thuốc thành công"); window.location.href="giaodienadmin.php?page=thuoc"</script>';
                // echo header(" location='View/bacsi.php';");
            }elseif($kq == 0){
                echo '<script>alert("Sửa thuốc thất bại")</script>';
            }else{
                echo "Lỗi";
            }

        }
    //     $ID= $_REQUEST["maBacSi"];
            
    //     // echo $file ."<br>";     
        
    //     // echo $tenBacSi ."<br>";
    //     // echo $file ."<br>";
    //     // echo $type ."<br>";
    //     // echo $name ."<br>";
    //     // echo $size."<br>";
    //     // echo $chuyenmon ."<br>";
    //     // echo $ID ."<br>";
        

    //     $kq = $p->EditBacSi( $tenBacSi,  
    //     $file, $type, $name, $size, $chuyenmon , $ID);
        
       
    }
?>
<?php
        
    ?>

<body> 
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <center>
                <h4 class="modal-title">Sửa Thuốc</h4>
            </center>
            <script>
                function quay_lai_trang_truoc(){
                    history.back();
                }
            </script>        
             <button type="button" onclick="quay_lai_trang_truoc()" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="#" method="post">
            <div class="form-group">
                        <label>Tên thuốc:</label>
                        <input type="text" class="form-control" readonly value="<?php echo $tenthuoc ?>" name="txttenthuoc" placeholder="Nhập tên thuốc" required>
                        <span style="color:red"><?php //echo $messxuly1 ?></span>
                    </div>
                    <div class="form-group">
                        <label>Thông tin thuốc:</label>
                        <textarea rows="8" type="text" class="form-control" value="<?php echo $thongtinthuoc ?>" name="txtthongtinthuoc" placeholder="Nhập thông tin thuốc" required></textarea>
                        <span style="color:red"><?php //echo $messxuly1 ?></span>
                    </div>
                    <!-- <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" class="form-control" value="<?php //echo $Email ?>" name="email" required>
                        <span style="color:red"><?php //echo $messxuly2 ?></span>
                    </div> -->
                <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
                <input type="reset" class="btn btn-warning float-right">
            </form>
        </div>
        <!-- Modal footer -->
    </div>
</div>
    
</body>
</html>