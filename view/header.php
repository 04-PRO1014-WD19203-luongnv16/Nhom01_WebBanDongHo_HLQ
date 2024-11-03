
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>trang chủ</title>
    <link rel="stylesheet" href="../view/css/indexx.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
  </head>
  <body>
    <div class="app">
      <div class="header">
        <label for="toggler" class="toggler"><i class="bx bx-menu"></i></label
        ><input type="checkbox" name="" id="toggler" />

        <div class="logo"><a href="trangchu.php" class="logo" >HLQ</a></div>

        <div class="menu">
          <nav class="nav">
            <a href="trangchu.php" class="link">Trang chủ</a>
           <a class="link" href="trangchu.php?act=sanpham">Sản phẩm</a>
            <a href="trangchu.php?act=gioithieu" class="link">Giới thiệu</a>
            <a href="trangchu.php?act=gioithieu" class="link">Tin tức</a>

          </nav>
          
        </div>
        
        <?php 
      if(isset($_SESSION['ten_tai_khoan'])&&is_array($_SESSION['ten_tai_khoan'])){
        
        extract($_SESSION['ten_tai_khoan']);
      ?>
      <div class="icon_menu">
         <?php
         if($vai_tro==1){
          ?>
            
           <a href="../admin/trangchuadmin.php" class="icon_link"><i class='bx bxs-user-detail'></i></a>
          <?php
         }else if ($vai_tro==2){
          echo"";
         }
         ?>
          <p class="xinchao">Xin chào <?= $ten_tai_khoan ?></p>
          <a href="trangchu.php?act=acc" class="icon_link"><i class='bx bxs-user-circle'></i></a>
          <a href="trangchu.php?act=thoat" class="icon_link"><i class="bx bx-log-out"></i></a>
          <a href="trangchu.php?act=giohang" class="icon_link"><i class="bx bx-shopping-bag"></i></a>
        </div>
      <?php
      }else{
?>
    <div class="icon_menu">
          <a href="trangchu.php?act=dangnhap" class="icon_link"><i class="bx bxs-user"></i></a>
          
          <a href="trangchu.php?act=addcart" class="icon_link"><i class="bx bx-shopping-bag"></i></a>
        </div>
    <?php
      }
      ?>
      </div>
      
   