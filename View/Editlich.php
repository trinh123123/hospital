<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
    include_once("./Controller/clichkham.php");
    $p=new controllichkham();
    $malichkham = $_REQUEST["malichkham"];
    $tblmalichkham = $p->getlichkhambymalichkham($malichkham);
    $lichkham=mysqli_fetch_assoc($tblmalichkham);
    $mabacsi=$lichkham['mabacsi'];
    //echo $mabacsi;
    // echo $mataikhoan['ngaykham'];
    // $tendangnhap = $p->getAllTaikhoan($mataikhoan);
    //$mataikhoan=mysqli_fetch_assoc($tendangnhap);
    // $row = mysqli_fetch_assoc($tendangnhap);
    //  $tendangnhap1 = $tendangnhap["tendangnhap"];
    // if($tendangnhap){
    //     if(mysqli_num_rows($tendangnhap) > 0){
    //         while($row = mysqli_fetch_assoc($tendangnhap)){
    //             $tendangnhap1 = $row["tendangnhap"];
    //             // $tenBacSi = $row["tenbacsi"];
    //             // $hinhanh = $row["hinhanh"];
    //             // $chuyenmon = $row["chuyenmon"];
    //         }
    //     }
    // }

    if(isset($_REQUEST["submit5"])){
    // $malichkham = $_REQUEST["malichkham"];
        $ngaykham = $_REQUEST["engaykham"];
        $macakham = $_REQUEST["cakham"];
        //$cakham = $_REQUEST['cakham'];
                //$p = new controllichkham();
            $kiemtralichkham=$p ->kiemtrathemlich($ngaykham, $macakham, $mabacsi);                     
            if(mysqli_num_rows($kiemtralichkham)>0){
                echo '<script>alert("Lịch khám đã tồn tại");window.location.href="giaodienadmin.php?page=appointments&editlichkham&malichkham='.$malichkham.'";</script>';                             
            }
            else{
                $kq = $p->Updatelichkhambymalichkham($ngaykham,$macakham,$malichkham);
                if($kq=1){
                    echo '<script>alert("Sửa lịch khám thành công"); window.location.href="giaodienadmin.php?page=appointments"</script>';
                    }
                else if($kq=0){
                    echo '<script>alert("Sửa lịch khám thất bại"); window.location.href="giaodienadmin.php?page=appointments&editlichkham&malichkham='.$malichkham.'";</script>';       
                }
            }
        // if($kq == 1){
        //     echo '<script>alert("Sửa lịch khám thành công"); window.location.href="giaodienadmin.php?page=appointments"</script>';
        //     // echo header(" location='View/bacsi.php';");
        // }elseif($kq == 0){
        //     echo '<script>alert("Sửa lịch khám thất bại");window.location.href="giaodienadmin.php?page=appointments"</script>';
        // }else{
        //     echo "Lỗi";
        // }        
    }
?>
<?php
        
    ?>

<body> 
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <center>
                <h4 class="modal-title">Sửa Lịch Khám</h4>
            </center>
            <script>
                function quay_lai_trang_truoc(){
                    history.back();
                }
            </script>        
             <button type="button" onclick="quay_lai_trang_truoc()" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="" method="post">
                <div id="updatelich">
            <div class="form-group" >
                        <label>Tên bác sĩ:</label>
                        <?php
                        include_once("./Controller/cBacSi.php");
                        $s = new controlBacSi();
                        $tblBacSi = $s->getBacSi($mabacsi);
                        $row = mysqli_fetch_assoc($tblBacSi);
                        //$etenbacsi=$row['mabacsi'];
                        ?>
                        <input type="text" class="form-control" readonly value="<?php echo $row['tenbacsi'] ?>" name="etenbacsi" id="etenbacsi" placeholder="Nhập tên tài khoản" required>
                        <span style="color:red"><?php //echo $messxuly1 ?></span>
                    </div>
            <div class="form-group" >
                        <label>Ngày khám:</label>
                        <input type="date" name="engaykham" id="engaykham" min="<?php $tomorrow=mktime(0, 0, 0,date("m"),date("d")+1, date("Y"));echo date('Y-m-d',$tomorrow);?>" value="<?php echo $lichkham['ngaykham'] ?>" class="form-control" required>
                        <span style="color:red"><?php //echo $messxuly1 ?></span>
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
                <button type="submit" class="btn btn-primary" name="submit5">Cập nhật</button>
                <input type="reset" class="btn btn-warning float-right">
            </form>
        </div>
        <!-- Modal footer -->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var etenbacsi="<?php echo $mabacsi ?>";
        $('#updatelich').change(function(){
            var engaykham=$('#engaykham').val();
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data:{etenbacsi:etenbacsi,engaykham:engaykham},
                success: function(data){
                    $('#cakham').html(data);
                }
            });
        });        
    });
</script>
</body>
</html>