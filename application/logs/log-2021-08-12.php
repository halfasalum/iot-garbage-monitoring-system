<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-12 07:55:16 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl_role_control` (`role_id`, `control_id`) VALUES ('1', '2')
ERROR - 2021-08-12 07:55:32 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `tbl_role_control` (`role_id`, `control_id`) VALUES ('1', '1')
ERROR - 2021-08-12 08:04:03 --> Severity: Notice --> Undefined property: stdClass::$fullName /home/ahbabcot/quickloans/application/controllers/Auth.php 349
ERROR - 2021-08-12 08:04:03 --> Severity: Notice --> Undefined property: stdClass::$image /home/ahbabcot/quickloans/application/controllers/Auth.php 351
ERROR - 2021-08-12 08:04:03 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ahbabcot/quickloans/system/core/Exceptions.php:271) /home/ahbabcot/quickloans/system/helpers/url_helper.php 564
ERROR - 2021-08-12 08:12:22 --> Query error: Table 'ahbabcot_quickloans.tbl_user_shop' doesn't exist - Invalid query: SHOW COLUMNS FROM `tbl_user_shop`
ERROR - 2021-08-12 09:38:24 --> Query error: Table 'ahbabcot_quickloans.tbl_customer' doesn't exist - Invalid query: SHOW COLUMNS FROM `tbl_customer`
ERROR - 2021-08-12 09:41:05 --> Query error: Table 'ahbabcot_quickloans.tbl_customer' doesn't exist - Invalid query: SHOW COLUMNS FROM `tbl_customer`
ERROR - 2021-08-12 09:41:08 --> Query error: Table 'ahbabcot_quickloans.tbl_customer' doesn't exist - Invalid query: SHOW COLUMNS FROM `tbl_customer`
ERROR - 2021-08-12 09:41:11 --> Query error: Table 'ahbabcot_quickloans.tbl_customer' doesn't exist - Invalid query: SHOW COLUMNS FROM `tbl_customer`
ERROR - 2021-08-12 09:41:34 --> Query error: Unknown column 'customer_reg' in 'where clause' - Invalid query: SELECT *
FROM `tbl_customers`
WHERE `customer_status` = 1
AND `customer_reg` >= '2021-08-1'
AND `customer_reg` <= '2021-08-31'
ORDER BY `customer_id` DESC
