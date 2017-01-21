<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Source_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        $query = $this->db->get('source');
        return $query->result();
    }

}
