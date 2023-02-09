<head>
  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
</head>
<body>  
  <div class="hero_area">
    <!-- header section strats -->
    <?php
	include_once './pages/header.php';
?>
    <!-- end header section -->
    <!-- slider section -->
     <!-- Messenger Plugin chat Code -->
     <div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "106626105575260");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v15.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 pb-5">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="images/bia1.png" alt="Image">
                     <!-- <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Phòng khám gia đình</h4>
                            <h1 class="display-3 text-white mb-md-4">Đội ngũ bác sĩ uy tín</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Learn More</a>
                        </div>
                    </div>-->
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="images/bia1.png" alt="Image">
                     <!-- <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Phòng khám gia đình</h4>
                            <h1 class="display-3 text-white mb-md-4">Đội ngũ bác sĩ uy tín</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Learn More</a>
                        </div>
                    </div>-->
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-secondary px-0" style="width: 45px; height: 35px;">
                    <span class="carousel-control-prev-icon mb-n1"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-secondary px-0" style="width: 45px; height: 35px;">
                    <span class="carousel-control-next-icon mb-n1"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
                  <div class="slider_img-box">
                    <img src="images/bia1.png" alt="">
                  </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="slider_detail-box">
                    <h1>
                      Professional
                      <span>
                        Care Your Pet
                      </span>
                    </h1>
                    <p>
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry.
                      Lorem Ipsum has been the industry's standard dummy text ever
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Buy now
                      </a>
                      <a href="" class="btn-2">
                        Contact
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="slider_detail-box">
                    <h1>
                      Professional
                      <span>
                        Care Your Pet
                      </span>
                    </h1>
                    <p>
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry.
                      Lorem Ipsum has been the industry's standard dummy text ever
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Buy now
                      </a>
                      <a href="" class="btn-2">
                        Contact
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="slider_detail-box">
                    <h1>
                      Professional
                      <span>
                        Care Your Pet
                      </span>
                    </h1>
                    <p>
                      Lorem Ipsum is simply dummy text of the printing and
                      typesetting industry.
                      Lorem Ipsum has been the industry's standard dummy text ever
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn-1">
                        Buy now
                      </a>
                      <a href="" class="btn-2">
                        Contact
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="slider_img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section> -->
    <!-- end slider section -->
  </div>
  <section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>Dịch vụ 24/24</span>
						<h4 class="mb-3">Đặt lịch</h4>
						<p class="mb-4">Vì sức khỏe bệnh nhân, chúng tôi luôn sẵn sàng.</p>
						<?php 
						if(isset($_SESSION['tendangnhap'])){
							if($_SESSION['quyen']==0){
								echo '<a href="doingubacsi.php" class="btn btn-primary btn btn-sm">Đặt Lịch</a>';
							}
						}else{
							echo '<a href="doingubacsi.php" class="btn btn-primary btn btn-sm">Đặt Lịch</a>';
						}

						
						?>
						
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
						<span>Thời gian biểu</span>
						<h4 class="mb-3">Giờ làm việc</h4>
						<ul class="w-hours list-unstyled">
              <li class="d-flex justify-content-between">Phục vụ khẩn cấp: <span>24/7</span></li>
              <li class="d-flex justify-content-between">Ngày làm việc: <span>Thứ 2 - Chủ nhật</span></li>
              <li class="d-flex justify-content-between">Thời gian hoạt động: <span>7:00 - 17:00</span></li>
          </ul>
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>Trường hợp cấp cứu</span>
						<a href="tel:0933263227"><h4 class="mb-3">0933263227</h4></a>
						<p>Nhận hỗ trợ các trường hợp khẩn cấp. Cấp cứu thật nhanh để giành sự sống</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h2 class="custom_heading">
              Giới thiệu về
              <span>
                PHÒNG KHÁM GIA ĐÌNH
              </span>
              
            </h2>
            <p>
            Sứ mệnh của Phòng Khám Gia Đình:</br>
            Khám và điều trị cho tất cả người bệnh trong và ngoài nước; lấy người bệnh làm trung tâm, 
            mang đến giải pháp chăm sóc sức khỏe tối ưu từ sự tích hợp giữa 
            KHÁM CHỮA BỆNH - NGHIÊN CỨU KHOA HỌC, ĐÀO TẠO – HỢP TÁC QUỐC TẾ
            </p>
            <div>
              <a href="about.php">
                Chi tiết
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- service section -->
  <section class="service_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 offset-md-2">
          <h2 class="custom_heading">
            Về <span>Dịch vụ</span>
          </h2>
          <div class="container layout_padding2">
            <div class="row">
              <div class="col-md-4">
                <div class="img_box">
                  <img src="images/s-1.png" alt="">
                </div>
                <div class="detail_box">
                  <h6>
                    Chăm sóc sức khỏe
                  </h6>
                  <p>
                  Chúng tôi cung cấp dịch vụ bác sĩ hàng đầu, tạo sự hài lòng tốt nhất đến bệnh nhân. Ngoài ra còn các loại thuốc chất lượng.
                  </p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="img_box">
                  <img src="images/telephone-white.png" alt="">
                </div>
                <div class="detail_box">
                  <h6>
                    Tư vấn
                  </h6>
                  <p>
                    Chúng tôi sẽ trả lời câu hỏi một cách sớm nhất
                  </p>
                </div>
              </div>
              <!-- <div class="col-md-4">
                <div class="img_box">
                  <img src="images/s-3.png" alt="">
                </div>
                <div class="detail_box">
                  <h6>
                    Emergency
                  </h6>
                  <p>
                    onsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exe
                  </p>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <img src="images/tool.png" alt="" class="w-100">
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->




  <!-- end gallery section -->

  <!-- client section -->
  <section class="client_section layout_padding-bottom">
    <div class="container">
      <h2 class="custom_heading text-center">
        Nhận xét từ
        <span>
          Khách hàng
        </span>
      </h2>
      <p class="text-center">
      Bản thân nỗi đau là rất quan trọng, sẽ theo sau vết thương lòng, nhưng điều tương tự đã xảy ra cùng lúc với đau
      </p>
      <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="layout_padding2 pl-100">
              <div class="client_container ">
                <div class="img_box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail_box">
                  <h5>
                    Sandy Mark
                  </h5>
                  <p>
                  Điều quan trọng là phải chăm sóc bệnh nhân, được bác sĩ theo dõi, nhưng đó là khoảng thời gian rất đau đớn và khổ sở. 
                  Vì đến từng chi tiết nhỏ nhất, không ai nên thực hành bất kỳ loại công việc nào trừ khi anh ta thu được một số lợi ích từ nó. 
                  Sự nghi ngờ hoặc đau đớn khó chịu trong sự khiển trách trong niềm vui sướng muốn trở thành sợi tóc của nỗi đau
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="layout_padding2 pl-100">
              <div class="client_container ">
                <div class="img_box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail_box">
                  <h5>
                    Sandy Mark
                  </h5>
                  <p>
                  Điều quan trọng là phải chăm sóc bệnh nhân, được bác sĩ theo dõi, nhưng đó là khoảng thời gian rất đau đớn và khổ sở. 
                  Vì đến từng chi tiết nhỏ nhất, không ai nên thực hành bất kỳ loại công việc nào trừ khi anh ta thu được một số lợi ích từ nó. 
                  Sự nghi ngờ hoặc đau đớn khó chịu trong sự khiển trách trong niềm vui sướng muốn trở thành sợi tóc của nỗi đau
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="layout_padding2 pl-100">
              <div class="client_container ">
                <div class="img_box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail_box">
                  <h5>
                    Sandy Mark
                  </h5>
                  <p>
                  Điều quan trọng là phải chăm sóc bệnh nhân, được bác sĩ theo dõi, nhưng đó là khoảng thời gian rất đau đớn và khổ sở. 
                  Vì đến từng chi tiết nhỏ nhất, không ai nên thực hành bất kỳ loại công việc nào trừ khi anh ta thu được một số lợi ích từ nó. 
                  Sự nghi ngờ hoặc đau đớn khó chịu trong sự khiển trách trong niềm vui sướng muốn trở thành sợi tóc của nỗi đau
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>

  </section>
  <!-- end client section -->

  <!-- gallery section -->
	
  <!-- map section -->
  
  <!-- <section class="map_section">
    <div id="map" class="h-100 w-100 ">
    </div>

    <div class="form_container ">
      <div class="row">
        <div class="col-md-8 col-sm-10 offset-md-4">
          <form action="">
            <div class="text-center">
              <h3>
                Contact Us
              </h3>
            </div>
            <div>
              <input type="text" placeholder="Name" class="pt-3">
            </div>
            <div>
              <input type=" text" placeholder="Pone Number">
            </div>
            <div>
              <input type="email" placeholder="Email">
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message">
            </div>
            <div class="d-flex justify-content-center">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </section> -->
  <!-- <section class="service_section layout_padding map_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 offset-md-2">
        <div id="map" class="h-100 w-100 ">
    </div>
            
          </div>
        </div>
        <div class="col-md-4">
          <img src="images/tool.png" alt="" class="w-100">
        </div>
      </div>
    </div>
  </section> -->

  <!-- end map section -->

  <!-- info section -->
  
  <!-- footer section -->
  <style>
/* body {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 20px;
} */

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  /* background-color: black; */
  color: white;
  cursor: pointer;
  /* padding: 5px; */
  border-radius: 1px;
}

#myBtn:hover {
  background-color: #74787ccf;
}
</style>
  <!-- <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button> -->
<img src="./images/back-to-top.png" alt="" onclick="topFunction()" style="clip-path: circle(50%);" width="60px" height="60px" id="myBtn" title="Go to top">

<!-- <button onclick="topFunction()" style="clip-path: circle(50%);" width="60px" height="60px" id="myBtn" title="Go to top"><i class="fa fa-plus"></i></button> -->
<script>
// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
  <?php include 'pages/footer.php'; ?>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 10.822151647376558,
          lng: 106.68684204356562
          
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 10.822151647376558,
          lng: 106.68684204356562
        },
        map: map,
        icon: image
      });
    }
  </script>
  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <!-- end google map js -->

</body>

</html>