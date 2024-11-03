<?php
include "../model/global.php";
?>

    <div class="main">
        <div class="tong">
        <h1 class="title">SẢN PHẨM </h1>
        
        <form
        action="trangchu.php?act=sanpham"
        class="filter"
        method="POST"
        
      >
        <input class="seach1" type="text" name="key"/><br />
        
        <input class="seach" type="submit" value="Tìm kiếm" name="tim" /><br />
      </form>
        </div>
        <div class="tensp">
        <?php
         foreach ($listdanhmuc as $item) {
         extract($item);
          $linkdm="trangchu.php?act=sanpham&iddm=".$id_danh_muc;  
         echo '<a href="'.$linkdm.'" class="link"> '.$ten_danh_muc.'</a>';
         }?>
        </div>
        <div class="product">
        <?php foreach ($listdm as $item) {
            extract($item);
            // var_dump($item);
            $chitiet="trangchu.php?act=chitiet&id=".$id_san_pham;
            $img=$img_path.$hinh_anh;
            echo '<div class="content">
            
           
            <a href="'.$chitiet.'"> <img src="'.$img.'" alt="" class="img_pro" /></a>              
              
            
            <div class="intro_pro">
              <p class="name">'.$ten_san_pham.'</p>
        
            </div>
          </div>';
        } ?>  
        </div>    
    </div>