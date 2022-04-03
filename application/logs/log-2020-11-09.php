<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-09 23:50:54 --> Query error: Unknown column 'role_status' in 'where clause' - Invalid query: SELECT *
FROM `tbl_role_control`
JOIN `tbl_module_control` ON `tbl_role_control`.`control_id` = `tbl_module_control`.`control_id`
WHERE `role_id` = '2'
AND `role_status` = 1
ORDER BY `role_control_id` DESC
