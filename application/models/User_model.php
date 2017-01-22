<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table = 'user';

    public function __construct() {
        parent::__construct();
    }


    public function is_valid_post($password) {
        $email = $this->input->post('login-email');

        $row = $this->db->select('password')
            ->where('email', $email)
            ->get($this->table)
            ->row();

        return $row ? password_verify($password, $row->password)
            : FALSE;
    }

    public function register($post) {
        $data = [
            'email' => $post['email'],
            'password' => $this->_encode($post['password']),
        ];

        return $this->db->insert($this->table, $data);
    }

    public function get($email) {
        return $this->db->where('email', $email)
            ->get($this->table)
            ->row();
    }

    public function update($email, $data) {
        $this->db->where('email', $email);
        $this->db->update($this->table, $data);

        return $this->db->affected_rows();
    }

    private function _encode($data) {
        $options = [
            'cost' => 12,
        ];

        return password_hash($data, PASSWORD_BCRYPT, $options);
    }
}
