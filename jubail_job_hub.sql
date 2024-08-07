-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2024 at 12:53 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jubail_job_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password_reset_code` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `fullname`, `email`, `password`, `username`, `password_reset_code`) VALUES
(1, 'Rahaf Tariq', 'admin@admin.com', '$2y$12$IQCcMGCh05BgXnbKuKSxU.Xi3LBoo9RE/7UiLaUOXTvx/iNFQZiuW', 'admin', NULL),
(3, 'Renaad', 'renad@mailinator.com', '$2y$12$hvVJ3Hi8Ns8JFLJIMotLs.Bghx5jH6OkX3ntIRw.w6gpVJaoHdkOm', 'renad', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int NOT NULL,
  `job_id` int DEFAULT NULL,
  `job_seeker_id` int DEFAULT NULL,
  `application_date` timestamp NULL DEFAULT NULL,
  `interview_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `job_id`, `job_seeker_id`, `application_date`, `interview_date`) VALUES
(4, 2, 1, '2024-07-10 18:03:17', '2024-07-24 21:00:00'),
(5, 5, 5, '2024-07-12 18:09:03', NULL),
(7, 1, 4, '2024-07-12 14:20:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `application_status`
--

CREATE TABLE `application_status` (
  `application_status_id` int NOT NULL,
  `application_id` int DEFAULT NULL,
  `status` enum('Submitted','Under Review','Interview Scheduled','Interviewed','Shortlisted','Offered','Accepted','Declined','Hired','Not Selected','Withdrawn','Closed') NOT NULL,
  `notes` text,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `application_status`
--

INSERT INTO `application_status` (`application_status_id`, `application_id`, `status`, `notes`, `updated_date`) VALUES
(14, 4, 'Submitted', NULL, '2024-07-18 06:52:07'),
(15, 5, 'Submitted', NULL, '2024-07-18 06:52:18'),
(16, 7, 'Submitted', NULL, '2024-07-18 06:52:26'),
(17, 4, 'Under Review', NULL, '2024-07-18 06:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `industry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `about_company` text,
  `company_size` enum('small','medium','large') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone_number_1` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_number_2` varchar(15) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `founded_at` date DEFAULT NULL,
  `joined_at` date DEFAULT NULL,
  `status` enum('pending','accepted','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'pending',
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `password_reset_code` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `admin_id`, `fullname`, `email`, `password`, `username`, `company_name`, `industry`, `logo`, `about_company`, `company_size`, `phone_number_1`, `phone_number_2`, `website_url`, `linkedin_url`, `twitter_url`, `founded_at`, `joined_at`, `status`, `is_blocked`, `password_reset_code`) VALUES
(1, 1, 'ENGIE AMEA', 'company1@gmail.com', '$2y$12$cuSdTsVq8frCjGrCVLIRvOTtuprm8eq6c68RFOhQHBIGqqGuCcCcO', 'rr', 'ENGIE AMEA', 'Retail', 'companies/w-2024-07-18-6698cfb4e68b7.PNG', 'ENGIE is active in all Africa, Middle East, and Asia (AMEA) countries, offering efficient gas-fired power solutions, desalinated water production, district ...\n', 'large', '0589984888', NULL, 'https://engiemiddleeast.com/', '', '', '1996-08-24', '2024-07-03', 'rejected', 0, NULL),
(2, 1, 'NOC INC', 'company2@gmail.com', '$2y$12$cuSdTsVq8frCjGrCVLIRvOTtuprm8eq6c68RFOhQHBIGqqGuCcCcO', 'company2', 'NOC INC', 'Education', 'companies/w-2024-07-18-6698d291e893a.jpeg', 'An Integrated-Brandlab for helping organizations to use their brand to innovate and grow', 'medium', '0589898888', NULL, 'https://www.ric.in', '', '', '1971-03-12', '2024-07-03', 'accepted', 0, NULL),
(3, NULL, 'kouk Limited', 'company3@gmail.com', '$2y$12$cuSdTsVq8frCjGrCVLIRvOTtuprm8eq6c68RFOhQHBIGqqGuCcCcO', 't', 'kouk Limited', 'Technology', 'companies/w-2024-07-20-669c190487331.jpg', 'An Integrated-Brandlab for helping organizations to use their brand to innovate and grow', 'small', '0578787877', NULL, 'https://www.hagorozoge.ca', 'https://www.zulucoso.tv', 'https://www.zawewiduqakovy.cm', '2011-06-14', '2024-07-03', 'accepted', 0, NULL),
(4, 1, 'Aramco', 'company4@gmail.com', '$2y$12$WmViergpcbGcTiU2hPooceUU29g1rVq0XaCXcvj59wASK8AHuVnhy', 'renad', 'Aramco', 'Finance', 'companies/w-2024-07-03-6685c188b764e.jpg', 'We are one of the world\'s largest integrated energy and chemicals companies, creating value across the hydrocarbon chain, and delivering societal and economic benefits to people and communities around the globe who rely on the vital energy we supply. We are committed to playing a leading role in the energy transition.', 'large', '0578888888', NULL, NULL, NULL, NULL, '2015-01-03', '2024-07-03', 'accepted', 0, NULL),
(5, 1, 'Sasel Saudi', 'company5@gmail.com', '$2y$12$cuSdTsVq8frCjGrCVLIRvOTtuprm8eq6c68RFOhQHBIGqqGuCcCcO', 'company5', 'Sasel Saudi', 'Finance', 'companies/w-2024-07-18-6698d62354fbf.jpeg', 'Sasel Saudi LLC. was founded in 2013 in Kingdom of Saudi Arabia by Sasel Co. Inc. “Our main activities, in the field of Building Construction, Electromechanical ...', 'large', '0578888888', NULL, NULL, NULL, NULL, '2015-01-03', '2024-07-03', 'accepted', 1, NULL),
(6, 1, 'SABIC', 'company6@gmail.com', '$2y$12$cuSdTsVq8frCjGrCVLIRvOTtuprm8eq6c68RFOhQHBIGqqGuCcCcO', 'company6', 'SABIC', 'Finance', 'companies/w-2024-07-20-669c1f2d8c1b9.jpg', 'From making cars and planes more fuel-efficient, to helping conserve the world’s water supply and enabling colorful smartphone cases, we find solutions to the challenges of today to help our customers achieve their ambitions and build a better tomorrow.', 'large', '0578888888', NULL, 'https://www.sabic.com/en', 'https://www.linkedin.com/company/sabic/', 'https://twitter.com/sabic', '2005-01-01', '2024-07-20', 'accepted', 0, NULL),
(7, NULL, 'test', 'test@com.com', '$2y$12$.IKZ1W7jACdmCSZyGBFok.2/cDuiDPY18zOlfFkFL52lBP1efl7bO', 'test', 'test', 'Petrochemicals & Chemicals,Construction & Engineering', NULL, 'tes tes', 'medium', '0590999494', NULL, NULL, NULL, NULL, '2024-07-01', '2024-07-24', 'accepted', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_advertisements`
--

CREATE TABLE `job_advertisements` (
  `job_id` int NOT NULL,
  `company_id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `job_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `job_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `requirements` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `experience_level` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `education_level` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `skills_required` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `benefits` text,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `working_hours` int DEFAULT NULL,
  `application_deadline` date NOT NULL,
  `posted_date` date NOT NULL,
  `is_published` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_advertisements`
--

INSERT INTO `job_advertisements` (`job_id`, `company_id`, `admin_id`, `job_title`, `job_description`, `job_type`, `requirements`, `experience_level`, `education_level`, `skills_required`, `salary`, `benefits`, `location`, `working_hours`, `application_deadline`, `posted_date`, `is_published`, `status`) VALUES
(1, 6, 1, 'sales manager', 'As a Sales Manager at Aramco, you will be responsible for driving sales growth and achieving sales targets in your assigned territory. You will develop and implement effective sales strategies, build and maintain strong customer relationships, and identify new business opportunities. The ideal candidate will have a proven track record in sales, excellent communication skills, and the ability to lead and motivate a sales team.\n\n', 'Full-time', 'Develop and execute sales strategies to achieve business objectives.\nIdentify and pursue new business opportunities to expand market share.\nBuild and maintain strong relationships with key customers and stakeholders.\nMonitor market trends and competitor activities to inform sales strategies.\nPrepare and deliver sales presentations and proposals to prospective clients.\nCollaborate with other departments to ensure customer satisfaction and operational efficiency.\nManage and mentor a team of sales representatives, setting performance goals and providing ongoing support and training.\nPrepare sales forecasts and reports for senior managemen', 'Mid', 'Bachelor\'s Degree', 'Bachelor\'s degree in Business Administration, Marketing, or a related field.\nMinimum of 5 years of experience in sales, preferably in the energy or chemical industry.\nProven track record of achieving sales targets and driving revenue growth.\nStrong leadership and team management skills.\nExcellent communication, negotiation, and interpersonal skills.\nAbility to work independently and as part of a team.\nProficiency in Microsoft Office and CRM software.\nFluency in English; knowledge of Arabic is a plus', '4000.00', 'Quae animi et labor', 'Voluptas voluptatem', 1, '2024-08-26', '2024-07-04', 1, 1),
(2, 6, 1, 'HR', '<p>Placeat, non pariatu.</p>', 'Full-time', '<p>Facere facilis qui s.</p>', 'Entry', 'High School', '<p>Rerum ea officiis ut.</p>', '3500.00', '<p>Autem sapiente incid.</p>', 'Qui voluptatem et qu', 87, '2024-08-25', '2024-07-05', 0, 1),
(3, 6, 1, 'engineer', 'Seeking a skilled Mechanical Engineer to join our team in Jubail. You will be responsible for designing and testing mechanical systems.', 'Contract', 'Experience in mechanical design and CAD software', 'Manager', 'Master\'s Degree', 'Strong problem-solving skills and attention to detail', '10000.00', 'Relocation assistance, annual bonus', 'Jubail, Saudi Arabia', 45, '2024-08-27', '2024-07-10', 1, 0),
(4, 4, 1, 'Electrical Engineer', 'We are hiring a Customer Service Representative for our Jubail office. This role involves handling customer inquiries and providing excellent service.', 'Full-time', 'Experience in customer service or related field', 'Entry', 'High School', 'Excellent communication skills and customer-oriented mindset', '4000.00', 'Training provided, health benefits', 'Jubail, Saudi Arabia', 40, '2024-08-15', '2024-07-11', 1, 0),
(5, 6, 1, 'Finance Analyst', 'Join our creative team in Jubail as a Graphic Designer. You will work on designing visual concepts for various marketing materials and campaigns.', 'Part-time', 'Experience in graphic design and Adobe Creative Suite', 'Entry', 'Bachelor\'s Degree', 'Portfolio showcasing creative designs', '3600.00', 'Flexible schedule, creative environment', 'Jubail, Saudi Arabia', 20, '2024-08-22', '2024-07-12', 1, 0),
(6, 4, 1, 'Quality Assurance Specialist', 'Looking for an IT Support Specialist to provide technical assistance to our employees in Jubail. This role requires troubleshooting hardware and software issues.', 'Temporary', 'Experience in IT support and troubleshooting', 'Entry', 'Associate\'s Degree', 'Knowledge of Windows and MacOS environments', '3000.00', 'Contract renewal possibility, training opportunities', 'Jubail, Saudi Arabia', 30, '2024-08-10', '2024-07-13', 1, 0),
(7, 6, 1, 'Sales Manager', 'Seeking a dynamic Sales Manager to lead our sales team in Jubail. You will be responsible for developing sales strategies and achieving revenue targets.', 'Full-time', 'Proven experience in sales management', 'Manager', 'Bachelor\'s Degree', 'Strong negotiation and leadership skills', '9000.00', 'Car allowance, commission structure', 'Jubail, Saudi Arabia', 45, '2024-08-15', '2024-07-14', 1, 0),
(8, 4, 1, 'Electrical Engineer', 'We are hiring an Electrical Engineer to join our team in Jubail. This role involves designing and implementing electrical systems for industrial projects.', 'Contract', 'Experience in electrical design and PLC programming', 'Mid', 'Bachelor\'s Degree', 'Knowledge of AutoCAD and PLC programming', '8500.00', 'Health insurance, annual leave', 'Jubail, Saudi Arabia', 40, '2024-08-20', '2024-07-15', 1, 0),
(9, 4, 1, 'HR Coordinator', 'Join our HR team in Jubail as an HR Coordinator. You will assist in recruitment, employee relations, and HR administrative tasks.', 'Full-time', 'Experience in HR administration', 'Mid', 'Bachelor\'s Degree', 'Knowledge of labor laws and HR best practices', '6000.00', 'Professional development opportunities, health benefits', 'Jubail, Saudi Arabia', 35, '2024-08-25', '2024-07-22', 1, 0),
(10, 6, 1, 'Network Engineer', 'Looking for a Network Engineer to manage and optimize our network infrastructure in Jubail. This role requires expertise in network configuration and troubleshooting.', 'Full-time', 'Experience in network administration', 'Senior', 'Bachelor\'s Degree', 'CCNA or equivalent certification', '8500.00', 'Remote work option, annual bonus', 'Jubail, Saudi Arabia', 40, '2024-08-30', '2024-07-03', 1, 0),
(11, 4, NULL, 'Finance Analyst', 'Join our finance team in Jubail as a Finance Analyst. You will analyze financial data, prepare reports, and support financial planning activities.', 'Part-time', 'Experience in financial analysis', 'Mid', 'Bachelor\'s Degree', 'Advanced Excel and financial modeling skills', '4000.00', 'Flexible hours, career advancement opportunities', 'Jubail, Saudi Arabia', 25, '2024-09-01', '2024-07-11', 1, 1),
(12, 4, NULL, 'Civil Engineer', 'We are hiring a Civil Engineer to oversee construction projects in Jubail. This role involves project planning, design, and supervision of construction activities.', 'Full-time', 'Experience in civil engineering', 'Senior', 'Bachelor\'s Degree', 'Project management skills and knowledge of construction codes', '9000.00', 'Healthcare benefits, performance bonus', 'Jubail, Saudi Arabia', 45, '2024-09-05', '2024-07-06', 1, 1),
(13, 4, NULL, 'Executive Assistant', 'Seeking an Executive Assistant to support senior executives in our Jubail office. This role requires strong organizational skills and attention to detail.', 'Temporary', 'Experience as an executive assistant or similar role', 'Mid', 'Bachelor\'s Degree', 'Proficiency in MS Office suite', '5000.00', 'Temporary contract, training provided', 'Jubail, Saudi Arabia', 30, '2024-09-10', '2024-07-04', 1, 1),
(14, 6, 1, 'Quality Assurance Specialist', 'Join our quality assurance team in Jubail. You will be responsible for ensuring product quality and compliance with regulatory standards.', 'Full-time', 'Experience in quality assurance', 'Entry', 'Bachelor\'s Degree', 'Knowledge of quality control processes', '6000.00', 'Health insurance, retirement plan', 'Jubail, Saudi Arabia', 35, '2024-09-15', '2024-07-04', 1, 0),
(15, 6, NULL, 'Supply Chain Manager', 'We are hiring a Supply Chain Manager for our operations in Jubail. This role involves optimizing supply chain processes and managing logistics.', 'Full-time', 'Experience in supply chain management', 'Senior', 'Bachelor\'s Degree', 'Strong analytical and negotiation skills', '10000.00', 'Company car, performance-based bonus', 'Jubail, Saudi Arabia', 40, '2024-09-20', '2024-07-25', 1, 1),
(16, 3, 1, 'Accountant (Based in Saudi Arabia)', '<p><strong>This incumbent will be required to set up finance operation for a newly incorporated company in Saudi Arabia and responsible for day-to-day finance operation and full set of accounts in Saudi Arabia. He/She needs to follow up closely with operations on any outstanding items. Monthly, the incumbent will need to prepare management reports, explaining variances from budget. At year end, the incumbent needs to work closely with the MRO Head on budgeting. He/She will also need to work closely with Singapore Finance Team.</strong></p>', 'Full-time', '<ul>\r\n	<li><strong>Process AP invoices and payment</strong></li>\r\n	<li><strong>Monitor cash balances in bank and ensure sufficient fund for operation.</strong></li>\r\n	<li><strong>Handle AR invoicing and collection</strong></li>\r\n	<li><strong>Handle day-to-day of finance operation and full set of accounts.</strong></li>\r\n	<li><strong>Prepare account schedules</strong></li>\r\n	<li><strong>Prepare for VAT report and submission</strong></li>\r\n	<li><strong>Liaise with internal &amp; external parties (e.g. Group Finance, Bankers, Auditors &amp; etc)</strong></li>\r\n	<li><strong>Prepare costing report and liaise with operations to ensure project profitability</strong></li>\r\n	<li><strong>Complete monthly analysis and reporting for management and Group</strong></li>\r\n	<li><strong>Responsible for annual budget process and monthly forecast process</strong></li>\r\n	<li><strong>Work closely with Saudi Team and Singapore Finance Team to formulate the financial strategies, policies and objectives</strong></li>\r\n	<li><strong>Ad hoc assignment assigned.</strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', 'Senior', 'Bachelor\'s Degree', '<p>Bachelor&#39;s degree in Business Administration, Marketing, or a related field. Minimum of 5 years of experience in sales, preferably in the energy or chemical industry. Proven track record of achieving sales targets and driving revenue growth. Strong leadership and team management skills. Excellent communication, negotiation, and interpersonal skills. Ability to work independently and as part of a team. Proficiency in Microsoft Office and CRM software. Fluency in English; knowledge of Arabic is a plus</p>', '4300.00', NULL, 'jubail', 8, '2024-07-28', '2024-07-06', 1, 0),
(17, 2, 1, 'Electrical Engineer', 'We are hiring a Customer Service Representative for our Jubail office. This role involves handling customer inquiries and providing excellent service.', 'Full-time', 'Experience in customer service or related field', 'Entry', 'High School', 'Excellent communication skills and customer-oriented mindset', '4000.00', 'Training provided, health benefits', 'Jubail, Saudi Arabia', 40, '2024-08-19', '2024-07-05', 1, 0),
(21, 1, 1, 'HR Admin & GR Officer - Saudi National', '<p><strong>The HR Admin &amp; GRO will be responsible for supporting the Sr. HRBP with day to day activities of the HR department Time keeping, administration and Supervise and carry out government relations activities. Including representing the Company with government ministries, departments and agencies processing concession and commercial matters, securing special licenses to import labor for projects, visas, work and permits. Handles specialized correspondence with such organizations.</strong></p>', 'Full-time', '<ul>\r\n	<li><strong>&nbsp;Minimum of 2 years&rsquo; experience in a similar role.</strong></li>\r\n	<li><strong>High school degree.</strong></li>\r\n</ul>', 'Mid', 'High School', '<p><strong>Analytical Thinking:&nbsp;</strong>Prioritizes, Identifies Steps, Undertakes Analysis, Undertakes Complex Analysis.</p>\r\n\r\n<p><strong>Conceptual Thinking:&nbsp;</strong>Uses Common Sense, Sees Patterns, Clarifies Complexity, Innovates.</p>\r\n\r\n<p><strong>Achievement Drive</strong>: Wants to do the job well, Creates and applies own standards of excellence, Sets and works to meet challenging goals, calculates risks and returns.</p>\r\n\r\n<p><strong>Adaptiveness:&nbsp;</strong>Listens to New Ideas, Is Open Minded, Adopts Tactics, Shifts Strategy.</p>\r\n\r\n<p><strong>Commerciality:&nbsp;</strong>Investigates &amp; Follows Up, Takes Personal Responsibility, Is Fully Dedicated, Addresses Market Needs.</p>\r\n\r\n<p><strong>Commitment:&nbsp;</strong>Is Punctual, Is Loyal, Supports the Organization, Makes Sacrifices.</p>\r\n\r\n<p><strong>Honesty &amp; Trustworthiness</strong>: Acts on Promises, Is Consistent, Adheres to Values, Adheres to Values in Challenging Situations.</p>\r\n\r\n<p><strong>Initiative:&nbsp;</strong>Takes Action, Is Decisive in a Crisis, Acts Up to a Year Ahead, Acts Over a Year Ahead.</p>\r\n\r\n<p><strong>Self Control</strong>: Restraints Emotional Impulses, Responds Calmly, Manages Stress Effectively, Helps Others Manage Stress.</p>\r\n\r\n<p><strong>Communication</strong>: Expresses Self Clearly, Engages Others, Presents Effectively, Is Effective in Give and Take.</p>', '6000.00', NULL, 'jubail', 8, '2024-08-20', '2024-07-18', 0, 0),
(22, 2, 1, 'IT Client Support Specialist', '<p><strong>The job posting is for an IT Client Support Specialist at NOV, focused on providing end-user PC support for clients in the Saudi Region. The ideal candidate should be energetic, self-motivated, and capable of performing restorative and maintenance actions both remotely and on-site. Strong troubleshooting, technical, and communication skills are essential. The role involves responding to complex hardware/software issues, maintaining accurate information in the ticketing system, and collaborating with other IT specialists to resolve problems and provide timely solutions to customers. Multi-tasking and adherence to policies and standards are also important aspects of the role.</strong></p>', 'Full-time', '<ul>\r\n	<li><strong>Installing and configuring computer hardware, operating systems, software (Applications), networks, multi-function printers and scanners.</strong></li>\r\n	<li><strong>Investigating, diagnosing, and solving Complex computer software and hardware faults.</strong></li>\r\n	<li><strong>Interact with clients on computer equipment, setup functions, and IT processes daily.</strong></li>\r\n	<li><strong>You will have to tackle problems, resolve them, and assign advanced IT issues to appropriate group(s).</strong></li>\r\n	<li><strong>You will follow and contribute to policies, procedures, processes, and guidelines.</strong></li>\r\n	<li><strong>Contribute to and maintain system standards.</strong></li>\r\n	<li><strong>It is necessary to provide detailed documentation of all issues in the company Service Desk system.</strong></li>\r\n	<li><strong>Respond to service desk tickets in a timely manner.</strong></li>\r\n	<li><strong>You are responsible for organizing, planning, and prioritizing your multiple job activities.</strong></li>\r\n	<li><strong>You will configure and deploy company computer systems.</strong></li>\r\n	<li><strong>You may have to support multiple locations, some remotely.</strong></li>\r\n	<li><strong>Perform hardware inventories when required.</strong></li>\r\n</ul>', 'Senior', 'High School', '<ul>\r\n	<li><strong>You should possess strong communication and interpersonal skills with the ability to build trust and integrity in your relationships with customers and other team members.</strong></li>\r\n	<li><strong>Ability to work independently under stress and meet deadlines, as well as contribute as a team player.</strong></li>\r\n	<li><strong>Be able to maintain confidentiality of sensitive information when needed.</strong></li>\r\n	<li><strong>Ability to effectively communicate to all levels and stakeholders - internally and externally on complex technical issues</strong></li>\r\n	<li><strong>Understanding and working knowledge of Two-Factor Authentication, MDM Solutions.</strong></li>\r\n	<li><strong>Understanding and working knowledge on networks &amp; server environment.</strong></li>\r\n	<li><strong>You can show a demonstrable understanding of network configuration and problem-solving networking issues.</strong></li>\r\n	<li><strong>You are knowledgeable on the use of cloud storage and utilization.</strong></li>\r\n	<li><strong>You are self-directed and results oriented with the ability to work expertly and with little supervision.</strong></li>\r\n	<li><strong>Possess a valid local driving license.</strong></li>\r\n	<li><strong>Strong articulation and listening when supporting clients and communicating with others.</strong></li>\r\n	<li><strong>Customer-oriented and cool-tempered</strong></li>\r\n	<li><strong>Flexibility in thinking and operating style.</strong></li>\r\n	<li><strong>Open-mindedness and respect for team members.</strong></li>\r\n</ul>', '4000.00', NULL, 'jubail', 8, '2024-09-05', '2024-07-18', 1, 0),
(23, 5, 1, 'Document Control Supervisor', '<p><strong>We are seeking a skilled Document Control Supervisor to manage and oversee document control systems for our fiber pipeline project in Jubail, Saudi Arabia. This role is crucial for maintaining the integrity and accessibility of project documentation in line with contractual and regulatory requirements.</strong></p>\r\n\r\n<p><strong>Responsibilities:</strong></p>\r\n\r\n<ul>\r\n	<li>Implement and maintain document control processes and systems to ensure accurate records and accessibility of documents throughout the project lifecycle.</li>\r\n	<li>Supervise the receipt, tracking, and distribution of all project documents.</li>\r\n	<li>Ensure all documentation complies with project requirements and industry standards.</li>\r\n	<li>Train and lead a team of document control professionals in the effective management of project documentation.</li>\r\n	<li>Collaborate with project teams to ensure timely submission and approval of all project deliverables.</li>\r\n	<li>Utilize document control software such as Info-Works, E-DOX, and Primavera to manage documents efficiently.</li>\r\n</ul>', 'Contract', '<ul>\r\n	<li>Relevant bachelor&#39;s degree from a recognized university.</li>\r\n	<li>At least five (5) years of experience in document control, specifically related to construction and engineering projects.</li>\r\n	<li>Proficiency in document control software systems including Info-Works, E-DOX, and Primavera.</li>\r\n	<li>Fluent in written and spoken English.</li>\r\n	<li>Previous experience in a civil engineering environment with a general knowledge of project engineering and construction processes.</li>\r\n</ul>', 'Senior', 'Bachelor\'s Degree', '<ul>\r\n	<li>Strong organizational and supervisory skills.</li>\r\n	<li>Excellent communication and interpersonal skills.</li>\r\n	<li>Ability to work under pressure and manage multiple tasks simultaneously.</li>\r\n	<li>Detail-oriented with a strong focus on accuracy and efficiency.</li>\r\n</ul>\r\n\r\n<p>&amp;nbsp;</p>', NULL, NULL, 'jubail', 7, '2024-09-06', '2024-07-18', 1, 0),
(24, 1, NULL, 'شسيب', '<p>Sit nihil ea tempori.</p>', 'Part-time', '<p>Sit nihil ea tempori.</p>', 'Mid', 'Associate\'s Degree', ' ', '37.00', '<p>Porro dolorum quisqu.</p>', 'تانا', 43, '2024-07-25', '2024-07-24', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_advertisement_categories`
--

CREATE TABLE `job_advertisement_categories` (
  `job_ad_cate_id` int NOT NULL,
  `job_id` int DEFAULT NULL,
  `job_category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_advertisement_categories`
--

INSERT INTO `job_advertisement_categories` (`job_ad_cate_id`, `job_id`, `job_category_id`) VALUES
(1, 1, 5),
(2, 2, 4),
(3, 3, 9),
(4, 4, 9),
(5, 5, 3),
(6, 6, 13),
(7, 7, 5),
(8, 8, 9),
(9, 9, 4),
(10, 10, 9),
(11, 11, 3),
(12, 12, 9),
(13, 13, 13),
(14, 14, 13),
(15, 15, 14),
(17, 17, 9),
(18, 21, 4),
(19, 22, 1),
(20, 16, 13),
(21, 23, 13),
(22, 23, 14),
(23, 24, 2),
(24, 24, 11),
(25, 24, 12);

-- --------------------------------------------------------

--
-- Table structure for table `job_alerts`
--

CREATE TABLE `job_alerts` (
  `job_alert_id` int NOT NULL,
  `job_seeker_id` int DEFAULT NULL,
  `job_id` int DEFAULT NULL,
  `notification_date` date DEFAULT NULL,
  `notification_time` time DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_alerts`
--

INSERT INTO `job_alerts` (`job_alert_id`, `job_seeker_id`, `job_id`, `notification_date`, `notification_time`, `is_read`) VALUES
(4, 4, 14, '2024-07-12', '20:52:24', 1),
(5, 3, 21, '2024-07-18', '08:21:13', 0),
(6, 4, 21, '2024-07-18', '08:21:13', 0),
(7, 3, 24, '2024-07-24', '10:04:07', 0),
(8, 4, 24, '2024-07-24', '10:04:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `job_category_id` int NOT NULL,
  `job_category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`job_category_id`, `job_category_name`) VALUES
(1, 'Software Development'),
(2, 'Marketing'),
(3, 'Finance'),
(4, 'Human Resources'),
(5, 'Sales'),
(7, 'Project Management'),
(8, 'Design'),
(9, 'Engineering'),
(10, 'Healthcare'),
(11, 'Customer Services'),
(12, 'civil engineering'),
(13, 'others'),
(14, 'Managment');

-- --------------------------------------------------------

--
-- Table structure for table `job_seekers`
--

CREATE TABLE `job_seekers` (
  `job_seeker_id` int NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `experience_level` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cv` text,
  `joined_at` date DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `password_reset_code` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_seekers`
--

INSERT INTO `job_seekers` (`job_seeker_id`, `fullname`, `email`, `password`, `username`, `phone_number`, `experience_level`, `address`, `cv`, `joined_at`, `is_blocked`, `password_reset_code`) VALUES
(1, 'Manar', 'manar@gmail.com', '$2y$12$cuSdTsVq8frCjGrCVLIRvOTtuprm8eq6c68RFOhQHBIGqqGuCcCcO', 'manar', '0578788888', 'senior', 'Jubail', 'uploads/job_seekers/cv-2024-07-10-668eee210a614.pdf', '2024-07-10', 0, NULL),
(2, 'Lubna', 'lubna@gmail.com', '$2y$12$cuSdTsVq8frCjGrCVLIRvOTtuprm8eq6c68RFOhQHBIGqqGuCcCcO', 'lubna', '0566555555', 'entry', 'Jubail', 'uploads/job_seekers/cv-2024-07-10-668eee210a614.pdf', '2024-07-10', 0, NULL),
(3, 'Anan', 'anan@gmail.com', '$2y$12$cuSdTsVq8frCjGrCVLIRvOTtuprm8eq6c68RFOhQHBIGqqGuCcCcO', 'anan', '0590987777', 'senior', 'Jubail', 'uploads/job_seekers/cv-2024-07-10-668eee210a614.pdf', '2024-07-10', 0, NULL),
(4, 'Renad', 'renad@jobseeker.com', '$2y$12$cuSdTsVq8frCjGrCVLIRvOTtuprm8eq6c68RFOhQHBIGqqGuCcCcO', 'renad', '0578887777', 'mid', 'Jubail', 'uploads/job_seekers/cv-2024-07-10-668eee210a614.pdf', '2024-07-10', 0, NULL),
(5, 'Noora', 'noora@jobseeker.com', '$2y$12$cuSdTsVq8frCjGrCVLIRvOTtuprm8eq6c68RFOhQHBIGqqGuCcCcO', 'noora', '0578887777', 'mid', 'Jubail', 'uploads/job_seekers/cv-2024-07-10-668eee210a614.pdf', '2024-07-10', 0, NULL),
(6, 'Sara', 'sara@gmail.com', '$2y$12$cuSdTsVq8frCjGrCVLIRvOTtuprm8eq6c68RFOhQHBIGqqGuCcCcO', 'sara', '0578887777', 'mid', 'Jubail', 'uploads/job_seekers/cv-2024-07-10-668eee210a614.pdf', '2024-07-10', 0, NULL),
(7, 'Taif', 'taif@gmail.com', '$2y$12$6NKzCyXXEyLzpzQD8PfUiOhje9ebSrhIu5xx7RFOFGQLZXolGy9KO', 'taif', '0578887777', 'mid', 'Jubail', 'uploads/job_seekers/cv-2024-07-10-668eee210a614.pdf', '2024-07-10', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_seekers_job_categories`
--

CREATE TABLE `job_seekers_job_categories` (
  `job_seeker_cate_id` int NOT NULL,
  `job_seeker_id` int DEFAULT NULL,
  `job_category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job_seekers_job_categories`
--

INSERT INTO `job_seekers_job_categories` (`job_seeker_cate_id`, `job_seeker_id`, `job_category_id`) VALUES
(5, 3, 2),
(6, 3, 3),
(7, 3, 4),
(8, 3, 10),
(9, 3, 11),
(10, 4, 4),
(11, 4, 2),
(12, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `type` enum('Monthly','Quarterly','Yearly') DEFAULT NULL,
  `period` int DEFAULT NULL,
  `price` double NOT NULL,
  `description` text,
  `is_available` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `admin_id`, `type`, `period`, `price`, `description`, `is_available`) VALUES
(1, 1, 'Monthly', 1, 200, '<ul>\n	<li>\n	<p>1- Unlimited Job Advertisements</p>\n	</li>\n	<li>\n	<p>2 - Priority Support</p>\n	</li>\n	<li>\n	<p>3 - Access to Premium Features</p>\n	</li>\n</ul>', 1),
(3, 1, 'Quarterly', 3, 400, '<ul>\n	<li>\n	<p>1- Unlimited Job Advertisements</p>\n	</li>\n	<li>\n	<p>2 - Priority Support</p>\n	</li>\n	<li>\n	<p>3 - Access to Premium Features</p>\n	</li>\n</ul>', 1),
(4, 1, 'Yearly', 1, 900, '<ul>\n	<li>\n	<p>1- Unlimited Job Advertisements</p>\n	</li>\n	<li>\n	<p>2 - Priority Support</p>\n	</li>\n	<li>\n	<p>3 - Access to Premium Features</p>\n	</li>\n</ul>', 1),
(5, 1, 'Yearly', 34, 44, '<p>4sdf</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int NOT NULL,
  `sub_id` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `ref_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `sub_id`, `amount`, `date_time`, `status`, `ref_number`) VALUES
(1, 1, '900.00', '2024-07-11 15:05:55', 'completed', 'REF-66901F039CB0C'),
(2, 2, '900.00', '2024-07-20 17:32:34', 'completed', 'REF-669C1EE259339'),
(3, 3, '200.00', '2024-07-24 07:08:19', 'completed', 'REF-66A0D29322823'),
(4, 4, '200.00', '2024-07-24 07:08:40', 'completed', 'REF-66A0D2A82261D'),
(5, 5, '200.00', '2024-07-25 20:00:15', 'completed', 'REF-66A2D8FF55D27'),
(6, 6, '200.00', '2024-07-29 15:50:15', 'completed', 'REF-66A7E467E6F5B');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `company_id` int DEFAULT NULL,
  `job_seeker_id` int DEFAULT NULL,
  `review_text` text,
  `rating` int DEFAULT NULL,
  `review_date_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `admin_id`, `company_id`, `job_seeker_id`, `review_text`, `rating`, `review_date_time`) VALUES
(1, NULL, 4, 2, 'good company', 3, '2024-07-10 09:10:58'),
(2, NULL, 4, 1, 'very very gooood company', 5, '2024-07-10 09:22:45'),
(3, NULL, 4, 7, 'qwerqwer', 4, '2024-07-10 10:21:09'),
(5, NULL, 4, 4, 'شركة ممتازخ وتحترم موظفيها', 3, '2024-07-12 15:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `sub_id` int NOT NULL,
  `company_id` int DEFAULT NULL,
  `package_id` int DEFAULT NULL,
  `date_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`sub_id`, `company_id`, `package_id`, `date_time`) VALUES
(1, 4, 3, '2024-07-11 15:05:55'),
(2, 6, 3, '2024-07-20 17:32:34'),
(3, 1, 1, '2024-07-24 07:08:19'),
(4, 1, 1, '2024-07-24 07:08:40'),
(5, 3, 1, '2024-07-25 20:00:15'),
(6, 1, 1, '2024-07-29 15:50:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `job_seeker_id` (`job_seeker_id`);

--
-- Indexes for table `application_status`
--
ALTER TABLE `application_status`
  ADD PRIMARY KEY (`application_status_id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `job_advertisements`
--
ALTER TABLE `job_advertisements`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `job_advertisement_categories`
--
ALTER TABLE `job_advertisement_categories`
  ADD PRIMARY KEY (`job_ad_cate_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `job_category_id` (`job_category_id`);

--
-- Indexes for table `job_alerts`
--
ALTER TABLE `job_alerts`
  ADD PRIMARY KEY (`job_alert_id`),
  ADD KEY `job_seeker_id` (`job_seeker_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`job_category_id`);

--
-- Indexes for table `job_seekers`
--
ALTER TABLE `job_seekers`
  ADD PRIMARY KEY (`job_seeker_id`);

--
-- Indexes for table `job_seekers_job_categories`
--
ALTER TABLE `job_seekers_job_categories`
  ADD PRIMARY KEY (`job_seeker_cate_id`),
  ADD KEY `job_seeker_id` (`job_seeker_id`),
  ADD KEY `job_category_id` (`job_category_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `job_seeker_id` (`job_seeker_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `package_id` (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `application_status`
--
ALTER TABLE `application_status`
  MODIFY `application_status_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_advertisements`
--
ALTER TABLE `job_advertisements`
  MODIFY `job_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `job_advertisement_categories`
--
ALTER TABLE `job_advertisement_categories`
  MODIFY `job_ad_cate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `job_alerts`
--
ALTER TABLE `job_alerts`
  MODIFY `job_alert_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `job_category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `job_seekers`
--
ALTER TABLE `job_seekers`
  MODIFY `job_seeker_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_seekers_job_categories`
--
ALTER TABLE `job_seekers_job_categories`
  MODIFY `job_seeker_cate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `sub_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job_advertisements` (`job_id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seekers` (`job_seeker_id`);

--
-- Constraints for table `application_status`
--
ALTER TABLE `application_status`
  ADD CONSTRAINT `application_status_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`application_id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);

--
-- Constraints for table `job_advertisements`
--
ALTER TABLE `job_advertisements`
  ADD CONSTRAINT `job_advertisements_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `job_advertisements_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);

--
-- Constraints for table `job_advertisement_categories`
--
ALTER TABLE `job_advertisement_categories`
  ADD CONSTRAINT `job_advertisement_categories_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job_advertisements` (`job_id`),
  ADD CONSTRAINT `job_advertisement_categories_ibfk_2` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`job_category_id`);

--
-- Constraints for table `job_alerts`
--
ALTER TABLE `job_alerts`
  ADD CONSTRAINT `job_alerts_ibfk_1` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seekers` (`job_seeker_id`),
  ADD CONSTRAINT `job_alerts_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job_advertisements` (`job_id`);

--
-- Constraints for table `job_seekers_job_categories`
--
ALTER TABLE `job_seekers_job_categories`
  ADD CONSTRAINT `job_seekers_job_categories_ibfk_1` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seekers` (`job_seeker_id`),
  ADD CONSTRAINT `job_seekers_job_categories_ibfk_2` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`job_category_id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subscriptions` (`sub_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`job_seeker_id`) REFERENCES `job_seekers` (`job_seeker_id`);

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
