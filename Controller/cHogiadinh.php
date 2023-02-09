<?php
include_once ("Model/mHogiadinh.php");
    class controlhogiadinh{
        function getAllhogiadinh(){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->SelectAllhogiadinh();
            return $tblhogiadinh;
        }
        function getmahogiadinhbytengiadinh($tenhogiadinh){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->Selectmahogiadinhbytengiadinh($tenhogiadinh);
            return $tblhogiadinh;
        }
        function gethogiadinhbymahogiadinh($mahogiadinh){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->Selecthogiadinhbymahogiadinh($mahogiadinh);
            return $tblhogiadinh;
        }
        function gethogiadinhbyquyenchuho($quyenchuho){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->Selecthogiadinhbyquyenchuho($quyenchuho);
            return $tblhogiadinh;
        }
        function gethogiadinhbychuho($quyenchuho){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->Selecthogiadinhbychuho($quyenchuho);
            return $tblhogiadinh;
        }
        function gethogiadinhbymabenhnhan($mabenhnhan){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->Selecthogiadinhbymabenhnhan($mabenhnhan);
            return $tblhogiadinh;
        }
        function getbenhnhanbymahogiadinh($mahogiadinh){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->Selectbenhnhanbymahogiadinh($mahogiadinh);
            return $tblhogiadinh;
        }
        function getbenhnhan($mabenhnhan){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->Selectbenhnhan($mabenhnhan);
            return $tblhogiadinh;
        }
        function getbenhnhantk($mataikhoan){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->Selectbenhnhan($mataikhoan);
            return $tblhogiadinh;
        }
        function gettmabenhnhanbytaikhoan($mataikhoan){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->selectmabenhnhanbytaikhoan($mataikhoan);
            return $tblhogiadinh;
        }
        function Themthanhvien_hogiadinh($mahogiadinh, $mabenhnhan){
            $p=new modelhogiadinh();
            $tblhogiadinh=$p->Themthanhvien_hogiadinh($mahogiadinh, $mabenhnhan);
            if($tblhogiadinh){
                return 1;
            }else{
                return 0;
            }
        }
        function Inserthogiadinh($tenhogiadinh, $diachi, $mabacsi, $quyenchuho,$trangthai){
            $p=new modelhogiadinh();
            $tblhogiadinh=$p->Inserthogiadinh($tenhogiadinh, $diachi, $mabacsi, $quyenchuho,$trangthai);
            if($tblhogiadinh){
                return 1;
            }else{
                return 0;
            }
        }
        function getmabacsibytaikhoan($mataikhoan){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->selectmabacsibytaikhoan($mataikhoan);
            return $tblhogiadinh;
        }
        function xetduyet_hogiadinh($mahogiadinh){
            $p=new modelhogiadinh();
            $tblhogiadinh=$p->xetduyet_hogiadinh($mahogiadinh);
            if($tblhogiadinh){
                return 1;
            }else{
                return 0;
            }
        }
        function gethogiadinhbymabacsi($mabacsi,$trangthai){
            $p = new modelhogiadinh();
            $tblhogiadinh = $p->Selecthogiadinhbymabacsi($mabacsi,$trangthai);
            return $tblhogiadinh;
        }
        function Xoathanhvienhogiadinh($mabenhnhan){
            $p=new modelhogiadinh();
            $tblhogiadinh=$p->Xoathanhvienhogiadinh($mabenhnhan);
            if($tblhogiadinh){
                return 1;
            }else{
                return 0;
            }
        }


       
     }
?>