<?php
//đăng ký tài khoản 
    function  insert_taikhoan($ten_tai_khoan,$mat_khau,$email,$sdt,$diachi){
    $sql="INSERT INTO taikhoan(ten_tai_khoan,mat_khau,email,sdt,diachi,vai_tro) VALUES ('$ten_tai_khoan','$mat_khau','$email','$sdt','$diachi','2')";
    pdo_execute($sql);
}
//đăng nhập
    function  dang_nhap($email,$mat_khau){
    $sql="SELECT * FROM taikhoan WHERE email='$email' AND mat_khau='$mat_khau'";
    $result=pdo_query_one($sql);
    return $result;
}
//update tài khoản
function update_tai_khoan($id_tai_khoan,$ten_tai_khoan,$mat_khau,$email,$trang_thai,$sdt,$vai_tro){
    $sql="UPDATE taikhoan SET ten_tai_khoan='$ten_tai_khoan',mat_khau='$mat_khau',email='$email',trang_thai='$trang_thai',sdt='$sdt',vai_tro='$vai_tro' WHERE id_tai_khoan=$id_tai_khoan";
    pdo_execute($sql);
}
//lấy dữ liêu tài khoản 
function taikhoan(){
    $sql="select * from taikhoan";
    $listtaikhoan=pdo_query($sql);
    return $listtaikhoan;
}
// //load 1 tài khoản
// function loadone_taikhoan(){
//     $sql="SELECT * FROM taikhoan order by id desc";
//     $result=pdo_query($sql);
//     return $result;
// }
