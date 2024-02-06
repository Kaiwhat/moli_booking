-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-02-06 16:48:20
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `molibooking`
--

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `StuId` varchar(9) DEFAULT NULL,
  `FromTime` datetime DEFAULT NULL,
  `ToTime` time DEFAULT NULL,
  `Use_for` text DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Pass` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`StuId`, `FromTime`, `ToTime`, `Use_for`, `Email`, `Pass`) VALUES
('test1', '2024-01-03 14:40:00', '00:00:00', 'test1', 'test1@mail.com', '待審核'),
('test2', '2024-01-03 14:41:00', '00:00:00', 'test2', 'test2@mail.com', '待審核'),
('test3', '2024-01-03 14:42:00', '00:00:00', 'test3', 'test3@mail.com', '待審核'),
('test4', '2024-01-03 14:42:00', '00:00:00', 'test4', 'test4@mail.com', '待審核'),
('test5', '2024-01-03 14:42:00', '00:00:00', 'test5', 'test5@mail.com', '待審核'),
('test6', '2024-01-03 14:43:00', '00:00:00', 'test6', 'test6@mail.com', '待審核'),
('test7', '2024-01-03 14:43:00', '00:00:00', 'test7', 'test7@mail.com', '待審核'),
('test8', '2024-01-03 14:43:00', '00:00:00', 'test8', 'test8@mail.com', '待審核'),
('test9', '2024-01-03 14:43:00', '00:00:00', 'test9', 'test9@mail.com', '待審核'),
('test10', '2024-01-03 14:44:00', '00:00:00', 'test10', 'test10@mail.com', '待審核'),
('test11', '2024-01-05 17:51:00', '12:00:00', 'test11', 'test11@mail.com', '待審核'),
('test12', '2024-01-05 17:53:00', '12:00:00', 'teat', 'test12@mail.com', '待審核'),
('111', '2024-02-05 13:39:00', '12:00:00', '111', '111@gmail.com', '待審核'),
('1312', '2024-02-05 15:36:00', '12:00:00', '3213', '31312@gmail.com', '待審核'),
('111213005', '2024-02-06 23:02:00', '12:00:00', 'test for final demonstration', 's111213005@mail.com', '待審核');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
