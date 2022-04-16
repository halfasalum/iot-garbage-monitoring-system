<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_device_number_column extends CI_Migration{

    public function up(){
        $fields = array(
            'device_number' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null'      => FALSE
            )
        );
        $this->dbforge->add_column('tbl_trash', $fields);
    }

    public function down(){
        $this->dbforge->drop_column('tbl_trash', 'device_number');
    }
}
