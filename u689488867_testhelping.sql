-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 24, 2025 at 05:00 AM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u689488867_testhelping`
--

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_adds_images`
--

CREATE TABLE `ax_tbl_adds_images` (
  `id` int(11) NOT NULL,
  `my_adds_images` varchar(100) NOT NULL,
  `visiblity` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ax_tbl_adds_images`
--

INSERT INTO `ax_tbl_adds_images` (`id`, `my_adds_images`, `visiblity`, `create_at`) VALUES
(1, 'leGENDX_(2)1.png', 1, '0000-00-00 00:00:00'),
(2, 'download-removebg-preview.png', 1, '2024-10-01 11:45:51'),
(3, 'artificial-intelligence.png', 1, '2024-10-08 12:29:55'),
(4, 'ai.png', 1, '2024-10-22 13:42:39'),
(5, 'ai1.png', 0, '2024-10-25 11:12:34'),
(6, 'IMG-20250321-WA0081.jpg', 0, '2025-03-22 00:29:11'),
(7, 'IMG-20250327-WA0004.jpg', 1, '2025-03-27 10:47:02'),
(8, 'IMG-20250402-WA0005.jpg', 1, '2025-04-02 09:45:19'),
(9, 'IMG-20250402-WA0017.jpg', 1, '2025-04-02 13:22:12'),
(10, 'IMG-20250402-WA0027.jpg', 0, '2025-04-02 16:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_admin_log`
--

CREATE TABLE `ax_tbl_admin_log` (
  `id` int(11) NOT NULL,
  `adminid` varchar(255) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `withdrawal_islive` tinyint(1) NOT NULL,
  `is_login` tinyint(1) NOT NULL,
  `isfund_trasnfe` tinyint(1) NOT NULL,
  `generate_income` tinyint(1) NOT NULL,
  `is_registration` tinyint(1) NOT NULL,
  `admin_charge` decimal(10,2) NOT NULL,
  `tds` decimal(10,2) NOT NULL,
  `InrQR` varchar(50) NOT NULL,
  `Usdt_Qr` varchar(50) NOT NULL,
  `Upi_id` varchar(50) NOT NULL,
  `Usdt_Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ax_tbl_admin_log`
--

INSERT INTO `ax_tbl_admin_log` (`id`, `adminid`, `admin_name`, `password`, `isactive`, `withdrawal_islive`, `is_login`, `isfund_trasnfe`, `generate_income`, `is_registration`, `admin_charge`, `tds`, `InrQR`, `Usdt_Qr`, `Upi_id`, `Usdt_Address`) VALUES
(1, 'A12B13', 'admin', '270990', 1, 1, 1, 1, 1, 1, 10.00, 2.00, '', '', 'abcc@122', '000000');

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_email`
--

CREATE TABLE `ax_tbl_email` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `mail_to` varchar(50) NOT NULL,
  `reply_on` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL,
  `chat_key` varchar(20) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `visiblity` tinyint(1) NOT NULL DEFAULT 1,
  `reply_des` text NOT NULL,
  `reply_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_fund_request`
--

CREATE TABLE `ax_tbl_fund_request` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `request_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `hash_id` varchar(100) NOT NULL,
  `request_date` datetime NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `request_status` varchar(50) NOT NULL,
  `fund_type` varchar(50) NOT NULL,
  `action_update` datetime NOT NULL,
  `utr` varchar(50) NOT NULL,
  `reciept` varchar(100) NOT NULL,
  `remark` varchar(250) NOT NULL,
  `inr_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `get_user_id` varchar(50) NOT NULL,
  `commit_id` varchar(50) NOT NULL,
  `link_id` int(11) NOT NULL,
  `withdrol_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_level_income`
--

CREATE TABLE `ax_tbl_level_income` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `top_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `level_nm` varchar(50) NOT NULL,
  `level_income` decimal(10,2) NOT NULL DEFAULT 0.00,
  `incomedate` datetime NOT NULL,
  `dumy_income` decimal(10,2) NOT NULL,
  `business` decimal(10,2) NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_news`
--

CREATE TABLE `ax_tbl_news` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `news` varchar(255) NOT NULL,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_nonworking`
--

CREATE TABLE `ax_tbl_nonworking` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `type_income` varchar(255) NOT NULL,
  `t_id` int(11) NOT NULL,
  `isactive` decimal(10,2) NOT NULL,
  `withdra_method` varchar(255) NOT NULL,
  `hash_id` varchar(255) NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_pack`
--

CREATE TABLE `ax_tbl_pack` (
  `id` int(11) NOT NULL,
  `packamount1` int(11) NOT NULL,
  `typeget` varchar(255) NOT NULL,
  `num_days_of_type` int(11) NOT NULL,
  `packroi` decimal(10,2) NOT NULL,
  `packroidays` int(11) NOT NULL,
  `packnm` varchar(255) NOT NULL,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ax_tbl_pack`
--

INSERT INTO `ax_tbl_pack` (`id`, `packamount1`, `typeget`, `num_days_of_type`, `packroi`, `packroidays`, `packnm`, `isactive`) VALUES
(1, 50, '', 1, 6.00, 33, 'Pack 1', 1),
(2, 100, '', 1, 6.00, 33, 'Pack 2', 1),
(3, 250, '', 1, 6.00, 33, 'Pack 3', 1),
(4, 500, '', 1, 6.00, 33, 'Pack 4', 1),
(5, 1000, '', 1, 6.00, 33, 'Pack 4', 1),
(6, 2500, '', 1, 6.00, 33, 'Pack 6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_popup`
--

CREATE TABLE `ax_tbl_popup` (
  `id` int(11) NOT NULL,
  `popimg` varchar(255) NOT NULL,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_profile`
--

CREATE TABLE `ax_tbl_profile` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `p_date` datetime NOT NULL,
  `p_status` varchar(255) NOT NULL,
  `usdt_add` varchar(255) NOT NULL,
  `trx_add` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `acc_holder_name` varchar(255) NOT NULL,
  `acc_no` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT 1,
  `gpay` varchar(20) NOT NULL,
  `paytm` varchar(20) NOT NULL,
  `phone_pay` varchar(20) NOT NULL,
  `upi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_refferral_stmnt`
--

CREATE TABLE `ax_tbl_refferral_stmnt` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `level_nm` varchar(255) NOT NULL,
  `admin_charge` decimal(10,2) NOT NULL,
  `tds` decimal(10,2) NOT NULL,
  `isactive` decimal(10,2) NOT NULL,
  `withdra_method` varchar(255) NOT NULL,
  `hash_id` varchar(255) NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `user_topup_forleve` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_refrl_wallete`
--

CREATE TABLE `ax_tbl_refrl_wallete` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `level_nm` varchar(255) NOT NULL,
  `admin_charge` decimal(10,2) NOT NULL,
  `tds` decimal(10,2) NOT NULL,
  `isactive` decimal(10,2) NOT NULL,
  `withdra_method` varchar(255) NOT NULL,
  `hash_id` varchar(255) NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `register_user_id` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_request`
--

CREATE TABLE `ax_tbl_request` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `request_amt` decimal(10,2) NOT NULL,
  `hash_id` varchar(255) NOT NULL,
  `request_date` datetime NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `request_status` varchar(255) NOT NULL,
  `eth_add` varchar(255) NOT NULL,
  `action_update` datetime NOT NULL,
  `comment` varchar(50) NOT NULL,
  `wallet_namew` varchar(50) NOT NULL,
  `decuct_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `inr_amtt` int(11) NOT NULL,
  `inr_deduct_amout` decimal(10,2) NOT NULL DEFAULT 0.00,
  `Doular_deduct_amont` decimal(10,2) NOT NULL DEFAULT 0.00,
  `final_amout` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_royalti_percent`
--

CREATE TABLE `ax_tbl_royalti_percent` (
  `id` int(11) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `perce_nt` decimal(10,2) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_servicess`
--

CREATE TABLE `ax_tbl_servicess` (
  `Id` int(11) NOT NULL,
  `services_name` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ax_tbl_servicess`
--

INSERT INTO `ax_tbl_servicess` (`Id`, `services_name`, `status`) VALUES
(1, 'ROI', 1),
(2, 'Withdraw', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_support`
--

CREATE TABLE `ax_tbl_support` (
  `id` int(11) NOT NULL,
  `mfrom` varchar(255) NOT NULL,
  `mto` varchar(255) NOT NULL,
  `msubject` varchar(255) NOT NULL,
  `mdetail` varchar(255) NOT NULL,
  `mdate` datetime NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `isview` tinyint(1) NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_topup`
--

CREATE TABLE `ax_tbl_topup` (
  `refund_amt` decimal(10,2) NOT NULL,
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(11) NOT NULL,
  `topup_amt` decimal(10,2) NOT NULL,
  `topupdate` datetime NOT NULL,
  `pack_type` varchar(255) NOT NULL,
  `roi_income` decimal(10,2) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `days_` int(11) NOT NULL,
  `total_days` int(11) NOT NULL,
  `iswithdrawal` tinyint(1) NOT NULL,
  `topup_by` varchar(50) NOT NULL,
  `booster_income` tinyint(1) NOT NULL DEFAULT 0,
  `task_income` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_wallet`
--

CREATE TABLE `ax_tbl_wallet` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `admin_charge` decimal(10,2) NOT NULL,
  `tds` decimal(10,2) NOT NULL,
  `isactive` decimal(10,2) NOT NULL,
  `withdra_method` varchar(255) NOT NULL,
  `hash_id` varchar(255) NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `user_topup_forleve` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ax_tbl_wallet_fund`
--

CREATE TABLE `ax_tbl_wallet_fund` (
  `withdrawal_method` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(255) NOT NULL,
  `credit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `debit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `to_Id` varchar(255) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `show_for` varchar(255) NOT NULL,
  `admin_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tds` decimal(10,2) NOT NULL DEFAULT 0.00,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booster_wallet`
--

CREATE TABLE `booster_wallet` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `admin_charge` decimal(10,2) NOT NULL,
  `tds` decimal(10,2) NOT NULL,
  `isactive` decimal(10,2) NOT NULL,
  `withdra_method` varchar(255) NOT NULL,
  `hash_id` varchar(255) NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `booster_amt` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bot_user_tbl`
--

CREATE TABLE `bot_user_tbl` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `bot_user_id` varchar(50) NOT NULL,
  `amt` int(11) NOT NULL,
  `bv` int(2) NOT NULL,
  `valid_month` int(2) NOT NULL,
  `purchage_date` datetime NOT NULL,
  `expire_date` datetime NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bv_matching`
--

CREATE TABLE `bv_matching` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `bv_rank` int(1) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `rank_name` varchar(50) NOT NULL,
  `trade_income` int(11) NOT NULL,
  `reward_income` int(11) NOT NULL,
  `left_bv` int(10) NOT NULL,
  `right_bv` int(11) NOT NULL,
  `required_bv` int(11) NOT NULL,
  `total_bv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comit_top_details`
--

CREATE TABLE `comit_top_details` (
  `id` int(11) NOT NULL,
  `commit_id` varchar(50) NOT NULL,
  `registeruser_id` varchar(11) NOT NULL,
  `topup_amt` decimal(10,2) NOT NULL,
  `topupdate` datetime NOT NULL,
  `pack_type` varchar(255) NOT NULL,
  `roi_income` decimal(10,2) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT 0,
  `total_days` int(11) NOT NULL,
  `topup_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commitments`
--

CREATE TABLE `commitments` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `commit_id` varchar(50) NOT NULL,
  `request_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `approved_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `show_admin` tinyint(1) NOT NULL DEFAULT 1,
  `growth_roi` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commitments`
--

INSERT INTO `commitments` (`id`, `registeruser_id`, `commit_id`, `request_amount`, `wdate`, `wstatus`, `remark`, `approved_date`, `status`, `show_admin`, `growth_roi`) VALUES
(7890, 'user1', 'Request_944242469', 50.00, '2025-08-22 21:51:13', 'Commitment', 'Request', '0000-00-00 00:00:00', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `commitments_tbl_provide_get_help`
--

CREATE TABLE `commitments_tbl_provide_get_help` (
  `id` int(11) NOT NULL,
  `p_registeruser_id` varchar(50) NOT NULL,
  `g_registeruser_id` varchar(255) NOT NULL,
  `request_amt` decimal(10,2) NOT NULL,
  `request_date` datetime NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `request_status` varchar(255) NOT NULL,
  `action_update` datetime NOT NULL,
  `comment` varchar(50) NOT NULL,
  `hash_id` varchar(255) NOT NULL,
  `status` int(1) DEFAULT 0,
  `commitemnt_id` varchar(50) NOT NULL,
  `withdrol_id` varchar(50) NOT NULL,
  `update_slip` tinyint(1) NOT NULL DEFAULT 0,
  `slip_uplode` varchar(255) NOT NULL,
  `status_amt_send` tinyint(1) NOT NULL DEFAULT 0,
  `uplade_date_time` datetime NOT NULL,
  `expire_datetiime` datetime NOT NULL,
  `is_expire` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cron_test`
--

CREATE TABLE `cron_test` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `direct_wallet`
--

CREATE TABLE `direct_wallet` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `admin_charge` decimal(10,2) NOT NULL,
  `tds` decimal(10,2) NOT NULL,
  `isactive` decimal(10,2) NOT NULL,
  `withdra_method` varchar(255) NOT NULL,
  `hash_id` varchar(255) NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `user_topup_forleve` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fast_track_income`
--

CREATE TABLE `fast_track_income` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `level_name` int(1) NOT NULL,
  `month_val` int(1) NOT NULL,
  `income` decimal(10,2) NOT NULL,
  `required_buness` decimal(10,0) NOT NULL,
  `get_business` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `global_auto`
--

CREATE TABLE `global_auto` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `no_of_user` int(11) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latset_news`
--

CREATE TABLE `latset_news` (
  `id` int(11) NOT NULL,
  `news_crete` text NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `latset_news`
--

INSERT INTO `latset_news` (`id`, `news_crete`, `create_at`) VALUES
(1, 'Welcome TO Workload Traders Pree Launching', '2024-09-30 10:51:47'),
(2, 'WELCOME TO OUR COMPANY', '2024-09-30 13:41:07'),
(3, 'Welcome To MASTER BOT TRADE', '2024-09-30 19:27:42'),
(4, 'Prebooking Start 26-10-2024 And topup Start 29-10-2024 Prelaunching Offer 10% Extra On AdFund Usdt start 26-10-2024 to 3-11-2024', '2024-10-22 13:41:56'),
(5, 'Prelaunching Offer 10% on Buy Fund Start from 25-10-2024 to 3-11-2024 Topup Start on 29-10-2024', '2024-10-25 11:11:48'),
(6, 'welcome', '2025-01-07 12:17:19'),
(7, 'helo sir', '2025-01-18 17:26:34'),
(8, 'congratulations everyone, our double power 33days has been officially launched today ????', '2025-01-22 08:27:31'),
(9, 'Whatsapp number has been updated for customer support', '2025-02-06 10:07:15'),
(10, 'Whatsapp number has been updated for customer support 9541268645', '2025-02-06 10:08:21'),
(11, 'another whatsapp number has been updated for customer support 7051564290, 9541268645', '2025-02-21 13:31:09'),
(12, 'Another whatsapp has been updated for customer care support 9469275073, 7051564290, 9541268645', '2025-03-03 09:39:03'),
(13, 'sbi user ko double ROI daily growth income chli gyi hai pls abi withdrawl nhi lgaye theek hote hi apko msg ho jayega ki ab withdrawl kro 11bje k somthing apko msg mil jayega ????', '2025-03-10 05:59:58'),
(14, 'Whatsapp number updated for customer support, 9541268645, 7051564290, 9469275073', '2025-03-10 15:22:39'),
(15, 'Good morning, Team *Double* *Power 33* days. As you all know, the system was undergoing an upgrade, due to which we had to cancel several withdrawals. Now, all services have been restored.  \r\n\r\nThe withdrawal timing will be from 9 AM to 5 PM. The minimum withdrawal amount will be $40, and the maximum will be $100 per day. Withdrawals will be processed within 48 to 72 hours. Customer care no 7051564290', '2025-03-24 08:57:38'),
(16, '.', '2025-03-27 10:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `level_maintain_wallet`
--

CREATE TABLE `level_maintain_wallet` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `level_name` int(1) NOT NULL,
  `month_val` int(1) NOT NULL,
  `income` decimal(10,2) NOT NULL,
  `required_buness` decimal(10,0) NOT NULL,
  `get_business` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reg_table`
--

CREATE TABLE `reg_table` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `sponserd_id` varchar(255) NOT NULL,
  `parent_idd` varchar(50) DEFAULT NULL,
  `position` enum('left','right') DEFAULT NULL,
  `level_val` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `topupdate` datetime NOT NULL,
  `topup_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `password` varchar(255) NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT 1,
  `register_date` datetime NOT NULL,
  `txn_password` varchar(255) NOT NULL,
  `isvalid` tinyint(1) NOT NULL,
  `topupby` varchar(255) NOT NULL,
  `pack_id` int(11) NOT NULL,
  `packnm` varchar(255) NOT NULL,
  `bank_a/c` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `flag_nm` varchar(255) NOT NULL,
  `bep_address` varchar(255) NOT NULL,
  `teambusiness` decimal(10,2) NOT NULL DEFAULT 0.00,
  `roidays` int(11) NOT NULL,
  `gett_roidays` int(11) NOT NULL,
  `istopup` tinyint(1) NOT NULL DEFAULT 0,
  `isverify` tinyint(1) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `BV` int(11) NOT NULL DEFAULT 0,
  `bot_id` varchar(50) NOT NULL,
  `isbot` tinyint(1) NOT NULL DEFAULT 0,
  `teambv` int(11) NOT NULL DEFAULT 0,
  `bot_puchage_date` datetime NOT NULL,
  `bot_expire_date` datetime NOT NULL,
  `rank_vb` int(1) NOT NULL DEFAULT 0,
  `royalty_club` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_table`
--

INSERT INTO `reg_table` (`id`, `user_id`, `sponserd_id`, `parent_idd`, `position`, `level_val`, `email`, `mobile`, `fullname`, `topupdate`, `topup_amt`, `password`, `isactive`, `register_date`, `txn_password`, `isvalid`, `topupby`, `pack_id`, `packnm`, `bank_a/c`, `country`, `flag_nm`, `bep_address`, `teambusiness`, `roidays`, `gett_roidays`, `istopup`, `isverify`, `otp`, `BV`, `bot_id`, `isbot`, `teambv`, `bot_puchage_date`, `bot_expire_date`, `rank_vb`, `royalty_club`) VALUES
(1, 'user1', '0', NULL, NULL, NULL, 'xycd@gmail.com', '0000000000', 'XYZ', '0000-00-00 00:00:00', 0.00, '12345', 1, '2025-01-20 09:36:21', '123456', 0, '', 0, '', '', '', '', '', 475000.00, 0, 0, 0, 0, '', 0, '', 0, 0, '2025-01-20 09:36:21', '2025-01-20 09:36:21', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roi_wallet`
--

CREATE TABLE `roi_wallet` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `top_id` int(11) NOT NULL,
  `comiit_id` varchar(50) NOT NULL,
  `pack_amt` decimal(10,2) NOT NULL,
  `roi_percent` decimal(10,2) NOT NULL,
  `isvalid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `royalty_income_done_details`
--

CREATE TABLE `royalty_income_done_details` (
  `id` int(11) NOT NULL,
  `last_month_amount` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `per_rank1` decimal(10,2) NOT NULL DEFAULT 0.00,
  `per_rank2` decimal(10,2) NOT NULL DEFAULT 0.00,
  `per_rank3` decimal(10,2) NOT NULL DEFAULT 0.00,
  `per_rank4` decimal(10,2) NOT NULL DEFAULT 0.00,
  `rank1_user` int(10) NOT NULL DEFAULT 0,
  `rank2_user` int(10) NOT NULL DEFAULT 0,
  `rank3_user` int(10) NOT NULL DEFAULT 0,
  `rank4_user` int(10) NOT NULL DEFAULT 0,
  `total_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `royal_club_match_user`
--

CREATE TABLE `royal_club_match_user` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `rank_id` int(1) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `rank_name` varchar(50) NOT NULL,
  `left_bv` int(10) NOT NULL,
  `right_bv` int(11) NOT NULL,
  `required_bv` int(11) NOT NULL,
  `total_bv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_pack`
--

CREATE TABLE `salary_pack` (
  `id` int(11) NOT NULL,
  `salary_pack` int(11) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_wallet`
--

CREATE TABLE `salary_wallet` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `first_leg` varchar(500) NOT NULL,
  `sec_leg` varchar(50) NOT NULL,
  `third_leg` varchar(50) NOT NULL,
  `all_leg` varchar(50) NOT NULL,
  `admin_charge` decimal(10,2) NOT NULL,
  `tds` decimal(10,2) NOT NULL,
  `isactive` decimal(10,2) NOT NULL,
  `withdra_method` varchar(255) NOT NULL,
  `hash_id` varchar(255) NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `user_topup_forleve` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ax_email_varification`
--

CREATE TABLE `tbl_ax_email_varification` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `varification_code` varchar(10) NOT NULL,
  `craete_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_w`
--

CREATE TABLE `test_w` (
  `id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `amt` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trade_income`
--

CREATE TABLE `trade_income` (
  `id` int(11) NOT NULL,
  `registeruser_id` varchar(50) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `wdate` datetime NOT NULL,
  `wstatus` varchar(255) NOT NULL,
  `match_bv` int(11) NOT NULL,
  `Rank_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ax_tbl_adds_images`
--
ALTER TABLE `ax_tbl_adds_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_admin_log`
--
ALTER TABLE `ax_tbl_admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_email`
--
ALTER TABLE `ax_tbl_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_fund_request`
--
ALTER TABLE `ax_tbl_fund_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_level_income`
--
ALTER TABLE `ax_tbl_level_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_news`
--
ALTER TABLE `ax_tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_nonworking`
--
ALTER TABLE `ax_tbl_nonworking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_pack`
--
ALTER TABLE `ax_tbl_pack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_popup`
--
ALTER TABLE `ax_tbl_popup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_profile`
--
ALTER TABLE `ax_tbl_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_refferral_stmnt`
--
ALTER TABLE `ax_tbl_refferral_stmnt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_refrl_wallete`
--
ALTER TABLE `ax_tbl_refrl_wallete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_request`
--
ALTER TABLE `ax_tbl_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_royalti_percent`
--
ALTER TABLE `ax_tbl_royalti_percent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_servicess`
--
ALTER TABLE `ax_tbl_servicess`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ax_tbl_support`
--
ALTER TABLE `ax_tbl_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_topup`
--
ALTER TABLE `ax_tbl_topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_wallet`
--
ALTER TABLE `ax_tbl_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ax_tbl_wallet_fund`
--
ALTER TABLE `ax_tbl_wallet_fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booster_wallet`
--
ALTER TABLE `booster_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bot_user_tbl`
--
ALTER TABLE `bot_user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bv_matching`
--
ALTER TABLE `bv_matching`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comit_top_details`
--
ALTER TABLE `comit_top_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commitments`
--
ALTER TABLE `commitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commitments_tbl_provide_get_help`
--
ALTER TABLE `commitments_tbl_provide_get_help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cron_test`
--
ALTER TABLE `cron_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direct_wallet`
--
ALTER TABLE `direct_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fast_track_income`
--
ALTER TABLE `fast_track_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_auto`
--
ALTER TABLE `global_auto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latset_news`
--
ALTER TABLE `latset_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_maintain_wallet`
--
ALTER TABLE `level_maintain_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_table`
--
ALTER TABLE `reg_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`);

--
-- Indexes for table `roi_wallet`
--
ALTER TABLE `roi_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `royalty_income_done_details`
--
ALTER TABLE `royalty_income_done_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `royal_club_match_user`
--
ALTER TABLE `royal_club_match_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_pack`
--
ALTER TABLE `salary_pack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_wallet`
--
ALTER TABLE `salary_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ax_email_varification`
--
ALTER TABLE `tbl_ax_email_varification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_w`
--
ALTER TABLE `test_w`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_income`
--
ALTER TABLE `trade_income`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ax_tbl_adds_images`
--
ALTER TABLE `ax_tbl_adds_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ax_tbl_admin_log`
--
ALTER TABLE `ax_tbl_admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ax_tbl_email`
--
ALTER TABLE `ax_tbl_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `ax_tbl_fund_request`
--
ALTER TABLE `ax_tbl_fund_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22358;

--
-- AUTO_INCREMENT for table `ax_tbl_level_income`
--
ALTER TABLE `ax_tbl_level_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19337;

--
-- AUTO_INCREMENT for table `ax_tbl_news`
--
ALTER TABLE `ax_tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ax_tbl_nonworking`
--
ALTER TABLE `ax_tbl_nonworking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435995;

--
-- AUTO_INCREMENT for table `ax_tbl_pack`
--
ALTER TABLE `ax_tbl_pack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ax_tbl_popup`
--
ALTER TABLE `ax_tbl_popup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ax_tbl_profile`
--
ALTER TABLE `ax_tbl_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5286;

--
-- AUTO_INCREMENT for table `ax_tbl_refferral_stmnt`
--
ALTER TABLE `ax_tbl_refferral_stmnt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ax_tbl_refrl_wallete`
--
ALTER TABLE `ax_tbl_refrl_wallete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ax_tbl_request`
--
ALTER TABLE `ax_tbl_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24053;

--
-- AUTO_INCREMENT for table `ax_tbl_royalti_percent`
--
ALTER TABLE `ax_tbl_royalti_percent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ax_tbl_servicess`
--
ALTER TABLE `ax_tbl_servicess`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ax_tbl_support`
--
ALTER TABLE `ax_tbl_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ax_tbl_topup`
--
ALTER TABLE `ax_tbl_topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6707;

--
-- AUTO_INCREMENT for table `ax_tbl_wallet`
--
ALTER TABLE `ax_tbl_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ax_tbl_wallet_fund`
--
ALTER TABLE `ax_tbl_wallet_fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28835;

--
-- AUTO_INCREMENT for table `booster_wallet`
--
ALTER TABLE `booster_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bot_user_tbl`
--
ALTER TABLE `bot_user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bv_matching`
--
ALTER TABLE `bv_matching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comit_top_details`
--
ALTER TABLE `comit_top_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commitments`
--
ALTER TABLE `commitments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7891;

--
-- AUTO_INCREMENT for table `commitments_tbl_provide_get_help`
--
ALTER TABLE `commitments_tbl_provide_get_help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26250;

--
-- AUTO_INCREMENT for table `cron_test`
--
ALTER TABLE `cron_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `direct_wallet`
--
ALTER TABLE `direct_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fast_track_income`
--
ALTER TABLE `fast_track_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_auto`
--
ALTER TABLE `global_auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latset_news`
--
ALTER TABLE `latset_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `level_maintain_wallet`
--
ALTER TABLE `level_maintain_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg_table`
--
ALTER TABLE `reg_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10533;

--
-- AUTO_INCREMENT for table `roi_wallet`
--
ALTER TABLE `roi_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6707;

--
-- AUTO_INCREMENT for table `royalty_income_done_details`
--
ALTER TABLE `royalty_income_done_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `royal_club_match_user`
--
ALTER TABLE `royal_club_match_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_pack`
--
ALTER TABLE `salary_pack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_wallet`
--
ALTER TABLE `salary_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ax_email_varification`
--
ALTER TABLE `tbl_ax_email_varification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_w`
--
ALTER TABLE `test_w`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trade_income`
--
ALTER TABLE `trade_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
