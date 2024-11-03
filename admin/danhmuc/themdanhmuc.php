<div class="formadd">
  <h1>THÊM DANH MỤC</h1>
<form
      action="trangchuadmin.php?act=themdanhmuc"
      class="dangnhap"
      method="POST"
      enctype="multipart/form-data"
    >
      <p>Tên danh mục</p>
      <input type="text" name="ten_danh_muc" /><br>
      <?php
      if(isset($er)&&($er!=""))
      echo '<p class="error">'.$er.'</p><br>';
      ?>
      <input type="submit" value="Thêm mới" name="addnew" /><br>
      <input type="reset" value="Nhập lại" name="" /><br>
      <a href="trangchuadmin.php?act=listdanhmuc"><input type="button" value="Danh sách"></a>
    </form>
     <?php 
     if(isset($thong_bao)&&($thong_bao!="")) echo $thong_bao ;?>
</div>
