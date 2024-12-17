-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2024 at 08:43 AM
-- Server version: 8.0.39
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ushop_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int NOT NULL,
  `about_heading` text NOT NULL,
  `about_short_desc` text NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_heading`, `about_short_desc`, `about_desc`) VALUES
(1, 'About Us - Our Story', '\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,\r\n', 'Rhone was the collective vision of a small group of weekday warriors. For years, we were frustrated by the lack of activewear designed for men and wanted something better. With that in mind, we set out to design premium apparel that is made for motion and engineered to endure.\r\n\r\nAdvanced materials and state of the art technology are combined with heritage craftsmanship to create a new standard in activewear. Every product tells a story of premium performance, reminding its wearer to push themselves physically without having to sacrifice comfort and style.\r\n\r\nBeyond our product offering, Rhone is founded on principles of progress and integrity. Just as we aim to become better as a company, we invite men everywhere to raise the bar and join us as we move Forever Forward.');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(2, 'David Utibe Jonah', 'davidutjonah@ushop.com.ng', '123', 'me.jpg', '07055936793', 'Lagos', 'Front-End Developer', 'I possess advanced capabilities in the utilization of programming languages, notably JavaScript, to craft sophisticated and user-centric web pages. My expertise extends to the proficient maintenance and enhancement of websites, as well as the optimization of applications to attain peak performance. Furthermore, my skill set encompasses the adept design of mobile-based features and seamless collaboration with back-end developers and web designers to elevate overall usability. A hallmark of my professional aptitude is the adept collection of feedback from users and clientele, coupled with the delivery of effective and tailored solutions. Additionally, I bring to the table extensive experience in the composition of functional requirement documents and guides, the creation of refined mockups and prototypes, and the preservation of exacting graphic standards and uniformity.');

-- --------------------------------------------------------

--
-- Table structure for table `bundle_product_relation`
--

CREATE TABLE `bundle_product_relation` (
  `rel_id` int NOT NULL,
  `rel_title` varchar(255) NOT NULL,
  `product_id` int NOT NULL,
  `bundle_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bundle_product_relation`
--

INSERT INTO `bundle_product_relation` (`rel_id`, `rel_title`, `product_id`, `bundle_id`) VALUES
(8, 'jacket bundle relation -1', 4, 11),
(9, 'jacket bundle relation -2', 5, 11),
(10, 'jacket bundle relation -3', 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `p_price`, `size`) VALUES
(12, '102.89.46.214', 1, '3216', 'M'),
(13, '102.89.46.214', 1, '2134', 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `cartpage`
--

CREATE TABLE `cartpage` (
  `cartpage_id` int NOT NULL,
  `cartpage_title` text NOT NULL,
  `cartpage_heading` text NOT NULL,
  `cartpage_subhead` text NOT NULL,
  `cartpage_subtext` text NOT NULL,
  `cartpage_body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartpage`
--

INSERT INTO `cartpage` (`cartpage_id`, `cartpage_title`, `cartpage_heading`, `cartpage_subhead`, `cartpage_subtext`, `cartpage_body`) VALUES
(4, 'View', 'Your Cart', 'You currently have', 'item(s) in your cart.', 'Select to checkout');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(2, 'Women', 'no', 'woman-clothes.png'),
(3, 'Kids', 'no', 'boy.png'),
(4, 'Others', 'yes', 'ancestors.png'),
(5, 'Men', 'yes', 'worker.png');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(16, 'Margot Man', 'djonah04@gmail.com', 'Refund', 'Thanks My Brother', '2024-11-26 20:43:53'),
(17, 'Canto Man', 'dutibe04@gmail.com', 'Dont Worry', 'For Info', '2024-12-09 20:02:14'),
(18, 'David Alaba', 'djonah04@gmail.com', 'Escalate', 'I want to escalate', '2024-12-10 18:37:34'),
(19, 'Mr. David Jax', 'djonah04@gmail.com', 'Temporary', 'Thanks for This', '2024-12-10 18:51:47'),
(20, 'Danza Bang', 'djonah04@gmail.com', 'Revenue Calculated', 'This email and any attachments are confidential and are intended solely for the addressee. If you are not the addressee tell the sender immediately and destroy it. Do not open, read, copy, disclose, use or store it in any way, or permit others to do so. Emails are not secure and may suffer errors, viruses, delay, interception, and amendment. U Shop and its subsidiaries do not accept liability for damage caused by this email and may monitor email traffic.', '2024-12-10 19:03:05'),
(21, 'Jackal Dandy', 'djonah04@gmail.com', 'Yellow Stuff', 'Our goal is to respond to your email within 24hrs; But given the unusual high volume of emails we have received; it might take us longer than usual to respond.', '2024-12-10 19:08:18'),
(22, 'Ark Stop', 'dutibe04@gmail.com', 'For Resending', 'Clearance stuffs is Descord', '2024-12-10 19:54:51'),
(23, 'Gucci Suit', 'dutibe04@gmail.com', 'Revenue Calculated', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2024-12-10 20:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int NOT NULL,
  `contact_email` text NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_email`, `contact_heading`, `contact_desc`) VALUES
(1, 'djonah04@gmail.com', 'Contact Us', 'If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int NOT NULL,
  `product_id` int NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int NOT NULL,
  `coupon_used` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(5, 8, 'Sale', '10', 'CASTRO', 2, 1),
(6, 14, 'Sale', '65', 'CODEASTRO', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_confirm_code` text NOT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `customer_confirm_code`, `provider`, `provider_id`) VALUES
(2, 'user', 'user@ave.com', '123', 'United State', 'New York', '0092334566931', 'new york', 'user.jpg', '::1', '', NULL, NULL),
(7, 'Morayo Otun', 'dutibe04@gmail.com', '123', 'Nigeria', 'Lagos', '07055936792', '10 Olaniyi Street Ikoyi', 'IMG_0814.jpeg', '102.89.34.33', '', NULL, NULL),
(11, 'David Jonah', 'djonah05@gmail.com', '123', 'Nigeria', 'Lagos', '07055936791', '10 Olaniyi Street Ikoyi', '48f4e3a7-e000-40dd-a4ec-b2c6cdcb46c2.jpeg', '102.89.34.33', '', NULL, NULL),
(13, 'Kelly Travis', 'kellyjtravis@gmail.com', '123', 'Nigeria', 'Lagos', '07055936790', '10 Olaniyi Street Ikoyi', 'IMG_4910.jpeg', '102.89.34.33', '', NULL, NULL),
(16, 'David Jonah', 'djonah04@gmail.com', '123', 'Nigeria', 'Lagos', '05055936799', '10 Lai Yusuf Crescent Lekki', 'me.jpg', '102.88.109.165', '', NULL, NULL),
(18, 'Chloe Vincent', 'vincentchloe11@gmail.com', '', '', '', '', '', '', '', '', 'google', '114318615766708698789');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `due_amount` int NOT NULL,
  `invoice_no` int NOT NULL,
  `qty` int NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(16, 2, 207, 1715523401, 3, 'Small', '2017-02-20 08:21:42', 'pending'),
(17, 2, 100, 1715523401, 2, 'Large', '2017-02-20 08:21:42', 'pending'),
(18, 2, 300, 1715523401, 1, 'Medium', '2017-02-20 08:21:42', 'pending'),
(19, 2, 150, 1068059025, 1, 'Medium', '2017-02-20 08:26:47', 'pending'),
(20, 2, 288, 909940689, 3, 'Large', '2017-02-27 11:06:32', 'complete'),
(21, 2, 400, 909940689, 2, 'Meduim', '2017-02-27 11:06:37', 'complete'),
(22, 2, 4268, 89047756, 2, 'L', '2024-11-22 09:17:35', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_types`
--

CREATE TABLE `enquiry_types` (
  `enquiry_id` int NOT NULL,
  `enquiry_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_types`
--

INSERT INTO `enquiry_types` (`enquiry_id`, `enquiry_title`) VALUES
(1, 'Order and Delivery Support'),
(2, 'Technical Support'),
(3, 'Price Concern');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(2, 'Adidas', 'no', 'adidas.png'),
(3, 'Nike', 'no', 'nike.png'),
(4, 'Philip Plein', 'yes', 'pp.png'),
(5, 'Lacoste', 'yes', 'lacost.png'),
(6, 'Gucci', 'yes', 'gucci.png'),
(7, 'The North Face', 'no', 'tnf.png'),
(8, 'Reebok', 'no', 'reebok.png'),
(9, 'New Balance', 'no', 'nb.png'),
(10, 'Louis Vuitton', 'yes', 'lv.png');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int NOT NULL,
  `invoice_no` int NOT NULL,
  `amount` int NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int NOT NULL,
  `code` int NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(2, 1607603019, 447, 'UBL/Omni', 5678, 33, '11/1/2016'),
(3, 314788500, 345, 'UBL/Omni', 443, 865, '11/1/2016'),
(4, 6906, 400, 'Western Union', 101025780, 696950, 'January 1'),
(5, 10023, 20, 'Bank Code', 1000010101, 6969, '09/14/2021'),
(6, 69088, 100, 'Bank Code', 1010101022, 88669, '09/14/2021'),
(7, 1835758347, 480, 'Western Union', 1785002101, 66990, '09-04-2021'),
(8, 1835758347, 480, 'Bank Code', 1012125550, 66500, '09-14-2021'),
(9, 1144520, 480, 'Bank Code', 1025000020, 66990, '09-14-2021'),
(10, 2145000000, 480, 'Bank Code', 2147483647, 66580, '09-14-2021'),
(20, 858195683, 100, 'Bank Code', 1400256000, 47850, '09-13-2021'),
(21, 2138906686, 120, 'Bank Code', 1455000020, 202020, '09-13-2021'),
(22, 2138906686, 120, 'Bank Code', 1450000020, 202020, '09-15-2021'),
(23, 361540113, 180, 'Western Union', 1470000020, 12001, '09-15-2021'),
(24, 361540113, 180, 'UBL/Omni', 1258886650, 200, '09-15-2021'),
(25, 901707655, 245, 'Western Union', 1200002588, 88850, '09-15-2021');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `invoice_no` int NOT NULL,
  `product_id` text NOT NULL,
  `qty` int NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(16, 2, 1715523401, '2', 3, 'Small', 'pending'),
(17, 2, 1715523401, '9', 2, 'Large', 'pending'),
(18, 2, 1715523401, '11', 1, 'Medium', 'pending'),
(19, 2, 1068059025, '7', 1, 'Medium', 'pending'),
(20, 2, 909940689, '6', 3, 'Large', 'complete'),
(21, 2, 909940689, '11', 2, 'Meduim', 'complete'),
(22, 2, 89047756, '13', 2, 'L', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `p_cat_id` int NOT NULL,
  `cat_id` int NOT NULL,
  `manufacturer_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int NOT NULL,
  `product_psp_price` int NOT NULL,
  `product_desc` text NOT NULL,
  `product_features` text NOT NULL,
  `product_video` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_label` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `product_features`, `product_video`, `product_keywords`, `product_label`, `status`) VALUES
(1, 6, 3, 6, '2024-12-05 13:21:55', 'Children\'s embroidered wool sweater', 'embroidered-wool-sweater', '800039_XKECN_1056_001_100_0000_Light-Childrens-embroidered-wool-sweater.png', '800039_XKECN_1056_003_100_0000_Light-Childrens-embroidered-wool-sweater.png', '800039_XKECN_1056_002_100_0000_Light-Childrens-embroidered-wool-sweater.png', 70, 50, 'From subtle embroideries to allover prints, signature motifs continue to enrich the Gucci Cruise 2025 children\'s selection. This children\'s sweater has been made from a soft wool and is defined by an allover Gucci Ancora 1921 embroidery with intarsia.', 'Grey wool\r\nAllover Gucci Ancora 1921 embroidery with intarsia\r\nKnit collar\r\nDropped shoulder\r\nBraid stitch trim', '12.mp4', 'Kids', 'Sale', 'product'),
(2, 5, 3, 2, '2017-02-15 10:48:48', 'U.S. Polo Assn. Blue Polos shirt', 'product-url-2', 'U-S--Polo-Assn--Blue-Polos-0266-586842-1-pdp_slider_l.jpg', 'U-S--Polo-Assn--Blue-Polos-0268-586842-2-pdp_slider_l.jpg', 'U-S--Polo-Assn--Blue-Polos-0271-586842-3-pdp_slider_l.jpg', 69, 45, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/qRswlmADRa8\" frameborder=\"0\" allowfullscreen></iframe>', 'T-Shirt', 'Gift', 'product'),
(3, 5, 3, 6, '2017-02-15 10:48:52', 'BENETTON White Polo Shirt', 'product-url-3', 'United-Colors-of-Benetton-White-Polo-Shirt-0608-0914361-1-pdp_slider_l.jpg', 'United-Colors-of-Benetton-White-Polo-Shirt-0608-0914361-2-pdp_slider_l.jpg', 'United-Colors-of-Benetton-White-Polo-Shirt-0609-0914361-3-pdp_slider_l.jpg', 98, 0, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla</p>', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/qRswlmADRa8\" frameborder=\"0\" allowfullscreen></iframe>', 'T-Shirt', 'New', 'product'),
(4, 5, 5, 4, '2024-12-05 13:42:26', 'Embroid Shirt Black', 'product-url-4', 'FABC-MRP1756-PTE003N_01_sf.jpg', 'FABC-MRP1756-PTE003N_01_mf.jpg', 'FABC-MRP1756-PTE003N_01_mb.jpg', 230, 150, 'Revolutionize your elegance for special events with this cotton brilliantine evening shirt. See our care for details in the small leaf collar, the pleated bib and the Swarovski buttons. Rounded bottom. Rear side pleats.\r\n\r\n<strong>Note:</strong> Model is 188cm/6\'2\" and is wearing a size M.', 'SHELL #1: 100% COTTON', '2.mp4', 'Shirt', 'New', 'product'),
(5, 7, 5, 5, '2017-02-19 06:45:07', 'Denim Borg Lined Western Jacket', 'product-url-5', 'Next-Denim-Borg-Lined-Western-Jacket-0463-0064553-1-pdp_slider_l.jpg', 'Next-Denim-Borg-Lined-Western-Jacket-0463-0064553-2-pdp_slider_l.jpg', 'Next-Denim-Borg-Lined-Western-Jacket-0465-0064553-3-pdp_slider_l.jpg', 259, 100, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/qRswlmADRa8\" frameborder=\"0\" allowfullscreen></iframe>', 'Jackets', 'Gift', 'product'),
(6, 7, 5, 5, '2017-02-19 06:49:18', 'Jack & White Solid Denim Jacket', 'product-url-6', 'Jack---Jones-White-Solid-Denim-Jacket-3115-5549091-1-pdp_slider_l.jpg', 'Jack---Jones-White-Solid-Denim-Jacket-3115-5549091-2-pdp_slider_l.jpg', 'Jack---Jones-White-Solid-Denim-Jacket-3115-5549091-3-pdp_slider_l.jpg', 96, 0, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/qRswlmADRa8\" frameborder=\"0\" allowfullscreen></iframe>', 'Jackets', 'New', 'product'),
(7, 4, 2, 6, '2017-02-15 10:49:07', 'Nice Solid Long Coat With Lace', 'product-url-7', 'fur coat with button1.jpg', 'fur coat with button2.jpg', 'fur coat with button3.jpg', 200, 150, '<p>Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. kingVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document</p>', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/qRswlmADRa8\" frameborder=\"0\" allowfullscreen></iframe>', 'Coats', 'Sale', 'product'),
(8, 4, 2, 4, '2017-02-15 10:49:11', 'Sleeveless Faux Fur Hybrid Coat', 'product-url-8', 'Black Blouse Versace Coat1.jpg', 'Black Blouse Versace Coat2.jpg', 'Black Blouse Versace Coat3.jpg', 245, 100, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/qRswlmADRa8\" frameborder=\"0\" allowfullscreen></iframe>', 'Coats', 'Gift', 'product'),
(9, 5, 4, 2, '2017-02-19 06:46:14', 'Remind Printed T-Shirt', 'product-url-9', 'product-1.jpg', 'product-2.jpg', 'product-3.jpg', 50, 0, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', '<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/qRswlmADRa8\" frameborder=\"0\" allowfullscreen></iframe>', 'T-Shirt', 'New', 'product'),
(11, 7, 5, 5, '2017-02-20 06:21:03', 'jacket bundle', 'jacket-bundle', 'jacket-1.jpg', 'jacket-2.jpg', 'jacket-3.jpg', 300, 200, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>', '<iframe width=\"854\" height=\"480\" src=\"https://www.youtube.com/embed/qImi3vNccaU\" frameborder=\"0\" allowfullscreen></iframe>', 'jacket bundle', 'Sale', 'bundle'),
(12, 4, 2, 6, '2024-11-21 08:58:00', 'Light Mohair Coat', 'gucci_coat', '42855e68-bbd4-4ba6-bd92-674bf095931f.jpeg', '57917773-9e31-496a-8722-2e324c1b6ecd.jpeg', '77478268-8aef-4500-8e20-30196e0a6b8d.jpeg', 4321, 3216, '\r\nGucci wool furry jacket best suited for functions\r\n', '\r\nFurry wool details\r\n', '123.mp4', 'Gucci wool jacket', 'New', 'product'),
(13, 6, 2, 6, '2024-11-21 08:56:46', 'Light Tweed Blend Polo Cardigan', 'gucci_cad', '1e216002-add1-4291-876c-78fd7b48df69.jpeg', '73add368-f47f-45a2-aa82-826472746b20.jpeg', 'eac158f0-acd0-4e04-b026-69cf50d700ff.jpeg', 3216, 2134, '\r\nBeautiful Gucci Light tweed blend polo cardigan\r\n', '\r\nTweed blend details\r\n', '123.mp4\r\n\r\n', 'Tweed blend', 'New', 'product'),
(16, 6, 5, 5, '2024-11-22 18:10:00', 'Sportsuit Ultra Dry Stretch Sweatshirt', 'sportsuit-ultra-dry ', 'laco5.png', 'laco2.png', 'laco1.png', 3012, 2170, 'Give your performance a boost with this super-soft stretch jersey sweatshirt. With Ultra Dry technology to wick away moisture and keep you dry. Advantage: you.', 'High, zipped neck\r\nFlat anti-chafe seams\r\nPlayer-tested\r\nSilicone crocodile on chest\r\nMain fabric: Polyester (80%), Elastane (20%) / Main fabric: Polyester (88%), Elastane (12%).', 'q.mp4\r\n\r\n', 'Sportsuit', 'Hot', 'product'),
(17, 6, 5, 5, '2024-11-22 18:26:52', 'Loose Fit Pique Sweatshirt', 'sh7881-00', 'SH7881_J2G_21.png', 'SH7881_J2G_31.png', 'SH7881_J2G_22.png', 3428, 2218, 'Lacoste sporting elegance with an urban twist. Fall in love with this loose, cozy sweatshirt in super-comfortable double-face piqué. Featuring a polo collar and signature embroidery for added croco-style. This item runs large. We advise you to take one size smaller than your usual size.', 'Organic cotton\r\nLoose fit, wide sleeves\r\nLacoste Paris embroidery\r\nButton placket\r\nEmbroidered crocodile on chest\r\nMain fabric: Cotton (52%), Polyester (42%), Elastane (6%) / Rib edge: Cotton (98%), Elastane (2%)\r\n\r\n', '2.mp4\r\n\r\n', 'Sportwear', 'Hot', 'product'),
(18, 7, 2, 4, '2024-11-22 20:10:44', 'Philip plien best', 'ppbest', '0fd68fd8-7b80-4c06-8287-4948e6583543.jpeg', '1dca3b69-51a2-4cfd-b504-17cd0a840229.jpeg', '3a3d7eb0-df6f-4178-8d2c-18ad8e6a955c.jpeg', 4421, 3213, 'Best of philips', 'Soft texture', 'der.mp4', 'High', 'New', 'product'),
(19, 6, 5, 5, '2024-11-22 20:17:12', 'Loose Fit Pique Sweatshirt', 'loosefit', 'IMG_0947.png', 'IMG_0948.jpeg', 'IMG_0949.jpeg', 4321, 3215, 'Lacoste sporting elegance with an urban twist. Fall in love with this loose, cozy sweatshirt in super-comfortable double-face piqué. Featuring a polo collar and signature embroidery for added croco-style.\r\nThis item runs large. We advise you to take one size smaller than your usual size.', 'Organic cotton\r\nLoose fit, wide sleeves\r\nLacoste Paris embroidery\r\nButton placket\r\nEmbroidered crocodile on chest\r\nMain fabric: Cotton (52%), Polyester (42%), Elastane (6%) / Rib edge: Cotton (98%), Elastane (2%)', 'gt.mp4', 'Soft', 'New', 'product'),
(20, 1, 2, 10, '2024-12-05 10:54:28', 'Tailored Peplum Dress', 'tailored-peplum-dress', 'louis-vuitton-tailored-peplum-dress -ready-to-wear--FRRO58SM4100_PM2_Front view.png', 'louis-vuitton-tailored-peplum-dress -ready-to-wear--FRRO58SM4100_PM1_Side view.png', 'louis-vuitton-tailored-peplum-dress -ready-to-wear--FRRO58SM4100_PM1_Back view.png', 3214, 3112, 'Runway codes rework this tailored dress with a crisp, modern look. Crafted from a structured, lightweight blend of wool-silk mikado, the top half is cut with this season’s directional square shoulders and detailed with both a zipper and snap-button fastening. The tapered waist is offset by sharp peplum details on the hips for a play of volume.', 'Main Material : 76%\r\nWool, 12% Silk, 7%\r\nCotton, 5% Polyamide\r\nMastic\r\nMade in Italy', '21.mp4', 'Dress', 'Hot', 'product'),
(21, 1, 2, 10, '2024-12-05 11:06:07', 'Denim LV Trunk Dress', 'denim-lv-trunk-dress', 'louis-vuitton-denim-lv-trunk-dress -ready-to-wear--FRRO65QNA801_PM2_Front view.png', 'louis-vuitton-denim-lv-trunk-dress -ready-to-wear--FRRO65QNA801_PM1_Back view.png', 'louis-vuitton-denim-lv-trunk-dress -ready-to-wear--FRRO65QNA801_PM2_Front view', 3421, 3217, 'This chic cotton gabardine dress is elevated into a bold statement in this season’s signature print, which celebrates the House’s heritage and savoir-faire with detailing from an archival Louis Vuitton trunk. Leather inserts underscore the structure of the A-line silhouette, while an exposed double zipper at the front completes the look with a modern finish.', 'Main Material : 100% Cotton\r\nHavanes\r\nMade in Italy', '7.mp4', 'Dress', 'Hot', 'product'),
(22, 1, 2, 10, '2024-12-05 11:28:11', 'Asymmetrical Stud Strap Dress', 'asymmetrical-stud-strap-dress', 'louis-vuitton-asymmetrical-stud-strap-dress-ready-to-wear--FRDS51JEV000_PM2_Front view.png', 'louis-vuitton-asymmetrical-stud-strap-dress-ready-to-wear--FRDS51JEV000_PM1_Back view-2.png', 'louis-vuitton-asymmetrical-stud-strap-dress-ready-to-wear--FRDS51JEV000_PM2_Front view.png', 2383, 2152, 'This asymmetrical dress is crafted from a crisp, lightweight viscose-blend crepe jersey in a sleek figure-skimming full-length silhouette. The left side is highlighted with an exposed zipper detail and a high slit, while the chunky leather eyelet strap is embellished with metallic studs for a refined yet rebellious finishing touch.', 'Main Material : 76% Viscose\r\n21% Polyamide\r\n3% Elastane\r\nOptic White\r\nMade in Italy', '2.mp4', 'Dress', 'New', 'product'),
(23, 4, 5, 4, '2024-12-05 12:18:14', 'Wool Blazer Lord Fit', 'Wool-blazer-lord-fit', 'AADC-MRF1867-PTE076N_02_sf.jpg', 'AADC-MRF1867-PTE076N_02_mf.jpg', 'AADC-MRF1867-PTE076N_02_mb.jpg', 634, 523, 'Add a spark to your wardrobe. Check out this wool canvas evening blazer with details that make it stand out.\r\n? Light wool canvas enriched by all over flocked pattern\r\n? Velvet peak lapels\r\n? Velvet lined single button with embroidered Skull & Bones\r\n? Two velvet trim finished slit pockets\r\n? Two vents on the back\r\n? Inner lining\r\n? Model is 188cm/6\'2\" and is wearing a size M.', 'FABRIC #1: 53% POLYESTER 43% VIRGIN WOOL 4% ELASTANE\r\nFABRIC #2: 100% COTTON\r\nLINING #1: 51% VISCOSE 49% ACETATE', '8.mp4', 'Suits', 'Fresh', 'product'),
(24, 6, 3, 5, '2024-12-05 12:32:45', 'Printed Crew Neck Sweatshirt', 'printed-crew-neck-sweatshirt', 'SJ2483_HBM_20.png', 'SJ2483_HBM_21.png', 'SJ2483_HBM_22.png', 131, 97, 'A sweatshirt boasting the perfect blend of sporting style and French elegance from Lacoste, sportswear creators since 1933. Made from soft, comfortable unbrushed fleece, with an impeccable cut and sophisticated finish details. But that\'s not all: It also features a bold contrast print with our brand logo.', 'Unbrushed organic cotton fleece\r\nTimeless crew neck\r\nRibbed cuffs\r\nEmbroidered crocodile badge on front\r\nMain fabric: Cotton (100%) / Rib edge: Cotton (98%), Elastane (2%)', '68.mp4', 'kids', 'New', 'product'),
(25, 1, 2, 10, '2024-12-05 12:47:18', 'Sculptural Hem Mesh Dress', 'sculptural-hem-mesh-dress', 'louis-vuitton-sculptural-hem-mesh-dress -ready-to-wear--FRRO43PSX900_PM2_Front view.png', 'louis-vuitton-sculptural-hem-mesh-dress -ready-to-wear--FRRO43PSX900_PM1_Side view.png', 'louis-vuitton-sculptural-hem-mesh-dress -ready-to-wear--FRRO43PSX900_PM1_Back view.png', 3211, 2314, 'This sophisticated statement dress from the runway is crafted from a transparent, textured mesh for versatile layering options. Raw hems add a playfully rebellious touch to the neckline and arms, while boning through the hemline adds volume to the asymmetrical skirt for a spectacular sculptural finish.', 'Main Material : 69% Silk, 31% Polyamide\r\nNoir\r\nMade in Italy', '2.mp4', 'Dress', 'Sexy', 'product'),
(26, 5, 3, 4, '2024-12-05 13:55:30', 'MAXI T-SHIRT', 'maxi-shirt', 'PABC-GTK0725-PJY002N_02_sf.jpg', 'PABC-GTK0725-PJY002N_02_d1.jpg', 'PABC-GTK0725-PJY002N_02_sb.jpg', 231, 102, 'Kids Comfort is 100%', 'Fabric : 100% cotton\r\nTrim : 95% cotton\r\n5% elastane\r\nEmbroidery : 100% polyester.', '4.mp4', 'Kids', 'New', 'product'),
(27, 8, 5, 6, '2024-12-05 14:05:53', 'Washed Denim pant with GG turn ups', 'washed-denim-pant', '774078_XDCTN_4452_001_100_0000_Light-Washed-denim-pant-with-GG-turn-ups.png', '774078_XDCTN_4452_005_100_0000_Light-Washed-denim-pant-with-GG-turn-ups.png', '774078_XDCTN_4452_007_100_0000_Light-Washed-denim-pant-with-GG-turn-ups.png', 1239, 1220, 'The men\'s Cruise 2024 collection presents a contemporary silhouette. Voluminous trousers are paired with fitted jackets, while relaxed cargo pants worn with outerwear pieces offer a sporty edge. This pair of casual denim pants features GG canvas turn ups.', 'Light blue washed denim\r\nFive pocket style\r\nBelt loops\r\n\'Gucci Made in Italy\' label\r\nGG canvas turn-ups\r\nButton and zip closure\r\nLength: 42.1\" based on a size 32 (IT)\r\nTurn up cuff: 3.1\"\r\nMade in Italy\r\nThe product shown in this image is a size 32 (IT)\r\nFabric: 100% Cotton.\r\nDetails: 70% Cotton, 30% Polyester.\r\nPocket lining: 65% Polyester, 35% Cotton.', '6.mp4', 'Jeans', 'New', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(1, 'Dress', 'no', 'dress.png'),
(4, 'Suits | Blazer | Coats', 'no', 'suit-and-tie-outfit.png'),
(5, 'T-Shirts', 'no', 'cloth.png'),
(6, 'Sweatshirt | Cardigan', 'no', 'jacket.png'),
(7, 'Jackets', 'yes', 'jacket.jpg'),
(8, 'Jeans', 'yes', 'jean.png');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int NOT NULL,
  `store_title` varchar(255) NOT NULL,
  `store_image` varchar(255) NOT NULL,
  `store_desc` text NOT NULL,
  `store_button` varchar(255) NOT NULL,
  `store_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_title`, `store_image`, `store_desc`, `store_button`, `store_url`) VALUES
(4, 'London Store', 'store (3).jpg', '<p style=\"text-align: center;\"><strong>180-182 RECENTS STREET, LONDON, W1B 5BT</strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut libero erat, aliquet eget mauris ut, dictum sagittis libero. Nam at dui dapibus, semper dolor ac, malesuada mi. Duis quis lobortis arcu. Vivamus sed sodales orci, non varius dolor.</p>', 'View Map', 'http://www.thedailylux.com/ecommerce'),
(5, 'New York Store', 'store (1).png', '<p style=\"text-align: center;\"><strong>109 COLUMBUS CIRCLE, NEW YORK, NY10023</strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut libero erat, aliquet eget mauris ut, dictum sagittis libero. Nam at dui dapibus, semper dolor ac, malesuada mi. Duis quis lobortis arcu. Vivamus sed sodales orci, non varius dolor.</p>', 'View Map', 'http://www.thedailylux.com/ecommerce'),
(6, 'Paris Store', 'store (2).jpg', '<p style=\"text-align: center;\"><strong>2133 RUE SAINT-HONORE, 75001 PARIS&nbsp;</strong></p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut libero erat, aliquet eget mauris ut, dictum sagittis libero. Nam at dui dapibus, semper dolor ac, malesuada mi. Duis quis lobortis arcu. Vivamus sed sodales orci, non varius dolor.</p>', 'View Map', 'http://www.thedailylux.com/ecommerce');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int NOT NULL,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(1, 'Rules And Regulations', 'rules', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.&nbsp;</p>'),
(2, 'Refund Policy', 'link2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on'),
(3, 'Pricing and Promotions Policy', 'link3', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(2, 2, 8),
(3, 5, 13),
(4, 3, 13),
(5, 6, 15),
(6, 2, 1),
(8, 2, 12),
(9, 13, 19),
(10, 7, 17),
(11, 7, 26),
(12, 7, 25),
(13, 7, 27);

-- --------------------------------------------------------

--
-- Table structure for table `wishlistpage`
--

CREATE TABLE `wishlistpage` (
  `wishlistpage_id` int NOT NULL,
  `wishlistpage_title` text NOT NULL,
  `wishlistpage_heading` text NOT NULL,
  `wishlistpage_subhead` text NOT NULL,
  `wishlistpage_subtext` text NOT NULL,
  `wishlistpage_body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlistpage`
--

INSERT INTO `wishlistpage` (`wishlistpage_id`, `wishlistpage_title`, `wishlistpage_heading`, `wishlistpage_subhead`, `wishlistpage_subtext`, `wishlistpage_body`) VALUES
(1, 'Checkout', 'Your Wishlist', 'You currently have', 'item(s) in your wishlist.', 'Happy Shopping');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bundle_product_relation`
--
ALTER TABLE `bundle_product_relation`
  ADD PRIMARY KEY (`rel_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `cartpage`
--
ALTER TABLE `cartpage`
  ADD PRIMARY KEY (`cartpage_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `enquiry_types`
--
ALTER TABLE `enquiry_types`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- Indexes for table `wishlistpage`
--
ALTER TABLE `wishlistpage`
  ADD PRIMARY KEY (`wishlistpage_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bundle_product_relation`
--
ALTER TABLE `bundle_product_relation`
  MODIFY `rel_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cartpage`
--
ALTER TABLE `cartpage`
  MODIFY `cartpage_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `enquiry_types`
--
ALTER TABLE `enquiry_types`
  MODIFY `enquiry_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wishlistpage`
--
ALTER TABLE `wishlistpage`
  MODIFY `wishlistpage_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
