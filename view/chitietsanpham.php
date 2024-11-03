<?php 
include "../model/global.php";
if(isset($pro)){
  extract($pro);
  $img = $img_path . $hinh_anh;
}
$listkichthuoc = getVariantsWithSize($id_san_pham);
?>
<div class="chitiet">
  <h1 class="title_ct"><a class="shop" href="trangchu.php?act=showsp">SẢN PHẨM <i class='bx bx-chevron-right'></i></a> CHI TIẾT SẢN PHẨM</h1>
  <?php 
    echo '
    <div class="sanpham">
      <div class="img_chitiet">
        <img src="'.$img.'" alt="" class="anh_ct" />
      </div>
      <div class="intro_chitiet">
        <p class="name_sp">'.$ten_san_pham.'</p>
        
        <select class="chon" name="kich_thuoc" id="kich_thuoc">';
        
        foreach ($listkichthuoc as $variant) {
          echo '<option value="'.$variant['id_bien_the'].'" data-price="'.$variant['gia_ban'].'">'.$variant['size'].'</option>';
        }

        echo '</select>
         
        <div class="price_sp">
          <p class="left_sp"><span id="price_display">'.$gia_ban.'</span> VNĐ</p>
        </div>
        <p class="intro_sp">'.$mo_ta.'</p>

        <form action="trangchu.php?act=addcart" method="POST">
          <input type="hidden" name="id_san_pham" value="'.$id_san_pham.'" />
          <input type="hidden" name="ten_san_pham" value="'.$ten_san_pham.'" />
          <input type="hidden" name="hinh_anh" value="'.$hinh_anh.'" />
          <input type="hidden" name="size" id="size" value="'.$listkichthuoc[0]['size'].'" />
          <input type="hidden" name="id_bien_the" id="id_bien_the" value="'. $listkichthuoc[0]['id_bien_the'].'" />
          <input type="hidden" name="gia" id="gia" value="'.$gia_ban.'" />
          <input type="submit" value="MUA NGAY" name="addcart" class="addcart" >
          <input type="submit" value="THÊM VÀO GIỎ HÀNG" name="addcart" class="addcart" >
        </form>
      </div>
    </div>';
  ?>     
</div>
<div class="binhluan">
  <h1 class="title_bl">ĐÁNH GIÁ SẢN PHẨM</h1>
  <div class="cont_main">
    <div class="cont_bl">
      <p class="user_bl">HQL</p>
      <p class="star_bl">
        <i class="bx bxs-star" style="color: #f2f70c"></i>
        <i class="bx bxs-star" style="color: #f2f70c"></i>
        <i class="bx bxs-star" style="color: #f2f70c"></i>
        <i class="bx bxs-star" style="color: #f2f70c"></i>
        <i class="bx bxs-star" style="color: #f2f70c"></i>
      </p>
      <p class="comment">
      Chính sách bảo hành tại đồng hồ HLQ luôn là điểm mạnh với cam kết đáng tin cậy mà cửa hàng mang đến cho khách hàng. Được xây dựng trên nguyên tắc thấu hiểu, phục vụ tốt nhất cho người dùng, chính sách này giúp đảm bảo rằng mọi trải nghiệm của quý khách đều được bảo vệ và hỗ trợ đầy đủ.
      </p>
      <p class="date_bl">20/7/2024 <i class="bx bx-calendar"></i></p>
    </div>
  </div>
</div>
<div class="main">
  <h1 class="title">SẢN PHẨM CÙNG LOẠI</h1>
  <div class="product">
    <?php foreach ($sp_cung_loai as $item) {
      extract($item);
      $chitiet = "trangchu.php?act=chitiet&id=".$id_san_pham;
      $img = $img_path.$hinh_anh;
      echo '<div class="content">
              <a href="'.$chitiet.'"><img src="'.$img.'" alt="" class="img_pro" /></a>
              <a href="'.$mo_ta.'"><button class="nut1"></button></a>              
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
<script>
 document.addEventListener("DOMContentLoaded", function () {
  const selectVariant = document.getElementById("kich_thuoc");
  const priceDisplay = document.getElementById("price_display");
  const hiddenPriceInput = document.getElementById("gia");
  const hiddenSizeInput = document.getElementById("size");
  const hiddenVariantIdInput = document.getElementById("id_bien_the");

  function updatePrice() {
    const selectedOption = selectVariant.options[selectVariant.selectedIndex];
    const price = selectedOption.getAttribute("data-price");
    const size = selectedOption.textContent;
    const variantId = selectedOption.value;

    priceDisplay.textContent = price;
    hiddenPriceInput.value = price;
    hiddenSizeInput.value = size;
    hiddenVariantIdInput.value = variantId;
  }

  selectVariant.addEventListener("change", updatePrice);

  // Initialize price based on default selected variant
  updatePrice();
});

</script>
