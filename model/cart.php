<?php
include_once '../model/pdo.php';

//thêm vào bill
function insert_bill($ten_tai_khoan, $user_id, $diachi, $sdt, $email, $payment_status, $ngaydathang, $tongdonhang, $bill_status, $so_luong, $id_bien_the) {
    // Câu lệnh SQL để chèn dữ liệu vào bảng bill
    $sql = "INSERT INTO bill (
                bill_name,
                id_tai_khoan,
                bill_address,
                bill_tel,
                bill_email,
                payment_status,
                ngaydathang,
                total,
                bill_status,
                so_luong,
                id_bien_the
            ) VALUES (
                '$ten_tai_khoan',
                '$user_id',
                '$diachi',
                '$sdt',
                '$email',
                '$payment_status',
                '$ngaydathang',
                '$tongdonhang',
                '$bill_status',
                '$so_luong',
                '$id_bien_the'
            )";

    // Thực thi câu lệnh SQL và lấy ID của bản ghi vừa chèn
    return pdo_execute_return_lastInsertId($sql);
}
#kiem tra sản phẩm tồn tại trong giỏ hàng chưa
function kiem_tra_sl($id_tai_khoan, $id_bien_the){
    $sql ="SELECT *FROM cart WHERE id_tai_khoan = '$id_tai_khoan' AND id_bien_the  = '$id_bien_the'";
    $check  = pdo_query_one($sql);
    return $check;
}

#update số lượng 
function  update_so_luong($id_tai_khoan, $id_bien_the, $so_luong){
    $sql = "UPDATE cart SET quantity = $so_luong  WHERE id_bien_the = '$id_bien_the' AND id_tai_khoan = '$id_tai_khoan'";
    pdo_execute($sql);
}
//id bill
function idbill(){
    $sql="select max(id_bill) from bill";
    $id_bill=pdo_query_one($sql);
    return $id_bill['max(id_bill)'];
}
//id user 
function iduser(){
    $sql="select * from taikhoan where id_tai_khoan";
    $id_user=pdo_query_one($sql);
    return $id_user['id_tai_khoan'];
}
// //id biến thể 
// function idBienThe(){
//     $sql="select * from bien_the";
//     $id_bien_the=pdo_query($sql);
//     return $id_bien_the;
// }
//số lượng kho 
function soluong(){
    $sql="select SUM(so_luong) from bien_the";
    $so_luong=pdo_query_one($sql);
    return $so_luong['SUM(so_luong)'];
}
function countBillStatus($id_bill_status){
    $sql= "SELECT COUNT(*) AS count FROM bill WHERE bill_status = $id_bill_status";
    $countBillStatus=pdo_query_one($sql);
    return $countBillStatus['count'];
}
// lấy ra id_bill mới nhất
function idBillNews(){

    $sql = "SELECT MAX(id_bill) as id_bill FROM bill";
    $id_bill = pdo_query_one($sql);
    return $id_bill['id_bill'];
}
//thêm vào cart
function insert_cart($id_tai_khoan, $id_bien_the, $name, $img, $gia, $so_luong, $thanh_tien, $id_bill) {
    $sql = "INSERT INTO cart (id_tai_khoan, id_bien_the, name, img, gia, quantity, thanh_tien, id_bill) 
            VALUES (:id_tai_khoan, :id_bien_the, :name, :img, :gia, :quantity, :thanh_tien, :id_bill)";
    
    $params = array(
        ':id_tai_khoan' => $id_tai_khoan,
        ':id_bien_the' => $id_bien_the,
        ':name' => $name,
        ':img' => $img,
        ':gia' => $gia,
        ':quantity' => $so_luong,
        ':thanh_tien' => $thanh_tien,
        ':id_bill' => $id_bill
    );

    // Debug: In câu lệnh SQL và tham số để kiểm tra
    // echo "SQL: " . $sql . "<br>";
    // echo "Params: ";
    // print_r($params);
    // echo "<br>";

    pdo_execute_cart($sql, $params);
}


//lấy 1 bill
function loadonebill($idbill){
    $sql="select * from bill where id_bill=".$idbill;
    $bill=pdo_query_one($sql);
    return $bill;
    
}

#show giỏ hàng
function show_gio_hang($id_tai_khoan){
    $sql ="SELECT kichthuoc.size,  cart.* FROM cart 
    INNER JOIN bien_the ON  bien_the.id_bien_the = cart.id_bien_the
     INNER JOIN kichthuoc ON  kichthuoc.id_kich_thuoc = bien_the.id_kich_thuoc
     WHERE id_tai_khoan = '$id_tai_khoan'";
    $cart = pdo_query($sql);
    return $cart;
}

#xoa gio hang
function xoa_gio_hang($id_bien_the,$id_tai_khoan){
    if(isset($id_bien_the)){
        $sql ="DELETE FROM cart WHERE id_bien_the = '$id_bien_the' AND id_tai_khoan = '$id_tai_khoan'";  
    }else{
        $sql ="DELETE FROM cart WHERE  id_tai_khoan = '$id_tai_khoan'";
    }

pdo_execute($sql);
}
// lấy 1 giỏ hàng 
function idCartOrderIdBill(){
    $sql="SELECT * FROM cart ";
    $cart = pdo_query($sql);
    return $cart;
}
function loadone_cart($idcart){
    $sql="select * from cart where id_cart=$idcart";
    $cart=pdo_query_one($sql);
    return $cart;
}
function loadCartOrderBill(){
    $sql="SELECT * FROM cart ";
    $loadCartOrderBill=pdo_query($sql);
    return $loadCartOrderBill;
}
//bill chi tiết 
function show_chitet_bill(){
    $tong = 0;
    $i = 0;
    foreach($listbill['mycart'] as $cart){
        $hinh_anh = $img_path . $cart[3];
        $tong += $cart['thanh_tien'];
       
        echo '
        <tr data-id="'.$i.'">
            <td>
                <img src="' . $hinh_anh . '" alt="">
            </td>
            <td class="rem">' . $cart['name'] . '</td>
            <td class="price">'. $cart['gia'] .' VNĐ</td>
           
            <td class="total-price">'. $thanh_tien .' VNĐ</td>
        </tr>';
        $i++;
    }
    
}
//đơn hàng

function listAllBill(){
    $sql="SELECT * FROM bill ORDER BY id_bill DESC";
    $listAllBill=pdo_query($sql);
    return $listAllBill;
}
function listBillOrderBillStatus($id_bill_status) {
    // Prepare the SQL query
    $sql = "SELECT * FROM bill WHERE bill_status=$id_bill_status ORDER BY id_bill DESC";
    
    // Execute the query and fetch the results
    $listBillOrderBillStatus = pdo_query($sql);
    
    // Return the list of bills
    return $listBillOrderBillStatus;
}

function listOneBienTheTheBill(){
    $sql= "SELECT * FROM bien_the ";
    $listOneBienTheTheBill=pdo_query($sql);
    return $listOneBienTheTheBill;
}
// duyet bill status
function trangThaiDonHang($bill_id,$billStatusNew){
    $sql= "UPDATE bill SET bill_status=$billStatusNew WHERE id_bill=$bill_id";
    pdo_execute($sql);
}



function viewDetail($bill_id){
    $sql= "SELECT * FROM bill 
           WHERE id_bill=$bill_id AND bill.bill_status = 4";
    pdo_execute($sql);
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
function nameBillStatusOrderId($id_bill_status){
    $sql= "SELECT name_bill_status FROM billstatus WHERE id_bill_status=$id_bill_status LIMIT 1";
    $nameBillStatusOrderId=pdo_query_one($sql);
    return $nameBillStatusOrderId;
}







// cart

function addToCart($id_tai_khoan,$idBienThe,$quantity){
    $sql="INSERT INTO giohang (id_tai_khoan,id_bien_the,so_luong) VALUES ($id_tai_khoan,$idBienThe,$quantity)";
    pdo_execute($sql);
}


function addToBill($user_id, $id_bien_the, $quantity, $total_price, $payment_status, $bill_status, $created_datetime) {
    $sql = "INSERT INTO bill (user_id, id_bien_the, quantity, total_price, payment_status, bill_status, created_datetime) VALUES (?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $user_id, $id_bien_the, $quantity, $total_price, $payment_status, $bill_status, $created_datetime);
}

function listAllBillStatus(){
    $sql= "SELECT * FROM billstatus";
    $listAllBillStatus = pdo_query($sql);
    return $listAllBillStatus;
}



// lay ra id san pham
function id_san_phamByCart($id_cart){
    $sql= "SELECT id_san_pham FROM cart WHERE id_cart=$id_cart";
    $id_san_pham=pdo_query($sql);
    return $id_san_pham;
}

// lay ra gia cua san pham
function giaByCart($id_cart){
    $sql= "SELECT gia FROM cart WHERE id_cart=$id_cart";
    $gia_ban=pdo_query($sql);
    return $gia_ban;
}
function IdBienThe(){
    $sql= "SELECT id_bien_the FROM bien_the ";
    $id_bien_the=pdo_query($sql);
    return $id_bien_the;
}
function bienTheOrderId($id_bien_the){
    $sql= "SELECT * FROM bien_the WHERE id_bien_the=$id_bien_the";
    $bienTheOrderId=pdo_query($sql);
    return $bienTheOrderId;
}


function quanBill($id_bill){
    $sql= "SELECT * FROM bill WHERE id_bill=$id_bill";
    $quanBill = pdo_query($sql);
    return $quanBill;
}
function quanCart($id_bill){
    $sql= "SELECT * FROM cart WHERE id_bill=$id_bill";
    $quanCart = pdo_query($sql);
    return $quanCart;
}
function allCart(){
    $sql= "SELECT * FROM cart";
    $allCart = pdo_query($sql);
    return $allCart;
}





function insertBill($bill_status, $payment_status, $ngaydathang,$orderId) {
    $sql = "INSERT INTO bill (id_tai_khoan, bill_name, bill_tel, bill_address, bill_email, total, bill_status, payment_status, ngaydathang,orderId) 
    VALUES (:id_tai_khoan, :bill_name, :sdt, :bill_address, :bill_email, :total, :bill_status, :payment_status, :ngaydathang,:orderId)";

    // Thực thi câu lệnh với tham số và trả về ID của bản ghi mới chèn
    return pdo_execute_bill($sql, [
        ':id_tai_khoan' => $_SESSION['id_tai_khoan'],
        ':bill_name' => $_SESSION['ten_tai_khoan'],
        ':sdt' => $_SESSION['sdt'],
        ':bill_address' => $_SESSION['diachi'],
        ':bill_email' => $_SESSION['email'],
        ':total' => $_SESSION['tongGiaInput'],
        ':bill_status' => $bill_status,
        ':payment_status' => $payment_status,
        ':ngaydathang' => $ngaydathang,
        ':orderId' => $orderId
    ]);
}

function deleteBill($orderId){
    $sql= "DELETE FROM bill WHERE orderId = $orderId";
    pdo_execute($sql);
}


function listAllBillItem($id_bill){
    $sql= "SELECT * FROM bill_item WHERE id_bill=$id_bill";
    $listAllBillItem = pdo_query($sql);
    return $listAllBillItem;
}

function listAllBillItemOrderCart($id_tai_khoan){
    $sql= "";
}


function listOneBill($id_bill){
    $sql= "SELECT * FROM bill WHERE id_bill=$id_bill";
    $listOneBill = pdo_query($sql);
    return $listOneBill;
}

function listAllBillIOrderUser($id_tai_khoan){
    $sql= "SELECT * FROM bill WHERE id_tai_khoan=$id_tai_khoan ORDER BY bill_status ASC, id_bill DESC";
    $listAllBillIOrderUser = pdo_query($sql);
    return $listAllBillIOrderUser;
}
function deleteCart($id_tai_khoan) {
    $sql = "DELETE FROM cart WHERE id_tai_khoan = $id_tai_khoan";
    pdo_execute($sql);
}
function checkCart($id_tai_khoan) {
    $sql = "SELECT COUNT(*) as count FROM cart WHERE id_tai_khoan = $id_tai_khoan";
    $checkCart = pdo_query_one($sql);
    return $checkCart['count'];
}

function pdo_get_last_insert_id() {
    try {
        $conn = pdo_get_connection();
        $lastInsertId = $conn->lastInsertId();
        // lấy giá trị ID tự động tăng (auto-increment) của bản ghi mà bạn đã chèn vào bảng
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
    
    return $lastInsertId;
}

function insertCartAtmMomo($order_id, $item) {
    $sql = "INSERT INTO bill_item (id_bill, id_tai_khoan, img, name, gia, quantity, id_bien_the, thanh_tien) 
            VALUES (:bill_id, :id_tai_khoan, :img, :name, :gia, :quantity, :id_bien_the, :thanh_tien)";

        pdo_execute_cartAtmMomo($sql, [
        ':bill_id' => $order_id, // Sử dụng giá trị $bill_id (tức là $order_id)
        ':id_tai_khoan' => $_SESSION['id_tai_khoan'],
        ':img' => $item['img'],
        ':name' => $item['name'],
        ':gia' => $item['gia'],
        ':quantity' => $item['quantity'],
        ':id_bien_the' => $item['id_bien_the'],
        ':thanh_tien' => $item['thanh_tien']
    ]);
}

function insertCartBill($id_tai_khoan, $ten_tai_khoan, $diachi, $sdt, $email, $payment_status, $ngaydathang, $tongGiaInput, $bill_status, $orderId) {
    $sql = "INSERT INTO bill (id_tai_khoan, bill_name, bill_address, bill_tel, bill_email, payment_status, ngaydathang, total, bill_status, orderId) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Thực thi câu lệnh với các tham số
    return pdo_execute_return_lastInsertId($sql, $id_tai_khoan, $ten_tai_khoan, $diachi, $sdt, $email, $payment_status, $ngaydathang, $tongGiaInput, $bill_status, $orderId);
}




function daThanhToan($bill_id){
    $sql="UPDATE bill SET payment_status=1 WHERE id_bill=$bill_id";
    pdo_execute($sql);
}

function huyDonHang($bill_id){
    $sql="SELECT * FROM bill WHERE id_bill=$bill_id LIMIT 1";
    $huyDonHang=pdo_query($sql);
    return $huyDonHang;
}



?>