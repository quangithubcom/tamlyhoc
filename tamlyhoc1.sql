-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 31, 2024 lúc 10:18 AM
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
-- Cấu trúc bảng cho bảng `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `mess_notification` text COLLATE utf8_unicode_ci NOT NULL,
  `link_check` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_post` int(11) NOT NULL,
  `status` int(3) NOT NULL,
  `date_creat` int(11) NOT NULL,
  `read_notification` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_notification`
--

INSERT INTO `tbl_notification` (`id`, `code`, `user_from`, `user_to`, `mess_notification`, `link_check`, `id_post`, `status`, `date_creat`, `read_notification`) VALUES
(7, '#TLH1251512', 8, 1, 'Lưu Ngọc Quang vừa đăng 1 bài viết \"Thực trạng sử dụng internet ở học sinh các trường trung học phổ thông thành phố Bến Tre tỉnh Bến Tre\" cần duyệt!', 'all-post-edit/18', 18, 2, 1706685707, 1),
(9, '#TLH0399118', 1, 8, 'Admin đã duyệt bài viết \"Thực trạng sử dụng internet ở học sinh các trường trung học phổ thông thành phố Bến Tre tỉnh Bến Tre\" của bạn.', 'posting-view/18', 18, 3, 1706688058, 1),
(10, '#TLH2330137', 1, 8, 'Admin đã hủy duyệt bài viết \"Thực trạng sử dụng internet ở học sinh các trường trung học phổ thông thành phố Bến Tre tỉnh Bến Tre\" của bạn.', 'posting-view/18', 18, 2, 1706688089, 1),
(11, '#TLH0822946', 1, 8, 'Admin đã duyệt bài viết \"Thực trạng sử dụng internet ở học sinh các trường trung học phổ thông thành phố Bến Tre tỉnh Bến Tre\" của bạn.', 'posting-view/18', 18, 3, 1706688098, 1),
(13, '#TLH2890278', 1, 8, 'Bài viết \"Thực trạng sử dụng internet ở học sinh các trường trung học phổ thông thành phố Bến Tre tỉnh Bến Tre\" của bạn đã được giao cho Gs. Nguyễn Thị Mai Lan phản biện.', 'posting-view/18', 18, 3, 1706688619, 1),
(14, '#TLH3547412', 1, 10, 'Bài viết \"Thực trạng sử dụng internet ở học sinh các trường trung học phổ thông thành phố Bến Tre tỉnh Bến Tre\" cần được phản biện.', 'user-counter-check/18', 18, 3, 1706688619, 1),
(15, '#TLH1939150', 1, 8, 'Bài viết \"Thực trạng sử dụng internet ở học sinh các trường trung học phổ thông thành phố Bến Tre tỉnh Bến Tre\" của bạn đã được giao cho Gs. Vũ Dũng phản biện.', 'posting-view/18', 18, 3, 1706688842, 1),
(16, '#TLH7816362', 1, 11, 'Bài viết \"Thực trạng sử dụng internet ở học sinh các trường trung học phổ thông thành phố Bến Tre tỉnh Bến Tre\" cần được phản biện.', 'user-counter-check/18', 18, 3, 1706688842, 1);

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
(1, 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', 1, 'Lưu Ngọc Quang', '[\"18\",\"140\",\"141\",\"142\",\"26\",\"33\",\"42\",\"43\",\"44\",\"45\",\"34\"]', 0),
(8, 'luuquang2626@gmail.com', '', '202cb962ac59075b964b07152d234b70', 1, 'Lưu Ngọc Quang', '[\"18\",\"140\",\"141\",\"142\",\"26\",\"33\",\"42\",\"43\",\"44\",\"45\",\"34\"]', 1),
(10, 'ntml@gmail.com', 'ntml@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'Gs. Nguyễn Thị Mai Lan', '[\"18\",\"140\",\"141\",\"142\",\"26\",\"33\",\"42\",\"43\",\"44\",\"45\",\"34\"]', 7),
(11, 'vd@gmail.com', 'vd@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'Gs. Vũ Dũng', '[\"18\",\"140\",\"141\",\"142\",\"26\",\"33\",\"42\",\"43\",\"44\",\"45\",\"34\"]', 7),
(12, 'vtt@gmail.com', 'vtt@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'Gs. Vũ Thu Trang', '[\"18\",\"140\",\"141\",\"142\",\"26\",\"33\",\"42\",\"43\",\"44\",\"45\",\"34\"]', 7);

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
  `date_creat` int(11) NOT NULL,
  `close_post` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tlh_postinglist`
--

INSERT INTO `tlh_postinglist` (`id`, `name`, `description`, `fileposst`, `id_user`, `counter`, `id_counter`, `status`, `date_creat`, `close_post`) VALUES
(3, 'Kỹ năng thăm khám lâm sàng trong thực hành lâm sàng của sinh viên y khoa khu vực Đồng bằng sông Cửu Long', 'Kỹ năng thăm khám lâm sàng trong thực hành lâm sàng của sinh viên đại học ngành y khoa từ lâu luôn được xem là một trong những yếu tố quan trọng trong sự thành công của quá trình học tập của sinh viên y khoa. Từ nghiên cứu mô tả cắt ngang 606 sinh viên y khoa hệ chính quy   từ năm thứ 4 đến năm thứ 6 tại trường Đại học Y Dược Cần Thơ và Trường đại học Trà Vinh đánh giá thực trạng kỹ năng thăm khám trong thực hành lâm sàng của sinh viên y khoa. Kết quả sinh viên tự đánh giá mình có khả năng thực hiện được kỹ năng độc lập theo quy trình thực hiện kỹ năng của các kỹ năng thăm khám lâm sàng và sinh viên y khoa năm trên thành thạo hơn so với sinh viên y khoa năm dưới ở tất cả các kỹ năng thành phần trong kỹ năng thăm khám lâm sàng', 'tlh-3.docx', 8, '', 10, 8, 1706685701, 0),
(18, 'Thực trạng sử dụng internet ở học sinh các trường trung học phổ thông thành phố Bến Tre tỉnh Bến Tre', 'Nghiên cứu cắt ngang với khách thể khảo sát bao gồm 358 học sinh lớp 10, 11 tại Trường THPT Nguyễn Đình Chiểu, Phường Phú Tân, TP. Bến Tre, và Trường THPT Lạc Long Quân, Mỹ Thạnh An,TP. Bến Tre, tỉnh Bến Tre. Kết quả nghiên cứu cho thấy, đa số học sinh trong mẫu nghiên cứu này đều tự báo cáo và khẳng định rằng internet có vai trò quan trọng đối với các em. Học sinh sử dụng internet ở mức thường xuyên và rất thường xuyên, đa số học sinh sử dụng internet từ 3 giờ đến 4h trở lên với mục đích sử dụng là học tập, giao tiếp qua zalo, facebook, học tập, xem phim và chơi game. Học sinh trong mẫu nghiên cứu này chủ yếu sử dụng internet thông qua phương tiện là điện thoại thông minh. Các em cũng đã có nhận thức đúng về ưu điểm và hạn chế của việc sử dụng internet.', 'tlh-18.docx', 8, '', 11, 3, 1706685706, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tlh_postinglist_histoty`
--

CREATE TABLE `tlh_postinglist_histoty` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `id_post` int(11) NOT NULL COMMENT 'Mã số bài viết',
  `id_user` int(11) NOT NULL COMMENT 'Người gửi lại bài viết',
  `id_counter` int(11) NOT NULL COMMENT 'Người phản biện',
  `counter` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nội dung phản biện',
  `linkfile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_father_counter` int(11) NOT NULL COMMENT 'Mã phản diện lại cho các lần phản biện',
  `num` int(1) NOT NULL COMMENT 'Số thứ tự phản biện',
  `date_creat` int(11) NOT NULL COMMENT 'Ngày phản biện'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tlh_postinglist_histoty`
--

INSERT INTO `tlh_postinglist_histoty` (`id`, `name`, `description`, `id_post`, `id_user`, `id_counter`, `counter`, `linkfile`, `id_father_counter`, `num`, `date_creat`) VALUES
(3, '', '', 3, 0, 10, '<p>Nghi&ecirc;n cứu cắt ngang với kh&aacute;ch thể khảo s&aacute;t bao gồm 358 học sinh lớp 10, 11 tại Trường THPT Nguyễn Đ&igrave;nh Chiểu, Phường Ph&uacute; T&acirc;n, TP. Bến Tre, v&agrave; Trường THPT Lạc Long Qu&acirc;n, Mỹ Thạnh An,TP. Bến Tre, tỉnh Bến Tre. Kết quả nghi&ecirc;n cứu cho thấy, đa số học sinh trong mẫu nghi&ecirc;n cứu n&agrave;y đều tự b&aacute;o c&aacute;o v&agrave; khẳng định rằng internet c&oacute; vai tr&ograve; quan trọng đối với c&aacute;c em. Học sinh sử dụng internet ở mức thường xuy&ecirc;n v&agrave; rất thường xuy&ecirc;n, đa số học sinh sử dụng internet từ 3 giờ đến 4h trở l&ecirc;n với mục đ&iacute;ch sử dụng l&agrave; học tập, giao tiếp qua zalo, facebook, học tập, xem phim v&agrave; chơi game. Học sinh trong mẫu nghi&ecirc;n cứu n&agrave;y chủ yếu sử dụng internet th&ocirc;ng qua phương tiện l&agrave; điện thoại th&ocirc;ng minh. C&aacute;c em cũng đ&atilde; c&oacute; nhận thức đ&uacute;ng về ưu điểm v&agrave; hạn chế của việc sử dụng internet.</p>\r\n', '', 0, 1, 1706606602),
(9, 'Kỹ năng thăm khám lâm sàng trong thực hành lâm sàng của sinh viên y khoa khu vực Đồng bằng sông Cửu Long', 'Kỹ năng thăm khám lâm sàng trong thực hành lâm sàng của sinh viên đại học ngành y khoa từ lâu luôn được xem là một trong những yếu tố quan trọng trong sự thành công của quá trình học tập của sinh viên y khoa. Từ nghiên cứu mô tả cắt ngang 606 sinh viên y khoa hệ chính quy   từ năm thứ 4 đến năm thứ 6 tại trường Đại học Y Dược Cần Thơ và Trường đại học Trà Vinh đánh giá thực trạng kỹ năng thăm khám trong thực hành lâm sàng của sinh viên y khoa. Kết quả sinh viên tự đánh giá mình có khả năng thực hiện được kỹ năng độc lập theo quy trình thực hiện kỹ năng của các kỹ năng thăm khám lâm sàng và sinh viên y khoa năm trên thành thạo hơn so với sinh viên y khoa năm dưới ở tất cả các kỹ năng thành phần trong kỹ năng thăm khám lâm sàng', 3, 8, 0, '', 'tlh-edit-9.docx', 3, 7, 1706673425);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tlh_setup`
--

CREATE TABLE `tlh_setup` (
  `id` int(11) NOT NULL,
  `namegroup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `extend` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `extend_info` text COLLATE utf8_unicode_ci NOT NULL,
  `id_father` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tlh_setup`
--

INSERT INTO `tlh_setup` (`id`, `namegroup`, `extend`, `extend_info`, `id_father`) VALUES
(1, 'Hoạt động', '', '', 0),
(2, '', 'Chờ kiểm duyệt', '', 2),
(3, '', 'Đã duyệt', '', 2),
(4, '', 'Đồng ý đăng', '', 2),
(5, '', 'Chỉnh sửa và gửi lại', '', 2),
(6, '', 'Từ chối nhận', '', 2),
(7, '', 'Chỉnh sửa lần 1', '', 2),
(8, '', 'Gửi lại bài viết lần 1', '', 2),
(9, '', 'Chỉnh sửa lần 2', '', 2),
(10, '', 'Gửi lại bài viết lần 2', '', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tlh_postinglist_histoty`
--
ALTER TABLE `tlh_postinglist_histoty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tlh_setup`
--
ALTER TABLE `tlh_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
