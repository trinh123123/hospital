<?php
    include_once ("ketnoi.php");
    class modelThuoc{
        function SelectAllthuoc(){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "SELECT * from thuoc";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false; 
            }
        }
        function getThuocbyTenThuoc($tenthuoc){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "SELECT * FROM `thuoc` WHERE tenthuoc='$tenthuoc'";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function getThuoc($mathuoc){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "SELECT * FROM `thuoc` WHERE mathuoc='$mathuoc'";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function insertthuoc($tenthuoc,$thongtinthuoc){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "insert into thuoc(tenthuoc,thongtinthuoc) values ('$tenthuoc','$thongtinthuoc')";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function Timkiemthuoc($ten){
            $p = new clsketnoi();
            if($p->ketnoiDB($con)){
                $string = "SELECT * from thuoc WHERE tenthuoc LIKE '%$ten%' ";
                $table = mysqli_query($con, $string);
                $p->dongketnoi($con);
                return $table;
            }else{
                return false; 
            }
        }
        function updatethuoc($thongtinthuoc,$mathuoc){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string= "UPDATE thuoc SET  thongtinthuoc='$thongtinthuoc'  WHERE mathuoc =$mathuoc";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
            return false;}
        }
        function DeleteThuoc($mathuoc){
            $p=new clsketnoi();
            $p->ketnoiDB($conn);
            $string="DELETE FROM thuoc WHERE mathuoc = '$mathuoc'";
            $kq=mysqli_query($conn,$string);
            $p->dongketnoi($conn);
            return $kq;
        } 
    }

?>