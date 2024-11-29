<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPinjam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mAsset');
        $this->load->model('mPinjam');
    }

    public function index()
    {
        $data = array(
            'asset' => $this->mAsset->select()
        );
        $this->load->view('Pengguna/Layout/head');
        $this->load->view('Pengguna/Layout/aside');
        $this->load->view('Pengguna/asset/vasset', $data);
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
                'asset' => $this->mAsset->select(),
                'pinjam' => $this->mPinjam->select(),
            );
            $this->load->view('Pengguna/Layout/head');
            $this->load->view('Pengguna/Layout/aside');
            $this->load->view('Pengguna/asset/vPinjamAsset', $data);
            $this->load->view('Pengguna/Layout/footer');
        } else {
                $data = array(
                    'merk' => $this->input->post('asset'),
                    'id_user' => $this->session->userdata('id'),
                    'tgl_pinjam' => $this->input->post('tgl'),
                    'keterangan' => $this->input->post('ket'),
                    'status_peminjaman' => '0',
                );
                $booking = array(
                    'status_dipinjam' => '1'
                );
                $this->mPinjam->insert($data);
                $this->mAsset->update($data['merk'], $booking);


                $this->session->set_flashdata('success', 'Data Peminjam Berhasil Ditambahkan, Silahkan tunggu persetujuan Kepala Lab!');
                redirect('Pengguna/cPinjam/pinjam');
            }
        }

        public function booking($id)
    {
        $acc = $this->input->post('acc');
        $data = array(
            'status_dipinjam' => $acc
        );
        $this->mAsset->update($id, $data);
        redirect('Pengguna/cPinjam');
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
