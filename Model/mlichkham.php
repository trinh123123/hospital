<?php
    include_once ("ketnoi.php");
    class modellichkham{
        function SelectAlllichkham(){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "SELECT * FROM `lichkham` l 
                JOIN `bacsi` ls 
                JOIN `benhnhan` ld 
                JOIN `noikham` lf 
                JOIN `cakham` lc
                ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                WHERE l.ngaykham >= CURDATE() 
                ORDER BY l.ngaykham ASC, l.macakham ASC ;";

                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false; 
            }
            }
            function TimkiemAlllichkham($ten){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "SELECT * FROM `lichkham` l 
                    JOIN `bacsi` ls 
                    JOIN `benhnhan` ld 
                    JOIN `noikham` lf 
                    JOIN `cakham` lc
                    ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                    WHERE l.ngaykham >= CURDATE() 
                    AND (ls.tenbacsi LIKE '%$ten%' OR ld.tenbenhnhan LIKE '%$ten%' OR l.ngaykham LIKE '%$ten%' OR lf.diadiem LIKE '%$ten%' OR lc.thoigianbatdau LIKE '%$ten%' OR lc.thoigiankethuc LIKE '%$ten%')
                    ORDER BY l.ngaykham ASC, l.macakham ASC ;";
    
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
                }
                function Selectlichkhambymalichkham($malichkham){
                    $p = new clsketnoi();
                    if($p->ketnoiDB($conn)){
                        $string = "SELECT * FROM `lichkham`  
                        WHERE ngaykham >= CURDATE() AND malichkham='$malichkham'";
        
                        $table = mysqli_query($conn, $string);
                        $p->dongketnoi($conn);
                        return $table;
                    }else{
                        return false; 
                    }
                    }
                    function Updatelichkhambymalichkham($ngaykham,$macakham,$malichkham){
                        $p = new clsketnoi();
                        if($p->ketnoiDB($conn)){
                            $string = "UPDATE `lichkham` SET ngaykham='$ngaykham', macakham='$macakham'
                            WHERE ngaykham >= CURDATE() AND malichkham='$malichkham'";
            
                            $table = mysqli_query($conn, $string);
                            $p->dongketnoi($conn);
                            return $table;
                        }else{
                            return false; 
                        }
                        }
                        function Deletelichkham($malichkham){
                            $p = new clsketnoi();
                            if($p->ketnoiDB($conn)){
                                $string = "DELETE FROM lichkham
                                WHERE malichkham='$malichkham'";
                
                                $table = mysqli_query($conn, $string);
                                $p->dongketnoi($conn);
                                return $table;
                            }else{
                                return false; 
                            }
                            }
            function Selectlichkhambymabacsi($mabacsi){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "SELECT * FROM `lichkham` l 
                    JOIN `bacsi` ls 
                    JOIN `cakham` lc
                    ON l.mabacsi = ls.mabacsi   AND l.macakham = lc.macakham
                    WHERE l.ngaykham >= CURDATE() AND l.mabacsi = '$mabacsi' AND l.mabenhnhan IS NULL
                    ORDER BY l.ngaykham ASC, l.macakham ASC ;";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
            }
            function Timkiemlichkhambymabacsi($mabacsi,$ten){
                $p = new clsketnoi();
                if($p->ketnoiDB($con)){
                    $string = "SELECT * FROM `lichkham` l 
                    JOIN `bacsi` ls 
                    JOIN `cakham` lc
                    ON l.mabacsi = ls.mabacsi   AND l.macakham = lc.macakham
                    WHERE l.ngaykham >= CURDATE() AND l.mabacsi = '$mabacsi' AND l.mabenhnhan IS NULL 
                    AND (l.ngaykham LIKE '%$ten%' OR thoigianbatdau LIKE '%$ten%' OR  thoigiankethuc LIKE '%$ten%')
                    ORDER BY l.ngaykham ASC, l.macakham ASC ;";
                    // $string = "SELECT * from thuoc WHERE tenthuoc LIKE '%$ten%' ";
                    $table = mysqli_query($con, $string);
                    $p->dongketnoi($con);
                    return $table;
                }else{
                    return false; 
                }
            }
            function Selectlichkhambymabacsi1($mabacsi){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "SELECT * FROM `lichkham` l 
                    JOIN `bacsi` ls 
                    JOIN `benhnhan` ld 
                    JOIN `noikham` lf 
                    JOIN `cakham` lc
                    ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                    WHERE l.ngaykham >= CURDATE() AND l.mabacsi = '$mabacsi'
                    ORDER BY l.ngaykham ASC, l.macakham ASC ;";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
            }
            function Timkiemlichkhambymabacsi1($mabacsi,$ten){
                $p = new clsketnoi();
                if($p->ketnoiDB($con)){
                    $string = "SELECT * FROM `lichkham` l 
                    JOIN `bacsi` ls 
                    JOIN `benhnhan` ld 
                    JOIN `noikham` lf 
                    JOIN `cakham` lc
                    ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                    WHERE l.ngaykham >= CURDATE() AND l.mabacsi = '$mabacsi'
                    AND (ld.tenbenhnhan LIKE '%$ten%' OR lf.diadiem LIKE '%$ten%' OR l.ngaykham LIKE '%$ten%' OR thoigianbatdau LIKE '%$ten%' OR  thoigiankethuc LIKE '%$ten%')
                    ORDER BY l.ngaykham ASC, l.macakham ASC ;";
                    // $string = "SELECT * from thuoc WHERE tenthuoc LIKE '%$ten%' ";
                    $table = mysqli_query($con, $string);
                    $p->dongketnoi($con);
                    return $table;
                }else{
                    return false; 
                }
            }
            function Selectlichkhambymabenhnhan2($mabenhnhan){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "SELECT * FROM `lichkham` l 
                    JOIN `bacsi` ls 
                    JOIN `benhnhan` ld 
                    JOIN `noikham` lf 
                    JOIN `cakham` lc
                    ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                    WHERE l.ngaykham >= CURDATE() AND l.mabenhnhan = '$mabenhnhan'
                    ORDER BY l.ngaykham ASC, l.macakham ASC ;";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
            }
            function Timkiemlichkhambymabacs2($mabenhnhan,$ten){
                $p = new clsketnoi();
                if($p->ketnoiDB($con)){
                    $string = "SELECT * FROM `lichkham` l 
                    JOIN `bacsi` ls 
                    JOIN `benhnhan` ld 
                    JOIN `noikham` lf 
                    JOIN `cakham` lc
                    ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                    WHERE l.ngaykham >= CURDATE() AND l.mabenhnhan = '$mabenhnhan'
                    AND (ls.tenbacsi LIKE '%$ten%' OR l.ngaykham LIKE '%$ten%' OR lf.diadiem LIKE '%$ten%' OR thoigianbatdau LIKE '%$ten%' OR  thoigiankethuc LIKE '%$ten%')
                    ORDER BY l.ngaykham ASC, l.macakham ASC ;";
                    // $string = "SELECT * from thuoc WHERE tenthuoc LIKE '%$ten%' ";
                    $table = mysqli_query($con, $string);
                    $p->dongketnoi($con);
                    return $table;
                }else{
                    return false; 
                }
            }


            
            function getmabacsi($mataikhoan){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT * FROM `bacsi` WHERE mataikhoan='$mataikhoan'";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            function Insertlichkham($ngaykham,$cakham,$mabacsi){
                $conn;
                $p=new clsketnoi();
                $p->ketnoiDB($conn);
                $string="INSERT INTO `lichkham` 
                (`ngaykham`, `mabacsi`,  `macakham`) 
                VALUES ('$ngaykham', '$mabacsi', '$cakham');";
                $kq=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $kq;
            }   
            
            function getlichtrung($ngaykham,$cakham,$mabacsi){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT * FROM `lichkham` WHERE ngaykham='$ngaykham' AND macakham='$cakham' AND mabacsi='$mabacsi' ";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            function updatelichkham($comp,$mabenhnhan){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "UPDATE `lichkham` SET `mabenhnhan` = '$mabenhnhan', `manoikham` = '1' WHERE `lichkham`.`malichkham` = '$comp' ";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            function getbenhnhanmtk($mataikhoan){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT mabenhnhan FROM `benhnhan` WHERE mataikhoan='$mataikhoan'";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            function Deletelichtrong($malichkham){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "delete from lichkham WHERE malichkham='$malichkham'";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;
                }        
            }

            function huylich($malichkham){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "UPDATE lichkham SET mabenhnhan=null WHERE malichkham='$malichkham'";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;
                }        
            }

            function kiemtrathemlich($ngaykham, $macakham,$mabacsi){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT * from lichkham where mabacsi='$mabacsi' AND ngaykham='$ngaykham' AND macakham='$macakham'";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;
                }        
            }
            function kiemtradatlich($mabenhnhan,$ngaykham, $macakham){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT * from lichkham where mabenhnhan='$mabenhnhan' AND ngaykham='$ngaykham' AND macakham='$macakham'";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;
                }        
            }
            function getmalichkham($malichkham){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT * from lichkham where malichkham='$malichkham'";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;
                }        
            }
            function getAlllichkhamBS(){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT * FROM `lichkham` l JOIN `bacsi` ls JOIN `cakham` lc 
                    ON l.mabacsi = ls.mabacsi AND l.macakham = lc.macakham 
                    WHERE l.ngaykham >= CURDATE() 
                    ORDER BY l.ngaykham ASC, l.macakham ASC;";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;
                }        
            }
            function TimkiemAlllichkhamBS($ten){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT * FROM `lichkham` l JOIN `bacsi` ls JOIN `cakham` lc 
                    ON l.mabacsi = ls.mabacsi AND l.macakham = lc.macakham 
                    WHERE l.ngaykham >= CURDATE() 
                    AND (ls.tenbacsi LIKE '%$ten%' OR l.ngaykham LIKE '%$ten%' OR thoigianbatdau LIKE '%$ten%' OR  thoigiankethuc LIKE '%$ten%')
                    ORDER BY l.ngaykham ASC, l.macakham ASC;";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;
                }        
            }
            function Selectlichkhambymabacsingaykham($mabacsi,$ngaykham){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT * from cakham WHERE macakham NOT IN (SELECT macakham from lichkham WHERE mabacsi='$mabacsi' AND ngaykham='$ngaykham')";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;
                }        
            }
            function ThongTinBenhnhan($tendangnhap){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    // $string= "SELECT * FROM `benhnhan` WHERE mataikhoan='$mataikhoan'";
                    $string = "SELECT * FROM benhnhan t JOIN taikhoan d ON t.mataikhoan=d.mataikhoan where tendangnhap='$tendangnhap'";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            

}

?>