<style>
    .form-control {
    padding: 8px 15px;
    height: calc(1.5em + 1.375rem + 2px);
    border-color: #d6dbd9;
}
</style>
<div class="container-fluid">
    <div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Hồ sơ khám bệnh</h1>
    </div>
    
    <div class="panel-body card card-body">
    <br>
    <center>
                <h4><b>Hồ sơ khám bệnh của bệnh nhân </b></h4>
            </center>
            <!-- <br>
            <form action="" method="post">
                <div class="">
                    <input type="text" class="form-control" name="search" placeholder="Nhập tên người dùng" style="width:50%">
                    
                </div>
                <div>
                    <input type="submit" class="btn btn-info" name="btn_search" value="Tìm kiếm">
                </div>
            </form>
            
            <br> -->
            <div style="height:600px; overflow-x:scroll">
                <div class="form-group" style="margin:15px;">
                    <form action="#giutrang" method="post" >

                        Từ: <input  type="date" max="<?php $tomorrow=mktime(0, 0, 0,date("m"),date("d"), date("Y"));echo date('Y-m-d',$tomorrow);?>" name="ngaybatdau" style="width:150px; "> 
                        Đến: <input type="date" max="<?php $tomorrow=mktime(0, 0, 0,date("m"),date("d"), date("Y"));echo date('Y-m-d',$tomorrow);?>" name="ngayketthuc" style="width:150px; ">
                        <input type="submit" name="submit" style="width:100px; " value="Tìm Kiếm" id="">
                        <!-- <input type="submit" name="submit" value="Tìm Kiếm" id="">  -->

                        <input type="" class="form-control" placeholder="Tìm kiếm..." name="timkiem" style="width:200px;height:40px;float:right; ">
                    </form>
                    
                    <?php
                        include_once("./Controller/cHosokhambenh.php");
                        $p = new controlhosokhambenh();
                        
                    ?>
                </div>
            <div>
                <table class="table table">
                    <thead class="table table-dark">
                        <tr>
                            <td>Mã lịch khám</td>
                            <td>Tên bệnh nhân</td>
                            <td>Tên bác sĩ</td>
                            <td>Ngày khám</td>
                            <td>Giờ bắt đầu</td>
                            <td>Giờ kết thúc</td>
                            <td>Chọn</td>
                        </tr>
                    </thead>
                    <tbody class="table table-striped">
                        <?php
                        
                            // echo  "<td colspan='5'><center>Chưa có hồ sơ</center></td>";
                            if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"])){
                                // echo "<script>alert('Thêm hồ sơ bệnh án thành công".$_REQUEST['mabenhnhan']."');</script>";
                                // echo $_REQUEST['ngaybatdau'];
                                // $ten= $_REQUEST["timkiem"];
                                $tbllichkhamm=$p->Timkiemlichkhambymalichkham($_REQUEST['timkiem']);
                        // $tblhosokhambenh = $p->TimkiemBenhnhan($ten,$mabacsi['mabacsi']);
                         } elseif(isset($_REQUEST["ngaybatdau"]) && !empty($_REQUEST["ngaybatdau"]) && isset($_REQUEST["ngayketthuc"]) && !empty($_REQUEST["ngayketthuc"])){
                            // echo "<script>alert('Thêm hồ sơ bệnh án thành công".$_REQUEST['mabenhnhan']."');</script>";
                            // echo $_REQUEST['ngaybatdau'];
                            // $ten= $_REQUEST["timkiem"];
                            $tbllichkhamm=$p->Timkiemlichkhambyngay($_REQUEST['ngaybatdau'],$_REQUEST['ngayketthuc']);
                    // $tblhosokhambenh = $p->TimkiemBenhnhan($ten,$mabacsi['mabacsi']);
                           }  else {$tbllichkhamm = $p->getlichkham();}
                                // $mabenhnhan = $_REQUEST['mabenhnhan'];
                                // $tbllichkham = $p->getlichkhambymabenhnhan($mabenhnhan);
                                if (isset($tbllichkhamm)) {
                                    if (mysqli_num_rows($tbllichkhamm) > 0) {
                                        $dem = 0;
                                        while ($row = mysqli_fetch_assoc($tbllichkhamm)) {
                                            // $id = $row["matuvan"];
                                            $malichkham=$row["malichkham"];
                                            $tenbenhnhan = $row["tenbenhnhan"];
                                            $tenbacsi = $row["tenbacsi"];
                                            $ngaykham = $row["ngaykham"];
                                            $thoigianbatdau = $row["thoigianbatdau"];
                                            $thoigiankethuc = $row["thoigiankethuc"];
                                            // $mataikhoan=$row["mataikhoan"];
                                            // $diachi = $row["diachi"];
                                            // $sodienthoai = $row["sodienthoai"];
                                            // $mahogiadinh = $row["mahogiadinh"];
                                            // $mataikhoan = $row["mataikhoan"];
                                            $dem++;
    
    
                                            // $result=getlist($sql);
                                            // $i=0;
                                            // foreach($result as $row){
                                            //     $i++;
                            ?>
    
                                            <tr>
                                                <td><?php echo $malichkham; ?></td>
                                                <td><?php echo $tenbenhnhan; ?></td>
                                                <td><?php echo $tenbacsi; ?></td>
                                                <td><?php echo $ngaykham; ?></td>
                                                <td><?php echo $thoigianbatdau; ?></td>
                                                <td><?php echo $thoigiankethuc; ?></td>
                                                <td>
                                                    <form action="#formKhamBenh" method="post">
                                                        
                                                        <!-- <input href="./thongtinbacsi.php?pagetrang=hosokhambenh&mabenhnhan=<?php //echo $_REQUEST['mabenhnhan'] ?>&malichkham=<?php //echo $row['malichkham'] ?>" type="button" value="Chọn"> -->
                                                        <a href="./giaodienadmin.php?page=hskb&malichkham=<?php echo $row['malichkham'] ?>#formKhamBenh" class="btn btn-info" >Chọn</a>
                                                    </form>
                                                </td>
                                            </tr>
                            <?php
                                        }
                                    }
                                } else {
                                }
                        
                        // if(isset($_GET['see'])){
                        //     $mgd=$_GET['see'];
                        //     $tv=see_tv_hgd_mgd($mgd);
                        //     $i=0;
                        //     foreach($tv as $row){
                        //         $i++;

                        ?>
                    </tbody>
                </table>
            </div>
            </div>

<br>
<div class="panel-body card card-body" id="formKhamBenh">
            <center>
                <h4><b>Hồ sơ bệnh án<b></h4>
            </center>
            <form action="#giutrang" method="post" >
                <?php
                if (isset($_REQUEST['malichkham'])) {
                    $malichkham = $_REQUEST['malichkham'];
                    $tbllichkham = $p->getbenhnhanbymalichkham($malichkham);
                    if (isset($tbllichkham)) {
                        $row = mysqli_fetch_assoc($tbllichkham);
                        // $mataikhoan=$row["mataikhoan"];
                        $mabenhnhan = $row["mabenhnhan"];
                        // $tenbenhnhan=$row["tenbenhnhan"];
                        // $sodienthoai=$row["sodienthoai"];
                        // $hinhanh=$row["hinhanh"];
                        $ngaykham = $row["ngaykham"];
                        $tenbacsi = $row["tenbacsi"];
                        $taikhoan = $p->gettaikhoanbymabenhnhan($mabenhnhan);
                        $row1 = mysqli_fetch_assoc($taikhoan);
                        $mataikhoan = $row1["mataikhoan"];
                        $tenbenhnhan = $row1["tenbenhnhan"];
                        $sodienthoai = $row1["sodienthoai"];
                        $hinhanh = $row1["hinhanh"];
                        $chandoan = $row['chandoan'];

                        
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
                                <td><textarea name="chandoan" class="form-control" required><?php echo $chandoan; ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Đơn thuốc:</td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="madonthuoc" id="xemthuoc" class="browser-default custom-select select2" required>
                                        <option value="">----Chọn tên thuốc----</option>
                                        <?php
                                        $tbldonthuoc = $p->getAlldonthuoc();

                                        if (isset($tbldonthuoc)) {
                                            if (mysqli_num_rows($tbldonthuoc) > 0) {
                                                while ($row = mysqli_fetch_assoc($tbldonthuoc)) {
                                                    $madonthuoc = $row["madonthuoc"];
                                                    $tendonthuoc = $row["tendonthuoc"];
                                                    $ghichu = $row["ghichu"];
                                        ?>

                                                    <option value="<?php echo $madonthuoc; ?>"><?php echo $tendonthuoc; ?></option>
                                        <?php
                                                }
                                            }
                                        } else {
                                            echo "Không có đơn thuốc";
                                        }
                                        ?>
                                        <option value="themthuoc">----Thêm thuốc----</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td id="ctthuoc" name="ctthuoc">
                                    <?php

                                    ?>
                                </td>
                            </tr>

                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#xemthuoc').change(function() {
                                        var madonthuoc = $('#xemthuoc').val();
                                        // var ngaykham = $('#ngaykham').val();
                                        $.ajax({
                                            url: "ajaxdshoso.php",
                                            method: "POST",
                                            data: {
                                                madonthuoc: madonthuoc,
                                                // ngaykham: ngaykham
                                            },
                                            success: function(data) {
                                                $('#ctthuoc').html(data);
                                            }
                                        });
                                    });

                                });
                            </script>

                            <tr>
                                <td>Ngày chữa bệnh: <?php echo $ngaykham ?></td>
                            </tr>
                            <tr>
                                <td>Bác sĩ: <?php echo $tenbacsi ?></td>
                            </tr>
                        </table>

                        <div style="margin-left:auto; padding-left: 20px;">
                            <input type="reset" value="Làm mới" class="btn btn-danger">
                            <input type="submit" name="update_HSBA" style="float: right;" id="update" value="Cập nhật" class="btn btn-success">

                        </div>
                <?php
                        
                    }
                } else {

                    echo "<center>Chưa có hồ sơ</center>";
                }
                ?>
            </form>
        </div>

<br>
<?php
if (isset($_REQUEST['update_HSBA'])) {
    // echo "<script>alert('Thêm hồ sơ bệnh án thành công".$_REQUEST['chandoan']."');</script>";
    if($_REQUEST['madonthuoc']=='themthuoc'){
        $tenthuoc = $_POST['tenthuoc'];
        $soluong = $_POST['soluong'];
        $cachdung = $_POST['cachdung'];
        $loai = $_POST['loai'];
        // foreach( $tenthuoc as $key => $n ) {
        //     // $kq3=$p->insertdonthuoc($tbldonthuoc['madonthuoc'],$tenthuoc[$key],$loai[$key],$soluong[$key],$cachdung[$key]);
        //     echo "<prev>
        //         Tên thuốc: ". $tenthuoc[$key] ."
        //         Số lượng:". $soluong[$key] ."
        //         Cách dùng:". $cachdung[$key] ."
        //         Loại:". $loai[$key] ."
        //     </prev>";
        //   }
        // $tblkiemtra =$p->getAlldonthuoc();\
        $tendonthuoc=$_REQUEST['tendonthuoc'];
        $kiemtra=$p->getdonthuocbytendonthuoc($tendonthuoc);
        // echo "<script>alert('Thêm hồ sơ bệnh án thành công".$tblmadonthuoc['madonthuoc']."');</script>";
        if(mysqli_num_rows($kiemtra) <= 0){
            $kqq=$p->inserttendonthuoc($_REQUEST['tendonthuoc']);
            $kq2=$p->getdonthuocbytendonthuoc($_REQUEST['tendonthuoc']);
            $tblmadonthuoc=mysqli_fetch_assoc($kq2);
            if($kqq==1){
                $kq = $p->updatehosokhambenh_madonthuoc($tblmadonthuoc['madonthuoc'], $_REQUEST['chandoan'], $_REQUEST['malichkham']);
                foreach( $tenthuoc as $key => $n ) {
                    $kq3=$p->insertdonthuoc($tblmadonthuoc['madonthuoc'],$tenthuoc[$key],$loai[$key],$soluong[$key],$cachdung[$key]);
                    // echo "<prev>
                    //     Tên thuốc: ". $tenthuoc[$key] ."
                    //     Số lượng:". $soluong[$key] ."
                    //     Cách dùng:". $cachdung[$key] ."
                    //     Loại:". $loai[$key] ."
                    // </prev>";
                }
                
                    echo "<script>alert('Thêm hồ sơ bệnh án thành công');window.location.href='./thongtinbacsi.php?pagetrang=hosokhambenh'</script>";
                
        
            }else{
                echo "<script>alert('Thêm hồ sơ bệnh án thất bại2');window.location.href='./thongtinbacsi.php?pagetrang=hosokhambenh'</script>";
            }
        }else{
            echo "<script>alert('Trùng tên đơn thuốc');window.location.href='./thongtinbacsi.php?pagetrang=hosokhambenh'</script>";
        }
        
    }else{
        $kq = $p->updatehosokhambenh_madonthuoc($_REQUEST['madonthuoc'], $_REQUEST['chandoan'], $_REQUEST['malichkham']);
        if ($kq == 1) {
            echo "<script>alert('Thêm hồ sơ bệnh án thành công');window.location.href='./thongtinbacsi.php?pagetrang=hosokhambenh'</script>";
        } else {
            echo "<script>alert('Thêm hồ sơ bệnh án thất bại');window.location.href='./thongtinbacsi.php?pagetrang=hosokhambenh'</script>";
        }

    }
}
?>     
        
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
                <h4 class="modal-title">Hồ sơ bệnh án</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form action="" method="post" id="formKhamBenh">
                <?php
                if (isset($_REQUEST['malichkham'])) {
                    $malichkham = $_REQUEST['malichkham'];
                    $tbllichkham = $p->getbenhnhanbymalichkham($malichkham);
                    if (isset($tbllichkham)) {
                        $row = mysqli_fetch_assoc($tbllichkham);
                        // $mataikhoan=$row["mataikhoan"];
                        $mabenhnhan = $row["mabenhnhan"];
                        // $tenbenhnhan=$row["tenbenhnhan"];
                        // $sodienthoai=$row["sodienthoai"];
                        // $hinhanh=$row["hinhanh"];
                        $ngaykham = $row["ngaykham"];
                        $tenbacsi = $row["tenbacsi"];
                        $taikhoan = $p->gettaikhoanbymabenhnhan($mabenhnhan);
                        $row1 = mysqli_fetch_assoc($taikhoan);
                        $mataikhoan = $row1["mataikhoan"];
                        $tenbenhnhan = $row1["tenbenhnhan"];
                        $sodienthoai = $row1["sodienthoai"];
                        $hinhanh = $row1["hinhanh"];
                        $chandoan = $row['chandoan'];

                        // if(isset($_GET["matk"])){
                        //     $matk = $_GET["matk"];
                        //     $gethoso=get_hoso_by_id($matk);
                        //     $ten= $gethoso['HoTen'];
                        //     $kqdt=$gethoso['KetQuaDieuTri'];
                        //     $ghichu=$gethoso['GhiChu'];
                        //     $avatar=$gethoso['Avatar'];
                        //     $sdt=$gethoso['SDT'];
                        //     $gioitinh=$gethoso['GioiTinh'];
                        //     $ngaykham= date_create($gethoso['NgayKham']);
                        //     $bacsi=$gethoso['BacSi'];
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
                                <td><textarea name="chandoan" class="form-control" required><?php echo $chandoan; ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Đơn thuốc:</td>
                            </tr>
                            <tr>
                                <td>
                                    <select name="madonthuoc" id="xemthuoc" class="browser-default custom-select select2" required>
                                        <option value="">----Chọn tên thuốc----</option>
                                        <?php
                                        $tbldonthuoc = $p->getAlldonthuoc();

                                        if (isset($tbldonthuoc)) {
                                            if (mysqli_num_rows($tbldonthuoc) > 0) {
                                                while ($row = mysqli_fetch_assoc($tbldonthuoc)) {
                                                    $madonthuoc = $row["madonthuoc"];
                                                    $tendonthuoc = $row["tendonthuoc"];
                                                    $ghichu = $row["ghichu"];
                                        ?>

                                                    <option value="<?php echo $madonthuoc; ?>"><?php echo $tendonthuoc; ?></option>
                                        <?php
                                                }
                                            }
                                        } else {
                                            echo "Không có đơn thuốc";
                                        }
                                        ?>
                                        <option value="themthuoc">----Thêm thuốc----</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td id="ctthuoc" name="ctthuoc">
                                    <?php

                                    ?>
                                </td>
                            </tr>

                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#xemthuoc').change(function() {
                                        var madonthuoc = $('#xemthuoc').val();
                                        // var ngaykham = $('#ngaykham').val();
                                        $.ajax({
                                            url: "ajaxdshoso.php",
                                            method: "POST",
                                            data: {
                                                madonthuoc: madonthuoc,
                                                // ngaykham: ngaykham
                                            },
                                            success: function(data) {
                                                $('#ctthuoc').html(data);
                                            }
                                        });
                                    });

                                });
                            </script>

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

                    echo "Chưa có hồ sơ";
                }
                ?>
            </form>
                    <div class="col-md-12 text-center">

                            <input type="reset" value="Làm mới" class="btn btn-danger">
                            <input type="submit" name="update_HSBA" style="float: right;" id="update" value="Cập nhật" class="btn btn-success">

                    </div>
                <!-- </form> -->
            </div>

        </div></div></div>
            <!-- Modal footer -->
           



