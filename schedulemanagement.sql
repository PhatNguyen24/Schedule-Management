-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 22, 2024 lúc 09:36 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `schedulemanagement`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
--

CREATE TABLE `projects` (
  `project_id` bigint(20) NOT NULL,
  `project_manager_id` bigint(20) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_detail` text NOT NULL,
  `project_start_day` date NOT NULL,
  `project_end_day` date NOT NULL,
  `project_process` tinyint(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `projects`
--

INSERT INTO `projects` (`project_id`, `project_manager_id`, `project_name`, `project_detail`, `project_start_day`, `project_end_day`, `project_process`) VALUES
(1, 1, 'project1', 'info project1 .nm..', '2024-06-19', '2024-08-31', 14),
(2, 1, 'project2', 'test2', '2024-06-20', '2024-06-28', 0),
(3, 1, 'project2', 'haha', '2024-06-20', '2024-07-07', 0),
(7, 1, 'project5', 'haha', '2024-06-21', '2024-08-01', 0),
(8, 2, 'sdfer', 'sdferge', '2024-06-21', '2024-07-05', 0),
(10, 1, 'tesst', 'sdg', '2024-06-21', '2024-07-04', 0),
(11, 2, 'profsd', 'ưe', '2024-06-22', '2024-06-28', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects_has_users`
--

CREATE TABLE `projects_has_users` (
  `pxu_id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `projects_has_users`
--

INSERT INTO `projects_has_users` (`pxu_id`, `project_id`, `user_id`, `role`) VALUES
(1, 1, 1, 1),
(45, 7, 3, 0),
(47, 8, 4, 0),
(48, 8, 6, 0),
(54, 11, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_tasks`
--

CREATE TABLE `sub_tasks` (
  `sub_id` bigint(20) NOT NULL,
  `task_id` bigint(20) NOT NULL,
  `sub_name` varchar(45) NOT NULL,
  `sub_state` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tasks`
--

CREATE TABLE `tasks` (
  `task_id` bigint(20) NOT NULL,
  `pxu_id` bigint(20) NOT NULL,
  `task_name` text DEFAULT NULL,
  `process` tinyint(100) NOT NULL DEFAULT 0,
  `task_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tasks`
--

INSERT INTO `tasks` (`task_id`, `pxu_id`, `task_name`, `process`, `task_end`) VALUES
(15, 1, 'sdf', 0, '2024-06-26'),
(16, 48, 'sf', 0, '2024-05-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_birth` date NOT NULL DEFAULT '1990-01-01',
  `user_gender` tinyint(1) NOT NULL DEFAULT 0,
  `user_img` varchar(255) DEFAULT NULL,
  `user_role` tinyint(1) DEFAULT 0,
  `remember_token` char(100) DEFAULT NULL,
  `user_office` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `user_fullname`, `user_email`, `user_birth`, `user_gender`, `user_img`, `user_role`, `remember_token`, `user_office`) VALUES
(1, 'daiphat', '$2y$10$sGg/KTmjMGbFrpGzTH4S9eqr1j/LZoxwt9bQoXOATHOgjlL9FVxBi', 'Nguyen Dại Phat', 'daiphat2442003@gmail.com', '1990-01-01', 0, NULL, 1, NULL, 1),
(2, 'hoangkhuyen', '$2y$10$isv.bCnCmh9w5CC5ybtwbOOlrd9CNU/PSB6vhDQ1ak8HaehiO5r0i', 'Hoàng Thị Khuyên', 'hoangthikhuyen@gmail.com', '1990-01-01', 0, NULL, 1, NULL, 2),
(3, 'senior1', '$2y$10$blMWco8qyzudIw9NMGUC4eJzuf86dA3YRYnkpC1X3zgSAgj.qVg9C', 'senior1', 'senior1@gmail.com', '1990-01-01', 0, NULL, 0, NULL, 1),
(4, 'junior1', '$2y$10$uLVNKOaPnjHpO9J2CeaDtuYqtK2eCHdfg9/2E6T4G8MUj18AVsUL.', 'junior1', 'junior1@gmail.com', '1990-01-01', 0, NULL, 0, NULL, 1),
(5, 'test3', '$2y$10$uzSjNJWfX4ECWBkqjiQIOeLfk/NhrJTtrmuVgSI3ePqMoN8hS1Usi', 'test3', 'test3@gmail.com', '1990-01-01', 0, NULL, 0, NULL, 1),
(6, 'test4', '$2y$10$TMFDE5p6JJpcOPoKG4mlyeZvHOXwJ2UD1qVASRgrKrQiZlzADXQ2q', 'test4', 'test4@gmail.com', '1990-01-01', 0, NULL, 0, NULL, 2),
(7, 'test5', '$2y$10$9R6/RBgvXsuud/l84LOm4.ux3hG6FIpE6yLXtwMjAqDbnG.ubNDq2', 'test5', 'test5@gmail.com', '1990-01-01', 0, NULL, 0, NULL, 2),
(9, 'admin', '$2y$10$QyrGUtMVXiPq3nDQlxZjbO7Cfsu3xvAyidE5EjkgfgLojQcF9ks8C', 'Admin', 'admin@gmail.com', '1990-01-01', 0, NULL, 2, NULL, 0),
(10, 'demo1', '$2y$10$zgveTz79In4sQb0LaB/jUOK1/y19.ZXsfIyi6Hj/fKNyMpmZK/rQW', 'demo1', 'demo1@gmail.com', '1990-01-01', 0, NULL, 0, NULL, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Chỉ mục cho bảng `projects_has_users`
--
ALTER TABLE `projects_has_users`
  ADD PRIMARY KEY (`pxu_id`),
  ADD KEY `fk_projects_has_users_projects1` (`project_id`),
  ADD KEY `fk_projects_has_users_users1` (`user_id`);

--
-- Chỉ mục cho bảng `sub_tasks`
--
ALTER TABLE `sub_tasks`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `fk_sub_tasks_tasks1` (`task_id`);

--
-- Chỉ mục cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `fk_tasks_projects_has_users1` (`pxu_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `projects_has_users`
--
ALTER TABLE `projects_has_users`
  MODIFY `pxu_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `sub_tasks`
--
ALTER TABLE `sub_tasks`
  MODIFY `sub_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `projects_has_users`
--
ALTER TABLE `projects_has_users`
  ADD CONSTRAINT `fk_projects_has_users_projects1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_projects_has_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `sub_tasks`
--
ALTER TABLE `sub_tasks`
  ADD CONSTRAINT `fk_sub_tasks_tasks1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_projects_has_users1` FOREIGN KEY (`pxu_id`) REFERENCES `projects_has_users` (`pxu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
