<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mDashboard');
        $this->load->model('mPengajuan');
        $this->load->model('mPinjam');
    }

    public function index()
    {

        $data = array(
            'jml' => $this->mDashboard->total(),
            'pengajuan' => $this->mPengajuan->select(),
            'peminjam' => $this->mPinjam->datapeminjam()
        );
        $this->load->view('Pengguna/Layout/head');
        $this->load->view('Pengguna/Layout/aside');
        $this->load->view('Pengguna/vDashboard', $data);
        $this->load->view('Pengguna/Layout/footer');
    }
}

/* End of file cDashboard.php */
