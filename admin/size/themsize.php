<div class="formadd">
  <h1>THÊM SIZE</h1>
<form
      action="trangchuadmin.php?act=themsize"
      class="dangnhap"
      method="POST"
      enctype="multipart/form-data"
    >
      <p>Tên size</p>
      <input type="text" name="size" /><br>
      <?php
      if(isset($er)&&($er!=""))
      echo '<p class="error">'.$er.'</p><br>';
      ?>
      <input type="submit" value="Thêm mới" name="addnew" /><br>
      <input type="reset" value="Nhập lại" name="" /><br>
      <a href="trangchuadmin.php?act=listsize"><input type="button" value="Danh sách"></a>
    </form>
     <?php 
     if(isset($thong_bao)&&($thong_bao!="")) echo $thong_bao ;?>
</div>
