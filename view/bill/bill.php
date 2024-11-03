<?php
include '../model/global.php';
?>
<style>
    .datthem{
        width: 40%;
        font-size: 20px;
        margin-right: 10px;
        color: white;
        background-color: #993333;
        border-radius: 6px;
        border: 1px solid #993333;
        height: 40px;
    }
</style>

<div class="cart-container">
    <h2 class="cart-title">Giỏ hàng của bạn</h2>
    <table>
        <thead>
            <tr>
                
                <th class="remove"></th>
                <th class="remove">SẢN PHẨM</th>
                <th class="remove">SIZE</th>
                <th class="remove">GIÁ</th>
                <th class="remove">SỐ LƯỢNG</th>
                <th class="remove">TỔNG</th>
             
            </tr>
        </thead>
        <tbody>
            <?php
            $tong = 0;
            $i = 0;
            $all_cart =  show_gio_hang($id_tai_khoan);
            foreach($all_cart as $cart){
                $hinh_anh = $img_path . $cart['img'];
                $thanh_tien = $cart['gia'] * $cart['quantity'];
                $id_bien_the = $cart['id_bien_the'];
                
                $xoa_san_pham = '<a href="trangchu.php?act=xoagiohang&idcart=' . $i . '"><i class="fas fa-times remove-btn"></i></a>';
                ?>
                    <tr data-id="<?=$i?>">
                        <td><?=$xoa_san_pham?></td>
                        <td>
                            <img src="<?=$hinh_anh?>" alt="">
                        </td>
                        <td class="rem"><?= $cart['name'] ?></td>
                        <td class="rem"><?= $cart['size'] ?></td>
                        <td class="price">
                            <?php
                            $loadOneBienThe = loadOneBienThe($id_bien_the);
                            foreach( $loadOneBienThe as $loadoneBien){
                                $thanh_tien = $loadoneBien['gia_ban'] * $cart['quantity'];
                                ?>
                                <?=$loadoneBien['gia_ban']?> VNĐ
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <div class="quantity-controls">
                                <input type="number" class="quantity-input" value="<?=$cart['quantity']?>" min="1" data-id="<?=$i?>">
                            </div>
                        </td>
                        <td class="total-price"><?= $thanh_tien ?> VNĐ</td>
                    </tr>
                    <?php
                $tong += $thanh_tien;
                $i++;
            }
            ?>
            <tr>
                <td colspan="6" class="rem">Tạm tính</td>
                <td class="rem1" id="subtotal"><?php echo $tong; ?> VNĐ</td>
            </tr>
            <tr>
                <td colspan="6" class="rem">Tổng tiền</td>
                <td class="rem1" id="total"><?php echo $tong; ?> VNĐ</td>
                <input type="hidden" class="quantity-input" name ="total" value="<?=$tong?>" min="1" data-id="'.$i.'">
            </tr>
        </tbody>
    </table>
    <?php
    if(isset($_SESSION['ten_tai_khoan'])){
        $ten_tai_khoan=$_SESSION['ten_tai_khoan']['ten_tai_khoan'];
        $sdt=$_SESSION['ten_tai_khoan']['sdt'];
        $diachi=$_SESSION['ten_tai_khoan']['diachi'];
    }else{
        $ten_tai_khoan="";
        $sdt="";
        $diachi="";
        $email="";
    }
    ?>

<div class="momo_atm">
    <form action="trangchu.php?act=billcomfim" method="POST">
        <h1 class="incus">Thông tin khách hàng </h1>
        <div class="customer-info">    
            <input class="td" name="id_tai_khoan" type="hidden" id="user_id" required  placeholder="Email (bắt buộc)" value="<?=$id_tai_khoan?>">   
            <input class="td" name="ten_tai_khoan" type="text" id="name" required placeholder="Họ và tên (bắt buộc)" value="<?=$ten_tai_khoan?>">
            <br>           
            <input class="td" name="sdt" type="text" id="phone" required  placeholder="Số điện thoại (bắt buộc)" value="<?=$sdt?>">
            <br>
            <input class="td" name="diachi" type="text" id="address" required  placeholder="Địa chỉ (bắt buộc)" value="<?=$diachi?>">
            <br>
            <input class="td" name="email" type="email" id="email" required  placeholder="Email (bắt buộc)" value="<?=$email?>">
            <br>
        </div>
        <?php
        // thanh toan momo
        $tongGiaInput=$tong;
        $tong = 0;
        $all_cart =  show_gio_hang($id_tai_khoan);
        foreach($all_cart as $cart){
            // $hinh_anh = $img_path . $cart['img'];
            $thanh_tien = $cart['gia'] * $cart['quantity'];
            $tong += $thanh_tien;
            ?>
                <input type="hidden" value="<?=$cart['img']?>" name="cart_img[]">
                <input type="hidden" value="<?=$cart['name']?>" name="cart_name[]">
                <input type="hidden" value="<?=$cart['gia']?>" name="cart_gia[]">
                <input type="hidden" value="<?=$cart['quantity']?>" name="cart_quantity[]">
                <input type="hidden" value="<?=$cart['id_bien_the']?>" name="cart_id_bien_the[]">
                <input type="hidden" value="<?=$thanh_tien?>" name="cart_thanh_tien[]">
                <br>
            <?php
        }
        ?>
        <input type="hidden" id="tongGiaInput3" name="tongGiaInput" value="<?=$tongGiaInput?>">
        
        <div class="actions">
            <input class="datthem" type="submit" value="Đặt hàng" name="btn_dathang">
            <a class="muathem1" href="trangchu.php?act=sanpham.php" class="continue-shopping">Mua thêm sản phẩm khác</a>
        </div>
        <br>
    </form>
</div>

    
</div>



<script>
document.addEventListener("DOMContentLoaded", function () {
    const decreaseButtons = document.querySelectorAll(".quantity-decrease");
    const increaseButtons = document.querySelectorAll(".quantity-increase");
    const quantityInputs = document.querySelectorAll(".quantity-input");

    function updateTotalPrice(row) {
        const priceElement = row.querySelector(".price");
        const totalPriceElement = row.querySelector(".total-price");
        const quantityInput = row.querySelector(".quantity-input");

        const price = parseInt(priceElement.textContent.replace(" VNĐ", ""));
        const quantity = parseInt(quantityInput.value);
        const totalPrice = price * quantity;
        totalPriceElement.textContent = totalPrice + " VNĐ";

        updateSubtotal();
    }

    function updateSubtotal() {
        let subtotal = 0;
        const totalPrices = document.querySelectorAll(".total-price");
        totalPrices.forEach(totalPriceElement => {
            subtotal += parseInt(totalPriceElement.textContent.replace(" VNĐ", ""));
        });

        document.getElementById("subtotal").textContent = subtotal + " VNĐ";
        document.getElementById("total").textContent = subtotal + " VNĐ";
    }

    decreaseButtons.forEach(button => {
        button.addEventListener("click", function () {
            const row = button.closest("tr");
            const input = row.querySelector(".quantity-input");
            let value = parseInt(input.value);
            if (value > 1) {
                value--;
                input.value = value;
                updateTotalPrice(row);
            }
        });
    });

    increaseButtons.forEach(button => {
        button.addEventListener("click", function () {
            const row = button.closest("tr");
            const input = row.querySelector(".quantity-input");
            let value = parseInt(input.value);
            value++;
            input.value = value;
            updateTotalPrice(row);
        });
    });

    quantityInputs.forEach(input => {
        input.addEventListener("change", function () {
            const row = input.closest("tr");
            let value = parseInt(input.value);
            if (value < 1) {
                input.value = 1;
            }
            updateTotalPrice(row);
        });
    });
});
</script>
