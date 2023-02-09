<?php
    // $conn = mysqli_connect('localhost', 'root','') or die(mysqli_error()); //Data connection
    // $db_select = mysqli_select_db($conn,'quanlyphongkham') or die(mysqli_error());   //Selecting Data
    // mysqli_set_charset($conn,'utf8');
    include("./Controller/cThuoc.php");
    $p=new controlThuoc();
    // include ('./../plugins/Classes/PHPExcel.php');
    include ('./plugins/Classes/PHPExcel.php');
    require_once ('./plugins/Classes/PHPExcel/IOFactory.php');  //Thư viện
    
    if(isset($_POST['submit']))
    {
        if(isset($_FILES['file']['name']))
        {
            if($_FILES['file']['name'] !== '')
            {
                $file_name = $_FILES['file']['name'];
                // echo $file_name;
                $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                if($ext == 'xlsx' || $ext == 'xls'){
                    
                    $file = $_FILES['file']['tmp_name'];
                    $objReader = PHPExcel_IOFactory::createReaderForFile($file);
                    // $objReader ->setloadSheetsOnly('2011');
            
                    $objExcel = $objReader ->load($file);
                    $sheetData = $objExcel ->getActiveSheet()->toArray('null', true, true, true);
            
                    $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
                    $dem=0;
                    $dem1=0;
                    for($row = 2; $row<=$highestRow; $row++){
                        $tenthuoc = trim($sheetData[$row]['A']);
			            $thongtinthuoc = trim($sheetData[$row]['B']);
                        $kq1 = $p->getThuocbyTenThuoc($tenthuoc);
                        if($tenthuoc=='null' || $thongtinthuoc=='null' || mysqli_num_rows($kq1)>0){
                            if($tenthuoc=='null' && $thongtinthuoc=='null'){
                                
                            }else{
                                $dem++;
                            }                              
                        }else{
                            $kq = $p->insertthuoc($tenthuoc,$thongtinthuoc);
                            if($kq == 1){
                                $dem1++;
                            }
                        }
                        
                        
                    }
                        
                        if($dem>0 && $dem1==0){
                            echo '<script>alert("Thêm thuốc thất bại"); window.location.href="giaodienadmin.php?page=thuoc"</script>';
                            
                        }elseif($dem==0 && $dem1>0){
                            echo '<script>alert("Thêm thuốc thành công: '.$dem1.'"); window.location.href="giaodienadmin.php?page=thuoc"</script>';

                        }elseif($dem>0 && $dem1>0){
                            echo '<script>alert("Thành công: '.$dem1.' Thất bại: '.$dem.'"); window.location.href="giaodienadmin.php?page=thuoc"</script>';
                            
                        }else{
                            echo '<script>alert("File Sai"); window.location.href="giaodienadmin.php?page=thuoc"</script>';

                        }
                }
                else
                {
                    echo '<script>
                      alert("Chỉ được phép tải lên file excel (.xlsx)");
                    </script>';
                }
            }
            else
            {
                echo '<script>
                      alert("Bạn chưa chọn file");
                    </script>';
            }     
        }
    }
    if(isset($_POST['submit4'])){
        $kq1 = $p->getThuocbyTenThuoc($_REQUEST['tenthuoc']);
        // $tenthuoc = $_REQUEST['tenthuoc'];
        // $thongtinthuoc = $_REQUEST['thongtinthuoc'];
        if (isset($_POST['tenthuoc'])) {
            $tenthuoc = trim($_POST['tenthuoc']);	
        }
        if (isset($_POST['thongtinthuoc'])) {
            $thongtinthuoc = trim($_POST['thongtinthuoc']);
        }
        if($tenthuoc==''){
            // $err['tendangnhap'] = "*Tên đăng nhập đã tồn tại!";
            echo "<script> alert('*Vui lòng nhập tên thuốc!')</script>";
        }elseif($thongtinthuoc==''){
            // $err['tendangnhap'] = "*Tên đăng nhập đã tồn tại!";
            echo "<script> alert('*Vui lòng nhập thông tin thuốc!')</script>";
        }
        elseif(mysqli_num_rows($kq1)>0){
            // $err['tendangnhap'] = "*Tên đăng nhập đã tồn tại!";
            echo "<script> alert('*Trùng tên thuốc!')</script>";
        }
        else{
            $kq = $p->insertthuoc($tenthuoc,$thongtinthuoc);
            if($kq == 1){
                echo '<script>alert("Thêm thuốc thành công"); window.location.href="giaodienadmin.php?page=thuoc"</script>';
            }elseif($kq == 0){
                echo '<script>alert("Thêm thuốc thất bại")</script>';
            }else{
                echo "Lỗi";
            }

        }
    }
?>
<div class="container-fluid">
<div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem danh sách Thuốc</h1>
    </div>
    <div class="panel-body card  card-body">
        <div>
            <button class="btn btn-primary btn btn-sm" data-toggle="modal" data-target="#myModal" style="width:150px;margin:5px;float:left;" 
            type="button" id="new_appointment">
            <i class="fa fa-plus"> </i> Thêm Thuốc
            </button>
            <!-- <form method="post" enctype="multipart/form-data">
                
            </form> -->
            
            <style>
                .s2,.s3{
                    display:inline-block;
                }
            </style>
                <div>
                    <form class="s2" method="post" style="width:40%;margin:5px;float:left;" enctype="multipart/form-data">
                        <input type="file" name="file" accept=".xlsx,.xls" required>
                        <input type="submit" name="submit" value="Upload">
                    </form>
                    
                    <?php
                        // include './Controller/cTaikhoan.php';
                        // $p=new controlTaikhoan();
                        if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
                        $ten= $_REQUEST["timkiem"];
                        $tblTaikhoan = $p->Timkiemthuoc($ten);
                        }   else {$tblTaikhoan = $p->getAllthuoc();}
                    ?>
                    <!-- <form class="s3 " method="post"  style="float:right;margin:5px;text-align:right;" >
                        <input type="text" class="form-control timkiem" id="timkiem"placeholder="Tìm kiếm..."  id="s" name="s"
                                style="width:200px;float:right ; margin-right:10px;">
                                
                                
                    </form> -->
                </div>
                <!-- <img src="./images/excel.png" alt="" style="width:50px;margin:15px;float:left;"> -->
                <a class="form-group" href="./images/MauNhapThuoc.xlsx">
                <img src="./images/excel.png" alt="" style="margin-top:-10px;width:50px;float:left;">
                   <p style="float:left;">Mẫu File</p> 
                    </a>
                <div class="form-group">
                    <form action="#" method="post" style="width:150px;margin:5px;float:right;">                
                    <input class="form-control" placeholder="Tìm kiếm..."  
                    name="timkiem" style="width:200px; float:right;">
                    <!-- <input type="submit" name="submit" value="Tìm Kiếm">  -->
                
            </form></div>

        </div>
        <div>
        <?php
        // $tblTaikhoan = $p->getAllTaikhoan();
        // $row=mysqli_fetch_assoc($tblTaikhoan);
        
            if (isset($tblTaikhoan)) {
                
                echo '<table class="card-body table table-hover" >';
                echo '<thead class="table table-dark text text-center">';
                echo '<tr>';
                echo '<th style="width:5%">STT</th>';
                echo '<th style="width:15%">Tên thuốc</th>';
                echo '<th style="width:25%">Thông tin thuốc</th>';
                // echo '<th style="width:15%">Phân quyền</th>';
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
                        if ($dem == 0) {
                            
                            echo "<tr>";
                        }
                        echo "<td>" . $dem1++ . "</td>";
                        // echo "<td><img width=60px height=70px src='./images/bacsi/" . $row['hinhanh'] . "'></td>";
                        echo "<td>" . $row['tenthuoc'] . "</td>";
                         echo "<td>" . $row['thongtinthuoc'] . "</td>";
                        
                        //$mataikhoan = $row["mataikhoan"];
                        echo "<td><a class='btn btn-primary btn btn-sm' href='giaodienadmin.php?page=thuoc&editthuoc&mathuoc=" . $row["mathuoc"] . "'>Sửa</a> 
                         <a ><button class='btn btn-sm btn-danger delete_thuoc' data-id_thuoc=" . $row["mathuoc"] . "  name='delete_thuoc'>Xóa</button></a>
                         </td>";
                        
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
                    //echo "0 Result $ten";
                    echo  "<td colspan='4'><center>Không có thuốc <b> $ten</b></center></td>";
                    echo "</table>";
                }
            } else {
                echo "Lỗcccc<i";
               
            }
        ?>
            </tbody>
        </table>
    </div>
    <div>
        <table class="card-body table table-bordered table-hover" id="load_data">
            
        </table>
    </div>
</div>
<script>
	$(document).on('click','.delete_thuoc',function(){
        if(confirm("Bạn có chắc là muốn xóa thuốc này ko?")){
            var id_thuoc=$(this).data('id_thuoc');
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data:{id_thuoc:id_thuoc},
                success: function(data){
                    if(data==0){
                        alert("Xóa thuốc thành công")
                        window.location.reload()
                    }else{
                        alert("Xóa thuốc thất bại")
                    }
                    
                }
            });
        }else
            return false;
        
    });
</script>
<script>
    // $(document).ready(function() {
    //     view_data();
    //     function view_data(){
    //         $.ajax({
    //             url:"ajax/ajax_thuoc.php",
    //             method:"POST",
    //             success:function(data){
    //                 $('#load_data').html(data);
                    
    //             }
    //         })
    //     }
    //     //function goitimkiem(){
    //         $(document).on('blur','.timkiem',function(){
    //             var s=$(this).val();
    //             $.post("ajax/ajax_thuoc.php",{s:s},function(data){
    //                  $('#load_data').html(data);
    //              })
    //         });
        

        
    //     //Xóa
    //     $(document).on('click','.delete_thuoc',function(){
    //         var id=$(this).val();
    //         var check=confirm("Bạn có chắc chắn muốn xóa không");
    //         if(check==true){
    //             $.post("ajax/xoathuoc.php",{id:id},function(data){
    //                 alert(data);
    //                 view_data();

    //             })
    //         }else{
    //             return;
    //         }
            
    //     });
    //  })
</script>
<!-- Them thuóc -->
<!-- Table Panel -->
</div>
<!--  ---------------Modal Them-->
  <!-- The Modal -->
  <div class="modal" id="myModal" style="margin-top:60px ;">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm Thuốc</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
	
        <!-- Modal body -->
        <div class="modal-body">
        <form action="" id="manage-appointment" method="POST">
                    <div class="form-group">
                        <label>Tên Thuốc:</label>
                        <input class="form-control" type="text" name="tenthuoc"  placeholder="Nhập tên thuốc"  required/>
                    </div>
                    <!-- <div class="form-group">
                        <label for="" class="control-label">Loại thuốc</label><br>
                        <input type="text" class="form-control" name="loaithuoc" required>
                    </div> -->
                    <div class="form-group">
                        <label for="" class="control-label">Thông tin thuốc</label>
                        <textarea type="text" rows="8" class="form-control" name="thongtinthuoc" placeholder="Nhập thông tin thuốc"  cols="61" required></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label for="" class="control-label">Hạn dùng</label>
                        <input type="date" class="form-control" name="handung" required>
                    </div> -->
			<hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm col-md-4" name="submit4">Thêm</button>
				<button class="btn btn-secondary btn-sm col-md-4" data-dismiss="modal" type="button" data-dismiss="modal" id="">Thoát</button>
			</div>
		</form>
        </div>
        
        <!-- Modal footer -->
        
      </div>
    </div>
  </div>





