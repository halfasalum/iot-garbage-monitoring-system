<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-10-12 00:46:39 --> Severity: error --> Exception: syntax error, unexpected '$lastLoan' (T_VARIABLE) /home/ahbabcot/quickloans/application/controllers/Base.php 627
ERROR - 2021-10-12 11:11:04 --> Severity: Notice --> Undefined property: stdClass::$customer_name /home/ahbabcot/quickloans/application/controllers/Base.php 610
ERROR - 2021-10-12 16:38:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`tbl_customers`.`last_loan`
WHERE `customer_id` = '1'
ORDER BY `customer_id` DES' at line 3 - Invalid query: SELECT *
FROM `tbl_customers`
JOIN `tbl_loans` ON `tbl_loans`.`loan_id` =`=` `tbl_customers`.`last_loan`
WHERE `customer_id` = '1'
ORDER BY `customer_id` DESC
ERROR - 2021-10-12 17:02:17 --> Severity: Notice --> Undefined property: stdClass::$customer_ids /home/ahbabcot/quickloans/application/controllers/Base.php 612
ERROR - 2021-10-12 17:02:21 --> Severity: Notice --> Undefined property: stdClass::$customer_ids /home/ahbabcot/quickloans/application/controllers/Base.php 612
