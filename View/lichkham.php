<div class="container-fluid">
    <div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem danh sách lịch hẹn khách hàng</h1>
    </div>
    <div class="panel-body card card-body">

        <div>
            <form method="post" style="width:150px;margin:5px;float:right;">
                        <div class="form-group">
                        <input class="form-control" placeholder="Tìm kiếm..." id="timkiem" name="timkiem"
                        style="width:200px; float:right;">
                        </div>
            </form>
        </div>
    <div>
    <?php
			include_once("./Controller/clichkham.php");
            $p=new controllichkham();
            //$kq=$p->getmaTaikhoan($_SESSION['tendangnhap']);
            // $tblmabenhnhan = $p->getbenhnhanmtk($_SESSION['mataikhoan']);
            // $mabenhnhan = mysqli_fetch_assoc($tblmabenhnhan);
                // $tblbacsi = $p-> getlichkham2($mabenhnhan['mabenhnhan']);
            if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
                $ten= $_REQUEST["timkiem"];
                $tblbacsi = $p->TimkiemAlllichkham($ten);
            }else {$tblbacsi = $p-> getAlllichkham();}
            if (isset($tblbacsi)) {
                echo '<table class="card-body table table-hover">';
                echo '<thead class="table-dark text text-center">';
                echo '<tr>';
                echo '<th style="width:5%">STT</th>';
                echo '<th style="width:15%">Tên bác sĩ</th>';
                echo '<th style="width:15%">Tên bệnh nhân</th>';
                echo '<th style="width:15%">Ngày Khám</th>';
                echo '<th style="width:10%">Địa điểm</th>';
                
                echo '<th style="width:15%">Bắt đầu</th>';
                echo '<th style="width:15%">Kết thúc</th>';
                // echo '<th style="width:10%">Ngày sinh</th>';
                // echo '<th style="width:10%">Giới tính</th>';
                echo '<th style="width:25%">Hoạt động</th>';
                // echo '<th style="width:10%">Trạng thái</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody class="table table-light text text-center">';
                if (mysqli_num_rows($tblbacsi) > 0) {
                    $dem = 1;
                    while ($row = mysqli_fetch_assoc($tblbacsi)) {
                        if ($dem == 1) {
                            
                            echo "<tr>";
                        }
                        echo "<td>" . $dem . "</td>";
                        echo "<td>" . $row['tenbacsi'] . "</td>";
                        echo "<td>" . $row['tenbenhnhan'] . "</td>";
                        echo "<td>" . $row['ngaykham'] . "</td>";
						echo "<td>" . $row['diadiem'] . "</td>";
						echo "<td>" . $row['thoigianbatdau'] . "</td>";
						echo "<td>" . $row['thoigiankethuc'] . "</td>";
						
                        // echo "<td></td>";
                        // echo "<td></td>";
                        echo "<td></td>";
                        // echo "<td></td>";
                        $dem++;

                            echo "</tr>";

                    }
                    echo '</thead>';
                    echo "</table>";
                } else {
                    echo  "<td colspan='8'><center>Chưa có lịch khám </center></td>";
                    echo "</table>";
                }
            } else {
                echo"$mabacsi";
               
            }
        ?>
    
    </div>
</div>






