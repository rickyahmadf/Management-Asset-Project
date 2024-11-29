<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPengembalian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mPinjam');
        $this->load->model('mAsset');
        $this->load->model('mKelolaData');
    }

    public function index()
    {
        $data = array(
            'peminjam' => $this->mPinjam->select(),
            'asset' => $this->mAsset->select(),     
            'data' => $this->mPinjam->datapeminjam()
        );
        $this->load->view('Pengguna/Layout/head');
        $this->load->view('Pengguna/Layout/aside');
        $this->load->view('Pengguna/Pengembalian/vPengembalian', $data);
        $this->load->view('Pengguna/Layout/footer');
    }

    public function pinjam()
    {
        $this->form_validation->set_rules('asset', 'Kode Asset', 'required');
        $this->form_validation->set_rules('nama', 'Merk Asset', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Peroleh Asset', 'required');
        $this->form_validation->set_rules('ket', 'Harga Asset', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                // 'asset' => $this->mAsset->select(),
                'pinjam' => $this->mPinjam->select(),
            );
            $this->load->view('Pengguna/Layout/head');
            $this->load->view('Pengguna/Layout/aside');
            $this->load->view('Pengguna/asset/vPinjamAsset', $data);
            $this->load->view('Pengguna/Layout/footer');
        } else {
                $data = array(
                    'id_asset' => $this->input->post('asset'),
                    'nama_peminjam' => $this->input->post('nama'),
                    'tgl_pinjam' => $this->input->post('tgl'),
                    'keterangan' => $this->input->post('ket'),
                    'status' => '0',
                    'status_pengembalian' => '0',
                    'tgl_pengembalian' => '0',
                );
                $this->mPinjam->insert($data);


                $this->session->set_flashdata('success', 'Data Peminjam Berhasil Ditambahkan, Silahkan tunggu persetujuan Kepala Lab!');
                redirect('Pengguna/cPinjam/pinjam');
            }
        }
    
    
        public function keputusan($id)
        {
            $acc = $this->input->post('acc');
            $data = array(
                'status_pengembalian' => $acc
            );
            $this->mPinjam->pengembalian($id, $data);
            $this->session->set_flashdata('success', 'Anda telah berhasil memberikan keputusan!');
            redirect('Pengguna/cPengembalian');
        }

        public function tgl_pengembalian($id)
        {
            $tgl = $this->input->post('tgl');
            $data = array(
                'tgl_pengembalian' => $tgl
            );
            $this->mPinjam->tgl_pengembalian($id, $data);
            $this->session->set_flashdata('success', 'Anda telah berhasil memberikan keputusan!');
            redirect('Pengguna/cPengembalian');
        }
    // public function delete($id)
    // {
    //     $this->load->view('Pengguna/Layout/head');
    //     $this->load->view('Pengguna/Layout/aside');
    //     $this->load->view('Pengguna/asset/vPinjamAsset');
    //     $this->load->view('Pengguna/Layout/footer');


    //     $asset = $this->mAsset->edit($id);
    //     $as = './asset/foto-asset/' . $asset->gambar_asset;
    //     unlink($as);

    //     $path = './asset/images/' . $asset->kode_asset . '.png';
    //     unlink($path);
    //     $this->mAsset->delete($id);


    //     $this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus!');
    //     redirect('Admin/cAsset');
    // }
}


/* End of file cAsset.php */
