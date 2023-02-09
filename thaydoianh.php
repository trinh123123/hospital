<?php 
session_start();
    
?>
<?php
    
    include './Controller/cTaikhoan.php';
    $p=new controlTaikhoan();
    $tendangnhap = $_SESSION['tendangnhap'];
    $tblmataikhoan = $p->getmaTaikhoan($tendangnhap);
    $mataikhoan=mysqli_fetch_assoc($tblmataikhoan);
    

    if(isset($_REQUEST["change_image"])){
        
        $file = $_FILES["image"]["tmp_name"];
        $type = $_FILES["image"]["type"];
        $name = $_FILES["image"]["name"];
        //$size = $_FILES["txthinh"]["size"];
        $p=new controlTaikhoan();
        if($_SESSION['quyen']==0){
            $tblmataikhoan=$p->ThongTinBenhnhan($tendangnhap);//executeSingLesult($sql)
            $dsbenhnhan=mysqli_fetch_assoc($tblmataikhoan);
            $anh=$dsbenhnhan['hinhanh'];
            $kq = $p->UpdateAnh($mataikhoan['mataikhoan'],$name,$type,$file);
            if($kq == 1){
                if(file_exists('./images/benhnhan/'.$anh)){
                    unlink('./images/benhnhan/'.$anh);
                }
                echo '<script>
                    alert("Cập nhật ảnh thành công");
                    window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                    </script>';
            }elseif($kq == 0){
                echo '<script>
                    alert("Cập nhật ảnh thất bại");
                    window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                    </script>';
            }elseif($kq == -2){
                echo '<script>
                    alert("Sai định dạng");
                    window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                    </script>';
            }elseif($kq == -1){
                echo '<script>
                    alert("Không thể upload");
                    window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                    </script>';
            }else{
                echo "Lỗi";
            }
        }elseif($_SESSION['quyen']==1){
            // $tendangnhap = $_SESSION['tendangnhap'];
            $tblmataikhoan=$p->ThongTinBacsi($tendangnhap);//executeSingLesult($sql)
            $dsbacsi=mysqli_fetch_assoc($tblmataikhoan);
            $anh=$dsbacsi['hinhanh'];
            
            $kq = $p->UpdateAnhBacsi($mataikhoan['mataikhoan'],$name,$type,$file);
            if($kq == 1){
                if (file_exists('./images/bacsi/'.$anh)) {
                    unlink('./images/bacsi/'.$anh);
                }    
                echo '<script>
                    alert("Cập nhật ảnh thành công");
                    window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                    </script>';
            }elseif($kq == 0){
                echo '<script>
                    alert("Cập nhật ảnh thất bại");
                    window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                    </script>';
            }elseif($kq == -2){
                echo '<script>
                    alert("Sai định dạng");
                    window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                    </script>';
            }elseif($kq == -1){
                echo '<script>
                    alert("Không thể upload");
                    window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                    </script>';
            }else{
                echo "Lỗi";
            }
        }
        
    }
    if(isset($_REQUEST["xoa_image"])){
        // $tendangnhap = $_SESSION['tendangnhap'];
        if($_SESSION['quyen']==0){
            $tblmataikhoan=$p->ThongTinBenhnhan($tendangnhap);//executeSingLesult($sql)
            $dsbenhnhan=mysqli_fetch_assoc($tblmataikhoan);
           //echo array($dsbenhnhan['hinhanh']);
            if(file_exists('./images/benhnhan/'.$dsbenhnhan['hinhanh'])){
                if(unlink('./images/benhnhan/'.$dsbenhnhan['hinhanh'])){
                    $kq = $p->XoaAnh($mataikhoan['mataikhoan']);
                    if($kq == 1){
                        echo '<script>
                            alert("Xóa ảnh thành công");
                            window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                            </script>';
                    }elseif($kq == 0){
                        echo '<script>
                            alert("Xóa ảnh thất bại");
                            window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                            </script>';
                    }else{
                        echo "Lỗi";
                    }
                }
            }
            else{
                $tblmatkhau=$p->ThongTinBenhnhan($_SESSION['tendangnhap']);
                $matkhau=mysqli_fetch_assoc($tblmatkhau);
                if(isset($matkhau)){
                    $kq = $p->XoaAnh($mataikhoan['mataikhoan']);
                    if($kq == 1){
                        echo '<script>
                            alert("Xóa ảnh thành công");
                            window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                            </script>';
                    }elseif($kq == 0){
                        echo '<script>
                            alert("Xóa ảnh thất bại");
                            window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                            </script>';
                    }else{
                        echo "Lỗi";
                    }
                }else
                echo '<script>
                    alert("Bạn chưa đặt ảnh đại diện");
                    window.location.href="thongtinbenhnhan.php?pagetrang=thongtin";
                    </script>';
               
            }
            
        }elseif($_SESSION['quyen']==1){
            $tendangnhap = $_SESSION['tendangnhap'];
            $tblmataikhoan=$p->ThongTinBacsi($tendangnhap);//executeSingLesult($sql)
            $dsbacsi=mysqli_fetch_assoc($tblmataikhoan);
            //$path='./images/bacsi/'.$dsbacsi['hinhanh'];
            // $kq = $p->XoaAnh($mataikhoan['mataikhoan']);
            $anh=$dsbacsi['hinhanh'];
            if(file_exists('images/bacsi/'.$dsbacsi['hinhanh'])){
                if(unlink('./images/bacsi/'.$dsbacsi['hinhanh'])){
                    $kq = $p->XoaAnh($mataikhoan['mataikhoan']);
                    if($kq == 1){
                        echo '<script>
                            alert("Xóa ảnh thành công");
                            window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                            </script>';
                    }elseif($kq == 0){
                        echo '<script>
                            alert("Xóa ảnh thất bại");
                            window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                            </script>';
                    }else{
                        echo "Lỗi";
                    }
                }
            }
            else{
                
                echo '<script>
                    alert("Bạn chưa đặt ảnh đại diện");
                    window.location.href="thongtinbacsi.php?pagetrang=thongtin";
                    </script>';
               
            }
            
        }
    }
?>
