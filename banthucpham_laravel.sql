-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 21, 2026 lúc 04:32 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banthucpham_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `ID_BinhLuan` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `NoiDung` varchar(100) NOT NULL,
  `ThoiGianBinhLuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`ID_BinhLuan`, `ID_ThanhVien`, `ID_SanPham`, `NoiDung`, `ThoiGianBinhLuan`) VALUES
(1, 1, 1002, 'afjhjsfksdfl;sdf', '2026-04-06 07:56:56'),
(13, 1, 2003, 'asdasdasdasdasd', '2026-04-06 07:56:56'),
(14, 1, 2003, '123', '2026-04-06 06:39:11'),
(15, 1, 2003, '123', '2026-04-06 06:39:55'),
(16, 1, 2003, '123', '2026-04-06 06:40:21'),
(17, 2, 1003, 'Ngon quá ta', '2026-04-06 07:10:22'),
(33, 13, 1001, 'ngon ddaasy', '2026-04-10 10:24:19'),
(34, 13, 1002, 'ra', '2026-04-13 09:30:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `ID_HoaDon` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `TenSanPham` varchar(30) NOT NULL,
  `GiaBan` double(8,2) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`ID_HoaDon`, `ID_ThanhVien`, `ID_SanPham`, `TenSanPham`, `GiaBan`, `SoLuong`) VALUES
(83, 2, 1001, 'Sú Tím Đà Lạt', 50000.00, 2),
(84, 2, 1001, 'Sú Tím Đà Lạt', 50000.00, 1),
(85, 2, 1001, 'Sú Tím Đà Lạt', 50000.00, 1),
(86, 2, 1001, 'Sú Tím Đà Lạt', 50000.00, 1),
(87, 2, 1001, 'Sú Tím Đà Lạt', 50000.00, 1),
(88, 2, 1001, 'Sú Tím Đà Lạt', 50000.00, 2),
(89, 2, 1001, 'Sú Tím Đà Lạt', 50000.00, 2),
(90, 2, 1001, 'Sú Tím Đà Lạt', 50000.00, 2),
(91, 2, 1001, 'Sú Tím Đà Lạt', 50000.00, 1),
(92, 2, 1001, 'Sú Tím Đà Lạt', 50000.00, 1),
(93, 11, 1002, 'Đậu Leo Đà Lạt', 35000.00, 1),
(94, 11, 2003, 'Bầu Phước An', 20000.00, 1),
(95, 12, 1002, 'Đậu Leo Đà Lạt', 35000.00, 1),
(96, 13, 1001, 'Sú Tím Đà Lạt', 50000.00, 2),
(97, 13, 1002, 'Đậu Leo Đà Lạt', 35000.00, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID_DanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(20) NOT NULL,
  `Mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ID_DanhMuc`, `TenDanhMuc`, `Mota`) VALUES
(1, 'Rau Sạch', 'Tăng cường thị lực.\nĐiều hòa huyết áp.\nTốt cho hệ tiêu hóa và đường ruột.\nNgăn ngừa bệnh tim mạch'),
(2, 'Củ, Quả', 'Chúng là nguồn cung cấp chất xơ tuyệt vời, có thể giúp duy trì đường ruột khỏe mạnh và ngăn ngừa táo'),
(3, 'Thịt tươi', '- Sự đa dạng về chủng loại thực phẩm. Những người ăn thịt có một loạt lựa chọn về thực phẩm. ...\r\n- Dễ dàng thích ứng với thực phẩm. ...\r\n- Đáp ứng đầy đủ nhu cầu protein. ...');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID_HoaDon` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ThoiGianLap` datetime NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `GhiChu` varchar(30) NOT NULL DEFAULT '',
  `GiaTien` double(8,2) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `XuLy` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ID_HoaDon`, `ID_ThanhVien`, `ThoiGianLap`, `DiaChi`, `GhiChu`, `GiaTien`, `SoDienThoai`, `XuLy`) VALUES
(83, 2, '2026-04-08 17:13:00', '49 Lâm Đồng', '', 100000.00, '0123421214', 0),
(84, 2, '2026-04-08 17:24:59', '49 Lâm Đồng', '', 50000.00, '0123421214', 0),
(85, 2, '2026-04-08 17:25:43', '49 Lâm Đồng', '', 50000.00, '0123421214', 1),
(86, 2, '2026-04-08 17:26:35', 'abc', 'ghi chu', 50000.00, '0123456789', 1),
(87, 2, '2026-04-08 17:43:21', '49 Lâm Đồng', '', 50000.00, '0123421214', 1),
(88, 2, '2026-04-09 06:34:59', '49 Lâm Đồng', '', 100000.00, '0123421214', 0),
(89, 2, '2026-04-09 06:35:19', '49 Lâm Đồng', '', 100000.00, '0123421214', 0),
(90, 2, '2026-04-09 06:36:07', '49 Lâm Đồng', '', 100000.00, '0123421214', 0),
(91, 2, '2026-04-09 06:49:21', '49 Lâm Đồng', '', 50000.00, '0123421214', 1),
(92, 2, '2026-04-09 06:51:57', '49 Lâm Đồng', '', 50000.00, '0123421214', 1),
(93, 11, '2026-04-09 20:33:16', '123 Hà Nội', '', 35000.00, '0987654323', 1),
(94, 11, '2026-04-09 21:37:29', '123 Hà Nội', '', 20000.00, '0987654323', 1),
(95, 12, '2026-04-09 22:13:03', '33 Hà Nội', '', 35000.00, '0914686524', 1),
(96, 13, '2026-04-10 10:23:24', '33 Hà Nội', '', 100000.00, '0273276821', 0),
(97, 13, '2026-04-13 09:30:42', '33 Hà Nội', '', 35000.00, '0273276821', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `ID_LienHe` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `TenThanhVien` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NoiDung` text NOT NULL,
  `ThoiGianLienHe` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`ID_LienHe`, `ID_ThanhVien`, `TenThanhVien`, `Email`, `NoiDung`, `ThoiGianLienHe`) VALUES
(1, 2, 'Mai Văn Nguyễn', 'quocbao2116@gmail.com', 'Test lien he tu Laravel', '2026-04-08 17:03:08'),
(2, 2, 'Mai Văn Nguyễn', 'quocbao2116@gmail.com', 'test contact', '2026-04-08 17:41:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_4_2_000000_create_users_table', 1),
(2, '2026_4_2_100000_create_password_resets_table', 1),
(3, '2026_4_2_000000_create_failed_jobs_table', 1),
(4, '2026_4_2_000001_create_personal_access_tokens_table', 1),
(5, '2026_04_08_155735_create_categories_table', 1),
(6, '2026_04_08_155743_create_suppliers_table', 1),
(7, '2026_04_08_155751_create_members_table', 1),
(8, '2026_04_08_155758_create_admins_table', 1),
(9, '2026_04_08_155807_create_products_table', 1),
(10, '2026_04_08_155814_create_invoices_table', 1),
(11, '2026_04_08_155822_create_invoice_items_table', 1),
(12, '2026_04_08_155830_create_comments_table', 1),
(13, '2026_04_08_160005_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `ID_NCC` int(11) NOT NULL,
  `TenNCC` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `Img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`ID_NCC`, `TenNCC`, `Email`, `SoDienThoai`, `DiaChi`, `Img`) VALUES
(1, 'Chi Nhánh Lâm Đồng', 'lamdong49@gmail.com', '0321221221', 'Lâm Đồng', 'chinhanhlamdong.png'),
(2, 'Chi Nhánh Đắk Lắk', 'daklak47@gmail.com', '0382213321', 'Đắk Lắk', 'chinhanhdaklak.png'),
(3, 'Chi nhánh ĐakNong', 'dakongprovip123@gmai', '0123123112', 'DakNong', 'nhacungcapdaknong.pn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanly`
--

CREATE TABLE `quanly` (
  `ID_QuanLy` int(11) NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `HoVaTen` varchar(30) NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `NgayDiLam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quanly`
--

INSERT INTO `quanly` (`ID_QuanLy`, `TenDangNhap`, `MatKhau`, `Email`, `HoVaTen`, `DiaChi`, `SoDienThoai`, `NgayDiLam`) VALUES
(1, 'admin', '123', 'lamdong49@gmail.com', 'admin sieu cap provip', 'Lâm Đồng', '0987776123', '2021-12-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID_SanPham` int(11) NOT NULL,
  `ID_DanhMuc` int(11) NOT NULL,
  `ID_NhaCungCap` int(11) NOT NULL,
  `TenSanPham` varchar(30) NOT NULL,
  `MoTa` text NOT NULL,
  `GiaBan` double(8,2) NOT NULL,
  `SoLuong` double(8,2) NOT NULL,
  `Img` varchar(20) NOT NULL,
  `BanChay` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID_SanPham`, `ID_DanhMuc`, `ID_NhaCungCap`, `TenSanPham`, `MoTa`, `GiaBan`, `SoLuong`, `Img`, `BanChay`) VALUES
(1001, 1, 1, 'Sú Tím Đà Lạt', '- Thực phẩm tốt cho sức khỏe</br>- Có thể chế biến thành nhiều món ăn</br>- Hương vị thơm ngon, kích thích vị giác', 50000.00, 10.00, 'bapcaitim.png', 'co'),
(1002, 1, 1, 'Đậu Leo Đà Lạt', '- Dùng chế biến món ăn- Chứa nhiều chất dinh dưỡng cần thiết- An toàn chất lượng', 35000.00, 10.00, 'daudua.png', 'co'),
(1003, 1, 2, 'Cải Bẹ Đà Lạt', '- Được trồng trong môi trường sạch an toàn với người tiêu dùng- Dùng để nấu canh, xào hoặc có thể dùng ăn với lẩu- Bổ sung nhiều chất dinh dưỡng cần thiết cho cơ thể', 35500.00, 10.00, 'caibe.png', 'co'),
(2001, 1, 1, 'Khổ qua Đà Lạt', '- Thực phẩm tốt cho sức khỏe\r\n- Có thể chế biến được thành nhiều món ăn\r\n- Sản phẩm được người tiêu dùng ưa chuộng\r\n \r\n\r\n', 18000.00, 10.00, 'khoqua.png', 'co'),
(2002, 2, 2, 'Cà chua Đà Lạt', '- Cung cấp đầy đủ vitamin và dưỡng chất cho cơ thể\r\n- Đạt tiêu chuẩn Vietgap\r\n- Liên hệ trực tiếp để được giá sỉ tốt nhất', 18000.00, 10.00, 'cachua.png', 'co'),
(2003, 2, 1, 'Bầu Phước An', '- Món ăn lý tưởng dành cho người muốn giảm cân- Chế biến được nhiều món ăn ngon miệng- Sản phẩm không sử dụng thuốc trừ sâu, an toàn cho sức khỏe', 20000.00, 10.00, 'bauphuocan.png', 'ko'),
(3001, 3, 1, 'Thịt đùi heo', '- Nguyên liệu tươi ngon, hợp vệ sinh\r\n- Cung cấp nhiều dinh dưỡng cho cơ thể\r\n- Chế biến được nhiều món ăn ngon', 180000.00, 10.00, 'Thitduiheo.png', 'co'),
(3002, 3, 1, 'Thịt heo say', '-Nguyên liệu tươi ngon, hợp vệ sinh</br>Cung cấp nhiều dinh dưỡng cho cơ thể</br>Chế biến được nhiều món ăn ngon', 150000.00, 10.00, 'thitheosay.png', 'co'),
(3013, 3, 1, 'Thịt Bò', 'ngon', 450000.00, 10.00, 'thitbo.png', 'ko'),
(3014, 3, 1, 'Thịt Bò', 'Thịt Bò tươi ngon', 400000.00, 10.00, 'thitbo.png', 'ko');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `ID_ThanhVien` int(11) NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `HoVaTen` varchar(30) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `NgayDangKi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`ID_ThanhVien`, `TenDangNhap`, `MatKhau`, `Email`, `HoVaTen`, `DiaChi`, `SoDienThoai`, `NgayDangKi`) VALUES
(1, 'b1231121', 'asdasd', 'proaass2@gmail.com', 'Tao là giang hồ', 'hai phong', '0375522116', '2026-04-01'),
(2, 'proaass2', '1231121', 'quocbao2116@gmail.com', 'Mai Văn Nguyễn', '49 Lâm Đồng', '0123421214', '2026-04-01'),
(4, 'bibaoprovip', '1231121', 'huyae01833@gmail.com', 'Nguyễn Hà Quốc Bảo', 'Quan 10', '0767772112', '2026-04-01'),
(5, 'buonviem113', '1231121', 'quocbao2116@gmail.com', 'Nguyễn Hà Quốc Bảo', 'hai phong123', '0375522116', '2026-04-01'),
(7, 'user1', '1231121', 'quocbao2116@gmail.com', 'Nguyễn Hà Quốc Bảo', 'Quan 10', '0767772112', '2026-04-01'),
(8, 'user2', 'asd', 'quocbao2116@gmail.com', 'Nguyễn Hà Quốc Bảo 1', 'Quan 10', '0767772112', '2026-04-01'),
(9, 'user3', '1231121', 'quocbao2116@gmail.com', 'n', 'Quan 10', '0767772112', '2026-04-01'),
(10, 'cac123', '1231121', 'huyae01833@gmail.com', 'Nguyễn Hà Quốc Bảo', 'Quan 10', '0767772112', '2026-04-01'),
(11, 'ngoc', '123456', 'ngoc@gmail.com', 'ngoc', '123 Hà Nội', '0987654323', '2026-04-09'),
(12, 'quan', '123456', 'quanvu@gmail.com', 'Quân', '33 Hà Nội', '0914686524', '2026-04-09'),
(13, 'A1', '123', 'nhomkinhlonghuong@gmail.com', 'Vũ Quân', '33 Hà Nội', '0273276821', '2026-04-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ID_BinhLuan`),
  ADD KEY `binhluan_id_thanhvien_index` (`ID_ThanhVien`),
  ADD KEY `binhluan_id_sanpham_index` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`ID_HoaDon`,`ID_ThanhVien`,`ID_SanPham`),
  ADD KEY `chitiethoadon_id_hoadon_index` (`ID_HoaDon`),
  ADD KEY `chitiethoadon_id_thanhvien_index` (`ID_ThanhVien`),
  ADD KEY `chitiethoadon_id_sanpham_index` (`ID_SanPham`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID_DanhMuc`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID_HoaDon`),
  ADD KEY `hoadon_id_thanhvien_index` (`ID_ThanhVien`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`ID_LienHe`),
  ADD KEY `lienhe_id_thanhvien_index` (`ID_ThanhVien`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`ID_NCC`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`ID_QuanLy`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID_SanPham`),
  ADD KEY `sanpham_id_nhacungcap_index` (`ID_NhaCungCap`),
  ADD KEY `sanpham_id_danhmuc_index` (`ID_DanhMuc`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`ID_ThanhVien`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ID_BinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ID_DanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID_HoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `ID_LienHe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `ID_NCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quanly`
--
ALTER TABLE `quanly`
  MODIFY `ID_QuanLy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID_SanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3015;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `ID_ThanhVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_id_sanpham_foreign` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`),
  ADD CONSTRAINT `binhluan_id_thanhvien_foreign` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_id_hoadon_foreign` FOREIGN KEY (`ID_HoaDon`) REFERENCES `hoadon` (`ID_HoaDon`),
  ADD CONSTRAINT `chitiethoadon_id_sanpham_foreign` FOREIGN KEY (`ID_SanPham`) REFERENCES `sanpham` (`ID_SanPham`),
  ADD CONSTRAINT `chitiethoadon_id_thanhvien_foreign` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_id_thanhvien_foreign` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`);

--
-- Các ràng buộc cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD CONSTRAINT `lienhe_id_thanhvien_foreign` FOREIGN KEY (`ID_ThanhVien`) REFERENCES `thanhvien` (`ID_ThanhVien`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_id_danhmuc_foreign` FOREIGN KEY (`ID_DanhMuc`) REFERENCES `danhmuc` (`ID_DanhMuc`),
  ADD CONSTRAINT `sanpham_id_nhacungcap_foreign` FOREIGN KEY (`ID_NhaCungCap`) REFERENCES `nhacungcap` (`ID_NCC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
