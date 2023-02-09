<?php
    require('./Google/vendor/autoload.php');
    include_once('Controller/cTaikhoan.php');
    $p=new controlTaikhoan();
    $clientID='698445416324-tjnet5lm8egsu1n6caoboj5nfhi95trj.apps.googleusercontent.com';
    $ClientSecret='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';
    $redirectUrl= 'https://huyhoang.org/login.php';


    //Thông tin kết nói database
    // $db_username = "root"; //Database Username
    // $db_password = ""; //Database Password
    // $host_name = "localhost"; //Mysql Hostname
    // $db_name = 'pkgd'; //Database Name

    $client = new Google_Client();
    $client->setClientID($clientID);
    $client->setClientSecret($ClientSecret);
    $client->setRedirectUri($redirectUrl);

    $client->addScope('email');
    $client->addScope('profile');
    
    

    
    if (isset($_GET['code'])) {
        $service = new Google_Service_Oauth2($client);
        $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken($client);
        // $googleUser = $service->userinfo->get(); 
        // $email=$googleUser->email;
        // $name=$googleUser->name;
        // echo "welcom"
        // header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
        // exit;
    }
    
    

    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        $client->setAccessToken($_SESSION['access_token']);
    } else {
        $authUrl = $client->createAuthUrl();
    }
    if ($client->isAccessTokenExpired()) {
        $authUrl = $client->createAuthUrl();
    //            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    }
   
    
   
    if (!isset($authUrl)) {
        // echo "welcom";
        $googleUser = $service->userinfo->get(); //get user info 
        if(!empty($googleUser)){
            //var_dump($googleUser);
            $name = $googleUser['name'];
            $email = $googleUser['email'];
            $gender = $googleUser['gender']; 
    
            $picture = $googleUser["picture"];            
            // function loginFromSocialCallBack($googleUser){      
                // echo '<script>
                // alert("Đăng nhập thành công với tài khoản google'.$name.'");
                // </script>';
                $result1= $p->getAllTaikhoanbyEmail($email);    
                //$result1 = mysqli_query($conn, "select * FROM taikhoan WHERE email ='$email'");
                $i = mysqli_num_rows($result1);
                 if ($i == 0) {
                     //$pa=md5(12345)
                    //echo '<img src="'.$picture.'">';

                     //$sql = "insert into Taikhoan(Tendangnhap,Email,Phanquyen) values('$name','$email','Benhnhan')"; 
                     //$res = mysqli_query($conn, $sql);
                    $quyen=0;
                    
                    $res=$p->InsertTaikhoanGG($name,$email,$quyen);
                     //$last_id = mysqli_insert_id($conn);
                    
                    //  $sq = "insert into benhnhan(id,
                    //  Hotenbn,Ngaysinh,Gioitinh,image) values('$last_id','$name','2021-11-09','Nam','$picture')";
                    //  mysqli_query($conn,$sq);  
                     //mysqli_query($conn,"INSERT INTO benhnhan(id,Hotenbn,Gioitinh,image) values('$lastid','$name','$gender','$picture')");                       
                     $tblmataikhoan = $p->getmaTaikhoan($name);
                     $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);
                     if($res) { 
                        //$last_id = mysqli_insert_id($conn);
                        // echo $last_id;  
                        $p->InsertBenhnhanGG($name,$picture,$mataikhoan['mataikhoan']);
                        
                    
                        $query = $p->getAllTaikhoanbyEmail($email);
                        $row = mysqli_fetch_array($query); 
                        session_start();
                        $_SESSION['mataikhoan']=$mataikhoan['mataikhoan'];
                        $_SESSION['tendangnhap'] = $row['tendangnhap'];
                        //  $_SESSION['matkhau']='null';
                        $_SESSION['quyen'] = $row['quyen'];
                        // header('Location:index.php');
                        echo '<script>
                        alert("Đăng nhập thành công với tài khoản google");
                        window.location.href="index.php";
                        </script>';
                    }
                    else
                    {
                        echo mysqli_error($conn);
                        exit;
                    }                    
                } 
                else{
                    $tblmataikhoan = $p->getmaTaikhoan($name);
                    $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);
                    $query = $p->getAllTaikhoanbyEmail($email);
                    $row = mysqli_fetch_array($query); 
                    session_start();
                    $_SESSION['mataikhoan']=$mataikhoan['mataikhoan'];
                    $_SESSION['tendangnhap'] = $row['tendangnhap'];
                    //  $_SESSION['matkhau']='null';
                    $_SESSION['quyen'] = $row['quyen'];
                    // header('Location:index.php');
                    echo '<script>
                        alert("Đăng nhập thành công với gmail");
                        window.location.href="index.php";
                        </script>';
                }               
                // if ($result1->num_rows > 0) {
                //     $row = mysqli_fetch_array($result1);                    
                //     if (session_status() == PHP_SESSION_NONE) {
                //         session_start();
                //     }
                //     $_SESSION['username'] = $row['Tendangnhap'];
                //     // $_SESSION['username'] = $username;
                //     header('Location:index.php');
                // }
            // }
        }
    }
?>
