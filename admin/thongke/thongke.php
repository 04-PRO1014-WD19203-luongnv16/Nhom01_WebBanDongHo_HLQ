<?php
include_once '../model/thongke.php';
?>
<style>
    .container{
        display: flex;
        height: 460px;
        width: 100%;
        border-bottom: 1px solid navy;
        border-right: 1px solid navy;
    }
    .table{
        height: 430px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
        border-left: 1px solid navy;
    }
    .column{
        height: 430px;
        width:100%;
        margin-right:1px;
        text-align: center;
    }
    .columnTable{
        height: 400px;
    }
    .columnHidden{
        /* background-color: aqua; */
        width: 100%;
    }
    .nameTable{
        height: 30px;
        background-color: #4A5A6A;
        color:wheat;
        line-height: 30px;
        
    }
    .duongke{
        margin-top: 34px;
        width: 80%;
        height: 400px;
        /* border: 1px solid navy; */
        position:absolute;
    }
    .duongke>div{
        height: 43px;
        border-top: 1px dashed  navy;
    }
</style>




<h1 style="text-align:center">Thống kê</h1>
<br>
<hr>
<br>
<h2>Thống kê doanh thu tháng:<?php echo"".$month."-".$year?></h2>

<form action="trangchuadmin.php?act=thongketongquan" method="post">
    <div style="display: flex; float:right;">
        <div style="display: flex;">
            <input type="text" value="Chọn thời gian: " readonly>
            <input type="date" name="inputDate" style="margin-right:50px;">
            <input type="submit" value="Xuất theo tháng." name="btn_xuatTheoThang">
        </div>
    </div>
</form>


<br>
<br>


<?php
$getTotalThanhTien=getTotalThanhTien($month, $year);
echo"<h3>Doanh thu của tháng: ".$getTotalThanhTien." VND </h3>";
echo"<br>";


$getTotalThanhTienBefore=getTotalThanhTienBefore($monthBefore, $year);
if( $getTotalThanhTienBefore > 0){
    echo"<h5>Doanh thu của tháng trước: ".$getTotalThanhTienBefore." VND </h5>";
echo"<br>";
}else{
    echo"<h5>Doanh thu của tháng trước: 0 VND </h5>";
echo"<br>";
}

if($getTotalThanhTienBefore==0){
    echo"<h3>Doanh thu tăng nhanh. </h3>";
}elseif($getTotalThanhTien>$getTotalThanhTienBefore){
    $tangtruong=(($getTotalThanhTien/$getTotalThanhTienBefore)*100 -100);
    $chiSoTangTruong= round($tangtruong,2);
    echo"<h3>Doanh thu tăng: ".$chiSoTangTruong." % (So với tháng trước:".$getTotalThanhTienBefore."VND)</h3>";
}else{
    $tangtruong=(($getTotalThanhTienBefore-$getTotalThanhTien)/$getTotalThanhTienBefore)*100;
    $chiSoTangTruong= round($tangtruong,2);
    echo"<h3>Doanh thu giảm: ".$chiSoTangTruong." % </h3>";
}
echo"<br>";
echo"<br>";

$total_quantity = getTotalQuantity($month, $year);
echo 'Tổng số lượng: ' . $total_quantity;
echo"<br>";

?>

<div class="container">
    <div class="giatien">
        <?php
        // tim doanh thu co gia tri lon nhat
        $maxSumTotal = 0;
        for ($j = 1; $j <= $daysInMonth; $j++) {
            $day = $j;
            // tong doanh thu cua ngay
            $total_sum = thongKeTheoNgay($day, $month, $year);
            // Cập nhật giá trị lớn nhất
            if ($maxSumTotal < $total_sum) {
                $maxSumTotal = $total_sum;
            }
        }
        // lam tron doanh thu
        $max=round_to_second_digit($maxSumTotal);
        ?>
        <div style="width:100%;height:34px;border-bottom:1px solid navy;line-height:30px;">
            <?=$max?>
        </div>

        <?php
        for( $i = 9; $i >= 1; $i-- ){
            $x=$i*$max/10;
            ?>
            <div style="height:43px;width:100%;border-bottom:1px solid navy;line-height:43px;">
                <?= $x?>
            </div>
            <?php
        }
        ?>
        <div style="height:43px;width:100%;line-height:43px;">
                0
            </div>
    </div>
    <div class="table">
    <?php
        for ($i = 1; $i <= $daysInMonth; $i++){
            

            $day = $i;
            $totalSum = thongKeTheoNgay($day, $month, $year);
            // chieu cao cua cot nay la
            $heightColumn=400-($totalSum/$max)*400;
            $column=($totalSum/$max)*400;
            ?>
            <div class="column">
                <div class="columnTable" >
                    <div style="height:<?=$heightColumn?>px;background-color:white;"></div>
                    <div class="columnHidden" style="height:<?=$column?>px;background-color:#87CEEB;"></div>
                </div>
                <div class="nameTable">
                    <?=$i?>
                </div>
            </div>
            <?php
        }
    ?>
    </div>
    <div class="duongke">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>


<div style="display: flex; justify-content: space-between;padding-top:30px;margin-top:30px;">

    <div style="text-align: center;width:45%;border:1px solid #4A5A6A; border-radius: 15px; ">
        <br>
        <br>
        <h2>Top 5 sản phẩm doanh thu cao nhất</h2>
        <br>
        <?php
        $topDoanhThuThang = topDoanhThuThang($month, $year);
        if (!empty($topDoanhThuThang)) {
            foreach ($topDoanhThuThang as $item) {
                ?>
                <div style="display:flex;justify-content: space-between;margin-top:20px;border-bottom:1px solid #4A5A6A;margin:10px;">

                    <div style="display:flex;">
                        <img src="../upload/<?=$item['img']?>" alt="" style="width:30%">
                        <div style="width:60%;margin-top:15px">
                            <h3>Tên sảnn phẩm</h3>
                            <br>
                            <?=$item['name']?>
                        </div>
                    </div>
                    <p style="margin-top:55px"><?=$item['total_thanhtien']?>VND</p>
                    <br>
                </div>
                <?php
            }
            
        } else {
            echo 'No data found.';
        }
        ?>
    </div>


    <div style="text-align: center;width:45%;border:1px solid #4A5A6A; border-radius: 15px; ">
        <br>
        <br>
        <h2>Top 5 sản phẩm bán chạy nhất</h2>
        <br>
        <?php
        $topBanChayThang = topBanChayThang($month, $year);
        if (!empty($topBanChayThang)) {
            foreach ($topBanChayThang as $item) {
                ?>
                <div style="display:flex;justify-content: space-between;margin-top:20px;border-bottom:1px solid #4A5A6A;margin:10px;">
                    <div style="display:flex;">
                        <img src="../upload/<?=$item['img']?>" alt="" style="width:30%">
                        <div style="width:60%;margin-top:15px">
                            <h3>Tên sản phẩm</h3>
                            <br>
                            <?=$item['name']?>
                        </div>
                    </div>
                    <p style="margin-top:55px"><?=$item['total_quantity']?></p>
                    <br>
                </div>
                <?php
            }
            
        } else {
            echo 'No data found.';
        }
        ?>
    </div>

</div>







