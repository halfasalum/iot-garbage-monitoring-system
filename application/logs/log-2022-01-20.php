<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-01-20 13:20:51 --> Severity: error --> Exception: Class 'Base' not found /home/ahbabcot/quickloans/application/controllers/Auth.php 6
ERROR - 2022-01-20 13:20:52 --> Severity: error --> Exception: syntax error, unexpected end of file /home/ahbabcot/quickloans/application/controllers/Base.php 766
ERROR - 2022-01-20 13:26:23 --> Query error: Unknown column 'tbl_loans.load_id' in 'on clause' - Invalid query: SELECT *
FROM `tbl_customers`
JOIN `tbl_loans` ON `tbl_loans`.`load_id` = `tbl_customers`.`last_loan`
WHERE `customer_zone` = '8'
AND `customer_status` = 1
ORDER BY `customer_id` DESC
ERROR - 2022-01-20 13:27:53 --> Query error: Unknown column 'tbl_loans.load_id' in 'on clause' - Invalid query: SELECT *
FROM `tbl_customers`
JOIN `tbl_loans` ON `tbl_loans`.`load_id` = `tbl_customers`.`last_loan`
WHERE `customer_zone` = '8'
AND `customer_status` = 1
ORDER BY `customer_id` DESC
ERROR - 2022-01-20 13:42:08 --> Severity: Warning --> sizeof(): Parameter must be an array or an object that implements Countable /home/ahbabcot/quickloans/application/views/loan/dashboard.php 62
ERROR - 2022-01-20 13:42:08 --> Severity: Warning --> sizeof(): Parameter must be an array or an object that implements Countable /home/ahbabcot/quickloans/application/views/loan/dashboard.php 65
ERROR - 2022-01-20 13:42:08 --> Severity: Warning --> sizeof(): Parameter must be an array or an object that implements Countable /home/ahbabcot/quickloans/application/views/loan/dashboard.php 68
ERROR - 2022-01-20 14:23:50 --> Severity: error --> Exception: Class 'Base' not found /home/ahbabcot/quickloans/application/controllers/Auth.php 6
ERROR - 2022-01-20 14:24:00 --> Severity: error --> Exception: Call to undefined method Loans::loanStatistics() /home/ahbabcot/quickloans/application/controllers/Loans.php 26
ERROR - 2022-01-20 14:24:53 --> Severity: error --> Exception: Call to private method Base::loanRequested() from context 'Loans' /home/ahbabcot/quickloans/application/controllers/Loans.php 26
ERROR - 2022-01-20 14:24:55 --> Severity: error --> Exception: Class 'Base' not found /home/ahbabcot/quickloans/application/controllers/Loans.php 4
ERROR - 2022-01-20 14:51:43 --> Severity: Notice --> Undefined property: stdClass::$loan_interest /home/ahbabcot/quickloans/application/views/loan/dashboard.php 316
ERROR - 2022-01-20 14:51:43 --> Severity: Notice --> Undefined property: stdClass::$loan_interest /home/ahbabcot/quickloans/application/views/loan/dashboard.php 316
ERROR - 2022-01-20 15:13:16 --> Severity: Notice --> Undefined property: stdClass::$sale_status /home/ahbabcot/quickloans/application/views/loan/dashboard.php 332
ERROR - 2022-01-20 15:13:44 --> Severity: Notice --> Undefined property: stdClass::$sale_id /home/ahbabcot/quickloans/application/views/loan/dashboard.php 333
ERROR - 2022-01-20 15:13:44 --> Severity: Notice --> Undefined property: stdClass::$sale_id /home/ahbabcot/quickloans/application/views/loan/dashboard.php 334
ERROR - 2022-01-20 15:17:55 --> Query error: Table 'ahbabcot_quickloans.tbl_sale' doesn't exist - Invalid query: SHOW COLUMNS FROM `tbl_sale`
ERROR - 2022-01-20 15:35:34 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl_module_control` (`control_name`, `module_id`) VALUES ('Intermediate Loan Return Approval', '18')
ERROR - 2022-01-20 17:17:32 --> Severity: Notice --> Undefined property: stdClass::$loan_number /home/ahbabcot/quickloans/application/controllers/Base.php 1082
ERROR - 2022-01-20 17:41:37 --> Severity: error --> Exception: syntax error, unexpected ';', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' /home/ahbabcot/quickloans/application/controllers/Base.php 1106
ERROR - 2022-01-20 17:48:20 --> Query error: Column 'branch_id' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl_loans`
JOIN `tbl_customers` ON `tbl_customers`.`customer_id` = `tbl_loans`.`customer`
JOIN `tbl_users` ON `tbl_users`.`user_id` = `tbl_loans`.`officer_id`
JOIN `tbl_branch` ON `tbl_branch`.`branch_id` = `tbl_loans`.`branch_id`
JOIN `tbl_zone` ON `tbl_zone`.`zone_id` = `tbl_loans`.`zone_id`
WHERE `branch_id` = '13'
AND `loan_status` = 11
AND `loan_stage_approval` = 1
ORDER BY `loan_id` DESC
