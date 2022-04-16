<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_device_state_column extends CI_Migration{

    public function up(){
        $fields = array(
            'device_state' => array(
                'type' => 'INT',
                'constraint' => 3,
                'null'      => TRUE,
                'default'   => 0
            )
        );
        $this->dbforge->add_column('tbl_trash', $fields);
    }

    public function down(){
        $this->dbforge->drop_column('tbl_trash', 'device_state');
    }
}
