<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAside extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKelolaData');
    }

    public function index(){
        $data['session_user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row;
        
        $this->load->view('Pengguna/Layout/aside', $data);

    }
}

/* End of file cDashboard.php */
