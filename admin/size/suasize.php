<?php
if(is_array($sua_kich_thuoc)){
    extract($sua_kich_thuoc);
}
?>
<div class="formadd">
  <h1>SỬA SIZE</h1>
<form
      action="trangchuadmin.php?act=updatesize"
      class="dangnhap"
      method="POST"
      enctype="multipart/form-data"
    >
      <p>Tên size</p>
      <input type="hidden" name="id_kich_thuoc" value="<?php if(isset($id_kich_thuoc)&&($id_kich_thuoc>0))echo $id_kich_thuoc;?>">
      <input type="text" name="size" value="<?php if(isset($size)&&($size!="")) echo $size;?>"/><br>
      <input type="submit" value="Sửa mới" name="btn_capnhap" /><br>
      <a href="trangchuadmin.php?act=listsize"><input type="button" value="Danh sách"></a>
    </form>
     <?php 
     if(isset($thong_bao)&&($thong_bao!="")) echo $thong_bao ;?>
</div>