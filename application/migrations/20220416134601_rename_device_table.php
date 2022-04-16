<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_rename_device_table extends CI_Migration{

    public function up(){
        $this->dbforge->rename_table('tbl_device', 'tbl_trash');
    }

    public function down(){
        $this->dbforge->rename_table('tbl_trash','tbl_device');
    }
}
