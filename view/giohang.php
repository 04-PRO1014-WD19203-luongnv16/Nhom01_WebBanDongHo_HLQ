<?php
include '../model/global.php';
include_once "../model/cart.php";
include_once "../model/sanpham.php";

?>

<?php
$checkCart=checkCart($id_tai_khoan);
if ($checkCart!=0) {
    ?>

    <div class="cart-container">
        <h2 class="tengio">Giỏ hàng của bạn</h2>
        <table>
            <thead>
                <tr>
                    <th class="remove"></th>
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
                foreach( $all_cart  as $cart){
        
                    $hinh_anh = $img_path . $cart['img'];
                    $thanh_tien = $cart['gia'] * $cart['quantity'];
                    // $tong += $thanh_tien;
                    $id_bien_the = $cart['id_bien_the'];

                    $xoa_san_pham = '<a href="trangchu.php?act=xoagiohang&idbienthe=' .$id_bien_the . '"><i class="fas fa-times remove-btn"></i></a>';
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
                </tr>
            </tbody>
        </table>
        <a href="trangchu.php?act=bill"><button type="submit" class="dathang">ĐẶT HÀNG</button></a>
        <a href="trangchu.php?act=billATM"><button type="submit" class="dathang">THANH TOÁN MOMO ATM</button></a>

    </div>

    <?php
}
?>




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

    function sendQuantityUpdate(id, quantity) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "update_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id + "&quantity=" + quantity);
    }

    decreaseButtons.forEach(button => {
        button.addEventListener("click", function () {
            const row = button.closest("tr");
            const input = row.querySelector(".quantity-input");
            const id = input.getAttribute("data-id");
            let value = parseInt(input.value);
            if (value > 1) {
                value--;
                input.value = value;
                updateTotalPrice(row);
                sendQuantityUpdate(id, value);
            }
        });
    });

    increaseButtons.forEach(button => {
        button.addEventListener("click", function () {
            const row = button.closest("tr");
            const input = row.querySelector(".quantity-input");
            const id = input.getAttribute("data-id");
            let value = parseInt(input.value);
            value++;
            input.value = value;
            updateTotalPrice(row);
            sendQuantityUpdate(id, value);
        });
    });

    quantityInputs.forEach(input => {
        input.addEventListener("change", function () {
            const row = input.closest("tr");
            const id = input.getAttribute("data-id");
            let value = parseInt(input.value);
            if (value < 1) {
                value = 1;
                input.value = value;
            }
            updateTotalPrice(row);
            sendQuantityUpdate(id, value);
        });
    });
});

</script>

<div class="cart-container">
    <h2 class="tengio">Lịch sử đơn hàng</h2>
        <div>
            <?php
            $listAllBillIOrderUser=listAllBillIOrderUser($id_tai_khoan);
            foreach($listAllBillIOrderUser as $allBillIOrderUser){
                $id_bill=$allBillIOrderUser['id_bill'];
                $id_tai_khoan=$allBillIOrderUser['id_tai_khoan'];
                $listAllBillItem=listAllBillItem($id_bill);

                $id_bill_status=$allBillIOrderUser['bill_status'];
                $nameBillStatusOrderId=nameBillStatusOrderId($id_bill_status);
                // extract($nameBillStatusOrderId);
                ?>
                <br><br><br>
                    <div style="display: flex; justify-content: space-between;">
                        <h1>Mã đơn hàng: <?=$allBillIOrderUser['orderId']?></h1>
                        <h1>Trạng thái đơn hàng: <?=$nameBillStatusOrderId['name_bill_status']?></h1>
                    </div>
                <?php
                foreach($listAllBillItem as $listallbillitem){
                    ?>
                    <table>
                        <tr data-id="'.$i.'">
                            <td style="width:30%">
                                <img src="../upload/<?=$listallbillitem['img']?>" alt="" style="width:100%">
                            </td>
                            <td class="billItems" style="font-size:18px;width:30%">
                                <?=$listallbillitem['name']?>
                            </td>
                            
                            <td class="billItems" style="font-size:18px;width:20%">
                                <?=$listallbillitem['gia']?> VNĐ
                            </td>
                            <td class="billItems" style="font-size:18px;width:20%">
                                Số lượng:<?=$listallbillitem['quantity']?>
                            </td>
                            
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <br>
                    <div style="display: flex; justify-content: space-between;">
                        <p></p>
                        <p></p>
                        <div class="link_bill">
                            <a href="trangchu.php?act=viewCart&&id_bill=<?=$id_bill?>"><h1>Chi tiết đơn hàng</h1></a>
                        </div>
                        <h1>Tổng tiền: <?=$allBillIOrderUser['total']?> VNĐ</h1>
                    </div>
                    <br>
                    <hr style="color:gainsboro;">
                <?php
            }
            ?>
        </div>
    
</div>
<style>
    .link_bill>a>h1{
        color:blueviolet;
    }
    .link_bill>a>h1:hover{
        color:navy;
    }
    .tengio{
        font-size: 42px;
    }

    
</style>