<?php
	include ('./pages/header.php');
    if(!isset($_SESSION['tendangnhap']))
{
    echo '<script>
        alert("Bạn phải đăng nhập");
        window.location.href="./login.php";
        </script>';
}

?>
   


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<?php 
    $err = [];
    function is_tenhogiadinh($tenhogiadinh) {
        $parttern = "/^([A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+)((\s{1}[A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+){1,})$/";
        if (preg_match($parttern, $tenhogiadinh))
            return true;
    }
    function is_diachi($diachi) {
        $parttern = "/^([A-Za-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ0-9,.]+)((\s{1}[A-Za-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ0-9,.]+){1,})$/";
        if (preg_match($parttern, $diachi))
            return true;
    }
    if(isset($_REQUEST["btn_hgd"])){
        $tenhogiadinh = $_REQUEST['tenhogiadinh'];
        $diachi = $_REQUEST['diachi'];
        include_once("./Controller/cHogiadinh.php");
        $p = new controlhogiadinh();
        $kq2 = $p->getmahogiadinhbytengiadinh($tenhogiadinh);
        
                if(empty($tenhogiadinh)){
                    $err['tenhogiadinh'] = '*Bạn chưa nhập tên hộ gia đình';
                }else if(!is_tenhogiadinh($tenhogiadinh)) {
                    $err['tenhogiadinh'] = "*Tên hộ gia đình phải từ 6 chữ số và không quá 32 kí tự";
                }else if(mysqli_num_rows($kq2)>0){
                    $err['tenhogiadinh'] = "*Tên hộ gia đình đã tồn tại!";
                }elseif(empty($diachi)){
                    $err['diachi'] = '*Bạn chưa nhập địa chỉ';
                }else if(!is_diachi($diachi)) {
                    $err['diachi'] = "*Địa chỉ ít nhất 2 từ";
                }
                else{
                    // include_once("./Controller/cHogiadinh.php");
                    $p=new controlhogiadinh();  
                    $mataikhoan = $_SESSION["mataikhoan"];
                    $tblbenhnhan = $p->gettmabenhnhanbytaikhoan($mataikhoan);
                    $mabenhnhan = mysqli_fetch_assoc($tblbenhnhan);                   
                    $tenhogiadinh = $_REQUEST["tenhogiadinh"];
                    $diachi = $_REQUEST["diachi"];
                    $mabacsi = $_REQUEST["mabacsi"];
                    $quyenchuho = $mabenhnhan['mabenhnhan'];
                    $kq = $p->Inserthogiadinh($tenhogiadinh, $diachi, $mabacsi, $quyenchuho,0);  
                    if($kq == 1){
                        $mataikhoan = $_SESSION["mataikhoan"];
                        $tblbenhnhan = $p->gettmabenhnhanbytaikhoan($mataikhoan);
                        $mabenhnhan = mysqli_fetch_assoc($tblbenhnhan);
                        $tblhogiadinh = $p->getmahogiadinhbytengiadinh($tenhogiadinh);
                        $mahogiadinh = mysqli_fetch_assoc($tblhogiadinh);
                        $kq1 = $p->Themthanhvien_hogiadinh($mahogiadinh['mahogiadinh'], $mabenhnhan['mabenhnhan']);
                        if($kq1==1){
                        echo '<script>alert("Tạo hộ gia đình thành công");window.location.href="dangkyhogiadinh.php";</script>';

                        }
                        else{
                        echo '<script>alert("Tạo hộ gia đình thất bại");window.location.href="dangkyhogiadinh.php";</script>';

                        }
                    }
                      else if($kq == 0){
                        echo '<script>alert("Tạo hộ gia đình thất bại");window.location.href="dangkyhogiadinh.php";</script>';
                      }   
                }


            }
            
?>
<?php
    include_once("./Controller/cHogiadinh.php");
    $p = new controlhogiadinh();
    $mataikhoan = $_SESSION["mataikhoan"];
    $tblbenhnhan = $p->gettmabenhnhanbytaikhoan($mataikhoan);
    $mabenhnhan = mysqli_fetch_assoc($tblbenhnhan);
    if($mabenhnhan['mahogiadinh'] == NULL){

                
?>
<div>
<div class="row">

    <div class="col-2" style="border-right:1px solid #dddddd">
    
        <br>
        <div style="width:95%; margin-left:auto;margin-right:auto;">
            <center><h4><b>Tạo hộ gia đình</b></h4></center>
            <form action="" method="post">
                            <div class="control-group">
                            <label for="pwd"><b>Tên hộ gia đình:</b></label>
                            <input type="text"  name="tenhogiadinh" class="form-control" required placeholder="Nhập tên hộ gia đình" required="required" data-validation-required-message="Không được để trống">
                                <div class="has-error">
                                  <span style="color: red;"> <?php echo (isset($err['tenhogiadinh'])) ? $err['tenhogiadinh']:'' ?> </span>
                                </div>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <label for="pwd"><b>Địa chỉ</b></label>
                            <input type="text"  name="diachi" class="form-control" required placeholder="Nhập địa chỉ của hộ gia đình" required="required" data-validation-required-message="Không được để trống">
                                <div class="has-error">
                                  <span style="color: red;"> <?php echo (isset($err['diachi'])) ? $err['diachi']:'' ?> </span>
                                </div>
                                <p class="help-block text-danger"></p>
                            </div>
                <!-- <b>Tên hộ gia đình:</b>
                <input type="text"  name="tenhogiadinh" class="form-control" required placeholder="Nhập tên hộ gia đình"> -->
                <!-- <b>Địa chỉ:</b>
                <input type="text" name="diachi" class="form-control" required placeholder="Nhập địa chỉ"> -->
                <br>
                    <b>Bác sĩ:</b>
                    <select id="mabacsi" name="mabacsi" class="form-control">
                        <option value="0"> Chọn bác sĩ</option>
                    </select>                

                <center><input type="submit" name="btn_hgd" value="Tạo" class="btn btn-primary"></center>
            </form>
            <br>
        </div>
                <?php
                 }else{
                    // echo "Bạn đã có hộ gia đình";
                ?>
                <div>
<div class="row">

    <div class="col-2" style="border-right:1px solid #dddddd">
    <?php
     include_once("./Controller/cHogiadinh.php");
     $p = new controlhogiadinh();
     $mataikhoan = $_SESSION["mataikhoan"];
     $tblbenhnhan = $p->gettmabenhnhanbytaikhoan($mataikhoan);
     $mabenhnhan = mysqli_fetch_assoc($tblbenhnhan);
     $tblmagiadinh= $p->gethogiadinhbymabenhnhan($mabenhnhan['mabenhnhan']);
     $tblgiadinh = mysqli_fetch_assoc($tblmagiadinh);

  
                
               
                    $tblchuho = $p->gethogiadinhbychuho($tblgiadinh['quyenchuho']);
                    $chuho = mysqli_fetch_assoc($tblchuho);
             

    ?>
        <br>
        <div style="width:95%; margin-left:auto;margin-right:auto;">
            <center><h4><b>Bạn đã có hộ gia đình</b></h4></center>
            <form action="" method="post">
                            <div class="control-group">
                            <b>Tên hộ gia đình:</b>
                            <input type="text" class="form-control" value="<?php echo $tblgiadinh['tenhogiadinh']; ?>" readonly>
                                <p class="help-block text-danger"></p>
                            </div>

                           <div class="control-group">
                            <b>Địa chỉ:</b>
                            <input type="text" class="form-control" value="<?php echo $tblgiadinh['diachi']; ?>" readonly>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            <b>Tên chủ hộ:</b>
                            <input type="text" class="form-control" value="<?php echo $chuho['tenbenhnhan']; ?>" readonly>
                                <p class="help-block text-danger"></p>
                            </div>
                                <?php
                                if($tblgiadinh['trangthai']==1){

                                
                                ?>
                            <div class="control-group">
                            <b>Họ tên bác sĩ:</b>
                            <input type="text" class="form-control" value="<?php echo $tblgiadinh['tenbacsi']; ?>" readonly>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                    <b>Trạng thái:</b>
                                    <input type="text" class="form-control" value="<?php echo "Bác sĩ đã xét duyệt"; ?>" readonly>
                                        <p class="help-block text-danger"></p>
                                    </div>
                            <?php
                                }
                                else {
                                    ?>
                                    <div class="control-group">
                                    <b>Họ tên bác sĩ đã đăng ký:</b>
                                    <input type="text" class="form-control" value="<?php echo $tblgiadinh['tenbacsi']; ?>" readonly>
                                        <p class="help-block text-danger"></p>
                                    </div>

                                    <div class="control-group">
                                    <b>Trạng thái:</b>
                                    <input type="text" class="form-control" value="<?php echo "Bác sĩ chưa xét duyệt"; ?>" readonly>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                <?php }
                                ?>
                          
        
            </form>
            <br>
        </div>
                <?php
                } ;
                ?>
    </div>
    <!-- <div class="col-5" style="border-right:1px solid #dddddd">
        <br>
        <div style="width:95%; margin-left:auto;margin-right:auto;">
            <center><h4><b>Danh sách hộ gia đình</b></h4></center>
            <form action="">
                <div style="height:300px; overflow-x:scroll;">
                    <table class="table table-hover">
                        <thead class="table table-dark text text-center">
                            <tr>
                                <th>STT</th>
                                <th>Tên hộ gia đình</th>
                                <th>Tuỳ chọn</th>
                            </tr>
                        </thead >
                        <?php
                                // $id= $_SESSION['id'];
                                // // $dshgd=get_hgd_mbs($id);
                                // $i=0;
                                // foreach($dshgd as $row){
                                //     $i++;
                
                        ?>
                        <tbody class="table table-light text text-center">
                            <tr>
                                <th><?php //echo $i?></th>
                                <th><?php //echo $row['TenHGD']?></th>
                                <th>
                                    <a href="index.php?act=hogd&see=<?php // echo $row['MaHGD']?>" name="see"class="btn btn-info btn-sm">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="index.php?act=hogd&del=<?php // echo $row['MaHGD']?>" name="see"class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </th>
                            </tr>
                        </tbody>
                       
                    </table>
                </div>
                
            </form>
           
        </div>
      
    </div> -->
 
    <div class="col-10">
    <br>
        <div style="width:95%; margin-left:auto;margin-right:auto;">
            <center><h4><b>Danh sách thành viên</b></h4></center>
            <br>
            <!-- <b>Hộ gia đình:
            <?php 
                // if(isset($_GET['see'])){
                //     $mgd=$_GET['see'];
                //     $hgd=get_hgd_mgd($mgd);
                //     echo $hgd['TenHGD'];
                // }else echo '';
            ?>
            </b>
            <br>
            <b>Địa chỉ:
            <?php
                // if(isset($_GET['see'])){
                //     $mgd=$_GET['see'];
                //     $hgd=get_hgd_mgd($mgd);
                //     echo $hgd['DiaChi'];
                // }else echo '';
            ?> -->
            <!-- </b> -->
            <form action="">
                <div style="height:300px; overflow-x:scroll;">
                    <table class="table table-hover">
                        <thead class="table table-dark text text-center">
                            <tr>
                                <th>STT</th>
                                <th>Tên thành viên</th>
                                <th>Số điện thoại</th>
                                <th>Tuỳ chọn</th>
                            </tr>
                        </thead >
                        <?php
                            include_once("./Controller/cHogiadinh.php");
                            $p = new controlhogiadinh();
                            $mataikhoan = $_SESSION["mataikhoan"];
                            $tblbenhnhan = $p->gettmabenhnhanbytaikhoan($mataikhoan);
                            $mabenhnhan = mysqli_fetch_assoc($tblbenhnhan);
                            $kq3= $p->getbenhnhanbymahogiadinh($mabenhnhan['mahogiadinh']);
                           
                            if(isset($kq3)){
                                if(mysqli_num_rows($kq3) > 0){
                                    $dem = 0;
                                    while($row = mysqli_fetch_assoc($kq3)){
                                        // $id = $row["matuvan"];
                                        $mabenhnhan = $row["mabenhnhan"];
                                        $tenbenhnhan = $row["tenbenhnhan"];
                                        $diachi = $row["diachi"];
                                        $sodienthoai = $row["sodienthoai"];
                                        $mahogiadinh = $row["mahogiadinh"];
                                        $mataikhoan = $row["mataikhoan"];
                                        $dem++;
                                    
                              
            
                        ?>
                        <tbody class="table table-light text text-center">
                            <tr>
                                <td><?php echo $dem ?></td>
                                <td><?php echo $tenbenhnhan ?></td>
                                <td><?php echo $sodienthoai ?></td>
                                <th>
                                <?php
                                    // include_once("./Controller/cHogiadinh.php");
                                    // $p = new controlhogiadinh();
                                    $mataikhoan = $_SESSION["mataikhoan"];
                                    $tblbenhnhan = $p->gettmabenhnhanbytaikhoan($mataikhoan);
                                    $tblmabenhnhan = mysqli_fetch_assoc($tblbenhnhan);
                                    // $tblhogiadinh = $p->getmahogiadinhbytengiadinh($tenhogiadinh);
                                    // $mahogiadinh = mysqli_fetch_assoc($tblhogiadinh);
                                    $mabenhnhan= $tblmabenhnhan['mabenhnhan'];
                                    $tblhogiadinh = $p->gethogiadinhbyquyenchuho($mabenhnhan);
                                    if(mysqli_num_rows($tblhogiadinh) > 0){
                                    
                                        echo "<a ><button class='btn btn-sm btn-danger xoagiadinh' data-id_xoagiadinh='".$row["mabenhnhan"]. "'  name='xoagiadinh'>Xóa</button></a>";
                       
                 
                                    }
                                    else{
                                        // echo '<script>alert("Mã bệnh nhân không tồn tại");window.location.href="dangkyhogiadinh.php";</script>';

                                        }
                                ?>  
                                </th>
                            </tr>
                        </tbody>
                        
                        <?php
                                    }
                                  }
                                  else{
                                      
                                  }
                              }                
                              else{
                             
                              echo "Chưa có thành viên";
              
                              }
                              // if(isset($_GET['see'])){
                              //     $mgd=$_GET['see'];
                              //     $tv=see_tv_hgd_mgd($mgd);
                              //     $i=0;
                              //     foreach($tv as $row){
                              //         $i++;
                            
                        ?>
                        <script>
                            $(document).on('click','.xoagiadinh',function(){
                                if(confirm("Bạn có chắc là muốn xóa thành viên này ko?")){
                                    var id_xoagiadinh=$(this).data('id_xoagiadinh');
                                    // alert(id_xoagiadinh);
                                    $.ajax({
                                        url: "ajaxhogiadinh.php",
                                        method: "POST",
                                        data:{id_xoagiadinh:id_xoagiadinh},
                                        success: function(data){
                                            if(data==1){
                                                alert("Xóa thành viên thành công")
                                                window.location.reload()
                                            }else{
                                                alert("Không thể xóa chủ hộ")
                                                window.location.reload()
                                            }
                                        }
                                    });
                                }else
                                    return false;
                                
                            });
                        </script>
                    </table>
                </div>
                <hr>
            </form>
            <?php
                include_once("./Controller/cHogiadinh.php");
                $p = new controlhogiadinh();
                $mataikhoan = $_SESSION["mataikhoan"];
                $tblbenhnhan = $p->gettmabenhnhanbytaikhoan($mataikhoan);
                $tblmabenhnhan = mysqli_fetch_assoc($tblbenhnhan);
                // $tblhogiadinh = $p->getmahogiadinhbytengiadinh($tenhogiadinh);
                // $mahogiadinh = mysqli_fetch_assoc($tblhogiadinh);
                $mabenhnhan= $tblmabenhnhan['mabenhnhan'];
                $tblhogiadinh = $p->gethogiadinhbyquyenchuho($mabenhnhan);
                if(mysqli_num_rows($tblhogiadinh) > 0){
                 
            ?>
                <center><h4><b>Thêm thành viên</b></h4></center>
                <form action="" method="post">
                    <div class="row">
                            <div class="col-10"><input type="text" class="form-control" name="mabenhnhan" placeholder="Nhập ID mã tài khoản" required></div>
                            <div class="col-2"><input type="submit" name="btn_add_tv" class="btn btn-primary" value="Thêm"></div>
                            <?php
                                if(isset($_REQUEST["btn_add_tv"])){
                                    include_once("./Controller/cHogiadinh.php");
                                    $p = new controlhogiadinh();
                                    // $tenhogiadinh = $_REQUEST["tenhogiadinh"];
                                    $mataikhoan = $_SESSION["mataikhoan"];
                                    $tblbenhnhan = $p->gettmabenhnhanbytaikhoan($mataikhoan);
                                    $mabenhnhan = mysqli_fetch_assoc($tblbenhnhan);
                                    // $tblhogiadinh = $p->getmahogiadinhbytengiadinh($tenhogiadinh);
                                    // $mahogiadinh = mysqli_fetch_assoc($tblhogiadinh);
                                    $mahogiadinh = $mabenhnhan['mahogiadinh'];
                                    $mabenhnhan = $_REQUEST['mabenhnhan']; 
                                    $tblbenhnhan1 = $p->getbenhnhan($mabenhnhan);
                                    $mabenhnhan1 = mysqli_fetch_assoc($tblbenhnhan1);
                                    if(!preg_match("/^[0-9]{1,}$/",$mabenhnhan)){
                                        echo '<script>alert("Sai định dạng mã bệnh nhân");window.location.href="dangkyhogiadinh.php";</script>';

                                    }
                                    else{
                                        if(mysqli_num_rows($tblbenhnhan1) > 0){
                                            if($mabenhnhan1['mahogiadinh']== NULL){
                                                $kq4 = $p->Themthanhvien_hogiadinh($mahogiadinh, $mabenhnhan);
                                                if($kq4 == 1){
                                                    echo '<script>alert("Thêm thành viên vào hộ gia đình thành công");window.location.href="dangkyhogiadinh.php";</script>';
                            
                                                    }
                                                    else{
                                                    echo '<script>alert("Thêm thành viên vào hộ gia đình thất bại");window.location.href="dangkyhogiadinh.php";</script>';
                            
                                                    }
                                                }else{
                                                    echo '<script>alert("Bệnh nhân đã có hộ gia đình");window.location.href="dangkyhogiadinh.php";</script>';
        
                                            }   
                                            }    
                                            else{
                                                echo '<script>alert("Mã bệnh nhân không tồn tại");window.location.href="dangkyhogiadinh.php";</script>';
                        
                                                }
                                    }
                                    
                                }                                                          
                                    
                                // $ms='';
                                // if(isset($_GET['see'])){
                                //     $mgd=$_GET['see'];
                                //     if(isset($_POST['btn_add_tv'])){
                                //         $matk=$_POST['matk'];
                                //         if(!preg_match("/^[0-9]{1,}$/",$matk)){
                                //             echo "<script>
                                //                         alert('Sai định dạng mã tài khoản');
                                //                         var url = window.location.href;
                                //                         window.location= url;
                                //                         </script>";
                                //         }else{
                                //             $user=get_user_by_id($matk);
                                //             if($user!=Null){
                                //                 $role= $user['Role'];
                                //                 if($role==1){
                                //                     if($user['MaHGD']==$mgd){
                                //                         echo "<script>
                                //                         alert('Người này đã tồn tại trong danh sách');
                                //                         var url = window.location.href;
                                //                         window.location= url;
                                //                         </script>";
                                //                     }else{
                                //                         echo "<script>
                                //                             alert('Đã thêm thành viên');
                                //                             var url = window.location.href;
                                //                             window.location= url;
                                //                             </script>";
                                //                         add_tv($matk,$mgd);
                                //                         // header("location: ../BacSi/index.php?act=hogd&see=$mgd");
                                //                         $ms='';
                                //                     }
                                                    
                                //                 }else $ms='Tài khoản không tồn tại';
                                //             }else $ms='Tài khoản không tồn tại';
                                //         }
                                //     }
                                //     if(isset($_GET['deltv'])){
                                //         $matk=$_GET['deltv'];
                                //         del_tv($matk);
                                //         echo "<script>alert('Đã khai trừ thành viên'); window.location='index.php?act=hogd&see=$mgd';</script>";
                                //     }
                                // }elseif(isset($_POST['btn_add_tv'])){
                                //     echo "<script>alert('Chưa chọn hộ gia đình cần thêm thành viên'); window.location='index.php?act=hogd';</script>";
                                // }
                            ?>
                    </div>
                    <span style="color:red"><?php  ?></span>
                </form>
                <br>
              <?php
                 
                }
                else{
                    // echo '<script>alert("Mã bệnh nhân không tồn tại");window.location.href="dangkyhogiadinh.php";</script>';

                    }
              ?>     
        </div>
    </div>
</div>
<hr>
<!-- <div style="width:40%; margin-left:auto;margin-right:auto; height:auto;">
    <center><h4><b>Hồ sơ bệnh án</b></h4></center>
    <div>
        <form action="">
        <?php
                // if(isset($_GET["hs"])){
                //     $matk = $_GET["hs"];
                //     $gethoso=get_hoso_by_id($matk);
                //     $ten= $gethoso['tenhogiadinh'];
                //     $kqdt=$gethoso['KetQuaDieuTri'];
                //     $ghichu=$gethoso['GhiChu'];
                //     $avatar=$gethoso['Avatar'];
                //     $sdt=$gethoso['SDT'];
                //     $gioitinh=$gethoso['GioiTinh'];
                //     if($gethoso['NgayKham']!=''){
                //         $ngaykham= date_create($gethoso['NgayKham']);
                //         $time= date_format($ngaykham,"d/m/Y");
                //     } else $time='';
                    
                //     $bacsi=$gethoso['BacSi'];
         ?>
                
                    <table class="table table">
                        <tr>
                            <td><center><img src="../../Avatar/<?php //echo $avatar;?>" style="width:150px;height:150px; border-radius:20px;"> </center></td>
                        </tr>
                        <tr>
                            <td>Họ tên: <?php  //echo $ten;?></td>
                        </tr>
                        <tr>
                            <td>Giới tính: <?php //echo $gioitinh?></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại: <?php //echo $sdt?></td>
                        </tr>
                        <tr>
                            <td>Kết quả điều trị:</td>
                        </tr>
                        <tr>
                            <td><textarea name="kqdieutri_u" class="form-control" readonly><?php //echo $kqdt?></textarea></td>
                        </tr>
                        <tr>
                            <td>Ghi chú và đơn thuốc:</td>
                        </tr>
                        <tr>
                            <td><textarea name="ghichu_u" class="form-control "readonly><?php //echo $ghichu?></textarea></td>
                        </tr>
                        <tr>
                            <td>Ngày chữa bệnh: <?php //echo $time?></td>
                        </tr> 
                        <tr>
                            <td>Bác sĩ: <?php //echo $bacsi?></td>
                        </tr> 
                    </table>
                <?php
                // }else{
                //     echo "<center style='font-weight: bold;'>Chưa chọn bệnh nhân</center>";}
                ?>
        </form>
    </div>
</div> -->
    
</div>
<?php
	// include ('./pages/header.php');
    include ('./pages/footer.php');
    ?>

<script>
$(document).ready(function(){    
    $.ajax({
        url: "ajaxlaybacsi.php",       
        dataType:'json',         
        success: function(data){     
            $("#mabacsi").html("");
            for (i=0; i<data.length; i++){            
                var bacsi = data[i]; 
                var str = ` 
                    <option value="${bacsi['mabacsi']}">
                         ${bacsi['tenbacsi']} 
                    </option>`;
                $("#mabacsi").append(str);
            }
        }
    });
})
</script>