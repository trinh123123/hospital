<?php
 include_once ("ketnoi.php");
 class modelhosokhambenh{
    function ThongTinBacsi($tendangnhap){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            // $string= "SELECT * FROM `benhnhan` WHERE mataikhoan='$mataikhoan'";
            $string = "SELECT * FROM bacsi t JOIN taikhoan d ON t.mataikhoan=d.mataikhoan where tendangnhap='$tendangnhap'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
        return false;}
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
    function TimkiemBenhnhan($ten,$mabacsi){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            // $string= "SELECT * FROM `benhnhan` WHERE mataikhoan='$mataikhoan'";
            $string = "SELECT DISTINCT tenbenhnhan, hinhanh, mataikhoan, bn.mabenhnhan 
            FROM `benhnhan` bn 
            JOIN `lichkham` lk 
            ON bn.mabenhnhan=lk.mabenhnhan
             WHERE bn.mabenhnhan=lk.mabenhnhan AND mabacsi='$mabacsi' AND tenbenhnhan LIKE '%$ten%'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
        return false;}
    }
     function Selecthosokhambenhbybenhnhan($mabacsi){
         $p = new clsketnoi();
         if($p->ketnoiDB($conn)){
             $string = "   SELECT DISTINCT tenbenhnhan, hinhanh, mataikhoan, bn.mabenhnhan 
             FROM `benhnhan` bn 
             JOIN `lichkham` lk 
             ON bn.mabenhnhan=lk.mabenhnhan
              WHERE bn.mabenhnhan=lk.mabenhnhan AND mabacsi='$mabacsi';
            ";
            // SELECT DISTINCT tenbenhnhan,hinhanh FROM `benhnhan` bn 
            // JOIN `hosokhambenh` hs 
            // ON bn.mabenhnhan=hs.mabenhnhan
            //  WHERE bn.mabenhnhan=hs.mabenhnhan;

             $table = mysqli_query($conn, $string);
             $p->dongketnoi($conn);
             return $table;
         }else{
             return false; 
         }
         }
     function Selectlichkhambymabenhnhan($mabenhnhan){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "SELECT * FROM `lichkham` l 
                JOIN `bacsi` ls 
                JOIN `benhnhan` ld 
                JOIN `noikham` lf 
                JOIN `cakham` lc
                ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan 
                AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                WHERE ld.mabenhnhan ='$mabenhnhan'
                ORDER BY l.ngaykham ASC, l.macakham ASC ;";

                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false; 
            }
            }
            function Timkiemlichkhambymabenhnhan($mabenhnhan,$ngaybatdau,$ngayketthuc){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "SELECT * FROM `lichkham` l 
                    JOIN `bacsi` ls 
                    JOIN `benhnhan` ld 
                    JOIN `noikham` lf 
                    JOIN `cakham` lc
                    ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan 
                    AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                    WHERE ld.mabenhnhan ='$mabenhnhan' AND ngaykham >= '$ngaybatdau' AND ngaykham <='$ngayketthuc' 
                    ORDER BY l.ngaykham ASC, l.macakham ASC ;";
    
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
                }
    function Selectbenhnhanbymalichkham($malichkham){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "   SELECT * FROM  `lichkham` lk JOIN `bacsi` bs 
            ON bs.mabacsi=lk.mabacsi 
                WHERE malichkham = '$malichkham';
            ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
    function Selecttaikhoanbymabenhnhan($mabenhnhan){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "   SELECT * FROM `benhnhan` 
                WHERE mabenhnhan = '$mabenhnhan';
            ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
    function SelectAlldonthuoc(){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "   SELECT * FROM donthuoc ;
            ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
        function Timkiemtendonthuoc($ten){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "   SELECT * FROM donthuoc WHERE tendonthuoc like '%$ten%' LIMIT 5;
                ";
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false; 
            }
            }
    function Selectdonthuoc_thuocvathuoc($madonthuoc){
        $p = new clsketnoi();
        if($p->ketnoiDB($conn)){
            $string = "   SELECT * FROM donthuoc_thuoc dtt JOIN thuoc t ON dtt.mathuoc=t.mathuoc 
            WHERE madonthuoc = '$madonthuoc';  ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        }else{
            return false; 
        }
        }
        function Selectdonthuocbymadonthuoc($madonthuoc){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "SELECT * FROM `donthuoc` dt
                JOIN `donthuoc_thuoc` dtt 
                JOIN thuoc t
                ON dt.madonthuoc = dt.madonthuoc AND dtt.mathuoc = t.mathuoc 
                WHERE dt.madonthuoc ='$madonthuoc'
                ;";

                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false; 
            }
            }
        // function Selecthosokhambenh($mabenhnhan){
        //     $p = new clsketnoi();
        //     if($p->ketnoiDB($conn)){
        //         $string = "SELECT * FROM hosokhambenh WHERE mabenhnhan= $mabenhnhan ORDER BY cautraloi  DESC; ";   
        //         $table = mysqli_query($conn, $string);
        //         $p->dongketnoi($conn);
        //         return $table;
        //     }else{
        //         return false; 
        //     }
        //     }
        //     function Selecthosokhambenh_bacsi(){
        //         $p = new clsketnoi();
        //         if($p->ketnoiDB($conn)){
        //             $string = "SELECT * FROM hosokhambenh t JOIN benhnhan bn ON t.mabenhnhan=bn.mabenhnhan 
        //             WHERE cautraloi is NULL; ";   
        //             $table = mysqli_query($conn, $string);
        //             $p->dongketnoi($conn);
        //             return $table;
        //         }else{
        //             return false; 
        //         }
        //         }
        //         function Selecthosokhambenh_bacsitraloi($mabacsi){
        //             $p = new clsketnoi();
        //             if($p->ketnoiDB($conn)){
        //                 $string = "SELECT * FROM hosokhambenh t JOIN benhnhan bn ON t.mabenhnhan=bn.mabenhnhan 
        //                 WHERE mabacsi = $mabacsi AND cautraloi is not null; ";   
        //                 $table = mysqli_query($conn, $string);
        //                 $p->dongketnoi($conn);
        //                 return $table;
        //             }else{
        //                 return false; 
        //             }
        //             }
        //         // function Selectbenhnhan($mabenhnhan){
        //         //     $p = new clsketnoi();
        //         //     if($p->ketnoiDB($conn)){
        //         //         $string = "SELECT * FROM benhnhan WHERE mabenhnhan=$mabenhnhan ";   
        //         //         $table = mysqli_query($conn, $string);
        //         //         $p->dongketnoi($conn);
        //         //         return $table;
        //         //     }else{
        //         //         return false; 
        //         //     }
        //         //     }
            function Selecttaikhoan_mataikhoan($mataikhoan){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT * FROM `taikhoan` WHERE mataikhoan=$mataikhoan ";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            function updatehosokhambenh_madonthuoc($madonthuoc,$chandoan,$malichkham){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "UPDATE lichkham SET madonthuoc='$madonthuoc', chandoan='$chandoan' WHERE malichkham=$malichkham ";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }

            ///
            function inserttendonthuoc($tendonthuoc){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "INSERT INTO donthuoc (tendonthuoc) values ('$tendonthuoc')";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            function selectdonthuocbytendonthuoc($tendonthuoc){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "SELECT * FROM `donthuoc` WHERE tendonthuoc ='$tendonthuoc';";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            function insertdonthuoc($madonthuoc,$mathuoc,$donvi,$soluong,$cachdung){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string= "INSERT INTO donthuoc_thuoc (madonthuoc,mathuoc,donvi,soluong,cachdung) 
                    values ('$madonthuoc','$mathuoc','$donvi','$soluong','$cachdung')";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            function SelectAllthuoc(){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "   SELECT * FROM thuoc ;
                    ";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
                }
        
        //     function Selecthosokhambenh1($mahosokhambenh){
        //         $p = new clsketnoi();
        //         if($p->ketnoiDB($conn)){
        //             $string = "SELECT * FROM hosokhambenh t LEFT JOIN bacsi bs ON t.mabacsi=bs.mabacsi 
        //             WHERE mahosokhambenh = $mahosokhambenh";   
        //             $table = mysqli_query($conn, $string);
        //             $p->dongketnoi($conn);
        //             return $table;
        //         }else{
        //             return false; 
        //         }
        //         }
            
        //     function Selecthosokhambenh2($mahosokhambenh){
        //         $p = new clsketnoi();
        //         if($p->ketnoiDB($conn)){
        //             $string = "SELECT * FROM `hosokhambenh` t  JOIN `benhnhan` bn
        //              ON  t.mabenhnhan = bn.mabenhnhan  WHERE mahosokhambenh=$mahosokhambenh  ";   
        //             $table = mysqli_query($conn, $string);
        //             $p->dongketnoi($conn);
        //             return $table;
        //         }else{
        //             return false; 
        //         }
        //         }
        //     function Inserthosokhambenh($mabenhnhan, $tieude,$cauhoi){
        //         $conn;
        //         $p=new clsketnoi();
        //         $p->ketnoiDB($conn);
        //         $string="INSERT INTO `hosokhambenh` (`mahosokhambenh`, `mabenhnhan`, `mabacsi`, `tieude`, `cauhoi`, `cautraloi`) 
        //         VALUES (NULL, $mabenhnhan, NULL, '$tieude', '$cauhoi', NULL);";
        //         $kq=mysqli_query($conn,$string);
        //         $p->dongketnoi($conn);
        //         return $kq;
        //     }   
        //     function deletehosokhambenh($hosokhambenh){
        //         $p = new clsketnoi();
        //         if($p->ketnoiDB($conn)){
        //             $string = "DELETE FROM hosokhambenh WHERE mahosokhambenh = '$hosokhambenh'";
        //             $kq = mysqli_query($conn, $string);
        //             $p->dongketnoi($conn);
        //             return $kq;
        //         }else{
        //             return false; 
        //         }
        //     }
        //     function updatehosokhambenh_cautraloi($cautraloi,$mahosokhambenh, $mabacsi){
        //         $p = new clsketnoi();
        //         if($p->ketnoiDB($conn)){
        //             $string = "UPDATE hosokhambenh SET cautraloi ='$cautraloi' , mabacsi='$mabacsi' 
        //             WHERE mahosokhambenh='$mahosokhambenh'";
        //             $table = mysqli_query($conn, $string);
        //             $p->dongketnoi($conn);
        //             return $table;
        //         }else{
        //         return false;}
        //     }
        //     function selectmabacsibytaikhoan($mataikhoan){
        //         $p = new clsketnoi();
        //         if($p->ketnoiDB($conn)){
        //             $string = "SELECT * FROM bacsi WHERE mataikhoan=$mataikhoan  ";   
        //             $table = mysqli_query($conn, $string);
        //             $p->dongketnoi($conn);
        //             return $table;
        //         }else{
        //             return false; 
        //         }
        //         }
        //     function selectmabenhnhanbytaikhoan($mataikhoan){
        //         $p = new clsketnoi();
        //         if($p->ketnoiDB($conn)){
        //             $string = "SELECT * FROM benhnhan WHERE mataikhoan=$mataikhoan  ";   
        //             $table = mysqli_query($conn, $string);
        //             $p->dongketnoi($conn);
        //             return $table;
        //         }else{
        //             return false; 
        //         }
        //         }
        //     function Timkiemhosokhambenh($tieude){
        //         $p = new clsketnoi();
        //         if($p->ketnoiDB($con)){
        //             $string = "SELECT * FROM hosokhambenh t JOIN benhnhan bn ON t.mabenhnhan=bn.mabenhnhan 
        //             WHERE cautraloi is NULL AND tieude like '%$tieude%'     ";
        //             $table = mysqli_query($con, $string);
        //             $p->dongketnoi($con);
        //             return $table;
        //         }else{
        //             return false; 
        //         }
        //     }
        //     function Timkiemhosokhambenh1($tieude, $mabacsi){
        //         $p = new clsketnoi();
        //         if($p->ketnoiDB($con)){
        //             $string = " SELECT * FROM hosokhambenh t JOIN benhnhan bn ON t.mabenhnhan=bn.mabenhnhan 
        //             WHERE mabacsi = $mabacsi AND cautraloi is not null AND tieude like '%$tieude%'     ";
        //             $table = mysqli_query($con, $string);
        //             $p->dongketnoi($con);
        //             return $table;
        //         }else{
        //             return false; 
        //         }
        //     }

        //////Admin
        function Selecthosokhambenh(){
            $p = new clsketnoi();
            if($p->ketnoiDB($conn)){
                $string = "   SELECT DISTINCT tenbenhnhan, hinhanh, mataikhoan, bn.mabenhnhan 
                FROM `benhnhan` bn 
                JOIN `lichkham` lk 
                ON bn.mabenhnhan=lk.mabenhnhan
                 WHERE bn.mabenhnhan=lk.mabenhnhan
               ";
               // SELECT DISTINCT tenbenhnhan,hinhanh FROM `benhnhan` bn 
               // JOIN `hosokhambenh` hs 
               // ON bn.mabenhnhan=hs.mabenhnhan
               //  WHERE bn.mabenhnhan=hs.mabenhnhan;
   
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false; 
            }
            }
            function TimkiemBenhnhanAdmin($ten){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    // $string= "SELECT * FROM `benhnhan` WHERE mataikhoan='$mataikhoan'";
                    $string = "SELECT DISTINCT tenbenhnhan, hinhanh, mataikhoan, bn.mabenhnhan 
                    FROM `benhnhan` bn 
                    JOIN `lichkham` lk 
                    ON bn.mabenhnhan=lk.mabenhnhan
                     WHERE bn.mabenhnhan=lk.mabenhnhan  AND tenbenhnhan LIKE '%$ten%'";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                return false;}
            }
            function TimkiemlichkhambymabenhnhanAdmin($mabenhnhan,$ten){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "SELECT * FROM `lichkham` l 
                    JOIN `bacsi` ls 
                    JOIN `benhnhan` ld 
                    JOIN `noikham` lf 
                    JOIN `cakham` lc
                    ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan 
                    AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                    WHERE ld.mabenhnhan ='$mabenhnhan' AND malichkham LIKE '%$ten%'
                    ORDER BY malichkham ASC;";
    
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
                }
            function Selectlichkham(){
                $p = new clsketnoi();
                if($p->ketnoiDB($conn)){
                    $string = "SELECT * FROM `lichkham` l 
                    JOIN `bacsi` ls 
                    JOIN `benhnhan` ld 
                    JOIN `noikham` lf 
                    JOIN `cakham` lc
                    ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan 
                    AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                    ORDER BY malichkham ASC;";
    
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table;
                }else{
                    return false; 
                }
                }
                function Timkiemlichkhambymalichkham($ten){
                    $p = new clsketnoi();
                    if($p->ketnoiDB($conn)){
                        $string = "SELECT * FROM `lichkham` l 
                        JOIN `bacsi` ls 
                        JOIN `benhnhan` ld 
                        JOIN `noikham` lf 
                        JOIN `cakham` lc
                        ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan 
                        AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                        WHERE malichkham LIKE '%$ten%' OR tenbenhnhan LIKE '%$ten%' OR tenbacsi LIKE '%$ten%'
                        ORDER BY malichkham ASC;";
        
                        $table = mysqli_query($conn, $string);
                        $p->dongketnoi($conn);
                        return $table;
                    }else{
                        return false; 
                    }
                    }
                    function Timkiemlichkhambyngay($ngaybatdau,$ngayketthuc){
                        $p = new clsketnoi();
                        if($p->ketnoiDB($conn)){
                            $string = "SELECT * FROM `lichkham` l 
                            JOIN `bacsi` ls 
                            JOIN `benhnhan` ld 
                            JOIN `noikham` lf 
                            JOIN `cakham` lc
                            ON l.mabacsi = ls.mabacsi AND l.mabenhnhan = ld.mabenhnhan 
                            AND l.manoikham = lf.manoikham AND l.macakham = lc.macakham
                            WHERE ngaykham >= '$ngaybatdau' AND ngaykham <='$ngayketthuc' 
                            ORDER BY l.ngaykham ASC, l.macakham ASC ;";
            
                            $table = mysqli_query($conn, $string);
                            $p->dongketnoi($conn);
                            return $table;
                        }else{
                            return false; 
                        }
                        }

    }
?>
