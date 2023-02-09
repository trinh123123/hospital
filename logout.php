<?php 
    session_start();
    if(isset($_SESSION['tendangnhap'])){
        session_destroy();
        // echo header("refresh:0;url='login.php'");
        echo '<script>
        window.location.href="login.php";
      </script>';
    } else{
      session_destroy(); 
      echo '<script>
      window.location.href="login.php";
    </script>';
  }
?>