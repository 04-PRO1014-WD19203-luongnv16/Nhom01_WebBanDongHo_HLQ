<div class="login">
      <h1 class="title_lg">Đăng nhập</h1>
      <form
        action="trangchu.php?act=dangnhap"
        class="dangnhap"
        method="POST"
        enctype="multipart/form-data"
      >
        <label class="tendn" for="">Email đăng nhập</label
        ><input class="lg" type="email" name="email" id="" />
        <label class="tendn" for="">Mật khẩu</label
        ><input class="lg" type="password" name="mat_khau" id="" />
        <input type="submit" value="Đăng nhập" name="btn_dang_nhap" class="sb" />
        <a href="trangchu.php?act=quenmk" class="link_lg">Quên mật khẩu?</a>
        <a href="trangchu.php?act=dangky" class="link_lg">Đăng ký</a>
      </form>
      <p class="thongbao"><?php if(isset($thong_bao)&&($thong_bao!="")) echo $thong_bao; ?></p>
    </div>