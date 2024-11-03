
<div class="formadd">
  <h1>SỬA SẢN PHẨM</h1>

    
    <?php
    foreach ($loadOneProduct as $oneProduct) {
        extract($oneProduct);
        ?>
        <form action="trangchuadmin.php?act=updatesp" method="post">
        <p>Tên sản phẩm</p>
            <input type="text" name="ten_san_pham" id="" value="<?=$ten_san_pham?>" >
            <p>Thông tin sản phẩm </p>
           
            <textarea type="text" name="mo_ta"cols="75" rows="10" ><?= $mo_ta?></textarea>
        <?php
    }
    foreach ($loadOneBienThe as $oneBienThe) {
        extract($oneBienThe);
        ?>
       
            <input type="hidden" name="id_bien_the" id="" value="<?=$id_bien_the?>" readonly>
         
            <input type="hidden" name="id_san_pham" id="" value="<?=$id_san_pham?>" readonly>
            <p>Ngày nhập sản phẩm</p>
            <input type="date" name="ngay_nhap" value="<?= $ngay_nhap?>" />
            <p>Giá nhập</p>
            <input type="number" name="gia_nhap" id="" value="<?=$gia_nhap?>">
            <p>Giá bán</p>
            <input type="number" name="gia_ban" id="" value="<?=$gia_ban?>">
            <p>Số lượng sản phẩm</p>
            <input type="number" name="so_luong" id="" value="<?=$so_luong?>">
            <p>Loại kích thước</p>
        <select name="id_kich_thuoc">
                <?php
                foreach ($listAllKichThuoc as $allKichThuoc) {
                    extract($allKichThuoc);
                    if ($allKichThuoc['id_kich_thuoc'] == $id_kich_thuoc) {
                        echo '<option value="' . $id_kich_thuoc. '" selected>' . $size . '</option>';
                    } else {
                        echo '<option value="' . $id_kich_thuoc . '">' . $size . '</option>';
                        }
                    }
                ?>
            </select>
        <p>Thương hiệu</p>
      <select name="loai">
      <?php
      foreach ($listdanhmuc as $item) {
        extract($item);
        if($item['id_danh_muc']==$sua_san_pham['id_danh_muc']) $tendm="selected";
        else $tendm=""; 
      echo'<option  value="'.$id_danh_muc.'"'.$tendm.'>'.$ten_danh_muc.'</option>';
      
        
      }?>
      </select>
           
       
            <a href="trangchuadmin.php?act=updatesp&&id_san_pham=<?=$id_san_pham?>&&id_bien_the=<?=$id_bien_the?>">
                <input class="addVariantRow" type="submit" value="Sửa sản phẩm" name="btn_capnhap">
            </a>
        
        </form>
        <?php
    }
    ?>
    </tr>


