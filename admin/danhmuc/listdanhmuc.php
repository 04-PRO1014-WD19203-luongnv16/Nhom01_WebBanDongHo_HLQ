<script>
  function error() {
  alert("Bạn có muốn xóa không?");
}
</script>
<div class="list">
        <h1>DANH SÁCH DANH MỤC</h1>
        <table border="1">
        <tr>
        <td class="title">Mã danh mục</td>
              <td class="title">Tên danh mục</td>
              <td class="title">Quản lý </td>
          </tr>
            <?php
            foreach ($listdanhmuc as $item) {
                extract($item);
                $suadm="trangchuadmin.php?act=suadanhmuc&id=".$id_danh_muc;
                $xoadm="trangchuadmin.php?act=xoadanhmuc&id=".$id_danh_muc;
               
                echo' 
                <tr>
              <td class="title">'.$id_danh_muc.'</td>
              <td class="title">'.$ten_danh_muc.'</td>
              
              <td class="title"> <a href="'.$suadm.'"><button class="nut">Sửa</button></a
              ><a  href="'.$xoadm.'"><button onclick ="error()" class="nutxoa">Xóa</button></a></td>
            </tr>';
            }
            ?>
           
          </table>
          <!-- <a href="trangchuadmin.php?act="><button onclick ="error()" class="nut">Xóa tất cả</button></a> -->
         <div class="hihi">
         <a href="trangchuadmin.php?act=themdanhmuc"><input class="nutt" type="button" value="Thêm mới"></a>
         <a href="trangchuadmin.php?act=listxoa"><input class="nutt" type="button" value="Danh mục đã xóa"></a>
         </div>

          
</div>