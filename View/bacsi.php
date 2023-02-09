<style>
    .form-control {
    padding: 8px 15px;
    height: calc(1.5em + 1.375rem + 2px);
    border-color: #d6dbd9;
}
</style>
<div class="container-fluid">
    <div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem danh sách bác sĩ</h1>
    </div>
    <div class="panel-body card card-body">
        <div>
            <button  class="btn-primary btn btn-sm" data-toggle="modal" data-target="#myModal" style="width:150px;float:left;" type="button" id="new_appointment">
            <i class="fa fa-plus"> </i> Thêm Bác sĩ
            </button>
        <!-- Thêm bác sĩ  --> 
            <?php 
             $err = [];
             function is_hoten($hoten) {
                $parttern = "/^([A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+)((\s{1}[A-Z][a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+){1,})$/";
                if (preg_match($parttern, $hoten))
                    return true;
            }
             function is_username($tendangnhap) {
               $parttern = "/^[A-Za-z0-9_\.]{6,32}$/";
               if (preg_match($parttern, $tendangnhap))
                   return true;
           }
         
           function is_password($matkhau) {
               $parttern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
               if (preg_match($parttern, $matkhau))
                   return true;
           }
                include_once("./QRCode/php_qr_code/qrlib.php");
                include_once("./Controller/cTaikhoan.php");
                if(isset($_REQUEST["submit1"])){
                $tendangnhap = $_REQUEST["tendangnhapbs"];
                $matkhau=$_REQUEST["matkhaubs"];
                $email=$_REQUEST["email"];
                $quyen = 1;
                $hoten=$_REQUEST["hotenbs"];
                $chuyenmon = $_REQUEST["chuyenmonbs"];
                $p = new controlTaiKhoan();
                $kq1 = $p->getTaikhoanbyTenDangNhap($tendangnhap);
                if(empty($hoten)){
                    echo '<script>alert("Bạn chưa nhập họ tên")</script>';
                }else if(!is_hoten($hoten)) {
                    echo '<script>alert("Họ tên ít nhất 2 từ, ký tự đầu (viết hoa) và cuối phải là chữ cái, giữa các từ chỉ có 1 dấu cách")</script>';
                }elseif(!is_username($tendangnhap)) {
                    //$err['tendangnhap'] = "*Tên đăng nhập phải từ 6 chữ số và không quá 32 chữ số";
                    echo "<script> alert('*Tên đăng nhập phải từ 6 chữ số và không quá 32 chữ số')</script>";
                }else if(mysqli_num_rows($kq1)>0){
                    // $err['tendangnhap'] = "*Tên đăng nhập đã tồn tại!";
                    echo "<script> alert('*Tên đăng nhập đã tồn tại!')</script>";
                }
                else if(!is_password($matkhau)) {
                    // $err['matkhau'] = "*Tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt";
                    echo "<script> alert('*Mật khẩu tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt')</script>";
                }
                
            //}
            else{
                // $_SESSION['tendangnhap']= $tendangnhap;
                //$_SESSION['quyen'] = $row['quyen'];
                
                
                $pass=md5($matkhau);
                $kq = $p->InsertTaikhoan($tendangnhap,$pass,$email,$quyen);
                if($kq=1){

                    
                    $tblmataikhoan = $p->getmaTaikhoan($tendangnhap);
                    $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);
                    $bn = $p->Insertbacsi($mataikhoan['mataikhoan'],$hoten,$chuyenmon);
                    if($bn == 1){
                    echo '<script>alert("Thêm thông tin bác sĩ thành công"); window.location.href="giaodienadmin.php?page=doctors"</script>';
                        $qr_code_file_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'../images/qr_images'.DIRECTORY_SEPARATOR;
                        //echo $qr_code_file_path;
                        $set_qr_code_path = '../images/qr_images/';
                        
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
                        $insert_qr = $p -> updateqrcodebs($mataikhoan['mataikhoan'],basename($filename));
                        if($insert_qr == 1){
                            echo "<script>alert('OK')</script>";
                        }
                    }else{
                        echo "thất bại";
                    }

                }else
                    echo '<script>alert("Thêm bác sĩ không thành công!")</script>'; 
            }
                   }
                  else{'<script>alert("Lỗi")</script>';}
            ?>


            <?php
                include_once("./Controller/cBacSi.php");
            

                $p = new controlBacSi();
                if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
                $ten= $_REQUEST["timkiem"];
                $tblbacsi = $p->TimkiemBacSi($ten);
                 }   else {$tblbacsi = $p-> getAllBacSi();}
            ?>
            <div class="form-group">
            <form action="" method="post" style="margin:5px;float:right;">
                
                    <input type="" class="form-control" placeholder="Tìm kiếm..."  
                    name="timkiem" style="width:200px; ">
                    <!-- <input type="submit" name="submit" value="Tìm Kiếm" id="">  -->
                
            </form></div>
            <!-- <form action="#" method="get" style="background-color: #CCCC99;padding:7px";>  
                Tìm kiếm theo tên sản phẩm:
                <input type="text" name='timkiem' placeholder="Nhập vào từ cần tìm">
                <input type="submit" name="submit" value="Tìm Kiếm" id=""> 
    </form> -->
        </div>
        <div>
            <?php
            if (isset($tblbacsi)) {
                echo '<table class="card-body table table-hover">';
                echo '<thead class="table table-dark text text-center">';
                echo '<tr>';
                echo '<th style="width:5%">STT</th>';
                echo '<th style="width:15%">Image</th>';
                echo '<th style="width:15%">Họ và tên</th>';
                echo '<th style="width:15%">Chuyên môn</th>';
                echo '<th style="width:15%">Tên tài khoản</th>';
                echo '<th style="width:15%">Email</th>';
                // echo '<th style="width:10%">Ngày sinh</th>';
                // echo '<th style="width:10%">Giới tính</th>';
                echo '<th style="width:16%">Hoạt động</th>';
                // echo '<th style="width:10%">Trạng thái</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody class="table table-light text text-center">';
                //$dem1 = 1;
                if (mysqli_num_rows($tblbacsi) > 0) {
                    $dem = 1;
                    while ($row = mysqli_fetch_assoc($tblbacsi)) {
                        if ($dem == 1) {
                            echo "<tr>";
                        }
                        echo "<td>" . $dem . "</td>";
                        if(substr($row["hinhanh"],0,9)=='NULL.jpg'){
                            echo '<td><img src="./images/anh1.jpg" style="clip-path: circle(50%);" width="100px" height="100px"></td>';
                          }else{
                            echo '<td><img src="./images/bacsi/'.$row["hinhanh"].'" style="clip-path: circle(50%);" width="100px" height="100px"></td>';
                          }
                        // echo "<td><img width=60px height=70px src='./images/bacsi/" . $row['hinhanh'] . "'></td>";
                        echo "<td>" . $row['tenbacsi'] . "</td>";
                        echo "<td>" . $row['chuyenmon'] . "</td>";
                        echo "<td>" . $row['tendangnhap'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        // echo "<td></td>";
                        // echo "<td></td>";
                        echo "<td><a class='btn btn-primary btn btn-sm' href='giaodienadmin.php?page=doctors&editbacsi&maBacSi=" . $row["mabacsi"] . "'>Sửa</a> 
                        <a ><button class='btn btn-sm btn-danger delete_bacsi' data-id_xoabs=" . $row["mabacsi"] . "  name='delete_bacsi'>Xóa</button></a></td>";
                        // echo "<td></td>";
                        $dem++;
                        // if ($dem % 1 == 0) {
                        //     $dem = 0;
                        // }
                        echo "</tr>";
                    }
                    echo '</thead>';
                    echo "</table>";
                } else {
                    // echo "0 Result $ten";
                    echo  "<td colspan='6'><center>Không có bác sĩ <b>$ten</b> </center></td>";
                    echo "</table>";
                }
            } else {
                echo "Lỗcccc<i";
               
            }
            ?>
            <tbody>
                <?php
               
                ?>
            </tbody>
            </table>
        </div>
    </div>
    <!-- Them doctor -->
    <!-- Table Panel -->
</div>
<script>
	$(document).on('click','.delete_bacsi',function(){
        if(confirm("Bạn có chắc là muốn xóa bác sĩ này ko?")){
            var id_bs=$(this).data('id_xoabs');
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data:{id_bs:id_bs},
                success: function(data){
                    if(data==0){
                        alert("Xóa bác sĩ thành công")
                        window.location.reload()
                    }else{
                        alert("Xóa bác sĩ thất bại")
                    }
                    
                }
            });
        }else
            return false;
        
    });
</script>
<!--  ---------------Modal Them-->
<!-- The Modal -->
<div class="modal" id="myModal" style="margin-top:60px ;">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm Bác sĩ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="#" id="manage-appointment" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Họ tên:</label>
                        <input type="text" class="form-control" name="hotenbs"  placeholder="Enter Họ tên" required>
                    </div>
                    <div class="form-group">
                        <label>Tên Đăng Nhập:</label>
                        <input type="text" class="form-control" name="tendangnhapbs" placeholder="Nhập tên đăng nhập" required>

                    </div>
                    <div class="form-group">
                        <label>Mật Khẩu: </label>
                        <input type="password" class="form-control" name="matkhaubs" placeholder="Nhập mật khẩu" required>

                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email" required>

                    </div>
                    <div class="form-group">
                        <label>Chuyên Môn: </label>
                        <!-- <input type="text" class="form-control" name="chuyenmonbs"  placeholder="Nhập chuyên môn" required> -->
                        <select class="form-control" name="chuyenmonbs">
                           <option value="Tim Mạch">Tim Mạch</option>        
                           <option value="Thần Kinh">Thần Kinh</option>
                           <option value="Xương khớp">Xương khớp</option>           
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Ngày sinh:</label>
                        <input type="date" class="form-control" name="ngaysinh" required>

                    </div>
                    <div class="form-group">
                        <label>Giới tính:</label>
                        <input type="radio" value="Nam" name="gioitinh"><label for="">Nam</label>
                        <input type="radio" value="Nữ" name="gioitinh"><label for="">Nữ</label> <br>
                        <span style="color:red"><?php //echo isset($messs3)?$messs3:''; 
                                                ?></span>
                    </div> -->
                    <!--
                    <div class="form-group">
                        <label for="" class="control-label">Image</label>
                        <input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))" required>
                    </div> -->
                    <hr>
                    <div class="col-md-12 text-center">
                        <button class="btn-primary btn btn-sm col-md-4" name="submit1">Thêm</button>
                        <button class="btn btn-secondary btn-sm col-md-4" data-dismiss="modal" type="button" data-dismiss="modal" id="">Thoát</button>
                    </div>
                </form>
            </div>

        </div></div></div>
            <!-- Modal footer -->
           



