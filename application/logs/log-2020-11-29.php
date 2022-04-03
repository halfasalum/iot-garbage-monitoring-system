<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-29 08:20:41 --> Severity: Notice --> Undefined property: stdClass::$statusName /home4/ahbabrasul/saccos/application/views/member/loans.php 43
ERROR - 2020-11-29 08:22:32 --> Query error: Unknown column 'tbl_loan.loan_statu' in 'on clause' - Invalid query: SELECT *
FROM `tbl_loan`
JOIN `tbl_status` ON `tbl_status`.`statusId` = `tbl_loan`.`loan_statu`
WHERE `loan_staff` = '1'
AND `loan_status` != 4
ORDER BY `loan_id` DESC
ERROR - 2020-11-29 08:24:37 --> Severity: Notice --> Undefined property: stdClass::$statusName /home4/ahbabrasul/saccos/application/views/member/loans.php 44
