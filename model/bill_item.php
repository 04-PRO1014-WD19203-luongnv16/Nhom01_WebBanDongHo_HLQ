<?php
$dburl = "mysql:host=localhost;dbname=test1;charset=utf8";
$username = 'root';
$password = '';

$conn = new PDO($dburl, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $conn;


function generateUniqueOrderId($conn) {
    do {
        // Tạo một số ngẫu nhiên có 10 chữ số
        $orderId = mt_rand(1000000000, 9999999999);

        // Kiểm tra xem số này đã tồn tại trong bảng `bill` chưa
        $stmt = $conn->prepare("SELECT COUNT(*) FROM bill WHERE orderId = :orderId");
        $stmt->execute([':orderId' => $orderId]);
        $count = $stmt->fetchColumn();
    } while ($count > 0);

    return $orderId;
}






function pdo_executeBill($sql, ...$params) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);

        // Debug: In câu lệnh SQL và tham số
        echo "SQL: $sql\n";
        print_r($params);
        
        $stmt->execute($params);
        return $conn->lastInsertId(); // Nếu bạn muốn trả về ID của bản ghi mới chèn
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}


function insertCartInBillItem($id_bill, $id_tai_khoan, $cart_img, $cart_name, $cart_gia, $cart_quantity, $cart_id_bien_the, $cart_thanh_tien) {
    $sql = "INSERT INTO bill_item (id_bill, id_tai_khoan, img, name, gia, quantity, id_bien_the, thanh_tien) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $id_bill, $id_tai_khoan, $cart_img, $cart_name, $cart_gia, $cart_quantity, $cart_id_bien_the, $cart_thanh_tien);
}

?>