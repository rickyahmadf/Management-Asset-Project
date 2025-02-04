<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mDashboard');
        $this->load->model('mPengajuan');
        $this->load->model('mKelolaData');
    }

    public function index()
    {
        $data = array(
            'jml' => $this->mDashboard->total(),
            'pengajuan' => $this->mPengajuan->select()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/vDashboard', $data);
        $this->load->view('Admin/Layout/footer');
    }

    public function hallo(){
        $data['session_user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id')])->row;
        
        $this->load->view('Pengguna/Layout/aside', $data);

    }
}

/* End of file cDashboard.php */
