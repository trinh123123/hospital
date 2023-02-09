<?php
	if(!isset($_SESSION['tendangnhap']))
	{
		echo '<script>
            alert("Bạn phải đăng nhập");
            window.location.href="../login.php";
            </script>';
	}
?>
<div class="container-fluid">
	<div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem Lịch Sử Khám</h1>
    </div>
	<div class="container" id="giutrang">

    <div class="row" width='100%'>

        <div class="col-6" style="border-right: 1px solid #DDDDDD;">
            <center>
                <h4><b>Hồ sơ khám bệnh</b></h4>
            </center>
            
            <div style="height:700px; overflow-x:scroll">
                <div class="form-group">
                    <form action="#giutrang" method="post" style="margin:5px;">

                        Từ: <input  type="date" max="<?php $tomorrow=mktime(0, 0, 0,date("m"),date("d"), date("Y"));echo date('Y-m-d',$tomorrow);?>" name="ngaybatdau" style="width:150px; "> 
                        Đến: <input type="date" max="<?php $tomorrow=mktime(0, 0, 0,date("m"),date("d"), date("Y"));echo date('Y-m-d',$tomorrow);?>" name="ngayketthuc" style="width:150px; ">
                        <input type="submit" name="submit" style="width:100px; " value="Tìm Kiếm" id="">
                        <!-- <input type="submit" name="submit" value="Tìm Kiếm" id="">  -->

                    </form>
                    <?php
                        // $mabacsi = mysqli_fetch_assoc($tbllichkham);
                        
                    ?>
                </div>
                <table class="table table">
                    <thead class="table table-dark">
                        <tr>
                            <td>STT</td>
                            <td>Chẩn đoán</td>
                            <td>Ngày khám</td>
                            <td>Giờ bắt đầu</td>
                            <td>Giờ kết thúc</td>
                            <td>Chọn</td>
                        </tr>
                    </thead>
                    <tbody class="table table-striped">
                        <?php
                        include_once("./Controller/cHosokhambenh.php");
                        $p = new controlhosokhambenh();
                        $tblmabenhnhan=$p->ThongTinBenhnhan($_SESSION['tendangnhap']);
                        $mabenhnhan1=mysqli_fetch_assoc($tblmabenhnhan);
                        $mabenhnhan=$mabenhnhan1['mabenhnhan'];
                        if (isset($mabenhnhan)) {
                            if(isset($_REQUEST["ngaybatdau"]) && !empty($_REQUEST["ngaybatdau"]) && isset($_REQUEST["ngayketthuc"]) && !empty($_REQUEST["ngayketthuc"])){
                            $tbllichkhamm=$p->Timkiemlichkhambymabenhnhan($mabenhnhan,$_REQUEST['ngaybatdau'],$_REQUEST['ngayketthuc']);
                     }   else {$tbllichkhamm = $p->getlichkhambymabenhnhan($mabenhnhan);}

                            if (isset($tbllichkhamm)) {
                                if (mysqli_num_rows($tbllichkhamm) > 0) {
                                    $dem = 0;
                                    while ($row = mysqli_fetch_assoc($tbllichkhamm)) {
                                        // $id = $row["matuvan"];
                                        $ngaykham = $row["ngaykham"];
                                        $thoigianbatdau = $row["thoigianbatdau"];
                                        $thoigiankethuc = $row["thoigiankethuc"];
                                        $chandoan=$row['chandoan'];
                                        $dem++;
                        ?>

                                        <tr>
                                            <td><?php echo $dem; ?></td>
                                            <td><?php echo $chandoan; ?></td>
                                            <td><?php echo $ngaykham; ?></td>
                                            <td><?php echo $thoigianbatdau; ?></td>
                                            <td><?php echo $thoigiankethuc; ?></td>
                                            <td>
                                                <form action="#giutrang" method="post">
                                                    <!-- <input href="./thongtinbacsi.php?pagetrang=hosokhambenh&mabenhnhan=<?php //echo $_REQUEST['mabenhnhan'] ?>&malichkham=<?php //echo $row['malichkham'] ?>" type="button" value="Chọn"> -->
                                                    <a href="./thongtinbenhnhan.php?pagetrang=lichsu&malichkham=<?php echo $row['malichkham'] ?>#giutrang" class="btn btn-info">Chọn</a>
                                                </form>
                                            </td>
                                        </tr>
                        <?php
                                    }
                                }
                            } else {
                            }
                        } else {
                            echo  "<td colspan='5'><center>Chưa có hồ sơ</center></td>";
                            // echo "Chưa có hồ sơ";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
        
        <div class="col-6">
            <center>
                <h4><b>Chi tiết<b></h4>
            </center>
            <form action="" method="post">
                <?php
                if (isset($_REQUEST['malichkham'])) {
                    $malichkham = $_REQUEST['malichkham'];
                    $tbllichkham = $p->getbenhnhanbymalichkham($malichkham);
                    if (isset($tbllichkham)) {
                        $row = mysqli_fetch_assoc($tbllichkham);
                        $mabenhnhan = $row["mabenhnhan"];
                        $ngaykham = $row["ngaykham"];
                        $tenbacsi = $row["tenbacsi"];
                        $taikhoan = $p->gettaikhoanbymabenhnhan($mabenhnhan);
                        $row1 = mysqli_fetch_assoc($taikhoan);
                        $mataikhoan = $row1["mataikhoan"];
                        $tenbenhnhan = $row1["tenbenhnhan"];
                        $sodienthoai = $row1["sodienthoai"];
                        $hinhanh = $row1["hinhanh"];
                        $chandoan = $row['chandoan'];
                        $madonthuoc=$row['madonthuoc'];
                        $tbldonthuoc = $p->getdonthuocbymadonthuoc($madonthuoc);
                        $row2 = mysqli_fetch_assoc($tbldonthuoc);
                        if(isset($row2['tendonthuoc'])){

                            $tendonthuoc = $row2['tendonthuoc'];
                        }else{
                            $tendonthuoc='';
                        }
                ?>

                        <table class="table table">
                            <tr>

                                <?php
                                $tblmatkhau = $p->gettaikhoan_mataikhoan($mataikhoan);
                                $matkhau = mysqli_fetch_assoc($tblmatkhau);
                                if (substr($hinhanh, 0, 9) == 'NULL.jpg') {
                                    echo '<td><center><img  src="./images/anh1.jpg" style="clip-path: circle(50%);" width="150px" height="150px"></center></td>';
                                } elseif (!isset($matkhau['matkhau'])) {
                                    echo '<td><center><img src="' . $hinhanh . '" style="clip-path: circle(50%);" width="150px" height="150px"></center></td>';
                                } else {
                                    echo '<td><center><img src="./images/benhnhan/' . $hinhanh . '" style="clip-path: circle(50%);" width="150px" height="150px"></center></td>';
                                }
                                ?>

                            </tr>
                            <tr>
                                <td>Họ tên: <?php echo $tenbenhnhan; ?></td>
                            </tr>

                            <tr>
                                <td>Số điện thoại: <?php echo $sodienthoai ?></td>
                            </tr>
                            <tr>
                                <td>Chẩn đoán:</td>
                            </tr>
                            <tr>
                                <td><textarea name="chandoan" class="form-control" required readonly><?php echo $chandoan; ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Đơn thuốc:</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="" class="form-control" required readonly value="<?php echo $tendonthuoc ?>">
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <?php 
                                    $tbldonthuoc1 = $p->getdonthuoc_thuocvathuoc($madonthuoc);
                                    $dem = 0;
                                
                                    
                                    while ($row4 = mysqli_fetch_array($tbldonthuoc1)) {
                                        // $mathuoc=$row["mathuoc"];
                                        $tenthuoc = $row4["tenthuoc"];
                                        $donvi = $row4["donvi"];
                                        $soluong = $row4["soluong"];
                                        $cachdung = $row4["cachdung"];
                                        $dem++;
                                        echo $dem;
                                        ?>
                                        <input name="tenthuoc" value="<?php echo $tenthuoc ?>" class="form-control " readonly>
                                        Số lượng: <input style="width:50px"  name="tenthuoc" value="<?php echo $soluong?>" readonly><?php echo $donvi?>
                                        <input class="form-control" name="tenthuoc" value="<?php echo $cachdung?>" readonly><br>
                                        <?php
                                        
                                    }
                                    ?>
                                </td>
                            </tr>

                            

                            <tr>
                                <td>Ngày chữa bệnh: <?php echo $ngaykham ?></td>
                            </tr>
                            <tr>
                                <td>Bác sĩ: <?php echo $tenbacsi ?></td>
                            </tr>
                        </table>

                <?php
                    }
                } else {

                    echo  "<br><td colspan='5'><center>Chưa có hồ sơ</center></td>";
                }
                ?>
            </form>
        </div>
    </div>
</div>
	</div>
</div>

