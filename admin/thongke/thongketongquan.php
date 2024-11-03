<form action="trangchuadmin.php?act=thongketongquan" method="post" class="form_search_date">
    <div><label for="">Top 10 sản phẩm bán chạy trong tháng</label></div>
    <div style="display: flex;">
        <div>
            <input type="date" name="input_date" id="" width="">
        </div>
        <input type="submit" value="Submit" name="btn_searchDate">
    </div>
</form>
<br>

<style>


/* Màu Xanh Dương (#0074D9) sản phẩm
Màu Đỏ (#FF4136) doanh thu
Màu Xanh Lá Cây (#2ECC40) lợi nhận*/
.form_search_date{
    display: flex;
    justify-content: center;
}
.form_search_date div{
    padding-right: 20px;
}
.product_statisticsTable{
    height: 440px;
    display: grid;
    grid-template-columns: 30px auto;
}
.metric_columns{
    height: 440px;
    width: 30px;
    display: grid;
    grid-template-rows: 40px 40px 40px 40px 40px 40px 40px 40px 40px 40px 40px ;

}
.box_metric_columns{
    height: 40px;
    border-bottom: 1px solid #0074D9;
    float: right;
}
.box_metric_columns>p{
    float: right;
    color:0074D9;
}
.product_table {
    height: 440px;
    border-bottom: 1px solid navy;
    border-left: 1px solid navy;
    display: grid;
    grid-template-columns: repeat(10, 1fr);
    gap: 20px;
    position: relative;
}
.quantityShowNavy {
    background-color: #0074D9;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    position: absolute;
    
}
.heightTotalPriceShow{
    position:absolute;
    bottom: 5px;
   
}
.totalPriceShowRed{
    background-color: #FF4136;
    height: 10px;
    width: 10px;
    border-radius: 50%;
}
.totalProfitShowGreen{
    background-color: #2ECC40;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    position:absolute;
    bottom: 0px;
}
.heightTotalPriceShow{
    /* background-color: pink; */
}
.heightProfitShow{
    background-color: black;
    position:absolute;
    top: 45px;
}
.line {
    position: absolute;
    height: 3px;
    z-index: 1; /* Đảm bảo đường nối nằm trên các phần tử khác */
}
</style>
<p style="color:#0074D9;">Màu Xanh Dương sản phẩm-số lượng</p>
<p style="color:#FF4136;">Màu Đỏ  doanh thu</p>
<p style="color:#2ECC40;">Màu Xanh Lá Cây  lợi nhận</p>
<?php
// so san pham co bien the ban nhieu nhat
echo "Số lượng: " . $oneTatolQuantity[0]['max_total_quantity'];
?>
<div class="product_statisticsTable">
    <div class="metric_columns">
        <?php
        $i=10;
        // Làm tròn đến số thập phân thứ hai
        $roundedColum = round($number_metric_columns, 2);
        for($i;$i >=0;$i--){
            $showRoundedColum = $roundedColum*$i;
            ?>
            <div class="box_metric_columns">
                <p><?=($oneTatolQuantity[0]['max_total_quantity']/10)*$i?></p>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="product_table">
        <?php
        foreach($thongKeOrderTatolQuantity as $keOrderTatolQuantity){
            $id_bien_the=$keOrderTatolQuantity['id_bien_the'];
            $total_quantity=$keOrderTatolQuantity['so_luong'];
            $total_price=$keOrderTatolQuantity['total'];
            //   số px cần hiển thị =tổng doanh thu * (400/ tổng doanh thu lớn nhất)
            $heightTotalQuantityShow=$total_quantity*(400/$oneTatolQuantity[0]['max_total_quantity']);
            $heightTotalQuantityHidden=440-$heightTotalQuantityShow;
            // số px cần hiển thị = doanh thu * thước đo tiền tệ
            $heightTotalPriceShow=$total_price*$tatolPrice_columns;
            ?>
            <div class="product_tableTotalQuantity">
                <div class="heightTotalQuantityHidden" style="height: <?=$heightTotalQuantityHidden?>px;"></div>
                <div class="heightTotalQuantityShow" style="height: <?=$heightTotalQuantityShow?>px;">
                    <div class="quantityShowNavy"></div>
                </div>
                <div class="heightTotalPriceShow" style="height:<?=$heightTotalPriceShow?>px;">
                    <div class="totalPriceShowRed"></div>
                </div>
                <?php
                foreach($allBienTheOrderBill as $bienTheOrderBill){
                    if($id_bien_the==$bienTheOrderBill['id_bien_the']){
                        //tổng lợi nhuận=(giá bán- giá nhập)* tổng số lượng đã bán
                        $totalProfitShow=($bienTheOrderBill['gia_ban']-$bienTheOrderBill['gia_nhap'])*$keOrderTatolQuantity['so_luong'];
                        // số px cần hiển thị = lợi nhuận * thước đo tiền tệ
                        $heightProfitHidden= $totalProfitShow*$tatolPrice_columns;
                        $heightProfitQuantityShow=400-$heightProfitHidden;
                        // $heightProfitShow=400-($totalProfitShow*(400/$oneTatolQuantity[0]['max_total_quantity']));
                        ?>
                        <div class="heightProfitShow" style="height:<?=$heightProfitQuantityShow?>px;">
                            <div class="totalProfitShowGreen"></div>
                        </div>
                        <!-- <?=$totalProfitShow?>:<?=$total_price?> -->
                        <?php
                    }
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<div style="padding: 30px;display: grid; grid-template-columns:auto auto auto auto auto auto auto auto auto auto ; gap: 20px;width: 100%;">
    <?php
    foreach($thongKeOrderTatolQuantity as $keOrderTatolQuantity){
        $id_bien_the=$keOrderTatolQuantity['id_bien_the'];
        foreach($allBienTheOrderBill as $bienTheOrderBill){
            if($bienTheOrderBill['id_bien_the']==$keOrderTatolQuantity['id_bien_the']){
                foreach($allProductOrderBill as $productOrderBill){
                    if($productOrderBill['id_san_pham']==$bienTheOrderBill['id_san_pham']){
                        ?>
                        <div style="width:100%">
                            <p>Quantity:<?=$keOrderTatolQuantity['total_quantity']?></p>
                            <img src="../upload/<?=$productOrderBill['hinh_anh']?>" alt="" style="width:50px;height:50px;">
                            <p><?=$productOrderBill['ten_san_pham']?></p>
                        </div>
                        <?php
                    }
                }
            }
        }
    }
    ?>
</div>
<div>
<h3>Thông tin bán hàng của tháng</h3>

<?php
foreach($allThongKeOrderTatolQuantity as $allthongKeOrderTatolQuantity){
    $id_bien_the=$allthongKeOrderTatolQuantity['id_bien_the'];
    foreach($allBienTheOrderBill as $allbienTheOrderBill){
        if($allbienTheOrderBill['id_bien_the']==$allthongKeOrderTatolQuantity['id_bien_the']){
            foreach($allProductOrderBill as $allproductOrderBill){
                $turnovers=0;
                $profits=0;
                if($allproductOrderBill['id_san_pham']==$allbienTheOrderBill['id_san_pham']){
                    $profit=$allthongKeOrderTatolQuantity['total']-($allthongKeOrderTatolQuantity['so_luong']*$allbienTheOrderBill['gia_nhap']);
                    $turnover=$allthongKeOrderTatolQuantity['total'];
                    ?>
                    <div style="display:flex; border-bottom: 1px solid #0074D9;" >
                        <div>
                            <img src="../upload/<?=$allproductOrderBill['hinh_anh']?>" alt="" style="width:200px;">
                        </div>
                        <div>
                            <p>Name_product: <?=$allproductOrderBill['ten_san_pham']?></p>
                            <p>Size: <?=$allbienTheOrderBill['id_kich_thuoc']?></p>
                            <p>Total quantity:<?=$allthongKeOrderTatolQuantity[' ']?> - Quantity in stock :<?=$allbienTheOrderBill['so_luong']?></p>
                            <p>Turnover:<?=$turnover?> - Profit:<?=$profit?></p>
                        </div>
                    </div>
                    <br>
                    <?php
                }
            }
        }
    }
}
?>
</div>






<script>



function drawLines() {
    const container = document.querySelector('.product_table');
    
    // Kết hợp các phần tử từ ba lớp khác nhau vào một mảng
    const allItems = [
        ...container.querySelectorAll('.quantityShowNavy'),
        ...container.querySelectorAll('.totalProfitShowGreen'),
        ...container.querySelectorAll('.totalPriceShowRed')
    ];

    // Xóa các đường nối cũ
    const existingLines = container.querySelectorAll('.line');
    existingLines.forEach(line => line.remove());

    container.style.position = 'relative';

    // Hàm để vẽ đường nối cho các phần tử cùng lớp
    function drawLinesForClass(className, color) {
        const items = container.querySelectorAll(className);

        items.forEach((item, index) => {
            if (index < items.length - 1) {
                const currentItem = items[index];
                const nextItem = items[index + 1];

                const currentRect = currentItem.getBoundingClientRect();
                const nextRect = nextItem.getBoundingClientRect();
                const containerRect = container.getBoundingClientRect();

                const line = document.createElement('div');
                line.className = 'line'; // Thêm class để dễ dàng xóa các đường nối cũ
                line.style.position = 'absolute';
                line.style.backgroundColor = color; // Chọn màu sắc cho đường nối
                line.style.height = '3px'; // Đặt chiều cao cho đường nối để dễ nhìn thấy

                const length = Math.sqrt(Math.pow(nextRect.left - currentRect.left, 2) + Math.pow(nextRect.top - currentRect.top, 2));
                line.style.width = `${length}px`;

                const angle = Math.atan2(nextRect.top - currentRect.top, nextRect.left - currentRect.left) * (180 / Math.PI);
                line.style.transform = `rotate(${angle}deg)`;
                line.style.transformOrigin = '0 0';

                line.style.left = `${currentRect.left - containerRect.left + (currentRect.width / 2)}px`;
                line.style.top = `${currentRect.top - containerRect.top + (currentRect.height / 2)}px`;

                container.appendChild(line);
            }
        });
    }

    // Vẽ đường nối cho từng lớp
    drawLinesForClass('.quantityShowNavy', '#0074D9'); // Xanh dương
    drawLinesForClass('.totalProfitShowGreen', '#2ECC40'); // Xanh lá cây
    drawLinesForClass('.totalPriceShowRed', '#FF4136'); // Đỏ
}

// Gọi hàm khi trang được tải và khi cửa sổ thay đổi kích thước
window.addEventListener('load', drawLines);
window.addEventListener('resize', drawLines);




</script>