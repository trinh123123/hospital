<?php
if(!isset($_SESSION['tendangnhap']))
{
    echo '<script>
        alert("Bạn phải đăng nhập");
        window.location.href="./login.php";
        </script>';
}
?>
<style>
    table {
        font-weight: bold;
    }

    .form {
        width: 100%;
        height: auto;
        margin-left: 10px;
        margin-right: auto;
    }
    
</style>
<!-- <center><h4><b>Quản lý hồ sơ bệnh án</b></h4></center><br> -->
<div class="form" id="dautrang">
    <br>
    <center>
        <h4><b>Danh sách bệnh nhân</b></h4>
    </center>
    <div style="height:400px; overflow-x:scroll">
        <div class="form-group">
            <form action="#dautrang" method="post" style="margin:5px;float:right;">

                <input type="" class="form-control" placeholder="Tìm kiếm..." name="timkiem" style="width:200px; ">
                <!-- <input type="submit" name="submit" value="Tìm Kiếm" id="">  -->

            </form>
            <?php
                include_once("./Controller/cHosokhambenh.php");
                $p = new controlhosokhambenh();
                $tblmabacsi=$p->ThongTinBacsi($_SESSION['tendangnhap']);
                    $mabacsi = mysqli_fetch_assoc($tblmabacsi);
                if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){

                $ten= $_REQUEST["timkiem"];
                $tblhosokhambenh = $p->TimkiemBenhnhan($ten,$mabacsi['mabacsi']);
                 }   else {
                    // echo $mabacsi['mabacsi'];
                    $tblhosokhambenh = $p->gethosokhambenhbybenhnhan($mabacsi['mabacsi']);}
            ?>
        </div>
        <table class="table table">
            <thead class="table table-dark">
                <tr>
                    <td>STT</td>
                    <td>Avatar</td>
                    <td>Bệnh nhân</td>
                    <td>Chọn</td>
                </tr>
            </thead>
            <tbody class="table table-striped">
                <?php
                
                // echo $_SESSION['tendangnhap'];
                

                if (isset($tblhosokhambenh)) {
                    if (mysqli_num_rows($tblhosokhambenh) > 0) {
                        $dem = 0;
                        while ($row = mysqli_fetch_assoc($tblhosokhambenh)) {
                            // $id = $row["matuvan"];
                            $mabenhnhan = $row["mabenhnhan"];
                            $tenbenhnhan = $row["tenbenhnhan"];
                            $hinhanh = $row["hinhanh"];
                            $mataikhoan = $row["mataikhoan"];
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
                                <td><?php echo $dem; ?></td>
                                <?php
                                $tblmatkhau = $p->gettaikhoan_mataikhoan($mataikhoan);
                                $matkhau = mysqli_fetch_assoc($tblmatkhau);
                                if (substr($hinhanh, 0, 9) == 'NULL.jpg') {
                                    echo '<td><img  src="./images/anh1.jpg" style="clip-path: circle(50%);" width="50px" height="50px"></td>';
                                } elseif (!isset($matkhau['matkhau'])) {
                                    echo '<td><img src="' . $hinhanh . '" style="clip-path: circle(50%);" width="50px" height="50px"></td>';
                                } else {
                                    echo '<td><img src="./images/benhnhan/' . $hinhanh . '" style="clip-path: circle(50%);" width="50px" height="50px"></td>';
                                }
                                ?>
                                <!-- <td><img src="./images/benhnhan/<?php // echo $hinhanh;
                                                                        ?>" style="width:45px;height:45px;"></td> -->
                                <td><?php echo $tenbenhnhan; ?></td>
                                <td>
                                    <form action="#dautrang" method="post"  name="mabenhnhan" id="mabenhnhan">
                                        
                                        <a href="thongtinbacsi.php?pagetrang=hosokhambenh&mabenhnhan=<?php echo $mabenhnhan ?>#dautrang" class="btn btn-info">Chọn</a>
                                    </form>
                                </td>
                            </tr>
                <?php
                        }
                    } else {
                    }
                } else {
                    echo  "<td colspan='4'><center>Chưa có thành viên</center></td>";
                    // echo "Chưa có thành viên";
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
<!-- <script type="text/javascript">
            $(document).ready(function() {
                $('#mabenhnhan').change(function() {
                    var mabenhnhan = $('#mabenhnhan').val();
                    // var ngaykham = $('#ngaykham').val();
                    $.ajax({
                        url: "ajaxdshoso.php",
                        method: "POST",
                        data: {
                            mabenhnhan: mabenhnhan,
                            // ngaykham: ngaykham
                        },
                        success: function(data) {
                            $('#ctthuoc').html(data);
                        }
                    });
                });

            });
        </script> -->
        <br>
<div class="container" id="giutrang">

    <div class="row" width='100%'>

        <div class="col-6" style="border-right: 1px solid #DDDDDD;">
            <center>
                <h4><b>Hồ sơ khám bệnh của bệnh nhân: </b></h4>
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
                            <td>Ngày khám</td>
                            <td>Giờ bắt đầu</td>
                            <td>Giờ kết thúc</td>
                            <td>Chọn</td>
                        </tr>
                    </thead>
                    <tbody class="table table-striped">
                        <?php
                        if (isset($_REQUEST['mabenhnhan'])) {
                            $mabenhnhan = $_REQUEST['mabenhnhan'];
                            if(isset($_REQUEST["ngaybatdau"]) && !empty($_REQUEST["ngaybatdau"]) && isset($_REQUEST["ngayketthuc"]) && !empty($_REQUEST["ngayketthuc"])){
                            // echo "<script>alert('Thêm hồ sơ bệnh án thành công".$_REQUEST['mabenhnhan']."');</script>";
                            // echo $_REQUEST['ngaybatdau'];
                            // $ten= $_REQUEST["timkiem"];
                            $tbllichkhamm=$p->Timkiemlichkhambymabenhnhan($mabenhnhan,$_REQUEST['ngaybatdau'],$_REQUEST['ngayketthuc']);
                    // $tblhosokhambenh = $p->TimkiemBenhnhan($ten,$mabacsi['mabacsi']);
                     }   else {$tbllichkhamm = $p->getlichkhambymabenhnhan($mabenhnhan);}
                            // $mabenhnhan = $_REQUEST['mabenhnhan'];
                            // $tbllichkham = $p->getlichkhambymabenhnhan($mabenhnhan);
                            if (isset($tbllichkhamm)) {
                                if (mysqli_num_rows($tbllichkhamm) > 0) {
                                    $dem = 0;
                                    while ($row = mysqli_fetch_assoc($tbllichkhamm)) {
                                        // $id = $row["matuvan"];
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
                                            <td><?php echo $dem; ?></td>
                                            <td><?php echo $ngaykham; ?></td>
                                            <td><?php echo $thoigianbatdau; ?></td>
                                            <td><?php echo $thoigiankethuc; ?></td>
                                            <td>
                                                <form action="#giutrang" method="post">
                                                    <!-- <input href="./thongtinbacsi.php?pagetrang=hosokhambenh&mabenhnhan=<?php echo $_REQUEST['mabenhnhan'] ?>&malichkham=<?php echo $row['malichkham'] ?>" type="button" value="Chọn"> -->
                                                    <a href="./thongtinbacsi.php?pagetrang=hosokhambenh&mabenhnhan=<?php echo $_REQUEST['mabenhnhan'] ?>&malichkham=<?php echo $row['malichkham'] ?>#giutrang" class="btn btn-info">Chọn</a>
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
        
        <div class="col-6">
            <center>
                <h4><b>Hồ sơ bệnh án<b></h4>
            </center>
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
                                    <!-- <input list="topics" class="xemthuoc1 form-control" name="madonthuoc"  id="xemthuoc1" placeholder="Nhập tên đơn thuốc" required> -->
                                    <!-- <div class="row">
                                        <div class="col-8 form-search">
                                                <div class="form">
                                                    <form>
                                                        <input type="search" name="search_name" id="search_name" class="form-control" placeholder="Nhập sản phẩm cần tìm">
                                                    </form>
                                                    <ul class="list-group" id="output_search">
                                                
                                                    </ul>
                                                </div>
                                        </div>
                                    </div> -->
    <script type="text/javascript">
	// $(document).ready(function(){
	// 	var action = "search";
	// 	$("#search_name").keyup(function(){
	// 		var search_name = $("#search_name").val();
	// 		if ($("#search_name").val() != '') {
	// 		$.ajax({
	// 			url:"home/search",
	// 			method:"POST",
	// 			data:{action:action,search_name:search_name},
	// 			success:function(data){
	// 				$("#output_search").html(data);
	// 			}
	// 		});

	// 		}
	// 		else{
	// 				$("#output_search").html("");

	// 		}

	// 	});
	// });
</script>
                                    <style>
                                        #topics{
                                            overflow: hidden; 
                                            
                                            /* height: 500px; */
                                            
                                            /* width: 1000px; */
                                            }
                                        /* .datalist {
                                            overflow: hidden; 
 
                                            height: 500px;
                                            
                                            width: 1000px;
                                            display: none;
                                        }option{
                                            overflow: hidden; 
 
                                            height: 500px;
                                            
                                            width: 1000px;
                                            display: none;
                                        } */
                                    </style>
                                    <datalist name="madonthuoc"  id="topics" >
                                        <!-- <option value="html">css</option>
                                        <option value="html">
                                        <option value="html"> -->
                                        </datalist>
                                        
                                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        // $('.xemthuoc1').keyup(function() {
                                        //     // alert('xinchao');
                                        //     var madonthuoc1 = $('.xemthuoc1').val();
                                        //     // var ngaykham = $('#ngaykham').val();
                                        //     if ($(".xemthuoc1").val() != '') {
                                        //     $.ajax({
                                        //         url: "ajaxdshoso.php",
                                        //         method: "POST",
                                        //         data: {
                                        //             madonthuoc1: madonthuoc1,
                                        //             // ngaykham: ngaykham
                                        //         },
                                        //         success: function(data) {
                                        //             $('#topics').html(data);
                                        //         }
                                        //     });
                                        // }else{
                                        //     $("#topics").html("");
                                        // }
                                        // });
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
                                // $(document).ready(function() {
                                //     $('#xemthuoc1').change(function() {
                                //         var madonthuoc = $('#xemthuoc1').val();
                                //         // var ngaykham = $('#ngaykham').val();
                                //         $.ajax({
                                //             url: "ajaxdshoso.php",
                                //             method: "POST",
                                //             data: {
                                //                 madonthuoc: madonthuoc,
                                //                 // ngaykham: ngaykham
                                //             },
                                //             success: function(data) {
                                //                 $('#ctthuoc').html(data);
                                //             }
                                //         });
                                //     });

                                // });
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

                    echo "Chưa có hồ sơ";
                }
                ?>
            </form>
        </div>
    </div>
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