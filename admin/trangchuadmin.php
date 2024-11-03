<?php
include_once 'header.php';
include_once '../model/pdo.php';
include_once '../model/danhmuc.php';
include_once '../model/sanpham.php';
include_once '../model/cart.php';
include_once '../model/thongke.php';
include_once 'home.php';


    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch($act){
            //thêm danh mục 
            case 'themdanhmuc':
             if(isset($_POST['addnew'])&&($_POST['addnew'])){
                $ten_danh_muc=$_POST['ten_danh_muc'];
                insert_danhmuc($ten_danh_muc);
                $thong_bao="Thêm thành công";
                }
                include "danhmuc/themdanhmuc.php";
            break;
            // danh sách danh mục 
            case 'listdanhmuc':
                $listdanhmuc=listdanhmuc();
                 include_once "danhmuc/listdanhmuc.php";
                break;
            //xóa danh mục
            case 'xoadanhmuc':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                $id_danh_muc=$_GET['id'];
                delete_danhmuc($id_danh_muc);
                 }
                $listdanhmuc=listdanhmuc();
                include_once "danhmuc/listdanhmuc.php";
                 break;
            case 'suadanhmuc':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sua_danh_muc=sua($_GET['id']);
                }
                include_once "danhmuc/suadanhmuc.php";
                break;
            //sửa danh mục
            case 'updatedanhmuc':
                 if(isset($_POST['btn_capnhap'])&&($_POST['btn_capnhap'])){
                $ten_danh_muc=$_POST['ten_danh_muc'];
                $id_danh_muc=$_POST['id_danh_muc'];
                update_danhmuc($id_danh_muc,$ten_danh_muc);
                $thong_bao="Cập nhập thành công";
                }               
                $listdanhmuc=listdanhmuc();
                include_once "danhmuc/listdanhmuc.php";
                break;
            //list size
            case 'listsize':
                $listsize=listkichthuoc();
                include "size/listsize.php";
                break;
            //thêm size:
            case 'themsize':
                if(isset($_POST['addnew'])&&($_POST['addnew'])){
                    $size=$_POST['size'];
                    insert_size($size);
                    $thong_bao="Thêm thành công";
                    }
                    include "size/themsize.php";
                break;
            case 'suasize':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sua_kich_thuoc=suasize($_GET['id']);
                }
                include_once "size/suasize.php";
                break;
             //sửa size
            case 'updatesize':
                    if(isset($_POST['btn_capnhap'])&&($_POST['btn_capnhap'])){
                   $size=$_POST['size'];
                   $id_kich_thuoc=$_POST['id_kich_thuoc'];
                   update_kichthuoc($id_kich_thuoc,$size);
                   $thong_bao="Cập nhập thành công";
                   }               
                   $listsize=listkichthuoc();
                   include_once "size/listsize.php";
                   break;
             //xóa size
             case 'xoasize':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                $id_kich_thuoc=$_GET['id'];
                delete_kichthuoc($id_kich_thuoc);
                 }
                $listsize=listkichthuoc();
                include_once "size/listsize.php";
                 break;
            //thêm sản phẩm
        
            case 'themsanpham':
                if (isset($_POST['btn_them'])) {
                    $ten_san_pham = $_POST['ten_san_pham'];
                    $mo_ta = $_POST['mo_ta'];
                    $ngay_nhap = $_POST['ngay_nhap'];
                    $id_danh_muc = $_POST['ten_danh_muc']; 
            
                    // Hình ảnh   
                    $hinh_anh = $_FILES['hinh_anh']['name'];
                    $tmp = $_FILES['hinh_anh']['tmp_name'];
                    move_uploaded_file($tmp, '../upload/' . $hinh_anh); 
            
                    // Chèn sản phẩm vào cơ sở dữ liệu
                    insert_sanpham($ten_san_pham, $hinh_anh, $mo_ta, $ngay_nhap, $id_danh_muc);
            
                    // Lấy ID sản phẩm vừa chèn
                    $id_san_pham = idProduct();
            
                    // Xử lý biến thể
                    $sizes = $_POST['size'];
                    $gia_nhap_arr = $_POST['gia_nhap'];
                    $gia_ban_arr = $_POST['gia_ban'];
                    $so_luong_arr = $_POST['so_luong'];
            
                    // Duyệt từng phần tử trong mảng của biến thể
                    for ($i = 0; $i < count($sizes); $i++) {
                        $id_kich_thuoc = $sizes[$i];
                        $gia_nhap = $gia_nhap_arr[$i];
                        $gia_ban = $gia_ban_arr[$i];
                        $so_luong = $so_luong_arr[$i];
                        insert_bien_the($id_san_pham, $id_kich_thuoc, $gia_nhap, $gia_ban, $so_luong);
                    }
                }
            
                $listkichthuoc = listkichthuoc();
                $listdanhmuc = listdanhmuc();
                include_once "sanpham/themsanpham.php";
                break;
         
            //trang chi tiết sản phẩm admin và biến thể
            case 'chitietspadmin':
                if (isset($_GET['id_san_pham']) && $_GET['id_san_pham']) {
                    $id_san_pham = $_GET['id_san_pham'];
                    $listProduct = spchitietadmin($id_san_pham);

                    $listBienTheOrderSanPham=listBienTheOrderSanPham($id_san_pham);
                    $sanPhamOrderBill=sanPhamOrderBill($id_san_pham);
                } else {
                    // Xử lý khi không có id_san_pham
                    // Ví dụ: chuyển hướng hoặc thông báo lỗi
                }
                
                include_once "sanpham/chitietsp.php";
                break;
            
            // xóa biến thể
            case 'xoabienthe':
                if (isset($_GET['id_bien_the']) && ($_GET['id_bien_the'] > 0)) {
                    $id_bien_the = $_GET['id_bien_the'];
                    xoa_bienthe($id_bien_the);
                }
            
                if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {
                    $id_san_pham = $_GET['id_san_pham'];
                    $listProduct = spchitietadmin($id_san_pham);
                } else {
                    // Xử lý khi id_san_pham không tồn tại
                    $listProduct = [];
                    // Hoặc chuyển hướng hoặc thông báo lỗi
                }
                include_once "sanpham/chitietsp.php";
                break;
            
            // //danh sách sản phẩm 
            case 'loadallproduct':
                $listdanhmuc=listdanhmuc();
                $listProduct=listProduct();
               
                include_once "sanpham/loadallproduct.php";
            
                break;
            // //xóa sản phẩm
            case 'xoasp':
                if(isset($_GET['id_san_pham'])&&($_GET['id_san_pham']>0)){
                    delete_sanpham($_GET['id_san_pham']);
                }
                $listProduct=listProduct();
                
                include "sanpham/loadallproduct.php";
                break;
            //lấy 
            case 'suasp':
                if (isset($_GET['id_bien_the']) && isset($_GET['id_san_pham'])) {
                    $id_bien_the = $_GET['id_bien_the'];
                    $id_san_pham = $_GET['id_san_pham'];
                }
            
                $loadOneBienThe = loadOneBienThe($id_bien_the);
                $loadOneProduct = loadOneProduct($id_san_pham);
            
                $listAllKichThuoc = listAllKichThuoc();
                $listdanhmuc = listdanhmuc();
                $listsanpham = listsanpham();
            
                include_once "sanpham/suasanpham.php";
                break;
            
            // //update sản phẩm 
            case 'updatesp':
                if(isset($_POST['btn_capnhap'])){


                    $id_bien_the = $_POST['id_bien_the'];
                    $id_san_pham = $_POST['id_san_pham'];
                    $mo_ta=$_POST['mo_ta'];

                    $ten_san_pham = $_POST['ten_san_pham'];
                    $id_kich_thuoc=$_POST['id_kich_thuoc'];
                    $gia_nhap=$_POST['gia_nhap'];
                    $gia_ban=$_POST['gia_ban'];
                    $so_luong=$_POST['so_luong'];

                    
                    updateBienThe($id_bien_the,$id_kich_thuoc,$gia_nhap,$gia_ban,$so_luong);

                    updateProduct($id_san_pham,$ten_san_pham,$mo_ta);
                }
                $listdanhmuc=listdanhmuc();
                $listProduct=listProduct();
                include_once 'sanpham/loadallproduct.php';
   
            //đơn hàng
            case 'listAllBill':
                if(isset($_POST['id_bill_status'])){
                    $id_bill_status = $_POST['id_bill_status'];
                    $listBill=listBillOrderBillStatus($id_bill_status);
                }else{
                    $listBill=listAllBill();
                }
                $allPaymentStatus=allPaymentStatus();
                $listAllBillStatus=listAllBillStatus();
                $listOneBienTheTheBill=listOneBienTheTheBill();
                include_once 'donhang/listallbill.php';
                break;
            

            case'trangThaiDonHang':
                if(isset($_GET['id_bill'])){
                    $id_bill = $_GET['id_bill'];
                    $bill_id = $_GET['id_bill'];
                    $billStatusOld = $_GET['billStatusOld'];
                    $billStatusNew = $_POST['idbillstatus'];
                    // echo "<script>alert('Id_bill:{$id_bill}&& billStatusOld: {$billStatusOld} && billStatusNew:{$billStatusNew}');</script>";

                    // Chờ xác nhận thì billStatusOld=1 khi đó Đang giao (2) và Hoàn thành (3) phải kiểm tra số lượng sản phẩm trong kho còn đủ không
                    if($billStatusOld==1){

                        if($billStatusNew==2 || $billStatusNew== 3 || $billStatusNew== 4){
                                
                            // lấy thông tin trong bảng bill_item
                            $listAllBillItem=listAllBillItem($id_bill);
                            foreach($listAllBillItem as $allBillItem){

                                
                                $name=$allBillItem['name'];
                                $id_bien_the=$allBillItem['id_bien_the'];

                                // lấy thông tin trong bảng biến thể
                                $bienTheOrderId=bienTheOrderId($id_bien_the);
                                $kiemtrasoluong=true;
                                foreach($bienTheOrderId as $theOrderId){
                                    if(($theOrderId['so_luong'])<($allBillItem['quantity'])){
                                        // $kiemtrasoluong=false;
                                        echo "<script>alert('Số lượng sản phẩm {$name} không đủ để đặt hàng');</script>";
                                        $kiemtrasoluong = false;
                                        break; // Thoát khỏi vòng lặp foreach
                                    }

                                }

                                if($kiemtrasoluong==true){
                                    // lấy thông tin trong bảng biến thể
                                    foreach($listAllBillItem as $allBillItem){
                                    
                                        $name=$allBillItem['name'];
                                        $id_bien_the=$allBillItem['id_bien_the'];
                                        $bienTheOrderId=bienTheOrderId($id_bien_the);
                                        // lấy thông tin trong bảng biến thể
                                        foreach($bienTheOrderId as $theOrderId){
                                                
                                            $so_luong=$theOrderId['so_luong'];
                                            $quantity=$allBillItem['quantity'];
                                            $expected_quantity=$so_luong-$quantity;
            
                                            orderAcceptBienThe($id_bien_the,$expected_quantity);
                                            trangThaiDonHang($bill_id,$billStatusNew);  
                                        }
                                    }
                                    echo "<script>alert('Đã thực hiện yêu cầu của đơn hàng');</script>";
                                    if($billStatusNew==4){
                                        $billStatusNew=4;
                                        trangThaiDonHang($bill_id,$billStatusNew);
                                        daThanhToan($bill_id);
                                    }
                                }
                            }      
                            // Nếu billStatusNew==4 thì muốn hủy đơn chuyển trạng thái thành Hủy
                        }elseif($billStatusNew==5){

                            trangThaiDonHang($bill_id,$billStatusNew);
                            echo "<script>alert('Đã hủy đơn hàng.');</script>";
                        }
                        // Đang gia chỉ được chọn giao thành công không thể hủy 
                    }elseif($billStatusNew==5){
                        // Muốn hủy đơn
                        if($billStatusOld == 2||$billStatusOld == 3){
                            // lấy thông tin trong bảng bill_item
                            $listAllBillItem=listAllBillItem($id_bill);
                            foreach($listAllBillItem as $allBillItem){
                                    
                                $name=$allBillItem['name'];
                                $id_bien_the=$allBillItem['id_bien_the'];
                                $bienTheOrderId=bienTheOrderId($id_bien_the);
                                // lấy thông tin trong bảng biến thể
                                foreach($bienTheOrderId as $theOrderId){
                                        
                                    $so_luong=$theOrderId['so_luong'];
                                    $quantity=$allBillItem['quantity'];
                                    $expected_quantity=$so_luong+$quantity;
    
                                    orderAcceptBienThe($id_bien_the,$expected_quantity);
                                    trangThaiDonHang($bill_id,$billStatusNew);  
                                }
                            }
                            echo "<script>alert('Đã thực hiện yêu cầu của đơn hàng');</script>";

                        }
                    }else{
                        trangThaiDonHang($bill_id,$billStatusNew);  
                        echo "<script>alert('Đã thực hiện yêu cầu của đơn hàng');</script>";
                    }
                }

                
            $listAllBill=listAllBill();
            $listOneBienTheTheBill=listOneBienTheTheBill();
            if(isset($_POST['id_bill_status'])){
                $id_bill_status = $_POST['id_bill_status'];
                $listBill=listBillOrderBillStatus($id_bill_status);
            }else{
                $listBill=listAllBill();
            }
            $allPaymentStatus=allPaymentStatus();
            $listAllBillStatus=listAllBillStatus();
            $listOneBienTheTheBill=listOneBienTheTheBill();
            include_once 'donhang/listallbill.php';
        break;

        case 'viewDetail':

            $id_bill=$_GET['id_bill'];

            $listAllBillItem=listAllBillItem($id_bill);
            $listOneBill= listOneBill($id_bill);
            $quanBill=quanBill($id_bill);
            $quanCart=quanCart($id_bill);
            $allCart=allCart();
            include 'donhang/chitietdonhang.php';
        break;
                
        case 'thongketongquan':
            if (isset($_POST['btn_xuatTheoThang'])) {
                // Kiểm tra nếu input date có giá trị
                if (!empty($_POST['inputDate'])) {
                    $inputDate = $_POST['inputDate'];
                    
                    // Tách tháng và năm từ input date
                    $date = new DateTime($inputDate);
                    $month = $date->format('m');
                    $year = $date->format('Y');

                    // Gọi hàm để lấy tổng quantity
                    $total_quantity = getTotalQuantity($month, $year);
                    
                    
                    if(!empty($total_quantity)){
                        // Tính số ngày trong tháng hiện tại
                        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

                        $dateBefore = new DateTime($inputDate);
                        $dateBefore->modify('-1 month'); // Trừ đi một tháng

                        $monthBefore = $dateBefore->format('m'); // Lấy tháng sau khi trừ đi một tháng
                        $yearBefore = $dateBefore->format('Y'); // Lấy năm sau khi trừ đi một tháng

                        // Gọi hàm để lấy tổng số lượng hoặc tổng giá trị trước đó
                        $total_quantityBefore = getTotalThanhTienBefore($monthBefore, $yearBefore);

                        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

                        // Hiển thị kết quả để kiểm tra
                        echo "<script>alert('Thống kê theo tháng: {$month}, Năm: {$year}');</script>";
                        include_once'thongke/thongke.php';
                    }else{

                        // Hiển thị kết quả để kiểm tra
                        echo "<script>alert('Tháng: {$month}, Năm: {$year} không có dữ liệu.');</script>";

                        $day = date('j');  // Ngày không có số 0 ở trước (1-31)
                        $month = date('m'); // 'n' trả về tháng không có số 0 ở đầu (1-12) m có trả về số 0
                        $year = date('Y'); // 'Y' trả về năm với 4 chữ số (ví dụ: 2024)


                        $dateBefore = new DateTime();

                        $dateBefore->modify('-1 month'); // Trừ đi một tháng
                        $monthBefore = $dateBefore->format('m'); // Lấy tháng sau khi trừ đi một tháng
                        $total_quantityBefore = getTotalThanhTienBefore($monthBefore, $year);
                        // Tính số ngày trong tháng hiện tại
                        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                        include_once'thongke/thongke.php';
                    }
                } else {
                    echo "<script>alert('Vui lòng chọn ngày tháng.');</script>";
                }
            }else{
                // Lấy tháng và năm hiện tại
                //$day = date('d');// dưới dạng 2 chữ số
                $day = date('j');  // Ngày không có số 0 ở trước (1-31)
                $month = date('m'); // 'n' trả về tháng không có số 0 ở đầu (1-12) m có trả về số 0
                $year = date('Y'); // 'Y' trả về năm với 4 chữ số (ví dụ: 2024)
                $getTotalThanhTien=getTotalThanhTien($month, $year);
                if($getTotalThanhTien<0){
                    echo "<script>alert('Tháng hiện tại không có dữ liệu.');</script>";
                }else{
                    $dateBefore = new DateTime();
                    $dateBefore->modify('-1 month'); // Trừ đi một tháng
                    $monthBefore = $dateBefore->format('m'); // Lấy tháng sau khi trừ đi một tháng
                    $total_quantityBefore = getTotalThanhTienBefore($monthBefore, $year);
                    // Tính số ngày trong tháng hiện tại
                    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                    include_once'thongke/thongke.php';
                }
            }
            
        break;
                
    default:
        include "home.php";
    break;
    }
}
include_once 'footer.php';

?>