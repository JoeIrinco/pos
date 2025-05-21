-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 12:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `atcs`
--

CREATE TABLE `atcs` (
  `id` int(11) NOT NULL,
  `tax_type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tax_rate` int(255) DEFAULT NULL,
  `atc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atcs`
--

INSERT INTO `atcs` (`id`, `tax_type`, `description`, `tax_rate`, `atc`, `created_at`, `updated_at`) VALUES
(2, '', '? ? - if the gross income for the current year did not exceed P3M', 5, 'WI010', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '', '? ? - if gross income is more than 3M or VAT registered regardlessof amount', 10, 'WI011', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '', '? ? - if gross income for the current year did not exceed P720,000', 10, 'WC010', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '', '? ? - if gross income exceeds P720,000', 15, 'WC011', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '', '? ? - if the gross income for the current year did not exceed P3M', 5, 'WI020', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '', '? ? - if gross income is more than 3M or VAT registered regardless of amount', 10, 'WI021', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '', '? ? - if gross income for the current year did not exceed P720,000', 10, 'WC020', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '', '? ? - if gross income exceeds P720,000', 15, 'WC021', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '', '? ? - if the gross income for the current year did not exceed P3M', 5, 'WI030', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '', '? ? - if gross income is more than 3M or VAT registered regardless of amount', 10, 'WI031', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '', '? ? - if gross income for the current year did not exceed P720,000', 10, 'WC030', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '', '? ? - if gross income exceeds P720,000', 15, 'WC031', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '', '? ? - if the gross income for the current year did not exceed P3M', 5, 'WI040', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '', '? ? - if gross income is more than 3M or VAT registered regardless of amount', 10, 'WI041', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '', '? ? - if gross income for the current year did not exceed P720,000', 10, 'WC040', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '', '? ? - if gross income exceeds P720,000', 15, 'WC041', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '', '? ??- if the gross income for the current year did not exceed P3M', 5, 'WI050?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '', '? ??- if gross income is more than 3M or VAT registered regardless of amount', 10, 'WI051?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '', '? ??- if gross income for the current year did not exceed P720,000', 10, 'WC050', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '', '? ??- if gross income exceeds P720,000', 15, 'WC051', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '', '? ???- if the gross income for the current year did not exceed P3M', 5, 'WI060', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '', '? ??- if gross income is more than 3M or VAT registered regardless of amount', 10, 'WI061', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '', '? ???- if gross income for the current year did not exceed P720,000', 10, 'WC060', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '', '? ??- if gross income exceeds P720,000', 15, 'WC061', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '', '? ? ?- if the gross income for the current year did not exceed P3M', 5, 'WI070', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '', '? ??- if gross income is more than 3M or VAT registered regardless of amount', 10, 'WI071', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '', '? ??- if gross income for the current year did not exceed P720,000', 10, 'WC070', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '', '? ??- if gross income exceeds P720,000', 15, 'WC071', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '', '? ??- if the gross income for the current year did not exceed P3M', 5, 'WI080', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '', '? ??- if gross income is more than 3M or VAT registered regardless of amount', 10, 'WI081', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '', '? ??- if gross income for the current year did not exceed P720,000', 10, 'WC080', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '', '? ??- if gross income exceeds P720,000', 15, 'WC081', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '', '? ??- if the gross income for the current year did not exceed P3M', 5, 'WI090', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '', '? ??- if gross income is more than 3M or VAT registered regardless of amount', 10, 'WI091', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'WE', 'Rentals Oon gross rental or lease for the continued use or possession of personal property in excess of P10,000 annually and real property used in business which the payor or obligor has not taken title or is not taking title, or in which has no equity; p', 5, 'WI100 / WC100', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'WE', 'Cinemathographic film rentals and other payments to resident indivduals and corporate cinematographic film owners, lessors and distributors', 5, 'WI110 / WC110', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'WE', 'Income payments to certain contractors', 2, 'WI120 / WC120', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'WE', 'Income distribution to the beneficiaries of estate and trusts', 15, 'WI130', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '', '? ? ?- if the gross income for the current year did not exceed P3M', 5, 'WI139', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '', '? ? ?- if gross income is more than 3M or VAT registered regardless of amount', 10, 'WI140', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, '', '? ?- if gross income for the current year did not exceed P720,000', 10, 'WC139', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, '', '? ?- if gross income exceeds P720,000', 15, 'WC140', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '', '? ?- if the gross income for the current year did not exceed P3M', 5, 'WI151', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '', '? ?- if gross income is more than 3M or VAT registered regardless of amount', 10, 'WI150', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, '', '? ?- if gross income for the current year did not exceed P720,000', 10, 'WC151', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '', '??- if gross income exceeds P720,000', 15, 'WC150', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, '', '? ?- if gross income for the current year did not exceed P720,000', 10, 'WI152', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, '', '??- if gross income exceeds P720,000', 15, 'WI153', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'WE', 'Income payments made by credit card companies', 1, 'WI158 / WC158', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'WE', 'Additional Income Payments to govt personnel from importers, shipping and airline companies or their agents for overtime services', 15, 'WI159', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'WE', 'Income Payment made by NGAs, LGU, & etc to its local/resident suppliers of goods other than those covered by other rates of withholding tax', 1, 'WI640?/ WC640', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'WE', 'Income Payment made by NGAs, LGU, & etc to its local/resident suppliers of services other than those covered by other rates of withholding tax', 2, 'WI157?/ WC157', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'WE', 'Income Payment made by top withholding agents to their local/resident suppliers of goods other than those covered by other rates of withholding tax', 1, 'WI158 / WC158', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'WE', 'Income Payment made by top withholding agents to their local/resident suppliers of services other than those covered by other rates of withholding tax', 2, 'WI160 / WC160', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, '', '? ? ?- if the gross income for the current year did not exceed P3M', 5, 'WI515 / WC515', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, '', '? ? -? if the gross income is more than P3M or VAT registered regardless of amount', 10, 'WI516 / WC516', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'WE', 'Gross payments to embalmers by funeral parlors', 1, 'WI530', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'WE', 'Payments made by pre-need companies to funeral parlors', 1, 'WI535 / WC535', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'WE', 'Tolling fees paid to refineries', 5, 'WI540 / WC540', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'WE', 'Income payments made to suppliers of agricultural supplier products in excess of cumulative amount of P300,000 within the same taxable year', 1, 'WI610 / WC610', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'WE', 'Income payments on purchases of minerals, mineral products and quarry resources, such as but not limited to silver, gold, granite, gravel, sand, boulders and other mineral products except purchases by Bangko Sentral ng Pilipinas', 5, 'WI630 / WC630', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'WE', 'Income payments on purchases of minerals, mineral products and quarry resources by Bangko Sentral ng Pilipinas ((BSP) from gold miners/suppliers under PD 1899, as amended by RA No. 7076', 1, 'WI632 / WC632', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'WE', 'On gross amount of refund given by MERALCO to customers with active contracts as classified by MERALCO', 15, 'WI650 / WC650', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'WE', 'On gross amount of refund given by MERALCO to customers with terminated contracts as classified by MERALCO', 15, 'WI651 / WC651', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'WE', 'On gross amount of interest on the refund of meter deposits whether paid directly to the customers or applied against customer\'s billings of Residential and General Service customers whose monthly electricity consumption exceeds 200 kwh as classified by M', 10, 'WI660 / WC660', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'WE', 'On gross amount of interest on the refund of meter deposits whether paid directly to the customers or applied against customer\'s billings of Non-Residential customers whose monthly electricity consumption exceeds 200 kwh as classified by MERALCO', 10, 'WI661 / WC661', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'WE', 'On gross amount of interest on the refund of meter deposits whether paid directly to the customers or applied against customer\'s billings of Residential and General Service customers whose monthly electricity consumption exceeds 200 kwh as classified by o', 10, 'WI662 / WC662', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'WE', 'On gross amount of interest on the refund of meter deposits whether paid directly to the customers or applied against customer\'s billings of Non-Residential customers whose monthly electricity consumption exceeds 200 kwh as classified by other electric Di', 10, 'WI663 / WC663', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'WE', 'Income payments made by political parties and candidates of local and national elections on all their purchases of goods and services relkated to campaign expenditures, and income payments made by individuals or juridical persons for their purchases of go', 5, 'WI680 / WC680', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'WE', 'Income payments received by Real Estate Investment Trust (REIT)', 1, 'WC690', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'WE', 'Interest income denied from any other debt instruments not within the coverage of deposit substitutes and Revenue Regulations 14-2012', 15, 'WI710 / WC710', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'WE', 'Income payments on locally produced raw sugar', 1, 'WI720 / WC720', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'WF', 'Interest on Foreign loans payable to Non-Resident Foreign Corporation (NRFCs)', 20, '?WC180', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'WF', 'Interest and other income payments on foreign currency transactions/loans payable of Offshore Banking Units (OBUs)', 10, '?WC190?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'WF', 'Interest and other income payments on foreign currency transactions/loans payable of Foreign Currency Deposits Units (FCDUs)', 10, '?WC191', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'WF', 'Cash dividend payment by domestic corporation to citizens ans residents aliens/NRFCs', 10, 'W1202?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, '', '', 30, 'WC212', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'WF', 'Property dividend payment by domestic corporation to citizens and resident aliens/NRFCs', 10, 'WI203', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, '', '', 30, 'WC213', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'WF', 'Cash dividend payment by domestic corporation to NFRCs whose countries allowed tax deemed paid credit (subject to tax sparing rule)', 15, '?WC222', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, '', 'Property dividend payment by domestic corporation to NFRCs whose countries allowed tax deemed paid credit (subject to tax sparing rule)', 15, 'WC223', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'WF', 'Cash dividend payment by domestic corporation to non-resident alien engaged in Trade or Business within the Philippines (NRAETB)?', 20, 'WI224', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'WF', 'Property dividend payment by domestic corporation to NRAETB', 20, 'WI225?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'WF', 'Share of NRAETB in the distributable net income after tax of a partnership (except GPPs) of which he is a partner, or share in the net income after tax of an association, joint account or a joint venture taxable as a corporation of which he is a member or', 20, 'WI226', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'WF', 'On other payments to NRFCs? ??', 30, 'WC230?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'WF', 'Distributive share of individual partners in a taxable partnership, association, joint account or joint venture or consortium', 10, 'WI240?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'WF', 'All kinds of royalty payments to citizens, resident aliens and NRAETB (other than WI380 and WI341), domestic and resident foreign corporations? ?', 20, 'WI250 / ?WC250', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'WF', 'On prizes exceeding P10,000 and other winnings paid to individuals? ?', 20, 'WI260?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'WF', 'Branch profit remittance by all corporations except PEZA/SBMA/CDA registered', 15, 'WC280?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'WF', 'On the gross rentals, lease and charter fees derived by non-resident owner or lessor of foreign vessels? ??', 5, 'WC290?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'WF', 'On gross rentals, charter and other fees derived by non-resident lessor or aircraft, machineries and equipment', 8, 'WC300?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'WF', 'On payments to oil exploration service contractors/sub-contractors', 8, 'WI310?/ WC310', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'WF', 'Payments to non-resident alien not engage in trade or business within the Philippines (NRANETB) except on sale of shares in domestic corporation and real property', 25, 'WI330', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'WF', 'On payments to non-residnet individual/foreign corporate cinematographic film owners, lessors or distributors', 25, 'WI340 / WC340', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'WF', 'Royalties paid to NRAETB on cinematographic films and similar works', 25, 'WI341?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'WF', 'Final tax on interest or other payments upon tax-free covenant bonds, mortgages, deeds of trust or other obligations under Sec. 57C of the NIRC of 1997, as amended? ?', 30, 'WI350', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'WF', 'Royalties paid to citizens, resident aliens and nraetb on books, other literary works and musical compositions', 10, 'WI380', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'WF', 'Informers cash reward to individuals/juridical persons', 10, 'WI410?/ WC410', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'WF', 'Cash on property dividend paid by a Real Estate Investment Trust??', 10, 'WI700 / WC700', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'WV', 'VAT withholding on Purchase of Goods', 5, 'WV010', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'WV', 'VAT Withholding on Purchase of Services', 5, 'WV020', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'WV', 'VAT Withholding from non-residents (Government Withholding Agents)', 12, 'WV040', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'WV', 'VAT Withholding from non-residents (Private Withholding Agents)', 12, 'WV050', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'WV', 'VAT Withholding on Purchases of Goods (with waiver of privilege to claim tax credit) creditable', 12, 'WV012', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'WV', 'VAT Withholding on Purchases of Goods (with waiver of privilege to claim input tax credit) final', 12, 'WV014', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'WV', 'VAT Withholding on Purchases of Services (with waiver of privilege to claim input tax credit) creditable', 12, 'WV022', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'WV', 'VAT Withholding on Purchases of Services (with waiver of privilege to claim input tax credit) final', 12, 'WV024', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'WB', 'Tax on Carriers and Keepers of Garages', 3, 'WB030', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'WB?', 'Franchise Tax on Gas and Utilities', 2, 'WB040', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'WB?', 'Franchise tax on radio & TV broadcasting companies whose annual gross receipts do not exceed P10M & who are not-VAT registered taxpayer', 3, 'WB050', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'WB?', 'Tax on Life insurance premiums', 2, 'WB070', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'WB?', 'Tax on Overseas Dispatch, Message or Conversation from the Philippines', 10, 'WB090', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'WB?', 'Business tax on Agents of Foreign Insurance companies - Insurance Agents?', 4, 'WB120?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'WB?', 'Business tax on Agents of Foreign Insurance companies - owner of the property', 5, 'WB121', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'WB?', 'Tax on international carriers', 3, 'WB130', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'WB?', 'Tax on Cockpits', 18, 'WB140', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'WB?', 'Tax on amusement places, such as cabarets, night and day clubs, videoke bars, karaoke bars, karaoke televion, karaoke boxes, music lounges and other similar establishments', 18, 'WB150?', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'WB', 'Taxes on Boxing exhibitions', 10, 'WB160', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'WB', 'Taxes on professional basketball games', 15, 'WB170', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'WB', 'Tax on jai-alai and race tracks', 30, 'WB180', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'WB', 'Tax on sale barter or exchange of stocks listed and traded through Local Stock Exchange', 6, 'WB200', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'WB', 'Tax on shares of stocks sold or exchanged through initial and secondary public offering ? ? ? - Not over 25% ? ? ? - Over 25% but not exceeding 33 1/3% ? ? ? - Over 33 1/3%', 4, 'WB201 / WB202 / WB203', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, '', '? ? ? A. On interest, commissions and discounts from lending activities as well as income from financial leasing on the basis of the remaining maturities of instruments from which receipts are derived ? ? ? ? ?- Maturity period is five years or less ? ? ?', 5, '? WB301/ WB302', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, '', '? ? ? B. On dividends and equity shares and net income of subsidiaries', 0, 'WB102', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, '', '? ? ? C. On royalties, rentals of property, real or personal, profits from exchange and all other items treated as gross income under the Code', 7, 'WB103', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, '', '? ? ? D. On net trading gains within the taxable year on foreign currency, debt securities, derivatives and other similar financial instruments', 7, 'WB104', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, '', '? ? ? A. On interest, commissions and discounts from lending activities as well as income from financial leasing on the basis of the remaining maturities of instruments from which such receipts are derived ? ? ? ? ? - Maturity period is five years or less', 5, 'WB108 / WB109', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, '', '? ? ? B. On all? other items treated as gross income under the Code', 5, 'WB110', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, '', 'Persons exempt from VAT under Sec. 108BB (creditable) Government Withholding Agent', 3, 'WB080', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, '', 'Persons exempt from VAT under Sec. 108BB (creditable) Private Withholding Agent', 3, 'WB082', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, '', 'Persons exempt from VAT under Section 109BB (Section 116 applies)', 3, 'WB084', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, '', '', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `user_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 'Main22', 1, '2021-08-19 15:30:44', '2021-08-21 15:50:55'),
(2, 11, 'joe branch2', 0, '2021-08-23 11:48:28', '2021-08-23 11:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_lists`
--

CREATE TABLE `employee_lists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_lists`
--

INSERT INTO `employee_lists` (`id`, `name`, `department`) VALUES
(1, 'mama P.', 'HR'),
(2, 'mama J.', 'accounting');

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
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `created_at`, `updated_at`) VALUES
(1, 'LOCATION 12', '2021-10-14 05:36:10', '2021-10-14 06:24:29'),
(6, 'LOCATION 1', '2021-10-17 03:43:30', '2021-10-17 03:43:30'),
(328, 'WAREHOUSE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(329, 'STORE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(330, 'VIP', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(331, 'STORE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(332, 'STORE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(333, 'STORE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(334, 'STORE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(335, 'STORE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(336, 'STORE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(337, 'STORE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(338, 'STORE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(339, 'STORE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(340, 'STORE', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(341, 'VIP', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(342, 'STORE', '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(343, 'STORE', '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(344, 'STORE', '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(345, 'STORE', '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(346, 'VIP', '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(347, 'WAREHOUSE', '2021-11-02 14:48:19', '2021-11-02 14:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `lots`
--

CREATE TABLE `lots` (
  `id` int(11) NOT NULL,
  `lot_no` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lots`
--

INSERT INTO `lots` (`id`, `lot_no`, `created_at`, `updated_at`) VALUES
(1, 'LOT 2', '2021-10-17 03:29:58', '2021-10-17 22:34:17'),
(6, 'LOT 1', '2021-10-17 03:43:30', '2021-10-17 03:43:30'),
(7, 'LOT 5', '2021-10-20 03:18:09', '2021-10-20 03:18:21'),
(98, 'JSP12056', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(99, 'JSP156450', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(100, '67843', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(101, '185236', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(102, '56400', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(103, 'HS283', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(104, '1A4590', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(105, '171950', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(106, '1CO745', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(107, '156230', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(108, 'HKJ345', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(109, 'A15623', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(110, 'LK01256', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(111, '1HSDJ4', '2021-11-02 14:43:09', '2021-11-02 14:43:09');

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
(4, '2020_11_09_145303_create_job_orders_table', 2),
(6, '2020_11_28_151845_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mcrf.1325@gmail.com', '$2y$10$s/oc4UzWHVoINZ4b3RgNCu7J5ERcsmGQC2smCmsBfBrXzpGC2ztUC', '2021-02-08 03:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price_before` decimal(10,2) NOT NULL,
  `price_update` decimal(10,2) NOT NULL,
  `selling_price_before` decimal(10,2) NOT NULL,
  `selling_price_update` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `product_id`, `price_before`, `price_update`, `selling_price_before`, `selling_price_update`, `created_at`, `updated_at`) VALUES
(1, 92, '5805.00', '5803.00', '8125.00', '8123.00', '2021-12-01 12:07:07', '2021-12-01 12:07:07'),
(2, 92, '5803.00', '5000.00', '8123.00', '9000.00', '2021-12-08 13:31:14', '2021-12-08 13:31:14'),
(3, 93, '5800.00', '5800.00', '8120.00', '9000.00', '2021-12-08 13:31:29', '2021-12-08 13:31:29'),
(4, 93, '5800.00', '5000.00', '9000.00', '9000.00', '2021-12-08 13:31:39', '2021-12-08 13:31:39'),
(5, 1, '1960.00', '150.00', '120.00', '120.00', '2021-12-12 11:35:21', '2021-12-12 11:35:21'),
(6, 1, '150.00', '150.00', '120.00', '121.00', '2021-12-12 11:35:43', '2021-12-12 11:35:43'),
(7, 1, '150.00', '291.51', '121.00', '408.11', '2021-12-12 12:30:13', '2021-12-12 12:30:13'),
(8, 1, '291.51', '293.90', '121.00', '411.46', '2021-12-12 12:33:43', '2021-12-12 12:33:43'),
(9, 1, '293.90', '295.71', '411.46', '414.00', '2021-12-23 11:48:13', '2021-12-23 11:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` int(11) NOT NULL,
  `accountname` text NOT NULL,
  `address` text NOT NULL,
  `contactperson` text NOT NULL,
  `contactnumber` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `accountname`, `address`, `contactperson`, `contactnumber`) VALUES
(24, 'qweqwe', 'qweqwe', 'qweqwe', 123123),
(25, 'qweqwe', 'qweqwe', 'qweqwe', 123123),
(26, 'qweqwe', 'qweqwe', 'qweqwe', 123123),
(27, 'qweqwe', 'qweqwe', 'qweqwe', 123123),
(28, 'qweqwe', 'wqeqwe', 'qweqwe', 123123),
(29, 'qweqwe', 'qweqwe', 'qweqwe', 123123),
(30, 'qweqwe', 'qweqwe', 'qweqwe', 123123),
(31, 'qweqwe', 'qweqwe', 'qweqwe', 123123),
(32, 'qweqwe', 'qweqwe', 'qweqwe', 123123),
(33, 'qweqwe', 'qweqwe', 'qweqwe', 123123),
(34, 'qweqwe', 'qweqwe', 'qweqwe', 123123),
(35, 'qweqwe', 'qweqwe', 'qweqwe', 123123),
(36, 'qwe', '12312', '3123', 123123),
(37, 'qweqweqw', 'e1wqeqwe', 'wqeqweqweq', 123123),
(38, 'qweqweqw', 'e1wqeqwe', 'wqeqweqweq', 123123),
(39, 'qweqw', 'talavera', 'qwqwe', 1212312),
(40, 'wqeqweq', 'qweqwe', 'qweqwe', 1321312),
(41, 'wqeqweq', 'qweqwe', 'qweqwe', 1321312),
(42, 'qweqwe', 'qweqweqw', 'eqweqwe', 12312312),
(43, 'qweqwe', 'qweqweqw', 'eqweqwe', 12312312),
(44, 'qweqwe', 'qweqweqw', 'eqweqwe', 12312312),
(45, 'qweqwe', 'qweqweqw', 'eqweqwe', 12312312),
(46, 'qweqwe', 'qweqw', 'ewqe', 123123),
(47, 'qweqwe', 'qweqw', 'eqweqwe', 1231),
(48, 'qweqwe', 'qweqw', 'eqweqwe', 1231),
(49, '123123', '21312', '312312', 3213123),
(50, 'qweqwe', 'qweqw', 'eqweq', 3212312),
(51, 'qweqw', 'eqwe', 'qweq', 1231231),
(52, 'wqeqw', 'eqweq', 'wqweqw', 123123),
(53, 'wqeqw', 'eqweq', 'wqweqw', 123123),
(54, 'qweqw', 'qweqwe', 'qweqw', 123123),
(55, '123123', '21312', '123123', 123123);

-- --------------------------------------------------------

--
-- Table structure for table `racks`
--

CREATE TABLE `racks` (
  `id` int(11) NOT NULL,
  `rack` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `racks`
--

INSERT INTO `racks` (`id`, `rack`, `created_at`, `updated_at`) VALUES
(5, 'RACK 1', '2021-10-17 03:43:30', '2021-10-17 03:43:30'),
(6, 'RACK 4', '2021-10-20 03:19:39', '2021-10-20 03:19:39'),
(109, '3', '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(110, '2', '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(111, '5', '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(112, '7', '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(113, '6', '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(114, '8', '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(115, '10', '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(116, '1', '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(117, '4', '2021-11-02 14:43:09', '2021-11-02 14:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `report_dates`
--

CREATE TABLE `report_dates` (
  `id` int(50) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_dates`
--

INSERT INTO `report_dates` (`id`, `user`, `date_from`, `date_to`, `created_at`, `updated_at`) VALUES
(4, NULL, '2021-06-02', '2021-06-30', '2021-06-22 07:26:05', '2021-06-22 07:26:05'),
(4, NULL, '2021-06-02', '2021-07-01', '2021-06-22 07:26:09', '2021-06-22 07:26:09'),
(4, NULL, '2021-06-01', NULL, '2021-06-22 07:27:39', '2021-06-22 07:27:39'),
(4, NULL, '2021-06-01', '2021-06-30', '2021-06-22 07:27:43', '2021-06-22 07:27:43'),
(4, NULL, '2021-06-01', '2021-06-30', '2021-06-22 07:28:06', '2021-06-22 07:28:06'),
(4, NULL, '2021-06-01', '2021-06-30', '2021-06-22 07:28:09', '2021-06-22 07:28:09'),
(4, NULL, '2021-06-01', '2021-06-30', '2021-06-22 07:28:37', '2021-06-22 07:28:37'),
(4, NULL, '2021-06-01', '2021-06-30', '2021-06-22 07:28:39', '2021-06-22 07:28:39'),
(4, NULL, '2021-06-01', '2021-06-30', '2021-06-22 07:28:41', '2021-06-22 07:28:41'),
(4, NULL, '2021-06-01', '2021-06-30', '2021-06-22 07:31:34', '2021-06-22 07:31:34'),
(4, NULL, '2021-06-01', '2021-06-30', '2021-06-22 07:31:36', '2021-06-22 07:31:36'),
(4, NULL, NULL, NULL, '2021-06-22 07:32:43', '2021-06-22 07:32:43'),
(4, NULL, NULL, NULL, '2021-06-22 07:32:45', '2021-06-22 07:32:45'),
(4, NULL, '2021-06-22', NULL, '2021-06-22 07:33:17', '2021-06-22 07:33:17'),
(4, NULL, '2021-06-22', '2021-06-22', '2021-06-22 07:33:19', '2021-06-22 07:33:19'),
(4, NULL, '2021-06-19', '2021-06-22', '2021-06-22 07:33:27', '2021-06-22 07:33:27'),
(4, NULL, '2021-06-19', '2021-06-22', '2021-06-22 07:33:31', '2021-06-22 07:33:31'),
(4, NULL, '2021-06-19', '2021-06-22', '2021-06-22 07:33:34', '2021-06-22 07:33:34'),
(4, NULL, '2021-06-19', NULL, '2021-06-22 07:33:50', '2021-06-22 07:33:50'),
(4, NULL, '2021-06-19', '2021-06-19', '2021-06-22 07:33:52', '2021-06-22 07:33:52'),
(4, NULL, '2021-06-19', '2021-06-19', '2021-06-22 07:34:04', '2021-06-22 07:34:04'),
(4, NULL, '2021-06-19', '2021-06-19', '2021-06-22 07:34:06', '2021-06-22 07:34:06'),
(4, NULL, '2021-06-22', NULL, '2021-06-22 11:25:37', '2021-06-22 11:25:37'),
(4, NULL, '2021-06-22', '2021-06-22', '2021-06-22 11:25:39', '2021-06-22 11:25:39'),
(4, NULL, '2021-06-22', '2021-06-22', '2021-06-22 11:41:35', '2021-06-22 11:41:35'),
(4, NULL, '2021-06-22', '2021-06-22', '2021-06-22 11:41:38', '2021-06-22 11:41:38'),
(4, NULL, NULL, NULL, '2021-07-07 18:13:26', '2021-07-07 18:13:26'),
(4, NULL, '2021-07-08', NULL, '2021-07-07 18:19:08', '2021-07-07 18:19:08'),
(4, NULL, '2021-07-08', '2021-07-08', '2021-07-07 18:19:10', '2021-07-07 18:19:10'),
(4, NULL, '2021-07-08', '2021-07-08', '2021-07-07 18:19:54', '2021-07-07 18:19:54'),
(4, NULL, '2021-07-08', '2021-07-08', '2021-07-07 18:19:56', '2021-07-07 18:19:56'),
(4, NULL, '2021-07-08', '2021-07-08', '2021-07-07 18:19:59', '2021-07-07 18:19:59'),
(4, NULL, '2021-07-01', '2021-07-08', '2021-07-07 18:20:05', '2021-07-07 18:20:05'),
(4, NULL, '2021-10-14', NULL, '2021-10-07 13:04:24', '2021-10-07 13:04:24'),
(4, NULL, '2021-10-04', NULL, '2021-10-11 06:36:16', '2021-10-11 06:36:16'),
(4, NULL, '2021-10-04', '2021-10-11', '2021-10-11 06:36:19', '2021-10-11 06:36:19'),
(4, NULL, '2021-10-13', NULL, '2021-10-14 07:57:59', '2021-10-14 07:57:59'),
(4, NULL, '2021-10-13', '2021-10-14', '2021-10-14 07:58:01', '2021-10-14 07:58:01'),
(4, NULL, '2021-10-01', NULL, '2021-10-14 08:31:17', '2021-10-14 08:31:17'),
(4, NULL, '2021-10-01', '2021-10-14', '2021-10-14 08:31:19', '2021-10-14 08:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `shelf_locations`
--

CREATE TABLE `shelf_locations` (
  `id` int(11) NOT NULL,
  `shelf` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shelf_locations`
--

INSERT INTO `shelf_locations` (`id`, `shelf`, `created_at`, `updated_at`) VALUES
(1, 'SHELF1ASDA', '2021-10-17 03:43:30', '2021-10-17 03:43:30'),
(2, 'SHELF 5', '2021-10-20 03:19:39', '2021-10-20 03:19:39'),
(324, 'A', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(325, 'D', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(326, 'C', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(327, 'B', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(328, 'H', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(329, 'K', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(330, 'L', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(331, 'B', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(332, 'G', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(333, 'B', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(334, 'B', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(335, 'F', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(336, 'C', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(337, 'A', '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(338, 'B', '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(339, 'D', '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(340, 'E', '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(341, 'I', '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(342, 'A', '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(343, 'A', '2021-11-02 14:48:19', '2021-11-02 14:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `store_client_infos`
--

CREATE TABLE `store_client_infos` (
  `id` int(255) NOT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `senior_id` varchar(255) DEFAULT NULL,
  `pwd_id` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_client_infos`
--

INSERT INTO `store_client_infos` (`id`, `account_no`, `account_name`, `account_type`, `contact_person`, `address`, `senior_id`, `pwd_id`, `contact_no`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021-10-0001', 'MARK', 'REGULAR', NULL, '123123', NULL, NULL, NULL, NULL, NULL, '2021-10-05 03:53:18', '2021-10-05 03:53:18'),
(2, '2021-0002', '123', 'SENIOR', NULL, '123123', '123123', NULL, '1231', 'mcrf.1325@gmail.com', NULL, '2021-10-05 04:44:44', '2021-10-05 04:44:44'),
(3, '2021-0003', '123', 'PRIVATE', 'Change Oil', '1123123', NULL, NULL, '1232', 'support@vallerymed.com', NULL, '2021-10-11 07:56:04', '2021-10-11 07:56:04'),
(4, '2021-0004', '123', 'PWD', NULL, '1123123', NULL, 'werwr', '1232', 'support@vallerymed.com', NULL, '2021-10-11 08:02:01', '2021-10-11 08:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

CREATE TABLE `store_items` (
  `id` int(50) NOT NULL,
  `id2` int(250) DEFAULT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `orders_id` int(50) DEFAULT NULL,
  `encoder` varchar(250) DEFAULT NULL,
  `encoder_id` int(10) DEFAULT NULL,
  `product_name` varchar(250) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `quantity` int(50) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `original_total` decimal(11,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `custom_total` decimal(12,2) DEFAULT NULL,
  `custom_discount` decimal(12,2) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `item_status` varchar(50) DEFAULT NULL,
  `return_replace` varchar(255) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `capital` float(11,2) DEFAULT NULL,
  `profit` float(11,2) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `lot_no` varchar(255) DEFAULT 'N/A',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `id2`, `product_id`, `user_id`, `orders_id`, `encoder`, `encoder_id`, `product_name`, `unit`, `quantity`, `amount`, `original_total`, `total`, `custom_total`, `custom_discount`, `payment_status`, `status`, `item_status`, `return_replace`, `branch`, `capital`, `profit`, `expiration_date`, `lot_no`, `updated_at`, `created_at`) VALUES
(1, NULL, 1, 4, 1, 'admin 1', NULL, 'ORTHO BRUSH W/O INTRADENTAL', 'PCS.', 1, '1960.00', '1960.00', '1000.00', '1000.00', '960.00', NULL, NULL, 'CUSTOM DISCOUNT', NULL, NULL, NULL, NULL, '2021-10-04', 'LOT - 2021-10-04 #1', '2021-10-14 08:28:26', '2021-10-14 08:28:15'),
(2, NULL, 1, 4, 2, 'admin 1', NULL, 'ORTHO BRUSH W/O INTRADENTAL', 'PCS.', 1, '1960.00', '1960.00', '1000.00', '1000.00', '960.00', NULL, NULL, 'CUSTOM DISCOUNT', NULL, NULL, NULL, NULL, '2021-10-04', 'LOT - 2021-10-04 #1', '2021-10-14 08:28:48', '2021-10-14 08:28:37'),
(3, NULL, 1, 4, 3, 'admin 1', NULL, 'ORTHO BRUSH W/O INTRADENTAL', 'PCS.', 1, '1960.00', '1960.00', '1000.00', '1000.00', '960.00', NULL, NULL, 'CUSTOM DISCOUNT', NULL, NULL, NULL, NULL, '2021-10-04', 'LOT - 2021-10-04 #1', '2021-10-14 08:29:07', '2021-10-14 08:28:58'),
(4, NULL, 1, 4, 4, 'admin 1', NULL, 'ORTHO BRUSH W/O INTRADENTAL', 'PCS.', 1, '1960.00', '1960.00', '1000.00', '1000.00', '960.00', NULL, NULL, 'CUSTOM DISCOUNT', NULL, NULL, NULL, NULL, '2021-10-04', 'LOT - 2021-10-04 #1', '2021-10-14 08:29:49', '2021-10-14 08:29:27'),
(5, NULL, 1, 4, 5, 'admin 1', NULL, 'ORTHO BRUSH W/O INTRADENTAL', 'PCS.', 1, '1960.00', '1960.00', '1000.00', '1000.00', '400.00', NULL, 'SENIOR', 'DISCOUNTED', NULL, NULL, NULL, NULL, '2021-10-04', 'LOT - 2021-10-04 #1', '2021-10-14 08:36:14', '2021-10-14 08:35:57'),
(9, NULL, 1, 4, NULL, 'admin 1', NULL, 'ORTHO BRUSH W/O INTRADENTAL', 'PCS.', 1, '1960.00', '1960.00', '1000.00', '1000.00', '960.00', NULL, NULL, 'CUSTOM DISCOUNT', NULL, NULL, NULL, NULL, '2021-10-04', 'LOT - 2021-10-04 #1', '2021-10-14 08:47:44', '2021-10-14 08:47:44'),
(10, NULL, 1, 4, NULL, 'admin 1', NULL, 'ORTHO BRUSH W/O INTRADENTAL', 'PCS.', 1, '1960.00', '1960.00', '1960.00', NULL, NULL, NULL, 'REGULAR', 'REGULAR', NULL, NULL, NULL, NULL, '2021-10-04', 'LOT - 2021-10-04 #1', '2021-10-14 08:47:53', '2021-10-14 08:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `store_orders`
--

CREATE TABLE `store_orders` (
  `id` int(10) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(250) DEFAULT NULL,
  `customer_name` varchar(250) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `customer_address` varchar(250) DEFAULT NULL,
  `transaction_type` varchar(250) DEFAULT NULL,
  `invoice_type` varchar(255) DEFAULT NULL,
  `bir` varchar(50) DEFAULT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `encoder` varchar(250) DEFAULT NULL,
  `encoder_id` int(10) DEFAULT NULL,
  `check_no` varchar(250) DEFAULT NULL,
  `check_date` timestamp NULL DEFAULT NULL,
  `id_no` varchar(250) DEFAULT NULL,
  `bank_name` varchar(250) DEFAULT NULL,
  `ewt` decimal(12,2) DEFAULT NULL,
  `vat_exempt` decimal(12,2) DEFAULT NULL,
  `net_of_vat` decimal(12,2) DEFAULT NULL,
  `vat` decimal(12,2) DEFAULT NULL,
  `discount` decimal(12,2) DEFAULT NULL,
  `total_orders` decimal(12,2) DEFAULT NULL,
  `final_total` decimal(12,2) DEFAULT NULL,
  `balance` decimal(12,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `status_documents` varchar(255) NOT NULL DEFAULT 'NOT REQUIRED',
  `atc1` varchar(255) NOT NULL DEFAULT 'NO ATC1',
  `atc2` varchar(255) NOT NULL DEFAULT 'NO ATC2',
  `tin` varchar(255) NOT NULL DEFAULT '000-000-000-000',
  `date` date DEFAULT NULL,
  `time` time(6) DEFAULT NULL,
  `terms` varchar(100) DEFAULT NULL,
  `terms_end` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_orders`
--

INSERT INTO `store_orders` (`id`, `transaction_id`, `invoice_no`, `customer_name`, `account_name`, `customer_address`, `transaction_type`, `invoice_type`, `bir`, `payment`, `payment_status`, `reference_no`, `encoder`, `encoder_id`, `check_no`, `check_date`, `id_no`, `bank_name`, `ewt`, `vat_exempt`, `net_of_vat`, `vat`, `discount`, `total_orders`, `final_total`, `balance`, `status`, `status_documents`, `atc1`, `atc2`, `tin`, `date`, `time`, `terms`, `terms_end`, `created_at`, `updated_at`) VALUES
(1, '2021-10-0001', '342', 'MARK', NULL, '123123', 'SALES INVOICE', 'REGULAR', NULL, 'CASH', NULL, NULL, 'admin 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '892.86', '107.14', NULL, '1000.00', '1000.00', NULL, 'PAID', 'NOT REQUIRED', 'NO ATC1', 'NO ATC2', '000-000-000-000', '2021-10-14', NULL, NULL, '2021-10-15 08:28:26', '2021-10-14 08:28:26', '2021-10-14 08:28:26'),
(2, '2021-10-0002', '12e12e', 'MARK', '123', '123123', 'SALES INVOICE', 'REGULAR', NULL, 'CHECK', NULL, NULL, 'admin 1', NULL, '123', '2021-10-15 16:00:00', NULL, 'AUB (Asia United Bank Corporation)', NULL, NULL, '892.86', '107.14', NULL, '1000.00', '1000.00', NULL, 'PAID', 'NOT REQUIRED', 'NO ATC1', 'NO ATC2', '000-000-000-000', '2021-10-14', NULL, NULL, '2021-10-15 08:28:48', '2021-10-14 08:28:48', '2021-10-14 08:28:48'),
(3, '2021-10-0003', '123', 'MARK', '3123', '123123', 'SALES INVOICE', 'REGULAR', NULL, 'CARD', 'DEBIT', '1312', 'admin 1', NULL, NULL, NULL, NULL, 'AUB (Asia United Bank Corporation)', NULL, NULL, '892.86', '107.14', NULL, '1000.00', '1000.00', NULL, 'PAID', 'NOT REQUIRED', 'NO ATC1', 'NO ATC2', '000-000-000-000', '2021-10-14', NULL, NULL, '2021-10-15 08:29:07', '2021-10-14 08:29:07', '2021-10-14 08:29:07'),
(4, '2021-10-0004', '342gg', 'MARK', 'qweqw', '123123', 'SALES INVOICE', 'REGULAR', NULL, 'CARD', 'CREDIT', 'qwe', 'admin 1', NULL, NULL, NULL, NULL, 'AUB (Asia United Bank Corporation)', NULL, NULL, '892.86', '107.14', NULL, '1000.00', '1000.00', NULL, 'PAID', 'NOT REQUIRED', 'NO ATC1', 'NO ATC2', '000-000-000-000', '2021-10-14', NULL, NULL, '2021-10-15 08:29:49', '2021-10-14 08:29:49', '2021-10-14 08:29:49'),
(5, '2021-10-0005', '342asa', '123', NULL, '123123', 'SALES INVOICE', 'SENIOR', NULL, 'CASH', NULL, NULL, 'admin 1', NULL, NULL, NULL, '123123', NULL, NULL, '892.86', NULL, NULL, '178.57', '1000.00', '714.29', '714.29', 'UNPAID', 'NOT REQUIRED', 'NO ATC1', 'NO ATC2', '000-000-000-000', '2021-10-14', NULL, NULL, '2021-10-15 08:36:14', '2021-10-14 08:36:14', '2021-10-14 08:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `store_product_lists`
--

CREATE TABLE `store_product_lists` (
  `id` bigint(20) NOT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `product_code` varchar(50) NOT NULL,
  `productname` varchar(250) NOT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `unit` varchar(250) NOT NULL,
  `capital` decimal(12,2) NOT NULL,
  `stock` int(250) NOT NULL,
  `markup` int(50) DEFAULT NULL,
  `selling_price` decimal(12,2) NOT NULL,
  `critical_alert` int(250) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `no_expiration` int(11) NOT NULL DEFAULT 0,
  `no_lot_no` int(11) NOT NULL DEFAULT 0,
  `status` enum('Active','Phase Out') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_product_lists`
--

INSERT INTO `store_product_lists` (`id`, `branch`, `brand`, `product_code`, `productname`, `product_description`, `unit`, `capital`, `stock`, `markup`, `selling_price`, `critical_alert`, `location`, `exp_date`, `no_expiration`, `no_lot_no`, `status`, `created_at`, `updated_at`) VALUES
(1, '', 'brand', 'sku-123', 'ORTHO BRUSH W/O INTRADENTAL', 'description', '', '295.71', 113, 0, '414.00', 3, 'g1-g2', '2021-09-16', 1, 1, 'Active', '2021-08-07 14:23:35', '2021-12-23 11:48:13'),
(2, 'STORE', 'brand1', 'sku-1241', 'DUODERM CGF DRESSING 10CM X10CM (4\"X4\") 5\'s1', 'description1', 'BXS', '0.00', 0, 0, '0.00', 31, 'g21', NULL, 0, 0, '', '2021-08-07 14:23:35', '2021-10-09 17:18:24'),
(3, 'STORE', 'brand', 'sku-125', 'DUODERM HYDROACTIVE GEL 15GM TUBE 10\'s', 'description', 'BXS.', '100.00', -143, 40, '120.00', 3, 'g3', '2021-09-30', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(4, 'Main22', 'brand', 'sku-126', 'SALONPAS 10\'s 25x10', 'description', 'asds2', '100.00', 14, 50, '120.00', 353, 'g4', '2021-09-21', 0, 0, 'Active', '2021-08-07 14:23:35', '2021-11-03 15:13:23'),
(5, 'branch', 'brand', 'sku-127', 'GLOPRO EXAMINATION GLOVES MEDIUM', 'description', 'BXS.', '550.00', -6, NULL, '120.00', 3, 'g5', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(6, 'branch', 'brand', 'sku-128', 'J.CHEMIE DIGITAL THERMOMETER HYGROMETER', 'description', 'PCS.', '1768.50', 11, NULL, '120.00', 3, 'g6', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(7, 'branch', 'brand', 'sku-129', 'ALBATROS DEODORIZER 100GRAM', 'description', 'PCS.', '54.00', 13, NULL, '120.00', 3, 'g7', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(8, 'branch', 'brand', 'sku-130', 'PPE SET AQUA BLUE', 'description', 'PCS.', '500.00', 14, NULL, '120.00', 3, 'g8', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(9, 'branch', 'brand', 'sku-131', 'GENERIC PPE SET BLUE', 'description', 'PCS.', '500.00', 16, NULL, '120.00', 3, 'g9', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(10, 'branch', 'brand', 'sku-132', 'MAGNESIUM SULFATE 500MG 2ML', 'description', 'AMP.', '95.00', 17, NULL, '120.00', 3, 'g10', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(11, 'branch', 'brand', 'sku-133', 'DENTAL BIB 2PLY 5\'s', 'description', 'PCK.', '140.00', 19, NULL, '120.00', 3, 'g11', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(12, 'branch', 'brand', 'sku-134', 'DR. CLEAN ISOPROPHYL ALCOHOL 70%', 'description', 'GAL.', '368.00', 20, NULL, '120.00', 3, 'g12', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(13, 'branch', 'brand', 'sku-135', 'THERMAL SCANNER WITH TRIPOD', 'description', 'UNIT.', '1685.00', 22, NULL, '120.00', 3, 'g13', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(14, 'branch', 'brand', 'sku-136', 'CHAIN', 'description', 'FT.', '0.00', 23, NULL, '120.00', 3, 'g14', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(15, 'branch', 'brand', 'sku-137', 'SURRMED ALLUMINUM CRUTCHES ADULT', 'description', 'PAIR.', '475.00', 25, NULL, '120.00', 3, 'g15', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(16, 'branch', 'brand', 'sku-138', 'SCHULLER MED GLOVES MEDIUM', 'description', 'BXS.', '495.00', 26, NULL, '120.00', 3, 'g16', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(17, 'branch', 'brand', 'sku-139', 'FUJIKAWA ECG PAPER 63MMX30MM', 'description', 'PCS.', '65.00', 28, NULL, '120.00', 3, 'g17', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(18, 'branch', 'brand', 'sku-140', 'SURGITECH FOLEY CATHETER 2 WAY FR.8 ', 'description', 'PCS.', '30.00', 29, NULL, '120.00', 3, 'g18', NULL, 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(19, 'branch', 'brand', 'sku-141', 'SCRUB BRUSH PLAIN PARTNERS', 'description', 'PCS.', '20.00', 31, NULL, '120.00', 3, 'g19', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(20, 'branch', 'brand', 'sku-142', 'STETHOSCOPE PEDIA LITTMAN II', 'description', 'PCS.', '5265.00', 32, NULL, '120.00', 3, 'g20', '0000-00-00', 0, 0, '', '2021-08-07 14:23:35', '2021-09-20 02:58:30'),
(21, 'branch', 'brand', 'sample code', 'sample name', 'description', 'AMP', '324.00', 324, 324, '324.00', 324, '23423', '2021-08-12', 0, 0, '', '2021-08-10 16:54:40', '2021-09-20 02:58:30'),
(22, 'branch', 'brand', 'tsd', 'joe name', 'description', 'AMP', '1.00', 2, 3, '4.00', 5, '6', '2021-08-26', 0, 0, '', '2021-08-10 16:58:12', '2021-09-20 02:58:30'),
(23, 'branch', 'brand', 'sample code', 'sample name', 'description', 'AMP', '0.00', 0, 0, '0.00', 6, 'gt', NULL, 0, 0, '', '2021-08-13 15:30:55', '2021-09-20 02:58:30'),
(24, 'asdas', 'asdas', 'asdas', 'asda', 'sadad', 'AMP', '0.00', 1, 0, '0.00', 32, 'qweqad', NULL, 0, 0, 'Active', '2021-08-15 13:00:37', '2021-10-29 10:52:11'),
(25, 'STORE', 'JOE', 'sample code', 'sample name', 'sadad', 'AMP', '0.00', 0, 0, '0.00', 23, 'JOE', NULL, 0, 0, '', '2021-08-16 13:40:49', '2021-09-20 02:58:30'),
(26, 'STORE', 'brad', 'sample code2', 'sample name2', 'sadad', 'AMP', '0.00', 0, 0, '0.00', 22, 'asdad', NULL, 0, 0, '', '2021-08-16 13:43:41', '2021-09-20 02:58:30'),
(27, 'asdas', 'asdas', 'asdsa', 'asdas', 'asdas', 'BXS', '0.00', 0, 0, '0.00', 324, '23423', NULL, 0, 0, '', '2021-08-16 13:44:46', '2021-09-20 02:58:30'),
(28, 'asdsa', 'asdas', 'asd', 'sample name', 'asdas', 'AMP', '0.00', 0, 0, '0.00', 324, '432', NULL, 0, 0, '', '2021-08-16 13:45:48', '2021-09-20 02:58:30'),
(31, 'Main22', 'ASDAS', 'SADSAD', 'SAMPLE NAME', 'SADAD', 'asds2', '0.00', 0, 0, '0.00', 4, NULL, NULL, 0, 0, 'Active', '2021-09-20 03:06:14', '2021-09-20 04:36:17'),
(32, 'Main22', 'JOE BRANC SAMPLE', 'TUV-001', 'JOE PRODUCT -101', '100 ML', 'asds2', '0.00', 4, 0, '0.00', 5, NULL, NULL, 1, 0, 'Active', '2021-09-21 11:14:29', '2021-10-29 10:52:11'),
(73, NULL, 'J.CHEMIE', 'SKU00-040-177', 'ALCOHOL  70% ', 'ISOPROPHYL', 'GAL.', '471.50', 1, 0, '660.10', 10, 'WAREHOUSE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(74, NULL, 'J.CHEMIE', 'SKU00-040-178', 'HYDROGEN  PEROXIDE  10VOL', '1L', 'BOT.', '52.00', 1, 0, '72.80', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(75, NULL, 'VIDEXCARE', 'SKU00-040-242', 'ULTRASOUND GEL', 'GALLON', 'GAL.', '500.00', 1, 0, '700.00', 10, 'VIP', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(76, NULL, 'SURGITECH', 'SKU00-040-855', 'BREAST PUMP', 'GLASS', 'PC.', '60.00', 1, 0, '84.00', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(77, NULL, 'TUDOR', 'SKU00-040-898', 'CHROMIC ', 'ROUND NEEDLE 3-0', 'PC.', '22.08', 1, 0, '30.92', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(78, NULL, 'MEDICARE', 'SKU00-040-972', 'ECG PAPER', '50MMX30MM', 'ROLL.', '53.00', 1, 0, '74.20', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(79, NULL, 'SURGITECH', 'SKU00-040-987', 'EDTA TUBE', '2ML', 'PC.', '3.90', 1, 0, '5.46', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(80, NULL, 'MEDIPLAST', 'SKU00-041-107', 'LEUKOPLAST ', '10.00cmX5M (4X5)', 'PC.', '490.00', 1, 0, '686.00', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(81, NULL, 'SMITH & NEPNEW', 'SKU00-041-210', 'OPSITE POST-OP', '15.5cm X 8.5cm', 'PC.', '129.00', 1, 0, '180.60', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(82, NULL, 'CONVATEC', 'SKU00-041-270', 'POUCH ', 'OPAQUE 70MM', 'PC.', '129.00', 1, 0, '180.60', 10099, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-12-14 13:33:51'),
(83, NULL, 'B-BRAUN', 'SKU00-041-379', 'SILKAM ', 'DS24  75cm C0762369 2-0', 'PC.', '82.50', 1, 0, '115.50', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(84, NULL, 'CONVATEC', 'SKU00-041-519', 'WAFER  ', 'FLEXIBLE 70MM', 'PC.', '263.50', 1, 0, '368.90', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(85, NULL, 'LONGBONE', 'SKU00-041-929', 'WRIST SPLINT', 'RIGHT SMALL', 'PC.', '355.00', 1, 0, '497.00', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(86, NULL, 'SURGITECH', 'SKU00-042-426', 'NEBULIZER KIT', 'W/MASK PEDIA', 'PC.', '40.00', 1, 0, '56.00', 10, 'VIP', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(87, NULL, 'TERUMO', 'SKU00-042-563', 'BLOOD BAG', '450ML SINGLE', 'PC.', '111.00', 1, 0, '155.40', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(88, NULL, 'CATHULA', 'SKU00-042-583', 'CATHULA', '19MM G24.', 'PC.', '14.00', 1, 0, '19.60', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(89, NULL, 'BD', 'SKU00-042-688', 'INSYTE', 'G.20', 'PC.', '53.00', 1, 0, '74.20', 10, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(90, NULL, 'CLOTTMAN', 'SKU00-042-710', 'LAB GOWN', 'SMALL', 'PC.', '275.00', 1, 0, '385.00', 12207, 'STORE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-12-08 07:13:09'),
(91, NULL, 'EURO-MED', 'SKU00-042-985', 'D5 LRS', '1L', 'BOT.', '45.00', 1, 0, '63.00', 10, 'VIP', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(92, NULL, 'INDOPLAS', 'SKU00-043-079', 'RECLINING WHEELCHAIR', NULL, 'UNIT.', '5000.00', 1, 0, '9000.00', 10, 'WAREHOUSE', NULL, 0, 0, 'Active', '2021-11-02 14:28:27', '2021-12-08 13:31:14'),
(93, 'VALLERY', 'INDOPLAS', 'SKU00-043-079', 'RECLINING WHEELCHAIR', NULL, 'UNIT.', '5000.00', 1, 0, '9000.00', 10, 'WAREHOUSE', NULL, 0, 0, 'Active', '2021-11-02 14:36:59', '2021-12-08 13:31:39'),
(94, 'VALLERY', 'INDOPLAS', 'SKU00-043-079', 'RECLINING WHEELCHAIR', NULL, 'UNIT.', '5800.00', 1, 0, '8120.00', 10, 'WAREHOUSE', NULL, 0, 0, 'Active', '2021-11-02 14:37:18', '2021-11-02 14:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `store_purchase_items`
--

CREATE TABLE `store_purchase_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `orders_id` int(12) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `encoder` varchar(50) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `quantity` int(12) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_purchase_items`
--

INSERT INTO `store_purchase_items` (`id`, `product_id`, `orders_id`, `user_id`, `encoder`, `product_name`, `product_code`, `unit`, `quantity`, `amount`, `total`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 11, 'admin 1', 'ORTHO BRUSH W/O INTRADENTAL', 'Laravel is a PHP framework', 'BXS.', 10, '120.00', '120.00', 'Pending', '2021-08-23 01:44:41', '2021-09-05 13:19:32'),
(5, 1, 2, 11, 'joe', 'ORTHO BRUSH W/O INTRADENTAL', 'Laravel is a PHP framework', 'PCS.', 2, '150.00', '240.00', 'Receive', '2021-08-23 01:44:41', '2021-09-14 06:52:28'),
(11, 3, 3, 11, 'joe', 'DUODERM HYDROACTIVE GEL 15GM TUBE 10\'s', 'Laravel is a PHP framework', 'BXS.', 1, '120.00', '120.00', 'Pending', '2021-08-23 01:44:41', '2021-09-05 03:30:12'),
(13, 1, 7, 11, 'joe', 'ORTHO BRUSH W/O INTRADENTAL', 'Laravel is a PHP framework', 'PCS.', 1, '150.00', '150.00', 'Pending', '2021-09-13 13:11:11', '2021-09-14 07:17:56'),
(14, 1, 8, 11, 'joe', 'ORTHO BRUSH W/O INTRADENTAL', 'Laravel is a PHP framework', 'PCS.', 2, '150.00', '300.00', 'Pending', '2021-09-14 06:07:35', '2021-09-14 07:30:04'),
(15, 4, 8, 11, 'joe', 'SALONPAS 10\'s 25x10', 'Laravel is a PHP framework', 'BXS.', 3, '120.00', '360.00', 'Pending', '2021-09-14 06:07:40', '2021-09-14 07:30:05'),
(16, 3, 9, 11, 'joe', 'DUODERM HYDROACTIVE GEL 15GM TUBE 10\'s', 'Laravel is a PHP framework', 'BXS.', 10, '120.00', '1200.00', 'Pending', '2021-09-14 10:04:38', '2021-09-14 10:04:50'),
(17, 4, 9, 11, 'joe', 'SALONPAS 10\'s 25x10', 'Laravel is a PHP framework', 'BXS.', 10, '120.00', '1200.00', 'Pending', '2021-09-14 10:04:44', '2021-09-14 10:04:50'),
(18, 1, 10, 11, 'joe', 'ORTHO BRUSH W/O INTRADENTAL', 'Laravel is a PHP framework', 'PCS.', 10, '150.00', '1500.00', 'Pending', '2021-09-14 10:11:30', '2021-09-14 10:12:08'),
(19, 3, 10, 11, 'joe', 'DUODERM HYDROACTIVE GEL 15GM TUBE 10\'s', 'Laravel is a PHP framework', 'BXS.', 20, '120.00', '2400.00', 'Pending', '2021-09-14 10:11:37', '2021-09-14 10:12:08'),
(20, 4, 10, 11, 'joe', 'SALONPAS 10\'s 25x10', 'Laravel is a PHP framework', 'BXS.', 10, '120.00', '1200.00', 'Pending', '2021-09-14 10:11:45', '2021-09-14 10:12:08'),
(21, 25, 10, 11, 'joe', 'sample name', 'Laravel is a PHP framework', 'AMP', 10, '100.00', '1000.00', 'Pending', '2021-09-14 10:11:55', '2021-09-14 10:12:08'),
(22, 26, 10, 11, 'joe', 'sample name2', 'Laravel is a PHP framework', 'AMP', 100, '200.00', '20000.00', 'Pending', '2021-09-14 10:12:04', '2021-09-14 10:12:08'),
(23, 32, 11, 11, 'joe', 'JOE PRODUCT -101', 'Laravel is a PHP framework', 'asds2', 100, '1000.00', '100000.00', 'Pending', '2021-09-21 11:20:09', '2021-09-21 11:20:13'),
(24, 4, 13, 11, 'joe', 'SALONPAS 10\'s 25x10', 'Laravel is a PHP framework', 'BXS.', 2, '120.00', '240.00', 'Pending', '2021-09-28 11:30:31', '2021-09-28 11:30:52'),
(25, 24, 14, 11, 'joe', 'asda', 'Laravel is a PHP framework', 'AMP', 10, '120.00', '1200.00', 'Pending', '2021-10-24 13:49:34', '2021-10-29 10:51:37'),
(26, 1, 14, 11, 'joe', 'ORTHO BRUSH W/O INTRADENTAL', 'Laravel is a PHP framework', 'PCS.', 12, '150.00', '1800.00', 'Pending', '2021-10-29 10:51:22', '2021-10-29 10:51:37'),
(27, 32, 14, 11, 'joe', 'JOE PRODUCT -101', 'Laravel is a PHP framework', 'asds2', 10, '1000.00', '10000.00', 'Pending', '2021-10-29 10:51:31', '2021-10-29 10:51:37'),
(31, 1, 15, 11, 'joe', 'ORTHO BRUSH W/O INTRADENTAL', 'Laravel is a PHP framework', 'PCS.', 100, '300.00', '30000.00', 'Completed', '2021-12-12 11:58:57', '2021-12-23 11:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `store_purchase_orders`
--

CREATE TABLE `store_purchase_orders` (
  `id` int(12) NOT NULL,
  `po_no` varchar(250) DEFAULT NULL,
  `date` date NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `encoder` varchar(50) NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `comment` varchar(255) NOT NULL DEFAULT 'No Comment',
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_purchase_orders`
--

INSERT INTO `store_purchase_orders` (`id`, `po_no`, `date`, `user_id`, `supplier_id`, `encoder`, `total_price`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 'VE-2021-8-001', '2021-08-04', '4', 0, 'admin 1', '120.00', '', 'Pending', '2021-08-03 14:45:58', '2021-09-05 05:17:10'),
(2, 'VE-2021-8-002', '2021-08-15', '11', 0, 'joe', '240.00', '', 'Pending', '2021-08-15 12:33:31', '2021-08-15 12:33:31'),
(3, 'VE-2021-8-003', '2021-08-17', '11', 0, 'joe', '120.00', '', 'Pending', '2021-08-16 18:26:30', '2021-08-16 18:26:30'),
(7, 'VE-2021-9-004', '2021-09-13', '11', 1, 'joe', '150.00', '', 'Pending', '2021-09-13 13:11:16', '2021-09-13 13:11:16'),
(8, 'VE-2021-9-005', '2021-09-14', '11', 1, 'joe', '660.00', 'No Comment', 'Pending', '2021-09-14 06:08:20', '2021-09-14 07:30:16'),
(9, 'VE-2021-9-006', '2021-09-14', '11', 2, 'joe', '2400.00', 'No Comment', 'Pending', '2021-09-14 10:04:50', '2021-09-14 10:04:50'),
(10, 'VE-2021-9-007', '2021-09-14', '11', 2, 'joe', '26100.00', 'No Comment', 'Pending', '2021-09-14 10:12:08', '2021-09-14 10:12:08'),
(11, 'VE-2021-9-008', '2021-09-21', '11', 2, 'joe', '100000.00', 'No Comment', 'Pending', '2021-09-21 11:20:13', '2021-09-21 11:20:13'),
(12, 'VE-2021-9-009', '2021-09-28', '11', 2, 'joe', '0.00', 'No Comment', 'Pending', '2021-09-28 11:30:11', '2021-09-28 11:30:11'),
(13, 'VE-2021-9-0010', '2021-09-28', '11', 2, 'joe', '240.00', 'No Comment', 'Pending', '2021-09-28 11:30:52', '2021-09-28 11:30:52'),
(14, 'VE-2021-10-0011', '2021-10-29', '11', 2, 'joe', '13000.00', 'No Comment', 'Pending', '2021-10-29 10:51:37', '2021-10-29 10:51:37'),
(15, 'VE-2021-12-0012', '2021-12-12', '11', 2, 'joe', '30000.00', 'No Comment', 'Completed', '2021-12-12 12:13:16', '2021-12-23 11:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `store_replaced_items`
--

CREATE TABLE `store_replaced_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `orders_id` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `encoder` varchar(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `deleted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_replaced_items`
--

INSERT INTO `store_replaced_items` (`id`, `item_id`, `orders_id`, `status`, `encoder`, `user_id`, `quantity`, `product_name`, `unit`, `amount`, `total`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 3, 3, NULL, 'admin 1', 4, 1, 'ORTHO BRUSH W/O INTRADENTAL', 'PCS.', '1960.00', '1960.00', NULL, '2021-10-11 08:55:28', '2021-10-11 08:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `landline` varchar(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `payment_term` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `email`, `contact_person`, `mobile_no`, `landline`, `tin`, `payment_term`, `status`, `created_at`, `updated_at`) VALUES
(1, 'JOE', 'BANTUG', 'ASD3', 'ASD2', 'ASD4', 'ASD5', 'ASD6', '3247', 'active', '2021-09-12 06:08:43', '2021-11-03 12:47:52'),
(2, 'CHRISTIAN', 'SAN PASCUAL', 'WQRER@TEST.COM', 'RONELYN', '091111353', '3453453', '4354-4545-454', '15', 'active', '2021-09-14 09:56:50', '2021-09-14 09:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `tmm_datas`
--

CREATE TABLE `tmm_datas` (
  `id` int(11) NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `produc_desc` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `rack` varchar(255) DEFAULT NULL,
  `shelf` varchar(255) DEFAULT NULL,
  `critical` varchar(255) DEFAULT NULL,
  `exp_date` varchar(255) DEFAULT NULL,
  `lot_no` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmm_datas`
--

INSERT INTO `tmm_datas` (`id`, `product_code`, `brand`, `product_name`, `produc_desc`, `qty`, `unit`, `cost`, `location`, `rack`, `shelf`, `critical`, `exp_date`, `lot_no`, `status`, `created_at`, `updated_at`) VALUES
(148, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '1', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(149, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '1', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(150, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '1', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(151, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(152, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(153, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(154, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '1', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(155, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '1', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(156, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '1', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(157, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '1', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(158, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(159, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(160, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(161, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '1', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(162, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(163, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(164, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(165, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(166, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(167, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-02 14:23:00', '2021-11-02 14:23:00'),
(169, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '1', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(170, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '1', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(171, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '1', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(172, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(173, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(174, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(175, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '1', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(176, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '1', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(177, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '1', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(178, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '1', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(179, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(180, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(181, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(182, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '1', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(183, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(184, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(185, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(186, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(187, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(188, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-02 14:23:33', '2021-11-02 14:23:33'),
(190, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '1', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(191, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '1', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(192, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '1', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(193, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(194, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(195, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(196, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '1', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(197, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '1', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(198, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '1', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(199, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '1', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(200, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(201, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(202, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(203, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '1', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(204, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(205, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(206, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(207, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(208, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(209, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(295, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '1', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(296, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '1', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(297, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '1', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(298, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(299, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(300, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(301, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '1', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(302, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '1', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(303, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '1', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(304, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '1', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(305, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(306, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(307, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(308, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '1', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(309, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(310, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(311, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(312, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(313, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(314, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(316, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '1', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(317, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '1', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(318, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '1', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(319, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(320, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(321, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(322, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '1', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(323, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '1', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(324, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '1', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(325, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '1', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(326, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(327, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(328, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(329, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '1', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(330, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(331, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(332, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(333, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(334, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(335, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(358, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '1', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(359, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '1', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(360, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '1', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(361, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(362, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(363, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(364, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '1', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(365, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '1', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(366, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '1', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(367, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '1', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(368, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(369, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(370, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(371, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '1', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(372, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(373, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(374, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(375, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(376, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(377, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(379, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '1', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(380, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '1', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(381, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '1', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(382, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(383, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(384, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(385, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '1', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(386, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '1', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(387, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '1', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(388, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '1', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(389, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(390, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(391, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(392, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '1', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(393, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(394, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(395, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(396, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(397, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(398, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(400, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '1', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(401, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '1', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(402, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '1', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(403, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(404, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(405, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(406, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '1', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(407, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '1', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(408, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '1', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(409, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '1', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(410, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(411, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(412, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(413, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '1', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(414, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(415, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(416, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(417, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(418, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(419, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(421, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '1', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(422, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '1', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(423, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '1', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(424, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(425, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(426, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(427, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '1', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(428, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '1', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(429, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '1', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(430, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '1', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(431, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(432, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(433, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(434, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '1', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(435, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(436, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(437, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(438, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(439, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(440, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(442, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '1', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(443, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '1', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(444, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '1', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(445, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(446, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(447, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(448, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '1', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(449, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '1', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(450, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '1', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(451, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '1', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(452, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(453, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(454, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(455, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '1', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(456, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(457, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(458, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(459, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(460, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(461, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(505, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '10', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(506, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '20', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(507, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '50', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(508, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(509, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(510, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(511, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '5', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(512, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '5', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(513, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '5', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(514, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '40', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(515, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(516, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(517, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(518, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '10', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(519, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(520, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(521, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(522, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1100', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(523, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(524, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(526, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '10', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(527, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '20', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(528, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '50', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(529, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '1', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(530, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '1', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(531, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '1', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(532, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '5', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(533, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '5', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(534, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '5', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(535, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '40', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(536, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '1', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(537, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '1', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(538, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '1', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(539, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '10', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(540, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '1', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(541, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '1', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(542, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '1', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(543, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '1100', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(544, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '1', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(545, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '1', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(547, 'SKU00-040-177', 'J.CHEMIE', 'ALCOHOL  70% ', 'ISOPROPHYL', '10', 'GAL.', '471.5', 'WAREHOUSE', '1', 'A', '10', '2023-06-21 00:00:00', 'JSP12056', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(548, 'SKU00-040-178', 'J.CHEMIE', 'HYDROGEN  PEROXIDE  10VOL', '1L', '20', 'BOT.', '52', 'STORE', '3', 'D', '10', '2022-12-01 00:00:00', 'JSP156450', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(549, 'SKU00-040-242', 'VIDEXCARE', 'ULTRASOUND GEL', 'GALLON', '50', 'GAL.', '500', 'VIP', '4', 'C', '10', NULL, NULL, 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(550, 'SKU00-040-855', 'SURGITECH', 'BREAST PUMP', 'GLASS', '10000', 'PC.', '60', 'STORE', '2', 'B', '10', NULL, NULL, 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(551, 'SKU00-040-898', 'TUDOR', 'CHROMIC ', 'ROUND NEEDLE 3-0', '10000', 'PC.', '22.0834', 'STORE', '5', 'H', '10', '2024-09-01 00:00:00', '67843', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(552, 'SKU00-040-972', 'MEDICARE', 'ECG PAPER', '50MMX30MM', '10000', 'ROLL.', '53', 'STORE', '1', 'K', '10', NULL, NULL, 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(553, 'SKU00-040-987', 'SURGITECH', 'EDTA TUBE', '2ML', '10000', 'PC.', '3.9', 'STORE', '7', 'L', '10', '2025-05-01 00:00:00', '185236', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(554, 'SKU00-041-107', 'MEDIPLAST', 'LEUKOPLAST ', '10.00cmX5M (4X5)', '10000', 'PC.', '490', 'STORE', '6', 'B', '10', '2024-12-08 00:00:00', '56400', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(555, 'SKU00-041-210', 'SMITH & NEPNEW', 'OPSITE POST-OP', '15.5cm X 8.5cm', '10000', 'PC.', '129', 'STORE', '2', 'G', '10', '2023-03-12 00:00:00', 'HS283', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(556, 'SKU00-041-270', 'CONVATEC', 'POUCH ', 'OPAQUE 70MM', '10000', 'PC.', '129', 'STORE', '8', 'B', '10', NULL, '1A4590', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(557, 'SKU00-041-379', 'B-BRAUN', 'SILKAM ', 'DS24  75cm C0762369 2-0', '10000', 'PC.', '82.5', 'STORE', '10', 'B', '10', '2026-09-23 00:00:00', '171950', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(558, 'SKU00-041-519', 'CONVATEC', 'WAFER  ', 'FLEXIBLE 70MM', '10000', 'PC.', '263.5', 'STORE', '2', 'F', '10', NULL, '1CO745', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(559, 'SKU00-041-929', 'LONGBONE', 'WRIST SPLINT', 'RIGHT SMALL', '10000', 'PC.', '355', 'STORE', '4', 'C', '10', NULL, NULL, 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(560, 'SKU00-042-426', 'SURGITECH', 'NEBULIZER KIT', 'W/MASK PEDIA', '10000', 'PC.', '40', 'VIP', '5', 'A', '10', '2024-05-08 00:00:00', '156230', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(561, 'SKU00-042-563', 'TERUMO', 'BLOOD BAG', '450ML SINGLE', '10000', 'PC.', '111', 'STORE', '3', 'B', '10', '2025-01-23 00:00:00', 'HKJ345', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(562, 'SKU00-042-583', 'CATHULA', 'CATHULA', '19MM G24.', '10000', 'PC.', '14', 'STORE', '2', 'D', '10', '2023-07-22 00:00:00', 'A15623', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(563, 'SKU00-042-688', 'BD', 'INSYTE', 'G.20', '10000', 'PC.', '53', 'STORE', '1', 'E', '10', '2026-01-01 00:00:00', 'LK01256', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(564, 'SKU00-042-710', 'CLOTTMAN', 'LAB GOWN', 'SMALL', '10000', 'PC.', '275', 'STORE', '4', 'I', '10', NULL, NULL, 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(565, 'SKU00-042-985', 'EURO-MED', 'D5 LRS', '1L', '10000', 'BOT.', '45', 'VIP', '6', 'A', '10', '2025-12-01 00:00:00', '1HSDJ4', 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(566, 'SKU00-043-079', 'INDOPLAS', 'RECLINING WHEELCHAIR', NULL, '10000', 'UNIT.', '5800', 'WAREHOUSE', '8', 'A', '10', NULL, NULL, 1, '2021-11-11 12:20:56', '2021-11-11 12:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_histories`
--

CREATE TABLE `transaction_histories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `total_payment` decimal(12,2) DEFAULT NULL,
  `encoder` varchar(255) DEFAULT NULL,
  `transaction_type` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `check_number` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `check_date` timestamp NULL DEFAULT NULL,
  `ref_no` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_histories`
--

INSERT INTO `transaction_histories` (`id`, `product_id`, `quantity`, `transaction_id`, `invoice_no`, `customer_name`, `total_payment`, `encoder`, `transaction_type`, `payment_type`, `payment_status`, `check_number`, `bank`, `check_date`, `ref_no`, `account_name`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '2021-10-0001', '342', 'MARK', '1000.00', 'admin 1', 'REGULAR', 'CASH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-14', '2021-10-14 08:28:26', '2021-10-14 08:28:26'),
(2, NULL, NULL, '2021-10-0002', '12e12e', 'MARK', '1000.00', 'admin 1', 'REGULAR', 'CHECK', NULL, '123', 'AUB (Asia United Bank Corporation)', '2021-10-15 16:00:00', NULL, '123', NULL, '2021-10-14', '2021-10-14 08:28:48', '2021-10-14 08:28:48'),
(3, NULL, NULL, '2021-10-0003', '123', 'MARK', '1000.00', 'admin 1', 'REGULAR', 'CARD', 'DEBIT', NULL, 'AUB (Asia United Bank Corporation)', NULL, '1312', '3123', NULL, '2021-10-14', '2021-10-14 08:29:07', '2021-10-14 08:29:07'),
(4, NULL, NULL, '2021-10-0004', '342gg', 'MARK', '1000.00', 'admin 1', 'REGULAR', 'CARD', 'CREDIT', NULL, 'AUB (Asia United Bank Corporation)', NULL, 'qwe', 'qweqw', NULL, '2021-10-14', '2021-10-14 08:29:49', '2021-10-14 08:29:49'),
(5, NULL, NULL, '2021-10-0005', '342asa', '123', '3.00', 'admin 1', 'SENIOR', 'CASH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-14', '2021-10-14 08:36:14', '2021-10-14 08:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `invoice_num` varchar(255) DEFAULT NULL,
  `po_id` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `lot_no` varchar(255) NOT NULL,
  `location_address` varchar(255) DEFAULT NULL,
  `shelf` varchar(255) DEFAULT NULL,
  `rock` varchar(255) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `user_id`, `invoice_num`, `po_id`, `product_id`, `price`, `transaction_type`, `quantity`, `lot_no`, `location_address`, `shelf`, `rock`, `expiration_date`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(2, 11, '34234', 'VE-2021-9-005', 1, '151.00', 'STORE', 2, 'lot - 05 #', 'location', 'shelf', 'Rock', '2021-01-05', '', 0, '2021-10-03 14:20:27', '2021-10-03 14:20:27'),
(3, 11, '34234', 'VE-2021-9-005', 1, '121.00', 'STORE', 3, 'LOT - 2021-10-04 #1', 'location2', 'shelf', 'Rock2', '2021-10-04', '', 0, '2021-10-03 14:20:27', '2021-10-03 14:20:27'),
(4, 11, '34234', 'VE-2021-9-005', 1, '121.00', 'STORE', 3, 'LOT - 2021-10-04 #2', 'location2', 'shelf', 'Rock2', '2021-10-04', '', 0, '2021-10-03 14:20:27', '2021-10-03 14:20:27'),
(5, 11, '34234', 'VE-2021-9-005', 2, '121.00', 'STORE\n', 3, 'lot2', 'location2', 'shelf', 'Rock2', '2021-10-04', '', 0, '2021-10-03 14:20:27', '2021-10-03 14:20:27'),
(6, 11, '34234', 'VE-2021-9-005', 2, '151.00', 'STORE', 2, 'lot - 05 # 2', 'location', 'shelf', 'Rock', '2022-03-05', '', 0, '2021-10-03 14:20:27', '2021-10-03 14:20:27'),
(66, 11, '324234', 'VE-2021-9-008', 32, '1000.00', 'RECEIVE PO', 3, 'LOT 2', 'LOCATION 12', 'SHELF1ASDA', 'RACK 1', NULL, '', 0, '2021-10-21 15:12:59', '2021-10-21 15:12:59'),
(67, 11, '23213', 'VE-2021-9-0010', 4, '120.00', 'RECEIVE PO', 1, 'LOT 2', 'LOCATION 12', 'SHELF1ASDA', 'RACK 1', '2021-10-19', '', 0, '2021-10-24 12:19:13', '2021-10-24 12:19:13'),
(68, 11, 'MANUAL', 'MANUAL', 4, '120.00', 'MANUAL', 332, 'LOT 2', 'LOCATION 12', 'SHELF 5', 'RACK 4', '2021-10-29', '', 0, '2021-10-25 13:20:00', '2021-10-25 13:20:00'),
(69, 11, 'MANUAL', 'MANUAL', 4, NULL, 'MANUAL', 10, 'LOT 2', 'LOCATION 12', 'SHELF 5', 'RACK 4', '2021-10-26', '', 0, '2021-10-25 14:01:46', '2021-10-25 14:01:46'),
(70, 11, 'MANUAL', 'MANUAL', 1, '120.00', 'MANUAL', 10, 'LOT 2', 'LOCATION 12', 'SHELF 5', 'RACK 4', '2021-10-26', '', 0, '2021-10-25 14:02:42', '2021-10-25 14:02:42'),
(71, 11, 'MANUAL', 'MANUAL', 1, '120.00', 'MANUAL', 12, '', 'LOCATION 12', 'SHELF 5', 'RACK 1', NULL, '', 0, '2021-10-25 14:02:58', '2021-10-25 14:02:58'),
(72, 11, 'MANUAL', 'MANUAL', 1, '120.00', 'MANUAL', 10, '', 'LOCATION 12', 'SHELF1ASDA', 'RACK 1', NULL, '', 0, '2021-10-25 14:03:44', '2021-10-25 14:03:44'),
(73, 11, 'MANUAL', 'MANUAL', 1, '120.00', 'MANUAL', 213, '', 'LOCATION 12', 'SHELF1ASDA', 'RACK 1', NULL, '', 0, '2021-10-25 14:08:33', '2021-10-25 14:08:33'),
(76, 11, 'MANUAL', 'MANUAL', 4, '120.00', 'MANUAL', 10, 'LOT 2', 'LOCATION 12', 'SHELF1ASDA', 'RACK 1', '2021-10-29', '', 0, '2021-10-25 15:01:27', '2021-10-25 15:01:27'),
(77, 11, '1111111', 'VE-2021-10-0011', 24, '120.00', 'RECEIVE PO', 33, '', NULL, NULL, NULL, '2021-10-12', '', 0, '2021-10-29 10:52:11', '2021-10-29 10:52:11'),
(78, 11, '1111111', 'VE-2021-10-0011', 1, '150.00', 'RECEIVE PO', 1, '', 'LOCATION 12', 'SHELF1ASDA', 'RACK 1', NULL, '', 0, '2021-10-29 10:52:11', '2021-10-29 10:52:11'),
(79, 11, '1111111', 'VE-2021-10-0011', 32, '1000.00', 'RECEIVE PO', 1, 'LOT 2', 'LOCATION 12', 'SHELF1ASDA', 'RACK 1', NULL, '', 0, '2021-10-29 10:52:11', '2021-10-29 10:52:11'),
(220, 11, 'IMPORT', 'IMPORT', 73, '471.50', 'IMPORT', 1, 'JSP12056', 'WAREHOUSE', 'A', '1', '2023-06-21', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(221, 11, 'IMPORT', 'IMPORT', 74, '52.00', 'IMPORT', 1, 'JSP156450', 'STORE', 'D', '3', '2022-12-01', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(222, 11, 'IMPORT', 'IMPORT', 75, '500.00', 'IMPORT', 1, '', 'VIP', 'C', '4', NULL, '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(223, 11, 'IMPORT', 'IMPORT', 76, '60.00', 'IMPORT', 1, '', 'STORE', 'B', '2', NULL, '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(224, 11, 'IMPORT', 'IMPORT', 77, '22.08', 'IMPORT', 1, '67843', 'STORE', 'H', '5', '2024-09-01', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(225, 11, 'IMPORT', 'IMPORT', 78, '53.00', 'IMPORT', 1, '', 'STORE', 'K', '1', NULL, '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(226, 11, 'IMPORT', 'IMPORT', 79, '3.90', 'IMPORT', 1, '185236', 'STORE', 'L', '7', '2025-05-01', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(227, 11, 'IMPORT', 'IMPORT', 80, '490.00', 'IMPORT', 1, '56400', 'STORE', 'B', '6', '2024-12-08', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(228, 11, 'IMPORT', 'IMPORT', 81, '129.00', 'IMPORT', 1, 'HS283', 'STORE', 'G', '2', '2023-03-12', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(229, 11, 'IMPORT', 'IMPORT', 82, '129.00', 'IMPORT', 1, '1A4590', 'STORE', 'B', '8', NULL, '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(230, 11, 'IMPORT', 'IMPORT', 83, '82.50', 'IMPORT', 1, '171950', 'STORE', 'B', '10', '2026-09-23', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(231, 11, 'IMPORT', 'IMPORT', 84, '263.50', 'IMPORT', 1, '1CO745', 'STORE', 'F', '2', NULL, '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(232, 11, 'IMPORT', 'IMPORT', 85, '355.00', 'IMPORT', 1, '', 'STORE', 'C', '4', NULL, '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(233, 11, 'IMPORT', 'IMPORT', 86, '40.00', 'IMPORT', 1, '156230', 'VIP', 'A', '5', '2024-05-08', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(234, 11, 'IMPORT', 'IMPORT', 87, '111.00', 'IMPORT', 1, 'HKJ345', 'STORE', 'B', '3', '2025-01-23', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(235, 11, 'IMPORT', 'IMPORT', 88, '14.00', 'IMPORT', 1, 'A15623', 'STORE', 'D', '2', '2023-07-22', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(236, 11, 'IMPORT', 'IMPORT', 89, '53.00', 'IMPORT', 1, 'LK01256', 'STORE', 'E', '1', '2026-01-01', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(237, 11, 'IMPORT', 'IMPORT', 90, '275.00', 'IMPORT', 1, '', 'POS', 'I', '4', NULL, '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(238, 11, 'IMPORT', 'IMPORT', 91, '45.00', 'IMPORT', 1, '1HSDJ4', 'VIP', 'A', '6', '2025-12-01', '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(239, 11, 'IMPORT', 'IMPORT', 92, '5800.00', 'IMPORT', 1, '', 'WAREHOUSE', 'A', '8', NULL, '', 0, '2021-11-02 14:28:27', '2021-11-02 14:28:27'),
(240, 11, 'IMPORT', 'IMPORT', 73, '471.50', 'IMPORT', 1, 'JSP12056', 'WAREHOUSE', 'A', '1', '2023-06-21', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(241, 11, 'IMPORT', 'IMPORT', 74, '52.00', 'IMPORT', 1, 'JSP156450', 'STORE', 'D', '3', '2022-12-01', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(242, 11, 'IMPORT', 'IMPORT', 75, '500.00', 'IMPORT', 1, '', 'VIP', 'C', '4', NULL, '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(243, 11, 'IMPORT', 'IMPORT', 76, '60.00', 'IMPORT', 1, '', 'STORE', 'B', '2', NULL, '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(244, 11, 'IMPORT', 'IMPORT', 77, '22.08', 'IMPORT', 1, '67843', 'STORE', 'H', '5', '2024-09-01', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(245, 11, 'IMPORT', 'IMPORT', 78, '53.00', 'IMPORT', 1, '', 'STORE', 'K', '1', NULL, '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(246, 11, 'IMPORT', 'IMPORT', 79, '3.90', 'IMPORT', 1, '185236', 'STORE', 'L', '7', '2025-05-01', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(247, 11, 'IMPORT', 'IMPORT', 80, '490.00', 'IMPORT', 1, '56400', 'STORE', 'B', '6', '2024-12-08', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(248, 11, 'IMPORT', 'IMPORT', 81, '129.00', 'IMPORT', 1, 'HS283', 'STORE', 'G', '2', '2023-03-12', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(249, 11, 'IMPORT', 'IMPORT', 82, '129.00', 'IMPORT', 1, '1A4590', 'STORE', 'B', '8', NULL, '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(250, 11, 'IMPORT', 'IMPORT', 83, '82.50', 'IMPORT', 1, '171950', 'STORE', 'B', '10', '2026-09-23', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(251, 11, 'IMPORT', 'IMPORT', 84, '263.50', 'IMPORT', 1, '1CO745', 'STORE', 'F', '2', NULL, '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(252, 11, 'IMPORT', 'IMPORT', 85, '355.00', 'IMPORT', 1, '', 'STORE', 'C', '4', NULL, '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(253, 11, 'IMPORT', 'IMPORT', 86, '40.00', 'IMPORT', 1, '156230', 'VIP', 'A', '5', '2024-05-08', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(254, 11, 'IMPORT', 'IMPORT', 87, '111.00', 'IMPORT', 1, 'HKJ345', 'STORE', 'B', '3', '2025-01-23', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(255, 11, 'IMPORT', 'IMPORT', 88, '14.00', 'IMPORT', 1, 'A15623', 'STORE', 'D', '2', '2023-07-22', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(256, 11, 'IMPORT', 'IMPORT', 89, '53.00', 'IMPORT', 1, 'LK01256', 'STORE', 'E', '1', '2026-01-01', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(257, 11, 'IMPORT', 'IMPORT', 90, '275.00', 'IMPORT', 1, '', 'STORE', 'I', '4', NULL, '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(258, 11, 'IMPORT', 'IMPORT', 91, '45.00', 'IMPORT', 1, '1HSDJ4', 'VIP', 'A', '6', '2025-12-01', '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(259, 11, 'IMPORT', 'IMPORT', 93, '5800.00', 'IMPORT', 1, '', 'WAREHOUSE', 'A', '8', NULL, '', 0, '2021-11-02 14:36:59', '2021-11-02 14:36:59'),
(260, 11, 'IMPORT', 'IMPORT', 73, '471.50', 'IMPORT', 1, 'JSP12056', 'WAREHOUSE', 'A', '1', '2023-06-21', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(261, 11, 'IMPORT', 'IMPORT', 74, '52.00', 'IMPORT', 1, 'JSP156450', 'STORE', 'D', '3', '2022-12-01', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(262, 11, 'IMPORT', 'IMPORT', 75, '500.00', 'IMPORT', 1, '', 'VIP', 'C', '4', NULL, '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(263, 11, 'IMPORT', 'IMPORT', 76, '60.00', 'IMPORT', 1, '', 'STORE', 'B', '2', NULL, '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(264, 11, 'IMPORT', 'IMPORT', 77, '22.08', 'IMPORT', 1, '67843', 'STORE', 'H', '5', '2024-09-01', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(265, 11, 'IMPORT', 'IMPORT', 78, '53.00', 'IMPORT', 1, '', 'STORE', 'K', '1', NULL, '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(266, 11, 'IMPORT', 'IMPORT', 79, '3.90', 'IMPORT', 1, '185236', 'STORE', 'L', '7', '2025-05-01', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(267, 11, 'IMPORT', 'IMPORT', 80, '490.00', 'IMPORT', 1, '56400', 'STORE', 'B', '6', '2024-12-08', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(268, 11, 'IMPORT', 'IMPORT', 81, '129.00', 'IMPORT', 1, 'HS283', 'STORE', 'G', '2', '2023-03-12', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(269, 11, 'IMPORT', 'IMPORT', 82, '129.00', 'IMPORT', 1, '1A4590', 'STORE', 'B', '8', NULL, '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(270, 11, 'IMPORT', 'IMPORT', 83, '82.50', 'IMPORT', 1, '171950', 'STORE', 'B', '10', '2026-09-23', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(271, 11, 'IMPORT', 'IMPORT', 84, '263.50', 'IMPORT', 1, '1CO745', 'STORE', 'F', '2', NULL, '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(272, 11, 'IMPORT', 'IMPORT', 85, '355.00', 'IMPORT', 1, '', 'STORE', 'C', '4', NULL, '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(273, 11, 'IMPORT', 'IMPORT', 86, '40.00', 'IMPORT', 1, '156230', 'VIP', 'A', '5', '2024-05-08', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(274, 11, 'IMPORT', 'IMPORT', 87, '111.00', 'IMPORT', 1, 'HKJ345', 'STORE', 'B', '3', '2025-01-23', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(275, 11, 'IMPORT', 'IMPORT', 88, '14.00', 'IMPORT', 1, 'A15623', 'STORE', 'D', '2', '2023-07-22', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(276, 11, 'IMPORT', 'IMPORT', 89, '53.00', 'IMPORT', 1, 'LK01256', 'STORE', 'E', '1', '2026-01-01', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(277, 11, 'IMPORT', 'IMPORT', 90, '275.00', 'IMPORT', 1, '', 'STORE', 'I', '4', NULL, '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(278, 11, 'IMPORT', 'IMPORT', 91, '45.00', 'IMPORT', 1, '1HSDJ4', 'VIP', 'A', '6', '2025-12-01', '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(279, 11, 'IMPORT', 'IMPORT', 94, '5800.00', 'IMPORT', 1, '', 'WAREHOUSE', 'A', '8', NULL, '', 0, '2021-11-02 14:37:18', '2021-11-02 14:37:18'),
(299, 11, 'IMPORT', 'IMPORT', 73, '471.50', 'IMPORT', 1, 'JSP12056', 'WAREHOUSE', 'A', '1', '2023-06-21', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(300, 11, 'IMPORT', 'IMPORT', 74, '52.00', 'IMPORT', 1, 'JSP156450', 'STORE', 'D', '3', '2022-12-01', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(301, 11, 'IMPORT', 'IMPORT', 75, '500.00', 'IMPORT', 1, '', 'VIP', 'C', '4', NULL, '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(302, 11, 'IMPORT', 'IMPORT', 76, '60.00', 'IMPORT', 1, '', 'STORE', 'B', '2', NULL, '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(303, 11, 'IMPORT', 'IMPORT', 77, '22.08', 'IMPORT', 1, '67843', 'STORE', 'H', '5', '2024-09-01', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(304, 11, 'IMPORT', 'IMPORT', 78, '53.00', 'IMPORT', 1, '', 'STORE', 'K', '1', NULL, '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(305, 11, 'IMPORT', 'IMPORT', 79, '3.90', 'IMPORT', 1, '185236', 'STORE', 'L', '7', '2025-05-01', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(306, 11, 'IMPORT', 'IMPORT', 80, '490.00', 'IMPORT', 1, '56400', 'STORE', 'B', '6', '2024-12-08', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(307, 11, 'IMPORT', 'IMPORT', 81, '129.00', 'IMPORT', 1, 'HS283', 'STORE', 'G', '2', '2023-03-12', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(308, 11, 'IMPORT', 'IMPORT', 82, '129.00', 'IMPORT', 1, '1A4590', 'STORE', 'B', '8', NULL, '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(309, 11, 'IMPORT', 'IMPORT', 83, '82.50', 'IMPORT', 1, '171950', 'STORE', 'B', '10', '2026-09-23', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(310, 11, 'IMPORT', 'IMPORT', 84, '263.50', 'IMPORT', 1, '1CO745', 'STORE', 'F', '2', NULL, '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(311, 11, 'IMPORT', 'IMPORT', 85, '355.00', 'IMPORT', 1, '', 'STORE', 'C', '4', NULL, '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(312, 11, 'IMPORT', 'IMPORT', 86, '40.00', 'IMPORT', 1, '156230', 'VIP', 'A', '5', '2024-05-08', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(313, 11, 'IMPORT', 'IMPORT', 87, '111.00', 'IMPORT', 1, 'HKJ345', 'STORE', 'B', '3', '2025-01-23', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(314, 11, 'IMPORT', 'IMPORT', 88, '14.00', 'IMPORT', 1, 'A15623', 'STORE', 'D', '2', '2023-07-22', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(315, 11, 'IMPORT', 'IMPORT', 89, '53.00', 'IMPORT', 1, 'LK01256', 'STORE', 'E', '1', '2026-01-01', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(316, 11, 'IMPORT', 'IMPORT', 90, '275.00', 'IMPORT', 1, '', 'STORE', 'I', '4', NULL, '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(317, 11, 'IMPORT', 'IMPORT', 91, '45.00', 'IMPORT', 1, '1HSDJ4', 'VIP', 'A', '6', '2025-12-01', '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(318, 11, 'IMPORT', 'IMPORT', 92, '5800.00', 'IMPORT', 1, '', 'WAREHOUSE', 'A', '8', NULL, '', 0, '2021-11-02 14:39:34', '2021-11-02 14:39:34'),
(319, 11, 'IMPORT', 'IMPORT', 73, '471.50', 'IMPORT', 1, 'JSP12056', 'WAREHOUSE', 'A', '1', '2023-06-21', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(320, 11, 'IMPORT', 'IMPORT', 74, '52.00', 'IMPORT', 1, 'JSP156450', 'STORE', 'D', '3', '2022-12-01', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(321, 11, 'IMPORT', 'IMPORT', 75, '500.00', 'IMPORT', 1, '', 'VIP', 'C', '4', NULL, '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(322, 11, 'IMPORT', 'IMPORT', 76, '60.00', 'IMPORT', 1, '', 'STORE', 'B', '2', NULL, '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(323, 11, 'IMPORT', 'IMPORT', 77, '22.08', 'IMPORT', 1, '67843', 'STORE', 'H', '5', '2024-09-01', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(324, 11, 'IMPORT', 'IMPORT', 78, '53.00', 'IMPORT', 1, '', 'STORE', 'K', '1', NULL, '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(325, 11, 'IMPORT', 'IMPORT', 79, '3.90', 'IMPORT', 1, '185236', 'STORE', 'L', '7', '2025-05-01', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(326, 11, 'IMPORT', 'IMPORT', 80, '490.00', 'IMPORT', 1, '56400', 'STORE', 'B', '6', '2024-12-08', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(327, 11, 'IMPORT', 'IMPORT', 81, '129.00', 'IMPORT', 1, 'HS283', 'STORE', 'G', '2', '2023-03-12', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(328, 11, 'IMPORT', 'IMPORT', 82, '129.00', 'IMPORT', 1, '1A4590', 'STORE', 'B', '8', NULL, '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(329, 11, 'IMPORT', 'IMPORT', 83, '82.50', 'IMPORT', 1, '171950', 'STORE', 'B', '10', '2026-09-23', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(330, 11, 'IMPORT', 'IMPORT', 84, '263.50', 'IMPORT', 1, '1CO745', 'STORE', 'F', '2', NULL, '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(331, 11, 'IMPORT', 'IMPORT', 85, '355.00', 'IMPORT', 1, '', 'STORE', 'C', '4', NULL, '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(332, 11, 'IMPORT', 'IMPORT', 86, '40.00', 'IMPORT', 1, '156230', 'VIP', 'A', '5', '2024-05-08', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(333, 11, 'IMPORT', 'IMPORT', 87, '111.00', 'IMPORT', 1, 'HKJ345', 'STORE', 'B', '3', '2025-01-23', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(334, 11, 'IMPORT', 'IMPORT', 88, '14.00', 'IMPORT', 1, 'A15623', 'STORE', 'D', '2', '2023-07-22', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(335, 11, 'IMPORT', 'IMPORT', 89, '53.00', 'IMPORT', 1, 'LK01256', 'STORE', 'E', '1', '2026-01-01', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(336, 11, 'IMPORT', 'IMPORT', 90, '275.00', 'IMPORT', 1, '', 'STORE', 'I', '4', NULL, '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(337, 11, 'IMPORT', 'IMPORT', 91, '45.00', 'IMPORT', 1, '1HSDJ4', 'VIP', 'A', '6', '2025-12-01', '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(338, 11, 'IMPORT', 'IMPORT', 92, '5800.00', 'IMPORT', 1, '', 'WAREHOUSE', 'A', '8', NULL, '', 0, '2021-11-02 14:39:56', '2021-11-02 14:39:56'),
(339, 11, 'IMPORT', 'IMPORT', 73, '471.50', 'IMPORT', 1, 'JSP12056', 'WAREHOUSE', 'A', '1', '2023-06-21', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(340, 11, 'IMPORT', 'IMPORT', 74, '52.00', 'IMPORT', 1, 'JSP156450', 'STORE', 'D', '3', '2022-12-01', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(341, 11, 'IMPORT', 'IMPORT', 75, '500.00', 'IMPORT', 1, '', 'VIP', 'C', '4', NULL, '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(342, 11, 'IMPORT', 'IMPORT', 76, '60.00', 'IMPORT', 1, '', 'STORE', 'B', '2', NULL, '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(343, 11, 'IMPORT', 'IMPORT', 77, '22.08', 'IMPORT', 1, '67843', 'STORE', 'H', '5', '2024-09-01', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(344, 11, 'IMPORT', 'IMPORT', 78, '53.00', 'IMPORT', 1, '', 'STORE', 'K', '1', NULL, '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(345, 11, 'IMPORT', 'IMPORT', 79, '3.90', 'IMPORT', 1, '185236', 'STORE', 'L', '7', '2025-05-01', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(346, 11, 'IMPORT', 'IMPORT', 80, '490.00', 'IMPORT', 1, '56400', 'STORE', 'B', '6', '2024-12-08', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(347, 11, 'IMPORT', 'IMPORT', 81, '129.00', 'IMPORT', 1, 'HS283', 'STORE', 'G', '2', '2023-03-12', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(348, 11, 'IMPORT', 'IMPORT', 82, '129.00', 'IMPORT', 1, '1A4590', 'STORE', 'B', '8', NULL, '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(349, 11, 'IMPORT', 'IMPORT', 83, '82.50', 'IMPORT', 1, '171950', 'STORE', 'B', '10', '2026-09-23', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(350, 11, 'IMPORT', 'IMPORT', 84, '263.50', 'IMPORT', 1, '1CO745', 'STORE', 'F', '2', NULL, '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(351, 11, 'IMPORT', 'IMPORT', 85, '355.00', 'IMPORT', 1, '', 'STORE', 'C', '4', NULL, '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(352, 11, 'IMPORT', 'IMPORT', 86, '40.00', 'IMPORT', 1, '156230', 'VIP', 'A', '5', '2024-05-08', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(353, 11, 'IMPORT', 'IMPORT', 87, '111.00', 'IMPORT', 1, 'HKJ345', 'STORE', 'B', '3', '2025-01-23', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(354, 11, 'IMPORT', 'IMPORT', 88, '14.00', 'IMPORT', 1, 'A15623', 'STORE', 'D', '2', '2023-07-22', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(355, 11, 'IMPORT', 'IMPORT', 89, '53.00', 'IMPORT', 1, 'LK01256', 'STORE', 'E', '1', '2026-01-01', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(356, 11, 'IMPORT', 'IMPORT', 90, '275.00', 'IMPORT', 1, '', 'STORE', 'I', '4', NULL, '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(357, 11, 'IMPORT', 'IMPORT', 91, '45.00', 'IMPORT', 1, '1HSDJ4', 'VIP', 'A', '6', '2025-12-01', '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(358, 11, 'IMPORT', 'IMPORT', 92, '5800.00', 'IMPORT', 1, '', 'WAREHOUSE', 'A', '8', NULL, '', 0, '2021-11-02 14:43:09', '2021-11-02 14:43:09'),
(359, 11, 'IMPORT', 'IMPORT', 73, '471.50', 'IMPORT', 1, 'JSP12056', 'WAREHOUSE', 'A', '1', '2023-06-21', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(360, 11, 'IMPORT', 'IMPORT', 74, '52.00', 'IMPORT', 1, 'JSP156450', 'STORE', 'D', '3', '2022-12-01', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(361, 11, 'IMPORT', 'IMPORT', 75, '500.00', 'IMPORT', 1, '', 'VIP', 'C', '4', NULL, '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(362, 11, 'IMPORT', 'IMPORT', 76, '60.00', 'IMPORT', 1, '', 'STORE', 'B', '2', NULL, '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(363, 11, 'IMPORT', 'IMPORT', 77, '22.08', 'IMPORT', 1, '67843', 'STORE', 'H', '5', '2024-09-01', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(364, 11, 'IMPORT', 'IMPORT', 78, '53.00', 'IMPORT', 1, '', 'STORE', 'K', '1', NULL, '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(365, 11, 'IMPORT', 'IMPORT', 79, '3.90', 'IMPORT', 1, '185236', 'STORE', 'L', '7', '2025-05-01', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(366, 11, 'IMPORT', 'IMPORT', 80, '490.00', 'IMPORT', 1, '56400', 'STORE', 'B', '6', '2024-12-08', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(367, 11, 'IMPORT', 'IMPORT', 81, '129.00', 'IMPORT', 1, 'HS283', 'STORE', 'G', '2', '2023-03-12', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(368, 11, 'IMPORT', 'IMPORT', 82, '129.00', 'IMPORT', 1, '1A4590', 'STORE', 'B', '8', NULL, '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(369, 11, 'IMPORT', 'IMPORT', 83, '82.50', 'IMPORT', 1, '171950', 'STORE', 'B', '10', '2026-09-23', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(370, 11, 'IMPORT', 'IMPORT', 84, '263.50', 'IMPORT', 1, '1CO745', 'STORE', 'F', '2', NULL, '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(371, 11, 'IMPORT', 'IMPORT', 85, '355.00', 'IMPORT', 1, '', 'STORE', 'C', '4', NULL, '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(372, 11, 'IMPORT', 'IMPORT', 86, '40.00', 'IMPORT', 1, '156230', 'VIP', 'A', '5', '2024-05-08', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(373, 11, 'IMPORT', 'IMPORT', 87, '111.00', 'IMPORT', 1, 'HKJ345', 'STORE', 'B', '3', '2025-01-23', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(374, 11, 'IMPORT', 'IMPORT', 88, '14.00', 'IMPORT', 1, 'A15623', 'STORE', 'D', '2', '2023-07-22', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(375, 11, 'IMPORT', 'IMPORT', 89, '53.00', 'IMPORT', 1, 'LK01256', 'STORE', 'E', '1', '2026-01-01', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(376, 11, 'IMPORT', 'IMPORT', 90, '275.00', 'IMPORT', 1, '', 'STORE', 'I', '4', NULL, '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(377, 11, 'IMPORT', 'IMPORT', 91, '45.00', 'IMPORT', 1, '1HSDJ4', 'VIP', 'A', '6', '2025-12-01', '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(378, 11, 'IMPORT', 'IMPORT', 92, '5800.00', 'IMPORT', 1, '', 'WAREHOUSE', 'A', '8', NULL, '', 0, '2021-11-02 14:44:12', '2021-11-02 14:44:12'),
(379, 11, 'IMPORT', 'IMPORT', 73, '471.50', 'IMPORT', 1, 'JSP12056', 'WAREHOUSE', 'A', '1', '2023-06-21', '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(380, 11, 'IMPORT', 'IMPORT', 74, '52.00', 'IMPORT', 1, 'JSP156450', 'STORE', 'D', '3', '2022-12-01', '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(381, 11, 'IMPORT', 'IMPORT', 75, '500.00', 'IMPORT', 1, '', 'VIP', 'C', '4', NULL, '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(382, 11, 'IMPORT', 'IMPORT', 76, '60.00', 'IMPORT', 1, '', 'STORE', 'B', '2', NULL, '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(383, 11, 'IMPORT', 'IMPORT', 77, '22.08', 'IMPORT', 1, '67843', 'STORE', 'H', '5', '2024-09-01', '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(384, 11, 'IMPORT', 'IMPORT', 78, '53.00', 'IMPORT', 1, '', 'STORE', 'K', '1', NULL, '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(385, 11, 'IMPORT', 'IMPORT', 79, '3.90', 'IMPORT', 1, '185236', 'STORE', 'L', '7', '2025-05-01', '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(386, 11, 'IMPORT', 'IMPORT', 80, '490.00', 'IMPORT', 1, '56400', 'STORE', 'B', '6', '2024-12-08', '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(387, 11, 'IMPORT', 'IMPORT', 81, '129.00', 'IMPORT', 1, 'HS283', 'STORE', 'G', '2', '2023-03-12', '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(388, 11, 'IMPORT', 'IMPORT', 82, '129.00', 'IMPORT', 1, '1A4590', 'STORE', 'B', '8', NULL, '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(389, 11, 'IMPORT', 'IMPORT', 83, '82.50', 'IMPORT', 1, '171950', 'STORE', 'B', '10', '2026-09-23', '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(390, 11, 'IMPORT', 'IMPORT', 84, '263.50', 'IMPORT', 1, '1CO745', 'STORE', 'F', '2', NULL, '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(391, 11, 'IMPORT', 'IMPORT', 85, '355.00', 'IMPORT', 1, '', 'STORE', 'C', '4', NULL, '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(392, 11, 'IMPORT', 'IMPORT', 86, '40.00', 'IMPORT', 1, '156230', 'VIP', 'A', '5', '2024-05-08', '', 0, '2021-11-02 14:48:18', '2021-11-02 14:48:18'),
(393, 11, 'IMPORT', 'IMPORT', 87, '111.00', 'IMPORT', 1, 'HKJ345', 'STORE', 'B', '3', '2025-01-23', '', 0, '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(394, 11, 'IMPORT', 'IMPORT', 88, '14.00', 'IMPORT', 1, 'A15623', 'STORE', 'D', '2', '2023-07-22', '', 0, '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(395, 11, 'IMPORT', 'IMPORT', 89, '53.00', 'IMPORT', 1, 'LK01256', 'STORE', 'E', '1', '2026-01-01', '', 0, '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(396, 11, 'IMPORT', 'IMPORT', 90, '275.00', 'IMPORT', 1, '', 'STORE', 'I', '4', NULL, '', 0, '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(397, 11, 'IMPORT', 'IMPORT', 91, '45.00', 'IMPORT', 1, '1HSDJ4', 'VIP', 'A', '6', '2025-12-01', '', 0, '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(398, 11, 'IMPORT', 'IMPORT', 92, '5800.00', 'IMPORT', 1, '', 'WAREHOUSE', 'A', '8', NULL, '', 0, '2021-11-02 14:48:19', '2021-11-02 14:48:19'),
(399, 11, 'IMPORT', 'IMPORT', 73, '471.50', 'IMPORT', 10, 'JSP12056', 'WAREHOUSE', 'A', '1', '2023-06-21', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(400, 11, 'IMPORT', 'IMPORT', 74, '52.00', 'IMPORT', 20, 'JSP156450', 'STORE', 'D', '3', '2022-12-01', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(401, 11, 'IMPORT', 'IMPORT', 75, '500.00', 'IMPORT', 50, '', 'VIP', 'C', '4', NULL, '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(402, 11, 'IMPORT', 'IMPORT', 76, '60.00', 'IMPORT', 1, '', 'STORE', 'B', '2', NULL, '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(403, 11, 'IMPORT', 'IMPORT', 77, '22.08', 'IMPORT', 1, '67843', 'STORE', 'H', '5', '2024-09-01', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(404, 11, 'IMPORT', 'IMPORT', 78, '53.00', 'IMPORT', 1, '', 'STORE', 'K', '1', NULL, '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(405, 11, 'IMPORT', 'IMPORT', 79, '3.90', 'IMPORT', 5, '185236', 'STORE', 'L', '7', '2025-05-01', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(406, 11, 'IMPORT', 'IMPORT', 80, '490.00', 'IMPORT', 5, '56400', 'STORE', 'B', '6', '2024-12-08', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(407, 11, 'IMPORT', 'IMPORT', 81, '129.00', 'IMPORT', 5, 'HS283', 'STORE', 'G', '2', '2023-03-12', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(408, 11, 'IMPORT', 'IMPORT', 82, '129.00', 'IMPORT', 40, '1A4590', 'STORE', 'B', '8', NULL, '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(409, 11, 'IMPORT', 'IMPORT', 83, '82.50', 'IMPORT', 1, '171950', 'STORE', 'B', '10', '2026-09-23', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(410, 11, 'IMPORT', 'IMPORT', 84, '263.50', 'IMPORT', 1, '1CO745', 'STORE', 'F', '2', NULL, '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(411, 11, 'IMPORT', 'IMPORT', 85, '355.00', 'IMPORT', 1, '', 'STORE', 'C', '4', NULL, '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(412, 11, 'IMPORT', 'IMPORT', 86, '40.00', 'IMPORT', 10, '156230', 'VIP', 'A', '5', '2024-05-08', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(413, 11, 'IMPORT', 'IMPORT', 87, '111.00', 'IMPORT', 1, 'HKJ345', 'STORE', 'B', '3', '2025-01-23', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(414, 11, 'IMPORT', 'IMPORT', 88, '14.00', 'IMPORT', 1, 'A15623', 'STORE', 'D', '2', '2023-07-22', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(415, 11, 'IMPORT', 'IMPORT', 89, '53.00', 'IMPORT', 1, 'LK01256', 'STORE', 'E', '1', '2026-01-01', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(416, 11, 'IMPORT', 'IMPORT', 90, '275.00', 'IMPORT', 1100, '', 'STORE', 'I', '4', NULL, '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(417, 11, 'IMPORT', 'IMPORT', 91, '45.00', 'IMPORT', 1, '1HSDJ4', 'VIP', 'A', '6', '2025-12-01', '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(418, 11, 'IMPORT', 'IMPORT', 92, '5800.00', 'IMPORT', 1, '', 'WAREHOUSE', 'A', '8', NULL, '', 0, '2021-11-03 11:46:21', '2021-11-03 11:46:21'),
(419, 11, 'MANUAL', 'MANUAL', 31, '1500.00', 'MANUAL', 100, '185236', 'STORE', 'C', 'RACK 4', '2021-11-26', '', 0, '2021-11-03 12:30:28', '2021-11-03 12:30:28'),
(420, 11, 'IMPORT', 'IMPORT', 73, '471.50', 'IMPORT', 10, 'JSP12056', 'WAREHOUSE', 'A', '1', '2023-06-21', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(421, 11, 'IMPORT', 'IMPORT', 74, '52.00', 'IMPORT', 20, 'JSP156450', 'STORE', 'D', '3', '2022-12-01', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(422, 11, 'IMPORT', 'IMPORT', 75, '500.00', 'IMPORT', 50, '', 'VIP', 'C', '4', NULL, '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(423, 11, 'IMPORT', 'IMPORT', 76, '60.00', 'IMPORT', 1, '', 'STORE', 'B', '2', NULL, '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(424, 11, 'IMPORT', 'IMPORT', 77, '22.08', 'IMPORT', 1, '67843', 'STORE', 'H', '5', '2024-09-01', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(425, 11, 'IMPORT', 'IMPORT', 78, '53.00', 'IMPORT', 1, '', 'STORE', 'K', '1', NULL, '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(426, 11, 'IMPORT', 'IMPORT', 79, '3.90', 'IMPORT', 5, '185236', 'STORE', 'L', '7', '2025-05-01', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(427, 11, 'IMPORT', 'IMPORT', 80, '490.00', 'IMPORT', 5, '56400', 'STORE', 'B', '6', '2024-12-08', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(428, 11, 'IMPORT', 'IMPORT', 81, '129.00', 'IMPORT', 5, 'HS283', 'STORE', 'G', '2', '2023-03-12', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(429, 11, 'IMPORT', 'IMPORT', 82, '129.00', 'IMPORT', 40, '1A4590', 'STORE', 'B', '8', NULL, '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(430, 11, 'IMPORT', 'IMPORT', 83, '82.50', 'IMPORT', 1, '171950', 'STORE', 'B', '10', '2026-09-23', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(431, 11, 'IMPORT', 'IMPORT', 84, '263.50', 'IMPORT', 1, '1CO745', 'STORE', 'F', '2', NULL, '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(432, 11, 'IMPORT', 'IMPORT', 85, '355.00', 'IMPORT', 1, '', 'STORE', 'C', '4', NULL, '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(433, 11, 'IMPORT', 'IMPORT', 86, '40.00', 'IMPORT', 10, '156230', 'VIP', 'A', '5', '2024-05-08', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(434, 11, 'IMPORT', 'IMPORT', 87, '111.00', 'IMPORT', 1, 'HKJ345', 'STORE', 'B', '3', '2025-01-23', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(435, 11, 'IMPORT', 'IMPORT', 88, '14.00', 'IMPORT', 1, 'A15623', 'STORE', 'D', '2', '2023-07-22', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(436, 11, 'IMPORT', 'IMPORT', 89, '53.00', 'IMPORT', 1, 'LK01256', 'STORE', 'E', '1', '2026-01-01', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(437, 11, 'IMPORT', 'IMPORT', 90, '275.00', 'IMPORT', 1100, '', 'STORE', 'I', '4', NULL, '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(438, 11, 'IMPORT', 'IMPORT', 91, '45.00', 'IMPORT', 1, '1HSDJ4', 'VIP', 'A', '6', '2025-12-01', '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(439, 11, 'IMPORT', 'IMPORT', 92, '5800.00', 'IMPORT', 1, '', 'WAREHOUSE', 'A', '8', NULL, '', 0, '2021-11-11 11:36:16', '2021-11-11 11:36:16'),
(440, 11, 'IMPORT', 'IMPORT', 73, '471.50', 'IMPORT', 10, 'JSP12056', 'WAREHOUSE', 'A', '1', '2023-06-21', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(441, 11, 'IMPORT', 'IMPORT', 74, '52.00', 'IMPORT', 20, 'JSP156450', 'STORE', 'D', '3', '2022-12-01', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(442, 11, 'IMPORT', 'IMPORT', 75, '500.00', 'IMPORT', 50, '', 'VIP', 'C', '4', NULL, '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(443, 11, 'IMPORT', 'IMPORT', 76, '60.00', 'IMPORT', 10000, '', 'STORE', 'B', '2', NULL, '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(444, 11, 'IMPORT', 'IMPORT', 77, '22.08', 'IMPORT', 10000, '67843', 'STORE', 'H', '5', '2024-09-01', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(445, 11, 'IMPORT', 'IMPORT', 78, '53.00', 'IMPORT', 10000, '', 'STORE', 'K', '1', NULL, '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(446, 11, 'IMPORT', 'IMPORT', 79, '3.90', 'IMPORT', 10000, '185236', 'STORE', 'L', '7', '2025-05-01', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(447, 11, 'IMPORT', 'IMPORT', 80, '490.00', 'IMPORT', 10000, '56400', 'STORE', 'B', '6', '2024-12-08', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(448, 11, 'IMPORT', 'IMPORT', 81, '129.00', 'IMPORT', 10000, 'HS283', 'STORE', 'G', '2', '2023-03-12', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(449, 11, 'IMPORT', 'IMPORT', 82, '129.00', 'IMPORT', 10000, '1A4590', 'STORE', 'B', '8', NULL, '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(450, 11, 'IMPORT', 'IMPORT', 83, '82.50', 'IMPORT', 10000, '171950', 'STORE', 'B', '10', '2026-09-23', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(451, 11, 'IMPORT', 'IMPORT', 84, '263.50', 'IMPORT', 10000, '1CO745', 'STORE', 'F', '2', NULL, '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(452, 11, 'IMPORT', 'IMPORT', 85, '355.00', 'IMPORT', 10000, '', 'STORE', 'C', '4', NULL, '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(453, 11, 'IMPORT', 'IMPORT', 86, '40.00', 'IMPORT', 10000, '156230', 'VIP', 'A', '5', '2024-05-08', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(454, 11, 'IMPORT', 'IMPORT', 87, '111.00', 'IMPORT', 10000, 'HKJ345', 'STORE', 'B', '3', '2025-01-23', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(455, 11, 'IMPORT', 'IMPORT', 88, '14.00', 'IMPORT', 10000, 'A15623', 'STORE', 'D', '2', '2023-07-22', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(456, 11, 'IMPORT', 'IMPORT', 89, '53.00', 'IMPORT', 10000, 'LK01256', 'STORE', 'E', '1', '2026-01-01', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(457, 11, 'IMPORT', 'IMPORT', 90, '275.00', 'IMPORT', 10000, '', 'STORE', 'I', '4', NULL, '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(458, 11, 'IMPORT', 'IMPORT', 91, '45.00', 'IMPORT', 10000, '1HSDJ4', 'VIP', 'A', '6', '2025-12-01', '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(459, 11, 'IMPORT', 'IMPORT', 92, '5800.00', 'IMPORT', 10000, '', 'WAREHOUSE', 'A', '8', NULL, '', 0, '2021-11-11 12:20:56', '2021-11-11 12:20:56'),
(460, 11, 'MANUAL', 'MANUAL', 1, '120.00', 'MANUAL ADD', 1, '', 'LOCATION 12', 'SHELF1ASDA', 'RACK 1', NULL, '', 0, '2021-12-01 12:59:25', '2021-12-01 12:59:25'),
(461, 11, 'MANUAL', 'MANUAL', 1, '120.00', 'MANUAL MINUS', 1, '', 'LOCATION 12', 'SHELF 5', 'RACK 1', NULL, '', 0, '2021-12-01 13:03:58', '2021-12-01 13:03:58'),
(462, 11, '321111', 'VE-2021-12-0012', 1, '300.00', 'RECEIVE PO', 50, '', 'LOCATION 12', 'SHELF 5', 'RACK 1', NULL, '', 0, '2021-12-12 12:30:13', '2021-12-12 12:30:13'),
(463, 11, '123456', 'VE-2021-12-0012', 1, '300.00', 'RECEIVE PO', 20, '', 'LOCATION 12', 'SHELF 5', 'RACK 1', NULL, '', 0, '2021-12-12 12:33:43', '2021-12-12 12:33:43'),
(464, 18, '12345678000', 'VE-2021-12-0012', 1, '300.00', 'RECEIVE PO', 30, '', 'LOCATION 12', 'SHELF 5', 'RACK 1', NULL, '', 0, '2021-12-23 11:48:13', '2021-12-23 11:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `user_id`, `unit`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 'asds2', 0, '2021-08-23 12:53:41', '2021-08-23 15:22:05'),
(2, 11, 'GAL.', 0, '2021-10-31 04:11:07', '2021-10-31 04:11:07'),
(3, 11, 'BOT.', 0, '2021-10-31 04:11:07', '2021-10-31 04:11:07'),
(4, 11, 'PC.', 0, '2021-10-31 04:11:07', '2021-10-31 04:11:07'),
(5, 11, 'ROLL.', 0, '2021-10-31 04:11:07', '2021-10-31 04:11:07'),
(6, 11, 'UNIT.', 0, '2021-10-31 04:11:07', '2021-10-31 04:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `areacode` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `branch` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `areacode`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `branch`) VALUES
(1, 'mark christian fernandez', '', 'admin-inventory@gmail.com', NULL, '$2y$10$mbwYxpRaoh1eiddbCbealupi4ch7107j3DlkJy.TWW8IPkZsRdD1K', 'wRcqHkD00l1KRVu2wrTxQckAhDHtQVHy4WaRS90a8223TI3ta8hSH2o06LNx', '2020-11-07 08:28:40', '2021-02-08 03:01:54', 1, NULL),
(2, 'Precious Casero', '', 'casero@gmail.com', NULL, '$2y$10$q50HviEqzewAUec.FumxweVFWxk1Rxkv8a3RA0xoxLdGFkVc3Hp6a', NULL, '2020-11-29 22:06:17', '2020-11-29 22:06:17', 2, NULL),
(3, 'Vina Joy Rivera', '', 'vinajoy@gmail.com', NULL, '$2y$10$leM7Teojx1Nqik/RbKRF8.1Yw3BsQeLIu7c4d0UfT7hM7b.qb1vxq', 'oEBWwySw0RCzJpWWNlnWZlbzU145DqxAFWMv0DEeZKKfC1mBjComDXmpU3au', '2020-12-01 05:43:17', '2020-12-01 05:43:17', 1, NULL),
(4, 'admin 1', '', 'admin-pos@gmail.com', NULL, '$2y$10$BGtyrqyDlQT0mawTmqo/JO/wUCrC909g8sDCJ5wGfY.ABZCkFIpPy', 'WIf5IGFYcJff7AoZTJfmmHf1Hmqu9ykKYOF8EFwbdRfO8wpr4xLFEG5wtUQU', '2020-12-18 16:37:42', '2020-12-18 16:37:42', 1, 'STORE'),
(5, 'user 1', '', 'user1234@gmail.com', NULL, '$2y$10$yytqzOm09Y75jXN9H.jiO.007VrJ6Z8aNA6Uzcbdh099lWAUPR04u', 'a4OBI1hoG6ECVBsXSSZYKoUZpEOXxKA6NGuwtbInlQTDSdPEKrVbkYhsl7ZS', '2020-12-18 16:38:21', '2020-12-18 16:38:21', 0, NULL),
(6, 'Mark Christian Fernandez', '', 'user12345@gmail.com', NULL, '$2y$10$TYOd4Kl/2Hyv8UL8EDCe7.lqfQGTs/85wemR7aBfiCaDrz/w4OUUe', NULL, '2020-12-28 22:37:47', '2020-12-28 22:37:47', 0, NULL),
(7, 'janine bairan', '', 'bairan@gmail.com', NULL, '$2y$10$eqH4O6LZyFs5GJpSZKDZp.Ws8ikqhFnEMK5ohXfYG1DVcD2nkyR..', NULL, '2021-02-02 03:03:27', '2021-02-02 03:03:27', 0, NULL),
(9, 'janine bairan', '', 'bairan1@gmail.com', NULL, '$2y$10$tK9clwzK/7/4VurNjCmMpeJc95QmHULbx/kMbwPYjvEt2CVVHt0gu', NULL, '2021-02-02 03:23:59', '2021-02-02 03:23:59', 0, NULL),
(10, 'janine bairan', 'IN HOUSE', 'bairanqweqw@gmail.com', NULL, '$2y$10$oBugNx/XTUNUsYsVMeugBuPNWQ4k8.9eELMo17L3eK7wirUnBbVoK', NULL, '2021-02-02 03:48:22', '2021-02-02 03:48:22', 0, NULL),
(11, 'joe', 'NUEVA ECIJA', 'irincomanuel@gmail.com', NULL, '$2y$10$RMdw7XrYCqjmpC0AUBkuwuie/vQ6cZUWASbeBzSkaDKw/Lkl/PHfG', NULL, '2021-08-09 17:18:53', '2021-08-09 17:18:53', 2, 'STORE'),
(12, 'julius dizon', 'NUEVA ECIJA', 'juluis@gmail.com', NULL, '$2y$10$mbwYxpRaoh1eiddbCbealupi4ch7107j3DlkJy.TWW8IPkZsRdD1K', NULL, '2021-11-03 11:49:37', '2021-11-03 11:49:37', 1, NULL),
(17, 'JOE 2', 'TARLAC', 'irincomanuel2@gmail.com', NULL, '$2y$10$APMoY78eNXZpUg9MNzkoTu7CNcDYbaFk0LyOuXSWNOXyAlqDpKdsu', NULL, '2021-12-22 13:59:27', '2021-12-22 13:59:27', 1, NULL),
(18, 'VALLERY ADMIN', 'NUEVA ECIJA', 'admin12341@gmail.com', NULL, '$2y$10$07eOYETySKdA3xU/WjyxUutaIZxvypnPoMahnWLmR2EaArT4FIpye', NULL, '2021-12-23 11:41:27', '2021-12-23 11:41:27', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_product` int(11) NOT NULL,
  `edit_product` int(11) NOT NULL,
  `view_polist` int(11) NOT NULL,
  `receive_polist` int(11) NOT NULL,
  `edit_polist` int(11) NOT NULL,
  `add_new_supplier` int(11) NOT NULL,
  `edit_supplier` int(11) NOT NULL,
  `delete_supplier` int(11) NOT NULL,
  `submit_po_form` int(11) NOT NULL,
  `add_product_form` int(11) NOT NULL,
  `pdf_download_polist` int(11) NOT NULL,
  `purchase_order` int(11) NOT NULL DEFAULT 0,
  `inventory` int(11) NOT NULL DEFAULT 0,
  `product_manual_adjust` int(11) NOT NULL DEFAULT 0,
  `product_management` int(11) NOT NULL DEFAULT 0,
  `supplier_management` int(11) NOT NULL DEFAULT 0,
  `setting` int(11) NOT NULL DEFAULT 0,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `purchase_order_list` varchar(255) NOT NULL DEFAULT '0',
  `purchase_order_form` varchar(255) NOT NULL DEFAULT '0',
  `purchase_invoice_list` varchar(255) NOT NULL DEFAULT '0',
  `product_inventory` varchar(255) NOT NULL DEFAULT '0',
  `near_expiry_product_list` varchar(255) NOT NULL DEFAULT '0',
  `critical_level_product_list` varchar(255) NOT NULL DEFAULT '0',
  `product_manual_add_list` varchar(255) NOT NULL DEFAULT '0',
  `add_minus_product_qty` varchar(255) NOT NULL DEFAULT '0',
  `import_product_data` varchar(255) NOT NULL DEFAULT '0',
  `adjust_product_price_manual` varchar(255) NOT NULL DEFAULT '0',
  `branches_management` varchar(255) NOT NULL DEFAULT '0',
  `units_management` varchar(255) NOT NULL DEFAULT '0',
  `location_management` varchar(255) NOT NULL DEFAULT '0',
  `user_management` varchar(255) NOT NULL DEFAULT '0',
  `product_list` varchar(255) NOT NULL DEFAULT '0',
  `supplier_list` varchar(255) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `user_id`, `add_product`, `edit_product`, `view_polist`, `receive_polist`, `edit_polist`, `add_new_supplier`, `edit_supplier`, `delete_supplier`, `submit_po_form`, `add_product_form`, `pdf_download_polist`, `purchase_order`, `inventory`, `product_manual_adjust`, `product_management`, `supplier_management`, `setting`, `added_by`, `created_at`, `purchase_order_list`, `purchase_order_form`, `purchase_invoice_list`, `product_inventory`, `near_expiry_product_list`, `critical_level_product_list`, `product_manual_add_list`, `add_minus_product_qty`, `import_product_data`, `adjust_product_price_manual`, `branches_management`, `units_management`, `location_management`, `user_management`, `product_list`, `supplier_list`, `updated_at`) VALUES
(1, 11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 11, '2021-09-21 01:26:46', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2022-01-01 14:47:01'),
(2, 12, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 11, '2021-11-04 00:32:59', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2021-11-04 00:33:18'),
(3, 2, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 11, '2021-12-03 15:17:41', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2021-12-03 15:17:41'),
(4, 17, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2021-12-22 13:59:27', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2021-12-22 13:59:27'),
(5, 18, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '2021-12-23 11:41:27', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2021-12-23 11:41:27'),
(7, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 11, '2022-01-01 14:26:54', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-01-01 14:26:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atcs`
--
ALTER TABLE `atcs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_lists`
--
ALTER TABLE `employee_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelf_locations`
--
ALTER TABLE `shelf_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_client_infos`
--
ALTER TABLE `store_client_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_items`
--
ALTER TABLE `store_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_orders`
--
ALTER TABLE `store_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_product_lists`
--
ALTER TABLE `store_product_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_purchase_items`
--
ALTER TABLE `store_purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_purchase_orders`
--
ALTER TABLE `store_purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_replaced_items`
--
ALTER TABLE `store_replaced_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmm_datas`
--
ALTER TABLE `tmm_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atcs`
--
ALTER TABLE `atcs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_lists`
--
ALTER TABLE `employee_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT for table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `racks`
--
ALTER TABLE `racks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `shelf_locations`
--
ALTER TABLE `shelf_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `store_client_infos`
--
ALTER TABLE `store_client_infos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_items`
--
ALTER TABLE `store_items`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `store_orders`
--
ALTER TABLE `store_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store_product_lists`
--
ALTER TABLE `store_product_lists`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `store_purchase_items`
--
ALTER TABLE `store_purchase_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `store_purchase_orders`
--
ALTER TABLE `store_purchase_orders`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `store_replaced_items`
--
ALTER TABLE `store_replaced_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tmm_datas`
--
ALTER TABLE `tmm_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=568;

--
-- AUTO_INCREMENT for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
