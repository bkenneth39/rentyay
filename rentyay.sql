-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 06:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentyay`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `jenis_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `jenis_category`) VALUES
(1, 'console'),
(2, 'PS5 Game'),
(3, 'PS4 Game'),
(4, 'XBox Game'),
(5, 'Nintendo Game'),
(6, 'PS5 Accessories'),
(7, 'PS4 Accessories'),
(8, 'XBox Accessories'),
(9, 'Nintendo Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id_order` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_products`, `nama`, `id_category`, `harga`, `description`, `gambar`, `stock`) VALUES
(1, 'PlayStation®5 Console', 1, 110000, 'Konsol PS5 ™ memberikan kemungkinan permainan baru yang tidak pernah Anda antisipasi. Rasakan pemuatan secepat kilat dengan SSD berkecepatan sangat tinggi, perendaman lebih dalam dengan dukungan untuk umpan balik haptic, pemicu adaptif, dan Audio 3D, dan generasi baru game PlayStation® yang luar bia', 'ps5.png', 3),
(2, 'PlayStation®4 1TB Console', 1, 100000, 'Sistem PlayStation®4 hard drive 1TB memungkinkan Anda memainkan game terhebat dari film indie ternama hingga hit AAA pemenang penghargaan, bersama dengan lebih banyak pilihan hiburan dari TV, musik, dan banyak lagi.\r\n', 'ps4.png', 5),
(3, 'Xbox Series X', 1, 100000, 'Memperkenalkan Xbox Series X, Xbox tercepat dan terkuat yang pernah ada. Mainkan ribuan judul dari empat generasi konsol — semua tampilan dan permainan game terbaik di Xbox Series X. Batasi 1 pembelian konsol per pelanggan.\r\n', 'xbox.png', 2),
(4, 'Nintendo Switch', 1, 50000, 'Nintendo Switch dirancang agar sesuai dengan hidup Anda, bertransformasi dari konsol rumah ke sistem portabel dalam sekejap.\r\n', 'nintendo.png', 5),
(5, 'PS5 Dual Sense Wireless Controller', 6, 25000, 'Temukan pengalaman gaming yang lebih dalam dan sangat imersif1 dengan pengontrol PS5 ™ baru yang inovatif, yang menampilkan umpan balik haptic dan efek pemicu dinamis2. Pengontrol nirkabel DualSense juga menyertakan mikrofon internal dan tombol buat, semuanya terintegrasi ke dalam desain ikonik yang', 'ps5wirelesscontroller.png', 20),
(6, 'PULSE 3D™ wireless headset', 6, 100000, 'Bermain dengan nyaman dengan headset nirkabel yang disesuaikan untuk Audio 3D di konsol PS52. Menampilkan pengisian daya USB Type-C® dan mikrofon peredam bising ganda, Anda dapat membuat obrolan pesta tetap mengalir dengan pengambilan suara yang sejernih kristal3.\r\n', 'pulse3dheadset.png', 5),
(7, 'PS5 HD Camera', 6, 75000, 'Tempatkan diri Anda di tengah permainan berbagi dengan kamera HD untuk PS5 ™.', 'ps5hdcamera.png', 10),
(8, 'PS4 DUALSHOCK Wireless Controllers', 7, 20000, 'Pengontrol Nirkabel DUALSHOCK®4 untuk PS4 ™ memberi Anda apa yang Anda inginkan dalam permainan Anda mulai dari kontrol presisi atas permainan Anda hingga berbagi momen permainan terbaik Anda dengan teman-teman Anda sambil memberikan pengisian ulang yang mudah sehingga Anda selalu siap.\r\n', 'ps4wirelesscontroller.png', 35),
(9, 'PlayStation® Move Motion Controller (2 pack)', 7, 50000, 'Gabungkan PlayStation®VR dengan PlayStation®Move Motion Controllers untuk pengalaman bermain game yang lebih imersif dan luar biasa. Dengan sensor gerak canggih dan desain ergonomis, Anda dapat menggunakan apa saja mulai dari pedang favorit hingga memasak spatula dengan mudah.\r\n', 'movemotion.png', 5),
(10, 'PlayStation®VR Marvel’s Iron Man VR Bundle', 7, 65000, 'Kenakan headset PlayStation VR untuk dijadikan sebagai Armored Avenger dalam petualangan Iron Man orisinal!\r\n', 'playstationvr.png', 5),
(11, 'Xbox Wireless Controller', 8, 25000, 'Rasakan desain Xbox Wireless Controller yang dimodernisasi, yang menampilkan permukaan pahatan dan geometri yang disempurnakan untuk meningkatkan kenyamanan selama bermain game. Tetap fokus dengan grip bertekstur dan D-pad hybrid.\r\n', 'xboxcontroller.png', 15),
(12, 'Bang & Olufsen Beoplay Portal', 8, 75000, 'Desain Beoplay Portal yang elegan berarti Anda dapat menggunakannya dalam situasi apa pun. Headphone ini dikemas dengan fungsi permainan akses cepat, konektivitas yang kokoh untuk permainan seluler, dan suara surround virtual Dolby Atmos untuk pengalaman bermain game yang imersif di Xbox dan platfor', 'bobeoplayportal.png', 10),
(13, 'Xbox Wireless Adapter for Windows 10', 8, 15000, 'Dengan Xbox Wireless Adapter baru dan lebih baik untuk Windows 10, Anda dapat memainkan game PC favorit Anda menggunakan Xbox Wireless Controller. Menampilkan desain 66% lebih kecil, dukungan suara stereo nirkabel, dan kemampuan untuk menghubungkan hingga delapan pengontrol sekaligus. *\r\n', 'xboxwirelessadapter.png', 5),
(14, 'Nintendo Switch Pro Controller', 9, 30000, 'Tingkatkan sesi permainan Anda dengan Pro Controller. Termasuk kontrol gerak, gemuruh HD, fungsionalitas amiibo built-in, dan banyak lagi.\r\n', 'switchprocontroller.png', 10),
(15, 'Joy‑Con™', 9, 50000, 'Tambahkan lebih banyak pemain ke game yang kompatibel dengan pengontrol Joy ‑ Con yang tepat.\r\n', 'joycon.png', 10),
(16, 'NBA 2K21', 2, 30000, 'NBA 2K21 adalah video game simulasi bola basket yang dikembangkan oleh Visual Concepts dan diterbitkan oleh 2K Sports, berdasarkan National Basketball Association. Ini adalah angsuran ke-22 dalam franchise NBA 2K dan penerus NBA 2K20.', 'nba2k21v3.png', 10),
(17, 'NBA 2K20', 3, 28000, 'NBA 2K20 adalah video game simulasi bola basket yang dikembangkan oleh Visual Concepts dan diterbitkan oleh 2K Sports, berdasarkan National Basketball Association. Ini adalah angsuran ke-21 dalam franchise NBA 2K, penerus NBA 2K19, dan pendahulu NBA 2K21.', 'nba2k20v2.png', 10),
(18, 'FIFA 21', 2, 40000, 'FIFA 21 adalah video game simulasi sepak bola yang diterbitkan oleh Electronic Arts sebagai bagian dari seri FIFA. Ini adalah angsuran ke-28 dalam seri FIFA, dan dirilis pada 9 Oktober 2020 untuk Microsoft Windows, Nintendo Switch, PlayStation 4 dan Xbox One.', 'fifa21.png', 8),
(19, 'FIFA 20', 3, 28000, 'FIFA 20 adalah video game simulasi sepak bola yang diterbitkan oleh Electronic Arts sebagai bagian dari seri FIFA. Ini adalah angsuran ke-27 dalam seri FIFA, dan dirilis pada 27 September 2019 untuk Microsoft Windows, PlayStation 4, Xbox One, dan Nintendo Switch. Penggantinya, FIFA 21, dirilis pada ', 'fifa20.png', 8),
(20, 'Call of Duty: Modern Warfare', 3, 30000, 'Call of Duty: Modern Warfare adalah video game FPS 2019 yang dikembangkan oleh Infinity Ward dan diterbitkan oleh Activision.', 'codmw.png', 15),
(21, 'Grand Theft Auto V', 3, 40000, 'Grand Theft Auto V adalah game aksi-petualangan 2013 yang dikembangkan oleh Rockstar North dan diterbitkan oleh Rockstar Games. Ini adalah entri utama pertama dalam seri Grand Theft Auto sejak Grand Theft Auto IV 2008.', 'gtaV.png', 10),
(22, 'Watch Dogs: Legion', 4, 45000, 'Watch Dogs: Legion adalah game aksi-petualangan 2020 yang dikembangkan oleh Ubisoft Toronto dan diterbitkan oleh Ubisoft. Ini adalah angsuran ketiga dalam seri Watch Dogs, dan sekuel Watch Dogs 2 tahun 2016.', 'watch-dog-legion.png', 12),
(23, 'Minecraft', 4, 25000, 'Minecraft adalah video game sandbox yang dikembangkan oleh Mojang. Game tersebut diciptakan oleh Markus \"Notch\" Persson dalam bahasa pemrograman Java.', 'minecraft.png', 20),
(24, 'Red Dead Redemption ', 3, 35000, 'Red Dead Redemption adalah game aksi-petualangan 2010 yang dikembangkan oleh Rockstar San Diego dan diterbitkan oleh Rockstar Games. Penerus spiritual dari Red Dead Revolver tahun 2004, ini adalah game kedua dalam seri Red Dead.', 'red-dead-redemption.png', 15),
(25, 'Animal Crossing: New Horizons', 5, 75000, 'Animal Crossing: New Horizons adalah game simulasi kehidupan tahun 2020 yang dikembangkan dan diterbitkan oleh Nintendo untuk Nintendo Switch. Ini adalah game utama kelima dalam seri Animal Crossing.', 'animal-crossing.png', 15),
(26, 'The Legend of Zelda: Breath of the Wild', 5, 55000, 'The Legend of Zelda: Breath of the Wild adalah game aksi-petualangan 2017 yang dikembangkan dan diterbitkan oleh Nintendo untuk konsol Nintendo Switch dan Wii U.', 'zelda.png', 15),
(27, 'Monster Hunter: World', 4, 33000, 'Monster Hunter: World adalah game berbasis role-play yang dikembangkan dan diterbitkan oleh Capcom dan angsuran arus utama kelima dalam seri Monster Hunter. Ini dirilis di seluruh dunia untuk PlayStation 4 dan Xbox One pada Januari 2018, dengan versi Microsoft Windows mengikuti pada Agustus 2018.', 'mhw.png', 20),
(28, 'Assassin Creed Valhalla - PS5', 2, 45000, 'Menjadi prajurit Viking legendaris yang diangkat dari kisah pertempuran dan kejayaan. Serang musuh Anda, kembangkan pemukiman Anda, dan bangun kekuatan politik Anda dalam upaya untuk mendapatkan tempat di antara para dewa di Valhalla. ', 'acvalhalla.png', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `id_products` (`id_products`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
