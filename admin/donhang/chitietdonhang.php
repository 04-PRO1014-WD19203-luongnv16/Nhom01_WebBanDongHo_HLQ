
<?php
include_once '../model/cart.php';
?>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

.order-info, .product-info {
    margin-bottom: 20px;
}

label {
    display: block;
    margin: 10px 0 5px;
}

input[type="text"], select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: center;
}

th {
    background-color: #f4f4f4;
}

td[colspan="5"] {
    text-align: right;
    font-weight: bold;
}

</style>
    <div class="container">
        <h1>Chi Tiết Đơn Hàng</h1>
        <?php
        foreach($quanBill as $quanbill){
            $id_bill=$quanbill['id_bill'];
            $id_bill_status=$quanbill['bill_status'];

            $nameBillStatusOrderId=nameBillStatusOrderId($id_bill_status);
            ?>
                <h2>1. Thông Tin Đơn Hàng</h2>
                <form action="trangchuadmin.php?act=trangThaiDonHang&&billStatusOld=<?=$id_bill_status?>&&id_bill=<?=$id_bill?>" method="post">
                    <label for="status">Trạng Thái</label>
                    <div style="display:flex">
                    <select name="idbillstatus" id="">
                        <option value="1" <?= $id_bill_status == 1 ? 'selected' : '' ?> <?= $id_bill_status >= 2 ? 'disabled' : '' ?>>Chờ xác nhận.</option>
                        <option value="2" <?= $id_bill_status == 2 ? 'selected' : '' ?> <?= $id_bill_status >= 3 ? 'disabled' : '' ?>>Đã xác nhận</option>
                        <option value="3" <?= $id_bill_status == 3 ? 'selected' : '' ?> <?= $id_bill_status >= 4 ? 'disabled' : '' ?>>Đang giao.</option>
                        <option value="4" <?= $id_bill_status == 4 ? 'selected' : '' ?> <?= $id_bill_status >= 4 ? 'disabled' : '' ?>>Hoàn thành.</option>
                        <option value="5" <?= $id_bill_status == 5 ? 'selected' : '' ?> <?= $id_bill_status >= 3 ? 'disabled' : '' ?>>Thất bại/Hủy.</option>
                        <!-- <option value="5" <?= $id_bill_status == 5 ? 'selected' : '' ?> <?= $id_bill_status >= 4 ? 'disabled' : '' ?>>Thất bại/Hủy.</option> -->
                    </select>
                    <input type="submit" value="Cập nhập trạng thái đơn hàng.">
                    </div>
                </form>

                    
                    

                

                <label for="customer-name">Tên Khách Hàng</label>
                <input type="text"name="bill_name" value="<?=$quanbill['bill_name']?>"readonly>

                <label for="phone">SDT</label>
                <input type="text" name="bill_tel" value=" <?=$quanbill['bill_tel']?>"readonly>

                <label for="address">Địa Chỉ</label>
                <input type="text" name="bill_address" value="<?=$quanbill['bill_address']?>"readonly>

                <label for="address">Thời gian đặt hàng</label>
                <input type="text" name="ngaydathang" value="<?=$quanbill['ngaydathang']?>"readonly>
            </div>
            <div class="product-info">
            <h2>2. Thông Tin Sản Phẩm</h2>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($listAllBillItem as $allBillItem){
                    $i=1;
                    ?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><img src="../upload/<?=$allBillItem['img']?>" alt="" style="width: 200px;"></td>
                        <td><?=$allBillItem['name']?></td>
                        <td><?=$allBillItem['gia']?></td>
                        <td><?=$allBillItem['quantity']?></td>
                        <td><?=$allBillItem['thanh_tien']?></td>
                    </tr>
                    <?php
                }
                ?>
                    <tr>
                        <td colspan="5">Tổng</td>
                        <td><?=$quanbill['total']?></td>
                    </tr>
                </tbody>
            </table>
        </div>


        
            <?php
        }
        ?>
    </div>







