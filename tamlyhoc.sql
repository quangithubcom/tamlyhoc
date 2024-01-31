-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 30, 2024 lúc 10:37 AM
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
-- Cơ sở dữ liệu: `tamlyhoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_menu_backend`
--

CREATE TABLE `tb_menu_backend` (
  `id` int(11) NOT NULL COMMENT 'Mã định danh',
  `icon_font` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Icon Font Asomeware Hiển thị Menu',
  `name_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên Menu',
  `link_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Link hiển thị Menu',
  `father` int(4) NOT NULL COMMENT 'Xác định danh mục cha cho các danh mục',
  `status` int(1) NOT NULL COMMENT '0 là không hiển thị 1 là cho phép hiển thị',
  `menu_admin` int(1) NOT NULL DEFAULT 1 COMMENT '0 Hiển thị cho admin 1 hiển thị cho người dùng	',
  `arrange` int(3) NOT NULL COMMENT 'Sắp xếp thứ tự hiển thị',
  `menu_function` int(1) NOT NULL COMMENT '1 Menu chức năng 0 Menu Hiển Thị'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_menu_backend`
--

INSERT INTO `tb_menu_backend` (`id`, `icon_font`, `name_menu`, `link_menu`, `father`, `status`, `menu_admin`, `arrange`, `menu_function`) VALUES
(18, 'fa-solid fa-gauge', 'Thống kê', 'dashboard', 0, 1, 1, 1, 0),
(26, 'fa-solid fa-list', 'Cài đặt', 'javascript: void(0);', 0, 1, 1, 6, 0),
(33, '', 'Cài đặt thành viên', 'user', 26, 1, 1, 2, 0),
(34, '', 'Menu Backend', 'menu-backend', 26, 1, 1, 3, 0),
(42, '', 'Thêm thành viên', '', 33, 1, 1, 1, 1),
(43, '', 'Sửa thành viên', '', 33, 1, 1, 2, 1),
(44, '', 'Xóa thành viên', '', 33, 1, 1, 3, 1),
(45, '', 'Phân quyền', '', 33, 1, 1, 4, 1),
(140, 'fa-regular fa-file-lines', 'Danh sách gửi bài', 'posting-list', 0, 1, 1, 3, 0),
(141, 'fa-solid fa-quote-left', 'Danh sách tổng', 'all-post', 0, 1, 1, 4, 0),
(142, 'fa-solid fa-user-check', 'Danh sách phản biện', 'user-counter', 0, 1, 1, 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `decentralization` text COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `username`, `password`, `status`, `name`, `decentralization`, `admin`) VALUES
(1, 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', 1, 'Lưu Ngọc Quang', '[\"18\",\"19\",\"41\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"28\",\"29\",\"30\",\"38\",\"39\",\"40\",\"31\",\"32\",\"33\",\"42\",\"43\",\"44\",\"45\",\"34\",\"35\",\"36\",\"37\",\"46\",\"47\",\"49\",\"48\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"63\",\"64\",\"65\",\"72\",\"61\",\"66\",\"67\",\"68\",\"62\",\"69\",\"70\",\"71\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\",\"83\",\"84\",\"85\",\"86\",\"135\",\"136\",\"137\",\"138\",\"96\",\"97\",\"99\",\"100\",\"101\",\"98\",\"102\",\"103\",\"104\",\"105\",\"110\",\"111\",\"112\",\"113\",\"114\",\"115\",\"116\",\"106\",\"107\",\"108\",\"109\",\"117\",\"118\",\"123\",\"124\",\"125\",\"119\",\"120\",\"121\",\"122\",\"126\",\"127\",\"132\",\"133\",\"134\",\"128\",\"129\",\"130\",\"131\",\"139\"]', 0),
(8, 'luuquang2626@gmail.com', '', '202cb962ac59075b964b07152d234b70', 1, 'Lưu Ngọc Quang', '[\"18\",\"140\",\"141\",\"142\",\"26\",\"33\",\"42\",\"43\",\"44\",\"45\",\"34\"]', 1),
(10, 'ntml@gmail.com', 'ntml@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'Gs. Nguyễn Thị Mai Lan', '[\"18\",\"140\",\"141\",\"142\",\"26\",\"33\",\"42\",\"43\",\"44\",\"45\",\"34\"]', 7),
(11, 'vd@gmail.com', 'vd@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'Gs. Vũ Dũng', '[\"18\",\"140\",\"141\",\"142\",\"26\",\"33\",\"42\",\"43\",\"44\",\"45\",\"34\"]', 7),
(12, 'vtt@gmail.com', 'vtt@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'Vũ Thu Trang', '[\"18\",\"140\",\"141\",\"142\",\"26\",\"33\",\"42\",\"43\",\"44\",\"45\",\"34\"]', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_user_decentralization`
--

CREATE TABLE `tb_user_decentralization` (
  `id` int(11) NOT NULL,
  `name_decentralization` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `decentralization` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_user_decentralization`
--

INSERT INTO `tb_user_decentralization` (`id`, `name_decentralization`, `decentralization`) VALUES
(6, 'Người gửi', '[]'),
(7, 'Phản biện', '[]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tlh_postinglist`
--

CREATE TABLE `tlh_postinglist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `fileposst` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `counter` text COLLATE utf8_unicode_ci NOT NULL,
  `id_counter` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `date_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tlh_postinglist`
--

INSERT INTO `tlh_postinglist` (`id`, `name`, `description`, `fileposst`, `id_user`, `counter`, `id_counter`, `status`, `date_creat`) VALUES
(3, 'Kỹ năng thăm khám lâm sàng trong thực hành lâm sàng của sinh viên y khoa khu vực Đồng bằng sông Cửu Long', 'Kỹ năng thăm khám lâm sàng trong thực hành lâm sàng của sinh viên đại học ngành y khoa từ lâu luôn được xem là một trong những yếu tố quan trọng trong sự thành công của quá trình học tập của sinh viên y khoa. Từ nghiên cứu mô tả cắt ngang 606 sinh viên y khoa hệ chính quy   từ năm thứ 4 đến năm thứ 6 tại trường Đại học Y Dược Cần Thơ và Trường đại học Trà Vinh đánh giá thực trạng kỹ năng thăm khám trong thực hành lâm sàng của sinh viên y khoa. Kết quả sinh viên tự đánh giá mình có khả năng thực hiện được kỹ năng độc lập theo quy trình thực hiện kỹ năng của các kỹ năng thăm khám lâm sàng và sinh viên y khoa năm trên thành thạo hơn so với sinh viên y khoa năm dưới ở tất cả các kỹ năng thành phần trong kỹ năng thăm khám lâm sàng', 'tlh-3.docx', 8, '', 10, 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tlh_postinglist_histoty`
--

CREATE TABLE `tlh_postinglist_histoty` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_counter` int(11) NOT NULL,
  `counter` text COLLATE utf8_unicode_ci NOT NULL,
  `num` int(1) NOT NULL,
  `date_creat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tlh_postinglist_histoty`
--

INSERT INTO `tlh_postinglist_histoty` (`id`, `id_post`, `id_counter`, `counter`, `num`, `date_creat`) VALUES
(3, 3, 10, '<p>Nghi&ecirc;n cứu cắt ngang với kh&aacute;ch thể khảo s&aacute;t bao gồm 358 học sinh lớp 10, 11 tại Trường THPT Nguyễn Đ&igrave;nh Chiểu, Phường Ph&uacute; T&acirc;n, TP. Bến Tre, v&agrave; Trường THPT Lạc Long Qu&acirc;n, Mỹ Thạnh An,TP. Bến Tre, tỉnh Bến Tre. Kết quả nghi&ecirc;n cứu cho thấy, đa số học sinh trong mẫu nghi&ecirc;n cứu n&agrave;y đều tự b&aacute;o c&aacute;o v&agrave; khẳng định rằng internet c&oacute; vai tr&ograve; quan trọng đối với c&aacute;c em. Học sinh sử dụng internet ở mức thường xuy&ecirc;n v&agrave; rất thường xuy&ecirc;n, đa số học sinh sử dụng internet từ 3 giờ đến 4h trở l&ecirc;n với mục đ&iacute;ch sử dụng l&agrave; học tập, giao tiếp qua zalo, facebook, học tập, xem phim v&agrave; chơi game. Học sinh trong mẫu nghi&ecirc;n cứu n&agrave;y chủ yếu sử dụng internet th&ocirc;ng qua phương tiện l&agrave; điện thoại th&ocirc;ng minh. C&aacute;c em cũng đ&atilde; c&oacute; nhận thức đ&uacute;ng về ưu điểm v&agrave; hạn chế của việc sử dụng internet.</p>\r\n', 1, 1706606602);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tlh_setup`
--

CREATE TABLE `tlh_setup` (
  `id` int(11) NOT NULL,
  `namegroup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `extend` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_father` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tlh_setup`
--

INSERT INTO `tlh_setup` (`id`, `namegroup`, `extend`, `id_father`) VALUES
(1, 'Hoạt động', '', 0),
(2, '', 'Chờ kiểm duyệt', 2),
(3, '', 'Đã duyệt', 2),
(4, '', 'Đồng ý đăng', 2),
(5, '', 'Chỉnh sửa và gửi lại', 2),
(6, '', 'Từ chối nhận', 2),
(7, '', 'Chỉnh sửa lần 1', 2),
(8, '', 'Chỉnh sửa lần 2', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_menu_backend`
--
ALTER TABLE `tb_menu_backend`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_user_decentralization`
--
ALTER TABLE `tb_user_decentralization`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tlh_postinglist`
--
ALTER TABLE `tlh_postinglist`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tlh_postinglist_histoty`
--
ALTER TABLE `tlh_postinglist_histoty`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tlh_setup`
--
ALTER TABLE `tlh_setup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_menu_backend`
--
ALTER TABLE `tb_menu_backend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã định danh', AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT cho bảng `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tb_user_decentralization`
--
ALTER TABLE `tb_user_decentralization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tlh_postinglist`
--
ALTER TABLE `tlh_postinglist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tlh_postinglist_histoty`
--
ALTER TABLE `tlh_postinglist_histoty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tlh_setup`
--
ALTER TABLE `tlh_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
