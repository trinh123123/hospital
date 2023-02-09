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
                $tblmabacsi = $p->getmabacsi($_SESSION['mataikhoan']);
                $mabacsi = mysqli_fetch_assoc($tblmabacsi);
        		// $tblbacsi = $p-> getlichkham1($mabacsi['mabacsi']);
                if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
                    $ten= $_REQUEST["timkiem"];
                    $tblbacsi = $p->Timkiemlichkhambymabacsi1($mabacsi['mabacsi'],$ten);
                }else {$tblbacsi = $p-> getlichkham1($mabacsi['mabacsi']);}
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
                echo '<th style="width:15%">Tên bệnh nhân</th>';
                echo '<th style="width:15%">Ngày Khám</th>';
                echo '<th style="width:15%">Địa điểm</th>';

                echo '<th style="width:15%">Bắt đầu</th>';
                echo '<th style="width:15%">Kết thúc</th>';
                // echo '<th style="width:10%">Ngày sinh</th>';
                // echo '<th style="width:10%">Giới tính</th>';
                // echo '<th style="width:15%">Hoạt động</th>';
                // echo '<th style="width:10%">Trạng thái</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody class="table table-light text text-center">';
                if (mysqli_num_rows($tblbacsi) > 0) {
                    $dem = 1;
                    while ($row = mysqli_fetch_assoc($tblbacsi)) {
                        
                        echo "<td>" . $dem . "</td>";
                        echo "<td>" . $row['tenbenhnhan'] . "</td>";
                        echo "<td>" . $row['ngaykham'] . "</td>";
						echo "<td>" . $row['diadiem'] . "</td>";
						echo "<td>" . $row['thoigianbatdau'] . "</td>";
						echo "<td>" . $row['thoigiankethuc'] . "</td>";
						
                        // echo "<td></td>";
                        // echo "<td></td>";
                        // echo "<td><a href='giaodienadmin.php?page=doctors&editbacsi&maBacSi=" . $row["mabacsi"] . "'>Sửa</a> <br> <a href='giaodienadmin.php?page=doctors&deletebacsi&maBacSi=" . $row["mabacsi"] . "' >Xóa</a></td>";
                        // echo "<td></td>";
                        $dem++;

                            echo "</tr>";

                    }
                    echo '<tbody>';
                    echo "</table>";
                } else {
                    echo  "<td colspan='7'><center>Chưa có lịch khám </center></td>";
                    
                }
            } else {
                echo"$mabacsi";
               
            }
            ?>
                        </table>
        </div>
    </div>
 
</div>


            <!-- Modal footer -->
           



</div>


					

