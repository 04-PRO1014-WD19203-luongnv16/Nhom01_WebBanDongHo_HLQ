<script>
  function error() {
  alert("Bạn có muốn xóa không?");
}
</script>
<div class="list">
        <h1>DANH SÁCH SiZE</h1>
        <table border="1">
        <tr>
        <td class="title">Mã size</td>
              <td class="title">Tên size</td>
              <td class="title">Quản lý </td>
          </tr>
            <?php
            foreach ($listsize as $item) {
                extract($item);
                $suasize="trangchuadmin.php?act=suasize&id=".$id_kich_thuoc;
                $xoasize="trangchuadmin.php?act=xoasize&id=".$id_kich_thuoc;
               
                echo' 
                <tr>
              <td class="title">'.$id_kich_thuoc.'</td>
              <td class="title">'.$size.'</td>
              
              <td class="title"> <a href="'.$suasize.'"><button class="nut">Sửa</button></a
              ><a  href="'.$xoasize.'"><button onclick ="error()" class="nutxoa">Xóa</button></a></td>
            </tr>';
            }
            ?>
           
          </table>
          <a href="trangchuadmin.php?act="><button onclick ="error()" class="nut">Xóa tất cả</button></a>
          <a href="trangchuadmin.php?act=themsize"><input class="nutt" type="button" value="Thêm mới"></a>
          <a href="trangchuadmin.php?act=listxoa"><input class="nutt" type="button" value="Danh mục đã xóa"></a>

          
</div>