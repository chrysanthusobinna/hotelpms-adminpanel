-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 12:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(50) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_content` text NOT NULL,
  `blog_photo` text NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(50) NOT NULL,
  `guest_full_name` text NOT NULL,
  `guest_email_address` text NOT NULL,
  `guest_phone_number` text NOT NULL,
  `residential_address` text NOT NULL,
  `checking_in_date` text NOT NULL,
  `checking_out_date` text NOT NULL,
  `class_id` bigint(20) NOT NULL,
  `hotel_room_id` bigint(20) NOT NULL,
  `room_number` bigint(20) NOT NULL,
  `reference_no` bigint(20) NOT NULL,
  `date_of_booking` text NOT NULL,
  `booking_method` text NOT NULL,
  `payment_method` text NOT NULL,
  `sub_total_amount` text NOT NULL,
  `discount_amount` text NOT NULL,
  `grand_total_amount` text NOT NULL,
  `discount_info` text NOT NULL,
  `booking_billing` text NOT NULL,
  `booking_duration` int(11) NOT NULL,
  `booking_staff` text NOT NULL,
  `checkin_staff` text DEFAULT NULL,
  `checkout_staff` text DEFAULT NULL,
  `cancel_staff` text DEFAULT NULL,
  `cancel_date` text NOT NULL,
  `activity_logs_staff` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `guest_full_name`, `guest_email_address`, `guest_phone_number`, `residential_address`, `checking_in_date`, `checking_out_date`, `class_id`, `hotel_room_id`, `room_number`, `reference_no`, `date_of_booking`, `booking_method`, `payment_method`, `sub_total_amount`, `discount_amount`, `grand_total_amount`, `discount_info`, `booking_billing`, `booking_duration`, `booking_staff`, `checkin_staff`, `checkout_staff`, `cancel_staff`, `cancel_date`, `activity_logs_staff`) VALUES
(1, 'James', 'james@gmail.com', '08066776655', 'Bury Manchester', '1695072487', '1695121200', 3, 5, 5, 722484653, '1695072248', 'LOCAL', 'CASH', '45.9', '0', '45.9', 'NULL', '<tr> <td>Monday</td> <td>18th Sep 2023</td> <td>&#163; 46 </td> </tr>', 1, 'demo@chrys-online.com', 'demo@chrys-online.com', 'NULL', 'NULL', '0', '<tr><td>BOOKED by Staff <b>Chrysanthus Obinna</b> at 10:24 PM - 18th Sep 2023</td></tr><tr><td>CHECKED-IN by Staff <b>Chrysanthus Obinna</b> at 10:28 PM - 18th Sep 2023</td></tr>'),
(2, 'Paul', 'paul@gmail.com', '08099332233', 'Bolton, Uk', '1695072676', '1695207600', 3, 6, 6, 726316708, '1695072631', 'LOCAL', 'CASH', '91.8', '0', '91.8', 'NULL', '<tr> <td>Monday</td> <td>18th Sep 2023</td> <td>&#163; 45.90 </td> </tr> <tr> <td>Tuesday</td> <td>19th Sep 2023</td> <td>&#163; 45.90 </td> </tr>', 2, 'demo@chrys-online.com', 'demo@chrys-online.com', 'NULL', 'NULL', '0', '<tr><td>BOOKED by Staff <b>Chrysanthus Obinna</b> at 10:30 PM - 18th Sep 2023</td></tr><tr><td>CHECKED-IN by Staff <b>Chrysanthus Obinna</b> at 10:31 PM - 18th Sep 2023</td></tr>');

-- --------------------------------------------------------

--
-- Table structure for table `booking_cart`
--

CREATE TABLE `booking_cart` (
  `id` bigint(50) NOT NULL,
  `cart_ref` text NOT NULL,
  `b_cart_hotel_room_id` text NOT NULL,
  `b_cart_room_number` text NOT NULL,
  `b_cart_sub_total_amount` text NOT NULL,
  `b_cart_booking_billing` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_cart`
--

INSERT INTO `booking_cart` (`id`, `cart_ref`, `b_cart_hotel_room_id`, `b_cart_room_number`, `b_cart_sub_total_amount`, `b_cart_booking_billing`) VALUES
(1, '1695047244', '5', '5', '91.8', '<tr> <td>Monday</td> <td>18th Sep 2023</td> <td>&#163; 46 </td> </tr> <tr> <td>Tuesday</td> <td>19th Sep 2023</td> <td>&#163; 46 </td> </tr>'),
(2, '1695072216', '5', '5', '45.9', '<tr> <td>Monday</td> <td>18th Sep 2023</td> <td>&#163; 46 </td> </tr>'),
(3, '1695072626', '6', '6', '91.8', '<tr> <td>Monday</td> <td>18th Sep 2023</td> <td>&#163; 45.90 </td> </tr> <tr> <td>Tuesday</td> <td>19th Sep 2023</td> <td>&#163; 45.90 </td> </tr>');

-- --------------------------------------------------------

--
-- Table structure for table `booking_discount`
--

CREATE TABLE `booking_discount` (
  `id` bigint(50) NOT NULL,
  `booking_discount_name` text NOT NULL,
  `booking_discount_percentage` text NOT NULL,
  `booking_discount_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_discount`
--

INSERT INTO `booking_discount` (`id`, `booking_discount_name`, `booking_discount_percentage`, `booking_discount_status`) VALUES
(1, 'Online Booking', '5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `export_html_data`
--

CREATE TABLE `export_html_data` (
  `id` bigint(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(50) NOT NULL,
  `img_src` text NOT NULL,
  `photo_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `img_src`, `photo_title`) VALUES
(10, 'DSC00681.jpg', 'VIP LOUNGE'),
(11, 'DSC00690.jpg', 'LOUNGE'),
(12, 'DSC00759.jpg', 'BAR'),
(13, 'DSC00688.jpg', 'GYM'),
(14, 'DSC00768.jpg', 'SPECIALTY SHOP'),
(15, 'DSC00763.jpg', 'SALLON'),
(16, 'DSC00777.jpg', 'LAUNDRY'),
(17, 'DSC00773.jpg', 'MUSIC STUDIO');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_rooms`
--

CREATE TABLE `hotel_rooms` (
  `id` bigint(50) NOT NULL,
  `room_number` text NOT NULL,
  `room_class_id` int(11) NOT NULL,
  `current_state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_rooms`
--

INSERT INTO `hotel_rooms` (`id`, `room_number`, `room_class_id`, `current_state`) VALUES
(1, '1', 1, 'in_service'),
(2, '2', 1, 'in_service'),
(3, '3', 2, 'in_service'),
(4, '4', 2, 'in_service'),
(5, '5', 3, 'in_service'),
(6, '6', 3, 'in_service');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_system_settings`
--

CREATE TABLE `hotel_system_settings` (
  `id` bigint(50) NOT NULL,
  `new_check_in_hours` text NOT NULL,
  `hotel_email_address` text NOT NULL,
  `hotel_phone_number` text NOT NULL,
  `hotel_other_emails` text NOT NULL,
  `hotel_other_phonenumbers` text NOT NULL,
  `hotel_google_iframe_link` text NOT NULL,
  `hotel_address` text NOT NULL,
  `intro_text` text NOT NULL,
  `software_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_system_settings`
--

INSERT INTO `hotel_system_settings` (`id`, `new_check_in_hours`, `hotel_email_address`, `hotel_phone_number`, `hotel_other_emails`, `hotel_other_phonenumbers`, `hotel_google_iframe_link`, `hotel_address`, `intro_text`, `software_name`) VALUES
(1, '04:00AM', 'contact@chrys-online.com', '+44 7765 093130', 'enquiry@chrys-online.com', '+234 813 698 9822', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2375.802011035555!2d-2.2182848999999996!3d53.454125399999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bb2299798657f%3A0x77ff28abae4ce72f!2sSchuster%20Rd%2C%20Manchester!5e0!3m2!1sen!2suk!4v1695045833277!5m2!1sen!2suk', 'Schuster Rd\nManchester\n', 'Experience a surreal, fantasy-like journey into a glamorous world of pure luxury and gratifying indulgence. From walkways adorned with exotic flowers, building fixtures of unparalleled craftsmanship, architectural finishing of aesthetic perfection, and a modern style that is second to none. Experience a satisfying, unforgettable experience of pure luxury in lavish comfort, in uninterrupted privacy and solitude in tune with nature. The Santhus Hotel  is an experience guaranteed to leave you spellbound.', 'HPMS ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `rooms_class_photos`
--

CREATE TABLE `rooms_class_photos` (
  `id` bigint(50) NOT NULL,
  `photo_src` text NOT NULL,
  `room_class_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms_class_photos`
--

INSERT INTO `rooms_class_photos` (`id`, `photo_src`, `room_class_id`) VALUES
(53, 'room_photo16036406667143.jpg', 3),
(54, 'room_photo16036406736067.jpg', 3),
(55, 'room_photo16036406788443.jpg', 3),
(57, 'room_photo16036408282997.jpg', 2),
(58, 'room_photo16036408329354.jpg', 2),
(59, 'room_photo16036408375033.jpg', 2),
(60, 'room_photo16036408495416.jpg', 1),
(61, 'room_photo16036408534594.jpg', 1),
(62, 'room_photo16036408559763.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_class`
--

CREATE TABLE `room_class` (
  `id` bigint(50) NOT NULL,
  `class_name` text NOT NULL,
  `class_description` text NOT NULL,
  `room_features_1` text NOT NULL,
  `room_features_2` text NOT NULL,
  `room_features_3` text NOT NULL,
  `weekday_price` text NOT NULL,
  `weekend_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_class`
--

INSERT INTO `room_class` (`id`, `class_name`, `class_description`, `room_features_1`, `room_features_2`, `room_features_3`, `weekday_price`, `weekend_price`) VALUES
(1, 'EXECUTIVE ', 'Executive Suite (bedroom plus living room) for your luxury and comfort, each room comes with a luxury bathroom fitted with a shower cubicle.', 'Fully-furnished serviced residence', 'Complimentary Wi-Fi access available', 'Air Conditioning', '75.90', '70.90'),
(2, 'KING ROOM', 'The King Room has a double bed setting which is large enough for a king and queen. Enjoy luxury window gallery and comfort, a luxury bathroom fitted with a shower cubicle.', 'Fully-furnished serviced residence', 'Complimentary Wi-Fi access available', 'Air Conditioning', '55.90', '50.90'),
(3, 'STANDARD', 'The one bedroom is suited for customers who desire comfort of a well-furnished residence, it comes with a luxury bathroom fitted with a shower cubicle. ', 'Fully-furnished serviced residence', 'Complimentary Wi-Fi access available', 'Air Conditioning', '45.90', '40.90');

-- --------------------------------------------------------

--
-- Table structure for table `room_maintenance`
--

CREATE TABLE `room_maintenance` (
  `id` bigint(50) NOT NULL,
  `room_id` bigint(20) NOT NULL,
  `issue_description` text NOT NULL,
  `status_open_staff` text NOT NULL,
  `status_in_progress_staff` text NOT NULL,
  `status_close_staff` text NOT NULL,
  `status_open_date` text NOT NULL,
  `status_in_progress_date` text NOT NULL,
  `status_close_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_cart`
--

CREATE TABLE `sales_cart` (
  `id` bigint(50) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `item_name` text NOT NULL,
  `item_cat` text NOT NULL,
  `item_price` text NOT NULL,
  `item_sub_total` text NOT NULL,
  `reciept_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_cart`
--

INSERT INTO `sales_cart` (`id`, `qty`, `item_name`, `item_cat`, `item_price`, `item_sub_total`, `reciept_no`) VALUES
(1, 1, 'Frontera Red Wine', 'Wine', '15.99', '15.99', '7527922'),
(2, 1, 'Parrot Red Wine', 'Wine', '14.99', '14.99', '7527922'),
(3, 1, 'Star Beer', 'Beer', '8.99', '8.99', '7527922'),
(4, 1, 'Gulder Beer', 'Beer', '10.99', '10.99', '7527922'),
(5, 1, 'Frontera Red Wine', 'Wine', '15.99', '15.99', '7783660'),
(6, 1, 'Gulder Beer', 'Beer', '10.99', '10.99', '7783660'),
(7, 1, 'Frontera Red Wine', 'Wine', '15.99', '15.99', '5424497'),
(8, 1, 'Gulder Beer', 'Beer', '10.99', '10.99', '5424497'),
(9, 1, 'Frontera Red Wine', 'Wine', '15.99', '15.99', '6787747'),
(10, 1, 'Gulder Beer', 'Beer', '10.99', '10.99', '6787747'),
(11, 1, 'Star Beer', 'Beer', '8.99', '8.99', '7222642'),
(12, 1, 'Gulder Beer', 'Beer', '10.99', '10.99', '7222642'),
(13, 1, 'Frontera Red Wine', 'Wine', '15.99', '15.99', '7965927'),
(14, 1, 'Parrot Red Wine', 'Wine', '14.99', '14.99', '7965927'),
(15, 1, 'Frontera Red Wine', 'Wine', '15.99', '15.99', '8157781'),
(16, 1, 'Parrot Red Wine', 'Wine', '14.99', '14.99', '8157781'),
(17, 1, 'Star Beer', 'Beer', '8.99', '8.99', '8157781'),
(18, 1, 'Frontera Red Wine', 'Wine', '15.99', '15.99', '8338178'),
(19, 1, 'Parrot Red Wine', 'Wine', '14.99', '14.99', '8338178'),
(20, 1, 'Frontera Red Wine', 'Wine', '15.99', '15.99', '8457107'),
(21, 1, 'Parrot Red Wine', 'Wine', '14.99', '14.99', '8457107'),
(22, 1, 'Star Beer', 'Beer', '8.99', '8.99', '8457107'),
(23, 1, 'Gulder Beer', 'Beer', '10.99', '10.99', '8457107'),
(24, 1, 'Fanta Soft Drink', 'Soft Drinks', '5.99', '5.99', '8457107'),
(25, 3, 'Sprite Soft Drink', 'Soft Drinks', '4.99', '14.97', '8457107'),
(26, 1, 'Coke', 'Soft Drinks', '6.99', '6.99', '8457107'),
(27, 1, 'Frontera Red Wine', 'Wine', '15.99', '15.99', '8836616'),
(28, 1, 'Parrot Red Wine', 'Wine', '14.99', '14.99', '8836616');

-- --------------------------------------------------------

--
-- Table structure for table `sales_discount`
--

CREATE TABLE `sales_discount` (
  `id` bigint(50) NOT NULL,
  `sales_discount_name` text NOT NULL,
  `sales_discount_percentage` text NOT NULL,
  `sales_discount_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_discount`
--

INSERT INTO `sales_discount` (`id`, `sales_discount_name`, `sales_discount_percentage`, `sales_discount_status`) VALUES
(1, 'Promo', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_menu`
--

CREATE TABLE `sales_menu` (
  `id` bigint(50) NOT NULL,
  `item` text NOT NULL,
  `price` text NOT NULL,
  `category_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_menu`
--

INSERT INTO `sales_menu` (`id`, `item`, `price`, `category_id`) VALUES
(1, 'Fanta Soft Drink', '5.99', '1'),
(2, 'Sprite Soft Drink', '4.99', '1'),
(4, 'Coke', '6.99', '1'),
(5, 'Star Beer', '8.99', '2'),
(6, 'Gulder Beer', '10.99', '2'),
(7, 'Heineken Beer', '11.99', '2'),
(8, 'Frontera Red Wine', '15.99', '3'),
(9, 'Parrot Red Wine', '14.99', '3');

-- --------------------------------------------------------

--
-- Table structure for table `sales_menu_categories`
--

CREATE TABLE `sales_menu_categories` (
  `id` bigint(50) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_menu_categories`
--

INSERT INTO `sales_menu_categories` (`id`, `category_name`) VALUES
(1, 'Soft Drinks'),
(2, 'Beer'),
(3, 'Wine'),
(5, 'Spirits'),
(6, 'Juicing'),
(7, 'Soup');

-- --------------------------------------------------------

--
-- Table structure for table `sales_record`
--

CREATE TABLE `sales_record` (
  `id` bigint(50) NOT NULL,
  `no_items` text NOT NULL,
  `table_sales` text NOT NULL,
  `sub_total_amount` text NOT NULL,
  `discount_amount` text NOT NULL,
  `grand_total_amount` text NOT NULL,
  `discount_info` text NOT NULL,
  `payment_method` text NOT NULL,
  `reciept_no` text NOT NULL,
  `date_time` text NOT NULL,
  `customer_name` text NOT NULL,
  `customer_phonenumber` text NOT NULL,
  `customer_address` text NOT NULL,
  `booking_ref` text NOT NULL,
  `sales_staff` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_record`
--

INSERT INTO `sales_record` (`id`, `no_items`, `table_sales`, `sub_total_amount`, `discount_amount`, `grand_total_amount`, `discount_info`, `payment_method`, `reciept_no`, `date_time`, `customer_name`, `customer_phonenumber`, `customer_address`, `booking_ref`, `sales_staff`) VALUES
(1, '4', '<tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Gulder Beer</td>\r\n\r\n                    <td>Beer</td>\r\n\r\n                    <td>£ 10.99</td>\r\n\r\n                    <td>£ 10.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Star Beer</td>\r\n\r\n                    <td>Beer</td>\r\n\r\n                    <td>£ 8.99</td>\r\n\r\n                    <td>£ 8.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Parrot Red Wine</td>\r\n\r\n                    <td>Wine</td>\r\n\r\n                    <td>£ 14.99</td>\r\n\r\n                    <td>£ 14.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Frontera Red Wine</td>\r\n\r\n                    <td>Wine</td>\r\n\r\n                    <td>£ 15.99</td>\r\n\r\n                    <td>£ 15.99</td>\r\n\r\n                  </tr>', '50.96', '0', '50.96', 'NULL', 'CASH', '7527922', '1695068768', 'NULL', 'NULL', 'NULL', '', 'demo@chrys-online.com'),
(2, '2', '<tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Gulder Beer</td>\r\n\r\n                    <td>Beer</td>\r\n\r\n                    <td>£ 10.99</td>\r\n\r\n                    <td>£ 10.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Frontera Red Wine</td>\r\n\r\n                    <td>Wine</td>\r\n\r\n                    <td>£ 15.99</td>\r\n\r\n                    <td>£ 15.99</td>\r\n\r\n                  </tr>', '26.98', '0', '26.98', 'NULL', 'POS', '6787747', '1695069684', 'NULL', 'NULL', 'NULL', 'NULL', 'demo@chrys-online.com'),
(3, '2', '<tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Parrot Red Wine</td>\r\n\r\n                    <td>Wine</td>\r\n\r\n                    <td>£ 14.99</td>\r\n\r\n                    <td>£ 14.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Frontera Red Wine</td>\r\n\r\n                    <td>Wine</td>\r\n\r\n                    <td>£ 15.99</td>\r\n\r\n                    <td>£ 15.99</td>\r\n\r\n                  </tr>', '30.98', '0', '30.98', 'NULL', 'CASH', '7965927', '1695069805', 'NULL', 'NULL', 'NULL', 'NULL', 'demo@chrys-online.com'),
(4, '3', '<tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Star Beer</td>\r\n\r\n                    <td>Beer</td>\r\n\r\n                    <td>£ 8.99</td>\r\n\r\n                    <td>£ 8.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Parrot Red Wine</td>\r\n\r\n                    <td>Wine</td>\r\n\r\n                    <td>£ 14.99</td>\r\n\r\n                    <td>£ 14.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Frontera Red Wine</td>\r\n\r\n                    <td>Wine</td>\r\n\r\n                    <td>£ 15.99</td>\r\n\r\n                    <td>£ 15.99</td>\r\n\r\n                  </tr>', '39.97', '0', '39.97', 'NULL', 'POS', '8157781', '1695069825', 'NULL', 'NULL', 'NULL', 'NULL', 'demo@chrys-online.com'),
(5, '9', '<tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Coke</td>\r\n\r\n                    <td>Soft Drinks</td>\r\n\r\n                    <td>£ 6.99</td>\r\n\r\n                    <td>£ 6.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>3</td>\r\n\r\n                    <td>Sprite Soft Drink</td>\r\n\r\n                    <td>Soft Drinks</td>\r\n\r\n                    <td>£ 4.99</td>\r\n\r\n                    <td>£ 14.97</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Fanta Soft Drink</td>\r\n\r\n                    <td>Soft Drinks</td>\r\n\r\n                    <td>£ 5.99</td>\r\n\r\n                    <td>£ 5.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Gulder Beer</td>\r\n\r\n                    <td>Beer</td>\r\n\r\n                    <td>£ 10.99</td>\r\n\r\n                    <td>£ 10.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Star Beer</td>\r\n\r\n                    <td>Beer</td>\r\n\r\n                    <td>£ 8.99</td>\r\n\r\n                    <td>£ 8.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Parrot Red Wine</td>\r\n\r\n                    <td>Wine</td>\r\n\r\n                    <td>£ 14.99</td>\r\n\r\n                    <td>£ 14.99</td>\r\n\r\n                  </tr>\r\n\r\n				\r\n\r\n\r\n				  <tr>\r\n                    <td>1</td>\r\n\r\n                    <td>Frontera Red Wine</td>\r\n\r\n                    <td>Wine</td>\r\n\r\n                    <td>£ 15.99</td>\r\n\r\n                    <td>£ 15.99</td>\r\n\r\n                  </tr>', '78.91', '0', '78.91', 'NULL', 'CASH', '8457107', '1695069875', 'NULL', 'NULL', 'NULL', 'NULL', 'demo@chrys-online.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(50) NOT NULL,
  `email_address` text NOT NULL,
  `password` text NOT NULL,
  `full_name` text NOT NULL,
  `phone_number` text NOT NULL,
  `house_address` text NOT NULL,
  `main_role` text NOT NULL,
  `access_booking_record_statistics` int(11) NOT NULL DEFAULT 0,
  `access_sales_record_statistics` int(11) NOT NULL DEFAULT 0,
  `access_laundry_record_statistics` int(11) NOT NULL DEFAULT 0,
  `access_paystack` int(11) NOT NULL DEFAULT 0,
  `access_communicaton` int(11) NOT NULL DEFAULT 0,
  `access_website_management` int(11) NOT NULL DEFAULT 0,
  `last_online_time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `email_address`, `password`, `full_name`, `phone_number`, `house_address`, `main_role`, `access_booking_record_statistics`, `access_sales_record_statistics`, `access_laundry_record_statistics`, `access_paystack`, `access_communicaton`, `access_website_management`, `last_online_time`) VALUES
(1, 'demo@chrys-online.com', '123456', 'Chrysanthus Obinna', '+44 321 890 3232', 'Wigan Manchester', 'general_admin', 1, 1, 1, 1, 1, 1, 1695075543),
(4, 'martin@chrys-online.com', '123456', 'Mr Martin', '+44 212 909 4376', 'Bolton, Manchester', 'regular_staff', 0, 0, 0, 0, 1, 1, 1606855009),
(6, 'james@chrys-online.com', '123456', 'James Peter', '+44 210 478 9809', 'Oldham, Manchester', 'front_desk_staff', 0, 0, 0, 0, 0, 0, 0),
(7, 'joy@chrys-online.com', '123456', 'Joy White', '+44 778 873 9037', 'Bury, Manchester', 'sales_staff', 0, 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_last_login_date`
--

CREATE TABLE `staff_last_login_date` (
  `id` bigint(50) NOT NULL,
  `email_address` text NOT NULL,
  `time_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_last_login_date`
--

INSERT INTO `staff_last_login_date` (`id`, `email_address`, `time_date`) VALUES
(1, 'demo@chrys-online.com', '03:07:41 PM - 18th  September 2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_cart`
--
ALTER TABLE `booking_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_discount`
--
ALTER TABLE `booking_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `export_html_data`
--
ALTER TABLE `export_html_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_system_settings`
--
ALTER TABLE `hotel_system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms_class_photos`
--
ALTER TABLE `rooms_class_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_class`
--
ALTER TABLE `room_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_maintenance`
--
ALTER TABLE `room_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_cart`
--
ALTER TABLE `sales_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_discount`
--
ALTER TABLE `sales_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_menu`
--
ALTER TABLE `sales_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_menu_categories`
--
ALTER TABLE `sales_menu_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_record`
--
ALTER TABLE `sales_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_last_login_date`
--
ALTER TABLE `staff_last_login_date`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_cart`
--
ALTER TABLE `booking_cart`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking_discount`
--
ALTER TABLE `booking_discount`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `export_html_data`
--
ALTER TABLE `export_html_data`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel_system_settings`
--
ALTER TABLE `hotel_system_settings`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms_class_photos`
--
ALTER TABLE `rooms_class_photos`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `room_class`
--
ALTER TABLE `room_class`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_maintenance`
--
ALTER TABLE `room_maintenance`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales_cart`
--
ALTER TABLE `sales_cart`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sales_discount`
--
ALTER TABLE `sales_discount`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_menu`
--
ALTER TABLE `sales_menu`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales_menu_categories`
--
ALTER TABLE `sales_menu_categories`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_record`
--
ALTER TABLE `sales_record`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `staff_last_login_date`
--
ALTER TABLE `staff_last_login_date`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
