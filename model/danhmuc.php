<?php
//thêm danh mục 
function insert_danhmuc($ten_danh_muc){
    $sql="insert into danhmuc(ten_danh_muc) values('$ten_danh_muc')";
    pdo_execute($sql);
}
//xóa danh mục
function delete_danhmuc($id_danh_muc){
    $sql="update danhmuc set trang_thai=1  where id_danh_muc=$id_danh_muc";
    pdo_execute($sql);
}
//danh sách danh mục
function listdanhmuc(){
    $sql="select * from danhmuc where trang_thai=0 order by ten_danh_muc";
    $listdanhmuc=pdo_query($sql);
    return $listdanhmuc;
}
//lấy danh mục
function sua($id_danh_muc){
    $sql="select * from danhmuc where id_danh_muc=$id_danh_muc";
    $result=pdo_query_one($sql);
    return $result;
}
//sửa danh mục 
function update_danhmuc($id_danh_muc,$ten_danh_muc){
    $sql="update danhmuc set ten_danh_muc='".$ten_danh_muc."' where id_danh_muc=".$id_danh_muc;
    pdo_execute($sql);
}

?>