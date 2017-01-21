<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_email extends CI_Migration {

    public function up() {
        $this->dbforge->add_column('user', [
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 90,
                'null' => FALSE,
                'unique' => TRUE,
                'after' => 'id',
            ],

        ]);

    }

    public function down() {
        $this->dbforge->drop_column('user', 'email');
    }
}
