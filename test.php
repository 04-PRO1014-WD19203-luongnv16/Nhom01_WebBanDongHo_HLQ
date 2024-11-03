<form action="test.php" method="post">
    <div style="display: flex; float:right;">
        <div style="display: flex;">
            <input type="text" value="Chọn thời gian: " readonly>
            <input type="date" name="inputDate" style="margin-right:50px;">
            <input type="submit" value="Xuất theo tháng." name="btn_xuatTheoThang">
        </div>
    </div>
</form>



<?php

if (isset($_POST['btn_xuatTheoThang'])) {
    // Kiểm tra nếu input date có giá trị
    if (!empty($_POST['inputDate'])) {
        $inputDate = $_POST['inputDate'];
        
        // Tách tháng và năm từ input date
        $date = new DateTime($inputDate);
        $month = $date->format('m');
        $year = $date->format('Y');
        
        // Hiển thị kết quả để kiểm tra
        echo "<script>alert('Input Date: {$inputDate}, Tháng: {$month}, Năm: {$year}');</script>";
    } else {
        echo "<script>alert('Vui lòng chọn ngày tháng.');</script>";
    }
}

?>
