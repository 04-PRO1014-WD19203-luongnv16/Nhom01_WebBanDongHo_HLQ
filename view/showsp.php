<?php
include "../models/global.php";
?>

    <div class="main">
        <h1 class="title">SẢN PHẨM </h1>
        <div class="product">
        <?php foreach ($dssp_view as $item) {
            extract($item);
            // var_dump($item);
            $chitiet="trangchu.php?act=chitiet&id=".$id_san_pham;
            $img=$img_path.$hinh_anh;
            echo '<div class="content">
            
           
            <a href="'.$chitiet.'"> <img src="'.$hinh_anh.'" alt="" class="img_pro" /></a>              
              <a href=""><button class="nut2"><i class="bx bx-shopping-bag"></i></button></a>
            
            <div class="intro_pro">
              <p class="name">'.$ten_san_pham.'</p>
              <div class="price">
                <p class="right">'.$gia_ban.' VNĐ</p>
                
              </div>
            </div>
          </div>';
        } ?>  
        </div>    
    </div>
       
    