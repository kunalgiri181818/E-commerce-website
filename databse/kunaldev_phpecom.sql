-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2022 at 12:46 PM
-- Server version: 10.3.34-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kunaldev_phpecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `og_administrator`
--

CREATE TABLE `og_administrator` (
  `admin_id` int(3) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_original_password` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `contact_address` text NOT NULL,
  `contact_no1` varchar(100) NOT NULL,
  `contact_no2` varchar(100) NOT NULL,
  `whatsapp_no` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `delivery_charge` float(10,2) NOT NULL,
  `delivery_charge_limit` float(7,2) NOT NULL,
  `quick_delivery_charge` float(7,2) NOT NULL,
  `facebook_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `pinterest_link` text NOT NULL,
  `youtube_link` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_administrator`
--

INSERT INTO `og_administrator` (`admin_id`, `admin_username`, `admin_password`, `admin_original_password`, `company_name`, `contact_person`, `contact_address`, `contact_no1`, `contact_no2`, `whatsapp_no`, `contact_email`, `delivery_charge`, `delivery_charge_limit`, `quick_delivery_charge`, `facebook_link`, `twitter_link`, `instagram_link`, `pinterest_link`, `youtube_link`) VALUES
(1, 'admin', '084a0745c9e175b3bca2c47e05e17634', 'Password@987#', 'Prismhub', 'Kunal Giri', ' P-191/A, C.I.T Road, 106A, Hem Chandra Naskar Rd, of kali mandir Phoolbagan, Scheme IVM, Phool Bagan, Beleghata, Kolkata, West Bengal 700010', '+91 7894561230', '+91 98/74563210', '+91 9051717431', 'info@prismonline.co.in', 0.00, 200.00, 15.00, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', 'https://in.pinterest.com', 'https://www.youtube.com'),
(2, 'superadmin', 'd860e4607ab2ab2af302df6012efc335', 'Prism@987#', 'Prism', '', '', '', '', '', '', 0.00, 0.00, 0.00, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `og_banners`
--

CREATE TABLE `og_banners` (
  `banner_id` int(3) NOT NULL,
  `banner_image` varchar(100) NOT NULL,
  `banner_status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_banners`
--

INSERT INTO `og_banners` (`banner_id`, `banner_image`, `banner_status`) VALUES
(1, '1628495200.jpg', 'Active'),
(2, '1628495189.jpg', 'Active'),
(3, '1628495151.jpg', 'Active'),
(4, '1628495140.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `og_brands`
--

CREATE TABLE `og_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_image` varchar(100) NOT NULL,
  `brand_status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_brands`
--

INSERT INTO `og_brands` (`brand_id`, `brand_name`, `brand_image`, `brand_status`) VALUES
(1, 'Everest', 'everest.png', 'Active'),
(2, 'Ashirvaad', 'ashirvaad.jpg', 'Active'),
(3, 'Cookme', 'cookme.jpg', 'Active'),
(4, 'Fortune', 'fortune.jpg', 'Inactive'),
(5, 'Emami', 'emami.jpg', 'Active'),
(6, 'Ganesh', 'ganesh.jpg', 'Active'),
(7, 'Amul', 'amul.webp', 'Active'),
(8, 'Britania', 'britania.png', 'Active'),
(9, 'Dabur', 'dabur.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `og_category`
--

CREATE TABLE `og_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_photo` varchar(100) NOT NULL,
  `category_status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_category`
--

INSERT INTO `og_category` (`category_id`, `category_name`, `category_photo`, `category_status`) VALUES
(1, 'Fruits', 'fruits.jpg', 'Active'),
(2, 'Vegetables', 'veg.jpg', 'Active'),
(3, 'Grogery', 'grocery.jpg', 'Active'),
(4, 'Fish', 'fish.jpg', 'Active'),
(5, 'Meat', 'chicken.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `og_choose`
--

CREATE TABLE `og_choose` (
  `choose_id` int(11) NOT NULL,
  `line1` text NOT NULL,
  `line2` text NOT NULL,
  `line3` text NOT NULL,
  `line4` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_choose`
--

INSERT INTO `og_choose` (`choose_id`, `line1`, `line2`, `line3`, `line4`) VALUES
(1, 'Quality - Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.', 'Budget - Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.', 'Deliver - Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.', 'Support - Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.');

-- --------------------------------------------------------

--
-- Table structure for table `og_contents`
--

CREATE TABLE `og_contents` (
  `content_id` int(3) NOT NULL,
  `content_title` varchar(100) NOT NULL,
  `content_photo` varchar(100) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_contents`
--

INSERT INTO `og_contents` (`content_id`, `content_title`, `content_photo`, `content`) VALUES
(1, 'Prismhub E-Market Demo', '', 'The fruit Frutastic offers is immediately freeze-dried after harvesting, so up to 98% of the vitamins, minerals and other nutrients are saved. These crispy fruit pieces are the ideal healthy snack but can also be used for other applications such as ice cream, dessert, muesli, pastries or cocktails. They are also rich in fiber and are the equivalent of 4 to 10 times fresh fruit (depending on the moisture content of the fruit).'),
(8, 'Order Delivery', '', 'We have Time Slot option for Order Delivery..\r\nSlot 1) 7 AM To 10 AM.\r\nSlot 2) 11 AM To 2 PM.\r\nSlot 3) 4 PM To 7 PM.\r\nYou Can choose your slot for same day or for next day also as per your convenience.       '),
(2, 'Terms & Conditions', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec feugiat in fermentum posuere urna nec tincidunt. Cras fermentum odio eu feugiat. Et pharetra pharetra massa massa ultricies. Accumsan lacus vel facilisis volutpat est velit. Viverra ipsum nunc aliquet bibendum enim facilisis. Est ullamcorper eget nulla facilisi etiam. Lorem sed risus ultricies tristique nulla aliquet. Orci eu lobortis elementum nibh tellus molestie nunc. Dictumst vestibulum rhoncus est pellentesque elit. Lobortis elementum nibh tellus molestie nunc non blandit massa. Dolor morbi non arcu risus. Fermentum posuere urna nec tincidunt.\r\n\r\nLacus viverra vitae congue eu. Habitasse platea dictumst vestibulum rhoncus. Facilisi nullam vehicula ipsum a arcu cursus vitae. Leo integer malesuada nunc vel risus commodo viverra. Pulvinar mattis nunc sed blandit libero volutpat sed cras. Duis ultricies lacus sed turpis tincidunt id aliquet risus. Mauris pharetra et ultrices neque ornare aenean euismod elementum. Dolor sit amet consectetur adipiscing elit. Quis varius quam quisque id diam vel quam. Morbi tristique senectus et netus et malesuada fames ac. Amet massa vitae tortor condimentum lacinia. Turpis in eu mi bibendum neque egestas. Mi sit amet mauris commodo quis imperdiet massa tincidunt nunc. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Urna neque viverra justo nec ultrices dui sapien. Sed velit dignissim sodales ut. Nulla aliquet porttitor lacus luctus accumsan tortor posuere.\r\n\r\nDonec pretium vulputate sapien nec sagittis. Dolor purus non enim praesent elementum facilisis. Sit amet consectetur adipiscing elit ut aliquam purus sit. Sed euismod nisi porta lorem. Sed adipiscing diam donec adipiscing tristique. Ut lectus arcu bibendum at varius. Leo vel fringilla est ullamcorper eget nulla facilisi etiam. Eget nunc scelerisque viverra mauris in aliquam sem fringilla. Sapien pellentesque habitant morbi tristique. Libero enim sed faucibus turpis in. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu feugiat.\r\n\r\nAliquam sem et tortor consequat id porta nibh venenatis cras. Et molestie ac feugiat sed lectus vestibulum mattis. Tincidunt tortor aliquam nulla facilisi. Tristique nulla aliquet enim tortor. Amet dictum sit amet justo donec enim. Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Et egestas quis ipsum suspendisse ultrices. Ipsum dolor sit amet consectetur adipiscing elit ut aliquam. Pharetra massa massa ultricies mi. Dictum non consectetur a erat. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Aenean euismod elementum nisi quis eleifend quam adipiscing. Eu sem integer vitae justo eget magna fermentum. Aliquam id diam maecenas ultricies mi eget mauris pharetra et. Adipiscing elit duis tristique sollicitudin. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum.\r\n\r\nInteger quis auctor elit sed vulputate mi sit amet mauris. Cursus vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Iaculis at erat pellentesque adipiscing commodo elit at imperdiet. Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Elementum integer enim neque volutpat ac tincidunt vitae semper. Vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt ornare. Orci ac auctor augue mauris augue neque. In fermentum posuere urna nec. Pellentesque id nibh tortor id aliquet. Nulla aliquet porttitor lacus luctus. Enim ut tellus elementum sagittis vitae et. Elementum curabitur vitae nunc sed. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. In cursus turpis massa tincidunt. Purus faucibus ornare suspendisse sed nisi.'),
(3, 'Privacy Policy', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec feugiat in fermentum posuere urna nec tincidunt. Cras fermentum odio eu feugiat. Et pharetra pharetra massa massa ultricies. Accumsan lacus vel facilisis volutpat est velit. Viverra ipsum nunc aliquet bibendum enim facilisis. Est ullamcorper eget nulla facilisi etiam. Lorem sed risus ultricies tristique nulla aliquet. Orci eu lobortis elementum nibh tellus molestie nunc. Dictumst vestibulum rhoncus est pellentesque elit. Lobortis elementum nibh tellus molestie nunc non blandit massa. Dolor morbi non arcu risus. Fermentum posuere urna nec tincidunt.\r\n\r\nLacus viverra vitae congue eu. Habitasse platea dictumst vestibulum rhoncus. Facilisi nullam vehicula ipsum a arcu cursus vitae. Leo integer malesuada nunc vel risus commodo viverra. Pulvinar mattis nunc sed blandit libero volutpat sed cras. Duis ultricies lacus sed turpis tincidunt id aliquet risus. Mauris pharetra et ultrices neque ornare aenean euismod elementum. Dolor sit amet consectetur adipiscing elit. Quis varius quam quisque id diam vel quam. Morbi tristique senectus et netus et malesuada fames ac. Amet massa vitae tortor condimentum lacinia. Turpis in eu mi bibendum neque egestas. Mi sit amet mauris commodo quis imperdiet massa tincidunt nunc. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Urna neque viverra justo nec ultrices dui sapien. Sed velit dignissim sodales ut. Nulla aliquet porttitor lacus luctus accumsan tortor posuere.\r\n\r\nDonec pretium vulputate sapien nec sagittis. Dolor purus non enim praesent elementum facilisis. Sit amet consectetur adipiscing elit ut aliquam purus sit. Sed euismod nisi porta lorem. Sed adipiscing diam donec adipiscing tristique. Ut lectus arcu bibendum at varius. Leo vel fringilla est ullamcorper eget nulla facilisi etiam. Eget nunc scelerisque viverra mauris in aliquam sem fringilla. Sapien pellentesque habitant morbi tristique. Libero enim sed faucibus turpis in. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu feugiat.\r\n\r\nAliquam sem et tortor consequat id porta nibh venenatis cras. Et molestie ac feugiat sed lectus vestibulum mattis. Tincidunt tortor aliquam nulla facilisi. Tristique nulla aliquet enim tortor. Amet dictum sit amet justo donec enim. Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Et egestas quis ipsum suspendisse ultrices. Ipsum dolor sit amet consectetur adipiscing elit ut aliquam. Pharetra massa massa ultricies mi. Dictum non consectetur a erat. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Aenean euismod elementum nisi quis eleifend quam adipiscing. Eu sem integer vitae justo eget magna fermentum. Aliquam id diam maecenas ultricies mi eget mauris pharetra et. Adipiscing elit duis tristique sollicitudin. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum.\r\n\r\nInteger quis auctor elit sed vulputate mi sit amet mauris. Cursus vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Iaculis at erat pellentesque adipiscing commodo elit at imperdiet. Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Elementum integer enim neque volutpat ac tincidunt vitae semper. Vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt ornare. Orci ac auctor augue mauris augue neque. In fermentum posuere urna nec. Pellentesque id nibh tortor id aliquet. Nulla aliquet porttitor lacus luctus. Enim ut tellus elementum sagittis vitae et. Elementum curabitur vitae nunc sed. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. In cursus turpis massa tincidunt. Purus faucibus ornare suspendisse sed nisi.'),
(4, 'Shipping & Delivery', '', 'Cras scelerisque nunc in risus laoreet, non cursus diam bibendum. Fusce sed nisl velit. Ut eget ligula pulvinar, pretium felis in, mattis justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur molestie eu diam at feugiat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras nec purus pharetra, dictum ipsum a, porttitor felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras at lobortis tortor. Aenean lobortis tellus elit, quis blandit ex laoreet convallis. Cras sodales suscipit lectus finibus dictum. Quisque eu lectus posuere, tincidunt libero ac, consectetur ligula. Sed gravida lectus quis scelerisque scelerisque. Fusce odio ligula, euismod nec scelerisque aliquet, ultrices sed lacus. Nam ultricies ipsum eget risus placerat placerat. Ut vitae est arcu.\r\n\r\nIn molestie semper turpis, nec cursus lorem pellentesque vel. Morbi at ipsum velit. Suspendisse dignissim egestas leo, at consequat nulla porta eget. Nulla posuere eleifend ex, eu cursus lorem interdum vitae. Duis a tempor dolor. Nam eu sem egestas, hendrerit orci vehicula, lacinia ex. In iaculis ut mauris sed scelerisque. Suspendisse porta finibus neque, et elementum magna fringilla sit amet. In hac habitasse platea dictumst. Suspendisse sed mauris vitae urna elementum tempor accumsan at risus. Morbi ultricies nunc non ex vulputate maximus. Integer ac scelerisque dui, quis tincidunt sem. Proin at mollis nibh. Aliquam semper semper sem, et fermentum nulla vestibulum ornare. Maecenas eget sem a purus efficitur imperdiet. In et rutrum orci.\r\n\r\nVivamus non mi urna. Suspendisse mollis elementum arcu in ultricies. Fusce aliquam massa sed erat tincidunt fermentum. Donec vitae aliquet sapien. Pellentesque eu sollicitudin odio, vitae aliquet lorem. In hac habitasse platea dictumst. Vivamus non ante placerat, sagittis neque in, egestas nisi. Pellentesque pellentesque, est sed eleifend porttitor, ex augue sagittis nulla, et hendrerit diam est non nibh. Donec nisl nisl, mattis sed suscipit varius, auctor quis quam. In orci mauris, varius eu justo in, egestas commodo libero. Nunc sagittis, nisi non pharetra elementum, nulla risus aliquam velit, ac sagittis metus nunc quis velit. Proin sit amet imperdiet lorem.\r\n\r\nAliquam in dui placerat, scelerisque tortor at, dignissim velit. Vestibulum eu turpis ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel placerat lectus. Vestibulum tincidunt finibus neque, eget feugiat orci malesuada sit amet. Curabitur mauris risus, scelerisque a vulputate at, convallis nec nisi. Proin venenatis volutpat vehicula. Suspendisse vitae dolor non mi finibus varius non vel ante. Curabitur sapien turpis, luctus quis magna eu, facilisis volutpat quam. Pellentesque ultrices augue lacus, sed posuere tellus cursus id. Duis laoreet molestie viverra. Proin magna mauris, eleifend ut tempus sed, consequat non lorem. Maecenas porttitor feugiat erat, at aliquet nibh volutpat id.'),
(5, 'Return & Refund', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec feugiat in fermentum posuere urna nec tincidunt. Cras fermentum odio eu feugiat. Et pharetra pharetra massa massa ultricies. Accumsan lacus vel facilisis volutpat est velit. Viverra ipsum nunc aliquet bibendum enim facilisis. Est ullamcorper eget nulla facilisi etiam. Lorem sed risus ultricies tristique nulla aliquet. Orci eu lobortis elementum nibh tellus molestie nunc. Dictumst vestibulum rhoncus est pellentesque elit. Lobortis elementum nibh tellus molestie nunc non blandit massa. Dolor morbi non arcu risus. Fermentum posuere urna nec tincidunt.\r\n\r\nLacus viverra vitae congue eu. Habitasse platea dictumst vestibulum rhoncus. Facilisi nullam vehicula ipsum a arcu cursus vitae. Leo integer malesuada nunc vel risus commodo viverra. Pulvinar mattis nunc sed blandit libero volutpat sed cras. Duis ultricies lacus sed turpis tincidunt id aliquet risus. Mauris pharetra et ultrices neque ornare aenean euismod elementum. Dolor sit amet consectetur adipiscing elit. Quis varius quam quisque id diam vel quam. Morbi tristique senectus et netus et malesuada fames ac. Amet massa vitae tortor condimentum lacinia. Turpis in eu mi bibendum neque egestas. Mi sit amet mauris commodo quis imperdiet massa tincidunt nunc. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Urna neque viverra justo nec ultrices dui sapien. Sed velit dignissim sodales ut. Nulla aliquet porttitor lacus luctus accumsan tortor posuere.\r\n\r\nDonec pretium vulputate sapien nec sagittis. Dolor purus non enim praesent elementum facilisis. Sit amet consectetur adipiscing elit ut aliquam purus sit. Sed euismod nisi porta lorem. Sed adipiscing diam donec adipiscing tristique. Ut lectus arcu bibendum at varius. Leo vel fringilla est ullamcorper eget nulla facilisi etiam. Eget nunc scelerisque viverra mauris in aliquam sem fringilla. Sapien pellentesque habitant morbi tristique. Libero enim sed faucibus turpis in. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu feugiat.\r\n\r\nAliquam sem et tortor consequat id porta nibh venenatis cras. Et molestie ac feugiat sed lectus vestibulum mattis. Tincidunt tortor aliquam nulla facilisi. Tristique nulla aliquet enim tortor. Amet dictum sit amet justo donec enim. Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Et egestas quis ipsum suspendisse ultrices. Ipsum dolor sit amet consectetur adipiscing elit ut aliquam. Pharetra massa massa ultricies mi. Dictum non consectetur a erat. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Aenean euismod elementum nisi quis eleifend quam adipiscing. Eu sem integer vitae justo eget magna fermentum. Aliquam id diam maecenas ultricies mi eget mauris pharetra et. Adipiscing elit duis tristique sollicitudin. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum.\r\n\r\nInteger quis auctor elit sed vulputate mi sit amet mauris. Cursus vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Iaculis at erat pellentesque adipiscing commodo elit at imperdiet. Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Elementum integer enim neque volutpat ac tincidunt vitae semper. Vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt ornare. Orci ac auctor augue mauris augue neque. In fermentum posuere urna nec. Pellentesque id nibh tortor id aliquet. Nulla aliquet porttitor lacus luctus. Enim ut tellus elementum sagittis vitae et. Elementum curabitur vitae nunc sed. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. In cursus turpis massa tincidunt. Purus faucibus ornare suspendisse sed nisi.'),
(6, 'Refer & Earn', '1590667012.jpg', 'REFER AND EARN IS THE NEW POLICY WHICH HAS BEEN INTRODUCED BY SHOPPERS BASKET.\r\nTHIS POLICY  IS ONE OF THE INTERESTING ASPECT BY SHOPPERS BASKET.\r\nFIRST YOU HAVE TO BECOME THE ACTIVE MEMBER OF SHOPPERS BASKET BY PLACING YOUR ORDER.\r\nTHROUGH THE APP ON SHOPPERS BASKET. ONCE YOU BECOME THE ACTIVE MEMBER YOUR \r\nWALLET IS CREDITED WITH RS.100/- \r\nIF YOU REFER ANYONE THROUGH YOUR REFERENCE AND HE/SHE BECOMES AN ACTIVE MEMBER\r\nOF SHOPPERS BASKET, AND ON PLACING HIS/HER FIRST ORDER WITH SHOPPERS BASKET YOUR WALLET WILL BE CREDITED WITH RS. 100/- \r\nHAPPY SHOPPING.....\r\n'),
(7, 'Order Cancellation', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nec feugiat in fermentum posuere urna nec tincidunt. Cras fermentum odio eu feugiat. Et pharetra pharetra massa massa ultricies. Accumsan lacus vel facilisis volutpat est velit. Viverra ipsum nunc aliquet bibendum enim facilisis. Est ullamcorper eget nulla facilisi etiam. Lorem sed risus ultricies tristique nulla aliquet. Orci eu lobortis elementum nibh tellus molestie nunc. Dictumst vestibulum rhoncus est pellentesque elit. Lobortis elementum nibh tellus molestie nunc non blandit massa. Dolor morbi non arcu risus. Fermentum posuere urna nec tincidunt.\r\n\r\nLacus viverra vitae congue eu. Habitasse platea dictumst vestibulum rhoncus. Facilisi nullam vehicula ipsum a arcu cursus vitae. Leo integer malesuada nunc vel risus commodo viverra. Pulvinar mattis nunc sed blandit libero volutpat sed cras. Duis ultricies lacus sed turpis tincidunt id aliquet risus. Mauris pharetra et ultrices neque ornare aenean euismod elementum. Dolor sit amet consectetur adipiscing elit. Quis varius quam quisque id diam vel quam. Morbi tristique senectus et netus et malesuada fames ac. Amet massa vitae tortor condimentum lacinia. Turpis in eu mi bibendum neque egestas. Mi sit amet mauris commodo quis imperdiet massa tincidunt nunc. Diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Urna neque viverra justo nec ultrices dui sapien. Sed velit dignissim sodales ut. Nulla aliquet porttitor lacus luctus accumsan tortor posuere.\r\n\r\nDonec pretium vulputate sapien nec sagittis. Dolor purus non enim praesent elementum facilisis. Sit amet consectetur adipiscing elit ut aliquam purus sit. Sed euismod nisi porta lorem. Sed adipiscing diam donec adipiscing tristique. Ut lectus arcu bibendum at varius. Leo vel fringilla est ullamcorper eget nulla facilisi etiam. Eget nunc scelerisque viverra mauris in aliquam sem fringilla. Sapien pellentesque habitant morbi tristique. Libero enim sed faucibus turpis in. Tincidunt tortor aliquam nulla facilisi cras fermentum odio eu feugiat.\r\n\r\nAliquam sem et tortor consequat id porta nibh venenatis cras. Et molestie ac feugiat sed lectus vestibulum mattis. Tincidunt tortor aliquam nulla facilisi. Tristique nulla aliquet enim tortor. Amet dictum sit amet justo donec enim. Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Et egestas quis ipsum suspendisse ultrices. Ipsum dolor sit amet consectetur adipiscing elit ut aliquam. Pharetra massa massa ultricies mi. Dictum non consectetur a erat. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Aenean euismod elementum nisi quis eleifend quam adipiscing. Eu sem integer vitae justo eget magna fermentum. Aliquam id diam maecenas ultricies mi eget mauris pharetra et. Adipiscing elit duis tristique sollicitudin. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum.\r\n\r\nInteger quis auctor elit sed vulputate mi sit amet mauris. Cursus vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Iaculis at erat pellentesque adipiscing commodo elit at imperdiet. Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Elementum integer enim neque volutpat ac tincidunt vitae semper. Vestibulum rhoncus est pellentesque elit ullamcorper dignissim. Vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt ornare. Orci ac auctor augue mauris augue neque. In fermentum posuere urna nec. Pellentesque id nibh tortor id aliquet. Nulla aliquet porttitor lacus luctus. Enim ut tellus elementum sagittis vitae et. Elementum curabitur vitae nunc sed. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. In cursus turpis massa tincidunt. Purus faucibus ornare suspendisse sed nisi.'),
(9, ' Benefits Of ORGANIC ', 'bft.jpg', '1.Organic Food Is Healthy and more Nutrients.\r\n\r\n2. Organic Food Build Strong future Generation\r\n\r\n3. Organic Foods is More Affordable\r\n\r\n4. Organic foods offer Outstanding Flavor\r\n\r\n4. Organic foods offer Outstanding Flavor\r\n\r\n5.Keep Your children And Future Total Safe\r\n\r\n6.Avoid GMO\r\n\r\n7. Reduce Pollution And Protect Water And Soil\r\n\r\n\r\n                     ------------More details------------                               (7 Mejor Benefits of ORGANIC)\r\n\r\n1.Organic Food Is Healthy and more Nutrients.\r\n\r\nThe Soil Association notes that an organic diet increases the consumption of vitamins, minerals, antioxidants, and essential fatty acids. Health and safety should not be confused with nutrition. While most research  prove, organic food is more nutritious, it is much safer, which may translate to a healthier body, able to absorb healthy nutrients.\r\n\r\nNon-organic food often contains harmful hormones and pesticides. Pesticides are poisonous â€” by nature, they\'re designed to kill. Pesticides can cause neurological problems, cancer, infertility(Non pregnancy), nausea, vomiting, diarrhea, allergies and asthma, wheezing, rashes, and other skin problems, ADHD, birth defects and more. Basic logic would tell you not to eat poison, so why not go organic and avoid pesticides?\r\nFSSAI report , 2017 that Indiaâ€™s food often contains very low iron, vitamin A , C, E, D and carbohydrate , magnesium, etc. On average Organically grown foods provides 21.9% more iron (then conventional foods) ; 27% more vitamin C ; 29.7% more magnesium ; 13.5% more phosphorus And etc.\r\n\r\n\r\n2. Organic Food Build Strong future Generation\r\n\r\nIt\'s comforting to imagine unborn babies protected and safe in the womb, but research by the Environmental Working Group (EWG) shows that chemicals, pesticides in food and other pollutants cross the placenta.\r\nThese pesticides and other toxins can create health risks for babies. Many studies link pesticides to low birth weight, birth defects, neurological and behavioral problems, disrupted hormone function, autism, and cancer.\r\nPesticides and chemicals have also been linked to infertility problems in males and females. When parents-to-be choose organic food, their baby-to-be is exposed to fewer health risks.\r\n\r\n\r\n3. Organic Foods is More Affordable\r\n\r\nMany people complain that organic food is too expensive. Organic food can cost more than conventional foods. However, money talks. When people continually purchase organic food it shows consumer support for organics and then companies will try to meet that demand with better, more competitive prices.\r\nThe only way to show the government and businesses that people care about quality, affordable organics is to buy quality organics. Your organic purchases now make a difference in the long run. Luckily, for now, organics are becoming more affordable. Plus, there are plenty of ways to save money on organic food, for example, you can use organic coupons or buy more in-season produce.\r\n\r\n\r\n4. Organic foods offer Outstanding Flavor\r\n\r\nTaste is subjective, but you\'re more likely to get fresher flavor with organic. Organic foods don\'t contain artificial preservatives, so they sit on the shelf for less time, and consumers get a fresher, better tasting product.\r\nPrepared organic foods are really where taste difference come in. Organic foods don\'t contain chemical fake flavors, so the true taste of the food shines through. For example, try a taste test between organic and non-organic ketchup â€” the organic ketchup tastes like fresh tomatoes while the conventional tastes like it were seasoned with fake tomato flavoring.\r\n\r\n\r\n5.Keep Your children And Future Total Safe\r\n\r\nBy reducing toxic exposure, organic products can help us raise healthy, strong children. Through nurturing the soil and keeping toxic and persistent chemicals out of the environment, organic agriculture is one thing we can support to help us pass along a healthy and safe planet for future generations.\r\n\r\n\r\n6.Avoid GMO\r\n\r\nGenetically engineered (GE) food and genetically modified organisms (GMO) are contaminating our food supply at an alarming rate, with repercussions beyond understanding. GMO foods do not have to be labeled in America. Because organically grown food cannot be genetically modified in any way, choosing organic is the only way to be sure that foods that have been genetically engineered stay out of your diet. (Here\'s what you need to know about GMO foods.)\r\n\r\n\r\n7. Reduce Pollution And Protect Water And Soil\r\n\r\nWild animals, fish, and birds depend upon healthy plants, streams, rivers, and lakes in their habitat. When pesticides infiltrate animal habitats many creatures suffer.\r\nAgricultural chemicals, pesticides, and fertilizers are contaminating our environment, poisoning our precious water supplies, and destroying the value of fertile farmland. Certified organic standards do not permit the use of toxic chemicals in farming and require responsible management of healthy soil and biodiversity. \r\nAccording to Cornell entomologist David pimentel, it is estimated that only 0.1% of applied pesticides reach the target pests. The bulk of pesticides (99.%) is left to impact the environment.\r\n'),
(10, 'Why you choose Shoppers Basket', '1583060271.jpg', '1.    Convenience is the biggest perk. Where else can you comfortably shop at midnight while in your pajamas? There are no lines to wait in or cashiers to track down to help you with your purchases, and you can do your shopping in minutes. Online shops give us the opportunity to shop 24/7, and also reward us with a â€˜no pollutionâ€™ shopping experience. \r\n2.	Better prices. Cheap deals and better prices are available online, because products come to you direct from the manufacturer or seller without involving middlemen. Plus, it\'s easier to compare prices and find a better deal\r\n3.	More variety. The choices online are amazing. You can find almost any brand or item you\'re looking for. \r\n4.	Easy price comparisons. Comparing and researching products and their prices is so much easier online. If you\'re shopping for appliances, for example, you can find consumer reviews and product comparisons for all the options on the  market, with links to the best prices. \r\n5.	No crowds. If you are like me, you hate crowds when you\'re shopping. Especially during holidays, festivals, or on weekends, it can be such a huge headache. Also, being crushed in the crowds of shoppers sometimes makes us feel  rushed or hurried. You don\'t have to battle for a parking place. All of these problems can be avoided when you shop online.\r\n6.	No pressure. Oftentimes when we\'re out shopping, we end up buying things that we don\'t really need, all because shopkeepers pressure us or use their selling skills to compel us to make these purchases.');

-- --------------------------------------------------------

--
-- Table structure for table `og_delivery_slot`
--

CREATE TABLE `og_delivery_slot` (
  `slot_id` int(11) NOT NULL,
  `slot_name` varchar(100) NOT NULL,
  `slot_time` varchar(100) NOT NULL,
  `slot_status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_delivery_slot`
--

INSERT INTO `og_delivery_slot` (`slot_id`, `slot_name`, `slot_time`, `slot_status`) VALUES
(1, 'Morning Schedule', '7AM TO 11AM', 'Active'),
(2, 'Afternoon Schedule', '11AM TO 2PM', 'Inactive'),
(3, 'Evening Schedule', '6PM TO 9PM', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `og_enquiry`
--

CREATE TABLE `og_enquiry` (
  `enquiry_id` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_enquiry`
--

INSERT INTO `og_enquiry` (`enquiry_id`, `user_id`, `name`, `email`, `phone`, `comment`, `post_date`) VALUES
(1, 1, 'Saptarshi Ghosh', 'saptarshi.mailme@gmail.com', '9007272180', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '2020-07-25 23:22:24'),
(2, 2, 'Nandita Saha', 'nandita.saha4@gmail.com', '7278768664', 'Mi ipsum faucibus vitae aliquet nec ullamcorper sit. Elementum facilisis leo vel fringilla est ullamcorper. Eu nisl nunc mi ipsum faucibus vitae. Commodo viverra maecenas accumsan lacus vel facilisis.', '2020-07-26 09:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `og_final_cart`
--

CREATE TABLE `og_final_cart` (
  `cart_id` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `packet_id` int(11) NOT NULL,
  `unit_price` float(7,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` float(7,2) NOT NULL,
  `order_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_final_cart`
--

INSERT INTO `og_final_cart` (`cart_id`, `user_id`, `unique_id`, `product_id`, `packet_id`, `unit_price`, `quantity`, `subtotal`, `order_id`) VALUES
(21, 13, 'bcv3hjcun8ja509bsmoau3qui0', 51, 51, 300.00, 1, 300.00, 'MB527'),
(22, 13, 'bcv3hjcun8ja509bsmoau3qui0', 17, 28, 200.00, 1, 200.00, 'MB527');

-- --------------------------------------------------------

--
-- Table structure for table `og_inner_banners`
--

CREATE TABLE `og_inner_banners` (
  `banner_id` int(3) NOT NULL,
  `banner_image1` varchar(100) NOT NULL,
  `banner_image2` varchar(100) NOT NULL,
  `banner_image3` varchar(100) NOT NULL,
  `banner_image4` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_inner_banners`
--

INSERT INTO `og_inner_banners` (`banner_id`, `banner_image1`, `banner_image2`, `banner_image3`, `banner_image4`) VALUES
(1, 'k1.jpg', 'k2.jpg', 'k3.jpg', 'k4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `og_offers`
--

CREATE TABLE `og_offers` (
  `offer_id` int(11) NOT NULL,
  `offer_image` varchar(100) NOT NULL,
  `offer_status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_offers`
--

INSERT INTO `og_offers` (`offer_id`, `offer_image`, `offer_status`) VALUES
(2, 'off1.webp', 'Inactive'),
(3, 'off2.webp', 'Inactive'),
(4, 'off3.jpg', 'Inactive'),
(5, 'off4.jpg', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `og_orders`
--

CREATE TABLE `og_orders` (
  `order_id` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `order_no` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_price` float(7,2) NOT NULL,
  `delivery_charge` float(7,2) NOT NULL,
  `wallet_cost` float(7,2) NOT NULL,
  `grand_total` float(7,2) NOT NULL,
  `payment_type` enum('COD','Online') NOT NULL DEFAULT 'COD',
  `payment_status` enum('Pending','Paid') NOT NULL DEFAULT 'Pending',
  `delivery_status` enum('Pending','Delivered') NOT NULL DEFAULT 'Pending',
  `post_date` datetime NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` varchar(100) NOT NULL,
  `is_cancel` enum('No','Yes','Pending') NOT NULL DEFAULT 'No',
  `comment` longtext NOT NULL,
  `is_deleted` enum('No','Yes') NOT NULL DEFAULT 'No',
  `transaction_id` text NOT NULL,
  `transaction_completed` enum('No','Yes') NOT NULL DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_orders`
--

INSERT INTO `og_orders` (`order_id`, `user_id`, `unique_id`, `order_no`, `orderid`, `fname`, `lname`, `email`, `phone`, `address`, `city`, `state`, `zip`, `total_quantity`, `total_price`, `delivery_charge`, `wallet_cost`, `grand_total`, `payment_type`, `payment_status`, `delivery_status`, `post_date`, `pickup_date`, `pickup_time`, `is_cancel`, `comment`, `is_deleted`, `transaction_id`, `transaction_completed`) VALUES
(20, 13, 'bcv3hjcun8ja509bsmoau3qui0', 527, 'MB527', 'kunal', 'giri', 'girikunal97@gmail.com', '9051717431', 'P191/A, C.I.T Road, Scheme IVM\r\nPhoolbagan', 'Kolkata', 'India', '700010', 2, 500.00, 0.00, 0.00, 500.00, 'COD', 'Pending', 'Pending', '2021-08-12 12:25:53', '2021-08-12', '', 'No', '', 'No', '', 'Yes'),
(21, 11, '6gf1kar8f2iur1d3vrc0fi9nr5', 528, 'MB528', 'kunal', 'giri', 'kunal@prismonline.co.in', '09874563210', 'fgh\r\njfg', 'Kolkata', 'West Bengal', '700010', 1, 220.00, 0.00, 0.00, 220.00, 'Online', 'Pending', 'Pending', '2021-08-16 18:00:58', '2021-08-16', '', 'No', '', 'No', '', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `og_photos`
--

CREATE TABLE `og_photos` (
  `photo_id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `photo_status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_photos`
--

INSERT INTO `og_photos` (`photo_id`, `photo`, `photo_status`) VALUES
(1, 'delivery.jpg', 'Active'),
(2, 'refer.jpg', 'Active'),
(3, 'choose.jpg', 'Active'),
(4, 'benefit.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `og_products`
--

CREATE TABLE `og_products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_name_english` varchar(100) NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `product_photo2` varchar(100) NOT NULL,
  `product_photo3` varchar(100) NOT NULL,
  `product_photo4` varchar(100) NOT NULL,
  `product_details` longtext NOT NULL,
  `product_status` varchar(30) NOT NULL,
  `sale` int(11) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `stock_available` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_products`
--

INSERT INTO `og_products` (`product_id`, `category_id`, `subcategory_id`, `product_name_english`, `product_photo`, `product_photo2`, `product_photo3`, `product_photo4`, `product_details`, `product_status`, `sale`, `stock`, `stock_available`) VALUES
(1, 2, 0, 'Potato', 'potato.jpg', '', '', '', '', 'Active', 1, '', 'No'),
(2, 2, 0, 'Onion', 'onion.jpg', '', '', '', '', 'Active', 1, '', 'Yes'),
(3, 2, 0, 'Carrot', 'carrot.jpg', '', '', '', '', 'Active', 1, '', 'Yes'),
(4, 2, 0, 'Ladies Finger', 'lf.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(5, 1, 0, 'Banana', 'banana.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(6, 1, 0, 'Water Melon', 'wm.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(7, 1, 0, 'Pomegranate', 'pom.png', '', '', '', '', 'Active', 0, '', 'Yes'),
(8, 1, 0, 'Mosambi', 'mosambi.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(9, 1, 0, 'Apple - Red', 'appler.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(10, 1, 0, 'Apple - Green', 'appleg.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(11, 1, 0, 'Guava', 'guava.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(12, 2, 0, 'Cabbage', 'cabbage.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(13, 1, 0, 'Coconut - Large', 'coc2.png', '', '', '', '', 'Active', 0, '', 'Yes'),
(14, 1, 0, 'Coconut - Medium', 'coc1.png', '', '', '', '', 'Active', 0, '', 'Yes'),
(15, 1, 0, 'Papaya', 'papaya.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(16, 1, 0, 'Pineapple', 'pineapple.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(17, 5, 0, 'Chicken Curry Cut Without Skin', 'curry.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(18, 5, 0, 'Chicken Biryani Cut Without Skin', 'biryani.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(19, 5, 0, 'Chicken Breast Boneless', 'breast.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(20, 5, 0, 'Chicken Liver', 'liver.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(21, 5, 0, 'Chicken Keema', 'keema.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(22, 5, 0, 'Chicken Drumstick', 'drum.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(23, 4, 0, 'Pomfret - Small', 'p1.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(24, 4, 0, 'Pomfret - Big', 'p2.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(25, 4, 0, 'Pabda', 'pabda.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(26, 4, 0, 'Hilsa', 'hilsa.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(27, 4, 0, 'Katla Gota', 'k1.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(28, 4, 0, 'Katla Peti', 'k2.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(29, 4, 0, 'Katla Gada', 'k3.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(30, 4, 0, 'Ruhi Gota', 'r1.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(31, 4, 0, 'Ruhi Peti', 'r2.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(32, 4, 0, 'Ruhi Gada', 'r3.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(33, 2, 0, 'Pointed Gourd Local', 'potol.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(34, 2, 0, 'Spine Gourd/Kakrol', 'spine.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(35, 2, 0, 'Tomato', 'tomato.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(36, 2, 0, 'Turmeric', 'turmeric.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(37, 2, 0, 'Baby Potato', 'baby.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(38, 2, 0, 'Beetroot', 'beet.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(39, 2, 0, 'Elephant Foot ', 'ef.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(40, 2, 0, 'Kochu', 'kachu.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(41, 2, 0, 'Cucumber', 'cucumber.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(42, 2, 0, 'Beans', 'beans.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(43, 2, 0, 'Brinjal', 'brinjal.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(44, 2, 0, 'Bitter Gourd/Karela', 'bg.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(45, 2, 0, 'Mango - Raw', 'raw.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(46, 2, 0, 'Drumstick', 'dst.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(47, 2, 0, 'Bottle Gourd', 'gourd.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(48, 2, 0, 'Papaya - Raw', 'pr.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(49, 4, 0, 'Ruhi Mix', 'r4.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(50, 4, 0, 'Bhetki Fillet', 'bh.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(51, 4, 0, 'Red Basa Fillet', 'rb.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(52, 4, 0, 'Unpeeled', 'up.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(53, 4, 0, 'Tilapia', 'tilapia.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(54, 4, 0, 'Tangra', 'tangra.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(55, 4, 0, 'Boal', 'boal.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(56, 4, 0, 'Baby Bhetki', 'bbh.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(57, 3, 5, 'Puffed Rice (Deshi Muri)', 'pf.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(58, 3, 5, 'Batasa', 'batasa.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(59, 3, 4, 'Tata Salt', 'tatasalt.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(60, 3, 4, 'Morning Bazar Special Farm Sugar', 'mbsugar.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(61, 3, 3, 'Ganesh Whole Wheat Chakki Atta', '456.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(62, 3, 3, 'Ganesh Multigrain Atta', 'gma.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(63, 3, 3, 'Aashirvaad Shudh Chakki Atta', 'asc.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(64, 3, 3, 'Aashirvaad Multigrain Atta', 'ama.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(65, 3, 3, 'Ganesh Chana Basan', 'gcb.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(66, 3, 3, 'Fortune Basan', 'fb.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(67, 3, 3, 'Ganesh Sooji', 'gs.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(68, 3, 1, 'Sona Moong Dal', 'sona.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(69, 3, 1, 'Moong Dal', 'moog.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(70, 3, 1, 'Kacha Chola', 'kacha_chola.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(71, 3, 1, 'Masoor Dal', 'masoor.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(72, 3, 1, 'Rajma', 'rajma.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(73, 3, 1, 'Kabli Chana', 'kabli_chana.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(74, 3, 1, 'Matar Dal', 'matar.png', '', '', '', '', 'Active', 0, '', 'Yes'),
(75, 3, 1, 'Arhar Dal', 'arhar.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(76, 3, 1, 'Matar Gota - Yellow Matar', 'matar_gota.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(77, 3, 1, 'Tarka Dal', 'tarka.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(78, 3, 1, 'Biuli Dal', 'biuli.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(79, 3, 1, 'Raw Peanuts - China Badam', 'badam.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(80, 3, 1, 'Chana Dal', 'chana.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(81, 3, 2, 'Emami Healthy & Tasty Kachi Ghani Mustard Oil (Pouch)', 'emami.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(82, 3, 2, 'Emami Healthy & Tasty Kachi Ghani Mustard Oil (Jar)', 'emami2.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(83, 3, 2, 'Emami Healthy & Tasty Refined Sunflower Oil (Pouch)', 'emami3.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(84, 3, 2, 'Fortune Premium Kachi Ghani Pure Mustard Oil (Pouch)', 'fortune.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(85, 3, 2, 'Fortune Premium Kachi Ghani Pure Mustard Oil (Bottle)', 'fortune2.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(86, 3, 2, 'Fortune Premium Kachi Ghani Pure Mustard Oil (Jar)', 'fortune3.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(87, 3, 2, 'Fortune Sunlite Refined\r\nSunflower Oil (Pouch)', 'fortune4.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(88, 3, 2, 'Fortune Sunlite Refined\r\nSunflower Oil (Jar)', 'fortune5.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(89, 3, 2, 'Dhara Kachi Ghani Mustard Oil (Pouch)', 'dhara.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(90, 3, 2, 'Dhara Health Refined Sunflower Oil (Pouch)', 'dhara2.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(91, 3, 6, 'Everest Shai Biryani Masala', 'ev.png', '', '', '', '', 'Active', 0, '', 'Yes'),
(92, 3, 6, 'Aashirvaad Tumeric Powder', 'tp.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(93, 3, 6, 'Cookme Cumin Powder (Jeera)', 'cookme.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(94, 3, 6, 'Morning Bazar Special Charmagaz', 'char.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(95, 3, 6, 'Morning Bazar Special Cinnamom Stick (Darchini)', 'dar.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(96, 3, 6, 'Morning Bazar Special Rose Water', 'rose.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(97, 3, 6, 'Morning Bazar Special Cumin', 'cum.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(98, 3, 6, 'Morning Bazar Special Black Pipper Kali Mirch', 'kali.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(99, 3, 6, 'Morning Bazar Special Dry Red Chilli', 'dry.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(100, 3, 6, 'Morning Bazar Special Kalo Jeera (Black Cumin)', 'kalo.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(101, 3, 6, 'Morning Bazar Special Kewra Water', 'kewra.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(102, 3, 6, 'Morning Bazar Special Khabar Soda', 'soda.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(103, 3, 6, 'Morning Bazar Special Labango (Dry Cloves)', 'labongo.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(104, 3, 6, 'Morning Bazar Special Dhania Seeds', 'dhania.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(105, 3, 6, 'Morning Bazar Special Mustard Black Seeds', 'mus.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(106, 3, 6, 'Morning Bazar Special Cardamom/Elachi', 'elachi.jpg', '', '', '', '', 'Active', 0, '', 'Yes'),
(107, 4, 0, 'Prawn', 'prawn.jpg', '', '', '', 'Fresh and antibiotick prawn', 'Active', 0, '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `og_product_packets`
--

CREATE TABLE `og_product_packets` (
  `packet_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `packet_size` varchar(100) NOT NULL,
  `price` float(7,2) NOT NULL,
  `discount` int(3) NOT NULL,
  `original_price` float(7,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_product_packets`
--

INSERT INTO `og_product_packets` (`packet_id`, `product_id`, `packet_size`, `price`, `discount`, `original_price`) VALUES
(1, 1, '1 Kg', 17.00, 0, 17.00),
(2, 2, '1 Kg', 50.00, 17, 60.00),
(3, 3, '1 Kg', 60.00, 0, 60.00),
(4, 4, '1 Kg', 36.00, 0, 36.00),
(5, 12, '1 Pc (500 gm to 800 gm)', 45.00, 0, 45.00),
(6, 5, '12 Pc', 60.00, 0, 60.00),
(7, 6, '1 Pc', 70.00, 0, 70.00),
(8, 7, '1 Kg', 180.00, 0, 180.00),
(9, 8, '5 Pc', 60.00, 0, 60.00),
(10, 9, '1 Kg', 250.00, 0, 250.00),
(11, 10, '1 Pc', 449.00, 0, 50.00),
(12, 11, '1 Kg', 70.00, 0, 70.00),
(13, 13, '1 Pc', 40.00, 0, 40.00),
(14, 14, '1 Pc', 35.00, 0, 35.00),
(15, 15, '1 Pc', 50.00, 0, 50.00),
(16, 16, '1 Pc', 50.00, 0, 50.00),
(17, 33, '1 Kg', 50.00, 0, 50.00),
(18, 34, '1 Kg', 40.00, 0, 40.00),
(19, 35, '1 Kg', 60.00, 0, 60.00),
(20, 36, '1 Kg', 200.00, 0, 200.00),
(21, 37, '1 Kg', 40.00, 0, 40.00),
(22, 38, '1 Kg', 40.00, 0, 40.00),
(23, 39, '1 Kg', 50.00, 0, 50.00),
(24, 40, '1 Kg', 50.00, 0, 50.00),
(25, 41, '1 Kg', 50.00, 0, 50.00),
(26, 42, '1 Kg', 120.00, 0, 120.00),
(27, 43, '1 Kg', 50.00, 0, 50.00),
(28, 17, '1 Kg', 200.00, 0, 200.00),
(29, 18, '1 Kg', 220.00, 0, 220.00),
(30, 19, '1 Kg', 250.00, 0, 250.00),
(31, 20, '1 Kg', 150.00, 0, 150.00),
(32, 21, '1 Kg', 230.00, 0, 230.00),
(33, 22, '1 Kg', 250.00, 0, 250.00),
(34, 23, '1 Kg', 400.00, 0, 400.00),
(35, 24, '1 Kg', 500.00, 0, 500.00),
(36, 25, '1 Kg', 450.00, 0, 450.00),
(37, 26, '1 Kg', 1100.00, 0, 1100.00),
(38, 27, '1 Kg', 250.00, 0, 250.00),
(39, 28, '1 Kg', 400.00, 0, 400.00),
(40, 29, '1 Kg', 350.00, 0, 350.00),
(41, 30, '1 Kg', 220.00, 0, 220.00),
(42, 31, '1 Kg', 280.00, 0, 280.00),
(43, 32, '1 Kg', 300.00, 0, 300.00),
(44, 44, '1 Kg', 50.00, 0, 50.00),
(45, 45, '1 Kg', 80.00, 0, 80.00),
(46, 46, '1 Kg', 120.00, 0, 120.00),
(47, 47, '1 Pc', 45.00, 0, 45.00),
(48, 48, '1 Kg', 30.00, 0, 30.00),
(49, 49, '1 Kg', 300.00, 0, 300.00),
(50, 50, '1 Kg', 900.00, 0, 900.00),
(51, 51, '1 Kg', 300.00, 0, 300.00),
(52, 52, '1 Kg', 350.00, 0, 350.00),
(53, 53, '1 Kg', 180.00, 0, 180.00),
(54, 54, '1 Kg', 450.00, 0, 450.00),
(55, 55, '1 Kg', 250.00, 0, 250.00),
(56, 56, '1 Kg', 700.00, 0, 700.00),
(57, 57, '500 gm', 30.00, 0, 30.00),
(58, 58, '500 gm', 25.00, 0, 25.00),
(59, 59, '1 Kg', 20.00, 0, 20.00),
(60, 60, '1 Kg', 50.00, 0, 50.00),
(61, 61, '5 Kg', 175.00, 0, 175.00),
(62, 62, '5 Kg', 191.00, 0, 191.00),
(63, 63, '5 Kg', 190.00, 0, 190.00),
(64, 64, '5 Kg', 275.00, 0, 275.00),
(65, 65, '1 Kg', 105.00, 0, 105.00),
(66, 66, '500 gm', 54.00, 0, 54.00),
(67, 67, '500 gm', 25.00, 0, 25.00),
(68, 68, '1 Kg', 150.00, 0, 150.00),
(69, 69, '1 Kg', 120.00, 0, 120.00),
(70, 70, '1 Kg', 85.00, 0, 85.00),
(71, 80, '1 kg', 100.00, 0, 100.00),
(72, 71, '1 Kg', 90.00, 0, 90.00),
(73, 72, '1 Kg', 150.00, 0, 150.00),
(74, 73, '1 Kg', 80.00, 0, 80.00),
(75, 81, '1 Ltr', 125.00, 0, 125.00),
(76, 82, '5 Ltr', 660.00, 0, 660.00),
(77, 83, '1 Ltr', 120.00, 0, 120.00),
(78, 84, '1 Ltr', 130.00, 0, 130.00),
(79, 85, '1 Ltr', 135.00, 0, 135.00),
(80, 86, '5 Ltr', 665.00, 0, 665.00),
(81, 87, '1 Ltr', 115.00, 0, 115.00),
(82, 88, '5 Ltr', 660.00, 0, 660.00),
(83, 89, '1 Ltr', 128.00, 0, 128.00),
(84, 90, '1 Ltr', 123.00, 0, 123.00),
(85, 78, '1 Kg', 120.00, 0, 120.00),
(86, 79, '1 Kg', 130.00, 0, 130.00),
(87, 74, '1 Kg', 100.00, 0, 100.00),
(88, 75, '1 Kg', 120.00, 0, 120.00),
(89, 76, '1 Kg', 100.00, 0, 100.00),
(90, 77, '1 Kg', 130.00, 0, 130.00),
(91, 91, '25 gm', 36.00, 0, 36.00),
(92, 92, '50 gm', 12.00, 0, 12.00),
(93, 93, '50 gm', 27.00, 0, 27.00),
(94, 94, '100 gm', 20.00, 0, 20.00),
(95, 95, '100 gm', 45.00, 0, 45.00),
(96, 96, '300 ml', 30.00, 0, 30.00),
(97, 97, '100 gm', 25.00, 0, 25.00),
(98, 98, '100 gm', 65.00, 0, 65.00),
(99, 99, '250 gm', 75.00, 0, 75.00),
(100, 100, '100 gm', 25.00, 0, 25.00),
(101, 101, '300 ml', 30.00, 0, 30.00),
(102, 102, '1 Kg', 50.00, 0, 50.00),
(103, 103, '25 gm', 20.00, 0, 20.00),
(104, 104, '25 gm', 20.00, 0, 20.00),
(105, 105, '25 gm', 20.00, 0, 20.00),
(107, 2, '500 gm', 25.00, 17, 30.00);

-- --------------------------------------------------------

--
-- Table structure for table `og_subcategory`
--

CREATE TABLE `og_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `subcategory_photo` varchar(100) NOT NULL,
  `subcategory_status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_subcategory`
--

INSERT INTO `og_subcategory` (`subcategory_id`, `category_id`, `subcategory_name`, `subcategory_photo`, `subcategory_status`) VALUES
(1, 3, 'Dal & Puls', 'dal.jpg', 'Active'),
(2, 3, 'Edible Oils', 'oil.jpg', 'Active'),
(3, 3, 'Atta & Other Flours', 'atta.jpg', 'Active'),
(4, 3, 'Salt, Sugar & Jaggery', 'salt.jpg', 'Active'),
(5, 3, 'Puffed Rice & Batasa', 'bat.jpg', 'Active'),
(6, 3, 'Spice', 'spice.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `og_suggestions`
--

CREATE TABLE `og_suggestions` (
  `suggestion_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `comment` longtext NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_suggestions`
--

INSERT INTO `og_suggestions` (`suggestion_id`, `user_id`, `order_id`, `comment`, `post_date`) VALUES
(1, 1, 'MB509', 'Excellent delivery service.\r\nI like it.', '2020-07-27 09:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `og_temp_cart`
--

CREATE TABLE `og_temp_cart` (
  `cart_id` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `packet_id` int(11) NOT NULL,
  `unit_price` float(7,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` float(7,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_temp_cart`
--

INSERT INTO `og_temp_cart` (`cart_id`, `user_id`, `unique_id`, `product_id`, `packet_id`, `unit_price`, `quantity`, `subtotal`) VALUES
(6, 0, '1596560454238155', 1, 1, 27.00, 1, 27.00),
(7, 0, '1596560454238155', 1, 2, 18.00, 1, 18.00),
(8, 0, '1596560454238155', 3, 3, 22.00, 1, 22.00),
(12, 0, '1595923395973405', 5, 6, 60.00, 1, 60.00),
(14, 0, '1595923395973405', 12, 5, 45.00, 1, 45.00),
(22, 0, '1601049559202152', 1, 1, 30.00, 1, 30.00),
(21, 0, '1601049559202152', 2, 2, 20.00, 0, 0.00),
(26, 0, '1601095498088165', 2, 2, 20.00, 1, 20.00),
(44, 0, '160114246464237', 60, 60, 50.00, 1, 50.00),
(28, 0, '1601141533655225', 2, 2, 20.00, 13, 260.00),
(42, 0, '1601169669562398', 3, 3, 60.00, 1, 60.00),
(59, 0, '1608709795924435', 1, 1, 30.00, 2, 60.00),
(52, 0, '1604501048587316', 54, 54, 450.00, 1, 450.00),
(46, 0, '1603517659463207', 53, 53, 180.00, 1, 180.00),
(41, 0, '1601660635926260', 1, 1, 30.00, 1, 30.00),
(53, 0, '1603546468250382', 49, 49, 300.00, 1, 300.00),
(69, 0, '1613241276162285', 4, 4, 36.00, 1, 36.00),
(67, 0, '1601131182906356', 92, 92, 12.00, 1, 12.00),
(66, 0, '1601131182906356', 3, 3, 60.00, 1, 60.00),
(65, 0, '1601131182906356', 1, 1, 30.00, 1, 30.00),
(70, 0, '1613241276162285', 6, 7, 70.00, 1, 70.00),
(71, 0, '1613241276162285', 16, 16, 50.00, 1, 50.00),
(77, 0, '1617086075541223', 1, 1, 30.00, 2, 60.00),
(75, 0, '1617109982802332', 1, 1, 30.00, 1, 30.00),
(78, 0, '1617086075541223', 3, 3, 60.00, 2, 120.00),
(82, 0, '1618078889416159', 23, 34, 400.00, 1, 400.00),
(83, 0, '1618080282737499', 1, 1, 30.00, 1, 30.00),
(86, 0, '1617087535992495', 5, 6, 60.00, 2, 120.00),
(88, 0, '1618494708352431', 1, 1, 30.00, 1, 30.00),
(89, 0, '6toe10dps7hi9lpm12m2dg5d96', 20, 0, 0.00, 1, 0.00),
(90, 0, '1618497761737361', 1, 1, 30.00, 1, 30.00),
(96, 0, 'gc3m30rct8qbkhn463mrbs6ds0', 17, 0, 0.00, 1, 0.00),
(97, 0, 'gc3m30rct8qbkhn463mrbs6ds0', 18, 29, 220.00, 1, 220.00),
(114, 0, '162056336261076', 17, 28, 200.00, 1, 200.00),
(115, 0, '162056336261076', 4, 4, 36.00, 1, 36.00),
(116, 0, '1620731931721478', 5, 6, 60.00, 3, 180.00),
(117, 0, '1620731931721478', 7, 8, 180.00, 1, 180.00),
(118, 0, '1620731931721478', 9, 10, 250.00, 1, 250.00),
(119, 0, '1620731931721478', 13, 13, 40.00, 1, 40.00),
(120, 0, '1620731931721478', 19, 30, 250.00, 1, 250.00),
(121, 0, '162131623213072', 8, 9, 60.00, 1, 60.00),
(122, 0, '162131623213072', 5, 6, 60.00, 1, 60.00),
(124, 0, '1622117019370151', 2, 2, 50.00, 1, 50.00),
(125, 0, '162131623213072', 17, 28, 200.00, 1, 200.00),
(126, 0, '1622117019370151', 12, 5, 45.00, 1, 45.00),
(127, 0, '6810nuaqqpe6a9p4rsa6qcm192', 5, 0, 0.00, 1, 0.00),
(128, 0, '6810nuaqqpe6a9p4rsa6qcm192', 5, 6, 60.00, 1, 60.00),
(129, 0, '162304595394198', 6, 7, 70.00, 1, 70.00),
(130, 11, 'c43tch2dhs4cktbr7kgq6ejn02', 19, 30, 250.00, 1, 250.00),
(131, 0, 'c43tch2dhs4cktbr7kgq6ejn02', 32, 43, 300.00, 1, 300.00),
(132, 12, 'od1ed0om9nmmib3slgjavbobk6', 1, 0, 0.00, 1, 0.00),
(135, 12, 'od1ed0om9nmmib3slgjavbobk6', 2, 107, 25.00, 1, 25.00),
(138, 0, 'mp7rv7vcpuh4gnsu9t0u89rvt6', 34, 18, 40.00, 1, 40.00),
(139, 11, '6gf1kar8f2iur1d3vrc0fi9nr5', 18, 29, 220.00, 1, 220.00);

-- --------------------------------------------------------

--
-- Table structure for table `og_testimonials`
--

CREATE TABLE `og_testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `testimonial_status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_testimonials`
--

INSERT INTO `og_testimonials` (`testimonial_id`, `name`, `photo`, `phone`, `comment`, `testimonial_status`) VALUES
(1, 'Deeparna Chowdhury', 'dip.jpg', '7980875345', 'Very good application. I personally recommend everyone to use this application. It delivers product on right time and many offers are there. All products are very reasonable price.', 'Active'),
(2, 'Nandita Saha', 'nan.png', '7278768664', 'This Application is excellent. The products are very clean and fresh. So I would like to recommend everyone to install this application and shopping from Morning Bazar.', 'Active'),
(3, 'Saptarshi Ghosh', 'sap.jpg', '9007272180', 'What a great application for food and grocery online. Enjoyed a lot. Keep the good work going on.', 'Active'),
(4, 'Anirban Das', 'ani.jpg', '9433658762', 'Wonderful application for online grocery shopping. This is really good and useful. It will help you a lot. Very helpful application for me.', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `og_users`
--

CREATE TABLE `og_users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `original_password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `is_active` enum('No','Yes') NOT NULL DEFAULT 'No',
  `otp` varchar(10) NOT NULL,
  `otp_send_time` datetime NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_users`
--

INSERT INTO `og_users` (`user_id`, `fname`, `lname`, `email`, `phone`, `password`, `original_password`, `address`, `city`, `state`, `zip`, `is_active`, `otp`, `otp_send_time`, `registration_date`) VALUES
(13, 'kunal', 'giri', 'girikunal97@gmail.com', '9051717431', 'dcb8b3bc0bfe805109a10921f4b6b410', 'kunal@123#', '', '', '', '', 'Yes', '', '0000-00-00 00:00:00', '2021-08-12 12:24:58'),
(6, 'saheb', 'mukherjee', 'sarkaranurup29@gmail.com', '8981166070', 'e10adc3949ba59abbe56e057f20f883e', '123456', '', '', '', '', 'No', '5846', '0000-00-00 00:00:00', '2021-04-17 15:07:37'),
(8, 'Bikram', 'Sanyal', 'bikramsanyal17@gmail.com', '9038479098', '2419c459e9ad2d94f4a5c887b3ca18cb', 'manutd', '10/1, Arabinda Nagar, Dhalipara,', 'Kolkata', 'West Bengal', '700104', 'No', '6105', '0000-00-00 00:00:00', '2021-05-11 17:30:47'),
(9, 'Deep', 'Chakraborty', 'cdeep77_hyd@dataone.in', '9885454568', '6cf8710bad3b8b80ebfb1f6f60d3d1fc', 'Zippo@1978$', 'GC 230 Flat 5 3rd Floor', 'Kolkata', 'West Bengal', '700106', 'No', '4979', '0000-00-00 00:00:00', '2021-05-19 20:25:07'),
(10, 'bivash', 'mondal', 'rick7890838936@gmail.com', '8777358329', '3c893317732dfe120072334b89c8f060', 'r12345678', 'cg -199,salt lake', 'Kolkata', 'west bengal', '700091', 'No', '1583', '0000-00-00 00:00:00', '2021-05-20 18:28:22'),
(11, 'kunal', 'giri', 'kunal@prismonline.co.in', '09874563210', 'dcb8b3bc0bfe805109a10921f4b6b410', 'kunal@123#', '', '', '', '', 'Yes', '', '0000-00-00 00:00:00', '2021-08-06 12:15:27'),
(12, 'kunal', 'femo', 'joydeep@prismonline.co.in', '9051717432', 'dcb8b3bc0bfe805109a10921f4b6b410', 'kunal@123#', '', '', '', '', 'Yes', '', '0000-00-00 00:00:00', '2021-08-09 12:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `og_user_balance`
--

CREATE TABLE `og_user_balance` (
  `balance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `earn` float(7,2) NOT NULL,
  `expense` float(7,2) NOT NULL,
  `type` varchar(100) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_user_balance`
--

INSERT INTO `og_user_balance` (`balance_id`, `user_id`, `earn`, `expense`, `type`, `text`) VALUES
(4, 9, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(5, 10, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(6, 14, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(25, 25, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(8, 21, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(9, 22, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(12, 14, 0.00, 20.00, 'Expense', 'Deduct From Wallet Order #SB510'),
(13, 14, 5.00, 0.00, 'Earn', 'Cashback From Order #SB509'),
(14, 10, 0.00, 20.00, 'Expense', 'Deduct From Wallet Order #SB511'),
(15, 10, 5.00, 0.00, 'Earn', 'Cashback From Order #SB511'),
(16, 23, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(24, 24, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(27, 26, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(31, 27, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(32, 28, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(33, 29, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(34, 30, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(78, 43, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(37, 25, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB511'),
(38, 32, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(39, 33, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(40, 25, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB511'),
(41, 25, 7.00, 0.00, 'Earn', 'Cashback From Order #SB511'),
(42, 22, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB511'),
(43, 25, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB512'),
(44, 25, 26.00, 0.00, 'Earn', 'Cashback From Order #SB512'),
(45, 22, 26.00, 0.00, 'Earn', 'Cashback From Order #SB511'),
(48, 25, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB513'),
(80, 44, 0.00, 6.00, 'Expense', 'Deduct From Wallet Order #SB509'),
(50, 35, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(51, 35, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB514'),
(79, 44, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(53, 35, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB516'),
(54, 29, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB517'),
(55, 36, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(56, 29, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB518'),
(57, 29, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB519'),
(58, 24, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB520'),
(59, 24, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB521'),
(60, 25, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB522'),
(61, 37, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(62, 37, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB523'),
(63, 38, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(64, 25, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB524'),
(65, 39, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(66, 40, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(67, 41, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(68, 42, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(69, 42, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB525'),
(106, 40, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB516'),
(71, 29, 0.00, 1.00, 'Expense', 'Deduct From Wallet Order #SB527'),
(73, 29, 15.00, 0.00, 'Earn', 'Cashback From Order #SB527'),
(74, 25, 14.00, 0.00, 'Earn', 'Cashback From Order #SB524'),
(105, 51, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(103, 46, 18.00, 0.00, 'Earn', 'Cashback From Order #SB513'),
(81, 45, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(82, 46, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(83, 47, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(84, 47, 0.00, 12.00, 'Expense', 'Deduct From Wallet Order #SB510'),
(104, 40, 16.00, 0.00, 'Earn', 'Refund Rs.16.00 To Wallet For Cancel Order #SB515'),
(86, 48, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(87, 49, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(88, 49, 0.00, 3.00, 'Expense', 'Deduct From Wallet Order #SB511'),
(102, 44, 12.00, 0.00, 'Earn', 'Cashback From Order #SB509'),
(90, 46, 0.00, 9.00, 'Expense', 'Deduct From Wallet Order #SB513'),
(91, 41, 0.00, 3.00, 'Expense', 'Deduct From Wallet Order #SB514'),
(101, 47, 24.00, 0.00, 'Earn', 'Cashback From Order #SB510'),
(93, 50, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(94, 49, 6.00, 0.00, 'Earn', 'Cashback From Order #SB511'),
(100, 40, 0.00, 16.00, 'Expense', 'Deduct From Wallet For Order #SB515'),
(107, 40, 3.00, 0.00, 'Earn', 'Refund Rs.3.00 To Wallet For Cancel Order #SB516'),
(108, 40, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB517'),
(109, 40, 3.00, 0.00, 'Earn', 'Refund Rs.3.00 To Wallet For Cancel Order #SB517'),
(110, 41, 0.00, 2.00, 'Expense', 'Deduct From Wallet For Order #SB518'),
(111, 52, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(112, 52, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB519'),
(113, 41, 0.00, 4.00, 'Expense', 'Deduct From Wallet For Order #SB520'),
(114, 41, 4.00, 0.00, 'Earn', 'Refund Rs.4.00 To Wallet For Cancel Order #SB520'),
(115, 41, 4.00, 0.00, 'Earn', 'Cashback From Order #SB518'),
(116, 52, 7.00, 0.00, 'Earn', 'Cashback From Order #SB519'),
(117, 53, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(118, 40, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB522'),
(119, 40, 3.00, 0.00, 'Earn', 'Refund Rs.3.00 To Wallet For Cancel Order #SB522'),
(120, 54, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(121, 55, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(122, 56, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(123, 41, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB523'),
(124, 41, 7.00, 0.00, 'Earn', 'Cashback From Order #SB523'),
(125, 57, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(126, 57, 0.00, 2.00, 'Expense', 'Deduct From Wallet For Order #SB524'),
(127, 57, 4.00, 0.00, 'Earn', 'Cashback From Order #SB524'),
(128, 58, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(129, 59, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(130, 60, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(131, 61, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(132, 40, 0.00, 2.00, 'Expense', 'Deduct From Wallet For Order #SB525'),
(133, 40, 2.00, 0.00, 'Earn', 'Refund Rs.2.00 To Wallet For Cancel Order #SB525'),
(134, 62, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(135, 63, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(136, 40, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB527'),
(137, 40, 3.00, 0.00, 'Earn', 'Refund Rs.3.00 To Wallet For Cancel Order #SB527'),
(138, 59, 3.00, 0.00, 'Earn', 'Cashback From Order #SB529'),
(139, 64, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(140, 40, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB530'),
(141, 40, 3.00, 0.00, 'Earn', 'Refund Rs.3.00 To Wallet For Cancel Order #SB530'),
(142, 65, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(143, 66, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(144, 67, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(145, 68, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(146, 69, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(147, 70, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(148, 71, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(149, 72, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(150, 73, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(151, 74, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(152, 75, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(153, 76, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(154, 77, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(155, 78, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(156, 79, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(157, 80, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(158, 81, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(159, 82, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(160, 40, 5.00, 0.00, 'Earn', 'Cashback From Order #SB535'),
(161, 82, 0.00, 2.00, 'Expense', 'Deduct From Wallet For Order #SB536'),
(162, 82, 5.00, 0.00, 'Earn', 'Cashback From Order #SB536'),
(163, 40, 0.00, 2.00, 'Expense', 'Deduct From Wallet For Order #SB535'),
(164, 40, 2.00, 0.00, 'Earn', 'Refund Rs.2.00 To Wallet For Cancel Order #SB537'),
(165, 40, 0.00, 2.00, 'Expense', 'Deduct From Wallet For Order #SB538'),
(166, 40, 5.00, 0.00, 'Earn', 'Cashback From Order #SB538'),
(169, 83, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(170, 84, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(171, 84, 0.00, 2.00, 'Expense', 'Deduct From Wallet For Order #SB542'),
(172, 84, 5.00, 0.00, 'Earn', 'Cashback From Order #SB542'),
(173, 10, 2.00, 0.00, 'Earn', 'Refund Rs.2.00 To Wallet For Cancel Order #SB539'),
(174, 85, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(175, 86, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(176, 86, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB544'),
(177, 87, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(178, 40, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB545'),
(179, 40, 7.00, 0.00, 'Earn', 'Cashback From Order #SB545'),
(180, 86, 6.00, 0.00, 'Earn', 'Cashback From Order #SB544'),
(181, 88, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(182, 41, 0.00, 5.00, 'Expense', 'Deduct From Wallet For Order #SB546'),
(183, 41, 10.00, 0.00, 'Earn', 'Cashback From Order #SB546'),
(184, 51, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB547'),
(185, 51, 7.00, 0.00, 'Earn', 'Cashback From Order #SB547'),
(186, 89, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(187, 40, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB548'),
(188, 40, 3.00, 0.00, 'Earn', 'Refund Rs.3.00 To Wallet For Cancel Order #SB548'),
(189, 41, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB549'),
(190, 41, 7.00, 0.00, 'Earn', 'Cashback From Order #SB549'),
(191, 59, 3.00, 0.00, 'Earn', 'Cashback From Order #SB550'),
(192, 90, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(193, 90, 0.00, 4.00, 'Expense', 'Deduct From Wallet For Order #SB551'),
(194, 90, 8.00, 0.00, 'Earn', 'Cashback From Order #SB551'),
(195, 91, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(196, 92, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(197, 92, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB552'),
(198, 92, 7.00, 0.00, 'Earn', 'Cashback From Order #SB552'),
(199, 63, 0.00, 2.00, 'Expense', 'Deduct From Wallet For Order #SB553'),
(200, 40, 0.00, 2.00, 'Expense', 'Deduct From Wallet For Order #SB554'),
(201, 40, 4.00, 0.00, 'Earn', 'Cashback From Order #SB554'),
(202, 63, 5.00, 0.00, 'Earn', 'Cashback From Order #SB553'),
(203, 93, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(204, 94, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(205, 95, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(206, 96, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(207, 51, 0.00, 4.00, 'Expense', 'Deduct From Wallet For Order #SB557'),
(208, 51, 8.00, 0.00, 'Earn', 'Cashback From Order #SB557'),
(209, 63, 0.00, 5.00, 'Expense', 'Deduct From Wallet For Order #SB558'),
(210, 63, 10.00, 0.00, 'Earn', 'Cashback From Order #SB558'),
(211, 97, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(212, 98, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(213, 99, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(214, 56, 0.00, 7.00, 'Expense', 'Deduct From Wallet For Order #SB559'),
(215, 100, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(216, 100, 0.00, 6.00, 'Expense', 'Deduct From Wallet For Order #SB560'),
(217, 56, 15.00, 0.00, 'Earn', 'Cashback From Order #SB559'),
(218, 100, 12.00, 0.00, 'Earn', 'Cashback From Order #SB560'),
(219, 92, 0.00, 10.00, 'Expense', 'Deduct From Wallet For Order #SB561'),
(220, 92, 20.00, 0.00, 'Earn', 'Cashback From Order #SB561'),
(221, 63, 0.00, 2.00, 'Expense', 'Deduct From Wallet For Order #SB565'),
(222, 63, 4.00, 0.00, 'Earn', 'Cashback From Order #SB565'),
(223, 51, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB569'),
(224, 51, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB569'),
(225, 63, 0.00, 6.00, 'Expense', 'Deduct From Wallet For Order #SB571'),
(226, 63, 12.00, 0.00, 'Earn', 'Cashback From Order #SB571'),
(227, 51, 0.00, 0.00, 'Earn', 'Cashback From Order #SB570'),
(228, 90, 0.00, 7.00, 'Expense', 'Deduct From Wallet For Order #SB572'),
(229, 101, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(230, 90, 14.00, 0.00, 'Earn', 'Cashback From Order #SB572'),
(231, 100, 0.00, 5.00, 'Expense', 'Deduct From Wallet For Order #SB573'),
(232, 90, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB574'),
(233, 102, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(234, 63, 0.00, 4.00, 'Expense', 'Deduct From Wallet For Order #SB575'),
(235, 52, 0.00, 2.00, 'Expense', 'Deduct From Wallet For Order #SB576'),
(236, 90, 6.00, 0.00, 'Earn', 'Cashback From Order #SB574'),
(237, 52, 4.00, 0.00, 'Earn', 'Cashback From Order #SB576'),
(238, 63, 9.00, 0.00, 'Earn', 'Cashback From Order #SB575'),
(239, 100, 11.00, 0.00, 'Earn', 'Cashback From Order #SB573'),
(240, 103, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(241, 63, 0.00, 3.00, 'Expense', 'Deduct From Wallet For Order #SB599'),
(242, 104, 100.00, 0.00, 'Earn', 'Earn From Registration'),
(243, 92, 0.00, 5.00, 'Expense', 'Deduct From Wallet For Order #SB600'),
(244, 63, 6.00, 0.00, 'Earn', 'Cashback From Order #SB599'),
(245, 92, 11.00, 0.00, 'Earn', 'Cashback From Order #SB600');

-- --------------------------------------------------------

--
-- Table structure for table `og_why_choose`
--

CREATE TABLE `og_why_choose` (
  `choose_id` int(3) NOT NULL,
  `choose_photo` varchar(100) NOT NULL,
  `choose_title` varchar(100) NOT NULL,
  `choose_text` text NOT NULL,
  `choose_status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_why_choose`
--

INSERT INTO `og_why_choose` (`choose_id`, `choose_photo`, `choose_title`, `choose_text`, `choose_status`) VALUES
(1, 'trust.png', 'Quality', 'You can trust', 'Active'),
(2, 'clock.png', 'On Time Delivery', '5% value back if we are late', 'Active'),
(3, 'delivery.png', 'Free Delivery', 'On orders above Rs.200', 'Active'),
(4, 'cash.png', 'Price', 'Very reasonable price', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `og_zipcode`
--

CREATE TABLE `og_zipcode` (
  `zipcode_id` int(11) NOT NULL,
  `available_zipcode` varchar(100) NOT NULL,
  `zipcode_status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `og_zipcode`
--

INSERT INTO `og_zipcode` (`zipcode_id`, `available_zipcode`, `zipcode_status`) VALUES
(1, '700033', 'Active'),
(2, '700034', 'Active'),
(3, '700060', 'Active'),
(4, '700061', 'Active'),
(5, '700063', 'Active'),
(6, '700018', 'Active'),
(7, '700010', 'Active'),
(8, '700008', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `og_administrator`
--
ALTER TABLE `og_administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `og_banners`
--
ALTER TABLE `og_banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `og_brands`
--
ALTER TABLE `og_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `og_category`
--
ALTER TABLE `og_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `og_contents`
--
ALTER TABLE `og_contents`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `og_delivery_slot`
--
ALTER TABLE `og_delivery_slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `og_enquiry`
--
ALTER TABLE `og_enquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `og_final_cart`
--
ALTER TABLE `og_final_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `og_inner_banners`
--
ALTER TABLE `og_inner_banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `og_offers`
--
ALTER TABLE `og_offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `og_orders`
--
ALTER TABLE `og_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `og_photos`
--
ALTER TABLE `og_photos`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `og_products`
--
ALTER TABLE `og_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `og_product_packets`
--
ALTER TABLE `og_product_packets`
  ADD PRIMARY KEY (`packet_id`);

--
-- Indexes for table `og_subcategory`
--
ALTER TABLE `og_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `og_suggestions`
--
ALTER TABLE `og_suggestions`
  ADD PRIMARY KEY (`suggestion_id`);

--
-- Indexes for table `og_temp_cart`
--
ALTER TABLE `og_temp_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `og_testimonials`
--
ALTER TABLE `og_testimonials`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `og_users`
--
ALTER TABLE `og_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `og_user_balance`
--
ALTER TABLE `og_user_balance`
  ADD PRIMARY KEY (`balance_id`);

--
-- Indexes for table `og_why_choose`
--
ALTER TABLE `og_why_choose`
  ADD PRIMARY KEY (`choose_id`);

--
-- Indexes for table `og_zipcode`
--
ALTER TABLE `og_zipcode`
  ADD PRIMARY KEY (`zipcode_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `og_administrator`
--
ALTER TABLE `og_administrator`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `og_banners`
--
ALTER TABLE `og_banners`
  MODIFY `banner_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `og_brands`
--
ALTER TABLE `og_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `og_category`
--
ALTER TABLE `og_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `og_contents`
--
ALTER TABLE `og_contents`
  MODIFY `content_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `og_delivery_slot`
--
ALTER TABLE `og_delivery_slot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `og_enquiry`
--
ALTER TABLE `og_enquiry`
  MODIFY `enquiry_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `og_final_cart`
--
ALTER TABLE `og_final_cart`
  MODIFY `cart_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `og_inner_banners`
--
ALTER TABLE `og_inner_banners`
  MODIFY `banner_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `og_offers`
--
ALTER TABLE `og_offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `og_orders`
--
ALTER TABLE `og_orders`
  MODIFY `order_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `og_photos`
--
ALTER TABLE `og_photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `og_products`
--
ALTER TABLE `og_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `og_product_packets`
--
ALTER TABLE `og_product_packets`
  MODIFY `packet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `og_subcategory`
--
ALTER TABLE `og_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `og_suggestions`
--
ALTER TABLE `og_suggestions`
  MODIFY `suggestion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `og_temp_cart`
--
ALTER TABLE `og_temp_cart`
  MODIFY `cart_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `og_testimonials`
--
ALTER TABLE `og_testimonials`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `og_users`
--
ALTER TABLE `og_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `og_user_balance`
--
ALTER TABLE `og_user_balance`
  MODIFY `balance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `og_why_choose`
--
ALTER TABLE `og_why_choose`
  MODIFY `choose_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `og_zipcode`
--
ALTER TABLE `og_zipcode`
  MODIFY `zipcode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
