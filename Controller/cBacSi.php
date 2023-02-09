<?php
include_once("Model/mBacSi.php");
class controlBacSi
{
    function getAllBacSi()
    {
        $p = new modelBacSi();
        $tblBacSi = $p->SelectAllBacSi();
        return $tblBacSi;
    }
    function getBacSi($comp)
    {
        $p = new modelBacSi();
        $tblBacSi = $p->SelectBacSi($comp);
        return $tblBacSi;
    }
    function getTaiKhoan($comp)
    {
        $p = new modelBacSi();
        $tblBacSi = $p->SelectTaikhoan($comp);
        return $tblBacSi;
    }
    function ThemBacSi($tendangnhap, $matkhau, $tenbacsi, $hinhanh, $chuyenmon)
    {
        $p = new modelBacSi();
        $ins = $p->InsertBacSi($tendangnhap, $matkhau, $tenbacsi, $hinhanh, $chuyenmon);
        if ($ins) {
            return 1;
        } else {
            return 0;
        }
    }
    // function ThemBacSi($tendangnhap,$matkhau,$tenbacsi,$hinhanh, $chuyenmon, $ID
    // ){
    //     if($type == "image/jpeg" || $type == "image/png"){
    //         if($size <= 2*1024*1024){
    //             if(move_uploaded_file($file, "image/".$name)){                        
    //                 $p = new modelBacSi();
    //                 $ins = $p->InsertBacSi($tendangnhap,$matkhau,$tenbacsi,$hinhanh, $chuyenmon, $name);
    //                 if($ins){
    //                     return 1;
    //                 }else{
    //                     return 0; // Không thể insert
    //                 }
    //             }else{
    //                 return -1; // Không thể upload
    //             }
    //         }else{
    //             return -2; //Size quá lớn
    //         }
    //     }else{
    //         return -3; // Không đúng loại file
    //     }
    // }
    // function InsertTaikhoan($tenDangNhap,$matKhau,$quyen){
    //     $p=new modelBacSi();
    //     $tblTaikhoan=$p->InsertTaikhoan($tenDangNhap,$matKhau,$quyen);
    //     if($tblTaikhoan){
    //         return 1;
    //     }else{
    //         return 0;
    //     }
    // }
    function getTaikhoanbyTenDangNhap($tendangnhap)
    {
        $p = new modelBacSi();
        $tblTaikhoan = $p->getTaikhoanbyTenDangNhap($tendangnhap);
        return $tblTaikhoan;
    }
    function EditBacSi(
        $tenbacsi,
        $file,
        $type,
        $name,
        $size,
        $chuyenmon,
        $ID
    ) {
        $extension = explode(".", $name);
        $file_extension = end($extension);
        $name = rand() . "." . $file_extension;
        if ($name != '') {
            if ($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png") {
                if ($size <= 2 * 1024 * 1024) {
                    if (move_uploaded_file($file, "images/bacsi/" . $name)) {
                        $p = new modelBacSi();
                        $ins = $p->UpdateBacSi($tenbacsi, $name, $chuyenmon, $ID);
                        if ($ins) {
                            return 1;
                        } else {
                            return 0; // Không thể insert
                        }
                    } else {
                        return -1; // Không thể upload
                    }
                } else {
                    return -2; // Size kích thước lớn
                }
            } else {
                return -3; // Không đúng loại file
            }
        } else {
            $p = new modelBacSi();
            $up = $p->UpdateBacSi($tenbacsi, $name, $chuyenmon, $ID);
            if ($up) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    function DeleteBacSi($comp)
    {
        $p = new modelBacSi();
        $del = $p->DeleteBacSi($comp);
        if ($del) {
            return 1;
        } else {
            return 0;
        }
    }
    function DeleteTaikhoan($mataikhoan)
    {
        $p = new modelBacSi();
        $del = $p->DeleteTaikhoan($mataikhoan);
        if ($del) {
            return 1;
        } else {
            return 0;
        }
    }
    function TimkiemBacSi($ten)
    {
        $p = new modelBacSi();
        $tblBacSi = $p->TimkiemBacSi($ten);
        return $tblBacSi;
    }
    function UpdateThongtinbacsi($mabacsi, $tenbacsi, $chuyenmon)
    {
        $p = new modelBacSi();
        $tblBacSi = $p->UpdateThongtinbacsi($mabacsi, $tenbacsi, $chuyenmon);
        if ($tblBacSi) {
            return 1;
        } else {
            return 0;
        }
    }
    function UpdateAnhBacsi($mabacsi, $name, $type, $file, $size)
    {
        $extension = explode(".", $name);
        $file_extension = end($extension);
        $name = rand() . "." . $file_extension;
        if ($name != '') {
            if ($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png") {
                if ($size <= 2 * 1024 * 1024) {
                    if (move_uploaded_file($file, "images/bacsi/" . $name)) {
                        $p = new modelBacSi();
                        $ins = $p->UpdateAnhBacsi($name, $mabacsi);
                        if ($ins) {
                            return 1;
                        } else {
                            return 0; // Không thể insert
                        }
                    } else {
                        return -1; // Không thể upload
                    }
                } else {
                    return -2; // Size kích thước lớn
                }
            } else {
                return -3; // Không đúng loại file
            }
        } else {
            $p = new modelBacSi();

            $up = $p->UpdateAnhBacsi($name, $mabacsi);
            if ($up) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    function getAllTaikhoanbyEmail($email)
    {
        $p = new modelBacSi();
        $tblBacSi = $p->getAllTaikhoanbyEmail($email);
        return $tblBacSi;
    }
    function UpdateEmail($email, $mataikhoan)
    {
        $p = new modelBacSi();
        $tblBacSi = $p->UpdateEmail($email, $mataikhoan);
        if ($tblBacSi) {
            return 1;
        } else {
            return 0;
        }
    }
    function updateqrcodebs($mataikhoan, $qr_images)
    {
        $p = new modelBacSi();

        // $bn = $this -> select_max_mabn();
        // while ($row = mysqli_fetch_array($bn)) {
        // 	$mabn = $row['mabenhnhan'];
        // }

        $tblBacSi = $p->updateqrcodebs($mataikhoan, $qr_images);
        if ($tblBacSi) {
            return 1;
        } else {
            return 0;
        }
    }
}
?>