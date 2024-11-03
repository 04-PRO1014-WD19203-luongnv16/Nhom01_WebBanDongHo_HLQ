<?php
function listAllBill(){
    $sql="SELECT * FROM bill ORDER BY bill_id DESC";
    $listAllBill=pdo_query($sql);
    return $listAllBill;
}
function listBillOrderBillStatus($id_bill_status) {
    // Show đơn hàng theo trạng thái + thứ tự
    $sql = "SELECT * FROM bill WHERE bill_status=$id_bill_status ORDER BY bill_id DESC";
    $listBillOrderBillStatus = pdo_query($sql);
    return $listBillOrderBillStatus;
}

function listOneBienTheTheBill(){
    $sql= "SELECT * FROM bien_the ";
    $listOneBienTheTheBill=pdo_query($sql);
    return $listOneBienTheTheBill;
}
function billPayment($bill_id){
    $sql= "UPDATE bill SET payment_status=1 WHERE id_bill=$bill_id";
    pdo_query($sql);
}
// // Cập nhập trạng thái đơn hàng
// function orderAccept($bill_id){
//     $sql= "UPDATE bill SET bill_status=2 WHERE bill_id=$bill_id";
//     pdo_execute($sql);
// }
// function orderRejection($bill_id){
//     $sql= "UPDATE bill SET bill_status=6 WHERE bill_id=$bill_id";
//     pdo_execute($sql);
// }

// function orderDelivery($bill_id){
//     $sql= "UPDATE bill SET bill_status=3 WHERE bill_id=$bill_id";
//     pdo_execute($sql);
// }

// function successfulDelivery($bill_id){
//     $sql= "UPDATE bill SET bill_status=4 WHERE bill_id=$bill_id";
//     pdo_execute($sql);
// }

// function deliveryFailure($bill_id){
//     $sql= "UPDATE bill SET bill_status=5 WHERE bill_id=$bill_id";
//     pdo_execute($sql);
// }

function viewDetail($bill_id){
    // $sql= "UPDATE bill SET bill_status=7 WHERE bill_id=$bill_id";
    // pdo_execute($sql);
}
function orderAcceptBienThe($id_bien_the,$expected_quantity){
    $sql= "UPDATE bien_the SET so_luong=$expected_quantity WHERE id_bien_the = $id_bien_the";
    pdo_execute($sql);
}

function allBillStatus(){
    $sql= "SELECT * FROM billstatus";
    $allBillStatus=pdo_query($sql);
    return $allBillStatus;
}
function allPaymentStatus(){
    $sql= "SELECT * FROM payment_status";
    $allPaymentStatus=pdo_query($sql);
    return $allPaymentStatus;
}
function totalBills($bill_status){
    $sql= "SELECT COUNT(bill_id) AS total_bills
FROM bill
WHERE bill_status = $bill_status";
$totalBills=pdo_query($sql);
return $totalBills;
}


function thongKeOrderTatolQuantity(){
    $sql = "SELECT id_bien_the, 
                   SUM(quantity) AS total_quantity, 
                   SUM(total_price) AS total_price 
            FROM bill
            WHERE bill_status = 4
            AND DATE_FORMAT(created_datetime, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')
            GROUP BY id_bien_the
            ORDER BY total_quantity DESC
            LIMIT 10";
    $thongKeOrderTatolQuantity = pdo_query($sql);
    return $thongKeOrderTatolQuantity;
}
function allThongKeOrderTatolQuantity(){
    $sql = "SELECT id_bien_the, 
                   SUM(quantity) AS total_quantity, 
                   SUM(total_price) AS total_price 
            FROM bill
            WHERE bill_status = 4
            AND DATE_FORMAT(created_datetime, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')
            GROUP BY id_bien_the
            ORDER BY total_quantity DESC";
    $allThongKeOrderTatolQuantity = pdo_query($sql);
    return $allThongKeOrderTatolQuantity;
}

function oneTatolQuantity(){
    $sql= "SELECT MAX(total_quantity) AS max_total_quantity FROM (
        SELECT SUM(quantity) AS total_quantity FROM bill
        WHERE bill_status = 4 AND DATE_FORMAT(created_datetime, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')
        GROUP BY id_bien_the
    ) AS subquery";
    $oneTatolQuantity=pdo_query($sql);
    return $oneTatolQuantity;
}
function oneTatolPrice(){
    $sql = "SELECT MAX(total_price) AS max_total_price FROM (
        SELECT SUM(total_price) AS total_price FROM bill
        WHERE bill_status = 4 AND DATE_FORMAT(created_datetime, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m')
        GROUP BY id_bien_the
    ) AS subquery";
    $oneTatolPrice = pdo_query($sql);
    return $oneTatolPrice;
}









function allBienTheOrderBill(){
    $sql = "SELECT * FROM bien_the";
    $allBienTheOrderBill = pdo_query($sql);
    return $allBienTheOrderBill;
}

function allProductOrderBill(){
    $sql="SELECT * FROM sanpham";
    $allProductOrderBill = pdo_query($sql);
    return $allProductOrderBill;
}





// thong ke theo input_date

function thongKeOrderTatolQuantityInputDate($month,$year){
    $sql = "SELECT id_bien_the,
    SUM(quantity) AS total_quantity, 
    SUM(total_price) AS total_price 
        FROM bill
        WHERE bill_status = 4
        AND YEAR(created_datetime) = $year AND MONTH(created_datetime) = $month
        GROUP BY id_bien_the
        ORDER BY total_quantity DESC
        LIMIT 10";
    $thongKeOrderTatolQuantityInputDate=pdo_query($sql);
    return $thongKeOrderTatolQuantityInputDate;
}
function oneTatolPriceInputDate($month,$year){
    $sql = "SELECT MAX(total_price) AS max_total_price FROM (
        SELECT SUM(total_price) AS total_price 
        FROM bill
        WHERE bill_status = 4
        AND YEAR(created_datetime) = $year AND MONTH(created_datetime) = $month
        GROUP BY id_bien_the
    ) AS subquery";
    $oneTatolPriceInputDate = pdo_query($sql);
    return $oneTatolPriceInputDate;
}




function oneTatolQuantityInputdate($month,$year){
    $sql= "SELECT MAX(total_quantity) AS max_total_quantity FROM (
        SELECT SUM(quantity) AS total_quantity FROM bill
        WHERE bill_status = 4
        AND YEAR(created_datetime) = $year AND MONTH(created_datetime) = $month
        GROUP BY id_bien_the
    ) AS subquery";
    $oneTatolQuantityInputdate=pdo_query($sql);
    return $oneTatolQuantityInputdate;
}


function allThongKeOrderTatolQuantityInputdate($month,$year){
    $sql = "SELECT id_bien_the, 
            SUM(quantity) AS total_quantity, 
            SUM(total_price) AS total_price 
            FROM bill
            WHERE bill_status = 4
            AND YEAR(created_datetime) = $year AND MONTH(created_datetime) = $month
            GROUP BY id_bien_the
            ORDER BY total_quantity DESC";
    $allThongKeOrderTatolQuantityInputdate = pdo_query($sql);
    return $allThongKeOrderTatolQuantityInputdate;
}
function productOrderBill($id_bien_the){
    $sql = "SELECT id_san_pham FROM bien_the WHERE id_bien_the=$id_bien_the";
    $productOrderBill = pdo_query($sql);
    return $productOrderBill;

}
function productOrderId($id_san_pham){
    $sql = "SELECT * FROM sanpham WHERE id_san_pham=$id_san_pham";
    $productOrderId = pdo_query($sql);
    return $productOrderId;

}

?>