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
          $p=new controlTaikhoan();
            //$sql='select * from taikhoan t join benhnhan b on t.id=b.id WHERE Tendangnhap="'.$_SESSION['username'].'"';
          // $tblmataikhoan = $p->getmaTaikhoan($tendangnhap);
          // $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);
          $tendangnhap = $_SESSION['tendangnhap'];
          $tblmataikhoan=$p->ThongTinBenhnhan($tendangnhap);//executeSingLesult($sql)
          $dsbenhnhan=mysqli_fetch_assoc($tblmataikhoan);
          $tblmatkhau=$p->getTaikhoanbyTenDangNhap($tendangnhap);
          $matkhau=mysqli_fetch_assoc($tblmatkhau);
          
        ?>
        <style>
          #wrapper #sidebar-wrapper h5{
      /* padding-top:10px;
      margin-top:10px;
      margin-left:10px; */
      width: 200px;


      
      
    }
        </style>
        <div class="d-flex" id="wrapper" style="padding-top: 80px;">
          
          <div class="col-5 text-center" >
            <?php 
                
                // echo $matkhau;
                if(substr($dsbenhnhan['hinhanh'],0,9)=='NULL.jpg'){
                  echo '<img  src="./images/anh1.jpg" style="clip-path: circle(50%);" width="150px" height="150px">';
                }elseif(!isset($matkhau['matkhau'])){
                  echo '<img src="'.$dsbenhnhan['hinhanh'].'" style="clip-path: circle(50%);" width="150px" height="150px">';
                }else{
                  echo '<img src="./images/benhnhan/'.$dsbenhnhan['hinhanh'].'" style="clip-path: circle(50%);" width="150px" height="150px">';
                }
                //echo $dsbenhnhan;
            ?>
            
            
            <p><a href ="#" data-toggle="modal" data-target="#change_image">Thay đổi ảnh</a></p>
            <!-- <p><a href ="#" data-toggle="modal" data-target="#change_image">Thay đổi ảnh</a></p> -->
            <div class="modal fade" id="change_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">

                  <!-- -------------------------------------------------------- -->
                    <form action="thaydoianh.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="file" class="form-control-file" name="image" accept=".jpeg,.jpg,.png"  required='required'>
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
            <p><a href ="#" data-toggle="modal" data-target="#xoa_image">Xóa ảnh</a></p>
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
          <div class="col-3">
            <p class="font-weight-bolder">Mã:</p>
            <p class="font-weight-bolder">Họ và Tên:</p>
            <p class="font-weight-bolder">Số điện thoại:</p>  
            <p class="font-weight-bolder">Email:</p> 
            <p class="font-weight-bolder">Địa chỉ:</p>
            <p class="font-weight-bolder">Qr Code:</p>
            <!-- <p class="font-weight-bolder">Ngày sinh:</p> -->
          </div>
          <div class="col-4">
            <p><?php echo $_SESSION['mataikhoan']; ?></p>
            <p><?php echo $dsbenhnhan['tenbenhnhan']; ?></p>
            <p><?php if(isset($dsbenhnhan['sodienthoai'])){echo $dsbenhnhan['sodienthoai'];}else echo '<br>';?></p>
            <p><?php if(isset($matkhau['email'])){echo $matkhau['email'];}else echo '<br>';?></p>
            <p><?php echo $dsbenhnhan['diachi'];?></p>
            <img src="images/qr_images/<?php echo $dsbenhnhan['qrcode']?>" alt="">
          </div>
          <!-- <div class="col-2"></div>  -->
        </div>

        <div class="row m-4">
          <div class="col text-center">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate">Cập nhập</button>
          </div>

          <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" style="margin-top:100px ;" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" >
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cập nhập thông tin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body" >
                  <form action="capnhatthongtin.php" method="POST">
                    <div class="form-group">
                      <label class="font-weight-bolder">Họ và tên: </label>
                      <input type="text" class="form-control" name="fullname" value="<?php echo $dsbenhnhan['tenbenhnhan']; ?>" required
                      oninvalid="this.setCustomValidity('Họ và tên không được để trống')"
                      oninput="setCustomValidity('')">
                      <!-- <span style="color: red;"> <?php echo (isset($err['hoten'])) ? $err['hoten']:'' ?> </span> -->

                    </div>
                    <!-- <div class="form-group">
                      <label class="font-weight-bolder">Giới tính: </label>
                      <select class="form-control" name="gioitinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                      </select>
                    </div> -->
                    <div class="form-group">
                      <label class="font-weight-bolder">Số điện thoại: </label>
                      <input type="text" class="form-control" name="sodienthoai" value="<?php echo $dsbenhnhan['sodienthoai']; ?>">
                      <!-- <span style="color: red;"> <?php echo (isset($err['sdt'])) ? $err['sdt']:'' ?> </span> -->

                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Email: </label>
                      <?php
                        $tblmatkhau=$p->ThongTinBenhnhan($_SESSION['tendangnhap']);
                        $matkhau=mysqli_fetch_assoc($tblmatkhau);
                        if(isset($matkhau['matkhau'])){
                          echo '<input type="text" class="form-control" name="email" value="'.$matkhau['email'].'">';
                      }else{
                        echo '<input type="text" class="form-control" name="email" readonly value="'.$matkhau['email'].'">';
                      }
                      ?>
                      <!-- <input type="text" class="form-control" name="email" value="<?php //echo $matkhau['email']; ?>"> -->
                      <!-- <span style="color: red;"> <?php //echo (isset($err['email'])) ? $err['email']:'' ?> </span> -->

                    </div>
                    <div class="form-group">
                      <label class="font-weight-bolder">Địa chỉ: </label>
                      <input type="text" class="form-control" name="diachi" value="<?php echo $dsbenhnhan['diachi']; ?>">
                      <!-- <span style="color: red;"> <?php echo (isset($err['diachi'])) ? $err['diachi']:'' ?> </span> -->

                    </div>
                    
                    <!-- <div class="form-group">
                      <label class="font-weight-bolder">Email: </label>
                      <input type="text" class="form-control" name="sdt" required value="<?php //echo $dsbenhnhan['sodienthoai']; ?>" required
                      oninvalid="this.setCustomValidity('Email không được để trống')"
                      oninput="setCustomValidity('')">
                    </div> -->
                </div>
                <div class="modal-footer" style="padding-left:200px;">
                  <button type="submit" class="btn btn-primary" name="updatebenhnhan">Lưu</button>
                  <a href="#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- The Modal -->
