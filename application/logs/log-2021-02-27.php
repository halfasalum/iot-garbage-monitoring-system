<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-27 17:34:32 --> Query error: Unknown column 'store_name' in 'where clause' - Invalid query: SELECT *
FROM `tbl_shop`
WHERE `store_name` = 'store 1'
AND `store_shop` = '1'
AND `store_status` = 1
AND `store_company` = '0'
ORDER BY `shop_id` DESC
ERROR - 2021-02-27 17:38:54 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/ahbabrasul/sr_manager/application/controllers/Base.php:3) /home4/ahbabrasul/sr_manager/system/core/Common.php 564
ERROR - 2021-02-27 17:38:54 --> Severity: Compile Error --> Cannot declare class Base, because the name is already in use /home4/ahbabrasul/sr_manager/application/controllers/Base.php 3
ERROR - 2021-02-27 18:25:07 --> Severity: error --> Exception: Call to undefined method CI_Session::useradata() /home4/ahbabrasul/sr_manager/application/controllers/Stock.php 85
ERROR - 2021-02-27 18:25:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '.`shop_id` USING (`tbl_store`)
JOIN `tb_store`.`store_shop =` `tbl_shop`.`shop_i' at line 3 - Invalid query: SELECT *
FROM `tbl_user_shop`
JOIN `tbl_shop`.`shop_id =` `tbl_user_shop`.`shop_id` USING (`tbl_store`)
JOIN `tb_store`.`store_shop =` `tbl_shop`.`shop_id` USING ()
WHERE `user_id` = '1'
AND `user_shop_status` = 1
AND `store_status` = 1
AND `shop_status` = 1
ORDER BY `user_shop_id` DESC
ERROR - 2021-02-27 18:27:28 --> Query error: Unknown column 'tb_store.store_shop' in 'on clause' - Invalid query: SELECT *
FROM `tbl_user_shop`
JOIN `tbl_shop` ON `tbl_shop`.`shop_id` = `tbl_user_shop`.`shop_id`
JOIN `tbl_store` ON `tb_store`.`store_shop` = `tbl_shop`.`shop_id`
WHERE `user_id` = '1'
AND `user_shop_status` = 1
AND `store_status` = 1
AND `shop_status` = 1
ORDER BY `user_shop_id` DESC
ERROR - 2021-02-27 18:27:31 --> Query error: Unknown column 'tb_store.store_shop' in 'on clause' - Invalid query: SELECT *
FROM `tbl_user_shop`
JOIN `tbl_shop` ON `tbl_shop`.`shop_id` = `tbl_user_shop`.`shop_id`
JOIN `tbl_store` ON `tb_store`.`store_shop` = `tbl_shop`.`shop_id`
WHERE `user_id` = '1'
AND `user_shop_status` = 1
AND `store_status` = 1
AND `shop_status` = 1
ORDER BY `user_shop_id` DESC
ERROR - 2021-02-27 18:28:55 --> Query error: Unknown column 'tb_store.store_shop' in 'on clause' - Invalid query: SELECT *
FROM `tbl_user_shop`
JOIN `tbl_shop` ON `tbl_shop`.`shop_id` = `tbl_user_shop`.`shop_id`
JOIN `tbl_store` ON `tb_store`.`store_shop` = `tbl_shop`.`shop_id`
WHERE `user_id` = '1'
AND `user_shop_status` = 1
AND `store_status` = 1
AND `shop_status` = 1
ORDER BY `user_shop_id` DESC
ERROR - 2021-02-27 18:28:56 --> Query error: Unknown column 'tb_store.store_shop' in 'on clause' - Invalid query: SELECT *
FROM `tbl_user_shop`
JOIN `tbl_shop` ON `tbl_shop`.`shop_id` = `tbl_user_shop`.`shop_id`
JOIN `tbl_store` ON `tb_store`.`store_shop` = `tbl_shop`.`shop_id`
WHERE `user_id` = '1'
AND `user_shop_status` = 1
AND `store_status` = 1
AND `shop_status` = 1
ORDER BY `user_shop_id` DESC
ERROR - 2021-02-27 18:29:55 --> Query error: Unknown column 'tb_store.store_shop' in 'on clause' - Invalid query: SELECT *
FROM `tbl_user_shop`
JOIN `tbl_shop` ON `tbl_shop`.`shop_id` = `tbl_user_shop`.`shop_id`
JOIN `tbl_store` ON `tb_store`.`store_shop` = `tbl_shop`.`shop_id`
WHERE `user_id` = '1'
AND `user_shop_status` = 1
AND `store_status` = 1
AND `shop_status` = 1
ORDER BY `user_shop_id` DESC
ERROR - 2021-02-27 18:30:44 --> Query error: Unknown column 'store_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_user_shop`
JOIN `tbl_shop` ON `tbl_shop`.`shop_id` = `tbl_user_shop`.`shop_id`
WHERE `user_id` = '1'
AND `user_shop_status` = 1
AND `store_status` = 1
AND `shop_status` = 1
ORDER BY `user_shop_id` DESC
ERROR - 2021-02-27 18:31:13 --> Severity: error --> Exception: syntax error, unexpected end of file, expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' /home4/ahbabrasul/sr_manager/application/controllers/Stock.php 261
ERROR - 2021-02-27 18:31:16 --> Query error: Unknown column 'store_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_user_shop`
WHERE `user_id` = '1'
AND `user_shop_status` = 1
AND `store_status` = 1
AND `shop_status` = 1
ORDER BY `user_shop_id` DESC
ERROR - 2021-02-27 18:31:19 --> Query error: Unknown column 'store_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_user_shop`
WHERE `user_id` = '1'
AND `user_shop_status` = 1
AND `store_status` = 1
AND `shop_status` = 1
ORDER BY `user_shop_id` DESC
ERROR - 2021-02-27 18:32:36 --> Query error: Unknown column 'tb_store.store_shop' in 'on clause' - Invalid query: SELECT *
FROM `tbl_user_shop`
JOIN `tbl_shop` ON `tbl_shop`.`shop_id` = `tbl_user_shop`.`shop_id`
JOIN `tbl_store` ON `tb_store`.`store_shop` = `tbl_shop`.`shop_id`
ORDER BY `user_shop_id` DESC
ERROR - 2021-02-27 18:46:59 --> Severity: Notice --> Undefined property: stdClass::$shop_is /home4/ahbabrasul/sr_manager/application/views/manage/__frmUserShop.php 30
ERROR - 2021-02-27 19:13:57 --> Query error: Unknown column 'shop_iid' in 'field list' - Invalid query: INSERT INTO `tbl_user_shop` (`user_id`, `shop_iid`) VALUES ('1', '1')
ERROR - 2021-02-27 19:14:17 --> Query error: Unknown column 'shop_iid' in 'field list' - Invalid query: INSERT INTO `tbl_user_shop` (`user_id`, `shop_iid`) VALUES ('1', '1')
ERROR - 2021-02-27 19:16:21 --> Severity: Warning --> sizeof(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 188
ERROR - 2021-02-27 19:17:06 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 188
ERROR - 2021-02-27 19:18:37 --> Severity: Notice --> Undefined variable: roles /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 186
ERROR - 2021-02-27 19:18:37 --> Severity: Warning --> sizeof(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 186
ERROR - 2021-02-27 19:19:32 --> Severity: Notice --> Undefined variable: roles /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 186
ERROR - 2021-02-27 19:19:32 --> Severity: Warning --> sizeof(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 186
ERROR - 2021-02-27 19:19:34 --> Severity: Warning --> sizeof(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 186
ERROR - 2021-02-27 19:20:57 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 186
ERROR - 2021-02-27 19:27:42 --> Severity: Notice --> Undefined variable: sp /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 213
ERROR - 2021-02-27 19:27:50 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:27:57 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:28:24 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:28:26 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:28:34 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:28:37 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:28:42 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:28:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:30:47 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:30:51 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:30:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:30:53 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:31:07 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:31:16 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:31:17 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:31:19 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:31:27 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:31:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:31:54 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:32:00 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:32:08 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:32:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:32:34 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:32:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 19:32:46 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 20:49:39 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 20:49:52 --> Severity: Notice --> Undefined variable: shops /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 185
ERROR - 2021-02-27 20:49:52 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 185
ERROR - 2021-02-27 20:50:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 186
ERROR - 2021-02-27 20:54:47 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 189
ERROR - 2021-02-27 20:55:37 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 190
ERROR - 2021-02-27 20:58:44 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 190
ERROR - 2021-02-27 20:58:49 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 190
ERROR - 2021-02-27 20:59:05 --> Severity: Notice --> Undefined variable: sp /home4/ahbabrasul/sr_manager/application/views/manage/__frmUserShop.php 43
ERROR - 2021-02-27 20:59:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 190
ERROR - 2021-02-27 21:00:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 21:01:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 187
ERROR - 2021-02-27 21:02:09 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 190
ERROR - 2021-02-27 21:02:10 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 190
ERROR - 2021-02-27 21:02:12 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 190
ERROR - 2021-02-27 21:02:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 190
ERROR - 2021-02-27 21:02:29 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home4/ahbabrasul/sr_manager/application/controllers/Manage.php 190
ERROR - 2021-02-27 21:02:29 --> Severity: Notice --> Undefined variable: sp /home4/ahbabrasul/sr_manager/application/views/manage/__frmUserShop.php 43
ERROR - 2021-02-27 21:03:19 --> Severity: Notice --> Undefined variable: sp /home4/ahbabrasul/sr_manager/application/views/manage/__frmUserShop.php 43
