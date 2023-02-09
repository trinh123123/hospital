<style>
    .section{
      padding:0px;
    }
    #wrapper{
      width: 900px;
    }
    #wrapper #sidebar-wrapper h5{
      padding-top:10px;
      margin-top:10px;
    }
    .footer{
      margin-top:0px; 
    }
    .container-fluid{
      padding-right:0px;
    }
</style>
<div class = "container" >
<center><h2> Đổi mật khẩu</h2></center>
<center><hr width="200px"></center>
	<div class="row mt-2" >
		<div class="col-2"></div>

		<div class="col-3" >
        <?php
            
            include_once('Controller/cTaikhoan.php');
            $p=new controlTaikhoan();
            // $sql='SELECT * from taikhoan
            // where Tendangnhap="'.$_SESSION['username'].'"';
            // $dsbenhnhan = $s->executeSingLesult($sql);

        ?>
			<!-- <p><?php //echo $dsbenhnhan['Email'];?></p> -->
		</div>

	</div>
</div>

          <?php
  if(!isset($_SESSION['tendangnhap']))
	{
		echo '<script>
            alert("Bạn phải đăng nhập");
            window.location.href="login.php";
            </script>';
	}
?>
<body id="top">

<?php
function is_password($matkhau) {
  $parttern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
  if (preg_match($parttern, $matkhau))
      return true;
}
?>
<style>
    .section{
      padding:0px;
      width: 1200px;
    }
    /* #wrapper{
      width: 900px;
    } */
    /* #wrapper #sidebar-wrapper h5{
      padding-top:10px;
      margin-top:10px;
      margin-right:10px;
      width: 200px;
    } */
    .footer{
      margin-top:0px; 
    }
    .container-fluid{
      padding-right:0px;
    }
</style>
<section class="section service-2">
	<div class="container-fluid">
    <div class="d-flex" id="wrapper" >
      <!-- Sidebar -->

        <!-- /#wrapper -->
        <!-- Menu Toggle Script -->

      <?php

    include_once('Controller/cTaikhoan.php');
    $p=new controlTaikhoan();
    //$kq=$p->getmaTaikhoan($_SESSION['tendangnhap']);
    $tblmataikhoan = $p->getTaikhoanbyTenDangNhap($_SESSION['tendangnhap']);
    $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);

	if(isset($_POST['changePass'])){
        //$tendangnhap = $_SESSION['tendangnhap'];
        $matkhau=$_REQUEST["matkhau"];
        //$matkhau=md5($pass);
        $nlmatkhau = $_REQUEST["nlmatkhau"];
        $matkhaucu=md5($_REQUEST["matkhaucu"]);
        // echo $matkhaucu;
        if($mataikhoan['matkhau'] != $matkhaucu){
          $err['old_password'] = 'Sai mật khẩu.';
        }elseif($matkhau == $_REQUEST["matkhaucu"]){
          echo '<script>
            alert("Vui lòng không sử dụng mật khẩu cũ");
            </script>';
        }else if(!is_password($matkhau)) {
          $err['new_password'] = "Tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt";
        }
        else if($matkhau != $nlmatkhau){
          $err['confirm_new_password'] = 'Mật khẩu không trùng nhau.';
        }

        else{
          $final_password = md5($matkhau);
          $kq=$p->UpdateTaikhoan($final_password,$_SESSION['tendangnhap']);
          // $sql = 'update taikhoan
          // 		set Password = "'.$final_password.'"
          // 		where Tendangnhap="'.$_SESSION['username'].'"';
          // $s->execute($sql);
          echo '<script>
            alert("Sửa mật khẩu thành công");
            history.back()
            </script>';
          // echo $matkhaucu;
            }
        }
?>
            <div class="container mt-3" style="float:right;">
                <div class="col-14" style="width: 700px; padding-left: 300px;">
                    <form action="" method="post" class="mb-2">
                        <div class="form-group">
                            <label>Mật khẩu cũ:</label><span class="text-danger">
                            <input type="password" class="form-control" name="matkhaucu" required="required">
                            <span style="color: red;"> <?php echo (isset($err['old_password'])) ? $err['old_password']:'' ?> </span>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu mới:</label><span class="text-danger"></span>
                            <input type="password" class="form-control" name="matkhau" required="required">
                            <span style="color: red;"> <?php echo (isset($err['new_password'])) ? $err['new_password']:'' ?> </span>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu mới:</label><span class="text-danger"></span>
                            <input type="password" class="form-control" name="nlmatkhau" required="required">
                            <span style="color: red;"> <?php echo (isset($err['confirm_new_password'])) ? $err['confirm_new_password']:'' ?> </span>
                        </div>
                        <button type="submit" name="changePass" class="btn btn-primary">Xác nhận</button>
                        <button type="reset" name="" class="btn btn-danger">Làm mới</button>

                    </form>
                    <!-- <p class="font-weight-bolder text-success"><?php //echo isset($success)?$success:''; ?></p> -->
                </div>	
            </div>

</section>

  </body>
  </html>