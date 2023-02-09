<?php
session_start();
include_once("./Controller/cHogiadinh.php");
$p = new controlhogiadinh();
if(isset($_POST['id_xoagiadinh'])){
    $idmabenhnhan = $_POST['id_xoagiadinh'];
    $mataikhoan = $_SESSION["mataikhoan"];
    $tblbenhnhan = $p->gettmabenhnhanbytaikhoan($mataikhoan);
    $mabenhnhan = mysqli_fetch_assoc($tblbenhnhan);
    $mabenhnhan =$mabenhnhan['mabenhnhan'];        
        if($mabenhnhan != $idmabenhnhan){
            $kq=$p->Xoathanhvienhogiadinh($idmabenhnhan);
            // $xoathanhvien=mysqli_fetch_assoc($tblxoathanhvien);
            if($kq==1){
                echo 1;
            }
        }else{
            echo 2;
        }
    
}
?>