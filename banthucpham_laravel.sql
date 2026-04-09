-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 09, 2026 lúc 04:48 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

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
  `NoiDung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ThoiGianBinhLuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`ID_BinhLuan`, `ID_ThanhVien`, `ID_SanPham`, `NoiDung`, `ThoiGianBinhLuan`) VALUES
(1, 1, 1002, 'afjhjsfksdfl;sdf', '2021-12-06 07:56:56'),
(13, 1, 2003, 'asdasdasdasdasd', '2021-12-08 06:38:42'),
(14, 1, 2003, '123', '2021-12-08 06:39:11'),
(15, 1, 2003, '123', '2021-12-08 06:39:55'),
(16, 1, 2003, '123', '2021-12-08 06:40:21'),
(17, 2, 1003, 'Ngon quá ta', '2021-12-08 07:10:22'),
(18, 1, 1001, 'Ngon zữ', '2021-12-08 07:10:52'),
(19, 2, 2002, 'Quá đã ', '2021-12-08 07:11:04'),
(20, 1, 2001, 'waooooo', '2021-12-08 07:11:13'),
(21, 2, 3002, 'chất lượng', '2021-12-08 07:11:25'),
(22, 1, 3001, 'abc bê quá đê', '2021-12-08 07:11:39'),
(23, 1, 1001, '123', '2021-12-08 07:12:15'),
(24, 4, 1002, '123', '2021-12-08 07:13:18'),
(25, 4, 1002, '123112312312', '2021-12-12 08:35:05'),
(26, 4, 2002, 'asd', '2021-12-21 18:48:38'),
(27, 4, 1001, 'cái này pro vip quá', '2021-12-24 08:20:17'),
(28, 8, 1002, 'ngon quá', '2021-12-25 08:27:39'),
(29, 8, 1002, 'ngonnnnnnnnnnnnnn\r\n', '2021-12-27 13:43:57'),
(30, 8, 1002, 'sản phẩm này tuyệt vời', '2021-12-28 03:23:13'),
(31, 10, 1002, 'ngon vai lozzz nha\r\n', '2022-04-01 16:16:54'),
(32, 2, 1001, 'Binh luan test tu Laravel', '2026-04-08 17:03:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `ID_HoaDon` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL,
  `TenSanPham` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(94, 11, 2003, 'Bầu Phước An', 20000.00, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID_DanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mota` text COLLATE utf8mb4_unicode_ci NOT NULL
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
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `DiaChi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GhiChu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `GiaTien` double(8,2) NOT NULL,
  `SoDienThoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `XuLy` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ID_HoaDon`, `ID_ThanhVien`, `ThoiGianLap`, `DiaChi`, `GhiChu`, `GiaTien`, `SoDienThoai`, `XuLy`) VALUES
(1, 1, '2021-12-06 12:55:18', 'hai phong', 'asdasdasd123', 0.00, '0382460421', 1),
(2, 1, '2021-12-06 12:56:40', 'hai phong', 'asdasdasd123', 0.00, '0382460421', 1),
(5, 1, '2021-12-06 15:52:03', 'hai phong', 'asdasdasd123', 0.00, '0382460421', 1),
(6, 1, '2021-12-06 15:56:12', 'hai phong', 'asdasdasd123', 96000.00, '0382460421', 1),
(7, 1, '2021-12-06 15:58:38', 'hai phong', 'asdasdasd123', 96000.00, '0382460421', 1),
(8, 1, '2021-12-06 16:29:49', 'hai phong', 'asdasdasd123', 96000.00, '0382460421', 1),
(9, 1, '2021-12-06 16:49:09', 'hai phong', 'asdasdasd123', 238000.00, '0382460421', 1),
(10, 1, '2021-12-06 17:24:16', 'hai phong', 'asdasdasd123', 238000.00, '0382460421', 1),
(11, 1, '2021-12-06 17:28:58', 'hai phong', 'asdasdasd123', 128000.00, '0382460421', 1),
(12, 1, '2021-12-06 17:29:42', 'hai phong', 'asdasdasd123', 128000.00, '0382460421', 1),
(13, 1, '2021-12-06 17:33:29', 'hai phong', 'asdasdasd123', 128000.00, '0382460421', 1),
(14, 1, '2021-12-06 17:34:49', 'hai phong', 'asdasdasd123', 42000.00, '0382460421', 1),
(15, 1, '2021-12-06 17:37:32', 'hai phong', 'asdasdasd123', 32000.00, '0382460421', 1),
(16, 1, '2021-12-06 17:40:15', 'hai phong', 'asdasdasd123', 32000.00, '0382460421', 1),
(17, 1, '2021-12-06 17:41:18', 'hai phong', 'asdasdasd123', 32000.00, '0382460421', 1),
(18, 1, '2021-12-06 17:47:26', 'hai phong', 'asdasdasd123', 290000.00, '0382460421', 1),
(29, 1, '2021-12-08 04:02:57', 'hai phong', 'asdasdasd123', 540000.00, '0382460421', 1),
(30, 1, '2021-12-08 04:03:04', 'hai phong', 'asdasdasd123', 540000.00, '0382460421', 1),
(31, 1, '2021-12-08 04:45:04', 'hai phong', 'asdasdasd123', 64000.00, '0382460421', 1),
(32, 1, '2021-12-08 04:45:08', 'hai phong', 'asdasdasd123', 64000.00, '0382460421', 1),
(33, 1, '2021-12-08 05:09:47', 'hai phong', 'asdasdasd123123', 32000.00, '0382460421', 1),
(34, 1, '2021-12-08 05:45:04', 'hai phong', '123123', 64000.00, '0382460421', 1),
(35, 4, '2021-12-08 08:20:30', 'Quan 10', '', 35500.00, '0767772112', 1),
(36, 1, '2021-12-08 08:31:03', 'hai phong', '', 10500.00, '0382460421', 1),
(37, 4, '2021-12-08 08:36:57', 'Quan 10', '', 10500.00, '0767772112', 1),
(38, 4, '2021-12-12 08:35:34', 'Quan 10', '', 90000.00, '0767772112', 1),
(39, 4, '2021-12-21 18:52:37', 'Quan 10', '', 184875.00, '0767772112', 1),
(40, 4, '2021-12-21 18:57:16', 'Quan 10', '', 111250.00, '0767772112', 1),
(41, 4, '2021-12-21 18:57:23', 'Quan 10', '', 111250.00, '0767772112', 1),
(42, 4, '2021-12-21 18:57:29', 'Quan 10', '123', 111250.00, '0767772112', 1),
(43, 4, '2021-12-21 18:58:49', 'Quan 10', '', 111250.00, '0767772112', 1),
(44, 4, '2021-12-21 19:17:25', 'Quan 10', '', 111250.00, '0767772112', 1),
(45, 4, '2021-12-21 19:17:52', 'Quan 10', '', 111250.00, '0767772112', 1),
(46, 4, '2021-12-21 19:19:51', 'Quan 10', '', 111250.00, '0767772112', 1),
(47, 4, '2021-12-21 19:22:01', 'Quan 10', '', 64000.00, '0767772112', 1),
(48, 5, '2021-12-21 19:49:58', 'Quan 10', '', 118000.00, '0767772112', 1),
(49, 5, '2021-12-21 19:56:14', 'Quan 10', '', 32000.00, '0767772112', 1),
(50, 5, '2021-12-21 20:08:31', 'Quan 10', '', 87625.00, '0767772112', 1),
(51, 5, '2021-12-21 20:17:32', 'Quan 10', '', 143250.00, '0767772112', 1),
(52, 5, '2021-12-21 20:23:35', 'Quan 10', '', 32000.00, '0767772112', 1),
(53, 4, '2021-12-21 20:29:19', 'Quan 10', '', 64000.00, '0767772112', 1),
(54, 4, '2021-12-24 04:16:03', 'Quan 10', '', 180500.00, '0767772112', 1),
(55, 4, '2021-12-24 04:16:43', 'Quan 10', '', 192000.00, '0767772112', 1),
(57, 4, '2021-12-24 05:23:23', 'Quan 10', '', 35500.00, '0767772112', 2),
(59, 4, '2021-12-24 08:15:04', 'Quan 10', '', 71000.00, '0767772112', 1),
(60, 4, '2021-12-24 08:18:33', 'Quan 10', '', 35000.00, '0767772112', 1),
(61, 4, '2021-12-24 08:19:26', 'Quan 10', '', 70000.00, '0767772112', 1),
(62, 4, '2021-12-24 08:23:43', 'Quan 10', '', 120000.00, '0767772112', 1),
(63, 1, '2021-12-24 14:01:35', 'hai phong', '', 35500.00, '0375522116', 1),
(64, 1, '2021-12-24 14:15:14', 'hai phong', '', 70500.00, '0375522116', 1),
(65, 1, '2021-12-24 14:15:56', 'hai phong', '', 120500.00, '0375522116', 1),
(66, 1, '2021-12-24 14:17:46', 'hai phong', '', 35000.00, '0375522116', 1),
(67, 1, '2021-12-24 14:20:42', 'hai phong', '', 35000.00, '0375522116', 1),
(68, 1, '2021-12-24 14:23:42', 'hai phong', '', 70000.00, '0375522116', 2),
(69, 4, '2021-12-24 14:38:07', 'Quan 10', '', 35000.00, '0767772112', 1),
(70, 4, '2021-12-24 14:43:11', 'Quan 10', '', 400000.00, '0767772112', 1),
(71, 4, '2021-12-24 14:49:13', 'Quan 10', '', 105000.00, '0767772112', 1),
(72, 7, '2021-12-25 08:08:20', 'Quan 10', '', 430000.00, '0767772112', 1),
(73, 7, '2021-12-25 08:09:37', 'Quan 10', '', 440500.00, '0767772112', 1),
(74, 8, '2021-12-25 08:10:17', 'Quan 10', '', 105000.00, '0767772112', 2),
(75, 8, '2021-12-25 08:11:12', 'Quan 10', '', 21000.00, '0767772112', 1),
(76, 8, '2021-12-25 08:28:30', 'Quan 10', 'ádasd', 370000.00, '0767772112', 1),
(77, 8, '2021-12-25 08:30:18', 'Quan 10', '', 70000.00, '0767772112', 2),
(78, 8, '2021-12-27 13:44:08', 'Quan 10', '', 140000.00, '0767772112', 2),
(79, 8, '2021-12-27 13:49:35', 'Quan 10', '', 10500.00, '0767772112', 1),
(80, 8, '2021-12-28 03:23:27', 'Quan 10', '', 105000.00, '0767772112', 1),
(81, 8, '2021-12-28 03:24:33', 'Quan 10', '', 106500.00, '0767772112', 2),
(82, 10, '2022-04-01 16:19:19', 'Quan 10', '', 175000.00, '0767772112', 0),
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
(94, 11, '2026-04-09 21:37:29', '123 Hà Nội', '', 20000.00, '0987654323', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `ID_LienHe` int(11) NOT NULL,
  `ID_ThanhVien` int(11) NOT NULL,
  `TenThanhVien` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
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
  `TenNCC` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Img` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `TenDangNhap` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoVaTen` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `TenSanPham` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiaBan` double(8,2) NOT NULL,
  `SoLuong` double(8,2) NOT NULL,
  `Img` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BanChay` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
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
(3014, 3, 1, 'Thịt Bò', 'ád', 400000.00, 10.00, 'thitbo.png', 'ko');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `ID_ThanhVien` int(11) NOT NULL,
  `TenDangNhap` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoVaTen` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayDangKi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`ID_ThanhVien`, `TenDangNhap`, `MatKhau`, `Email`, `HoVaTen`, `DiaChi`, `SoDienThoai`, `NgayDangKi`) VALUES
(1, 'b1231121', 'asdasd', 'proaass2@gmail.com', 'Tao là giang hồ', 'hai phong', '0375522116', '2021-12-05'),
(2, 'proaass2', '1231121', 'quocbao2116@gmail.com', 'Mai Văn Nguyễn', '49 Lâm Đồng', '0123421214', '2021-12-05'),
(4, 'bibaoprovip', '1231121', 'huyae01833@gmail.com', 'Nguyễn Hà Quốc Bảo', 'Quan 10', '0767772112', '2021-12-08'),
(5, 'buonviem113', '1231121', 'quocbao2116@gmail.com', 'Nguyễn Hà Quốc Bảo', 'hai phong123', '0375522116', '2021-12-21'),
(7, 'user1', '1231121', 'quocbao2116@gmail.com', 'Nguyễn Hà Quốc Bảo', 'Quan 10', '0767772112', '2021-12-25'),
(8, 'user2', 'asd', 'quocbao2116@gmail.com', 'Nguyễn Hà Quốc Bảo 1', 'Quan 10', '0767772112', '2021-12-25'),
(9, 'user3', '1231121', 'quocbao2116@gmail.com', 'n', 'Quan 10', '0767772112', '2021-12-25'),
(10, 'cac123', '1231121', 'huyae01833@gmail.com', 'Nguyễn Hà Quốc Bảo', 'Quan 10', '0767772112', '2022-04-01'),
(11, 'ngoc', '123456', 'ngoc@gmail.com', 'ngoc', '123 Hà Nội', '0987654323', '2026-04-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  MODIFY `ID_BinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `ID_HoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

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
  MODIFY `ID_ThanhVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
