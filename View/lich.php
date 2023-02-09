<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container-fluid">
	<div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem danh sách Lịch làm việc Bác sĩ</h1>
    </div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<button  type="button" class="btn-primary btn btn-sm" data-toggle="modal" data-target="#myModal" id="new_appointment"><i class="fa fa-plus"></i> Thêm lịch</button>
				<form method="post" style="float:right;">
                        <div class="form-group">
                        <input class="form-control" placeholder="Tìm kiếm tên và ngày.." id="timkiem" name="timkiem"
                        style="width:200px;">
                        </div>
            </form>
			<?php
			include_once ("Controller/clichkham.php");
			$p = new controllichkham();
			// $tbllichkham=$p->getAlllichkhamBS();
			if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
                $ten= $_REQUEST["timkiem"];
                $tbllichkham = $p->TimkiemAlllichkhamBS($ten);
            }else {$tbllichkham = $p-> getAlllichkhamBS();}
            if (isset($tbllichkham)) {
                
                echo '<table class="card-body table table-hover">';
                echo '<thead class="table-dark text text-center">';
                echo '<tr>';
                echo '<th style="width:5%">STT</th>';
                echo '<th style="width:10%">Ngày khám</th>';
                echo '<th style="width:10%">Giờ bắt đầu</th>';
                echo '<th style="width:10%">Giờ Kết thúc</th>';
                echo '<th style="width:15%">Bác sĩ</th>';
                echo '<th style="width:15%">Tình trạng</th>';
                // echo '<th style="width:15%">Phân quyền</th>';
                echo '<th style="width:18%"></th>';
                // echo '<th style="width:10%">Ngày sinh</th>';
                // echo '<th style="width:10%">Giới tính</th>';
                // echo '<th style="width:15%">Hoạt động</th>';
                // echo '<th style="width:10%">Trạng thái</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody class="table table-light text text-center">';
                $dem1 = 1;
                if (mysqli_num_rows($tbllichkham) > 0) {
                    
                    $dem = 0;
                    while ($row = mysqli_fetch_assoc($tbllichkham)) {
                        if ($dem == 0) {
                            
                            echo "<tr>";
                        }
						echo "<td>" . $dem1++ . "</td>";
                        echo "<td>" . $row['ngaykham'] . "</td>";
                        // echo "<td><img width=60px height=70px src='./images/bacsi/" . $row['hinhanh'] . "'></td>";
                        echo "<td>" . $row['thoigianbatdau'] . "</td>";
                         echo "<td>" . $row['thoigiankethuc'] . "</td>";
						 echo "<td>" . $row['tenbacsi'] . "</td>";
						 if($row['mabenhnhan']==null){
							$trinhtrang='Trống';
						 }else{
							$trinhtrang='Đã đặt';
						 }
						 echo "<td>".$trinhtrang."</td>";

                        //$mataikhoan = $row["mataikhoan"];
                        echo "<td><a class='btn btn-primary btn btn-sm' href='giaodienadmin.php?page=appointments&editlichkham&malichkham=" . $row["malichkham"] . "'>Sửa</a>  
                        <a ><button class='btn btn-sm btn-danger delete_lichkham' data-id_xoa=" . $row['malichkham']. "  name='delete_lichkham'>Xóa</button></a></td>";
                        
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
                    echo  "<td colspan='7'><center>Chưa có lịch khám </center></td>";
                    echo "</table>";
                }
            } else {
                echo "Lỗcccc<i";
               
            }
        ?>
		</tbody>
        </table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).on('click','.delete_lichkham',function(){
        if(confirm("Bạn có chắc là muốn xóa lịch này ko?")){
            var id=$(this).data('id_xoa');
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data:{id:id},
                success: function(data){
                    if(data==0){
                        alert("Xóa lịch khám thành công")
                        window.location.reload()
                    }else{
                        alert("Xóa lịch khám thất bại")
                    }
                    
                }
            });
        }else
            return false;
        
    });
</script>

<?php
	include_once("./Controller/cBacSi.php");
	$s = new controlBacSi();
	
?>

<?php
                include_once("./Controller/clichkham.php");
                $p=new controllichkham();
                //$kq=$p->getmaTaikhoan($_SESSION['tendangnhap']);
                $tblmabacsi = $p->getmabacsi($_SESSION['mataikhoan']);
                $mabacsi = mysqli_fetch_assoc($tblmabacsi);
        		// $tblbacsi = $p-> getlichkham($mabacsi['mabacsi']);
                    
                if(isset($_REQUEST["submit1"])){
                    $ngaykham = $_REQUEST["ngaykham"];
                    $mabacsi = $_REQUEST['tenbacsi'];
                    $cakham = $_REQUEST['cakham'];
                            //$p = new controllichkham();
                        $kiemtralichkham=$p ->kiemtrathemlich($ngaykham, $cakham, $mabacsi);                     
                        if(mysqli_num_rows($kiemtralichkham)>0){
                            echo '<script>alert("Lịch khám đã tồn tại");window.location.href="giaodienadmin.php?page=appointments";</script>';                             
                        }
                        else{
                            $kq = $p->Insertlichkham($ngaykham,$cakham,$mabacsi);
                            if($kq=1){
                                echo '<script>alert("Thêm lịch khám thành công"); window.location.href="giaodienadmin.php?page=appointments"</script>';
                                }
                            else if($kq=0){
                                echo '<script>alert("Thêm lịch khám thất bại"); window.location.href="giaodienadmin.php?page=appointments";</script>';       
                            }
                        }
                
            }
            // if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
            //     $ten= $_REQUEST["timkiem"];
            //     $tblbacsi = $p->Timkiemlichkhambymabacsi($mabacsi['mabacsi'],$ten);
            //      }   else {$tblbacsi = $p-> getlichkham($mabacsi['mabacsi']);}
            ?>
<!--  ---------------Modal Them-->
  <!-- The Modal -->
  <div class="modal" id="myModal" style="margin-top:100px ;">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm lịch</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
	
        <!-- Modal body -->
        <div class="modal-body">
		<form id="manage-appointment" method="POST">
            <div id="themlich">
			<div class="form-group">
				<label for="" class="control-label">Bác sĩ</label>
				<select class="browser-default custom-select select2" name="tenbacsi" id="tenbacsi" required >
					<option value="">----Chọn bác sĩ----</option>
					<?php 
					
					// $s = new data();
					// $sql = 'SELECT * FROM bacsi where Tinhtrangbacsi!="Nghỉ việc"';
					$tblBacSi = $s->getAllBacSi();
					while ($row = mysqli_fetch_assoc($tblBacSi)) {
					?>
						<option value="<?php echo $row['mabacsi']?>"><?php echo $row['tenbacsi'] ?></option>
					<?php 
					}
					?>
				</select>
			</div>
			
			<div class="form-group">
				<label for="" class="control-label">Ngày</label>
				<input name="ngaykham" id="ngaykham" type="date" min="<?php $tomorrow=mktime(0, 0, 0,date("m"),date("d")+1, date("Y"));echo date('Y-m-d',$tomorrow);?>" class="form-control" name="ngaykham" required>
			</div>
            </div>
			<div class="form-group">
				<label for="" class="control-label">Ca</label>
				<select class="browser-default custom-select select2" name="cakham" id="cakham" required >
					<!-- <option value=""></option>
					<option value="1">Ca 1: Từ 7h  đến 7h50</option>        
					<option value="2">Ca 2: Từ 8h  đến 8h50</option>      
					<option value="3">Ca 3: Từ 9h  đến 9h50</option>      
					<option value="4">Ca 4: Từ 10h  đến 10h50</option>           
					<option value="5">Ca 5: Từ 13h  đến 15h</option>      
					<option value="6">Ca 6: Từ 15h  đến 17h</option>  -->
				</select>
			</div> 
			<!-- <div class="form-group">
				<label for="" class="control-label">Giờ kết thúc</label>
				<input type="time"  name="time" class="form-control" required>
			</div>  -->
			<hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm col-md-4" name="submit1">Thêm</button>
				<button class="btn btn-secondary btn-sm col-md-4" data-dismiss="modal" type="button" data-dismiss="modal" id="">Thoát</button>
			</div>
		</form>
        </div>
        
        <!-- Modal footer -->
        
      </div>
    </div>
  </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#themlich').change(function(){
            var tenbacsi=$('#tenbacsi').val();
            var ngaykham=$('#ngaykham').val();
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data:{tenbacsi:tenbacsi,ngaykham:ngaykham},
                success: function(data){
                    $('#cakham').html(data);
                }
            });
        });
        
    });
</script>