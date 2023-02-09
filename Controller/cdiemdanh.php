<?php
    include_once ("Model/mdiemdanh.php");
    class controldiemdanh{
        function getAlldiemdanh(){
            $p = new modeldiemdanh();
            $tbldiemdanh = $p->SelectAlldiemdanh();
        }
        function getdiemdanh($Msdd){
            $p = new modeldiemdanh();
            $tbldiemdanh = $p->Selectdiemdanh($Msdd);
            return $tbldiemdanh;
        }
        function getAlldiemdanhbyhocphan($Mshp){
            $p = new modeldiemdanh();
            $tblProduct = $p->SelectAlldiemdanhbyhocphan($Mshp);
            return $tblProduct;
        }
        function Themdiemdanh($Mssv,$Msdd){
            $p = new modeldiemdanh();
            $ins = $p->Insertdiemdanh($Mssv,$Msdd);
            if($ins){
                return 1;
            }else{
                return 0;
            }
        }      
        function kiemtradiemdanh($Mssv,$Msdd){
            $p = new modeldiemdanh();
            $ins = $p->kiemtradiemdanh($Mssv,$Msdd);
            return $ins;
        }   
        function kiemtrapass($Msdd,$Pass){
            $p=new modeldiemdanh();
            $tblpassdiemdanh=$p->checkpass($Msdd,$Pass);
            return $tblpassdiemdanh;
        }
        function suapass($Msdd,$Pass){
            $p = new modeldiemdanh();
            $up = $p->passnew($Msdd,$Pass);
            if($up){
                return 1;
            }else{
                return 0;
            }
        }
        function getAlldiemdanhbymssv($Mssv){
            $p = new modeldiemdanh();
            $tbldiemdanh = $p->Selectalldiemdanhbymssv($Mssv);
            return $tbldiemdanh;
        }
        function kt($Msdd,$Mssv){
            $p=new modeldiemdanh();
            $tblkt=$p->checkdiemdanh($Msdd,$Mssv);
            return $tblkt;
        }
        function xetduyet($mank,$trangthai){
            $p = new modeldiemdanh();
            $up = $p->xetduyet($mank,$trangthai);
            if($up){
                return 1;
            }else{
                return 0;
            }
        }
}
?>
