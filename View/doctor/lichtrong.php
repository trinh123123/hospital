<?php
    if(!isset($_SESSION['tendangnhap']))
	{
		echo '<script>
            alert("Bạn phải đăng nhập");
            window.location.href="login.php";
            </script>';
	}
    
?>

<div class="container-fluid">
    <div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Đăng ký lịch khám</h1>
    </div>
    <div class="panel-body card">
        <div>
            <button  class="btn-primary btn btn-sm" data-toggle="modal" data-target="#myModal" style="width:200px;margin:5px;float:left;" type="button" id="new_appointment">
                Thêm lịch khám
            </button>
        <!-- Thêm bác sĩ  --> 
            


            <?php
                include_once("./Controller/clichkham.php");
                $p=new controllichkham();
                //$kq=$p->getmaTaikhoan($_SESSION['tendangnhap']);
                $tblmabacsi = $p->getmabacsi($_SESSION['mataikhoan']);
                $mabacsi = mysqli_fetch_assoc($tblmabacsi);
        		// $tblbacsi = $p-> getlichkham($mabacsi['mabacsi']);
                    
                if(isset($_REQUEST["submit1"])){
                    $ngaykham = $_REQUEST["ngaykham2"];
                    $mabacsi = $mabacsi['mabacsi'];
                    $cakham = $_REQUEST['cakham'];
                            //$p = new controllichkham();
                        $kiemtralichkham=$p ->kiemtrathemlich($ngaykham, $cakham, $mabacsi);                     
                        if(mysqli_num_rows($kiemtralichkham)>0){
                            echo '<script>alert("Lịch khám đã tồn tại");window.location.href="thongtinbacsi.php?pagetrang=lichtrong";</script>';                             
                        }
                        else{
                            $kq = $p->Insertlichkham($ngaykham,$cakham,$mabacsi);
                            if($kq=1){
                                echo '<script>alert("Thêm lịch khám thành công"); window.location.href="thongtinbacsi.php?pagetrang=lichtrong"</script>';
                                }
                            else if($kq=0){
                                echo '<script>alert("Thêm lịch khám thất bại"); window.location.href="thongtinbacsi.php?pagetrang=lichtrong";</script>';       
                            }
                        }
                
            }
            if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
                $ten= $_REQUEST["timkiem"];
                $tblbacsi = $p->Timkiemlichkhambymabacsi($mabacsi['mabacsi'],$ten);
                 }   else {$tblbacsi = $p-> getlichkham($mabacsi['mabacsi']);}
            ?>
            <?php
                // include_once("./Controller/cBacSi.php");
            

                // $p = new controlBacSi();
                // if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
                // $ten= $_REQUEST["timkiem"];
                // $tblbacsi = $p->TimkiemBacSi($ten);
                //  }   else {$tblbacsi = $p-> getAllBacSi();}
            ?>
            <div class="form-group">
            <form action="#" method="post" style="width:150px;margin:5px;float:right;">
                
                    <input type="text" class="form-control" placeholder="Tìm kiếm..."  
                    name="timkiem" style="width:200px; float:right;">
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
                echo '<thead class="table-dark text text-center">';
                echo '<tr>';
                echo '<th style="width:5%">STT</th>';
                //echo '<th style="width:15%">Tên bệnh nhân</th>';
                echo '<th style="width:15%">Ngày Khám</th>';
                //echo '<th style="width:15%">Địa điểm</th>';

                echo '<th style="width:15%">Bắt đầu</th>';
                echo '<th style="width:15%">Kết thúc</th>';
                // echo '<th style="width:10%">Ngày sinh</th>';
                // echo '<th style="width:10%">Giới tính</th>';
                echo '<th style="width:15%">Hoạt động</th>';
                // echo '<th style="width:10%">Trạng thái</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody class="table table-light text text-center">';
                if (mysqli_num_rows($tblbacsi) > 0) {
                    $dem = 1;
                    while ($row = mysqli_fetch_assoc($tblbacsi)) {
                        
                        echo "<td>" . $dem . "</td>";
                        //echo "<td>" . $row['tenbenhnhan'] . "</td>";
                        echo "<td>" . $row['ngaykham'] . "</td>";
						//echo "<td>" . $row['diadiem'] . "</td>";
						echo "<td>" . $row['thoigianbatdau'] . "</td>";
						echo "<td>" . $row['thoigiankethuc'] . "</td>";
						
                        // echo "<td></td>";
                        // echo "<td></td>";
                        //echo "<td> <a class='btn btn-sm btn-danger' href='thongtinbacsi.php?pagetrang=lichtrong&deletelichkham&malichkham=" . $row["malichkham"] . "' >Xóa</a></td>";
                        echo "<td>
                        <a ><button class='btn btn-sm btn-danger xoalichtrong' data-id_xoalichtrong=" . $row["malichkham"] . "  name='xoalichtrong'>Xóa</button></a>
                        </td>";
                        $dem++;

                            echo "</tr>";

                    }
                    echo '</tbody>';
                    echo "</table>";
                } else {
                    echo  "<td colspan='7'><center>Chưa có lịch khám </center></td>";
                    echo "</table>";
                    
                }
            } else {
                echo"$mabacsi";
               
            }
           
            ?>
            <tbody>
                <?php
               
                ?>
            </tbody>
            </table>
        </div>
    </div>
    <script>
    $(document).on('click','.xoalichtrong',function(){
        if(confirm("Bạn có chắc là muốn khôi phục mật khẩu này ko?")){
            var id_xoalichtrong=$(this).data('id_xoalichtrong');
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data:{id_xoalichtrong:id_xoalichtrong},
                success: function(data){
                    if(data==0){
                        alert("Xóa lịch thành công")
                        window.location.reload()
                    }else{
                        alert("Xóa lịch thất bại")
                    }
                    
                }
            });
        }else
            return false;
        
    });
</script>
 <div class="modal" id="myModal" style="margin-top:100px ;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Đăng kí lịch khám</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form action="#" id="manage-appointment" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Ngày khám:</label>
                        <input type="date" name="ngaykham2" id="ngaykham2" min="<?php $tomorrow=mktime(0, 0, 0,date("m"),date("d")+1, date("Y"));echo date('Y-m-d',$tomorrow);?>" class="form-control" name="ngaykham" required>
                    </div>
                    <div class="form-group">                  
                    <label>Ca khám:</label>
                        <select class="form-control" name="cakham" id="cakham" required>
                           <!-- <option value="1">Ca 1: Từ 7h  đến 7h50</option>        
                           <option value="2">Ca 2: Từ 8h  đến 8h50</option>      
                           <option value="3">Ca 3: Từ 9h  đến 9h50</option>      
                           <option value="4">Ca 4: Từ 10h  đến 10h50</option>           
                           <option value="5">Ca 5: Từ 13h  đến 15h</option>      
                           <option value="6">Ca 6: Từ 15h  đến 17h</option>               -->
                        </select>
                    </div>
                    <hr>
                    <div class="col-md-12 text-center">
                        <button class="btn-primary btn btn-sm col-md-4" name="submit1">Thêm</button>
                        <button class="btn btn-secondary btn-sm col-md-4" data-dismiss="modal" type="button" data-dismiss="modal" id="">Thoát</button>
                    </div>
                </form>
            </div>
        </div>
        
     </div>
</div>


            <!-- Modal footer -->
           



</div>
<script type="text/javascript">
    $(document).ready(function(){
            $('#ngaykham2').change(function(){
            var ngaykham2=$(this).val();
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data:{ngaykham2:ngaykham2},
                success: function(data){
                    $('#cakham').html(data);
                }
            });
        });   
    });
</script>
<script>
// Hàm gửi dữ liệu
// function Join() {
//     // Khai báo các biến dữ liệu trong form
//     $cakham = $('#ca').val();
 
//     // Gửi dữ liệu
//     $.ajax({
//         url: 'join.php', // Đường dẫn file xử lý
//         type: 'POST', // Phương thức
//         // Các dữ liệu
//         data: {
//             username: $username,
//             password: $password
//                     // Thực thi khi gửi dữ liệu thành công
//         }, success: function (result) {
//             $('#formJoin .btn-submit').html('Bắt đầu');
//             $('#formJoin .alert').html(result); // Thông báo
//         }
//     });
// }
 
// // Bắt sự kiện click vào nút bắt đầu của form
// $('#formJoin .btn-submit').click(function () {
//     $(this).html('Đang tải ...');
//     // Thực thi gửi dữ liệu
//     Join();
// });
</script>



					

