<script>
  function error() {
  alert("Bạn có muốn xóa không?");
}
</script>


<div class="list">
<form
      action="trangchuadmin.php?act=loadallproduct"
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
  
    </form>
        <h1>DANH SÁCH SẢN PHẨM</h1>
        <a href="trangchuadmin.php?act=themsanpham"><input class="nutt" type="button" value="Thêm mới"></a>
        <table border="1" style="width: 100%;">
        <tr>
              <td class="title" style="width: 10%;">Mã </td>
              <td class="title"style="width: 20%;">Tên sản phẩm </td>
              <td class="titlesp" style="width: 20%;">Ảnh </td>
              <td class="title" style="width: 30%;">Mô tả </td>
        
              <td class="title" style="width: 10%;">Ngày nhập</td>
            
              <td class="title" style="width: 10%;">Quản lý</td>
          </tr>
            <?php
            foreach ($listProduct as $item) {
                extract($item);
                $chitiet="trangchuadmin.php?act=chitietspadmin&id_san_pham=".$id_san_pham;
                $xoasp="trangchuadmin.php?act=xoasp&id_san_pham=".$id_san_pham;

                $imgpath2="../view/img/".$hinh_anh;
                $imgpath1="../upload/".$hinh_anh;
                if(is_file($imgpath1)){
                  $anh='<img  src="'.$imgpath1.'" alt="">';
                }else if(is_file($imgpath2)){
                  $anh='<img  src="'.$imgpath2.'" alt="">';
                }else{
                  echo $anh="không có ảnh";
                }

                echo' 
                <tr>
              <td class="titlesp" style="width: 10%;">'.$id_san_pham.'</td>
              <td class="titlesp" style="width: 20%;">'.$ten_san_pham.'</td>
              <td class="title" style="width: 20%;"> <img src="../upload/'.$hinh_anh.'" alt="" class="myImage" /></td>

              <td class="titlesp" style="width: 30%;">'.$mo_ta.'</td>
          
       
             

           
              <td class="titlesp" style="width: 10%;">'.$ngay_nhap.'</td>
              

             


              <td class="titlesp" style="width: 10%;"> <a  href="'.$chitiet.'"><button class="nut">Xem chi tiết</button></a> <a  href="'.$xoasp.'"><button onclick ="error()" class="nutxoa">Xóa</button></a></td>
            </tr>';
            }
            ?>
           
          </table>
          <!-- <a href=""><button onclick ="error()" class="nut">Xóa tất cả</button></a> -->
          
          
</div>
