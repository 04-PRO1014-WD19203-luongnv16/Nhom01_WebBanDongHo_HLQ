<?php
function pdo_quer_thongke($sql, array $args = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Xử lý lỗi hoặc ghi lại lỗi
        throw $e;
    } finally {
        // Đóng kết nối PDO
        $conn = null;
    }
}


function round_to_second_digit($maxSumTotal) {
    // Xác định số chữ số của số
    $digits = strlen((string)$maxSumTotal);

    // Xác định cấp bậc làm tròn
    $round_to = pow(10, $digits - 2);

    // Làm tròn số lên đến cấp bậc gần nhất
    return ceil($maxSumTotal / $round_to) * $round_to;
}


// Hàm thống kê tổng theo ngày và trả về ngày không có số 0 ở trước
function thongKeTheoNgay($day, $month, $year) {
    // Câu lệnh SQL
    $sql = 'SELECT SUM(total) AS total_sum
            FROM bill
            WHERE DAY(STR_TO_DATE(ngaydathang, "%r %d/%m/%y")) = :day
            AND MONTH(STR_TO_DATE(ngaydathang, "%r %d/%m/%y")) = :month
            AND YEAR(STR_TO_DATE(ngaydathang, "%r %d/%m/%y")) = :year
            AND bill_status = 4';

    // Gọi hàm pdo_query và truyền tham số
    $result = pdo_quer_thongke($sql, [
        ':day' => $day,
        ':month' => $month,
        ':year' => $year
    ]);

    // Xử lý kết quả
    $total_sum = isset($result['total_sum']) ? $result['total_sum'] : 0;

    return $total_sum;
}



function topDoanhThuThang($month, $year) {
    $sql = 'SELECT 
        bi.id_bien_the,
        bi.img,
        bi.name,
        SUM(bi.thanh_tien) AS total_thanhtien
    FROM 
        bill b
    JOIN 
        bill_item bi 
    ON 
        b.id_bill = bi.id_bill
    WHERE 
        b.bill_status = 4
        AND MONTH(STR_TO_DATE(b.ngaydathang, "%r %d/%m/%y")) = :month
        AND YEAR(STR_TO_DATE(b.ngaydathang, "%r %d/%m/%y")) = :year
    GROUP BY 
        bi.id_bien_the, bi.img, bi.name
    ORDER BY 
        total_thanhtien DESC
    LIMIT 5';

    return pdo_query_thang($sql, [
        ':month' => $month,
        ':year' => $year
    ]);
}

function topBanChayThang($month, $year) {
    $sql = 'SELECT 
        bi.id_bien_the,
        bi.img,
        bi.name,
        SUM(bi.quantity) AS total_quantity
    FROM 
        bill b
    JOIN 
        bill_item bi 
    ON 
        b.id_bill = bi.id_bill
    WHERE 
        b.bill_status = 4
        AND MONTH(STR_TO_DATE(b.ngaydathang, "%r %d/%m/%y")) = :month
        AND YEAR(STR_TO_DATE(b.ngaydathang, "%r %d/%m/%y")) = :year
    GROUP BY 
        bi.id_bien_the, bi.img, bi.name
    ORDER BY 
        total_quantity DESC
    LIMIT 5';

    return pdo_query_thang($sql, [
        ':month' => $month,
        ':year' => $year
    ]);
}
function getTotalThanhTien($month, $year) {
    $sql = 'SELECT 
        SUM(bi.thanh_tien) AS total_thanhtien
    FROM 
        bill b
    JOIN 
        bill_item bi 
    ON 
        b.id_bill = bi.id_bill
    WHERE 
        b.bill_status = 4
        AND MONTH(STR_TO_DATE(b.ngaydathang, "%r %d/%m/%y")) = :month
        AND YEAR(STR_TO_DATE(b.ngaydathang, "%r %d/%m/%y")) = :year';

    // Gọi hàm pdo_query_value để lấy giá trị tổng
    return pdo_query_valueArray($sql, [
        ':month' => $month,
        ':year' => $year
    ]);
}

function getTotalThanhTienBefore($monthBefore, $year) {
    $sql = 'SELECT 
        SUM(bi.thanh_tien) AS total_thanhtien
    FROM 
        bill b
    JOIN 
        bill_item bi 
    ON 
        b.id_bill = bi.id_bill
    WHERE 
        b.bill_status = 4
        AND MONTH(STR_TO_DATE(b.ngaydathang, "%r %d/%m/%y")) = :month
        AND YEAR(STR_TO_DATE(b.ngaydathang, "%r %d/%m/%y")) = :year';

    // Gọi hàm pdo_query_value để lấy giá trị tổng
    return pdo_query_valueArray($sql, [
        ':month' => $monthBefore,
        ':year' => $year
    ]);
}

function getTotalQuantity($month, $year) {
    $sql = 'SELECT 
        SUM(bi.quantity) AS total_quantity
    FROM 
        bill b
    JOIN 
        bill_item bi 
    ON 
        b.id_bill = bi.id_bill
    WHERE 
        b.bill_status = 4
        AND MONTH(STR_TO_DATE(b.ngaydathang, "%r %d/%m/%y")) = :month
        AND YEAR(STR_TO_DATE(b.ngaydathang, "%r %d/%m/%y")) = :year';

    // Gọi hàm pdo_query_value để lấy giá trị tổng
    return pdo_query_valueArray($sql, [
        ':month' => $month,
        ':year' => $year
    ]);
}


function pdo_query_valueArray($sql, array $args = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        $conn = null;
    }
}



function pdo_query_thang($sql, array $args = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args); // Đảm bảo mảng tham số đúng
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả các hàng dữ liệu
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        $conn = null; // Đóng kết nối
    }
}


?>