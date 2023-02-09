<?php
include_once ("Model/mlichkham.php");
    class controllichkham{
        function getAlllichkham(){
            $p = new modellichkham();
            $tbllichkham = $p->SelectAlllichkham();
            return $tbllichkham;
        }
        function TimkiemAlllichkham($ten){
            $p = new modellichkham();
            $tbllichkham = $p->TimkiemAlllichkham($ten);
            return $tbllichkham;
        }
        function getlichkhambymalichkham($malichkham){
            $p = new modellichkham();
            $tbllichkham = $p->Selectlichkhambymalichkham($malichkham);
            return $tbllichkham;
        }
        function Updatelichkhambymalichkham($ngaykham,$macakham,$malichkham){
            $p = new modellichkham();
            $tbllichkham = $p->Updatelichkhambymalichkham($ngaykham,$macakham,$malichkham);
            if($tbllichkham){
                return 1;
            }else{
                return 0;
            }
        }
        function Deletelichkham($malichkham){
            $p = new modellichkham();
            $tbllichkham = $p->Deletelichkham($malichkham);
            if($tbllichkham){
                return 1;
            }else{
                return 0;
            }
        }
        function getmabacsi($mataikhoan){
            $p=new modellichkham();
            $tblmabacsi=$p->getmabacsi($mataikhoan);
            return $tblmabacsi;
        }
        function getlichkham($mabacsi){
            $p = new modellichkham();
            $tbllichkham = $p->Selectlichkhambymabacsi($mabacsi);
            return $tbllichkham;
        }
        function Timkiemlichkhambymabacsi($mabacsi,$ten){
            $p = new modellichkham();
            $tbllichkham = $p->Timkiemlichkhambymabacsi($mabacsi,$ten);
            return $tbllichkham;
        }
        function getlichkham1($mabacsi){
            $p = new modellichkham();
            $tbllichkham = $p->Selectlichkhambymabacsi1($mabacsi);
            return $tbllichkham;
        }
        function Timkiemlichkhambymabacsi1($mabacsi,$ten){
            $p = new modellichkham();
            $tbllichkham = $p->Timkiemlichkhambymabacsi1($mabacsi,$ten);
            return $tbllichkham;
        }
        function getlichkham2($mabenhnhan){
            $p = new modellichkham();
            $tbllichkham = $p->Selectlichkhambymabenhnhan2($mabenhnhan);
            return $tbllichkham;
        }
        function Timkiemlichkhambymabacsi2($mabenhnhan,$ten){
            $p = new modellichkham();
            $tbllichkham = $p->Timkiemlichkhambymabacs2($mabenhnhan,$ten);
            return $tbllichkham;
        }
        function Insertlichkham($ngaykham,$cakham,$mabacsi){
            $p=new modellichkham();
            $tbllichkham=$p->Insertlichkham($ngaykham,$cakham,$mabacsi);
            if($tbllichkham){
                return 1;
            }else{
                return 0;
            }
        }
        function getlichtrung($ngaykham,$cakham,$mabacsi){
            $p=new modellichkham();
            $tbllichkham=$p->getlichtrung($ngaykham,$cakham,$mabacsi);
            return $tbllichkham;

        }
        function updatelichkham($comp,$mabenhnhan){
            $p=new modellichkham();
            $kq=$p->updatelichkham($comp,$mabenhnhan);
            if($kq){
                return 1;
            }else{
                return 0;
            }
        }
        function getbenhnhanmtk($mataikhoan){
            $p=new modellichkham();
            $tblmabenhnhan=$p-> getbenhnhanmtk($mataikhoan);
            return $tblmabenhnhan;
        }

        function Deletelichtrong($malichkham){
            $p=new modellichkham();
            $tbllichkham=$p-> Deletelichtrong($malichkham);
            return $tbllichkham;
        }

        function huylich($malichkham){
            $p=new modellichkham();
            $tbllichkham=$p-> huylich($malichkham);
            return $tbllichkham;
        }
         
        function kiemtrathemlich($ngaykham, $macakham, $mabacsi){
            $p=new modellichkham();
            $tbllichkham=$p-> kiemtrathemlich($ngaykham, $macakham, $mabacsi);
            return $tbllichkham;
        }
        function kiemtradatlich($mabenhnhan,$ngaykham, $macakham){
            $p=new modellichkham();
            $tbllichkham=$p-> kiemtradatlich($mabenhnhan,$ngaykham, $macakham);
            return $tbllichkham;
        }
        function getmalichkham($malichkham){
            $p=new modellichkham();
            $tbllichkham=$p-> getmalichkham($malichkham);
            return $tbllichkham;
        }
        function getAlllichkhamBS(){
            $p=new modellichkham();
            $tbllichkham=$p->getAlllichkhamBS();
            return $tbllichkham;
        }
        function TimkiemAlllichkhamBS($ten){
            $p=new modellichkham();
            $tbllichkham=$p->TimkiemAlllichkhamBS($ten);
            return $tbllichkham;
        }
        function getlichkhambymabacsingaykham($mabacsi,$ngaykham){
            $p=new modellichkham();
            $tbllichkham=$p->Selectlichkhambymabacsingaykham($mabacsi,$ngaykham);
            return $tbllichkham;
        }
        function ThongTinBenhnhan($tendangnhap){
            $p=new modellichkham();
            $tbllichkham=$p->ThongTinBenhnhan($tendangnhap);
            return $tbllichkham;
        }
}
