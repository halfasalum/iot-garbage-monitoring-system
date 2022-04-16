<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_device_table extends CI_Migration{

    public function up(){
        $this->dbforge->add_field(array(
           'device_id'=>array(
               'type'       => 'INT',
               'constraint' => 11,
               'unsigned'   => TRUE,
               'auto_increment' => TRUE
           ),
            'device_location'=>array(
                'type'  => 'VARCHAR',
                'constraint'    => 255,
                'null'          => FALSE
            ),
            'device_lat'=>array(
                'type'  => 'VARCHAR',
                'constraint'    => 2555,
                'null'          => FALSE
            ),
            'device_lon'=>array(
                'type'  => 'VARCHAR',
                'constraint'    => 2555,
                'null'          => FALSE
            ),
            'device_status'=>array(
                'type'  => 'VARCHAR',
                'constraint'    => 2555,
                'default'       => 1,
            ),
        ));
        $this->dbforge->add_key('device_id');
        $this->dbforge->create_table('tbl_device');
    }

    public function down(){
        $this->dbforge->drop_table('tbl_device');
    }
}
