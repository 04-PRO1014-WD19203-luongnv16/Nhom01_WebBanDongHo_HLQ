<?php
if(is_array($sua_danh_muc)){
    extract($sua_danh_muc);
}
?>
<div class="formadd">
  <h1>SỬA DANH MỤC</h1>
<form
      action="trangchuadmin.php?act=updatedanhmuc"
      class="dangnhap"
      method="POST"
      enctype="multipart/form-data"
    >
      <p>Tên danh mục</p>
      <input type="hidden" name="id_danh_muc" value="<?php if(isset($id_danh_muc)&&($id_danh_muc>0))echo $id_danh_muc;?>">
      <input type="text" name="ten_danh_muc" value="<?php if(isset($ten_danh_muc)&&($ten_danh_muc!="")) echo $ten_danh_muc;?>"/><br>
      <input type="submit" value="Sửa mới" name="btn_capnhap" /><br>
      <a href="trangchuadmin.php?act=listdanhmuc"><input type="button" value="Danh sách"></a>
    </form>
     <?php 
     if(isset($thong_bao)&&($thong_bao!="")) echo $thong_bao ;?>
</div>