<script>
  function error() {
  alert("Bạn có muốn xóa không?");
}
</script>


<div class="list">
<form
      action="trangchuadmin.php?act=listsanpham"
      class="dangnhap"
      method="POST"
      enctype="multipart/form-data"
    >
      
      <!-- <input type="text" name="keyw" /><br>
      <select name="loai">
        <option value="0">All</option>
        <?php
      foreach ($listdanhmuc as $item) {
                extract($item);
      echo '<option value="'.$id_danh_muc.'">'.$ten_danh_muc.'</option>';
        
      }?>
      </select>
      <input type="submit" value="Go" name="dsfsdf" /><br> -->
  
 
        <h1>DANH SÁCH SẢN PHẨM</h1>
        <table border="1">
        <tr>
              <td class="title">Mã </td>
              <td class="title">Tên sản phẩm </td>
              <td class="titlesp">Ảnh </td>
              <td class="title">Mô tả </td>
              <td class="title">Gía nhập</td>
              <td class="title">Gía bán</td>
              <td class="title"> Lượt xem</td>
              <td class="title">Số lượng </td>
              <td class="title">Ngày</td>
              <td class="title">Loại</td>
              <td class="title">Quản lý</td>
          </tr>
            <?php
            foreach ($listsanpham as $item) {
                extract($item);
                // $suasp="trangchuadmin.php?act=suasp&id=".$id_san_pham && $id_bien_the;
                $xoasp="trangchuadmin.php?act=xoasp&id=".$id_san_pham;

                $imgpath2="../view/img/".$hinh_anh;
                $imgpath1="../upload/".$hinh_anh;
                if(is_file($imgpath1)){
                  $anh='<img  src="'.$imgpath1.'" alt="">';
                }else if(is_file($imgpath2)){
                  $anh='<img  src="'.$imgpath2.'" alt="">';
                }else{
                  echo $anh="không có ảnh";
                }

                ?>
                <tr>
              <td class="titlesp"><?=$id_san_pham?>
            </td>
              <td class="titlesp"><?=$ten_san_pham?></td>
              <td class="title"> <img src="../upload/'.$hinh_anh.'" alt="" id="myImage" /></td>

              <td class="titlesp"><?=$mo_ta?></td>
              <td class="titlesp"><?=$gia_nhap?></td>
              <td class="titlesp"><?=$gia_ban?></td>
              <td class="titlesp"><?=$luot_xem?></td>

              <td class="titlesp"><?=$so_luong?></td>
              <td class="titlesp"><?=$ngay_nhap?></td>
              

              <td class="titlesp"><?=$ten_danh_muc?></td>


              <td class="titlesp"> 
                <a href="trangchuadmin.php?act=suasp&&id_san_pham=<?=$id_san_pham?>&&id_bien_the=<?=$id_bien_the?>">SUA</a>
              </td>
            </tr>
            <?php
            }
            ?>
           
          </table>
          <a href=""><button onclick ="error()" class="nut">Xóa tất cả</button></a><a href="trangchuadmin.php?act=themsanpham"><input class="nutt" type="button" value="Thêm mới"></a>
          
</div>
</form>
<script>
      // Lấy thẻ img bằng id
      var img = document.getElementById("myImage");

      // Chỉnh kích thước ảnh
      img.style.width = "20%"; // Đặt chiều rộng mới
      img.style.height = "20%"; // Đặt chiều cao mới
    </script> 