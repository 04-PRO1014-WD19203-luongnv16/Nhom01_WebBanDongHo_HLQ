<?php
include "../model/global.php";
?>
<div class="banner">
        <div class="slider" id="slider">
          <img src="../view/img/0.jpg" alt="" id="img" />
        </div>
        <button onclick="pre()" class="pre" id="pre" href="">
          <i class="bx bx-left-arrow-alt"></i>
        </button>
        <button onclick="next()" class="next" id="next" href="">
          <i class="bx bx-right-arrow-alt"></i>
        </button>
        </div>
   <div class="icon">
      <div class="connn">
      <i class="fa-solid fa-cart-shopping"></i>
     <p class="w_icon">MIỄN PHÍ VẬN CHUYỂN</p>
      </div>
     <div class="connn">
     <i class="fa-solid fa-medal"></i>
     <P class="w_icon">CHẤT LƯỢNG HÀNG ĐẦU</P>
     </div>
     <div class="connn"> 
      <i class="fa-solid fa-tag"></i><p class="w_icon">ƯU ĐÃI HÀNG NGÀY</p></div>
     <div class="connn">
       <i class="fa-solid fa-shield"></i><p class="w_icon">100% THANH TOÁN AN TOÀN</p></div>
      </div>
      <div class="main">
        <h1 class="title">SẢN PHẨM </h1>
        <div class="product">
        <?php foreach ($dssp_view as $item) {
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
    <div class="main">
        <h1 class="title">SẢN PHẨM MỚI NHẤT </h1>
        <div class="product">
        <?php foreach ($dssp_view as $item) {
            extract($item);
            // var_dump($item);
            $chitiet="trangchu.php?act=chitiet&id=".$id_san_pham;
            $img=$img_path.$hinh_anh;
            echo '<div class="content">
            
           
            <a href="'.$chitiet.'"> <img src="'.$img.'" alt="" class="img_pro" /></a>              
         
            
            <div class="intro_pro">
             <a href="'.$chitiet.'"> <p class="name">'.$ten_san_pham.'</p></a>   
                          
              
            </div>
          </div>';
        } ?>  
        </div>    
    </div>
       

    <!-- <form action="trangchu.php?act=addcart" method="POST">
              <input type="hidden" name="id_san_pham" value="'.$id_san_pham.'" />
              <input
                type="hidden"
                name="ten_san_pham"
                value="'.$ten_san_pham.'"
              />
              <input type="hidden" name="hinh_anh" value="'.$hinh_anh.'" />
              <input type="hidden" name="gia" value="'.$gia_ban.'" />
              <input type="submit" value="Thêm vào giỏ hàng" name="addcart" >
             
            </form> -->