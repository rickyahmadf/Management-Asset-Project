<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKeputusan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mPinjam');
        $this->load->model('mAsset');
    }


    public function index()
    {
        $data = array(
            'peminjaman' => $this->mPinjam->select(),
            'detail' => $this->mPinjam->info_keputusan()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Peminjaman/vKeputusan', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function keputusan($id)
    {
        $acc = $this->input->post('acc');
        $data = array(
            'status_peminjaman' => $acc
        );
        $this->mPinjam->keputusan($id, $data);
        $this->session->set_flashdata('success', 'Anda telah berhasil memberikan keputusan!');
        redirect('Admin/cKeputusan');
    }
    public function pengembalian($id)
    {
        $data = array(
            'kondisi_pengembalian' => $this->input->post('kondisi'),
            'tgl_pengembalian' => $this->input->post('tgl'),
        );
        $asset = array(
            'status_dipinjam' => '0'
        );
        $this->mPinjam->pengembalian($id, $data);
        $this->mAsset->update($id, $asset);
        redirect('Admin/cKeputusan');
    }
    public function asset_keputusan($id)
    {
        $data = array(
            'tgl_kep' => $this->input->post('tgl'),
            'nama_asset_kep' => $this->input->post('asset'),
            'id_peminjam' => $id
        );
        $this->mPinjam->asset_kep($data);

        $data_status = array(
            'status_peminjaman' => '2'
        );
        $this->mPinjam->keputusan($id, $data_status);
        $this->session->set_flashdata('success', 'Anda telah berhasil menambahkan asset keputusan!');
        redirect('Admin/cKeputusan');
    }
}

/* End of file cKeputusan.php */
