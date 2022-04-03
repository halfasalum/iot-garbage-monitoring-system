<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-01-22 06:36:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SHOW COLUMNS FROM 
ERROR - 2022-01-22 06:38:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/ahbabcot/quickloans/application/controllers/Loans.php 119
ERROR - 2022-01-22 06:38:28 --> Severity: Notice --> Undefined property: stdClass::$er /home/ahbabcot/quickloans/application/controllers/Loans.php 120
ERROR - 2022-01-22 06:39:16 --> Severity: Notice --> Undefined property: stdClass::$er /home/ahbabcot/quickloans/application/controllers/Loans.php 120
ERROR - 2022-01-22 06:42:32 --> Query error: Table 'ahbabcot_quickloans.tbl_customer_loan_return' doesn't exist - Invalid query: SHOW COLUMNS FROM `tbl_customer_loan_return`
ERROR - 2022-01-22 06:45:12 --> Query error: Unknown column 'return_office' in 'where clause' - Invalid query: SELECT *
FROM `tbl_customer_loan_returns`
WHERE `return_office` = '25'
AND `is_collected` = 1
AND `loan_return_status` = 8
AND `return_date` = '2022-01-21'
ORDER BY `loan_return_id` DESC
ERROR - 2022-01-22 06:50:45 --> Severity: Notice --> Undefined property: stdClass::$status_name /home/ahbabcot/quickloans/application/views/loan/__tblReturnCustomer.php 38
ERROR - 2022-01-22 06:50:45 --> Severity: Notice --> Undefined property: stdClass::$status_name /home/ahbabcot/quickloans/application/views/loan/__tblReturnCustomer.php 38
ERROR - 2022-01-22 06:50:45 --> Severity: Notice --> Undefined property: stdClass::$status_name /home/ahbabcot/quickloans/application/views/loan/__tblReturnCustomer.php 38
ERROR - 2022-01-22 07:34:17 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ahbabcot/quickloans/application/controllers/Base.php:3) /home/ahbabcot/quickloans/system/core/Common.php 564
ERROR - 2022-01-22 07:34:17 --> Severity: Compile Error --> Cannot declare class Base, because the name is already in use /home/ahbabcot/quickloans/application/controllers/Base.php 3
ERROR - 2022-01-22 07:35:06 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ahbabcot/quickloans/application/controllers/Base.php:3) /home/ahbabcot/quickloans/system/core/Common.php 564
ERROR - 2022-01-22 07:35:06 --> Severity: Compile Error --> Cannot declare class Base, because the name is already in use /home/ahbabcot/quickloans/application/controllers/Base.php 3
ERROR - 2022-01-22 08:14:39 --> Severity: error --> Exception: Object of class stdClass could not be converted to string /home/ahbabcot/quickloans/application/views/loan/__tblReturnCustomer.php 57
ERROR - 2022-01-22 08:14:55 --> Severity: error --> Exception: Object of class stdClass could not be converted to string /home/ahbabcot/quickloans/application/views/loan/__tblReturnCustomer.php 57
ERROR - 2022-01-22 11:38:11 --> Query error: Column 'log_user' cannot be null - Invalid query: INSERT INTO `tbl_users_logs` (`log_action`, `log_description`, `log_browser`, `log_ip`, `log_time`, `log_user`, `log_platform`, `log_company`) VALUES ('LOG OUT', ' has log out', 'Firefox - 87.0', '197.250.198.22', '2022-01-22 11:38:11', NULL, 'Linux', NULL)
ERROR - 2022-01-22 11:54:24 --> Severity: Notice --> A non well formed numeric value encountered /home/ahbabcot/quickloans/application/views/loan/__tblReturnCustomer.php 20
ERROR - 2022-01-22 11:54:24 --> Severity: Notice --> A non well formed numeric value encountered /home/ahbabcot/quickloans/application/views/loan/__tblReturnCustomer.php 24
ERROR - 2022-01-22 20:15:06 --> Severity: error --> Exception: syntax error, unexpected '}' /home/ahbabcot/quickloans/application/controllers/Loans.php 187
