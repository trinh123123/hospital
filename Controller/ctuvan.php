<?php
include_once ("Model/mtuvan.php");
    class controltuvan{
        function getAlltuvan(){
            $p = new modeltuvan();
            $tbltuvan = $p->SelectAlltuvan();
            return $tbltuvan;
        }
        function gettaikhoan_mataikhoan($mataikhoan){
            $p = new modeltuvan();
            $tbltuvan = $p->gettaikhoan_mataikhoan($mataikhoan);
            return $tbltuvan;
        }
        function gettuvan($mabenhnhan){
            $p = new modeltuvan();
            $tbltuvan = $p->Selecttuvan($mabenhnhan);
            return $tbltuvan;
        }
        function gettuvan_bacsi(){
            $p = new modeltuvan();
            $tbltuvan = $p->Selecttuvan_bacsi();
            return $tbltuvan;
        }
        function gettuvan_bacsitraloi($mabacsi){
            $p = new modeltuvan();
            $tbltuvan = $p->Selecttuvan_bacsitraloi($mabacsi);
            return $tbltuvan;
        }
        function gettuvan1($matuvan){
            $p = new modeltuvan();
            $tbltuvan = $p->Selecttuvan1($matuvan);
            return $tbltuvan;
        }
        function gettuvan2($matuvan){
            $p = new modeltuvan();
            $tbltuvan = $p->Selecttuvan2($matuvan);
            return $tbltuvan;
        }
        function Inserttuvan($mabenhnhan, $tieude,$cauhoi){
            $p=new modeltuvan();
            $tbltuvan=$p->Inserttuvan($mabenhnhan, $tieude,$cauhoi);
            if($tbltuvan){
                return 1;
            }else{
                return 0;
            }
        }
        function deletetuvan($tuvan){
            $p = new modeltuvan();
            $del = $p->deletetuvan($tuvan);
            if($del){
                return 1;
            }else{
                return 0;
            }
        }
        function updatetuvan_cautraloi($cautraloi,$matuvan, $mabacsi){
            $p=new modeltuvan();
            $tbltuvan=$p->updatetuvan_cautraloi($cautraloi,$matuvan, $mabacsi);
            if($tbltuvan){
                return 1;
            }else{
                return 0;
            }
        }
        function selectmabacsibytaikhoan($mataikhoan){
            $p=new modeltuvan();
            $tbltuvan=$p->selectmabacsibytaikhoan($mataikhoan);
            return $tbltuvan;
        }
        function selectmabenhnhanbytaikhoan($mataikhoan){
            $p=new modeltuvan();
            $tbltuvan=$p->selectmabenhnhanbytaikhoan($mataikhoan);
            return $tbltuvan;
        }
        function Timkiemtuvan($tieude){
            $p = new modeltuvan();
            $tbltuvan = $p->Timkiemtuvan($tieude);
            return $tbltuvan;
        }
        function Timkiemtuvan1($tieude, $mabacsi){
            $p = new modeltuvan();
            $tbltuvan = $p->Timkiemtuvan1($tieude, $mabacsi);
            return $tbltuvan;
        }
        
        
    }
?>