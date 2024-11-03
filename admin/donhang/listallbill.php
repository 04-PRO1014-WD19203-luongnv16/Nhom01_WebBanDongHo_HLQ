<form action="trangchuadmin.php?act=listAllBill" method="post">
    <div style="display: flex; ">
        <div>
        <button type="submit" name="all_bills" value="all">
                Tất cả bill
            </button>
        </div>
        <div style="width: 20px;"></div>
        <?php 
        foreach($listAllBillStatus as $allBillStatus){
            $id_bill_status=$allBillStatus['id_bill_status'];
            $countBillStatus=countBillStatus($id_bill_status);
            ?>
            <button type="submit" name="id_bill_status" value="<?= $allBillStatus['id_bill_status'] ?>">
                <?= $allBillStatus['name_bill_status'] ?>
            </button>
            <div style="width: 20px; height: 20px; border: 1px solid red; border-radius: 90%; text-align: center;">
                <?=$countBillStatus?>
            </div>
            <div style="width: 20px;"></div>
        <?php 
        }
        ?>
    </div>
</form>

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

<br>
<div style="display: flex;">
    <?php
    ?>
</div>
<table >
    <tr>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Tổng giá</th>
        <th>Trạng thái đơn hàng</th>
        <th>Trạng thái thanh toán</th>
        <th>Quản lý</th>
    </tr>
    <?php
    foreach($listBill as $allBill) {
        // extract($allBill);
        $bill_id = $allBill["id_bill"];
        $user_id = $allBill["id_tai_khoan"];
        $total_price = $allBill["total"];
        $bill_status = $allBill["bill_status"];
        $payment_status = $allBill["payment_status"];
        ?>
        
        <tr>
            <td><?=$allBill["orderId"];?></td>
            <td><?=$allBill["bill_name"]?></td>
            <td style="text-align: end;"><?=$total_price?></td>
            <td>
                <?php
                foreach($listAllBillStatus as $allBillStatus){
                    if($bill_status == $allBillStatus["id_bill_status"]){
                        echo "".$allBillStatus["name_bill_status"];
                    }
                }
                ?>
            </td>
            <td>
                <?php
                foreach($allPaymentStatus as $paymentStatus){
                    if($payment_status == $paymentStatus["id_payment_status"]){
                        echo "".$paymentStatus["name_payment_status"];
                    }
                }
                ?>
            </td>
            
            <input type="hidden" value="<?=$bill_id?>" name="bill_id">
            <input type="hidden" value="<?=$id_bien_the?>" name="id_bien_the">
            <input type="hidden" value="<?=$quantity?>" name="quantity">
            <td>
            <a href="trangchuadmin.php?act=viewDetail&id_bill=<?=$bill_id?>"><button>Chi tiết</button></a>
            </td>
            
        </tr>
        
        <?php
    }
    ?>
</table>


<script>
    function confirmOrderRejection(event) {
        var confirmDelete = confirm("Bạn có chắc chắn muốn xóa?");
        if (!confirmDelete) {
            event.preventDefault(); 
            // Ngăn chặn việc gửi form nếu người dùng chọn "Cancel"
        }
    }
</script>