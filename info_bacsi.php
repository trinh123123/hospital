<?php
if(!isset($_SESSION['tendangnhap']))
{
    echo '<script>
        alert("Bạn phải đăng nhập");
        window.location.href="./login.php";
        </script>';
}
?>
<?php
//session_start();
include_once('Controller/cTaikhoan.php');
$p = new controlTaikhoan();
//$sql='select * from taikhoan t join benhnhan b on t.id=b.id WHERE Tendangnhap="'.$_SESSION['username'].'"';
// $tblmataikhoan = $p->getmaTaikhoan($tendangnhap);
// $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);
$tendangnhap = $_SESSION['tendangnhap'];
$tblmataikhoan = $p->ThongTinBacsi($tendangnhap); //executeSingLesult($sql)
$dsbacsi = mysqli_fetch_assoc($tblmataikhoan);
// $dsbacsi=mysqli_fetch_assoc($tblmataikhoan);
// echo $dsbacsi['tenbacsi'];

?>
<style>
  #wrapper #sidebar-wrapper h5 {
    /* padding-top:10px;
      margin-top:10px;
      margin-left:10px; */
    width: 200px;




  }
</style>
<div class="d-flex" id="wrapper" style="padding-top: 80px;">
  <div class="col-2"></div>
  <div class="col-5 text-center">
    <?php
    $tblmatkhau = $p->ThongTinBacsi($_SESSION['tendangnhap']);
    $matkhau = mysqli_fetch_assoc($tblmatkhau);
    if (substr($dsbacsi['hinhanh'], 0, 9) == 'NULL.jpg') {
      echo '<img src="./images/anh1.jpg" style="clip-path: circle(50%);" width="150px" height="150px">';
    } else {
      echo '<img src="./images/bacsi/' . $dsbacsi['hinhanh'] . '" style="clip-path: circle(50%);" width="150px" height="150px">';
    }
    //echo $dsbacsi;
    ?>


    <p><a href="#" data-toggle="modal" data-target="#change_image">Thay đổi ảnh</a></p>
    <div class="modal fade" id="change_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">

            <!-- -------------------------------------------------------- -->
            <form action="thaydoianh.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" class="form-control-file" name="image" accept=".jpeg,.jpg,.png" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="change_image">Lưu</button>
            <a href='#' class="btn btn-secondary" data-dismiss="modal">Đóng</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Xóa ảnh -->
    <p><a href="#" data-toggle="modal" data-target="#xoa_image">Xóa ảnh</a></p>
    <!-- <p><a href ="#" data-toggle="modal" data-target="#change_image">Thay đổi ảnh</a></p> -->
    <div class="modal fade" id="xoa_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">

            <!-- -------------------------------------------------------- -->
            <form action="thaydoianh.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <h1>Bạn có chắc muốn xóa ảnh</h1>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="xoa_image">Xác nhận</button>
            <a href='#' class="btn btn-secondary" data-dismiss="modal">Đóng</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-4">
    <p class="font-weight-bolder">Họ và Tên:</p>
    <p class="font-weight-bolder">Chuyên môn:</p>
    <p class="font-weight-bolder">Email:</p>
    <p class="font-weight-bolder">Qr Code:</p>
    <!-- <p class="font-weight-bolder">Ngày sinh:</p> -->
    <!-- <p class="font-weight-bolder">Số điện thoại:</p>   -->
  </div>
  <div class="col-4">
    <p><?php echo $dsbacsi['tenbacsi']; ?></p>
    <p><?php echo $dsbacsi['chuyenmon']; ?></p>
    <p><?php echo $matkhau['email']; ?></p>
    <img src="images/qr_images/<?php echo $dsbacsi['qrcode']?>" alt="">
    <!-- <p><?php
            // echo  date("d m Y",strtotime($dsbacsi['Ngaysinh']));
            ?>
            </p>
            <p></p> -->
  </div>
  <div class="col-2"></div>
</div>

<div class="row m-4">
  <div class="col text-center">
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate">Cập nhập</button>
  </div>

  <div class="modal fade" id="modalUpdate" tabindex="-1" style="margin-top:100px ;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cập nhập thông tin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form action="capnhatthongtin.php" method="POST">
            <div class="form-group">
              <label class="font-weight-bolder">Họ và tên: </label>
              <input type="text" class="form-control" name="fullname" value="<?php echo $dsbacsi['tenbacsi']; ?>" required oninvalid="this.setCustomValidity('Họ và tên không được để trống')" oninput="setCustomValidity('')">
            </div>
            <!-- <div class="form-group">
                      <label class="font-weight-bolder">Giới tính: </label>
                      <select class="form-control" name="gioitinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                      </select>
                    </div> -->
            <div class="form-group">
              <label class="font-weight-bolder">Email: </label>
              <input type="text" class="form-control" name="email" value="<?php echo $matkhau['email']; ?>" required oninvalid="this.setCustomValidity('Họ và tên không được để trống')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
              <label class="font-weight-bolder">Chuyên Môn: </label>
              <!-- <input type="text" class="form-control" name="chuyenmonbs"  placeholder="Nhập chuyên môn" required> -->
              <select class="form-control" name="chuyenmonbs">
                <option value="Tim Mạch">Tim Mạch</option>
                <option value="Thần Kinh">Thần Kinh</option>
                <option value="Xương khớp">Xương khớp</option>
              </select>
              <!-- <label class="font-weight-bolder">Chuyên môn: </label>
                      <input type="text" class="form-control" name="chuyenmon" value="<?php //echo $dsbacsi['chuyenmon']; 
                                                                                      ?>"> -->
            </div>
            
            <!-- <div class="form-group">
                      <label class="font-weight-bolder">Số điện thoại: </label>
                      <input type="text" class="form-control" name="sodienthoai" value="<?php //echo $dsbacsi['sodienthoai']; 
                                                                                        ?>">
                    </div> -->
            <!-- <div class="form-group">
                      <label class="font-weight-bolder">Email: </label>
                      <input type="text" class="form-control" name="sdt" required value="<?php //echo $dsbacsi['sodienthoai']; 
                                                                                          ?>" required
                      oninvalid="this.setCustomValidity('Email không được để trống')"
                      oninput="setCustomValidity('')">
                    </div> -->
        </div>
        <div class="modal-footer" style="padding-left:200px;">
          <button type="submit" class="btn btn-primary" name="updatebacsi">Lưu</button>
          <a href="#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- The Modal -->