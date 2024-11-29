<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAsset extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mAsset');
        $this->load->model('mKelolaData');
    }

    public function index()
    {
        $data = array(
            'asset' => $this->mAsset->select()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/asset/vasset', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function create()
    {
        $kodenya = 'http://localhost/sim_aset/index.php/cAuth';
        $this->form_validation->set_rules('kode', 'Kode Asset', 'required');
        $this->form_validation->set_rules('barang', 'Barang', 'required');
        $this->form_validation->set_rules('merk', 'Merk Asset', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Peroleh Asset', 'required');
        $this->form_validation->set_rules('harga', 'Harga Asset', 'required');
        $this->form_validation->set_rules('ket', 'Harga Asset', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'barang' => $this->mKelolaData->select_barang(),
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/asset/vCreateAsset', $data);
            $this->load->view('Admin/Layout/footer');
        } else {

            $config['upload_path']          = './asset/foto-asset';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $this->load->view('Admin/Layout/head');
                $this->load->view('Admin/Layout/aside');
                $this->load->view('Admin/asset/vCreateAsset');
                $this->load->view('Admin/Layout/footer');
            } else {
                $this->load->library('ciqrcode'); //pemanggilan library QR CODE

                $kode_asset = $this->input->post('kode');
                $config['cacheable']    = true; //boolean, the default is true
                $config['cachedir']     = './asset/'; //string, the default is application/cache/
                $config['errorlog']     = './asset/'; //string, the default is application/logs/
                $config['imagedir']     = './asset/images/'; //direktori penyimpanan qr code
                $config['quality']      = true; //boolean, the default is true
                $config['size']         = '1024'; //interger, the default is 1024
                $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
                $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
                $this->ciqrcode->initialize($config);
                $image_name = $kode_asset . '.png'; //buat name dari qr code sesuai dengan nim

                $params['data'] = $kode_asset ."\n" .$kodenya; //data yang akan di jadikan QR CODE
                $params['level'] = 'H'; //H=High
                $params['size'] = 10;
                $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
                $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE



                $upload_data = $this->upload->data();
                $data = array(
                    'id_barang' => $this->input->post('barang'),
                    'id_user' => $this->session->userdata('id'),
                    'kode_asset' => $this->input->post('kode'),
                    'merk' => $this->input->post('merk'),
                    'tgl_peroleh' => $this->input->post('tgl'),
                    'harga_asset' => $this->input->post('harga'),
                    'gambar_asset' => $upload_data['file_name'],
                    'jml_asset' => '1',
                    'kondisi' => $this->input->post('ket'),
                );
                $this->mAsset->insert($data);


                $this->session->set_flashdata('success', 'Data Produk Berhasil Ditambahkan!');
                redirect('Admin/cAsset');
            }
        }
    }
    // public function edit($id)
    // {
    //             $data = array(
    //                 'id_barang' => $this->input->post('barang'),
    //                 'id_user' => $this->session->userdata('id'),
    //                 'kode_asset' => $this->input->post('kode'),
    //                 'merk' => $this->input->post('merk'),
    //                 'tgl_peroleh' => $this->input->post('tgl'),
    //                 'harga_asset' => $this->input->post('harga'),
    //                 // 'gambar_asset' => $upload_data['file_name'],
    //                 'jml_asset' => '1',
    //                 'kondisi' => $this->input->post('ket'),
    //                 'status_dipinjam' => $this->input->post('pinjam'),

    //             );
    //             $this->mAsset->update_asset($id, $data);


    //             $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbarui!');
    //             redirect('Admin/cAsset');
    //         }
           
        
    
    // public function edit($id)
    // {
    //     $this->form_validation->set_rules('kode', 'Kode Asset', 'required');
    //     $this->form_validation->set_rules('barang', 'Barang', 'required');
    //     $this->form_validation->set_rules('merk', 'Merk Asset', 'required');
    //     $this->form_validation->set_rules('tgl', 'Tanggal Peroleh Asset', 'required');
    //     $this->form_validation->set_rules('harga', 'Harga Asset', 'required');
    //     $this->form_validation->set_rules('ket', 'Keterangan', 'required');
    //     $this->form_validation->set_rules('gambar_asset', 'Gambar', 'required');
    //     $this->form_validation->set_rules('pinjam', 'Status Pinjam', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $data = array(
    //             'barang' => $this->mKelolaData->select_barang(),
    //             'user' => $this->mKelolaData->select_user(),
    //             'asset' => $this->mAsset->edit($id)
    //         );
    //         $this->load->view('Admin/Layout/head');
    //         $this->load->view('Admin/Layout/aside');
    //         $this->load->view('Admin/asset/vUpdateAsset', $data);
    //         $this->load->view('Admin/Layout/footer');
    //     } else {
    //         $asset = $this->mAsset->edit($id);
    //         $kode = $this->input->post('kode');
    //         if ($asset->kode_asset != $kode) {

    //             $path = './asset/images/' . $asset->kode_asset . '.png';
    //             unlink($path);

    //             $this->load->library('ciqrcode'); //pemanggilan library QR CODE

    //             $kode_asset = $this->input->post('kode');
    //             $config['cacheable']    = true; //boolean, the default is true
    //             $config['cachedir']     = './asset/'; //string, the default is application/cache/
    //             $config['errorlog']     = './asset/'; //string, the default is application/logs/
    //             $config['imagedir']     = './asset/images/'; //direktori penyimpanan qr code
    //             $config['quality']      = true; //boolean, the default is true
    //             $config['size']         = '1024'; //interger, the default is 1024
    //             $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
    //             $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
    //             $this->ciqrcode->initialize($config);
    //             $image_name = $kode_asset . '.png'; //buat name dari qr code sesuai dengan nim

    //             $params['data'] = $kode_asset; //data yang akan di jadikan QR CODE
    //             $params['level'] = 'H'; //H=High
    //             $params['size'] = 10;
    //             $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
    //             $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    //         }
    //         $config['upload_path']          = './asset/foto-asset';
    //         $config['allowed_types']        = 'gif|jpg|png|jpeg';
    //         $config['max_size']             = 5000;

    //         $this->load->library('upload', $config);

    //         if (!$this->upload->do_upload('gambar')) {
    //             $this->load->view('Admin/Layout/head');
    //             $this->load->view('Admin/Layout/aside');
    //             $this->load->view('Admin/asset/vUpdateAsset');
    //             $this->load->view('Admin/Layout/footer');
    //         } else {
    //             $asset = $this->mAsset->edit($id);
    //             $as = './asset/foto-asset/' . $asset->gambar_asset;
    //             unlink($as);

    //             $upload_data = $this->upload->data();
    //             $data = array(
    //                 'id_barang' => $this->input->post('barang'),
    //                 'id_user' => $this->session->userdata('id'),
    //                 'kode_asset' => $this->input->post('kode'),
    //                 'merk' => $this->input->post('merk'),
    //                 'tgl_peroleh' => $this->input->post('tgl'),
    //                 'harga_asset' => $this->input->post('harga'),
    //                 'gambar_asset' => $upload_data['file_name'],
    //                 'jml_asset' => '1',
    //                 'kondisi' => $this->input->post('ket'),
    //                 'status_dipinjam' => $this->input->post('pinjam'),

    //             );
    //             $this->mAsset->update_asset($id, $data);


    //             $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbarui!');
    //             redirect('Admin/cAsset');
    //         }
           
    //     }
   
    public function edit($id)
    {
        $this->form_validation->set_rules('barang', 'Kode Asset', 'required');
        $this->form_validation->set_rules('merk', 'Barang', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Peroleh Asset', 'required');
        $this->form_validation->set_rules('harga', 'Harga Asset', 'required');
        $this->form_validation->set_rules('merk', 'Merk Asset', 'required');
        $this->form_validation->set_rules('kondisi', 'Harga Asset', 'required');
        $this->form_validation->set_rules('pinjam', 'Harga Asset', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'asset' => $this->mAsset->edit($id),
                'barang' => $this->mKelolaData->select_barang(),
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/asset/vUpdateAsset', $data);
            $this->load->view('Admin/Layout/footer');
        } else {

        $data = array(
            'id_barang' => $this->input->post('barang'),
            'id_user' => $this->session->userdata('id'),
            'merk' => $this->input->post('merk'),
            'tgl_peroleh' => $this->input->post('tgl'),
            'harga_asset' => $this->input->post('harga'),
            'jml_asset' => '1',
            'kondisi' => $this->input->post('kondisi'),
            'status_dipinjam' => $this->input->post('pinjam')
        );

        $this->mAsset->update_asset($id, $data);
        $this->session->set_flashdata('success', 'Data Asset ter Update!');
        redirect('Admin/cAsset');
    }
        }
    

    public function delete($id)
    {
        $asset = $this->mAsset->edit($id);
        $as = './asset/foto-asset/' . $asset->gambar_asset;
        unlink($as);

        $path = './asset/images/' . $asset->kode_asset . '.png';
        unlink($path);
        $this->mAsset->delete($id);


        $this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus!');
        redirect('Admin/cAsset');
    }

    function qrcode($kodenya = 'http://localhost/sim_aset/index.php/cAuth'){
        qrcode::png(
            $kodenya,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 6,
            $margin = 1
        );
    }

    function qrcode_print($id){
        $data['row'] = $this->mAsset->getasset($id);
        $html = $this->load->view('Admin/Asset/qrcode', $data, true);
        $this->fungsi->PdfGenerator($html, 'qr-code-' .$data['row']->kode_asset, 'A4', 'landscape');
    }
}

/* End of file cAsset.php */
