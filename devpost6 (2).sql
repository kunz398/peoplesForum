-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 11:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devpost6`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment_text`, `status`, `created_at`, `updated_at`) VALUES
(43, '24', '4', 'I think it is not right.', '1', '2022-04-11 10:55:59', '2022-04-11 10:55:59'),
(45, '22', '4', 'This is a good move. Should be done.', '1', '2022-04-11 10:57:02', '2022-04-11 10:57:02'),
(47, '20', '8', 'Yes, the Government should allow home based businesses in this hard times. This will enable people to earn income and support their families without having to go through the long waiting process of rezoning.', '1', '2022-04-11 11:16:26', '2022-04-11 11:16:26'),
(48, '21', '8', 'This will be great if Govt subsidizes more of the costs as the cost of living has increased.', '1', '2022-04-11 11:18:00', '2022-04-11 11:18:00'),
(53, '18', '12', 'I personally spend about more than $100 a month in some of the medicines which are not covered in the free list. It would be a great help for the people. The list needs to be carefully evaluated by seeing the actual needs of the medicines.', '1', '2022-04-11 11:58:35', '2022-04-11 11:58:35'),
(56, '18', '10', 'This is an excellent move if it happens. People are struggling to afford basic food items, and this will relief the burden a bit. Totally vote for this motion.', '1', '2022-04-11 12:01:36', '2022-04-11 12:01:36'),
(57, '23', '10', 'Yes, definitely. I believe the fuel tax should be removed.', '1', '2022-04-11 12:02:09', '2022-04-11 12:02:09'),
(58, '18', '4', 'Yes, this will be great. My mum needs some of the medicines not listed in free medicines list, and I find it difficult to keep up.', '1', '2022-04-11 12:05:30', '2022-04-11 12:05:30'),
(59, '24', '12', 'This is a very sensitive topic which needs a lot of discussion and debate. My personal opinion is, Fiji should not legalize prostitution.', '1', '2022-04-11 12:24:08', '2022-04-11 12:24:08'),
(61, '18', '16', 'Agree.', '1', '2022-04-11 14:45:44', '2022-04-11 14:45:44'),
(62, '25', '12', 'I think more harsh penalties should be there to punish the rapists. There needs to be fear instilled in those kinds people.', '1', '2022-04-11 14:48:46', '2022-04-11 14:48:46'),
(63, '28', '12', 'Please provide venue and date. Very keen on this. Cheers. ', '1', '2022-04-11 14:53:44', '2022-04-11 14:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_discussions_tables`
--

CREATE TABLE `follow_discussions_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follow_discussions_tables`
--

INSERT INTO `follow_discussions_tables` (`id`, `post_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(9, '18', '4', '1', '2022-04-11 10:37:09', '2022-04-11 10:37:09'),
(10, '27', '3', '1', '2022-04-11 11:04:05', '2022-04-11 11:04:05'),
(11, '19', '6', '1', '2022-04-11 11:04:05', '2022-04-11 11:04:05'),
(12, '20', '10', '1', '2022-04-11 11:04:05', '2022-04-11 11:04:05'),
(13, '21', '3', '1', '2022-04-11 11:04:05', '2022-04-11 11:04:05'),
(14, '22', '14', '1', '2022-04-11 10:37:09', '2022-04-11 10:37:09'),
(15, '23', '8', '1', '2022-04-11 11:04:05', '2022-04-11 11:04:05'),
(16, '24', '1', '1', '2022-04-11 11:04:05', '2022-04-11 11:04:05'),
(17, '25', '5', '1', '2022-04-11 11:04:05', '2022-04-11 11:04:05'),
(19, '24', '12', '1', '2022-04-11 12:24:34', '2022-04-11 12:24:34'),
(22, '25', '16', '1', '2022-04-11 14:48:35', '2022-04-11 14:48:35'),
(23, '28', '16', '1', '2022-04-11 14:53:21', '2022-04-11 14:53:21'),
(25, '18', '16', '1', '2022-04-11 14:58:26', '2022-04-11 14:58:26'),
(26, '29', '16', '1', '2022-04-11 15:00:05', '2022-04-11 15:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_03_223234_add_status_to_users_table', 2),
(6, '2022_04_04_064641_create_user_details', 3),
(7, '2022_04_05_184314_create_post_table', 4),
(8, '2022_04_05_185218_create_posts_table', 5),
(9, '2022_04_05_191223_add_tags_to_posts_table', 6),
(10, '2022_04_06_193204_user_img_to_user_details_table', 7),
(11, '2022_04_06_215603_create_post_votes_tables', 8),
(12, '2022_04_08_144638_create_tags_tables', 9),
(13, '2022_04_09_141907_create_profanity_table', 10),
(14, '2022_04_09_221357_create_posts_logs_table', 11),
(15, '2022_04_09_233504_create_comments_table', 12),
(16, '2022_04_10_013854_create_notifications_tables', 13),
(17, '2022_04_10_020426_create_follow_discussions_tables', 13),
(18, '2022_04_10_023014_add_notification_from_which_user_to_users', 14);

-- --------------------------------------------------------

--
-- Table structure for table `notifications_tables`
--

CREATE TABLE `notifications_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `notification_to_which_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notification_from_which_user` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications_tables`
--

INSERT INTO `notifications_tables` (`id`, `notification_text`, `is_read`, `notification_to_which_user`, `post_id`, `status`, `created_at`, `updated_at`, `notification_from_which_user`) VALUES
(16, '', '0', '1', '24', '1', '2022-04-11 10:55:59', '2022-04-11 10:55:59', '4'),
(17, '', '1', '4', '18', '1', '2022-04-11 10:56:31', '2022-04-11 12:06:49', '4'),
(18, '', '0', '14', '22', '1', '2022-04-11 10:57:02', '2022-04-11 10:57:02', '4'),
(19, '', '0', '4', '18', '1', '2022-04-11 11:12:07', '2022-04-11 11:12:07', '6'),
(20, '', '0', '10', '20', '1', '2022-04-11 11:16:26', '2022-04-11 11:16:26', '8'),
(21, '', '0', '3', '21', '1', '2022-04-11 11:18:00', '2022-04-11 11:18:00', '8'),
(22, '', '0', '4', '18', '1', '2022-04-11 11:22:20', '2022-04-11 11:22:20', '12'),
(23, '', '0', '4', '18', '1', '2022-04-11 11:54:29', '2022-04-11 11:54:29', '12'),
(24, '', '1', '4', '18', '1', '2022-04-11 11:55:29', '2022-04-11 12:06:49', '4'),
(25, '', '0', '4', '18', '1', '2022-04-11 11:57:12', '2022-04-11 11:57:12', '12'),
(26, '', '0', '4', '18', '1', '2022-04-11 11:58:35', '2022-04-11 11:58:35', '12'),
(27, '', '0', '4', '18', '1', '2022-04-11 11:58:42', '2022-04-11 11:58:42', '12'),
(28, '', '0', '5', '25', '1', '2022-04-11 12:00:18', '2022-04-11 12:00:18', '12'),
(29, '', '0', '4', '18', '1', '2022-04-11 12:01:36', '2022-04-11 12:01:36', '10'),
(30, '', '0', '8', '23', '1', '2022-04-11 12:02:09', '2022-04-11 12:02:09', '10'),
(31, '', '1', '4', '18', '1', '2022-04-11 12:05:30', '2022-04-11 12:06:49', '4'),
(32, '', '0', '1', '24', '1', '2022-04-11 12:24:08', '2022-04-11 12:24:08', '12'),
(33, '', '0', '4', '18', '1', '2022-04-11 14:43:23', '2022-04-11 14:43:23', '16'),
(34, '', '0', '4', '18', '1', '2022-04-11 14:45:44', '2022-04-11 14:45:44', '16'),
(35, '', '0', '5', '25', '1', '2022-04-11 14:48:46', '2022-04-11 14:48:46', '12'),
(36, '', '1', '16', '28', '1', '2022-04-11 14:53:44', '2022-04-11 14:58:34', '12'),
(37, '', '0', '16', '29', '1', '2022-04-11 15:03:58', '2022-04-11 15:03:58', '16');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `id` int(11) NOT NULL,
  `occupation` varchar(225) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`id`, `occupation`, `status`) VALUES
(1, 'Accountant', '1'),
(2, 'Accounts Assistant', '1'),
(3, 'Accounts Clerk', '1'),
(4, 'Accounts Manager', '1'),
(5, 'Accounts Staff', '1'),
(6, 'Acoustic Engineer', '1'),
(7, 'Actor', '1'),
(8, 'Actress', '1'),
(9, 'Actuary', '1'),
(10, 'Acupuncturist', '1'),
(11, 'Adjustor', '1'),
(12, 'Administration Assistant', '1'),
(13, 'Administration Clerk', '1'),
(14, 'Administration Manager', '1'),
(15, 'Administration Staff', '1'),
(16, 'Administrator', '1'),
(17, 'Advertising Agent', '1'),
(18, 'Advertising Assistant', '1'),
(19, 'Advertising Clerk', '1'),
(20, 'Advertising Contractor', '1'),
(21, 'Advertising Executive', '1'),
(22, 'Advertising Manager', '1'),
(23, 'Advertising Staff', '1'),
(24, 'Aerial Erector', '1'),
(25, 'Aerobic Instructor', '1'),
(26, 'Aeronautical Engineer', '1'),
(27, 'Agent', '1'),
(28, 'Air Traffic Controller', '1'),
(29, 'Aircraft Designer', '1'),
(30, 'Aircraft Engineer', '1'),
(31, 'Aircraft Maintenance Engineer', '1'),
(32, 'Aircraft Surface Finisher', '1'),
(33, 'Airman', '1'),
(34, 'Airport Controller', '1'),
(35, 'Airport Manager', '1'),
(36, 'Almoner', '1'),
(37, 'Ambulance Controller', '1'),
(38, 'Ambulance Crew', '1'),
(39, 'Ambulance Driver', '1'),
(40, 'Amusement Arcade Worker', '1'),
(41, 'Anaesthetist', '1'),
(42, 'Analyst', '1'),
(43, 'Analytical Chemist', '1'),
(44, 'Animal Breeder', '1'),
(45, 'Anthropologist', '1'),
(46, 'Antique Dealer', '1'),
(47, 'Applications Engineer', '1'),
(48, 'Applications Programmer', '1'),
(49, 'Arbitrator', '1'),
(50, 'Arborist', '1'),
(51, 'Archaeologist', '1'),
(52, 'Architect', '1'),
(53, 'Archivist', '1'),
(54, 'Area Manager', '1'),
(55, 'Armourer', '1'),
(56, 'Aromatherapist', '1'),
(57, 'Art Critic', '1'),
(58, 'Art Dealer', '1'),
(59, 'Art Historian', '1'),
(60, 'Art Restorer', '1'),
(61, 'Artexer', '1'),
(62, 'Artist', '1'),
(63, 'Arts', '1'),
(64, 'Assembly Worker', '1'),
(65, 'Assessor', '1'),
(66, 'Assistant', '1'),
(67, 'Assistant Caretaker', '1'),
(68, 'Assistant Cook', '1'),
(69, 'Assistant Manager', '1'),
(70, 'Assistant Nurse', '1'),
(71, 'Assistant Teacher', '1'),
(72, 'Astrologer', '1'),
(73, 'Astronomer', '1'),
(74, 'Attendant', '1'),
(75, 'Au Pair', '1'),
(76, 'Auction Worker', '1'),
(77, 'Auctioneer', '1'),
(78, 'Audiologist', '1'),
(79, 'Audit Clerk', '1'),
(80, 'Audit Manager', '1'),
(81, 'Auditor', '1'),
(82, 'Auto Electrician', '1'),
(83, 'Auxiliary Nurse', '1'),
(84, 'Bacon Curer', '1'),
(85, 'Baggage Handler', '1'),
(86, 'Bailiff', '1'),
(87, 'Baker', '1'),
(88, 'Bakery Assistant', '1'),
(89, 'Bakery Manager', '1'),
(90, 'Bakery Operator', '1'),
(91, 'Balloonist', '1'),
(92, 'Bank Clerk', '1'),
(93, 'Bank Manager', '1'),
(94, 'Bank Messenger', '1'),
(95, 'Baptist Minister', '1'),
(96, 'Bar Manager', '1'),
(97, 'Bar Steward', '1'),
(98, 'Barber', '1'),
(99, 'Barmaid', '1'),
(100, 'Barman', '1'),
(101, 'Barrister', '1'),
(102, 'Beautician', '1'),
(103, 'Beauty Therapist', '1'),
(104, 'Betting Shop', '1'),
(105, 'Bill Poster', '1'),
(106, 'Bingo Caller', '1'),
(107, 'Biochemist', '1'),
(108, 'Biologist', '1'),
(109, 'Blacksmith', '1'),
(110, 'Blind Assembler', '1'),
(111, 'Blind Fitter', '1'),
(112, 'Blinds Installer', '1'),
(113, 'Boat Builder', '1'),
(114, 'Body Fitter', '1'),
(115, 'Bodyguard', '1'),
(116, 'Bodyshop', '1'),
(117, 'Book Binder', '1'),
(118, 'Book Seller', '1'),
(119, 'Book-Keeper', '1'),
(120, 'Booking Agent', '1'),
(121, 'Booking Clerk', '1'),
(122, 'Bookmaker', '1'),
(123, 'Botanist', '1'),
(124, 'Branch Manager', '1'),
(125, 'Breeder', '1'),
(126, 'Brewer', '1'),
(127, 'Brewery Manager', '1'),
(128, 'Brewery Worker', '1'),
(129, 'Bricklayer', '1'),
(130, 'Broadcaster', '1'),
(131, 'Builder', '1'),
(132, 'Builders Labourer', '1'),
(133, 'Building Advisor', '1'),
(134, 'Building Control', '1'),
(135, 'Building Engineer', '1'),
(136, 'Building Estimator', '1'),
(137, 'Building Foreman', '1'),
(138, 'Building Inspector', '1'),
(139, 'Building Manager', '1'),
(140, 'Building Surveyor', '1'),
(141, 'Bursar', '1'),
(142, 'Bus Company', '1'),
(143, 'Bus Conductor', '1'),
(144, 'Bus Driver', '1'),
(145, 'Bus Mechanic', '1'),
(146, 'Bus Valeter', '1'),
(147, 'Business Consultant', '1'),
(148, 'Business Proprietor', '1'),
(149, 'Butcher', '1'),
(150, 'Butchery Manager', '1'),
(151, 'Butler', '1'),
(152, 'Buyer', '1'),
(153, 'Cab Driver', '1'),
(154, 'Cabinet Maker', '1'),
(155, 'Cable Contractor', '1'),
(156, 'Cable Jointer', '1'),
(157, 'Cable TV Installer', '1'),
(158, 'Cafe Owner', '1'),
(159, 'Cafe Staff', '1'),
(160, 'Cafe Worker', '1'),
(161, 'Calibration Manager', '1'),
(162, 'Camera Repairer', '1'),
(163, 'Cameraman', '1'),
(164, 'Car Dealer', '1'),
(165, 'Car Delivery Driver', '1'),
(166, 'Car Park Attendant', '1'),
(167, 'Car Salesman', '1'),
(168, 'Car Valet', '1'),
(169, 'Car Wash Attendant', '1'),
(170, 'Care Assistant', '1'),
(171, 'Care Manager', '1'),
(172, 'Careers Advisor', '1'),
(173, 'Careers Officer', '1'),
(174, 'Caretaker', '1'),
(175, 'Cargo Operator', '1'),
(176, 'Carpenter', '1'),
(177, 'Carpet Cleaner', '1'),
(178, 'Carpet Fitter', '1'),
(179, 'Carpet Retailer', '1'),
(180, 'Carphone Fitter', '1'),
(181, 'Cartographer', '1'),
(182, 'Cartoonist', '1'),
(183, 'Cashier', '1'),
(184, 'Casual Worker', '1'),
(185, 'Caterer', '1'),
(186, 'Catering Consultant', '1'),
(187, 'Catering Manager', '1'),
(188, 'Catering Staff', '1'),
(189, 'Caulker', '1'),
(190, 'Ceiling Contractor', '1'),
(191, 'Ceiling Fixer', '1'),
(192, 'Cellarman', '1'),
(193, 'Chambermaid', '1'),
(194, 'Chandler', '1'),
(195, 'Chaplain', '1'),
(196, 'Charge Hand', '1'),
(197, 'Charity Worker', '1'),
(198, 'Chartered', '1'),
(199, 'Chartered Accountant', '1'),
(200, 'Chauffeur', '1'),
(201, 'Chef', '1'),
(202, 'Chemist', '1'),
(203, 'Chicken Chaser', '1'),
(204, 'Child Minder', '1'),
(205, 'Childminder', '1'),
(206, 'Chimney Sweep', '1'),
(207, 'China Restorer', '1'),
(208, 'Chiropodist', '1'),
(209, 'Chiropractor', '1'),
(210, 'Choreographer', '1'),
(211, 'Church Officer', '1'),
(212, 'Church Warden', '1'),
(213, 'Cinema Manager', '1'),
(214, 'Circus Proprietor', '1'),
(215, 'Circus Worker', '1'),
(216, 'Civil Engineer', '1'),
(217, 'Civil Servant', '1'),
(218, 'Claims Adjustor', '1'),
(219, 'Claims Assessor', '1'),
(220, 'Claims Manager', '1'),
(221, 'Clairvoyant', '1'),
(222, 'Classroom Aide', '1'),
(223, 'Cleaner', '1'),
(224, 'Clergyman', '1'),
(225, 'Cleric', '1'),
(226, 'Clerk', '1'),
(227, 'Commissioned', '1'),
(228, 'Consultant', '1'),
(229, 'Coroner', '1'),
(230, 'Councillor', '1'),
(231, 'Counsellor', '1'),
(232, 'Dealer', '1'),
(233, 'Decorator', '1'),
(234, 'Delivery Driver', '1'),
(235, 'Doctor', '1'),
(236, 'Driver', '1'),
(237, 'Economist', '1'),
(238, 'Editor', '1'),
(239, 'Employee', '1'),
(240, 'Employment', '1'),
(241, 'Engineer', '1'),
(242, 'English Teacher', '1'),
(243, 'Entertainer', '1'),
(244, 'Envoy', '1'),
(245, 'Executive', '1'),
(246, 'Farmer', '1'),
(247, 'Fireman', '1'),
(248, 'Floor Layer', '1'),
(249, 'Floor Manager', '1'),
(250, 'Florist', '1'),
(251, 'Flour Miller', '1'),
(252, 'Flower Arranger', '1'),
(253, 'Flying Instructor', '1'),
(254, 'Foam Convertor', '1'),
(255, 'Food Processor', '1'),
(256, 'Footballer', '1'),
(257, 'Foreman', '1'),
(258, 'Forensic Scientist', '1'),
(259, 'Forest Ranger', '1'),
(260, 'Forester', '1'),
(261, 'Fork Lift Truck Driver', '1'),
(262, 'Forwarding Agent', '1'),
(263, 'Foster Parent', '1'),
(264, 'Foundry Worker', '1'),
(265, 'Fraud Investigator', '1'),
(266, 'French Polisher', '1'),
(267, 'Fruiterer', '1'),
(268, 'Fuel Merchant', '1'),
(269, 'Fund Raiser', '1'),
(270, 'Funeral Director', '1'),
(271, 'Funeral Furnisher', '1'),
(272, 'Furnace Man', '1'),
(273, 'Furniture Dealer', '1'),
(274, 'Furniture Remover', '1'),
(275, 'Furniture Restorer', '1'),
(276, 'Furrier', '1'),
(277, 'Gallery Owner', '1'),
(278, 'Gambler', '1'),
(279, 'Gamekeeper', '1'),
(280, 'Gaming Board Inspector', '1'),
(281, 'Gaming Club Manager', '1'),
(282, 'Gaming Club Proprietor', '1'),
(283, 'Garage Attendant', '1'),
(284, 'Garage Foreman', '1'),
(285, 'Garage Manager', '1'),
(286, 'Garda', '1'),
(287, 'Garden Designer', '1'),
(288, 'Gardener', '1'),
(289, 'Gas Fitter', '1'),
(290, 'Gas Mechanic', '1'),
(291, 'Gas Technician', '1'),
(292, 'Gate Keeper', '1'),
(293, 'Genealogist', '1'),
(294, 'General Practitioner', '1'),
(295, 'Geologist', '1'),
(296, 'Geophysicist', '1'),
(297, 'Gilder', '1'),
(298, 'Glass Worker', '1'),
(299, 'Glazier', '1'),
(300, 'Goldsmith', '1'),
(301, 'Golf Caddy', '1'),
(302, 'Golf Club Professional', '1'),
(303, 'Golfer', '1'),
(304, 'Goods Handler', '1'),
(305, 'Governor', '1'),
(306, 'Granite Technician', '1'),
(307, 'Graphic Designer', '1'),
(308, 'Graphologist', '1'),
(309, 'Grave Digger', '1'),
(310, 'Gravel Merchant', '1'),
(311, 'Green Keeper', '1'),
(312, 'Greengrocer', '1'),
(313, 'Grocer', '1'),
(314, 'Groom', '1'),
(315, 'Ground Worker', '1'),
(316, 'Groundsman', '1'),
(317, 'Guest House Owner', '1'),
(318, 'Guest House Proprietor', '1'),
(319, 'Gun Smith', '1'),
(320, 'Gynaecologist', '1'),
(321, 'HGV Driver', '1'),
(322, 'HGV Mechanic', '1'),
(323, 'Hairdresser', '1'),
(324, 'Handyman', '1'),
(325, 'Hardware Dealer', '1'),
(326, 'Haulage Contractor', '1'),
(327, 'Hawker', '1'),
(328, 'Health Advisor', '1'),
(329, 'Health And Safety', '1'),
(330, 'Health Care Assistant', '1'),
(331, 'Health Consultant', '1'),
(332, 'Health Nurse', '1'),
(333, 'Health Planner', '1'),
(334, 'Health Service', '1'),
(335, 'Health Therapist', '1'),
(336, 'Health Visitor', '1'),
(337, 'Hearing Therapist', '1'),
(338, 'Heating Engineer', '1'),
(339, 'Herbalist', '1'),
(340, 'Highway Inspector', '1'),
(341, 'Hire Car Driver', '1'),
(342, 'Historian', '1'),
(343, 'History Teacher', '1'),
(344, 'Hod Carrier', '1'),
(345, 'Home Economist', '1'),
(346, 'Home Help', '1'),
(347, 'Homecare Manager', '1'),
(348, 'Homeopath', '1'),
(349, 'Homeworker', '1'),
(350, 'Hop Merchant', '1'),
(351, 'Horse Breeder', '1'),
(352, 'Horse Dealer', '1'),
(353, 'Horse Riding Instructor', '1'),
(354, 'Horse Trader', '1'),
(355, 'Horse Trainer', '1'),
(356, 'Horticultural Consultant', '1'),
(357, 'Horticulturalist', '1'),
(358, 'Hosiery Mechanic', '1'),
(359, 'Hosiery Worker', '1'),
(360, 'Hospital Consultant', '1'),
(361, 'Hospital Doctor', '1'),
(362, 'Hospital Manager', '1'),
(363, 'Hospital Orderly', '1'),
(364, 'Hospital Technician', '1'),
(365, 'Hospital Warden', '1'),
(366, 'Hospital Worker', '1'),
(367, 'Hostess', '1'),
(368, 'Hot Foil Printer', '1'),
(369, 'Hotel Consultant', '1'),
(370, 'Hotel Worker', '1'),
(371, 'Hotelier', '1'),
(372, 'Househusband', '1'),
(373, 'Housekeeper', '1'),
(374, 'Housewife', '1'),
(375, 'Housing Assistant', '1'),
(376, 'Housing Officer', '1'),
(377, 'Housing Supervisor', '1'),
(378, 'Hygienist', '1'),
(379, 'Hypnotherapist', '1'),
(380, 'Hypnotist', '1'),
(381, 'IT Consultant', '1'),
(382, 'IT Manager', '1'),
(383, 'IT Trainer', '1'),
(384, 'Ice Cream Vendor', '1'),
(385, 'Illustrator', '1'),
(386, 'Immigration Officer', '1'),
(387, 'Import Consultant', '1'),
(388, 'Importer', '1'),
(389, 'Independent Means', '1'),
(390, 'Induction Moulder', '1'),
(391, 'Industrial Chemist', '1'),
(392, 'Industrial Consultant', '1'),
(393, 'Injection Moulder', '1'),
(394, 'Inspector', '1'),
(395, 'Instructor', '1'),
(396, 'Instrument Engineer', '1'),
(397, 'Instrument Maker', '1'),
(398, 'Instrument Supervisor', '1'),
(399, 'Instrument Technician', '1'),
(400, 'Insurance Agent', '1'),
(401, 'Insurance Assessor', '1'),
(402, 'Insurance Broker', '1'),
(403, 'Insurance Consultant', '1'),
(404, 'Insurance Inspector', '1'),
(405, 'Insurance Staff', '1'),
(406, 'Interior Decorator', '1'),
(407, 'Interior Designer', '1'),
(408, 'Interpreter', '1'),
(409, 'Interviewer', '1'),
(410, 'Inventor', '1'),
(411, 'Investigator', '1'),
(412, 'Investment Advisor', '1'),
(413, 'Investment Banker', '1'),
(414, 'Investment Manager', '1'),
(415, 'Investment Strategist', '1'),
(416, 'Ironmonger', '1'),
(417, 'Janitor', '1'),
(418, 'Jazz Composer', '1'),
(419, 'Jeweller', '1'),
(420, 'Jewellery', '1'),
(421, 'Jockey', '1'),
(422, 'Joiner', '1'),
(423, 'Joinery Consultant', '1'),
(424, 'Journalist', '1'),
(425, 'Judge', '1'),
(426, 'Keep Fit Instructor', '1'),
(427, 'Kennel Hand', '1'),
(428, 'Kitchen Worker', '1'),
(429, 'Knitter', '1'),
(430, 'Labelling Operator', '1'),
(431, 'Laboratory Analyst', '1'),
(432, 'Labourer', '1'),
(433, 'Laminator', '1'),
(434, 'Lampshade Maker', '1'),
(435, 'Land Agent', '1'),
(436, 'Land Surveyor', '1'),
(437, 'Landlady', '1'),
(438, 'Landlord', '1'),
(439, 'Landowner', '1'),
(440, 'Landworker', '1'),
(441, 'Lathe Operator', '1'),
(442, 'Laundry Staff', '1'),
(443, 'Laundry Worker', '1'),
(444, 'Lavatory Attendant', '1'),
(445, 'Law Clerk', '1'),
(446, 'Lawn Mower', '1'),
(447, 'Lawyer', '1'),
(448, 'Leaflet Distributor', '1'),
(449, 'Leather Worker', '1'),
(450, 'Lecturer', '1'),
(451, 'Ledger Clerk', '1'),
(452, 'Legal Advisor', '1'),
(453, 'Legal Assistant', '1'),
(454, 'Legal Executive', '1'),
(455, 'Legal Secretary', '1'),
(456, 'Letting Agent', '1'),
(457, 'Liaison Officer', '1'),
(458, 'Librarian', '1'),
(459, 'Library Manager', '1'),
(460, 'Licensed Premises', '1'),
(461, 'Licensee', '1'),
(462, 'Licensing', '1'),
(463, 'Lifeguard', '1'),
(464, 'Lift Attendant', '1'),
(465, 'Lift Engineer', '1'),
(466, 'Lighterman', '1'),
(467, 'Lighthouse Keeper', '1'),
(468, 'Lighting Designer', '1'),
(469, 'Lighting Technician', '1'),
(470, 'Lime Kiln Attendant', '1'),
(471, 'Line Manager', '1'),
(472, 'Line Worker', '1'),
(473, 'Lineman', '1'),
(474, 'Linguist', '1'),
(475, 'Literary Agent', '1'),
(476, 'Literary Editor', '1'),
(477, 'Lithographer', '1'),
(478, 'Litigation Manager', '1'),
(479, 'Loans Manager', '1'),
(480, 'Local Government', '1'),
(481, 'Lock Keeper', '1'),
(482, 'Locksmith', '1'),
(483, 'Locum Pharmacist', '1'),
(484, 'Log Merchant', '1'),
(485, 'Lorry Driver', '1'),
(486, 'Loss Adjustor', '1'),
(487, 'Loss Assessor', '1'),
(488, 'Lumberjack', '1'),
(489, 'Machine Fitters', '1'),
(490, 'Machine Minder', '1'),
(491, 'Machine Operator', '1'),
(492, 'Machine Setter', '1'),
(493, 'Machine Tool', '1'),
(494, 'Machine Tool Fitter', '1'),
(495, 'Machinist', '1'),
(496, 'Magician', '1'),
(497, 'Magistrate', '1'),
(498, 'Magistrates Clerk', '1'),
(499, 'Maid', '1'),
(500, 'Maintenance Fitter', '1'),
(501, 'Make Up Artist', '1'),
(502, 'Manicurist', '1'),
(503, 'Manufacturing', '1'),
(504, 'Map Mounter', '1'),
(505, 'Marble Finisher', '1'),
(506, 'Marble Mason', '1'),
(507, 'Marine Broker', '1'),
(508, 'Marine Consultant', '1'),
(509, 'Marine Electrician', '1'),
(510, 'Marine Engineer', '1'),
(511, 'Marine Geologist', '1'),
(512, 'Marine Pilot', '1'),
(513, 'Marine Surveyor', '1'),
(514, 'Market Gardener', '1'),
(515, 'Market Research', '1'),
(516, 'Market Researcher', '1'),
(517, 'Market Trader', '1'),
(518, 'Marketing Agent', '1'),
(519, 'Marketing Assistant', '1'),
(520, 'Marketing Coordinator', '1'),
(521, 'Marketing Director', '1'),
(522, 'Marketing Manager', '1'),
(523, 'Marquee Erector', '1'),
(524, 'Massage Therapist', '1'),
(525, 'Masseur', '1'),
(526, 'Masseuse', '1'),
(527, 'Master Mariner', '1'),
(528, 'Materials Controller', '1'),
(529, 'Materials Manager', '1'),
(530, 'Mathematician', '1'),
(531, 'Maths Teacher', '1'),
(532, 'Matron', '1'),
(533, 'Mattress Maker', '1'),
(534, 'Meat Inspector', '1'),
(535, 'Meat Wholesaler', '1'),
(536, 'Mechanic', '1'),
(537, 'Medal Dealer', '1'),
(538, 'Medical Advisor', '1'),
(539, 'Medical Assistant', '1'),
(540, 'Medical Consultant', '1'),
(541, 'Medical Officer', '1'),
(542, 'Medical Physicist', '1'),
(543, 'Medical Practitioner', '1'),
(544, 'Medical Researcher', '1'),
(545, 'Medical Secretary', '1'),
(546, 'Medical Student', '1'),
(547, 'Medical Supplier', '1'),
(548, 'Medical Technician', '1'),
(549, 'Merchandiser', '1'),
(550, 'Merchant', '1'),
(551, 'Merchant Banker', '1'),
(552, 'Merchant Seaman', '1'),
(553, 'Messenger', '1'),
(554, 'Metal Dealer', '1'),
(555, 'Metal Engineer', '1'),
(556, 'Metal Polisher', '1'),
(557, 'Metal Worker', '1'),
(558, 'Metallurgist', '1'),
(559, 'Meteorologist', '1'),
(560, 'Meter Reader', '1'),
(561, 'Microbiologist', '1'),
(562, 'Midwife', '1'),
(563, 'Military Leader', '1'),
(564, 'Milklady', '1'),
(565, 'Milkman', '1'),
(566, 'Mill Operator', '1'),
(567, 'Mill Worker', '1'),
(568, 'Miller', '1'),
(569, 'Milliner', '1'),
(570, 'Millwright', '1'),
(571, 'Miner', '1'),
(572, 'Mineralologist', '1'),
(573, 'Minibus Driver', '1'),
(574, 'Minicab Driver', '1'),
(575, 'Mining Consultant', '1'),
(576, 'Mining Engineer', '1'),
(577, 'Money Broker', '1'),
(578, 'Moneylender', '1'),
(579, 'Mooring Contractor', '1'),
(580, 'Mortgage Broker', '1'),
(581, 'Mortician', '1'),
(582, 'Motor Dealer', '1'),
(583, 'Motor Engineer', '1'),
(584, 'Motor Fitter', '1'),
(585, 'Motor Mechanic', '1'),
(586, 'Motor Racing', '1'),
(587, 'Motor Trader', '1'),
(588, 'Museum Assistant', '1'),
(589, 'Museum Attendant', '1'),
(590, 'Music Teacher', '1'),
(591, 'Musician', '1'),
(592, 'Nanny', '1'),
(593, 'Navigator', '1'),
(594, 'Negotiator', '1'),
(595, 'Neurologist', '1'),
(596, 'Newsagent', '1'),
(597, 'Night Porter', '1'),
(598, 'Night Watchman', '1'),
(599, 'Nuclear Scientist', '1'),
(600, 'Nun', '1'),
(601, 'Nurse', '1'),
(602, 'Nursery Assistant', '1'),
(603, 'Nursery Nurse', '1'),
(604, 'Nursery Worker', '1'),
(605, 'Nurseryman', '1'),
(606, 'Nursing Assistant', '1'),
(607, 'Nursing Auxiliary', '1'),
(608, 'Nursing Manager', '1'),
(609, 'Nursing Sister', '1'),
(610, 'Nutritionist', '1'),
(611, 'Off Shore', '1'),
(612, 'Office Manager', '1'),
(613, 'Office Worker', '1'),
(614, 'Oil Broker', '1'),
(615, 'Oil Rig Crew', '1'),
(616, 'Opera Singer', '1'),
(617, 'Operations', '1'),
(618, 'Operative', '1'),
(619, 'Operator', '1'),
(620, 'Optical', '1'),
(621, 'Optical Advisor', '1'),
(622, 'Optical Assistant', '1'),
(623, 'Optician', '1'),
(624, 'Optometrist', '1'),
(625, 'Orchestral', '1'),
(626, 'Organiser', '1'),
(627, 'Organist', '1'),
(628, 'Ornamental', '1'),
(629, 'Ornithologist', '1'),
(630, 'Orthopaedic', '1'),
(631, 'Orthoptist', '1'),
(632, 'Osteopath', '1'),
(633, 'Outdoor Pursuits', '1'),
(634, 'Outreach Worker', '1'),
(635, 'Packaging', '1'),
(636, 'Packer', '1'),
(637, 'Paediatrician', '1'),
(638, 'Paint Consultant', '1'),
(639, 'Painter', '1'),
(640, 'Palaeobotanist', '1'),
(641, 'Palaeontologist', '1'),
(642, 'Pallet Maker', '1'),
(643, 'Panel Beater', '1'),
(644, 'Paramedic', '1'),
(645, 'Park Attendant', '1'),
(646, 'Park Keeper', '1'),
(647, 'Park Ranger', '1'),
(648, 'Partition Erector', '1'),
(649, 'Parts Man', '1'),
(650, 'Parts Manager', '1'),
(651, 'Parts Supervisor', '1'),
(652, 'Party Planner', '1'),
(653, 'Pasteuriser', '1'),
(654, 'Pastry Chef', '1'),
(655, 'Patent Agent', '1'),
(656, 'Patent Attorney', '1'),
(657, 'Pathologist', '1'),
(658, 'Patrolman', '1'),
(659, 'Pattern Cutter', '1'),
(660, 'Pattern Maker', '1'),
(661, 'Pattern Weaver', '1'),
(662, 'Pawnbroker', '1'),
(663, 'Payroll Assistant', '1'),
(664, 'Payroll Clerk', '1'),
(665, 'Payroll Manager', '1'),
(666, 'Payroll Supervisor', '1'),
(667, 'Personnel Officer', '1'),
(668, 'Pest Controller', '1'),
(669, 'Pet Minder', '1'),
(670, 'Pharmacist', '1'),
(671, 'Philatelist', '1'),
(672, 'Photographer', '1'),
(673, 'Physician', '1'),
(674, 'Physicist', '1'),
(675, 'Physiologist', '1'),
(676, 'Physiotherapist', '1'),
(677, 'Piano Teacher', '1'),
(678, 'Piano Tuner', '1'),
(679, 'Picture Editor', '1'),
(680, 'Picture Framer', '1'),
(681, 'Picture Reseacher', '1'),
(682, 'Pig Man', '1'),
(683, 'Pig Manager', '1'),
(684, 'Pilot', '1'),
(685, 'Pipe Fitter', '1'),
(686, 'Pipe Inspector', '1'),
(687, 'Pipe Insulator', '1'),
(688, 'Pipe Layer', '1'),
(689, 'Planning Engineer', '1'),
(690, 'Planning Manager', '1'),
(691, 'Planning Officer', '1'),
(692, 'Planning Technician', '1'),
(693, 'Plant Attendant', '1'),
(694, 'Plant Driver', '1'),
(695, 'Plant Engineer', '1'),
(696, 'Plant Fitter', '1'),
(697, 'Plant Manager', '1'),
(698, 'Plant Operator', '1'),
(699, 'Plasterer', '1'),
(700, 'Plastics Consultant', '1'),
(701, 'Plastics Engineer', '1'),
(702, 'Plate Layer', '1'),
(703, 'Plater', '1'),
(704, 'Playgroup Assistant', '1'),
(705, 'Playgroup Leader', '1'),
(706, 'Plumber', '1'),
(707, 'Podiatrist', '1'),
(708, 'Police Officer', '1'),
(709, 'Polisher', '1'),
(710, 'Pool Attendant', '1'),
(711, 'Pools Collector', '1'),
(712, 'Porter', '1'),
(713, 'Portfolio Manager', '1'),
(714, 'Post Sorter', '1'),
(715, 'Postman', '1'),
(716, 'Postmaster', '1'),
(717, 'Postwoman', '1'),
(718, 'Potter', '1'),
(719, 'Practice Manager', '1'),
(720, 'Preacher', '1'),
(721, 'Precision Engineer', '1'),
(722, 'Premises', '1'),
(723, 'Premises Security', '1'),
(724, 'Press Officer', '1'),
(725, 'Press Operator', '1'),
(726, 'Press Setter', '1'),
(727, 'Presser', '1'),
(728, 'Priest', '1'),
(729, 'Print Finisher', '1'),
(730, 'Printer', '1'),
(731, 'Prison Chaplain', '1'),
(732, 'Prison Officer', '1'),
(733, 'Private Investigator', '1'),
(734, 'Probation Officer', '1'),
(735, 'Probation Worker', '1'),
(736, 'Procurator Fiscal', '1'),
(737, 'Produce Supervisor', '1'),
(738, 'Producer', '1'),
(739, 'Product Installer', '1'),
(740, 'Product Manager', '1'),
(741, 'Production Engineer', '1'),
(742, 'Production Hand', '1'),
(743, 'Production Manager', '1'),
(744, 'Production Planner', '1'),
(745, 'Professional Boxer', '1'),
(746, 'Professional Racing', '1'),
(747, 'Professional Wrestler', '1'),
(748, 'Progress Chaser', '1'),
(749, 'Progress Clerk', '1'),
(750, 'Project Co-ordinator', '1'),
(751, 'Project Engineer', '1'),
(752, 'Project Leader', '1'),
(753, 'Project Manager', '1'),
(754, 'Project Worker', '1'),
(755, 'Projectionist', '1'),
(756, 'Promoter', '1'),
(757, 'Proof Reader', '1'),
(758, 'Property Buyer', '1'),
(759, 'Property Dealer', '1'),
(760, 'Property Developer', '1'),
(761, 'Property Manager', '1'),
(762, 'Property Valuer', '1'),
(763, 'Proprietor', '1'),
(764, 'Psychiatrist', '1'),
(765, 'Psychoanalyst', '1'),
(766, 'Psychologist', '1'),
(767, 'Psychotherapist', '1'),
(768, 'Public House Manager', '1'),
(769, 'Public Relations Of?cer', '1'),
(770, 'Publican', '1'),
(771, 'Publicity Manager', '1'),
(772, 'Publisher', '1'),
(773, 'Publishing Manager', '1'),
(774, 'Purchase Clerk', '1'),
(775, 'Purchase Ledger Clerk', '1'),
(776, 'Purchasing Assistant', '1'),
(777, 'Purchasing Manager', '1'),
(778, 'Purser', '1'),
(779, 'Quality Controller', '1'),
(780, 'Quality Engineer', '1'),
(781, 'Quality Inspector', '1'),
(782, 'Quality Manager', '1'),
(783, 'Quality Technician', '1'),
(784, 'Quantity Surveyor', '1'),
(785, 'Quarry Worker', '1'),
(786, 'Racehorse Groom', '1'),
(787, 'Racing Organiser', '1'),
(788, 'Radio Controller', '1'),
(789, 'Radio Director', '1'),
(790, 'Radio Engineer', '1'),
(791, 'Radio Operator', '1'),
(792, 'Radio Presenter', '1'),
(793, 'Radio Producer', '1'),
(794, 'Radiographer', '1'),
(795, 'Radiologist', '1'),
(796, 'Rally Driver', '1'),
(797, 'Receptionist', '1'),
(798, 'Recorder', '1'),
(799, 'Records Supervisor', '1'),
(800, 'Recovery Vehicle Coordinator', '1'),
(801, 'Recreational', '1'),
(802, 'Recruitment Consultant', '1'),
(803, 'Rector', '1'),
(804, 'Reflexologist', '1'),
(805, 'Refractory Engineer', '1'),
(806, 'Refrigeration Engineer', '1'),
(807, 'Refuse Collector', '1'),
(808, 'Registrar', '1'),
(809, 'Regulator', '1'),
(810, 'Relocation Agent', '1'),
(811, 'Remedial Therapist', '1'),
(812, 'Rent Collector', '1'),
(813, 'Rent Offcer', '1'),
(814, 'Repair Man', '1'),
(815, 'Repairer', '1'),
(816, 'Reporter', '1'),
(817, 'Representative', '1'),
(818, 'Reprographic Assistant', '1'),
(819, 'Research Analyst', '1'),
(820, 'Research Consultant', '1'),
(821, 'Research Director', '1'),
(822, 'Research Scientist', '1'),
(823, 'Research Technician', '1'),
(824, 'Researcher', '1'),
(825, 'Resin Caster', '1'),
(826, 'Restaurant Manager', '1'),
(827, 'Restaurateur', '1'),
(828, 'Restorer', '1'),
(829, 'Retired', '1'),
(830, 'Revenue Clerk', '1'),
(831, 'Revenue Officer', '1'),
(832, 'Riding Instructor', '1'),
(833, 'Rig Worker', '1'),
(834, 'Rigger', '1'),
(835, 'Riveter', '1'),
(836, 'Road Safety Officer', '1'),
(837, 'Road Sweeper', '1'),
(838, 'Road Worker', '1'),
(839, 'Roadworker', '1'),
(840, 'Roof Tiler', '1'),
(841, 'Roofer', '1'),
(842, 'Rose Grower', '1'),
(843, 'Royal Marine', '1'),
(844, 'Rug Maker', '1'),
(845, 'Saddler', '1'),
(846, 'Safety Officer', '1'),
(847, 'Sail Maker', '1'),
(848, 'Sales Administrator', '1'),
(849, 'Sales Assistant', '1'),
(850, 'Sales Director', '1'),
(851, 'Sales Engineer', '1'),
(852, 'Sales Executive', '1'),
(853, 'Sales Manager', '1'),
(854, 'Sales Representative', '1'),
(855, 'Sales Support', '1'),
(856, 'Salesman', '1'),
(857, 'Saleswoman', '1'),
(858, 'Sand Blaster', '1'),
(859, 'Saw Miller', '1'),
(860, 'Scaffolder', '1'),
(861, 'School Crossing', '1'),
(862, 'School Inspector', '1'),
(863, 'Scientific Officer', '1'),
(864, 'Scientist', '1'),
(865, 'Scrap Dealer', '1'),
(866, 'Screen Printer', '1'),
(867, 'Screen Writer', '1'),
(868, 'Script Writer', '1'),
(869, 'Sculptor', '1'),
(870, 'Seaman', '1'),
(871, 'Seamstress', '1'),
(872, 'Secretary', '1'),
(873, 'Security Consultant', '1'),
(874, 'Security Controller', '1'),
(875, 'Security Guard', '1'),
(876, 'Security Officer', '1'),
(877, 'Servant', '1'),
(878, 'Service Engineer', '1'),
(879, 'Service Manager', '1'),
(880, 'Share Dealer', '1'),
(881, 'Sheet Metal Worker', '1'),
(882, 'Shelf Filler', '1'),
(883, 'Shelter Warden', '1'),
(884, 'Shepherd', '1'),
(885, 'Sheriff', '1'),
(886, 'Sheriff Clerk', '1'),
(887, 'Sheriff Principal', '1'),
(888, 'Shift Controller', '1'),
(889, 'Ship Broker', '1'),
(890, 'Ship Builder', '1'),
(891, 'Shipping Clerk', '1'),
(892, 'Shipping Officer', '1'),
(893, 'Shipwright', '1'),
(894, 'Shipyard Worker', '1'),
(895, 'Shoe Maker', '1'),
(896, 'Shoe Repairer', '1'),
(897, 'Shooting Instructor', '1'),
(898, 'Shop Assistant', '1'),
(899, 'Shop Fitter', '1'),
(900, 'Shop Keeper', '1'),
(901, 'Shop Manager', '1'),
(902, 'Shop Proprietor', '1'),
(903, 'Shot Blaster', '1'),
(904, 'Show Jumper', '1'),
(905, 'Showman', '1'),
(906, 'Shunter', '1'),
(907, 'Sign Maker', '1'),
(908, 'Signalman', '1'),
(909, 'Signwriter', '1'),
(910, 'Site Agent', '1'),
(911, 'Site Engineer', '1'),
(912, 'Skipper', '1'),
(913, 'Slater', '1'),
(914, 'Slaughterman', '1'),
(915, 'Smallholder', '1'),
(916, 'Social Worker', '1'),
(917, 'Software Consultant', '1'),
(918, 'Software Engineer', '1'),
(919, 'Soldier', '1'),
(920, 'Solicitor', '1'),
(921, 'Song Writer', '1'),
(922, 'Sound Artist', '1'),
(923, 'Sound Engineer', '1'),
(924, 'Sound Technician', '1'),
(925, 'Special Constable', '1'),
(926, 'Special Needs', '1'),
(927, 'Speech Therapist', '1'),
(928, 'Sports Administrator', '1'),
(929, 'Sports Coach', '1'),
(930, 'Sports Commentator', '1'),
(931, 'Sportsman', '1'),
(932, 'Sportsperson', '1'),
(933, 'Sportswoman', '1'),
(934, 'Spring Maker', '1'),
(935, 'Stable Hand', '1'),
(936, 'Staff Nurse', '1'),
(937, 'Stage Director', '1'),
(938, 'Stage Hand', '1'),
(939, 'Stage Manager', '1'),
(940, 'Stage Mover', '1'),
(941, 'Station Manager', '1'),
(942, 'Stationer', '1'),
(943, 'Statistician', '1'),
(944, 'Steel Erector', '1'),
(945, 'Steel Worker', '1'),
(946, 'Steeplejack', '1'),
(947, 'Stenographer', '1'),
(948, 'Steward', '1'),
(949, 'Stewardess', '1'),
(950, 'Stock Controller', '1'),
(951, 'Stock Manager', '1'),
(952, 'Stockbroker', '1'),
(953, 'Stockman', '1'),
(954, 'Stocktaker', '1'),
(955, 'Stone Cutter', '1'),
(956, 'Stone Sawyer', '1'),
(957, 'Stonemason', '1'),
(958, 'Store Detective', '1'),
(959, 'Storeman', '1'),
(960, 'Storewoman', '1'),
(961, 'Street Entertainer', '1'),
(962, 'Street Trader', '1'),
(963, 'Stud Hand', '1'),
(964, 'Student', '1'),
(965, 'Student Nurse', '1'),
(966, 'Student Teacher', '1'),
(967, 'Studio Manager', '1'),
(968, 'Sub-Postmaster', '1'),
(969, 'Sub-Postmistress', '1'),
(970, 'Supervisor', '1'),
(971, 'Supply Teacher', '1'),
(972, 'Surgeon', '1'),
(973, 'Surveyor', '1'),
(974, 'Systems Analyst', '1'),
(975, 'Systems Engineer', '1'),
(976, 'Systems Manager', '1'),
(977, 'TV Editor', '1'),
(978, 'Tachograph Analyst', '1'),
(979, 'Tacker', '1'),
(980, 'Tailor', '1'),
(981, 'Tank Farm Operative', '1'),
(982, 'Tanker Driver', '1'),
(983, 'Tanner', '1'),
(984, 'Tattooist', '1'),
(985, 'Tax Advisor', '1'),
(986, 'Tax Analyst', '1'),
(987, 'Tax Assistant', '1'),
(988, 'Tax Consultant', '1'),
(989, 'Tax Inspector', '1'),
(990, 'Tax Manager', '1'),
(991, 'Tax Officer', '1'),
(992, 'Taxi Controller', '1'),
(993, 'Taxi Driver', '1'),
(994, 'Taxidermist', '1'),
(995, 'Tea Blender', '1'),
(996, 'Tea Taster', '1'),
(997, 'Teacher', '1'),
(998, 'Teachers Assistant', '1'),
(999, 'Technical Advisor', '1'),
(1000, 'Technical Analyst', '1'),
(1001, 'Technical Assistant', '1'),
(1002, 'Technical Author', '1'),
(1003, 'Technical Clerk', '1'),
(1004, 'Technical Co-ordinator', '1'),
(1005, 'Technical Director', '1'),
(1006, 'Technical Editor', '1'),
(1007, 'Technical Engineer', '1'),
(1008, 'Technical Illustrator', '1'),
(1009, 'Technical Instructor', '1'),
(1010, 'Technical Liaison', '1'),
(1011, 'Technical Manager', '1'),
(1012, 'Technician', '1'),
(1013, 'Telecommunication', '1'),
(1014, 'Telecommunications', '1'),
(1015, 'Telegraphist', '1'),
(1016, 'Telemarketeer', '1'),
(1017, 'Telephone Engineer', '1'),
(1018, 'Telephonist', '1'),
(1019, 'Telesales Person', '1'),
(1020, 'Television Director', '1'),
(1021, 'Television Engineer', '1'),
(1022, 'Television Presenter', '1'),
(1023, 'Television Producer', '1'),
(1024, 'Telex Operator', '1'),
(1025, 'Temperature Time', '1'),
(1026, 'Tennis Coach', '1'),
(1027, 'Textile Consultant', '1'),
(1028, 'Textile Engineer', '1'),
(1029, 'Textile Technician', '1'),
(1030, 'Textile Worker', '1'),
(1031, 'Thatcher', '1'),
(1032, 'Theatre Manager', '1'),
(1033, 'Theatre Technician', '1'),
(1034, 'Theatrical Agent', '1'),
(1035, 'Therapist', '1'),
(1036, 'Thermal Engineer', '1'),
(1037, 'Thermal Insulator', '1'),
(1038, 'Ticket Agent', '1'),
(1039, 'Ticket Inspector', '1'),
(1040, 'Tiler', '1'),
(1041, 'Timber Inspector', '1'),
(1042, 'Timber Worker', '1'),
(1043, 'Tobacconist', '1'),
(1044, 'Toll Collector', '1'),
(1045, 'Tool Maker', '1'),
(1046, 'Tour Agent', '1'),
(1047, 'Tour Guide', '1'),
(1048, 'Town Clerk', '1'),
(1049, 'Town Planner', '1'),
(1050, 'Toy Maker', '1'),
(1051, 'Toy Trader', '1'),
(1052, 'Track Worker', '1'),
(1053, 'Tractor Driver', '1'),
(1054, 'Tractor Mechanic', '1'),
(1055, 'Trade Mark Agent', '1'),
(1056, 'Trade Union Official', '1'),
(1057, 'Trading Standards', '1'),
(1058, 'Traffic Warden', '1'),
(1059, 'Train Driver', '1'),
(1060, 'Trainee Manager', '1'),
(1061, 'Training Advisor', '1'),
(1062, 'Training Assistant', '1'),
(1063, 'Training Co-ordinator', '1'),
(1064, 'Training Consultant', '1'),
(1065, 'Training Instructor', '1'),
(1066, 'Training Manager', '1'),
(1067, 'Training Officer', '1'),
(1068, 'Transcriber', '1'),
(1069, 'Translator', '1'),
(1070, 'Transport Clerk', '1'),
(1071, 'Transport Consultant', '1'),
(1072, 'Transport Controller', '1'),
(1073, 'Transport Engineer', '1'),
(1074, 'Transport Manager', '1'),
(1075, 'Transport Officer', '1'),
(1076, 'Transport Planner', '1'),
(1077, 'Travel Agent', '1'),
(1078, 'Travel Clerk', '1'),
(1079, 'Travel Consultant', '1'),
(1080, 'Travel Courier', '1'),
(1081, 'Travel Guide', '1'),
(1082, 'Travel Guide Writer', '1'),
(1083, 'Travel Representative', '1'),
(1084, 'Travelling Showman', '1'),
(1085, 'Treasurer', '1'),
(1086, 'Tree Feller', '1'),
(1087, 'Tree Surgeon', '1'),
(1088, 'Trichologist', '1'),
(1089, 'Trinity House Pilot', '1'),
(1090, 'Trout Farmer', '1'),
(1091, 'Tug Skipper', '1'),
(1092, 'Tunneller', '1'),
(1093, 'Turf Accountant', '1'),
(1094, 'Turkey Farmer', '1'),
(1095, 'Turner', '1'),
(1096, 'Tutor', '1'),
(1097, 'Typesetter', '1'),
(1098, 'Typewriter Engineer', '1'),
(1099, 'Typist', '1'),
(1100, 'Tyre Builder', '1'),
(1101, 'Tyre Fitter', '1'),
(1102, 'Tyre Inspector', '1'),
(1103, 'Tyre Technician', '1'),
(1104, 'Undertaker', '1'),
(1105, 'Underwriter', '1'),
(1106, 'Upholsterer', '1'),
(1107, 'Valuer', '1'),
(1108, 'Valve Technician', '1'),
(1109, 'Van Driver', '1'),
(1110, 'Vehicle Assessor', '1'),
(1111, 'Vehicle Body Worker', '1'),
(1112, 'Vehicle Engineer', '1'),
(1113, 'Vehicle Technician', '1'),
(1114, 'Ventriloquist', '1'),
(1115, 'Verger', '1'),
(1116, 'Veterinary Surgeon', '1'),
(1117, 'Vicar', '1'),
(1118, 'Video Artist', '1'),
(1119, 'Violin Maker', '1'),
(1120, 'Violinist', '1'),
(1121, 'Voluntary Worker', '1'),
(1122, 'Wages Clerk', '1'),
(1123, 'Waiter', '1'),
(1124, 'Waitress', '1'),
(1125, 'Warden', '1'),
(1126, 'Warehouse Manager', '1'),
(1127, 'Warehouseman', '1'),
(1128, 'Warehousewoman', '1'),
(1129, 'Watchmaker', '1'),
(1130, 'Weaver', '1'),
(1131, 'Weighbridge Clerk', '1'),
(1132, 'Weighbridge Operator', '1'),
(1133, 'Welder', '1'),
(1134, 'Welfare Assistant', '1'),
(1135, 'Welfare Officer', '1'),
(1136, 'Welfare Rights Officer', '1'),
(1137, 'Wheel Clamper', '1'),
(1138, 'Wholesale Newspaper', '1'),
(1139, 'Window Cleaner', '1'),
(1140, 'Window Dresser', '1'),
(1141, 'Windscreen Fitter', '1'),
(1142, 'Wine Merchant', '1'),
(1143, 'Wood Carver', '1'),
(1144, 'Wood Cutter', '1'),
(1145, 'Wood Worker', '1'),
(1146, 'Word Processing Operator', '1'),
(1147, 'Works Manager', '1'),
(1148, 'Writer', '1'),
(1149, 'Yacht Master', '1'),
(1150, 'Yard Manager', '1'),
(1151, 'Youth Hostel Warden', '1'),
(1152, 'Youth Worker', '1'),
(1153, 'Zoo Keeper', '1'),
(1154, 'Zoo Manager', '1'),
(1155, 'Zoologist', '1');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posted_by_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vote_num` int(11) NOT NULL DEFAULT 0,
  `is_safe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `posted_by_user_id`, `title`, `content`, `vote_num`, `is_safe`, `status`, `created_at`, `updated_at`, `tags`) VALUES
(18, '4', 'Free Medicines', '<p>Should the <strong>Government </strong>expand the list of free medicines from <i>75</i> to more <strong>medicinal </strong>items?</p>', 3, '1', '1', '2022-04-11 10:37:09', '2022-04-11 14:45:51', 'medical'),
(19, '6', 'Sugarcane Lease to Agricultural Lease', 'Should the Government convert sugarcane leases to agricultural leases for sugarcane farmers to plant other crops? ', 1, '1', '1', '2022-04-11 10:37:51', '2022-04-11 14:41:22', 'Agriculture,Land'),
(20, '10', 'Home Based Businesses', 'Should the Government allow home based businesses from residential areas without going through the rezoning process?', 1, '1', '1', '2022-04-03 10:43:42', '2022-04-11 11:15:22', 'Business'),
(21, '3', 'Dialysis Subsidy', 'What are your views on the current dialysis subsidy of $75 from the Government? ', 0, '1', '1', '2022-03-15 10:44:36', NULL, 'Medical'),
(22, '14', 'National Minimum Wage', 'Should the Government consider the national minimum wage to increase up to $4?', 0, '1', '1', '2022-02-12 23:46:04', NULL, 'wage,government'),
(23, '8', 'Fuel Tax', 'Should the Government remove the extra 20c per liter levy? ', -1, '1', '1', '2022-04-04 20:47:42', '2022-04-11 10:55:22', 'Tax,budget'),
(24, '1', 'Legalizing Prostitution', 'What are your views on the legalizing prostitution in Fiji? ', 2, '0', '1', '2022-04-11 10:49:16', '2022-04-11 14:40:45', 'Prostitution'),
(25, '5', 'Rape Charges', 'What are your views on the current rape punishments and what should the Government do? ', 1, '0', '1', '2022-04-06 08:50:25', '2022-04-11 10:55:16', 'legal,public'),
(28, '16', 'Cleanup Campaign', '<p>Organizing a cleanup campaign for Nasese Seawall - interested participants can comment.&nbsp;</p>', 0, '1', '1', '2022-04-11 14:53:21', '2022-04-11 14:57:39', 'land'),
(29, '16', 'Government levy of 20c on Fuels', '<p>What are your opinions on the <strong>20c</strong> levy charged on fuels? ???</p>', 0, '1', '0', '2022-04-11 15:00:05', '2022-04-11 15:04:54', 'transport,land');

-- --------------------------------------------------------

--
-- Table structure for table `posts_logs`
--

CREATE TABLE `posts_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posted_by_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_logs`
--

INSERT INTO `posts_logs` (`id`, `posted_by_user_id`, `original_post_id`, `title`, `content`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(10, '4', '18', 'Free Medicines', '<p>Should the Government expand the list of free medicines from 75 to more medicinal items?</p>', 'medical', '1', '2022-04-11 10:38:34', '2022-04-11 10:38:34'),
(11, '4', '18', 'Free Medicines', '<p>Should the <strong>Government </strong>expand the list of free medicines from <i>75</i> to more medicinal items?</p>', 'medical', '1', '2022-04-11 10:38:57', '2022-04-11 10:38:57'),
(12, '4', '18', 'Free Medicines', '<p>Should the Government<strong> </strong>expand the list of free medicines from <i>75</i> to more medicinal items?</p>', 'medical', '1', '2022-04-11 10:41:35', '2022-04-11 10:41:35'),
(13, '16', '28', 'Cleanup Campaign', '<p>aTest</p>', 'land', '1', '2022-04-11 14:57:39', '2022-04-11 14:57:39'),
(14, '16', '29', 'Government levy of 20c on Fuels', '<p>What are your opinions on the <strong>20c</strong> levy charged on fuels?&nbsp;</p>', 'transport', '1', '2022-04-11 15:04:33', '2022-04-11 15:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `post_votes_tables`
--

CREATE TABLE `post_votes_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_votes_tables`
--

INSERT INTO `post_votes_tables` (`id`, `user_id`, `post_id`, `type`, `created_at`, `updated_at`) VALUES
(10, '4', '24', '+', NULL, '2022-04-11 10:55:12'),
(11, '4', '25', '+', NULL, '2022-04-11 10:55:16'),
(12, '4', '23', '-', NULL, '2022-04-11 10:55:22'),
(13, '6', '24', '+', NULL, '2022-04-11 11:10:06'),
(14, '6', '18', '+', NULL, '2022-04-11 11:12:22'),
(15, '8', '20', '+', NULL, '2022-04-11 11:15:22'),
(16, '12', '19', '+', NULL, '2022-04-11 11:20:36'),
(17, '12', '18', '+', NULL, '2022-04-11 11:20:54'),
(18, '10', '18', '+', NULL, '2022-04-11 12:01:37'),
(19, '16', '24', '-', NULL, '2022-04-11 14:40:45'),
(20, '16', '19', '-', NULL, '2022-04-11 14:41:22'),
(21, '16', '18', '-', NULL, '2022-04-11 14:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `profanity`
--

CREATE TABLE `profanity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profanity`
--

INSERT INTO `profanity` (`id`, `word`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fuck', '1', '2022-04-09 02:22:34', '2022-04-09 02:22:34'),
(2, 'ass', '1', '2022-04-09 02:22:34', '2022-04-09 02:22:34'),
(3, 'penis', '1', '2022-04-09 02:22:34', '2022-04-09 02:22:34'),
(4, 'dick', '1', '2022-04-09 02:22:34', '2022-04-09 02:22:34'),
(5, 'pussy', '1', '2022-04-09 02:22:34', '2022-04-09 02:22:34'),
(6, 'bad word', '1', '2022-04-09 02:22:34', '2022-04-09 02:22:34'),
(7, 'sex', '1', '2022-04-09 02:22:34', '2022-04-09 02:22:34'),
(8, 'Rape', '1', '2022-04-09 02:22:34', '2022-04-09 02:22:34'),
(9, 'Prostitution', '1', '2022-04-09 02:22:34', '2022-04-09 02:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `tags_tables`
--

CREATE TABLE `tags_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags_tables`
--

INSERT INTO `tags_tables` (`id`, `tag`, `status`, `created_at`, `updated_at`) VALUES
(1, 'climate', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(2, 'global warming', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(3, 'poverty', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(4, 'wage', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(5, 'prostitution', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(6, 'land', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(7, 'levy', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(8, 'government', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(9, 'public affairs', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(10, 'retirement', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(11, 'civil', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(12, 'public', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(13, 'immigration', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(14, 'transport', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(15, 'medical', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(16, 'environment', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(17, 'legal', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(18, 'holiday', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(19, 'budget', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(20, 'price', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(21, 'Business', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(22, 'Agriculture', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(23, 'Tax', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(24, 'Lease', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(25, 'Residential', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(26, 'Subsidy', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29'),
(27, 'Rape', '1', '2022-04-08 02:50:29', '2022-04-08 02:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Guinevere Bentley', 'mydanogaby@mailinator.com', NULL, '$2y$10$0qo9QpB.8xpXwHHFBRPO0O29Nu5uQM45gJ61XqyMeV4jlhdqJdMwO', 'kfZim3wbzCjzzAuODsbJ2dzLNyeFfkgqf6H1lXk7soZL2fqIQ0HUsn0nUqoZ', '2022-04-03 08:32:52', '2022-04-06 07:41:26', 1),
(2, 'Vincent Fulton', 'qazowyga@mailinator.com', NULL, '$2y$10$HFrJuVhDFmSssPmgmfuW0OK.hD4MtcYjPrA5rBTqJDToV3RpcTY46', 'eEvlbSjLQMeXeiE6gq23Pa8EfBoThiYBlZm0gbBwr6j4JWdCmypvSg9gSzaf', '2022-04-03 10:35:03', '2022-04-06 00:07:59', 1),
(3, 'Jerome Meyer', 'jiwa@mailinator.com', NULL, '$2y$10$7w//wWQtghQpZYn/R7z.QOORRP9UspeiPvv.m84MpgbDIk1iNiHIG', 'WhXs6ZaDaHNg4fqooenpJf0IbT2MK4eQFQbMvNGGi7V7dwJIgExub7EBN6HG', '2022-04-03 18:40:18', '2022-04-11 11:07:45', 1),
(4, 'Harsh Sagar', 'harsh1@email.com', NULL, '$2y$10$W3Wg4.qnxh.x2/GyZ4e06O5uGABBj0ENMmSmuSJQ5bcmu6LG8ILO2', 'eBv2vhJaAeuNuDqmLRUpzjFFiLpkmrQwoE2qJR4K4U6fcB8ycpAckOTTpEdF', '2022-04-03 20:37:38', '2022-04-11 14:32:26', 1),
(5, 'kunz', 'kunz@email.com', NULL, '$2y$10$cB3zu9Mfscvych4cvVxT0OSS7znAOHDSOaBkO6IU5a4VlY1siJN3G', NULL, '2022-04-10 00:26:15', '2022-04-11 13:50:21', 1),
(6, 'Patrick Kelly', 'PatrickKelly@yahoo.com', NULL, '$2y$10$4O.R.orMI0JvnPxWAUnVm.AbV0scD5lz9ex6mAnftuHE6dzbcIIL6', NULL, '2022-04-11 10:07:41', '2022-04-11 11:14:42', 1),
(7, 'Melissa Perry', 'MelissaPerry@live.com', NULL, '$2y$10$CUhNjQXsMrtJmyK/OQUh0O4iW/8i0R.kCDMZ/aUdmkYknzzruaRSm', NULL, '2022-04-11 10:15:44', '2022-04-11 10:15:45', 1),
(8, 'Brandon Evans', 'BrandonEvans@hotmail.com', NULL, '$2y$10$b.eh2W9x5oT8UzsYdNdDhOJI046DVr/Iv9RYW0hRpOlloeYJAwpaG', NULL, '2022-04-11 10:17:06', '2022-04-11 11:17:09', 1),
(9, 'Roger Morgan', 'RogerMorgan@outlook.com', NULL, '$2y$10$BrZ9jLW5MYflVehb5LIju.lmz7KCzUcSN21Eyyl9iYmgAgL3P//su', NULL, '2022-04-11 10:18:59', '2022-04-11 10:18:59', 1),
(10, 'Maria Taylor', 'MariaTaylor@hotmail.com', NULL, '$2y$10$xCBdSsemUq5xy7o.8DRGFelOaJtukeuRdcVfaVYBQW2ezkUES7yIm', NULL, '2022-04-11 10:20:21', '2022-04-11 12:01:52', 1),
(11, 'Kevin Roberts', 'KevinRoberts@outlook.com', NULL, '$2y$10$2n0WKk34g.yBbso.xhVAquwNOEwK7dlJdGhH9UVl7IqQUXgMJZhoi', NULL, '2022-04-11 10:21:29', '2022-04-11 10:21:29', 1),
(12, 'Donna Wood', 'DonnaWood@live.com', NULL, '$2y$10$Z9/.3uy8cBYfjuBVegPEuOxxkWPHNiicl7X7v3ikIL//NbRn2uxaS', NULL, '2022-04-11 10:22:38', '2022-04-11 14:56:11', 1),
(13, 'Eugene Washington', 'EugeneWashington@yahoo.com', NULL, '$2y$10$kxb.OyEUpjWEP4jvrTW3peUIdtBlm012Ee821tSEj1h0IRa6V01OK', NULL, '2022-04-11 10:25:17', '2022-04-11 10:25:18', 1),
(14, 'Carlos Hernandez', 'CarlosHernandez@hotmail.com', NULL, '$2y$10$bluq5mhi0l1O7v3uSEspqOybm8H0IQsUiBZVhytwvb8wTMsHrNd1y', NULL, '2022-04-11 10:26:35', '2022-04-11 10:26:35', 1),
(15, 'Howard Edwards', 'HowardEdwards@gmail.com', NULL, '$2y$10$A5EWD89vv0hR/xuSnRAbnOkGCRYD16cvqAHSoElItKInuYepDIZjC', NULL, '2022-04-11 10:27:49', '2022-04-11 10:27:50', 1),
(16, 'Tom Hanks', 'TomHanks@hotmail.com', NULL, '$2y$10$hUw6OkpDKDg.g7wm6b/b5OOtYKpBsaXtO08SXT0qofPUsZYQUBnsS', NULL, '2022-04-11 14:23:09', '2022-04-11 15:04:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '15.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `occupation`, `dob`, `created_at`, `updated_at`, `user_img`) VALUES
(10, '3', 'Doctor', '1995-04-04', '2022-04-03 20:12:33', '2022-04-03 20:12:33', '15.png'),
(20, '4', 'Engineer', '2022-04-07', '2022-04-03 20:38:59', '2022-04-03 20:38:59', '14.png'),
(21, '2', 'Accountant', '2022-04-06', '2022-04-05 05:44:55', '2022-04-05 05:44:55', '12.png'),
(22, '1', 'Accounts Clerk', '1996-04-01', '2022-04-06 07:41:39', '2022-04-06 07:41:39', '18.png'),
(23, '5', 'Accountant', '1995-04-11', '2022-04-10 02:31:19', '2022-04-10 02:31:19', '10.png'),
(24, '6', 'Planning Engineer', '1991-02-11', '2022-04-11 10:14:50', '2022-04-11 10:14:50', '12.png'),
(25, '7', 'Accountant', '1978-11-02', '2022-04-11 10:16:09', '2022-04-11 10:16:09', '2.png'),
(26, '8', 'Systems Analyst', '1977-10-01', '2022-04-11 10:17:46', '2022-04-11 10:17:46', '7.png'),
(27, '9', 'English Teacher', '1987-11-05', '2022-04-11 10:19:46', '2022-04-11 10:19:46', '12.png'),
(28, '10', 'Artist', '1994-04-24', '2022-04-11 10:21:00', '2022-04-11 10:21:00', '19.png'),
(29, '11', 'Funeral Director', '1993-10-21', '2022-04-11 10:22:13', '2022-04-11 10:22:13', '16.png'),
(30, '12', 'Advertising Contractor', '1991-12-16', '2022-04-11 10:24:15', '2022-04-11 10:24:15', '3.png'),
(31, '13', 'Barber', '1988-11-27', '2022-04-11 10:26:00', '2022-04-11 10:26:00', '20.png'),
(32, '14', 'Doctor', '1969-04-08', '2022-04-11 10:27:15', '2022-04-11 10:27:15', '14.png'),
(33, '15', 'Police Officer', '1960-07-19', '2022-04-11 10:28:23', '2022-04-11 10:28:23', '20.png'),
(34, '16', 'Aircraft Engineer', '1995-01-04', '2022-04-11 14:23:47', '2022-04-11 14:23:47', '19.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follow_discussions_tables`
--
ALTER TABLE `follow_discussions_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications_tables`
--
ALTER TABLE `notifications_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_logs`
--
ALTER TABLE `posts_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_votes_tables`
--
ALTER TABLE `post_votes_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profanity`
--
ALTER TABLE `profanity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_tables`
--
ALTER TABLE `tags_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow_discussions_tables`
--
ALTER TABLE `follow_discussions_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications_tables`
--
ALTER TABLE `notifications_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1156;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `posts_logs`
--
ALTER TABLE `posts_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post_votes_tables`
--
ALTER TABLE `post_votes_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `profanity`
--
ALTER TABLE `profanity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tags_tables`
--
ALTER TABLE `tags_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
