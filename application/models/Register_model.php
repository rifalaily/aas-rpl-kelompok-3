<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {
        $this->db->insert('tbl_login', $data);
    }

    // Method to get the highest existing anggota_id
    public function get_last_id() {
        $this->db->select_max('anggota_id');
        $query = $this->db->get('tbl_login');
        $result = $query->row();
        return $result->anggota_id;
    }
}
