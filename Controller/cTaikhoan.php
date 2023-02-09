<?php
    include('Model/mTaikhoan.php');
     class controlTaikhoan{
         function getAllTaikhoan(){
             $p=new modelTaikhoan();
             $Taikhoan=$p->getAllTaikhoan();
             return $Taikhoan;
         }
         function XuatTaikhoan($tendangnhap,$matkhau){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->XuatTaikhoan($tendangnhap,$matkhau);
            return $tblTaikhoan;
        }
        function InsertTaikhoan($tenDangNhap,$matKhau,$email,$quyen){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->InsertTaikhoan($tenDangNhap,$matKhau,$email,$quyen);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function getTaikhoanbyTenDangNhap($tendangnhap){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->getTaikhoanbyTenDangNhap($tendangnhap);
            return $tblTaikhoan;
        }
        function getTaikhoanbyEmail($email){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->getTaikhoanbyEmail($email);
            return $tblTaikhoan;
        }
        function ThongTinBenhnhan($tendangnhap){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->ThongTinBenhnhan($tendangnhap);
            return $tblTaikhoan;
        }
        function ThongTinBacsi($tendangnhap){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->ThongTinBacsi($tendangnhap);
            return $tblTaikhoan;
        }
        function XuatBacsi(){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->XuatBacsi();
            return $tblTaikhoan;
        }
        function InsertHogiadinh(){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->InsertHogiadinh();
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function UpdateTaikhoan($matkhau,$tendangnhap){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->UpdateTaikhoan($matkhau,$tendangnhap);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function UpdateTendangnhap($tendangnhap,$mataikhoan){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->UpdateTendangnhap($tendangnhap,$mataikhoan);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function UpdateEmail($email,$mataikhoan){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->UpdateEmail($email,$mataikhoan);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function getmaTaikhoan($tendangnhap){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->getmaTaikhoan($tendangnhap);
            return $tblTaikhoan;
        }
        function InsertBenhnhan($tenbenhnhan,$diachi,$sodienthoai,$mataikhoan){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->InsertBenhnhan($tenbenhnhan,$diachi,$sodienthoai,$mataikhoan);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        // function UpdateAnh($fname,$mabenhnhan){
        //     $p=new modelTaikhoan();
        //     $tblTaikhoan=$p->UpdateAnh($fname,$mabenhnhan);
        //     if($tblTaikhoan){
        //         return 1;
        //     }else{
        //         return 0;
        //     }
        // }
        function UpdateThongtincanhan($mataikhoan,$tenbenhnhan,$diachi, $sodienthoai){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->UpdateThongtincanhan($mataikhoan,$tenbenhnhan,$diachi, $sodienthoai);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function XoaAnh($mataikhoan){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->XoaAnh($mataikhoan);
            
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function UpdateThongtinbacsi($mataikhoan,$tenbacsi,$chuyenmon){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->UpdateThongtinbacsi($mataikhoan,$tenbacsi,$chuyenmon);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function UpdateAnh($mataikhoan,$name,$type,$file){
            $extension =explode(".",$name);
            $file_extension=end($extension);
            $name=rand().".".$file_extension;
            if($name!=''){
                if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png"){
                    if(move_uploaded_file($file, "images/benhnhan/".$name)){
                        $p=new modelTaikhoan();
                        $ins = $p->UpdateAnh($name,$mataikhoan);                        
                        if($ins){
                            return 1;
                        }else{
                            return 0; // Không thể insert
                        }
                    }else{
                        return -1; // Không thể upload
                    }
                }else{
                    return -2; // Không đúng loại file
                }
            }else{
                $p=new modelTaikhoan();

                    $up = $p->UpdateAnh($name,$mataikhoan);                                
                    if($up){
                        return 1;
                    }else{
                        return 0;
                    }      
            }
        }
        function UpdateAnhBacsi($mataikhoan,$name,$type,$file){
            $extension =explode(".",$name);
            $file_extension=end($extension);
            $name=rand().".".$file_extension;
            if($name!=''){
                if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png"){
                    if(move_uploaded_file($file, "images/bacsi/".$name)){
                        $p=new modelTaikhoan();
                        $ins = $p->UpdateAnhBacsi($name,$mataikhoan);                        
                        if($ins){
                            return 1;
                        }else{
                            return 0; // Không thể insert
                        }
                    }else{
                        return -1; // Không thể upload
                    }
                }else{
                    return -2; // Không đúng loại file
                }
            }else{
                $p=new modelTaikhoan();

                    $up = $p->UpdateAnhBacsi($name,$mataikhoan);                                
                    if($up){
                        return 1;
                    }else{
                        return 0;
                    }      
            }
        }
        function Insertbacsi($mataikhoan,$hoten,$chuyenmon){
            $p=new modelTaikhoan();
            $tblBs=$p->Insertbacsi($mataikhoan,$hoten,$chuyenmon);
            if($tblBs){
                return 1;
            }else{
                return 0;
            }
        }
        function Khoiphuc($mataikhoan){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->Khoiphuc($mataikhoan);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function Timkiemnguoidung($ten){
            $p = new modelTaikhoan();
            $tblTaikhoan = $p->Timkiemnguoidung($ten);
            return $tblTaikhoan;
        }
        function getAllnguoidung(){
            $p = new modelTaikhoan();
            $tblTaikhoan = $p->SelectAllnguoidung();
            return $tblTaikhoan;
        }
        // function insertthuoc($tenthuoc,$thongtinthuoc){
        //     $p = new modelTaikhoan();
        //     $tblTaikhoan = $p->insertthuoc($tenthuoc,$thongtinthuoc);
        //     if($tblTaikhoan){
        //         return 1;
        //     }else{
        //         return 0;
        //     }
        // }
        // Google Login
        function InsertTaikhoanGG($name,$email,$quyen){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->InsertTaikhoanGG($name,$email,$quyen);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function getAllTaikhoanbyEmail($email){
            $p = new modelTaikhoan();
            $tblTaikhoan = $p->getAllTaikhoanbyEmail($email);
            return $tblTaikhoan;
        }
        function InsertBenhnhanGG($tenbenhnhan,$hinh,$mataikhoan){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->InsertBenhnhanGG($tenbenhnhan,$hinh,$mataikhoan);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        // Login FB
        function InsertTaikhoanFB($name,$id_fb,$quyen){
            $p=new modelTaikhoan();
            $tblTaikhoan=$p->InsertTaikhoanFB($name,$id_fb,$quyen);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function getAllTaikhoanbyid_fb($id_fb){
            $p = new modelTaikhoan();
            $tblTaikhoan = $p->getAllTaikhoanbyid_fb($id_fb);
            return $tblTaikhoan;
        }
        //pr code
        // function select_max_mabn(){
        //     $p=new modelTaikhoan();
        //     $tblTaikhoan=$p->select_max_mabn();
        //     return $tblTaikhoan;
        // }
        function updateqrcode($mataikhoan,$qr_images){
            $p=new modelTaikhoan();

            // $bn = $this -> select_max_mabn();
			// while ($row = mysqli_fetch_array($bn)) {
			// 	$mabn = $row['mabenhnhan'];
			// }

            $tblTaikhoan=$p->updateqrcode($mataikhoan,$qr_images);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
        function updateqrcodebs($mataikhoan,$qr_images){
            $p=new modelTaikhoan();

            // $bn = $this -> select_max_mabn();
			// while ($row = mysqli_fetch_array($bn)) {
			// 	$mabn = $row['mabenhnhan'];
			// }

            $tblTaikhoan=$p->updateqrcodebs($mataikhoan,$qr_images);
            if($tblTaikhoan){
                return 1;
            }else{
                return 0;
            }
        }
    }
?>