-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 12:06 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cambodia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `newpass` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `name`, `username`, `email`, `newpass`) VALUES
(1, '7c222fb2927d828af22f592134e89324', 'Trần Huy Tiệp', 'admin', 'tranhuytiep95@gmail.com', 'uWfG7y3tHj98aR3cGVoqTBsCDrODEVSD');

-- --------------------------------------------------------

--
-- Stand-in structure for view `book`
--
CREATE TABLE IF NOT EXISTS `book` (
`productCode` varchar(15)
,`productName` varchar(70)
,`categoryId` int(11)
,`description` text
,`quantity` int(11)
,`price` double
,`image_link` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, 'Sách'),
(2, 'Quần áo'),
(3, 'Đồ ăn'),
(4, 'Tranh vẽ'),
(5, 'Đồ lưu niệm');

-- --------------------------------------------------------

--
-- Stand-in structure for view `clothes`
--
CREATE TABLE IF NOT EXISTS `clothes` (
`productCode` varchar(15)
,`productName` varchar(70)
,`categoryId` int(11)
,`description` text
,`quantity` int(11)
,`price` double
,`image_link` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerNumber` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `identityCard` int(20) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerNumber`, `customerName`, `phone`, `address`, `email`, `identityCard`, `username`, `password`) VALUES
(1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội', 'tranhuytiep95@gmail.com', 2147483647, '', ''),
(2, 'Nguyễn Văn An', '0963512535', 'Đống Đa,Hà Nội', 'NVAn@gmail.com', 336552365, '', ''),
(3, 'Trần Huy Tiệp', '0123336633', 'Hà Nội', NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `food`
--
CREATE TABLE IF NOT EXISTS `food` (
`productCode` varchar(15)
,`productName` varchar(70)
,`categoryId` int(11)
,`description` text
,`quantity` int(11)
,`price` double
,`image_link` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderNumber` int(11) NOT NULL,
  `productCode` varchar(15) NOT NULL,
  `quantityOrdered` int(11) NOT NULL,
  `priceEach` double NOT NULL,
  `productName` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderNumber`, `productCode`, `quantityOrdered`, `priceEach`, `productName`) VALUES
(1, 'S025', 2, 220000, 'Silver elephant '),
(1, 'S024', 2, 200000, 'Silver frog '),
(1, 'S023', 1, 150000, 'Silver glasses'),
(3, 'S025', 1, 220000, 'Silver elephant '),
(4, 'S024', 1, 200000, 'Silver frog '),
(4, 'S023', 1, 150000, 'Silver glasses'),
(12, 'S023', 1, 150000, ''),
(13, 'S022', 1, 1500000, 'Silver kettle'),
(14, 'S022', 1, 1500000, 'Silver kettle'),
(14, 'S023', 1, 150000, 'Silver glasses'),
(16, 'S026', 1, 160000, 'Silver bracelets '),
(16, 'S025', 1, 220000, 'Silver elephant '),
(17, 'S022', 1, 1500000, 'Silver kettle'),
(18, 'S025', 1, 220000, 'Silver elephant '),
(19, 'S025', 1, 220000, 'Silver elephant '),
(19, 'S026', 1, 160000, 'Silver bracelets '),
(20, 'S023', 1, 150000, 'Silver glasses'),
(26, 'S023', 1, 150000, 'Silver glasses'),
(28, 'S023', 1, 150000, 'Silver glasses'),
(29, 'S026', 1, 160000, 'Silver bracelets '),
(30, 'S022', 1, 1500000, 'Silver kettle'),
(31, 'S026', 1, 160000, 'Silver bracelets '),
(32, 'S022', 1, 1500000, 'Silver kettle'),
(33, 'S022', 1, 1500000, 'Silver kettle'),
(34, 'S024', 1, 200000, 'Silver frog '),
(35, 'S026', 1, 160000, 'Silver bracelets '),
(36, 'S025', 1, 220000, 'Silver elephant '),
(37, 'S024', 1, 200000, 'Silver frog '),
(38, 'S024', 1, 200000, 'Silver frog '),
(39, 'S024', 1, 200000, 'Silver frog '),
(39, 'S023', 1, 150000, 'Silver glasses'),
(40, 'S025', 1, 220000, 'Silver elephant '),
(41, 'P004', 1, 350000, 'Bức tranh cảnh làm ruộng của người Campuchia'),
(42, 'S025', 2, 220000, 'Silver elephant '),
(43, 'S025', 1, 220000, 'Silver elephant ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderNumber` int(11) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `comments` text NOT NULL,
  `customerNumber` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNumber`, `createDate`, `updateDate`, `status`, `comments`, `customerNumber`, `customerName`, `phone`, `address`) VALUES
(1, '2016-08-14 21:19:03', '2016-08-15 09:00:45', 'Shipped', '', 1, 'Trần Huy Tiệp', '01663335021', 'Ba Đình,Hà Nội'),
(2, '2016-08-15 09:46:14', '2016-08-15 09:46:14', 'In Process', '', 2, 'Nguyễn Văn An', '0963512535', 'Đống Đa,Hà Nội'),
(3, '2016-08-15 09:47:46', '2016-08-15 09:47:46', 'In Process', '', 2, 'Nguyễn Văn An', '0963512535', 'Đống Đa,Hà Nội'),
(4, '2016-08-15 10:22:19', '2016-08-15 10:22:42', 'Shipped', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(5, '2016-08-15 11:10:08', NULL, 'In Process', '', 1, '', '', ''),
(6, '2016-08-15 11:10:11', NULL, 'In Process', '', 1, '', '', ''),
(7, '2016-08-15 11:10:12', NULL, 'In Process', '', 1, '', '', ''),
(8, '2016-08-15 11:10:13', NULL, 'In Process', '', 1, '', '', ''),
(9, '2016-08-15 11:10:13', NULL, 'In Process', '', 1, '', '', ''),
(10, '2016-08-15 11:10:13', NULL, 'In Process', '', 1, '', '', ''),
(11, '2016-08-15 11:10:14', NULL, 'In Process', '', 1, '', '', ''),
(12, '2016-08-15 11:12:50', NULL, 'In Process', '', 1, '', '', ''),
(13, '2016-08-15 11:21:56', '2016-08-15 11:21:56', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(14, '2016-08-15 11:23:23', '2016-08-15 11:23:23', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(15, '2016-08-15 11:23:31', '2016-08-15 11:23:31', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(16, '2016-08-15 11:23:48', '2016-08-15 11:23:48', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Ba Đình,Hà Nội'),
(17, '2016-08-15 11:24:58', '2016-08-15 11:24:58', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(18, '2016-08-15 12:51:38', '2016-08-15 12:51:38', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(19, '2016-08-15 13:25:33', '2016-08-15 13:25:33', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(20, '2016-08-15 13:25:56', '2016-08-15 13:25:56', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(21, '2016-08-15 13:25:57', '2016-08-15 13:25:57', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(22, '2016-08-15 13:25:57', '2016-08-15 13:25:57', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(23, '2016-08-15 13:25:58', '2016-08-15 13:25:58', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(24, '2016-08-15 13:25:58', '2016-08-15 13:25:58', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(25, '2016-08-15 13:28:05', '2016-08-15 13:28:05', 'In Process', '', 3, 'Trần Huy Tiệp', '0123336633', 'Hà Nội'),
(26, '2016-08-15 13:28:15', '2016-08-15 13:28:15', 'In Process', '', 3, 'Trần Huy Tiệp', '0123336633', 'Hà Nội'),
(27, '2016-08-15 13:40:36', '2016-08-15 13:40:36', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(28, '2016-08-15 13:40:38', '2016-08-15 13:40:38', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(29, '2016-08-15 13:45:26', '2016-08-15 13:45:26', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(30, '2016-08-15 13:46:36', '2016-08-15 13:46:36', 'In Process', '', 3, 'Trần Huy Tiệp', '0123336633', 'Đống Đa,Hà Nội'),
(31, '2016-08-15 13:51:54', '2016-08-15 13:51:54', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(32, '2016-08-15 13:55:02', '2016-08-15 13:55:02', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(33, '2016-08-15 14:03:10', '2016-08-15 14:03:10', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(34, '2016-08-15 14:03:38', '2016-08-15 14:03:38', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(35, '2016-08-15 14:08:30', '2016-08-15 14:08:30', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(36, '2016-08-15 14:11:10', '2016-08-15 14:11:10', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(37, '2016-08-15 14:11:33', '2016-08-15 14:11:33', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(38, '2016-08-15 14:28:25', '2016-08-15 14:28:25', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Ba Đình,Hà Nội'),
(39, '2016-08-15 14:42:29', '2016-08-15 14:42:29', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Ba Đình,Hà Nội'),
(40, '2016-08-15 15:21:01', '2016-08-15 15:21:01', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(41, '2016-08-15 16:19:03', '2016-08-15 16:19:03', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Ba Đình,Hà Nội'),
(42, '2016-08-15 16:49:04', '2016-08-15 16:49:04', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội'),
(43, '2016-08-15 16:56:06', '2016-08-15 16:56:06', 'In Process', '', 1, 'Trần Huy Tiệp', '01663335021', 'Đống Đa,Hà Nội');

-- --------------------------------------------------------

--
-- Stand-in structure for view `painting`
--
CREATE TABLE IF NOT EXISTS `painting` (
`productCode` varchar(15)
,`productName` varchar(70)
,`categoryId` int(11)
,`description` text
,`quantity` int(11)
,`price` double
,`image_link` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productCode` varchar(15) NOT NULL,
  `productName` varchar(70) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `image_link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productCode`, `productName`, `categoryId`, `description`, `quantity`, `price`, `image_link`) VALUES
('B001', 'Angkor Wat Photo Guide ', 1, 'Cùng khám phá những điều huyền bí và bí mật ở đên Angkor Wat, với 68 bức ảnh và 4 tấm bản đồ. Cuốn sách sẽ giúp chuyến đi tới Campuchia của bạn trở nên dễ dàng hơn rất nhiều, đặc biệt nếu bạn đi một mình.', 10, 150000, 'B001.jpg'),
('B002', 'Alive in the killing Fields: “The True Story of Nawuth Keat"', 1, 'Là câu chuyện của Nawuth Keat, người đã sống sót trong chế độ diệt chủng ở Campuchia. Ông ấy hy vọng sự thật sẽ giúp người Campuchia tránh được một thảm họa tương tự trong tương lai', 10, 125000, 'B002.jpg'),
('B003', 'Angkor and the Khmer Civilization', 1, 'Đây là một cuốn sách tuyệt vời cho việc tìm hiểu về nền văn minh Angkor, nền văn mình phát triển trong những khu rừng mưa nhiệt đới và những cánh đồng lúa Đông Nam Á. Cuốn sách trình bày ngắn gọn những cũng hết sức đầy đủ về lịch sử nền văn minh Angkor suốt từ thời kỳ đồ đá cho tới khi bị thực dân Pháp đô hộ năm 1863. Dưới những nghiên cứu khảo cổ mới nhất, Michael D. Coe đã mang tới cho cuốn sách một bức tranh cuộc sống người Khmer vô cùng văn minh và phi thường.', 10, 300000, 'B003.jpg'),
('B004', 'The Cambodian Dancer: Sophany''s gift of hope', 1, 'Bằng một ngôn ngữ đơn giản mà trong sáng, cuốn sách đã thể hiện câu chuyện về cách giao tiếp của trẻ em Campuchia thông qua niềm vui, nỗi buồn, sự bất công và chiến thắng của những đứa trẻ Campuchia sống ở Mỹ. ', 5, 340000, 'B004.jpg'),
('B005', 'Cambodia-Culture Smart!: The Essential Guide to Cu', 1, 'Cuốn sách cung cấp những thông tin cần thiết về con người Campuchia. ', 12, 220000, 'B005.jpg'),
('B006', 'The Khmer Empire: Cities and Sactuaries from the 5', 1, 'Cuốn sách nói về nền văn hóa Angkor thông qua những bức ảnh về các thành phố cổ.', 14, 1000000, 'B006.jpg'),
('B007', 'Cambodian for Beginners', 1, 'Cuốn sách hoàn thiện với đầy đủ 4 ký năng nghe - nói - đọc - viết, được trình bày đơn giản, dễ hiểu. Ngoài ra, cuốn sách còn giới thiệu về văn hóa Campuchia, con người ở đây,...', 11, 690000, 'B007.jpg'),
('B008', 'Ultimate Cambodia Travel Guide', 1, 'Cuốn sách là hàng ngàn bức ảnh về các địa danh ở Campuchia. ', 42, 135000, 'B008.jpg'),
('B009', 'Adventure Cambodia: An Explorer’s Travel Guide', 1, 'Cuốn sách cho bạn biết Campuchia không chỉ có Phnom Penh và Angkor Wat!. Cuốn sách giới thiệu những địa danh mới giúp bạn có một lịch trình cho riêng mình tới khắp nơi trên đất nước Campuchia. Cuốn sách có hơn 200 bức ảnh giúp lột tả những vẻ đẹp tiềm ẩn của Campuchia. Ngoài ra, nó còn tư vấn cho bạn tất tần tật những gì để bạn có một chuyến đi Campuchia vui vẻ, từ thị thực tới các thông tin về lưu trú, khách sạn và giá vé tham quan.', 100, 50000, 'B009.jpg'),
('C001', 'Kroma', 2, 'Kroma là loại khăn truyền thống của Campuchia. Ta có thể bắt gặp loại khăn này ở bất kỳ đâu trên đất nước này. Nó được làm từ lụa hoặc vải mềm ở Kompong Cham và Phnom Sarok Khăn rằn Kroma thường được sử dụng với đa chức năng như choàng cổ, cầm tay, bọc và địu em bé, che mặt, quấn đầu, khăn tắm, hoặc đơn giản là để trang trí. Có thể nói, Kroma là một nét rất riêng ở xứ Angkor này.', 144, 60000, 'C001.jpg'),
('C002', 'Khăn Kroma', 2, 'Kroma là loại khăn truyền thống của Campuchia. Ta có thể bắt gặp loại khăn này ở bất kỳ đâu trên đất nước này. Nó được làm từ lụa hoặc vải mềm ở Kompong Cham và Phnom Sarok Khăn rằn Kroma thường được sử dụng với đa chức năng như choàng cổ, cầm tay, bọc và địu em bé, che mặt, quấn đầu, khăn tắm, hoặc đơn giản là để trang trí. Có thể nói, Kroma là một nét rất riêng ở xứ Angkor này.', 56, 60000, 'C002.jpg'),
('C003', 'Khăn Kroma', 2, 'Kroma là loại khăn truyền thống của Campuchia. Ta có thể bắt gặp loại khăn này ở bất kỳ đâu trên đất nước này. Nó được làm từ lụa hoặc vải mềm ở Kompong Cham và Phnom Sarok Khăn rằn Kroma thường được sử dụng với đa chức năng như choàng cổ, cầm tay, bọc và địu em bé, che mặt, quấn đầu, khăn tắm, hoặc đơn giản là để trang trí. Có thể nói, Kroma là một nét rất riêng ở xứ Angkor này.', 67, 60000, 'C003.jpg'),
('C004', 'Áo phông đền Bayon', 2, 'Áo phông in hình đền Bayon', 44, 10000, 'C004.jpg'),
('C005', 'Áo phông đền Angkor Wat', 2, 'Áo phông in hình đền Angkor Wat', 66, 100000, 'C005.jpg'),
('C006', 'Khăn Kroma', 2, 'Kroma là loại khăn truyền thống của Campuchia. Ta có thể bắt gặp loại khăn này ở bất kỳ đâu trên đất nước này. Nó được làm từ lụa hoặc vải mềm ở Kompong Cham và Phnom Sarok Khăn rằn Kroma thường được sử dụng với đa chức năng như choàng cổ, cầm tay, bọc và địu em bé, che mặt, quấn đầu, khăn tắm, hoặc đơn giản là để trang trí. Có thể nói, Kroma là một nét rất riêng ở xứ Angkor này.', 32, 60000, 'C006.jpg'),
('C007', 'Khăn Kroma', 2, 'Kroma là loại khăn truyền thống của Campuchia. Ta có thể bắt gặp loại khăn này ở bất kỳ đâu trên đất nước này. Nó được làm từ lụa hoặc vải mềm ở Kompong Cham và Phnom Sarok Khăn rằn Kroma thường được sử dụng với đa chức năng như choàng cổ, cầm tay, bọc và địu em bé, che mặt, quấn đầu, khăn tắm, hoặc đơn giản là để trang trí. Có thể nói, Kroma là một nét rất riêng ở xứ Angkor này.', 23, 60000, 'C007.jpg'),
('F001', 'Cá khô', 3, '', 222, 600000, 'F001.jpg'),
('F002', 'Cá khô', 3, '', 22, 500000, 'F002.jpg'),
('F003', 'Cá khô', 3, '', 22, 500000, 'F003.jpg'),
('F004', 'Lạp xưởng bò', 3, '', 32, 30000, 'F004.jpg'),
('F005', 'Lạp xưởng lợn', 3, '', 22, 25000, 'F005.jpg'),
('F006', 'Num Ansom Chek ', 3, 'Là một món tráng miệng phổ biến và được ăn vào các dịp lễ tết như lễ hội Pchum Ben hay năm mới. Vào các dịp này, người dân Campuchia mang Num Ánom Chek tới chùa và ăn cùng với các nhà sư và những người tham gia lễ hội.', 33, 45000, 'F006.jpg'),
('F007', 'Num Korng ', 3, 'Là một loại bánh rán được làm từ bột gạo, được rưới lên trên một lớp caramel được làm từ đường thốt nốt và vừng. Đây là một món ăn chay rất được ưa chuộng.', 21, 43000, 'F007.jpg'),
('F008', 'Num Chak Kachan ', 3, 'Là một loại bánh xếp nhiều lớp với kem dừa. Loại bánh này được làm trong ngày lễ Phật ở Campuchia. Loại bánh này có bề ngoài khá bắt mắt, do các lớp bánh có nhiều màu sắc khác nhau.', 22, 65000, 'F008.jpg'),
('F009', 'Num Pla-aye', 3, 'Gần giống bánh bao ở Việt Nam. Loại bánh này có nhân làm từ kẹo đường thốt nốt. Loại bánh này thường được đặt trong một mảnh lá chuối nhỏ., ', 65, 46000, 'F009.jpg'),
('F010', 'Sang Khja Lapov ', 3, 'Đây là loại bánh kem được làm từ bí ngô. Trong tiếng Campuchia, "lapov" có nghĩa là bí ngô. Loại bánh này thường chỉ được ăn trong các dịp đặt biệt. Loại bánh này nên được làm trước đó 1 ngày và bảo quản trong tủ lạnh', 55, 37000, 'F010.jpg'),
('F011', 'Noum Crowrp Khnow Recepe ', 3, 'Loại bánh này có hình dạng giống như hạt mít, nhưng không hề được làm từ mít mà được làm từ đậu xanh rồi cuốn lại thành hình dạng đó. Nó có vị ngọt, hấp dẫn. Người Campuchia thường dùng nó với một cốc cà phê cho bữa sáng của mình.', 21, 37000, 'F011.jpg'),
('F012', 'Num Akor ', 3, 'Bánh có hình tròn, được làm từ bột gạo trộn với sữa dừa và đường thốt nốt, cùng với dừa thái nhỏ và vừng rắc lên trên. ', 22, 55000, 'F012.jpg'),
('F013', 'Krolan', 3, 'Món ăn này gần giống với cơm lam của đồng bào các dân tộc thiểu số phía Bắc nước ta. Nguyên liệu gồm có gạo nếp, đậu đen, dừa vụn tươi, tất cả được cho hết vào một mẩu tre nhỏ, sau đó đem nướng trên than trong khoảng 1 tiếng.', 22, 57000, 'F013.jpg'),
('F014', 'Num An Som Ang ', 3, 'Bánh được làm từ gạo nếp, được bọc trong lá chuối', 13, 41000, 'F014.jpg'),
('F015', 'Num Gkow ', 3, 'Bánh được làm từ bột gạo, sữa dừa và đường. Chúng được trộn với nhau, sau đó tạo hình đặt vào trong một mảnh lá chuối rồi đem hấp lên, sau đó có thêm một lớp kem mít ở bên trên.', 55, 35000, 'F015.jpg'),
('P001', 'Bức tranh về cuộc sống vùng quê Campuchia', 4, 'Là một món đồ lưu niệm tiêu biểu ở Campuchia. Ở đây, bạn có thể mua tranh ở bất kỳ đâu, từ trên đường phố cho tới những khu chợ. Chủ đề của những bức tranh nói về đền Angkor Wat và những nghệ nhân chạm khắc trên đá. Nếu tới thăm phòng tranh, bạn có thể được tận mắt chứng kiến việc tạo nên bức tranh, với màu dầu và màu nước, tao nên những nét tươi sáng cho cuộc sống hàng ngày ', 4, 500000, 'P001.jpg'),
('P002', 'Bức tranh đền Angkor Wat', 4, 'Là một món đồ lưu niệm tiêu biểu ở Campuchia. Ở đây, bạn có thể mua tranh ở bất kỳ đâu, từ trên đường phố cho tới những khu chợ. Chủ đề của những bức tranh nói về đền Angkor Wat và những nghệ nhân chạm khắc trên đá. Nếu tới thăm phòng tranh, bạn có thể được tận mắt chứng kiến việc tạo nên bức tranh, với màu dầu và màu nước, tao nên những nét tươi sáng cho cuộc sống hàng ngày ', 18, 400000, 'P002.jpg'),
('P003', 'Bức tranh đền Bayon', 4, 'Là một món đồ lưu niệm tiêu biểu ở Campuchia. Ở đây, bạn có thể mua tranh ở bất kỳ đâu, từ trên đường phố cho tới những khu chợ. Chủ đề của những bức tranh nói về đền Angkor Wat và những nghệ nhân chạm khắc trên đá. Nếu tới thăm phòng tranh, bạn có thể được tận mắt chứng kiến việc tạo nên bức tranh, với màu dầu và màu nước, tao nên những nét tươi sáng cho cuộc sống hàng ngày ', 32, 650000, 'P003.jpg'),
('P004', 'Bức tranh cảnh làm ruộng của người Campuchia', 4, 'Là một món đồ lưu niệm tiêu biểu ở Campuchia. Ở đây, bạn có thể mua tranh ở bất kỳ đâu, từ trên đường phố cho tới những khu chợ. Chủ đề của những bức tranh nói về đền Angkor Wat và những nghệ nhân chạm khắc trên đá. Nếu tới thăm phòng tranh, bạn có thể được tận mắt chứng kiến việc tạo nên bức tranh, với màu dầu và màu nước, tao nên những nét tươi sáng cho cuộc sống hàng ngày ', 5, 350000, 'P004.jpg'),
('P005', 'Bức tranh đền Angkor Wat khi hoàng hôn', 4, 'Là một món đồ lưu niệm tiêu biểu ở Campuchia. Ở đây, bạn có thể mua tranh ở bất kỳ đâu, từ trên đường phố cho tới những khu chợ. Chủ đề của những bức tranh nói về đền Angkor Wat và những nghệ nhân chạm khắc trên đá. Nếu tới thăm phòng tranh, bạn có thể được tận mắt chứng kiến việc tạo nên bức tranh, với màu dầu và màu nước, tao nên những nét tươi sáng cho cuộc sống hàng ngày ', 9, 550000, 'P005.jpg'),
('S001', 'Móc chìa khóa', 5, 'Có nhiều loại khác nhau và in hình một số địa danh nổi tiếng ở Campuchia', 22, 40000, 'S001.jpg'),
('S002', 'Tượng đền Bayon', 5, 'Kích thước: 68cm x 45cm', 11, 100000, 'S002.jpg'),
('S003', 'Tượng voi bằng bạc', 5, 'Ờ Campuchia, từ thế kỷ XI, đồ vật bằng bạc đã được sử dụng rộng rãi trong nhiều nghi lễ tôn giáo. Nó không quá đắt, nhưng có khả năng tạo ra những đồ vật tinh xảo qua bàn tay của những nghệ nhân Khmer', 21, 150000, 'S003.jpg'),
('S004', 'Mũ Muok Sloek ', 2, 'Chiếc mũ được làm từ lá cây thốt nốt. Đây cũng là loại mũ truyền thống ở Campuchia', 323, 60000, 'S004.jpg'),
('S005', 'Túi handmade', 5, '', 22, 80000, 'S005.jpg'),
('S006', 'Tranh về điệu múa Apsara', 5, 'Kích thước: 68cm x 45cm', 6, 100000, 'S006.jpg'),
('S007', 'Vòng tay handmade', 5, '', 123, 40000, 'S007.jpg'),
('S008', 'Vòng tay bạc', 5, 'Ờ Campuchia, từ thế kỷ XI, đồ vật bằng bạc đã được sử dụng rộng rãi trong nhiều nghi lễ tôn giáo. Nó không quá đắt, nhưng có khả năng tạo ra những đồ vật tinh xảo qua bàn tay của những nghệ nhân Khmer', 22, 200000, 'S008.jpg'),
('S009', 'Lụa Khmer', 5, 'Được bày bán rộng rãi ở Campuchia, đặc biệt là trên đường phố. Vải có họa tiết đẹp và được làm hoàn toàn thủ công. ', 12, 140000, 'S009.jpg'),
('S010', 'Gối lụa', 5, 'Được làm từ lụa Khmer', 21, 160000, 'S010.jpg'),
('S011', 'Đồ thủ công mỹ nghệ', 5, 'Được làm thủ công bởi những người phụ nữ Campuchia', 9, 60000, 'S011.jpg'),
('S012', 'Móc chìa khóa vỏ dừa', 5, 'Được chạm khắc từ vỏ dừa', 23, 60000, 'S012.jpg'),
('S013', 'Vòng tay bạc', 5, 'Ờ Campuchia, từ thế kỷ XI, đồ vật bằng bạc đã được sử dụng rộng rãi trong nhiều nghi lễ tôn giáo. Nó không quá đắt, nhưng có khả năng tạo ra những đồ vật tinh xảo qua bàn tay của những nghệ nhân Khmer', 12, 150000, 'S013.jpg'),
('S014', 'Đĩa lưu niệm in hình Angkor Wat', 5, 'Đĩa được làm bằng bạc và vàng, có in hình di tích Angkor Wat', 212, 300000, 'S014.jpg'),
('S015', 'Resin Fridge Magnet', 5, 'Kích thước: 7cm x 6cm x 1.5cm ', 13, 60000, 'S015.jpg'),
('S016', 'Resin Fridge Magnet: Cambodia Bayon Temple', 5, 'Kích thước: 7cm x 6cm x 1.5cm', 55, 140000, 'S016.jpg'),
('S017', 'Resin Fridge Magnet: Cambodia Angkor Wat', 5, 'Kích thước: 7cm x 6cm x 1.5cm', 23, 140000, 'S017.jpg'),
('S018', 'Resin Fridge Magnet: Cambodia Apsara', 5, 'Kích thước: 7cm x 6cm x 1.5cm', 41, 140000, 'S018.jpg'),
('S019', 'Cambodia hand-made bracelet', 5, 'Kích thước: 7cm x 6cm x 1.5cm', 21, 10000, 'S019.jpg'),
('S020', 'Silver vase for decoration', 5, 'Ờ Campuchia, từ thế kỷ XI, đồ vật bằng bạc đã được sử dụng rộng rãi trong nhiều nghi lễ tôn giáo. Nó không quá đắt, nhưng có khả năng tạo ra những đồ vật tinh xảo qua bàn tay của những nghệ nhân Khmer', 25, 100000, 'S020.jpg'),
('S021', 'Silver glasses', 5, 'Ờ Campuchia, từ thế kỷ XI, đồ vật bằng bạc đã được sử dụng rộng rãi trong nhiều nghi lễ tôn giáo. Nó không quá đắt, nhưng có khả năng tạo ra những đồ vật tinh xảo qua bàn tay của những nghệ nhân Khmer', 52, 150000, 'S021.jpg'),
('S022', 'Silver kettle', 5, 'Ờ Campuchia, từ thế kỷ XI, đồ vật bằng bạc đã được sử dụng rộng rãi trong nhiều nghi lễ tôn giáo. Nó không quá đắt, nhưng có khả năng tạo ra những đồ vật tinh xảo qua bàn tay của những nghệ nhân Khmer', 54, 1500000, 'S022.jpg'),
('S023', 'Silver glasses', 5, 'Ờ Campuchia, từ thế kỷ XI, đồ vật bằng bạc đã được sử dụng rộng rãi trong nhiều nghi lễ tôn giáo. Nó không quá đắt, nhưng có khả năng tạo ra những đồ vật tinh xảo qua bàn tay của những nghệ nhân Khmer', 41, 150000, 'S023.jpg'),
('S024', 'Silver frog ', 5, 'Ờ Campuchia, từ thế kỷ XI, đồ vật bằng bạc đã được sử dụng rộng rãi trong nhiều nghi lễ tôn giáo. Nó không quá đắt, nhưng có khả năng tạo ra những đồ vật tinh xảo qua bàn tay của những nghệ nhân Khmer', 12, 200000, 'S024.jpg'),
('S025', 'Silver elephant ', 5, 'Ờ Campuchia, từ thế kỷ XI, đồ vật bằng bạc đã được sử dụng rộng rãi trong nhiều nghi lễ tôn giáo. Nó không quá đắt, nhưng có khả năng tạo ra những đồ vật tinh xảo qua bàn tay của những nghệ nhân Khmer', 12, 220000, 'S025.jpg'),
('S026', 'Silver bracelets ', 5, '<p>\r\n	Ờ Campuchia, từ thế kỷ XI, đồ vật bằng bạc đ&atilde; được sử dụng rộng r&atilde;i trong nhiều nghi lễ t&ocirc;n gi&aacute;o. N&oacute; kh&ocirc;ng qu&aacute; đắt, nhưng c&oacute; khả năng tạo ra những đồ vật tinh xảo qua b&agrave;n tay của những nghệ nh&acirc;n Khmer</p>\r\n', 44, 160000, 'S0261.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `rateID` int(11) NOT NULL,
  `rateValue` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rateID`, `rateValue`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ratedetails`
--

CREATE TABLE IF NOT EXISTS `ratedetails` (
  `productCode` varchar(15) NOT NULL,
  `rateID` int(11) NOT NULL,
  `customerNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratedetails`
--

INSERT INTO `ratedetails` (`productCode`, `rateID`, `customerNumber`) VALUES
('B001', 3, 5),
('B001', 4, 2),
('B001', 5, 1),
('B002', 5, 2),
('B002', 4, 3),
('B003', 5, 1),
('B003', 4, 2),
('B003', 5, 3),
('B004', 3, 2),
('B004', 4, 5),
('B005', 3, 4),
('B006', 5, 2),
('B006', 4, 3),
('B006', 4, 5),
('B007', 1, 2),
('C001', 5, 1),
('C002', 4, 4),
('C003', 4, 2),
('C003', 3, 3),
('C003', 2, 1),
('F001', 4, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `souvenir`
--
CREATE TABLE IF NOT EXISTS `souvenir` (
`productCode` varchar(15)
,`productName` varchar(70)
,`categoryId` int(11)
,`description` text
,`quantity` int(11)
,`price` double
,`image_link` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identityCard` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `newpassword` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `phone`, `address`, `email`, `identityCard`, `password`, `newpassword`) VALUES
(1, 'huytiep', 'Trần Huy Tiệp', '01663335020', 'Ha Nội', 'tranhuytiep95@gmail.com', '223695', '', '');

-- --------------------------------------------------------

--
-- Structure for view `book`
--
DROP TABLE IF EXISTS `book`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `book` AS select `products`.`productCode` AS `productCode`,`products`.`productName` AS `productName`,`products`.`categoryId` AS `categoryId`,`products`.`description` AS `description`,`products`.`quantity` AS `quantity`,`products`.`price` AS `price`,`products`.`image_link` AS `image_link` from `products` where (`products`.`categoryId` = 1);

-- --------------------------------------------------------

--
-- Structure for view `clothes`
--
DROP TABLE IF EXISTS `clothes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clothes` AS select `products`.`productCode` AS `productCode`,`products`.`productName` AS `productName`,`products`.`categoryId` AS `categoryId`,`products`.`description` AS `description`,`products`.`quantity` AS `quantity`,`products`.`price` AS `price`,`products`.`image_link` AS `image_link` from `products` where (`products`.`categoryId` = 2);

-- --------------------------------------------------------

--
-- Structure for view `food`
--
DROP TABLE IF EXISTS `food`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `food` AS select `products`.`productCode` AS `productCode`,`products`.`productName` AS `productName`,`products`.`categoryId` AS `categoryId`,`products`.`description` AS `description`,`products`.`quantity` AS `quantity`,`products`.`price` AS `price`,`products`.`image_link` AS `image_link` from `products` where (`products`.`categoryId` = 3);

-- --------------------------------------------------------

--
-- Structure for view `painting`
--
DROP TABLE IF EXISTS `painting`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `painting` AS select `products`.`productCode` AS `productCode`,`products`.`productName` AS `productName`,`products`.`categoryId` AS `categoryId`,`products`.`description` AS `description`,`products`.`quantity` AS `quantity`,`products`.`price` AS `price`,`products`.`image_link` AS `image_link` from `products` where (`products`.`categoryId` = 4);

-- --------------------------------------------------------

--
-- Structure for view `souvenir`
--
DROP TABLE IF EXISTS `souvenir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `souvenir` AS select `products`.`productCode` AS `productCode`,`products`.`productName` AS `productName`,`products`.`categoryId` AS `categoryId`,`products`.`description` AS `description`,`products`.`quantity` AS `quantity`,`products`.`price` AS `price`,`products`.`image_link` AS `image_link` from `products` where (`products`.`categoryId` = 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerNumber`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `orderNumber` (`orderNumber`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNumber`), ADD KEY `customerNumber` (`customerNumber`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productCode`), ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rateID`);

--
-- Indexes for table `ratedetails`
--
ALTER TABLE `ratedetails`
  ADD KEY `rateID` (`rateID`), ADD KEY `productCode` (`productCode`), ADD KEY `customerNumber` (`customerNumber`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerNumber` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNumber` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rateID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderNumber`) REFERENCES `orders` (`orderNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerNumber`) REFERENCES `customers` (`customerNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryID`) ON UPDATE CASCADE;

--
-- Constraints for table `ratedetails`
--
ALTER TABLE `ratedetails`
ADD CONSTRAINT `ratedetails_ibfk_1` FOREIGN KEY (`rateID`) REFERENCES `rate` (`rateID`) ON UPDATE CASCADE,
ADD CONSTRAINT `ratedetails_ibfk_2` FOREIGN KEY (`productCode`) REFERENCES `products` (`productCode`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
