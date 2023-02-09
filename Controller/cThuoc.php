<?php
    include_once ("Model/mThuoc.php");
    class controlThuoc{
        function getAllthuoc(){
            $p = new modelThuoc();
            $tblThuoc = $p->SelectAllthuoc();
            return $tblThuoc;
        }
        function getThuocbyTenThuoc($tenthuoc){
            $p = new modelThuoc();
            $tblThuoc = $p->getThuocbyTenThuoc($tenthuoc);
            return $tblThuoc;
        }
        function getThuoc($mathuoc){
            $p = new modelThuoc();
            $tblThuoc = $p->getThuoc($mathuoc);
            return $tblThuoc;
        }
        function insertthuoc($tenthuoc,$thongtinthuoc){
            $p = new modelThuoc();
            $tblThuoc = $p->insertthuoc($tenthuoc,$thongtinthuoc);
            if($tblThuoc){
                return 1;
            }else{
                return 0;
            }
        }
        function Timkiemthuoc($ten){
            $p = new modelThuoc();
            $tblThuoc = $p->Timkiemthuoc($ten);
            return $tblThuoc;
        }
        function updatethuoc($thongtinthuoc,$mathuoc){
            $p=new modelThuoc();
            $tblThuoc=$p->updatethuoc($thongtinthuoc,$mathuoc);
            if($tblThuoc){
                return 1;
            }else{
                return 0;
            }
        }
        function DeleteThuoc($mathuoc){
            $p=new modelThuoc();
            $tblThuoc=$p->DeleteThuoc($mathuoc);
            if($tblThuoc){
                return 1;
            }else{
                return 0;
            }
        }
    }
?>