<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
    function is_username($tendangnhap) {
        $parttern = "/^[A-Za-z0-9_\.]{6,32}$/";
        if (preg_match($parttern, $tendangnhap))
            return true;
    }
    include_once ("Controller/cTaikhoan.php");
    $p=new controlTaikhoan();
    $tendangnhap1 = $_REQUEST["tendangnhap"];
    $tblmataikhoan = $p->getmaTaikhoan($tendangnhap1);
    $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);
    // $tendangnhap = $p->getAllTaikhoan($mataikhoan);
    //$mataikhoan=mysqli_fetch_assoc($tendangnhap);
    // $row = mysqli_fetch_assoc($tendangnhap);
    //  $tendangnhap1 = $tendangnhap["tendangnhap"];
    // if($tendangnhap){
    //     if(mysqli_num_rows($tendangnhap) > 0){
    //         while($row = mysqli_fetch_assoc($tendangnhap)){
    //             $tendangnhap1 = $row["tendangnhap"];
    //             // $tenBacSi = $row["tenbacsi"];
    //             // $hinhanh = $row["hinhanh"];
    //             // $chuyenmon = $row["chuyenmon"];
    //         }
    //     }
    // }

    if(isset($_REQUEST["submit"])){
        $tendangnhap = $_REQUEST["txttendangnhap"];
        $kq = $p->getTaikhoanbyTenDangNhap($tendangnhap);
        if($tendangnhap1==$tendangnhap){
            echo '<script>alert("Bạn chưa thay đổi tên đăng nhập")</script>';
        }
        elseif(empty($tendangnhap)){
            echo '<script>alert("Bạn chưa nhập tên đăng nhập")</script>';
            
        }else if(!is_username($tendangnhap)) {
            echo '<script>alert("Tên đăng nhập phải từ 6 chữ số và không quá 32 chữ số")</script>';
        }else if(mysqli_num_rows($kq)>0){
            echo '<script>alert("Tên đăng nhập đã tồn tại!")</script>';
        }else{
            $kq = $p->UpdateTendangnhap($tendangnhap,$mataikhoan['mataikhoan']);
            if($kq == 1){
                echo '<script>alert("Sửa tài khoản thành công"); window.location.href="giaodienadmin.php?page=users"</script>';
                // echo header(" location='View/bacsi.php';");
            }elseif($kq == 0){
                echo '<script>alert("Sửa tài khoản thất bại")</script>';
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
                <h4 class="modal-title">Sửa Tài khoản</h4>
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
                        <label>Tên đăng nhập:</label>
                        <input type="text" class="form-control" value="<?php echo $tendangnhap1 ?>" name="txttendangnhap" placeholder="Nhập tên tài khoản" required>
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