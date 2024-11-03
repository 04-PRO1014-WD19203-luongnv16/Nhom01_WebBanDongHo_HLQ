<div class="login">
      <div class="dk"><h1 class="title_lg">ĐĂNG KÝ</h1></div>
      <form
        action="trangchu.php?act=dangky"
        class="dangnhap"
        method="POST"
        enctype="multipart/form-data"
      >
        <label for="">Tên người dùng</label
        ><input class="lg" type="user" name="ten_tai_khoan" id="" />
        <label for="">Email đăng nhập</label
        ><input class="lg" type="email" name="email" id="" />
        <label for="">Số điện thoại</label
        ><input class="lg" type="number" name="sdt" id="" />
        <label for="">Địa chỉ</label
        ><input class="lg" type="text" name="diachi" id="" />
        <label for="">Mật khẩu</label
        ><input class="lg" type="password" name="mat_khau" id="" />
        <label for="">Xác nhận lại mật khẩu</label
        ><input class="lg" type="password" name="mat_khau_2" id="" />
        <input type="submit" value="Đăng ký" name="btn_dangky" class="sb" />
        <a href="trangchu.php?act=dangnhap" class="sb">Đăng nhập </a>
        <!-- <input type="reset" value="Nhập lại" name="sb" class="sb" /> -->
      </form>
      <?php if(isset($tbao)&&($tbao!="")) echo $tbao; ?>
    </div>