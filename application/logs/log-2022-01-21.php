<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-01-21 11:42:23 --> Severity: error --> Exception: syntax error, unexpected ''tbl' (T_ENCAPSED_AND_WHITESPACE) /home/ahbabcot/quickloans/application/controllers/Base.php 993
ERROR - 2022-01-21 12:09:19 --> Severity: Warning --> sizeof(): Parameter must be an array or an object that implements Countable /home/ahbabcot/quickloans/application/controllers/Base.php 1171
ERROR - 2022-01-21 13:48:18 --> Severity: error --> Exception: Class 'Base' not found /home/ahbabcot/quickloans/application/controllers/Home.php 5
ERROR - 2022-01-21 13:48:18 --> Severity: error --> Exception: syntax error, unexpected end of file /home/ahbabcot/quickloans/application/controllers/Base.php 297
ERROR - 2022-01-21 14:00:50 --> Severity: Notice --> Undefined property: stdClass::$user_company /home/ahbabcot/quickloans/application/controllers/Base.php 1183
ERROR - 2022-01-21 14:15:12 --> Query error: Unknown column 'user_company' in 'where clause' - Invalid query: SELECT DISTINCT `officer_id`
FROM `tbl_officer_zone`
WHERE `user_company` = '16'
AND `user_status` = 1
ORDER BY `officer_id` ASC
ERROR - 2022-01-21 14:15:18 --> Query error: Unknown column 'user_company' in 'where clause' - Invalid query: SELECT DISTINCT `officer_id`
FROM `tbl_officer_zone`
WHERE `user_company` = '16'
AND `user_status` = 1
ORDER BY `officer_id` ASC
ERROR - 2022-01-21 14:16:01 --> Query error: Unknown column 'user_company' in 'where clause' - Invalid query: SELECT DISTINCT `officer_id`
FROM `tbl_officer_zone`
WHERE `user_company` = '16'
AND `user_status` = 1
ORDER BY `officer_id` ASC
ERROR - 2022-01-21 14:27:17 --> Query error: Not unique table/alias: 'tbl_users' - Invalid query: SELECT *
FROM `tbl_officer_zone`
JOIN `tbl_users` ON `tbl_users`.`user_id` = `tbl_officer_zone`.`officer_id`
JOIN `tbl_users` ON `tbl_users`.`user_id` = `tbl_officer_zone`.`officer_id`
WHERE `officer_id` = '25'
AND `officer_zone_status` = 1
ORDER BY `officer_zone_id` DESC
ERROR - 2022-01-21 14:27:21 --> Query error: Not unique table/alias: 'tbl_users' - Invalid query: SELECT *
FROM `tbl_officer_zone`
JOIN `tbl_users` ON `tbl_users`.`user_id` = `tbl_officer_zone`.`officer_id`
JOIN `tbl_users` ON `tbl_users`.`user_id` = `tbl_officer_zone`.`officer_id`
WHERE `officer_id` = '25'
AND `officer_zone_status` = 1
ORDER BY `officer_zone_id` DESC
ERROR - 2022-01-21 14:28:45 --> Severity: Notice --> Undefined property: stdClass::$branch_id /home/ahbabcot/quickloans/application/controllers/Base.php 1183
ERROR - 2022-01-21 14:28:50 --> Severity: Notice --> Undefined property: stdClass::$branch_id /home/ahbabcot/quickloans/application/controllers/Base.php 1183
ERROR - 2022-01-21 14:32:04 --> Severity: Notice --> Undefined property: stdClass::$user_company /home/ahbabcot/quickloans/application/controllers/Base.php 1184
ERROR - 2022-01-21 14:32:04 --> Severity: Notice --> Undefined property: stdClass::$branch_id /home/ahbabcot/quickloans/application/controllers/Base.php 1185
ERROR - 2022-01-21 14:32:14 --> Severity: Notice --> Undefined property: stdClass::$user_company /home/ahbabcot/quickloans/application/controllers/Base.php 1184
ERROR - 2022-01-21 14:32:14 --> Severity: Notice --> Undefined property: stdClass::$branch_id /home/ahbabcot/quickloans/application/controllers/Base.php 1185
ERROR - 2022-01-21 14:32:15 --> Severity: Notice --> Undefined property: stdClass::$user_company /home/ahbabcot/quickloans/application/controllers/Base.php 1184
ERROR - 2022-01-21 14:32:15 --> Severity: Notice --> Undefined property: stdClass::$branch_id /home/ahbabcot/quickloans/application/controllers/Base.php 1185
ERROR - 2022-01-21 14:34:10 --> Query error: Not unique table/alias: 'tbl_zone' - Invalid query: SELECT *
FROM `tbl_officer_zone`
JOIN `tbl_zone` ON `tbl_zone`.`zone_id` = `tbl_officer_zone`.`zone_id`
JOIN `tbl_zone` ON `tbl_zone`.`zone_id` = `tbl_officer_zone`.`zone_id`
WHERE `officer_id` = '25'
AND `officer_zone_status` = 1
ORDER BY `officer_zone_id` DESC
ERROR - 2022-01-21 14:34:46 --> Severity: Notice --> Undefined property: stdClass::$branch_id /home/ahbabcot/quickloans/application/controllers/Base.php 1183
ERROR - 2022-01-21 16:02:36 --> Severity: error --> Exception: Class 'Base' not found /home/ahbabcot/quickloans/application/controllers/Home.php 5
ERROR - 2022-01-21 16:52:11 --> Severity: error --> Exception: syntax error, unexpected 'function' (T_FUNCTION), expecting '(' /home/ahbabcot/quickloans/application/controllers/Base.php 1230
ERROR - 2022-01-21 16:52:11 --> Severity: error --> Exception: syntax error, unexpected 'function' (T_FUNCTION), expecting '(' /home/ahbabcot/quickloans/application/controllers/Base.php 1230
ERROR - 2022-01-21 17:01:55 --> Severity: Notice --> Undefined index: toady_target /home/ahbabcot/quickloans/application/views/common/dashboard.php 34
ERROR - 2022-01-21 17:25:43 --> Severity: error --> Exception: syntax error, unexpected '}', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' /home/ahbabcot/quickloans/application/controllers/Base.php 1242
ERROR - 2022-01-21 18:48:22 --> Severity: Notice --> Undefined property: stdClass::$loan_status /home/ahbabcot/quickloans/application/views/loan/returns.php 92
ERROR - 2022-01-21 18:49:03 --> Severity: Notice --> Undefined property: stdClass::$loan_status /home/ahbabcot/quickloans/application/views/loan/returns.php 92
ERROR - 2022-01-21 18:49:06 --> Severity: Notice --> Undefined property: stdClass::$loan_status /home/ahbabcot/quickloans/application/views/loan/returns.php 92
ERROR - 2022-01-21 18:49:10 --> Severity: Notice --> Undefined property: stdClass::$loan_status /home/ahbabcot/quickloans/application/views/loan/returns.php 92
ERROR - 2022-01-21 22:16:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 - Invalid query: SHOW COLUMNS FROM 
