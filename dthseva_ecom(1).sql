-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 10:56 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dthseva_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
`id` int(11) NOT NULL,
  `brandname` varchar(200) NOT NULL,
  `brandlogo` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recharge_code` varchar(500) DEFAULT NULL,
  `cashback_percent` varchar(100) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brandname`, `brandlogo`, `updated_at`, `created_at`, `recharge_code`, `cashback_percent`) VALUES
(1, 'Dish TV', '153190703432515b4f0bda4a4d8Dish_TV_Logo.svg.png', '2020-06-14 06:14:46', '2018-07-18 04:13:54', 'DT', '1'),
(2, 'Tata Sky', '1531907133152135b4f0c3d0663aTata_Sky.png', '2020-06-14 11:34:56', '2018-07-18 04:15:33', 'TS', '0'),
(3, 'Videocon d2h', '153190767871475b4f0e5ea8aaeVideocon_d2h_logo-01.png', '2020-06-14 11:34:53', '2018-07-18 04:24:38', 'VD', '0'),
(4, 'Airtel Digital TV', '1531907870203785b4f0f1eb4a8eAirtel_Digital_TV.png', '2020-06-14 11:35:02', '2018-07-18 04:27:50', 'AD', '0'),
(5, 'ABCD', '159126450610419537645ed8c4fa76b6d1531315161.4.jpg', '2020-06-14 11:35:05', '2020-06-04 04:25:06', 'AB', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cancelorders`
--

CREATE TABLE IF NOT EXISTS `cancelorders` (
`id` int(11) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `orderid` varchar(200) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cancelorders`
--

INSERT INTO `cancelorders` (`id`, `productid`, `userid`, `orderid`, `reason`, `description`, `updated_at`, `created_at`) VALUES
(1, '3', '1', '8', 'wededref', '', '2018-07-23 06:30:51', '2018-07-23 06:30:51'),
(5, '16', '1', '7', 'Late Delivery', NULL, '2018-07-27 14:26:03', '2018-07-27 14:26:03'),
(6, '8', '7', '14', 'Late Delivery', NULL, '2018-07-27 16:16:23', '2018-07-27 16:16:23'),
(7, '9', '8', '16', 'Change my mind', 'no need', '2018-07-27 18:27:45', '2018-07-27 18:27:45'),
(8, '4', '3', '18', 'Late Delivery', NULL, '2018-07-28 13:26:32', '2018-07-28 13:26:32'),
(9, '11', '4', '17', 'Late Delivery', NULL, '2018-07-31 06:16:18', '2018-07-31 06:16:18'),
(10, '3', '29', '51', 'Late Delivery', NULL, '2018-08-01 09:15:54', '2018-08-01 09:15:54'),
(11, '8', '12', '23', 'Late Delivery', 'refund my money', '2018-08-01 12:49:02', '2018-08-01 12:49:02'),
(12, '3', '18', '42', 'Late Delivery', NULL, '2018-08-01 16:03:46', '2018-08-01 16:03:46'),
(13, '3', '39', '59', 'Late Delivery', NULL, '2018-08-02 09:37:52', '2018-08-02 09:37:52'),
(14, '8', '7', '85', 'Late Delivery', 'aaV', '2018-08-07 14:34:07', '2018-08-07 14:34:07'),
(15, '8', '7', '83', 'Late Delivery', 'vADV', '2018-08-07 14:34:15', '2018-08-07 14:34:15'),
(16, '3', '7', '73', 'Late Delivery', 'SVBSB', '2018-08-07 14:34:22', '2018-08-07 14:34:22'),
(17, '3', '7', '71', 'Late Delivery', 'BSFB', '2018-08-07 14:34:32', '2018-08-07 14:34:32'),
(18, '8', '78', '98', 'Late Delivery', NULL, '2018-08-08 15:32:53', '2018-08-08 15:32:53'),
(19, '3', '7', '45', 'Late Delivery', 'mfhmfxm', '2018-08-09 08:48:13', '2018-08-09 08:48:13'),
(20, '3', '7', '61', 'Late Delivery', 'mfhm', '2018-08-09 08:48:24', '2018-08-09 08:48:24'),
(21, '9', '7', '15', 'Late Delivery', 'fmfm', '2018-08-09 08:48:38', '2018-08-09 08:48:38'),
(22, '8', '7', '38', 'Late Delivery', 'mxfhm', '2018-08-09 08:48:45', '2018-08-09 08:48:45'),
(23, '8', '7', '28', 'Late Delivery', 'ffmfm', '2018-08-09 08:48:54', '2018-08-09 08:48:54'),
(24, '8', '7', '21', 'Late Delivery', 'gjg', '2018-08-09 08:49:11', '2018-08-09 08:49:11'),
(25, '9', '7', '107', 'Change my mind', 'vjhvjv', '2018-08-09 14:58:35', '2018-08-09 14:58:35'),
(26, '3', '3', '67', 'Late Delivery', NULL, '2018-08-11 13:43:26', '2018-08-11 13:43:26'),
(27, '3', '3', '66', 'Late Delivery', NULL, '2018-08-11 13:43:30', '2018-08-11 13:43:30'),
(28, '3', '3', '65', 'Late Delivery', NULL, '2018-08-11 13:43:35', '2018-08-11 13:43:35'),
(29, '19', '97', '127', 'Change my mind', 'Not cash on delivery', '2018-08-12 16:32:23', '2018-08-12 16:32:23'),
(30, '8', '97', '130', 'Late Delivery', 'Ghghh', '2018-08-12 17:57:31', '2018-08-12 17:57:31'),
(31, '8', '97', '132', 'Late Delivery', NULL, '2018-08-12 17:57:39', '2018-08-12 17:57:39'),
(32, '8', '95', '125', 'Change my mind', 'home problem', '2018-08-14 09:54:19', '2018-08-14 09:54:19'),
(33, '8', '95', '124', 'Change my mind', NULL, '2018-08-14 09:54:58', '2018-08-14 09:54:58'),
(34, '8', '95', '123', 'Change my mind', NULL, '2018-08-14 09:55:12', '2018-08-14 09:55:12'),
(35, '3', '4', '25', 'Late Delivery', NULL, '2018-08-15 11:34:26', '2018-08-15 11:34:26'),
(36, '8', '4', '131', 'Late Delivery', NULL, '2018-08-15 11:34:38', '2018-08-15 11:34:38'),
(37, '3', '4', '47', 'Late Delivery', NULL, '2018-08-15 11:34:48', '2018-08-15 11:34:48'),
(38, '3', '4', '41', 'Late Delivery', NULL, '2018-08-15 11:35:02', '2018-08-15 11:35:02'),
(39, '3', '4', '39', 'Late Delivery', NULL, '2018-08-15 11:35:18', '2018-08-15 11:35:18'),
(40, '10', '4', '33', 'Late Delivery', NULL, '2018-08-15 11:35:34', '2018-08-15 11:35:34'),
(41, '8', '99', '141', 'Late Delivery', 'not useful', '2018-08-16 16:45:10', '2018-08-16 16:45:10'),
(42, '8', '86', '111', 'Late Delivery', NULL, '2018-08-17 15:07:53', '2018-08-17 15:07:53'),
(43, '8', '95', '122', 'Change my mind', NULL, '2018-08-19 01:44:47', '2018-08-19 01:44:47'),
(44, '3', '0', '146', 'Late Delivery', NULL, '2018-08-22 18:07:15', '2018-08-22 18:07:15'),
(45, '3', '6', '68', 'Late Delivery', NULL, '2020-02-06 07:01:13', '2020-02-06 07:01:13'),
(46, '3', '119', '154', 'Change my mind', NULL, '2020-03-06 06:55:30', '2020-03-06 06:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `categoryname` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryname`, `updated_at`, `created_at`) VALUES
(1, 'ENTERTAINMENT', '2018-07-20 07:05:31', '2018-07-20 07:05:31'),
(2, 'MOVIES', '2018-07-20 07:05:39', '2018-07-20 07:05:39'),
(3, 'SPORTS', '2018-07-20 07:05:45', '2018-07-20 07:05:45'),
(4, 'NEWS', '2018-07-20 07:05:51', '2018-07-20 07:05:51'),
(5, 'Accessories', '2018-07-30 18:00:46', '2018-07-30 18:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE IF NOT EXISTS `channels` (
`id` int(11) NOT NULL,
  `channelname` varchar(200) NOT NULL,
  `channellogo` varchar(500) NOT NULL,
  `channelcategory` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `channelname`, `channellogo`, `channelcategory`, `updated_at`, `created_at`) VALUES
(1, 'ZEE CINEMA', '15326052149026512405b59b31e2b93cZee-Cinema-New.jpg', '2', '2018-07-26 15:40:14', '2018-07-20 07:06:54'),
(2, 'STAR GOLD', '15326053123977905015b59b3801e70cStar_Gold_2011.png', '2', '2018-07-26 15:41:52', '2018-07-20 07:07:10'),
(3, 'B4U', '153260538318993085655b59b3c727c44B4U_MOVIES.png', '2', '2018-07-26 15:43:03', '2018-07-20 07:07:31'),
(4, 'STAR MOVIES', '1532604804747657465b59b1844a984star movies hd.jpg.png', '1', '2018-07-26 15:33:24', '2018-07-20 07:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
`id` int(11) NOT NULL,
  `aboutus` varchar(50000) DEFAULT NULL,
  `refund` varchar(5000) DEFAULT NULL,
  `tnc` varchar(5000) DEFAULT NULL,
  `privacy` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `aboutus`, `refund`, `tnc`, `privacy`, `created_at`, `updated_at`) VALUES
(1, '<p>We are the authorized DTH service provider of Dish Tv, Tata sky,Videocon DTH, Airtel digital TV etc. in all over India with express installation within 24hrs. We also provide DTH accessories like - remote,set top box, dish antenna, etc. If anyone have booked a connection or ordered a accessory and if the connection not installed or not delivered in the given address detail then 100% amount retfundable to the customer.</p>\r\n<p>DTH SEVA gives freedom to its customers to select channels of their choice, customize their own entertainment packages and pay just for the same. As a plethora of channel packs are accessible, the customers have the free hand to build their package to suit their taste and budget.</p>\r\n<p>DTH SEVA has pioneered a ‘Customers Satisfaction Bible’ which is constantly improved, modified and updated to achieve the objective of optimizing customer’s satisfaction</p>\r\n<p>DTH SEVA provide its customers the best possible services with a strict adherence to quality. Taking special care to ensure that all possible support is provided to the customers in the best and innovative manner, DTH SEVA is the brand that works with ‘Service with a Passion’ attitude.</p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p>new dish tv connection in Ambaji,<br> new dish tv connection in Ayodhya,<br>new dish tv connection in Abids,<br>new dish tv connection in Agra,<br>new dish tv connection in Ahmedabad,<br>new dish tv connection in Ahmednagar,<br>new dish tv connection in Alappuzha,<br>new dish tv connection in Allahabad,<br>new dish tv connection in Alwar,<br>new dish tv connection in Akola,<br>new dish tv connection in Alibag<br>new dish tv connection in Almora,<br>new dish tv connection in Amlapuram,<br>new dish tv connection in Amravati,<br>new dish tv connection in Amritsar<br>new dish tv connection in Anand,<br>new dish tv connection in Anandpur Sahib,<br>new dish tv connection in Angul,<br>new dish tv connection in Anna Salai,<br>new dish tv connection in Arambagh,<br>new dish tv connection in Asansol,<br>new dish tv connection in Ajmer,<br>new dish tv connection in Amreli,<br>new dish tv connection in Aizawl,<br>new dish tv connection in Agartala,<br>new dish tv connection in Aligarh,<br>new dish tv connection in Auli,<br>new dish tv connection in Aurangabad,<br>new dish tv connection in Azamgarh,<br>new dish tv connection in Aurangabad,<br>new dish tv connection in Baran,<br>new dish tv connection in Bettiah,<br>new dish tv connection in Badaun,<br>new dish tv connection in Badrinath,<br>new dish tv connection in Balasore,<br>new dish tv connection in Banaswara,<br>new dish tv connection in Bankura,<br>new dish tv connection in Ballia,<br>new dish tv connection in Bardhaman,<br>new dish tv connection in Baripada,<br>new dish tv connection in Barrackpore,<br>new dish tv connection in Barnala,<br>new dish tv connection in Barwani,<br>new dish tv connection in Beed,<br>new dish tv connection in Beawar,<br>new dish tv connection in Bellary,<br>new dish tv connection in Bhadohi,<br>new dish tv connection in Bhadrak,<br>new dish tv connection in Bharuch,<br>new dish tv connection in Bhilai,<br>new dish tv connection in Bhilwara,<br>new dish tv connection in Bhiwani,<br>new dish tv connection in Bidar,<br>new dish tv connection in Bilaspur,<br>new dish tv connection in Bangalore,<br>new dish tv connection in Bhind,<br>new dish tv connection in Bhagalpur,<br>new dish tv connection in Bharatpur,<br>new dish tv connection in Bhavnagar,<br>new dish tv connection in Bhopal,<br>new dish tv connection in Bhubaneshwar,<br>new dish tv connection in Bhuj,<br>new dish tv connection in Bilimora,<br>new dish tv connection in Bijapur,<br>new dish tv connection in Bikaner,<br>new dish tv connection in Bodh Gaya, <br>new dish tv connection in Bokaro,<br>new dish tv connection in Bundi,<br>new dish tv connection in Barasat, <br>new dish tv connection in Bareilly, <br>new dish tv connection in Basti,<br>new dish tv connection in Bijnor, <br>new dish tv connection in Burhanpur,<br>new dish tv connection in Buxur,<br>new dish tv connection in Calangute,<br>new dish tv connection in Chandigarh,<br>new dish tv connection in Chandausi,<br>new dish tv connection in Chandauli,<br>new dish tv connection in Chandrapur,<br>new dish tv connection in Chhapra,<br>new dish tv connection in Chidambaram,<br>new dish tv connection in Chiplun,<br>new dish tv connection in Chhindwara,<br>new dish tv connection in Chitradurga,<br>new dish tv connection in Chittoor,<br>new dish tv connection in Cooch Behar,<br>new dish tv connection in Chennai,<br>new dish tv connection in Chittaurgarh,<br>new dish tv connection in Churu,<br>new dish tv connection in Coimbatore,<br>new dish tv connection in Cuddapah,<br>new dish tv connection in Cuttack,<br>new dish tv connection in Dahod,<br>new dish tv connection in Dalhousie,<br>new dish tv connection in Davangere,<br>new dish tv connection in Dehri,<br>new dish tv connection in Dewas,<br>ne</p>', '<p>Refund Policy<br><br><br><br> Cash Payment<br><br>All payment received for products or services purchased from us are covered under the Vserve Refund policy. Main requirements<br><br>a) A valid physical or online receipt should be available at the time of requesting for a refund.<br>b) In case of tangible products bought the refund is subject to return of product in original packing with all requisite hardware and catalogues. The product should be in the same condition as was at the time of delivery along with the catalogues.<br>c) In case of any other intangible service has been rendered like extra early delivery cost or faster activation service a suitable refund after expense deduction would be given.<br><br><br><br> Online payment<br><br>a) The amount which would be refunded would be the same as received from the online Payment Gateway partner. Any deductions done before we receive the payment would be borne by the customer.<br>b) The rules for Tangible and intangible services remains the same as in the case of " 1) Cash Payment".<br>c) In case of dual payment complete documentary evidence of the dual payment would have to be provided in hard copy or via email.<br>&nbsp; &nbsp; &nbsp; &nbsp;  <br>a) No refund request would be entertained after installation.<br>b) In case the customer have not provided the mandatory documents as mandated by TRAI (GoI telecom body) for the activation of a Telecom connection this would be treated as breach of trust and no refund would be provided.<br>c) In case the customer does not reside at the address / or not available at the address for which the address proof is provided and hence leads to Address Verification (TRAI requirement) negative per the Telecom service provider we would not liable to provide any refund.<br>d) Any issue related to speed or network would have to followed up with the respective Telecom service provider. No refund request for the same would be entertained as such refund would have to provided by the service provider directly.<br><br><br></p>', '<br>\r\n\r\n<div><div><h1>Terms and Condition</h1><p>PLEASE READ THESE TERMS AND CONDITIONS CAREFULLY. THESE T&amp;C, AS MODIFIED OR AMENDED FROM TIME TO TIME, ARE A BINDING CONTRACT BETWEEN THE COMPANY AND YOU. IF YOU VISIT, USE, OR SHOP AT THE SITE (or any future site operated by the company), YOU ACCEPT THESE T&amp;C. IN ADDITION, WHEN YOU USE ANY CURRENT OR FUTURE SERVICES OF THE COMPANY OR VISIT OR PURCHASE FROM ANY BUSINESS AFFILIATED WITH THE COMPANY OR THIRD PARTY VENDORS, WHETHER OR NOT INCLUDED IN THE SITE, YOU ALSO WILL BE SUBJECT TO THE GUIDELINES AND CONDITIONS APPLICABLE TO SUCH SERVICE OR MERCHANT. IF THESE CONDITIONS ARE INCONSISTENT WITH SUCH GUIDELINES AND CONDITIONS, SUCH GUIDELINES AND CONDITIONS WILL CONTROL.</p><p>If this T&amp;C conflicts with any other document, the T&amp;C will prevail for the purposes of usage of the Site. As a condition of purchase, the Site requires your permission to send you administrative and promotional emails. We will send you information regarding your account activity and purchases, as well as updates about our products and promotional offers. You can opt-out of our promotional emails anytime by clicking the unsubscribe link at the bottom of any of our email correspondences. Please see our Privacy Policy for details. We shall have no responsibility in any manner whatsoever regarding any promotional emails or SMS/MMS sent to you. The offers made in those promotional emails or SMS/MMS shall be subject to change at the sole discretion of the Company and the Company owes no responsibility to provide you any information regarding such change.</p><p>By placing an order, you make an offer to us to purchase products you have selected based on standard Site restrictions, Merchant specific restrictions, and on the terms and conditions stated below.</p><p>The Site takes no responsibility for the services or products that are sold or supplied by third party vendors. The Company makes no warranty to their end users for the quality, safety, usability, or other aspect of a product or service that is supplied by a Merchant and/for some services or activities that involve potential bodily harm (such as rock climbing, etc), and for those activities, the Company takes no responsibility for the service or activity being offered, and the User takes responsibility for his or her own actions in utilizing those services.</p><p>The Company reserves the right to make any changes to our Terms and Conditions and/ or our Privacy Policy (which is incorporated herein by reference) as we deem necessary or desirable without prior notification to you. We suggest to you, therefore, that you read our T&amp;C and Privacy Policy from time to time in order that you stay informed as to any such changes. If we make changes to our T&amp;C and Privacy Policy and you continue to use our Site, you are impliedly agreeing to the revised T&amp;C and Privacy Policy expressed herein. To read the complete Terms and Conditions, please see below.</p><p><strong>General</strong></p><p>This Agreement sets forth the terms and conditions that apply to the use of the Site by the User. By using this Site, the User agrees to comply with all of the T&amp;C hereof. The right to use the Site is personal to the User and is not transferable to any other person or entity. The User shall be responsible for protecting the confidentiality of their password(s), if any. The User acknowledges that, although the internet is often a secure environment, sometimes there are interruptions in service or events that are beyond the control of the Company, and the Company shall not be responsible for any data lost while transmitting information on the internet. While it is the Company’s objective to make the Site accessible 24 hours per day, 7 days per week, the Site may be unavailable from time to time for any reason including, without limitation, routine maintenance. You understand and acknowledge that due to circumstances both within and outside of the control of the Company, access to the Site may be interrupted, suspended or terminated from time to time. The Company shall have the right at any time to change or discontinue any aspect or feature of the Site, including, but not limited to, content, hours of availability and equipment needed for access or use. Further, the Company may discontinue disseminating any portion of information or category of information may change or eliminate any transmission method and may change transmission speeds or other signal characteristics.</p><p><strong>Modified Terms</strong></p><p>The Company reserves the right at all times to discontinue or modify any of our T&amp;C and/or our Privacy Policy as we deem necessary or desirable without prior notification to you. Such changes may include, among other things, the adding of certain fees or charges. We suggest to you, therefore, that you re-read this important notice containing our T&amp;C and Privacy Policy from time to time in order that you stay inform', '<div><u><b>Privacy Policy</b></u><u><b><li><br></li></b></u><ul><li><u><b></b></u><br></li><li><u><b>Policy A</b></u></li></ul></div><div><ul><li><u><b></b></u><br></li><li><u><b>Policy B</b></u></li><u><b>\r\n\r\n<br></b></u></ul></div><br><br>', '2020-06-04 10:19:42', '2020-06-04 04:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
`id` int(11) NOT NULL,
  `couponname` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `couponname`, `amount`, `updated_at`, `created_at`) VALUES
(2, 'DTHSEVAGFG', '100', '2018-07-30 18:19:26', '2018-07-30 07:08:45'),
(3, 'DTHSEVA200', '200', '2018-07-30 07:08:52', '2018-07-30 07:08:52'),
(4, 'DTHSEVA651', '651', '2018-07-30 18:43:53', '2018-07-30 18:43:53'),
(5, 'DTHSEVA440', '440', '2018-07-30 18:44:17', '2018-07-30 18:44:17'),
(6, 'DTH100', '100', '2018-08-12 09:06:54', '2018-08-12 09:06:54'),
(7, 'DTH200', '200', '2018-08-12 09:07:27', '2018-08-12 09:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `password`, `updated_at`, `created_at`) VALUES
(1, 'Amit Kumar', 'amitsarangi161@gmail.com', '7978547767', '12345', '2018-07-23 09:41:01', '2018-07-18 07:58:45'),
(2, 'Amit Kumar Sarangi', 'ajit@gmail.com', '7381256230', '12345', '2018-07-20 02:47:44', '2018-07-20 02:47:44'),
(3, 'SAIBAL CHAKRAVARTY', 'er.saibal.c@gmail.com', '8093000501', '111111', '2018-08-06 15:01:32', '2018-07-21 07:42:50'),
(4, 'Akash', 'akash@gmail.com', '9437919923', '123456', '2018-08-07 18:57:13', '2018-07-26 20:36:43'),
(5, 'BW DEPT1', 'dkcsdl@akdlsd.com', '8093000504', '123456', '2019-10-30 12:01:24', '2018-07-26 22:30:21'),
(6, 'Babul', 'babul@gmail.com', '7008031739', '12345', '2018-07-27 05:53:12', '2018-07-27 05:53:12'),
(7, 'Sameer biswal', 'brnayak4@gmail.com', '7809418911', '7809418911', '2018-08-09 18:35:19', '2018-07-27 08:51:28'),
(8, 'B Lenka', 'blenka@dkhealthlinks.com', '7381013430', '123456', '2018-07-27 18:16:46', '2018-07-27 18:16:46'),
(9, 'Deepak chauhan', 'dink_baba@yahoo.co.in', '9816110777', 'Paunahari@123', '2018-07-29 08:50:44', '2018-07-29 08:50:44'),
(10, 'Priyaranjan', 'prpadhi90@gmail.com', '7008350122', '7008350122', '2018-07-29 16:15:21', '2018-07-29 16:15:21'),
(11, 'DEBASHIS', 'sai.chakde@gmail.com', '9438301760', '123456', '2018-07-29 17:05:58', '2018-07-29 17:05:58'),
(12, 'Md shahalam', 'mdsahalam420@gmail.com', '8787602815', '445566', '2018-07-30 06:53:30', '2018-07-30 06:53:30'),
(13, 'Jatinder Singh', 'jatinder1521@gmail.com', '7727925152', '15217412', '2018-07-30 08:39:29', '2018-07-30 08:39:29'),
(14, 'Yadav Rakesh', 'rakeshmillingworks@yahoo.com', '8169640518', 'tds12345', '2018-07-30 09:49:02', '2018-07-30 09:49:02'),
(15, 'PRATIK PARADESHI', 'pratikparadeshi@gmail.com', '7447443227', 'dthseva', '2018-07-30 10:54:17', '2018-07-30 10:54:17'),
(16, 'Wahid', 'wahidafzalkhan1622@gmail.com', '8169353516', 'wahidlala', '2018-07-30 14:05:27', '2018-07-30 14:05:27'),
(17, 'Jitin Kumar Singh', 'jitinkumarsingh.jks@gmail.com', '7877476737', '7737783278', '2018-07-31 06:12:24', '2018-07-31 06:12:24'),
(18, 'ANIL CHOUHAN', 'anil1871@gmail.com', '9819220852', 'anil1871', '2018-07-31 08:29:40', '2018-07-31 08:29:40'),
(19, 'Amit Kumar', 'amitkumar.lalitpur@gmail.com', '8600274786', '18121980', '2018-07-31 10:49:36', '2018-07-31 10:49:36'),
(20, 'Arvind shukla', 'arvindshuklarel@gmail.com', '6260671687', 'arvind12345', '2018-07-31 11:13:24', '2018-07-31 11:13:24'),
(21, 'Asheesh', 'asheeshkumar398@gmail.com', '9415218495', 'asheesh123@', '2018-07-31 22:08:17', '2018-07-31 13:46:38'),
(22, 'Angshuman Dutta', 'angshumand9093@gmail.com', '9875330819', 'openangshu', '2018-07-31 14:08:50', '2018-07-31 14:08:50'),
(23, 'K.ravindar', 'k.ravindar1@gmail.com', '9618122873', '959697', '2018-07-31 15:03:18', '2018-07-31 15:03:18'),
(24, 'Bishal budh', 'abhirajbudh@gmail.com', '9774049598', 'abhiraj9598', '2018-07-31 17:34:21', '2018-07-31 17:34:21'),
(25, 'Sheelu Hassan', 'hashi2010@hotmail.com', '9889906418', 'hashi2010', '2018-07-31 19:12:48', '2018-07-31 19:12:48'),
(26, 'Dinesh Maloo', 'finishkumwarjain2352@gmail.com', '9375918064', '9137431186', '2018-07-31 19:59:19', '2018-07-31 19:59:19'),
(27, 'Avinash barekar', 'avinashbarekar62@gmail.com', '8999143148', '486548', '2018-08-01 08:30:05', '2018-08-01 08:30:05'),
(28, 'Amit Yadav', 'amityadav04011982@gmail.com', '7838754669', 'amit4182', '2018-08-01 08:34:45', '2018-08-01 08:34:45'),
(29, 'Jakir khan', 'sahilkhanjan691@gmail.com', '8881114645', 'jakir1993', '2018-08-01 09:16:38', '2018-08-01 09:02:32'),
(30, 'MUKESH MISHRA', 'mukeshkumar710@hormail.com', '8460492702', 'Deep@007', '2018-08-01 10:05:31', '2018-08-01 10:05:31'),
(31, 'Jyoti', 'jyotidas31@gmail.com', '7064308332', 'chinu', '2018-08-01 10:15:01', '2018-08-01 10:15:01'),
(32, 'dilshad khan', 'dilshadkhan@gmali.com', '7791964325', '666777', '2018-08-01 13:23:27', '2018-08-01 13:23:27'),
(33, 'Aqib', 'Aqib4141@gmail.com', '9431081313', 'Harun16@', '2018-08-01 16:43:44', '2018-08-01 16:43:44'),
(34, 'AMIN KHAN', 'rstar4952@gmail.com', '8200747709', '10621077', '2018-08-01 16:46:04', '2018-08-01 16:46:04'),
(35, 'vvbj jb', 'vvv@gmail.com', '7809418912', '12345', '2018-08-01 16:46:15', '2018-08-01 16:46:15'),
(36, 'kuldeep pilania', 'kpilania22@gmail.com', '7014490518', '111111', '2018-08-01 19:02:59', '2018-08-01 19:02:59'),
(37, 'CHANDAN', 'csingh00786@gmail.com', '9347369320', '2760708', '2018-08-01 19:20:59', '2018-08-01 19:20:59'),
(38, 'Prakash', 'atoz123457789@gmail.com', '9998272003', 'prak1234', '2018-08-02 08:32:13', '2018-08-02 08:32:13'),
(39, 'Sathe Abhijit Shankar', 'abhijitsathe09@gmail.com', '9923080030', 'sohan123', '2018-08-02 09:09:09', '2018-08-02 09:09:09'),
(40, 'Vicky', 'vickysumra86@gmail.com', '8082013862', 'vrushab', '2018-08-02 10:11:07', '2018-08-02 10:11:07'),
(41, 'BHUVANA', 'bhuvankagita@gmail.com', '7729922626', 'bhavana2', '2018-08-02 12:34:37', '2018-08-02 12:34:37'),
(42, 'Ajay Pal', 'yoyoajay44@gmail.com', '9111338948', 'Betu@44', '2018-08-03 09:13:50', '2018-08-03 09:13:50'),
(43, 'Mohsin', 'anjum27812@gmail.com', '9730676533', '12345678', '2018-08-03 09:43:04', '2018-08-03 09:43:04'),
(44, 'Mrs. Santosh Mehta', 'sona.sunitaluthra@gmail.com', '9810792893', 'jaimatadi', '2018-08-03 13:21:23', '2018-08-03 13:21:23'),
(45, 'VISHAL PAWAR', 'vishal.pawar19966@gmail.com', '8109146765', '8109146765@vish', '2018-08-03 20:35:26', '2018-08-03 20:35:26'),
(46, 'Vijay mishra', 'vijaymishra811@gmail.com', '9617209116', '961720vijay', '2018-08-04 06:07:28', '2018-08-04 06:07:28'),
(47, 'Sagar balu shinde', 'sachins209123@gmail.com', '7666608494', 'sachin6666', '2018-08-04 17:41:54', '2018-08-04 17:41:54'),
(48, 'Mohammed Unus', 'unus06@gmail.com', '9994279897', 'allahu@143', '2018-08-04 19:12:08', '2018-08-04 19:12:08'),
(49, 'Adarsh Badwaik', 'adarshbadwaik05@gmail.com', '9421517734', '7057508773', '2018-08-04 19:47:49', '2018-08-04 19:47:49'),
(50, 'Hansraj', 'hansrajmore1414@gmail.com', '7039436311', 'Hans9422', '2018-08-05 07:29:29', '2018-08-05 07:29:29'),
(51, 'Sivasankar mohanty', 'sivasankarmohanty455@gmail.com', '9766287992', '14301430', '2018-08-05 12:16:30', '2018-08-05 12:16:30'),
(52, 'Nizam', 'mohammedtaj001@gmail.com', '7386759600', 't@8866', '2018-08-05 12:42:48', '2018-08-05 12:42:48'),
(53, 'Shobha balu shinde', 'nitin1111shinde@gmail.com', '7066122793', 'sachin6666', '2018-08-05 14:17:08', '2018-08-05 14:17:08'),
(54, 'Narendra shivaji chaudhari', 'chaudharinarendras@gmail.com', '8888855253', '9021065708', '2018-08-06 08:33:41', '2018-08-06 08:33:41'),
(55, 'Amit Sharma', 'amit198666@gmail.com', '8700890073', 'amit1986', '2018-08-06 09:01:29', '2018-08-06 09:01:29'),
(56, 'Monday.maslyuddin', 'maslyuddin333@gmail.com', '8919655101', 'maslyuddin', '2018-08-06 09:36:05', '2018-08-06 09:36:05'),
(57, 'Akash', 'scwebde@gmail.com', '1234567890', '123456', '2018-08-06 09:36:10', '2018-08-06 09:36:10'),
(58, 'Ram Kumar', 'ramsmu2012@gmail.com', '7791851036', '9697005082', '2018-08-06 10:51:09', '2018-08-06 10:51:09'),
(59, 'Mahesh', 'mahesh.khairnar82@yahoo.com', '9168691340', '170187', '2018-08-06 13:35:45', '2018-08-06 13:35:45'),
(60, 'Mufez falke', 'falkemufaiz@gmail.com', '9594908077', 'Zamarmf1', '2018-08-06 13:37:13', '2018-08-06 13:37:13'),
(61, 'ABHINAV', 'abhiabhinavsrivastava@gmail.com', '8709334578', 'agenthitman', '2018-08-06 19:17:58', '2018-08-06 19:17:58'),
(62, 'hiuhiu', 'tgrgresrhsr@gmail.com', '3212345654', '123456', '2018-08-06 19:20:15', '2018-08-06 19:20:15'),
(63, 'Aditya', '15adityakumar@gmail.com', '9113101044', 'cutedoll', '2018-08-06 19:34:33', '2018-08-06 19:34:33'),
(64, 'Harvinder singh', 'Harvinder.harvinder925@gmail.com', '9601005410', 'sheetal@1434', '2018-08-07 08:11:13', '2018-08-07 08:11:13'),
(65, 'Manish', 'shinecity1987@gmail.com', '9918937136', 'marshall794', '2018-08-07 09:54:17', '2018-08-07 09:54:17'),
(66, 'Prabir Mukherjee', 'pmukherjee231@gmail.com', '7001434512', 'tanmoy@123', '2018-08-07 11:37:38', '2018-08-07 11:37:38'),
(67, 'MURUKESH M S', 'emmessem@gmail.com', '7015143525', 'Passw0rd', '2018-08-07 12:30:32', '2018-08-07 12:30:32'),
(68, 'Mohit Kumar Gaur', 'tmkg1212@gmail.com', '9411612617', 'mohit@12', '2018-08-07 16:05:00', '2018-08-07 16:05:00'),
(69, 'Rakesh', 'mrrakesh4848@gmail.com', '9178904848', '90484848', '2018-08-07 16:06:50', '2018-08-07 16:06:50'),
(70, 'Bandana', 'bndnaphukan@gmail.com', '7009097601', '12maina', '2018-08-07 16:22:02', '2018-08-07 16:22:02'),
(71, 'Mohammad Azharuddin', 'Mdazhair@gemil.com', '7349458816', 'azhar123', '2018-08-07 16:39:35', '2018-08-07 16:39:35'),
(72, 'Pritam kuamar', 'pritam6445singh@gmail.com', '7979004179', '1234567890', '2018-08-07 16:42:35', '2018-08-07 16:42:35'),
(73, 'Madhu Prasad R', 'r_mp71@yahoo.in', '8121465669', 'franky@71', '2018-08-07 18:25:12', '2018-08-07 18:25:12'),
(74, 'Anand jayraj landge', 'anandlandge@15gmail.com', '7208994317', '123456', '2018-08-07 18:53:07', '2018-08-07 18:53:07'),
(75, 'Sankarjit pati', 'sankarpati2000@gmail.com', '8895992186', 'abcd#1234', '2018-08-07 22:15:43', '2018-08-07 22:15:43'),
(76, 'Dablu Kumar Singh', 'shikhadablu@gmail.com', '8340191360', 'patna12345', '2018-08-08 13:43:05', '2018-08-08 13:43:05'),
(77, 'bikash', 'brm@gmail.com', '7809415263', '45214521', '2018-08-08 14:34:45', '2018-08-08 14:34:45'),
(78, 'Nitin', 'tatinyarada@gmail.com', '9978155191', 'Qwertyuiop', '2018-08-08 15:32:36', '2018-08-08 15:27:25'),
(79, 'Skn bhai', 'sarenaanil5@gmail.com', '9601040917', '48104810', '2018-08-08 16:40:45', '2018-08-08 16:40:45'),
(80, 'Douglazliz', 'janek.t9@op.pl', '81959432677', 'np3l4rzJ_p3', '2018-08-08 19:56:19', '2018-08-08 19:56:19'),
(81, 'shailendra choudhary', 'schoudhary0003@yahoo.com', '8839625272', 'Shail@990', '2018-08-09 08:56:14', '2018-08-09 08:56:14'),
(82, 'nagesh kadam`', 'sachinkadam1203@gmail.com', '9175325868', 'Nafstar@9890', '2018-08-09 09:29:33', '2018-08-09 09:29:33'),
(83, 'Dhiraj kumar', 'dhirajkr9507376031@gmail.com', '9507376031', 'AbAbAb', '2018-08-09 10:10:40', '2018-08-09 10:10:40'),
(84, 'Amjad Khan.i.sandhi', 'amjadsandhi@gmail.com', '9904012933', '17082010T', '2018-08-09 10:53:35', '2018-08-09 10:53:35'),
(85, 'Amit Kumar', 'svbvbv@gmail.com', '8480090169', '123456789', '2018-08-09 15:12:20', '2018-08-09 15:12:20'),
(86, 'Bhupinder', 'bhupi050@yahoo.com', '8875164848', 'india@123', '2018-08-09 16:52:20', '2018-08-09 16:52:20'),
(87, 'Neeraj Lehar', 'rikki.lehar@gmail.com', '9911226133', '19761979', '2018-08-10 08:42:58', '2018-08-10 08:42:58'),
(88, 'SURENDRA Yadav', 'sy81281@gmail.com', '9920244610', 'sy81281', '2018-08-11 07:22:49', '2018-08-11 07:22:49'),
(89, 'Sabestin', 'sabestin39@gmail.com', '7977294162', '9930373066', '2018-08-11 08:47:41', '2018-08-11 08:47:41'),
(90, 'Jyoti', 'jyotiranjan54@gmail.com', '8917437939', 'peacock', '2018-08-11 09:07:11', '2018-08-11 09:07:11'),
(91, 'Raval Harish N', 'raval.harish225@gmail.com', '9909029993', '251975', '2018-08-11 13:30:22', '2018-08-11 13:30:22'),
(92, 'Rahul jambhale', 'rahuljambhale3286@gmail.com', '8408993232', 'Rahul$3240', '2018-08-11 20:23:09', '2018-08-11 20:23:09'),
(93, 'SACHIN', 'sachinfakade2113@gmail.com', '7775006004', '7775006004', '2018-08-12 08:46:15', '2018-08-12 08:46:15'),
(94, 'Deepak', 'deepakahir333@gmail.com', '9990353595', 'comingyadav', '2018-08-12 09:06:32', '2018-08-12 09:06:32'),
(95, 'amjad sami', 'asifkanpur5@gmail.com', '7860050799', '7860050799', '2018-08-12 10:08:57', '2018-08-12 10:08:57'),
(96, 'Pradeep Ashok Kharat', 'pradeep29us@gmail.com', '9967253470', 'nishtha1', '2018-08-12 13:34:50', '2018-08-12 13:34:50'),
(97, 'Sanjay', 'Sanjaychohan256@gmail.com', '8770887738', 'sanjay@12', '2018-08-12 17:41:50', '2018-08-12 16:25:53'),
(98, 'Amol', 'amol8612@gmail.com', '9422868147', 'amol@8612', '2018-08-12 16:58:03', '2018-08-12 16:58:03'),
(99, 'sunil parewa', 'sonuparewa@yahoo.com', '9602450026', '9001549994', '2018-08-13 16:46:19', '2018-08-13 16:46:19'),
(100, 'Rajesh khanna', '1982.khanna@gmail.com', '9236706222', 'Varanasi', '2018-08-15 04:40:27', '2018-08-15 04:40:27'),
(101, 'SYED ABDUL SAJID', 'sajid.cubicor@gmail.com', '9398973870', 'Almostgreat', '2018-08-15 05:09:39', '2018-08-15 05:09:39'),
(102, 'Pritam nandkumar gharat', 'prit.gharat18@gmail.com', '8554870019', 'pritam18', '2018-08-15 10:21:20', '2018-08-15 10:21:20'),
(103, 'Jagadeesh', 'jagadeesh1244@gmail.com', '9032572512', 'nagasri143', '2018-08-16 13:13:52', '2018-08-16 13:13:52'),
(104, 'Deepanshu Mishra', 'love94.deepu@gmail.com', '8896880447', 'panditji', '2018-08-17 21:18:04', '2018-08-17 21:18:04'),
(105, 'Bhushan', 'bhushanmaple@gmail.com', '9960372842', 'mymomdad', '2018-08-18 13:18:22', '2018-08-18 13:18:22'),
(106, 'Shakeel', 'shakeel.1112@gmail.com', '7498367787', 'shakeel', '2018-08-21 10:12:54', '2018-08-21 10:12:54'),
(107, 'hari bharathi', 'hari.tup@gmail.com', '9894353397', 'maharaj', '2018-08-22 14:17:03', '2018-08-22 14:17:03'),
(108, 'dagwinder Kumar', 'deekay154@gmail.com', '7009470870', '0559387717', '2018-08-23 14:34:18', '2018-08-23 14:34:18'),
(109, 'IUUCUI', 'ODQUHH@gmail.com', '7478787887', 'rasmi', '2018-08-23 16:21:23', '2018-08-23 16:21:23'),
(110, 'Sanjay', 'kumarsanjay30642@gmail.com', '8076811760', 'sanj@2018', '2018-08-24 11:29:38', '2018-08-24 11:29:38'),
(111, 'Niteen kumar singh', 'sisodia.niteen@gmail.com', '9420943768', 'NKS@786#', '2019-08-19 02:29:31', '2019-08-19 02:29:31'),
(112, 'Sunburstvma', 'izexnawa@mail.com', '82716956913', 'h54rsjrF5J46788998', '2020-01-17 23:59:57', '2020-01-17 23:59:57'),
(113, 'Deepak jain', 'deepakjain48@rediffmail.com', '9937274391', 'Deepak000', '2020-02-01 16:42:30', '2020-02-01 16:42:30'),
(114, 'Jamesgef', 's.z.y.m.anskiashley5@gmail.com', '89995534949', '#6wto9y3QxQ', '2020-02-05 04:01:46', '2020-02-05 04:01:46'),
(115, 'Rajesh T R', 'trrajesh2@gmauil.com', '8129617043', 'rajmultimedia12345', '2020-02-05 11:46:17', '2020-02-05 11:46:17'),
(116, 'Praveen Varahagiri', 'varahagiripraveen@gmail.com', '8555828845', '1234567890', '2020-02-12 07:29:35', '2020-02-12 07:29:35'),
(117, 'Irshad ah', 'darirshad599@gmail.com', '9149853274', 'dar123', '2020-02-20 15:01:32', '2020-02-20 15:01:32'),
(118, 'Vishnubhai Dabhi', 'vishnubhaidabhi0@gmail.com', '9979285312', 'vkdabhi7973', '2020-02-22 04:03:56', '2020-02-22 04:03:56'),
(119, 'Jyotiprakash Das', 'dasjp7@gmail.com', '8908240268', 'jitu1234', '2020-03-06 06:53:26', '2020-03-06 06:53:26'),
(120, 'Official', 'official123@gmail.com', '123456789000', 'test123', '2020-03-06 08:41:06', '2020-03-06 08:41:06'),
(121, 'Kishore Sahoo', 'kishoresahoo2050@gmail.com', '6302532216', '123456', '2020-03-06 15:53:48', '2020-03-06 15:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
`id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobileoperators`
--

CREATE TABLE IF NOT EXISTS `mobileoperators` (
`id` int(11) NOT NULL,
  `operatorname` varchar(500) DEFAULT NULL,
  `recharge_code` varchar(500) DEFAULT NULL,
  `cashback_percent` varchar(500) DEFAULT '0',
  `brandlogo` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobileoperators`
--

INSERT INTO `mobileoperators` (`id`, `operatorname`, `recharge_code`, `cashback_percent`, `brandlogo`, `created_at`, `updated_at`) VALUES
(1, 'Airtel', 'A', '1', '159178278619712295095ee0ad82a7db81533629972.dish-25.jpg', '2020-06-10 04:23:06', '2020-06-14 05:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `mobilerechargeorders`
--

CREATE TABLE IF NOT EXISTS `mobilerechargeorders` (
`id` int(11) NOT NULL,
  `uniqueoid` int(11) DEFAULT NULL,
  `user_id` varchar(100) NOT NULL,
  `brandid` varchar(200) NOT NULL,
  `mobileno` varchar(200) NOT NULL,
  `type` varchar(500) DEFAULT NULL,
  `amount` varchar(200) NOT NULL,
  `orderstatus` varchar(200) NOT NULL,
  `paymentstatus` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `trnid` varchar(500) DEFAULT NULL,
  `api_url` text,
  `recharge_res_msg` text,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `wallet_deduction` varchar(500) DEFAULT NULL,
  `use_wallet` varchar(200) DEFAULT NULL,
  `amttopay` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mobilerechargeorders`
--

INSERT INTO `mobilerechargeorders` (`id`, `uniqueoid`, `user_id`, `brandid`, `mobileno`, `type`, `amount`, `orderstatus`, `paymentstatus`, `reason`, `trnid`, `api_url`, `recharge_res_msg`, `updated_at`, `created_at`, `wallet_deduction`, `use_wallet`, `amttopay`) VALUES
(1, 1592717723, '1', '1', '7381256230', NULL, '100', 'PENDING', 'PENDING', '', NULL, NULL, NULL, '2020-06-21 00:05:23', '2020-06-21 00:05:23', '10', 'Y', '90'),
(2, 1592717964, '1', '1', '7381256230', NULL, '10', 'PENDING', 'PENDING', '', NULL, NULL, NULL, '2020-06-21 00:09:24', '2020-06-21 00:09:24', NULL, 'N', '10'),
(3, 1592717977, '1', '1', '7381256230', NULL, '10', 'PENDING', 'PENDING', '', NULL, NULL, NULL, '2020-06-21 00:09:37', '2020-06-21 00:09:37', '10', 'Y', '0'),
(4, 1592718009, '1', '1', '7381256230', NULL, '9', 'PENDING', 'PENDING', '', NULL, NULL, NULL, '2020-06-21 00:10:09', '2020-06-21 00:10:09', '9', 'Y', '0'),
(5, 1592718170, '1', '1', '7381256230', NULL, '10', 'PENDING', 'PENDING', '', NULL, NULL, NULL, '2020-06-21 00:12:50', '2020-06-21 00:12:50', '10', 'Y', '0'),
(6, 1592737561, '1', '1', '7978547767', NULL, '10', 'FAILED', 'PENDING', '', 'OID1592737561MOBCUSTID1', 'http://onepayexpress.com/OpayeAdmin/RechargeAPI.aspx?UserID=7008031739&PASSWORD=256325&MobileNo=7008031739&Message=A$7978547767$10$9252$0$OID1592737561MOBCUSTID1', '2=Insufficient Balance=0', '2020-06-21 05:36:03', '2020-06-21 05:36:01', '10', 'Y', '0'),
(7, 1592737630, '1', '1', '7978547767', NULL, '30', 'FAILED', 'FAILED', '', NULL, NULL, NULL, '2020-06-21 05:55:32', '2020-06-21 05:37:10', '10', 'Y', '20'),
(8, 1592738753, '1', '1', '7978547767', NULL, '19', 'PENDING', 'PENDING', '', NULL, NULL, NULL, '2020-06-21 05:55:53', '2020-06-21 05:55:53', '10', 'Y', '9'),
(9, 1592738807, '1', '1', '7978547767', NULL, '100', 'PENDING', 'PENDING', '', NULL, NULL, NULL, '2020-06-21 05:56:47', '2020-06-21 05:56:47', '10', 'Y', '90'),
(10, 1592738859, '1', '1', '7978547767', NULL, '100', 'PENDING', 'PENDING', '', NULL, NULL, NULL, '2020-06-21 05:57:39', '2020-06-21 05:57:39', '10', 'Y', '90'),
(11, 1592739472, '1', '1', '7381256230', NULL, '50', 'PENDING', 'PENDING', '', NULL, NULL, NULL, '2020-06-21 06:07:52', '2020-06-21 06:07:52', '10.26', 'Y', '39.74');

-- --------------------------------------------------------

--
-- Table structure for table `onepayresponses`
--

CREATE TABLE IF NOT EXISTS `onepayresponses` (
`id` int(11) NOT NULL,
  `resid` varchar(500) DEFAULT NULL,
  `tno` varchar(100) DEFAULT NULL,
  `st` varchar(100) DEFAULT NULL,
  `stmsg` varchar(100) DEFAULT NULL,
  `tid` varchar(100) DEFAULT NULL,
  `oprtid` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `prb` varchar(100) DEFAULT NULL,
  `pob` varchar(100) DEFAULT NULL,
  `dp` varchar(100) DEFAULT NULL,
  `dr` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onepayresponses`
--

INSERT INTO `onepayresponses` (`id`, `resid`, `tno`, `st`, `stmsg`, `tid`, `oprtid`, `mobile`, `amount`, `prb`, `pob`, `dp`, `dr`, `created_at`, `updated_at`) VALUES
(1, '0', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-11 11:07:38', '2020-06-11 11:07:38'),
(2, 'admin', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-11 11:09:10', '2020-06-11 11:09:10'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:12:34', '2020-06-13 00:12:34'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:14:04', '2020-06-13 00:14:04'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:17:22', '2020-06-13 00:17:22'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:18:07', '2020-06-13 00:18:07'),
(7, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:21:25', '2020-06-13 00:21:25'),
(8, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:22:20', '2020-06-13 00:22:20'),
(9, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:23:51', '2020-06-13 00:23:51'),
(10, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:24:17', '2020-06-13 00:24:17'),
(11, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:25:41', '2020-06-13 00:25:41'),
(12, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:25:42', '2020-06-13 00:25:42'),
(13, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:25:44', '2020-06-13 00:25:44'),
(14, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:25:59', '2020-06-13 00:25:59'),
(15, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:26:13', '2020-06-13 00:26:13'),
(16, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:27:32', '2020-06-13 00:27:32'),
(17, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:27:57', '2020-06-13 00:27:57'),
(18, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:29:15', '2020-06-13 00:29:15'),
(19, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:30:01', '2020-06-13 00:30:01'),
(20, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:46:20', '2020-06-13 00:46:20'),
(21, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:48:21', '2020-06-13 00:48:21'),
(22, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:50:16', '2020-06-13 00:50:16'),
(23, 'OnePayExpress', 'OID90MOBCUSTID1', '1', 'Success', '20019262', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-13 00:57:21', '2020-06-13 00:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `orderaddresses`
--

CREATE TABLE IF NOT EXISTS `orderaddresses` (
`id` int(11) NOT NULL,
  `orderid` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderaddresses`
--

INSERT INTO `orderaddresses` (`id`, `orderid`, `address`, `pincode`, `city`, `state`, `updated_at`, `created_at`) VALUES
(26, '1', 'dsgef', 'fgfsg', 'fgrfgf', 'dfsgfsg', '2018-07-27 11:55:32', '2018-07-27 11:55:32'),
(27, '2', 'fgh', 'fgfd', 'fgg', 'gfg', '2018-07-27 11:56:16', '2018-07-27 11:56:16'),
(28, '3', 'dsfdsfg', 'sdfds', 'dgsf', 'sdfg', '2018-07-27 11:59:22', '2018-07-27 11:59:22'),
(29, '4', 'dsfdsfg', 'dsffg', 'dsgfdg', 'dgrfgf', '2018-07-27 12:04:22', '2018-07-27 12:04:22'),
(30, '5', 'sdafsdf', 'fgdfgh', 'fdh', 'dsgfdg', '2018-07-27 12:08:22', '2018-07-27 12:08:22'),
(31, '6', 'dghfg', 'fghfdh', 'fgfdh', 'hgfjh', '2018-07-27 12:15:31', '2018-07-27 12:15:31'),
(32, '7', 'daf', 'gd', 'fg', 'fdgd', '2018-07-27 13:53:06', '2018-07-27 13:53:06'),
(33, '8', 'daf', 'gd', 'fg', 'fdgd', '2018-07-27 13:55:47', '2018-07-27 13:55:47'),
(34, '9', 'yy', '155225', 'uju', 'uu', '2018-07-27 14:13:16', '2018-07-27 14:13:16'),
(35, '10', 'yy', '155225', 'uju', 'uu', '2018-07-27 14:30:41', '2018-07-27 14:30:41'),
(36, '11', 'fffgg', '545454', '4gf5g45', 'ggh', '2018-07-27 14:32:57', '2018-07-27 14:32:57'),
(37, '12', 'drgdfg', '6565656', 'cfghcdghg', 'fghfghf', '2018-07-27 14:42:26', '2018-07-27 14:42:26'),
(38, '13', 'hjbbkhjghj', '44s54', 'fdr', 'sdf', '2018-07-27 15:04:05', '2018-07-27 15:04:05'),
(39, '14', 'Jaba', '751013', 'Bhubaneswar', 'Odisha', '2018-07-27 16:05:21', '2018-07-27 16:05:21'),
(40, '15', 'Bhubaneswar', '751013', 'Bhubaneswar', 'Odisha', '2018-07-27 16:07:06', '2018-07-27 16:07:06'),
(41, '16', '11/B, 3rd Floor, PNR Tower, Janpath Road, Satya Nagar,', '751007', 'BHUBANESWAR', 'Odisha', '2018-07-27 18:17:36', '2018-07-27 18:17:36'),
(42, '17', 'Uf7f6yffuffg', '751013', 'Bhubaneswar', 'Orissa', '2018-07-28 08:13:44', '2018-07-28 08:13:44'),
(43, '18', 'Plot-27,District Center,CS Pur', '751016', 'Bhubaneswar', 'Orissa', '2018-07-28 13:25:41', '2018-07-28 13:25:41'),
(44, '19', 'H no 21 Harikrishna enclave dakoli Zirakpur punjab', '140603', 'Zirakpur', 'Punjab', '2018-07-29 08:53:27', '2018-07-29 08:53:27'),
(45, '20', 'Brundaban Padhi\r\nLectures Colony, Belaguntha, Ganjam', '761119', 'Belaguntha, Ganjam', 'Odisha', '2018-07-29 16:17:37', '2018-07-29 16:17:37'),
(46, '21', 'Adenigarh', '751013', 'Bhubaneswar', 'Odisha', '2018-07-29 16:19:48', '2018-07-29 16:19:48'),
(47, '22', 'MR-44.BBSR', '888999', 'BBSR', 'ODISHA', '2018-07-29 17:06:46', '2018-07-29 17:06:46'),
(48, '23', 'Dineshnagar, Mukandapur', '700099', 'Kolkata', 'West Bengal', '2018-07-30 06:55:50', '2018-07-30 06:55:50'),
(49, '24', 'Bahadur Singh Enclave Shikargarh', '342001', 'Jodhpur', 'Rajsthan', '2018-07-30 08:47:10', '2018-07-30 08:47:10'),
(50, '25', 'Dggfy', '751015', 'Bhubaneswar', 'Orissa', '2018-07-30 08:48:30', '2018-07-30 08:48:30'),
(51, '26', 'kalpana niwas mohilivilleg PARERAWADI SAKINAKA pipeline opp rajivgandhi shcool.near saibaba tempal', '400072', 'mumbai', 'Maharashtra', '2018-07-30 09:51:41', '2018-07-30 09:51:41'),
(52, '27', 'kalpana niwas mohilivilleg PARERAWADI SAKINAKA pipeline opp rajivgandhi shcool.near saibaba tempal', '400072', 'mumbai', 'Maharashtra', '2018-07-30 09:53:44', '2018-07-30 09:53:44'),
(53, '28', 'Bebeb', '751016', 'Bhubaneswar', 'Odisha', '2018-07-30 09:53:59', '2018-07-30 09:53:59'),
(54, '29', 'Flat No 307, A wing, Phase 2, Renuka Gulmohar Society, Behind City One Mall, Pimpri Chinchwad, Pune.', '411018', 'Pune', 'Maharastra', '2018-07-30 13:31:06', '2018-07-30 13:31:06'),
(55, '30', 'Room no 1 sham aptm near ms college kadar place kausa Mumbra', '400612', 'Thane', 'Maharashtra', '2018-07-30 14:07:05', '2018-07-30 14:07:05'),
(56, '31', 'Room no 1 sham aptm near ms college kadar place kausa Mumbra', '400612', 'Thane', 'Maharashtra', '2018-07-30 14:10:02', '2018-07-30 14:10:02'),
(57, '32', 'Room no sham aptm near ms college kausa kadar palace Mumbra', '400612', 'Thane', 'Maharashtra', '2018-07-30 16:25:06', '2018-07-30 16:25:06'),
(58, '33', 'Fufuh', '765456', 'Fyfgg', 'Fyfyygg', '2018-07-30 16:27:58', '2018-07-30 16:27:58'),
(59, '34', 'sadsg', 'ttr', 'retet', 'rey', '2018-07-30 17:58:20', '2018-07-30 17:58:20'),
(60, '35', 'dsfds', 'dsfgds', 'fgfdgh', 'fgfdhg', '2018-07-30 17:59:16', '2018-07-30 17:59:16'),
(61, '36', 'dsfds', 'dsfgds', 'fgfdgh', 'fgfdhg', '2018-07-30 18:01:37', '2018-07-30 18:01:37'),
(62, '37', 'yygyg', '7657676', 'fyhtt', 'eddfggh', '2018-07-30 18:10:30', '2018-07-30 18:10:30'),
(63, '38', 'Gjbvv', '751016', 'Bhubaneswar', 'Odisha', '2018-07-30 18:53:16', '2018-07-30 18:53:16'),
(64, '39', 'Yyfghh', '751013', 'Ftyh', 'Odisha', '2018-07-31 06:19:25', '2018-07-31 06:19:25'),
(65, '40', '81 Srirampuri niwaru road Jhotwara', '302020', 'Jaipur', 'Rajshthan', '2018-07-31 06:31:50', '2018-07-31 06:31:50'),
(66, '41', 'Eegegdudj', 'Shsgdgg', 'Dhdhdh', 'Ehsh', '2018-07-31 06:31:56', '2018-07-31 06:31:56'),
(67, '42', 'Hari Om colony 10/04 ,jari Mari Nagar, shivaji colony road , opp shrungar book depo , kolsewadi , Kalyan (e)', '421306', 'Kalyan', 'Mahrashtra', '2018-07-31 08:50:09', '2018-07-31 08:50:09'),
(68, '43', 'Post office road,awashiya colony', '486886', 'Waidhan', 'Madhya pradesh', '2018-07-31 11:17:13', '2018-07-31 11:17:13'),
(69, '44', 'Mythri nagar road 5. Saroor nagar. Lb nagar hyderabad', '500074', 'Hyderabad', 'Telangana', '2018-07-31 15:06:11', '2018-07-31 15:06:11'),
(70, '45', 'Gyyggy', '751016', 'Bhubaneswar', 'Odisha', '2018-07-31 15:06:12', '2018-07-31 15:06:12'),
(71, '46', '419/11d,hata Surat Singh Chowk Lucknow', '226003', 'Lucknow', 'Up', '2018-07-31 19:18:55', '2018-07-31 19:18:55'),
(72, '47', 'Shsgsgs', 'Whshsg', 'Svsvg', 'Sbsbwb', '2018-07-31 19:18:59', '2018-07-31 19:18:59'),
(73, '48', 'A,21. Khodiyarpark sociaty near navrang school  odhav. Ahmedabad', '382415', 'Ahmedabad', 'Gujrat', '2018-07-31 20:05:13', '2018-07-31 20:05:13'),
(74, '49', 'Vikash nagar civil line', '440001', 'nagpur', 'MH', '2018-08-01 08:36:12', '2018-08-01 08:36:12'),
(75, '50', '2/339 nawabvganj kanpur', '208002', 'Kanpur', 'Uttar Pradesh', '2018-08-01 08:36:52', '2018-08-01 08:36:52'),
(76, '51', 'Akhand nagar naripura agra', '282001', 'Agra', 'U.p', '2018-08-01 09:06:42', '2018-08-01 09:06:42'),
(77, '52', 'Akhand nagar naripura agra', '282001', 'Agra', 'U.p', '2018-08-01 09:12:13', '2018-08-01 09:12:13'),
(78, '53', 'Building no.H suman anand \r\nNear ryan international schools', '395007', 'SURAT', 'GUJRAT', '2018-08-01 10:11:20', '2018-08-01 10:11:20'),
(79, '54', '//????nnjnj', '751013', 'bhubaneswar', 'odisha', '2018-08-01 16:48:50', '2018-08-01 16:48:50'),
(80, '55', 'LIMBAYAT,NEAR MAYUR CINEMA.BEHIND  MAYUR HALL.UDHNAYARD,UDHNA,SURAT.', '394210', 'Surat', 'Gujarat', '2018-08-01 16:48:51', '2018-08-01 16:48:51'),
(81, '56', 'LIMBAYAT,NEAR MAYUR CINEMA.BEHIND  MAYUR HALL.UDHNAYARD,UDHNA,SURAT.', '394210', 'Surat', 'Gujarat', '2018-08-01 16:49:43', '2018-08-01 16:49:43'),
(82, '57', '963, ranveer singh shektawat marg', '302019', 'Jaipur', 'Rajastan', '2018-08-01 19:04:32', '2018-08-01 19:04:32'),
(83, '58', 'N1/12BC7-A , NAGWA GANGOTRI VIHAR\r\nCOLONY(RAVIDAS PARK), RAVIDAS PARK\r\nUTTAR PRADESH, 221005', '221005', 'Varanasi', 'Utter pradesh', '2018-08-02 06:38:27', '2018-08-02 06:38:27'),
(84, '59', 'B-81, S.P. Pune University, Staff Quarters, near Estate Office, Ganesh Khind road, Pune.', '411007', 'Pune', 'Maharashtra', '2018-08-02 09:24:18', '2018-08-02 09:24:18'),
(85, '60', 'B-81, S.P. Pune University, Staff Quarters, near Estate Office, Ganesh Khind road, Pune.', '411007', 'Pune', 'Maharashtra', '2018-08-02 09:26:43', '2018-08-02 09:26:43'),
(86, '61', 'Tvtvtv', '751013', 'Bhubaneswar', 'Orissa', '2018-08-02 10:25:29', '2018-08-02 10:25:29'),
(87, '62', 'New,c''block 3rd floor,room no.48,mavji Rathod road.mum-400009', '400009', 'Mumbai', 'Maharashtra', '2018-08-02 10:25:38', '2018-08-02 10:25:38'),
(88, '64', '10-132;F3\r\nURDU SCHOOL BAZAR', '521165', 'VUYYURU', 'ANDHRA PRADESH', '2018-08-02 12:43:57', '2018-08-02 12:43:57'),
(89, '65', 'jhdscjd', '999999', 'odisha', 'odis', '2018-08-02 13:05:27', '2018-08-02 13:05:27'),
(90, '66', 'jhdscjd', '999999', 'odisha', 'odis', '2018-08-02 13:08:02', '2018-08-02 13:08:02'),
(91, '67', 'sddf', '999116', 'sdff', 'edf', '2018-08-02 15:21:09', '2018-08-02 15:21:09'),
(92, '68', '22efrrr', '751016', 'rrrrr', 'rrrr', '2018-08-03 11:37:29', '2018-08-03 11:37:29'),
(93, '69', 'A2/108 Ground Floor, Back side, Janakpuri', '110058', 'Janakpuri', 'New Delhi', '2018-08-03 13:24:39', '2018-08-03 13:24:39'),
(94, '70', 'House no a 14 shaheeh hemu colony rohit nagar phase 1 bhopal\r\nBetul', '462039', 'Bhopal', 'MADHYA PRADESH', '2018-08-03 20:38:14', '2018-08-03 20:38:14'),
(95, '71', 'AS`', '750113', 'BBSR', 'odisha', '2018-08-04 13:47:39', '2018-08-04 13:47:39'),
(96, '72', 'Bldg no 5,first floor,b-102,standard society,sec 9,mahalaxmi Nagar,nere,dist raigarh,new panvel.', '410206', 'Navi Mumbai', 'Maharashtra', '2018-08-04 17:46:35', '2018-08-04 17:46:35'),
(97, '73', 'Jaydeb vihar\r\nPlot no-199 lane no-3 jaydev vihar', '751013', 'Bhubaneswar', 'Orissa', '2018-08-05 11:25:49', '2018-08-05 11:25:49'),
(98, '74', 'Suvarna apartment ,4th floor, sabe Road ,Near Vitthal Mandir ,Diva East ,Thane ,pin code 400612', '400612', 'Diva East [Thane]', 'Maharashtra', '2018-08-05 11:26:01', '2018-08-05 11:26:01'),
(99, '75', 'Suvarna apartment,4th floor ,sabe Road, Near Vitthal Mandir ,Diva East Thane', '400612', 'Diva East [Thane]', 'Maharashtra', '2018-08-05 11:29:23', '2018-08-05 11:29:23'),
(100, '76', '10-5-23, kameshwar Rao colony,lingojiguda,saroor nagar', '500035', 'HYDERABAD', 'TELANGANA', '2018-08-05 12:51:08', '2018-08-05 12:51:08'),
(101, '77', 'Bldg no 5,b-102,standard society,Mahalaxmi Nagar,nere,dist-raigad,new Panvel.', '410206', 'New mumbai', 'Maharashtra', '2018-08-05 14:22:53', '2018-08-05 14:22:53'),
(102, '78', 'Police housing sosaity adgav nashik', '422003', 'Nashik', 'Maharashtra', '2018-08-06 08:38:17', '2018-08-06 08:38:17'),
(103, '79', 'GROUND FLOOR,BH75 (WEST), SHALIMAR BAGH, NEAR JASPAL KAUR PUBLIC SCHOOL', '110088', 'Delhi', 'Delhi', '2018-08-06 09:09:15', '2018-08-06 09:09:15'),
(104, '80', 'Jaydeb vihar\r\nPlot no-199 lane no-3 jaydev vihar', '751013', 'Bhubaneswar', 'Orissa', '2018-08-06 09:38:26', '2018-08-06 09:38:26'),
(105, '81', '18-2-44/1/a1', '500005', 'Hyderabad', 'Telangana', '2018-08-06 09:38:44', '2018-08-06 09:38:44'),
(106, '82', 'Deshatha Rugved hall, bajirav nagar, goind nagar link rd, Tidke colony, nashik', '422009', 'Nashik', 'Maharashtra', '2018-08-06 13:38:43', '2018-08-06 13:38:43'),
(107, '83', 'Jaydeb vihar\r\nPlot no-199 lane no-3 jaydev vihar', '751013', 'Bhubaneswar', 'Orissa', '2018-08-06 13:41:11', '2018-08-06 13:41:11'),
(108, '84', '10/11 hafiza begum bldg,  doodh naka bunder road kalyan w.', '421301', 'Kalyan', 'Maharashtra', '2018-08-06 13:44:22', '2018-08-06 13:44:22'),
(109, '85', 'Jaydeb vihar\r\nPlot no-199 lane no-3 jaydev vihar', '751013', 'Bhubaneswar', 'Orissa', '2018-08-06 13:44:30', '2018-08-06 13:44:30'),
(110, '86', 'Deshastha Rugved hall, bajirav nagar, Tidke colony, nashik.', '422009', 'Nashik', 'Maharashtra', '2018-08-06 13:46:23', '2018-08-06 13:46:23'),
(111, '87', 'Deshastha Rugved hall, bajirav nagar, Tidke colony, nashik.', '422009', 'Nashik', 'Maharashtra', '2018-08-06 13:50:11', '2018-08-06 13:50:11'),
(112, '88', 'Bindapur matiyala road T47 /48  uttam nagar west near friday market new delhi', '110059', 'New delhi', 'New delhi', '2018-08-06 19:20:04', '2018-08-06 19:20:04'),
(113, '89', 'Manish Kumar\r\nD1/179\r\n,8th main 10 cross\r\nVinayak nagar murgeshpalliya\r\nBanglore 560017', '560017', 'Banglore', 'Karnataka', '2018-08-07 09:56:49', '2018-08-07 09:56:49'),
(114, '90', 'Manish Kumar\r\nD1/179\r\n,8th main 10 cross\r\nVinayak nagar murgeshpalliya\r\nBanglore 560017', '560017', 'Banglore', 'Karnataka', '2018-08-07 10:01:02', '2018-08-07 10:01:02'),
(115, '91', 'Village Barolla near Verma jewellers sec 49 noida', '201301', 'Noida', 'Up', '2018-08-07 16:11:25', '2018-08-07 16:11:25'),
(116, '92', '#316  First 1st Main Road T Dasarahalli Pincode 560057', '560057', 'Bangalore', 'KARNATAKA', '2018-08-07 16:46:52', '2018-08-07 16:46:52'),
(117, '93', 'Flat: 101 ; Lane No: 6 ; R.C.K Residency ; Old Bowenpally ; Adjacent to Venkateshwara Steel Traders ; R.R. Nagar Road;    \r\nSecunderabad - 500011; Telangana ; India', '500011', 'Hyderabad', 'Telangana', '2018-08-07 18:33:00', '2018-08-07 18:33:00'),
(118, '94', 'Panchashil nagar mohone galegav Ambivali est HN rod bas stop.', '421102', 'Kalyan', 'Anand', '2018-08-07 18:58:37', '2018-08-07 18:58:37'),
(119, '95', '1870/2541, (sridham), sriram nagar,, lane 7, samantarapur', '751002', 'Bhubaneswar', 'Odisha', '2018-08-07 22:20:17', '2018-08-07 22:20:17'),
(120, '96', 'bfbcqabakb', '751015', 'bhubaneswar', 'odisha', '2018-08-08 14:35:18', '2018-08-08 14:35:18'),
(121, '97', '30-kh Balupar Kurji (Near Railway Laundry)', '800010', 'PATNA', 'Bihar', '2018-08-08 15:08:42', '2018-08-08 15:08:42'),
(122, '98', '79-snehmilan soc, chikuwadi, nana varachha road', '395006', 'Surat', 'Gujarat', '2018-08-08 15:29:44', '2018-08-08 15:29:44'),
(123, '99', '178 ground floor new Durga colony', '452015', 'indore', 'madhya pradesh', '2018-08-09 09:02:52', '2018-08-09 09:02:52'),
(124, '100', 'H/no.-2 ,Nav vikas lane,  Ashiana nagar, phase -2 Beside - Sangam apartment', '800025', 'Patna', 'Bihar', '2018-08-09 10:16:36', '2018-08-09 10:16:36'),
(125, '101', '62,Faridabad society,opp jantanagar,ramol rod, ramol, Ahmedabad,', '382449', 'Ahmedabad', 'Gujarat', '2018-08-09 10:56:31', '2018-08-09 10:56:31'),
(126, '102', '62,Faridabad society,opp jantanagar,ramol rod, ramol, Ahmedabad,', '382449', 'Ahmedabad', 'Gujarat', '2018-08-09 10:59:12', '2018-08-09 10:59:12'),
(127, '106', 'mh', '456321', 'gmxghm', 'fmfhm', '2018-08-09 14:48:55', '2018-08-09 14:48:55'),
(128, '107', 'sbsb', '456321', 'gmxghm', 'fmfhm', '2018-08-09 14:50:51', '2018-08-09 14:50:51'),
(129, '108', 'nknjk', '456321', 'vasdv', 'dfqwf', '2018-08-09 15:00:21', '2018-08-09 15:00:21'),
(130, '109', 'dgndgn', '456321', 'fbfb', 'fbfb', '2018-08-09 15:13:15', '2018-08-09 15:13:15'),
(131, '110', 'vhvhv', '456321', 'vkvk', 'hgchgc', '2018-08-09 16:41:27', '2018-08-09 16:41:27'),
(132, '111', '2/400 satkar shopping centre', '302017', 'Jaipur', 'Rajasthan', '2018-08-09 16:55:28', '2018-08-09 16:55:28'),
(133, '112', 'Jaydeb vihar\r\nPlot no-199 lane no-3 jaydev vihar', '751013', 'Bhubaneswar', 'Orissa', '2018-08-09 18:31:06', '2018-08-09 18:31:06'),
(134, '113', 'bfbcqabakb', '751015', 'bhubaneswar', 'odisha', '2018-08-10 08:48:03', '2018-08-10 08:48:03'),
(135, '114', 'B/01 swapna ranjan society plot no 146 new khada pawar Nagar thane west', '400610', 'Thane', 'Maharashtra', '2018-08-11 08:49:16', '2018-08-11 08:49:16'),
(136, '115', 'B/01 swapna ranjan society plot no 146 new khada pawar Nagar thane west', '400610', 'Thane', 'Maharashtra', '2018-08-11 08:49:52', '2018-08-11 08:49:52'),
(137, '116', 'Ctc', '753012', 'Ctc', 'Odisha', '2018-08-11 09:10:05', '2018-08-11 09:10:05'),
(138, '117', 'B/01 swapna ranjan society plot no 146 new khada pawar Nagar thane west', '400610', 'Thane', 'Maharashtra', '2018-08-11 09:10:51', '2018-08-11 09:10:51'),
(139, '118', 'B/01 swapna ranjan society plot no 146 new khada pawar Nagar thane w 400610', '400610', 'Thane', 'Maharashtra', '2018-08-11 09:13:57', '2018-08-11 09:13:57'),
(140, '119', 'Ctc', '753012', 'Ctc', 'Odisha', '2018-08-11 09:16:20', '2018-08-11 09:16:20'),
(141, '120', 'Flat No - A/302, Laxhman Parvati Residency, 3rd Floor, Shivne -Nanded Road,  Nr. Shivne MSEB Head Office, Shivne, Pune - 411023', '411023', 'Pune', 'Maharashtra', '2018-08-11 20:29:58', '2018-08-11 20:29:58'),
(142, '121', 'B308, 3rd floor,Hari om pooja apt,dinkar nagar ,adiwali,kalyan east ,Maharashtra', '421301', 'Kalyan', 'Maharashtra', '2018-08-11 20:36:59', '2018-08-11 20:36:59'),
(143, '122', '78/13 mool ganj ..bangel street near hotel kanpur delux', '208001', 'kanpur', 'up', '2018-08-12 10:10:48', '2018-08-12 10:10:48'),
(144, '123', '78/13 mool ganj', '208001', 'kanpur', 'up', '2018-08-12 10:13:37', '2018-08-12 10:13:37'),
(145, '124', '78/13 mool ganj', '208001', 'kanpur', 'up', '2018-08-12 12:42:27', '2018-08-12 12:42:27'),
(146, '125', '78/13 mool ganj', '208001', 'kanpur', 'up', '2018-08-12 12:59:15', '2018-08-12 12:59:15'),
(147, '126', 'Nav Tulsi CHS. ltd. 301,3 rd floor, Poornima Talkies, Kalyan (W)', '421301', 'Kalyan', 'Maharashtra', '2018-08-12 13:39:21', '2018-08-12 13:39:21'),
(148, '127', '209 Shubham Palace near scheme number 51', '452006', 'Indore', 'Madhya Pradesh', '2018-08-12 16:28:33', '2018-08-12 16:28:33'),
(149, '128', '14/21 type 1 range hill estates khadki pune', '411020', 'Pune', 'Maharashtra', '2018-08-12 16:59:47', '2018-08-12 16:59:47'),
(150, '129', '14/21 type 1 range hill estates khadki pune', '411020', 'Pune', 'Maharashtra', '2018-08-12 17:00:38', '2018-08-12 17:00:38'),
(151, '130', 'Shubhan palsh shikim no 51', '452006', 'Indore', 'M.p', '2018-08-12 17:48:07', '2018-08-12 17:48:07'),
(152, '131', 'Jaydeb vihar\r\nPlot no-199 lane no-3 jaydev vihar', '751013', 'Bhubaneswar', 'Orissa', '2018-08-12 17:48:58', '2018-08-12 17:48:58'),
(153, '132', 'Shubham Palace near  scheme number 51', '452006', 'Indore', 'Madhya Pradesh', '2018-08-12 17:54:24', '2018-08-12 17:54:24'),
(154, '133', 'Shubham Palace near  scheme number 51', '452006', 'Indore', 'Madhya Pradesh', '2018-08-12 17:56:00', '2018-08-12 17:56:00'),
(155, '134', 'Add: Ismailiya farms,\r\n Raita Badlapur Road, \r\nVaholi gaon .....\r\n Reliance co. Road \r\nRaita vaholi ..... \r\nMurbaad road \r\nKalyan 421301\r\n\r\n\r\n\r\nPh no.9594908077\r\nPh no.8689887959', '421301', 'Kalyan', 'Maharashtra', '2018-08-13 13:26:35', '2018-08-13 13:26:35'),
(156, '135', 'Jaydeb vihar\r\nPlot no-199 lane no-3 jaydev vihar', '751013', 'Bhubaneswar', 'Orissa', '2018-08-14 19:31:27', '2018-08-14 19:31:27'),
(157, '136', '18-7-425/506\r\nAMAN NAGAR B TALAB KATTA', '500002', 'HYDERABAD', 'TELENGANA', '2018-08-15 05:15:38', '2018-08-15 05:15:38'),
(158, '137', 'Juinagar sector 23 near gavdevi maidan \r\nOpposite to ragunatth nivas', '400705', 'Navi Mumbai', 'Maharashtra', '2018-08-15 10:26:37', '2018-08-15 10:26:37'),
(159, '138', 'Juinagar sector 23 near gavdevi maidan \r\nOpposite to ragunatth nivas', '400705', 'Navi Mumbai', 'Maharashtra', '2018-08-15 10:28:54', '2018-08-15 10:28:54'),
(160, '139', 'Juinagar sector 23 near gavdevi maidan \r\nOpposite to ragunatth nivas', '400705', 'Navi Mumbai', 'Maharashtra', '2018-08-15 10:29:09', '2018-08-15 10:29:09'),
(161, '140', 'Jaydeb vihar\r\nPlot no-199 lane no-3 jaydev vihar', '751013', 'Bhubaneswar', 'Orissa', '2018-08-15 10:30:05', '2018-08-15 10:30:05'),
(162, '141', '169 vardhman nagar A\r\nHeerapura ajmer road', '302019', 'Jaipur', 'RAJASTHAN', '2018-08-15 14:53:55', '2018-08-15 14:53:55'),
(163, '142', 'Pasumamula Village\r\nHayath nagar (M)\r\nRanga Reddy (D)', '501505', 'HYDERABAD', 'TELANGANA', '2018-08-16 14:25:10', '2018-08-16 14:25:10'),
(164, '143', 'gorav niwas room no.3 PARERAWADI mohili village sakinaka near ourledi school', '400072', 'mumbai', 'Maharashtra', '2018-08-18 12:52:48', '2018-08-18 12:52:48'),
(165, '144', 'At post kondhali', '441103', 'Kondhali', 'Maharashtra', '2018-08-18 13:26:47', '2018-08-18 13:26:47'),
(166, '145', 'IOEJDOWIEDWE', '848849', 'SKDNCKSJDCNSK', 'WJDKWJKWJ', '2018-08-22 13:47:51', '2018-08-22 13:47:51'),
(167, '146', 'kajdklaksdj', '888494', 'hkjhkh', 'uoiiu', '2018-08-22 18:04:48', '2018-08-22 18:04:48'),
(168, '147', 'kjlkajld', '444333', 'sasdd', 'das', '2018-08-22 18:23:11', '2018-08-22 18:23:11'),
(169, '148', 'Jaydeb vihar\r\nPlot no-199 lane no-3 jaydev vihar', '751013', 'Bhubaneswar', 'Orissa', '2018-08-23 16:24:34', '2018-08-23 16:24:34'),
(170, '149', 'H.n.771, resettlement colony Rohini sector 26 near excellence school', '110085', 'Rohini, Delhi', 'Delhi', '2018-08-24 11:31:46', '2018-08-24 11:31:46'),
(171, '150', 'BBS', '751001', 'BBSR', 'Odisha', '2019-10-30 11:58:56', '2019-10-30 11:58:56'),
(172, '151', 'Main road', '764059', 'Nabarangpur', 'Odisha', '2020-02-01 16:44:28', '2020-02-01 16:44:28'),
(173, '152', 'Chennai\r\nChennai', '700109', 'Chennai', 'TamilNadu', '2020-02-21 16:09:47', '2020-02-21 16:09:47'),
(174, '153', 'Vill Thalugarhi, Post Kursanda, dis. Hathras', '281306', 'Hathras', 'Utter Pradesh', '2020-03-03 17:33:26', '2020-03-03 17:33:26'),
(175, '154', 'F-001,Nav AmbikaNagar Society,Murabad Road', '754213', 'Kendrapara', 'Orissa', '2020-03-06 06:54:20', '2020-03-06 06:54:20'),
(176, '155', 'Royal Garden, Patia, Plot No. 32', '751031', 'Bbubaneswar', 'Odisha (Orissa)', '2020-03-06 08:45:15', '2020-03-06 08:45:15'),
(177, '156', 'Infront of post office, upper telenga bazar, cuttack', '753009', 'CUTTACK', 'ODISHA', '2020-03-06 20:01:24', '2020-03-06 20:01:24'),
(178, '157', 'Infront of post office, upper telenga bazar, cuttack', '753009', 'CUTTACK', 'ODISHA', '2020-03-08 08:06:03', '2020-03-08 08:06:03'),
(179, '158', 'nhxdj', '123456', 'hdhdh', 'jj', '2020-03-16 10:43:01', '2020-03-16 10:43:01'),
(180, '159', 'jdjdjj', '123456', 'df', 'fdf', '2020-03-17 11:56:22', '2020-03-17 11:56:22'),
(181, '160', 'jdjdjj', '123456', 'df', 'fdf', '2020-03-17 11:57:03', '2020-03-17 11:57:03'),
(182, '161', 'fghhh', '123435', 'jjj', 'jjj', '2020-03-17 12:40:41', '2020-03-17 12:40:41'),
(183, '162', 'fghhh', '123435', 'jjj', 'jjj', '2020-03-17 12:43:48', '2020-03-17 12:43:48'),
(184, '163', 'fghhh', '123435', 'jjj', 'jjj', '2020-03-17 12:44:22', '2020-03-17 12:44:22'),
(185, '164', 'fghhh', '123435', 'jjj', 'jjj', '2020-03-17 12:46:06', '2020-03-17 12:46:06'),
(186, '165', 'bhh', '123456', 'ghghh', 'fg', '2020-03-17 12:49:46', '2020-03-17 12:49:46'),
(187, '166', 'nhffhn', '123456', 'e', 'f', '2020-03-17 13:16:56', '2020-03-17 13:16:56'),
(188, '1', 'bj', '123456', 'gh', 'hhh', '2020-03-17 13:21:10', '2020-03-17 13:21:10'),
(189, '1', 'dw', '123456', 'dd', 'dd', '2020-03-17 13:25:19', '2020-03-17 13:25:19'),
(190, '2', 'f', '123456', 'de', 'd', '2020-03-17 13:27:55', '2020-03-17 13:27:55'),
(191, '1', 'Amit', '123456', 'bbsr', 'odisha', '2020-03-18 01:22:58', '2020-03-18 01:22:58'),
(192, '1', 'vgv', '123456', 'e', 'd', '2020-03-18 01:28:29', '2020-03-18 01:28:29'),
(193, '2', 'bjb', '123456', 'njj', 'huuu', '2020-03-18 01:32:34', '2020-03-18 01:32:34'),
(194, '1', 'ABC', '123456', 'bbsr', 'india', '2020-03-19 09:56:04', '2020-03-19 09:56:04'),
(195, '3', 'ABC', '123456', 'bbsr', 'India', '2020-03-19 10:05:01', '2020-03-19 10:05:01'),
(196, '4', 'ABC', '123456', 'bbsr', 'India', '2020-03-19 10:06:08', '2020-03-19 10:06:08'),
(197, '5', 'jhsjs', '123456', '123456', 'abc', '2020-03-19 10:15:10', '2020-03-19 10:15:10'),
(198, '6', 'ndndn', '122345', 'dhd', 'jsj', '2020-03-19 10:19:18', '2020-03-19 10:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `paymentmode` varchar(200) NOT NULL,
  `productprice` varchar(200) NOT NULL DEFAULT '0',
  `amountpaid` varchar(200) DEFAULT '0',
  `wallet_deduction` double DEFAULT NULL,
  `discount` varchar(500) DEFAULT '0',
  `couponcode` varchar(500) DEFAULT NULL,
  `mobile` varchar(200) NOT NULL,
  `altmobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `orderstatus` varchar(200) NOT NULL,
  `dispatchdetails` varchar(500) NOT NULL,
  `cancelreason` varchar(500) NOT NULL,
  `paymentstatus` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `productid`, `userid`, `paymentmode`, `productprice`, `amountpaid`, `wallet_deduction`, `discount`, `couponcode`, `mobile`, `altmobile`, `email`, `name`, `orderstatus`, `dispatchdetails`, `cancelreason`, `paymentstatus`, `updated_at`, `created_at`) VALUES
(1, '32', '2', 'FULLAMOUNT', '1000', '1000', 0, '0', '', '7381256230', '7978547767', 'ajit@gmail.com', 'Amit Kumar Sarangi', 'ORDERED', '', '', 'PAID', '2020-03-19 09:56:41', '2020-03-19 09:56:04'),
(2, '32', '2', 'FULLAMOUNT', '1000', '0', 0, '0', '', '7381256230', '1234567890', 'ajit@gmail.com', 'Amit Kumar Sarangi', 'ORDERED', '', '', 'PENDING', '2020-03-19 10:02:57', '2020-03-19 10:02:57'),
(3, '32', '2', 'FULLAMOUNT', '1000', '1000', 0, '0', '', '7381256230', '1234567890', 'ajit@gmail.com', 'Amit Kumar Sarangi', 'ORDERED', '', '', 'PAID', '2020-03-19 10:08:25', '2020-03-19 10:05:01'),
(4, '32', '2', 'FULLAMOUNT', '1000', '1000', 0, '0', '', '7381256230', '1234567890', 'ajit@gmail.com', 'Amit Kumar Sarangi', 'ORDERED', '', '', 'PAID', '2020-03-19 10:06:50', '2020-03-19 10:06:08'),
(5, '32', '2', 'FULLAMOUNT', '1000', '910', 90, '0', '', '7381256230', '7978547767', 'ajit@gmail.com', 'Amit Kumar Sarangi', 'ORDERED', '', '', 'PAID', '2020-03-19 10:15:56', '2020-03-19 10:15:10'),
(6, '32', '2', 'FULLAMOUNT', '1000', '710', 90, '200', 'DTHSEVA200', '7381256230', '1234567890', 'ajit@gmail.com', 'Amit Kumar Sarangi', 'DELIVERED', '', '', 'PAID', '2020-06-04 03:49:44', '2020-03-19 10:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE IF NOT EXISTS `otps` (
`id` int(11) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `otp` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `mobile`, `otp`, `updated_at`, `created_at`) VALUES
(1, '7978547767', '488613', '2018-07-17 07:58:39', '2018-07-17 07:58:39'),
(2, '7978547767', '334777', '2018-07-17 08:04:40', '2018-07-17 08:04:40'),
(3, '7978547767', '962124', '2018-07-17 08:04:53', '2018-07-17 08:04:53'),
(4, '7978547767', '397976', '2018-07-17 08:05:38', '2018-07-17 08:05:38'),
(5, '8093000501', '152954', '2018-07-17 08:07:31', '2018-07-17 08:07:31'),
(6, '8093000501', '133123', '2018-07-17 08:18:49', '2018-07-17 08:18:49'),
(7, '897854712767', '333486', '2018-07-17 08:21:14', '2018-07-17 08:21:14'),
(8, '897854712767', '650634', '2018-07-17 08:36:57', '2018-07-17 08:36:57'),
(9, '8093000501', '461999', '2018-07-17 10:56:52', '2018-07-17 10:56:52'),
(10, '8093000501', '862478', '2018-07-17 10:58:14', '2018-07-17 10:58:14'),
(11, '7809418911', '607434', '2018-07-27 13:24:03', '2018-07-27 13:24:03'),
(12, '9437919923', '581908', '2018-07-27 16:01:51', '2018-07-27 16:01:51'),
(13, '8093000501', '275757', '2018-07-28 11:50:07', '2018-07-28 11:50:07'),
(14, '8093000501', '748347', '2018-07-28 13:25:01', '2018-07-28 13:25:01'),
(15, '7809418911', '145651', '2018-07-29 16:18:42', '2018-07-29 16:18:42'),
(16, '7809418911', '812483', '2018-07-30 09:44:40', '2018-07-30 09:44:40'),
(17, '7978547767', '943258', '2018-07-30 10:52:56', '2018-07-30 10:52:56'),
(18, '7978547767', '725944', '2018-07-30 10:55:10', '2018-07-30 10:55:10'),
(19, '7978547767', '605704', '2018-07-30 11:04:20', '2018-07-30 11:04:20'),
(20, '8093000501', '486943', '2018-07-30 14:39:34', '2018-07-30 14:39:34'),
(21, '8169353516', '321749', '2018-07-30 16:21:34', '2018-07-30 16:21:34'),
(22, '7809418911', '950223', '2018-07-30 18:10:57', '2018-07-30 18:10:57'),
(23, '7809418911', '941487', '2018-07-30 18:49:57', '2018-07-30 18:49:57'),
(24, '7809418911', '940258', '2018-07-31 13:47:22', '2018-07-31 13:47:22'),
(25, '9437919923', '642664', '2018-07-31 19:14:23', '2018-07-31 19:14:23'),
(26, '9415218495', '493426', '2018-07-31 22:07:28', '2018-07-31 22:07:28'),
(27, '7447443227', '941406', '2018-08-01 01:21:09', '2018-08-01 01:21:09'),
(28, '7809418911', '113980', '2018-08-02 09:37:53', '2018-08-02 09:37:53'),
(29, '8082013862', '279098', '2018-08-02 10:16:54', '2018-08-02 10:16:54'),
(30, '7809418911', '347043', '2018-08-02 10:23:48', '2018-08-02 10:23:48'),
(31, '7809418911', '881831', '2018-08-02 12:36:52', '2018-08-02 12:36:52'),
(32, '7008031739', '487093', '2018-08-03 11:33:28', '2018-08-03 11:33:28'),
(33, '7008031739', '287668', '2018-08-03 11:33:50', '2018-08-03 11:33:50'),
(34, '7809418911', '775879', '2018-08-04 13:46:05', '2018-08-04 13:46:05'),
(35, '7809418911', '819780', '2018-08-04 18:32:30', '2018-08-04 18:32:30'),
(36, '7039436311', '905121', '2018-08-05 11:13:33', '2018-08-05 11:13:33'),
(37, '7809418911', '705649', '2018-08-05 11:14:04', '2018-08-05 11:14:04'),
(38, '7039436311', '986842', '2018-08-05 11:21:09', '2018-08-05 11:21:09'),
(39, '7008031739', '423003', '2018-08-06 09:01:38', '2018-08-06 09:01:38'),
(40, '9437919923', '512666', '2018-08-06 09:03:21', '2018-08-06 09:03:21'),
(41, '7809418911', '405491', '2018-08-06 13:38:41', '2018-08-06 13:38:41'),
(42, '8093000501', '562449', '2018-08-06 14:58:32', '2018-08-06 14:58:32'),
(43, '9437919923', '328148', '2018-08-06 15:00:54', '2018-08-06 15:00:54'),
(44, '9437919923', '262972', '2018-08-06 15:10:54', '2018-08-06 15:10:54'),
(45, '7809418911', '272020', '2018-08-07 14:29:56', '2018-08-07 14:29:56'),
(46, '7809418911', '786251', '2018-08-07 14:30:22', '2018-08-07 14:30:22'),
(47, '9437919923', '888061', '2018-08-07 18:55:53', '2018-08-07 18:55:53'),
(48, '7809418911', '412938', '2018-08-08 16:38:18', '2018-08-08 16:38:18'),
(49, '7809418911', '620430', '2018-08-09 08:45:27', '2018-08-09 08:45:27'),
(50, '9437919923', '200566', '2018-08-09 08:50:25', '2018-08-09 08:50:25'),
(51, '7809418911', '222797', '2018-08-09 14:42:14', '2018-08-09 14:42:14'),
(52, '8093000501', '368013', '2018-08-11 13:43:01', '2018-08-11 13:43:01'),
(53, '9920244610', '686230', '2018-08-11 20:29:22', '2018-08-11 20:29:22'),
(54, '7860050799', '729652', '2018-08-12 12:41:16', '2018-08-12 12:41:16'),
(55, '8770887738', '169825', '2018-08-12 17:41:21', '2018-08-12 17:41:21'),
(56, '9594908077', '789974', '2018-08-13 13:24:16', '2018-08-13 13:24:16'),
(57, '9032572512', '155270', '2018-08-17 12:48:50', '2018-08-17 12:48:50'),
(58, '9032572512', '684016', '2018-08-17 12:54:11', '2018-08-17 12:54:11'),
(59, '8169640518', '612933', '2018-08-18 12:46:28', '2018-08-18 12:46:28'),
(60, '7008031739', '993661', '2020-02-06 06:59:36', '2020-02-06 06:59:36'),
(61, '7008031739', '858062', '2020-02-23 08:44:30', '2020-02-23 08:44:30'),
(62, '7978547767', '783720', '2020-06-04 00:20:35', '2020-06-04 00:20:35'),
(63, '7978547767', '862049', '2020-06-04 00:20:58', '2020-06-04 00:20:58'),
(64, '7978547767', '583334', '2020-06-04 00:21:15', '2020-06-04 00:21:15'),
(65, '7978547767', '869783', '2020-06-04 00:24:36', '2020-06-04 00:24:36'),
(66, '7978547767', '141432', '2020-06-04 00:25:04', '2020-06-04 00:25:04'),
(67, '7978547767', '254605', '2020-06-04 00:25:58', '2020-06-04 00:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `packagechannels`
--

CREATE TABLE IF NOT EXISTS `packagechannels` (
`id` int(11) NOT NULL,
  `packageid` varchar(200) DEFAULT NULL,
  `channelid` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packagechannels`
--

INSERT INTO `packagechannels` (`id`, `packageid`, `channelid`, `updated_at`, `created_at`) VALUES
(25, '1', '1', '2018-07-26 16:19:30', '2018-07-26 16:19:30'),
(26, '1', '2', '2018-07-26 16:19:30', '2018-07-26 16:19:30'),
(27, '1', '3', '2018-07-26 16:19:30', '2018-07-26 16:19:30'),
(28, '1', '4', '2018-07-26 16:19:30', '2018-07-26 16:19:30'),
(29, '2', '1', '2018-07-26 16:19:41', '2018-07-26 16:19:41'),
(30, '2', '2', '2018-07-26 16:19:41', '2018-07-26 16:19:41'),
(31, '2', '3', '2018-07-26 16:19:41', '2018-07-26 16:19:41'),
(32, '2', '4', '2018-07-26 16:19:41', '2018-07-26 16:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
`id` int(11) NOT NULL,
  `brand` varchar(200) DEFAULT NULL,
  `packagename` varchar(200) DEFAULT NULL,
  `packagecost` varchar(200) DEFAULT NULL,
  `packagedescription` varchar(200) DEFAULT NULL,
  `packageimage` varchar(2000) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `brand`, `packagename`, `packagecost`, `packagedescription`, `packageimage`, `updated_at`, `created_at`) VALUES
(1, '1', 'SWAGAT PACK', '146', 'BEST PACK', '153260757020430243835b59bc520c460gameonhdregional.jpg', '2018-07-26 16:19:30', '2018-07-20 07:09:38'),
(2, '4', 'AIRTEL DHAMAKA', '191', 'All in One', '1532607581957198515b59bc5dddbeafullonhdregional.jpg', '2018-07-26 16:19:41', '2018-07-21 04:14:35'),
(3, '1', 'BHARAT PACK', '147', 'unlimited entertainment\r\nEnjoy Hindi movies, news, music & devotional channels at a nominal price\r\nTop up the basic pack with a range of add ons in all india', '153346730018477604455b66daa4d59cbdish tv bharat pack.png', '2018-08-05 15:08:20', '2018-08-05 15:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paytmrecharges`
--

CREATE TABLE IF NOT EXISTS `paytmrecharges` (
`id` int(11) NOT NULL,
  `orderid` varchar(500) DEFAULT NULL,
  `mid` varchar(500) DEFAULT NULL,
  `txnid` varchar(500) DEFAULT NULL,
  `txnamount` varchar(500) DEFAULT NULL,
  `paymentmode` varchar(500) DEFAULT NULL,
  `currency` varchar(500) DEFAULT NULL,
  `txndate` varchar(500) DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  `respcode` varchar(500) DEFAULT NULL,
  `respmsg` text,
  `gateayname` varchar(500) DEFAULT NULL,
  `banktxnid` varchar(500) DEFAULT NULL,
  `checksumhash` varchar(500) DEFAULT NULL,
  `type` varchar(200) NOT NULL DEFAULT 'DTH',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paytmrecharges`
--

INSERT INTO `paytmrecharges` (`id`, `orderid`, `mid`, `txnid`, `txnamount`, `paymentmode`, `currency`, `txndate`, `status`, `respcode`, `respmsg`, `gateayname`, `banktxnid`, `checksumhash`, `type`, `created_at`, `updated_at`) VALUES
(1, '1', 'tAobVz97661765216236', '20200603111212800110168572930088846', '1.00', 'UPI', 'INR', '2020-06-03 14:26:33.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '015531281443', 'hmJbLeWnbgFHFJVRtUdpOwnQ96mVN4pcrOKAE4LwakX6LlSZcOMojK+wURBHW6PPhMnBnJlrUkjMQyXXevUfE97O/Z3rl5WeAGiGPq3YgyQ=', 'DTH', '2020-06-03 03:27:16', '2020-06-03 03:27:16'),
(2, '2', 'tAobVz97661765216236', '20200608111212800110168566030499185', '1.00', 'UPI', 'INR', '2020-06-08 19:14:42.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016085401123', 'HIs0sM7z+qkkB3Eyi+tpvHvh9f5XHaFpohPVmbD2KEXZvWnyZxfNeyivRSkZmSC/cIADickH7p98WSR/+mRSizgxgz2t/qXWU4Htyb3x6nA=', 'DTH', '2020-06-08 08:15:47', '2020-06-08 08:15:47'),
(3, '2', 'tAobVz97661765216236', '20200608111212800110168566030499185', '1.00', 'UPI', 'INR', '2020-06-08 19:14:42.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016085401123', 'HIs0sM7z+qkkB3Eyi+tpvHvh9f5XHaFpohPVmbD2KEXZvWnyZxfNeyivRSkZmSC/cIADickH7p98WSR/+mRSizgxgz2t/qXWU4Htyb3x6nA=', 'DTH', '2020-06-08 08:24:08', '2020-06-08 08:24:08'),
(4, '2', 'tAobVz97661765216236', '20200608111212800110168566030499185', '1.00', 'UPI', 'INR', '2020-06-08 19:14:42.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016085401123', 'HIs0sM7z+qkkB3Eyi+tpvHvh9f5XHaFpohPVmbD2KEXZvWnyZxfNeyivRSkZmSC/cIADickH7p98WSR/+mRSizgxgz2t/qXWU4Htyb3x6nA=', 'DTH', '2020-06-08 08:26:25', '2020-06-08 08:26:25'),
(5, '3', 'tAobVz97661765216236', '20200609111212800110168556230657494', '1.00', 'UPI', 'INR', '2020-06-09 20:22:50.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016196810983', 'yH0OqwFryxIZNjqbh98kTFSItMkTqQzDE4Qxj36AYiyeFHZhbV+pubBgHBEj/oErugLPBt9k5QMZ3VKk5J/0l5vRZA3DPRt6yBK3d0pO5bw=', 'DTH', '2020-06-09 09:23:40', '2020-06-09 09:23:40'),
(6, '3', 'tAobVz97661765216236', '20200609111212800110168556230657494', '1.00', 'UPI', 'INR', '2020-06-09 20:22:50.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016196810983', 'yH0OqwFryxIZNjqbh98kTFSItMkTqQzDE4Qxj36AYiyeFHZhbV+pubBgHBEj/oErugLPBt9k5QMZ3VKk5J/0l5vRZA3DPRt6yBK3d0pO5bw=', 'DTH', '2020-06-09 09:24:49', '2020-06-09 09:24:49'),
(7, '4', 'tAobVz97661765216236', '20200609111212800110168549030570579', '1.00', 'UPI', 'INR', '2020-06-09 21:09:14.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016197336212', '27WHahpjh6sEUqF1cB//aVUR6GVDv7kRmuR2lloEfzqIG1WWn6V7gnyrQwJ4qyiTZx4hpNuPIgitymMh33vyb3LaEo/GbVlP25q7HhwG4OY=', 'DTH', '2020-06-09 10:10:33', '2020-06-09 10:10:33'),
(8, '5', 'tAobVz97661765216236', NULL, '1.00', NULL, 'INR', NULL, 'TXN_FAILURE', '227', 'Your payment has been declined by your bank. Please try again or use a different method to complete the payment.', NULL, '016216289578', 'oD3zLCuYfJ9h8iXn7ILa6w+NilqCUqy3RMmkeGpNaYozk/d334QFl7C/PfqChbWhasS4ExQRLsuGrBU5g/crl/EA8E6lnuoonclwnTUFCaU=', 'DTH', '2020-06-10 05:35:53', '2020-06-10 05:35:53'),
(9, '8', 'tAobVz97661765216236', '20200610111212800110168500031107936', '1.00', 'UPI', 'INR', '2020-06-10 16:49:24.0', 'TXN_SUCCESS', '01', 'Txn Success', 'ICICI', '016216366397', 'ViEtkqcSQ932pzDm8qcxzpFbRzvhqgQkqZ13cOSeVHmDbueezSv7srga1HFM2QgjbzwhVNvwDzs82mxANaTKvLDzwJrGQfmwtcDnmUHklE8=', 'DTH', '2020-06-10 05:50:34', '2020-06-10 05:50:34'),
(10, '1', 'tAobVz97661765216236', NULL, '1.00', NULL, 'INR', NULL, 'TXN_FAILURE', '501', 'Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same', NULL, NULL, 'HqMBwuCo0VT/HBbNtHkVR3InAOvNvP9wYZOrncxuQIXwPBWTtVU5qrNUcib15aluV4JT5/PfithnaxlFUIP6fOmKcYWn6pCnoVExWvC519U=', 'MOBILE', '2020-06-11 05:06:20', '2020-06-11 05:06:20'),
(11, '2', 'tAobVz97661765216236', NULL, '1.00', NULL, 'INR', NULL, 'TXN_FAILURE', '501', 'Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same', NULL, NULL, 'eKRfvF1o7vIR4lrlZHJK1/TDXMD4d59UXecfC/gPORiUGt/hIv0lDjYgUnRCCvcKEaH35xfOrkN3xYJihb0J1LIAJvOGtFA5LVAn/bNUXrI=', 'MOBILE', '2020-06-11 05:08:25', '2020-06-11 05:08:25'),
(12, '3', 'tAobVz97661765216236', NULL, '1.00', NULL, 'INR', NULL, 'TXN_FAILURE', '501', 'Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same', NULL, NULL, 'HDDElMC/OJxXHQ+ShzVT19VZ0vBn7z2S0hhX4cWU7bPQ/6Yl3iMcg9oXyo8wK8h0zi0k27WEPxi1c9bMDIejYiBJiVOv1ynvQfgeKlMEOHM=', 'MOBILE', '2020-06-11 05:11:33', '2020-06-11 05:11:33'),
(13, '5', 'tAobVz97661765216236', NULL, '1.00', NULL, 'INR', NULL, 'TXN_FAILURE', '501', 'Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same', NULL, NULL, 'k9Sxz2R/wNTgFuRMsZyCJ+h14+SctOUYFGRp0haPgoW7rpzrQs9wQc9WlUoZU9PGFmJcq6AgtsN+KgvAegbioRlKg/7kuJhsmjoLZH9IySs=', 'MOBILE', '2020-06-11 05:24:32', '2020-06-11 05:24:32'),
(14, '50', 'tAobVz97661765216236', '20200611111212800110168897031028715', '1.00', 'UPI', 'INR', '2020-06-11 16:32:33.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016314236236', 'Hmp8WCb0XBMD1p5Tp2aClRXlTC/zFp2nMyNxktGAchfDnRZjwfndS92i4gTEalkrNkhq8WAerBqc3rD9WIJG/RAcOBM7CD/wyLuBo+blEpE=', 'MOBILE', '2020-06-11 05:36:15', '2020-06-11 05:36:15'),
(15, '50', 'tAobVz97661765216236', '20200611111212800110168897031028715', '1.00', 'UPI', 'INR', '2020-06-11 16:32:33.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016314236236', 'Hmp8WCb0XBMD1p5Tp2aClRXlTC/zFp2nMyNxktGAchfDnRZjwfndS92i4gTEalkrNkhq8WAerBqc3rD9WIJG/RAcOBM7CD/wyLuBo+blEpE=', 'MOBILE', '2020-06-11 05:36:34', '2020-06-11 05:36:34'),
(16, '50', 'tAobVz97661765216236', '20200611111212800110168897031028715', '1.00', 'UPI', 'INR', '2020-06-11 16:32:33.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016314236236', 'Hmp8WCb0XBMD1p5Tp2aClRXlTC/zFp2nMyNxktGAchfDnRZjwfndS92i4gTEalkrNkhq8WAerBqc3rD9WIJG/RAcOBM7CD/wyLuBo+blEpE=', 'MOBILE', '2020-06-11 05:38:56', '2020-06-11 05:38:56'),
(17, '1', 'tAobVz97661765216236', NULL, '1.00', NULL, 'INR', NULL, 'TXN_FAILURE', '501', 'Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same', NULL, NULL, 'a8APTaek0NiENTrv+JGfRanmMbcfXwlI0JE7DXATo581P/g+tVjx6Mx9Gbz7EaFClR0Iy/00Bv2vLO6JTuqSCHDdT2ukmnfn54IXlJ9oP9Q=', 'MOBILE', '2020-06-11 11:10:39', '2020-06-11 11:10:39'),
(18, '2', 'tAobVz97661765216236', NULL, '1.00', NULL, 'INR', NULL, 'TXN_FAILURE', '501', 'Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same', NULL, NULL, 'DQTdsfXrVRgNp/6S4u/nouip5IYLlivrl9ZJlaDvYfM5a8RryFYoDqI8pQoEURzaBTF1VmmPIdu5d7nf8AWJ3B3/3wnRWWvcRzR3IupGdaw=', 'MOBILE', '2020-06-12 22:40:27', '2020-06-12 22:40:27'),
(19, '87', 'tAobVz97661765216236', '20200613111212800110168890131159440', '1.00', 'UPI', 'INR', '2020-06-13 09:42:52.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016530016134', 'hDvn28O34kpEt6zKeFQSLX3Elz3N2U5Bvbx0fFH/zsNdmPzhnH1Dnv3yyb3MDh8Xoz/JOrUsrH4flrznUA2FFnqDB0nGVrLSxZl9UnnBTGw=', 'MOBILE', '2020-06-12 22:44:04', '2020-06-12 22:44:04'),
(20, '88', 'tAobVz97661765216236', '20200613111212800110168901931274175', '1.00', 'UPI', 'INR', '2020-06-13 09:48:50.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016530071029', 'Vwmvk+RaVUgBTH4uqKqqsbernHqWVX113p8StHJDKfPdPSUznTTliJV/Nsr1KTayedTfxopjnhtwJ2JuT3hE/ty7BZ2WAnunBgyeXusYuY8=', 'MOBILE', '2020-06-12 22:49:25', '2020-06-12 22:49:25'),
(21, '89', 'tAobVz97661765216236', NULL, '1.00', NULL, 'INR', NULL, 'TXN_FAILURE', '501', 'Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same', NULL, NULL, 'oZB9ZhO0QSSkwQtuH1Fy2oMGV7qjibXiaLLr90pU/WFKUEyzezMWpAl572K1qbJ1/AMLSsadHdmPhYucs4kFNnkiX/Rjpk+m88GNXvXE3hg=', 'MOBILE', '2020-06-12 22:51:38', '2020-06-12 22:51:38'),
(22, '90', 'tAobVz97661765216236', '20200613111212800110168137031551727', '1.00', 'UPI', 'INR', '2020-06-13 09:52:00.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016530107508', 'ZB6sVEz8v5CZg0ktSX07ounadNkSqkuT0yd2+Xhi/LhXfXJuNubKlf78/CX9zYr6A6v5LKhUyOqZRi6rPABvA7dCm8mczh5KjkEbIhF9fp8=', 'MOBILE', '2020-06-12 22:53:24', '2020-06-12 22:53:24'),
(23, '1592037935', 'tAobVz97661765216236', '20200613111212800110168020731249435', '1.00', 'UPI', 'INR', '2020-06-13 14:16:31.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016533060960', 'tmVE/XyujLEoRORiio3chMgke4gsCe8uaFntPmrkrFpjj5S3wELC2T8JxLKo2n45/FGs0z/bZZRHHn0abPC8QL7HL34vyjN67mH9uSXn5Gc=', 'DTH', '2020-06-13 03:17:56', '2020-06-13 03:17:56'),
(24, '1592038525', 'tAobVz97661765216236', '20200613111212800110168863031302312', '1.00', 'UPI', 'INR', '2020-06-13 14:25:26.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016533144968', 'LdjIRWmZxy+lWQiOhYTPEISrS2Gy32lmqryi7gYUq5iZRkKAsBwTl3HBGv/k7fUFISH1V/WrjQexgquizTzCEcOAkjv6cMyetaLB8zKKpuU=', 'MOBILE', '2020-06-13 03:26:01', '2020-06-13 03:26:01'),
(25, '1592040486', 'tAobVz97661765216236', '20200613111212800110168673931251027', '1.00', 'UPI', 'INR', '2020-06-13 14:58:07.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016533459548', 'qU+6o2bu0fwx/wfjJjOhEOp3YrATAX6WBNU1JDrkk4ta01aG8MzMdpmkJPAcHXfLvAAp08rkylrmT/GNKNF6NfxvIdLqMolWrKDqXIVz5OU=', 'MOBILE', '2020-06-13 03:59:36', '2020-06-13 03:59:36'),
(26, '1592407219', 'tAobVz97661765216236', '20200617111212800110168462032120047', '1.00', 'UPI', 'INR', '2020-06-17 20:50:20.0', 'TXN_SUCCESS', '01', 'Txn Success', 'PPBLC', '016978604901', 'wAVkJNXQ/r5SsYFmBreuIRGI38pxkFGgIf9sOrZiZLrzbfd1iK6OGS5nYg+DSg4TE7vl2i4RUTpAu1ABYrz/kHC1ayXmor8C0S5HDmWdhMg=', 'DTH', '2020-06-17 09:51:16', '2020-06-17 09:51:16'),
(27, '1592407463', 'tAobVz97661765216236', '20200617111212800110168757031731561', '1.00', 'UPI', 'INR', '2020-06-17 20:54:25.0', 'TXN_SUCCESS', '01', 'Txn Success', 'ICICI', '016920101850', 'iajY1NDjmfLDTF0GRLKoYpGtv+Vm5qnGyDYX7dDtGNtDc6vAehr5CzCjBNiHyQm+psaghEOqbHZWeO/EeV4ONs0KzaqDZlaVBB21qZIpnR0=', 'DTH', '2020-06-17 09:55:22', '2020-06-17 09:55:22'),
(28, '1592656114', 'tAobVz97661765216236', NULL, '-10.00', NULL, 'INR', NULL, 'TXN_FAILURE', '308', 'Invalid Txn Amount', NULL, NULL, 'uBhKB3W3xmfj0o56nU2UvOzJNb8sxBaI+qOLA78i7UXcuD96930lLzNml56qQhwY9cZQgtEVZLDnYT+QLlmTwZEZkZpXdAKUG4Tcd7xkMbM=', 'MOBILE', '2020-06-20 07:01:15', '2020-06-20 07:01:15'),
(29, '1592737630', 'tAobVz97661765216236', NULL, '10.00', NULL, 'INR', NULL, 'TXN_FAILURE', '501', 'Your payment has been declined by your bank. Please contact your bank for any queries. If money has been deducted from your account, your bank will inform us within 48 hrs and we will refund the same', NULL, NULL, '3yxZXbmmT0WKf2W34bogdLKJJsMZ+Su6gzR0vaGKqpY2xdPPKQY7gHlkh5sP1Md0DzHKeXYlLHY/+e+draG8gmvXdlpTDvJcAUOHnhxnU/A=', 'MOBILE', '2020-06-21 05:55:32', '2020-06-21 05:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `promocost` varchar(50) DEFAULT NULL,
  `bookingamount` varchar(200) NOT NULL,
  `installamt` varchar(200) NOT NULL DEFAULT '0',
  `longdescription` text,
  `shortdescription` varchar(500) DEFAULT NULL,
  `brandid` varchar(200) DEFAULT NULL,
  `image1` varchar(50) DEFAULT NULL,
  `image2` varchar(50) DEFAULT NULL,
  `image3` varchar(50) DEFAULT NULL,
  `image4` varchar(50) DEFAULT NULL,
  `cashback_by_type` varchar(500) DEFAULT NULL,
  `cashback_value` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cost`, `promocost`, `bookingamount`, `installamt`, `longdescription`, `shortdescription`, `brandid`, `image1`, `image2`, `image3`, `image4`, `cashback_by_type`, `cashback_value`, `created_at`, `updated_at`) VALUES
(3, 'Dish Tv sd set top box connection buy online', '1950', '1249', '1249', '0', '<b><u>Specifications\r\n</u></b>\r\n\r\n<p><b>In The\r\nBox</b></p>\r\n\r\n<p>1 Set-Top\r\nBox, 1 Antenna set, 10 meter Wire, HDMI Cable connector, Remote control device</p>\r\n\r\n<p><b>General\r\nInfo</b></p>\r\n\r\n<p><b>Brand:</b> Dish TV </p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>Model\r\nName:</b> HD Box </p>\r\n\r\n<p><b>Offer:</b> 1 Month Super Family HD - Hindi\r\n(Option Choosable)</p>\r\n\r\n<p><b>Display\r\nResolution:</b> SD and\r\nHD</p>\r\n\r\n<p><b>Remote\r\nFeatures:</b> DishTV\r\nRemote Control Technology</p>\r\n\r\n<p><b>Core\r\nTechnology: </b>DVB-S\r\nQPSK, DVB-S2 8PSK, MPEG 2, MPEG 4 standards</p>\r\n\r\n<p><b>Connectivity:\r\n</b>AV Cable,\r\nHDMI</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>Aspect\r\nRatio:</b>&nbsp;\r\n16:09</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>Memory:</b> No Internal Memory</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>Recording\r\nFeatures: </b>NA</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>Weight:</b> 0.6 kg</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>With the\r\nDish Tv sd+ Connection, you will not go looking for entertainment elsewhere -\r\nit’s in your living room. Experience non-stop entertainment, with sd clarity,\r\nby bringing home the Dish tv SD DTH connection.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Channels</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lifestyle,\r\ninfotainment, sports, news or music - with Dish SD+, you’ll never run out of\r\nchoices as it comes with a maximum of 50 + SD channels across various genres to\r\nsuit your entertainment needs.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>5.1\r\nSurround Sound</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>With the\r\nDish Tv SD+ Connection, you can enjoy a high definition crystal-clear picture\r\nclarity with wonderfull audio experience, thanks to its best picture resolution\r\nand 5.1 Surround Sound output which it makes more powerful and more valuable.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Additional\r\nFeatures</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Free\r\nWarranty for a lifetime, Free Delivery on your doorstep, no installation fee,\r\nEnjoy the 5 Times Better Picture Clarity with - 1080i, 5.1 Surround Sound and\r\nget a hassle-free 24x7 Customer Service.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Warranty\r\nSummary</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>On-site -\r\nServicing will be done at customer location.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Please\r\ncall our service provider toll free number for any kind of assistance.</p>\r\n\r\n<p>Service\r\nType: Repair</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Covered\r\nin Warranty: Set-Top Box</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Not\r\nCovered in Warranty:  Wire</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>More\r\nDetails</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Generic Name: dish tv sd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Country\r\nof Origin: India</p>', 'Install Dish TV SD Connection from DTHSEVA and get All India  1 month  swagat pack absolutely free', '1', '1533792893.dish plus.jpeg', '1531919068.pic2.jpg', '1531919068.pic3.jpg', '1533629937.Dish-TV.jpg', 'FLAT', 100, '2018-07-18 07:34:28', '2020-03-19 10:37:58'),
(4, 'Tata sky hd set top box dth new connection', '3200', '1562', '1562', '0', '<p>Tata Sky is a premium DTH service which aims to revolutionize Indian home entertainment by empowering television viewers with , Choice of English, Hindi, Regional and HD channels , along with interactive services. Unlike generic set top boxes, Tata Sky offers a host of exciting services such as Actve Services and Showcase, our Pay-Per-View movie service. With this connection you get superior quality to better your entertainment experience . Tata Sky - Isko laga dala to life Jingalala . <br></p>', 'Tata Sky HD Box with 1 Month hindi lite Pack', '2', '1531919178.tata1.jpeg', '1531919178.tata2.jpg', '1531919178.tata3.jpg', NULL, NULL, NULL, '2018-07-18 07:36:18', '2020-02-03 10:41:47'),
(5, 'Videocon d2h hd Connection', '2700', '1849', '1849', '0', '<p>\r\n</p><ul>\r\n					\r\n					\r\n						<li> \r\n							India''s First Radio Frequency Remote (For DTH)\r\n							\r\n						</li>\r\n					\r\n						<li> \r\n							Rewind/Forward\r\n							\r\n						</li>\r\n					\r\n						<li> \r\n							Pause Live TV, Mark- Skip- Watch</li></ul>\r\n\r\n<p></p>', 'Videocon d2h HD Digital Set Top Box with 1 Month Super Gold HD Free', '3', '1531920661.vid1.jpg', '1531920661.vid1.jpg', NULL, NULL, NULL, NULL, '2018-07-18 08:01:01', '2018-07-27 20:35:55'),
(7, 'Videocon D2h Hd Digital Set Top Box Remote Control', '850', '237', '100', '0', '<p>This high quality remote control is 100% compatible with indicated TV Model and is very easy to use. The remote works on AA batteries and has a very lightweight design. Buy the remote and enjoy your favourite shows and programs accessing all the control options right from the comfort of your couch. <br></p>', 'Videocon D2H Remote Controller  (Black)', '3', '1531923515.vidrem.jpg', '', NULL, NULL, NULL, NULL, '2018-07-18 08:48:35', '2018-07-26 15:11:06'),
(8, 'Dish tv HD set top box dth new connection buy onli', '1950', '1449', '1449', '0', '<p>\r\n</p><p></p>\r\n\r\n<p>Dish tv NXT HD set-top box dth new connection -: One-month swagat pack free in all India<br></p><p>With the\r\nDish Tv sd+ Connection, you will not go looking for entertainment elsewhere -\r\nit’s in your living room. Experience non-stop entertainment, with sd clarity,\r\nby bringing home the Dish tv SD DTH connection.</p>\r\n\r\n\r\n\r\n<p><b>Channels</b></p>\r\n\r\n\r\n\r\n<p>Lifestyle,\r\ninfotainment, sports, news or music - with Dish SD+, you’ll never run out of\r\nchoices as it comes with a maximum of 50 + SD channels across various genres to\r\nsuit your entertainment needs.</p>\r\n\r\n\r\n\r\n<p><b>5.1\r\nSurround Sound</b></p>\r\n\r\n\r\n\r\n\r\n\r\n<p>With the\r\nDish Tv SD+ Connection, you can enjoy a high definition crystal-clear picture\r\nclarity with wonderfull audio experience, thanks to its best picture resolution\r\nand 5.1 Surround Sound output which it makes more powerful and more valuable.</p>\r\n\r\n\r\n\r\n<p><b>Additional\r\nFeatures</b></p>\r\n\r\n\r\n\r\n<p>Free\r\nWarranty for a lifetime, Free Delivery on your ', 'Buy Dish TV HD nxt Connection and get free 1 month subscription', '1', '1533793070.hd nxt connection.jpeg', '1533792996.only set top box.jpeg', '1533792996.remote.jpeg', '1533629917.download.jpg', NULL, NULL, '2018-07-26 14:43:42', '2020-02-06 13:23:43'),
(9, 'Dish tv HD set top box dth new connection buy onli', '2950', '1449', '1449', '0', '<p>1-One Month Super Family Pack with Full on HD pack Free</p><p>4-Unlimited recording for life time <br>5-1 year warranty&nbsp;</p><p>6-All the equipments like dish antenna Lnbf cable set top box will be in the connection with one month free subscription.&nbsp;</p><p>&nbsp;\r\n\r\n<br>DTH seva in india best price/ best service/ best quality book now <br>it is a new dish tv connection there is a great scheme for limited time.<br></p><p>. 340+ Channels &amp; Services: DishTV offers 340+ channels &amp; services across various genres to suit your entertainment needs. Post the consumption of 1 month free viewing of Super Family pack, pick a pack to suit your entertainment needs best and top it up with regional and other add-on packs. 3. Digital Picture Quality &amp; Stereophonic Sound: Watch every detail in digital picture clarity &amp; c</p>', 'Dish TV hd nxt Connection- TELUGU- Pack 1 Month Super Family TELUGU Pack With Full on Hd pack', '1', '1533795860.hd nxt connection.jpeg', '1533629972.dish-25.jpg', '1532602114.pic3.jpg', '1533629972.download.jpg', NULL, NULL, '2018-07-26 14:48:34', '2020-02-06 13:24:06'),
(10, 'Dish tv HD set top box dth new connection buy onli', '2395', '1449', '1449', '0', '<p>Dish tv NXT hd set top box dth new connection -: One month swagat pack free in all india, you ll never run out of choices. Enhance your dish tv HD&nbsp; viewing experience with HD channels across various genres to suit your entertainment needs. 3. 1080i Picture Resolution &amp; 5.1 Surround Sound: With crystal clear picture clarity, enjoy every detail in high resolution and enhance your experience. Now, you won�t miss out on the minutest detail on your HD TV with 1080i Picture Resolution and 5.1 Surround Sound. 4.Flexibility to make your own HD pack: Post the consumption of 1 month free viewing, pick from pre-created HD Add-On packs which suit your entertainment needs best. Choose your pack and enter the world of maximum HD entertainment. <br></p>', 'Dish TV HD  NXT Connection and get free one month subscription', '1', '1532602328.pic1.jpg', '1532602328.pic3.jpg', '1533793748.only set top box.jpeg', '1533630016.dishtv-nxt premium.jpg', NULL, NULL, '2018-07-26 14:52:08', '2020-02-06 13:24:58'),
(11, 'Dish tv hd set top box dth new connection', '2399', '1449', '1449', '0', '<p>\r\n</p><p></p>\r\n\r\n<p>Dish tv NXT hd set top box dth new connection -: One month swagat pack free in all india, you ll never run out of choices. Enhance your dish tv HD  viewing experience with HD channels across various genres to suit your entertainment needs. 3. 1080i Picture Resolution &amp; 5.1 Surround Sound: With crystal clear picture clarity, enjoy every detail in high resolution and enhance your experience. Now, you won�t miss out on the minutest detail on your HD TV with 1080i Picture Resolution and 5.1 Surround Sound. 4.Flexibility to make your own HD pack: Post the consumption of 1 month free viewing, pick from pre-created HD Add-On packs which suit your entertainment needs best. Choose your pack and enter the world of maximum HD entertainment. <br></p><p><br></p><p></p>', 'Dish TV HD NXT Connection and get a free subscription and many more thing', '1', '1533794109.hd nxt connection.jpeg', '1533794109.only set top box.jpeg', '1533794109.remote.jpeg', '1533629766.airtel-hd-connection-199-monthly-rechar', NULL, NULL, '2018-07-26 14:56:12', '2020-02-06 13:25:32'),
(12, 'Tata sky hd set top box dth new connection', '3250', '1562', '1562', '0', '<p>ata Sky is a premium DTH service which aims to revolutionize Indian home entertainment by empowering television viewers with , Choice of English, Hindi, Regional and HD channels , along with interactive services. Unlike generic set top boxes, Tata Sky offers a host of exciting services such as Actve Services and Showcase, our Pay-Per-View movie service. With this connection you get superior quality to better your entertainment experience . Tata Sky - Isko laga dala to life Jingalala. <br></p>', 'Tata Sky HD Box with 1 Month hindi lite', '2', '1532602751.tata1.jpeg', '1532602751.tata2.jpg', '1532602751.tata3.jpg', NULL, NULL, NULL, '2018-07-26 14:59:11', '2020-02-03 10:43:01'),
(13, '\\Tta sky hd set top box dth new connection', '3250', '1562', '1562', '0', '<p>\r\n</p><div></div><div><div>Tata Sky is a premium DTH service which aims to revolutionize Indian home entertainment by empowering television viewers with , Choice of English, Hindi, Regional and HD channels , along with interactive services. Unlike generic set top boxes, Tata Sky offers a host of exciting services such as Actve Services and Showcase, our Pay-Per-View movie service. With this connection you get superior quality to better your entertainment experience . Tata Sky - Isko laga dala to life Jingalala .</div></div>\r\n\r\n<br><p></p>', 'Tata Sky HD Set top box', '2', '1532602991.tata1.jpeg', NULL, '1532602991.tata2.jpg', NULL, NULL, NULL, '2018-07-26 15:03:11', '2020-02-03 10:44:18'),
(14, 'Tata Sky HD BOX with Secondary connection with 1 M', '2200', '999', '999', '0', '<p>Tata Sky HD Secondary Connection is valid only for customers having existing Tata Sky Connection. •	Customer Should order Tata Sky at the same address where existing connection is installed. •	Incase the customer does not provide the subscriber ID, we unable to process the order <br></p>', 'Tata Sky HD BOX with Secondary connection 1 Month pack free, Connection For Existing Customers.', '2', '1532603113.tata2.jpg', '1532603113.tata3.jpg', NULL, NULL, NULL, NULL, '2018-07-26 15:05:13', '2020-02-03 10:46:19'),
(15, 'Videocon D2h Sd Digital Set Top Box Remote Control', '450', '250', '100', '0', '<p>\r\n100% Original Remote Controll Parts Videocon D2hd.\r\n\r\n<br></p>', 'Videocon D2h Sd Digital Set Top Box Remote Controller  (Black)', '3', '1532603341.videocon-remote.jpg', NULL, NULL, NULL, NULL, NULL, '2018-07-26 15:09:01', '2018-08-09 14:40:23'),
(16, 'Digital Set Top Box', '2000', '1590', '1590', '0', '<p>\r\nVideocon d2h has the unique facility of being able to show you 12 \r\nprogrammes of a particular genre on your TV screen, at one go. This \r\nallows you to select the particular programme that you wish to watch.<br></p>', 'Digital Set Top Box', '3', '1532604218.videocon1.jpg', '1532604218.vidrem.jpg', NULL, NULL, NULL, NULL, '2018-07-26 15:23:38', '2019-07-05 09:47:03'),
(17, 'Dish tv hd set top box dth new connection', '1950', '1449', '1449', '0', '<p>\r\n\r\n</p><p>\r\n\r\n</p><p></p>\r\n\r\n<p>Dish tv NXT hd set top box dth new connection -: One month swagat pack free in all india, you ll never run out of choices. Enhance your dish tv HD  viewing experience with HD channels across various genres to suit your entertainment needs. 3. 1080i Picture Resolution &amp; 5.1 Surround Sound: With crystal clear picture clarity, enjoy every detail in high resolution and enhance your experience. Now, you won�t miss out on the minutest detail on your HD TV with 1080i Picture Resolution and 5.1 Surround Sound. 4.Flexibility to make your own HD pack: Post the consumption of 1 month free viewing, pick from pre-created HD Add-On packs which suit your entertainment needs best. Choose your pack and enter the world of maximum HD entertainment. <br></p><p></p>\r\n\r\n<p></p>', 'Dish TV hd NXT Connection -', '1', '1533794405.hd nxt connection.jpeg', '1533794368.only set top box.jpeg', '1533794368.remote.jpeg', '1533791315.dish tv nxt.jpg', NULL, NULL, '2018-08-04 18:15:01', '2020-02-03 10:11:08'),
(18, 'Dish tv hd set top box dth new connection', '1950', '1449', '1449', '0', '<p>\r\n\r\n</p><p>\r\n\r\n</p><p></p>\r\n\r\n<p>Dish tv NXT hd set top box dth new connection -: One month swagat pack free in all india, you ll never run out of choices. Enhance your dish tv HD  viewing experience with HD channels across various genres to suit your entertainment needs. 3. 1080i Picture Resolution &amp; 5.1 Surround Sound: With crystal clear picture clarity, enjoy every detail in high resolution and enhance your experience. Now, you won�t miss out on the minutest detail on your HD TV with 1080i Picture Resolution and 5.1 Surround Sound. 4.Flexibility to make your own HD pack: Post the consumption of 1 month free viewing, pick from pre-created HD Add-On packs which suit your entertainment needs best. Choose your pack and enter the world of maximum HD entertainment. <br></p><p></p>\r\n\r\n<p></p>', 'Dish TV hd nxt Connection-', '1', '1533791645.1532602328.pic1.jpg', '1533794537.only set top box.jpeg', '1533794537.remote.jpeg', '1533393027.Dish-TV.jpg', NULL, NULL, '2018-08-04 18:30:27', '2020-02-03 10:02:07'),
(19, 'Dish TV hd NXT Connection - ODIA buy online', '1950', '1449', '1449', '0', '<p>\r\n\r\n</p><p></p>\r\n\r\n<p>Dish tv NXT hd set top box dth new connection -: One month swagat pack free in all india, you ll never run out of choices. Enhance your dish tv HD  viewing experience with HD channels across various genres to suit your entertainment needs. 3. 1080i Picture Resolution &amp; 5.1 Surround Sound: With crystal clear picture clarity, enjoy every detail in high resolution and enhance your experience. Now, you won�t miss out on the minutest detail on your HD TV with 1080i Picture Resolution and 5.1 Surround Sound. 4.Flexibility to make your own HD pack: Post the consumption of 1 month free viewing, pick from pre-created HD Add-On packs which suit your entertainment needs best. Choose your pack and enter the world of maximum HD entertainment. <br></p><p></p>\r\n\r\n<p></p>', 'Dish TV HD nxt Connection and get a free 1-month Odia pack subscription absolutely free', '1', '1533794692.hd nxt connection.jpeg', '1533794692.only set top box.jpeg', '1533794692.remote.jpeg', NULL, NULL, NULL, '2018-08-09 10:04:52', '2020-02-06 13:26:30'),
(20, 'Dish tv hd set top box dth new connection buy onli', '1950', '1449', '1449', '0', '<p>\r\n\r\n</p><p></p>\r\n\r\n<p>Dish tv NXT hd set top box dth new connection -: One month swagat pack free in all india, you ll never run out of choices. Enhance your dish tv HD  viewing experience with HD channels across various genres to suit your entertainment needs. 3. 1080i Picture Resolution &amp; 5.1 Surround Sound: With crystal clear picture clarity, enjoy every detail in high resolution and enhance your experience. Now, you won�t miss out on the minutest detail on your HD TV with 1080i Picture Resolution and 5.1 Surround Sound. 4.Flexibility to make your own HD pack: Post the consumption of 1 month free viewing, pick from pre-created HD Add-On packs which suit your entertainment needs best. Choose your pack and enter the world of maximum HD entertainment. <br></p><p></p>\r\n\r\n<br><p></p>', 'Dish TV hd NXT Connection', '1', '1533794865.hd nxt connection.jpeg', '1533794865.only set top box.jpeg', '1533794865.remote.jpeg', NULL, NULL, NULL, '2018-08-09 10:07:45', '2020-02-06 13:28:22'),
(21, 'Dish tv hd set top box dth new connection buy onli', '2399', '1490', '1490', '0', '<p>\r\n\r\n</p><p></p><p></p>\r\n\r\n<p>Dish tv NXT hd set top box dth new connection -: One month swagat pack free in all india, you ll never run out of choices. Enhance your dish tv HD  viewing experience with HD channels across various genres to suit your entertainment needs. 3. 1080i Picture Resolution &amp; 5.1 Surround Sound: With crystal clear picture clarity, enjoy every detail in high resolution and enhance your experience. Now, you won�t miss out on the minutest detail on your HD TV with 1080i Picture Resolution and 5.1 Surround Sound. 4.Flexibility to make your own HD pack: Post the consumption of 1 month free viewing, pick from pre-created HD Add-On packs which suit your entertainment needs best. Choose your pack and enter the world of maximum HD entertainment. <br></p><p></p>\r\n\r\n<p> </p>', 'Dish TV SD Plus Connection', '1', '1533795558.dish plus.jpeg', '1533795558.remote.jpeg', NULL, NULL, NULL, NULL, '2018-08-09 10:19:18', '2020-02-06 13:28:37'),
(22, 'Dish tv sd set top box dth new connection', '2290', '1249', '1249', '0', '<p>\r\n\r\n</p><p>1-One Month swagat pack free</p><p>4-Unlimited recording for life time <br>5-1 year full warranty in connection .</p><p>6-All the equipments like dish antenna Lnbf cable set top box will be in the connection with one month free subscription.</p><p>&nbsp; <br>DTH seva in india best price/ best service/ best quality book now <br>it is a new dish tv connection there is a great scheme for limited time.&nbsp; &nbsp;services across various genres to suit your entertainment needs. Post the consumption of 1 month free viewing of Super Family pack, pick a pack to suit your entertainment needs best and top it up with regional and other add-on packs. 3. Digital Picture Quality &amp; Stereophonic Sound: Watch every detail in digital picture clarity</p><p>With the Dish.</p>', 'Dish TV SD Plus Connection -', '1', '1533795929.dish plus.jpeg', '1533795929.remote.jpeg', NULL, NULL, NULL, NULL, '2018-08-09 10:25:29', '2020-02-03 10:28:55'),
(23, 'Dish tv sd set top box dth new connection', '2290', '1249', '1249', '0', '<p>\r\n\r\n</p><p></p>\r\n\r\n<p>1-One Month swagat pack free</p><p>4-Unlimited recording for life time <br>5-1 year full warranty in connection .</p><p>6-All the equipments like dish antenna Lnbf cable set top box will be in the connection with one month free subscription.</p><p>&nbsp; <br>DTH seva in india best price/ best service/ best quality book now <br>it is a new dish tv connection there is a great scheme for limited time.  &nbsp;services across various genres to suit your entertainment needs. Post the consumption of 1 month free viewing of Super Family pack, pick a pack to suit your entertainment needs best and top it up with regional and other add-on packs. 3. Digital Picture Quality &amp; Stereophonic Sound: Watch every detail in digital picture clarity</p><p>With the Dish.</p>\r\n\r\n<p></p>', 'Dish TV SD Plus Connection -', '1', '1533796132.dish plus.jpeg', '1533796132.remote.jpeg', NULL, NULL, NULL, NULL, '2018-08-09 10:28:52', '2020-02-03 10:30:32'),
(24, 'Dish tv sd set top box dth new connection', '2290', '1249', '1249', '0', '<p>\r\n\r\n</p><div><div><div><div><div><div><p></p>\r\n\r\n<p>1-One Month swagat pack free</p><p>4-Unlimited recording for life time <br>5-1 year full warranty in connection .</p><p>6-All the equipments like dish antenna Lnbf cable set top box will be in the connection with one month free subscription.</p><p>&nbsp; <br>DTH seva in india best price/ best service/ best quality book now <br>it is a new dish tv connection there is a great scheme for limited time.  &nbsp;services across various genres to suit your entertainment needs. Post the consumption of 1 month free viewing of Super Family pack, pick a pack to suit your entertainment needs best and top it up with regional and other add-on packs. 3. Digital Picture Quality &amp; Stereophonic Sound: Watch every detail in digital picture clarity</p><p>With the Dish.</p>\r\n\r\n<p></p></div></div></div></div></div></div>', 'Dish TV SD Plus Connection -', '1', '1533796215.dish plus.jpeg', '1533796215.remote.jpeg', NULL, NULL, NULL, NULL, '2018-08-09 10:30:15', '2020-02-03 10:32:10'),
(25, 'Dish tv sd set top box dth new connection', '2290', '1249', '1249', '0', '<p>\r\n\r\n</p><p></p>\r\n\r\n<p>1-One Month swagat pack free</p><p>4-Unlimited recording for life time <br>5-1 year full warranty in connection .</p><p>6-All the equipments like dish antenna Lnbf cable set top box will be in the connection with one month free subscription.</p><p>&nbsp; <br>DTH seva in india best price/ best service/ best quality book now <br>it is a new dish tv connection there is a great scheme for limited time.  &nbsp;services across various genres to suit your entertainment needs. Post the consumption of 1 month free viewing of Super Family pack, pick a pack to suit your entertainment needs best and top it up with regional and other add-on packs. 3. Digital Picture Quality &amp; Stereophonic Sound: Watch every detail in digital picture clarity</p><p>With the Dish.</p>\r\n\r\n<p></p>', 'Dish TV SD Plus Connection -', '1', '1533796959.dish plus.jpeg', '1533796959.remote.jpeg', NULL, NULL, NULL, NULL, '2018-08-09 10:42:39', '2020-02-03 10:33:36'),
(26, 'Dish tv sd set top box dth new connection', '2290', '1249', '1249', '0', '<p>\r\n\r\n</p><p></p>\r\n\r\n<p>1-One Month swagat pack free</p><p>4-Unlimited recording for life time <br>5-1 year full warranty in connection .</p><p>6-All the equipments like dish antenna Lnbf cable set top box will be in the connection with one month free subscription.</p><p>&nbsp; <br>DTH seva in india best price/ best service/ best quality book now <br>it is a new dish tv connection there is a great scheme for limited time.  &nbsp;services across various genres to suit your entertainment needs. Post the consumption of 1 month free viewing of Super Family pack, pick a pack to suit your entertainment needs best and top it up with regional and other add-on packs. 3. Digital Picture Quality &amp; Stereophonic Sound: Watch every detail in digital picture clarity</p><p>With the Dish.</p>\r\n\r\n<p></p>', 'Dish TV SD Plus Connection -', '1', '1533797110.dish plus.jpeg', '1533797110.only set top box.jpeg', NULL, NULL, NULL, NULL, '2018-08-09 10:45:10', '2020-02-03 10:34:58'),
(27, 'Dish tv hd set top box dth new connection', '2990', '1449', '1449', '0', '<p>\r\n\r\n</p><p></p>\r\n\r\nDish tv NXT hd set top box dth new connection -: One month swagat pack free in all india, you ll never run out of choices. Enhance your dish tv HD  viewing experience with HD channels across various genres to suit your entertainment needs. 3. 1080i Picture Resolution &amp; 5.1 Surround Sound: With crystal clear picture clarity, enjoy every detail in high resolution and enhance your experience. Now, you won�t miss out on the minutest detail on your HD TV with 1080i Picture Resolution and 5.1 Surround Sound. 4.Flexibility to make your own HD pack: Post the consumption of 1 month free viewing, pick from pre-created HD Add-On packs which suit your entertainment needs best. Choose your pack and enter the world of maximum HD entertainment. \r\n\r\n<p></p>', 'Dish TV hd nxt Connection', '1', '1533967530.all flipkart.jpeg', '1533967530.bhai.jpeg', '1533967530.remote.jpeg', NULL, NULL, NULL, '2018-08-11 10:05:30', '2020-02-03 10:37:02'),
(28, 'Airtel DTH HD Set Top Box new connection', '2290', '1299', '1590', '0', '<p>\r\n\r\n</p><p>One of the best quality set top boxes to come out in recent times is the HD Connection. It features a good amount of HD and SD channels which is sure to leave you speechless. The quality of the picture is top notch and the product can withstand heavy usage making it a great buy. The new connection offers 1 year onsite warranty (on set top box) and the set top box comes with Free Installation as well. When you buy Airtel dth new connection, you can be sure that you will be able to get a good deal of usage out of it since it can withstand harsh weather of every kind. The completely water and dust proof and offers great signal no matter in which location you are. Airtel DTH TV will also let you record and view all your favorite shows. The set top box is equipped with an HDMI connection ensuring that you are able to connect it to any kind of HD TV. Best Picture clarity with the highest resolution of 1920 x 1080 makes it the best DTH connection in India. The box is also equipp', 'airtel hd connection get in all india with 1 month FTA pack free', '4', '1562324324.41GGFGbvW-L.jpg', '1562325396.41GGFGbvW-L.jpg', '1562325396.41GGFGbvW-L.jpg', '1562325396.41GGFGbvW-L.jpg', NULL, NULL, '2019-07-05 10:58:44', '2020-02-03 10:56:14'),
(29, 'airtel hd set top box dth new connection', '2290', '1299', '1299', 'o', '<p>\r\n\r\n</p><p>One of the best quality set top boxes to come out in recent times is the HD Connection. It features a good amount of HD and SD channels which is sure to leave you speechless. The quality of the picture is top notch and the product can withstand heavy usage making it a great buy. The new connection offers 1 year onsite warranty (on set top box) and the set top box comes with Free Installation as well. When you buy Airtel dth new connection, you can be sure that you will be able to get a good deal of usage out of it since it can withstand harsh weather of every kind. The completely water and dust proof and offers great signal no matter in which location you are. Airtel DTH TV will also let you record and view all your favorite shows. The set top box is equipped with an HDMI connection ensuring that you are able to connect it to any kind of HD TV. Best Picture clarity with the highest resolution of 1920 x 1080 makes it the best DTH connection in India. The box is also equipp', 'airtel hd connection with 1 month FTA pack free', '4', '1562324812.41GGFGbvW-L.jpg', '1562325357.41GGFGbvW-L.jpg', '1562325357.41GGFGbvW-L.jpg', '1562325357.41GGFGbvW-L.jpg', NULL, NULL, '2019-07-05 11:06:52', '2020-02-03 10:55:36'),
(30, 'airtel sd set top box dth new connection', '1990', '1199', '1199', '0', '<p>\r\n\r\n</p><p>One of the best quality set top boxes to come out in recent times is the HD Connection. It features a good amount of HD and SD channels which is sure to leave you speechless. The quality of the picture is top notch and the product can withstand heavy usage making it a great buy. The new connection offers 1 year onsite warranty (on set top box) and the set top box comes with Free Installation as well. When you buy Airtel dth new connection, you can be sure that you will be able to get a good deal of usage out of it since it can withstand harsh weather of every kind. The completely water and dust proof and offers great signal no matter in which location you are. Airtel DTH TV will also let you record and view all your favorite shows. The set top box is equipped with an HDMI connection ensuring that you are able to connect it to any kind of HD TV. Best Picture clarity with the highest resolution of 1920 x 1080 makes it the best DTH connection in India. The box is also equipp', 'airtel sd connection 1 month FTA pack free', '4', '1562325301.41GGFGbvW-L.jpg', '1562325301.41GGFGbvW-L.jpg', '1562325301.41GGFGbvW-L.jpg', '1562325301.41GGFGbvW-L.jpg', NULL, NULL, '2019-07-05 11:15:01', '2020-02-03 10:58:02'),
(31, 'airtel sd set top box new dth connection', '1990', '1199', '1199', '0', '<p>\r\n\r\n</p><p>One of the best quality set top boxes to come out in recent times is the HD Connection. It features a good amount of HD and SD channels which is sure to leave you speechless. The quality of the picture is top notch and the product can withstand heavy usage making it a great buy. The new connection offers 1 year onsite warranty (on set top box) and the set top box comes with Free Installation as well. When you buy Airtel dth new connection, you can be sure that you will be able to get a good deal of usage out of it since it can withstand harsh weather of every kind. The completely water and dust proof and offers great signal no matter in which location you are. Airtel DTH TV will also let you record and view all your favorite shows. The set top box is equipped with an HDMI connection ensuring that you are able to connect it to any kind of HD TV. Best Picture clarity with the highest resolution of 1920 x 1080 makes it the best DTH connection in India. The box is also equipp</p>', 'airtel sd connection all india with 1 month FTA  pack FREE', '4', '1562325706.41GGFGbvW-L.jpg', '1562325706.41GGFGbvW-L.jpg', '1562325706.41GGFGbvW-L.jpg', '1562325706.41GGFGbvW-L.jpg', NULL, NULL, '2019-07-05 11:21:46', '2020-06-04 04:38:20'),
(33, 'ABC', '134', '12', '12', '1', '<p>fef<br></p>', 'df', '1', '1591265205.1531741734.p4.jpg', '1591265205.1531741913.p7.jpg', '1591265206.1531741913.p8.jpg', '1591265206.1531919178.tata2.jpg', 'FLAT', 10, '2020-06-04 04:36:46', '2020-06-04 04:36:46');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rating`
--
CREATE TABLE IF NOT EXISTS `rating` (
`productid` int(50)
,`rating` decimal(59,8)
);
-- --------------------------------------------------------

--
-- Table structure for table `rechargeorders`
--

CREATE TABLE IF NOT EXISTS `rechargeorders` (
`id` int(11) NOT NULL,
  `uniqueoid` int(11) DEFAULT NULL,
  `user_id` varchar(100) NOT NULL,
  `brandid` varchar(200) NOT NULL,
  `cardno` varchar(200) NOT NULL,
  `mobileno` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `orderstatus` varchar(200) NOT NULL,
  `paymentstatus` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `api_url` text,
  `trnid` varchar(500) DEFAULT NULL,
  `recharge_res_msg` text,
  `wallet_deduction` varchar(500) DEFAULT NULL,
  `use_wallet` varchar(200) DEFAULT NULL,
  `amttopay` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rechargeorders`
--

INSERT INTO `rechargeorders` (`id`, `uniqueoid`, `user_id`, `brandid`, `cardno`, `mobileno`, `amount`, `orderstatus`, `paymentstatus`, `reason`, `updated_at`, `created_at`, `api_url`, `trnid`, `recharge_res_msg`, `wallet_deduction`, `use_wallet`, `amttopay`) VALUES
(1, 1592716683, '1', '1', '455666', '7978547767', '100', 'PENDING', 'PENDING', '', '2020-06-20 23:48:03', '2020-06-20 23:48:03', NULL, NULL, NULL, '10', 'Y', '90'),
(2, 1592717474, '1', '1', '455666', '7978547767', '10', 'PENDING', 'PENDING', '', '2020-06-21 00:01:14', '2020-06-21 00:01:14', NULL, NULL, NULL, '10', 'Y', '0'),
(3, 1592717507, '1', '1', '455666', '7978547767', '9', 'PENDING', 'PENDING', '', '2020-06-21 00:01:47', '2020-06-21 00:01:47', NULL, NULL, NULL, '9', 'Y', '0'),
(4, 1592717542, '1', '1', '455666', '7978547767', '100', 'PENDING', 'PENDING', '', '2020-06-21 00:02:22', '2020-06-21 00:02:22', NULL, NULL, NULL, NULL, 'N', '100');

-- --------------------------------------------------------

--
-- Table structure for table `recharges`
--

CREATE TABLE IF NOT EXISTS `recharges` (
`id` int(11) NOT NULL,
  `paystatus` varchar(200) NOT NULL,
  `rechargestatus` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customerid` varchar(100) DEFAULT NULL,
  `brandid` varchar(100) DEFAULT NULL,
  `rmn` varchar(100) DEFAULT NULL,
  `vcno` varchar(100) DEFAULT NULL,
  `amt` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rechargetickets`
--

CREATE TABLE IF NOT EXISTS `rechargetickets` (
`id` int(11) NOT NULL,
  `roid` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rechargetickets`
--

INSERT INTO `rechargetickets` (`id`, `roid`, `description`, `updated_at`, `created_at`) VALUES
(1, '1', 'ayhysdgdygdyd', '2018-07-26 07:06:35', '2018-07-26 07:06:35'),
(2, '3', 'Call me 7809418911', '2018-07-27 16:24:17', '2018-07-27 16:24:17'),
(3, '11', 'addvdav', '2018-08-07 14:34:51', '2018-08-07 14:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE IF NOT EXISTS `responses` (
`id` int(11) NOT NULL,
  `api` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `api`, `created_at`, `updated_at`) VALUES
(1, 'POST /api/onepay-response HTTP/1.1Accept:          */*Accept-Encoding: gzip, deflate, brAccept-Language: en-US,en;q=0.9Cache-Control:   no-cacheConnection:      keep-aliveContent-Length:  245Content-Type:    multipart/form-data; boundary=----WebKitFormBoundaryKSURL58o9Ip3NrdzHost:            localhost:8000Origin:          chrome-extension://fhbjgbiflinjbdggehcddcbncdddomopPostman-Token:   7f3e03da-f6e8-1ab4-5ae4-8673008fe427Sec-Fetch-Dest:  emptySec-Fetch-Mode:  corsSec-Fetch-Site:  noneUser-Agent:      Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', '2020-06-09 23:30:31', '2020-06-09 23:30:31'),
(2, NULL, '2020-06-09 23:35:51', '2020-06-09 23:35:51'),
(3, '{"username":"admin","password":"123456"}', '2020-06-09 23:49:25', '2020-06-09 23:49:25'),
(4, '{"username":"admin","password":"123456","amit":"1"}', '2020-06-09 23:50:31', '2020-06-09 23:50:31'),
(5, '{"ID":"admin","TNO":"123456"}', '2020-06-11 11:07:38', '2020-06-11 11:07:38'),
(6, '{"ID":"admin","TNO":"123456"}', '2020-06-11 11:09:10', '2020-06-11 11:09:10'),
(7, '{"{\\"ID\\":\\"OnePayExpress\\",\\"TNO\\":\\"OID90MOBCUSTID1\\",\\"ST\\":\\"1\\",\\"STMSG\\":\\"Success\\",\\"TID\\":\\"20019262\\",\\"OPRTID\\":\\"708751103\\",\\"Mobile\\":\\"7381256230\\",\\"Amount\\":\\"10\\",\\"PRB\\":\\"244_85\\",\\"POB\\":\\"234_85\\",\\"DP\\":\\"2_3\\",\\"DR\\":\\"0_23\\"}":null}', '2020-06-13 00:12:34', '2020-06-13 00:12:34'),
(8, '{"{\\"ID\\":\\"OnePayExpress\\",\\"TNO\\":\\"OID90MOBCUSTID1\\",\\"ST\\":\\"1\\",\\"STMSG\\":\\"Success\\",\\"TID\\":\\"20019262\\",\\"OPRTID\\":\\"708751103\\",\\"Mobile\\":\\"7381256230\\",\\"Amount\\":\\"10\\",\\"PRB\\":\\"244_85\\",\\"POB\\":\\"234_85\\",\\"DP\\":\\"2_3\\",\\"DR\\":\\"0_23\\"}":null}', '2020-06-13 00:14:04', '2020-06-13 00:14:04'),
(9, '{"------WebKitFormBoundarygYdDLI1o9eD8d1MD\\r\\nContent-Disposition:_form-data;_name":"\\"ID\\"\\r\\n\\r\\nOnePayExpress\\r\\n------WebKitFormBoundarygYdDLI1o9eD8d1MD\\r\\nContent-Disposition: form-data; name=\\"TNO\\"\\r\\n\\r\\nOID90MOBCUSTID1\\r\\n------WebKitFormBoundarygYdDLI1o9eD8d1MD\\r\\nContent-Disposition: form-data; name=\\"ST\\"\\r\\n\\r\\n1\\r\\n------WebKitFormBoundarygYdDLI1o9eD8d1MD\\r\\nContent-Disposition: form-data; name=\\"STMSG\\"\\r\\n\\r\\nSuccess\\r\\n------WebKitFormBoundarygYdDLI1o9eD8d1MD\\r\\nContent-Disposition: form-data; name=\\"TID\\"\\r\\n\\r\\n20019262\\r\\n------WebKitFormBoundarygYdDLI1o9eD8d1MD--"}', '2020-06-13 00:17:22', '2020-06-13 00:17:22'),
(10, '{"------WebKitFormBoundaryFBsjUqxMWQ8CGzVO\\r\\nContent-Disposition:_form-data;_name":"\\"ID\\"\\r\\n\\r\\nOnePayExpress\\r\\n------WebKitFormBoundaryFBsjUqxMWQ8CGzVO\\r\\nContent-Disposition: form-data; name=\\"TNO\\"\\r\\n\\r\\nOID90MOBCUSTID1\\r\\n------WebKitFormBoundaryFBsjUqxMWQ8CGzVO\\r\\nContent-Disposition: form-data; name=\\"ST\\"\\r\\n\\r\\n1\\r\\n------WebKitFormBoundaryFBsjUqxMWQ8CGzVO\\r\\nContent-Disposition: form-data; name=\\"STMSG\\"\\r\\n\\r\\nSuccess\\r\\n------WebKitFormBoundaryFBsjUqxMWQ8CGzVO\\r\\nContent-Disposition: form-data; name=\\"TID\\"\\r\\n\\r\\n20019262\\r\\n------WebKitFormBoundaryFBsjUqxMWQ8CGzVO--"}', '2020-06-13 00:18:07', '2020-06-13 00:18:07'),
(11, '{"ID":"1"}', '2020-06-13 00:21:24', '2020-06-13 00:21:24'),
(12, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:22:20', '2020-06-13 00:22:20'),
(13, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:23:51', '2020-06-13 00:23:51'),
(14, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:24:17', '2020-06-13 00:24:17'),
(15, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:25:41', '2020-06-13 00:25:41'),
(16, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:25:42', '2020-06-13 00:25:42'),
(17, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:25:44', '2020-06-13 00:25:44'),
(18, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:25:59', '2020-06-13 00:25:59'),
(19, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:26:13', '2020-06-13 00:26:13'),
(20, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:27:32', '2020-06-13 00:27:32'),
(21, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:27:57', '2020-06-13 00:27:57'),
(22, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:29:15', '2020-06-13 00:29:15'),
(23, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:30:01', '2020-06-13 00:30:01'),
(24, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:46:20', '2020-06-13 00:46:20'),
(25, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:48:21', '2020-06-13 00:48:21'),
(26, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:50:16', '2020-06-13 00:50:16'),
(27, '{"ID":"OnePayExpress","TNO":"OID90MOBCUSTID1","ST":"1","STMSG":"Success","TID":"20019262"}', '2020-06-13 00:57:21', '2020-06-13 00:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`id` int(1) NOT NULL,
  `customerid` int(50) NOT NULL,
  `productid` int(50) NOT NULL,
  `orderid` varchar(200) NOT NULL,
  `price` int(50) DEFAULT NULL,
  `value` int(50) DEFAULT NULL,
  `quality` int(50) DEFAULT NULL,
  `review` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `customerid`, `productid`, `orderid`, `price`, `value`, `quality`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '', 1, 2, 3, 'AVG PRODUCT', '2018-07-18 05:59:46', '2018-04-28 05:59:46'),
(2, 3, 3, '', 5, 5, 5, 'BEST PRODUCT', '2018-07-20 06:12:17', '2018-04-28 06:12:17'),
(3, 1, 4, '', 3, 3, 3, 'AVG PRODUCT', '2018-04-28 06:12:45', '2018-04-28 06:12:45'),
(4, 3, 5, '', 2, 1, 1, 'WORST PRODUCT', '2018-05-05 06:10:41', '2018-05-05 06:10:41'),
(5, 1, 6, '', 5, 5, 5, 'BEST PRODUCT', '2018-07-05 00:34:56', '2018-07-05 00:34:56'),
(6, 1, 6, '6', 5, 5, 5, 'rtyujhytjyt', '2018-07-23 07:07:24', '2018-07-23 07:07:24'),
(7, 3, 8, '13', 5, 5, 5, 'OUTSTANDING', '2018-07-26 19:31:30', '2018-07-26 19:31:30'),
(8, 1, 16, '8', 5, 1, 1, NULL, '2018-07-27 14:11:30', '2018-07-27 14:11:30'),
(9, 7, 9, '108', 5, 5, 5, 'WOW such a great scheme and best  offers\r\ni have got best  service\r\n\r\nThanks DTH seva', '2018-08-09 15:10:21', '2018-08-09 15:10:21'),
(10, 7, 10, '112', 5, 5, 5, 'Thanks DTH seva for such an amazing DTH product \r\nI will recommend everyone who wants to buy this DTH connection', '2018-08-09 18:40:11', '2018-08-09 18:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `saleschannels`
--

CREATE TABLE IF NOT EXISTS `saleschannels` (
`id` int(11) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `channelid` varchar(200) NOT NULL,
  `channelcost` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saleschannels`
--

INSERT INTO `saleschannels` (`id`, `brand`, `channelid`, `channelcost`, `updated_at`, `created_at`) VALUES
(1, '4', '1', '67', '2018-08-05 15:10:47', '2018-08-05 15:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
`id` int(10) unsigned NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, '15827130902469652985e5649022d840dth-welcme-to-dth-seva(1).jpg', 'DISH TV HD NXT BOX', 'Up to 50% off', '2018-07-16 06:08:28', '2020-02-26 10:31:30'),
(3, '15827131096021845145e56491596fe6dth-dishtv-banner.jpg', 'TATA SKY HD CONNECTION OFFER', 'Up to 50% off', '2018-07-16 06:11:24', '2020-02-26 10:31:49'),
(4, '158271315417040224665e5649427a1e8dth-tata-sky-banner.jpg', 'Tata skyup 70% off', 'tatasky new connection', '2020-02-26 10:32:34', '2020-02-26 10:32:34'),
(5, '158271321521208304075e56497f4d49ddth-airtel-dth-banner.jpg', 'Airtel Digital Tv', 'Airtel Digital Tv  New Connection', '2020-02-26 10:33:35', '2020-02-26 10:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE IF NOT EXISTS `subscribes` (
`id` int(11) NOT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=279 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `mobile`, `created_at`, `updated_at`) VALUES
(1, '7978547767', '2018-08-20 16:19:39', '2018-08-20 16:19:39'),
(2, '8093000501', '2018-08-20 16:20:26', '2018-08-20 16:20:26'),
(3, '8093000501', '2018-08-20 16:28:48', '2018-08-20 16:28:48'),
(4, '7809418911', '2018-08-20 18:04:29', '2018-08-20 18:04:29'),
(5, '7490801241', '2018-08-21 07:13:25', '2018-08-21 07:13:25'),
(6, '9437919923', '2018-08-21 08:40:30', '2018-08-21 08:40:30'),
(7, '7498367787', '2018-08-21 10:00:23', '2018-08-21 10:00:23'),
(8, '9836162666', '2018-08-21 13:08:39', '2018-08-21 13:08:39'),
(9, '7405090938', '2018-08-21 14:26:51', '2018-08-21 14:26:51'),
(10, '9887173244', '2018-08-21 14:36:41', '2018-08-21 14:36:41'),
(11, '9764910002', '2018-08-21 16:46:11', '2018-08-21 16:46:11'),
(12, '9839261054', '2018-08-21 22:37:00', '2018-08-21 22:37:00'),
(13, '238992', '2018-08-22 13:22:31', '2018-08-22 13:22:31'),
(14, '9894353397', '2018-08-22 14:16:01', '2018-08-22 14:16:01'),
(15, '8878788', '2018-08-22 15:45:15', '2018-08-22 15:45:15'),
(16, '9837649754', '2018-08-23 12:38:10', '2018-08-23 12:38:10'),
(17, NULL, '2018-08-23 12:49:34', '2018-08-23 12:49:34'),
(18, '9923859995', '2018-08-23 13:08:21', '2018-08-23 13:08:21'),
(19, '998382761', '2018-08-23 13:36:29', '2018-08-23 13:36:29'),
(20, '7020200587', '2018-08-23 13:41:45', '2018-08-23 13:41:45'),
(21, '9289501546', '2018-08-23 13:52:09', '2018-08-23 13:52:09'),
(22, '8770025440', '2018-08-23 13:58:07', '2018-08-23 13:58:07'),
(23, '9687752969', '2018-08-23 13:58:09', '2018-08-23 13:58:09'),
(24, '9437919923', '2018-08-23 14:08:33', '2018-08-23 14:08:33'),
(25, '7009470870', '2018-08-23 14:32:35', '2018-08-23 14:32:35'),
(26, '8250364978', '2018-08-23 14:44:11', '2018-08-23 14:44:11'),
(27, '9078105133', '2018-08-23 14:48:01', '2018-08-23 14:48:01'),
(28, '8707746685', '2018-08-23 15:00:05', '2018-08-23 15:00:05'),
(29, '9640906297', '2018-08-23 15:21:10', '2018-08-23 15:21:10'),
(30, '9898913511', '2018-08-23 15:30:26', '2018-08-23 15:30:26'),
(31, '7837567198', '2018-08-23 15:33:00', '2018-08-23 15:33:00'),
(32, '7008031739', '2018-08-23 15:56:50', '2018-08-23 15:56:50'),
(33, '8897153244', '2018-08-23 16:19:27', '2018-08-23 16:19:27'),
(34, '7809418911', '2018-08-23 16:25:42', '2018-08-23 16:25:42'),
(35, '9335506663', '2018-08-23 16:27:41', '2018-08-23 16:27:41'),
(36, '7809418911', '2018-08-23 16:27:43', '2018-08-23 16:27:43'),
(37, '9699398800', '2018-08-23 18:34:09', '2018-08-23 18:34:09'),
(38, '7012016825', '2018-08-23 18:53:43', '2018-08-23 18:53:43'),
(39, '7012016825', '2018-08-23 19:27:42', '2018-08-23 19:27:42'),
(40, '7977840584', '2018-08-23 19:47:24', '2018-08-23 19:47:24'),
(41, '8840664649', '2018-08-23 20:09:34', '2018-08-23 20:09:34'),
(42, '8885556656', '2018-08-23 20:26:26', '2018-08-23 20:26:26'),
(43, '8885556656', '2018-08-23 20:26:47', '2018-08-23 20:26:47'),
(44, '8889997125', '2018-08-23 20:33:30', '2018-08-23 20:33:30'),
(45, '9923693143', '2018-08-24 09:58:50', '2018-08-24 09:58:50'),
(46, '7008031739', '2019-07-03 10:19:27', '2019-07-03 10:19:27'),
(47, '7972259107', '2019-07-06 06:19:46', '2019-07-06 06:19:46'),
(48, '46465', '2019-07-15 07:29:21', '2019-07-15 07:29:21'),
(49, '9944885555', '2019-07-16 06:39:45', '2019-07-16 06:39:45'),
(50, '9777917953', '2019-08-08 12:32:05', '2019-08-08 12:32:05'),
(51, '9420943768', '2019-08-19 02:28:58', '2019-08-19 02:28:58'),
(52, '7845577066', '2019-08-21 01:17:44', '2019-08-21 01:17:44'),
(53, NULL, '2019-08-21 08:02:22', '2019-08-21 08:02:22'),
(54, '7428992898', '2019-08-24 10:30:59', '2019-08-24 10:30:59'),
(55, '1234567890', '2019-08-28 15:17:24', '2019-08-28 15:17:24'),
(56, '1234567890', '2019-08-29 04:27:08', '2019-08-29 04:27:08'),
(57, '9008841014', '2019-09-08 17:21:43', '2019-09-08 17:21:43'),
(58, '9464059605', '2019-09-11 10:45:27', '2019-09-11 10:45:27'),
(59, '8888899999', '2019-09-25 12:06:36', '2019-09-25 12:06:36'),
(60, '7698555154', '2019-09-30 09:21:36', '2019-09-30 09:21:36'),
(61, NULL, '2019-10-04 22:08:02', '2019-10-04 22:08:02'),
(62, NULL, '2019-10-06 01:37:59', '2019-10-06 01:37:59'),
(63, NULL, '2019-10-06 02:33:31', '2019-10-06 02:33:31'),
(64, NULL, '2019-10-06 05:06:28', '2019-10-06 05:06:28'),
(65, '8073987677', '2019-10-06 06:50:42', '2019-10-06 06:50:42'),
(66, NULL, '2019-10-07 05:10:50', '2019-10-07 05:10:50'),
(67, NULL, '2019-10-07 06:36:22', '2019-10-07 06:36:22'),
(68, NULL, '2019-10-07 09:54:23', '2019-10-07 09:54:23'),
(69, NULL, '2019-10-07 11:01:02', '2019-10-07 11:01:02'),
(70, NULL, '2019-10-07 12:46:14', '2019-10-07 12:46:14'),
(71, NULL, '2019-10-07 18:21:02', '2019-10-07 18:21:02'),
(72, NULL, '2019-10-09 12:37:12', '2019-10-09 12:37:12'),
(73, NULL, '2019-10-10 21:03:07', '2019-10-10 21:03:07'),
(74, NULL, '2019-10-10 21:19:38', '2019-10-10 21:19:38'),
(75, NULL, '2019-10-10 22:37:28', '2019-10-10 22:37:28'),
(76, NULL, '2019-10-11 03:44:57', '2019-10-11 03:44:57'),
(77, NULL, '2019-10-12 06:28:40', '2019-10-12 06:28:40'),
(78, NULL, '2019-10-12 12:32:31', '2019-10-12 12:32:31'),
(79, NULL, '2019-10-12 17:00:00', '2019-10-12 17:00:00'),
(80, NULL, '2019-10-14 06:12:42', '2019-10-14 06:12:42'),
(81, NULL, '2019-10-14 11:36:15', '2019-10-14 11:36:15'),
(82, NULL, '2019-10-14 11:36:17', '2019-10-14 11:36:17'),
(83, NULL, '2019-10-17 14:37:53', '2019-10-17 14:37:53'),
(84, NULL, '2019-10-17 18:05:53', '2019-10-17 18:05:53'),
(85, NULL, '2019-10-19 05:19:05', '2019-10-19 05:19:05'),
(86, NULL, '2019-10-20 00:50:07', '2019-10-20 00:50:07'),
(87, '9348219765', '2019-10-21 08:59:52', '2019-10-21 08:59:52'),
(88, NULL, '2019-10-24 22:40:19', '2019-10-24 22:40:19'),
(89, NULL, '2019-10-28 09:12:59', '2019-10-28 09:12:59'),
(90, NULL, '2019-10-28 19:10:59', '2019-10-28 19:10:59'),
(91, NULL, '2019-10-28 19:47:25', '2019-10-28 19:47:25'),
(92, NULL, '2019-10-29 10:10:18', '2019-10-29 10:10:18'),
(93, NULL, '2019-11-10 15:52:25', '2019-11-10 15:52:25'),
(94, '8435571744', '2019-11-17 14:56:22', '2019-11-17 14:56:22'),
(95, NULL, '2019-11-27 00:11:42', '2019-11-27 00:11:42'),
(96, NULL, '2019-12-09 08:35:51', '2019-12-09 08:35:51'),
(97, '7290863398', '2019-12-27 13:14:27', '2019-12-27 13:14:27'),
(98, '333', '2020-01-30 09:54:08', '2020-01-30 09:54:08'),
(99, '9937274391', '2020-02-01 16:40:34', '2020-02-01 16:40:34'),
(100, '9438393849', '2020-02-02 14:42:48', '2020-02-02 14:42:48'),
(101, '8917387538', '2020-02-03 10:43:32', '2020-02-03 10:43:32'),
(102, '7033225702', '2020-02-04 04:57:16', '2020-02-04 04:57:16'),
(103, '9049668800', '2020-02-04 05:09:24', '2020-02-04 05:09:24'),
(104, NULL, '2020-02-04 11:46:49', '2020-02-04 11:46:49'),
(105, '9423738516', '2020-02-05 05:30:15', '2020-02-05 05:30:15'),
(106, '9763652726', '2020-02-05 05:56:16', '2020-02-05 05:56:16'),
(107, NULL, '2020-02-05 06:13:02', '2020-02-05 06:13:02'),
(108, '9861600791', '2020-02-05 06:45:08', '2020-02-05 06:45:08'),
(109, '9861600791', '2020-02-05 06:45:10', '2020-02-05 06:45:10'),
(110, '9861600791', '2020-02-05 06:45:15', '2020-02-05 06:45:15'),
(111, '9861600791', '2020-02-05 06:45:19', '2020-02-05 06:45:19'),
(112, '7777777777', '2020-02-05 11:23:04', '2020-02-05 11:23:04'),
(113, '8972745707', '2020-02-05 11:32:36', '2020-02-05 11:32:36'),
(114, '8972745707', '2020-02-05 11:32:36', '2020-02-05 11:32:36'),
(115, '8129617043', '2020-02-05 11:45:13', '2020-02-05 11:45:13'),
(116, '7727996277', '2020-02-05 12:01:28', '2020-02-05 12:01:28'),
(117, '7757996277', '2020-02-05 12:02:07', '2020-02-05 12:02:07'),
(118, '8602236972', '2020-02-05 12:04:10', '2020-02-05 12:04:10'),
(119, '8602236972', '2020-02-05 12:04:17', '2020-02-05 12:04:17'),
(120, '8602236972', '2020-02-05 12:04:25', '2020-02-05 12:04:25'),
(121, '8981365361', '2020-02-05 12:55:50', '2020-02-05 12:55:50'),
(122, '8897762952', '2020-02-06 04:19:03', '2020-02-06 04:19:03'),
(123, '9741305078', '2020-02-06 04:26:18', '2020-02-06 04:26:18'),
(124, '7738883906', '2020-02-06 04:45:40', '2020-02-06 04:45:40'),
(125, NULL, '2020-02-06 04:54:58', '2020-02-06 04:54:58'),
(126, '7065181875', '2020-02-06 05:17:06', '2020-02-06 05:17:06'),
(127, '8601886038', '2020-02-06 05:18:45', '2020-02-06 05:18:45'),
(128, '8106031567', '2020-02-06 05:45:33', '2020-02-06 05:45:33'),
(129, '9533424111', '2020-02-06 10:19:32', '2020-02-06 10:19:32'),
(130, '9533424111', '2020-02-06 10:19:34', '2020-02-06 10:19:34'),
(131, '9533424111', '2020-02-06 10:19:36', '2020-02-06 10:19:36'),
(132, '7339115501', '2020-02-07 04:31:17', '2020-02-07 04:31:17'),
(133, '7339115501', '2020-02-07 04:31:19', '2020-02-07 04:31:19'),
(134, '9848802802', '2020-02-07 04:36:34', '2020-02-07 04:36:34'),
(135, '9848802802', '2020-02-07 04:36:35', '2020-02-07 04:36:35'),
(136, '9848802802', '2020-02-07 04:36:36', '2020-02-07 04:36:36'),
(137, '9848802802', '2020-02-07 04:36:36', '2020-02-07 04:36:36'),
(138, '8797289158', '2020-02-07 04:45:01', '2020-02-07 04:45:01'),
(139, '9448618048', '2020-02-07 05:04:27', '2020-02-07 05:04:27'),
(140, NULL, '2020-02-07 05:14:31', '2020-02-07 05:14:31'),
(141, NULL, '2020-02-07 05:14:43', '2020-02-07 05:14:43'),
(142, '6267504703', '2020-02-07 05:15:24', '2020-02-07 05:15:24'),
(143, '7636094711', '2020-02-07 05:24:29', '2020-02-07 05:24:29'),
(144, '9741344499', '2020-02-07 07:06:27', '2020-02-07 07:06:27'),
(145, '9995065333', '2020-02-07 07:06:38', '2020-02-07 07:06:38'),
(146, NULL, '2020-02-07 09:01:27', '2020-02-07 09:01:27'),
(147, NULL, '2020-02-07 09:04:26', '2020-02-07 09:04:26'),
(148, NULL, '2020-02-07 09:04:28', '2020-02-07 09:04:28'),
(149, NULL, '2020-02-07 09:04:28', '2020-02-07 09:04:28'),
(150, NULL, '2020-02-07 09:04:30', '2020-02-07 09:04:30'),
(151, NULL, '2020-02-07 09:04:31', '2020-02-07 09:04:31'),
(152, NULL, '2020-02-07 09:04:31', '2020-02-07 09:04:31'),
(153, NULL, '2020-02-07 09:04:32', '2020-02-07 09:04:32'),
(154, '7051890631', '2020-02-07 09:04:57', '2020-02-07 09:04:57'),
(155, '9711365656', '2020-02-07 09:15:07', '2020-02-07 09:15:07'),
(156, '9048670670', '2020-02-07 10:05:26', '2020-02-07 10:05:26'),
(157, '9048670670', '2020-02-07 10:05:29', '2020-02-07 10:05:29'),
(158, NULL, '2020-02-07 10:07:32', '2020-02-07 10:07:32'),
(159, '9901640648', '2020-02-07 10:11:12', '2020-02-07 10:11:12'),
(160, '9036123361', '2020-02-07 10:17:39', '2020-02-07 10:17:39'),
(161, NULL, '2020-02-07 11:24:18', '2020-02-07 11:24:18'),
(162, NULL, '2020-02-07 11:37:31', '2020-02-07 11:37:31'),
(163, '8106031567', '2020-02-07 11:50:05', '2020-02-07 11:50:05'),
(164, NULL, '2020-02-07 12:00:54', '2020-02-07 12:00:54'),
(165, NULL, '2020-02-08 05:21:07', '2020-02-08 05:21:07'),
(166, NULL, '2020-02-08 05:21:26', '2020-02-08 05:21:26'),
(167, '8851220406', '2020-02-08 05:41:02', '2020-02-08 05:41:02'),
(168, NULL, '2020-02-08 05:41:17', '2020-02-08 05:41:17'),
(169, NULL, '2020-02-08 05:58:09', '2020-02-08 05:58:09'),
(170, NULL, '2020-02-08 06:45:50', '2020-02-08 06:45:50'),
(171, '9381047659', '2020-02-08 06:55:03', '2020-02-08 06:55:03'),
(172, NULL, '2020-02-08 07:38:03', '2020-02-08 07:38:03'),
(173, '8511929109', '2020-02-08 08:20:32', '2020-02-08 08:20:32'),
(174, '9969506152', '2020-02-08 08:24:52', '2020-02-08 08:24:52'),
(175, NULL, '2020-02-08 08:30:51', '2020-02-08 08:30:51'),
(176, NULL, '2020-02-08 09:42:01', '2020-02-08 09:42:01'),
(177, '8420487212', '2020-02-08 09:49:18', '2020-02-08 09:49:18'),
(178, '8420487212', '2020-02-08 09:49:18', '2020-02-08 09:49:18'),
(179, '8420487212', '2020-02-08 09:49:19', '2020-02-08 09:49:19'),
(180, NULL, '2020-02-08 09:59:48', '2020-02-08 09:59:48'),
(181, NULL, '2020-02-08 10:34:33', '2020-02-08 10:34:33'),
(182, '9335909041', '2020-02-08 11:12:14', '2020-02-08 11:12:14'),
(183, '9335909041', '2020-02-08 11:12:15', '2020-02-08 11:12:15'),
(184, '7480054052', '2020-02-08 11:23:08', '2020-02-08 11:23:08'),
(185, '9667919032', '2020-02-08 11:58:02', '2020-02-08 11:58:02'),
(186, '9667919032', '2020-02-08 11:58:03', '2020-02-08 11:58:03'),
(187, NULL, '2020-02-08 12:10:20', '2020-02-08 12:10:20'),
(188, NULL, '2020-02-09 04:41:26', '2020-02-09 04:41:26'),
(189, '7008031739', '2020-02-11 04:26:19', '2020-02-11 04:26:19'),
(190, '7999678144', '2020-02-12 04:34:45', '2020-02-12 04:34:45'),
(191, '9145762737', '2020-02-12 04:41:18', '2020-02-12 04:41:18'),
(192, '9490166761', '2020-02-12 04:53:58', '2020-02-12 04:53:58'),
(193, '9490166761', '2020-02-12 04:53:59', '2020-02-12 04:53:59'),
(194, NULL, '2020-02-12 04:58:21', '2020-02-12 04:58:21'),
(195, '8355855560', '2020-02-12 05:52:29', '2020-02-12 05:52:29'),
(196, NULL, '2020-02-12 06:04:33', '2020-02-12 06:04:33'),
(197, '9873140625', '2020-02-12 06:05:12', '2020-02-12 06:05:12'),
(198, '7062808504', '2020-02-12 06:07:41', '2020-02-12 06:07:41'),
(199, NULL, '2020-02-12 06:07:54', '2020-02-12 06:07:54'),
(200, '6281010676', '2020-02-12 06:44:10', '2020-02-12 06:44:10'),
(201, '9427845709', '2020-02-12 06:57:12', '2020-02-12 06:57:12'),
(202, '9149529015', '2020-02-12 06:57:53', '2020-02-12 06:57:53'),
(203, NULL, '2020-02-12 07:01:46', '2020-02-12 07:01:46'),
(204, NULL, '2020-02-12 07:01:47', '2020-02-12 07:01:47'),
(205, NULL, '2020-02-12 07:06:09', '2020-02-12 07:06:09'),
(206, NULL, '2020-02-12 07:14:28', '2020-02-12 07:14:28'),
(207, NULL, '2020-02-12 07:14:32', '2020-02-12 07:14:32'),
(208, NULL, '2020-02-12 07:15:28', '2020-02-12 07:15:28'),
(209, '8220474643', '2020-02-12 07:23:32', '2020-02-12 07:23:32'),
(210, NULL, '2020-02-12 07:29:16', '2020-02-12 07:29:16'),
(211, '9111290543', '2020-02-12 07:40:05', '2020-02-12 07:40:05'),
(212, '7985080970', '2020-02-12 07:48:40', '2020-02-12 07:48:40'),
(213, '9974992128', '2020-02-12 08:03:39', '2020-02-12 08:03:39'),
(214, NULL, '2020-02-12 08:23:48', '2020-02-12 08:23:48'),
(215, '8298652884', '2020-02-12 08:58:35', '2020-02-12 08:58:35'),
(216, '9623788906', '2020-02-12 08:59:34', '2020-02-12 08:59:34'),
(217, NULL, '2020-02-12 09:01:55', '2020-02-12 09:01:55'),
(218, '9694068244', '2020-02-12 09:06:47', '2020-02-12 09:06:47'),
(219, '9037936732', '2020-02-12 09:07:05', '2020-02-12 09:07:05'),
(220, '9694068244', '2020-02-12 09:08:27', '2020-02-12 09:08:27'),
(221, '9694068244', '2020-02-12 09:08:29', '2020-02-12 09:08:29'),
(222, '9662269232', '2020-02-12 09:19:49', '2020-02-12 09:19:49'),
(223, '9399280833', '2020-02-12 09:21:01', '2020-02-12 09:21:01'),
(224, '9719879090', '2020-02-12 10:03:09', '2020-02-12 10:03:09'),
(225, '9305676754', '2020-02-12 10:23:15', '2020-02-12 10:23:15'),
(226, '9514414140', '2020-02-12 12:31:51', '2020-02-12 12:31:51'),
(227, '9331887267', '2020-02-12 12:45:51', '2020-02-12 12:45:51'),
(228, '6284836970', '2020-02-12 12:52:31', '2020-02-12 12:52:31'),
(229, '9162515669', '2020-02-12 12:59:43', '2020-02-12 12:59:43'),
(230, '7355166870', '2020-02-15 08:40:37', '2020-02-15 08:40:37'),
(231, NULL, '2020-02-15 10:22:15', '2020-02-15 10:22:15'),
(232, '9819318454', '2020-02-15 14:30:46', '2020-02-15 14:30:46'),
(233, '9075094211', '2020-02-15 15:45:29', '2020-02-15 15:45:29'),
(234, NULL, '2020-02-15 16:14:26', '2020-02-15 16:14:26'),
(235, NULL, '2020-02-15 16:15:52', '2020-02-15 16:15:52'),
(236, NULL, '2020-02-16 12:23:48', '2020-02-16 12:23:48'),
(237, '8264433547', '2020-02-16 14:50:25', '2020-02-16 14:50:25'),
(238, '8264433547', '2020-02-16 14:50:26', '2020-02-16 14:50:26'),
(239, '8264433547', '2020-02-16 14:50:27', '2020-02-16 14:50:27'),
(240, '8264433547', '2020-02-16 14:50:28', '2020-02-16 14:50:28'),
(241, NULL, '2020-02-16 16:38:39', '2020-02-16 16:38:39'),
(242, NULL, '2020-02-16 16:38:42', '2020-02-16 16:38:42'),
(243, '94902475', '2020-02-17 01:45:22', '2020-02-17 01:45:22'),
(244, '8778524665', '2020-02-17 13:40:19', '2020-02-17 13:40:19'),
(245, '9702782724', '2020-02-17 17:36:55', '2020-02-17 17:36:55'),
(246, '9398511726', '2020-02-18 04:50:02', '2020-02-18 04:50:02'),
(247, NULL, '2020-02-18 06:38:54', '2020-02-18 06:38:54'),
(248, '8356810211', '2020-02-18 07:33:49', '2020-02-18 07:33:49'),
(249, '8356810211', '2020-02-18 07:33:53', '2020-02-18 07:33:53'),
(250, '7355733545', '2020-02-18 07:57:26', '2020-02-18 07:57:26'),
(251, '7718906891', '2020-02-18 08:10:56', '2020-02-18 08:10:56'),
(252, '01523403784', '2020-02-18 09:00:17', '2020-02-18 09:00:17'),
(253, NULL, '2020-02-18 09:02:37', '2020-02-18 09:02:37'),
(254, NULL, '2020-02-18 09:05:34', '2020-02-18 09:05:34'),
(255, '9737771298', '2020-02-18 10:14:05', '2020-02-18 10:14:05'),
(256, '9080288591', '2020-02-18 10:27:26', '2020-02-18 10:27:26'),
(257, '9080288591', '2020-02-18 10:27:29', '2020-02-18 10:27:29'),
(258, NULL, '2020-02-18 10:37:37', '2020-02-18 10:37:37'),
(259, NULL, '2020-02-18 10:56:15', '2020-02-18 10:56:15'),
(260, '9323030983', '2020-02-18 11:03:36', '2020-02-18 11:03:36'),
(261, NULL, '2020-02-18 11:39:24', '2020-02-18 11:39:24'),
(262, NULL, '2020-02-19 14:04:36', '2020-02-19 14:04:36'),
(263, NULL, '2020-02-20 06:28:34', '2020-02-20 06:28:34'),
(264, '9622744287', '2020-02-20 14:58:07', '2020-02-20 14:58:07'),
(265, NULL, '2020-02-21 08:58:31', '2020-02-21 08:58:31'),
(266, '9979285312', '2020-02-22 03:59:59', '2020-02-22 03:59:59'),
(267, '9979285312', '2020-02-22 04:04:58', '2020-02-22 04:04:58'),
(268, '9979285312', '2020-02-22 04:05:02', '2020-02-22 04:05:02'),
(269, NULL, '2020-02-22 13:33:24', '2020-02-22 13:33:24'),
(270, NULL, '2020-02-23 03:56:37', '2020-02-23 03:56:37'),
(271, '7008031739', '2020-02-23 05:45:27', '2020-02-23 05:45:27'),
(272, '9384913799', '2020-02-23 06:19:23', '2020-02-23 06:19:23'),
(273, '7008031739', '2020-02-23 06:35:26', '2020-02-23 06:35:26'),
(274, '8762691695', '2020-02-23 06:42:30', '2020-02-23 06:42:30'),
(275, '7008031739', '2020-02-24 03:14:55', '2020-02-24 03:14:55'),
(276, '8859473828', '2020-03-03 17:30:04', '2020-03-03 17:30:04'),
(277, NULL, '2020-03-04 14:24:02', '2020-03-04 14:24:02'),
(278, '7978275958', '2020-03-08 08:02:33', '2020-03-08 08:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRATOR', 'scwebdes@gmail.com', '$2y$10$fcFfXhTik32gnGtld2ODket.0KhCwvPWcSz/jcwFKO.lT5fmT0J/O', 'iukkdLai5yrXmAjlWRHHr4vdDLVGyrgUozOCUGbJW8jRoeLctvHvZLWPaw0L', '2018-07-10 00:15:50', '2018-07-10 00:15:50'),
(2, 'Amit Kumar Sarangi', 'amitsarangi161@gmail.com', '$2y$10$YIgEENhdx93BuT1hFAx93O29mNhTcxEomlFKeW8.EGPqA0sN0H3Te', 'lRbS2aJcCdfOW5lJZTDcr6yF32jGd30MalfaW9lYTZGnFbFCxhC8vtUBxZU1', '2018-07-10 04:51:13', '2018-07-10 04:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE IF NOT EXISTS `wallets` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `credit` varchar(100) DEFAULT NULL,
  `debit` varchar(100) DEFAULT NULL,
  `addedby` varchar(200) DEFAULT NULL,
  `type` varchar(500) NOT NULL DEFAULT 'PRODUCTS',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `order_id`, `credit`, `debit`, `addedby`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 12, '10.26', '0', '1', 'PRODUCTS', NULL, '2020-06-21 11:35:58');

-- --------------------------------------------------------

--
-- Structure for view `rating`
--
DROP TABLE IF EXISTS `rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rating` AS select `reviews`.`productid` AS `productid`,(((avg(`reviews`.`price`) + avg(`reviews`.`value`)) + avg(`reviews`.`quality`)) / 3) AS `rating` from `reviews` group by `reviews`.`productid`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancelorders`
--
ALTER TABLE `cancelorders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobileoperators`
--
ALTER TABLE `mobileoperators`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobilerechargeorders`
--
ALTER TABLE `mobilerechargeorders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onepayresponses`
--
ALTER TABLE `onepayresponses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderaddresses`
--
ALTER TABLE `orderaddresses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packagechannels`
--
ALTER TABLE `packagechannels`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `paytmrecharges`
--
ALTER TABLE `paytmrecharges`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rechargeorders`
--
ALTER TABLE `rechargeorders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recharges`
--
ALTER TABLE `recharges`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rechargetickets`
--
ALTER TABLE `rechargetickets`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saleschannels`
--
ALTER TABLE `saleschannels`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cancelorders`
--
ALTER TABLE `cancelorders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mobileoperators`
--
ALTER TABLE `mobileoperators`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mobilerechargeorders`
--
ALTER TABLE `mobilerechargeorders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `onepayresponses`
--
ALTER TABLE `onepayresponses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `orderaddresses`
--
ALTER TABLE `orderaddresses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `packagechannels`
--
ALTER TABLE `packagechannels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `paytmrecharges`
--
ALTER TABLE `paytmrecharges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `rechargeorders`
--
ALTER TABLE `rechargeorders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `recharges`
--
ALTER TABLE `recharges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rechargetickets`
--
ALTER TABLE `rechargetickets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `saleschannels`
--
ALTER TABLE `saleschannels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=279;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
