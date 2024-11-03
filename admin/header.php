<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản Lý Trang Bán Đồng Hồ</title>
    <link rel="stylesheet" href="../admin/css/admin.css" />
  </head>
  <body>
    <div class="sidebar">
      <h2>Quản Lý</h2>
      <ul>
        <li><a href="#" onclick="showPage('dashboard')">Trang Chính</a></li>
        <li><a href="trangchuadmin.php?act=listdanhmuc">Danh mục</a></li>
        <li><a href="trangchuadmin.php?act=loadallproduct" onclick="showPage('products')">Sản Phẩm</a></li>
        <li><a href="trangchuadmin.php?act=listsize" onclick="showPage('products')">Quản lý Size</a></li>
        <li><a href="trangchuadmin.php?act=listAllBill" onclick="showPage('orders')">Đơn Hàng</a></li>
        <li><a href="trangchuadmin.php?act=thongketongquan" onclick="showPage('reports')">Thống kê</a></li>
        <li><a href="../controler/trangchu.php" onclick="showPage('reports')">Thoát</a></li>
      </ul>
    </div>
