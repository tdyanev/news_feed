<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_source extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],

            'url' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('source');
    }

    public function down() {
        $this->dbforge->drop_table('source');
    }
}
