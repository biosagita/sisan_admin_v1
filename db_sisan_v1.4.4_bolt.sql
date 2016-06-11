-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.11-log - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for db_sisan_v1.4.4_bolt
CREATE DATABASE IF NOT EXISTS `db_sisan_v1.4.4_bolt` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_sisan_v1.4.4_bolt`;


-- Dumping structure for table db_sisan_v1.4.4_bolt.address
CREATE TABLE IF NOT EXISTS `address` (
  `id_address` int(11) NOT NULL AUTO_INCREMENT,
  `id_loket` int(11) DEFAULT NULL,
  `address_console` int(11) DEFAULT NULL,
  `address_display` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_address`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.address: ~4 rows (approximately)
DELETE FROM `address`;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` (`id_address`, `id_loket`, `address_console`, `address_display`) VALUES
	(1, 1, NULL, 1),
	(2, 2, NULL, 2),
	(3, 3, NULL, 9),
	(4, 4, NULL, 4);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.alur
CREATE TABLE IF NOT EXISTS `alur` (
  `id_alur` int(10) NOT NULL AUTO_INCREMENT,
  `nama_alur` varchar(100) NOT NULL,
  `id_layanan` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  PRIMARY KEY (`id_alur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.alur: 0 rows
DELETE FROM `alur`;
/*!40000 ALTER TABLE `alur` DISABLE KEYS */;
/*!40000 ALTER TABLE `alur` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.caller
CREATE TABLE IF NOT EXISTS `caller` (
  `id_caller` int(11) NOT NULL AUTO_INCREMENT,
  `address_caller` int(11) DEFAULT NULL,
  `id_loket` int(11) DEFAULT NULL,
  `status_off` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_caller`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sisan_v1.4.4_bolt.caller: ~7 rows (approximately)
DELETE FROM `caller`;
/*!40000 ALTER TABLE `caller` DISABLE KEYS */;
INSERT INTO `caller` (`id_caller`, `address_caller`, `id_loket`, `status_off`) VALUES
	(1, 1, 1, 0),
	(4, 4, 4, 0),
	(5, 5, 5, 0),
	(6, 6, 5, 0),
	(7, 7, 6, 0),
	(8, 8, 5, 0),
	(9, 9, 10, 0);
/*!40000 ALTER TABLE `caller` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.config_grid
CREATE TABLE IF NOT EXISTS `config_grid` (
  `f_field_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_field_name` varchar(50) DEFAULT NULL,
  `f_field_text` varchar(50) DEFAULT NULL,
  `f_field_visible` varchar(50) DEFAULT NULL,
  `f_field_align` varchar(20) DEFAULT NULL,
  `f_field_width` int(10) DEFAULT NULL,
  `f_field_sort` varchar(20) DEFAULT NULL,
  `f_field_type` varchar(20) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`f_field_id`)
) ENGINE=MyISAM AUTO_INCREMENT=323 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.config_grid: 314 rows
DELETE FROM `config_grid`;
/*!40000 ALTER TABLE `config_grid` DISABLE KEYS */;
INSERT INTO `config_grid` (`f_field_id`, `f_field_name`, `f_field_text`, `f_field_visible`, `f_field_align`, `f_field_width`, `f_field_sort`, `f_field_type`, `table_name`) VALUES
	(1, 'f_cust_id', 'Id', 'True', 'Center', 40, 'Asc', 'Text', 't_customer'),
	(2, 'f_cust_name', 'Name', 'True', 'Left', 200, 'Asc', 'Text', 't_customer'),
	(3, 'f_cust_company', 'Company', 'True', 'Left', 150, 'Asc', 'Text', 't_customer'),
	(4, 'f_cust_address', 'Address', 'True', 'Left', 250, 'Asc', 'Text', 't_customer'),
	(5, 'f_cust_phone', 'Phone', 'True', 'Center', 100, 'Asc', 'Text', 't_customer'),
	(6, 'f_cust_fax', 'Fax', 'True', 'Center', 100, 'Asc', 'Text', 't_customer'),
	(7, 'f_cust_contact', 'Contact', 'True', 'Left', 150, 'Asc', 'Text', 't_customer'),
	(8, 'f_cust_hp', 'Hp', 'True', 'Center', 100, 'Asc', 'Text', 't_customer'),
	(9, 'f_cust_email', 'Email', 'True', 'Center', 150, 'Asc', 'Text', 't_customer'),
	(10, 'f_cust_npwp', 'NPWP', 'True', 'Center', 150, 'Asc', 'Text', 't_customer'),
	(11, 'f_comp_id', 'Id', 'True', 'Left', 40, 'Asc', 'Text', 't_comp_profile'),
	(12, 'f_comp_code', 'Code', 'True', 'Left', 50, 'Asc', 'Text', 't_comp_profile'),
	(13, 'f_comp_name', 'Name', 'True', 'Left', 150, 'Asc', 'Text', 't_comp_profile'),
	(14, 'f_comp_address1', 'Address%201', 'True', 'Left', 200, 'Asc', 'Text', 't_comp_profile'),
	(15, 'f_comp_address2', 'Address%202', 'True', 'Left', 200, 'Asc', 'Text', 't_comp_profile'),
	(16, 'f_comp_address3', 'Address%203', 'True', 'Left', 200, 'Asc', 'Text', 't_comp_profile'),
	(17, 'f_city_id', 'City', 'True', 'Left', 100, 'Asc', 'Text', 't_comp_profile'),
	(18, 'f_comp_post_code', 'Post%20Code', 'True', 'Left', 100, 'Asc', 'Text', 't_comp_profile'),
	(19, 'f_comp_phone', 'Phone', 'True', 'Left', 100, 'Asc', 'Text', 't_comp_profile'),
	(20, 'f_cust_prod_id', 'Id', 'True', 'Left', 40, 'Asc', 'Text', 't_customer_product'),
	(21, 'f_cust_id', 'Customer', 'True', 'Left', 150, 'Asc', 'Text', 't_customer_product'),
	(22, 'f_cust_prod_brand', 'Product%20Brand', 'True', 'Left', 150, 'Asc', 'Text', 't_customer_product'),
	(23, 'f_cust_prod_name', 'Product%20Name', 'True', 'Left', 150, 'Asc', 'Text', 't_customer_product'),
	(24, 'f_cust_prod_category', 'Category', 'True', 'Left', 100, 'Asc', 'Text', 't_customer_product'),
	(25, 'f_cust_prod_remark', 'Remark', 'True', 'Left', 0, 'Text', 't_customer_product', NULL),
	(26, 'f_province_id', 'Id', 'True', 'Center', 40, 'Asc', 'Text', 't_province'),
	(27, 'f_province_name', 'Name', 'True', 'Left', 250, 'Asc', 'Text', 't_province'),
	(28, 'f_city_id', 'Id', 'True', 'Center', 40, 'Asc', 'Text', 't_city'),
	(29, 'f_city_name', 'Name', 'True', 'Left', 200, 'Asc', 'Text', 't_city'),
	(30, 'f_province_id', 'Province', 'True', 'Left', 200, 'Asc', 'Text', 't_city'),
	(31, 'f_position_id', 'Id', 'True', 'Center', 40, 'Asc', 'Text', 't_position'),
	(32, 'f_position_name', 'Name', 'True', 'Left', 250, 'Asc', 'Text', 't_position'),
	(33, 'f_position_remark', 'Remark', 'True', 'Left', 300, 'Asc', 'Text', 't_position'),
	(34, 'f_class_id', 'Id', 'True', 'Center', 40, 'Asc', 'Text', 't_class'),
	(35, 'f_class_name', 'Name', 'True', 'Left', 200, 'Asc', 'Text', 't_class'),
	(36, 'f_class_remark', 'Remark', 'True', 'Left', 300, 'Asc', 'Text', 't_class'),
	(37, 'f_status_id', 'Id', 'True', 'Center', 40, 'Asc', 'Text', 't_status'),
	(38, 'f_status_name', 'Name', 'True', 'Left', 200, 'Asc', 'Text', 't_status'),
	(39, 'f_status_remark', 'Remark', 'True', 'Left', 300, 'Asc', 'Text', 't_status'),
	(40, 'f_holiday_id', 'Id', 'True', 'Center', 40, 'Asc', 'Text', 't_holiday'),
	(41, 'f_holiday_date', 'Date', 'True', 'Center', 100, 'Asc', 'Text', 't_holiday'),
	(42, 'f_holiday_remark', 'Remark', 'True', 'Left', 350, 'Asc', 'Text', 't_holiday'),
	(43, 'f_group_att_id', 'Id', 'True', 'Center', 40, 'Asc', 'Text', 't_group_attendance'),
	(44, 'f_group_att_name', 'Group%20Name', 'True', 'Left', 200, 'Asc', 'Text', 't_group_attendance'),
	(45, 'f_group_att_remark', 'Remark', 'True', 'Left', 300, 'Asc', 'Text', 't_group_attendance'),
	(46, 'f_emp_id', 'Id', 'True', 'Center', 60, 'Asc', 'Text', 't_employee'),
	(47, 'f_emp_code', 'Code', 'True', 'Center', 60, 'Asc', 'Text', 't_employee'),
	(48, 'f_emp_name', 'Name', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(49, 'f_emp_gender', 'Gender', 'True', 'Center', 40, 'Asc', 'Text', 't_employee'),
	(50, 'f_emp_birthplace', 'Birth%20of%20Place', 'True', 'Center', 70, 'Asc', 'Text', 't_employee'),
	(51, 'f_emp_datebirth', 'Date%20Of%20Birth', 'True', 'Center', 70, 'Asc', 'Text', 't_employee'),
	(52, 'f_emp_religion', 'Religion', 'True', 'Left', 100, 'Asc', 'Text', 't_employee'),
	(53, 'f_emp_marital_status', 'Marital', 'True', 'Center', 100, 'Asc', 'Text', 't_employee'),
	(54, 'f_emp_address1', 'Address1', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(55, 'f_emp_address2', 'Address2', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(56, 'f_emp_address3', 'Address3', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(57, 'f_city_id', 'City', 'True', 'Left', 150, 'Asc', 'Text', 't_employee'),
	(58, 'f_emp_post_code', 'Post%20Code', 'True', 'Left', 100, 'Asc', 'Text', 't_employee'),
	(59, 'f_emp_ext_phone', 'Phone', 'True', 'Left', 150, 'Asc', 'Text', 't_employee'),
	(60, 'f_emp_office_phone', 'Office%20Phone', 'True', 'Center', 150, 'Asc', 'Text', 't_employee'),
	(61, 'f_emp_home_phone', 'Home%20Phone', 'True', 'Center', 150, 'Asc', 'Text', 't_employee'),
	(62, 'f_emp_mobile_phone', 'HandPhone', 'True', 'Center', 150, 'Asc', 'Text', 't_employee'),
	(63, 'f_emp_pin_bb', 'Pin%20BB', 'True', 'Center', 150, 'Asc', 'Text', 't_employee'),
	(64, 'f_emp_email', 'Email', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(65, 'f_emp_website', 'Website', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(66, 'f_emp_acc_bank', 'Acc%20Bank', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(67, 'f_emp_acc_no', 'Acc%20No', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(68, 'f_emp_acc_name', 'Acc%20Name', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(69, 'f_emp_insurance', 'Insurance', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(70, 'f_emp_insurance_no', 'Insurance%20No', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(71, 'f_emp_active', 'Emp%20Active', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(72, 'f_comp_branch_id', 'Company%20Branch', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(73, 'f_emp_segment_id', 'Employee%20Segment', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(74, 'f_position_id', 'Position', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(75, 'f_class_id', 'Class', 'True', 'Left', 100, 'Asc', 'Text', 't_employee'),
	(76, 'f_status_id', 'Status', 'True', 'Left', 150, 'Asc', 'Text', 't_employee'),
	(77, 'f_group_att_id', 'Group%20Attendance', 'True', 'Left', 200, 'Asc', 'Text', 't_employee'),
	(78, 'f_emp_start_date', 'Date%20Of%20Start', 'True', 'Center', 200, 'Asc', 'Text', 't_employee'),
	(79, 'f_emp_out_date', 'Date%20Of%20Resign', 'True', 'Center', 200, 'Asc', 'Text', 't_employee'),
	(80, 'f_emp_reason_out', 'Reason%20Out', 'True', 'Left', 250, 'Asc', 'Text', 't_employee'),
	(81, 'f_foul_id', 'Id', 'True', 'Center', 40, 'Asc', 'Text', 't_foul_attendance'),
	(82, 'f%1F_foul_name', 'Name', 'True', 'Left', 200, 'Asc', 'Text', 't_foul_attendance'),
	(83, 'f_foul_minute_min', 'Foul%20Minute%20Min', 'True', 'Left', 100, 'Asc', 'Text', 't_foul_attendance'),
	(84, 'f_foul_minute_max', 'Foul%20Minute%20Max', 'True', 'Left', 100, 'Asc', 'Text', 't_foul_attendance'),
	(85, 'f_foul_remark', 'Remark', 'True', 'Left', 300, 'Asc', 'Text', 't_foul_attendance'),
	(86, 'f_decree_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_decree'),
	(87, 'f_emp_code', 'Employee%20Code', 'True', 'Left', 100, 'Asc', 'Text', 't_decree'),
	(88, 'f_decree_date', 'Decree%20Date', 'True', 'Center', 100, 'Asc', 'date', 't_decree'),
	(89, 'f_decree_no', 'Decree%20No', 'True', 'Center', 100, 'Asc', 'Text', 't_decree'),
	(90, 'f_status_id', 'Status', 'True', 'Center', 70, 'Asc', 'Text', 't_decree'),
	(91, 'f_decree_remark', 'Remark', 'True', 'Left', 300, 'Asc', 'Text', 't_decree'),
	(92, 'f_reason_request_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_reasonable_request'),
	(93, 'f_emp_code', 'Emp%20Code', 'True', 'Center', 100, 'Asc', 'Text', 't_reasonable_request'),
	(94, 'f_reason_request_date', 'Request%20Date', 'True', 'Left', 100, 'Asc', 'date', 't_reasonable_request'),
	(95, 'f_reason_request_startdate', 'Request%20Start', 'True', 'Center', 100, 'Asc', 'date', 't_reasonable_request'),
	(96, 'f_status_id', 'Status', 'True', 'Center', 100, 'Asc', 'Text', 't_reasonable_request'),
	(97, 'f_reason_request_remark', 'Remark', 'True', 'Left', 200, 'Asc', 'Text', 't_reasonable_request'),
	(98, 'f_reason_request_finishdate', 'Request%20Finish', 'True', 'Left', 100, 'Asc', 'date', 't_reasonable_request'),
	(99, 'f_reason_request_no', 'Reason%20Request%20No', 'True', 'Center', 100, 'Asc', 'Text', 't_reasonable_request'),
	(100, 'f_reason_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_reason'),
	(101, 'f_reason_code', 'Code', 'True', 'Center', 40, 'Asc', 'Number', 't_reason'),
	(102, 'f_reason_name', 'Reason%20Name', 'True', 'Left', 200, 'Asc', 'Text', 't_reason'),
	(103, 'f_reason_remark', 'Remark', 'True', 'Left', 300, 'Asc', 'Text', 't_reason'),
	(104, 'f_reduce_furlough', 'Reduce%20Furlough', 'True', 'Center', 200, 'Asc', 'Number', 't_reason'),
	(105, 'f_component_id', 'Id', 'True', 'Left', 40, 'Asc', 'Text', 't_component'),
	(106, 'f_position_id', 'Position', 'True', 'Center', 100, 'Asc', 'Text', 't_component'),
	(107, 'f_component_name', 'Component%20Name', 'True', 'Center', 200, 'Asc', 'Text', 't_component'),
	(108, 'f_component_category', 'Category', 'True', 'Center', 100, 'Asc', 'Text', 't_component'),
	(109, 'f_component_formula', 'Formulas', 'True', 'Left', 200, 'Asc', 'Text', 't_component'),
	(110, 'f_component_remark', 'Remark', 'True', 'Left', 300, 'Asc', 'Text', 't_component'),
	(111, 'f_ot_setup_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_overtime_setup'),
	(112, 'f_ot_setup_hour', 'Hour', 'True', 'Center', 70, 'Asc', 'Number', 't_overtime_setup'),
	(113, 'f_ot_setup_lenght', 'Length', 'True', 'Center', 70, 'Asc', 'Number', 't_overtime_setup'),
	(114, 'f_ot_setup_category', 'Category', 'True', 'Left', 150, 'Asc', 'Text', 't_overtime_setup'),
	(115, 'f_ot_setup_remark', 'Remark', 'True', 'Center', 300, 'Asc', 'Text', 't_overtime_setup'),
	(116, 'f_parameters_furlough_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_paramaters_furlough'),
	(117, 'f_parameters_furlough_day_count', 'Entitlements_Furlough', 'True', 'Center', 70, 'Asc', 'Number', 't_paramaters_furlough'),
	(118, 'f_parameters_furlough_years_service', 'Years_Of_Service', 'True', 'Center', 100, 'Asc', 'Text', 't_paramaters_furlough'),
	(119, 'f_emp_furlough_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_employee_furlough'),
	(120, 'f_emp_furlough_periode', 'Periode', 'True', 'Center', 60, 'Asc', 'Number', 't_employee_furlough'),
	(121, 'f_emp_id', 'Employee', 'True', 'Left', 200, 'Asc', 'Text', 't_employee_furlough'),
	(122, 'f_emp_furlough_amount', 'Furlough%20Amount', 'True', 'Center', 70, 'Asc', 'Number', 't_employee_furlough'),
	(123, 'f_emp_furlough_remark', 'Remark', 'True', 'Left', 300, 'Asc', 'Text', 't_employee_furlough'),
	(124, 'f_marital_status_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_marital_status'),
	(125, 'f_marital_status_code', 'Code', 'True', 'Center', 50, 'Asc', 'Text', 't_marital_status'),
	(126, 'f_marital_status_name', 'Marital%20Status', 'True', 'Left', 200, 'Asc', 'Text', 't_marital_status'),
	(127, 'f_marital_status_desc', 'Description', 'True', 'Left', 300, 'Asc', 'Text', 't_marital_status'),
	(128, 'f_ptkp_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_ptkp'),
	(129, 'f_marital_status_code', 'Marital%20Status', 'True', 'Center', 100, 'Asc', 'Text', 't_ptkp'),
	(130, 'f_ptkp_assessable', 'Assessable', 'True', 'Left', 150, 'Asc', 'Number', 't_ptkp'),
	(131, 'f_ptkp_marital', 'Marital', 'True', 'Right', 150, 'Asc', 'Number', 't_ptkp'),
	(132, 'f_ptkp_dependent', 'Dependent', 'True', 'Right', 150, 'Asc', 'Number', 't_ptkp'),
	(133, 'f_mr_loan_id', 'Id', '-', '-', 40, 'Asc', 'Number', 't_master_loan'),
	(134, 'f_mr_loan_date', 'Date', 'True', 'Left', 70, 'Asc', 'date', 't_master_loan'),
	(135, 'f_emp_id', 'Employee', 'True', 'Left', 200, 'Asc', 'Text', 't_master_loan'),
	(136, 'f_mr_loan_amount', 'Amount', 'True', 'Right', 100, 'Asc', 'Number', 't_master_loan'),
	(137, 'f_mr_loan_rest_installment', 'Rest%20Installment', 'True', 'Right', 100, 'Asc', 'Number', 't_master_loan'),
	(138, 'f_mr_loan_installment', 'Installment', 'True', 'Right', 100, 'Asc', 'Number', 't_master_loan'),
	(139, 'f_mr_loan_liquefaction_date', 'Liquefaction_Date', 'True', 'Center', 70, 'Asc', 'Number', 't_master_loan'),
	(140, 'f_mr_loan_status', 'Status', 'True', 'Center', 70, 'Asc', 'Text', 't_master_loan'),
	(141, 'f_breaches_id', 'Id', 'True', 'Left', 40, 'Asc', 'Text', 't_ta_breaches'),
	(142, 'f_breaches_name', 'Breaches_Name', 'True', 'Left', 250, 'Asc', 'Text', 't_ta_breaches'),
	(143, 'f_start_time', 'Start_time', 'True', 'Left', 60, 'Asc', 'Text', 't_ta_breaches'),
	(144, 'f_end_time', 'End_time', 'True', 'Center', 60, 'Asc', 'Text', 't_ta_breaches'),
	(145, 'f_category', 'Category', 'True', 'Left', 100, 'Asc', 'Text', 't_ta_breaches'),
	(146, 'f_punish_id', 'Punishment', 'True', 'Left', 200, 'Asc', 'Text', 't_ta_breaches'),
	(147, 'f_group_att_id', 'Group_Attendance', 'True', 'Left', 200, 'Asc', 'Text', 't_ta_breaches'),
	(148, 'f_description', 'Description', 'True', 'Left', 300, 'Asc', 'Text', 't_ta_breaches'),
	(149, 'f_punish_id', 'Id', 'True', 'Center', 40, 'Asc', 'Text', 't_ta_punish'),
	(150, 'f_punish_name', 'Punishment_Name', 'True', 'Left', 300, 'Asc', 'Text', 't_ta_punish'),
	(151, 'f_timeschedule_edit_id', 'Id', 'True', 'Left', 40, 'Asc', 'Number', 't_ta_timeschedule_edit'),
	(152, 'f_emp_code', 'Employee', 'True', 'Left', 250, 'Asc', 'Text', 't_ta_timeschedule_edit'),
	(153, 'f_timeschedule_date', 'Date', 'True', 'Center', 70, 'Asc', 'date', 't_ta_timeschedule_edit'),
	(154, 'f_time_in', 'Time_In', 'True', 'Center', 50, 'Asc', 'Text', 't_ta_timeschedule_edit'),
	(155, 'f_time_out', 'Time_Out', 'True', 'Center', 50, 'Asc', 'Text', 't_ta_timeschedule_edit'),
	(156, 'f_breaktime_in', 'BreakTime_In', 'True', 'Center', 50, 'Asc', 'Text', 't_ta_timeschedule_edit'),
	(157, 'f_breaktime_out', 'BreakTime_Out', 'True', 'Center', 50, 'Asc', 'Text', 't_ta_timeschedule_edit'),
	(158, 'f_timeschedule_remark', 'Remark', 'True', 'Center', 300, 'Asc', 'Text', 't_ta_timeschedule_edit'),
	(159, 'f_temp_table_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_temp_table'),
	(160, 'f_temp_table_date', 'Date', 'True', 'Center', 80, 'Asc', 'date', 't_temp_table'),
	(161, 'f_temp_table_day', 'Day', 'True', 'Center', 150, 'Asc', 'date', 't_temp_table'),
	(162, 'f_emp_nik', 'NIK', 'True', 'Center', 100, 'Asc', 'Number', 't_temp_table'),
	(163, 'f_emp_code', 'Code', 'True', 'Center', 80, 'Asc', 'Number', 't_temp_table'),
	(164, 'f_temp_table_in', 'In', 'True', 'Center', 80, 'Asc', 'Text', 't_temp_table'),
	(165, 'f_temp_table_out', 'Out', 'True', 'Center', 80, 'Asc', 'Text', 't_temp_table'),
	(166, 'f_temp_table_late', 'Late', 'True', 'Center', 80, 'Asc', 'Text', 't_temp_table'),
	(167, 'f_temp_table_early', 'Early', 'True', 'Center', 80, 'Asc', 'Text', 't_temp_table'),
	(168, 'f_dept_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_department'),
	(169, 'f_dept_name', 'Name', 'True', 'Left', 250, 'Asc', 'Text', 't_department'),
	(170, 'f_dept_remark', 'Remark', 'True', 'Left', 300, 'Asc', 'Text', 't_department'),
	(171, 'f_device_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_device'),
	(172, 'f_device_name', 'Name', 'True', 'Left', 250, 'Asc', 'Text', 't_device'),
	(173, 'f_device_ip', 'IP_Address', 'True', 'Center', 150, 'Asc', 'Text', 't_device'),
	(174, 'f_device_port', 'Port', 'True', 'Center', 150, 'Asc', 'Number', 't_device'),
	(175, 'f_device_type', 'Type', 'True', 'Center', 150, 'Asc', 'Text', 't_device'),
	(176, 'f_connect_type', 'Connect_Type', 'True', 'Center', 150, 'Asc', 'Text', 't_device'),
	(177, 'f_description', 'Description', 'True', 'Left', 250, 'Asc', 'Text', 't_device'),
	(178, 'f_det_loan_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_detaile_loan'),
	(179, 'f_det_loan_month', 'Month', 'True', 'Center', 70, 'Asc', 'Number', 't_detaile_loan'),
	(180, 'f_det_loan_amount', 'Amount', 'True', 'Right', 80, 'Asc', 'Number', 't_detaile_loan'),
	(181, 'f_det_loan_installment', 'Installment', 'True', 'Right', 80, 'Asc', 'Number', 't_detaile_loan'),
	(182, 'f_det_loan_rest_installment', 'Rest_Installment', 'True', 'Right', 80, 'Asc', 'Number', 't_detaile_loan'),
	(183, 'f_mr_loan_no', 'Loan_No', 'True', 'Right', 80, 'Asc', 'Number', 't_detaile_loan'),
	(184, 'f_loan_payments_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_loan_payments'),
	(185, 'f_mr_loan_no', 'Loan_No', 'True', 'Center', 150, 'Asc', 'Number', 't_loan_payments'),
	(186, 'f_loan_payment_date', 'Date', 'True', 'Center', 80, 'Asc', 'Text', 't_loan_payments'),
	(187, 'f_loan_payment_amount', 'Amount', 'True', 'Center', 80, 'Asc', 'Number', 't_loan_payments'),
	(188, 'f_loan_payment_remark', 'Remark', 'True', 'Left', 250, 'Asc', 'Text', 't_loan_payments'),
	(189, 'f_emp_id_operator', 'Operator', 'True', 'Left', 150, 'Asc', 'Text', 't_loan_payments'),
	(190, 'f_emp_educations_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_employee_educations'),
	(191, 'f_emp_education_city', 'City', 'True', 'Center', 150, 'Asc', 'Text', 't_employee_educations'),
	(192, 'f_emp_education_segment', 'Segment', 'True', 'Center', 100, 'Asc', 'Text', 't_employee_educations'),
	(193, 'f_emp_education_year', 'Year', 'True', 'Center', 70, 'Asc', 'Text', 't_employee_educations'),
	(194, 'f_emp_education_stage', 'Stage', 'True', 'Center', 70, 'Asc', 'Text', 't_employee_educations'),
	(195, 'f_emp_education_remark', 'Remark', 'True', 'Left', 250, 'Asc', 'Text', 't_employee_educations'),
	(196, 'f_emp_id', 'Emp_id', 'True', 'Center', 10, 'Asc', 'Number', 't_employee_educations'),
	(197, 'f_emp_family_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_employee_family'),
	(198, 'f_emp_id', 'Emp_id', 'True', 'Center', 40, 'Asc', 'Number', 't_employee_family'),
	(199, 'f_emp_family_name', 'Name', 'True', 'Left', 150, 'Asc', 'Text', 't_employee_family'),
	(200, 'f_emp_family_gender', 'Gender', 'True', 'Center', 50, 'Asc', 'Text', 't_employee_family'),
	(201, 'f_emp_family_birthdate', 'Birthdate', 'True', 'Center', 70, 'Asc', 'Text', 't_employee_family'),
	(202, 'f_emp_family_status', 'Relations', 'True', 'Center', 80, 'Asc', 'Text', 't_employee_family'),
	(203, 'f_emp_family_education', 'Education', 'True', 'Center', 80, 'Asc', 'Text', 't_employee_family'),
	(204, 'f_emp_family_remark', 'Remark', 'True', 'Left', 150, 'Asc', 'Text', 't_employee_family'),
	(205, 'f_base_salary_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_base_salary'),
	(206, 'f_base_salary_date', 'Date', 'True', 'Center', 80, 'Asc', 'date', 't_base_salary'),
	(207, 'f_base_salary_amount', 'Amount', 'True', 'Right', 80, 'Asc', 'Number', 't_base_salary'),
	(208, 'f_emp_id', 'Employee', 'True', 'Left', 200, 'Asc', 'Text', 't_base_salary'),
	(209, 'f_base_salary_no', 'Base_Salary_No', 'True', 'Center', 150, 'Asc', 'Text', 't_base_salary'),
	(210, 'f_payroll_list_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_payroll_list'),
	(211, 'f_emp_courses_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_employee_courses'),
	(212, 'f_emp_courses_name', 'Name', 'True', 'Left', 200, 'Asc', 'Text', 't_employee_courses'),
	(213, 'f_emp_courses_institution', 'Institution', 'True', 'Left', 200, 'Asc', 'Text', 't_employee_courses'),
	(214, 'f_emp_courses_year', 'Year', 'True', 'Center', 50, 'Asc', 'Number', 't_employee_courses'),
	(215, 'f_emp_courses_remark', 'Remark', 'True', 'Center', 200, 'Asc', 'Text', 't_employee_courses'),
	(216, 'f_emp_id', 'employee', 'True', 'Center', 20, 'Asc', 'Text', 't_employee_courses'),
	(217, 'f_emp_experience_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_employee_experience'),
	(218, 'f_emp_experience_company', 'Company', 'True', 'Left', 200, 'Asc', 'Text', 't_employee_experience'),
	(219, 'f_emp_experience_businesses', 'Businesses', 'True', 'Left', 150, 'Asc', 'Text', 't_employee_experience'),
	(220, 'f_emp_experience_position', 'Position', 'True', 'Left', 150, 'Asc', 'Text', 't_employee_experience'),
	(221, 'f_emp_experience_year', 'Year', 'True', 'Center', 80, 'Asc', 'Text', 't_employee_experience'),
	(222, 'f_emp_experience_remark', 'Remark', 'True', 'Left', 250, 'Asc', 'Text', 't_employee_experience'),
	(223, 'f_emp_id', 'Employee', 'True', 'Left', 200, 'Asc', 'Text', 't_employee_experience'),
	(224, 'f_emp__attachment_file_id', 'Id', 'True', 'Center', 40, 'Asc', 'Text', 't_employee_attachment_file'),
	(225, 'f_emp__attachment_file_date', 'Date', 'True', 'Center', 70, 'Asc', 'Text', 't_employee_attachment_file'),
	(226, 'f_emp__attachment_file_name', 'File_Name', 'True', 'Left', 200, 'Asc', 'Text', 't_employee_attachment_file'),
	(227, 'f_emp__attachment_file_remark', 'Remark', 'True', 'Left', 300, 'Asc', 'Text', 't_employee_attachment_file'),
	(228, 'f_emp_id', 'Employee%20', 'True', 'Left', 200, 'Asc', 'Text', 't_employee_attachment_file'),
	(229, 'f_allowance_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_allowance'),
	(230, 'f_position_id', 'Position', 'True', 'Left', 150, 'Asc', 'Text', 't_allowance'),
	(231, 'f_marital_status_code', 'Marital_Status', 'True', 'Left', 150, 'Asc', 'Text', 't_allowance'),
	(232, 'f_allowance_amount', 'Amount', 'True', 'Center', 100, 'Asc', 'Number', 't_allowance'),
	(233, 'f_user_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_user'),
	(234, 'f_user_login', 'Username', 'True', 'Left', 200, 'Asc', 'Text', 't_user'),
	(235, 'f_user_password', 'Password', 'True', 'Left', 200, 'Asc', 'Text', 't_user'),
	(236, 'f_outbox_id', 'Id', 'True', 'Center', 40, 'Asc', 'Number', 't_outbox_sms'),
	(237, 'f_outbox_date', 'Datetime', 'True', 'Center', 120, 'Asc', 'date', 't_outbox_sms'),
	(238, 'f_destination_number', 'Destination%20Number', 'True', 'Center', 120, 'Asc', 'Number', 't_outbox_sms'),
	(239, 'f_outbox_message', 'Message', 'True', '-', 350, '-', '-', 't_outbox_sms'),
	(240, 'f_com_id', 'Com', '-', '-', 40, '-', '-', 't_outbox_sms'),
	(241, 'f_outbox_status', 'Status', '-', '-', 100, '-', '-', 't_outbox_sms'),
	(242, 'f_outbox_remark', 'Remafk', '-', '-', 250, '-', '-', 't_outbox_sms'),
	(243, 'f_outbox_send_date', 'Sended%20%20Date', '-', '-', 120, '0', '-', 't_outbox_sms'),
	(244, 'f_com_id', 'Id', '-', '-', 40, '-', '-', 't_com'),
	(245, 'f_com', 'Com', '-', '-', 50, '-', '-', 't_com'),
	(246, 'f_baudrate', 'Baudrate', '-', '-', 80, '-', '-', 't_com'),
	(247, 'f_com_status', 'Com_Status', '-', '-', 100, '-', '-', 't_com'),
	(248, 'f_remark', 'Remark', '-', '-', 400, '-', '-', 't_com'),
	(249, 'id_group_layanan', 'Id', '-', '-', 40, '-', '-', 't_group_layanan'),
	(250, 'nama_group_layanan', 'Nama_Group', '-', '-', 200, '-', '-', 't_group_layanan'),
	(251, 'no_start', 'Start_NO', '-', '-', 60, '0', '-', 't_group_layanan'),
	(252, 'no_end', 'End_No', '-', '-', 60, '-', '-', 't_group_layanan'),
	(253, 'jml_tiket', 'Jml_Ticket', '-', '-', 80, '-', '-', 't_group_layanan'),
	(254, 'keterangan', 'Keterangan', '-', '-', 150, '-', '-', 't_group_layanan'),
	(255, 'id_layanan', 'Id', 'True', 'Left', 40, '-', '-', 't_layanan'),
	(256, 'nama_layanan', 'Nama_Layanan', '-', '-', 250, '-', '-', 't_layanan'),
	(257, 'id_group_layanan', 'Group_Layanan', '-', '-', 150, '-', '-', 't_layanan'),
	(258, 'layanan_status', 'Status', '-', '-', 60, '-', '-', 't_layanan'),
	(259, 'keterangan', 'Keterangan', '-', '-', 300, '-', '-', 't_layanan'),
	(260, 'id_layanan_forward', 'Layanan_Barcode', '-', '-', 40, '-', '-', 't_layanan'),
	(261, 'status_barcode', 'Status_Barcode', '-', '-', 50, '-', '-', 't_layanan'),
	(262, 'id_group_loket', 'Id', '-', '-', 40, '-', '-', 't_group_loket'),
	(263, 'nama_group_loket', 'Group_Loket', '-', '-', 200, '-', '-', 't_group_loket'),
	(264, 'id_group_layanan', 'Group_Layanan', '-', '-', 200, '-', '-', 't_group_loket'),
	(265, 'id_group_layanan_forward', 'Group_Layanan_Forward', '-', '-', 200, '-', '-', 't_group_loket'),
	(266, 'keterangan', 'Keterangan', '-', '-', 300, '-', '-', 't_group_loket'),
	(267, 'id_loket', 'Id', '-', '-', 40, '-', '-', 't_loket'),
	(268, 'nama_loket', 'Nama_Loket', '-', '-', 200, '-', '-', 't_loket'),
	(269, 'id_group_loket', 'Group_loket', '-', '-', 200, '-', '-', 't_loket'),
	(270, 'id', 'Id', '-', '-', 40, '-', '-', 't_user_group'),
	(271, 'id_user_group', 'User_Group', '-', '-', 200, '-', '-', 't_user_group'),
	(272, 'nama_user_group', 'User_Group', '-', '-', 250, '-', '-', 't_user_group'),
	(273, 'id_group_layanan', 'Group_Layanan', '-', '-', 200, '-', '-', 't_user_group'),
	(274, 'id', 'Id', '-', '-', 40, '-', '-', 't_counter'),
	(275, 'id_setting', 'Id', '-', '-', 40, '-', '-', 't_setting'),
	(276, 'setting', 'Setting', '-', '-', 200, '-', '-', 't_setting'),
	(277, 'nilai', 'Nilai', '-', '-', 100, '-', '-', 't_setting'),
	(278, 'keterangan', 'Keterangan', '-', '-', 100, '-', '-', 't_setting'),
	(279, 'id_header', 'Id', '-', '-', 40, '-', '-', 't_header'),
	(280, 'text_header', 'Text', '-', '-', 500, '-', '-', 't_header'),
	(281, 'id_running_text', 'Id', '-', '-', 40, '-', '-', 't_running_text'),
	(282, 'text', 'Text', '-', '-', 300, '-', '-', 't_running_text'),
	(283, 'created_date', 'Created_text', '-', '-', 70, '-', '-', 't_running_text'),
	(284, 'modified_date', 'Modified_Date', '-', '-', 80, '-', '-', 't_running_text'),
	(285, 'start_date', 'Start_Date', '-', '-', 80, '-', '-', 't_running_text'),
	(286, 'expired_date', 'Expired_Date', '-', '-', 80, '-', '-', 't_running_text'),
	(287, 'keterangan', 'Keterangan', '-', '-', 300, '-', '-', 't_running_text'),
	(288, 'id_video', 'Id', '-', '-', 40, '-', '-', 't_video'),
	(289, 'nama_video', 'File', '-', '-', 500, '-', '-', 't_video'),
	(302, 'id_counter_display', 'ID%20Counter%20Display', 'True', 'Center', 80, 'Asc', 'Number', 'counter_display'),
	(301, 'status_off', 'Status%20Off', 'True', 'Center', 100, 'Asc', 'Number', 'caller'),
	(300, 'id_loket', 'ID%20Loket', 'True', 'Center', 100, 'Asc', 'Number', 'caller'),
	(299, 'address_caller', 'Address%20Caller', 'True', 'Center', 100, 'Asc', 'Number', 'caller'),
	(298, 'id_caller', 'Caller', 'True', 'Center', 80, 'Asc', 'Number', 'caller'),
	(303, 'Address_cd', 'Address%20CD', 'True', 'Center', 100, 'Asc', 'Number', 'counter_display'),
	(304, 'id_loket', 'ID%20Loket', 'True', 'Center', 100, 'Asc', 'Number', 'counter_display'),
	(305, 'id_waktu_layanan', 'ID%20Waktu%20Layanan', 'True', 'Center', 80, 'Asc', 'Number', 'waktu_layanan'),
	(306, 'waktu_awal_1', 'Waktu%20Awal%201', 'True', 'Center', 120, 'Asc', 'Time', 'waktu_layanan'),
	(307, 'waktu_akhir_1', 'Waktu%20Akhir%201', 'True', 'Center', 120, 'Asc', 'Time', 'waktu_layanan'),
	(308, 'waktu_awal_2', 'Waktu%20Awal%202', 'True', 'Center', 120, 'Asc', 'Time', 'waktu_layanan'),
	(309, 'waktu_akhir_2', 'Waktu%20Akhir%202', 'True', 'Center', 120, 'Asc', 'Time', 'waktu_layanan'),
	(310, 'waktu_awal_3', 'Waktu%20Awal%203', 'True', 'Center', 120, 'Asc', 'Time', 'waktu_layanan'),
	(311, 'waktu_akhir_3', 'Waktu%20Akhir%203', 'True', 'Center', 120, 'Asc', 'Time', 'waktu_layanan'),
	(312, 'keterangan', 'Keterangan', 'True', 'Center', 150, 'Asc', 'Text', 'waktu_layanan'),
	(313, 'id_prioritas', 'ID%20Prioritas', 'True', 'Center', 80, 'Asc', 'Number', 'prioritas_layanan'),
	(314, 'id_group_loket', 'ID%20Group%20Loket', 'True', 'Center', 100, 'Asc', 'Number', 'prioritas_layanan'),
	(315, 'id_group_layanan', 'ID%20Group%20Layanan', 'True', 'Center', 100, 'Asc', 'Number', 'prioritas_layanan'),
	(316, 'Prioritas', 'Prioritas', 'True', 'Center', 100, 'Asc', 'Number', 'prioritas_layanan'),
	(317, 'Kolom%205', 'Kolom%205', 'True', 'Center', 100, 'Asc', 'Number', 'prioritas_layanan'),
	(318, 'id_prioritas', 'ID%20Prioritas', 'True', 'Center', 80, 'Asc', 'Number', 'prioritas_layanan'),
	(319, 'id_group_loket', 'ID%20Group%20Loket', 'True', 'Center', 100, 'Asc', 'Number', 'prioritas_layanan'),
	(320, 'id_group_layanan', 'ID%20Group%20Layanan', 'True', 'Center', 100, 'Asc', 'Number', 'prioritas_layanan'),
	(321, 'Prioritas', 'Prioritas', 'True', 'Center', 100, 'Asc', 'Number', 'prioritas_layanan'),
	(322, 'Kolom%205', 'Kolom%205', 'True', 'Center', 100, 'Asc', 'Number', 'prioritas_layanan');
/*!40000 ALTER TABLE `config_grid` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.counter_display
CREATE TABLE IF NOT EXISTS `counter_display` (
  `id_counter_display` int(11) NOT NULL AUTO_INCREMENT,
  `Address_cd` int(11) DEFAULT NULL,
  `id_loket` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_counter_display`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sisan_v1.4.4_bolt.counter_display: ~3 rows (approximately)
DELETE FROM `counter_display`;
/*!40000 ALTER TABLE `counter_display` DISABLE KEYS */;
INSERT INTO `counter_display` (`id_counter_display`, `Address_cd`, `id_loket`) VALUES
	(2, 123, 1),
	(3, 456, 2),
	(9, 9, 3);
/*!40000 ALTER TABLE `counter_display` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.demo_table
CREATE TABLE IF NOT EXISTS `demo_table` (
  `id_refer` int(11) NOT NULL AUTO_INCREMENT,
  `nilai_refer` varchar(200) NOT NULL,
  `keterangan_refer` text NOT NULL,
  PRIMARY KEY (`id_refer`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.demo_table: ~2 rows (approximately)
DELETE FROM `demo_table`;
/*!40000 ALTER TABLE `demo_table` DISABLE KEYS */;
INSERT INTO `demo_table` (`id_refer`, `nilai_refer`, `keterangan_refer`) VALUES
	(1, '800 x 600', ''),
	(2, '1024 x 768', '');
/*!40000 ALTER TABLE `demo_table` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.display
CREATE TABLE IF NOT EXISTS `display` (
  `id_refer` int(11) NOT NULL,
  `nilai_refer` text,
  PRIMARY KEY (`id_refer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_sisan_v1.4.4_bolt.display: ~2 rows (approximately)
DELETE FROM `display`;
/*!40000 ALTER TABLE `display` DISABLE KEYS */;
INSERT INTO `display` (`id_refer`, `nilai_refer`) VALUES
	(0, 'Video'),
	(1, 'TV');
/*!40000 ALTER TABLE `display` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.group_layanan
CREATE TABLE IF NOT EXISTS `group_layanan` (
  `id_group_layanan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_group_layanan` varchar(100) NOT NULL,
  `no_awal` varchar(50) NOT NULL,
  `no_start` int(10) NOT NULL,
  `no_end` int(10) NOT NULL,
  `jml_tiket` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `status_reg` int(11) NOT NULL,
  PRIMARY KEY (`id_group_layanan`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.group_layanan: 7 rows
DELETE FROM `group_layanan`;
/*!40000 ALTER TABLE `group_layanan` DISABLE KEYS */;
INSERT INTO `group_layanan` (`id_group_layanan`, `nama_group_layanan`, `no_awal`, `no_start`, `no_end`, `jml_tiket`, `keterangan`, `status_reg`) VALUES
	(4, 'Kasir', 'D', 701, 1000, 1, '-', 0),
	(7, 'Apotik', 'C', 1, 200, 1, '-', 0),
	(6, 'UGD', 'B', 1, 400, 2, '-', 0),
	(5, 'Group Mata', 'A', 1, 200, 1, '-', 0),
	(2, 'Group Umum', 'B', 1, 200, 1, '-', 0),
	(3, 'Group Gigi', 'C', 1, 200, 1, '-', 0),
	(1, 'Pendaftaran', 'A', 1, 200, 2, '-', 0);
/*!40000 ALTER TABLE `group_layanan` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.group_loket
CREATE TABLE IF NOT EXISTS `group_loket` (
  `id_group_loket` int(10) NOT NULL AUTO_INCREMENT,
  `nama_group_loket` varchar(100) NOT NULL,
  `id_group_layanan` int(10) NOT NULL,
  `id_group_layanan_forward` int(10) NOT NULL,
  `voice_group` char(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_group_loket`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.group_loket: 7 rows
DELETE FROM `group_loket`;
/*!40000 ALTER TABLE `group_loket` DISABLE KEYS */;
INSERT INTO `group_loket` (`id_group_loket`, `nama_group_loket`, `id_group_layanan`, `id_group_layanan_forward`, `voice_group`, `keterangan`) VALUES
	(2, 'Group Umum', 0, 0, '', '-'),
	(3, 'Group Gigi', 0, 0, '', '-'),
	(4, 'Group KAsir', 0, 0, '', '-'),
	(1, 'Group Pendaftaran', 0, 0, '', '-'),
	(5, 'Group Mata', 0, 0, '', '-'),
	(6, 'Group UGD', 0, 0, '', '-'),
	(7, 'Group Apotik', 0, 0, '', '-');
/*!40000 ALTER TABLE `group_loket` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.header
CREATE TABLE IF NOT EXISTS `header` (
  `id_header` int(2) NOT NULL AUTO_INCREMENT,
  `text_header` varchar(255) NOT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';

-- Dumping data for table db_sisan_v1.4.4_bolt.header: 2 rows
DELETE FROM `header`;
/*!40000 ALTER TABLE `header` DISABLE KEYS */;
INSERT INTO `header` (`id_header`, `text_header`) VALUES
	(1, 'KANTOR IMIGRASI KLAS I'),
	(2, 'JAKARTA UTARA');
/*!40000 ALTER TABLE `header` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.kurs
CREATE TABLE IF NOT EXISTS `kurs` (
  `id_kurs` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kurs` varchar(50) NOT NULL,
  `simbol_kurs` varchar(50) NOT NULL,
  `kurs_jual` varchar(50) DEFAULT NULL,
  `kurs_beli` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kurs`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.kurs: ~8 rows (approximately)
DELETE FROM `kurs`;
/*!40000 ALTER TABLE `kurs` DISABLE KEYS */;
INSERT INTO `kurs` (`id_kurs`, `nama_kurs`, `simbol_kurs`, `kurs_jual`, `kurs_beli`) VALUES
	(1, 'Dollar Singapore', 'SGD', 'Rp 9.760', 'Rp 9.800'),
	(2, 'Dollar Amerika', 'UGD', 'Rp 13.200', 'Rp 13.400'),
	(3, 'Dollar Australia', 'AUD', 'Rp 12.343', 'Rp 12.557'),
	(4, 'Japanese Yen', 'JPY', 'Rp 102,43', 'Rp 106,05'),
	(5, 'Euro', 'EUR', 'Rp 15.030', 'Rp 15.419'),
	(6, 'China Yuan', 'CNY', 'Rp 1.952', 'Rp 2.052'),
	(7, 'Saudi arabia Real', 'SAR', 'Rp 3.174', 'Rp 3.468'),
	(8, 'Swiss Franc', 'CHF', 'Rp 12.896', 'Rp 12.417');
/*!40000 ALTER TABLE `kurs` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.layanan
CREATE TABLE IF NOT EXISTS `layanan` (
  `id_layanan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(100) NOT NULL,
  `id_group_layanan` int(10) NOT NULL,
  `layanan_status` smallint(2) NOT NULL DEFAULT '0',
  `id_layanan_forward` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `status_barcode` tinyint(2) NOT NULL,
  `status_popup` tinyint(2) NOT NULL,
  `estimasi` int(10) NOT NULL,
  `id_waktu_layanan` int(10) DEFAULT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.layanan: 1 rows
DELETE FROM `layanan`;
/*!40000 ALTER TABLE `layanan` DISABLE KEYS */;
INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `id_group_layanan`, `layanan_status`, `id_layanan_forward`, `stok`, `status_barcode`, `status_popup`, `estimasi`, `id_waktu_layanan`, `keterangan`) VALUES
	(1, 'Costumer Care', 1, 1, 0, 2, 0, 0, 0, 0, '-');
/*!40000 ALTER TABLE `layanan` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.loket
CREATE TABLE IF NOT EXISTS `loket` (
  `id_loket` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_loket` varchar(100) NOT NULL,
  `nama_loket` varchar(100) NOT NULL,
  `id_group_loket` int(10) NOT NULL,
  `no_loket` int(10) NOT NULL,
  `status_off` int(10) NOT NULL,
  PRIMARY KEY (`id_loket`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.loket: ~7 rows (approximately)
DELETE FROM `loket`;
/*!40000 ALTER TABLE `loket` DISABLE KEYS */;
INSERT INTO `loket` (`id_loket`, `jenis_loket`, `nama_loket`, `id_group_loket`, `no_loket`, `status_off`) VALUES
	(1, 'Pendaftaran', '1', 1, 0, 0),
	(2, 'Umum', '2', 2, 0, 0),
	(3, 'gigi', '3', 3, 0, 0),
	(4, 'Kasir', '4', 4, 0, 0),
	(5, 'Mata', '5', 5, 0, 0),
	(6, 'UGD', '6', 6, 0, 0),
	(7, 'Apotik', '7', 7, 0, 0);
/*!40000 ALTER TABLE `loket` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.prioritas_layanan
CREATE TABLE IF NOT EXISTS `prioritas_layanan` (
  `id_prioritas` int(11) NOT NULL AUTO_INCREMENT,
  `id_group_loket` int(11) DEFAULT NULL,
  `id_group_layanan` int(11) DEFAULT NULL,
  `Prioritas` int(11) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_prioritas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sisan_v1.4.4_bolt.prioritas_layanan: ~6 rows (approximately)
DELETE FROM `prioritas_layanan`;
/*!40000 ALTER TABLE `prioritas_layanan` DISABLE KEYS */;
INSERT INTO `prioritas_layanan` (`id_prioritas`, `id_group_loket`, `id_group_layanan`, `Prioritas`, `keterangan`) VALUES
	(1, 1, 1, 1, '-'),
	(2, 2, 2, 1, '-'),
	(3, 3, 3, 1, '-'),
	(4, 4, 4, 1, '-'),
	(6, 5, 5, 1, '-'),
	(7, 5, 6, 2, '-');
/*!40000 ALTER TABLE `prioritas_layanan` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.running_text
CREATE TABLE IF NOT EXISTS `running_text` (
  `id_running_text` int(10) NOT NULL AUTO_INCREMENT,
  `text` varchar(100) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `modified_date` varchar(20) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `expired_date` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_running_text`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.running_text: 3 rows
DELETE FROM `running_text`;
/*!40000 ALTER TABLE `running_text` DISABLE KEYS */;
INSERT INTO `running_text` (`id_running_text`, `text`, `created_date`, `modified_date`, `start_date`, `expired_date`, `keterangan`) VALUES
	(6, 'SELAMAT DATANG DI PUSKESMAS JAKARTA UTARA', '0000-00-00', '11-12-2012', '04-12-2012', '31-12-2012', '-'),
	(2, 'SILAHKAN MENUNGGU DENGAN TERTIB', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', ''),
	(4, 'KENYAMANAN ANDA MERUPAKAN PRIORITAS UTAMA KAMI', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '');
/*!40000 ALTER TABLE `running_text` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `id_setting` int(10) NOT NULL AUTO_INCREMENT,
  `setting` varchar(255) NOT NULL,
  `nilai` text NOT NULL,
  `keterangan` text,
  `type_input` varchar(100) DEFAULT NULL,
  `refer_table` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=MyISAM AUTO_INCREMENT=902 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_sisan_v1.4.4_bolt.setting: 24 rows
DELETE FROM `setting`;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`id_setting`, `setting`, `nilai`, `keterangan`, `type_input`, `refer_table`, `status`) VALUES
	(1, 'Port Counter Display', '5', 'Hardware', '', '', 1),
	(2, 'Baudrate Counter Display', '19200', 'Hardware', '', '', 1),
	(3, 'volume video', '18', 'Display', 'slider', '', 0),
	(4, 'text speed', '100', 'Display', 'slider', '', 1),
	(5, 'touch screen', '1', 'Screen', '', '', 1),
	(6, 'LCD Display', '2', 'Screen', '', '', 1),
	(7, 'form2', '3', 'Screen', '', '', 1),
	(8, 'port console', '7', 'Hardware', '', '', 1),
	(9, 'baudrate console', '19200', 'Hardware', '', '', 1),
	(100, 'Port Printer', '3', 'Printer', '', '', 1),
	(101, 'baudrate Printer', '9600', 'Printer', '', '', 1),
	(200, 'Shutdown', '11:48', 'Utility', '', '', 1),
	(11, 'Port Button', '2', 'Hardware', '', '', 1),
	(12, 'Baudrate button', '19200', 'Hardware', '', '', 1),
	(102, 'lebar printer', '245', 'Printer', '', '', 1),
	(500, 'Tv', 'Stream', 'Display', 'refertable', 'display', 1),
	(502, 'path', 'E:\\vlcnet\\Vlc.DotNet.Wpf.Samples.exe', 'Display', '', '', 1),
	(501, 'volume video', '100', 'Display', 'slider', NULL, 1),
	(901, 'capture path', 'D:\\Foto Parkir\\', 'Camera', NULL, NULL, 1),
	(201, 'App_name', 'sisan mini v1.2', 'App', '', '', 0),
	(202, 'App_name', 'Console.exe', 'App', NULL, NULL, 0),
	(14, 'delay_button', '1000', 'Setting', NULL, NULL, 1),
	(13, 'Tombol', '1', 'Setting', NULL, NULL, 0),
	(503, 'url_stream', 'http://edge.firstmediacdn.swiftserve.com/live/fmcdn/amlst:bsnews/chunklist_b2217000.m3u8', 'Display', NULL, NULL, 1);
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.sf_config
CREATE TABLE IF NOT EXISTS `sf_config` (
  `sf_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `sf_table` varchar(64) NOT NULL DEFAULT '',
  `sf_field` varchar(64) NOT NULL DEFAULT '',
  `sf_type` varchar(16) DEFAULT 'default',
  `sf_related` varchar(100) DEFAULT '',
  `sf_label` varchar(64) DEFAULT '',
  `sf_desc` tinytext,
  `sf_order` int(3) DEFAULT NULL,
  `sf_hidden` int(1) DEFAULT '0',
  PRIMARY KEY (`sf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sisan_v1.4.4_bolt.sf_config: 194 rows
DELETE FROM `sf_config`;
/*!40000 ALTER TABLE `sf_config` DISABLE KEYS */;
INSERT INTO `sf_config` (`sf_id`, `sf_table`, `sf_field`, `sf_type`, `sf_related`, `sf_label`, `sf_desc`, `sf_order`, `sf_hidden`) VALUES
	(1, 'sf_config', 'sf_id', 'default', '', '', NULL, NULL, 0),
	(2, 'sf_config', 'sf_table', 'default', '', '', NULL, NULL, 0),
	(3, 'sf_config', 'sf_field', 'default', '', '', NULL, NULL, 0),
	(4, 'sf_config', 'sf_type', 'default', '', '', NULL, NULL, 0),
	(5, 'sf_config', 'sf_related', 'default', '', '', NULL, NULL, 0),
	(6, 'sf_config', 'sf_label', 'default', '', '', NULL, NULL, 0),
	(7, 'sf_config', 'sf_desc', 'default', '', '', NULL, NULL, 0),
	(8, 'sf_config', 'sf_order', 'default', '', '', NULL, NULL, 0),
	(9, 'sf_config', 'sf_hidden', 'default', '', '', NULL, NULL, 0),
	(10, 't_action', 'f_action_id', 'default', '|', '', '', 0, 0),
	(11, 't_action', 'f_action_code', 'default', '|', '', '', 1, 0),
	(12, 't_action', 'f_action_name', 'default', '|', '', '', 2, 0),
	(13, 't_action', 'f_action_desc', 'default', '|', '', '', 3, 0),
	(14, 't_ae', 'f_ae_id', 'default', '|', '', '', 0, 0),
	(15, 't_ae', 'f_ae_name', 'default', '|', '', '', 1, 0),
	(16, 't_ae', 'f_unit_id', 'default', '|', '', '', 2, 0),
	(17, 't_ae', 'f_ae_hp', 'default', '|', '', '', 3, 0),
	(18, 't_ae', 'f_ae_bb', 'default', '|', '', '', 4, 0),
	(19, 't_ae', 'f_ae_email', 'default', '|', '', '', 5, 0),
	(20, 't_application', 'f_app_id', 'default', '|', '', '', 0, 0),
	(21, 't_application', 'f_app_code', 'default', '|', '', '', 1, 0),
	(22, 't_application', 'f_app_name', 'default', '|', '', '', 2, 0),
	(23, 't_application', 'f_app_desc', 'default', '|', '', '', 3, 0),
	(24, 't_application', 'f_app_url', 'default', '|', '', '', 4, 0),
	(25, 't_application', 'f_app_path', 'default', '|', '', '', 5, 0),
	(26, 't_application', 'f_app_active', 'default', '|', '', '', 6, 0),
	(27, 't_comp_branch', 'f_branch_id', 'default', '|', '', '', 0, 0),
	(28, 't_comp_branch', 'f_comp_id', 'default', '|', '', '', 1, 0),
	(29, 't_comp_branch', 'f_branch_code', 'default', '|', '', '', 2, 0),
	(30, 't_comp_branch', 'f_branch_name', 'default', '|', '', '', 3, 0),
	(31, 't_comp_branch', 'f_branch_address1', 'default', '|', '', '', 4, 0),
	(32, 't_comp_branch', 'f_branch_address2', 'default', '|', '', '', 5, 0),
	(33, 't_comp_branch', 'f_branch_address3', 'default', '|', '', '', 6, 0),
	(34, 't_comp_branch', 'f_city_id', 'default', '|', '', '', 7, 0),
	(35, 't_comp_branch', 'f_branch_post_code', 'default', '|', '', '', 8, 0),
	(36, 't_comp_branch', 'f_branch_phone', 'default', '|', '', '', 9, 0),
	(37, 't_comp_branch', 'f_branch_fax', 'default', '|', '', '', 10, 0),
	(38, 't_comp_branch', 'f_branch_type', 'default', '|', '', '', 11, 0),
	(39, 't_comp_branch', 'f_branch_active', 'default', '|', '', '', 12, 0),
	(40, 't_comp_profile', 'f_comp_id', 'default', '|', '', '', 0, 0),
	(41, 't_comp_profile', 'f_comp_code', 'default', '|', '', '', 1, 0),
	(42, 't_comp_profile', 'f_comp_name', 'default', '|', '', '', 2, 0),
	(43, 't_comp_profile', 'f_comp_address1', 'default', '|', '', '', 3, 0),
	(44, 't_comp_profile', 'f_comp_address2', 'default', '|', '', '', 4, 0),
	(45, 't_comp_profile', 'f_comp_address3', 'default', '|', '', '', 5, 0),
	(46, 't_comp_profile', 'f_city_id', 'default', '|', '', '', 6, 0),
	(47, 't_comp_profile', 'f_comp_post_code', 'default', '|', '', '', 7, 0),
	(48, 't_comp_profile', 'f_comp_phone', 'default', '|', '', '', 8, 0),
	(49, 't_comp_profile', 'f_comp_fax', 'default', '|', '', '', 9, 0),
	(50, 't_comp_segment', 'f_segment_id', 'default', '|', '', '', 0, 0),
	(51, 't_comp_segment', 'f_comp_id', 'default', '|', '', '', 1, 0),
	(52, 't_comp_segment', 'f_parent_segment_id', 'default', '|', '', '', 2, 0),
	(53, 't_comp_segment', 'f_parent_segment_code', 'default', '|', '', '', 3, 0),
	(54, 't_comp_segment', 'f_top_segment_id', 'default', '|', '', '', 4, 0),
	(55, 't_comp_segment', 'f_segment_code', 'default', '|', '', '', 5, 0),
	(56, 't_comp_segment', 'f_segment_name', 'default', '|', '', '', 6, 0),
	(57, 't_comp_segment', 'f_segment_desc', 'default', '|', '', '', 7, 0),
	(58, 't_comp_segment', 'f_segment_level', 'default', '|', '', '', 8, 0),
	(59, 't_comp_segment', 'f_segment_prod', 'default', '|', '', '', 9, 0),
	(60, 't_comp_segment', 'f_segment_sort', 'default', '|', '', '', 10, 0),
	(61, 't_comp_segment', 'f_segment_active', 'default', '|', '', '', 11, 0),
	(62, 't_customer', 'f_cust_id', 'default', '|', '', '', 0, 0),
	(63, 't_customer', 'f_cust_name', 'default', '|', '', '', 1, 0),
	(64, 't_customer', 'f_cust_company', 'default', '|', '', '', 2, 0),
	(65, 't_customer', 'f_cust_address', 'default', '|', '', '', 3, 0),
	(66, 't_customer', 'f_cust_phone', 'default', '|', '', '', 4, 0),
	(67, 't_customer', 'f_cust_fax', 'default', '|', '', '', 5, 0),
	(68, 't_customer', 'f_cust_contact', 'default', '|', '', '', 6, 0),
	(69, 't_customer', 'f_cust_hp', 'default', '|', '', '', 7, 0),
	(70, 't_customer', 'f_cust_email', 'default', '|', '', '', 8, 0),
	(71, 't_customer', 'f_cust_npwp', 'default', '|', '', '', 9, 0),
	(72, 't_customer_product', 'f_cust_prod_id', 'default', '|', '', '', 0, 0),
	(73, 't_customer_product', 'f_cust_id', 'default', '|', '', '', 1, 0),
	(74, 't_customer_product', 'f_cust_prod_brand', 'default', '|', '', '', 2, 0),
	(75, 't_customer_product', 'f_cust_prod', 'default', '|', '', '', 3, 0),
	(76, 't_customer_product', 'f_cust_prod_category', 'default', '|', '', '', 4, 0),
	(77, 't_customer_product', 'f_cust_prod_remark', 'default', '|', '', '', 5, 0),
	(78, 't_detaile_mo', 'f_det_mo_id', 'default', '|', '', '', 0, 0),
	(79, 't_detaile_mo', 'f_mr_mo_id', 'default', '|', '', '', 1, 0),
	(80, 't_detaile_mo', 'f_cust_prod_id', 'default', '|', '', '', 2, 0),
	(81, 't_detaile_mo', 'f_det_mo_category', 'default', '|', '', '', 3, 0),
	(82, 't_detaile_mo', 'f_prod_id', 'default', '|', '', '', 4, 0),
	(83, 't_detaile_mo', 'f_det_mo_price', 'default', '|', '', '', 5, 0),
	(84, 't_detaile_mo', 'f_det_mo_frek', 'default', '|', '', '', 6, 0),
	(85, 't_detaile_mo', 'f_det_mo_amunt_day', 'default', '|', '', '', 7, 0),
	(86, 't_detaile_mo', 'f_det_mo_total', 'default', '|', '', '', 8, 0),
	(87, 't_detaile_mo', 'f_det_mo_disc', 'default', '|', '', '', 9, 0),
	(88, 't_detaile_mo', 'f_det_mo_brutto', 'default', '|', '', '', 10, 0),
	(89, 't_detaile_quota', 'f_det_quota_id', 'default', '|', '', '', 0, 0),
	(90, 't_detaile_quota', 'f_mr_quota_id', 'default', '|', '', '', 1, 0),
	(91, 't_detaile_quota', 'f_cust_prod_id', 'default', '|', '', '', 2, 0),
	(92, 't_detaile_quota', 'f_det_quota_category', 'default', '|', '', '', 3, 0),
	(93, 't_detaile_quota', 'f_prod_id', 'default', '|', '', '', 4, 0),
	(94, 't_detaile_quota', 'f_det_quota_price', 'default', '|', '', '', 5, 0),
	(95, 't_detaile_quota', 'f_det_quota_frek', 'default', '|', '', '', 6, 0),
	(96, 't_detaile_quota', 'f_det_quota_amunt_day', 'default', '|', '', '', 7, 0),
	(97, 't_detaile_quota', 'f_det_quota_total', 'default', '|', '', '', 8, 0),
	(98, 't_detaile_quota', 'f_det_quota_disc', 'default', '|', '', '', 9, 0),
	(99, 't_detaile_quota', 'f_det_quota_brutto', 'default', '|', '', '', 10, 0),
	(100, 't_employee', 'f_emp_id', 'default', '|', '', '', 0, 0),
	(101, 't_employee', 'f_emp_code', 'default', '|', '', '', 1, 0),
	(102, 't_employee', 'f_emp_name', 'default', '|', '', '', 2, 0),
	(103, 't_employee', 'f_emp_address1', 'default', '|', '', '', 3, 0),
	(104, 't_employee', 'f_emp_address2', 'default', '|', '', '', 4, 0),
	(105, 't_employee', 'f_emp_address3', 'default', '|', '', '', 5, 0),
	(106, 't_employee', 'f_city_id', 'default', '|', '', '', 6, 0),
	(107, 't_employee', 'f_emp_post_code', 'default', '|', '', '', 7, 0),
	(108, 't_employee', 'f_emp_ext_phone', 'default', '|', '', '', 8, 0),
	(109, 't_employee', 'f_emp_office_phone', 'default', '|', '', '', 9, 0),
	(110, 't_employee', 'f_emp_home_phone', 'default', '|', '', '', 10, 0),
	(111, 't_employee', 'f_emp_mobile_phone', 'default', '|', '', '', 11, 0),
	(112, 't_employee', 'f_emp_pin_bb', 'default', '|', '', '', 12, 0),
	(113, 't_employee', 'f_emp_email', 'default', '|', '', '', 13, 0),
	(114, 't_employee', 'f_emp_website', 'default', '|', '', '', 14, 0),
	(115, 't_employee', 'f_emp_acc_bank', 'default', '|', '', '', 15, 0),
	(116, 't_employee', 'f_emp_acc_no', 'default', '|', '', '', 16, 0),
	(117, 't_employee', 'f_emp_acc_name', 'default', '|', '', '', 17, 0),
	(118, 't_employee', 'f_emp_active', 'default', '|', '', '', 18, 0),
	(119, 't_employee_segment', 'f_emp_id', 'default', '|', '', '', 0, 0),
	(120, 't_employee_segment', 'f_segment_id', 'default', '|', '', '', 1, 0),
	(121, 't_employee_segment', 'f_branch_id', 'default', '|', '', '', 2, 0),
	(122, 't_employee_segment', 'f_emp_segment_desc', 'default', '|', '', '', 3, 0),
	(123, 't_group_module', 'f_grpmod_id', 'default', '|', '', '', 0, 0),
	(124, 't_group_module', 'f_app_id', 'default', '|', '', '', 1, 0),
	(125, 't_group_module', 'f_grpmod_code', 'default', '|', '', '', 2, 0),
	(126, 't_group_module', 'f_grpmod_name', 'default', '|', '', '', 3, 0),
	(127, 't_group_module', 'f_grpmod_desc', 'default', '|', '', '', 4, 0),
	(128, 't_group_module', 'f_grpmod_active', 'default', '|', '', '', 5, 0),
	(129, 't_master_mo', 'f_mr_mo_id', 'default', '|', '', '', 0, 0),
	(130, 't_master_mo', 'f_mr_mo_date', 'default', '|', '', '', 1, 0),
	(131, 't_master_mo', 'f_cust_id', 'default', '|', '', '', 2, 0),
	(132, 't_master_mo', 'f_emp_id', 'default', '|', '', '', 3, 0),
	(133, 't_master_mo', 'f_mr_mo_amount', 'default', '|', '', '', 4, 0),
	(134, 't_master_mo', 'f_mr_mo_count_item', 'default', '|', '', '', 5, 0),
	(135, 't_master_mo', 'f_mr_mo_status', 'default', '|', '', '', 6, 0),
	(136, 't_master_quota', 'f_mr_quota_id', 'default', '|', '', '', 0, 0),
	(137, 't_master_quota', 'f_mr_quota_date', 'default', '|', '', '', 1, 0),
	(138, 't_master_quota', 'f_cust_id', 'default', '|', '', '', 2, 0),
	(139, 't_master_quota', 'f_emp_id', 'default', '|', '', '', 3, 0),
	(140, 't_master_quota', 'f_mr_quota_amount', 'default', '|', '', '', 4, 0),
	(141, 't_master_quota', 'f_mr_quota_count_item', 'default', '|', '', '', 5, 0),
	(142, 't_master_quota', 'f_mr_quota_status', 'default', '|', '', '', 6, 0),
	(143, 't_module', 'f_mod_id', 'default', '|', '', '', 0, 0),
	(144, 't_module', 'f_app_id', 'default', '|', '', '', 1, 0),
	(145, 't_module', 'f_grpmod_id', 'default', '|', '', '', 2, 0),
	(146, 't_module', 'f_mod_parent_id', 'default', '|', '', '', 3, 0),
	(147, 't_module', 'f_mod_code', 'default', '|', '', '', 4, 0),
	(148, 't_module', 'f_mod_name', 'default', '|', '', '', 5, 0),
	(149, 't_module', 'f_mod_desc', 'default', '|', '', '', 6, 0),
	(150, 't_module', 'f_mod_sort', 'default', '|', '', '', 7, 0),
	(151, 't_module', 'f_mod_display', 'default', '|', '', '', 8, 0),
	(152, 't_module', 'f_mod_active', 'default', '|', '', '', 9, 0),
	(153, 't_module_action', 'f_mod_id', 'default', '|', '', '', 0, 0),
	(154, 't_module_action', 'f_action_id', 'default', '|', '', '', 1, 0),
	(155, 't_product', 'f_prod_id', 'default', '|', '', '', 0, 0),
	(156, 't_product', 'f_prod_cat_id', 'default', '|', '', '', 1, 0),
	(157, 't_product', 'f_prod', 'default', '|', '', '', 2, 0),
	(158, 't_product', 'f_prod_price', 'default', '|', '', '', 3, 0),
	(159, 't_product', 'f_comp_branch_id', 'default', '|', '', '', 4, 0),
	(160, 't_product_category', 'f_prod_cat_id', 'default', '|', '', '', 0, 0),
	(161, 't_product_category', 'f_prod_category', 'default', '|', '', '', 1, 0),
	(162, 't_product_category', 'f_prod_remark', 'default', '|', '', '', 2, 0),
	(163, 't_role', 'f_role_id', 'default', '|', '', '', 0, 0),
	(164, 't_role', 'f_app_id', 'default', '|', '', '', 1, 0),
	(165, 't_role', 'f_role_code', 'default', '|', '', '', 2, 0),
	(166, 't_role', 'f_role_name', 'default', '|', '', '', 3, 0),
	(167, 't_role', 'f_role_desc', 'default', '|', '', '', 4, 0),
	(168, 't_role', 'f_role_active', 'default', '|', '', '', 5, 0),
	(169, 't_role_action', 'f_role_id', 'default', '|', '', '', 0, 0),
	(170, 't_role_action', 'f_module_id', 'default', '|', '', '', 1, 0),
	(171, 't_role_action', 'f_action_id', 'default', '|', '', '', 2, 0),
	(172, 't_role_module', 'f_role_id', 'default', '|', '', '', 0, 0),
	(173, 't_role_module', 'f_module_id', 'default', '|', '', '', 1, 0),
	(174, 't_user', 'f_user_id', 'default', '|', '', '', 0, 0),
	(175, 't_user', 'f_user_login', 'default', '|', '', '', 1, 0),
	(176, 't_user', 'f_user_password', 'default', '|', '', '', 2, 0),
	(177, 't_user', 'f_user_name', 'default', '|', '', '', 3, 0),
	(178, 't_user', 'f_user_email', 'default', '|', '', '', 4, 0),
	(179, 't_user', 'f_user_desc', 'default', '|', '', '', 5, 0),
	(180, 't_user', 'f_user_active', 'default', '|', '', '', 6, 0),
	(181, 't_user_employee', 'f_user_id', 'default', '|', '', '', 0, 0),
	(182, 't_user_employee', 'f_emp_id', 'default', '|', '', '', 1, 0),
	(183, 't_user_log', 'f_user_id', 'default', '|', '', '', 0, 0),
	(184, 't_user_log', 'f_app_id', 'default', '|', '', '', 1, 0),
	(185, 't_user_log', 'f_login_date', 'default', '|', '', '', 2, 0),
	(186, 't_user_log', 'f_login_ip', 'default', '|', '', '', 3, 0),
	(187, 't_user_role', 'f_user_id', 'default', '|', '', '', 0, 0),
	(188, 't_user_role', 'f_role_id', 'default', '|', '', '', 1, 0),
	(189, 'user_ci', 'id', 'default', '|', '', '', 0, 0),
	(190, 'user_ci', 'username', 'default', '|', '', '', 1, 0),
	(191, 'user_ci', 'password', 'default', '|', '', '', 2, 0),
	(192, 'user_ci', 'email', 'default', '|', '', '', 3, 0),
	(193, 'user_ci', 'level', 'default', '|', '', '', 4, 0),
	(194, 'user_ci', 'status', 'default', '|', '', '', 5, 0);
/*!40000 ALTER TABLE `sf_config` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.testt
CREATE TABLE IF NOT EXISTS `testt` (
  `id_testt` int(11) NOT NULL AUTO_INCREMENT,
  `test` blob,
  PRIMARY KEY (`id_testt`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sisan_v1.4.4_bolt.testt: ~0 rows (approximately)
DELETE FROM `testt`;
/*!40000 ALTER TABLE `testt` DISABLE KEYS */;
INSERT INTO `testt` (`id_testt`, `test`) VALUES
	(1, _binary 0xFFD8FFE000104A46494600010101004800480000FFE1112A4578696600004D4D002A000000080005011200030000000100010000013100020000001C00000856013200020000001400000872876900040000000100000886EA1C00070000080C0000004A000000001CEA00000008000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000041646F62652050686F746F73686F70204353322057696E646F777300323030353A30373A32362030383A31373A32390000089003000200000014000010F890040002000000140000110C929100020000000330300000929200020000000330300000A001000300000001FFFF0000A00200040000000100000065A0030004000000010000005BEA1C00070000080C000008EC000000001CEA000000080000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000323030353A30353A33302031303A30333A323300323030353A30353A33302031303A30333A3233000000FFE109DA687474703A2F2F6E732E61646F62652E636F6D2F7861702F312E302F003C3F787061636B657420626567696E3D27EFBBBF272069643D2757354D304D7043656869487A7265537A4E54637A6B633964273F3E0D0A3C783A786D706D65746120786D6C6E733A783D2261646F62653A6E733A6D6574612F223E3C7264663A52444620786D6C6E733A7264663D22687474703A2F2F7777772E77332E6F72672F313939392F30322F32322D7264662D73796E7461782D6E7323223E3C7264663A4465736372697074696F6E207264663A61626F75743D22757569643A66616635626464352D626133642D313164612D616433312D6433336437353138326631622220786D6C6E733A786D703D22687474703A2F2F6E732E61646F62652E636F6D2F7861702F312E302F223E3C786D703A43726561746F72546F6F6C3E41646F62652050686F746F73686F70204353322057696E646F77733C2F786D703A43726561746F72546F6F6C3E3C786D703A437265617465446174653E323030352D30352D33305431303A30333A32333C2F786D703A437265617465446174653E3C2F7264663A4465736372697074696F6E3E3C2F7264663A5244463E3C2F783A786D706D6574613E0D0A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200A202020202020202020202020202020202020202020202020202020203C3F787061636B657420656E643D2777273F3EFFDB00430001010101010101010101010101010102010101010102010101020202020202020202030304030303030302020304030304040404040203050504040504040404FFDB00430101010101010102010102040302030404040404040404040404040404040404040404040404040404040404040404040404040404040404040404040404040404FFC0001108001B001E03012200021101031101FFC4001F0000010501010101010100000000000000000102030405060708090A0BFFC400B5100002010303020403050504040000017D01020300041105122131410613516107227114328191A1082342B1C11552D1F02433627282090A161718191A25262728292A3435363738393A434445464748494A535455565758595A636465666768696A737475767778797A838485868788898A92939495969798999AA2A3A4A5A6A7A8A9AAB2B3B4B5B6B7B8B9BAC2C3C4C5C6C7C8C9CAD2D3D4D5D6D7D8D9DAE1E2E3E4E5E6E7E8E9EAF1F2F3F4F5F6F7F8F9FAFFC4001F0100030101010101010101010000000000000102030405060708090A0BFFC400B51100020102040403040705040400010277000102031104052131061241510761711322328108144291A1B1C109233352F0156272D10A162434E125F11718191A262728292A35363738393A434445464748494A535455565758595A636465666768696A737475767778797A82838485868788898A92939495969798999AA2A3A4A5A6A7A8A9AAB2B3B4B5B6B7B8B9BAC2C3C4C5C6C7C8C9CAD2D3D4D5D6D7D8D9DAE2E3E4E5E6E7E8E9EAF2F3F4F5F6F7F8F9FAFFDA000C03010002110311003F00FEEC7E27FC54F875F05FC17AB7C43F8A9E2FD1BC11E0DD142ADF6B7ADDC18E279256D905ADBC2A1A5B9B99DCAC70DADBA4934D232A471BB3053F9E0DF1726FDAC22D6F5AF1A7C5FBCFD997F670F0DD969FA89F873E0BF1E9F0BFED3DF10E2D59AE06917DE2CD42C25FB6F85ECAE7ECB23DAE8560DFDAB722126F2E2D504DA6B70FF15F4DB1D5FF006A0F8BDA57C5DD5752F14F8DBC3DE22D075CF8251EB770A9E1EF007C36D63C3970FA83786F4B5C4106A575AE683AE69BA86AF224D7771653476AD3DB5B48DE5FE31FC561E1BD57F694FDA1FC3D77A7691AB7867E2D693A0EAD65612B35A694D7DE0FD48AC6A2403716862D5750B7F30E7E5B7DBB41C8AE8A74F98CA73B1FBDFA4FED41ADFECE5E21BDF057C4EF88965FB4B7C20D1AF34DD361F8C9E0C861D5BE38FC308F56D3E5D5F498BC75E1EB08826AF6F369F0CB729AEE83179CD15BB3DCE98A375DBFE88F84BC5DE15F1EF86B46F197823C47A278BBC25E22B25D4B41F12F86F538759D0F58B76C859ADEEA2668E45CAB0CA9E0A907906BF9B8FD96752F0CCDF133C75A1DD5CD8DAE953DDE9FA078623D16F3ECD71A7A7843C2BE19F0ED8C967361BCBBAB26B4BF9A19D177C126D900631EDAFD34FD91F4FD3F5AFDA27E29F897C06A3C23E1BD1BE16E91A37C6FD0FC2724BA5F81FC77F13353D42E2EAEB5A5D244925AC1A841A569B632DC5CC0126B91E278FED46592142913825A95195CD5FDB47E13D8EADF1A3F663F89635797C2B2788758D4BF673D6FC516B035CFD866F1043FDB1E1392F610544D6A756D19B4A68B7C6CDFF09636D911B691F927E33FD803E327893C59A9DD7847C1BE2C5F1C685AC5DEA7A56AF0C51EB9E0FD1646B87B7FB2DC4D28B6134EF05B42CB1191440D2472309B7798DFD157C7EF037867E22FC22F18F863C5B65757BA4B5BDAEBB0FD8358BDF0F6A9A7DF6937D6BAAE977D67A859CB0DD5B5C5ADDD9DADC453DBCB1C89242A4357E7627C3982ED1E49FE24FED1ACC4B37CBFB577C4E89464F655D7C01F41574E7251BA26696ECF92FE0E7EC69E3FF06FC413E20F1947AB7C3CB3D26D754D5FC69E2FF10E9F1E9F63A1DAA58C9797DAF5BDAC10AC33C2AE92A6D79C794D71179924FB5633FAB3FB0278022F05FECDDE1BF10BD85F69FABFC68D6B50F8E7AC43AADC0BBD6517C4937DAB4786FA50ABBEE20D25747B699B03325BB9C0CE2BC76DBF669F871E34D3DB43F176BFF1E7C4DA16B964B61ADE85AEFED55F14354D0F5AB7B98D63B9B6BCB393C40D0CD0CC8CC92432AB46EAECACA55883FA5B05BC1690C3696B0C56D6B6B12DBDB5BC1188A08238D42A2228E02A800003A0153524DAD474D58FFFD9);
/*!40000 ALTER TABLE `testt` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.ticket_print
CREATE TABLE IF NOT EXISTS `ticket_print` (
  `tick_id` int(11) NOT NULL AUTO_INCREMENT,
  `tick_tanggal` int(11) DEFAULT NULL,
  `tick_waktu` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tick_id_layanan` int(11) DEFAULT NULL,
  `tick_status` int(11) DEFAULT '0',
  PRIMARY KEY (`tick_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_sisan_v1.4.4_bolt.ticket_print: ~8 rows (approximately)
DELETE FROM `ticket_print`;
/*!40000 ALTER TABLE `ticket_print` DISABLE KEYS */;
INSERT INTO `ticket_print` (`tick_id`, `tick_tanggal`, `tick_waktu`, `tick_id_layanan`, `tick_status`) VALUES
	(1, 20160507, '2016-05-07 14:47:21', 1, 1),
	(2, 20160507, '2016-05-07 14:47:23', 1, 1),
	(3, 20160507, '2016-05-07 14:47:24', 1, 1),
	(4, 20160509, '2016-05-09 17:09:29', 1, 1),
	(5, 20160509, '2016-05-09 17:10:04', 1, 1),
	(6, 20160509, '2016-05-09 17:10:22', 1, 1),
	(7, 20160531, '2016-05-31 15:30:14', 1, 1),
	(8, 20160531, '2016-05-31 15:30:17', 1, 1),
	(9, 20160531, '2016-05-31 15:30:19', 1, 1),
	(10, 20160531, '2016-05-31 15:30:20', 1, 1);
/*!40000 ALTER TABLE `ticket_print` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal_transaksi` int(20) NOT NULL,
  `waktu_ambil` time NOT NULL,
  `waktu_panggil` time NOT NULL DEFAULT '00:00:00',
  `no_ticket_awal` char(50) NOT NULL DEFAULT '0',
  `no_ticket` int(10) NOT NULL DEFAULT '0',
  `id_layanan` int(10) NOT NULL DEFAULT '0',
  `id_group_layanan` int(10) NOT NULL DEFAULT '0',
  `status_transaksi` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0: wait, 1: next, 2: call, 3: skip, 5: finish',
  `id_user` int(10) NOT NULL DEFAULT '0',
  `id_loket` int(10) NOT NULL DEFAULT '0',
  `id_visitor` int(10) NOT NULL DEFAULT '0',
  `id_caller` int(10) NOT NULL DEFAULT '0',
  `waktu_finish` time NOT NULL DEFAULT '00:00:00',
  `nama_file` text,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.transaksi: 3 rows
DELETE FROM `transaksi`;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `waktu_ambil`, `waktu_panggil`, `no_ticket_awal`, `no_ticket`, `id_layanan`, `id_group_layanan`, `status_transaksi`, `id_user`, `id_loket`, `id_visitor`, `id_caller`, `waktu_finish`, `nama_file`) VALUES
	(1, 20160509, '17:09:29', '00:00:00', 'A', 1, 1, 1, 0, 0, 0, 0, 0, '00:00:00', NULL),
	(2, 20160509, '17:10:05', '00:00:00', 'A', 2, 1, 1, 0, 0, 0, 0, 0, '00:00:00', NULL),
	(3, 20160509, '17:10:22', '00:00:00', 'A', 3, 1, 1, 0, 0, 0, 0, 0, '00:00:00', NULL),
	(4, 20160608, '12:33:10', '00:00:00', 'A', 1, 1, 1, 0, 0, 0, 0, 0, '00:00:00', NULL),
	(5, 20160608, '12:33:41', '00:00:00', 'A', 2, 1, 1, 0, 0, 0, 0, 0, '00:00:00', NULL),
	(6, 20160608, '12:33:49', '00:00:00', 'A', 3, 1, 1, 0, 0, 0, 0, 0, '00:00:00', NULL),
	(7, 20160608, '12:33:52', '00:00:00', 'A', 4, 1, 1, 0, 0, 0, 0, 0, '00:00:00', NULL);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_action
CREATE TABLE IF NOT EXISTS `t_action` (
  `f_action_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'Action ID',
  `f_action_code` varchar(15) NOT NULL DEFAULT ' ' COMMENT 'Action Code',
  `f_action_name` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Action Name',
  `f_action_desc` text NOT NULL COMMENT 'Action Description',
  PRIMARY KEY (`f_action_id`),
  KEY `f_action_code` (`f_action_code`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Action Table';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_action: 5 rows
DELETE FROM `t_action`;
/*!40000 ALTER TABLE `t_action` DISABLE KEYS */;
INSERT INTO `t_action` (`f_action_id`, `f_action_code`, `f_action_name`, `f_action_desc`) VALUES
	(1, 'btAdd', 'Add', 'Add Record'),
	(2, 'btUpdate', 'Update', 'Update Record'),
	(3, 'btDelete', 'Delete', 'Delete Record'),
	(5, 'btSave', 'Save', 'Save'),
	(6, 'btPrint', 'Print', '');
/*!40000 ALTER TABLE `t_action` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_application
CREATE TABLE IF NOT EXISTS `t_application` (
  `f_app_id` int(9) NOT NULL COMMENT 'Application ID',
  `f_app_code` varchar(15) NOT NULL DEFAULT ' ' COMMENT 'Application Code',
  `f_app_name` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Application Name',
  `f_app_desc` text NOT NULL COMMENT 'Application Description',
  `f_app_url` varchar(300) NOT NULL DEFAULT ' ' COMMENT 'Application Url',
  `f_app_path` varchar(300) NOT NULL DEFAULT ' ' COMMENT 'Application path location',
  `f_app_active` int(1) NOT NULL DEFAULT '1' COMMENT 'Application Active Status',
  PRIMARY KEY (`f_app_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Application Table';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_application: 1 rows
DELETE FROM `t_application`;
/*!40000 ALTER TABLE `t_application` DISABLE KEYS */;
INSERT INTO `t_application` (`f_app_id`, `f_app_code`, `f_app_name`, `f_app_desc`, `f_app_url`, `f_app_path`, `f_app_active`) VALUES
	(1, 'Antrian', 'Antrian Intergrator System', 'System integrator for BBC', 'http://localhost/antrian', 'http://localhost/antrian', 1);
/*!40000 ALTER TABLE `t_application` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_city
CREATE TABLE IF NOT EXISTS `t_city` (
  `f_city_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_city_name` varchar(50) NOT NULL,
  `f_province_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`f_city_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.t_city: 0 rows
DELETE FROM `t_city`;
/*!40000 ALTER TABLE `t_city` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_city` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_component
CREATE TABLE IF NOT EXISTS `t_component` (
  `f_component_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_position_id` int(10) DEFAULT NULL,
  `f_component_code` varchar(20) DEFAULT NULL,
  `f_component_name` varchar(200) DEFAULT NULL,
  `f_component_category` varchar(20) DEFAULT NULL,
  `f_component_formula` varchar(100) DEFAULT NULL,
  `f_component_remark` text,
  PRIMARY KEY (`f_component_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.t_component: 10 rows
DELETE FROM `t_component`;
/*!40000 ALTER TABLE `t_component` DISABLE KEYS */;
INSERT INTO `t_component` (`f_component_id`, `f_position_id`, `f_component_code`, `f_component_name`, `f_component_category`, `f_component_formula`, `f_component_remark`) VALUES
	(14, 3, 'PSN', 'IURAN PENSIUNAN', 'Reduce', '50000', '-'),
	(13, 3, 'BY JBT', 'BIAYA JABATAN', 'Reduce', '151200', '-'),
	(12, 3, 'PJK', 'JAMINAN KEMATIAN', 'Receive', '9000', '-'),
	(5, 6, 'UM', 'Uang MAkan', 'Receive', '$Att*20000', '-'),
	(11, 3, 'PJKK', 'JAMINAN KECELAKAAN KERJA', 'Receive', '15000', '-'),
	(7, 5, 'UM', 'UANG MAKAN', 'Receive', '$Att*50000', '-'),
	(8, 5, 'TK', 'TUNJANGAN KELUARGA', 'Receive', '2000000', '-'),
	(9, 5, 'TKS', 'TUNJANGAN KESEHATAN', 'Receive', '1000000', '-'),
	(10, 5, 'KP', 'IURAN KOPERASI', 'Reduce', '100000', '-'),
	(15, 3, 'JHT', 'JAMINAN HARI TUA', 'Reduce', '60000', '-');
/*!40000 ALTER TABLE `t_component` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_comp_branch
CREATE TABLE IF NOT EXISTS `t_comp_branch` (
  `f_branch_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Company Branch ID',
  `f_comp_id` int(2) NOT NULL DEFAULT '0' COMMENT 'Company ID from table Company',
  `f_branch_code` varchar(15) NOT NULL DEFAULT ' ' COMMENT 'Company Branch Code',
  `f_branch_name` varchar(100) NOT NULL DEFAULT ' ' COMMENT 'Company Branch Name',
  `f_branch_address1` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Company Branch Address 1',
  `f_branch_address2` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Company Branch Address 2',
  `f_branch_address3` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Company Branch Address 3',
  `f_city_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Company Branch City ID',
  `f_branch_post_code` varchar(7) NOT NULL DEFAULT ' ' COMMENT 'Company Branch Post Code',
  `f_branch_phone` varchar(20) NOT NULL DEFAULT ' ' COMMENT 'Company Branch Phone Number',
  `f_branch_fax` varchar(20) NOT NULL DEFAULT ' ' COMMENT 'Company Branch Fax Number',
  `f_branch_type` int(2) NOT NULL DEFAULT '1' COMMENT 'Company Branch Type',
  `f_branch_active` int(1) NOT NULL DEFAULT '1' COMMENT 'Company Branch active',
  PRIMARY KEY (`f_branch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='Company Branch Table';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_comp_branch: 16 rows
DELETE FROM `t_comp_branch`;
/*!40000 ALTER TABLE `t_comp_branch` DISABLE KEYS */;
INSERT INTO `t_comp_branch` (`f_branch_id`, `f_comp_id`, `f_branch_code`, `f_branch_name`, `f_branch_address1`, `f_branch_address2`, `f_branch_address3`, `f_city_id`, `f_branch_post_code`, `f_branch_phone`, `f_branch_fax`, `f_branch_type`, `f_branch_active`) VALUES
	(1, 1, 'ETN', 'etnikom', 'JL Jagakarsa', '', '', 1, '', '', '', 1, 1),
	(2, 1, 'BNS', 'Bens Radio', 'JL Jagakarsa', '', '', 1, '', '', '', 1, 1),
	(3, 1, 'ADS', 'Ads Radio', 'Cikampek Karawang', '', '', 10, '', '', '', 1, 1),
	(4, 1, 'GSP', 'GSP Radio', '-', '', '', 11, '', '', '', 1, 1),
	(5, 1, 'CRB', 'Cirebon Radio', '-', '', '', 12, '', '', '', 1, 1),
	(6, 1, 'BDG', 'Bandung Radio', '-', '', '', 13, '', '', '', 1, 1),
	(7, 1, 'PSD', 'Pasundan Radio', '-', '', '', 14, '', '', '', 1, 1),
	(8, 1, 'KRA', 'Krakatau Radio', '-', '', '', 9, '', '', '', 1, 1),
	(9, 1, 'BTN', 'Banten Radio', '-', '', '', 15, '', '', '', 1, 1),
	(10, 1, 'SRG', 'Serang Radio', '-', '', '', 4, '', '', '', 1, 1),
	(11, 1, 'SRW', 'Sriwijaya', '-', '', '', 16, '', '', '', 1, 1),
	(12, 1, 'BTR', 'Baturaja Radio', '-', '', '', 17, '', '', '', 1, 0),
	(13, 1, 'KYA', 'Kayu Agung Radio', '-', '', '', 18, '', '', '', 1, 1),
	(14, 1, 'SRP', 'Serumpun', '-', '', '', 19, '', '', '', 1, 1),
	(15, 2, 'BARKAH JKT', 'JKT PRODUKSI', 'JAKARTA', '', '', 0, '', '', '', 1, 1),
	(16, 1, 'BALI', 'BALI RADIO', 'JL.RAYA BALI NO.39', '', '', 22, '15123', '78889999', '', 1, 1);
/*!40000 ALTER TABLE `t_comp_branch` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_comp_profile
CREATE TABLE IF NOT EXISTS `t_comp_profile` (
  `f_comp_id` int(2) NOT NULL COMMENT 'Company ID',
  `f_comp_code` varchar(10) NOT NULL DEFAULT ' ' COMMENT 'Company Code',
  `f_comp_name` varchar(100) NOT NULL DEFAULT ' ' COMMENT 'Company Name',
  `f_comp_address1` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Company Address 1',
  `f_comp_address2` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Company Address 2',
  `f_comp_address3` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Company Address 3',
  `f_city_id` int(9) NOT NULL DEFAULT '0' COMMENT 'City of company',
  `f_comp_post_code` int(9) NOT NULL DEFAULT '0' COMMENT 'Company Post code',
  `f_comp_phone` varchar(50) NOT NULL DEFAULT ' ' COMMENT 'Company official Phone No',
  `f_comp_fax` varchar(50) NOT NULL DEFAULT ' ' COMMENT 'Company official Fax No',
  `f_comp_eom` int(1) NOT NULL DEFAULT '0' COMMENT 'End of Month Status',
  PRIMARY KEY (`f_comp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Company Profile Table';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_comp_profile: 2 rows
DELETE FROM `t_comp_profile`;
/*!40000 ALTER TABLE `t_comp_profile` DISABLE KEYS */;
INSERT INTO `t_comp_profile` (`f_comp_id`, `f_comp_code`, `f_comp_name`, `f_comp_address1`, `f_comp_address2`, `f_comp_address3`, `f_city_id`, `f_comp_post_code`, `f_comp_phone`, `f_comp_fax`, `f_comp_eom`) VALUES
	(1, 'etnikom', 'PT. ETNIKOM PERSADA RAYA', 'Jl. Jagakarsa No.39  ', 'Jagakarsa', 'Jakarta Selatan', 1, 12160, '021-78893333 ', ' 021-78891265', 0),
	(2, 'Barkah ', 'PT BARKAH JAYA SOLUSI', 'HARAPAN INDAH OB 12', '', '', 0, 17000, '', '', 0);
/*!40000 ALTER TABLE `t_comp_profile` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_comp_segment
CREATE TABLE IF NOT EXISTS `t_comp_segment` (
  `f_segment_id` int(9) NOT NULL COMMENT 'Company Segment ID',
  `f_comp_id` int(2) NOT NULL DEFAULT '0' COMMENT 'Company ID from table Company',
  `f_parent_segment_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Parent of Segment',
  `f_parent_segment_code` varchar(10) DEFAULT NULL,
  `f_top_segment_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Top Level of Segment',
  `f_segment_code` varchar(10) NOT NULL DEFAULT ' ' COMMENT 'Company Segment Code',
  `f_segment_name` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Company Segment Name',
  `f_segment_desc` text NOT NULL COMMENT 'Company Segment Description',
  `f_segment_level` int(2) NOT NULL DEFAULT '0' COMMENT 'Segment Level (0: Parent, else is node) Hyrarcial',
  `f_segment_prod` int(1) NOT NULL DEFAULT '0' COMMENT 'This Segment is Production Segment or Not',
  `f_segment_sort` int(2) NOT NULL DEFAULT '0',
  `f_segment_active` int(1) NOT NULL DEFAULT '1' COMMENT 'Segment Active status',
  PRIMARY KEY (`f_segment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Company Segment Table';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_comp_segment: 11 rows
DELETE FROM `t_comp_segment`;
/*!40000 ALTER TABLE `t_comp_segment` DISABLE KEYS */;
INSERT INTO `t_comp_segment` (`f_segment_id`, `f_comp_id`, `f_parent_segment_id`, `f_parent_segment_code`, `f_top_segment_id`, `f_segment_code`, `f_segment_name`, `f_segment_desc`, `f_segment_level`, `f_segment_prod`, `f_segment_sort`, `f_segment_active`) VALUES
	(1, 1, 1, 'JKT01', 1, 'JKT01', 'General Jakarta', 'Segment General Insurance on Jakarta', 0, 1, 1, 1),
	(2, 1, 2, 'JKT02', 3, 'JKT02', 'EBEN Jakarta', 'Segment Employee Benefit Insurance Jakarta', 0, 1, 2, 1),
	(3, 1, 3, 'SBY01', 3, 'SBY01', 'Surabaya', 'Segment on Surabaya', 0, 1, 3, 1),
	(4, 1, 1, 'JKT01', 1, 'JKT03', 'General Agent Jakarta', 'Segment Agency General Insurance on Jakarta', 1, 1, 4, 1),
	(5, 1, 1, 'JKT01', 1, 'BPP01', 'Balikpapan', 'Segment General Insurance on Kalimantan', 1, 1, 5, 1),
	(6, 1, 1, 'JKT01', 1, 'JBANK01', 'Banking', 'Segment General Insurance Referal Banking', 1, 1, 6, 1),
	(7, 1, 7, 'ACC01', 7, 'ACC01', 'Accounting', 'Segment Accounting on Jakarta', 0, 0, 7, 1),
	(8, 1, 8, 'IT01', 8, 'IT01', 'IT', 'Segment IT on Jakarta', 0, 0, 8, 1),
	(9, 1, 9, 'BOD', 9, 'BOD', 'Board of Director', 'Board of Director', 0, 0, 9, 1),
	(10, 1, 1, 'JKT01', 1, 'CORP01', 'Corporation 01', 'Segment General Insurance for Corporation 2', 1, 1, 10, 1),
	(11, 1, 1, 'JKT01', 1, 'CORP02', 'Corporation 02', 'Segment General Insurance for Corporation 2', 1, 1, 11, 1);
/*!40000 ALTER TABLE `t_comp_segment` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_counter
CREATE TABLE IF NOT EXISTS `t_counter` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.t_counter: 0 rows
DELETE FROM `t_counter`;
/*!40000 ALTER TABLE `t_counter` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_counter` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_department
CREATE TABLE IF NOT EXISTS `t_department` (
  `f_dept_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Dept ID from Table Segment',
  `f_dept_name` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Dept Description',
  `f_dept_remark` varchar(200) NOT NULL,
  `f_emp_segment_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`f_dept_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_department: 14 rows
DELETE FROM `t_department`;
/*!40000 ALTER TABLE `t_department` DISABLE KEYS */;
INSERT INTO `t_department` (`f_dept_id`, `f_dept_name`, `f_dept_remark`, `f_emp_segment_id`) VALUES
	(1, 'Adminstrasi', '-', 1),
	(2, 'Account Executif', '-', 1),
	(3, 'Finance & Tax', '-', 2),
	(4, 'Accounting', '-', 2),
	(5, 'Traffic', '-', 3),
	(6, 'News', '-', 3),
	(7, 'Announcer', '-', 3),
	(8, 'Operator', '-', 3),
	(9, 'Mechanic Electrical', '-', 4),
	(10, 'Driver', '-', 5),
	(11, 'Security', '-', 5),
	(12, 'Office Boy', '-', 5),
	(13, 'Front Office', '-', 5),
	(14, 'Management', '-', 6);
/*!40000 ALTER TABLE `t_department` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_device
CREATE TABLE IF NOT EXISTS `t_device` (
  `f_device_id` int(11) NOT NULL,
  `f_device_name` varchar(45) NOT NULL,
  `f_device_ip` varchar(45) NOT NULL,
  `f_device_port` int(11) NOT NULL,
  `f_device_type` varchar(45) NOT NULL,
  `f_connect_type` varchar(45) NOT NULL,
  `f_description` varchar(300) NOT NULL,
  PRIMARY KEY (`f_device_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.t_device: 7 rows
DELETE FROM `t_device`;
/*!40000 ALTER TABLE `t_device` DISABLE KEYS */;
INSERT INTO `t_device` (`f_device_id`, `f_device_name`, `f_device_ip`, `f_device_port`, `f_device_type`, `f_connect_type`, `f_description`) VALUES
	(1, 'Production SIB 1', '192.168.0.10', 23, 'Smart2K v3i', 'TCP/IP', ''),
	(2, 'Production SIB 2', '192.168.0.11', 23, 'Smart2K v3i', 'TCP/IP', ''),
	(3, 'Production SIB 3', '192.168.0.12', 23, 'Smart2K v3i', 'TCP/IP', ''),
	(4, 'Production SIB 4', '192.168.0.14', 23, 'Smart2K v3i', 'TCP/IP', ''),
	(5, 'Security', '192.168.0.209', 23, 'Smart2K v3i', 'TCP/IP', ''),
	(6, 'RUKO7 - 1', '192.168.0.15', 23, 'Smart2K v3i', 'TCP/IP', ''),
	(7, 'RUKO7 - 2', '192.168.0.16', 23, 'Smart2K v3i', 'TCP/IP', '');
/*!40000 ALTER TABLE `t_device` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_employee
CREATE TABLE IF NOT EXISTS `t_employee` (
  `f_emp_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'Employee ID',
  `f_emp_initial` varchar(100) DEFAULT NULL,
  `f_emp_name` varchar(100) DEFAULT ' ' COMMENT 'Employee Name',
  `f_emp_gender` varchar(10) DEFAULT NULL,
  `f_emp_religion` varchar(20) DEFAULT NULL,
  `f_kec_id` varchar(20) DEFAULT NULL,
  `f_emp_address1` varchar(150) DEFAULT ' ' COMMENT 'Employee Address 1',
  `f_emp_rt` varchar(150) DEFAULT ' ',
  `f_emp_rw` varchar(150) DEFAULT ' ',
  `f_city_id` int(9) DEFAULT '0' COMMENT 'Employee City',
  `f_emp_home_phone` varchar(100) DEFAULT ' ' COMMENT 'Employee Home Phone',
  `f_emp_mobile_phone` varchar(100) DEFAULT ' ' COMMENT 'Employee Mobile Phone',
  `f_emp_pin_bb` varchar(20) DEFAULT ' ' COMMENT 'Employee pin BB',
  `f_emp_email` varchar(100) DEFAULT ' ' COMMENT 'Employee Email Address',
  `f_comp_branch_id` int(10) DEFAULT NULL,
  `f_position_id` int(10) DEFAULT NULL,
  `f_status_id` int(10) DEFAULT NULL,
  `f_emp_photo` varchar(100) DEFAULT NULL,
  `f_divisi_id` int(10) DEFAULT NULL,
  `f_dept_id` int(10) DEFAULT NULL,
  `f_emp_no` varchar(30) DEFAULT '',
  `f_emp_organisation` varchar(50) DEFAULT NULL,
  `f_emp_birthplace` varchar(30) DEFAULT NULL,
  `f_emp_birthdate` date DEFAULT NULL,
  `f_emp_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`f_emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_employee: 7 rows
DELETE FROM `t_employee`;
/*!40000 ALTER TABLE `t_employee` DISABLE KEYS */;
INSERT INTO `t_employee` (`f_emp_id`, `f_emp_initial`, `f_emp_name`, `f_emp_gender`, `f_emp_religion`, `f_kec_id`, `f_emp_address1`, `f_emp_rt`, `f_emp_rw`, `f_city_id`, `f_emp_home_phone`, `f_emp_mobile_phone`, `f_emp_pin_bb`, `f_emp_email`, `f_comp_branch_id`, `f_position_id`, `f_status_id`, `f_emp_photo`, `f_divisi_id`, `f_dept_id`, `f_emp_no`, `f_emp_organisation`, `f_emp_birthplace`, `f_emp_birthdate`, `f_emp_code`) VALUES
	(63, '0', 'Lusi', 'P', NULL, '0', '-', '0', '0', 0, '0', '0', '0', '0', 0, NULL, 11, NULL, NULL, 0, '2014-12.06', '0', '0', '0000-00-00', NULL),
	(60, '0', 'Agus', 'L', NULL, '0', '-', '0', '0', 0, '0', '0', '0', '0', 0, NULL, 10, NULL, NULL, 0, '2014-12.03', '0', '0', '0000-00-00', NULL),
	(61, '0', 'Nazwar', 'L', NULL, '0', '-', '0', '0', 0, '0', '0', '0', '0', 0, NULL, 10, NULL, NULL, 0, '2014-12.04', '0', '0', '0000-00-00', NULL),
	(62, '0', 'Emen', 'L', NULL, '0', '-', '0', '0', 0, '0', '0', '0', '0', 0, NULL, 10, NULL, NULL, 0, '2014-12.05', '0', '0', '0000-00-00', NULL),
	(59, '0', 'RIki', 'L', NULL, '0', '-', '0', '0', 0, '0', '0', '0', '0', 0, NULL, 9, NULL, NULL, 0, '2014-12.02', '0', '0', '0000-00-00', NULL),
	(58, '0', 'Insan', 'L', NULL, '0', '-', '0', '0', 0, '0', '0', '0', '0', 0, NULL, 10, NULL, NULL, 0, '2014-12.01', '0', '0', '0000-00-00', NULL),
	(64, '0', 'Fitri', 'P', NULL, '0', '-', '0', '0', 0, '0', '0', '0', '0', 0, NULL, 10, NULL, NULL, 0, '2014-12.07', '0', '0', '0000-00-00', NULL);
/*!40000 ALTER TABLE `t_employee` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_employee_segment
CREATE TABLE IF NOT EXISTS `t_employee_segment` (
  `f_emp_segment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Employee Segment ID from Table Segment',
  `f_emp_segment_name` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Employee Segment Description',
  `f_emp_segment_remark` varchar(200) NOT NULL,
  `f_segment_id` int(10) DEFAULT NULL,
  `f_emp_segment_cat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`f_emp_segment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Employee Segment Table';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_employee_segment: 6 rows
DELETE FROM `t_employee_segment`;
/*!40000 ALTER TABLE `t_employee_segment` DISABLE KEYS */;
INSERT INTO `t_employee_segment` (`f_emp_segment_id`, `f_emp_segment_name`, `f_emp_segment_remark`, `f_segment_id`, `f_emp_segment_cat`) VALUES
	(1, 'Marketing', '-', NULL, '0'),
	(2, 'Finance', '-', NULL, '0'),
	(3, 'Production', '-', NULL, '0'),
	(4, 'Teknik', '-', NULL, '0'),
	(5, 'General Affair', '-', NULL, '0'),
	(6, 'Management', '-', NULL, '0');
/*!40000 ALTER TABLE `t_employee_segment` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_group_module
CREATE TABLE IF NOT EXISTS `t_group_module` (
  `f_grpmod_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'Group Module ID',
  `f_app_id` int(9) DEFAULT NULL,
  `f_grpmod_code` varchar(50) NOT NULL DEFAULT ' ' COMMENT 'Group Module Code',
  `f_grpmod_name` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Group Module Name',
  `f_grpmod_desc` text NOT NULL COMMENT 'Group Module Descrption',
  `f_grpmod_active` int(1) NOT NULL DEFAULT '1' COMMENT 'Group Module Active Status',
  `f_grpmod_sort` int(5) DEFAULT NULL,
  PRIMARY KEY (`f_grpmod_id`),
  KEY `grpmod_NDX` (`f_grpmod_code`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_group_module: 7 rows
DELETE FROM `t_group_module`;
/*!40000 ALTER TABLE `t_group_module` DISABLE KEYS */;
INSERT INTO `t_group_module` (`f_grpmod_id`, `f_app_id`, `f_grpmod_code`, `f_grpmod_name`, `f_grpmod_desc`, `f_grpmod_active`, `f_grpmod_sort`) VALUES
	(1, 1, 'application_setting', 'Application Setting', 'Application Setting Group', 1, 1),
	(2, 1, 'data_master', 'Data Master', 'Data Master Group Module', 1, 2),
	(25, 1, 'SMS', 'SMS Broadcast', '-', 1, NULL),
	(27, 1, 'Layanan', 'Layanan', '-', 1, NULL),
	(28, 1, 'Loket', 'Loket', '-', 1, NULL),
	(30, 1, 'Sett_Display', 'Setting Display', 'Pengaturan Display LCD dan Suara', 1, NULL),
	(31, 1, 'Lap', 'Laporan', '-', 1, NULL);
/*!40000 ALTER TABLE `t_group_module` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_marital_status
CREATE TABLE IF NOT EXISTS `t_marital_status` (
  `f_marital_status_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_marital_status_code` varchar(5) DEFAULT NULL,
  `f_marital_status_name` varchar(50) DEFAULT NULL,
  `f_marital_status_desc` text,
  PRIMARY KEY (`f_marital_status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.t_marital_status: 5 rows
DELETE FROM `t_marital_status`;
/*!40000 ALTER TABLE `t_marital_status` DISABLE KEYS */;
INSERT INTO `t_marital_status` (`f_marital_status_id`, `f_marital_status_code`, `f_marital_status_name`, `f_marital_status_desc`) VALUES
	(1, 'TK0', 'Tidak Kawin', '-'),
	(5, 'K0', 'Kawin', '-'),
	(6, 'K1', 'Kawin Anak 1', '-'),
	(7, 'K2', 'Kawin Anak 2', '-'),
	(8, 'K3', 'Kawin Anak 3', '-');
/*!40000 ALTER TABLE `t_marital_status` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_module
CREATE TABLE IF NOT EXISTS `t_module` (
  `f_mod_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'Module ID',
  `f_app_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Application ID from table Application',
  `f_grpmod_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Group Module ID from table Group Module',
  `f_mod_parent_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Parent module ID',
  `f_mod_code` varchar(50) NOT NULL DEFAULT ' ' COMMENT 'Module Code',
  `f_mod_name` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Module Name',
  `f_mod_desc` text NOT NULL COMMENT 'Module Description',
  `f_mod_sort` int(3) NOT NULL DEFAULT '0' COMMENT 'Module Sort',
  `f_mod_display` int(1) NOT NULL DEFAULT '0' COMMENT 'Module Display status',
  `f_mod_active` int(1) NOT NULL DEFAULT '1' COMMENT 'Module Active Status',
  PRIMARY KEY (`f_mod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Application Module Table';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_module: 44 rows
DELETE FROM `t_module`;
/*!40000 ALTER TABLE `t_module` DISABLE KEYS */;
INSERT INTO `t_module` (`f_mod_id`, `f_app_id`, `f_grpmod_id`, `f_mod_parent_id`, `f_mod_code`, `f_mod_name`, `f_mod_desc`, `f_mod_sort`, `f_mod_display`, `f_mod_active`) VALUES
	(1, 1, 1, 0, 'md_app_mod', 'Application Modules', '', 1, 0, 1),
	(2, 1, 1, 0, 'md_role_access', 'Role Access', 'Setting for Role Access', 2, 0, 1),
	(3, 1, 1, 0, 'md_user_role', 'User Role', 'Setting for User Role ', 3, 0, 1),
	(12, 1, 2, 0, 'md_comp_profile', 'Company Profile', 'Setting Company Profile', 2, 0, 1),
	(14, 1, 2, 0, 'md_comp_branch', 'Company Branch', 'Setting Company Branch', 4, 0, 1),
	(10, 1, 1, 0, 'md_generator', 'Generator', 'Module for Generate other module', 4, 0, 1),
	(79, 1, 27, 0, 'md_layanan', 'Layanan', '-', 2, 0, 1),
	(80, 1, 28, 0, 'md_group_loket', 'Group Loket', '-', 1, 0, 1),
	(81, 1, 28, 0, 'md_loket', 'Loket', '-', 2, 0, 1),
	(25, 1, 2, 0, 'md_employee', 'Karyawan', 'setting Employee', 15, 0, 1),
	(55, 1, 2, 0, 'md_department', 'Department', '-', 6, 0, 1),
	(90, 1, 31, 0, 'md_laporan', 'Laporan', '-', 1, 0, 1),
	(73, 1, 2, 0, 'md_kecamatan', 'Kecamatan', '-', 14, 0, 1),
	(74, 1, 25, 0, 'md_inbox_sms', 'Inbox SMS', '-', 1, 0, 1),
	(75, 1, 25, 0, 'md_outbox_sms/fnqueue_sms', 'New & Queue SMS', '-', 2, 0, 1),
	(71, 1, 1, 0, 'md_user', 'Change Password', '-', 5, 0, 1),
	(76, 1, 25, 0, 'md_outbox_sms', 'Outbox SMS', '-', 3, 0, 1),
	(77, 1, 25, 0, 'md_com', 'Port Modem', '-', 4, 0, 1),
	(78, 1, 27, 0, 'md_group_layanan', 'Group Layanan', '-', 1, 0, 1),
	(82, 1, 1, 0, 'md_user_group', 'User Group', '-', 6, 0, 1),
	(83, 1, 0, 0, 'md_counter', 'Counter Services', '-', 1, 0, 1),
	(84, 1, 29, 0, 'md_counter', 'Counter Services', '-', 1, 0, 1),
	(85, 1, 30, 0, 'md_setting', 'Setting', '-', 1, 0, 1),
	(86, 1, 30, 0, 'md_header', 'Header', '-', 2, 0, 1),
	(87, 1, 30, 0, 'md_running_text', 'Running Text', '-', 3, 0, 1),
	(88, 1, 30, 0, 'md_video', 'Video', '-', 4, 0, 1),
	(91, 1, 2, 0, 'md_caller', 'Caller', 'Master Data Caller', 16, 0, 1),
	(92, 1, 2, 0, 'md_counter_display', 'Counter Display', 'Master Data Counter Display', 17, 0, 1),
	(93, 1, 27, 0, 'md_waktu_layanan', 'Waktu Layanan', 'Waktu Layanan', 3, 0, 1),
	(94, 1, 27, 0, 'md_prioritas_layanan', 'Prioritas Layanan', 'Prioritas Layanan', 4, 0, 1),
	(95, 1, 1, 0, 'md_generator', 'Module Generator', 'Module Generator', 7, 0, 1),
	(96, 1, 31, 0, 'md_laporan_all_detail', 'Laporan All Detail', 'Laporan All Detail', 2, 0, 1),
	(97, 1, 31, 0, 'md_laporan_all_summary', 'Laporan All Summary', 'Laporan All Summary', 3, 0, 1),
	(98, 1, 31, 0, 'md_laporan_waktu_tunggu_customer', 'Laporan Waktu Tunggu Customer', 'Laporan Waktu Tunggu Customer', 4, 0, 1),
	(99, 1, 31, 0, 'md_laporan_jumlah_ratarata', 'Laporan Jumlah rata-rata', 'Laporan Jumlah rata-rata', 6, 0, 1),
	(100, 1, 31, 0, 'md_laporan_waktu_layanan', 'Laporan Waktu Layanan', 'Laporan Waktu Layanan', 7, 0, 1),
	(101, 1, 31, 0, 'md_laporan_all_percounter_perperiode', 'Laporan All per Counter per Periode', 'Laporan All per Counter per Periode', 9, 0, 1),
	(102, 1, 31, 0, 'md_laporan_jumlah_customer_perlayanan', 'Laporan Jumlah Customer per Layanan', 'Laporan Jumlah Customer per Layanan', 10, 0, 1),
	(103, 1, 31, 0, 'md_laporan_counter', 'Laporan Counter', 'Laporan Counter', 11, 0, 1),
	(104, 1, 31, 0, 'md_laporan_waktu_tunggu_customer_summary', 'Laporan Waktu Tunggu Customer Summary', 'Laporan Waktu Tunggu Customer Summary', 5, 0, 1),
	(105, 1, 31, 0, 'md_laporan_waktu_layanan_summary', 'Laporan Jumlah rata-rata Summary', 'Laporan Jumlah rata-rata Summary', 12, 0, 1),
	(106, 1, 31, 0, 'md_laporan_waktu_layanan_summary', 'Laporan Waktu Layanan Summary', 'Laporan Waktu Layanan Summary', 8, 0, 1),
	(200, 1, 2, 0, 'md_kurs', 'kurs', 'kurs', 18, 0, 1),
	(107, 1, 31, 0, 'md_laporan_performance_user', 'Laporan Performance User', 'Laporan Performance User', 13, 0, 1);
/*!40000 ALTER TABLE `t_module` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_module_action
CREATE TABLE IF NOT EXISTS `t_module_action` (
  `f_mod_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Module ID from Table Module',
  `f_action_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Action ID from table Action',
  PRIMARY KEY (`f_mod_id`,`f_action_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Relation between Module and related Action';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_module_action: 9 rows
DELETE FROM `t_module_action`;
/*!40000 ALTER TABLE `t_module_action` DISABLE KEYS */;
INSERT INTO `t_module_action` (`f_mod_id`, `f_action_id`) VALUES
	(1, 1),
	(3, 1),
	(3, 2),
	(4, 1),
	(5, 1),
	(7, 1),
	(9, 1),
	(10, 1),
	(11, 1);
/*!40000 ALTER TABLE `t_module_action` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_position
CREATE TABLE IF NOT EXISTS `t_position` (
  `f_position_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_position_name` varchar(50) DEFAULT NULL,
  `f_position_remark` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`f_position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.t_position: 7 rows
DELETE FROM `t_position`;
/*!40000 ALTER TABLE `t_position` DISABLE KEYS */;
INSERT INTO `t_position` (`f_position_id`, `f_position_name`, `f_position_remark`) VALUES
	(1, 'BOD', 'Board of director'),
	(2, 'Top Manager', '-'),
	(3, 'Manager', '-'),
	(4, 'Supervisor', '-'),
	(5, 'Staff', '-'),
	(6, 'Non Staff', '-'),
	(7, 'Operator', '-');
/*!40000 ALTER TABLE `t_position` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_province
CREATE TABLE IF NOT EXISTS `t_province` (
  `f_province_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_province_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`f_province_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.t_province: 1 rows
DELETE FROM `t_province`;
/*!40000 ALTER TABLE `t_province` DISABLE KEYS */;
INSERT INTO `t_province` (`f_province_id`, `f_province_name`) VALUES
	(1, 'DKI Jakarta ');
/*!40000 ALTER TABLE `t_province` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_role
CREATE TABLE IF NOT EXISTS `t_role` (
  `f_role_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'Role ID',
  `f_app_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Application ID from table Application',
  `f_role_code` varchar(15) NOT NULL DEFAULT ' ' COMMENT 'Role Code',
  `f_role_name` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'Role Name',
  `f_role_desc` text NOT NULL COMMENT 'role Description',
  `f_role_active` int(1) NOT NULL DEFAULT '1' COMMENT 'Role Active Status',
  `f_role_branch_status` int(5) DEFAULT NULL,
  `f_role_data_limitation` int(5) DEFAULT NULL,
  `f_role_category` int(5) DEFAULT NULL,
  PRIMARY KEY (`f_role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_role: 3 rows
DELETE FROM `t_role`;
/*!40000 ALTER TABLE `t_role` DISABLE KEYS */;
INSERT INTO `t_role` (`f_role_id`, `f_app_id`, `f_role_code`, `f_role_name`, `f_role_desc`, `f_role_active`, `f_role_branch_status`, `f_role_data_limitation`, `f_role_category`) VALUES
	(1, 1, 'superadmin', 'System Administrator', 'System Administrator Role', 1, NULL, NULL, NULL),
	(7, 1, 'Admin', 'Admin', '-', 1, 0, 0, 0),
	(8, 1, 'Counter', 'Counter', '-', 1, 0, 0, 0);
/*!40000 ALTER TABLE `t_role` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_role_action
CREATE TABLE IF NOT EXISTS `t_role_action` (
  `f_role_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Role ID from table Role',
  `f_module_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Module ID from table Module',
  `f_action_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Action ID from table Action',
  PRIMARY KEY (`f_role_id`,`f_module_id`,`f_action_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Relation between action and related role and module';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_role_action: 7 rows
DELETE FROM `t_role_action`;
/*!40000 ALTER TABLE `t_role_action` DISABLE KEYS */;
INSERT INTO `t_role_action` (`f_role_id`, `f_module_id`, `f_action_id`) VALUES
	(1, 1, 1),
	(1, 1, 2),
	(1, 3, 1),
	(1, 3, 3),
	(1, 7, 1),
	(1, 7, 2),
	(1, 9, 1);
/*!40000 ALTER TABLE `t_role_action` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_role_module
CREATE TABLE IF NOT EXISTS `t_role_module` (
  `f_role_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Role ID from table Role',
  `f_module_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Module ID from table Module',
  `f_role_crud` int(11) DEFAULT NULL,
  PRIMARY KEY (`f_role_id`,`f_module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_role_module: 86 rows
DELETE FROM `t_role_module`;
/*!40000 ALTER TABLE `t_role_module` DISABLE KEYS */;
INSERT INTO `t_role_module` (`f_role_id`, `f_module_id`, `f_role_crud`) VALUES
	(3, 14, NULL),
	(3, 15, NULL),
	(3, 16, NULL),
	(3, 21, NULL),
	(3, 22, NULL),
	(3, 23, NULL),
	(3, 24, NULL),
	(1, 102, NULL),
	(1, 106, NULL),
	(1, 100, NULL),
	(2, 63, NULL),
	(2, 69, NULL),
	(2, 58, NULL),
	(2, 47, NULL),
	(2, 46, NULL),
	(2, 64, NULL),
	(2, 62, NULL),
	(2, 37, NULL),
	(2, 36, NULL),
	(2, 54, NULL),
	(2, 52, NULL),
	(2, 31, 1),
	(2, 43, NULL),
	(2, 34, NULL),
	(1, 104, NULL),
	(2, 25, 1),
	(2, 71, NULL),
	(4, 3, NULL),
	(4, 12, NULL),
	(4, 13, NULL),
	(4, 14, NULL),
	(4, 55, NULL),
	(4, 26, NULL),
	(4, 17, NULL),
	(4, 15, NULL),
	(4, 16, NULL),
	(4, 18, NULL),
	(4, 45, NULL),
	(4, 25, NULL),
	(4, 34, NULL),
	(5, 16, NULL),
	(5, 45, NULL),
	(5, 26, NULL),
	(5, 25, NULL),
	(5, 34, NULL),
	(5, 19, NULL),
	(5, 15, NULL),
	(5, 55, NULL),
	(5, 71, NULL),
	(5, 17, NULL),
	(5, 52, NULL),
	(5, 53, NULL),
	(5, 54, NULL),
	(1, 98, NULL),
	(1, 96, NULL),
	(7, 90, NULL),
	(7, 87, NULL),
	(7, 86, NULL),
	(7, 85, NULL),
	(1, 88, NULL),
	(1, 87, NULL),
	(8, 0, NULL),
	(1, 86, NULL),
	(1, 85, NULL),
	(1, 81, NULL),
	(1, 80, NULL),
	(7, 84, NULL),
	(7, 81, NULL),
	(7, 80, NULL),
	(7, 79, NULL),
	(7, 78, NULL),
	(7, 82, NULL),
	(7, 3, NULL),
	(1, 94, NULL),
	(1, 93, NULL),
	(1, 79, NULL),
	(1, 78, NULL),
	(1, 200, NULL),
	(1, 92, NULL),
	(1, 91, NULL),
	(1, 25, NULL),
	(1, 82, NULL),
	(1, 3, NULL),
	(1, 2, NULL),
	(1, 1, NULL),
	(1, 107, NULL);
/*!40000 ALTER TABLE `t_role_module` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_series_no
CREATE TABLE IF NOT EXISTS `t_series_no` (
  `f_series_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_series_no` varchar(20) DEFAULT NULL,
  `f_series_last_no` int(10) DEFAULT NULL,
  `f_series_remark` text,
  `f_series_modules` varchar(20) DEFAULT NULL,
  `f_series_long_no` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`f_series_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.t_series_no: 1 rows
DELETE FROM `t_series_no`;
/*!40000 ALTER TABLE `t_series_no` DISABLE KEYS */;
INSERT INTO `t_series_no` (`f_series_id`, `f_series_no`, `f_series_last_no`, `f_series_remark`, `f_series_modules`, `f_series_long_no`) VALUES
	(5, '1', 138, 'Loan', 'LN', '');
/*!40000 ALTER TABLE `t_series_no` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_status
CREATE TABLE IF NOT EXISTS `t_status` (
  `f_status_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_status_name` varchar(50) DEFAULT NULL,
  `f_status_remark` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`f_status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.t_status: 3 rows
DELETE FROM `t_status`;
/*!40000 ALTER TABLE `t_status` DISABLE KEYS */;
INSERT INTO `t_status` (`f_status_id`, `f_status_name`, `f_status_remark`) VALUES
	(10, 'Karyawan ', '-'),
	(9, 'Karyawan Kontrak', '-'),
	(11, 'Magang', '-');
/*!40000 ALTER TABLE `t_status` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_user
CREATE TABLE IF NOT EXISTS `t_user` (
  `f_user_id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'User ID',
  `f_user_login` varchar(50) NOT NULL DEFAULT ' ' COMMENT 'User Login Name',
  `f_user_password` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'User Login Password',
  `f_user_name` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'User Name',
  `f_user_email` varchar(150) NOT NULL DEFAULT ' ' COMMENT 'User email',
  `f_user_desc` text NOT NULL COMMENT 'User Description',
  `f_user_active` int(1) NOT NULL DEFAULT '1' COMMENT 'User Active Status',
  `id_user_group` int(5) NOT NULL,
  PRIMARY KEY (`f_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='Master User Table';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_user: 6 rows
DELETE FROM `t_user`;
/*!40000 ALTER TABLE `t_user` DISABLE KEYS */;
INSERT INTO `t_user` (`f_user_id`, `f_user_login`, `f_user_password`, `f_user_name`, `f_user_email`, `f_user_desc`, `f_user_active`, `id_user_group`) VALUES
	(15, 'admin', 'admin123', 'Mark', '-', '', 0, 0),
	(36, 'agus', '123', 'Agus', '-', '-', 1, 3),
	(23, 'admin_antrian', '123', 'admin', '', '', 1, 0),
	(37, 'nazwar', '123', 'Nazwar', '-', '-', 1, 2),
	(38, 'insan', '123', 'insan', '-', '-', 1, 1),
	(34, 'fitri', '123', 'fitri', '-', '-', 1, 0);
/*!40000 ALTER TABLE `t_user` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_user_employee
CREATE TABLE IF NOT EXISTS `t_user_employee` (
  `f_emp_segment_id` int(10) DEFAULT NULL,
  `f_user_id` int(9) NOT NULL DEFAULT '0' COMMENT 'User ID from table User',
  `f_emp_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Employee ID from table Employee',
  PRIMARY KEY (`f_user_id`,`f_emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Relation between User and related Employee';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_user_employee: 33 rows
DELETE FROM `t_user_employee`;
/*!40000 ALTER TABLE `t_user_employee` DISABLE KEYS */;
INSERT INTO `t_user_employee` (`f_emp_segment_id`, `f_user_id`, `f_emp_id`) VALUES
	(NULL, 1, 1),
	(NULL, 3, 4),
	(NULL, 5, 5),
	(NULL, 7, 1),
	(NULL, 8, 2),
	(NULL, 18, 12),
	(NULL, 15, 58),
	(NULL, 9, 3),
	(NULL, 13, 7),
	(NULL, 14, 8),
	(NULL, 12, 6),
	(NULL, 17, 11),
	(NULL, 16, 10),
	(NULL, 19, 13),
	(NULL, 11, 5),
	(NULL, 10, 4),
	(NULL, 6, 1),
	(NULL, 20, 3),
	(NULL, 23, 60),
	(NULL, 24, 52),
	(NULL, 25, 51),
	(NULL, 26, 21),
	(NULL, 27, 9),
	(NULL, 28, 53),
	(NULL, 30, 55),
	(NULL, 31, 56),
	(NULL, 32, 57),
	(NULL, 33, 58),
	(NULL, 34, 64),
	(NULL, 35, 62),
	(NULL, 36, 60),
	(NULL, 37, 61),
	(NULL, 38, 58);
/*!40000 ALTER TABLE `t_user_employee` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_user_group
CREATE TABLE IF NOT EXISTS `t_user_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user_group` int(10) NOT NULL,
  `nama_user_group` varchar(100) NOT NULL,
  `id_group_layanan` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.t_user_group: 8 rows
DELETE FROM `t_user_group`;
/*!40000 ALTER TABLE `t_user_group` DISABLE KEYS */;
INSERT INTO `t_user_group` (`id`, `id_user_group`, `nama_user_group`, `id_group_layanan`) VALUES
	(1, 1, 'Group Pendaftaran', 1),
	(2, 2, 'Group Foto', 2),
	(3, 3, 'Group Wawancara', 3),
	(4, 4, 'Group Pengambilan', 4),
	(5, 5, 'All', 1),
	(6, 5, 'All', 2),
	(7, 5, 'All', 3),
	(8, 5, 'All', 4);
/*!40000 ALTER TABLE `t_user_group` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_user_log
CREATE TABLE IF NOT EXISTS `t_user_log` (
  `f_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_user_id` int(9) NOT NULL DEFAULT '0' COMMENT 'User ID from table User',
  `f_app_id` text NOT NULL COMMENT 'Application ID from table Application',
  `f_login_date` datetime NOT NULL COMMENT 'Login Date & time',
  `f_logout_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `f_login_ip` varchar(50) NOT NULL DEFAULT ' ' COMMENT 'Login IP Address',
  PRIMARY KEY (`f_log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='Logs for User Login';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_user_log: 106 rows
DELETE FROM `t_user_log`;
/*!40000 ALTER TABLE `t_user_log` DISABLE KEYS */;
INSERT INTO `t_user_log` (`f_log_id`, `f_user_id`, `f_app_id`, `f_login_date`, `f_logout_date`, `f_login_ip`) VALUES
	(16, 15, 'Antrian', '2015-01-20 22:00:05', '2015-01-20 22:00:07', '127.0.0.1'),
	(17, 38, 'Antrian', '2015-01-20 22:12:04', '2015-01-20 22:12:14', '127.0.0.1'),
	(18, 15, 'Antrian', '2015-01-20 22:12:24', '0000-00-00 00:00:00', '127.0.0.1'),
	(19, 38, 'Antrian', '2015-02-10 03:19:24', '2015-02-10 03:21:25', '127.0.0.1'),
	(20, 38, 'Antrian', '2015-02-10 03:23:26', '2015-02-10 03:25:27', '127.0.0.1'),
	(21, 37, 'Antrian', '2015-02-10 08:10:20', '2015-02-10 08:12:01', '127.0.0.1'),
	(22, 15, 'Antrian', '2015-02-10 08:12:09', '2015-02-10 08:12:22', '127.0.0.1'),
	(23, 15, 'Antrian', '2015-02-10 08:12:55', '2015-02-10 08:21:43', '127.0.0.1'),
	(24, 38, 'Antrian', '2015-02-10 08:21:46', '2015-02-10 08:24:47', '127.0.0.1'),
	(25, 37, 'Antrian', '2015-02-10 08:22:02', '2015-02-10 08:25:04', '127.0.0.1'),
	(26, 38, 'Antrian', '2015-02-11 01:51:50', '2015-02-11 01:53:51', '127.0.0.1'),
	(27, 38, 'Antrian', '2015-02-11 12:50:32', '2015-02-11 12:55:34', '127.0.0.1'),
	(28, 37, 'Antrian', '2015-02-11 12:51:47', '2015-02-11 12:53:48', '127.0.0.1'),
	(29, 15, 'Antrian', '2015-02-16 15:54:26', '0000-00-00 00:00:00', '::1'),
	(30, 15, 'Antrian', '2015-02-17 22:22:22', '0000-00-00 00:00:00', '::1'),
	(31, 15, 'Antrian', '2015-02-20 20:33:53', '2015-02-20 21:09:33', '::1'),
	(32, 38, 'Antrian', '2015-02-20 21:10:08', '2015-02-20 21:13:37', '::1'),
	(33, 15, 'Antrian', '2015-02-20 21:13:43', '2015-02-20 21:14:51', '::1'),
	(34, 38, 'Antrian', '2015-02-20 21:14:59', '2015-02-20 21:18:00', '::1'),
	(35, 38, 'Antrian', '2015-02-20 21:18:35', '2015-02-20 21:21:44', '::1'),
	(36, 37, 'Antrian', '2015-02-20 22:04:26', '2015-02-20 22:05:25', '::1'),
	(37, 15, 'Antrian', '2015-02-20 22:05:28', '0000-00-00 00:00:00', '::1'),
	(38, 38, 'Antrian', '2015-02-20 22:10:23', '2015-02-20 22:14:27', '::1'),
	(39, 38, 'Antrian', '2015-02-20 22:22:58', '2015-02-20 22:26:01', '::1'),
	(40, 15, 'Antrian', '2015-02-26 12:25:21', '0000-00-00 00:00:00', '::1'),
	(41, 38, 'Antrian', '2015-03-02 13:24:21', '2015-03-02 13:32:26', '::1'),
	(42, 38, 'Antrian', '2015-03-02 13:41:34', '2015-03-02 13:45:40', '::1'),
	(43, 38, 'Antrian', '2015-03-02 16:14:54', '2015-03-02 16:16:55', '::1'),
	(44, 38, 'Antrian', '2015-03-02 16:30:20', '2015-03-02 16:32:21', '::1'),
	(45, 38, 'Antrian', '2015-03-02 20:01:49', '2015-03-02 20:05:52', '::1'),
	(46, 15, 'Antrian', '2015-03-02 20:02:43', '0000-00-00 00:00:00', '::1'),
	(47, 15, 'Antrian', '2015-03-12 16:01:39', '0000-00-00 00:00:00', '::1'),
	(48, 15, 'Antrian', '2015-03-12 16:08:18', '0000-00-00 00:00:00', '::1'),
	(49, 15, 'Antrian', '2015-03-16 22:09:02', '0000-00-00 00:00:00', '::1'),
	(50, 23, 'Antrian', '2015-04-10 00:35:13', '2015-04-10 00:35:23', '::1'),
	(51, 15, 'Antrian', '2015-04-10 00:35:30', '0000-00-00 00:00:00', '::1'),
	(52, 38, 'Antrian', '2015-04-10 00:37:25', '2015-04-10 00:43:28', '::1'),
	(53, 38, 'Antrian', '2015-04-10 00:59:21', '2015-04-10 01:01:22', '::1'),
	(54, 38, 'Antrian', '2015-04-10 01:06:56', '2015-04-10 01:09:56', '::1'),
	(55, 38, 'Antrian', '2015-04-10 01:35:20', '2015-04-10 01:39:21', '::1'),
	(56, 38, 'Antrian', '2015-04-10 01:46:34', '2015-04-10 01:48:37', '::1'),
	(57, 38, 'Antrian', '2015-04-10 02:21:47', '2015-04-10 02:26:18', '::1'),
	(58, 38, 'Antrian', '2015-04-10 22:04:25', '2015-04-10 22:06:27', '::1'),
	(59, 38, 'Antrian', '2015-04-10 22:08:31', '2015-04-10 22:10:34', '::1'),
	(60, 38, 'Antrian', '2015-04-10 22:10:47', '2015-04-10 22:13:52', '::1'),
	(61, 38, 'Antrian', '2015-04-10 22:18:33', '2015-04-10 22:22:34', '::1'),
	(62, 15, 'Antrian', '2015-04-10 22:21:54', '0000-00-00 00:00:00', '::1'),
	(63, 38, 'Antrian', '2015-04-10 22:23:21', '2015-04-10 22:27:22', '::1'),
	(64, 38, 'Antrian', '2015-04-10 22:35:36', '2015-04-10 22:37:37', '::1'),
	(65, 38, 'Antrian', '2015-04-10 22:45:28', '2015-04-10 22:50:23', '::1'),
	(66, 38, 'Antrian', '2015-04-10 22:51:04', '2015-04-10 22:57:15', '::1'),
	(67, 38, 'Antrian', '2015-04-10 23:12:58', '2015-04-10 23:15:47', '::1'),
	(68, 38, 'Antrian', '2015-04-10 23:18:54', '2015-04-10 23:20:55', '::1'),
	(69, 38, 'Antrian', '2015-04-10 23:22:12', '2015-04-10 23:24:13', '::1'),
	(70, 38, 'Antrian', '2015-04-10 23:58:43', '2015-04-10 00:03:28', '::1'),
	(71, 38, 'Antrian', '2015-04-10 00:03:38', '2015-04-10 00:06:42', '::1'),
	(72, 38, 'Antrian', '2015-04-11 00:27:04', '2015-04-11 00:29:05', '::1'),
	(73, 38, 'Antrian', '2015-04-11 00:29:10', '2015-04-11 00:31:10', '::1'),
	(74, 38, 'Antrian', '2015-04-11 00:36:01', '2015-04-11 00:38:02', '::1'),
	(75, 15, 'Antrian', '2015-04-11 11:45:55', '0000-00-00 00:00:00', '::1'),
	(76, 38, 'Antrian', '2015-04-11 11:48:46', '2015-04-11 11:51:48', '::1'),
	(77, 38, 'Antrian', '2015-04-11 11:52:26', '2015-04-11 11:54:28', '::1'),
	(78, 38, 'Antrian', '2015-04-11 11:57:35', '2015-04-11 11:59:36', '::1'),
	(79, 15, 'Antrian', '2015-04-20 17:47:39', '0000-00-00 00:00:00', '::1'),
	(80, 38, 'Antrian', '2015-07-11 11:50:48', '2015-07-11 11:53:49', '::1'),
	(81, 38, 'Antrian', '2015-07-24 13:11:05', '2015-07-24 13:48:02', '::1'),
	(82, 38, 'Antrian', '2015-08-15 10:38:32', '2015-08-15 10:41:33', '::1'),
	(83, 38, 'Antrian', '2015-08-15 10:52:33', '2015-08-15 10:54:34', '::1'),
	(84, 38, 'Antrian', '2015-08-15 10:57:57', '2015-08-15 10:58:44', '::1'),
	(85, 34, 'Antrian', '2015-08-15 11:01:09', '2015-08-15 11:01:15', '::1'),
	(86, 37, 'Antrian', '2015-08-15 11:02:46', '0000-00-00 00:00:00', '::1'),
	(87, 37, 'Antrian', '2015-08-15 14:44:12', '2015-08-15 14:46:15', '::1'),
	(88, 38, 'Antrian', '2015-08-15 15:08:45', '2015-08-15 15:08:53', '::1'),
	(89, 37, 'Antrian', '2015-08-15 15:09:10', '2015-08-15 15:09:15', '::1'),
	(90, 38, 'Antrian', '2015-08-15 15:09:18', '2015-08-15 15:12:18', '::1'),
	(91, 38, 'Antrian', '2015-08-15 15:15:11', '2015-08-15 15:15:20', '::1'),
	(92, 37, 'Antrian', '2015-08-15 15:15:28', '2015-08-15 15:17:28', '::1'),
	(93, 38, 'Antrian', '2015-08-15 17:00:45', '2015-08-15 17:01:19', '::1'),
	(94, 37, 'Antrian', '2015-08-15 17:01:31', '2015-08-15 17:04:32', '::1'),
	(95, 38, 'Antrian', '2015-08-18 19:39:39', '2015-08-18 19:44:40', '::1'),
	(96, 37, 'Antrian', '2015-08-18 19:42:20', '2015-08-18 19:46:22', '::1'),
	(97, 38, 'Antrian', '2015-08-18 19:45:04', '2015-08-18 19:47:05', '::1'),
	(98, 37, 'Antrian', '2015-08-18 22:17:38', '2015-08-18 22:24:41', '::1'),
	(99, 38, 'Antrian', '2015-08-18 22:17:39', '2015-08-18 22:26:40', '::1'),
	(100, 38, 'Antrian', '2015-08-18 22:34:30', '2015-08-18 22:35:24', '::1'),
	(101, 37, 'Antrian', '2015-08-18 22:36:26', '2015-08-18 22:39:27', '::1'),
	(102, 38, 'Antrian', '2015-08-18 22:36:31', '2015-08-18 22:39:32', '::1'),
	(103, 37, 'Antrian', '2015-08-18 22:41:15', '2015-08-18 23:11:17', '::1'),
	(104, 38, 'Antrian', '2015-08-18 22:41:23', '2015-08-18 23:11:23', '::1'),
	(105, 38, 'Antrian', '2015-08-19 15:16:07', '2015-08-19 15:36:12', '::1'),
	(106, 38, 'Antrian', '2015-08-19 15:16:10', '2015-08-19 15:16:14', '::1'),
	(107, 37, 'Antrian', '2015-08-19 15:16:22', '2015-08-19 15:56:24', '::1'),
	(108, 38, 'Antrian', '2015-08-20 09:33:53', '2015-08-22 00:36:30', '::1'),
	(109, 37, 'Antrian', '2015-08-20 09:34:11', '0000-00-00 00:00:00', '::1'),
	(110, 38, 'Antrian', '2015-08-26 13:58:38', '2015-08-26 14:32:25', '::1'),
	(111, 38, 'Antrian', '2016-02-09 10:01:38', '2016-02-09 10:21:41', '::1'),
	(112, 15, 'Antrian', '2016-02-09 10:07:56', '0000-00-00 00:00:00', '::1'),
	(113, 15, 'Antrian', '2016-02-24 08:48:52', '0000-00-00 00:00:00', '::1'),
	(114, 38, 'Antrian', '2016-02-26 11:22:51', '2016-02-26 11:42:52', '::1'),
	(115, 38, 'Antrian', '2016-02-26 13:01:58', '2016-02-26 13:21:59', '::1'),
	(116, 38, 'Antrian', '2016-02-26 17:55:09', '2016-02-26 18:25:10', '::1'),
	(117, 36, 'Antrian', '2016-02-26 23:28:52', '2016-02-26 23:58:53', '::1'),
	(118, 38, 'Antrian', '2016-03-13 22:48:55', '2016-03-13 23:08:57', '::1'),
	(119, 38, 'Antrian', '2016-03-15 00:23:43', '2016-03-15 00:53:45', '::1'),
	(120, 38, 'Antrian', '2016-03-18 23:31:49', '2016-03-19 00:16:54', '::1'),
	(121, 37, 'Antrian', '2016-03-18 23:33:21', '0000-00-00 00:00:00', '::1');
/*!40000 ALTER TABLE `t_user_log` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.t_user_role
CREATE TABLE IF NOT EXISTS `t_user_role` (
  `f_user_id` int(9) NOT NULL DEFAULT '0' COMMENT 'User ID from table User',
  `f_role_id` int(9) NOT NULL DEFAULT '0' COMMENT 'Role ID from table Role',
  PRIMARY KEY (`f_user_id`,`f_role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Relation between user and related Role';

-- Dumping data for table db_sisan_v1.4.4_bolt.t_user_role: 25 rows
DELETE FROM `t_user_role`;
/*!40000 ALTER TABLE `t_user_role` DISABLE KEYS */;
INSERT INTO `t_user_role` (`f_user_id`, `f_role_id`) VALUES
	(1, 1),
	(2, 3),
	(3, 2),
	(5, 2),
	(6, 1),
	(7, 2),
	(8, 2),
	(9, 2),
	(10, 2),
	(11, 2),
	(12, 2),
	(13, 2),
	(14, 2),
	(15, 1),
	(16, 2),
	(17, 2),
	(18, 2),
	(19, 2),
	(20, 5),
	(21, 1),
	(23, 7),
	(34, 7),
	(36, 8),
	(37, 8),
	(38, 8);
/*!40000 ALTER TABLE `t_user_role` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `id_role` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `status_online` int(10) NOT NULL,
  `id_user_group` int(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.user: 4 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `id_role`, `password`, `created_date`, `last_modified`, `last_login`, `status_online`, `id_user_group`) VALUES
	(1, 'Asep', 2, '202cb962ac59075b964b07152d234b70', '2012-12-03 18:08:50', '2012-12-03 18:08:52', '2014-01-04 12:50:26', 0, 5),
	(2, 'Insan', 1, '202cb962ac59075b964b07152d234b70', '2012-12-03 18:09:54', '2012-12-03 18:09:56', '2012-12-22 03:40:01', 0, 1),
	(3, 'Riki', 2, '202cb962ac59075b964b07152d234b70', '2012-12-03 18:10:39', '2012-12-14 17:16:12', '2012-12-19 16:12:28', 0, 2),
	(6, 'David', 2, '202cb962ac59075b964b07152d234b70', '2012-12-11 17:43:11', '2012-12-19 12:09:41', '0000-00-00 00:00:00', 0, 2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.user_group
CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user_group` int(10) NOT NULL,
  `nama_user_group` varchar(100) NOT NULL,
  `id_group_layanan` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.user_group: 7 rows
DELETE FROM `user_group`;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` (`id`, `id_user_group`, `nama_user_group`, `id_group_layanan`) VALUES
	(3, 3, 'Group Gigi', 3),
	(4, 4, 'Group Kasir', 4),
	(5, 5, 'Group Mata', 5),
	(2, 2, 'Group Umum', 2),
	(1, 1, 'Group Pendaftaran', 1),
	(7, 7, 'Apotik', 7),
	(6, 6, 'Group UGD', 6);
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id_role` int(10) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.user_role: 2 rows
DELETE FROM `user_role`;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id_role`, `role`) VALUES
	(1, 'Operator'),
	(2, 'Admin');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.video
CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(10) NOT NULL AUTO_INCREMENT,
  `nama_video` varchar(255) NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.video: 16 rows
DELETE FROM `video`;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` (`id_video`, `nama_video`) VALUES
	(1, 'video1.flv'),
	(12, 'Maddi Jane - Breakeven (Falling to Pieces) by The Script - YouTube.flv'),
	(3, 'video3.flv'),
	(4, 'video4.flv'),
	(5, 'video5.flv'),
	(6, 'video6.flv'),
	(7, 'video7.flv'),
	(8, 'video8.flv'),
	(9, 'atilla project 1.flv'),
	(10, 'atilla project 1.flv'),
	(11, 'Dion - I Love You Bibeh (The Changcuters) - Indonesian Idol 2012 (Spektakuler Show 12 Besar) - YouTube.flv'),
	(13, 'Maddi Jane - Secrets (OneRepublic) - YouTube.flv'),
	(15, 'Maid-with-the-Flaxen-Hair.mp3'),
	(16, 'Sleep-Away.mp3'),
	(17, 'Sleep-Away.mp3'),
	(18, 'Sleep-Away.mp3');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.visitor
CREATE TABLE IF NOT EXISTS `visitor` (
  `id_visitor` int(10) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `nama_visitor` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisan_v1.4.4_bolt.visitor: 0 rows
DELETE FROM `visitor`;
/*!40000 ALTER TABLE `visitor` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitor` ENABLE KEYS */;


-- Dumping structure for table db_sisan_v1.4.4_bolt.waktu_layanan
CREATE TABLE IF NOT EXISTS `waktu_layanan` (
  `id_waktu_layanan` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_awal_1` time DEFAULT NULL,
  `waktu_akhir_1` time DEFAULT NULL,
  `waktu_awal_2` time DEFAULT NULL,
  `waktu_akhir_2` time DEFAULT NULL,
  `waktu_awal_3` time DEFAULT NULL,
  `waktu_akhir_3` time DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_waktu_layanan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sisan_v1.4.4_bolt.waktu_layanan: ~0 rows (approximately)
DELETE FROM `waktu_layanan`;
/*!40000 ALTER TABLE `waktu_layanan` DISABLE KEYS */;
INSERT INTO `waktu_layanan` (`id_waktu_layanan`, `waktu_awal_1`, `waktu_akhir_1`, `waktu_awal_2`, `waktu_akhir_2`, `waktu_awal_3`, `waktu_akhir_3`, `keterangan`) VALUES
	(1, '01:01:00', '02:02:00', '03:03:00', '04:04:00', '05:05:00', '07:07:00', 'test');
/*!40000 ALTER TABLE `waktu_layanan` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
