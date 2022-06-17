-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 07:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `idAdmin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwords` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`idAdmin`, `username`, `passwords`) VALUES
(8, 'admin', 'Imanuel10'),
(12, 'admin2', 'Bakekok77');

-- --------------------------------------------------------

--
-- Table structure for table `olahraga`
--

CREATE TABLE `olahraga` (
  `idOlahraga` int(11) NOT NULL,
  `namaOlahraga` varchar(50) NOT NULL,
  `deskOlahraga` varchar(1000) NOT NULL,
  `urlGambarMain` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `olahraga`
--

INSERT INTO `olahraga` (`idOlahraga`, `namaOlahraga`, `deskOlahraga`, `urlGambarMain`) VALUES
(1, 'Yoga', '                <b>Yoga</b> berasal dari bahasa Sansakerta kuno yaitu <i>yuj</i> yang berarti union atau penyatuan diri. \r\n                Yoga memiliki tiga arti yang berbeda, yaitu: Penyerapan (<i>samadhi yujyate</i>), menghubungkan (<i>yunakti</i>), dan pengendalian (<i>yojyanti</i>). \r\n                Namun makna kunci yang biasa dipakai adalah meditasi (<i>dhyana</i>) dan penyatuan (<i>yukti</i>).\r\n                Yoga adalah sebuah penyatuan antara jiwa spiritual dengan jiwa universal atau pembatasan pikiran-pikiran yang selalu bergerak \r\n                atau suatu sistem yang sistematis dalam melakukan latihan rohani untuk mencapai ketenangan batin dan melakukan latihan fisik untuk \r\n                mencapai kesehatan jasmani dan rohani sehingga disebut dengan <i>Jiwan Mukti</i>.', 'https://image-cdn.medkomtek.com/eKVlq495CySFEXIicHtwwMT-jUs=/673x379/smart/klikdokter-media-buckets/medias/2321838/original/012443800_1606988898-Gerakan-Yoga-yang-Dapat-Jadi-Posisi-Seks-Favorit-Anda-shutterstock_1033264990.jpg'),
(2, 'Cardio', '                Olahraga kardio adalah olahraga yang gerakannya berulang-ulang secara teratur dalam jangka waktu tertentu. \r\n                Misalnya adalah lompat tali, jalan kaki, jogging, dan bersepeda.  \r\n                Biasanya, sebuah aktivitas fisik dikatakan sebagai kardio jika dilakukan minimal selama 10 menit.', 'https://www.quickanddirtytips.com/sites/default/files/styles/amp_metadata_content_image_min_696px_wide/public/images/12691/cardio-compressor.png?itok=rGzFWBu1'),
(3, 'HIIT', '                <b>HIIT</b> adalah kepanjangan dari <i>High Intensity Interval Training</i>, yaitu latihan kardio dengan intensitas tinggi. Walaupun dalam durasi yang cepat,<i>impact</i> yang di dapat lebih besar. Dalam HIIT peredaran darah ke jantung akan lebih cepat karena paru-paru memompa oksigen lebih banyak.', 'https://lmimirror3pvr.azureedge.net/static/media/17813/05e5e9e1-a27f-4440-bea7-6ea6ec7f8e93/five-reasons-to-try-hiit-960x540.jpg'),
(6, 'Jalan-jalan', 'Jalan-jalan merupakan salah satu olahraga yang mudah dan murah untuk dilakukan. Mudah karena kita tidak perlu menggunakan alat-alat tambahan.', 'https://cdn1-production-images-kly.akamaized.net/1XIoj0LnxfUArN0uER616n49lD4=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/2251857/original/045824300_1529139216-iStock-860246654.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `idAlat` int(11) NOT NULL,
  `namaAlat` varchar(50) NOT NULL,
  `deskAlat` varchar(1000) NOT NULL,
  `urlGambarAlat` varchar(250) DEFAULT NULL,
  `idOlahraga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`idAlat`, `namaAlat`, `deskAlat`, `urlGambarAlat`, `idOlahraga`) VALUES
(5, 'Matras Yoga', '                    Matras Yoga atau yoga mat adalah salah satu peralatan penting untuk olahraga yoga. \r\n                    Tak hanya berfungsi sebagai alas, penggunaan matras ini dapat memberikan kenyamanan saat melakukan olahraga ini. \r\n                    Selain itu, yoga mat juga dapat menahan tubuh dari benturan langsung dari lantai dan meminimalisir risiko dari tergelincir. \r\n                    Saat memilih matras yoga, perhatikan jenis olahraga yoga yang akan dilakukan dan densitas matras. \r\n                    Kamu bisa memilih natural yoga mat dimana matras ini terbuat dari 100% bahan karet. \r\n                    Matras jenis ini biasanya disebut sebagai eco friendly yoga mat karena tidak mencemari lingkungan dengan sifat 100% bio-degradable.', 'H67b327e450ec4aca9f7e921a54fe5eb0K.jpg', 1),
(6, 'Pakaian Olahraga Yoga', '                    Selain matras, pakaian olahraga yoga juga menjadi salah satu hal yang penting untuk diperhatikan saat akan olahraga yoga. \r\n                    Sebaiknya pilih pakaian olahraga yang tidak mengganggu saat sedang melakukan posisi yang sulit seperti bertumpu pada perut dan tidak mengganggu pernafasan. \r\n                    Pilih pakaian olahraga yoga yang pas dan jangan terlalu longgar. \r\n                    Memilih pakaian olahraga yoga yang benar juga akan memudahkan instruktur yoga untuk memperbaiki posisi atau postur tubuh kamu. \r\n                    Selalu hindari penggunaan celana kolor atau atasan dengan leher yang longgar karena akan mengganggu pernafasan saat olahraga yoga. \r\n                    Pakai celana dan kaos berbahan katun yang elastis agar nyaman saat melakukan olahraga yoga.', 'download (1).jpg', 1),
(7, 'Dumbbell', '                    Alat ini cocok untuk menambah beban ketika kita melakukan olahraga sejenis cardio dan HIIT.\r\n                    Selain untuk menambah beban, jenis peralatan ini bisa melatih kekuatan tangan dan lengan kita.\r\n                    Biasanya dumbbell ini tersedia dalam varian berat sekitar 2-10 kg, \r\n                    yang mana lebih baik disesuaikan dengan kemampuan dan jenis olahraga.', 'dumbbell.jpg', 2),
(8, 'Matras Yoga', 'Selain dapat digunakan untuk melakukan olahraga yoga, matras yoga dapat digunakan untuk cardio juga.\r\n                    Tak hanya berfungsi sebagai alas, penggunaan matras ini dapat memberikan kenyamanan saat melakukan olahraga ini. \r\n                    Selain itu, yoga mat juga dapat menahan tubuh dari benturan langsung dari lantai dan meminimalisir risiko dari tergelincir.\r\n                    Karena biasanya olahraga cardio memerlukan pergerakan yang aktif.', 'H67b327e450ec4aca9f7e921a54fe5eb0K.jpg', 2),
(9, 'Pakaian Olahraga', 'Pakaian olahraga atau activewear adalah jenis pakaian, termasuk alas kaki, dipakai untuk olahraga atau latihan fisik. Pakaian khusus olahraga yang dikenakan untuk olahraga dan latihan fisik, karena kepraktisannya, kenyamanan atau keselamatan. Maka dari itu sangat cocok untuk digunakan melakukan olahraga yang memerlukan gerakan aktif dan fleksibel seperti cardio dan HIIT. Pakaian khusus olahraga termasuk celana pendek, baju olahraga, T-shirt, kemeja tenis dan kaos polo.', 'https://fitinline.com/data/article/20200416/Pakaian-Olahraga-001.jpg', 2),
(10, 'Matras Yoga', 'Karena HIIT merupakan olahraga yang kurang lebih mirip dengan cardio, maka alat yang digunakan pun sama.\r\nSalah satunya yaitu matras yoga. Hal ini dikarenakan matras yoga dapat mengurangi resiko tangan dan kaki\r\ntergelincir pada saat kita berolahraga. Apalagi perlu diketahui HIIT merupakan singkatan dari\r\nHigh Intensity Interval Training, dimana artinya memerlukan pergerakan yang sangat aktif.', 'https://akcdn.detik.net.id/community/media/visual/2021/05/02/sumber-freepik-1.jpeg?w=620&q=90', 3),
(11, 'Pakaian Olahraga', 'Pakaian olahraga atau activewear adalah jenis pakaian, termasuk alas kaki, dipakai untuk olahraga atau latihan fisik. Pakaian khusus olahraga yang dikenakan untuk olahraga dan latihan fisik, karena kepraktisannya, kenyamanan atau keselamatan. Maka dari itu sangat cocok untuk digunakan melakukan olahraga yang memerlukan gerakan aktif dan fleksibel seperti cardio dan HIIT. Pakaian khusus olahraga termasuk celana pendek, baju olahraga, T-shirt, kemeja tenis dan kaos polo.', 'https://fitinline.com/data/article/20200416/Pakaian-Olahraga-001.jpg', 3),
(12, 'Dumbbell', '                    Alat ini cocok untuk menambah beban ketika kita melakukan olahraga sejenis cardio dan HIIT.\r\n                    Selain untuk menambah beban, jenis peralatan ini bisa melatih kekuatan tangan dan lengan kita.\r\n                    Biasanya dumbbell ini tersedia dalam varian berat sekitar 2-10 kg, \r\n                    yang mana lebih baik disesuaikan dengan kemampuan dan jenis olahraga.', 'https://cdn.webshopapp.com/shops/281654/files/289053714/rubber-dumbbells-set.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `idVideo` int(11) NOT NULL,
  `judulVideo` varchar(100) NOT NULL,
  `linkVideo` varchar(250) NOT NULL,
  `levels` enum('Beginner','Intermediate','Advanced') NOT NULL,
  `durasi` int(3) NOT NULL,
  `instruktur` varchar(50) NOT NULL,
  `peralatan` varchar(200) NOT NULL,
  `idOlahraga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`idVideo`, `judulVideo`, `linkVideo`, `levels`, `durasi`, `instruktur`, `peralatan`, `idOlahraga`) VALUES
(5, 'Yoga For Complete Beginners - 20 Minute Home Yoga Workout!', 'https://www.youtube.com/embed/v7AYKMP6rOE', 'Beginner', 23, 'Adriene', 'Matras, Pakaian Yoga', 1),
(6, '10 minute Morning Yoga for Beginners', 'https://www.youtube.com/embed/VaoV1PrYft4', 'Beginner', 10, 'Adriene', 'Matras, Pakaian Yoga', 1),
(7, 'Yuk Lakukan Gerakan Yoga Ini Setiap Pagi Untuk Menurunkan Berat Badan | Gerakan Yoga Untuk Pemula', 'https://www.youtube.com/embed/izcZaJQnKVs', 'Beginner', 39, 'Faisal Tirtha', 'Matras, Pakaian Yoga', 1),
(8, '30 min Full Body Yoga - Intermediate Vinyasa Yoga', 'https://www.youtube.com/embed/_LvGTQ3Aq-g', 'Intermediate', 31, 'Kassandra', 'Matras, Pakaian Yoga', 1),
(9, 'ADVANCED VINYASA FLOW | 30-MINUTE YOGA | CAT MEFFAN', 'https://www.youtube.com/embed/pn2dsWv9quE', 'Advanced', 33, 'Cat Meffan', 'Matras, Pakaian Yoga', 1),
(10, 'Low impact, beginner, fat burning, home cardio workout. ALL standing!', 'https://www.youtube.com/embed/PvEnWsPrL4w', 'Beginner', 29, 'Daniel Bartlett', 'Matras, Pakaian Olahraga, Dumbbell', 2),
(11, '15 MIN BEGINNER CARDIO Workout (At Home No Equipment)', 'https://www.youtube.com/embed/VWj8ZxCxrYk', 'Beginner', 17, 'Maddie Lymburner', 'Matras, Pakaian Olahraga', 2),
(12, 'CARDIO WORKOUT FOR BEGINNERS From Home In 10 Minutes | Lockdown Workout No Equipment | HealthifyMe', 'https://www.youtube.com/embed/dj03_VDetdw', 'Beginner', 10, 'Jeh', 'Matras, Pakaian Olahraga', 2),
(13, 'Yuk Latihan Menurunkan Berat Badan 30 Menit Dance Cardio Workout', 'https://www.youtube.com/embed/ue5Jw0zW-Tk', 'Beginner', 27, 'Anissa Munaf', 'Pakaian Olahraga', 2),
(14, '\r\nIntermediate Cardio workout', 'https://www.youtube.com/embed/wLYeRlyyncY', 'Intermediate', 32, 'Alexandra Bartlett', 'Pakaian Olahraga', 2),
(15, 'Advanced fat burning HIIT cardio workout - 30 mins.', 'https://www.youtube.com/embed/yplP5cLuyf4', 'Advanced', 33, 'Daniel Bartlett', 'Pakaian Olahraga', 2),
(16, '9-minute HIIT Workout For Beginners to Start Your Fitness Journey', 'https://www.youtube.com/embed/jWCm9piAwAU', 'Beginner', 10, 'Emily McLaughlin', 'Matras, Pakaian Olahraga', 3),
(17, 'Best 10 min Beginner Full Body HIIT for Fat Burn - NO JUMPING ~ Emi', 'https://www.youtube.com/embed/5bO_7km8L-0', 'Beginner', 11, 'Emi Wong', 'Pakaian Olahraga', 3),
(18, '15 min FAT BURNING HIIT (Beginner Friendly No Equipment)', 'https://www.youtube.com/embed/Q0hYLrEaGsY', 'Beginner', 19, 'Maddie Elymburner', 'Matras, Pakaian Olahraga', 3),
(19, '34-Minute Intermediate HIIT Workout', 'https://www.youtube.com/embed/Qzrozz9O00c', 'Intermediate', 34, 'Charlee Atkin', 'Dumbbell, Matras, Pakaian Olahraga', 3),
(20, '20 Minute Fat Burning HIIT Workout | INTERMEDIATE| Follow Along At Home or Gym | PureGym', 'https://www.youtube.com/embed/a-tDFD7U7V4', 'Intermediate', 21, 'Josh Pure', 'Matras, Pakaian Olahraga', 3),
(21, '10 Minute intermediate HIIT Workout (No Equipment)', 'https://www.youtube.com/embed/K1yajpA8T74', 'Intermediate', 11, 'Dave Dreas', 'Pakaian Olahraga', 3),
(22, '30 MIN KILLER HIIT WORKOUT - Full Body Advanced Home Workout - No Equipment, No Repeats', 'https://www.youtube.com/embed/e3-zpBc_hg8', 'Advanced', 35, 'Anna Nas', 'Matras, Pakaian Olahraga', 3),
(24, 'Jalan Serta Yesus', 'cari aja di Youtube bang', 'Advanced', 30, 'Yesus', 'Sepatu', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `olahraga`
--
ALTER TABLE `olahraga`
  ADD PRIMARY KEY (`idOlahraga`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`idAlat`),
  ADD KEY `idOlahraga` (`idOlahraga`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`idVideo`),
  ADD KEY `olahraga` (`idOlahraga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `olahraga`
--
ALTER TABLE `olahraga`
  MODIFY `idOlahraga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `idAlat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD CONSTRAINT `idOlahraga` FOREIGN KEY (`idOlahraga`) REFERENCES `olahraga` (`idOlahraga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `olahraga` FOREIGN KEY (`idOlahraga`) REFERENCES `olahraga` (`idOlahraga`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
