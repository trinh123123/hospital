<?php
include_once ("Model/mhosokhambenh.php");
    class controlhosokhambenh{
        function ThongTinBacsi($tendangnhap){
            $p = new modelhosokhambenh();
            $tblhosokhambenh = $p->ThongTinBacsi($tendangnhap);
            return $tblhosokhambenh;
        }
        function ThongTinBenhnhan($tendangnhap){
            $p = new modelhosokhambenh();
            $tblhosokhambenh = $p->ThongTinBenhnhan($tendangnhap);
            return $tblhosokhambenh;
        }
        function TimkiemBenhnhan($ten,$mabacsi){
            $p = new modelhosokhambenh();
            $tblhosokhambenh = $p->TimkiemBenhnhan($ten,$mabacsi);
            return $tblhosokhambenh;
        }
        function gethosokhambenhbybenhnhan($mabacsi){
            $p = new modelhosokhambenh();
            $tblhosokhambenh = $p->Selecthosokhambenhbybenhnhan($mabacsi);
            return $tblhosokhambenh;
        }
        function gettaikhoan_mataikhoan($mataikhoan){
            $p = new modelhosokhambenh();
            $tblhosokhambenh = $p->Selecttaikhoan_mataikhoan($mataikhoan);
            return $tblhosokhambenh;
        }
        function getlichkhambymabenhnhan($mabenhnhan){
            $p = new modelhosokhambenh();
            $tbllichkham = $p->Selectlichkhambymabenhnhan($mabenhnhan);
            return $tbllichkham;
        }
        function Timkiemlichkhambymabenhnhan($mabenhnhan,$ngaybatdau,$ngayketthuc){
            $p = new modelhosokhambenh();
            $tbllichkham = $p->Timkiemlichkhambymabenhnhan($mabenhnhan,$ngaybatdau,$ngayketthuc);
            return $tbllichkham;
        }
        function getbenhnhanbymalichkham($malichkham){
            $p = new modelhosokhambenh();
            $tbllichkham = $p->Selectbenhnhanbymalichkham($malichkham);
            return $tbllichkham;
        }
        function gettaikhoanbymabenhnhan($mabenhnhan){
            $p = new modelhosokhambenh();
            $tbllichkham = $p->Selecttaikhoanbymabenhnhan($mabenhnhan);
            return $tbllichkham;
        }
        function getAlldonthuoc(){
            $p = new modelhosokhambenh();
            $tbldonthuoc = $p->SelectAlldonthuoc();
            return $tbldonthuoc;
        }
        function getdonthuoc_thuocvathuoc($madonthuoc){
            $p = new modelhosokhambenh();
            $tbldonthuoc = $p->Selectdonthuoc_thuocvathuoc($madonthuoc);
            return $tbldonthuoc;
        }
        function updatehosokhambenh_madonthuoc($madonthuoc,$chandoan,$malichkham){
            $p=new modelhosokhambenh();
            $kq=$p->updatehosokhambenh_madonthuoc($madonthuoc,$chandoan,$malichkham);
            if($kq){
                return 1;
            }else{
                return 0;
            }
        }
        function getdonthuocbymadonthuoc($madonthuoc){
            $p = new modelhosokhambenh();
            $tbldonthuoc = $p->Selectdonthuocbymadonthuoc($madonthuoc);
            return $tbldonthuoc;
        }
        /////
        function inserttendonthuoc($tendonthuoc){
            $p=new modelhosokhambenh();
            $kq=$p->inserttendonthuoc($tendonthuoc);
            if($kq){
                return 1;
            }else{
                return 0;
            }
        }
        function getdonthuocbytendonthuoc($tendonthuoc){
            $p = new modelhosokhambenh();
            $tbldonthuoc = $p->selectdonthuocbytendonthuoc($tendonthuoc);
            return $tbldonthuoc;
        }
        function insertdonthuoc($madonthuoc,$mathuoc,$donvi,$soluong,$cachdung){
            $p=new modelhosokhambenh();
            $kq=$p->insertdonthuoc($madonthuoc,$mathuoc,$donvi,$soluong,$cachdung);
            if($kq){
                return 1;
            }else{
                return 0;
            }
        }
        function getAllthuoc(){
            $p = new modelhosokhambenh();
            $tbldonthuoc = $p->SelectAllthuoc();
            return $tbldonthuoc;
        }
        function Timkiemtendonthuoc($ten){
            $p = new modelhosokhambenh();
            $tbldonthuoc = $p->Timkiemtendonthuoc($ten);
            return $tbldonthuoc;
        }

        ///////ADMIN
        function gethosokhambenh(){
            $p = new modelhosokhambenh();
            $tblhosokhambenh = $p->Selecthosokhambenh();
            return $tblhosokhambenh;
        }
        function TimkiemlichkhambymabenhnhanAdmin($mabenhnhan,$ten){
            $p = new modelhosokhambenh();
            $tblhosokhambenh = $p->TimkiemlichkhambymabenhnhanAdmin($mabenhnhan,$ten);
            return $tblhosokhambenh;
        }
        function TimkiemBenhnhanAdmin($ten){
            $p = new modelhosokhambenh();
            $tblhosokhambenh = $p->TimkiemBenhnhanAdmin($ten);
            return $tblhosokhambenh;
        }
        function getlichkham(){
            $p = new modelhosokhambenh();
            $tbllichkham = $p->Selectlichkham();
            return $tbllichkham;
        }
        function Timkiemlichkhambymalichkham($ten){
            $p = new modelhosokhambenh();
            $tblhosokhambenh = $p->Timkiemlichkhambymalichkham($ten);
            return $tblhosokhambenh;
        }
        function Timkiemlichkhambyngay($ngaybatdau,$ngayketthuc){
            $p = new modelhosokhambenh();
            $tblhosokhambenh = $p->Timkiemlichkhambyngay($ngaybatdau,$ngayketthuc);
            return $tblhosokhambenh;
        }
        // function gethosokhambenh($mabenhnhan){
        //     $p = new modelhosokhambenh();
        //     $tblhosokhambenh = $p->Selecthosokhambenh($mabenhnhan);
        //     return $tblhosokhambenh;
        // }
        // function gethosokhambenh_bacsi(){
        //     $p = new modelhosokhambenh();
        //     $tblhosokhambenh = $p->Selecthosokhambenh_bacsi();
        //     return $tblhosokhambenh;
        // }
        // function gethosokhambenh_bacsitraloi($mabacsi){
        //     $p = new modelhosokhambenh();
        //     $tblhosokhambenh = $p->Selecthosokhambenh_bacsitraloi($mabacsi);
        //     return $tblhosokhambenh;
        // }
        // function gethosokhambenh1($mahosokhambenh){
        //     $p = new modelhosokhambenh();
        //     $tblhosokhambenh = $p->Selecthosokhambenh1($mahosokhambenh);
        //     return $tblhosokhambenh;
        // }
        // function gethosokhambenh2($mahosokhambenh){
        //     $p = new modelhosokhambenh();
        //     $tblhosokhambenh = $p->Selecthosokhambenh2($mahosokhambenh);
        //     return $tblhosokhambenh;
        // }
        // function Inserthosokhambenh($mabenhnhan, $tieude,$cauhoi){
        //     $p=new modelhosokhambenh();
        //     $tblhosokhambenh=$p->Inserthosokhambenh($mabenhnhan, $tieude,$cauhoi);
        //     if($tblhosokhambenh){
        //         return 1;
        //     }else{
        //         return 0;
        //     }
        // }
        // function deletehosokhambenh($hosokhambenh){
        //     $p = new modelhosokhambenh();
        //     $del = $p->deletehosokhambenh($hosokhambenh);
        //     if($del){
        //         return 1;
        //     }else{
        //         return 0;
        //     }
        // }
        // function updatehosokhambenh_cautraloi($cautraloi,$mahosokhambenh, $mabacsi){
        //     $p=new modelhosokhambenh();
        //     $tblhosokhambenh=$p->updatehosokhambenh_cautraloi($cautraloi,$mahosokhambenh, $mabacsi);
        //     if($tblhosokhambenh){
        //         return 1;
        //     }else{
        //         return 0;
        //     }
        // }
        // function selectmabacsibytaikhoan($mataikhoan){
        //     $p=new modelhosokhambenh();
        //     $tblhosokhambenh=$p->selectmabacsibytaikhoan($mataikhoan);
        //     return $tblhosokhambenh;
        // }
        // function selectmabenhnhanbytaikhoan($mataikhoan){
        //     $p=new modelhosokhambenh();
        //     $tblhosokhambenh=$p->selectmabenhnhanbytaikhoan($mataikhoan);
        //     return $tblhosokhambenh;
        // }
        // function Timkiemhosokhambenh($tieude){
        //     $p = new modelhosokhambenh();
        //     $tblhosokhambenh = $p->Timkiemhosokhambenh($tieude);
        //     return $tblhosokhambenh;
        // }
        // function Timkiemhosokhambenh1($tieude, $mabacsi){
        //     $p = new modelhosokhambenh();
        //     $tblhosokhambenh = $p->Timkiemhosokhambenh1($tieude, $mabacsi);
        //     return $tblhosokhambenh;
        // }
        
        
    }
?>