<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
</head>

<body>
  <?php //include('pages/header.php'); 
  ?>

  <div class="hero_area">
    <!-- header section strats -->
    <?php
    include './pages/header.php';
    ?>
    <!--Header-->


    <section class="page-title bg-1">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="block text-center">
              <!-- <span class="text-white">Our blog</span> -->
              <h1 class="text-capitalize m-5 text-lg">ĐỘI NGŨ Y BÁC SĨ</h1>

              <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
          </ul> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section blog-wrap">
      <div class="container">
        <?php

        if (!isset($_GET['id'])) {
          echo '
  	  <div class="row justify-content-center">
             <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Bác sĩ</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Chúng tôi hân hạnh phục vụ, mang đến dịch vụ và trải nghiệm tốt nhất đến bạn</p>
                </div>
            </div>
        </div>

			<div class="col-12 text-center  mb-5"  id="all">
	        <div class="btn-group btn-group-toggle " data-toggle="buttons">
	          <label class="btn active ">
	            <input  type="radio" name="shuffle-filter" value="all" checked="checked" />Tất cả
              </label>
              </div>
              <div class="form-group col-12 text-center  mb-5" style="float:right;">
              <form action="#all" method="post" style="width:150px;margin:5px;float:right;">
                  
                <input type="text" class="form-control" placeholder="Tìm kiếm..."  
                name="timkiem" style="width:200px; float:right;">
                <!-- <input type="submit" name="submit" value="Tìm Kiếm" id="">  -->
                  
              </form></div>
              </div>
              ';
        } else {
          echo '
  	  		<div class="row justify-content-center">
             <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Đặt lịch bác sĩ</h2>
                    <div class="divider mx-auto my-4"></div>
                   
                </div>
            </div>
        	</div>';
        }
        ?>
        <?php
        // include_once("./Controller/cBacSi.php");


        // $p = new controlBacSi();
        // if(isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"]) ){
        // $ten= $_REQUEST["timkiem"];
        // $tblbacsi = $p->TimkiemBacSi($ten);
        //  }   else {$tblbacsi = $p-> getAllBacSi();}
        ?>

        <div class="col-lg-12 col-md-12 mb-5">
          <div class="blog-item">
            <div class="blog-item">
              <div class="blog-item-content">



                <?php
                include_once("Controller/cBacSi.php");
                $p = new controlBacSi();
                if (isset($_GET['id'])) {
                  if (!isset($_SESSION['tendangnhap'])) {
                    echo '<script>
                    alert("Bạn phải đăng nhập");
                    window.location.href="login.php";
                    </script>';
                  }
                  $comp = $_GET['id'];
                  $tblBacsi = $p->getBacSi($comp);
                  include_once("./Controller/clichkham.php");
                  $p = new controllichkham();
                  //$kq=$p->getmaTaikhoan($_SESSION['tendangnhap']);
                  $tblbacsi = $p->getlichkham($comp);
                } else {
                  include_once("./Controller/cBacSi.php");
                  $p = new controlBacSi();
                  if (isset($_REQUEST["timkiem"]) && !empty($_REQUEST["timkiem"])) {
                    $ten = $_REQUEST["timkiem"];
                    $tblBacsi = $p->TimkiemBacSi($ten);
                  } else {
                    $tblBacsi = $p->getAllBacSi();
                  }
                  // $tblBacsi = $p->getAllBacSi();
                }

                if ($tblBacsi) {
                  if (mysqli_num_rows($tblBacsi) > 0) {
                    $dem = 0;
                    echo "<table style='text-align:center;'>";
                    while ($row = mysqli_fetch_assoc($tblBacsi)) {
                      if ($dem == 0) {
                        echo "<tr>";
                      }
                      echo '<td style="width: 1200px">';
                      if (substr($row["hinhanh"], 0, 5) == NULL) {
                        echo '<img src="./images/anh1.jpg" style="clip-path: circle(50%);" width="150px" height="150px">';
                      } else {
                        echo '<img src="./images/bacsi/' . $row["hinhanh"] . '" style="clip-path: circle(50%);" width="150px" height="150px">';
                      }
                      // echo '<img width=230px height=230px src="./images/bacsi/'.$row["hinhanh"].'">';
                  ?>


                      <h3><a href=""><?php echo '</br>' . $row["tenbacsi"]; ?></a></h3>
                      <p><?php echo 'Chuyên môn: ' . $row["chuyenmon"]; ?></a></p>
                      <?php
                      if (isset($_SESSION['tendangnhap'])) {
                        if ($_SESSION['quyen'] == 0 && !isset($comp)) {
                          echo '<p><a href="doingubacsi.php?id=' . $row['mabacsi'] . '" class="btn btn-primary ">Đặt lịch</a></p>';
                        }
                      } else {
                        echo '<p><a href="doingubacsi.php?id=' . $row['mabacsi'] . '" class="btn btn-primary ">Đặt lịch</a></p>';
                        $rowbs = $row['mabacsi'];
                      }
                      ?>
                      <!-- <p><a href="doingubacsi.php?id=<?php //echo $row['mabacsi'] 
                                                          ?>" class="btn btn-danger" >Đặt lịch</a></p> -->


                      <!-- //echo '</br>'.$row["tenbacsi"].'</br>'.$row["chuyenmon"]; -->
                <?php
                      echo '</td>';
                      $dem++;
                      if ($dem % 4 == 0) {
                        echo "</tr>";
                        $dem = 0;
                      }
                    }
                    echo "</table>";
                  } else {
                    echo "<p style='text-align:center;'>Không tìm thấy</p>";
                  }
                } else {
                  echo "Lỗi";
                }
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
                  echo '<th style="width:15%">Chuyên khoa</th>';

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
                      echo "<td>" . $row['chuyenmon'] . "</td>";


                      // echo "<td></td>";
                      // echo "<td></td>";
                      echo "<td><a class='btn btn-primary btn btn-sm' href='doingubacsi.php?idlichkham=" . $row["malichkham"] . "'>Thêm</td>";
                      // echo "<td></td>";
                      $dem++;

                      echo "</tr>";
                    }
                    echo '</tbody>';
                    echo "</table>";
                    echo '<center><h3><u><a class="btn btn-primary" href="thongtinbenhnhan.php?pagetrang=xemlich">Xem lịch khám đã đặt</a></u></h3></center>';
                  } else {
                    echo  "<td colspan='6'><center>Chưa có lịch khám </center></td>";
                    echo "</table>";
                    echo '<center><h3><u><a class="btn btn-primary" href="thongtinbenhnhan.php?pagetrang=xemlich">Xem lịch khám đã đặt</a></u></h3></center>';
                  }
                } else {
                  // echo"$mabacsi";

                }
                ?>
                <!-- <center><h3><u><a class="btn btn-primary" href="thongtinbenhnhan.php?pagetrang=xemlich">Xem lịch khám đã đặt</a></u></h3></center> -->
                <!-- </table> -->
              </div>
            </div>

          </div>

        </div>
      </div>

    </section>

    <!-- footer Start -->
    <?php
    include_once("Controller/clichkham.php");
    $p = new controllichkham();
    if (isset($_GET['idlichkham'])) {
      $mataikhoan = $_SESSION['mataikhoan'];
      $tblmabenhnhan =  $p->getbenhnhanmtk($mataikhoan);
      $mabenhnhan = mysqli_fetch_assoc($tblmabenhnhan);
      //$mabacsi = $row['mabacsi'];
      $comp = $_GET['idlichkham'];
      $p = new controllichkham();
      $tblmalichkham = $p->getmalichkham($_GET['idlichkham']);
      $malichkham = mysqli_fetch_assoc($tblmalichkham);
      $kiemtradatlich = $p->kiemtradatlich($mabenhnhan['mabenhnhan'], $malichkham['ngaykham'], $malichkham['macakham']);
      include_once('Controller/cTaikhoan.php');
      $tk = new controlTaikhoan();
      $tblkiemtrathongtin = $tk->ThongTinBenhnhan($_SESSION['tendangnhap']);
      $kiemtrathongtin = mysqli_fetch_assoc($tblkiemtrathongtin);
      if (!isset($kiemtrathongtin['diachi']) && !isset($kiemtrathongtin['sodienthoai'])) {
        echo '<script>alert("Vui lòng cập nhật đầy đủ thông tin");window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";</script>';
      } elseif (mysqli_num_rows($kiemtradatlich) > 0) {
        echo '<script>alert("Lịch khám đã tồn tại");window.history.back();</script>';
      } else {
        $kq = $p->updatelichkham($comp, $mabenhnhan['mabenhnhan']);
        if ($kq = 1) {
          echo '<script>alert("Đăng ký thành công");
                                window.history.back()
                                
                                </script>';
        } else {
          echo '<script>alert("Đăng ký không thành công")</script>';
        }
      }
    }
    ?>

</body>

<?php include('pages/footer.php'); ?></div>