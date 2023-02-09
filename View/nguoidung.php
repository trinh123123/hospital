<div class="container-fluid">
    <div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem danh sách người dùng</h1>
    </div>
    <div class="panel-body card  card-body">
        <div>
            <!-- <button class="btn-primary btn btn-sm" data-toggle="modal" data-target="#myModal" style="width:200px;margin:5px;float:left;" 
            type="button" id="new_appointment">
            Thêm người dùng
            </button> -->
            <?php
                include './Controller/cTaikhoan.php';
                $p=new controlTaikhoan();
                if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
                $ten= $_REQUEST["timkiem"];
                $tblTaikhoan = $p->Timkiemnguoidung($ten);
                 }   else {$tblTaikhoan = $p->getAllTaikhoan();}
            ?>
            <div class="form-group">
            <form action="" method="post" style="width:150px;margin:5px;float:right;">
                
                    <input class="form-control" placeholder="Tìm kiếm..."  
                    name="timkiem" style="width:200px; float:right;">
                    <!-- <input type="submit" name="submit" value="Tìm Kiếm">  -->
                
            </form></div>
        </div>
        <form action="" method="post">
    <div style="height:400px; overflow-x:scroll">
        <?php
        // $tblTaikhoan = $p->getAllTaikhoan();
        // $row=mysqli_fetch_assoc($tblTaikhoan);
        
            if (isset($tblTaikhoan)) {
                
                echo '<table class="card-body table table-hover" >';
                echo '<thead  class="table table-dark text text-center">';
                echo '<tr>';
                echo '<th style="width:5%">STT</th>';
                echo '<th style="width:25%">Tên đăng nhập</th>';
                echo '<th style="width:15%">Password</th>';
                echo '<th style="width:15%">Phân quyền</th>';
                echo '<th style="width:15%">Email</th>';
                echo '<th style="width:15%"></th>';
                // echo '<th style="width:10%">Ngày sinh</th>';
                // echo '<th style="width:10%">Giới tính</th>';
                // echo '<th style="width:15%">Hoạt động</th>';
                // echo '<th style="width:10%">Trạng thái</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody class="table table-light text text-center">';
                $dem1 = 1;
                if (mysqli_num_rows($tblTaikhoan) > 0) {
                    $dem = 0;
                    
                    while ($row = mysqli_fetch_assoc($tblTaikhoan)) {
                        if($row['quyen']==0){
                            $quyen = 'Bệnh nhân';
                        }else if($row['quyen']==1){
                            $quyen = 'Bác sĩ';
                        }else if($row['quyen']==2){
                            $quyen = 'Admin';
                        }else{
                            $quyen = 'Chưa phân quyền';
                        }
                        if ($dem == 0) {
                            
                            echo "<tr>";
                        }
                        echo "<td>" . $dem1++ . "</td>";
                        // echo "<td><img width=60px height=70px src='./images/bacsi/" . $row['hinhanh'] . "'></td>";
                        echo "<td>" . $row['tendangnhap'] . "</td>";
                        // echo "<td>" . $row['matkhau'] . "</td>";
                        echo "<td>
                        <a ><button class='btn btn-sm btn-danger khoiphuc_mk' data-id_mk=" . $row['mataikhoan'] . "  name='khoiphuc_mk'>Khôi phục</button></a>
                        </td>";
                        //$mataikhoan = $row["mataikhoan"];
                        echo "<td>" . $quyen. "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        // echo "<td></td>";
                        // echo "<td></td>";
                        echo "<td><a class='btn btn-primary btn btn-sm' href='giaodienadmin.php?page=users&suatk&tendangnhap=" . $row['tendangnhap'] . "'>
                        Sửa</a></td>";
                        // echo "<td><button class='btn btn-sm btn-danger Khoiphuc' type='button' data-id="'.$item['id'].'">Khôi phục</button></td>"
                        // echo "<td></td>";
                        $dem++;
                        if ($dem % 1 == 0) {
                            echo "</tr>";
                            $dem = 0;
                        }
                    }
                    echo '</tbody>';
                    echo "</table>";
                } else {
                    // echo "0 Result $ten";
                    echo  "<td colspan='5'><center>Không có người dùng <b>$ten </b></center></td>";
                    echo "</table>";
                }
            } else {
                echo "Lỗcccc<i";
               
            }
        ?>
            </tbody>
        </table>
    </div>
        </form>
</div>
<script>
    $(document).on('click','.khoiphuc_mk',function(){
        if(confirm("Bạn có chắc là muốn khôi phục mật khẩu này ko?")){
            var id_mk=$(this).data('id_mk');
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data:{id_mk:id_mk},
                success: function(data){
                    if(data==0){
                        alert("Khôi phục mật khẩu thành công")
                        window.location.reload()
                    }else{
                        alert("Đăng nhập bằng google không thể khôi phục mật khẩu")
                    }
                }
            });
        }else
            return false;
        
    });
</script>
<!-- Khôi phục mật khẩu -->
<!-- <div class="modal fade" id="khoiphuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body">

        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <h1>Bạn có chắc muốn khôi phục mật khẩu</h1>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="khoiphuc">Xác nhận</button>
            <a href='#' class="btn btn-secondary" data-dismiss="modal">Đóng</a>
            </form>
        </div>
    </div>
    </div>
</div> -->

<!-- Thêm người dùng -->
<?php
// function is_username($tendangnhap) {
//     $parttern = "/^[A-Za-z0-9_\.]{6,32}$/";
//     if (preg_match($parttern, $tendangnhap))
//         return true;
// }

// function is_password($matkhau) {
//     $parttern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/"      ;
//     if (preg_match($parttern, $matkhau))
//         return true;
// }
// if(isset($_REQUEST['submit3'])){
//     $tendangnhap=$_REQUEST['tendangnhap'];
//     $matkhau = $_REQUEST['matkhau'];
//     $nlmatkhau = $_REQUEST['nlmatkhau'];
//     $quyen = 1;
//     $kq = $p->getTaikhoanbyTenDangNhap($tendangnhap);
    
//     if(!is_username($tendangnhap)) {
//         echo '<script>
//                 alert("*Tên đăng nhập phải từ 6 chữ số và không quá 32 chữ số");
//                 window.location.href="giaodienadmin.php?page=users";
//                 </script>';
//     }else if(mysqli_num_rows($kq)>0){
//         echo '<script>
//         alert("*Tên đăng nhập đã tồn tại!");
//         window.location.href="giaodienadmin.php?page=users";
//         </script>';
//     }
//    else if(!is_password($matkhau)) {
//         echo '<script>
//         alert("*Tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt");
//         window.location.href="giaodienadmin.php?page=users";
//         </script>';
//     }
//     else if($matkhau != $nlmatkhau){
//         echo '<script>
//         alert("*Mật khẩu nhập lại không đúng");
//         window.location.href="giaodienadmin.php?page=users";
//         </script>';
//     }else{
//         $pass = md5($matkhau);
//         $email='';
//         $kq1=$p->InsertTaikhoan($tendangnhap,$pass,$quyen);
//         if($kq1=1){
//             echo '<script>
//                 alert("Thêm người dùng thành công");
//                 window.location.href="giaodienadmin.php?page=users";
//                 </script>';
//         }else{
//             echo '<script>
//                 alert("Thêm người dùng thất bại");
//                 window.location.href="giaodienadmin.php?page=users";
//                 </script>';
//         }
//     }
// }

?>
<!-- Them doctor -->
<!-- Table Panel -->
</div>
<!--  ---------------Modal Them-->
  <!-- The Modal -->
  <!-- <div class="modal" id="myModal" style="margin-top:100px ;">
    <div class="modal-dialog">
      <div class="modal-content">
       -->
        <!-- Modal Header -->
        <!-- <div class="modal-header">
          <h4 class="modal-title">Thêm tài khoản</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
	 -->
        <!-- Modal body -->
        <!-- <div class="modal-body">
        <form action="#" id="manage-appointment" method="POST">
                    <div class="form-group">
                        <label>Tên đăng nhập:</label>
                        <input type="text" class="form-control" name="tendangnhap" placeholder="Nhập tên tài khoản" required
                        oninvalid="this.setCustomValidity('Tên đăng nhập không được để trống')"
                         oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="matkhau" placeholder="Nhập mật khẩu" required
                        oninvalid="this.setCustomValidity('Mật khẩu không được để trống')"
                         oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="nlmatkhau" placeholder="Nhập lại mật khẩu" required
                        oninvalid="this.setCustomValidity('Mật khẩu không được để trống')"
                         oninput="setCustomValidity('')">
                    </div> -->
                    <!-- <div class="form-group">
                        <label>Phân quyền:</label>
                        <select class="form-control" name="phanquyen">
                           <option value="Doctor">Doctor</option>        
                           <option value="Admin">Admin</option>           
                        </select>
            </div> -->
			<!-- <hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm col-md-4" name="submit3">Thêm</button>
				<button class="btn btn-secondary btn-sm col-md-4" data-dismiss="modal" type="button" data-dismiss="modal" id="">Thoát</button>
			</div>
		</form>
        </div> -->
        
        <!-- Modal footer -->
        
      <!-- </div>
    </div>
  </div> -->

