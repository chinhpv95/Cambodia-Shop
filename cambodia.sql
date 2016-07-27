-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2016 at 12:28 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cambodia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `name`, `username`, `email`) VALUES
(1, '7c222fb2927d828af22f592134e89324', 'Trần Huy Tiệp', 'admin', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `book`
--
CREATE TABLE `book` (
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

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
CREATE TABLE `clothes` (
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

CREATE TABLE `customers` (
  `customerNumber` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `identityCard` int(20) DEFAULT NULL,
  `id` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerNumber`, `customerName`, `phone`, `address`, `email`, `identityCard`, `id`, `password`) VALUES
(1, 'Nguyễn Viết Cương', '0987651888', 'Mù Căng Chải - Yên Bái', 'cuongnv@gmail.com', 71627238, 'cuongnv', '123456'),
(2, 'Đoàn Quang Long', '092777466', 'Mường Nhé, Điện Biên', 'longdq@gmail.com', 155345525, 'longdq', '123456'),
(3, 'Noun Sothea', '0988888888', 'Đại Từ, Thái Nguyên', 'sothea@gmail.com', 99882753, 'sothean', '123456'),
(4, 'Trần Huy Tiệp', '0976555162', 'Anh Sơn, Nghệ An', 'tiepth@gmail.com', 22555126, 'tiepth', '123456'),
(5, 'Phạm Văn Chính', '0955122485', 'Tam Nông, Phú Thọ', 'chinhpv@gmail.com', 99888352, 'chinhpv', '123456'),
(6, 'Trần Huy Tiệp', '0969696969', 'Hà Nội', 'tranhuytiep95@gmail.com', 2147483647, '', ''),
(7, 'Lê Văn Lương', '0964777282', 'Thường Tín, Hà Nội', 'luonglv@gmail.com', 29294432, '', ''),
(8, 'Lê Công Vinh', '0988666232', 'Mỹ Tho, Tiền Giang', 'vinhlv@gmail.com', 99882245, '', ''),
(9, 'Messi', '0922444111', 'Thiên Đàng', 'messi@gmail.com', 99998812, '', ''),
(10, 'Cao Minh Lâm', '0944566233', 'Phú Ninh, Quảng Nam', 'anvb@gmai.com', 661271212, '', ''),
(11, 'Bai Thu Nguyen', '977666162', 'Đông Triều, Quảng Ninh', 'chinh@gmail.com', 2147483647, '', ''),
(12, 'Hoàng Phúc Anh', '966192810', 'Trung Quốc', 'chinhpv@gmail.com', 2147483647, '', ''),
(13, 'Hoàng Thanh Tâm', '0977777777', 'Tịnh Biên, An Giang', 'tamht@gmail.com', 2147483647, '', ''),
(14, 'Ri Đỗ', '0988777777', 'Vĩnh Bảo, Hải Phòng', 'rodi@gmail.com', 821723453, '', ''),
(15, 'Hoàng Minh Lượng', '0988721726', 'Hà Nội', '1@gmail.com', 2147483647, '', ''),
(16, 'Bai Thu Nguyen', '977666162', 'Ha Noi', 'chinh199304@gmail.com', 434, '', ''),
(17, 'Van Chinh Pham', '966192810', 'Hoai Duc', 'chinhpv95@gmail.com', 21, '', ''),
(18, 'Nguyễn Văn Linh', '966192810', 'Hoai Duc', 'chinhpv95@gmail.com', 23, '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `food`
--
CREATE TABLE `food` (
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

CREATE TABLE `orderdetails` (
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
(1, 'C001', 5, 60000, ''),
(1, 'B001', 1, 150000, ''),
(1, 'S018', 2, 140000, ''),
(2, 'C007', 5, 60000, ''),
(3, 'B005', 1, 220000, ''),
(3, 'C005', 3, 100000, ''),
(3, 'S024', 2, 150000, ''),
(4, 'P005', 1, 550000, ''),
(4, 'F009', 1, 46000, ''),
(4, 'B007', 1, 690000, ''),
(4, 'S013', 2, 150000, ''),
(5, 'S001', 5, 40000, ''),
(6, 'S026', 5, 160000, ''),
(6, 'S025', 2, 220000, ''),
(6, 'S024', 2, 200000, ''),
(7, 'S004', 3, 60000, ''),
(7, 'S025', 4, 220000, ''),
(8, 'S004', 8, 60000, ''),
(8, 'S025', 4, 220000, ''),
(9, 'S025', 4, 220000, ''),
(9, 'P001', 4, 500000, ''),
(10, 'P001', 1, 500000, ''),
(10, 'S021', 1, 150000, ''),
(10, 'S019', 6, 10000, ''),
(10, 'F008', 1, 65000, ''),
(11, 'P001', 1, 500000, ''),
(11, 'S021', 1, 150000, ''),
(11, 'S019', 6, 10000, ''),
(11, 'F008', 1, 65000, ''),
(12, 'P001', 1, 500000, ''),
(12, 'S021', 1, 150000, ''),
(12, 'S019', 6, 10000, ''),
(12, 'F008', 1, 65000, ''),
(13, 'S022', 3, 1500000, ''),
(13, 'P001', 1, 500000, ''),
(14, 'P001', 1, 500000, ''),
(14, 'S001', 4, 40000, ''),
(14, 'S021', 1, 150000, ''),
(15, 'S013', 1, 150000, ''),
(15, 'S024', 1, 200000, ''),
(16, 'S026', 1, 160000, ''),
(17, 'S025', 1, 220000, ''),
(18, 'S021', 4, 150000, ''),
(19, 'S016', 1, 140000, ''),
(20, 'S026', 1, 160000, ''),
(21, 'C004', 12, 10000, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNumber` int(11) NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `comments` text NOT NULL,
  `customerNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNumber`, `createDate`, `updateDate`, `status`, `comments`, `customerNumber`) VALUES
(1, '2016-07-20 00:00:00', '2016-07-27 15:44:17', 'Shipped', '', 1),
(2, '2016-07-20 00:00:00', '2016-07-23 00:00:00', 'Shipped', '', 4),
(3, '2016-07-21 00:00:00', NULL, 'In Process', '', 3),
(4, '2016-07-21 00:00:00', NULL, 'Cancelled', '', 5),
(5, '2016-07-22 00:00:00', '2016-07-26 00:00:00', 'Shipped', '', 2),
(6, '2016-07-25 00:00:00', NULL, 'In Process', '', 6),
(7, '2016-07-25 00:00:00', NULL, 'Cancelled', '', 7),
(8, '2016-07-25 00:00:00', NULL, 'In Process', '', 8),
(9, '2016-07-25 00:00:00', NULL, 'In Process', '', 9),
(10, '2016-07-25 00:00:00', NULL, 'In Process', '', 10),
(11, '2016-07-25 00:00:00', NULL, 'In Process', '', 11),
(12, '2016-07-25 00:00:00', NULL, 'In Process', '', 12),
(13, '2016-07-26 00:00:00', NULL, 'Shipped', '', 13),
(14, '2016-07-26 00:00:00', NULL, 'Cancelled', '', 14),
(15, '2016-07-26 00:00:00', NULL, 'Shipped', '', 15),
(16, '2016-07-27 14:54:00', '2016-07-27 14:54:28', 'Shipped', '', 15),
(17, '2016-07-27 14:55:57', NULL, 'In Process', '', 11),
(18, '2016-07-27 15:16:15', '2016-07-27 15:43:28', 'Cancelled', '', 12),
(19, '2016-07-27 15:27:59', NULL, 'In Process', '', 12),
(20, '2016-07-27 15:30:08', NULL, 'In Process', '', 11),
(21, '2016-07-27 15:31:25', NULL, 'In Process', '', 11);

-- --------------------------------------------------------

--
-- Stand-in structure for view `painting`
--
CREATE TABLE `painting` (
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

CREATE TABLE `products` (
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
('S026', 'Silver bracelets ', 5, 'Ờ Campuchia, từ thế kỷ XI, đồ vật bằng bạc đã được sử dụng rộng rãi trong nhiều nghi lễ tôn giáo. Nó không quá đắt, nhưng có khả năng tạo ra những đồ vật tinh xảo qua bàn tay của những nghệ nhân Khmer', 44, 160000, 'S026.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rateID` int(11) NOT NULL,
  `rateValue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `ratedetails` (
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
CREATE TABLE `souvenir` (
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
-- Structure for view `book`
--
DROP TABLE IF EXISTS `book`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `book`  AS  select `products`.`productCode` AS `productCode`,`products`.`productName` AS `productName`,`products`.`categoryId` AS `categoryId`,`products`.`description` AS `description`,`products`.`quantity` AS `quantity`,`products`.`price` AS `price`,`products`.`image_link` AS `image_link` from `products` where (`products`.`categoryId` = 1) ;

-- --------------------------------------------------------

--
-- Structure for view `clothes`
--
DROP TABLE IF EXISTS `clothes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clothes`  AS  select `products`.`productCode` AS `productCode`,`products`.`productName` AS `productName`,`products`.`categoryId` AS `categoryId`,`products`.`description` AS `description`,`products`.`quantity` AS `quantity`,`products`.`price` AS `price`,`products`.`image_link` AS `image_link` from `products` where (`products`.`categoryId` = 2) ;

-- --------------------------------------------------------

--
-- Structure for view `food`
--
DROP TABLE IF EXISTS `food`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `food`  AS  select `products`.`productCode` AS `productCode`,`products`.`productName` AS `productName`,`products`.`categoryId` AS `categoryId`,`products`.`description` AS `description`,`products`.`quantity` AS `quantity`,`products`.`price` AS `price`,`products`.`image_link` AS `image_link` from `products` where (`products`.`categoryId` = 3) ;

-- --------------------------------------------------------

--
-- Structure for view `painting`
--
DROP TABLE IF EXISTS `painting`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `painting`  AS  select `products`.`productCode` AS `productCode`,`products`.`productName` AS `productName`,`products`.`categoryId` AS `categoryId`,`products`.`description` AS `description`,`products`.`quantity` AS `quantity`,`products`.`price` AS `price`,`products`.`image_link` AS `image_link` from `products` where (`products`.`categoryId` = 4) ;

-- --------------------------------------------------------

--
-- Structure for view `souvenir`
--
DROP TABLE IF EXISTS `souvenir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `souvenir`  AS  select `products`.`productCode` AS `productCode`,`products`.`productName` AS `productName`,`products`.`categoryId` AS `categoryId`,`products`.`description` AS `description`,`products`.`quantity` AS `quantity`,`products`.`price` AS `price`,`products`.`image_link` AS `image_link` from `products` where (`products`.`categoryId` = 5) ;

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
  ADD PRIMARY KEY (`orderNumber`),
  ADD KEY `customerNumber` (`customerNumber`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productCode`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rateID`);

--
-- Indexes for table `ratedetails`
--
ALTER TABLE `ratedetails`
  ADD KEY `rateID` (`rateID`),
  ADD KEY `productCode` (`productCode`),
  ADD KEY `customerNumber` (`customerNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  ADD CONSTRAINT `ratedetails_ibfk_2` FOREIGN KEY (`productCode`) REFERENCES `products` (`productCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ratedetails_ibfk_3` FOREIGN KEY (`customerNumber`) REFERENCES `customers` (`customerNumber`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
