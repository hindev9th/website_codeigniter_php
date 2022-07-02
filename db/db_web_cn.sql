-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 28, 2022 lúc 01:44 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_web_cn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ma_dm` varchar(50) NOT NULL,
  `ten_dm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ma_dm`, `ten_dm`) VALUES
(1, 'DT', 'Điện thoại'),
(2, 'PK', 'Phụ kiện'),
(3, 'TB', 'Tablet'),
(8, 'c', 'x');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dh_tinh_trang`
--

CREATE TABLE `dh_tinh_trang` (
  `id` int(11) NOT NULL,
  `Mo_Ta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dh_tinh_trang`
--

INSERT INTO `dh_tinh_trang` (`id`, `Mo_Ta`) VALUES
(1, 'Đang xử lý'),
(2, 'Đã đóng gói'),
(3, 'Đang vận chuyển'),
(4, 'Đã giao hàng'),
(5, 'Trả lại hàng'),
(6, 'Hủy đơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `Ma_DH` text NOT NULL,
  `id_User` int(11) NOT NULL,
  `id_SP` int(11) NOT NULL,
  `Ten_SP` varchar(100) NOT NULL,
  `id_loai_sp` int(11) NOT NULL,
  `So_Luong` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `Thanh_Tien` int(11) NOT NULL,
  `Yeu_Cau` varchar(2500) NOT NULL,
  `Thanh_Toan` int(11) NOT NULL DEFAULT 1,
  `id_Tinh_Trang` int(11) NOT NULL DEFAULT 1,
  `Thoi_Gian_DH` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bẫy `don_hang`
--
DELIMITER $$
CREATE TRIGGER `Update_SL_tbKieuSP` AFTER INSERT ON `don_hang` FOR EACH ROW UPDATE 
sp_ton 
SET 
So_Luong = 
(SELECT 
 So_Luong 
 FROM 
sp_ton 
 WHERE 
 id_SP = NEW.id_SP  
 AND sp_ton.id = NEW.id_Mau
) - NEW.So_Luong 
WHERE 
 id_SP = NEW.id_SP 
 AND sp_ton.id = NEW.id_Mau
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` int(11) NOT NULL,
  `id_loai` int(11) NOT NULL,
  `so_luong_nhap` int(11) DEFAULT NULL,
  `ngay_nhap` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bẫy `kho`
--
DELIMITER $$
CREATE TRIGGER `Update_SL_SP` AFTER INSERT ON `kho` FOR EACH ROW UPDATE 
sp_ton 
SET
So_Luong = 
(SELECT 
 So_Luong
 FROM 
 sp_ton 
 WHERE 
 id_SP = NEW.id_SP 
 AND sp_ton.Ma_Mau = NEW.Ma_Mau
 ) + NEW.So_Luong_Nhap
WHERE 
id_SP = NEW.id_SP 
AND sp_ton.Ma_Mau = NEW.Ma_Mau
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `Ma_SP` varchar(50) NOT NULL,
  `Ten_SP` varchar(100) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `id_th` int(11) NOT NULL,
  `diem_danh_gia` int(11) NOT NULL,
  `Mo_Ta_Ngan` varchar(2500) NOT NULL,
  `Mo_Ta` varchar(10000) NOT NULL,
  `Anh` text NOT NULL,
  `ngay_nhap` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `Ma_SP`, `Ten_SP`, `id_dm`, `id_th`, `diem_danh_gia`, `Mo_Ta_Ngan`, `Mo_Ta`, `Anh`, `ngay_nhap`) VALUES
(34, 'xmm4', 'xiaomi mix 4', 1, 1, 5, '', 'fggf', '1650884436Xiaomi-Mi-Mix-4.jpg', '2022-06-27'),
(37, 'SSGLX-S', 'Samsung Galaxy s9', 1, 1, 3, '', 'Người ta nói cái gì không bể thì đừng có vá, điều này rất đúng khi nói đến chiếc S9. Nó không tìm cách thay đổi cái gì đã hoàn hảo, chỉ chỉnh sửa lại cấu hình ở bất kì chỗ nào có thể - và kết quả là rất tuyệt vời.\r\nChiếc điện thoại Samsung mới này vẫn đi theo triết lí thiết kế tương tự như Galaxy S8 với khung viền kim loại cứng cáp cùng mặt lưng kính bóng bẩy bo cong mềm mại. Đặc biệt, phần khung viền của Galaxy S9 được hoàn thiện bằng kim loại nhám giúp cầm nắm chắc tay tốt hơn hẳn, chứ không bóng loáng như thời S8. \r\nGalaxy S9 có kích thước màn hình vô cực tỉ lệ 18.5:9, giữ nguyên so với người tiền nhiệm, cụ thể là 5.8 inch. Sử dụng tấm nền Super AMOLED như truyền thống trước giờ của các flagship Samsung, độ phân giải 2K+ đi cùng công nghệ hiển thị HDR 10 ấn tượng.\r\nS9 sử dụng bộ chip set mới: Exynos 9810 với tốc độ cao hơn 20% so với con chip Exynos 8895 mà S8 sử dụng. Nhưng mà điểm Samsung đã đẩy mạnh nhất là về camera. Với khẩu độ có thể thay đổi từ f/1.5 đến f/2.4, bây giờ chiếc Galaxy S9 có thể thống soái vai trò chụp ảnh ngay cả trong môi trường thiếu sáng hoặc thừa sáng. Máy còn đi kèm chức năng quay phim 4K 60fps và quay phim siêu chậm 960fps và định vị chuyển động tự động.\r\nS9 cũng mang theo nhiều thay đổi nhỏ mà người dùng không nhận ra khi cầm trên, nhưng mọi người đều sẽ nhận ra và yêu thích chúng khi họ bắt đầu sử dụng máy. Cặp loa stereo được tinh chỉnh bởi Harman - lần đầu tiên trong lineup của Galaxy S - cho máy khả năng phát âm thanh chân thực với sự hỗ trợ của Dolby Atmos. Sự kết hợp giữa hệ thống khóa máy bằng vân tay, dịnh dạng mặt, và nhận dạng con ngươi là một sự kết hợp mạnh mẽ mà dường như là điều nên có trên mọi chiếc điện thoại tiên tiến.', '1651222805samsung-galaxy-s9.png', '2022-06-27'),
(38, 'SSGLX-S9', 'Samsung Galaxy s9', 1, 1, 3, '', '', '1651222805samsung-galaxy-s9.png', '2022-06-27'),
(39, 'MOPHIE-PD-18W-C', 'Củ sạc mophie Power Delivery 18W usb-c', 1, 1, 4, '', 'Sạc Mophie Power Delivery 18W USB-C – Phụ kiện sạc nhanh chính hãng\r\nHiện nay, để tối ưu hóa tốc độ sạc cũng như thay đổi chuẩn để phù hợp với công nghệ sạc trên thiết bị hầu hết các hãng sản xuất sạc đều dần đổi sang sử dụng chuẩn USB-C. Thiết bị của bạn đang sử dụng USB-C và bạn đang tìm kiếm mua cho mình một bộ cáp sạc vừa phù hợp với jack dây sạc vừa phù hợp với chiếc điện thoại để không gây ảnh hưởng tốc độ sạc. Sạc Mophie Power Delivery 18W USB-C là sự lựa chọn hoàn hảo cho bạn cả về tốc độ cũng như độ an toàn.\r\nThiết kế nhỏ gọn, chất liệu nhựa nhám chống bám bụi bẩn, bền bỉ\r\nSạc Mophie Power Delivery 18W USB-C với thiết kế rất nhỏ gọn, chiếm diện tích không đáng kể khi cắm vào ổ điện, dễ dàng gắn cùng các đầu cắm điện khác trên cùng bản điện. Không những vậy sạc còn rất thuận tiện để vào túi xách mang đi ra ngoài với khối lượng chỉ 50g. Tuy kích thước nhỏ và khối lượng không đáng kể nhưng sạc Mophie Power Delivery 18W sẽ làm bạn ngạc nhiên với tốc độ của nó.\r\nHãng sản xuất đã thiết kế cho sạc Mophie Power Delivery 18W USB-C sử dụng chất liệu nhựa nhám tổng hợp cao cấp hạn chế nứt vỡ khi va đập. Lớp sơn đen nhám được bao phủ bên ngoài sản phẩm tạo nên sự sang trọng và tinh tế cho bộ sạc. Hơn thế nữa, lớp vỏ đen nhám có tính năng chống bám vân tay và mồ hôi giúp cho sạc của bạn luôn sạch sẽ mọi lúc.\r\nTrang bị công nghệ sạc nhanh công suất 18W, ổn định dòng điện khi sạc\r\nSạc Mophie Power Delivery 18W USB-C có công suất sạc lên đến 18W hỗ trợ sạc nhanh mọi thiết bị sử dụng cổng USB-C Power Delivery giúp thiết bị của bạn đầy pin nhanh chóng, giảm thời gian chờ đợi khi sạc. Với công suất sạc lên đến 18W bạn hoàn toàn có thể tự tin sử dụng từ các dòng điện thoại cao cấp đến thấp hơn đều được sạc đầy pin nhanh đáng kể mà không ảnh hưởng đến pin của thiết bị.\r\nSạc Mophie Power Delivery 18W USB-C có điện áp đầu ra và đầu vào ổn định giúp cho cường độ dòng điện được truyền luôn giữ được đúng định mức và xuyên suốt trong quá trình sạc. Khi sạc thiết bị của bạn sẽ không bị quá tải và nóng tối ưu tốt thời gian sạc cũng như tuổi thọ của viên pin.\r\nTương thích nhiều thiết bị hiện nay, đạt chuẩn an toàn chống cháy nổ\r\nSạc Mophie Power Delivery 18W USB-C với điện áp chuẩn đầu ra lần lượt 5V-3A, 9V-2A, 12V-1.5A phù hợp hầu hết các điện thoại, máy tính bảng hiện nay. Khi bạn mua sạc Mophie Power Delivery 18W 1 USB-C, bạn sẽ không cần phải lo nghĩ đến việc sạc có phù hợp với thiết bị của mình hay không sạc sẽ tự điều chỉnh mức chuẩn đầu ra phù hợp với thiết bị không ảnh hưởng đến pin của thiết bị.\r\nKhi bạn chọn mua sạc điều bạn quan tâm là độ an toàn của nó có đạt các tiêu chuẩn về an toàn chống cháy nổ hay không. Đối với sạc Mophie Power Delivery 18W USB-C bạn hoàn toàn có thể yên tâm sử dụng về độ an toàn của nó. Sạc Mophie Power Delivery 18W đã trải qua các vòng thử nghiệm khắt khe và đạt các tiêu chuẩn an toàn về cháy nổ toàn cầu.\r\nMua sạc Mophie Power Delivery 18W USB-C giá rẻ, chính hãng tại Dat-G mobie\r\nVới những tính năng tuyệt vời mang đến cho người sử dụng, sạc Mophie Power Delivery 18W USB-C chính hãng sẽ là sự lựa chọn hoàn hảo về tốc độ cũng như vẻ ngoài đen nhám sang trọng cho bạn. Phụ kiện được bán với giá ưu đãi cùng chính sách bảo hành cực tốt. Dat-G mobie xứng đáng là nơi để quý khách hàng tin tưởng lựa chọn mua sạc Mophie Power Delivery 18W 1 USB-C. Khi mua sạc Mophie 18W chính hãng tại đây bạn sẽ được bảo hành 24 tháng chính hãng.', '1651482485cu-sac-mophie-pd-18w-usb-c.png', '2022-06-27'),
(40, 'SS-S22ULTRA-5G', 'Samsung Galaxy s22 Ultra 5g', 1, 1, 4, '', 'Đánh giá hiệu năng Samsung S22 Ultra với con chip Snapdragon 8 Gen 1\r\nSau nhiều năm chạy chip Exynos thì S22 Ultra là mẫu điện thoại Samsung chính hãng hiếm hoi tại Việt Nam chạy Snapdragon 8 Gen 1. Trước đi đánh giá hiệu năng S22 Ultra, cùng điểm lại một số thông số cấu hình:\r\n\r\n-       Vi xử lý: Snapdragon 8 Gen 1\r\n\r\n-       Bộ nhớ RAM: 8GB hoặc 12GB.\r\n\r\n-       Bộ nhớ trong: 128GB hoặc 256GB hoặc 512GB.\r\n\r\nSau đây là điêm số benchmark của Galaxy S22 Ultra được các trang chuyên công nghệ thực hiện.\r\n\r\nĐiểm Geekbench 5 của Galaxy S22 Ultra PCMag thực hiện:\r\n\r\n-       Điểm đa nhân: 3.433 điểm \r\n\r\n-       Điểm đơn nhân: 1.232\r\n\r\nĐiểm số này có sự khác biệt so với chip Snapdragon 888 được ra mắt nắm 2020. Cụ thể, điểm đơn lõi tăng 13% và đa lõi tăng 9%. Nhưng trên thang điểm chuẩn của GFXBench thì ở một số tác vụ nhất định, con chip này cho hiệu năng tốt hơn khoảng 20%.\r\nBộ nhớ S22 Ultra được nâng cấp với ba phiên bản lựa chọn\r\nTrước nhiều đồn đoán rằng  Samsung Galaxy S22 Ultra có thể cho ra mắt phiên bản bộ nhớ 1TB thì thực tế hãng chỉ cho ra mắt ba phiên bản cấu hình bộ nhớ, trong đó phiên bản bộ nhớ cao nhất là 512GB.\r\n\r\nGalaxy S22 Ultra 128GB bộ nhớ trong: Đây là phiên bản cấu hình tiêu chuẩn, phù hợp với nhu cầu sử dụng của nhiều người dùng.\r\n\r\nGalaxy S22 Ultra 256GB bộ nhớ trong: Nếu người dùng có như cầu lưu trữ hình ảnh, video lớn thì bộ nhớ 256GB là lựa chọn đáng để tham khảo.\r\n\r\nGalaxy S22 Ultra 512GB bộ nhớ trong: Với phiên bản 512GB bộ nhớ sẽ phù hợp với những người dùng đòi hỏi không gian lưu trữ lớn như quay phim, chụp ảnh 8K hay lưu trữ dữ liệu lớn.\r\n\r\nNgoài ba phiên bản bộ nhớ lưu trữ thì Samsung cũng cung cấp tới haio phiên bản bộ nhớ RAM lần lượt là 8GB và 12GB cho người dùng lựa chọn.\r\nSamsung S22 Ultra hỗ trợ bút S Pen tiện lợi\r\nS Pen là sản phẩm đặc trưng của dòng Samsung Note. Tuy thế hệ S vẫn có thể sử dụng bút S Pen nhưng sẽ phải mua riêng và không thể cất bên trong điện thoại. Nhưng với Samsung S22 Ultra, Samsung đã trang bị khe cắm S Pen trên thiết bị giúp người dùng có thể tiện lợi khi sử dụng. Tuy nhiên khác với trước đó là Spen sẽ có cùng màu với máy thì năm nay, S-Pen sẽ chỉ có màu đen. \r\n\r\nVới bút Spen, giời đây người dùng Samsung S22 Ultra có thể thoải mái ghi chú, điều khiển điện thoại như trên các dòng Samsung Note. Bút Spen mới này cũng được cải thiện độ trễ mang lại trải nghiệm dùng chân thực từ viết chữ, vẽ hay ghi chú. ', '16514846001.png', '2022-06-27');

--
-- Bẫy `san_pham`
--
DELIMITER $$
CREATE TRIGGER `Insert_tb_tt_san_pham` AFTER INSERT ON `san_pham` FOR EACH ROW INSERT INTO sp_thong_so VALUES('',NEW.id,'','','','','','','','')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_tb_sp_image` AFTER INSERT ON `san_pham` FOR EACH ROW INSERT INTO sp_image VALUES('',NEW.id,'','','','','')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inser_tb_gia` AFTER INSERT ON `san_pham` FOR EACH ROW INSERT INTO sp_gia VALUES('',NEW.id,NEW.Gia,0,NEW.Gia)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_tb_sp_ton` AFTER INSERT ON `san_pham` FOR EACH ROW INSERT INTO sp_ton VALUES('',NEW.id,'','',0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `id_tin_tuc` int(11) NOT NULL,
  `tieu_de` varchar(500) NOT NULL,
  `anh` text NOT NULL,
  `tinh_trang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `id_tin_tuc`, `tieu_de`, `anh`, `tinh_trang`) VALUES
(14, 0, 'k', '1651484944s22.png', 0),
(15, 0, 'n', '1651485202Nokia_G21.png', 0),
(16, 0, 'i', '1651485213ip13-xl-sh-690-300-max.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `sp_ban_chay`
-- (See below for the actual view)
--
CREATE TABLE `sp_ban_chay` (
`id` int(11)
,`ma_sp` varchar(50)
,`id_dm` int(11)
,`id_th` int(11)
,`ten_sp` varchar(100)
,`gia` int(11)
,`mo_ta_ngan` varchar(2500)
,`mo_ta` varchar(10000)
,`anh` text
,`so_luong_don` bigint(21)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_danh_gia`
--

CREATE TABLE `sp_danh_gia` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `diem_danh_gia` int(11) NOT NULL,
  `noi_dung` varchar(10000) NOT NULL,
  `thoi_gian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bẫy `sp_danh_gia`
--
DELIMITER $$
CREATE TRIGGER `update_tb_sp_rate` AFTER INSERT ON `sp_danh_gia` FOR EACH ROW UPDATE san_pham SET san_pham.Danh_Gia = 
    
(SELECT SUM(Rate)/COUNT(Ma_SP) 
 FROM sp_danh_gia 
 WHERE Ma_SP = NEW.Ma_SP)
 
 WHERE Ma_SP = NEW.MA_SP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_image`
--

CREATE TABLE `sp_image` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp_image`
--

INSERT INTO `sp_image` (`id`, `id_sp`, `anh`) VALUES
(23, 34, ''),
(26, 37, ''),
(27, 38, ''),
(28, 39, '16514829661.png'),
(29, 40, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_ton`
--

CREATE TABLE `sp_ton` (
  `id` int(11) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `loai` text NOT NULL,
  `ma_mau` text NOT NULL,
  `ten_mau` varchar(100) NOT NULL,
  `gia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp_ton`
--

INSERT INTO `sp_ton` (`id`, `ma_sp`, `loai`, `ma_mau`, `ten_mau`, `gia`, `so_luong`) VALUES
(12, 'xmm4', '', '#fff', 'Màu trắng', 0, 4),
(13, 'xmm4', '', '#000', 'Màu đen', 0, 15),
(14, 'SSGLX-S', '', '#935cad', 'Tim', 0, 1),
(15, 'SSGLX-S', '', '#5295cc', 'Xanh', 0, 2),
(16, 'SS-S22ULTRA-5G', '', '#935cad', 'Tim', 0, 2),
(17, 'SS-S22ULTRA-5G', '', '#000', 'Màu đen', 0, 1),
(18, 'xmm4', '', '#000', 'Màu đen', 0, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `gioi_tinh` varchar(10) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `sdt` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `email`, `sdt`, `username`, `password`, `anh`) VALUES
(1, '', '', '0000-00-00', '', 0, 'nguyenhien', 'e10adc3949ba59abbe56e057f20f883e', ''),
(2, '', '', '0000-00-00', '', 0, 'gsfgsf', 'e10adc3949ba59abbe56e057f20f883e', ''),
(7, '', '', '0000-00-00', '', 0, 'hien123', '900150983cd24fb0d6963f7d28e17f72', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_tin_tuc`
--

CREATE TABLE `tb_tin_tuc` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL COMMENT 'id của người đăng',
  `tieu_de` varchar(500) NOT NULL COMMENT 'Tiêu đề',
  `noi_dung` varbinary(21844) NOT NULL COMMENT 'Nội dung bài đăng',
  `thoi_gian` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian đăng bài'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `gioi_tinh` int(5) NOT NULL,
  `nam_sinh` date NOT NULL DEFAULT current_timestamp(),
  `sdt` int(12) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `dia_chi` varchar(150) NOT NULL,
  `anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_users`
--

INSERT INTO `tb_users` (`id`, `ho_ten`, `gioi_tinh`, `nam_sinh`, `sdt`, `email`, `password`, `dia_chi`, `anh`) VALUES
(1, 'fgghhh', 0, '0000-00-00', 0, '', '', '', ''),
(3, 'hien', 0, '2000-09-08', 865198651, 'fsdf@gmail.com', '', 'bac ninh', '1649683013Avatar.jpg'),
(8, '', 0, '0000-00-00', 0, '', '', '', ''),
(9, 'lê nguyên hiện', 0, '0000-00-00', 865198651, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 'aadđ', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `id` int(11) NOT NULL,
  `ma_th` varchar(50) NOT NULL,
  `ten_th` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`id`, `ma_th`, `ten_th`) VALUES
(1, 'IP', 'Iphone'),
(2, 'MP', 'Mophie '),
(3, 'SS', 'SamSung'),
(4, 'XM', 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `tt_kho`
-- (See below for the actual view)
--
CREATE TABLE `tt_kho` (
`ma_sp` varchar(50)
,`loai` text
,`ten_mau` varchar(100)
,`tong_so_luong` int(11)
,`so_luong_nhap` int(11)
,`ngay_nhap` datetime
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_sp`
-- (See below for the actual view)
--
CREATE TABLE `view_sp` (
`id` int(11)
,`ma_sp` varchar(50)
,`id_dm` int(11)
,`id_th` int(11)
,`ten_sp` varchar(100)
,`loai` text
,`gia` int(11)
,`mo_ta_ngan` varchar(2500)
,`mo_ta` varchar(10000)
,`diem_danh_gia` int(11)
,`anh` text
,`so_luong` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay`
--

CREATE TABLE `vnpay` (
  `id` int(11) NOT NULL,
  `Ma_DH` int(11) NOT NULL,
  `Noi_Dung` varchar(2500) NOT NULL,
  `Ma_PH` text NOT NULL,
  `Ma_GD` int(11) NOT NULL,
  `Ma_NH` text NOT NULL,
  `Thoi_Gian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `sp_ban_chay`
--
DROP TABLE IF EXISTS `sp_ban_chay`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sp_ban_chay`  AS SELECT `san_pham`.`id` AS `id`, `san_pham`.`Ma_SP` AS `ma_sp`, `san_pham`.`id_dm` AS `id_dm`, `san_pham`.`id_th` AS `id_th`, `san_pham`.`Ten_SP` AS `ten_sp`, `sp_ton`.`gia` AS `gia`, `san_pham`.`Mo_Ta_Ngan` AS `mo_ta_ngan`, `san_pham`.`Mo_Ta` AS `mo_ta`, `san_pham`.`Anh` AS `anh`, count(`don_hang`.`id_SP`) AS `so_luong_don` FROM ((`san_pham` join `sp_ton`) join `don_hang`) WHERE `san_pham`.`id` = `don_hang`.`id_SP` AND `san_pham`.`Ma_SP` = `sp_ton`.`ma_sp` GROUP BY `san_pham`.`Ma_SP` ORDER BY count(`don_hang`.`id_SP`) AS `DESCdesc` ASC  ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `tt_kho`
--
DROP TABLE IF EXISTS `tt_kho`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tt_kho`  AS SELECT `sp_ton`.`ma_sp` AS `ma_sp`, `sp_ton`.`loai` AS `loai`, `sp_ton`.`ten_mau` AS `ten_mau`, `sp_ton`.`so_luong` AS `tong_so_luong`, `kho`.`so_luong_nhap` AS `so_luong_nhap`, `kho`.`ngay_nhap` AS `ngay_nhap` FROM (`kho` join `sp_ton`) WHERE `kho`.`id_loai` = `sp_ton`.`id` ORDER BY `kho`.`id` AS `DESCdesc` ASC  ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_sp`
--
DROP TABLE IF EXISTS `view_sp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sp`  AS SELECT `san_pham`.`id` AS `id`, `san_pham`.`Ma_SP` AS `ma_sp`, `san_pham`.`id_dm` AS `id_dm`, `san_pham`.`id_th` AS `id_th`, `san_pham`.`Ten_SP` AS `ten_sp`, `sp_ton`.`loai` AS `loai`, `sp_ton`.`gia` AS `gia`, `san_pham`.`Mo_Ta_Ngan` AS `mo_ta_ngan`, `san_pham`.`Mo_Ta` AS `mo_ta`, `san_pham`.`diem_danh_gia` AS `diem_danh_gia`, `san_pham`.`Anh` AS `anh`, sum(`sp_ton`.`so_luong`) AS `so_luong` FROM (`san_pham` join `sp_ton` on(`sp_ton`.`ma_sp` = `san_pham`.`Ma_SP`)) WHERE `sp_ton`.`so_luong` > 0 GROUP BY `san_pham`.`Ma_SP` ORDER BY `san_pham`.`ngay_nhap` AS `DESCdesc` ASC  ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dh_tinh_trang`
--
ALTER TABLE `dh_tinh_trang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_User` (`id_User`,`id_SP`),
  ADD KEY `id_SP` (`id_SP`),
  ADD KEY `id_Tinh_Trang` (`id_Tinh_Trang`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_loai` (`id_loai`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Ma_SP` (`Ma_SP`) USING BTREE,
  ADD KEY `Ma_DM` (`id_dm`,`id_th`),
  ADD KEY `Ma_TH` (`id_th`),
  ADD KEY `id_th` (`id_th`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sp_danh_gia`
--
ALTER TABLE `sp_danh_gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sp` (`id_sp`,`id_user`);

--
-- Chỉ mục cho bảng `sp_image`
--
ALTER TABLE `sp_image`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_SP` (`id_sp`);

--
-- Chỉ mục cho bảng `sp_ton`
--
ALTER TABLE `sp_ton`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_SP` (`ma_sp`);

--
-- Chỉ mục cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_tin_tuc`
--
ALTER TABLE `tb_tin_tuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `dh_tinh_trang`
--
ALTER TABLE `dh_tinh_trang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `sp_danh_gia`
--
ALTER TABLE `sp_danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sp_image`
--
ALTER TABLE `sp_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `sp_ton`
--
ALTER TABLE `sp_ton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tb_tin_tuc`
--
ALTER TABLE `tb_tin_tuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`id_SP`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_3` FOREIGN KEY (`id_Tinh_Trang`) REFERENCES `dh_tinh_trang` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_4` FOREIGN KEY (`id_User`) REFERENCES `tb_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `dm_v_sp` FOREIGN KEY (`id_dm`) REFERENCES `danh_muc` (`id`),
  ADD CONSTRAINT `th_v_sp` FOREIGN KEY (`id_th`) REFERENCES `thuong_hieu` (`id`);

--
-- Các ràng buộc cho bảng `sp_image`
--
ALTER TABLE `sp_image`
  ADD CONSTRAINT `sp_image_ibfk_1` FOREIGN KEY (`id_SP`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sp_ton`
--
ALTER TABLE `sp_ton`
  ADD CONSTRAINT `ton_v_sp` FOREIGN KEY (`Ma_SP`) REFERENCES `san_pham` (`Ma_SP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
