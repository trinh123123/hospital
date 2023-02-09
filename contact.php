<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
</head>
<body>
  <div class="hero_area">
    <!-- header section strats -->
    <?php
	include './pages/header.php';
  if(!isset($_SESSION['tendangnhap']))
	{
		echo '<script>
            alert("Bạn phải đăng nhập");
            window.location.href="login.php";
            </script>';
	}
?>
    <!-- end header section -->
    <!-- slider section -->
     <!-- Messenger Plugin chat Code -->
     <div id="fb-root"></div>
<style>
    .form{
        width: 60%;
        height: auto;
        margin-left: auto;
        margin-right: auto;
    }

    
</style>
<?php 
  if(isset($_SESSION['tendangnhap'])){
  if($_SESSION['quyen']==1){

 
?>

<div class="row">
    <div class="col-6" style="border-right: 1px solid #dddddd">
        <div style="width:90%; margin-left:auto; margin-right:auto;">
            <br>
        <center><h4><b>Danh sách yêu cầu tư vấn</b></h4></center>
        <div class="form-group">
            <form action="#" method="post" style="width:150px;margin:5px;float:right;">
                    <input type="text" class="form-control" placeholder="Tìm kiếm tiêu đề..."  
                    name="timkiem" style="width:200px; float:right;">
            </form>
        </div>
            <form action="" method="POST">
                <?php
                include_once("./Controller/ctuvan.php");
                $p=new controltuvan();
                if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
                    $tieude= $_REQUEST["timkiem"];
                    $tbltuvan = $p->Timkiemtuvan($tieude);
                     }   else {$tbltuvan = $p->gettuvan_bacsi();}
                
    if (isset($tbltuvan)) {
        echo '<table class="card-body table table-bordered table-hover ">';
        echo '<thead >';
        echo '<tr class="table text text-center">';
        echo '<th style="width:5%">STT</th>';
        echo '<th style="width:15%">Bệnh nhân</th>';
        echo '<th style="width:15%">Tiêu đề</th>';
        // echo '<th style="width:15%">Trạng thái</th>';
        echo '<th style="width:15%">Tùy chọn</th>';
        echo '</tr>';
        //$dem1 = 1;
        if (mysqli_num_rows($tbltuvan) > 0) {
            $dem = 1;
            while ($row = mysqli_fetch_assoc($tbltuvan)) {
                if ($dem == 1) {
                    echo "<tr style='text-align: left'>";
                }
                echo "<td>" . $dem . "</td>";
                
                // $benhnhan= $p->getbenhnhan($mabenhnhan);
                // $mabenhnhan=$benhnhan;
                echo "<td>" . $row["tenbenhnhan"] . "</td>";
                echo "<td>" . $row['tieude'] . "</td>";
                // if($row["cautraloi"]==NULL){
                //     echo '<td>Chưa trả lời</td>';
                //   }else {
                //     echo '<td>Đã trả lời</td>';
                //   }                             
                ?>
                <td>
                <center><a href="contact.php?act=yctv&see=<?php echo $row['matuvan']?>" name="see"><i class='far fa-eye' style='font-size:24px;'></i></a></center>
                <!-- <a href="contact.php?act=yctv&del=<?php echo $row['matuvan']?>" name="del"class="btn btn-danger btn-sm"><i class="bi bi-trash-fill" ></i>Xóa</a> -->
           
                
                </td>
                <?php
                $dem++;
                // if ($dem % 1 == 0) {
                //     $dem = 0;
                // }
                echo "</tr>";
            }
            echo '</thead>';
            echo "</table>";
        } else {
            // echo "0 Result $ten";
            echo  "<td colspan='6'><center>Không có câu hỏi yêu cầu <b></b> </center></td>";
            echo "</table>";
        }
    } else {
        echo "Lỗcccc<i";
       
        
    }
        ?>
 
            </form>
            <?php
            include_once ("./Controller/ctuvan.php");
            $p = new controltuvan();
            if(isset($_GET['see'])){
                $tuvan2=$_GET['see'];
                $xemtuvan=$p ->gettuvan2($tuvan2);
                if($xemtuvan){
                    if(mysqli_num_rows($xemtuvan) > 0){
                        while($row = mysqli_fetch_assoc($xemtuvan)){
                            $id = $row["matuvan"];
                            $mabenhnhan = $row["mabenhnhan"];
                            $tenbenhnhan = $row["tenbenhnhan"];
                            $mabacsi = $row["mabacsi"];
                            $tieude = $row["tieude"];
                            $cauhoi = $row["cauhoi"];
                            $cautraloi = $row["cautraloi"];
                        }
                    }
                }                
            }else{
                $id="id";
                $tenbenhnhan = "Chưa có tên bệnh nhân";
                $tieude = "Chưa có tiêu đề";
                $cauhoi = "Chưa có câu hỏi";
                $cautraloi = "Chưa có câu trả lời";

                }
            
            ?>
        </div>
        
    </div>
    
    <div class="col-6">
        <br>
        <div style="width:90%; margin-left:auto; margin-right:auto;">
            <center><h4><b>Thông tin</b></h4></center>
            <br>
            <form action="" method="post">
                <b>Bệnh nhân:</b>
                <input type="text" class="form-control" readonly value="<?php echo $tenbenhnhan ?>">
                <b>Tiêu đề:</b>
                <textarea name="" class="form-control" id="" cols="30" rows="3" readonly><?php echo $tieude?></textarea>
                <b>Câu hỏi:</b>
                <textarea name="" class="form-control" id="" cols="30" rows="3" readonly><?php echo $cauhoi?></textarea>
                <b>Trả lời:</b>
                <textarea name="traloi" class="form-control" id="" cols="30" rows="3" required='required' placeholder="<?php echo $cautraloi?>"></textarea>
                <br> 
                <center>
                    <input type="submit" name="btn_tv" class="btn btn-primary" value="Trả lời">
                </center>
            </form>
            <?php
            if(isset($_REQUEST['btn_tv'])){
                if($tenbenhnhan!="Chưa có tên bệnh nhân"){
                $cautraloi=$_POST['traloi'];
                $matuvan =$_GET['see'];
                // $mabacsi=$_REQUEST["mabacsi"];
                $mataikhoan = $_SESSION["mataikhoan"];
                include_once ("./Controller/ctuvan.php");
                $p = new controltuvan();
                $tblbacsi = $p->selectmabacsibytaikhoan($mataikhoan);
                $mabacsi=mysqli_fetch_assoc($tblbacsi);
               
                $p = new controltuvan();
                    $tbltuvan = $p->updatetuvan_cautraloi($cautraloi,$matuvan, $mabacsi['mabacsi']);
                        if($tbltuvan == 1){
                        echo '<script>alert("Trả lời câu hỏi thành công"); window.location.href="contact.php"</script>';
                        }
                        else {
                        echo '<script>alert("Trả lời câu hỏi thất bại"); window.location.href="contact.php"</script>';
    
                        }

                }else{
                    echo '<script>alert("Chưa chọn tư vấn");window.location.href="contact.php"</script>';
                }
                
            }
            ?>
        </div>
        
    </div>
    <div class="form">   
            <br>
        <center><h4><b>Danh sách yêu cầu tư vấn đã trả lời</b></h4></center>
        <div class="form-group">
            <form action="#" method="post" style="width:150px;margin:5px;float:right;">
                    <input type="text" class="form-control" placeholder="Tìm kiếm tiêu đề..."  
                    name="timkiem1" style="width:200px; float:right;">
            </form>
        </div>
            <form action="" method="POST">
                <?php
                include_once("./Controller/ctuvan.php");
                $p=new controltuvan();
                $mataikhoan = $_SESSION["mataikhoan"];
                $tblbacsi = $p->selectmabacsibytaikhoan($mataikhoan);
                $mabacsi=mysqli_fetch_assoc($tblbacsi);
          
                if(isset($_REQUEST["timkiem1"]) && !empty($_REQUEST["timkiem1"]) ){
                    $tieude= $_REQUEST["timkiem1"];
                    $tbltuvan = $p->Timkiemtuvan1($tieude, $mabacsi['mabacsi']);
                     }   else {$tbltuvan = $p->gettuvan_bacsitraloi($mabacsi['mabacsi']);}
                
                
                
    if (isset($tbltuvan)) {
        echo '<table class="card-body table table-bordered table-hover ">';
        echo '<thead >';
        echo '<tr class="table text text-center">';
        echo '<th style="width:5%">STT</th>';
        echo '<th style="width:15%">Bệnh nhân</th>';
        echo '<th style="width:15%">Tiêu đề</th>';
        // echo '<th style="width:15%">Trạng thái</th>';
        echo '<th style="width:15%">Tùy chọn</th>';
        echo '</tr>';
        //$dem1 = 1;
        if (mysqli_num_rows($tbltuvan) > 0) {
            $dem = 1;
            while ($row = mysqli_fetch_assoc($tbltuvan)) {
                if ($dem == 1) {
                    echo "<tr style='text-align: left'>";
                }
                echo "<td>" . $dem . "</td>";
                
                // $benhnhan= $p->getbenhnhan($mabenhnhan);
                // $mabenhnhan=$benhnhan;
                echo "<td>" . $row["tenbenhnhan"] . "</td>";
                echo "<td>" . $row['tieude'] . "</td>";
                // if($row["cautraloi"]==NULL){
                //     echo '<td>Chưa trả lời</td>';
                //   }else {
                //     echo '<td>Đã trả lời</td>';
                //   }                             
                ?>
                <td>
                <center><a href="contact.php?act=yctv&see=<?php echo $row['matuvan']?>" name="see"><i class='far fa-eye' style='font-size:24px;'></i></a></center>
                <!-- <a href="contact.php?act=yctv&del=<?php echo $row['matuvan']?>" name="del"class="btn btn-danger btn-sm"><i class="bi bi-trash-fill" ></i>Xóa</a> -->
           
                
                </td>
                <?php
                $dem++;
                // if ($dem % 1 == 0) {
                //     $dem = 0;
                // }
                echo "</tr>";
            }
            echo '</thead>';
            echo "</table>";
        } else {
            // echo "0 Result $ten";
            echo  "<td colspan='6'><center>Không có câu hỏi yêu cầu <b></b> </center></td>";
            echo "</table>";
        }
    } else {
        echo "Lỗcccc<i";
       
        
    }
        ?>
 
            </form>
            <?php
            include_once ("./Controller/ctuvan.php");
            $p = new controltuvan();
            if(isset($_GET['see'])){
                $tuvan2=$_GET['see'];
                $xemtuvan=$p ->gettuvan2($tuvan2);
                if($xemtuvan){
                    if(mysqli_num_rows($xemtuvan) > 0){
                        while($row = mysqli_fetch_assoc($xemtuvan)){
                            $id = $row["matuvan"];
                            $mabenhnhan = $row["mabenhnhan"];
                            $tenbenhnhan = $row["tenbenhnhan"];
                            $mabacsi = $row["mabacsi"];
                            $tieude = $row["tieude"];
                            $cauhoi = $row["cauhoi"];
                            $cautraloi = $row["cautraloi"];
                        }
                    }
                }                
            }else{
                $id="id";
                $tenbenhnhan = "Chưa có tên bệnh nhân";
                $tieude = "Chưa có tiêu đề";
                $cauhoi = "Chưa có câu hỏi";
                $cautraloi = "Chưa có câu trả lời";

                }
            
            ?>
        
        <br>
    </form>
</div>
</div>

<br>
<?php
 }else{

?>
<div class="form">
    <br>
    <center><h4><b>Câu hỏi</b></h4></center>
    <form action="" method="post">
        <div class="form">
            <b>Tiêu đề:</b>
            <input type="text" class="form-control" name="tieude" required placeholder="Nhập tiêu đề">
            <b>Câu hỏi:</b>
            <textarea name="cauhoi" cols="1" rows="3" class="form-control" required placeholder="Nhập câu hỏi"></textarea>
        </div>
        <br>
        <div class="btn">
            <input type="submit" name="submit_tv" style="margin-left: 340px;" value="Gửi" class="btn btn-info">
        </div>
        <br>
    </form>
</div>
      <?php
      
      include_once("./Controller/ctuvan.php");
      $p=new controltuvan();
     
      if(isset($_REQUEST["submit_tv"])){
      $tieude = $_REQUEST["tieude"];
      $cauhoi = $_REQUEST["cauhoi"];
      $mataikhoan = $_SESSION["mataikhoan"];
      $tblbenhnhan = $p->selectmabenhnhanbytaikhoan($mataikhoan);
      $mabenhnhan=mysqli_fetch_assoc($tblbenhnhan);
      $p=new controltuvan();
      $kq = $p->Inserttuvan($mabenhnhan['mabenhnhan'], $tieude,$cauhoi);
      
      if($kq == 1){
        echo '<script>alert("Gửi câu hỏi thành công");window.location.href="contact.php";</script>';                             
      }
      else if($kq == 0){
        echo '<script>alert("Gửi câu hỏi thất bại");window.location.href="contact.php";</script>';
      }
      }
      ?>
<hr>
<div class="row">
    <div class="col-6" style="border-right: 1px solid #dddddd;">
    <br>
        <center><h4><b>Danh sách câu hỏi</b></h4></center>
        <form action="" method="post">
            <?php
                include_once("./Controller/ctuvan.php");
                $p=new controltuvan();       
            $mataikhoan=$_SESSION['mataikhoan'];
            $tblbenhnhan = $p->selectmabenhnhanbytaikhoan($mataikhoan);
            $mabenhnhan=mysqli_fetch_assoc($tblbenhnhan);
            $p=new controltuvan();
    $tbltuvan = $p->gettuvan($mabenhnhan['mabenhnhan']);
    if (isset($tbltuvan)) {
        echo '<table class="card-body table table-bordered table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="width:5%">STT</th>';
        echo '<th style="width:15%">Tiêu đề</th>';
        echo '<th style="width:15%">Câu hỏi</th>';
        echo '<th style="width:15%">Trạng thái</th>';
        echo '<th style="width:15%">Tùy chọn</th>';
        echo '</tr>';
        //$dem1 = 1;
        if (mysqli_num_rows($tbltuvan) > 0) {
            $dem = 1;
            while ($row = mysqli_fetch_assoc($tbltuvan)) {
                if ($dem == 1) {
                    echo "<tr style='text-align: left'>";
                }
                echo "<td>" . $dem . "</td>";
                echo "<td>" . $row['tieude'] . "</td>";
                echo "<td>" . $row['cauhoi'] . "</td>";
                if($row["cautraloi"]==NULL){
                    echo '<td>Chưa trả lời</td>';
                  }else {
                    echo '<td>Đã trả lời</td>';
                  }                             
                ?>
                <td>
                <a href="contact.php?act=yctv&see=<?php echo $row['matuvan']?>" name="see"class="btn btn-info btn-sm"><i class="bi bi-eye-fill" ></i>Xem</a>
                <a href="contact.php?act=yctv&del=<?php echo $row['matuvan']?>" name="del"class="btn btn-danger btn-sm"><i class="bi bi-trash-fill" ></i>Xóa</a>
                <!-- <button  name="xemtuvan"<?php // $row['matuvan']?> >Xem</button>
                <button  name="deletetuvan"<?php //$row['matuvan']?> >Xóa</button> -->
                
                </td>
                <?php
                $dem++;
                // if ($dem % 1 == 0) {
                //     $dem = 0;
                // }
                echo "</tr>";
            }
            echo '</thead>';
            echo "</table>";
        } else {
            // echo "0 Result $ten";
            echo  "<td colspan='6'><center>Không có câu hỏi <b></b> </center></td>";
            echo "</table>";
        }
    } else {
        echo "Lỗcccc<i";
       
    }
    ?>
        </form>  
        <hr>
        <?php
            include_once ("./Controller/ctuvan.php");
            if(isset($_GET["del"])){
            $tuvan = $_GET["del"];
            $p = new controltuvan();
            $del = $p->deletetuvan($tuvan);
            if($del == 1){
                echo '<script>alert("Xóa câu hỏi tư vấn thành công");window.location.href="contact.php";</script>';
                // echo header("refresh:0; url='contact.php'");
            }else{
                echo '<script>alert("Xóa câu hỏi tư vấn thất bại");window.location.href="contact.php";</script>';
                // echo header("refresh:0; url='contact.php'");
            }
            }
            if(isset($_GET['see'])){
                $tuvan1=$_GET['see'];
                $xemtuvan=$p ->gettuvan1($tuvan1);
                if($xemtuvan){
                    if(mysqli_num_rows($xemtuvan) > 0){
                        while($row = mysqli_fetch_assoc($xemtuvan)){
                            $id = $row["matuvan"];
                            $mabenhnhan = $row["mabenhnhan"];
                            $mabacsi = $row["mabacsi"];
                            $tieude = $row["tieude"];
                            $cauhoi = $row["cauhoi"];
                            $cautraloi = $row["cautraloi"];
                            $tenbacsi = $row["tenbacsi"];
                        }
                    }
                }
                
            }else{
                $id="id";
                $tieude = "Chưa có tiêu đề";
                $cauhoi = "Chưa có câu hỏi";
                $cautraloi = "Chưa có câu trả lời";

                }
            // if(isset($_GET['see'])){
            //     $mtv=$_GET['see'];
                //$tt=get_tttv_mtv($mtv);
                 
            // }else{
            //     $tt['TieuDe']='Tiêu đề';
            //     $tt['CauHoi']='Câu hỏi';
            //     $tt['TraLoi']='Câu trả lời';
            //     $tt['ThoiGian']=Null;
            //     $tt['BacSi']='Bác sĩ';
            // }
            // if(isset($_GET['del'])){
            //     $mtv=$_GET['del'];
            //     //del_tttv_mtv($mtv);
            //     echo "<script>alert('Đã xoá câu hỏi cần tư vấn'); window.location='../BenhNhan/index.php?act=yctv'</script>";
            //     // header('location: ../BenhNhan/index.php?act=yctv');
            // }
        ?>
    </div>
    <div class="col-6" style="border-left: 1px solid #dddddd;">
    <br>
    <center><h4><b>Thông tin tư vấn</b></h4></center>
        <div style="width:80%; margin-left:auto; margin-right:auto;">
            <b>Tiêu đề:</b>
            <input type="text" class="form-control" value="<?php echo $tieude ?>" readonly>
            <b>Nội dung câu hỏi:</b>
            <textarea name="" id="" cols="30" rows="5" class="form-control" readonly><?php echo $cauhoi?></textarea>
            <b>
            <b>Tên bác sĩ trả lời:</b>
            <input type="text" class="form-control" value="<?php 
            if(isset($tenbacsi)){
            echo $tenbacsi;}
            else {
                echo "Không có bác sĩ";
            }
             ?>" readonly>
                <?php
                    // if($tt['ThoiGian']==Null){
                    //     echo "Chưa trả lời:";
                    // }else{
                    //     $bs=$tt['BacSi'];
                    //     $time=$tt['ThoiGian'];
                    //     $crate_tg=date_create($time);
                    //     $tg= date_format($crate_tg,'d/m/Y');
                    //     echo "Bác sĩ: $bs<br>";
                    //     echo "Trả lời ngày: $tg";
                    // }
                ?>
                Câu trả lời:
            </b>
            <textarea name="" id="" cols="30" rows="5" class="form-control" readonly><?php echo $cautraloi ?></textarea>
            <br>
        </div>
        <hr>
    </div>
</div>


<?php  
}}include 'pages/footer.php'; ?>



    