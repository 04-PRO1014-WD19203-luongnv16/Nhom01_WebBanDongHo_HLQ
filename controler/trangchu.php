
<?php
session_start();
    include_once "../model/pdo.php";
    include_once "../view/header.php";
    include_once "../model/sanpham.php";
    include_once "../model/danhmuc.php";
    include_once "../model/taikhoan.php";
    include_once "../model/cart.php";

    // if(!isset($_SESSION['mycart']))$_SESSION['mycart']=[];

    if(isset($_GET['act'])&&($_GET['act']!=="")){
        $act=$_GET['act'];
        switch($act){
        
        //đăng ký
        case 'dangky':
            if(isset($_POST['btn_dangky'])&&($_POST['btn_dangky'])){
                $email=$_POST['email'];
                $ten_tai_khoan=$_POST['ten_tai_khoan'];
                $mat_khau=$_POST['mat_khau'];
                $sdt=$_POST['sdt'];
                $diachi=$_POST['diachi'];
                $mat_khau_2=$_POST['mat_khau_2'];

                if(($mat_khau==$mat_khau_2)){
                    insert_taikhoan($ten_tai_khoan,$mat_khau,$email,$sdt,$diachi);
                    $thong_bao="Đăng ký thành công";
                }else{
                    $thong_bao="Đăng ký không thành công";
                }
            }
            include_once "../view/dangky.php";
        break;
        //đăng nhập
        case 'dangnhap':
            if(isset($_POST['btn_dang_nhap']) && $_POST['btn_dang_nhap']) {
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $dang_nhap = dang_nhap($email, $mat_khau);
                
                if(is_array($dang_nhap)) {
                    $_SESSION['ten_tai_khoan'] = $dang_nhap;
                    $thong_bao = "Đăng nhập thành công";
                    header("Location: trangchu.php");
                    exit(); // Đảm bảo không có mã khác được thực thi sau khi redirect
                } else {
                    $thong_bao = "Tài khoản hoặc mật khẩu không đúng.";
                }
            }
            
            include_once "../view/dangnhap.php";
        break;

        //thoát
        case 'thoat':
            if(isset($_SESSION['ten_tai_khoan'])){
                unset($_SESSION['ten_tai_khoan']);
                header("Location: trangchu.php");
            }
        break;

        //showsp
        case 'showsp':
            $showProduct=showProduct();
            $dssp_view=loadallsp_home(8);
            $spnew=loadallsp_new(4);
            include "../view/home.php";
        break;

        //show sản phẩm 
        case 'chitiet':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                
            $pro=loadonesp($_GET['id']);
            extract($pro);
            tang_view($_GET['id']);
            $sp_cung_loai=loadsp_cung_loai($_GET['id'],$id_danh_muc);
        
            include "../view/chitietsanpham.php";
            }else{
            
                include "../views/showsp.php";
            }         
        break;

        //show danh mục
        case 'sanpham':  
            if(isset($_POST['key'])&&($_POST['key']!="")){
                $key=$_POST['key'];
                }else{
                $key="";
                }  
                 if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                $id=$_GET['iddm'];
                
                }else{
                $id=0;
                }    
            $showProduct=showProduct();
            $listdanhmuc=listdanhmuc();
            $listdm=loadallsp_iddm($key,$id);
            include "../view/sanpham.php";
            break;
        case 'gioithieu':
            include "../view/gioithieu.php";
        break;

        //thêm vào giỏ hàng 
        case 'addcart':
            if (isset($_SESSION['ten_tai_khoan'])) {
                if(isset($_POST['addcart'])&&($_POST['addcart'])){
                
                    $id_san_pham=$_POST['id_san_pham'];
                    $ten_san_pham=$_POST['ten_san_pham'];
                    $hinh_anh=$_POST['hinh_anh'];
                    $gia=$_POST['gia'];
                    $size=$_POST['size'];
                    $id_bien_the=$_POST['id_bien_the'];

                    
                    
                    $so_luong=1;
                    $thanh_tien=$so_luong*$gia;
                    // $san_pham_mua=[$id_san_pham,$ten_san_pham,$hinh_anh,$gia,$so_luong,$thanh_tien,$size,$id_bien_the];
                    
                    // array_push($_SESSION['mycart'],$san_pham_mua);
                    if (isset($_SESSION['ten_tai_khoan'])) {
                        $id_tai_khoan = $_SESSION['ten_tai_khoan']['id_tai_khoan'];
                    } else {
                        $id_tai_khoan = null; 
                       
                    }
    
                    $check = kiem_tra_sl($id_tai_khoan, $id_bien_the);
                    $idbienthe=IdBienThe();
    
                        //insert into cart: SESSION['mycart] & idbill
                      if(isset( $_SESSION['ten_tai_khoan'])){
                        $id_tai_khoan =  $_SESSION['ten_tai_khoan']['id_tai_khoan'];
                      }
                      if ($check !== false) {
                        $so_luong_cu = $check['quantity'];
                        $so_luong_moi = $so_luong + $so_luong_cu;
                        update_so_luong($id_tai_khoan, $id_bien_the, $so_luong_moi);
                    } else {
                        $id_bill=idBillNews();
                        insert_cart($id_tai_khoan, $id_bien_the, $ten_san_pham, $hinh_anh, $gia, $so_luong, $thanh_tien,$id_bill);
                    }
                    include "../view/giohang.php";
                }else{
                    echo "<script>alert('Vui lòng đăng nhập để vào giỏ hàng');</script>";
                    include_once "../view/dangnhap.php";
                }
            }else{
                echo "<script>alert('Vui lòng đăng nhập để đặt hàng');</script>";
                include_once "../view/dangnhap.php";
            }
        break;

        //xóa giỏ hàng
        case 'xoagiohang':
           $id_bien_the = 0;
           $id_tai_khoan = $_SESSION['ten_tai_khoan']['id_tai_khoan'];
            if(isset($_GET['idbienthe'])){
                $id_bien_the = $_GET['idbienthe'];
              
            }
            xoa_gio_hang($id_bien_the,$id_tai_khoan);
            header('Location:trangchu.php?act=giohang');
        break;

        case 'giohang':
            if(isset( $_SESSION['ten_tai_khoan'])){
                $id_tai_khoan =  $_SESSION['ten_tai_khoan']['id_tai_khoan'];
                $checkCart=checkCart($id_tai_khoan);
                include "../view/giohang.php";
            }
        break;

        //bill
        case'bill':
            if (isset($_SESSION['ten_tai_khoan'])) {
                include "../view/bill/bill.php";
            }
            
        break;

        //billcomfim
        case'billATM':
            if (isset($_SESSION['ten_tai_khoan'])) {
                include "../view/bill/billATM.php";
            }
         
        break;

        case "billcomfim":
            if(isset($_POST['btn_dathang'])&&($_POST['btn_dathang'])){

                if (isset($_POST['id_tai_khoan']) && isset($_POST['ten_tai_khoan']) && isset($_POST['sdt']) && isset($_POST['diachi']) && isset($_POST['email'])) {
                    // Lấy thông tin khách hàng
                    $id_tai_khoan = $_POST['id_tai_khoan'];
                    $ten_tai_khoan = $_POST['ten_tai_khoan'];
                    $sdt = $_POST['sdt'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    // Lấy thông tin giỏ hàng
                    $cart_imgs = $_POST['cart_img'];
                    $cart_names = $_POST['cart_name'];
                    $cart_gias = $_POST['cart_gia'];
                    $cart_quantities = $_POST['cart_quantity'];
                    $cart_id_bien_thes = $_POST['cart_id_bien_the'];
                    $cart_thanh_tiens = $_POST['cart_thanh_tien'];
                    // Lấy tổng giá trị đơn hàng
                    $tongGiaInput = $_POST['tongGiaInput'];
                    $bill_status = 1;
                    $payment_status = 0;
                    $ngaydathang = date('h:i:sa d/m/y');
                    include "../model/bill_item.php";
                    $orderId=generateUniqueOrderId($conn);
                    // Chèn dữ liệu vào bảng bill và lấy ID của hóa đơn
                    $id_bill = insertCartBill($id_tai_khoan, $ten_tai_khoan, $diachi, $sdt, $email, $payment_status, $ngaydathang, $tongGiaInput, $bill_status, $orderId);
                    // Sử dụng $id_bill để chèn các thông tin vào bảng bill_item
                    foreach ($cart_imgs as $i => $cart_img) {
                        $cart_name = $cart_names[$i];
                        $cart_gia = $cart_gias[$i];
                        $cart_quantity = $cart_quantities[$i];
                        $cart_id_bien_the = $cart_id_bien_thes[$i];
                        $cart_thanh_tien = $cart_thanh_tiens[$i];

                        insertCartInBillItem($id_bill, $id_tai_khoan, $cart_img, $cart_name, $cart_gia, $cart_quantity, $cart_id_bien_the, $cart_thanh_tien);
                    }

                        if (isset($_SESSION['id_tai_khoan'])) {
                            $id_tai_khoan = intval($_SESSION['id_tai_khoan']);
                            deleteCart($id_tai_khoan);
                        } else {
                            // Xử lý khi 'id_tai_khoan' không tồn tại trong session
                            echo "Thông tin tài khoản không hợp lệ.";
                        }
                        // echo "<script>alert('Hóa đơn đã được tạo thành công!');</script>";
                        if(isset($_SESSION['id_tai_khoan'])){
                            $id_tai_khoan = intval($_SESSION['id_tai_khoan']);
                            $checkCart=checkCart($id_tai_khoan);
                            include "../view/giohang.php";
                            echo "<script>alert('Hóa đơn đã được tạo thành công!');</script>";
                        }else{
                            echo "<script>alert('Hóa đơn đã được tạo thất bại!');</script>";
                        }
                } else {
                    echo "<script>alert('Vui lòng đăng nhập để mua hàng');</script>";
                    include_once "../view/dangnhap.php";
                }
                
            }
        

        case "xulythanhtoanmomo_atm":
            if (isset($_POST['btn_buyMomoATM']) && $_POST['btn_buyMomoATM']) {
                $tongGiaInput = $_POST['tongGiaInput'];
                if (isset($_POST['id_tai_khoan']) && isset($_POST['ten_tai_khoan']) && isset($_POST['sdt']) && isset($_POST['diachi']) && isset($_POST['email'])) {
            
                    // Lấy dữ liệu từ các trường thông tin tài khoản
                    $_SESSION['id_tai_khoan'] = $_POST['id_tai_khoan'];
                    $_SESSION['ten_tai_khoan'] = $_POST['ten_tai_khoan'];
                    $_SESSION['sdt'] = $_POST['sdt'];
                    $_SESSION['diachi'] = $_POST['diachi'];
                    $_SESSION['email'] = $_POST['email'];
        
                    // Lấy dữ liệu từ các trường giỏ hàng
                    $_SESSION['cart'] = [];
                    $cart_imgs = $_POST['cart_img'];
                    $cart_names = $_POST['cart_name'];
                    $cart_gias = $_POST['cart_gia'];
                    $cart_quantities = $_POST['cart_quantity'];
                    $cart_id_bien_thes = $_POST['cart_id_bien_the'];
                    $cart_thanh_tiens = $_POST['cart_thanh_tien'];
                    $_SESSION['tongGiaInput'] = $_POST['tongGiaInput'];
            
                    for ($i = 0; $i < count($cart_imgs); $i++) {
                        $_SESSION['cart'][] = [
                            'img' => $cart_imgs[$i],
                            'name' => $cart_names[$i],
                            'gia' => $cart_gias[$i],
                            'quantity' => $cart_quantities[$i],
                            'id_bien_the' => $cart_id_bien_thes[$i],
                            'thanh_tien' => $cart_thanh_tiens[$i]
                        ];
                    }
                    // Chuyển hướng tới file xử lý thanh toán Momo
                    include'../momo/xulythanhtoanmomo_atm.php';
                } else {
                    echo "<script>alert('Vui lòng đăng nhập để mua hàng');</script>";
                    include_once "../view/dangnhap.php";
                }
            }
        break;
            
        case "notedatamomo":
            if (isset($_GET['partnerCode']) && isset($_GET['orderId']) && $_GET['message']!='Successful') {
                $orderId = $_GET['orderId'];
                $bill_status = 1;
                $payment_status = 1;
                $ngaydathang = date('h:i:sa d/m/y');
                
                // Chèn dữ liệu vào bảng bill và lấy ID của hóa đơn
                $order_id = insertBill($bill_status, $payment_status, $ngaydathang, $orderId);
              
                
                if ($order_id) {
                    // Đảm bảo $_SESSION['cart'] tồn tại và không rỗng
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item) {
                            insertCartAtmMomo($order_id, $item);
                        }
                        

                        // xử lý thông tin biến cart tạm thời
                        if (isset($_SESSION['id_tai_khoan'])) {
                            $id_tai_khoan = intval($_SESSION['id_tai_khoan']);
                            deleteCart($id_tai_khoan);
                        } else {
                            // Xử lý khi 'id_tai_khoan' không tồn tại trong session
                            echo "Thông tin tài khoản không hợp lệ.";
                        }
                        unset($_SESSION['cart']); // Xóa giỏ hàng sau khi đã xử lý
                    } else {
                        echo "<script>alert('Giỏ hàng không có dữ liệu.');</script>";
                    }
                    echo "<script>alert('Hóa đơn đã được tạo thành công!');</script>";
                    if(isset($_SESSION['id_tai_khoan'])){
                        $id_tai_khoan = intval($_SESSION['id_tai_khoan']);
                        $checkCart=checkCart($id_tai_khoan);
                        include "../view/giohang.php";
                    }

                } else {
                    deleteBill($orderId);
                    echo "<script>alert('Hóa đơn đã được tạo thất bại!');</script>";
                }
            } else {
                echo "<script>alert('Hóa đơn đã được tạo thất bại!');</script>";
            }
        break;
            
        case 'viewCart':
            if (isset($_GET['id_bill']) && isset($_GET['id_bill'])){
                $id_bill=$_GET['id_bill'];
                $quanBill=quanBill($id_bill);
                $quanCart=quanCart($id_bill);
                $allCart=allCart();
                $listAllBillItem=listAllBillItem($id_bill);
            }
            include "../view/viewCart.php";
        break;

                    
        case 'huyDonHang':
            if(isset($_GET['id_bill'])){
                $id_bill = $_GET['id_bill'];
                $bill_id = $_GET['id_bill'];
                $billStatusNew = 5;
                $huyDonHang=huyDonHang($bill_id);
                foreach($huyDonHang as $huydon){
                    $kiemtra=$huydon['bill_status'];
                }
                // echo "<script>alert('bill_status: " . $kiemtra . "');</script>";
                
                if($kiemtra==1){
                    
                    try {
                        trangThaiDonHang($bill_id, $billStatusNew);
                        echo "<script>alert('Đơn hàng đã được hủy.');</script>";
                    } catch (Exception $e) {
                        echo "<script>alert('Có lỗi xảy ra: " . $e->getMessage() . "');</script>";
                    }
                }else{
                   // Hiển thị giá trị của $kiemtra trong alert
                   echo "<script>alert('Không thể đơn hàng khi Shop đang xử lý đơn: " . $kiemtra . "');</script>";
                }
            }
            if(isset( $_SESSION['ten_tai_khoan'])){
                $id_tai_khoan =  $_SESSION['ten_tai_khoan']['id_tai_khoan'];
                $checkCart=checkCart($id_tai_khoan);
                include "../view/giohang.php";
            }
        break;


        default:
        $listsanpham=listsanpham();
        $dssp_view=loadallsp_home(8);
        $spnew=loadallsp_new(4);
        include_once "../view/home.php";
        break;
    }
    }else{
        $listsanpham=listsanpham();
        $dssp_view=loadallsp_home(8);
        $spnew=loadallsp_new(4);
        include_once "../view/home.php";
    }
    include_once '../view/footer.php';
?>


