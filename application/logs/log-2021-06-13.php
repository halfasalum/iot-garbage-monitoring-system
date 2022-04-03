<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-06-13 11:10:59 --> Severity: Notice --> Undefined variable: fullname /home/ahbabcot/quickloans/application/controllers/Auth.php 447
ERROR - 2021-06-13 11:10:59 --> Severity: Notice --> Undefined variable: username /home/ahbabcot/quickloans/application/controllers/Auth.php 450
ERROR - 2021-06-13 11:10:59 --> Severity: Notice --> Undefined variable: password /home/ahbabcot/quickloans/application/controllers/Auth.php 450
ERROR - 2021-06-13 17:49:28 --> Query error: Unknown column 'userStatus' in 'where clause' - Invalid query: SELECT *
FROM `tbl_users`
WHERE `username` = 'ahbabrasul'
AND `userStatus` = 1
ORDER BY `user_id` DESC
ERROR - 2021-06-13 17:50:19 --> Severity: Notice --> Undefined property: stdClass::$userId /home/ahbabcot/quickloans/application/controllers/Auth.php 30
ERROR - 2021-06-13 17:50:19 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ahbabcot/quickloans/system/core/Exceptions.php:271) /home/ahbabcot/quickloans/system/helpers/url_helper.php 564
ERROR - 2021-06-13 17:51:42 --> Severity: Notice --> Undefined property: stdClass::$userId /home/ahbabcot/quickloans/application/controllers/Auth.php 391
ERROR - 2021-06-13 17:51:42 --> Query error: Unknown column 'userId' in 'where clause' - Invalid query: UPDATE `tbl_users` SET `pass_token` = 863129, `token_inserted` = '2021-06-13 17:51:42'
WHERE `userId` IS NULL
ERROR - 2021-06-13 17:51:42 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ahbabcot/quickloans/system/core/Exceptions.php:271) /home/ahbabcot/quickloans/system/core/Common.php 564
ERROR - 2021-06-13 17:54:35 --> Severity: error --> Exception: syntax error, unexpected end of file /home/ahbabcot/quickloans/application/controllers/Auth.php 248
ERROR - 2021-06-13 17:54:46 --> Severity: Notice --> Undefined property: stdClass::$email /home/ahbabcot/quickloans/application/controllers/Auth.php 392
ERROR - 2021-06-13 17:54:46 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ahbabcot/quickloans/system/core/Exceptions.php:271) /home/ahbabcot/quickloans/system/core/Common.php 564
ERROR - 2021-06-13 18:24:29 --> Severity: Notice --> Undefined property: stdClass::$fullName /home/ahbabcot/quickloans/application/controllers/Auth.php 35
ERROR - 2021-06-13 18:24:29 --> Severity: Notice --> Undefined property: stdClass::$image /home/ahbabcot/quickloans/application/controllers/Auth.php 37
ERROR - 2021-06-13 18:24:29 --> Query error: Table 'ahbabcot_quickloans.tbl_users_logs' doesn't exist - Invalid query: INSERT INTO `tbl_users_logs` (`activity`, `description`, `browser`, `ipAddress`, `created`, `logDate`, `userId`, `platform`, `log_company`) VALUES ('LOGIN', ' has login', 'Firefox - 87.0', '196.249.97.101', '2021-06-13 18:24:29', '2021-06-13 06:29:24 pm', NULL, 'Linux', NULL)
ERROR - 2021-06-13 18:24:29 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ahbabcot/quickloans/system/core/Exceptions.php:271) /home/ahbabcot/quickloans/system/core/Common.php 564
ERROR - 2021-06-13 18:30:13 --> Severity: Notice --> Undefined property: stdClass::$user_fullName /home/ahbabcot/quickloans/application/controllers/Auth.php 35
ERROR - 2021-06-13 18:30:13 --> Query error: Unknown column 'activity' in 'field list' - Invalid query: INSERT INTO `tbl_users_logs` (`activity`, `log_action`, `log_browser`, `log_ip`, `created`, `log_time`, `log_user`, `log_platform`, `log_company`) VALUES ('LOGIN', ' has login', 'Firefox - 87.0', '196.249.97.101', '2021-06-13 18:30:13', '2021-06-13 06:13:30 pm', '1', 'Linux', NULL)
ERROR - 2021-06-13 18:30:13 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/ahbabcot/quickloans/system/core/Exceptions.php:271) /home/ahbabcot/quickloans/system/core/Common.php 564
ERROR - 2021-06-13 18:30:50 --> Query error: Unknown column 'activity' in 'field list' - Invalid query: INSERT INTO `tbl_users_logs` (`activity`, `log_action`, `log_browser`, `log_ip`, `created`, `log_time`, `log_user`, `log_platform`, `log_company`) VALUES ('LOGIN', 'Halfa Salum has login', 'Firefox - 87.0', '196.249.97.101', '2021-06-13 18:30:50', '2021-06-13 06:50:30 pm', '1', 'Linux', NULL)
ERROR - 2021-06-13 18:31:45 --> Query error: Unknown column 'created' in 'field list' - Invalid query: INSERT INTO `tbl_users_logs` (`log_action`, `log_description`, `log_browser`, `log_ip`, `created`, `log_time`, `log_user`, `log_platform`, `log_company`) VALUES ('LOGIN', 'Halfa Salum has login', 'Firefox - 87.0', '196.249.97.101', '2021-06-13 18:31:45', '2021-06-13 06:45:31 pm', '1', 'Linux', NULL)
ERROR - 2021-06-13 18:32:25 --> Query error: Column 'log_company' cannot be null - Invalid query: INSERT INTO `tbl_users_logs` (`log_action`, `log_description`, `log_browser`, `log_ip`, `log_time`, `log_user`, `log_platform`, `log_company`) VALUES ('LOGIN', 'Halfa Salum has login', 'Firefox - 87.0', '196.249.97.101', '2021-06-13 18:32:25', '1', 'Linux', NULL)
ERROR - 2021-06-13 18:33:20 --> Query error: Table 'ahbabcot_quickloans.tbl_sale' doesn't exist - Invalid query: SHOW COLUMNS FROM `tbl_sale`
ERROR - 2021-06-13 18:33:47 --> 404 Page Not Found: Home/index
