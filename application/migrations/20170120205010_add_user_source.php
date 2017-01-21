<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_source extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],

            'user_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],

            'source_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],

            'position' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user_source');
    }

    public function down() {
        $this->dbforge->drop_table('user_source');
    }
}
