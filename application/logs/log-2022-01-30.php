<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-01-30 08:17:18 --> Query error: Unknown column 'loan_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_customer_loan_returns`
WHERE `zone_id` = '8'
AND `return_officer` = '25'
AND `is_collected` = 1
AND `loan_return_status` = 8
AND `return_date` = '2022-01-31'
AND `loan_status` = 7
ORDER BY `loan_return_id` DESC
ERROR - 2022-01-30 08:17:42 --> Query error: Column 'zone_id' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl_customer_loan_returns`
JOIN `tbl_loans` ON `tbl_loans`.`loan_id` = `tbl_customer_loan_returns`.`loan`
WHERE `zone_id` = '8'
AND `return_officer` = '25'
AND `is_collected` = 1
AND `loan_return_status` = 8
AND `return_date` = '2022-01-31'
AND `loan_status` = 7
ORDER BY `loan_return_id` DESC
ERROR - 2022-01-30 08:17:44 --> Query error: Column 'zone_id' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl_customer_loan_returns`
JOIN `tbl_loans` ON `tbl_loans`.`loan_id` = `tbl_customer_loan_returns`.`loan`
WHERE `zone_id` = '8'
AND `return_officer` = '25'
AND `is_collected` = 1
AND `loan_return_status` = 8
AND `return_date` = '2022-01-31'
AND `loan_status` = 7
ORDER BY `loan_return_id` DESC
ERROR - 2022-01-30 08:17:45 --> Query error: Column 'zone_id' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl_customer_loan_returns`
JOIN `tbl_loans` ON `tbl_loans`.`loan_id` = `tbl_customer_loan_returns`.`loan`
WHERE `zone_id` = '8'
AND `return_officer` = '25'
AND `is_collected` = 1
AND `loan_return_status` = 8
AND `return_date` = '2022-01-31'
AND `loan_status` = 7
ORDER BY `loan_return_id` DESC
ERROR - 2022-01-30 08:17:45 --> Query error: Column 'zone_id' in where clause is ambiguous - Invalid query: SELECT *
FROM `tbl_customer_loan_returns`
JOIN `tbl_loans` ON `tbl_loans`.`loan_id` = `tbl_customer_loan_returns`.`loan`
WHERE `zone_id` = '8'
AND `return_officer` = '25'
AND `is_collected` = 1
AND `loan_return_status` = 8
AND `return_date` = '2022-01-31'
AND `loan_status` = 7
ORDER BY `loan_return_id` DESC
ERROR - 2022-01-30 08:25:36 --> Query error: Unknown column 'is_collecte' in 'where clause' - Invalid query: SELECT *
FROM `tbl_customer_loan_returns`
JOIN `tbl_loans` ON `tbl_loans`.`loan_id` = `tbl_customer_loan_returns`.`loan`
WHERE `tbl_customer_loan_returns`.`zone_id` = '8'
AND `return_officer` = '25'
AND `is_collecte` = 1
AND `loan_return_status` = 8
AND `return_date` = '2022-01-31'
AND `loan_status` = 7
ORDER BY `loan_return_id` DESC
ERROR - 2022-01-30 20:02:03 --> Query error: Unknown column 'is_collecte' in 'where clause' - Invalid query: SELECT *
FROM `tbl_customer_loan_returns`
JOIN `tbl_loans` ON `tbl_loans`.`loan_id` = `tbl_customer_loan_returns`.`loan`
WHERE `tbl_customer_loan_returns`.`zone_id` = '8'
AND `return_officer` = '25'
AND `is_collecte` = 1
AND `loan_return_status` = 8
AND `return_date` = '2022-01-31'
AND `loan_status` = 7
ORDER BY `loan_return_id` DESC
ERROR - 2022-01-30 20:13:58 --> Query error: Unknown column 'loan-status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_customer_loan_returns`
JOIN `tbl_customers` ON `tbl_customers`.`customer_id` = `tbl_customer_loan_returns`.`return_customer`
JOIN `tbl_loans` ON `tbl_loans`.`loan_id` = `tbl_customer_loan_returns`.`loan`
WHERE `return_officer` = '25'
AND `is_collected` = 1
AND `loan_return_status` = 8
AND `return_date` = '2022-01-31'
AND `loan-status` = 7
ORDER BY `loan_return_id` DESC
ERROR - 2022-01-30 20:20:27 --> Severity: Notice --> Undefined variable: tbl_loans.loan_id = tbl_customer_loan_returns.loan C:\xampp\htdocs\ql\application\controllers\Loans.php 153
ERROR - 2022-01-30 20:20:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
WHERE `return_officer` = '25'
AND `is_collected` = 1
AND `loan_return_statu...' at line 4 - Invalid query: SELECT *
FROM `tbl_customer_loan_returns`
JOIN `tbl_customers` ON `tbl_customers`.`customer_id` = `tbl_customer_loan_returns`.`return_customer`
JOIN `tbl_loans` USING ()
WHERE `return_officer` = '25'
AND `is_collected` = 1
AND `loan_return_status` = 8
AND `return_date` = '2022-01-31'
AND `loan_status` = 7
ORDER BY `loan_return_id` DESC
