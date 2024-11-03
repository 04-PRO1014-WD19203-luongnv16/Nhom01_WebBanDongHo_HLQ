<?php
//thêm sản phẩm 
    function insert_sanpham($ten_san_pham,$hinh_anh,$mo_ta,$ngay_nhap,$id_danh_muc,){
    $sql = "insert into sanpham (ten_san_pham,hinh_anh,mo_ta,ngay_nhap,id_danh_muc) values ('$ten_san_pham','$hinh_anh','$mo_ta','$ngay_nhap','$id_danh_muc')";
    pdo_execute($sql);
    }
//tìm id sản phẩm 
function idProduct(){
    $sql = "SELECT MAX(id_san_pham) AS max_id_san_pham FROM sanpham";
    $result = pdo_query($sql);
    if (!empty($result)) {
        $idSearch = $result[0]['max_id_san_pham'];
        return $idSearch;
    }
    return null; // Trả về null nếu không có kết quả
}
//thêm biến thể
function insert_bien_the($id_san_pham,$id_kich_thuoc, $gia_nhap,$gia_ban,$so_luong){
    $sql = "INSERT INTO bien_the (id_san_pham,id_kich_thuoc,gia_nhap,gia_ban,so_luong) VALUES ('$id_san_pham','$id_kich_thuoc','$gia_nhap','$gia_ban','$so_luong')";
    pdo_execute($sql);
}

//xóa sản phẩm
function delete_sanpham($id_san_pham){
    $sql = "UPDATE sanpham 
    JOIN bien_the ON bien_the.id_san_pham = sanpham.id_san_pham 
    SET sanpham.trang_thai = 1 
    WHERE sanpham.id_san_pham = $id_san_pham";
    pdo_execute($sql);
}
//xóa 
function delete_sanpham_by_bien_the($id_bien_the) {
    $sql = "UPDATE sanpham 
    JOIN bien_the ON bien_the.id_san_pham = sanpham.id_san_pham 
    SET sanpham.trang_thai = 1 
    WHERE bien_the.id_bien_the = $id_bien_the";
    pdo_execute($sql);
}

//danh sách sản phẩm 
function listsanpham(){
    $sql="SELECT * FROM sanpham WHERE trang_thai=0";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }
//danh một sản phẩm 
function suasp($id_san_pham){
    $sql="SELECT * from sanpham where id_san_pham=".$id_san_pham;
    $sanpham=pdo_query_one($sql);
    return $sanpham; 
}
//update sản phẩm 
function update_sanpham($id_san_pham,$ten_san_pham,$hinh_anh,$mo_ta,$gia,$ngay_nhap,$id_danh_muc,){
    if($hinh_anh!="")
    $sql="update sanpham set  ten_san_pham='".$ten_san_pham."',hinh_anh='".$hinh_anh."',mo_ta='".$mo_ta."',gia='".$gia."',ngay_nhap='".$ngay_nhap."',id_danh_muc='".$id_danh_muc."' where id_san_pham=".$id_san_pham;
else
    $sql="update sanpham set ten_san_pham='".$ten_san_pham."',mo_ta='".$mo_ta."',gia='".$gia."',ngay_nhap='".$ngay_nhap."',id_danh_muc='".$id_danh_muc."' where id_san_pham=".$id_san_pham;
    pdo_execute($sql);
}
//kích thước 
function listkichthuoc() {
    $sql="select * from kichthuoc ";
    $listkichthuoc=pdo_query($sql);
    return $listkichthuoc;
}
//thêm size
function  insert_size($size){
    $sql="insert into kichthuoc(size) values('$size')";
    pdo_execute($sql);
}
//xóa size
function delete_kichthuoc($id_kich_thuoc){
    $sql="delete from kichthuoc   where id_kich_thuoc=$id_kich_thuoc";
    pdo_execute($sql);
}
//lấy size
function suasize($id_kich_thuoc){
    $sql="select * from kichthuoc where id_kich_thuoc=$id_kich_thuoc";
    $result=pdo_query_one($sql);
    return $result;
}
//sửa size
function update_kichthuoc($id_kich_thuoc,$size){
    $sql="update kichthuoc set size='".$size."' where id_kich_thuoc=".$id_kich_thuoc;
    pdo_execute($sql);
}

//bộ lọc lấy từng danh mục
function loadallsp_iddm($key,$id){
    $sql="select*from sanpham p join danhmuc c on p.id_danh_muc= c.id_danh_muc where  1 and p.trang_thai= 0 and  c.trang_thai= 0";
    if($key!=""){
        $sql.=" and ten_san_pham like '%".$key."%'";    }
    if($id>0){
        $sql.=" and p.id_danh_muc = '".$id."'";    }
    $listallsp=pdo_query($sql);
    return $listallsp;
}
//lấy sản phẩm ra user
function loadallsp_home($id_san_pham){
    $sql="select*from sanpham p join danhmuc c on p.id_danh_muc= c.id_danh_muc  where p.trang_thai= 0 and  c.trang_thai= 0 limit ".$id_san_pham;
    $listallsp=pdo_query($sql);
    return $listallsp;
}
//lấy sản phẩm mới nhất 
function loadallsp_new(){
    $sql="SELECT * FROM sanpham p JOIN danhmuc c ON p.id_danh_muc = c.id_danh_muc join bien_the on bien_the.id_san_pham=p.id_san_pham  WHERE p.trang_thai= 0 and  c.trang_thai= 0 ORDER BY p.id_san_pham DESC";
    $listallsp = pdo_query($sql);
    return $listallsp;
}
//lấy một sản phẩm
function loadonesp($id){
    $sql="select*from sanpham p join danhmuc c on p.id_danh_muc= c.id_danh_muc join bien_the on bien_the.id_san_pham=p.id_san_pham join kichthuoc on kichthuoc.id_kich_thuoc=bien_The.id_kich_thuoc  where  p.trang_thai= 0 and  c.trang_thai= 0 and p.id_san_pham= " .$id;
    $sp=pdo_query_one($sql);
    return $sp;
}
//tăng lượt xem
function tang_view($id){
    $sql="update sanpham set luot_xem= luot_xem+1 where id_san_pham=".$id;
    pdo_execute($sql);
}
//sản phẩm cùng loại
function loadsp_cung_loai($id_san_pham,$id_danh_muc){
    $sql="select*from sanpham p join danhmuc c on p.id_danh_muc= c.id_danh_muc where  p.trang_thai= 0 and  c.trang_thai= 0 and c.id_danh_muc=".$id_danh_muc." and p.id_san_pham <> " .$id_san_pham;
    $listallsp=pdo_query($sql);
    return $listallsp;
}
//tìm kiếm sản phẩm
function timkiem($key){
    $sql="select *from sanpham where ten_san_pham like '%$key%'" ;
    $one=pdo_query($sql);
    return $one;
}

function coultProduct($id_san_pham) {
    $sql = "SELECT COUNT(*) AS count FROM bien_the WHERE id_san_pham = ?";
    $result = pdo_query($sql, $id_san_pham);
    return $result[0]['count'];
}

function getVariants($id_san_pham) {
    $sql = "SELECT * FROM bien_the WHERE id_san_pham = ?";
    return pdo_query($sql, $id_san_pham);
}

//LẤY 1 sản phẩm 
function loadOneProduct($id_san_pham) {
    $sql="SELECT * FROM sanpham WHERE id_san_pham=$id_san_pham ";
    $loadOneProduct=pdo_query($sql);
    return $loadOneProduct;

}
//lấy 1 biến thể 
function loadOneBienThe($id_bien_the){
    $sql= "SELECT * FROM bien_the WHERE id_bien_the=$id_bien_the LIMIT 1 ";
    $loadOneBienThe=pdo_query($sql);
    return $loadOneBienThe;
}

//update sản phẩm
function updateProduct($id_san_pham,$ten_san_pham,$mo_ta){
    $sql= "UPDATE sanpham SET ten_san_pham='$ten_san_pham', mo_ta='$mo_ta' WHERE id_san_pham=$id_san_pham";
    pdo_execute($sql);
}
//update biến thể 
function updateBienThe($id_bien_the,$id_kich_thuoc,$gia_nhap,$gia_ban,$so_luong){
    $sql= "UPDATE bien_the SET id_kich_thuoc=$id_kich_thuoc,gia_nhap=$gia_nhap,gia_ban=$gia_ban,so_luong=$so_luong WHERE id_bien_the=$id_bien_the ";
    pdo_execute($sql);
}
//lấy tất cả sản phẩm
function listAllProduct(){
    $sql= "SELECT * FROM sanpham";
    $loadOneProduct=pdo_query($sql);
    return $loadOneProduct;
}
//lấy tất cả kích thước
function listAllKichThuoc(){
    $sql= "SELECT * FROM kichthuoc";
    $loadOneKichThuoc=pdo_query($sql);
    return $loadOneKichThuoc;
}
//lấy danh 
function listProduct(){
    $sql= "SELECT * FROM sanpham where trang_thai=0";
    $listProduct =pdo_query($sql);
    return $listProduct;
}
function showProduct(){
    $sql= "SELECT * FROM sanpham WHERE trang_thai=0";
    $showProduct=pdo_query($sql);
    return $showProduct;
}
//lấy 1 sản phẩm chi tiết
function spchitietadmin($id_san_pham){
    $sql="select * from bien_the where id_san_pham=".$id_san_pham;
    $showspshitiet=pdo_query($sql);
    return $showspshitiet;
}
//Xóa biến thể
function xoa_bienthe($id_bien_the){
    $sql="delete from bien_the where id_bien_the=$id_bien_the";
    pdo_execute($sql);
}
//lấy biến thể ra bảng chi tiết 
function getVariantsWithSize($id_san_pham) {
    $sql = "SELECT bien_the.id_bien_the, kichthuoc.id_kich_thuoc, kichthuoc.size, bien_the.gia_nhap, bien_the.gia_ban, bien_the.so_luong 
            FROM bien_the 
            JOIN kichthuoc ON bien_the.id_kich_thuoc = kichthuoc.id_kich_thuoc
            WHERE bien_the.id_san_pham = ?";
    return pdo_query($sql, $id_san_pham);
}


function listBienTheOrderSanPham($id_san_pham){
    $sql="SELECT * FROM bien_the WHERE id_san_pham=$id_san_pham";
    $listBienTheOrderSanPham= pdo_query($sql);
    return $listBienTheOrderSanPham;
}
function sanPhamOrderBill($id_san_pham){
    $sql="SELECT * FROM sanpham WHERE id_san_pham=$id_san_pham LIMIT 1";
    $sanPhamOrderBill=pdo_query($sql);
    return $sanPhamOrderBill;
}
?>
