
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        h2 {
            color: #555;
            font-size: 20px;
            margin-bottom: 10px;
        }
        p {
            color: #666;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .order-details, .customer-details {
            margin-bottom: 30px;
        }
        .order-details div, .customer-details div {
            margin-bottom: 10px;
        }
        .order-details span, .customer-details span {
            font-weight: bold;
        }
        .thanhcong{
            text-align: center;
            color:red;
        }
        .thanhcong1{
            text-align: center;
            
        }
        .mdh{
            font-weight: bold;
            margin: 15px 0px;
            font-size: 24px;
        }
        .mdh1{
            font-weight: bold;
           color: #676767;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="thanhcong">Bạn đã đặt hàng thành công</h1>
       

        <?php
        if (isset($listbill) && is_array($listbill)) {
            extract($listbill);
        }
        ?>

        <div class="order-details">
            <h2>Chi tiết đơn hàng</h2>
         
            <div class="mdh">Mã đơn hàng: <span class="mdh1"><?=$id_bill?></span></div>
            <div class="mdh">Ngày đặt: <span class="mdh1"><?=$ngaydathang?></span></div>
            <div class="mdh">Tổng đơn hàng: <span class="mdh1"><?=$tongGiaInput?> VNĐ</span></div>
        </div>

        <div class="customer-details">
            <h2  class="thanhcong1">Thông tin khách hàng</h2>
            <div class="mdh">Tên: <span  class="mdh1"><?=$bill_name?></span></div>
            <div class="mdh">Địa chỉ: <span  class="mdh1"><?=$bill_address?></span></div>
            <div class="mdh">SĐT: <span  class="mdh1"><?=$bill_tel?></span></div>
            <div class="mdh">Email: <span  class="mdh1"><?=$bill_email?></span></div>
        </div>
        <h2 class="thanhcong1">Cảm ơn đã tin tưởng chúng tôi</h2>

    </div>


