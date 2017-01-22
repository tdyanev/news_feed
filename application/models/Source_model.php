<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Source_model extends CI_Model {

    private $table = 'source';

    public function __construct() {
        parent::__construct();
    }

    public function get_source($id) {
        $row = $this->db->select('url')
                ->where('id', $id)
                ->get($this->table)
                ->row();

        return $row->url;
    }

    public function get_all() {
        $query = $this->db
            ->order_by('name', 'asc')
            ->get($this->table);

        return $query->result();
    }

}
