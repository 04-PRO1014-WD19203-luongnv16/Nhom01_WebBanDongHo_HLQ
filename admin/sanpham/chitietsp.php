<h1>Sản phẩm có biến thể</h1>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        text-align: left;
    }
    
    th, td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }
    
    th {
        background-color: #f2f2f2;
        color: #333;
    }
    
    tr:hover {
        background-color: #f1f1f1;
    }
    
    img {
        border-radius: 5px;
    }

    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .nut, .nutxoa {
        padding: 10px 15px;
        margin: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
    }

    .nut a, .nutxoa a {
        color: white;
        text-decoration: none;
    }

    .nut {
        background-color: #007BFF; /* Green */
    }

    .nut:hover {
        background-color: #007BFF;
    }

    .nutxoa {
        background-color: #f44336; /* Red */
    }

    .nutxoa:hover {
        background-color: #da190b;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Tên Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>ID Biến Thể</th>
            <th>ID Kích Thước</th>
            <th>Giá Nhập</th>
            <th>Giá Bán</th>
            <th>Số Lượng</th>
            <th>Quản lý</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($listBienTheOrderSanPham as $bienTheOrderSanPham){
            foreach($sanPhamOrderBill as $phamOrderBill){
        ?>
        <tr>
            <td><?=$phamOrderBill['ten_san_pham']?></td>
            <td>
                <img src="../upload/<?=$phamOrderBill['hinh_anh']?>" alt="" style="width:150px">
            </td>
            <td><?=$bienTheOrderSanPham['id_bien_the']?></td>
            <td><?=$bienTheOrderSanPham['id_kich_thuoc']?></td>
            <td><?=$bienTheOrderSanPham['gia_nhap']?></td>
            <td><?=$bienTheOrderSanPham['gia_ban']?></td>
            <td><?=$bienTheOrderSanPham['so_luong']?></td>
            <td>
                <button class="nut">
                    <a class="nutt" href="trangchuadmin.php?act=suasp&&id_bien_the=<?= $bienTheOrderSanPham['id_bien_the'] ?>&&id_san_pham=<?= $id_san_pham ?>">Sửa</a>
                </button>
                <button class="nutxoa">
                    <a onclick="error()" class="nutxoa" href="trangchuadmin.php?act=xoabienthe&&id_bien_the=<?= $bienTheOrderSanPham['id_bien_the'] ?>">Xóa</a>
                </button>
            </td>
        </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
