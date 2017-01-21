<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],

            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user');
    }

    public function down() {
        $this->dbforge->drop_table('user');
    }
}
