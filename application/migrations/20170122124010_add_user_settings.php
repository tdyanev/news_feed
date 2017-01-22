<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_settings extends CI_Migration {

    public function up() {
        $this->dbforge->add_column('user', [
            'settings' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'after' => 'password',
            ],

        ]);

    }

    public function down() {
        $this->dbforge->drop_column('user', 'settings');
    }
}
