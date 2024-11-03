-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2024 at 03:40 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `bientheanh`
--

CREATE TABLE `bientheanh` (
  `id_bienthe_anh` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `hinh_anh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bien_the`
--

CREATE TABLE `bien_the` (
  `id_bien_the` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `id_kich_thuoc` int NOT NULL,
  `gia_nhap` double NOT NULL,
  `gia_ban` double NOT NULL,
  `so_luong` int NOT NULL DEFAULT '0',
  `trang_thai` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bien_the`
--

INSERT INTO `bien_the` (`id_bien_the`, `id_san_pham`, `id_kich_thuoc`, `gia_nhap`, `gia_ban`, `so_luong`, `trang_thai`) VALUES
(1, 6, 5, 820, 464, 4, 0),
(2, 7, 1, 45, 46, 5, 0),
(3, 7, 2, 45, 46, 5, 0),
(4, 8, 5, 12, 13, 4, 0),
(5, 9, 1, 14, 15, 2, 0),
(6, 9, 2, 14, 15, 3, 0),
(7, 9, 3, 45, 46, 2, 0),
(8, 10, 1, 12, 23, 4, 0),
(9, 10, 2, 13, 14, 3, 0),
(10, 11, 5, 9000000, 9340000, 10, 0),
(11, 11, 4, 9000000, 9340000, 10, 0),
(12, 12, 5, 9000000, 9340000, 15, 0),
(13, 13, 5, 9000000, 9430000, 15, 0),
(14, 14, 1, 8900000, 9420000, 24, 0),
(15, 15, 1, 1500000, 3013000, 21, 0),
(16, 16, 5, 2500000, 2789000, 14, 0),
(17, 17, 1, 8500000, 8840000, 17, 0),
(18, 18, 5, 2200000, 2622000, 10, 0),
(19, 19, 4, 49000000, 51230000, 4, 0),
(20, 20, 4, 21000000, 22814000, 12, 0),
(21, 21, 5, 42300000, 43485000, 3, 0),
(22, 22, 5, 17000000, 17188000, 7, 0),
(23, 23, 4, 2345600, 2691000, 24, 0),
(24, 24, 3, 8900456, 9988000, 14, 0),
(25, 25, 3, 3265000, 3500000, 6, 0),
(26, 25, 4, 3265000, 3500000, 7, 0),
(27, 30, 3, 3265000, 3500000, 6, 0),
(28, 30, 4, 3265000, 3500000, 6, 0),
(29, 33, 3, 3265000, 3500000, 6, 0),
(30, 33, 4, 3265000, 3500000, 6, 0),
(34, 35, 2, 12, 12, 12, 0),
(36, 36, 2, 12, 12, 12, 0),
(37, 37, 2, 12, 13, 2, 0),
(38, 37, 2, 13, 14, 2, 0),
(39, 38, 2, 13, 16, 4, 0),
(40, 38, 2, 15, 17, 6, 0),
(41, 39, 1, 1000000, 13000000, 3, 0),
(42, 39, 3, 1000000, 14000000, 3, 0),
(43, 40, 1, 1000000, 13000000, 3, 0),
(44, 40, 3, 1000000, 14000000, 3, 0),
(45, 41, 1, 12, 34, 2, 0),
(46, 41, 3, 12, 223, 3, 0),
(47, 42, 1, 20000000, 23000000, 2, 0),
(48, 42, 3, 20000000, 24000000, 4, 0),
(49, 43, 1, 12, 13, 4, 0),
(50, 43, 2, 14, 15, 5, 0),
(53, 44, 4, 15, 16, 5, 0),
(57, 46, 2, 12, 13, 14, 0),
(58, 46, 2, 13, 14, 15, 0),
(59, 47, 1, 145, 146, 6, 0),
(60, 47, 2, 167, 168, 5, 0),
(61, 48, 5, 9000000, 9532000, 9, 0),
(62, 48, 4, 8600000, 9000000, 21, 0),
(63, 49, 1, 4600000, 5600000, 0, 0),
(64, 49, 2, 4500000, 5860000, 6, 0),
(65, 49, 3, 4620000, 6000000, 7, 0),
(66, 50, 1, 2300000, 2500000, 3, 0),
(67, 50, 2, 2550000, 2650000, 8, 0),
(68, 51, 4, 6980000, 7120000, 8, 0),
(69, 51, 5, 7000000, 7230000, 8, 0),
(70, 52, 1, 8960000, 9520000, 6, 0),
(71, 52, 2, 9120000, 9520000, 8, 0),
(72, 53, 4, 3560000, 3750000, 3, 0),
(73, 53, 5, 3600000, 3650000, 6, 0),
(74, 54, 3, 23100000, 25600000, 15, 0),
(75, 54, 4, 23400000, 27500000, 18, 0),
(76, 55, 4, 16500000, 17420000, 26, 0),
(77, 55, 5, 16700000, 17850000, 28, 0),
(78, 56, 1, 4685000, 5700000, 3, 0),
(79, 56, 2, 4950000, 5780000, 6, 0),
(80, 57, 2, 28900000, 29100000, 21, 0),
(81, 57, 3, 28900000, 31100000, 26, 0),
(82, 58, 2, 2345000, 2465000, 8, 0),
(83, 58, 3, 2564000, 2567000, 9, 0),
(84, 59, 4, 7896500, 7945600, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id_bill` int NOT NULL,
  `id_tai_khoan` int NOT NULL,
  `bill_name` varchar(200) NOT NULL,
  `bill_address` varchar(200) NOT NULL,
  `bill_tel` varchar(200) NOT NULL,
  `bill_email` varchar(200) NOT NULL,
  `payment_status` int NOT NULL,
  `ngaydathang` varchar(20) DEFAULT NULL,
  `total` int NOT NULL,
  `bill_status` int DEFAULT NULL,
  `so_luong` int NOT NULL,
  `id_bien_the` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id_bill`, `id_tai_khoan`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `payment_status`, `ngaydathang`, `total`, `bill_status`, `so_luong`, `id_bien_the`) VALUES
(80, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '08:21:45am 26/07/24', 0, 1, 1, 74),
(81, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '08:26:02am 26/07/24', 43020000, 1, 1, 74),
(82, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '08:46:02am 26/07/24', 19064000, 2, 2, 61),
(83, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '09:23:59am 26/07/24', 12120000, 1, 1, 68),
(84, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '04:31:52pm 26/07/24', 13700000, 2, 1, 66),
(85, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '04:36:52pm 26/07/24', 9532000, 4, 1, 61),
(86, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '04:37:06pm 26/07/24', 9532000, 7, 1, 61),
(87, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '07:19:41am 27/07/24', 8100000, 2, 1, 66),
(88, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '07:40:26am 27/07/24', 17632000, 4, 1, 61),
(89, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '08:10:52am 27/07/24', 28832000, 1, 1, 61),
(90, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '08:12:56am 27/07/24', 9532000, 1, 1, 61),
(91, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '08:13:27am 27/07/24', 18532000, 1, 1, 62),
(92, 5, 'Admin', 'ahihi', '123456789', 'admin1@gmail.com', 0, '08:14:33am 27/07/24', 43020000, 1, 1, 74);

-- --------------------------------------------------------

--
-- Table structure for table `billstatus`
--

CREATE TABLE `billstatus` (
  `id_bill_status` int NOT NULL,
  `name_bill_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `billstatus`
--

INSERT INTO `billstatus` (`id_bill_status`, `name_bill_status`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Đang giao '),
(4, 'Giao thành công'),
(5, 'Giao thất bại'),
(6, 'Đã hủy');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binh_luan` int NOT NULL,
  `id_tai_khoan` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `noi_dung` varchar(200) NOT NULL,
  `ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int NOT NULL,
  `id_tai_khoan` int NOT NULL,
  `id_bien_the` int NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `gia` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL,
  `thanh_tien` int NOT NULL,
  `id_bill` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_tai_khoan`, `id_bien_the`, `name`, `img`, `gia`, `quantity`, `thanh_tien`, `id_bill`) VALUES
(92, 5, 76, 'Đồng hồ ORIENT Star Nam RE-AV0B02Y00B', 'orient-star-re-av0b02y00b-nam-1-org.jpg', 17420000, 1, 17420000, 91),
(93, 5, 74, 'Đồng hồ Citizen Series 8 Nam NB6032-53P', 'citizen-nb6032-53p-nam-thumb-600x600.jpg', 25600000, 1, 25600000, 91);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danh_muc` int NOT NULL,
  `ten_danh_muc` varchar(200) NOT NULL,
  `trang_thai` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danh_muc`, `ten_danh_muc`, `trang_thai`) VALUES
(1, 'Đồng hồ Nam Thụy Sỹ', 1),
(2, 'Đồng hồ Nữ', 1),
(3, 'Đồng hồ Nữ', 1),
(4, 'Đồng hồ treo tường ', 1),
(5, 'CASIO ', 0),
(6, 'CITIZEN', 0),
(7, 'ORIENT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id_gio_hang` int NOT NULL,
  `id_tai_khoan` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `ten_san_pham` varchar(200) NOT NULL,
  `hinh_anh` varchar(200) NOT NULL,
  `gia` double NOT NULL,
  `so_luong` int NOT NULL DEFAULT '0',
  `tong_gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kichthuoc`
--

CREATE TABLE `kichthuoc` (
  `id_kich_thuoc` int NOT NULL,
  `size` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kichthuoc`
--

INSERT INTO `kichthuoc` (`id_kich_thuoc`, `size`) VALUES
(1, '38mm'),
(2, '39mm'),
(3, '40mm'),
(4, '41mm'),
(5, '42mm');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id_payment_status` int NOT NULL,
  `name_payment_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id_payment_status`, `name_payment_status`) VALUES
(0, 'Chưa thanh toán'),
(1, 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_san_pham` int NOT NULL,
  `ten_san_pham` varchar(200) NOT NULL,
  `hinh_anh` varchar(200) NOT NULL,
  `mo_ta` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `luot_xem` int NOT NULL DEFAULT '0',
  `trang_thai` int NOT NULL DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `id_danh_muc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_san_pham`, `ten_san_pham`, `hinh_anh`, `mo_ta`, `luot_xem`, `trang_thai`, `ngay_nhap`, `id_danh_muc`) VALUES
(11, 'Đồng hồ Orient Mako Solar', '', 'Đồng hồ Orient Mako Solar 42.8 mm Nam RA-TX0203S10B thuộc thương hiệu Orient của Nhật Bản. Đồng hồ sở hữu đường kính mặt 42.8 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính Sapphire, độ bóng bắt mắt, chống trầy xước bền bỉ, có độ cứng và độ chịu lực cao cùng với khả năng chống ăn mòn tốt. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ thép không gỉ - sang trọng và hạn chế ăn mòn, tạo cảm giác mát tay cho người dùng khi đeo.', 5, 1, '2024-07-14', 5),
(12, 'Đồng hồ Orient Mako Solar', 'orient-ra-tx0203s10b-nam-thumb-600x600.jpg', 'Đồng hồ Orient Mako Solar 42.8 mm Nam RA-TX0203S10B thuộc thương hiệu Orient của Nhật Bản. Đồng hồ sở hữu đường kính mặt 42.8 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính Sapphire, độ bóng bắt mắt, chống trầy xước bền bỉ, có độ cứng và độ chịu lực cao cùng với khả năng chống ăn mòn tốt. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ thép không gỉ - sang trọng và hạn chế ăn mòn, tạo cảm giác mát tay cho người dùng khi đeo.', 30, 1, '2024-07-14', 5),
(13, 'Đồng hồ Orient Mako Solar  Nam RA-TX0202B10B', 'orient-ra-tx0202b10b-nam-thumb-600x600.jpg', 'Đồng hồ Orient Mako Solar 42.8 mm Nam RA-TX0202B10B thuộc thương hiệu Orient của Nhật Bản. Đồng hồ sở hữu đường kính mặt 42.8 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính Sapphire, độ bóng bắt mắt, chống trầy xước bền bỉ, có độ cứng và độ chịu lực cao cùng với khả năng chống ăn mòn tốt. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ thép không gỉ - sang trọng và hạn chế ăn mòn, tạo cảm giác mát tay cho người dùng khi đeo.', 159, 1, '2024-07-14', 7),
(14, 'Đồng hồ Orient Small Bambino Nam RA-AP0106S30B', 'orient-ra-ap0106s30b-nam-thumb-600x600.jpg', 'Đồng hồ Orient Small Bambino 38.4 mm Nam RA-AP0106S30B thuộc thương hiệu Orient của Nhật Bản. Đồng hồ sở hữu đường kính mặt 38.4 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính cứng, có độ cứng và độ chịu lực tốt khi bị va đập, dễ dàng đánh bóng khi bị trầy xước nhẹ. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ da tổng hợp - mềm mại, mang lại sự thoải mái cho người dùng khi đeo.', 24, 1, '2024-07-15', 7),
(15, 'Đồng hồ Casio  Nam MTP-M305D-1AVDF', 'casio-mtp-m305d-1avdf-nam-thumb-600x600.jpg', 'Thương hiệu đồng hồ nổi tiếng đến từ Nhật Bản không ngừng cải tiến và cho ra mắt những dòng sản phẩm chất lượng phù hợp với nhiều đối tượng khách hàng. Những dòng sản phẩm nổi tiếng của Casio là: G-Shock với thiết kế mạnh mẽ cùng độ bền cao, Edifice thiết kế hiện đại cùng nhiều tính năng vượt trội, Sheen với thiết kế cổ điển và sang trọng.', 5, 1, '2024-07-15', 5),
(16, 'Đồng hồ Citizen  Nam AK5003-05A ', 'citizen-ak5003-05a-nam-thumb-600x600.jpg', 'Đồng hồ Citizen 42 mm Nam AK5003-05A với điểm nhấn của sản phẩm là tiện ích tuần trăng được chế tác tinh xảo ở vị trí 6 giờ, tạo nên một vẻ đẹp đầy cảm hứng và tinh tế. Sản phẩm này không chỉ là một phụ kiện hoàn hảo để sử dụng hằng ngày hoặc đi làm, mà giá trị thẩm mỹ của nó sẽ giúp tôn lên sự thanh lịch hiện đại cho các chàng trai. ', 1, 1, '2024-07-15', 6),
(17, 'Đồng hồ Orient Small Bambino Nam RA-AP0104S30B ', 'orient-ra-ap0104s30b-nam-thumb-600x600.jpg', 'Đồng hồ Orient Small Bambino 38.4 mm Nam RA-AP0104S30B thuộc thương hiệu Orient của Nhật Bản. Đồng hồ sở hữu đường kính mặt 38.4 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính cứng, có độ cứng và độ chịu lực tốt khi bị va đập, dễ dàng đánh bóng khi bị trầy xước nhẹ. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ da tổng hợp - mềm mại, mang lại sự thoải mái cho người dùng khi đeo.', 5, 1, '2024-07-15', 7),
(18, 'Đồng hồ Casio  Nam MTP-M100D-7AVDF', 'casio-mtp-m100d-7avdf-nam-2-1.jpg', 'Đồng hồ Casio 42.5 mm Nam MTP-M100D-7AVDF là một chiếc đồng hồ nam đến từ thương hiệu Casio nổi tiếng của Nhật Bản. Với điểm nhấn của sản phẩm là tiện ích tuần trăng được chế tác tinh xảo ở vị trí 6 giờ, tạo nên một vẻ đẹp đầy cảm hứng và tinh tế. Sản phẩm này không chỉ là một phụ kiện hoàn hảo để sử dụng hằng ngày hoặc đi làm, giá trị thẩm mỹ của nó sẽ giúp tôn lên sự thanh lịch hiện đại cho các chàng trai. ', 2, 1, '2024-07-15', 5),
(19, 'Đồng hồ Citizen Series 8 Nam NB6032-53P', 'citizen-nb6032-53p-nam-thumb-600x600.jpg', 'Đồng hồ Citizen Series 8 41 mm Nam NB6032-53P thuộc thương hiệu Citizen của Nhật Bản. Đồng hồ sở hữu đường kính mặt 41 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính Sapphire, độ bóng bắt mắt, chống trầy xước bền bỉ, có độ cứng và độ chịu lực cao cùng với khả năng chống ăn mòn tốt. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ thép không gỉ - sang trọng và hạn chế ăn mòn, tạo cảm giác mát tay cho người dùng khi đeo.', 7, 1, '2024-07-15', 6),
(20, 'Đồng hồ ORIENT Star Nam RE-AV0B02Y00B', 'orient-star-re-av0b02y00b-nam-1-org.jpg', 'Đồng hồ ORIENT Star 41 mm Nam RE-AV0B02Y00B có hệ số chống nước 10 ATM, bạn có thể an tâm đeo chiếc đồng hồ này khi bơi và đi tắm. Lưu ý, bạn không nên mang khi lặn', 1, 1, '2024-07-15', 7),
(21, 'Đồng hồ Citizen Series 8  Nam NB6060-58L ', 'citizen-nb6060-58l-nam-1.jpg', 'Đồng hồ Citizen Series 8 43 mm Nam NB6060-58L thuộc thương hiệu Citizen của Nhật Bản. Đồng hồ sở hữu đường kính mặt 43 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính Sapphire, độ bóng bắt mắt, chống trầy xước bền bỉ, có độ cứng và độ chịu lực cao cùng với khả năng chống ăn mòn tốt. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ thép không gỉ - sang trọng và hạn chế ăn mòn, tạo cảm giác mát tay cho người dùng khi đeo.', 0, 1, '2024-07-14', 6),
(22, 'Đồng hồ Citizen Nam AT8113-12H', 'citizen-at8113-12h-nam-1.jpg', 'Đồng hồ Citizen 42.7 mm Nam AT8113-12H là mẫu đồng hồ nam đến từ Citizen - Nhật Bản mang ngoại hình giao hòa giữa cổ điển và hiện đại phù hợp cho những chàng trai theo đuổi phong cách “quý ông”.   • Đồng hồ Citizen là sự kết hợp những phong cách cổ điển cùng những đường nét hiện đại. Tổng thể đồng hồ mang hình dáng của những mẫu đồng hồ vintage đi cùng một mặt số Chronograph hiện đại đầy đủ chức năng đã tạo nên một sản phẩm phù hợp với các quý ông lịch lãm. ', 2, 1, '2024-07-15', 6),
(23, 'Đồng hồ CASIO  Nam MTP-E501-7AVDF', 'casio-mtp-e501-7avdf-nam-2.jpg', ' Là sản phẩm đến từ thương hiệu đồng hồ Casio nổi tiếng của Nhật Bản  - Chiếc đồng hồ nam này có đường kính mặt 44 mm  - Khung viền thép không gỉ bền bỉ, chịu va đập tốt, dây nhựa nhẹ nhàng, chống thấm nước tốt, cho bạn thoải mái khi đeo  - Hệ số chống nước 5 ATM: đồng hồ an toàn khi tắm, rửa tay và đi mưa, không nên đeo khi tham gia bơi lội  - Quản lý thời gian tốt hơn với đồng hồ 24 giờ, tiện ích bấm giờ Chronograph', 0, 1, '2024-07-15', 5),
(24, 'Đồng hồ Citizen Tsuyosa Pantone Nam NJ0158-89L ', 'citizen-nb6060-58l-nam-1.jpg', 'Đồng hồ Citizen Tsuyosa Pantone 40 mm Nam NJ0158-89L sở hữu phần mặt đồng hồ dạng vạch với ưu điểm tối giản, dễ xem giờ cùng phong cách trẻ trung, mặt số vạch được sử dụng phổ biến và được các bạn trẻ vô cùng yêu thích.    • Đồng hồ nam này có hệ số kháng nước là 5 ATM cho phép các bạn nam đeo khi đi rửa tay hoặc đi mưa nhỏ, tắm. Lưu ý: không đeo sản phẩm khi đi bơi, lặn.', 1, 1, '2024-07-15', 6),
(33, 'Đồng hồ Casio Nam MTP-M300L-7AVDF', 'casi.jpg', 'Thương hiệu đồng hồ nổi tiếng đến từ Nhật Bản không ngừng cải tiến và cho ra mắt những dòng sản phẩm chất lượng phù hợp với nhiều đối tượng khách hàng. Những dòng sản phẩm nổi tiếng của Casio là: G-Shock với thiết kế mạnh mẽ cùng độ bền cao, Edifice thiết kế hiện đại cùng nhiều tính năng vượt trội, Sheen với thiết kế cổ điển và sang trọng', 0, 1, '2024-07-16', 5),
(35, 'thêm mới', 'casio-mtp-m100d-7avdf-nam-2-1.jpg', 'đã thêm', 0, 1, '2024-07-16', 5),
(36, 'thêm mới', 'casio-mtp-m100d-7avdf-nam-2-1.jpg', 'đã thêm', 1, 1, '2024-07-16', 5),
(37, 'thêm mới ', 'casi.jpg', 'đã thêm', 0, 1, '2024-07-16', 5),
(38, 'đã thêm', 'casio-mtp-e501-7avdf-nam-2.jpg', 'hihi', 0, 1, '2024-07-16', 5),
(39, 'Đồng hồ ROLEX', 'orient-ra-ak0803y10b-nam-thumb-600x600.jpg', 'đã thêm', 0, 1, '2024-07-03', 6),
(40, 'Đồng hồ ROLEX', 'orient-ra-ak0803y10b-nam-thumb-600x600.jpg', 'đã thêm', 0, 1, '2024-07-03', 6),
(41, 'thêm mới', 'casi.jpg', 'đã thêm', 0, 1, '2024-07-02', 6),
(42, 'thêm mới', 'casio-mtp-m100d-7avdf-nam-2-1.jpg', 'đã thêm', 0, 1, '2024-07-03', 5),
(43, 'AHIHI', 'casio-mtp-m100d-7avdf-nam-2-1.jpg', 'AHIHI', 3, 1, '2024-07-16', 5),
(44, 'đã thêm mới ', 'citizen-nb6032-53p-nam-thumb-600x600.jpg', 'hihi', 0, 1, '2024-07-16', 5),
(46, 'SEIKO ASTRON', 'casi.jpg', 'đã thêm', 0, 1, '2024-07-16', 7),
(47, 'test', 'casi.jpg', 'đã thêm', 14, 1, '2024-07-17', 5),
(48, 'Đồng hồ Orient Mako Solar  Nam RA-TX0202B10B', 'orient-ra-tx0202b10b-nam-thumb-600x600.jpg', 'Đồng hồ Orient Mako Solar 42.8 mm Nam RA-TX0202B10B thuộc thương hiệu Orient của Nhật Bản. Đồng hồ sở hữu đường kính mặt 42.8 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính Sapphire, độ bóng bắt mắt, chống trầy xước bền bỉ, có độ cứng và độ chịu lực cao cùng với khả năng chống ăn mòn tốt. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ thép không gỉ - sang trọng và hạn chế ăn mòn, tạo cảm giác mát tay cho người dùng khi đeo.', 18, 0, '2024-07-17', 7),
(49, 'Đồng hồ Orient Small Bambino Nam RA-AP0106S30B', 'orient-ra-ap0106s30b-nam-thumb-600x600.jpg', 'Đồng hồ Orient Small Bambino 38.4 mm Nam RA-AP0106S30B thuộc thương hiệu Orient của Nhật Bản. Đồng hồ sở hữu đường kính mặt 38.4 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính cứng, có độ cứng và độ chịu lực tốt khi bị va đập, dễ dàng đánh bóng khi bị trầy xước nhẹ. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ da tổng hợp - mềm mại, mang lại sự thoải mái cho người dùng khi đeo.', 112, 0, '2024-07-17', 7),
(50, 'Đồng hồ Casio  Nam MTP-M305D-1AVDF', 'casio-mtp-m305d-1avdf-nam-thumb-600x600.jpg', 'Thương hiệu đồng hồ nổi tiếng đến từ Nhật Bản không ngừng cải tiến và cho ra mắt những dòng sản phẩm chất lượng phù hợp với nhiều đối tượng khách hàng. Những dòng sản phẩm nổi tiếng của Casio là: G-Shock với thiết kế mạnh mẽ cùng độ bền cao, Edifice thiết kế hiện đại cùng nhiều tính năng vượt trội, Sheen với thiết kế cổ điển và sang trọng.', 49, 0, '2024-07-17', 5),
(51, 'Đồng hồ Citizen  Nam AK5003-05A ', 'citizen-ak5003-05a-nam-thumb-600x600.jpg', 'Đồng hồ Citizen 42 mm Nam AK5003-05A với điểm nhấn của sản phẩm là tiện ích tuần trăng được chế tác tinh xảo ở vị trí 6 giờ, tạo nên một vẻ đẹp đầy cảm hứng và tinh tế. Sản phẩm này không chỉ là một phụ kiện hoàn hảo để sử dụng hằng ngày hoặc đi làm, mà giá trị thẩm mỹ của nó sẽ giúp tôn lên sự thanh lịch hiện đại cho các chàng trai. ', 4, 0, '2024-07-17', 6),
(52, 'Đồng hồ Orient Small Bambino Nam RA-AP0104S30B ', 'orient-ra-ap0104s30b-nam-thumb-600x600.jpg', 'Đồng hồ Orient Small Bambino 38.4 mm Nam RA-AP0104S30B thuộc thương hiệu Orient của Nhật Bản. Đồng hồ sở hữu đường kính mặt 38.4 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính cứng, có độ cứng và độ chịu lực tốt khi bị va đập, dễ dàng đánh bóng khi bị trầy xước nhẹ. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ da tổng hợp - mềm mại, mang lại sự thoải mái cho người dùng khi đeo.', 1, 0, '2024-07-17', 7),
(53, 'Đồng hồ Casio  Nam MTP-M100D-7AVDF', 'casio-mtp-m100d-7avdf-nam-2-1.jpg', 'Đồng hồ Casio 42.5 mm Nam MTP-M100D-7AVDF là một chiếc đồng hồ nam đến từ thương hiệu Casio nổi tiếng của Nhật Bản. Với điểm nhấn của sản phẩm là tiện ích tuần trăng được chế tác tinh xảo ở vị trí 6 giờ, tạo nên một vẻ đẹp đầy cảm hứng và tinh tế. Sản phẩm này không chỉ là một phụ kiện hoàn hảo để sử dụng hằng ngày hoặc đi làm, giá trị thẩm mỹ của nó sẽ giúp tôn lên sự thanh lịch hiện đại cho các chàng trai. ', 9, 0, '2024-07-17', 5),
(54, 'Đồng hồ Citizen Series 8 Nam NB6032-53P', 'citizen-nb6032-53p-nam-thumb-600x600.jpg', 'Đồng hồ Citizen Series 8 41 mm Nam NB6032-53P thuộc thương hiệu Citizen của Nhật Bản. Đồng hồ sở hữu đường kính mặt 41 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính Sapphire, độ bóng bắt mắt, chống trầy xước bền bỉ, có độ cứng và độ chịu lực cao cùng với khả năng chống ăn mòn tốt. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ thép không gỉ - sang trọng và hạn chế ăn mòn, tạo cảm giác mát tay cho người dùng khi đeo.', 9, 0, '2024-07-17', 6),
(55, 'Đồng hồ ORIENT Star Nam RE-AV0B02Y00B', 'orient-star-re-av0b02y00b-nam-1-org.jpg', 'Đồng hồ ORIENT Star 41 mm Nam RE-AV0B02Y00B có hệ số chống nước 10 ATM, bạn có thể an tâm đeo chiếc đồng hồ này khi bơi và đi tắm. Lưu ý, bạn không nên mang khi lặn', 6, 0, '2024-07-17', 7),
(56, 'Đồng hồ CASIO  Nam MTP-E501-7AVDF', 'casio-mtp-e501-7avdf-nam-2.jpg', ' Là sản phẩm đến từ thương hiệu đồng hồ Casio nổi tiếng của Nhật Bản  - Chiếc đồng hồ nam này có đường kính mặt 38mm  - Khung viền thép không gỉ bền bỉ, chịu va đập tốt, dây nhựa nhẹ nhàng, chống thấm nước tốt, cho bạn thoải mái khi đeo  - Hệ số chống nước 5 ATM: đồng hồ an toàn khi tắm, rửa tay và đi mưa, không nên đeo khi tham gia bơi lội  - Quản lý thời gian tốt hơn với đồng hồ 24 giờ, tiện ích bấm giờ Chronograph', 2, 0, '2024-07-16', 5),
(57, 'Đồng hồ Citizen Tsuyosa Pantone Nam NJ0158-89L ', 'citizen-tsuyosa-pantone-nj0158-89l-nam-1.jpg', 'Đồng hồ Citizen Tsuyosa Pantone 40 mm Nam NJ0158-89L sở hữu phần mặt đồng hồ dạng vạch với ưu điểm tối giản, dễ xem giờ cùng phong cách trẻ trung, mặt số vạch được sử dụng phổ biến và được các bạn trẻ vô cùng yêu thích.    • Đồng hồ nam này có hệ số kháng nước là 5 ATM cho phép các bạn nam đeo khi đi rửa tay hoặc đi mưa nhỏ, tắm. Lưu ý: không đeo sản phẩm khi đi bơi, lặn.', 3, 0, '2024-07-17', 6),
(58, 'Đồng hồ Casio Nam MTP-M300L-7AVDF', 'casi.jpg', 'Thương hiệu đồng hồ nổi tiếng đến từ Nhật Bản không ngừng cải tiến và cho ra mắt những dòng sản phẩm chất lượng phù hợp với nhiều đối tượng khách hàng. Những dòng sản phẩm nổi tiếng của Casio là: G-Shock với thiết kế mạnh mẽ cùng độ bền cao, Edifice thiết kế hiện đại cùng nhiều tính năng vượt trội, Sheen với thiết kế cổ điển và sang trọng', 1, 0, '2024-07-17', 5),
(59, 'Đồng hồ Citizen Series 8  Nam NB6060-58L ', 'citizen-at8113-12h-nam-1.jpg', 'Đồng hồ Citizen Series 8 42 mm Nam NB6060-58L thuộc thương hiệu Citizen của Nhật Bản. Đồng hồ sở hữu đường kính mặt 43 mm, phù hợp với các bạn nam. Chất liệu mặt kính là kính Sapphire, độ bóng bắt mắt, chống trầy xước bền bỉ, có độ cứng và độ chịu lực cao cùng với khả năng chống ăn mòn tốt. Khung viền của đồng hồ làm từ thép không gỉ - chắc chắn và sáng bóng, hạn chế trầy xước. Chất liệu dây đeo được làm từ thép không gỉ - sang trọng và hạn chế ăn mòn, tạo cảm giác mát tay cho người dùng khi đeo.', 2, 0, '2024-07-17', 6);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tai_khoan` int NOT NULL,
  `ten_tai_khoan` varchar(200) NOT NULL,
  `mat_khau` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `trang_thai` int DEFAULT NULL,
  `sdt` int NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `vai_tro` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id_tai_khoan`, `ten_tai_khoan`, `mat_khau`, `email`, `trang_thai`, `sdt`, `diachi`, `vai_tro`) VALUES
(4, 'Người dùng 1', '123', 'user1@gmail.com', NULL, 123456879, 'ahihi', 0),
(5, 'Admin', '123', 'admin1@gmail.com', NULL, 123456789, 'ahihi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bientheanh`
--
ALTER TABLE `bientheanh`
  ADD PRIMARY KEY (`id_bienthe_anh`);

--
-- Indexes for table `bien_the`
--
ALTER TABLE `bien_the`
  ADD PRIMARY KEY (`id_bien_the`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Indexes for table `billstatus`
--
ALTER TABLE `billstatus`
  ADD PRIMARY KEY (`id_bill_status`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danh_muc`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id_gio_hang`);

--
-- Indexes for table `kichthuoc`
--
ALTER TABLE `kichthuoc`
  ADD PRIMARY KEY (`id_kich_thuoc`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id_payment_status`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_san_pham`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tai_khoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bientheanh`
--
ALTER TABLE `bientheanh`
  MODIFY `id_bienthe_anh` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bien_the`
--
ALTER TABLE `bien_the`
  MODIFY `id_bien_the` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `billstatus`
--
ALTER TABLE `billstatus`
  MODIFY `id_bill_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danh_muc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id_gio_hang` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kichthuoc`
--
ALTER TABLE `kichthuoc`
  MODIFY `id_kich_thuoc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id_payment_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_san_pham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tai_khoan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
