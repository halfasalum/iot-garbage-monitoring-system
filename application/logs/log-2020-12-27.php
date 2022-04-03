<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-12-27 08:58:57 --> Severity: Parsing Error --> syntax error, unexpected end of file /home4/ahbabrasul/macheetah/application/views/sales/dashboard.php 284
ERROR - 2020-12-27 14:32:56 --> Severity: Notice --> Undefined property: Sales::$sesson /home4/ahbabrasul/macheetah/application/controllers/Sales.php 47
ERROR - 2020-12-27 14:32:56 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/ahbabrasul/macheetah/system/core/Exceptions.php:271) /home4/ahbabrasul/macheetah/system/core/Common.php 564
ERROR - 2020-12-27 14:32:56 --> Severity: Error --> Call to a member function userdata() on null /home4/ahbabrasul/macheetah/application/controllers/Sales.php 47
ERROR - 2020-12-27 14:35:37 --> Query error: Unknown column 'customer_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_sale`
WHERE `customer_status` = 1
ORDER BY `sale_id` DESC
ERROR - 2020-12-27 14:35:38 --> 404 Page Not Found: Faviconico/index
ERROR - 2020-12-27 14:35:44 --> Query error: Unknown column 'customer_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_sale`
WHERE `customer_status` = 1
ORDER BY `sale_id` DESC
ERROR - 2020-12-27 14:58:09 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/ahbabrasul/macheetah/application/controllers/Base.php:920) /home4/ahbabrasul/macheetah/system/core/Common.php 564
ERROR - 2020-12-27 14:58:09 --> Severity: Parsing Error --> syntax error, unexpected '}' /home4/ahbabrasul/macheetah/application/controllers/Base.php 920
ERROR - 2020-12-27 14:58:10 --> 404 Page Not Found: Faviconico/index
ERROR - 2020-12-27 15:10:41 --> Query error: Column 'item_sale_number' cannot be null - Invalid query: INSERT INTO `tbl_sale_items` (`item_sale_number`, `sale_product`, `price`, `total`) VALUES (NULL, '3', '12500', '12500')
ERROR - 2020-12-27 15:35:27 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/ahbabrasul/macheetah/application/controllers/Auth.php:6) /home4/ahbabrasul/macheetah/system/core/Common.php 564
ERROR - 2020-12-27 15:35:27 --> Severity: Error --> Class 'Base' not found /home4/ahbabrasul/macheetah/application/controllers/Auth.php 6
ERROR - 2020-12-27 15:35:40 --> Severity: Notice --> Undefined property: CI_Loader::$route /home4/ahbabrasul/macheetah/application/views/index_pages.php 298
ERROR - 2020-12-27 15:35:40 --> Severity: Notice --> Trying to get property of non-object /home4/ahbabrasul/macheetah/application/views/index_pages.php 298
ERROR - 2020-12-27 15:36:18 --> Severity: Notice --> Undefined property: CI_Router::$fetch_class /home4/ahbabrasul/macheetah/application/views/index_pages.php 298
ERROR - 2020-12-27 15:38:19 --> Severity: Notice --> Trying to get property of non-object /home4/ahbabrasul/macheetah/application/controllers/Base.php 919
ERROR - 2020-12-27 15:38:19 --> Severity: Notice --> Trying to get property of non-object /home4/ahbabrasul/macheetah/application/controllers/Base.php 920
ERROR - 2020-12-27 15:38:19 --> Severity: Notice --> Trying to get property of non-object /home4/ahbabrasul/macheetah/application/controllers/Base.php 921
ERROR - 2020-12-27 15:38:19 --> Query error: Column 'sale_product' cannot be null - Invalid query: INSERT INTO `tbl_sale_items` (`item_sale_number`, `sale_product`, `price`, `total`) VALUES ('MACHEETAH-20201227-SALE-1', NULL, NULL, NULL)
ERROR - 2020-12-27 15:38:19 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/ahbabrasul/macheetah/system/core/Exceptions.php:271) /home4/ahbabrasul/macheetah/system/core/Common.php 564
ERROR - 2020-12-27 15:39:37 --> Query error: Table 'ahbabras_macheetah.tbl_sale_item' doesn't exist - Invalid query: SHOW COLUMNS FROM `tbl_sale_item`
ERROR - 2020-12-27 15:40:15 --> Query error: Unknown column 'tbl_sale_item.sale_product' in 'on clause' - Invalid query: SELECT *
FROM `tbl_sale_items`
JOIN `tbl_product` ON `tbl_product`.`product_id` = `tbl_sale_item`.`sale_product`
WHERE `item_sale_number` = 'MACHEETAH-20201227-SALE-1'
ORDER BY `item_id` DESC
ERROR - 2020-12-27 15:40:40 --> Severity: Notice --> Undefined property: stdClass::$produc_name /home4/ahbabrasul/macheetah/application/controllers/Base.php 939
ERROR - 2020-12-27 15:49:38 --> Severity: Notice --> Trying to get property of non-object /home4/ahbabrasul/macheetah/application/controllers/Base.php 919
ERROR - 2020-12-27 15:49:38 --> Severity: Notice --> Trying to get property of non-object /home4/ahbabrasul/macheetah/application/controllers/Base.php 920
ERROR - 2020-12-27 15:49:38 --> Severity: Notice --> Trying to get property of non-object /home4/ahbabrasul/macheetah/application/controllers/Base.php 921
ERROR - 2020-12-27 15:49:38 --> Query error: Column 'sale_product' cannot be null - Invalid query: INSERT INTO `tbl_sale_items` (`item_sale_number`, `sale_product`, `price`, `total`) VALUES ('MACHEETAH-20201227-SALE-1', NULL, NULL, NULL)
ERROR - 2020-12-27 15:49:38 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/ahbabrasul/macheetah/system/core/Exceptions.php:271) /home4/ahbabrasul/macheetah/system/core/Common.php 564
ERROR - 2020-12-27 18:16:10 --> 404 Page Not Found: Auth/assets
ERROR - 2020-12-27 18:23:29 --> Severity: Warning --> include(sale/_nav.php): failed to open stream: No such file or directory /home4/ahbabrasul/macheetah/application/views/index_pages.php 144
ERROR - 2020-12-27 18:23:29 --> Severity: Warning --> include(sale/_nav.php): failed to open stream: No such file or directory /home4/ahbabrasul/macheetah/application/views/index_pages.php 144
ERROR - 2020-12-27 18:23:29 --> Severity: Warning --> include(): Failed opening 'sale/_nav.php' for inclusion (include_path='.:/opt/cpanel/ea-php56/root/usr/share/pear') /home4/ahbabrasul/macheetah/application/views/index_pages.php 144
