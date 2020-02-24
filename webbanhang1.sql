-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2020 lúc 02:59 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(10) NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `hoten`, `email`, `role`, `sdt`) VALUES
(1, 'dinhhuy', '$2y$10$pnt58Y0agjAlnz27FXCS9eoVRf3I9jpwlNhVyETtWSdPT7cmScyuC', 'Nguyễn Đình Huy', 'rr', 1, '098763421'),
(2, 'nguyena', '$2y$10$4Bj0hqsR.UGM575xFzRV4uaxaO4Kb1VQLKE6/8vZ0U2SNxnAwb6u.', 'Nguyen A', 'jljio@gmail.com', 2, '894392748'),
(3, 'vanb', '$2y$10$nt/NargCOysD89u0bPTSyeyMp4Hpu1vnJWuFMQnuFXXpc8B9KlrdG', 'Văn B', 'vanb@gmail.com', 2, '3894798324'),
(4, 'tranc', '$2y$10$Te2XHOjUldvwBz/MZex2iuWFtsmWL9iz/YnpY7Sqs6F6M2lpSogw.', 'Tran Thi C', 'iinn@gmail.com', 2, '3492837455'),
(6, 'vand', '$2y$10$TJ1vGGvXg3kqLTp6hv.7OewsDX14XQARWQqV19zDDBvIQyQUTlEYe', 'Van D', 'vand@gmail.com', 2, '09328932323'),
(20, 'vuh', '$2y$10$ypquryZZkidTrkki9x3xjeza6b.Aigeywm5DXjcfWA4NJ3c7YwVW6', 'Vu H', 'vuh@gmail.com', 2, '12555566666'),
(21, 'tranh', '$2y$10$QQDkM3A4zDpQvGfG7F9c3e6TZPkqqwKhIp7V3s46sB2bieTHbk1qu', 'Tran H', 'dinhhuy1798@gmail.com', 2, '8390473234');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
