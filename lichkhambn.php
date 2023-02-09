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
        <h1 class="text-center">Lịch khám</h1>
    </div>
    <div class="panel-body card">
        <div>


            <?php
                include_once("./Controller/clichkham.php");
                $p=new controllichkham();
                //$kq=$p->getmaTaikhoan($_SESSION['tendangnhap']);
                $tblmabenhnhan = $p->getbenhnhanmtk($_SESSION['mataikhoan']);
                $mabenhnhan = mysqli_fetch_assoc($tblmabenhnhan);
        		    // $tblbacsi = $p-> getlichkham2($mabenhnhan['mabenhnhan']);
                if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
                    $ten= $_REQUEST["timkiem"];
                    $tblbacsi = $p->Timkiemlichkhambymabacsi1($mabenhnhan['mabenhnhan'],$ten);
                }else {$tblbacsi = $p-> getlichkham2($mabenhnhan['mabenhnhan']);}
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
                echo '<thead class=" table-dark text text-center">';
                echo '<tr>';
                echo '<th style="width:5%">STT</th>';
                echo '<th style="width:15%">Tên bác sĩ</th>';
                echo '<th style="width:15%">Ngày Khám</th>';
                echo '<th style="width:15%">Địa điểm</th>';

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
                        echo "<td>" . $row['tenbacsi'] . "</td>";
                        echo "<td>" . $row['ngaykham'] . "</td>";
						echo "<td>" . $row['diadiem'] . "</td>";
						echo "<td>" . $row['thoigianbatdau'] . "</td>";
						echo "<td>" . $row['thoigiankethuc'] . "</td>";
						
                        // echo "<td></td>";
                        // echo "<td></td>";
                        //echo "<td><a class='btn btn-primary btn btn-sm' href='thongtinbenhnhan.php?pagetrang=xemlich&huylich&malichkham=" . $row["malichkham"] . "' >Hủy</a></td>";
                        // echo "<td></td>";
                        echo "<td>
                        <a ><button class='btn btn-sm btn-danger huylich' data-id_huylich=" . $row["malichkham"] . "  name='huylich'>Hủy</button></a>
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
            echo '<center><h3><u><a class="btn btn-primary" href="doingubacsi.php">Đặt lịch</a></u></h3></center>';

            ?>
                        
        </div>
        
    </div>
</div>


            <!-- Modal footer -->
           



</div>
<script>
    $(document).on('click','.huylich',function(){
        if(confirm("Bạn có chắc là muốn hủy lịch khám này ko?")){
            var id_huylich=$(this).data('id_huylich');
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data:{id_huylich:id_huylich},
                success: function(data){
                    if(data==0){
                        alert("Hủy lịch thành công")
                        window.location.reload()
                    }else{
                        alert("Hủy lịch thất bại")
                    }
                    
                }
            });
        }else
            return false;
        
    });
</script>

					

<td colspan=""></td>