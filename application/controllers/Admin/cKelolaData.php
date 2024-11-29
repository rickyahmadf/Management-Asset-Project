<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKelolaData extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKelolaData');
        $this->load->model('mPengajuan');
    }


    //kategori
    public function kategori()
    {
        $data = array(
            'kategori' => $this->mKelolaData->select_kategori()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/kategori/vkategori', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createkategori()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->mKelolaData->insert_kategori($data);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Disimpan!');
        redirect('Admin/cKelolaData/kategori');
    }
    public function updatekategori($id)
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->mKelolaData->updatekategori($id, $data);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Update!');
        redirect('Admin/cKelolaData/kategori');
    }
    public function deletekategori($id)
    {
        $this->mKelolaData->deletekategori($id);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Dihapus!');
        redirect('Admin/cKelolaData/kategori');
    }

    //barang
    public function barang()
    {
        $data = array(
            'barang' => $this->mKelolaData->select_barang(),
            'kategori' => $this->mKelolaData->select_id_kategori(),
            'pengajuan' => $this->mPengajuan->select(),
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/barang/vbarang', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createbarang()
    {
        
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'nama_barang' => $this->input->post('nama'),
                'keterangan' => $this->input->post('keterangan'),
                'tgl_terima' => $this->input->post('tgl'),
                'sumber' => $this->input->post('sumber'),
            );
            $this->mKelolaData->insert_barang($data);
            $this->session->set_flashdata('success', 'Data Barang Berhasil Ditambahkan!');
            redirect('Admin/cKelolaData/barang');
        }

    
    public function updatebarang($id)
    {
        $data = array(
            'id_kategori' => $this->input->post('kategori'),
            'nama_barang' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
            'tgl_terima' => $this->input->post('tgl'),
            'sumber' => $this->input->post('sumber'),
        );
        $this->mKelolaData->updatebarang($id, $data);
        $this->session->set_flashdata('success', 'Data Barang Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/barang');
    }
    public function deletebarang($id)
    {
        $this->mKelolaData->deletebarang($id);
        $this->session->set_flashdata('success', 'Data Barang Berhasil Dihapus!');
        redirect('Admin/cKelolaData/barang');
    }



    //user
    public function user()
    {
        $data = array(
            'user' => $this->mKelolaData->select_user()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/user/vuser', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createuser()
    {
        $data = array(
            'nama_user' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'status' => $this->input->post('status'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level'),
        );
        $this->mKelolaData->insert_user($data);
        $this->session->set_flashdata('success', 'Data User Berhasil Disimpan!');
        redirect('Admin/cKelolaData/user');
    }
    public function updateuser($id)
    {
        $data = array(
            'nama_user' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'status' => $this->input->post('status'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level'),
        );
        $this->mKelolaData->updateuser($id, $data);
        $this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/user');
    }
    public function deleteuser($id)
    {
        $this->mKelolaData->delete($id);
        $this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
        redirect('Admin/cKelolaData/user');
    }

    public function registrasi()
    {
        $data = array(
            'user' => $this->mKelolaData->select_user()
        );
       
        $this->load->view('vregistrasi', $data);
       
    }

    public function createregistrasi()
    {
        $data = array(
            'nama_user' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'status' => $this->input->post('status'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => '3',
        );
        $this->mKelolaData->insert_user($data);
        $this->session->set_flashdata('success', 'Berhasil Registrasi');
        redirect('cAuth');
    }
}


/* End of file cKelolaData.php */
