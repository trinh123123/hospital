<?php
 include_once ("ketnoi.php");
 class modeltuvan{
     function SelectAlltuvan(){
         $p = new clsketnoi();
         if($p->ketnoiDB($conn)){
             $string = "SELECT * FROM `tuvan` t
            --  JOIN `bacsi` bs 
             JOIN `benhnhan` bn
             ON  t.mabenhnhan = bn.mabenhnhan 
            --  WHERE l.ngaykham >= CURDATE() 
            --  ORDER BY l.ngaykham ASC, l.macakham ASC ;
            ";

             $table = mysqli_query($conn, $string);
             $p->dongketnoi($conn);
             return $table;
         }else{
             return false; 
         }
         }
    
        function Selecttuvan($mabenhnhan){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "SELECT * FROM tuvan WHERE mabenhnhan= $mabenhnhan ORDER BY cautraloi  DESC; ";   
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false; 
            }
            }
            function Selecttuvan_bacsi(){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "SELECT * FROM tuvan t JOIN benhnhan bn ON t.mabenhnhan=bn.mabenhnhan 
                    WHERE cautraloi is NULL; ";   
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
                }
                function Selecttuvan_bacsitraloi($mabacsi){
                    $p = new clsketnoi();
                    if($p->ketnoiDB($conn)){
                        $string = "SELECT * FROM tuvan t JOIN benhnhan bn ON t.mabenhnhan=bn.mabenhnhan 
                        WHERE mabacsi = $mabacsi AND cautraloi is not null; ";   
                        $table = mysqli_query($conn, $string);
                        $p->dongketnoi($conn);
                        return $table;
                    }else{
                        return false; 
                    }
                    }
                // function Selectbenhnhan($mabenhnhan){
                //     $p = new clsketnoi();
                //     if($p->ketnoiDB($conn)){
                //         $string = "SELECT * FROM benhnhan WHERE mabenhnhan=$mabenhnhan ";   
                //         $table = mysqli_query($conn, $string);
                //         $p->dongketnoi($conn);
                //         return $table;
                //     }else{
                //         return false; 
                //     }
                //     }
            function gettaikhoan_mataikhoan($mataikhoan){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT * FROM `taikhoan` WHERE mataikhoan=$mataikhoan ";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            function Selecttuvan1($matuvan){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "SELECT * FROM tuvan t LEFT JOIN bacsi bs ON t.mabacsi=bs.mabacsi 
                    WHERE matuvan = $matuvan";   
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
                }
            
            function Selecttuvan2($matuvan){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "SELECT * FROM `tuvan` t  JOIN `benhnhan` bn
                     ON  t.mabenhnhan = bn.mabenhnhan  WHERE matuvan=$matuvan  ";   
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
                }
            function Inserttuvan($mabenhnhan, $tieude,$cauhoi){
                $conn;
                $p=new clsketnoi();
                $p->ketnoiDB($conn);
                $string="INSERT INTO `tuvan` (`matuvan`, `mabenhnhan`, `mabacsi`, `tieude`, `cauhoi`, `cautraloi`) 
                VALUES (NULL, $mabenhnhan, NULL, '$tieude', '$cauhoi', NULL);";
                $kq=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $kq;
            }   
            function deletetuvan($tuvan){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "DELETE FROM tuvan WHERE matuvan = '$tuvan'";
                    $kq = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $kq;
                }else{
                    return false; 
                }
            }
            function updatetuvan_cautraloi($cautraloi,$matuvan, $mabacsi){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "UPDATE tuvan SET cautraloi ='$cautraloi' , mabacsi='$mabacsi' 
                    WHERE matuvan='$matuvan'";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            function selectmabacsibytaikhoan($mataikhoan){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "SELECT * FROM bacsi WHERE mataikhoan=$mataikhoan  ";   
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
                    $string = "SELECT * FROM benhnhan WHERE mataikhoan=$mataikhoan  ";   
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
                }
            function Timkiemtuvan($tieude){
                $p = new clsketnoi();
                if($p->ketnoiDB($con)){
                    $string = "SELECT * FROM tuvan t JOIN benhnhan bn ON t.mabenhnhan=bn.mabenhnhan 
                    WHERE cautraloi is NULL AND tieude like '%$tieude%'     ";
                    $table = mysqli_query($con, $string);
                    $p->dongketnoi($con);
                    return $table;
                }else{
                    return false; 
                }
            }
            function Timkiemtuvan1($tieude, $mabacsi){
                $p = new clsketnoi();
                if($p->ketnoiDB($con)){
                    $string = " SELECT * FROM tuvan t JOIN benhnhan bn ON t.mabenhnhan=bn.mabenhnhan 
                    WHERE mabacsi = $mabacsi AND cautraloi is not null AND tieude like '%$tieude%'     ";
                    $table = mysqli_query($con, $string);
                    $p->dongketnoi($con);
                    return $table;
                }else{
                    return false; 
                }
            }
    }
?>
