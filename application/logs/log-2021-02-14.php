<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-14 10:05:28 --> 404 Page Not Found: Undefined/undefined
ERROR - 2021-02-14 10:11:03 --> 404 Page Not Found: Sale/viewSale
ERROR - 2021-02-14 10:11:14 --> 404 Page Not Found: Sale/viewSale
ERROR - 2021-02-14 10:12:11 --> 404 Page Not Found: Sale/viewSale
ERROR - 2021-02-14 10:14:41 --> 404 Page Not Found: Sale/viewSale
ERROR - 2021-02-14 10:43:30 --> Severity: Notice --> Trying to get property of non-object /home4/ahbabrasul/macheetah/application/views/sales/viewSale.php 27
ERROR - 2021-02-14 10:44:02 --> Severity: Notice --> Trying to get property of non-object /home4/ahbabrasul/macheetah/application/views/sales/viewSale.php 27
ERROR - 2021-02-14 11:03:42 --> Query error: Table 'ahbabras_macheetah.sale_items' doesn't exist - Invalid query: SHOW COLUMNS FROM `sale_items`
ERROR - 2021-02-14 11:04:18 --> Query error: Unknown column 'sale_number' in 'where clause' - Invalid query: SELECT *
FROM `tbl_sale_items`
JOIN `tbl_product` ON `tbl_product`.`product_id` = `sale_items`.`sale_product`
WHERE `sale_number` = 'MACHEETAH-20210124-SALE-3'
AND `item_status` = 1
ORDER BY `item_id` DESC
ERROR - 2021-02-14 11:04:21 --> Query error: Unknown column 'sale_number' in 'where clause' - Invalid query: SELECT *
FROM `tbl_sale_items`
JOIN `tbl_product` ON `tbl_product`.`product_id` = `sale_items`.`sale_product`
WHERE `sale_number` = 'MACHEETAH-20210124-SALE-2'
AND `item_status` = 1
ORDER BY `item_id` DESC
ERROR - 2021-02-14 11:05:39 --> 404 Page Not Found: Sales/viewSale
ERROR - 2021-02-14 11:05:48 --> Query error: Unknown column 'sale_items.sale_product' in 'on clause' - Invalid query: SELECT *
FROM `tbl_sale_items`
JOIN `tbl_product` ON `tbl_product`.`product_id` = `sale_items`.`sale_product`
WHERE `item_sale_number` = 'MACHEETAH-20210124-SALE-3'
AND `item_status` = 1
ORDER BY `item_id` DESC
ERROR - 2021-02-14 16:12:07 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:14:14 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:20:29 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:20:32 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:20:43 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:20:55 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:22:19 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:22:22 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:22:24 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:22:26 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:22:28 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:22:31 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:24:07 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:24:14 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 16:24:15 --> 404 Page Not Found: Assets/charts
ERROR - 2021-02-14 17:25:06 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-02-14 17:25:50 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/ahbabrasul/macheetah/application/controllers/Sales.php:278) /home4/ahbabrasul/macheetah/system/core/Common.php 564
ERROR - 2021-02-14 17:25:50 --> Severity: Parsing Error --> syntax error, unexpected end of file /home4/ahbabrasul/macheetah/application/controllers/Sales.php 278
ERROR - 2021-02-14 20:46:43 --> 404 Page Not Found: Undefined/undefined
ERROR - 2021-02-14 20:48:03 --> Severity: Notice --> Undefined property: stdClass::$sale_paid /home4/ahbabrasul/macheetah/application/controllers/Base.php 937
ERROR - 2021-02-14 20:48:03 --> Severity: Notice --> Undefined property: stdClass::$sale_paid /home4/ahbabrasul/macheetah/application/controllers/Base.php 937
ERROR - 2021-02-14 20:48:11 --> Severity: Notice --> Undefined property: stdClass::$sale_paid /home4/ahbabrasul/macheetah/application/controllers/Base.php 937
ERROR - 2021-02-14 20:48:11 --> Severity: Notice --> Undefined property: stdClass::$sale_paid /home4/ahbabrasul/macheetah/application/controllers/Base.php 937
ERROR - 2021-02-14 21:07:15 --> Query error: Unknown column 'product_statu' in 'where clause' - Invalid query: SELECT *
FROM `tbl_product`
JOIN `tbl_status` ON `tbl_status`.`statusId` = `tbl_product`.`product_status`
JOIN `tbl_brand` ON `tbl_brand`.`brand_id` = `tbl_product`.`product_brand`
JOIN `tbl_category` ON `tbl_category`.`category_id` = `tbl_product`.`product_category`
JOIN `tbl_unit` ON `tbl_unit`.`unit_id` = `tbl_product`.`product_unit`
WHERE `product_statu` != 4
AND 0 = 'product_alert >= product_quantity'
ORDER BY `product_id` DESC
ERROR - 2021-02-14 21:07:47 --> Query error: Unknown column 'product_statu' in 'where clause' - Invalid query: SELECT *
FROM `tbl_product`
JOIN `tbl_status` ON `tbl_status`.`statusId` = `tbl_product`.`product_status`
JOIN `tbl_brand` ON `tbl_brand`.`brand_id` = `tbl_product`.`product_brand`
JOIN `tbl_category` ON `tbl_category`.`category_id` = `tbl_product`.`product_category`
JOIN `tbl_unit` ON `tbl_unit`.`unit_id` = `tbl_product`.`product_unit`
WHERE `product_statu` != 4
AND 0 = 'product_alert >= product_quantity'
ORDER BY `product_id` DESC
ERROR - 2021-02-14 21:08:31 --> Query error: Unknown column 'product_statu' in 'where clause' - Invalid query: SELECT *
FROM `tbl_product`
JOIN `tbl_status` ON `tbl_status`.`statusId` = `tbl_product`.`product_status`
JOIN `tbl_brand` ON `tbl_brand`.`brand_id` = `tbl_product`.`product_brand`
JOIN `tbl_category` ON `tbl_category`.`category_id` = `tbl_product`.`product_category`
JOIN `tbl_unit` ON `tbl_unit`.`unit_id` = `tbl_product`.`product_unit`
WHERE `product_statu` != 4
AND `product_alert` >= 'product_quantity'
ORDER BY `product_id` DESC
ERROR - 2021-02-14 21:09:21 --> Query error: Unknown column 'product_statu' in 'where clause' - Invalid query: SELECT *
FROM `tbl_product`
JOIN `tbl_status` ON `tbl_status`.`statusId` = `tbl_product`.`product_status`
JOIN `tbl_brand` ON `tbl_brand`.`brand_id` = `tbl_product`.`product_brand`
JOIN `tbl_category` ON `tbl_category`.`category_id` = `tbl_product`.`product_category`
JOIN `tbl_unit` ON `tbl_unit`.`unit_id` = `tbl_product`.`product_unit`
WHERE `product_statu` != 4
AND `product_alert` >= 'product_quantity'
ORDER BY `product_id` DESC
ERROR - 2021-02-14 21:15:34 --> Query error: Unknown column 'product_statu' in 'where clause' - Invalid query: SELECT *
FROM `tbl_product`
JOIN `tbl_status` ON `tbl_status`.`statusId` = `tbl_product`.`product_status`
JOIN `tbl_brand` ON `tbl_brand`.`brand_id` = `tbl_product`.`product_brand`
JOIN `tbl_category` ON `tbl_category`.`category_id` = `tbl_product`.`product_category`
JOIN `tbl_unit` ON `tbl_unit`.`unit_id` = `tbl_product`.`product_unit`
WHERE `product_statu` != 4
AND `product_alert` >= 'product_quantity'
ORDER BY `product_id` DESC
ERROR - 2021-02-14 21:19:14 --> Query error: Unknown column 'product_statu' in 'where clause' - Invalid query: SELECT *
FROM `tbl_product`
JOIN `tbl_status` ON `tbl_status`.`statusId` = `tbl_product`.`product_status`
JOIN `tbl_brand` ON `tbl_brand`.`brand_id` = `tbl_product`.`product_brand`
JOIN `tbl_category` ON `tbl_category`.`category_id` = `tbl_product`.`product_category`
JOIN `tbl_unit` ON `tbl_unit`.`unit_id` = `tbl_product`.`product_unit`
WHERE `product_statu` != 4
ORDER BY `product_id` DESC
ERROR - 2021-02-14 22:05:07 --> Query error: Table 'ahbabras_macheetah.tbl_transaction_journal' doesn't exist - Invalid query: select distinct(transactionId) as transactionId from tbl_transaction_journal inner join tbl_transaction on tbl_transaction.transId = tbl_transaction_journal.transactionId where account != 1004 and tbl_transaction.date between'2021-02-01' and '2021-02-14'order by transactionId desc
ERROR - 2021-02-14 22:05:18 --> Query error: Table 'ahbabras_macheetah.tbl_transaction_journal' doesn't exist - Invalid query: select distinct(transactionId) as transactionId from tbl_transaction_journal inner join tbl_transaction on tbl_transaction.transId = tbl_transaction_journal.transactionId where account != 1004 and tbl_transaction.date between'2021-02-01' and '2021-02-14'order by transactionId desc
ERROR - 2021-02-14 22:20:37 --> Severity: Notice --> A non well formed numeric value encountered /home4/ahbabrasul/macheetah/application/controllers/Reports.php 83
ERROR - 2021-02-14 22:20:37 --> Severity: Notice --> A non well formed numeric value encountered /home4/ahbabrasul/macheetah/application/controllers/Reports.php 83
ERROR - 2021-02-14 22:22:06 --> Severity: Notice --> A non well formed numeric value encountered /home4/ahbabrasul/macheetah/application/controllers/Reports.php 84
ERROR - 2021-02-14 22:22:06 --> Severity: Notice --> A non well formed numeric value encountered /home4/ahbabrasul/macheetah/application/controllers/Reports.php 84
ERROR - 2021-02-14 22:25:57 --> Severity: Notice --> A non well formed numeric value encountered /home4/ahbabrasul/macheetah/application/controllers/Reports.php 84
ERROR - 2021-02-14 22:25:57 --> Severity: Notice --> A non well formed numeric value encountered /home4/ahbabrasul/macheetah/application/controllers/Reports.php 84
ERROR - 2021-02-14 22:47:00 --> Severity: Notice --> Undefined property: stdClass::$asle_paid /home4/ahbabrasul/macheetah/application/controllers/Reports.php 95
ERROR - 2021-02-14 22:47:00 --> Severity: Notice --> Undefined property: stdClass::$sale_tptal /home4/ahbabrasul/macheetah/application/controllers/Reports.php 96
ERROR - 2021-02-14 22:47:00 --> Severity: Notice --> Undefined property: stdClass::$asle_paid /home4/ahbabrasul/macheetah/application/controllers/Reports.php 95
ERROR - 2021-02-14 22:47:00 --> Severity: Notice --> Undefined property: stdClass::$sale_tptal /home4/ahbabrasul/macheetah/application/controllers/Reports.php 96
ERROR - 2021-02-14 22:48:58 --> Severity: Notice --> Undefined property: stdClass::$sale_tptal /home4/ahbabrasul/macheetah/application/controllers/Reports.php 96
ERROR - 2021-02-14 22:48:58 --> Severity: Notice --> Undefined property: stdClass::$sale_tptal /home4/ahbabrasul/macheetah/application/controllers/Reports.php 96
