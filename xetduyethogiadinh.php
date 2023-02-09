<?php
	include ('./pages/header.php');
    // include ('./pages/header.php');
    ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<div class="row">
    <div class="col-2" style="border-right:1px solid #dddddd">
        <br>
        <div style="width:95%; margin-left:auto;margin-right:auto;">
            <center><h4><b>Tạo hộ gia đình</b></h4></center>
            <form action="" method="post">
                <b>Mã chủ hộ gia đình:</b>
                <input type="text" name="ten" class="form-control" required placeholder="Nhập mã chủ hộ gia đình">
                <b>Tên hộ gia đình:</b>
                <input type="text" name="ten" class="form-control" required placeholder="Nhập tên hộ gia đình">
                <b>Địa chỉ:</b>
                <input type="text" name="diachi" class="form-control" required placeholder="Nhập địa chỉ">
                <br>
                <center><input type="submit" name="btn_hgd" value="Tạo" class="btn btn-primary"></center>
            </form>
            <br>
        </div>
        
    </div>
    <div class="col-5" style="border-right:1px solid #dddddd">
        <br>
        <div style="width:95%; margin-left:auto;margin-right:auto;">
        
            <center><h4><b>Danh sách hộ gia đình</b></h4></center>
            <form id="txtHint" method="POST" enctype="multipart/form-data" action="">
                <select name="users"  onchange="showUser(this.value)">
                <option value="0" >Chưa xét duyệt</option>
                <option value="1"  >Đã xét duyệt</option>
                <option value="3"  >Tất cả</option>

                </select>
                    <br>
                    <br>
                </form>
                <div  style="height:300px; overflow-x:scroll;">
                    <table class="table table-hover">
                        <thead class="table table-dark text text-center">
                            <tr>
                                <th>Mã hộ gia đình</th>
                                <th>Tên hộ gia đình</th>
                                <!-- <th>Địa chỉ</th> -->
                                <!-- <th>Trạng thái</th> -->
                                <th>Tuỳ chọn</th>
                            </tr>
                        </thead >
                        <?php
                         include_once("./Controller/cHogiadinh.php");
                         $p = new controlhogiadinh();
                         $mataikhoan = $_SESSION["mataikhoan"];
                         $tblbacsi = $p->getmabacsibytaikhoan($mataikhoan);
                         $mabacsi = mysqli_fetch_assoc($tblbacsi);
                         $kq= $p->gethogiadinhbymabacsi($mabacsi['mabacsi'],0);
                        
                         if(isset($kq)){
                             if(mysqli_num_rows($kq) > 0){
                                 $dem = 0;
                                 while($row = mysqli_fetch_assoc($kq)){
                                     // $id = $row["matuvan"];
                                     $mahogiadinh = $row["mahogiadinh"];
                                     $tenhogiadinh = $row["tenhogiadinh"];
                                     $diachi = $row["diachi"];
                                    //  $sodienthoai = $row["sodienthoai"];
                                     $mahogiadinh = $row["mahogiadinh"];
                                    //  $mataikhoan = $row["mataikhoan"];
                                     $dem++;
                                 
                           
         
                                // $id= $_SESSION['id'];
                                // $dshgd=get_hgd_mbs($id);
                                // $i=0;
                                // foreach($dshgd as $row){
                                //     $i++;
                
                        ?>
                        <tbody class="table table-light text text-center">
                            <tr>
                                <th><?php  echo $mahogiadinh ?></th>
                                <th><?php  echo $tenhogiadinh ?></th>
                                <!-- <th><?php // echo $diachi ?></th> -->
                                
                                <?php 
                                echo"<th> <button class='btn btn-sm btn-danger xemgiadinh' data-id_xemgiadinh=" . $row["mahogiadinh"] . "  name='xemgiadinh'>Xóa</button>  </th>";
                                ?>
                                    

                            
                            </tr>
                        </tbody>
                        <?php
                            }
                        }
                    }
                        ?>
                       
                    </table>
                </div>
                
        </div>
    </div>
    <div  id="txtHint" class="col-5">
       
    <br>
        <div style="width:95%; margin-left:auto;margin-right:auto;">
            <center><h4><b>Danh sách thành viên</b></h4></center>
            <br>
            <b>Hộ gia đình:
            <?php 
            include_once("./Controller/cHogiadinh.php");
            $p = new controlhogiadinh();
                if(isset($_GET['see'])){
                    $mahogiadinh=$_GET['see'];
                    $tblhogiadinh=$p->gethogiadinhbymahogiadinh($mahogiadinh);
                    $hgd = mysqli_fetch_assoc($tblhogiadinh);
                    echo $hgd['tenhogiadinh'];
                }else echo '';
               

            ?>
            </b>
            <br>
            <b>Địa chỉ:
            <?php
                include_once("./Controller/cHogiadinh.php");
                $p = new controlhogiadinh();
                    if(isset($_GET['see'])){
                        $mahogiadinh=$_GET['see'];
                        $tblhogiadinh=$p->gethogiadinhbymahogiadinh($mahogiadinh);
                        $hgd = mysqli_fetch_assoc($tblhogiadinh);
                        echo $hgd['diachi'];
                    }else echo '';
            ?>
            </b>
            <br>
            <b>Tên chủ hộ:
            <?php
                include_once("./Controller/cHogiadinh.php");
                $p = new controlhogiadinh();
                    if(isset($_GET['see'])){
                        
                        $mahogiadinh=$_GET['see'];
                        $tblhogiadinh=$p->gethogiadinhbymahogiadinh($mahogiadinh);
                        $hgd1 = mysqli_fetch_assoc($tblhogiadinh);
                        $tblchuho = $p->getbenhnhan($hgd1['quyenchuho']);
                        if(mysqli_num_rows($tblchuho) > 0){
                        $hgd = mysqli_fetch_assoc($tblchuho);
                        echo $hgd['tenbenhnhan'];
                        }
                        else {
                            echo "Chưa có chủ hộ";
                        }
                    }else echo '';
            ?>
            </b>
            <form action="">
                <div style="height:300px; overflow-x:scroll;">
                    <table class="table table-hover">
                        <thead class="table table-dark text text-center">
                            <tr>
                                <th>STT</th>
                                <th>Tên thành viên</th>
                                <th>Số điện thoại</th>
                                <th>Tuỳ chọn</th>
                            </tr>
                        </thead >
                        <?php
                         
                         include_once("./Controller/cHogiadinh.php");
                         $p = new controlhogiadinh();
                         $mataikhoan = $_SESSION["mataikhoan"];
                         $tblbacsi = $p->getmabacsibytaikhoan($mataikhoan);
                         $mabacsi = mysqli_fetch_assoc($tblbacsi);
                         // $kq= $p->getbenhnhanbymahogiadinh($mabenhnhan['mahogiadinh']);   
                                    
                           
                         if(isset($_GET['see'])){
                             $hogd=$_GET['see'];
                             $xemhogd=$p->getbenhnhanbymahogiadinh($hogd);
                             if($xemhogd){
                                 if(mysqli_num_rows($xemhogd) > 0){
                                     $dem = 0;
                                     while($row = mysqli_fetch_assoc($xemhogd)){
                                         $id = $row["mabenhnhan"];
                                         $tenbenhnhan = $row["tenbenhnhan"];
                                         $diachi = $row["diachi"];
                                         $sodienthoai = $row["sodienthoai"];
                                         // $mahogiadinh = $row["mahogiadinh"];
                                         $dem++;
                
                         
                            // if(isset($_GET['see'])){
                            //     $mgd=$_GET['see'];
                            //     $tv=see_tv_hgd_mgd($mgd);
                            //     $i=0;
                            //     foreach($tv as $row){
                            //         $i++;
            
                        ?>
                        <tbody class="table table-light text text-center">
                            <tr>
                                <th><?php echo $dem?></th>
                                <th><?php echo $tenbenhnhan?></th>
                                <th><?php echo $sodienthoai?></th>
                                <!-- <th>
                                    <a href="index.php?act=hogd&see=<?php //echo $mgd?>&hs=<?php echo $row['mahogiadinh']?>" name="see"class="btn btn-info btn-sm">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="index.php?act=hogd&see=<?php echo $mgd?>&deltv=<?php echo $row['MaTK']?>" name="see"class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </th> -->
                            </tr>
                        </tbody>
                        <?php
                                    }
                                }
                                else{
                                    
                                }
                            }
                            else{
                                
                            }
                            
                        }else{
                            $id="1";
                            $tenbenhnhan = "Chưa có tên bệnh nhân";
                            $diachi = "Chưa có địa chỉ";
                            $sodienthoai = "Chưa có số điện thoại";
                
                            }
                            
                        ?>
                    </table>
                </div>
                <hr>
            </form>
                <br>
        </div>
    </div>
</div>
<hr>

<?php
	// include ('./pages/header.php');
    include ('./pages/footer.php');
    ?>

