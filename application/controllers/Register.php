<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Register_model');
    }

    public function index() {
        $this->load->view('register_view');
    }

    public function process() {
        // Get the highest existing anggota_id
        $last_id = $this->Register_model->get_last_id();

        // Extract the numeric part and increment it
        if ($last_id) {
            $num = (int) substr($last_id, 2); // Assuming format is always AG###
            $new_id_num = $num + 1;
            $new_id = 'AG' . str_pad($new_id_num, 3, '0', STR_PAD_LEFT); // Format as AG###
        } else {
            $new_id = 'AG001'; // Default ID if no records exist
        }

        $data = array(
            'anggota_id' => $new_id,
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => '', // Set as empty since it's no longer in the form
            'tgl_lahir' => '', // Set as empty since it's no longer in the form
            'jenkel' => '', // Set as empty since it's no longer in the form
            'alamat' => '', // Set as empty since it's no longer in the form
            'telepon' => '', // Set as empty since it's no longer in the form
            'email' => $this->input->post('email'),
            'tgl_bergabung' => date('Y-m-d'), // Set join date to current date
            'user' => $this->input->post('username'), // Use 'username' from input
            'pass' => md5($this->input->post('pass')),  // Encrypt password using MD5
            'level' => 'Petugas',  // Set level to Petugas
            'foto' => ''  // Default photo empty, can add photo upload feature later
        );

        $this->Register_model->insert($data);
        redirect('login');
    }
}
