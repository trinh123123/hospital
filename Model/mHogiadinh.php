<?php
 include_once ("ketnoi.php");
 class modelhogiadinh{
    function SelectAllhogiadinh(){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "SELECT * FROM hogiadinh hgd JOIN benhnhan bn ON hgd.mahogiadinh=bn.mahogiadinh ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }

    function Selectmahogiadinhbytengiadinh($tenhogiadinh){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "SELECT * FROM hogiadinh  WHERE tenhogiadinh = '$tenhogiadinh' ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
    function Selecthogiadinhbymahogiadinh($mahogiadinh){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "SELECT * FROM hogiadinh  WHERE mahogiadinh = '$mahogiadinh' ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
        
    function Selectbenhnhanbymahogiadinh($mahogiadinh){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "SELECT * FROM `benhnhan` WHERE mahogiadinh = '$mahogiadinh' ;";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
    function Selectbenhnhan($mabenhnhan){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "SELECT * FROM `benhnhan` WHERE mabenhnhan = '$mabenhnhan' ;";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
        function Selectbenhnhanmtk($mataikhoan){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "SELECT * FROM `benhnhan` WHERE mataikhoan = '$mataikhoan' ;";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false; 
            }
            }
    function Selecthogiadinhbymabenhnhan($mabenhnhan){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "SELECT hgd.tenhogiadinh, hgd.diachi, bs.tenbacsi, hgd.quyenchuho, hgd.trangthai FROM hogiadinh hgd 
            JOIN benhnhan bn JOIN bacsi bs ON hgd.mahogiadinh=bn.mahogiadinh AND hgd.mabacsi = bs.mabacsi
            WHERE mabenhnhan = '$mabenhnhan'  ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
    function Selecthogiadinhbychuho($quyenchuho){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "SELECT hgd.tenhogiadinh, hgd.diachi, bs.tenbacsi, hgd.quyenchuho, bn.tenbenhnhan FROM hogiadinh hgd 
            JOIN benhnhan bn JOIN bacsi bs ON hgd.mahogiadinh=bn.mahogiadinh AND hgd.mabacsi = bs.mabacsi
            WHERE bn.mabenhnhan = '$quyenchuho'  ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
    function Selecthogiadinhbyquyenchuho($quyenchuho){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "SELECT * FROM `hogiadinh` WHERE quyenchuho = '$quyenchuho';";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
    function selectmabenhnhanbytaikhoan($mataikhoan){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "SELECT * FROM benhnhan WHERE mataikhoan = '$mataikhoan'  ";   
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
    function Themthanhvien_hogiadinh($mahogiadinh, $mabenhnhan){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "UPDATE `benhnhan` SET mahogiadinh = '$mahogiadinh'
             WHERE mabenhnhan = '$mabenhnhan';";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
        return false;}
    }
    function Inserthogiadinh($tenhogiadinh, $diachi, $mabacsi, $quyenchuho,$trangthai){
        $p=new clsketnoi();
        $p->ketnoiDB($conn);
        $string="INSERT INTO `hogiadinh` (`mahogiadinh`, `tenhogiadinh`, `diachi`,`trangthai`,`quyenchuho`, `mabacsi`) 
        VALUES (NULL, '$tenhogiadinh', '$diachi','$trangthai','$quyenchuho', '$mabacsi');";
     
        $kq=mysqli_query($conn,$string);
        $p->dongketnoi($conn);
        return $kq;
    }   
    // Xét duyệt bác sĩ
    function selectmabacsibytaikhoan($mataikhoan){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "SELECT * FROM bacsi WHERE mataikhoan = '$mataikhoan'  ";   
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
    function xetduyet_hogiadinh($mahogiadinh){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "UPDATE `hogiadinh` SET `trangthai` = '1' 
            WHERE `hogiadinh`.`mahogiadinh` = '$mahogiadinh' ;";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
        return false;}
    }
    function Selecthogiadinhbymabacsi($mabacsi,$trangthai){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            if($trangthai==3){
                $string = "SELECT * FROM hogiadinh WHERE mabacsi = '$mabacsi' ORDER BY mabacsi DESC ";
            }else{ $string = "SELECT * FROM hogiadinh WHERE mabacsi = '$mabacsi' AND trangthai = '$trangthai' ORDER BY mabacsi DESC ";
            }
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
        function Xoathanhvienhogiadinh($mabenhnhan){
            $p=new clsketnoi();
            $p->ketnoiDB($conn);
            $string="UPDATE benhnhan SET mahogiadinh=NULL WHERE mabenhnhan='$mabenhnhan' ";
         
            $kq=mysqli_query($conn,$string);
            $p->dongketnoi($conn);
            return $kq;
        }   
   
 }
     
?>
