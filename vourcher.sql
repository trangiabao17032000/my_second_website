-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2021 lúc 10:46 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `taikhoanadmin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`taikhoanadmin`, `password`) VALUES
('adminBao', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `madonhang` varchar(6) NOT NULL,
  `masp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`madonhang`, `masp`, `soluong`, `dongia`, `thanhtien`) VALUES
('DH0001', 'SP0001', 1, 299000, 299000),
('DH0001', 'SP0002', 1, 269000, 269000),
('DH0001', 'SP0003', 1, 149000, 149000),
('DH0001', 'SP0004', 1, 686000, 686000),
('DH0001', 'SP0005', 1, 990000, 990000),
('DH0001', 'SP0006', 1, 195000, 195000),
('DH0002', 'SP0021', 1, 299000, 299000),
('DH0003', 'SP0001', 5, 299000, 1495000),
('DH0003', 'SP0002', 5, 269000, 1345000),
('DH0003', 'SP0003', 5, 149000, 745000),
('DH0004', 'SP0001', 2, 299000, 598000),
('DH0004', 'SP0010', 2, 199000, 398000),
('DH0004', 'SP0012', 2, 99000, 198000),
('DH0004', 'SP0027', 2, 50000, 100000),
('DH0005', 'SP0002', 1, 269000, 269000),
('DH0005', 'SP0024', 1, 159000, 159000),
('DH0005', 'SP0023', 1, 140000, 140000),
('DH0006', 'SP0020', 1, 120000, 120000),
('DH0006', 'SP0021', 5, 299000, 1495000),
('DH0006', 'SP0022', 1, 159000, 159000),
('DH0007', 'SP0002', 2, 269000, 538000),
('DH0007', 'SP0003', 2, 149000, 298000),
('DH0007', 'SP0004', 2, 686000, 1372000),
('DH0007', 'SP0005', 2, 990000, 1980000),
('DH0007', 'SP0006', 2, 195000, 390000),
('DH0008', 'SP0001', 1, 299000, 299000),
('DH0008', 'SP0002', 1, 269000, 269000),
('DH0009', 'SP0005', 1, 990000, 990000),
('DH0009', 'SP0004', 1, 686000, 686000),
('DH0010', 'SP0015', 1, 49000, 49000),
('DH0010', 'SP0017', 1, 99000, 99000),
('DH0011', 'SP0002', 5, 269000, 1345000),
('DH0012', 'SP0003', 2, 149000, 298000),
('DH0013', 'SP0028', 5, 50000, 250000),
('DH0014', 'SP0014', 5, 99000, 495000),
('DH0015', 'SP0001', 2, 299000, 598000),
('DH0015', 'SP0002', 2, 269000, 538000),
('DH0015', 'SP0003', 2, 149000, 298000),
('DH0016', 'SP0005', 1, 990000, 990000),
('DH0016', 'SP0008', 1, 195000, 195000),
('DH0016', 'SP0007', 1, 199000, 199000),
('DH0017', 'SP0006', 5, 195000, 975000),
('DH0018', 'SP0023', 1, 140000, 140000),
('DH0018', 'SP0024', 1, 159000, 159000),
('DH0018', 'SP0025', 1, 279000, 279000),
('DH0019', 'SP0027', 10, 50000, 500000),
('DH0020', 'SP0004', 5, 686000, 3430000),
('DH0021', 'SP0009', 2, 229000, 458000),
('DH0021', 'SP0010', 2, 199000, 398000),
('DH0021', 'SP0011', 2, 169000, 338000),
('DH0022', 'SP0014', 1, 99000, 99000),
('DH0022', 'SP0015', 1, 49000, 49000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madonhang` varchar(6) NOT NULL,
  `makhachhang` varchar(6) NOT NULL,
  `tongsoluongsp` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `ngaydatdon` date NOT NULL,
  `hinhthuc` varchar(70) NOT NULL,
  `tinhtrang` varchar(70) NOT NULL,
  `diachigiao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madonhang`, `makhachhang`, `tongsoluongsp`, `tongtien`, `ngaydatdon`, `hinhthuc`, `tinhtrang`, `diachigiao`) VALUES
('DH0001', 'KH0001', 6, 2688000, '2021-01-02', 'Tiền mặt', 'Đã xác nhận', '123/12, Quốc Lộ 50, Huyện Bình Chánh, TP HCM'),
('DH0002', 'KH0001', 1, 299000, '2021-01-03', 'Tiền mặt', 'Đã xác nhận', '123, Tỉnh lộ 2, Quận 10'),
('DH0003', 'KH0001', 15, 3585000, '2021-01-06', 'Tiền mặt', 'Đã xác nhận', '123/12, Quốc Lộ 50, Huyện Bình Chánh, TP HCM'),
('DH0004', 'KH0002', 8, 1294000, '2021-01-16', 'Tiền mặt', 'Đã xác nhận', '27, Cách Mạng Tháng Tám, Quận Tân Bình, TP HCM'),
('DH0005', 'KH0003', 3, 568000, '2021-01-17', 'Tiền mặt', 'Đã xác nhận', '137/12, Lê Đình Cẩn, Quận Bình Tân, TP HCM'),
('DH0006', 'KH0003', 7, 1774000, '2021-01-19', 'Tiền mặt', 'Đã xác nhận', '12, An Dương Vương, Quận 5, TP HCM'),
('DH0007', 'KH0001', 10, 4578000, '2021-01-22', 'Tiền mặt', 'Đã xác nhận', '123/12, Quốc Lộ 50, Huyện Bình Chánh, TP HCM'),
('DH0008', 'KH0003', 2, 568000, '2021-01-25', 'Tiền mặt', 'Đã xác nhận', '137/12, Lê Đình Cẩn, Quận Bình Tân, TP HCM'),
('DH0009', 'KH0001', 2, 1676000, '2021-01-30', 'Tiền mặt', 'Đã xác nhận', '123/12, Quốc Lộ 50, Huyện Bình Chánh, TP HCM'),
('DH0010', 'KH0003', 2, 148000, '2021-02-01', 'Tiền mặt', 'Đã xác nhận', '137/12, Lê Đình Cẩn, Quận Bình Tân, TP HCM'),
('DH0011', 'KH0004', 5, 1345000, '2021-02-2', 'Tiền mặt', 'Đã xác nhận', '1648, Tỉnh Lộ 10, Quận Bình Tân, TP HCM'),
('DH0012', 'KH0004', 2, 298000, '2021-02-8', 'Tiền mặt', 'Đã xác nhận', '1648, Tỉnh Lộ 10, Quận Bình Tân, TP HCM'),
('DH0013', 'KH0004', 5, 250000, '2021-02-10', 'Tiền mặt', 'Đã xác nhận', '375, Điện Biên Phủ, Quận 3, TP HCM'),
('DH0014', 'KH0002', 5, 495000, '2021-02-15', 'Tiền mặt', 'Đã xác nhận', '34, Nguyễn Văn Luông, Quận 6, TP HCM'),
('DH0015', 'KH0007', 6, 1434000, '2021-02-17', 'Tiền mặt', 'Đã xác nhận', '90, Quốc Lộ 22, Huyện Củ Chi, TP HCM'),
('DH0016', 'KH0001', 3, 1384000, '2021-02-20', 'Tiền mặt', 'Đã xác nhận', '123/12, Quốc Lộ 50, Huyện Bình Chánh, TP HCM'),
('DH0017', 'KH0005', 5, 975000, '2021-02-21', 'Tiền mặt', 'Đã xác nhận', '23, Bà Điểm, Huyện Hóc Môn, TP HCM'),
('DH0018', 'KH0006', 3, 578000, '2021-02-22', 'Tiền mặt', 'Đã xác nhận', '72, Lê Hoàng Phái, Quận Gò Vấp, TP HCM'),
('DH0019', 'KH0008', 10, 500000, '2021-02-22', 'Tiền mặt', 'Đã xác nhận', '154, Dương Văn Hạnh, Huyện Cần Giờ, TP HCM'),
('DH0020', 'KH0009', 5, 3430000, '2021-3-10', 'Tiền mặt', 'Đã xác nhận', '46, Nguyễn Công Trứ, Quận Bình Thạnh, TP HCM'),
('DH0021', 'KH0010', 6, 1194000, '2021-3-15', 'Tiền mặt', 'Đã xác nhận', '47, Đào Duy Từ, Quận Phú Nhuận, TP HCM'),
('DH0022', 'KH0001', 2, 148000, '2021-3-16', 'Tiền mặt', 'Đã hủy', '123/12, Quốc Lộ 50, Huyện Bình Chánh, TP HCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `maloaisp` varchar(50) NOT NULL,
  `tenloaisp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`maloaisp`, `tenloaisp`) VALUES
('amthuc', 'Ẩm thực'),
('lamdep', 'Spa & làm đẹp'),
('gtri', 'Giải trí và thể thao'),
('nhakhoa', 'Nha khoa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(50) NOT NULL,
  `tensp` text NOT NULL,
  `maloaisp` varchar(50) NOT NULL,
  `giasp` int(11) NOT NULL,
  `motasp` text NOT NULL,
  `tinhtrang` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `maloaisp`, `giasp`, `motasp`, `tinhtrang`) VALUES
('SP0001', 'Oscar Saigon Hotel 3* ', 'amthuc', 299000, 'Buffet Tối T7 & CN Hải Sản, Bò Mỹ, Nướng & Lẩu - Free Rượu Vang, Tráng Miệng View Phố Đi Bộ Nguyễn Huệ Đẹp Nhất Việt Nam. Voucher 379,000 VNĐ, Còn 299,000 VNĐ, Giảm 21%', NULL),
('SP0002', 'Buffet Tối Nướng & Lẩu Hải Sản Tôm Càng, Bò Mỹ', 'amthuc', 269000, 'Menu Đặc Biệt Tại Barbecue Garden - 12 Năm Khẳng Định Thương Hiệu. Voucher 299,000 VNĐ, Còn 269,000 VNĐ, Giảm 10%.', NULL),
('SP0003', 'Buffet Hấp Thủy Nhiệt Trọn Vẹn Tinh Túy Hong Kong', 'amthuc', 149000, 'Hệ Thống Hong Kong Steam - Buffet Hấp Thủy Nhiệt Trọn Vẹn Tinh Túy Hong Kong. Voucher 279,000 VNĐ, Còn 149,000 VNĐ, Giảm 47%.', NULL),
('SP0004', 'Liberty Central SG Citypoint Hotel 4*', 'amthuc', 686000, 'Buffet Tối - Tôm Hùm, Hải Sản Cao Cấp Thứ 6 Đến Chủ Nhật.*. Voucher 807,000 VNĐ, Còn 686,000 VNĐ, Giảm 15%.', NULL),
('SP0005', 'Pullman Saigon Centre 5*', 'amthuc', 990000, 'Buffet Tối Tôm Hùm, Hải Sản Đẳng Cấp Quốc Tế - Freelow Soft Drink - Đã VAT. . Voucher 1,502,000 VNĐ, Còn 1,050,000 VNĐ, Giảm 30%.', NULL),
('SP0006', 'Lẩu Siêu Tốc', 'amthuc', 195000, 'Combo 5 Loại Lẩu Thượng Hạng Dành Cho 3-4 Người Tại Lẩu Siêu Tốc. Voucher 218,000 VNĐ, Còn 195,000 VNĐ, Giảm 11%. ', NULL),
('SP0007', 'Seoul Garden ', 'amthuc', 199000, 'Tiệc Buffet Với 150 Món Nướng - Lẩu 2in1. Voucher 252,000 VNĐ, Còn 199,000 VNĐ, Giảm 21%.', NULL),
('SP0008', 'King BBQ Hoàng Hoa Thám ', 'amthuc', 195000, 'Đệ Nhất Vua Buffet Nướng Hơn 200 Món Ngon Hàn Quốc. Voucher 229,000 VNĐ, Còn 195,000 VNĐ, Giảm 15%.', NULL),
('SP0009', 'Buffet Lẩu Đài Loan ', 'amthuc', 229000, 'Thiên Đường Lẩu Đào Hoa - Buffet Lẩu Đài Loan Lừng Danh Chạy Chuyền Trên Thố Với 6 Vị Lẩu Đặc Sắc Và Hơn 80 Món Nhúng (Đã Bao Gồm VAT & Nước Uống). Voucher 296,000 VNĐ, Còn 229,000 VNĐ, Giảm 23%.', NULL),
('SP0010', 'Hotpot Story', 'amthuc', 199000, 'Buffet Tinh Hoa Lẩu Hơn 100 Món – Chi Nhánh Diamond Plaza. Voucher 263,000 VNĐ, Còn 199,000 VNĐ, Giảm 24%. ', NULL),
('SP0011', 'Buffet Lẩu Nhật Hải Sản, Bò Mỹ & Dimsum', 'amthuc', 169000, '50 – 90 Món Nhúng Và 8 Vị Nước Lẩu – Miễn Phí Tráng Miệng Tại Rakuen Hotpot. Voucher 199,000 VNĐ, Còn 169,000 VNĐ, Giảm 15%.', NULL),
('SP0012', 'Beefsteak Bò Úc Thượng Hạng Kèm Nước Sốt Tự Chọn', 'amthuc', 99000, 'Beefsteak Bò Úc Thượng Hạng Kèm Nước Sốt Tự Chọn Tại Pacow Beef Quán. Voucher 120,000 VNĐ, Còn 99,000 VNĐ, Giảm 18%.', NULL),
('SP0013', 'Mai Spa', 'lamdep', 185000, 'Free Xông Hơi (Sauna) + Buffet Aroma Massage Body Tinh Dầu + Đi Đá Nóng + Bấm Huyệt + Nhấn Huyệt + Massage Cổ, Vai, Gáy + Bẻ Người Giãn Gân Cốt Lưu Thông Máu Huyết – Mai Spa. Voucher 450,000 VNĐ, Còn 185,000 VNĐ, Giảm 59%.', NULL),
('SP0014', 'Buffet Spa 20 Combo 120 Phút Massage Body', 'lamdep', 99000, 'Buffet Spa 20 Combo 120 Phút Massage Body, Tắm Trắng, Chăm Sóc Điều Trị Da Mặt, Làm Ốm, Gội Đầu, Làm Hồng – Lali Beauty Spa 5*. Voucher 680,000 VNĐ, Còn 99,000 VNĐ, Giảm 85%. ', NULL),
('SP0015', 'Gội Đầu Thảo Dược 100% Thiên Nhiên', 'lamdep', 49000, 'Gội Đầu Thảo Dược 100% Thiên Nhiên + Massage Trị Liệu - Giải Pháp Nuôi Tóc Chắc Khỏe Tại Iseul Spa. Voucher 210,000 VNĐ, Còn 49,000 VNĐ, Giảm 77%.', NULL),
('SP0016', 'Thẩm Mỹ Viện Văn Phượng ', 'lamdep', 99000, 'Thải Chì/ Điều Trị Mụn/ Vi Kim Nano Tế Bào Gốc Tại Thẩm Mỹ Viện Văn Phượng. Voucher 800,000 VNĐ, Còn 99,000 VNĐ, Giảm 88%.', NULL),
('SP0017', 'Buffet Spa - 20 Combo Massage', 'lamdep', 99000, 'Miễn Tip - Buffet Spa - 20 Combo Massage Body, Mặt, Giảm Béo 110’ - Khánh Hương Spa. Voucher 650,000 VNĐ, Còn 99,000 VNĐ.', NULL),
('SP0018', 'Biển Xanh Spa', 'lamdep', 99000, '90 Phút Cấy Collagen Tươi Căng Bóng/ Điều Trị Mụn/ Ấn Huyệt + Massage Body, Foot, Tẩy Trang + Tẩy Tế Bào Chết/ Xông Hơi Đá Muối Himalaya + Tẩy Tế Bào Chết Tại Biển Xanh Spa. Voucher 699,000 VNĐ, Còn 99,000 VNĐ, Giảm 86%.', NULL),
('SP0019', 'Hệ Thống Spa Việt Hàn - Âu Hàn', 'lamdep', 499000, 'Trọn Gói Triệt Lông Nách Vĩnh Viễn Bảo Hành 2 Năm Cao Cấp, Không Đau Rát, Trẻ Hóa Da Tại Hệ Thống Spa Việt Hàn - Âu Hàn. Voucher 5,000,000 VNĐ, Còn 499,000 VNĐ, Giảm 90%.', NULL),
('SP0020', 'Khu Tuyết Snow Town Sài Gòn', 'gtri', 120000, 'Vé Trọn Gói Vui Chơi Trượt Tuyết Cực Thích Với Bốn Mùa Tuyết Rơi Giữa Lòng Sài Gòn Duy Nhất Tại Việt Nam. Voucher 160,000 VNĐ, Còn 120,000 VNĐ, Giảm 25%.', NULL),
('SP0021', '60 Gym & Yoga', 'gtri', 299000, 'Trọn Gói 1 Tháng Tập Gym, Yoga, Zumba & Sử Dụng Không Giới Hạn Các Tiện Ích, Thiết Bị Hiện Đại Nhập Khẩu 100% – Tặng 01 Buổi PT Cá Nhân. Voucher 1,200,000 VNĐ, Còn 299,000 VNĐ, Giảm 75%. ', NULL),
('SP0022', 'SUỐI TIÊN', 'gtri', 159000, 'Vé Cổng + Nhiều Trò Chơi Siêu Náo Nhiệt. Voucher 250,000 VNĐ, Còn 159,000 VNĐ, Giảm 36%.', NULL),
('SP0023', 'Bảo Tàng Tranh 3D', 'gtri', 140000, 'Bảo Tàng Tranh 3D Artinus Thỏa Thích Chụp Ảnh - Duy Nhất Tại Việt Nam. Voucher 230,000 VNĐ, Còn 140,000 VNĐ, Giảm 39%.', NULL),
('SP0024', 'Đầm Sen', 'gtri', 159000, 'Chơi Thả Ga, Giá Cực Đã - Vé Trọn Gói Vào Cổng + Xem Biểu Diễn Lakeshow Nhạc Nước Hoành Tráng + Tham Gia 35 Trò Chơi Hiện Đại Siêu Hấp Dẫn. Voucher 240,000 VNĐ, Còn 159,000 VNĐ, Giảm 34%.', NULL),
('SP0025', 'Hệ Thống Nha Khoa Trí Việt', 'nhakhoa', 279000, 'Tẩy Trắng Răng Plasma White Hiệu Quả Tức Thì, Tỏa Sáng Nụ Cười. Voucher 2,000,000 VNĐ, Còn 279,000 VNĐ, Giảm 86%.', NULL),
('SP0026', 'Nha Khoa Đoàn Gia', 'nhakhoa', 69000, 'Cạo Vôi + Đánh Bóng/ Trám Răng Chất Lượng Cao Tại Nha Khoa Đoàn Gia. Voucher 300,000 VNĐ, Còn 69,000 VNĐ, Giảm 77%.', NULL),
('SP0027', 'Nha Khoa Minh Tỷ', 'nhakhoa', 50000, 'Cạo Vôi, Đánh Bóng/ Trám Răng. Voucher 300,000 VNĐ, Còn 50,000 VNĐ, Giảm 83%.', NULL),
('SP0028', 'Nha Khoa Quốc Tế K-Da', 'nhakhoa', 50000, 'Cạo Vôi, Đánh Bóng/ Trám Răng. Voucher 300,000 VNĐ, Còn 50,000 VNĐ, Giảm 83%.', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taikhoan` varchar(20) NOT NULL,
  `makh` varchar(6) DEFAULT NULL,
  `matkhau` varchar(200) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `hoten` varchar(70) NOT NULL,
  `diachi` varchar(70) NOT NULL,
  `trangthai` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`taikhoan`, `makh`, `matkhau`, `dienthoai`, `hoten`, `diachi`, `trangthai`) VALUES
('trangiabao1', 'KH0001', '25f9e794323b453885f5181f1b624d0b', '0869233832', 'Trần Gia Bảo1', '123/12, Quốc Lộ 50, Huyện Bình Chánh, TP HCM', NULL),
('trangiabao2', 'KH0002', '25f9e794323b453885f5181f1b624d0b', '0869233832', 'Trần Gia Bảo2', '27, Cách Mạng Tháng Tám, Quận Tân Bình, TP HCM', NULL),
('trangiabao3', 'KH0003', '25f9e794323b453885f5181f1b624d0b', '0869233832', 'Trần Gia Bảo3', '137/12, Lê Đình Cẩn, Quận Bình Tân, TP HCM', NULL),
('lyquocnguyen1', 'KH0004', '25f9e794323b453885f5181f1b624d0b', '0937233832', 'Lý Quốc Nguyên1', '1648, Tỉnh Lộ 10, Quận Bình Tân, TP HCM', NULL),
('lyquocnguyen2', 'KH0005', '25f9e794323b453885f5181f1b624d0b', '0937233832', 'Lý Quốc Nguyên2', '23, Bà Điểm, Huyện Hóc Môn, TP HCM', NULL),
('lyquocnguyen3', 'KH0006', '25f9e794323b453885f5181f1b624d0b', '0937233832', 'Lý Quốc Nguyên3', '72, Lê Hoàng Phái, Quận Gò Vấp, TP HCM', NULL),
('lyquocnguyen4', 'KH0007', '25f9e794323b453885f5181f1b624d0b', '0937233832', 'Lý Quốc Nguyên4', '90, Quốc Lộ 22, Huyện Củ Chi, TP HCM', NULL),
('hoanglong1', 'KH0008', '25f9e794323b453885f5181f1b624d0b', '0906529851', 'Hoàng Long1', '154, Dương Văn Hạnh, Huyện Cần Giờ, TP HCM', NULL),
('hoanglong2', 'KH0009', '25f9e794323b453885f5181f1b624d0b', '0906529851', 'Hoàng Long2', '46, Nguyễn Công Trứ, Quận Bình Thạnh, TP HCM', NULL),
('hoanglong3', 'KH0010', '25f9e794323b453885f5181f1b624d0b', '0906529851', 'Hoàng Long3', '47, Đào Duy Từ, Quận Phú Nhuận, TP HCM', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madonhang`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`maloaisp`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taikhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
