<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-01-23 19:52:33 --> 404 Page Not Found: Report/index
ERROR - 2021-01-23 19:52:34 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-01-23 19:55:47 --> 404 Page Not Found: Report/index
ERROR - 2021-01-23 19:55:51 --> 404 Page Not Found: Report/index
ERROR - 2021-01-23 19:56:28 --> 404 Page Not Found: Report/index
ERROR - 2021-01-23 19:57:27 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home4/ahbabrasul/macheetah/application/controllers/Reports.php:23) /home4/ahbabrasul/macheetah/system/core/Common.php 564
ERROR - 2021-01-23 19:57:27 --> Severity: Error --> Call to undefined method Reports::profitLossChart() /home4/ahbabrasul/macheetah/application/controllers/Reports.php 23
ERROR - 2021-01-23 20:32:55 --> Query error: Table 'ahbabras_macheetah.tbl_transaction_journal' doesn't exist - Invalid query: select distinct(transactionId) as transactionId from tbl_transaction_journal inner join tbl_transaction on tbl_transaction.transId = tbl_transaction_journal.transactionId where account != 1004 and tbl_transaction.date between'2021-01-01' and '2021-01-23'order by transactionId desc
ERROR - 2021-01-23 22:10:55 --> Severity: Notice --> Array to string conversion /home4/ahbabrasul/macheetah/application/views/stock/unit.php 24
ERROR - 2021-01-23 22:13:31 --> Query error: Unknown column 'category_name' in 'field list' - Invalid query: INSERT INTO `tbl_unit` (`category_name`) VALUES ('PC')
